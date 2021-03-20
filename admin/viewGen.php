<?php
if ($_SERVER["REQUEST_METHOD"] === "POST")
{
    $data = file_get_contents("php://input");
}

// file_put_contents("./view/test.php/component/test.php", $data);
$file = fopen("./view/usrView/test.html", "w");
fwrite($file, $data);