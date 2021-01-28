<?php
namespace classes\adminLoader;
use classes\admin_validation;

require_once $_SERVER['DOCUMENT_ROOT'].'/gamestation/admin/classes/validation/admin_validation.php';

class adminLoader
{
    protected $autoloader_func;
    public $query_string;
    protected $ClassList = array();

    function __construct()
    {
        $HValid = new admin_validation\admin_validation("test");
        $HValid->fullUrl;
        $email = str_replace('@','%40',$HValid->db_admin['email']);
        $password = $HValid->db_admin['password'];

        session_start();
        // instance class here
        if ($HValid->isUserDataset AND preg_match("/email=$email/", $HValid->fullUrl) AND preg_match("/pass=$password/", $HValid->fullUrl)) {
            require_once $_SERVER['DOCUMENT_ROOT'] .'/gamestation/admin/view/header.php';
            require_once $_SERVER['DOCUMENT_ROOT'] .'/gamestation/admin/view/AdminIndex.php';
            require_once $_SERVER['DOCUMENT_ROOT'] .'/gamestation/admin/view/footer.php';
        } else {
            $HValid->checkUserInputEmpty();
            require_once $_SERVER['DOCUMENT_ROOT'] .'/gamestation/admin/view/register.php';
        }

        if (is_array($this->query_string) AND $this->query_string[0] !== '') {
            $page = new $this->query_string[0]();
        } else {
            return ;
        }
    }
}
?>