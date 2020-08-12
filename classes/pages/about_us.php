<?php
namespace classes\pages;
require_once $_SERVER['DOCUMENT_ROOT'].'/gamestation/classes/pages/error.php';
    class about_us extends CustomError{
        public $priority;

        public function __construct($subpath = '',$firstpage = TRUE) {
           $url = explode('/', $_GET['url']);
          if ($firstpage) {
           $this->createheader('about-us');
           require_once($_SERVER['DOCUMENT_ROOT'].'/gamestation/view/about-us.php');
           $this->createfooter();
          } else {
            $this->createheader('about-us');
            $file = $_SERVER['DOCUMENT_ROOT'].'/gamestation/view/sub/'.$subpath.'.php';
            $error_file = "controller/error.php";
            if (file_exists($file)) {
            require_once($_SERVER['DOCUMENT_ROOT'].'/gamestation/view/sub/'.$subpath.'.php');
           } else {
             require_once($error_file);
             $controller = new CustomError();
           }
            $this->createfooter();
          }
        } 
    }
?>