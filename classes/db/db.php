<?php
namespace classes\db;
use classes\data\datacenter;

require_once 'db_basic.php';
    class db extends db_basic 
    {
        public function __construct(datacenter $dblogin) 
        {
            parent::__construct($dblogin->dbloginset[0],$dblogin->dbloginset[1],$dblogin->dbloginset[2],$dblogin->dbloginset[3]);
        }
    }
    
?>