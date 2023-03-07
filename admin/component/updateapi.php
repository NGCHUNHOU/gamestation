<?php
$postData = [];
$selectedRows = [];
$tableName = "";
$sqlQueryStr = "";

function initDatabaseTable() {
    $data = file_get_contents("php://input");
    $data = json_decode($data);
    $strArrayData = get_object_vars($data);

    if ($strArrayData["postType"] == "insert") {
        $GLOBALS["postData"] = $strArrayData["postData"];
        $GLOBALS["tableName"] = $strArrayData["tableName"];
        $GLOBALS["sqlQueryStr"] = "INSERT INTO ". $GLOBALS["tableName"] ." VALUES ( '". implode("','", $GLOBALS["postData"] ). "' )";
    }

    if ($strArrayData["postType"] == "delete") {
        $GLOBALS["tableName"] = $strArrayData["tableName"];
        $GLOBALS["selectedRows"] = $strArrayData["selectedRows"];
        $GLOBALS["sqlQueryStr"] = "DELETE FROM ". $GLOBALS["tableName"] ." WHERE rowId IN ( '". implode("','", $GLOBALS["selectedRows"] ). "' )";
    }

}

initDatabaseTable();

require_once $_SERVER['DOCUMENT_ROOT'] .'/envCenter.php';
\envCenter::loadFile("classes/db/db.php");
\classes\db\db::setSqliteDBFileName(\envCenter::getDocumentRoot()."gamestation");

try {
    $queryResponse = \classes\db\db::query($sqlQueryStr);
} catch (\Throwable $th) {
    http_response_code(400);
    print_r(["queryStatus" => $th->getMessage()]);
    exit;
}

print_r(json_encode(["queryStatus" => "ok"]));
exit;