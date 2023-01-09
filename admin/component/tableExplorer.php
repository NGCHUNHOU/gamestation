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
$te = new tableExplorer();
?>

<style>
    .sidebar-frame a {
        display: block;
    }
</style>
<div id="tableExplorer" style="padding: 15px; height: 100%; position: fixed; border-right: 1px solid #21262d; width: 170px;">
    <div class="sidebar-frame">
        <h4>Gamestation</h4>
        <?php databaseEditor::renderTableExplorerNodes($te->getTableData(), "a", "name", 0) ?>
    </div>
</div>