<?php 
session_start();
include '../include/header.php';
include '../include/main-content.php';
include '../include/database.php';
$error = $id =  "";
if(isset($_GET['nhosi'])){
    $id = $_GET['nhosi'];
}

if(isset($_POST['submit'])){ 
    $countfiles = count($_FILES['image']['name']);
    $id = $_POST['id'];
    $totalFileUploaded = 0;
    if($countfiles > 6)
    {
        $error = "You Can upload maximun 6 files";
    } 
    else{
        for($i=0;$i<$countfiles;$i++){
            $filename = $_FILES['image']['name'][$i];
   
            ## Location
            $location = '../uploads/'.$filename;
            $extension = pathinfo($location,PATHINFO_EXTENSION);
            $extension = strtolower($extension);
    
            $valid_extensions = array("jpg","jpeg","png","pdf","docx");
            $response = 0;
            ## Check file extension
            if(in_array(strtolower($extension), $valid_extensions)) {
                 ## Upload file
                 if(move_uploaded_file($_FILES['image']['tmp_name'][$i],$location)){
                      $totalFileUploaded++;
                      $insertStmt = $conn->prepare("INSERT INTO hostel_pic (hostel_id,images) VALUES (?,?)");
                      if($insertStmt)
                       {
                          mysqli_stmt_bind_param($insertStmt, "ss",  $id,$filename);
                          mysqli_stmt_execute($insertStmt);
                          $hostel_id = $insertStmt->insert_id;
                          $newUrl = "/HMS/dashboard/admin/hostel/";
                          echo "<script> location.href='$newUrl'; </script>";
                          }else{
                              $error= "ERROR: Could not prepare query: ";
                          }
                  }else{
                      $error= "All fields are required ";
                   }
                 }
            }
   
       }
 }

?>

<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <div class="card mt-3 mt-5">
                <div class="card-body ">
                <div class="card-header"><h4 class="text-info text-center">Hostel Registration Step 3</h4></div>
                <?php if(!empty($error)){echo '<span class="text-danger">'.$error.'</span>';}?>
                  <?php if(!empty($msg)){echo '<span class="text-success">'.$msg.'</span>';}?>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
                    
                        <div class="mb-3 mt-3">
                            <label for="formFileMultiple" class="form-label">Upload Images (Max file 6)</label>
                            <input class="form-control" type="file" name="image[]" id="formFileMultiple" multiple />
                            <input type="hidden" class="form-control" id="id"  name="id" value="<?php echo $id;?>">
                          </div>
                        
                          
                        <div class="d-grid">
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Upload & Finish</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../include/footer.php';?>