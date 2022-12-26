<?php
namespace classes\db;
use envCenter;

class db
{
    static private $sqliteDBFileName = "";
    // just filename without dot extension
    static public function setSqliteDBFileName($name) {
        db::$sqliteDBFileName = $name;
    }

    // uncomment below piece of function code to test sqlite connector
    // static public function connect() {
    //     $pdo = null;
    //     if (db::$sqliteDBFileName != "") {
    //         $pdo = new \PDO("sqlite:". db::$sqliteDBFileName . ".db");
    //         $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    //         return $pdo;
    //     }
    //     $pdo = new \PDO("sqlite:gamestation.db");
    //     $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    //     return $pdo;
    // }

    // comment out connect() to turn off mysql connector
    static public function connect() {
        $pdo = new \PDO("mysql:host=".envCenter::$hostname.';dbname='.envCenter::$dbname, envCenter::$username, envCenter::$password);
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

    static public function query($query, $params = array()) {
        $stmt = db::connect()->prepare($query);
        $stmt->execute($params);
        if (explode(' ', $query)[0] == 'SELECT') {
            return $stmt->fetchAll();
        } 
    }

    static public function queryALL($query) {
        $stmt = db::connect()->prepare($query);
        $stmt->execute();
        if (explode(' ', $query)[0] == 'SELECT') {
            return $stmt->fetchAll();
        } 
    }
}
    
?>