<?php
namespace classes\admin_qsHandler;

class admin_qsHandler 
{
    protected $isAuthPassed;
    protected $userData;
    public $completeUrl;

    protected function __construct()
    {
        // return query string
        $this->completeUrl = isset($_GET['url']) ? $_GET['url'] : $_SERVER['DOCUMENT_ROOT'] . '/gamestation/admin';
        $this->isAuthPassed = false;
        if (!isset($_GET['url'])) {
            $userData = $_SERVER['QUERY_STRING'];
            parse_str($userData, $this->userData);
            $this->completeUrl .= '?'. $_SERVER['QUERY_STRING'];
        }        
    }
}
