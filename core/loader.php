<?php 
envCenter::loadFiles([
"/classes/db/db.php",
"/classes/data/datacenter.php",
"/classes/pages/index.php",
"/classes/dataStorage/storage.php",
]);

use classes\pages;

$controller = new pages\viewController();
$controller->handleRequest();