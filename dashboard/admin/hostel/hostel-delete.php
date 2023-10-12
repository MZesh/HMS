<?php  
session_start();
include '../include/database.php';

if(isset($_GET['idhosteldelete']))
   {
    //delete hostel information e.g hostel name, price, food, incharge etc
        $id = $_GET['idhosteldelete']; 
        deletesAllFileFirst($conn,$id);
        $deleteStmt = "DELETE FROM hostel WHERE  id='$id'";
        if (mysqli_query($conn, $deleteStmt)) {
            $deletehostelinfo = "DELETE FROM hostel_info WHERE  hostel_id='$id'";
            if (mysqli_query($conn, $deletehostelinfo)) {
                $deletehostelpic = "DELETE FROM hostel_pic WHERE  hostel_id='$id'";
                if (mysqli_query($conn, $deletehostelpic)) {
                    $newUrl = "/HMS/dashboard/admin/hostel/";
                    echo "<script> location.href='$newUrl'; </script>";
                }
            }
        } else {
         echo "ERROR: Could not prepare query: ";
        } 
   }
//delete hostel images from database and from folder also
function deletesAllFileFirst($conn,$id)
{
    $query = "SELECT * FROM hostel_pic WHERE hostel_id='$id'";
       $hostel = mysqli_query($conn, $query);
       if (mysqli_num_rows($hostel) > 0) {
           while($row = mysqli_fetch_assoc($hostel)) {
              $images = $row['images'];
              $file_to_delete = '../uploads/'.$images; 
              unlink($file_to_delete);
               
        } 
    }       
}
?>