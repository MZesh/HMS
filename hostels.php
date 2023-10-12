<?php include 'includes/header.php'; ?>
<?php include 'includes/nav.php'; ?>
<?php include 'config/connection.php'; ?>

<div class="row mt-5">
    <div class="col-md-4"></div>
    <div class="col-md-5">
        <h4 class="text-info text-center">View Hostel Using Search</h4>
        <form action="hostel-search.php" method="GET">
            <div class="form-group"> 
                <input type="search" class="form-control" name="search"  aria-describedby="searchHelp" placeholder="Search using hostel  name or location">
            </div>  
        </form>
    </div>
    <div class="col-md-3"></div>
</div>
<!-- hostels informations -->
<div class="">
    <div class="row">  
    <?php
        $query = "SELECT hostel.id, hostel.name,hostel.uploaded_by,hostel.incharge,hostel.address,hostel_info.price,
        hostel_info.food,hostel_info.seater,hostel_pic.images FROM hostel  JOIN hostel_info
        ON hostel.id = hostel_info.hostel_id
        JOIN hostel_pic ON hostel_info.hostel_id = hostel_pic.hostel_id GROUP BY hostel_pic.hostel_id";
        $result = mysqli_query($conn,$query); 
        while ($row = mysqli_fetch_assoc($result)) 
            { 
                $lists = explode(',',$row['seater']);
                $rooms = array_filter($lists);
            ?> 
            <div class="col-sm-4">
                <div class="card mt-3 "> 
                    <div class="card-body">
                        <div class="card-header">
                            <h4 class="text-info text-center">Seater <?php
                                foreach($rooms as $room){
                                    echo $room." ";
                                  }
                            ?></h4>
                            <a href="/HMS/hostel-view.php?idhostel=<?php echo $row['id'];?>&SECT098=VFXG45$#<?php echo $row['price'];?>"><img class="card-img-top" src="/HMS/dashboard/admin/uploads/<?php  echo $row['images'];?>" width="196px" height="150px" alt="Card image cap"></a>
                            <h5 class="card-title">Hostel Name: <?php echo substr($row['name'],0,8); ?></h5>
                            <p class="card-text">Address: <?php echo substr($row['address'],0,15); ?></p>
                            
                            
                        </div>
                    </div>
                </div> 
            </div>
        <?php }?>
    </div>
 </div>
<?php include 'includes/footer.php'; ?>