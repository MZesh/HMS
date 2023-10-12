<?php 
session_start();
include '../include/header.php';
include '../include/main-content.php';
include '../include/database.php';

$address = $incharge = $name = $incharge_contact = $error = $msg = "";
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $incharge = $_POST['incharge']; 
    $address = $_POST['address']; 
    $uploaded_by = $_SESSION['email'];
    $incharge_contact = $_POST['incharge_contact'];
    if(!empty($name) && !empty($incharge) &&  !empty($address) ){
        $insertStmt = $conn->prepare("INSERT INTO hostel (name,incharge,incharge_contact,uploaded_by,address) VALUES (?,?,?,?,?)");
        if($insertStmt)
         {
            mysqli_stmt_bind_param($insertStmt, "sssss",  $name,$incharge,$incharge_contact,$uploaded_by,$address);
            mysqli_stmt_execute($insertStmt);
            $hostel_id = $insertStmt->insert_id;
            $newUrl = "/HMS/dashboard/admin/hostel/hostel-add-step-two.php?nhi=".$hostel_id."&MXNR=sff44554nfiuhevmvihue90rvov";
            echo "<script> location.href='$newUrl'; </script>";
            }else{
                $error= "ERROR: Could not prepare query: ";
            }
    }else{
        $error= "All fields are required ";
     }
}
?>
<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <div class="card mt-3 mt-5">
                <div class="card-body ">
                <div class="card-header"><h4 class="text-info text-center">Hostel Registration Step 1</h4></div>
                <?php if(!empty($error)){echo '<span class="text-danger">'.$error.'</span>';}?>
                  <?php if(!empty($msg)){echo '<span class="text-success">'.$msg.'</span>';}?>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                        <div class="mb-3 mt-3">
                            <label for="name" class="form-label">Hostel Name:</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter Hostel Name" name="name" value="<?php echo $name;?>">
                        
                        </div>
                     
                        <div class="mb-3 mt-3">
                            <label for="incharge" class="form-label">Hostel Incharge Name:</label>
                            <input type="text" class="form-control" id="incharge" placeholder="Enter incharge Name" name="incharge" value="<?php echo $incharge;?>">
                          </div>
                          <div class="mb-3 mt-3">
                            <label for="incharge_contact" class="form-label">Hostel Incharge Contact:</label>
                            <input type="text" class="form-control" id="incharge_contact" placeholder="Enter incharge Whatsapp Number" name="incharge_contact" value="<?php echo $incharge_contact;?>">
                          </div>
                        <div class="mb-3">
                            <label for="address">Address:</label>
                            <textarea class="form-control" rows="5" id="address" name="address"><?php echo $address;?></textarea>
                          </div>
                        
                        <div class="d-grid">
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Next</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include '../include/footer.php';?>