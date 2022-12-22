<?php
namespace classes\dataStorage;
require_once $_SERVER['DOCUMENT_ROOT'].'/classes/dataStorage/tableData.php';
use classes\dataStorage\tableData;
use classes\data\datacenter;

class dataStorage extends tableData\tableData
{
    public function __construct(datacenter $dblogin)
    {
        $this->updateTableData($dblogin);
    }
}

