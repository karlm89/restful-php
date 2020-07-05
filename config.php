<?php 
    class Database {
        // DB Params
        private $host  = 'localhost';
        private $dbName = 'restful-php';
        private $username = 'root';
        private $psw = 'muffinbutton';
        private $conn;

        public function connect() {
            $this->conn = null;

            try {
                $this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->dbName, $this->username, $this->psw);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $error) {
                echo 'Connection Error : '.$error->getMessage();
            }

            return $this->conn;
        }
    }