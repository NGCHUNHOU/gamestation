<?php
namespace classes\admin_validation;
use classes\admin_qsHandler;
use classes\db;

require_once $_SERVER['DOCUMENT_ROOT'].'/gamestation/admin/classes/validation/admin_qsHandler.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/gamestation/classes/db/db.php';

class admin_validation extends admin_qsHandler\admin_qsHandler
{
    public $db_admin;
    public $fullUrl;
    public $isLoginTrue;
    public $adminUserList = array();

    public function __construct()
    {
        $db = new db\db();
        // $result = $db->query("SELECT * FROM `users` WHERE `name` = ? ", array($adminUsername));
        $result = $db->queryALL("SELECT * FROM `users`");
        for ($i = 0; $i < count($result); $i++)
        {
            // print("<pre>");
            // echo $result[$i]["email"];
            // echo $result[$i]["password"];
            // print("</pre>");
            array_push($this->adminUserList, array($result[$i]["email"], $result[$i]["password"]));
        }
            // print("<pre>");
            // print_r($this->adminUserList);
            // print("</pre>");
        // $this->db_admin = array('email' => $result[0]['email'], 'password' => $result[0]['password']);

        $userQs = new admin_qsHandler\admin_qsHandler();
        $this->fullUrl = $userQs->completeUrl;
        // print_r($this->db_admin);
        $this->isUserDataset = $_SERVER['QUERY_STRING'] == "" ? 0 : 1;
    }

    public function checkUserInputEmpty() {
        // if ($this->isUserDataset == 1) 
        //     {
        //         $_SESSION['isUserDataSet'] = 1;
        //     }
        //     else 
        //     { 
        //         $_SESSION['isUserDataSet'] = 0;
        //     }
        // if ($this->isUserDataset = 1)
        // {
        //     echo $_POST["email"];
        // }
        if (isset($_POST["email"]) && isset($_POST["pass"]))
        {
            $_SESSION["isUserDataSet"] = 1;
        }
    }
}
