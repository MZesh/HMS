<?php 
session_start();  
include '../include/database.php';
include '../include/header.php';
include '../include/main-content.php';

//update hostel price, food, seat available only
if(isset($_POST['submit'])){
    $price =$_POST['price'];
    $food =$_POST['food']; 
    $id =$_POST['id'];
    $one = $_POST['one']; 
    $two = $_POST['two'];
    $three = $_POST['three'];
    $four = $_POST['four']; 
    $seater = $one.",".$two.",".$three.",".$four;

    $updatestmt = "UPDATE hostel_info SET price='$price' , food='$food', seater='$seater' WHERE  hostel_info_id='$id'";
    if (mysqli_query($conn, $updatestmt)) {
        $newUrl = "/HMS/dashboard/admin/notification/hostel-info.php";
            echo "<script> location.href='$newUrl'; </script>";
        
    } else {
     echo "ERROR: Could not prepare query: ";
    } 
}
?> 