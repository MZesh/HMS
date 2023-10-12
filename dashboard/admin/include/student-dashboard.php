<div class="row mt-2">
    <div class="col-md-4"></div>
    <div class="col-md-5">
    <h4 class="text-info text-center">Search For Hostel</h4>
    <form action="search/hostel-search.php" method="GET">
    <div class="form-group"> 
        <input type="search" class="form-control" name="search"  aria-describedby="searchHelp" placeholder="Search using hostel  name or location">
        </div> 
     
    </form>
    </div>
    <div class="col-md-3"></div>
</div>
<div class="">
    <div class="row offset-3">  
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
                            <a href="/HMS/dashboard/admin/hostel/hostel-view.php?idhostel=<?php echo $row['id'];?>&SECT098=VFXG45$#<?php echo $row['price'];?>"><img class="card-img-top" src="uploads/<?php  echo $row['images'];?>" width="196px" height="150px" alt="Card image cap"></a>
                            <h5 class="card-title">Hostel Name: <?php echo substr($row['name'],0,8); ?></h5>
                            <p class="card-text">Address: <?php echo substr($row['address'],0,8); ?></p>
                            
                            <div class="d-grid gap-2">
                                <a href="/HMS/dashboard/admin/hostel/hostel-view.php?idhostel=<?php echo $row['id'];?>&SECT098=VFXG45$#<?php echo $row['price'];?>" class="btn btn-info  mt-1"><i class="fa fa-eye"></i> View</a>   
                            </div> 
                            
                        </div>
                    </div>
                </div> 
            </div>
        <?php }?>
    </div>
 </div>