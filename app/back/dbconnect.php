<?php
/**
* Database connection
*/
class DbConnect{
    private $server = 'localhost';
    private $dbname = 'projeto_pw';
    private $user = 'root';
    private $password = 'root';
    // private $password = '';
    public function connect(){
        try{
            $conn=new PDO('mysql:host='.$this->server.';dbname='.$this->dbname,$this->user,$this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $conn;
        }catch(Exception $e){
            echo "Database Error: ". $e->getMessage();
        }
        
    }
}

$db=new DbConnect;
$db->connect();

/* Old
$con=new mysqli('localhost','root','','projeto_pw');

if(!$con){
    die(mysqli_error($con));
}
*/
?>