<?php
// if ($_SERVER["REQUEST_METHOD"] === "POST")
// {
//     $data = file_get_contents("php://input");
// }

if ($_SERVER["REQUEST_METHOD"] === "POST" AND isset($_POST["pageName"]))
{
    $pageName = $_POST["pageName"];
    $data = $_POST["pageContent"];
    // file_put_contents("./view/test.php/component/test.php", $data);
    $file = fopen("./view/usrView/$pageName", "w");
    fwrite($file, $data);
}

if (isset($_POST["pageAdded"]))
{
    $file = fopen("./view/usrView/$_POST[pageAdded]", "w");
    fwrite($file, $data);
}

if ($_SERVER["REQUEST_METHOD"] === "DELETE")
{
    $filename = file_get_contents("php://input");
    $decodedFileName = json_decode($filename, true);
    unlink("./view/usrView/". $decodedFileName["pageRemoved"]);
}