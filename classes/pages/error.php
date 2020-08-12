<?php
namespace classes\pages;
require_once $_SERVER['DOCUMENT_ROOT'].'/gamestation/classes/pages/controller.php';
    class CustomError extends controller {
        function __construct() {
            $file = $_SERVER['DOCUMENT_ROOT'].'/gamestation/view/errorview/notfound.php';
            $this->createheader('error');
            if (file_exists($file)) {
                require_once($file);
            };
            $this->createfooter();
        }
    }
?>