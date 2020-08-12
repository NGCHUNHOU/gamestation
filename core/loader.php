<?php 
use classes\db;
require_once $_SERVER['DOCUMENT_ROOT'] . '/gamestation/classes/db/db.php';
$db = new db\db();

use classes\pages;
require_once $_SERVER['DOCUMENT_ROOT'] . '/gamestation/classes/pages/index.php';
$page_loader = new pages\index();

// use classes\loader;
// require_once $_SERVER['DOCUMENT_ROOT'] . '/gamestation/classes/loader/loader.php';
// $loader = new loader\loader();

use classes\db_admin;
require_once $_SERVER['DOCUMENT_ROOT'] . '/gamestation/admin/classes/db/admin.php';
$admin_loader = new db_admin\db_admin();

