<?php
/**
Primero crearemos la clase Conectar que nos servirá para conectarnos a la base de datos utilizando el driver MySQLi que es el más rápido aunque muchos por ahí recomienden PDO, y también nos servirá para conectar a la base de datos un constructor de consultas que he incluido en el proyecto llamado Fluent Query Builder (el que utiliza Laravel).
*/
class Connection{
    private $driver;
    private $host, $user, $pass, $database, $charset;
   
    public function __construct() {
        $db_cfg = require_once 'config/database.php';
        $this->driver=$db_cfg["driver"];
        $this->host=$db_cfg["host"];
        $this->user=$db_cfg["user"];
        $this->pass=$db_cfg["pass"];
        $this->database=$db_cfg["database"];
        $this->charset=$db_cfg["charset"];
    }
     
    public function connect(){
        try{
            if($this->driver=="mysql" || $this->driver==null){
                // Create connection
                $conn = new mysqli($this->host,$this->user,$this->pass, $this->database);
                if (mysqli_connect_error()){
                    throw new Exception(mysqli_connect_error());
                }
                mysqli_set_charset($conn, $this->charset);
                // Check connection
                if($conn->connect_error){
                    die("Connection failed: ". $conn->connect_error);
                }
            }
            // Place other drivers calls here
        } catch (Exception $ex) {
            $conn = null;
        }
        return $conn;
    }
//     
//    public function startFluent(){
//        require_once "FluentPDO/FluentPDO.php";
//         
//        if($this->driver=="mysql" || $this->driver==null){
//            $pdo = new PDO($this->driver.":dbname=".$this->database, $this->user, $this->pass);
//            $fpdo = new FluentPDO($pdo);
//        }
//         
//        return $fpdo;
//    }
}
?>