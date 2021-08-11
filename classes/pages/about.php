<?php
namespace classes\pages;

use classes\data\datacenter;

require_once $_SERVER['DOCUMENT_ROOT'].'/gamestation/classes/pages/error.php';
    class about extends CustomError{
        public $priority;

        public function __construct($subpath = '',$firstpage = TRUE, $dblogin) {
          parent::__construct($dblogin);
          if ($firstpage) {
           $this->createheader('about-us');
           $this->createfooter();
          } else {
            $this->createheader('about-us');
            $file = $_SERVER['DOCUMENT_ROOT'].'/gamestation/view/sub/'.$subpath.'.php';
            $error_file = "controller/error.php";
            if (file_exists($file)) {
            require_once($_SERVER['DOCUMENT_ROOT'].'/gamestation/view/sub/'.$subpath.'.php');
           } else {
             require_once($error_file);
             $controller = new CustomError($this->dbloginp);
           }
            $this->createfooter();
          }
        } 
    }
?>