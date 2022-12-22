<?php
namespace classes\db;
use envCenter;

class db
{
    private $hostname;
    private $dbname;
    private $username;
    private $password;
    private $stmt;

    public function __construct() 
    {
        $this->hostname = envCenter::$hostname;
        $this->dbname = envCenter::$dbname;
        $this->username = envCenter::$username;
        $this->password = envCenter::$password;
        $this->stmt = null;
    }

    public function connect() {
        $pdo = new \PDO("mysql:host=$this->hostname;dbname=$this->dbname", $this->username, $this->password);
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

    public function query($query, $params = array()) {
        $stmt = $this->connect()->prepare($query);
        $stmt->execute($params);
        if (explode(' ', $query)[0] == 'SELECT') {
            return $stmt->fetchAll();
        } 
    }

    public function queryALL($query) {
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        if (explode(' ', $query)[0] == 'SELECT') {
            return $stmt->fetchAll();
        } 
    }
}
    
?>