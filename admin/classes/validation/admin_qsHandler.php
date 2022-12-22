<?php
namespace classes\admin_qsHandler;

class admin_qsHandler 
{
    protected $isAuthPassed;
    protected $userData;
    public $completeUrl;
    public $userLogin = array();

    protected function __construct()
    {
        // return query string
        $this->completeUrl = isset($_POST['url']) ? $_POST['url'] : $_SERVER['DOCUMENT_ROOT'] . '/admin';
        $this->isAuthPassed = false;
        if (!isset($_GET['url'])) {
            $userData = $_SERVER['QUERY_STRING'];
            parse_str($userData, $this->userData);
            $this->completeUrl .= '?'. $_SERVER['QUERY_STRING'];
        }        
    
        if (isset($_POST["email"]) && isset($_POST["pass"]))
        {
            array_push($this->userLogin, $_POST["email"], $_POST["pass"]);
            // print_r($this->userLogin);
        }
    }
}
