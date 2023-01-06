<?php
class databaseEditor {
    public static function renderHTMLNodes($arr, $nodeType, $arrayIndexKey) {
        for ($i=0;$i<count($arr);$i++) {
            echo '<'.$nodeType.'>'.$arr[$i][$arrayIndexKey].'</'.$nodeType.'>';
        }
    }
    public static function initComponents() {
        // initializing table explorer
        \envCenter::loadFile("admin/component/tableExplorer.php");
        \envCenter::loadFile("admin/component/tableDisplayer.php");
    }
}
?>