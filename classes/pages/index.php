<?php
namespace classes\pages;
use classes\dataStorage\tableData\tableData;
use Exception;

require_once $_SERVER['DOCUMENT_ROOT'].'/gamestation/classes/pages/view.php';
require_once $_SERVER['DOCUMENT_ROOT'] .'/gamestation/env.php';
    class index extends view {
        public $priority;
        public $urlPath;
        protected $metaList;
        public $monday_list;
        public $tuesday_list;
        public $wednesday_list;
        public $thursday_list;
        public $friday_list;
        public $saturday_list;
        public $sunday_list;
        public $pathList;
        public $pageList;
        public $newList;

        public function __construct() {
          // Data Initialization //
          $this->updateTableData();
          $this->assignDayTable();
          $this->urlPath = $_SERVER["REQUEST_URI"];
          $this->addMetaList();
          $this->fillupNewsLinkTable();

          // switch ($this->urlPath) {
          //   case '/':
          //     $this->get('/', 'home', function() {
          //       return "home";
          //     });
          //     break;
            
          //   case '/about':
          //     $this->get('/about', 'about', function() {
          //       return "about";
          //     });
          //     break;

          //   case '/news':
          //     $this->get('/news', 'news', function() {
          //       return "news";
          //     });
          //     break;

          //   case '/news/article/2020-top-100-cpu-latest-ranking-chart':
          //     $this->get('/news', 'news', function() {
          //       echo $this->rewriteNewsTitleUrl($this->ListTable['monday'][0]['news_title']) == '2020-top-100-cpu-latest-ranking-chart' ? "true" : "wrong";
          //       return "newsArticle/2020-top-cpu-latest-ranking-chart";
          //     });
          //     break;

          //   default:
          //   $this->createheader("error");
          //   require_once $_SERVER['DOCUMENT_ROOT']."/gamestation/view/errorview/notfound.php";
          //   $this->createfooter();
          //   break;
          // }

            for ($i=0; $i < count($this->pathList); $i++) { 
                $this->get(
                    '/'.$this->pathList[$i],
                    $this->pageList[$i],
                    function()
                    {
                      for ($i=0; $i < count($this->pathList); $i++) { 
                        if ('/'.$this->pathList[$i] == $this->urlPath)
                        {
                          return $this->pageList[$i];
                        }
                      }
                      // return error page if page not found
                      $this->createheader("error");
                      return "errorview/notfound";
                      $this->createfooter();
                    }
                  );
            }
            // loading article content
            $this->createArticleContent();
            
        }
        
        public function get($pathName, $headPage = 'home', $callback) {
              // if ($this->urlPath == $pathName) {
              $this->createheader($headPage, $this->metaList);
              require_once $_SERVER['DOCUMENT_ROOT']."/gamestation/view/".$callback().".php";
              echo "<script type='text/javascript' src= /gamestation/view/assets/js/dist/bundle.js></script>";
              // echo "<script type='text/javascript' src='./view/assets/js/$includeJsName.js'></script>";
              $this->createfooter();
            // } else
            // {
            //   throw new \Exception("Failed loading page", 1);
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
        protected function fillupNewsLinkTable()
        {
          $this->pathList = ['', 'about', 'news'];
          $this->pageList = ['home', 'about', 'news'];
          $this->newList = [];
          for ($i = 0; $i < count($this->ListTable['monday']); $i++) {
            array_push($this->newList, 'news/article/'.$this->rewriteNewsTitleUrl($this->ListTable['monday'][$i]['news_title']));
            array_push($this->pageList, 'newsArticle/'.$this->rewriteNewsTitleUrl($this->ListTable['monday'][$i]['news_title']));
          }
          for ($i = 0; $i < count($this->ListTable['tuesday']); $i++) {
            array_push($this->newList, 'news/article/'.$this->rewriteNewsTitleUrl($this->ListTable['tuesday'][$i]['news_title']));
            array_push($this->pageList, 'newsArticle/'.$this->rewriteNewsTitleUrl($this->ListTable['tuesday'][$i]['news_title']));
          }
          for ($i = 0; $i < count($this->ListTable['wednesday']); $i++) {
            array_push($this->newList, 'news/article/'.$this->rewriteNewsTitleUrl($this->ListTable['wednesday'][$i]['news_title']));
            array_push($this->pageList, 'newsArticle/'.$this->rewriteNewsTitleUrl($this->ListTable['wednesday'][$i]['news_title']));
          }
          for ($i = 0; $i < count($this->ListTable['thursday']); $i++) {
            array_push($this->newList, 'news/article/'.$this->rewriteNewsTitleUrl($this->ListTable['thursday'][$i]['news_title']));
            array_push($this->pageList, 'newsArticle/'.$this->rewriteNewsTitleUrl($this->ListTable['thursday'][$i]['news_title']));
          }
          for ($i = 0; $i < count($this->ListTable['friday']); $i++) {
            array_push($this->newList, 'news/article/'.$this->rewriteNewsTitleUrl($this->ListTable['friday'][$i]['news_title']));
            array_push($this->pageList, 'newsArticle/'.$this->rewriteNewsTitleUrl($this->ListTable['friday'][$i]['news_title']));
          }
          for ($i = 0; $i < count($this->ListTable['saturday']); $i++) {
            array_push($this->newList, 'news/article/'.$this->rewriteNewsTitleUrl($this->ListTable['saturday'][$i]['news_title']));
            array_push($this->pageList, 'newsArticle/'.$this->rewriteNewsTitleUrl($this->ListTable['saturday'][$i]['news_title']));
          }
          for ($i = 0; $i < count($this->ListTable['sunday']); $i++) {
            array_push($this->newList, 'news/article/'.$this->rewriteNewsTitleUrl($this->ListTable['sunday'][$i]['news_title']));
            array_push($this->pageList, 'newsArticle/'.$this->rewriteNewsTitleUrl($this->ListTable['sunday'][$i]['news_title']));
          }
          $this->pathList = array_merge($this->pathList, $this->newList);
        }

        // Generate News Template 
        protected function makeNewsTemplate($day)
        {
              for ($i = 0; $i < count($this->ListTable[$day]); $i++) {
                file_put_contents($this->rewriteNewsTitleUrl($this->ListTable[$day][$i]['news_title']),
                 " 
                  <div class='container'>
                  <div class='row'>
                      <div class='col-box pt-2'>
                          <div class='col-md-12 style-box'>
                 "
                    . 
                    $this->ListTable[$day][$i]['news_title']
                    .
                  "
                        </div>
                    </div>
                  </div>
                  </div>
                  ");
                rename($this->rewriteNewsTitleUrl($this->ListTable[$day][$i]['news_title']), $_SERVER['DOCUMENT_ROOT']."/gamestation/view/newsArticle/".$this->rewriteNewsTitleUrl($this->ListTable[$day][$i]['news_title']).".php");
              }
        }

        public function createArticleContent()
        {
            // loading article content
            if ($_SERVER['REQUEST_URI'] == '/news')
            {
              $this->makeNewsTemplate("monday");
              $this->makeNewsTemplate("tuesday");
              $this->makeNewsTemplate("wednesday");
              $this->makeNewsTemplate("thursday");
              $this->makeNewsTemplate("friday");
              $this->makeNewsTemplate("saturday");
              $this->makeNewsTemplate("sunday");
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
              //   rename($this->rewriteNewsTitleUrl($this->ListTable['tuesday'][$i]['news_title']), $_SERVER['DOCUMENT_ROOT']."/gamestation/view/newsArticle/".$this->rewriteNewsTitleUrl($this->ListTable['tuesday'][$i]['news_title']).".php");
              // }
            }
        }
    }

?>