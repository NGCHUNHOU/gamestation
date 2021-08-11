<?php
namespace classes\pages;

use classes\data\datacenter;

require_once $_SERVER['DOCUMENT_ROOT'].'/gamestation/classes/pages/home.php';
    class view extends home {
        function addview($template)
        {
                require_once( $_SERVER['DOCUMENT_ROOT'].'/gamestation/view/'.$template . '.php');
        }
        public function __construct(datacenter $dblogin)
        {
            parent::__construct($dblogin);
        }
    }
?>