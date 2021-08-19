<?php
namespace classes\pages;

use classes\data\datacenter;

require_once $_SERVER['DOCUMENT_ROOT'].'/gamestation/classes/pages/controller.php';
    class CustomError extends controller {
        public function __construct(datacenter $dblogin) {
            parent::__construct($dblogin);
        }
    }
?>