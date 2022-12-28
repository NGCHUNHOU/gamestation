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

// uncomment the below lines to test new page loader
$controller = new pages\viewController();
$controller->handleRequest();

// comment out the below lines to turn off bulky and bad page loader
// $db = new db\db();
// $page_loader = new pages\index(new datacenter);
// $dataStorage = new dataStorage\dataStorage(new datacenter);
// $admin_loader = new db_admin\db_admin();