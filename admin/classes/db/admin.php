<?php
namespace classes\db_admin;
use classes\db;
use Exception;

class db_admin
    {
        public $stmt = "";
        
        public function __construct() {}

        // close db connection when done
        public function __destruct()
        {
            if ($this->stmt !== null) {
                $this->stmt = null;
            } 
            else {
                throw new Exception("db statement cannot be found");
            }
        }

        protected function get_user($id)
        {
            $queryuser = "SELECT * FROM `users` WHERE `user_id`= ? ";
            $db = new db\db();
            $this->stmt = $db->connect()->prepare($queryuser);
            $this->stmt->execute([$id]);
            $list = $this->stmt->fetchAll();
            return count($list) == 0 ? false : $list[0];
        }

        protected function get_ByEmail($email)
        {
            $queryuser = "SELECT * FROM `users` WHERE `email`= ? ";
            $db = new db\db();
            $this->stmt = $db->connect()->prepare($queryuser);
            $this->stmt->execute([$email]);
            $list = $this->stmt->fetchAll();
            return count($list) == 0 ? false : $list[0];
        }

        protected function getAll()
        {
            $queryuser = "SELECT * FROM `users`";
            $db = new db\db();
            $this->stmt = $db->connect()->prepare($queryuser);
            $this->stmt->execute();
            $list = $this->stmt->fetchAll();
            return count($list) == 0 ? false : $list;
        }

        protected function add_row($email, $name, $password)
        {
            try {
                $sql = "INSERT INTO `users` (`email`, `name`, `password`) VALUES (?, ? , ?)";
                $insertdata = [$email, $name, $password];
                $db = new db\db();
                $this->stmt = $db->connect()->prepare($sql);
                $this->stmt->execute($insertdata);
            } catch (\Exception $e) {
                return $e->getMessage();
            }
            return true;
        }

        protected function edit_row($email, $name, $password, $id)
        {
            try {
                $sql = "UPDATE `users` SET `email` = ? , `name` = ? , `password` = ? WHERE `user_id` = ?";
                $insertdata = [$email, $name, $password, $id];
                $db = new db\db();
                $this->stmt = $db->connect()->prepare($sql);
                $this->stmt->execute($insertdata);
            } catch (\Exception $e) {
                return $e->getMessage();
            }
            return true;
        }

        protected function del($id)
        {
            try {
            $queryuser = "DELETE FROM `users` WHERE `user_id` = ?";
            $db = new db\db();
            $this->stmt = $db->connect()->prepare($queryuser);
            $this->stmt->execute([$id]);
            } catch (\Exception $e) {
                return $e->getMessage();
            }
            return true;
        }
    }    
?>