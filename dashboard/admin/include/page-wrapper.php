<?php
include 'include/database.php';
$totalhostel = $totalincharge = $totalusers = $notify = 0;
$query = "SELECT * FROM hostel ";
$hostel = mysqli_query($conn, $query);
if (mysqli_num_rows($hostel) > 0) {
    while($row = mysqli_fetch_assoc($hostel)) {
        $totalhostel++;
        $totalincharge++;    
 } 
} 
 
$querynotify = "SELECT * FROM contact WHERE isread='0' ";
$not = mysqli_query($conn, $querynotify);
if (mysqli_num_rows($not) > 0) {
    while($row = mysqli_fetch_assoc($not)) {
        $notify++;  
    } 
} 
//total users
$queryuser = "SELECT * FROM users ";
$user = mysqli_query($conn, $queryuser);
if (mysqli_num_rows($user) > 0) {
    while($row = mysqli_fetch_assoc($user)) {
        $totalusers++;   
 } 
} 
if($_SESSION['role'] === 'admin'){
?>

<div class="page-wrapper">
<div class="container-fluid"> 
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-12">
            <div class="white-box analytics-info">
                <h3 class="box-title offset-4 text-warning">Total Users</h3>
                <ul class="list-inline two-part d-flex align-items-center mb-0">
                    <li>
                        <div id="sparklinedash"><canvas width="67" height="30"
                                style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                        </div>
                    </li>
                    <li class="offset-2">
                        <a href="#" class="btn btn-warning">
                            <i class="fa fa-user"> </i><span class="badge badge-light"><?php echo $totalusers;?></span>
                            <span class="sr-only">total users</span>
                        </a>
                    </li> 
                </ul>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="white-box analytics-info">
                <h3 class="box-title  offset-4 text-warning">Total Hostels</h3>
                <ul class="list-inline two-part d-flex align-items-center mb-0">
                    <li>
                        <div id="sparklinedash2"><canvas width="67" height="30"
                                style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                        </div>
                    </li>
                    <li class="offset-2">
                        <a href="#" class="btn btn-warning">
                            <i class="fa fa-home"> </i><span class="badge badge-light"><?php echo $totalhostel;?></span>
                            <span class="sr-only">total hostel</span>
                        </a>
                    </li> 
                </ul>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="white-box analytics-info">
                <h3 class="box-title offset-2 text-warning">Total Hostel Incharges</h3>
                <ul class="list-inline two-part d-flex align-items-center mb-0">
                    <li>
                        <div id="sparklinedash3"><canvas width="67" height="30"
                                style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                        </div>
                    </li>
                    <li class="offset-2">
                        <a href="#" class="btn btn-warning">
                            <i class="fa fa-tasks"> </i><span class="badge badge-light"><?php echo $totalincharge;?></span>
                            <span class="sr-only">total wardans</span>
                        </a>
                    </li> 
                </ul>
            </div>
        </div>
    </div>
    
    <div class="container-fluid"> 
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Contact Users Notification</h3>
                <a href="/HMS/dashboard/admin/contact-notification.php" class="btn btn-primary ">
                <i class="fa fa-bell"> </i><span class="badge badge-light"><?php echo $notify;?></span>
                <span class="sr-only">unread messages</span>
            </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">View/Change Hostel only</h3>
                <a href="/HMS/dashboard/admin/notification/hostel-info.php?incharge=098jIwdXdeewerinc&JWEBD=MJUYYIINN" class="btn btn-info m-2">
                    Seat Available, Food , Price
                <span class="sr-only">Hostel Info</span>
            </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">View/Change Incharge</h3>
                    
                    <a href="/HMS/dashboard/admin/notification/incharge-info.php?incharge=098jIwdXdeewerinc&JWEBD=MJUYYIINN" class="btn btn-success m-2">
                        Hostel Incharges Information
                        <span class="sr-only">Incharge Info</span>
                    </a>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="white-box">
            
                <h3 class="box-title">Future Upgradation</h3>
                    <!-- AREA FOR CHART -->
                    
            </div>
        </div>
    </div>
    
    
</div> 
        <?php }
         else if($_SESSION['role'] === 'student'){
            include 'include/student-dashboard.php';
         }
         else if($_SESSION['role'] === 'wardan'){
            include 'include/wardan-dashboard.php';
         }
        ?>

        