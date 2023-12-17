<?php
session_start();
include('../../configg/connectDatabase.php');
$connection = new Connection();
$conn = $connection->conn;

if(isset($_POST['submit'])){
    $id=$_SESSION['id_user'];
    $job_id=$_POST['job_id'];
    if(!$id){
        header('location:../auth/login.php');
        exit();
    }else{
        $selct="SELECT * from apply where user_id=$id and job_id=$job_id ";
        $res=mysqli_query($conn,$selct);
        if(mysqli_num_rows($res)>0){
            echo "<script>alert('You have already applied')</script>";
        }else{
            header("location:../index.php");

            $query="INSERT INTO apply VALUES(null, $job_id, $id, 'not approved')";
            mysqli_query($conn, $query);
        }
    }
}
?>