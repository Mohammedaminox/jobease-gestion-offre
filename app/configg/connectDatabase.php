<?php

class Connection{
    public $host = "localhost";
    public $user = "root";
    public $password = "";
    public $database = "easyjobs";
    public $conn;

    public function __construct(){
        $this->conn = new mysqli("localhost","root","","easyjobs");
           if ($this->conn->connect_error){
            die("connection failed:".$this->conn->connect_error);
           }
    }
    

}

?>

