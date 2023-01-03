<?php
namespace classes\pages;
use classes\db\db;
class requestUrlHandler
{
  private $homePath = null;
  private $errorPath = null;
  private $queryString = "";
  private $requestUrlPath = "";
  private $defaultViewDirectory = "view";
  private $isRequestUrlOk = false;
  public function setHomePath($path)
  {
    $this->homePath = $path;
  }
  public function setErrorPath($path)
  {
    $this->errorPath = $path;
  }
  public function getHomePath()
  {
    return $this->homePath;
  }
  public function getErrorPath()
  {
    return $this->errorPath;
  }
  public function setRequestUrlPath()
  {
    $this->requestUrlPath = $_SERVER["REQUEST_URI"];
  }
  public function getRequestUrlPath()
  {
    return $this->requestUrlPath;
  }
  public function getDefaultViewDirectory()
  {
    return $this->defaultViewDirectory;
  }
  public function setDefaultViewDirectory($defaultViewDirectory)
  {
    $this->defaultViewDirectory = $defaultViewDirectory;
  }
  public function getLastRequestUrlStrOnly()
  {
    return basename($this->getRequestUrlPath());
  }
  public function getRequestUrlFilePath()
  {
    return $this->defaultViewDirectory . $this->getRequestUrlPath() . ".php";
  }
  public function isHomePage()
  {
    if ($_SERVER["REQUEST_URI"] === '/')
      return true;
    return false;
  }
  // client must request pathName that is absolutely same to fileName
  public function isRequestUrlPathEqualFile()
  {
    $url = \envCenter::getRequestURI();
    if (!file_exists($url)) {
      return false;
    }
    $this->setRequestUrlPath($url);
    $this->isRequestUrlOk = true;
    return true;
  }
  public function setDynamicArticlesHeadData(&$pLoader) {
    if (!preg_match("/newsArticle/", $this->requestUrlPath))
      return;

    $pLoader->pageTitle = str_replace('-', ' ', basename($this->requestUrlPath), );
    return;
  }
}

class pageData
{
  public $pageId;
  public $pageTitle;
  public $pageDescription;
  public $pageKeywords;
  public $pageAuthor;
  public $pageViewport = "width=device-width, height=device-height, initial-scale=1.0";
  public $sharedState;
  public $pageMainContentFilePath;
  private function findPageData(&$pageid, &$dbDataList)
  {
    for ($i = 0; $i < count($dbDataList); $i++) {
      if ($pageid == $dbDataList[$i][1]) {
        return $dbDataList[$i];
      }
    }
    return -1;
  }
  private function findPageId($key, &$pageIDList)
  {
    for ($i = 0; $i < count($pageIDList); $i++) {
      if ($key == $pageIDList[$i][1])
        return $pageIDList[$i][0];
    }
    return -1;
  }
  public function setPageData($urlpath, $addExtraPageId)
  {
    $pageIdList = [["HME-0", "home"], ["ABT-0", "about"], ["NWS-0", "news"], ["GDS-0", "guides"]];
    $addExtraPageId($pageIdList);
    // set urlpath to home if no path is found
    if ($urlpath == "") $urlpath = "home";
    $targetPageId = $this->findPageId($urlpath, $pageIdList);

    $data = db::query("SELECT * FROM pages");
    $targetData = $this->findPageData($targetPageId, $data);
    if ($targetData != -1) {
      $this->pageId = $targetData["pageId"];
      $this->pageTitle = $targetData["pageTitle"];
      $this->pageDescription = $targetData["pageDescription"];
      $this->pageKeywords = $targetData["pageKeywords"];
      $this->pageAuthor = $targetData["pageAuthor"];
      $this->pageViewport = $targetData["pageViewport"] == null ? $this->pageViewport : $targetData["pageViewport"];
      $this->pageMainContentFilePath = $targetData["pageMainContentFilePath"];
    }
    return;
  }
}

class pageLoader
{
  // only add news_title columns into mainData
  private function setNewsTitleAllDays(&$mainData)
  {
    array_push($mainData, db::query("SELECT news_title FROM updatenews WHERE daystr = 'monday'"));
    array_push($mainData, db::query("SELECT news_title FROM updatenews WHERE daystr = 'tuesday'"));
    array_push($mainData, db::query("SELECT news_title FROM updatenews WHERE daystr = 'wednesday'"));
    array_push($mainData, db::query("SELECT news_title FROM updatenews WHERE daystr = 'thursday'"));
    array_push($mainData, db::query("SELECT news_title FROM updatenews WHERE daystr = 'friday'"));
    array_push($mainData, db::query("SELECT news_title FROM updatenews WHERE daystr = 'saturday'"));
    array_push($mainData, db::query("SELECT news_title FROM updatenews WHERE daystr = 'sunday'"));
    return;
  }
  private function handleMainContent(requestUrlHandler &$ruH, pageData &$pd)
  {
    $pageId = $pd->pageId;
    $mainData = [];

    // handle home page here 
    if ($ruH->getHomePath() != null) {
      $this->setNewsTitleAllDays($mainData);
      \envCenter::loadFile($ruH->getHomePath(), $mainData);
      return;
    }
    if ($ruH->getErrorPath() != null) {
      \envCenter::loadFile($ruH->getErrorPath());
      return;
    }

    switch ($pageId) {
      case "ABT-0":
        $mainData = db::query("SELECT * FROM about");
        break;
      case "NWS-0":
        $mainData = db::query("SELECT * FROM updatenews");
        break;
      default:
        break;
    }

    // load body file
    \envCenter::loadFile($ruH->getRequestUrlFilePath(), $mainData);
  }
  public function loadPage(requestUrlHandler &$ru)
  {
    $pagedata = new pageData();
    $pagedata->setPageData($ru->getLastRequestUrlStrOnly(), function (&$pageList) {
      // add additional internal page id here
      // ex. array_push($pageList, ["HME-1", "home"]);
    });

    // initialize page head data if the page is dynamic article
    $ru->setDynamicArticlesHeadData($pagedata);

    // load header file
    \envCenter::loadFile("view/header/default2.php", $pagedata);

    $this->handleMainContent($ru, $pagedata);

    // load footer file
    \envCenter::loadFile("view/footer.php");
  }
}
class viewController
{
  public function handleRequest()
  {
    $ruH = new requestUrlHandler();
    if ($ruH->isHomePage()) {
      $ruH->setHomePath($ruH->getDefaultViewDirectory() . "/home.php");
    }
    if (!$ruH->isRequestUrlPathEqualFile()) {
      $ruH->setErrorPath($ruH->getDefaultViewDirectory() . "/errorview/notfound.php");
    }
    $pageloader = new pageLoader();
    $pageloader->loadPage($ruH);
    return;
  }
}
