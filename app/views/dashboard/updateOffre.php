<?php
include("../../configg/connectDatabase.php");
session_start();
if(isset($_SESSION['id_user'])){
    $idUser = $_SESSION['id_user'];
}else{
    header("location:../auth/login.php");
}

$connection = new Connection();
$conn = $connection->conn;

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sqlup="SELECT * FROM jobs WHERE job_id='$id'";
    $query=mysqli_query($conn,$sqlup);
    $rows=mysqli_fetch_assoc($query);

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Offer</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    form {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 300px;
    }

    label {
        display: block;
        margin-bottom: 8px;
    }

    input,
    textarea {
        width: 100%;
        padding: 8px;
        margin-bottom: 16px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    input[type="submit"] {
        background-color: blue;
        color: #fff;
        cursor: pointer;
        border: none;
        border-radius: 4px;
        padding: 10px 15px;
        font-size: 16px;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }
    </style>
</head>

<body>


    <form method="POST" action="process_add_offer.php?id=<?php echo $id?>" enctype="multipart/form-data">
        <label for="file">Image:</label>
        <input type="file" id="file" name="file" required><br>

        <label for=" title">Title:</label>
        <input type="text" id="title" name="title"  value="<?php 
                        echo $rows['title'];
                     ?>" required><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="4" required><?php echo $rows['description']; ?></textarea><br>

        <label for="company">Company:</label>
        <input type="text" id="company" name="company"  value="<?php 
                        echo $rows['company'];
                     ?>" required><br>

        <label for="location">Location:</label>
        <input type="text" id="location" name="location"  value="<?php 
                        echo $rows['location'];
                     ?>" required><br>

        <label for="status">Status:</label>
        <input type="text" id="status" name="status"  value="<?php 
                        echo $rows['status'];
                     ?>" required><br>

        <input type="submit" name="submitupdate" value="update Offer">
    </form>


</body>

</html>