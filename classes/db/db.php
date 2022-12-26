<?php
namespace classes\db;
use envCenter;

class db
{
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