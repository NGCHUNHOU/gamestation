<?php
    // set error reporting
    error_reporting(E_ALL & ~E_NOTICE);

    // set the environment paths
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'gamestation');
    define('DB_CHARSET', 'utf8');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');

    //env filepath
    define('DIR_HOST', 'http://localhost/gamestation');
    define('DIR_VIEW', DIR_HOST.'/view');
    define('DIR_ADMIN', DIR_HOST.'/admin');

    // file path
    define('DB_FILEPATH', DIR_HOST.'/admin/libs/config.php');
