<?php
class databaseEditor {
    public static function renderTableExplorerNodes($arr, $nodeType, $arrayIndexKey) {
        for ($i=0;$i<count($arr);$i++) {
            echo '<'.$nodeType.' id="'.$arr[$i][$arrayIndexKey].'" >'.$arr[$i][$arrayIndexKey].'</'.$nodeType.'>';
        }
    }
    public static function renderTableDisplayerNodes($tableColumns, $arr) {
        echo "<table class='table table-dark' style='margin:0;'>";
            echo "<thead id='tableColumnsContainer'>";
                echo  "<tr>";
                    // printing table column names using number indexs
                    for ($i=0;$i<count($tableColumns);$i++) {
                        echo "<th scope='col'>$tableColumns[$i]</th>";
                    }
                echo "</tr>";
            echo "</thead>";
            echo "<tbody id='tableItemsContainer'>";
                for ($i=0;$i<count($arr);$i++) {
                    // printing 2d table using number indexs
                    echo "<tr>";
                        for ($j=0;$j<count($tableColumns);$j++) {
                            echo "<td>". $arr[$i][$j] . "</td>";
                        }
                    echo "</tr>";
                }
            echo "</tbody>";
        echo "</table>";
    }
    public static function initComponents() {
        // loading components view
        \envCenter::loadFile("admin/view/vtableExplorer.php");
        \envCenter::loadFile("admin/view/vtableDisplayer.php");
        \envCenter::loadFile("admin/component/tableSelector.php");
    }
}
?>