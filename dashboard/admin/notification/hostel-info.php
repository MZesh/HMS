<?php 
session_start();  
include '../include/database.php';
include '../include/header.php';
include '../include/main-content.php';
 
?> 

<div class="row offset-4 mt-4">
    <h4 class="text-success">Unread Notification</h4>
    <div class="col-md-11"> 
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Available Seater</th>
                            <th>Hostel Rent Per Head</th>
                            <th>Food (Yes/No)</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $querynotify = "SELECT * FROM hostel_info";
                        $i=1;
                        $not = mysqli_query($conn, $querynotify);
                        if (mysqli_num_rows($not) > 0) {
                            while($row = mysqli_fetch_assoc($not)) {
                                $seater = $row['seater'];
                                $lists = explode(',',$seater);
                                $rooms = array_filter($lists);
                                ?>
                        <tr>
                            <td><?php echo $i++;?></td>
                            <td><?php 
                                foreach($rooms as $room){
                                    echo $room." (Seater) ";
                                }
                            ?></td>
                            <td><?php echo $row['price'];?></td>
                            <td><?php echo $row['food'];?></td>
                            <td><a href="" class="btn btn-success btn-modal-incharge" data-toggle="modal" data-target="#exampleModal<?php echo $row['hostel_info_id']?>"><i class="fa fa-edit"></i></a></td>
                        </tr>
                                
                        <div class="modal fade" id="exampleModal<?php echo $row['hostel_info_id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Hostel Information</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="/HMS/dashboard/admin/notification/update-hostel-info.php" method="POST">
                                            
                                    <div class="mb-3 mt-3">
                                        <label for="price" class="form-label">Price:</label>
                                        <input type="text" class="form-control" id="price" placeholder="Enter Price" name="price" value="<?php echo $row['price']?>">
                                        <input type="hidden" class="form-control" id="id"  name="id" value="<?php echo $row['hostel_info_id']?>">
                                       </div>
                                
                                    <div class="mb-3 mt-3">
                                        <label for="food" class="form-label">Food:</label>
                                        <input type="text" class="form-control" id="food" placeholder="Enter Wardan Name" name="food" value="<?php echo $row['food']?>">
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label  class="form-label">Select Seater</label><br>
                                        <label for="one" class="form-label">1 Seater</label>
                                        <input class="form-check-input" type="checkbox" id="mySwitch" name="one" value="1" <?php if(in_array('1',$lists)){echo "checked='checked'";}?>>
                                        <label for="two" class="form-label">2 Seater</label>
                                        <input class="form-check-input" type="checkbox" id="mySwitch" name="two" value="2" <?php if(in_array('2',$lists)){echo "checked='checked'";}?>>
                                        <label for="three" class="form-label">3 Seater</label>
                                        <input class="form-check-input" type="checkbox" id="mySwitch" name="three" value="3" <?php if(in_array('3',$lists)){echo "checked='checked'";}?>>
                                        <label for="four" class="form-label">4 Seater</label>
                                        <input class="form-check-input" type="checkbox" id="mySwitch" name="four" value="4" <?php if(in_array('4',$lists)){echo "checked='checked'";}?>>
                                    </div>
                                    
                                    <div class="d-grid">
                                        <button type="submit" name="submit" class="btn btn-primary btn-block btnhref">Update</button>
                                    </div>
                                            
                                    </form>
                    
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                
                            </div>
                            </div>
                        </div>
                    </div>
                  <?php
                        } 
                    }else{
                    ?> 
                        <td><h4 class="text-danger text-center">Oops! Information available</h4></td>
                    <?php }?>
                    </tbody>
                </table>
    </div>
</div>
 

<?php include '../include/footer.php';?> 
