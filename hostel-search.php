<?php include 'includes/header.php'; 
 include 'includes/nav.php';  
 include 'config/connection.php'; 
 
 $msg = $noresult = "";

//search hostel query .. it will search and display the search hostel by hostel name or by location
if(isset($_GET['search'])){
    $search = $_GET['search'];
    $query = "SELECT hostel.id, hostel.name,hostel.uploaded_by,hostel.incharge,hostel.address,hostel_info.price,
    hostel_info.food,hostel_info.seater,hostel_pic.images FROM hostel  JOIN hostel_info
    ON hostel.id = hostel_info.hostel_id
     JOIN hostel_pic ON hostel_info.hostel_id = hostel_pic.hostel_id WHERE name like '%".$search."%' OR address like '%".$search."%' GROUP BY hostel_pic.hostel_id";
  //  $query="SELECT * FROM hostel WHERE name like '%".$search."%' OR address like '%".$search."%'";
    $qres = mysqli_query($conn, $query);
    $count = mysqli_num_rows($qres);
    if($count > 0){
         $msg = "Search results for ".$search;
    }else{
        $noresult = "No result found for your search ".$search;
    }   
}
 
?>
 
<div class="row mt-5">
     
    <div class="col-md-5 offset-4 mt-5">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="GET">
            <div class="form-group"> 
                <input type="search" class="form-control" name="search"  aria-describedby="emailHelp" placeholder="Search using hostel  name or location">
            </div>  
        </form>
    </div>
</div>

<div class="row">
    <?php if(!empty($msg)){?>
        <h3 class="text-success offset-2"> <?php echo $msg; ?></h3>
    <?php
    }
        while ($row = mysqli_fetch_assoc($qres)){
            $lists = explode(',',$row['seater']);
            $rooms = array_filter($lists);
    ?> 
    <div class="col-sm-6">
        <div class="card mt-3 "> 
            <div class="card-body">
                <div class="card-header"> 
                    <h5 class="text-info text-center">Available Rooms <?php 
                        foreach($rooms as $room){
                            echo $room." (Seater) ";
                        }
                    ?></h5>
                    <a href="/HMS/hostel-view.php?idhostel=<?php echo $row['id'];?>&SECT098=VFXG45$#<?php echo $row['price'];?>"><img class="card-img-top" src="/HMS/dashboard/admin/uploads/<?php  echo $row['images'];?>" width="160px" height="200px" alt="Card image cap"></a>
                    <h5 class="card-title">Hostel Name: <?php echo $row['name']; ?></h5>
                    <p class="card-text">Address: <?php echo $row['address']; ?></p>
                    
                </div>
            </div>
        </div> 
                    
    </div>
                 
    <?php }
     if(!empty($noresult)){
    ?>
        <h3 class="text-danger offset-1 mt-4"> <?php echo $noresult; ?></h3>
    <?php }?>
      
</div>
 
<?php include 'includes/footer.php'; ?>