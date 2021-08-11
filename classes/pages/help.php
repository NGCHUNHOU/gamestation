<?php
namespace classes\pages;

use classes\data\datacenter;

require_once $_SERVER['DOCUMENT_ROOT'].'/gamestation/classes/pages/about.php';
    class help extends about {
        public function other() {
            $this->createheader('helper');
            echo 'other page';
            $this->createfooter();
        }
        public function __construct(datacenter $dblogin)
        {
            parent::__construct('', TRUE, $dblogin);
        }
    }
?>