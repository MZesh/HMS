<?php  
session_start();
include '../include/database.php';

//notification mark as read query
if(isset($_GET['markasreadid']))
   {
        $id = $_GET['markasreadid']; 
        $deleteStmt = "UPDATE contact SET isread='1' WHERE  id='$id'";
        if (mysqli_query($conn, $deleteStmt)) {
            header("location:/HMS/dashboard/admin/contact-notification.php");
        } else {
         echo "ERROR: Could not prepare query: ";
        } 
   }
?>