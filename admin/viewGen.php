<?php
// if ($_SERVER["REQUEST_METHOD"] === "POST")
// {
//     $data = file_get_contents("php://input");
// }

if ($_SERVER["REQUEST_METHOD"] === "POST")
{
    $pageName = $_POST["pageName"];
    $data = $_POST["pageContent"];
}

// file_put_contents("./view/test.php/component/test.php", $data);
$file = fopen("./view/usrView/$pageName", "w");
fwrite($file, $data);