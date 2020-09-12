<?php
namespace classes\pages;
require_once $_SERVER['DOCUMENT_ROOT'].'/gamestation/classes/pages/view.php';
    class index extends view {
        public $priority;

        public function __construct() {
          if (isset($_GET['url'])) {
          switch ('/'.$_GET['url']) {
            case '/':
              $this->get('/', function() {
                return "home";
              });
              break;
            
            case '/aboutUs':
              $this->get('/aboutUs', function() {
                return "about-us";
              });
              break;

            case '/news':
              $this->get('/aboutUs', function() {
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
        else {
          $this->createheader('home');
          require_once $_SERVER['DOCUMENT_ROOT']."/gamestation/view/home.php";
          $this->createfooter();
        }
        }
        
        public function get($pathName, $callback) {
          if (isset($_GET['url'])) {
            if ("/".$_GET['url']  == $pathName) {
              $this->createheader('home');
              require_once $_SERVER['DOCUMENT_ROOT']."/gamestation/view/".$callback().".php";
              $this->createfooter();
            } 
            }
            else {
                return ;
            }
        }
    }
?>