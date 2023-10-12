<?php 
session_start();
error_reporting(0);
include '../include/header.php';
include '../include/main-content.php';
include '../include/database.php';
$food = $price = $error = $msg = "";
$id = $_GET['nhi'];
if(isset($_POST['submit'])){
    $food = $_POST['food'];
    $price = $_POST['price']; 
    $one = $_POST['one']; 
    $two = $_POST['two'];
    $three = $_POST['three'];
    $four = $_POST['four'];
    $hostel_id = $_POST['id'];
    $seater = $one.",".$two.",".$three.",".$four;
    if(!empty($food) && !empty($price) ){
        $insertStmt = $conn->prepare("INSERT INTO hostel_info (hostel_id,seater,price,food) VALUES (?,?,?,?)");
        if($insertStmt)
         {
            mysqli_stmt_bind_param($insertStmt, "ssss",  $hostel_id,$seater,$price,$food);
            mysqli_stmt_execute($insertStmt);
            $newId = $insertStmt->insert_id;
            $result = mysqli_query($conn,"SELECT * FROM hostel_info WHERE hostel_info_id='$newId'"); 
            $row = mysqli_fetch_assoc($result);
            $newUrl = "/HMS/dashboard/admin/hostel/hostel-add-step-three.php?nhosi=".$row['hostel_id']."&MXNRVBN453=sff44554nfiuhevmvihue90rvov";
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
                <div class="card-header"><h4 class="text-info text-center">Hostel Registration Step 2</h4></div>
                <?php if(!empty($error)){echo '<span class="text-danger">'.$error.'</span>';}?>
                  <?php if(!empty($msg)){echo '<span class="text-success">'.$msg.'</span>';}?>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                    
                        <div class="mb-3 mt-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" class="form-control" id="price" placeholder="Enter Price per head" name="price" value="<?php echo $price;?>">
                            <input type="hidden" class="form-control" id="id"  name="id" value="<?php echo $id;?>">
                          </div>
                        
                          <div class="mb-3 mt-3">
                            <label for="food" class="form-label">Food</label>
                            <select class="form-select" id="food" name="food" aria-label="Default select example"> 
                                <option value="yes" selected> Yes</option>
                                <option value="no" >No</option>      
                            </select>
                        </div>
                        <div class="mb-3 mt-3">
                             <label  class="form-label">Available Room</label><br>
                            <label for="one" class="form-label">1 Seater</label>
                            <input class="form-check-input" type="checkbox" id="mySwitch" name="one" value="1">
                            <label for="two" class="form-label">2 Seater</label>
                            <input class="form-check-input" type="checkbox" id="mySwitch" name="two" value="2">
                            <label for="three" class="form-label">3 Seater</label>
                            <input class="form-check-input" type="checkbox" id="mySwitch" name="three" value="3">
                            <label for="four" class="form-label">4 Seater</label>
                            <input class="form-check-input" type="checkbox" id="mySwitch" name="four" value="4">
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