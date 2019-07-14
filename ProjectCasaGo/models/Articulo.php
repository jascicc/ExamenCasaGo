<?php
    class Articulo{
        private $conn;

        private $table = "articulos";

        public $id;
        public $nombre;
        public $url;

        public function __construct($db){
            $this->conn = $db;
        }

        public function find_article(){
            $query = 'SELECT a.id, a.nombre, a.url FROM '
            .$this->table.
            ' a WHERE a.nombre = ? 
            LIMIT 0,1';
            
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->nombre);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->id = $row['id'];
            $this->nombre = $row['nombre'];
            $this->url = $row['url'];
        }
    }
?>