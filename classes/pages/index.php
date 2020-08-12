<?php
namespace classes\pages;
require_once $_SERVER['DOCUMENT_ROOT'].'/gamestation/classes/pages/view.php';
    class index extends view {
        public $priority;

        public function __construct() {
          $this->get('/', function()
          {
            $this->createheader('home');
            require_once $_SERVER['DOCUMENT_ROOT'].'/gamestation/view/home.php';
            $this->createfooter();
          });

          $this->get('/subpage', function()
          {
            $this->createheader('home');
            require_once $_SERVER['DOCUMENT_ROOT'].'/gamestation/view/subpage.php';
            $this->createfooter();
          });

        }
        
        public function get($pathName, $callback) {
          if (isset($_GET['url'])) {
            if ("/".$_GET['url']  == $pathName) {
                $callback();
            } 
            if ("/".$_GET['url']  !== $pathName AND "/". $_GET['url'] !== "/" AND $pathName !== "/") {
                $this->createheader('home');
                require_once( $_SERVER['DOCUMENT_ROOT'] .'/gamestation/view/errorview/notfound.php');
                $this->createfooter();
            }
          }
          elseif ($pathName == "/") {
              $callback();
          }
          else {
              return ;
          }
        }
    }
?>