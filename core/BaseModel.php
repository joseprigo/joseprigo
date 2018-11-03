<?php
require_once 'Connection.php';
require_once 'lib_utils.php';

abstract class BaseModel{
    protected $table;
    protected $connection;
    protected $entityName;
    public function __construct($table, $entityName) {
        $this->table=(string) $table;
        $this->entityName=(string) $entityName;
        $this->connection = new Connection();
    }
    /**
     * Gets a SQL select result from a prepares statement
     * @param string $selectStm SQL Statement with the '?' question marks used in mysqli::prepare 
     * @param array $params contains the parameters of mysqli::bind_params() 
     * @return boolean array with the result set
     */
    protected function select($selectStm,$params){
        try{
            $conn = $this->connection->connect();
            $stmt = $conn->prepare($selectStm);
            // Dinamically prepare the statement https://www.pontikis.net/blog/dynamically-bind_param-array-mysqli
            call_user_func_array(array($stmt, 'bind_param'), refValues($params));
            $stmt->execute();
            // Get SELECT result into an array from a PS http://php.net/manual/en/mysqli.prepare.php
            $result = $stmt->get_result();
            if ($result->num_rows > 1) {
                //  TODO: hi ha un error
                while($row = $result->fetch_assoc()){
                    $resultSet[] = $row;
                }
            }elseif($result->num_rows == 1){
                if($row =  $result->fetch_assoc()){
                    $resultSet = $row;
                }
            }else{
                $resultSet = true;
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
            $resultSet = false;
        }
        return $resultSet;
    }
    
    abstract public function selectOne($params);
    abstract public function selectAll();
//    public function ejecutarSql($query){
//        $query=$this->db()->query($query);
//        if($query==true){
//            if($query->num_rows>1){
//                while($row = $query->fetch_object()) {
//                   $resultSet[]=$row;
//                }
//            }elseif($query->num_rows==1){
//                if($row = $query->fetch_object()) {
//                    $resultSet=$row;
//                }
//            }else{
//                $resultSet=true;
//            }
//        }else{
//            $resultSet=false;
//        }
//         
//        return $resultSet;
//    }
     
    //Aqui podemos montarnos métodos para los modelos de consulta
     
}
?>