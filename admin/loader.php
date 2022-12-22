<?php

use classes\db_admin\db_admin;
require_once $_SERVER['DOCUMENT_ROOT'].'/admin/classes/db/admin.php';
$admin_db = new db_admin();


use classes\adminLoader;
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/classes/adminLoader/adminLoader.php';
$admin_loader = new adminLoader\adminLoader();