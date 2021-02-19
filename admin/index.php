<?php

// load admin main core file
require_once $_SERVER['DOCUMENT_ROOT'].'/gamestation/admin/classes/validation/admin_validation.php';
use classes\adminLoader\adminLoader;
use classes\admin_validation;

require_once $_SERVER['DOCUMENT_ROOT'] .'/gamestation/admin/loader.php';
$test = new admin_validation\admin_validation("test");

// output login credentials for testing 
// echo "<pre style='text-align: center;'>"."email: ".$test->db_admin["email"]."</pre>";
// echo "<pre style='text-align: center;'>"."password: ".$test->db_admin["password"]."</pre>";