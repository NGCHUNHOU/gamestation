<?php
class databaseEditor {
    public static function renderTableExplorerNodes($arr, $nodeType, $arrayIndexKey) {
        for ($i=0;$i<count($arr);$i++) {
            echo '<'.$nodeType.'>'.$arr[$i][$arrayIndexKey].'</'.$nodeType.'>';
        }
    }
    public static function renderTableDisplayerNodes($tableColumns, $arr) {
        echo "<table class='table table-dark' style='margin:0;'>";
            echo "<thead>";
                echo  "<tr>";
                    for ($i=0;$i<count($tableColumns);$i++) {
                        echo "<th scope='col'>$tableColumns[$i]</th>";
                    }
                echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
                for ($i=0;$i<count($arr);$i++) {
                    echo "<tr> <th scope='row'>1</th>";
                    echo "<td>". $arr[$i]["news_id"] . "</td>";
                    echo "<td>". $arr[$i]["news_title"] . "</td>";
                    echo "<td>". $arr[$i]["description"] . "</td>";
                    echo "<td>". $arr[$i]["imgNews_thumbnail"] . "</td>";
                    echo "<td>". $arr[$i]["imgNews_content"] . "</td>";
                    echo "<td>". $arr[$i]["keywords"] . "</td>";
                    echo "<td>". $arr[$i]["createdDate"] . "</td>";
                    echo "<td>". $arr[$i]["categoryTitle"] . "</td>";
                    echo "<td>". $arr[$i]["categoryDescription"] . "</td>";
                    echo "<td>". $arr[$i]["categoryInitialDate"] . "</td>";
                    echo "<td>". $arr[$i]["dayStr"] . "</td>";
                    echo "</tr>";
                }
            echo "</tbody>";
        echo "</table>";
    }
    public static function initComponents() {
        // initializing table explorer
        \envCenter::loadFile("admin/component/tableExplorer.php");
        \envCenter::loadFile("admin/component/tableDisplayer.php");
    }
}
?>