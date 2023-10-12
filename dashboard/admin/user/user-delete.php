<?php  
session_start();
include '../include/database.php';

if(isset($_GET['user_id']))
   {
        $id = $_GET['user_id']; 
        $deleteStmt = "DELETE FROM users WHERE  id='$id'";
        if (mysqli_query($conn, $deleteStmt)) {
            header("location:/HMS/dashboard/admin/user/user-view.php");
        } else {
         echo "ERROR: Could not prepare query: ";
        } 
   }
?>