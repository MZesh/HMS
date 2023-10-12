<?php
session_start();
 include 'config/connection.php';
 $email = $password = $error="";
 if (isset($_POST['submit'])) 
 {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $encpass = md5($password);
    if(!empty($email) && !empty($password)){
        $loginquery = mysqli_query($conn, "SELECT * from users WHERE email='$email' and password='$encpass'");
        $row = mysqli_fetch_array($loginquery,MYSQLI_ASSOC); 
        $count = mysqli_num_rows($loginquery);
        
        if($count == 1) { 
            $_SESSION['email'] = $row['email'];
            $_SESSION['name'] = $row['name']; 
            $_SESSION['role'] = $row['role']; 
            
            header("location:/HMS/dashboard/admin/");
        }else {
            $error =  "Your Login Email or Password is invalid";
        }
    }else{
        $error = "Email and Password cannot be empty";
    }
 }
?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/nav.php'; ?>
<div style="height:60px;"></div> 
<div class="container mt-5 mb-5 w-full">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <div class="card mt-3 mt-5">
                <div class="card-body ">
                <div class="card-header"><h4 class="text-info text-center">HMS Login Form</h4></div>
                <?php if(!empty($error)){echo '<span class="text-danger">'.$error.'</span>';}?>
                 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                       
                        <div class="mb-3 mt-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" value="">
                          </div>
                     
                        <div class="mb-3 mt-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
                        </div>
                        
                        <div class="d-grid">
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php'; ?>