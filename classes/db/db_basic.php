<?php
namespace classes\db;

class db_basic 
{
    public $hostname = 'localhost';
    public $dbname = 'gamestation';
    public $username = 'root';
    public $password = '';
    protected $stmt = null;

    protected function __construct() {}

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
}