<?php
namespace classes\pages;
require_once $_SERVER['DOCUMENT_ROOT'].'/gamestation/classes/pages/view.php';
require_once $_SERVER['DOCUMENT_ROOT'] .'/gamestation/env.php';
    class index extends view {
        public $priority;
        public $urlPath;
        protected $metaList;

        public function __construct() {
          $this->urlPath = $_SERVER["REQUEST_URI"];
          $this->addMetaList();
          switch ($this->urlPath) {
            case '/':
              $this->get('/', 'home', function() {
                return "home";
              });
              break;
            
            case '/aboutUs':
              $this->get('/aboutUs', 'about', function() {
                return "about-us";
              });
              break;

            case '/news':
              $this->get('/news', 'news', function() {
                return "news";
              });
              break;

            case '/subpage':
              $this->get('/subpage', function() {
                return "subpage";
              });
              break;
            
            default:
            $this->createheader('home');
            require_once $_SERVER['DOCUMENT_ROOT']."/gamestation/view/errorview/notfound.php";
            $this->createfooter();
            break;
          }
        }
        
        public function get($pathName, $headPage = 'home', $callback) {
              if ($this->urlPath == $pathName) {
              $this->createheader($headPage, $this->metaList);
              require_once $_SERVER['DOCUMENT_ROOT']."/gamestation/view/".$callback().".php";
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
    }
?>