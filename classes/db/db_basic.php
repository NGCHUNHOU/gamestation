<?php
namespace classes\db;

class db_basic 
{
    public $hostname;
    public $dbname;
    public $username;
    public $password;
    protected $stmt = null;

    protected function __construct($hostname, $dbname, $username, $password, $stmt = null) 
    {
        $this->hostname = $hostname;
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;
        $this->stmt = $stmt;
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