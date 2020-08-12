<?php
namespace classes\pages;
require_once $_SERVER['DOCUMENT_ROOT'].'/gamestation/classes/pages/help.php';
    class home extends help 
    {
        public function __construct()
        {
            $this->createheader('home');
            require_once($_SERVER['DOCUMENT_ROOT'].'/gamestation/view/home.php');
            $this->createfooter();
        }
    }
    
?>