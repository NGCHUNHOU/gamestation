<?php
\envCenter::loadFile("classes/db/db.php");
\envCenter::loadFile("admin/databaseEditor.php");
use classes\db\db;
class tableDisplayer {
    private $targetTable = "";
    private $tableColumnNames = [];
    private $tableData = [];
    public function getTableData() {return $this->tableData;}
    public function getTargetTable() {return $this->targetTable;}
    public function setTargetTable($table) {
        $this->targetTable = $table;
    }
    public function setTableColumnNames() {
        $this->tableColumnNames = db::queryColumnNames("SELECT * FROM updatenews LIMIT 0");
    }
    public function getTableColumnNames() {
        if (count($this->tableColumnNames) == 0)
            throw new Exception("failed to get column names", 1);
        return $this->tableColumnNames;
    }
    public function __construct() {
        db::setSqliteDBFileName("../gamestation");
        $this->setTargetTable("updatenews");
        $this->setTableColumnNames();
        $this->tableData = db::query("SELECT * FROM ".$this->getTargetTable());
    }
}
$te = new tableDisplayer();
?>
<div id="tableDisplayer" style="position: absolute; left: 170px; width: calc(100% - 170px); height: 100%; overflow: auto;">
        <div class="row" style="margin:0;">
            <div class="col-12" style="padding:0;">
                <?php databaseEditor::renderTableDisplayerNodes($te->getTableColumnNames(), $te->getTableData()); ?>
            </div>
        </div>
</div>