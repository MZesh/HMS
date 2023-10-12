<?php 
session_start();
include '../include/header.php';
include '../include/main-content.php';
include '../include/database.php';
?>
<div class="row offset-3"> 
  <h3 class="text-info offset-3 mt-4">Hostel View & Information</h3>
    <div class="col-md-1">
    <div class="text-center">
    <?php
        $id = $_GET['idhostel'];
        $query = "SELECT hostel.id, hostel.name,hostel.incharge,hostel.incharge_contact,hostel.address,hostel_info.price,
        hostel_info.food,hostel_info.seater,hostel_pic.images FROM hostel  JOIN hostel_info
        ON hostel.id = hostel_info.hostel_id
        JOIN hostel_pic ON hostel_info.hostel_id = hostel_pic.hostel_id WHERE hostel.id='$id'";
        $result = mysqli_query($conn,$query); $i=1;
        $hostel=$location=$wardan=$seater=$price=$incharge_contact=$food="";
        while ($row = mysqli_fetch_assoc($result))  
         { 
            $hostel = $row["name"];
            $wardan = $row["incharge"];
            $location = $row["address"];
            $seater = $row["seater"];
            $price = $row["price"];
            $food = $row["food"];
            $incharge_contact = $row['incharge_contact'];
            $lists = explode(',',$seater);
            $rooms = array_filter($lists);
            ?>
            
         <img src="../uploads/<?php echo $row['images'];?>" class="image rounded mt-2 img<?php echo $i++;?>"  style="cursor:pointer" width="79px" height="84px" alt="...">
       <?php }?>
    </div>
    </div>
    <div class="col-md-7 offset-1">
      <div class="row">
        <div class="col-md-10">
        <img src="../uploads/" class="rounded mt-2 display" height="454px" width="450px" style="cursor:pointer"  alt="..." data-toggle="modal" data-target="#exampleModal">
        </div>
        <div class="col-md-2 mt-4"> 
            <h5 style="width:300px">Hostel Name : <span class="text-info"><?php echo $hostel;?></span></h5><hr class="hr"style="width:300px" />
            <h5 style="width:300px">Hostel Adress : <span class="text-info"><?php echo $location;?></span></h5><hr class="hr"style="width:300px" />
            <h5 style="width:300px" >Available Room (Seater) : <span class="text-info"><?php 
              foreach($rooms as $room){
                echo $room." (Seater) "; //ltrim($incharge_contact,'0')
              }
            ?></span></h5><hr class="hr"style="width:300px" />
            <h5 style="width:300px">Price Per Head : <span class="text-info">PKR <?php echo $price;?></span></h5><hr class="hr"style="width:300px" />
            <h5 style="width:300px">Food : <span class="text-info"><?php echo $food;?></span></h5><hr class="hr"style="width:300px" />
            <h5 style="width:300px">Hostel Wardan Contact No : <span class="text-info"><?php echo $incharge_contact;?></span></h5><hr class="hr"style="width:300px" />
            <a href="https://wa.me/92<?php echo ltrim($incharge_contact,'0');?>" target="_blank" style="position:fixed;bottom:40px;right:20px;"><img src="/HMS/assets/img/whatsapp.png" class="mt-2" width="50px"></a>
        </div>
      </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Preview</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <img src="../uploads/" class="rounded mt-2 display"  style="cursor:pointer" width="475px"  alt="zoomed image" data-toggle="modal" data-target="#exampleModal">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         
      </div>
    </div>
  </div>
</div>
<?php include '../include/footer.php';?>