<?php

namespace classes\pages;

use classes\db\db;

class requestUrlHandler {
  private $homePath = "";
  private $errorPath = "";
  private $queryString = "";
  private $requestUrlPath = "";
  private $defaultViewDirectory = "view";
  private $isRequestUrlOk = false;
  public function setHomePath($path) {
    $this->homePath = $path;
  }
  public function setErrorPath($path) {
    $this->errorPath = $path;
  }
  public function getHomePath() {
    return $this->homePath;
  }
  public function getErrorPath() {
    return $this->errorPath;
  }
  public function setRequestUrlPath() {
    $this->requestUrlPath = $_SERVER["REQUEST_URI"];
  }
  public function getRequestUrlPath() {
    return $this->requestUrlPath;
  }
  public function getDefaultViewDirectory() {
    return $this->defaultViewDirectory;
  }
  public function setDefaultViewDirectory($defaultViewDirectory) {
    $this->defaultViewDirectory = $defaultViewDirectory;
  }
  public function getLastRequestUrlStrOnly() {
    return basename($this->getRequestUrlPath());
  }
  public function getRequestUrlFilePath() {
    return $this->defaultViewDirectory . $this->getRequestUrlPath() . ".php";
  }
  public function isHomePage() {
    if ($_SERVER["REQUEST_URI"] === '/')
      return true;
    return false;
  }
  private function checkIsArticleLayoutFileExist() {
    if (!file_exists(\envCenter::getDocumentRoot()."/view/newsArticle/article-layout.php"))
      throw new \Exception("article-layout.php cannot be found at ./view/newsArticle/");
  }
  // client must request pathName that is absolutely same to fileName
  public function isRequestUrlPathEqualFile() {
    $url = \envCenter::getRequestURI();
    if (preg_match("/newsArticle/", $url)) {
      $this->checkIsArticleLayoutFileExist();
      $this->setRequestUrlPath($url);
      $this->isRequestUrlOk = true;
      return true;
    }
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

    $pLoader->setIsDynamicArticle(true);
    $pLoader->pageTitle = str_replace('-', ' ', basename($this->requestUrlPath),);
    return;
  }
}

class pageData {
  public $pageId;
  public $pageTitle;
  public $pageDescription;
  public $pageKeywords;
  public $pageAuthor;
  public $pageViewport;
  public $sharedState;
  public $pageMainContentFilePath;
  private $isDynamicArticle;
  public function __construct() {
    $this->pageId = "";
    $this->pageTitle = "";
    $this->pageDescription = "";
    $this->pageKeywords = "";
    $this->pageAuthor = "";
    $this->pageViewport = "width=device-width, height=device-height, initial-scale=1.0";
    $this->sharedState = "";
    $this->isDynamicArticle = false;
  }
  public function setIsDynamicArticle(bool $isDynamicArticle) {
    $this->isDynamicArticle = $isDynamicArticle;
  }
  public function getIsDynamicArticle() {
    return $this->isDynamicArticle;
  }
  private function findPageData(&$pageid, &$dbDataList) {
    for ($i = 0; $i < count($dbDataList); $i++) {
      if ($pageid == $dbDataList[$i][1]) {
        return $dbDataList[$i];
      }
    }
    return -1;
  }
  private function findPageId($key, &$pageIDList) {
    for ($i = 0; $i < count($pageIDList); $i++) {
      if ($key == $pageIDList[$i][1])
        return $pageIDList[$i][0];
    }
    return -1;
  }
  public function setPageData($urlpath, $addExtraPageId) {
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
  }
}

class pageLoader {
  // only add news_title columns into mainData
  private function setNewsTitleAllDays(&$mainData) {
    array_push($mainData, db::query("SELECT news_title FROM updatenews WHERE daystr = 'monday'"));
    array_push($mainData, db::query("SELECT news_title FROM updatenews WHERE daystr = 'tuesday'"));
    array_push($mainData, db::query("SELECT news_title FROM updatenews WHERE daystr = 'wednesday'"));
    array_push($mainData, db::query("SELECT news_title FROM updatenews WHERE daystr = 'thursday'"));
    array_push($mainData, db::query("SELECT news_title FROM updatenews WHERE daystr = 'friday'"));
    array_push($mainData, db::query("SELECT news_title FROM updatenews WHERE daystr = 'saturday'"));
    array_push($mainData, db::query("SELECT news_title FROM updatenews WHERE daystr = 'sunday'"));
  }
  private function handleArticles(pageData &$pd) {
      $articleData = db::query("SELECT * FROM updatenews WHERE news_id = '$pd->pageTitle'");
      if (count($articleData) == 1)
        $articleData = $articleData[0];

      // passing articleData for because shared page "default2.php" use pageData structure
      $pd->pageId = $articleData["news_id"];
      $pd->pageTitle = $articleData["news_title"];
      $pd->pageDescription = $articleData["description"];
      $pd->pageKeywords = $articleData["keywords"];
      \envCenter::loadFile("view/header/default2.php", $pd);
      \envCenter::loadFile("/view/newsArticle/article-layout.php", $articleData);
  }
  private function handleMainContent(requestUrlHandler &$ruH, pageData &$pd) {
    $pageId = $pd->pageId;
    $mainData = [];

    // handle home page here 
    if ($ruH->getHomePath() != "") {
      $this->setNewsTitleAllDays($mainData);
      \envCenter::loadFile($ruH->getHomePath(), $mainData);
      return;
    }
    if ($ruH->getErrorPath() != "") {
      \envCenter::loadFile($ruH->getErrorPath());
      return;
    }
    if ($pd->getIsDynamicArticle() == true) {
      $this->handleArticles($pd);
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
  public function loadPage(requestUrlHandler &$ru) {
    $pagedata = new pageData();
    $pagedata->setPageData($ru->getLastRequestUrlStrOnly(), function (&$pageList) {
      // add additional internal page id here
      // ex. array_push($pageList, ["HME-1", "home"]);
    });

    // initialize page head data if the page is dynamic article
    $ru->setDynamicArticlesHeadData($pagedata);

    // load header file if page is not article
    if ($pagedata->getIsDynamicArticle() == false)
      \envCenter::loadFile("view/header/default2.php", $pagedata);

    $this->handleMainContent($ru, $pagedata);

    // load footer file
    \envCenter::loadFile("view/footer.php");
  }
}
class viewController {
  public function handleRequest() {
    $ruH = new requestUrlHandler();
    if ($ruH->isHomePage()) {
      $ruH->setHomePath($ruH->getDefaultViewDirectory() . "/home.php");
    }
    if (!$ruH->isRequestUrlPathEqualFile()) {
      $ruH->setErrorPath($ruH->getDefaultViewDirectory() . "/errorview/notfound.php");
    }
    $pageloader = new pageLoader();
    $pageloader->loadPage($ruH);
  }
}
