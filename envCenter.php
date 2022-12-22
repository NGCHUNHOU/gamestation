<?php
$_SERVER["REQUEST_URI"] = str_replace("gamestation/", "", $_SERVER["REQUEST_URI"]);
class envCenter {
    // must return document root path with slash at last position
    static public $hostname = "localhost";
    static public $dbname = "gamestation";
    static public $username = "root";
    static public $password = "";
    static public $errorFilesMsg = "";

    static public function getDocumentRoot() {
        // check if last character is slash
        $documentRootStr = $_SERVER["DOCUMENT_ROOT"];
        if (substr($documentRootStr, -1) != '/' || substr($documentRootStr, -1) != '\\')
            return $documentRootStr.'/';
        return $documentRootStr;
    }
    static public function loadFile(string $filePath) : bool {
        $fullpath = "";
        if (substr($filePath, 0, 1) != '/' || substr($filePath, 0, 1) != '\\' ) {
            $fullpath = envCenter::getDocumentRoot().$filePath;
            // require_once envCenter::getDocumentRoot().$filePath;
        } else 
            $fullpath = envCenter::getDocumentRoot().substr($filePath, 1);
        if (!file_exists($fullpath))
            return false;

        require_once $fullpath;
        return true;
    }
    static public function loadFiles(array $filePaths) {
        for ($i=0;$i<count($filePaths);$i++) {
            if (envCenter::loadFile($filePaths[$i]) == false)
                envCenter::$errorFilesMsg .= $filePaths[$i] . " file cannot be loaded" . ' , ';
        }
        if (envCenter::$errorFilesMsg != "")
            throw new Exception(envCenter::$errorFilesMsg);

        return;
    }
}