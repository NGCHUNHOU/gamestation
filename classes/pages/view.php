<?php
namespace classes\pages;

use classes\data\datacenter;
use classes\guidecardframe;

require_once $_SERVER['DOCUMENT_ROOT'].'/classes/pages/home.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/classes/guidecardframe.php';
    class view extends guidecardframe {
        function addview($template)
        {
                require_once( $_SERVER['DOCUMENT_ROOT'].'/view/'.$template . '.php');
        }
        public function __construct(datacenter $dblogin)
        {
            parent::__construct($dblogin);
        }
    }
?>