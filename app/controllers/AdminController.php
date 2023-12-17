<?php
// include("../configg/connectDatabase.php");

Class Add_offre_cntrl{

    private $conn ;

    public function __construct(){
        $this->conn = new mysqli("localhost","root","","easyjobs");
           if ($this->conn->connect_error){
            die("connection failed:".$this->conn->connect_error);
           }
    }

    function add_offre($title, $description ,$company, $location , $status , $image){
        $des = "C:/xampp/htdocs/jobease-php-oop-master/public/upload/";
        $upload_dir = __DIR__."../public/upload/";
        $imagePath = addslashes(uniqid('IMG-', true).basename($image["name"]));
        

        if (move_uploaded_file($image["tmp_name"], $des.$imagePath)) {
            $sql = "INSERT INTO jobs ( `title`, `description`, `company`, `location`, `status`, `image_path`) VALUES ('$title', '$description', '$company', '$location', '$status' ,'$imagePath')";
            $result = $this->conn->query($sql);
            
            if($result){
                return 1; 
            } 
        } 
    }
}
class Update_offre_cntrl
{
    private $conn;

    public function __construct()
    {
        $this->conn = new mysqli("localhost", "root", "", "easyjobs");
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    function update_offre($id, $title, $description, $company, $location, $status, $image)
    {
        $des = "C:/xampp/htdocs/jobease-php-oop-master/public/upload/";
        $upload_dir = __DIR__ . "../public/upload/";
        $imagePath = addslashes(uniqid('IMG-', true) . basename($image["name"]));

        if (move_uploaded_file($image["tmp_name"], $des . $imagePath)) {
            $sql = "UPDATE jobs SET `title`='$title', `description`='$description', `company`='$company', `location`='$location', `status`='$status', `image_path`='$imagePath' WHERE `id`='$id'";
            $result = $this->conn->query($sql);

            if ($result) {
                return 1;
            }
        }
    }
}



?>