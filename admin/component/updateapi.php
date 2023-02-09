<?php
$data = file_get_contents("php://input");
$data = json_decode($data);

$strArrayData = get_object_vars($data);
$postData = $strArrayData["postData"];
$tableName = $strArrayData["tableName"];

require_once $_SERVER['DOCUMENT_ROOT'] .'/envCenter.php';
$sqlQueryStr = "INSERT INTO ". $tableName." VALUES ( '". implode("','", $postData). "' )";

\envCenter::loadFile("classes/db/db.php");
\classes\db\db::setSqliteDBFileName(\envCenter::getDocumentRoot()."gamestation");
\classes\db\db::query($sqlQueryStr);
print_r(json_encode($data));
exit;