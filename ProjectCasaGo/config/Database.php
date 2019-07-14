<?php
    class Database{
        private $host = 'MYSQL5021.site4now.net';
        private $username = 'a3cdb8_articul';
        private $password = 'Gx2fb9vb!@#';
        private $database = 'db_a3cdb8_articul';
        private $conn;

        public function connect(){
            $this->conn = null;

            try{
                $this->conn = new PDO('mysql:host=' .$this->host.';dbname=' .$this->database,
                $this->username, $this->password);

                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOException $e){
                echo 'Error de conexión: ' . $e->getMessage();
            }

            return $this->conn;
        }

    }
?>