<?php 
session_start();
error_reporting(0);
include '../include/header.php';
include '../include/main-content.php';
include '../include/database.php';

$address = $incharge = $name = $price = $food = $images = $display = $seater = $list = $error = $msg = "";
//get all the information about the hostel
if(isset($_GET['idhosteledit']))
 {
    $id = $_GET['idhosteledit']; 
    $query = "SELECT hostel.id, hostel.name,hostel.incharge,hostel.address,hostel_info.price,
    hostel_info.food,hostel_info.seater FROM hostel  JOIN hostel_info
    ON hostel.id = hostel_info.hostel_id
     WHERE hostel.id='$id'";
    $user = mysqli_query($conn, $query);
    if (mysqli_num_rows($user) > 0) {
        while($row = mysqli_fetch_assoc($user)) {
            $name = $row['name'];
            $incharge = $row['incharge'];
            $address = $row['address'];
            $price = $row['price']; 
            $food = $row['food']; 
            $seater = $row['seater'];
            $list = explode(',',$seater);
           
                                          
        }   
    }
 }

 //edit or change all the information of hostel
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $incharge = $_POST['incharge']; 
    $address = $_POST['address']; 
    $id = $_POST['id'];
    $one = $_POST['one']; 
    $two = $_POST['two'];
    $three = $_POST['three'];
    $four = $_POST['four']; 
    $seater = $one.",".$two.",".$three.",".$four;
    $food = $_POST['food'];
    $price = $_POST['price']; 
    
    if(!empty($name) && !empty($incharge) &&  !empty($address) ){
        $updateStmt = "UPDATE hostel SET  name='$name',incharge='$incharge',address='$address' WHERE  id='$id'";
        if (mysqli_query($conn, $updateStmt)) {
            $updateinfo = "UPDATE hostel_info SET  seater='$seater',price='$price',food='$food' WHERE  hostel_id='$id'";
            if (mysqli_query($conn, $updateinfo)) {
                $newUrl = "/HMS/dashboard/admin/hostel/";
                echo "<script> location.href='$newUrl'; </script>";
            }
        } else {
          $error = "ERROR: Could not prepare query: ";
        }
    }else{
        $error= "All fields are required ";
     }
}
?>
?>
<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <div class="card mt-3 mt-5">
                <div class="card-body ">
                <div class="card-header"><h4 class="text-info text-center">Hostel Info</h4></div>
                <?php if(!empty($error)){echo '<span class="text-danger">'.$error.'</span>';}?>
                  <?php if(!empty($msg)){echo '<span class="text-success">'.$msg.'</span>';}?>
                  
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" >
                           
                     <div class="mb-3 mt-3">
                            <label for="name" class="form-label">Hostel Name:</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter Hostel Name" name="name" value="<?php echo $name;?>">
                            <input type="hidden" class="form-control" id="id"  name="id" value="<?php echo $id;?>">
                            
                        </div>
                     
                        <div class="mb-3 mt-3">
                            <label for="incharge" class="form-label">Wardan:</label>
                            <input type="text" class="form-control" id="incharge" placeholder="Enter incharge Name" name="incharge" value="<?php echo $incharge;?>">
                          </div>
                        
                        <div class="mb-3">
                            <label for="address">Address:</label>
                            <textarea class="form-control" rows="5" id="address" name="address"><?php echo $address;?></textarea>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" class="form-control" id="price" placeholder="Enter Price per head" name="price" value="<?php echo $price;?>">
                            <input type="hidden" class="form-control" id="id"  name="id" value="<?php echo $id;?>">
                          </div>
                        
                          <div class="mb-3 mt-3">
                            <label for="food" class="form-label">Food</label>
                            <select class="form-select" id="food" name="food" aria-label="Default select example"> 
                                <option value="yes" <?php if($food == 'yes'){echo "selected";}?>> Yes</option>
                                <option value="no" <?php if($food == 'no'){echo "selected";}?>>No</option>      
                            </select>
                        </div>
                        <div class="mb-3 mt-3">
                             <label  class="form-label">Select Seater</label><br>
                            <label for="one" class="form-label">1 Seater</label>
                            <input class="form-check-input" type="checkbox" id="mySwitch" name="one" value="1" <?php if(in_array('1',$list)){echo "checked='checked'";}?>>
                            <label for="two" class="form-label">2 Seater</label>
                            <input class="form-check-input" type="checkbox" id="mySwitch" name="two" value="2" <?php if(in_array('2',$list)){echo "checked='checked'";}?>>
                            <label for="three" class="form-label">3 Seater</label>
                            <input class="form-check-input" type="checkbox" id="mySwitch" name="three" value="3" <?php if(in_array('3',$list)){echo "checked='checked'";}?>>
                            <label for="four" class="form-label">4 Seater</label>
                            <input class="form-check-input" type="checkbox" id="mySwitch" name="four" value="4" <?php if(in_array('4',$list)){echo "checked='checked'";}?>>
                        </div>
                       
                        <div class="d-grid">
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Update</button>
                        </div>
                        
                    </form>
                     
                </div>
            </div>
        </div>
    </div>
</div>
<?php include '../include/footer.php';?>