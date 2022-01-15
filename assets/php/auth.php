<?php

require_once 'config.php';

class Auth extends Database{

    public function connectme(){
        $dbuser = "root";
        $dbpass = "";
       $conn=mysqli_connect("localhost",$dbuser,$dbpass,"drive");
       return $conn;
   }
   
    public function register($name,$email,$password){
        $sql="INSERT INTO users (name,email,password) VALUES (:name, :email, :pass)";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute(['name'=>$name,'email'=>$email,'pass'=>$password]);
        return true;
    }

    public function user_exist($email){
    $sql="SELECT email FROM users WHERE email =:email";    
    $stmt =$this->conn->prepare($sql);
    $stmt->execute(['email'=>$email]);
    $result =$stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
    }

    public function login($email){
        $sql="SELECT email, password FROM users WHERE email =:email";
        $stmt =$this->conn->prepare($sql);
        $stmt->execute(['email'=>$email]);
        $row =$stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function currentUser($email){
        $sql ="SELECT * FROM users WHERE email =:email";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute(['email'=>$email]);
        $row =$stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    
    }


    public function get_notes($uid){
        $sql="SELECT * FROM let WHERE uid=:uid";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute(['uid'=>$uid]);
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

}
?>