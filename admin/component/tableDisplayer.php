<?php
\envCenter::loadFile("classes/db/db.php");
\envCenter::loadFile("admin/databaseEditor.php");
use classes\db\db;
class tableDisplayer {
    private $targetTable = "";
    private $tableColumnNames = [];
    private $tableData = [];
    public function getTableData() {return $this->tableData;}
    public function deleteTableData() {unset($this->tableData);}
    public function getTargetTable() {return $this->targetTable;}
    public function setTargetTable($table) {
        $this->targetTable = $table;
    }
    public function setTableColumnNames() {
        $this->tableColumnNames = db::queryColumnNames("SELECT * FROM " . $this->getTargetTable(). " LIMIT 0");
    }
    public function getTableColumnNames() {
        if (count($this->tableColumnNames) == 0)
            throw new Exception("failed to get column names", 1);
        return $this->tableColumnNames;
    }
    public function __construct($table = "") {
        db::setSqliteDBFileName(\envCenter::getDocumentRoot()."gamestation");
        $this->setTargetTable($table);
        $this->setTableColumnNames();
        $this->tableData = db::query("SELECT * FROM ".$this->getTargetTable());
    }
}
?>