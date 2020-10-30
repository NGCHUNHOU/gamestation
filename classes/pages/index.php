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
          $this->updateTableData();
          $this->assignDayTable();

          $this->urlPath = $_SERVER["REQUEST_URI"];
          $this->addMetaList();
          switch ($this->urlPath) {
            case '/':
              $this->get('/', 'home', 'custom', function() {
                return "home";
              });
              break;
            
            case '/aboutUs':
              $this->get('/aboutUs', 'about', 'aboutUs', function() {
                return "about-us";
              });
              break;

            case '/news':
              $this->get('/news', 'news', 'news', function() {
                return "news";
              });
              break;
            
            default:
            $this->createheader("error");
            require_once $_SERVER['DOCUMENT_ROOT']."/gamestation/view/errorview/notfound.php";
            $this->createfooter();
            break;
          }
        }
        
        public function get($pathName, $headPage = 'home', $includeJsName, $callback) {
              if ($this->urlPath == $pathName) {
              $this->createheader($headPage, $this->metaList);
              require_once $_SERVER['DOCUMENT_ROOT']."/gamestation/view/".$callback().".php";
              echo "<script type='text/javascript' src='./view/assets/js/$includeJsName.js'></script>";
              $this->createfooter();
            } else
            {
              throw new \Exception("Failed loading page", 1);
            }
        }
        private function addMetaList()
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

        private function assignDayTable()
        {
          $this->monday_list = $this->ListTable['monday'];
          $this->tuesday_list = $this->ListTable['tuesday'];
        }
    }
?>