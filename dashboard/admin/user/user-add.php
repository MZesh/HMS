<?php 
error_reporting(0);
session_start();
include '../include/header.php';
include '../include/main-content.php';
include '../include/database.php';

$name=$email=$contact=$address=$error=$success=$passError=$check= "";
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $role = $_POST['role'];

    //check validation
    if(!empty($name) && !empty($email) && !empty($contact) && !empty($address) && !empty($password) && !empty($cpassword)){
       if($password === $cpassword){
        $checkemail = checkforEmail($email,$conn);
        if(!empty($checkemail)){
            $check .= $checkemail;
        }else{
            $insertStmt = $conn->prepare("INSERT INTO users (name,email,contact,address,password,role) VALUES (?,?,?,?,?,?)");
            if($insertStmt)
            {
                mysqli_stmt_bind_param($insertStmt, "ssssss",  $name,$email,$contact,$address,md5($password),$role);
                mysqli_stmt_execute($insertStmt);
                $msg= "SUCCESS: User has been registered ";
            }else{
                $msg= "ERROR: Could not prepare query: ";
            }
        }
       
       }else{
        $passError = "Password and Confirm Password did not match..";
       }
    }else{
        $error = "Please fill all the required fields (All fields are required)";
    }
 }

 //check for email
 function checkforEmail($email,$conn) { 
        $useremail = mysqli_query($conn, "SELECT * from users WHERE email = '$email'");
        if (mysqli_num_rows($useremail) > 0) {
            return "Email already exits or taken..";
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
                <?php if(!empty($error)){echo '<span class="text-danger">'.$error.'</span>';}?>
                <?php if(!empty($passError)){echo '<span class="text-danger">'.$passError.'</span>';}?>
                <?php if(!empty($msg)){echo '<span class="text-success">'.$msg.'</span>';}?>
                <?php if(!empty($check)){echo '<span class="text-danger">'.$check.'</span>';}?>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                        <div class="mb-3 mt-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="<?php echo $name;?>">
                        
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
                            <label for="cpassword" class="form-label">Confirm Password:</label>
                            <input type="password" class="form-control" id="cpassword" placeholder="Enter password again" name="cpassword">
                        </div>
                        <div class="mb-3 mt-3">
                                <select class="form-select" name="role" aria-label="Default select example">
                                    
                                    <option value="admin" selected> Admin</option>
                                    <option value="student" >Student</option> 
                                    <option value="wardan" >Wardan</option> 
                                     
                                </select>
                            </div>
                        <div class="d-grid">
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include '../include/footer.php';?>

