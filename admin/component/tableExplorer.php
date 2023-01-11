<?php
\envCenter::loadFile("classes/db/db.php");
\envCenter::loadFile("admin/databaseEditor.php");
use classes\db\db;
class tableExplorer {
    private $targetTable = "";
    private $tableData = [];
    public function getTableData() {return $this->tableData;}
    public function getTargetTable() {return $this->targetTable;}
    public function setTargetTable($table) {
        $this->targetTable = $table;
    }
    public function __construct() {
        db::setSqliteDBFileName("../gamestation");
        $this->setTargetTable("sqlite_master");
        $this->tableData = db::query("SELECT name FROM ". $this->getTargetTable(). " WHERE name !=  'sqlite_sequence'");
    }
}
?>