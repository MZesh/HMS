<?php include 'includes/header.php'; ?>
<?php include 'includes/nav.php'; ?>
<?php include 'config/connection.php'; 
if(!isset($_SESSION['email'])){
    $newUrl = "/HMS/login.php";
    echo "<script> location.href='$newUrl'; </script>";
}else{
    $newUrl = "/HMS/dashboard/admin/hostel/hostel-view.php?idhostel=".$_GET['idhostel']."&MXNR=sff44554nfiuhevmvihue90rvov";
    echo "<script> location.href='$newUrl'; </script>";
}


?>


<?php include 'includes/footer.php'; ?>