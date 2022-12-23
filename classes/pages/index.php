<?php
namespace classes\pages;

use classes;
use classes\data\datacenter;
use classes\dataStorage\dataStorage;
use classes\dataStorage\tableData\tableData;
use classes\guidecardframe;
use Exception;

require_once $_SERVER['DOCUMENT_ROOT'].'/classes/pages/view.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/classes/guidecardframe.php';
require_once $_SERVER['DOCUMENT_ROOT'] .'/envCenter.php';
    class index extends view {
        public $priority;
        public $urlPath;
        public $errorcount;
        protected $metaList;
        public $monday_list;
        public $tuesday_list;
        public $wednesday_list;
        public $thursday_list;
        public $friday_list;
        public $saturday_list;
        public $sunday_list;
        public $newList;

        public function __construct(datacenter $dc) {
          parent::__construct($dc);
          // Data Initialization //
          $this->updateTableData($dc);
          $this->assignDayTable();
          $this->urlPath = $_SERVER["REQUEST_URI"];
          $dc->urlPath = $_SERVER["REQUEST_URI"];
          $this->addMetaList();
          $this->fillupNewsLinkTable($dc);
          // append forward slash to every path value at the start position
          for ($i=0; $i < count($dc->pathList); $i++) { 
             array_push($dc->pathListSlash, "/".$dc->pathList[$i]);  
          }
          for ($i=0; $i < count($dc->extraPages); $i++) { 
             array_push($dc->pathListSlash, "/".$dc->extraPages[$i]);  
          }
          $dc->articleDaySet[0]=$dc->days;
          for ($i=0;$i<count($this->ListTable[$dc->articleDaySet[0][0]]);$i++)
          {
            array_push($dc->articleDaySet[1][0], $this->ListTable[$dc->articleDaySet[0][0]][$i]["news_id"]);
          }
          $dc->defaulthead1 = $_SERVER['DOCUMENT_ROOT'].'/view/header/default1.php';
          $dc->defaulthead2 = $_SERVER['DOCUMENT_ROOT'].'/view/header/default2.php';
          $this->generateCardContent($dc);
          $dc->guideCardTitle = $this->cardtitle;
          $dc->guideCardDesciption = $this->carddescription;
          $dc->guideCardContent = $this->cardcontent;
          $dc->guideSize = $this->guideSum;
          $dc->guideImage = $this->guideImg;

          $this->get(
              $dc->pathListSlash,
              $dc->pageList, 
              $dc->pageList,
              $dc
            );
        }
        public function findPageDataset($search, $day, $matchlist = array())
        {
          // iterating dataset based on user input url to find page content 
          $userinputurl = $matchlist;
          // $dataset = $this->ListTable[$day];
          $daylist = array("monday", "tuesday", "wednesday", "thursday", "friday", "saturday", "sunday");
          $dataset = array();
          $targetlist = array(); 
          for ($i = 0; $i < count($this->ListTable['monday']); $i++) {
            array_push($dataset, $this->rewriteNewsTitleUrl($this->ListTable['monday'][$i]));
          }
          for ($i = 0; $i < count($this->ListTable['tuesday']); $i++) {
            array_push($dataset, $this->rewriteNewsTitleUrl($this->ListTable['tuesday'][$i]));
          }
          for ($i = 0; $i < count($this->ListTable['wednesday']); $i++) {
            array_push($dataset, $this->rewriteNewsTitleUrl($this->ListTable['wednesday'][$i]));
          }
          for ($i = 0; $i < count($this->ListTable['thursday']); $i++) {
            array_push($dataset, $this->rewriteNewsTitleUrl($this->ListTable['thursday'][$i]));
          }
          for ($i = 0; $i < count($this->ListTable['friday']); $i++) {
            array_push($dataset, $this->rewriteNewsTitleUrl($this->ListTable['friday'][$i]));
          }
          for ($i = 0; $i < count($this->ListTable['saturday']); $i++) {
            array_push($dataset, $this->rewriteNewsTitleUrl($this->ListTable['saturday'][$i]));
          }
          for ($i = 0; $i < count($this->ListTable['sunday']); $i++) {
            array_push($dataset, $this->rewriteNewsTitleUrl($this->ListTable['sunday'][$i]));
          }
          for($i=0;$i<count($userinputurl);$i++)
          {
            if ($search==$userinputurl[$i])
            {
              $targetlist = $dataset[$i];
            }
          }
          return $targetlist;
        }
        // public function get($pathName, $headPage = 'home', $callback) {
        //       if ($this->urlPath == $pathName) {
        //       $this->createheader($headPage, $this->metaList);
        //       require_once $_SERVER['DOCUMENT_ROOT']."/view/".$callback().".php";
              // echo "<script type='text/javascript' src='./view/assets/js/$includeJsName.js'></script>";
              // echo "<script type='text/javascript' src=/view/assets/js/dist/bundle.js></script>";
              // $this->createfooter();
            // }
            // else
            // {
            //   return 0;
            // }
        // }
        public function get($pathList, $headPage = 'home', $pagename, datacenter $dc) {
              for ($i=0; $i < count($pathList); $i++) { 
                if ($this->urlPath == $pathList[$i]) {
                  $this->createheader($headPage[$i], $this->metaList);
                  require_once $_SERVER['DOCUMENT_ROOT']."/view/".$pagename[$i].".php";
                  echo "<script type='text/javascript' src=/view/assets/js/dist/bundle.js></script>";
                  $this->createfooter();
                } else {
                  $this->errorcount += 1;
                }
              }
                $pageDataSet = array();
              for ($i = 0; $i < count($this->ListTable['monday']); $i++) {
                array_push($pageDataSet, '/news/article/'.$this->rewriteNewsTitleUrl($this->ListTable['monday'][$i]['news_title']));
              }
              for ($i = 0; $i < count($this->ListTable['tuesday']); $i++) {
                array_push($pageDataSet, '/news/article/'.$this->rewriteNewsTitleUrl($this->ListTable['tuesday'][$i]['news_title']));
              }
              for ($i = 0; $i < count($this->ListTable['wednesday']); $i++) {
                array_push($pageDataSet, '/news/article/'.$this->rewriteNewsTitleUrl($this->ListTable['wednesday'][$i]['news_title']));
              }
              for ($i = 0; $i < count($this->ListTable['thursday']); $i++) {
                array_push($pageDataSet, '/news/article/'.$this->rewriteNewsTitleUrl($this->ListTable['thursday'][$i]['news_title']));
              }
              for ($i = 0; $i < count($this->ListTable['friday']); $i++) {
                array_push($pageDataSet, '/news/article/'.$this->rewriteNewsTitleUrl($this->ListTable['friday'][$i]['news_title']));
              }
              for ($i = 0; $i < count($this->ListTable['saturday']); $i++) {
                array_push($pageDataSet, '/news/article/'.$this->rewriteNewsTitleUrl($this->ListTable['saturday'][$i]['news_title']));
              }
              for ($i = 0; $i < count($this->ListTable['sunday']); $i++) {
                array_push($pageDataSet, '/news/article/'.$this->rewriteNewsTitleUrl($this->ListTable['sunday'][$i]['news_title']));
              }
              for ($i = 0; $i < count($pageDataSet); $i++) {
                if ($this->urlPath == $pageDataSet[$i])
                {
                  $this->errorcount -= 1;
                  $PageContent = $this->findPageDataset($this->urlPath, "monday", $pageDataSet);
                  require_once $_SERVER['DOCUMENT_ROOT']."/view/news/article.php";
                  echo "<script type='text/javascript' src=/view/assets/js/dist/bundle.js></script>";
                }
              }
              $guideDataSet = array();
              for ($i = 0; $i < count($dc->guideCardTitle); $i++) {
                array_push($guideDataSet, '/guides/'.$this->rewriteNewsTitleUrl($dc->guideCardTitle[$i]));
              }
              for ($i = 0; $i < count($guideDataSet); $i++) {
                if ($this->urlPath == $guideDataSet[$i])
                {
                  $this->errorcount -= 1;
                  $GuideTitle = $dc->guideCardTitle[$i];
                  $GuideDescription = $dc->guideCardDesciption[$i];
                  $GuideContent = $dc->guideCardContent[$i];
                  $GuideImage = $dc->guideImage[$i];
                  require_once $_SERVER['DOCUMENT_ROOT']."/view/guides/guidecontent.php";
                  echo "<script type='text/javascript' src=/view/assets/js/dist/bundle.js></script>";
                }
              }
              // print_r($pageDataSet);
              // print_r($this->ListTable['monday']);
              if ($this->errorcount == count($pathList))
              {
                  $this->createheader("error");
                  require_once $_SERVER['DOCUMENT_ROOT']."/view/"."errorview/notfound".".php";
                  $this->createfooter();
              }
            //   if ($this->urlPath == $pathName) {
            //   $this->createheader($headPage, $this->metaList);
            //   require_once $_SERVER['DOCUMENT_ROOT']."/view/".$pagename.".php";
            //   // echo "<script type='text/javascript' src='./view/assets/js/$includeJsName.js'></script>";
            //   echo "<script type='text/javascript' src=/view/assets/js/dist/bundle.js></script>";
            //   $this->createfooter();
            // }
            // else
            // {
            //   return 0;
            // }
        }
        protected function addMetaList()
        {
          $this->metaList = array(
            "home_description" => $this->get_siteinfo('description', 'home'), 
            "home_keyword" => $this->get_siteinfo('keywords', 'home'),
            "home_author" => $this->get_siteinfo('author', 'home'),
            "aboutUs_description" => $this->get_siteinfo('description', 'about-us'),
            "aboutUs_keyword" => $this->get_siteinfo('keywords', 'about-us'),
            "aboutUs_author" => $this->get_siteinfo('author', 'about-us'),
            "news_description" => $this->get_siteinfo('description', 'home'),
            "news_keyword" => $this->get_siteinfo('keywords', 'home'),
            "news_author" => $this->get_siteinfo('author', 'home')
          );
        }

        protected function assignDayTable()
        {
          $this->monday_list = $this->ListTable['monday'];
          $this->tuesday_list = $this->ListTable['tuesday'];
          $this->wednesday_list = $this->ListTable['wednesday'];
          $this->thursday_list = $this->ListTable['thursday'];
          $this->friday_list = $this->ListTable['friday'];
          $this->saturday_list = $this->ListTable['saturday'];
          $this->sunday_list = $this->ListTable['sunday'];
        }
        
        // Prepare all news links for news article setup
        protected function fillupNewsLinkTable(datacenter $dc)
        {
          $dc->pathList = ['', 'about', 'news', 'guides', 'guides/guide1'];
          $dc->pageList = ['home', 'about', 'news', 'guides', 'guides/guide1'];
          $this->newList = [];
          // for ($i = 0; $i < count($this->ListTable['monday']); $i++) {
          //   array_push($this->newList, 'news/article/'.$this->rewriteNewsTitleUrl($this->ListTable['monday'][$i]['news_title']));
          //   array_push($dc->pageList, 'newsArticle/'.$this->rewriteNewsTitleUrl($this->ListTable['monday'][$i]['news_title']));
          // }
          // for ($i = 0; $i < count($this->ListTable['tuesday']); $i++) {
          //   array_push($this->newList, 'news/article/'.$this->rewriteNewsTitleUrl($this->ListTable['tuesday'][$i]['news_title']));
          //   array_push($dc->pageList, 'newsArticle/'.$this->rewriteNewsTitleUrl($this->ListTable['tuesday'][$i]['news_title']));
          // }
          // for ($i = 0; $i < count($this->ListTable['wednesday']); $i++) {
          //   array_push($this->newList, 'news/article/'.$this->rewriteNewsTitleUrl($this->ListTable['wednesday'][$i]['news_title']));
          //   array_push($dc->pageList, 'newsArticle/'.$this->rewriteNewsTitleUrl($this->ListTable['wednesday'][$i]['news_title']));
          // }
          // for ($i = 0; $i < count($this->ListTable['thursday']); $i++) {
          //   array_push($this->newList, 'news/article/'.$this->rewriteNewsTitleUrl($this->ListTable['thursday'][$i]['news_title']));
          //   array_push($dc->pageList, 'newsArticle/'.$this->rewriteNewsTitleUrl($this->ListTable['thursday'][$i]['news_title']));
          // }
          // for ($i = 0; $i < count($this->ListTable['friday']); $i++) {
          //   array_push($this->newList, 'news/article/'.$this->rewriteNewsTitleUrl($this->ListTable['friday'][$i]['news_title']));
          //   array_push($dc->pageList, 'newsArticle/'.$this->rewriteNewsTitleUrl($this->ListTable['friday'][$i]['news_title']));
          // }
          // for ($i = 0; $i < count($this->ListTable['saturday']); $i++) {
          //   array_push($this->newList, 'news/article/'.$this->rewriteNewsTitleUrl($this->ListTable['saturday'][$i]['news_title']));
          //   array_push($dc->pageList, 'newsArticle/'.$this->rewriteNewsTitleUrl($this->ListTable['saturday'][$i]['news_title']));
          // }
          // for ($i = 0; $i < count($this->ListTable['sunday']); $i++) {
          //   array_push($this->newList, 'news/article/'.$this->rewriteNewsTitleUrl($this->ListTable['sunday'][$i]['news_title']));
          //   array_push($dc->pageList, 'newsArticle/'.$this->rewriteNewsTitleUrl($this->ListTable['sunday'][$i]['news_title']));
          // }
          $dc->pathList = array_merge($dc->pathList, $this->newList);
        }

        // Generate News Template 
        // protected function makeNewsTemplate($day)
        // {
        //       for ($i = 0; $i < count($this->ListTable[$day]); $i++) {
        //         file_put_contents($this->rewriteNewsTitleUrl($this->ListTable[$day][$i]['news_title']),
        //          "
        //          <head>
        //           <title>" . ucfirst($this->ListTable[$day][$i]['news_title']) . "</title>
        //           <link rel='icon' type='image/png' href='/view/assets/images/meteor-light-resized.svg' size='16x16'>
        //           <script type='text/javascript' src='/view/assets/js/jquery-3.4.1.min.js'></script>
        //           <link rel='stylesheet' href='/view/assets/css/bootstrap.min.css'>
        //           <link rel='stylesheet' href='/view/assets/css/main.css'>
        //           <script type='text/javascript' src='/view/assets/js/bootstrap.min.js'></script>
        //           <script type='text/javascript' src='/node_modules/animejs/lib/anime.min.js'></script>
        //         </head>
        //         <header>
        //             <div class='container-fluid'>
        //             <div class='row'>
        //                 <div class='col-md-12 rem-pad'>
        //                     <div class='navbar navbar-expand-md navbar-dark bg-logo'>
        //                         <div class='logo navbar-brand'><img rel='preload' src='/view/assets/images/meteor-light-resized.svg' alt='logo' width='32'></div>
        //                         <button class='navbar-toggler' data-toggle='collapse' data-target='#headerlist'>
        //                             <span class='navbar-toggler-icon'></span>
        //                         </button>
        //                         <div class='collapse navbar-collapse' id='headerlist'>
        //                         <ul class='navbar-nav header-list' data-iscapitailse='true'>
        //                             <li class='nav-item'>
        //                                 <a class='nav-link' href='/gamestation' target='_self'>HOME</a>
        //                             </li>
        //                             <li class='nav-item'>
        //                                 <a class='nav-link' href='/about' target='_self'>ABOUT US</a>
        //                             </li>
        //                             <li class='nav-item'>
        //                                 <a class='nav-link' href='/news' target='_self'>NEWS</a>
        //                             </li>
        //                         </ul>
        //                         </div>
        //                     </div>
        //                 </div>
        //             </div>
        //           </div>
        //         </header>
        //           <div class='container'>
        //             <div class='row'>
        //                     <div class='col-md-12 mainHeading'>
        //           "
        //               . 
        //               '<h3>'. ucfirst($this->ListTable[$day][$i]['news_title']) . '</h3>'
        //               .
        //             "
        //                   </div>
        //             </div>
        //             <div class='row'>
        //               <div class='col-12 mt-4 mb-4'>
        //             "
        //               .
        //                "<img srcset=".$this->ListTable[$day][$i]['imgNews_content']. " class='article-img' alt='article image'> 
        //                "
        //               .
        //             "
        //               </div>
        //             </div>
        //             <div class='row'>
        //               <div class='col-10 col-md-10 col-lg-8 card' style='padding: 15px; margin: 15px;'>
        //                 <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        //               </div>
        //             </div>
        //           </div>
        //           ");
                // Moving news articles into newsArticle directory
        //         rename($this->rewriteNewsTitleUrl($this->ListTable[$day][$i]['news_title']), $_SERVER['DOCUMENT_ROOT']."/view/newsArticle/".$this->rewriteNewsTitleUrl($this->ListTable[$day][$i]['news_title']).".php");
        //       }
        // }

        // public function createArticleContent()
        // {
        //     // loading article content
        //     if ($_SERVER['REQUEST_URI'] == '/news')
        //     {
        //       $this->makeNewsTemplate("monday");
        //       $this->makeNewsTemplate("tuesday");
        //       $this->makeNewsTemplate("wednesday");
        //       $this->makeNewsTemplate("thursday");
        //       $this->makeNewsTemplate("friday");
        //       $this->makeNewsTemplate("saturday");
        //       $this->makeNewsTemplate("sunday");
              // for ($i = 0; $i < count($this->ListTable['tuesday']); $i++) {
              //   // fopen($this->rewriteNewsTitleUrl($this->ListTable['tuesday'][$i]['news_title']), "w");
              //   file_put_contents($this->rewriteNewsTitleUrl($this->ListTable['tuesday'][$i]['news_title']),
              //    " 
              //     <div class='container'>
              //     <div class='row'>
              //         <div class='col-box pt-2'>
              //             <div class='col-md-12 style-box'>
              //    "
              //       . 
              //       $this->ListTable['tuesday'][$i]['news_title']
              //       .
              //     "
              //           </div>
              //       </div>
              //     </div>
              //     </div>
              //    ");
              //   rename($this->rewriteNewsTitleUrl($this->ListTable['tuesday'][$i]['news_title']), $_SERVER['DOCUMENT_ROOT']."/view/newsArticle/".$this->rewriteNewsTitleUrl($this->ListTable['tuesday'][$i]['news_title']).".php");
              // }
        //     }
        // }
    }

    class requestUrlHandler {
      private $queryString = "";
      private $requestUrlPath = "";
      private $isRequestUrlOk = false;
      public function setRequestUrlPath() {
        $this->requestUrlPath = $_SERVER["REQUEST_URI"];
      }

      // client must request pathName that is absolutely same to fileName
      public function isRequestUrlPathEqualFile() {
        $url = \envCenter::getRequestURI();
        if (!file_exists(\envCenter::getRequestURI())) {
          return false;
        }
        $this->isRequestUrlOk = true;
        $this->setRequestUrlPath(\envCenter::getRequestURI());
        return true;
      }
      public function addQueryString() {}
    }

    class viewController {
      public function setPage() {}
      public function getPage() {}
      public function handleRequest() {
        $ruH = new requestUrlHandler();
        if ($ruH->isRequestUrlPathEqualFile())
          $ruH->setRequestUrlPath();
      }
      private function getRequestUrlPath() {}
    }

?>