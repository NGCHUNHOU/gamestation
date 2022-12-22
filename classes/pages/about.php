<?php
namespace classes\pages;

use classes\data\datacenter;

require_once $_SERVER['DOCUMENT_ROOT'].'/classes/pages/error.php';
    class about extends CustomError{
        public $priority;

        public function __construct($subpath = '',$firstpage = TRUE, $dblogin) {
          parent::__construct($dblogin);
        }
    }
?>