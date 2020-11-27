<?php
namespace classes\pages;
use classes\dataStorage\tableData\tableData;

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

        public function __construct() {
          // Data Initialization //
          $this->updateTableData();
          $this->assignDayTable();
          $this->urlPath = $_SERVER["REQUEST_URI"];
          $this->addMetaList();

          switch ($this->urlPath) {
            case '/':
              $this->get('/', 'home', function() {
                return "home";
              });
              break;
            
            case '/about':
              $this->get('/about', 'about', function() {
                return "about";
              });
              break;

            case '/news':
              $this->get('/news', 'news', function() {
                return "news";
              });
              break;

          // for ($i = 0; $i < count($this->MonTitleURL); $i++)
          // {
          //   if ($this->urlPath == $this->MonTitleURL[$i][0])
          //   {
          //      $this->get("/".$this->MonTitleURL[$i][0], $this->MonTitleURL[$i][0], function() {
          //        return $this->MonTitleURL[0][0];
          //      });
          //   }
          // }
            // if ($this->urlPath == "/test")
            // {
            //    $this->get("/aboutUs", "about", function() {
            //      return "about-us";
            //    });
            // }
            default:
            $this->createheader("error");
            require_once $_SERVER['DOCUMENT_ROOT']."/gamestation/view/errorview/notfound.php";
            $this->createfooter();
            break;
          }
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
    }
?>