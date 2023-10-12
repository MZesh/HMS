 <?php
 include 'config/connection.php';
 $error = $name = $email = $subject = $message =$msg ="";
 if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];
  $isread = 0;

  if(!empty($name) && !empty($email) && !empty($subject) && !empty($message)){
    $insertStmt = $conn->prepare("INSERT INTO contact (name,email,subject,message,isread) VALUES (?,?,?,?,?)");
    if($insertStmt)
        {
            mysqli_stmt_bind_param($insertStmt, "ssssi",  $name,$email,$subject,$message,$isread);
            mysqli_stmt_execute($insertStmt);
            $msg= "SUCCESS: Message has been sent: ";
        }else{
            $msg= "ERROR: Could not prepare query: ";
        }
  }else{
    $error = "Please fill all the fields";
  }
 }
 ?>
 
 <section id="contact" class="contact section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Contact Us</h2>
          <p> You can contact us any time any where. Please fill the following form and leave us message. Our team member contact with you soon</p>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="contact-about">
              <h3>HMS</h3>
              <p>You can also follow us in social media we have given our social media link below. You can also contact with us using social media.</p>
              <div class="social-links">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info">
              <div>
                <i class="bi bi-geo-alt"></i>
                <p>XYZ Street<br>KPK, Peshawar</p>
              </div>

              <div>
                <i class="bi bi-envelope"></i>
                <p>info@example.com</p>
              </div>

              <div>
                <i class="bi bi-phone"></i>
                <p>+9230000000000</p>
              </div>

            </div>
          </div>

          <div class="col-lg-5 col-md-12">
            <h4 class="text-center text-danger"><?php echo $error;?></h4>
            <h4 class="text-center text-success"><?php echo $msg;?></h4>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" class="php-email-form">
              <div class="form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" value="<?php echo $name;?>">
              </div>
              <div class="form-group mt-3">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" value="<?php echo $email;?>">
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" value="<?php echo $subject;?>">
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" ><?php echo $message;?></textarea>
              </div>
              <div class="form-group mt-3">
                <div class="text-center"><input type="submit" name="submit" value="Send Message" class="btn btn-primary"></div>
              </div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Us Section -->
