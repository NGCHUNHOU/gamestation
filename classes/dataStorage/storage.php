<?php
namespace classes\dataStorage;
require_once $_SERVER['DOCUMENT_ROOT'].'/gamestation/classes/dataStorage/tableData.php';
use classes\dataStorage\tableData;

class dataStorage extends tableData\tableData
{
    public function __construct()
    {
        $this->updateTableData();
    }
}

