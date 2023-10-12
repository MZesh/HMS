<?php 
session_start();  
include '../include/database.php';
include '../include/header.php';
include '../include/main-content.php';

//update hostel single information incharge name , incharge contact, uploader email 
if(isset($_POST['submit'])){
    $uploaded_by =$_POST['uploaded_by'];
    $incharge =$_POST['incharge'];
    $incharge_contact =$_POST['incharge_contact'];
    $id =$_POST['id'];

    $updatestmt = "UPDATE hostel SET incharge='$incharge' , incharge_contact='$incharge_contact', uploaded_by='$uploaded_by' WHERE  id='$id'";
    if (mysqli_query($conn, $updatestmt)) {
        $newUrl = "/HMS/dashboard/admin/notification/incharge-info.php";
            echo "<script> location.href='$newUrl'; </script>";
        
    } else {
     echo "ERROR: Could not prepare query: ";
    } 
}
?> 