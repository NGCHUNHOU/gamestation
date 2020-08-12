<?php
namespace classes\pages;
require_once $_SERVER['DOCUMENT_ROOT'].'/gamestation/classes/pages/about_us.php';
    class help extends about_us {
        public function other() {
            $this->createheader('helper');
            echo 'other page';
            $this->createfooter();
        }
    }
?>