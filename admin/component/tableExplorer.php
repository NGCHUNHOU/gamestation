<?php
\envCenter::loadFile("classes/db/db.php");
\envCenter::loadFile("admin/databaseEditor.php");
use classes\db\db;
class tableExplorer {
    private $tables = [];
    public function getTables() {return $this->tables;}
    public function __construct() {
        db::setSqliteDBFileName("../gamestation");
        $this->tables = db::query("SELECT name FROM sqlite_master WHERE name != 'sqlite_sequence'");
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
        <?php databaseEditor::renderHTMLNodes($te->getTables(), "a", "name", 0) ?>
    </div>
</div>