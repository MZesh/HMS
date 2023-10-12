<?php 
session_start();
include '../include/header.php';
include '../include/main-content.php';
include '../include/database.php';

//define variables

$name=$email=$contact=$address=$error=$success= $role="";
if(isset($_GET['user_id']))
{
    $id = $_GET['user_id']; 
   $user = mysqli_query($conn, "SELECT * from users WHERE id='$id'");
    if (mysqli_num_rows($user) > 0) {
        while($row = mysqli_fetch_assoc($user)) {
            $name = $row['name'];
            $email = $row['email'];
            $address = $row['address'];
            $contact = $row['contact']; 
            $role = $row['role']; 
        }   
    }
}

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $password = $_POST['password']; 
    $role = $_POST['role'];
    $id = $_POST['id']; 
    $updateStmt = "UPDATE users SET  name='$name',email='$email',contact='$contact',address='$address',password='$password' ,role='$role' WHERE  id='$id'";
      if (mysqli_query($conn, $updateStmt)) {
        header("location:/HMS/dashboard/admin/user/user-view.php");
        
      } else {
        $updateMsg = "ERROR: Could not prepare query: ";
      }
 }
?>

<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <div class="card mt-3 mt-5">
                <div class="card-body ">
                <div class="card-header"><h4 class="text-info text-center">HMS Add User</h4></div>
               <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                        <div class="mb-3 mt-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="<?php echo $name;?>">
                            <input type="hidden" value="<?php echo $id?>" name="id">
                        </div>
                     
                        <div class="mb-3 mt-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" value="<?php echo $email;?>">
                          </div>
                       
                        <div class="mb-3">
                            <label for="contact" class="form-label">Contact:</label>
                            <input type="text" class="form-control" id="contact" placeholder="Enter contact no" name="contact" value="<?php echo $contact;?>">
                          
                        </div>
                         
                        <div class="mb-3">
                            <label for="address">Address:</label>
                            <textarea class="form-control" rows="5" id="address" name="address"><?php echo $address;?></textarea>
                          </div>
                        <div class="mb-3 mt-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
                         </div>
                       
                        <div class="mb-3 mt-3">
                                <select class="form-select" name="role" aria-label="Default select example">
                                    
                                    <option value="admin" <?php if($role === 'admin'){ echo "selected";} ?>> Admin</option>
                                    <option value="student" <?php if($role === 'student'){ echo "selected";} ?> >Student</option> 
                                    <option value="wardan" <?php if($role === 'wardan'){ echo "selected";} ?> >Wardan</option> 
                                     
                                </select>
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

<?php include '../include/footer.php'?>