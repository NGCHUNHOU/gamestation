<?php \envCenter::loadFile("admin/component/tableExplorer.php"); $te = new tableExplorer(); ?>
<style>
    .sidebar-frame a {
        display: block;
    }
</style>
<div id="tableExplorer" style="padding: 15px; height: 100%; position: fixed; border-right: 1px solid #21262d; width: 170px;">
    <h4>Gamestation</h4>
    <div class="sidebar-frame">
        <?php databaseEditor::renderTableExplorerNodes($te->getTableData(), "a", 0, 2) ?>
    </div>
</div>