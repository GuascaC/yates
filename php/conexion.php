<?php
class Connection extends PDO{
    private $DB_type = 'mysql';
    private $host = 'localhost';
    private $DB_name = 'yates';
    private $DB_user = 'root';
    private $password = '';
    public function __construct(){
            $this->connection = mysqli_connect($this->host, $this->DB_user, $this->password, $this->DB_name);
            if (!$this->connection) {
                die("Ha surgido un error y no se puede conectar a la base de datos. Detalle: " . mysqli_connect_error());
        }
    }
    public function getConnection() {
        return $this->connection;
    }
}
$obj= new Connection();
$cone= $obj->getConnection();;
?>