<?php 
envCenter::loadFiles([
"/classes/db/db.php",
"/classes/data/datacenter.php",
"/classes/pages/index.php",
"/classes/dataStorage/storage.php",
"/admin/classes/db/admin.php"
]);
use classes\db;
use classes\data\datacenter;
use classes\pages;
use classes\dataStorage;
use classes\db_admin;

// testing
$controller = new pages\viewController();
$controller->handleRequest();

$db = new db\db();
$page_loader = new pages\index(new datacenter);
$dataStorage = new dataStorage\dataStorage(new datacenter);
$admin_loader = new db_admin\db_admin();