<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/gamestation/classes/db/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/gamestation/classes/data/datacenter.php';
use classes\db;
use classes\data\datacenter;
$db = new db\db(new datacenter);

use classes\pages;
require_once $_SERVER['DOCUMENT_ROOT'] . '/gamestation/classes/pages/index.php';
$page_loader = new pages\index(new datacenter);

// use classes\loader;
// require_once $_SERVER['DOCUMENT_ROOT'] . '/gamestation/classes/loader/loader.php';
// $loader = new loader\loader();

use classes\dataStorage;
require_once $_SERVER['DOCUMENT_ROOT'] . '/gamestation/classes/dataStorage/storage.php';
$dataStorage = new dataStorage\dataStorage(new datacenter);

use classes\db_admin;
require_once $_SERVER['DOCUMENT_ROOT'] . '/gamestation/admin/classes/db/admin.php';
$admin_loader = new db_admin\db_admin();

