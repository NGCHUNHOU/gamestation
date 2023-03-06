<?php
class checkbox {
    public $rowPos;
    public $id;
    public $allRowChecked = false;
    public $isChecked = false;
    private $isVisible = true;
    private $innerHTML = "<input type='checkbox' />";
    public function getStringNodeWithId($id) {
        return substr_replace($this->innerHTML, " $id ", -3, 0);
    }
    public function setNodeVisible($isVisible) { 
        $this->isVisible = $isVisible; 
        if ($this->isVisible == false) {
            $this->innerHTML = substr_replace($this->innerHTML, " style='display:none;' ", -3, 0);
            return $this;
        }
        return $this;
    }
}

class databaseEditor {
    public static function renderTableExplorerNodes($arr, $nodeType, $arrayIndexKey, $selectedTableIndex) {
        for ($i=0;$i<count($arr);$i++) {
            $isclicked = "false";
            if ($i == $selectedTableIndex)
                $isclicked = "true";
            echo '<'.$nodeType.' id="'.$arr[$i][$arrayIndexKey].'" data-isclicked="' . $isclicked . '" >'.$arr[$i][$arrayIndexKey].'</'.$nodeType.'>';
        }
    }
    public static function renderTableDisplayerNodes($tableColumns, $arr) {
        $Checkbox = new checkbox();
        echo "<table class='table table-dark' style='margin:0;'>";
            echo "<thead id='tableColumnsContainer'>";
                echo  "<tr>";
                    echo "<th scope='col'>".$Checkbox->getStringNodeWithId("id='selectall-checkbox'")."</th>";
                    // printing table column names using number indexs
                    for ($i=0;$i<count($tableColumns);$i++) {
                        echo "<th scope='col'>$tableColumns[$i]</th>";
                    }
                echo "</tr>";
            echo "</thead>";

            $Checkbox->setNodeVisible(false);
            echo "<tbody id='tableItemsContainer'>";
                for ($i=0;$i<count($arr);$i++) {
                    // printing 2d table using number indexs
                    echo "<tr>";
                        echo "<td>".$Checkbox->getStringNodeWithId("class='item-checkbox'")."</td>";
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
        \envCenter::loadFile("admin/component/tableQueryAction.php");
        \envCenter::loadFile("admin/view/vtableDisplayer.php");
        \envCenter::loadFile("admin/component/tableSelector.php");
    }
}
?>