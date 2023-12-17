<?php
include("../../controllers/AdminController.php");

if (isset($_POST['submit_offre'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $company = $_POST['company'];
    $location = $_POST['location'];
    $status = $_POST['status'];
    $imagePath = $_FILES['file'];
    
    var_dump( $imagePath);
    $targetDirectory = "../../public/upload/";
    $Offre = new Add_offre_cntrl();
    $result = $Offre->add_offre($title, $description, $company, $location, $status, $imagePath);

    if ($result == 1) {
        header("Location:add_offre.php?msg=offer added successfully");
        exit;
    }
} else {
    echo "error";
}
?>