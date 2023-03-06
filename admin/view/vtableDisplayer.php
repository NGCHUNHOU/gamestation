<?php \envCenter::loadFile("admin/component/tableDisplayer.php"); 
$TableDisplayer = new tableDisplayer("updatenews"); // temporaily using updatenews as default table if no table is selected 
?>
<div id="tableDisplayer" style="position: absolute; left: 170px; top: 75px; width: calc(100% - 170px); height: 90%; overflow: auto;">
        <div class="row" style="margin:0;">
            <div class="col-12" style="padding:0;">
                <?php databaseEditor::renderTableDisplayerNodes($TableDisplayer->getTableColumnNames(), $TableDisplayer->getTableData()); ?>
            </div>
        </div>
</div>