<?php
namespace classes\adminLoader;
use classes\admin_validation;

require_once $_SERVER['DOCUMENT_ROOT'].'/admin/classes/validation/admin_validation.php';

class adminLoader
{
    protected $autoloader_func;
    public $query_string;
    protected $ClassList = array();

    function __construct()
    {
        $this->decideLogin();
    }
    protected function decideLogin()
    {
        $HValid = new admin_validation\admin_validation;
        $HValid->fullUrl;
        // echo "output from adminLoader.php";

        session_start();
        // instance class here
        // if ($HValid->isUserDataset AND preg_match("/email=$email/", $HValid->fullUrl) AND preg_match("/pass=$password/", $HValid->fullUrl)) {
        //     require_once $_SERVER['DOCUMENT_ROOT'] .'/admin/view/header.php';
        //     require_once $_SERVER['DOCUMENT_ROOT'] .'/admin/view/AdminIndex.php';
        //     require_once $_SERVER['DOCUMENT_ROOT'] .'/admin/view/footer.php';
        // } else {
        //     $HValid->checkUserInputEmpty();
        //     require_once $_SERVER['DOCUMENT_ROOT'] .'/admin/view/register.php';
        // }

        // if (is_array($this->query_string) AND $this->query_string[0] !== '') {
        //     $page = new $this->query_string[0]();
        // } else {
        //     return ;
        // }
        // for ($i = 0; $i < count($HValid->adminUserList); $i++) {
        //     echo $HValid->adminUserList[$i][0];
        // }

        for ($i = 0; $i < count($HValid->adminUserList); $i++)
        {
            // $HValid->adminUserList[$i][0] email 
            // $HValid->adminUserList[$i][1] password
            // preg_match("/$email/i", $HValid->adminUserList[$i][0]) AND preg_match("/$password/i", $HValid->adminUserList[$i][1])

            // if (isset($_POST['email']) && isset($_POST['pass']) && $HValid->adminUserList[$i][0] === $_POST['email'] && $HValid->adminUserList[$i][1] === $_POST['pass']) {
            //     require_once $_SERVER['DOCUMENT_ROOT'] .'/admin/view/header.php';
            //     require_once $_SERVER['DOCUMENT_ROOT'] .'/admin/view/AdminIndex.php';
            //     require_once $_SERVER['DOCUMENT_ROOT'] .'/admin/view/footer.php';
            //     return 0;
            // } else {
            //     $HValid->checkUserInputEmpty();
            //     require_once $_SERVER['DOCUMENT_ROOT'] .'/admin/view/register.php';
            // }

            if (isset($_POST['email']) && isset($_POST['pass']) && $HValid->adminUserList[$i][0] === $_POST['email'] && $HValid->adminUserList[$i][1] === $_POST['pass']) {
                $HValid->isLoginTrue = 1;
            } 
        }
        if (isset($HValid->isLoginTrue) && $HValid->isLoginTrue)
        { 
                $_SESSION["isUserDataSet"] = 1;
                require_once $_SERVER['DOCUMENT_ROOT'] .'/admin/view/header.php';
                require_once $_SERVER['DOCUMENT_ROOT'] .'/admin/view/AdminIndex.php';
                require_once $_SERVER['DOCUMENT_ROOT'] .'/admin/view/footer.php';
        }
        else
        {
                $_SESSION["isUserDataSet"] = 0;
                $HValid->checkUserInputEmpty();
                require_once $_SERVER['DOCUMENT_ROOT'] .'/admin/view/register.php';
        }
    }
}
?>