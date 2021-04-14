<?php
// if ($_SERVER["REQUEST_METHOD"] === "POST")
// {
//     $data = file_get_contents("php://input");
// }

if ($_SERVER["REQUEST_METHOD"] === "POST" AND isset($_POST["pageName"]))
{
    $pageName = $_POST["pageName"];
    $pagepath = $_POST["pagePath"];
    $data = $_POST["pageContent"];
    // file_put_contents("./view/test.php/component/test.php", $data);
    $file = fopen($_SERVER["DOCUMENT_ROOT"]."/".$pagepath."/".$pageName, "w");
    fwrite($file, $data);
}

if (isset($_POST["pageAdded"]))
{
    // $file = fopen("./view/usrView/$_POST[pageAdded]", "w");
    $file = fopen($_SERVER["DOCUMENT_ROOT"] . $_POST["path"] . "/" .  $_POST["pageAdded"], "w");
    fwrite($file, $data);
}

if ($_SERVER["REQUEST_METHOD"] === "DELETE")
{
    $filename = file_get_contents("php://input");
    $decodedFileName = json_decode($filename, true);
    foreach ($decodedFileName as $pageRemove)
    {
        unlink($_SERVER["DOCUMENT_ROOT"] . $pageRemove["pageRemovePath"] . "/" . $pageRemove["pageRemove"]);
    }
}