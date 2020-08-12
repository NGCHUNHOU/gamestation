<?php
namespace classes\pages;
require_once $_SERVER['DOCUMENT_ROOT'].'/gamestation/classes/pages/home.php';
    class view extends home {
        function addview($template)
        {
                require_once( $_SERVER['DOCUMENT_ROOT'].'/gamestation/view/'.$template . '.php');
        }
    }
?>