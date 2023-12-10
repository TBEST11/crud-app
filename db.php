<?php 

class Database{

    protected $dbHost;
    protected $dbUser;
    protected $dbPass;
    protected $dbName;
    public $conn;

    public function __construct(){
        try{
            $dbHost = "localhost"; $dbName = "php_crud_app"; $dbUser = "root"; $dbPass = "";
            $this->conn = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
        }
      catch(PDOException $e){
       echo $e->getMessage(); 
      }  
    }
    public function insert($fname,$lname,$email,$phone){
        $sql ="INSERT INTO user(first_name, last_name, email, phone) VALUE(:fname, :lname, :email, :phone)";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute(['fname'=>$fname, 'lname'=>$lname, 'email'=>$email, 'phone'=> $phone]);
        return true;
    }
    public function read(){

        $data= array();
        $sql = "SELECT * FROM user";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute();
        $results= $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as $row){
            $data[]= $row;
        }
        return $data;
        
    }
    public function getUserByid($id){

        $sql = "SELECT * FROM user WHERE id=:id";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute(['id'=>$id]);
        $result= $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;

    }
    public function update($id,$fname,$lname,$email,$phone){
        $sql = "UPDATE user SET first_name=:fname, last_name=:lname,email=:email,phone=:phone WHERE id=:id";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute(['fname'=>$fname,'lname'=>$lname, 'email'=>$email, 'phone'=>$phone,'id'=>$id]);
        return true;
    }
    public function delete($id){

        $sql = "DELETE * FROM user WHERE id=:id";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute(['id'=>$id]);
        return true;
    }
    public function totalRowCount($id){
        $sql = "SELECT * FROM user";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute();
       $t_rows= $stmt->rowCount();
        return $t_rows;
    }
}
// $ob = new Database;
// print_r ($ob->read());
?>