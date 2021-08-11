<?php
namespace classes\pages;

use classes\data\datacenter;

require_once $_SERVER['DOCUMENT_ROOT'].'/gamestation/classes/pages/controller.php';
    class CustomError extends controller {
        public function __construct(datacenter $dblogin) {
            parent::__construct($dblogin);
            $file = $_SERVER['DOCUMENT_ROOT'].'/gamestation/view/errorview/notfound.php';
            $this->createheader('error');
            if (file_exists($file)) {
                require_once($file);
            };
            $this->createfooter();
        }
    }
?>