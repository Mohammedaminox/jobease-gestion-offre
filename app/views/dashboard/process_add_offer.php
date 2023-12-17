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
if (isset($_POST['submitupdate'])) {
    $id = $_POST['job_id']; // Assuming you have an input field in your form for the offer_id
    $title = $_POST['title'];
    $description = $_POST['description'];
    $company = $_POST['company'];
    $location = $_POST['location'];
    $status = $_POST['status'];
    $imagePath = $_FILES['file'];

    var_dump($imagePath);

    $targetDirectory = "../../public/upload/";
    $UpdateOffre = new Update_offre_cntrl();
    $result = $UpdateOffre->update_offre($id, $title, $description, $company, $location, $status, $imagePath);

    if ($result == 1) {
        header("Location: update_offre.php?msg=offer updated successfully&id=" . $id);
        exit;
    } else {
        echo "Error updating offer.";
    }
} else {
    echo "Error: Form not submitted.";
}
?>