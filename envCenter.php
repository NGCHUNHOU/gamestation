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
        if (substr($documentRootStr, -1) != '/')
            return $documentRootStr.'/';
        if (substr($documentRootStr, -1) != '\\')
            return $documentRootStr.'\\';
        return $documentRootStr;
    }
    static public function loadFile(string $filePath, &$pageData = null) : bool {
        $fullpath = "";
        if (substr($filePath, 0, 1) != '/' || substr($filePath, 0, 1) != '\\' ) {
            $fullpath = envCenter::getDocumentRoot().$filePath;
            // require_once envCenter::getDocumentRoot().$filePath;
        } else 
            $fullpath = envCenter::getDocumentRoot().substr($filePath, 1);
        if (!file_exists($fullpath)) {
            envCenter::$errorFilesMsg .= $filePath . " file cannot be loaded" . " , ";
            throw new Exception(envCenter::$errorFilesMsg);
        }

        require_once $fullpath;
        return true;
    }
    static public function loadFiles(array $filePaths) {
        for ($i=0;$i<count($filePaths);$i++) {
            envCenter::loadFile($filePaths[$i]);
        }
        if (envCenter::$errorFilesMsg != "")
            throw new Exception(envCenter::$errorFilesMsg);

        return;
    }
    static public function getRequestURI() {
        $properFullURI = $_SERVER["REQUEST_URI"];
        // remove first character if uri have forward slash because getDocumentRoot() already has forward slash
        // if (substr($properFullURI, 0, 1) == '/') 
        //     $properFullURI = substr($properFullURI, 1);
        return envCenter::getDocumentRoot() . "view". $_SERVER["REQUEST_URI"] . ".php";
    }
}