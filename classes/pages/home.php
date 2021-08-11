<?php
namespace classes\pages;

use classes\data\datacenter;

require_once $_SERVER['DOCUMENT_ROOT'].'/gamestation/classes/pages/help.php';
    class home extends help 
    {
        public function __construct(datacenter $dblogin)
        {
            parent::__construct($dblogin);
            $this->createheader('home');
            require_once($_SERVER['DOCUMENT_ROOT'].'/gamestation/view/home.php');
            $this->createfooter();
        }
    }
    
?>