<?php
require_once  './libs/config.php';
require_once '../model/database.php';
require_once './model/admin.php';

foreach (glob('../admin/controller/*.php') as $filename) {
    require_once $filename;
}

function login() {
    $admin = new admin();
    if (($_POST['email'] == $admin->get_ByEmail($_POST['email'])['email']) AND ($_POST['pass'] == $admin->get_ByEmail($_POST['email'])['password'])) {
    session_start();
    $_SESSION['login_status'] = 'succeed';
    new header();
    new AdminIndex();
    new footer();
    } else {
    session_start();
    $_SESSION['login_status'] = 'failed';
    $_SESSION['login_warning'] = 'Oops, look like the email or the password is incorrect';
    new register();
    }
}

login();

?>