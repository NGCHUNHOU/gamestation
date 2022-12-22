<?php
$_SERVER["REQUEST_URI"] = str_replace("gamestation/", "", $_SERVER["REQUEST_URI"]);
class envCenter {
    // must return document root path with slash at last position
    static public $hostname = "localhost";
    static public $dbname = "gamestation";
    static public $username = "root";
    static public $password = "";
    static public function getDocumentRoot() {
        // check if last character is slash
        $documentRootStr = $_SERVER["DOCUMENT_ROOT"];
        if (substr($documentRootStr, -1) != '/' || substr($documentRootStr, -1) != '\\')
            return $documentRootStr.'/';
        return $documentRootStr;
    }
    static public function loadFile(string $filePath) {
        if (substr($filePath, 0, 1) != '/' || substr($filePath, 0, 1) != '\\' ) {
            require_once envCenter::getDocumentRoot().$filePath;
            return;
        }
        // remove unnessary slash for filePath
        require_once envCenter::getDocumentRoot().substr($filePath, 1);
        return;
    }
}