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
                            <th>Hostel Incharge Name</th>
                            <th>Hostel Incharge Contact</th>
                            <th>Uploader Email</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $querynotify = "SELECT * FROM hostel  ";
                        $i=1;
                        $not = mysqli_query($conn, $querynotify);
                        if (mysqli_num_rows($not) > 0) {
                            while($row = mysqli_fetch_assoc($not)) {
                                ?>
                        <tr>
                            <td><?php echo $i++;?></td>
                            <td><?php echo $row['incharge'];?></td>
                            <td><?php echo $row['incharge_contact'];?></td>
                            <td><?php echo $row['uploaded_by'];?></td>
                            <td><a href="" class="btn btn-success btn-modal-incharge" data-toggle="modal" data-target="#exampleModal<?php echo $row['id']?>"><i class="fa fa-edit"></i></a></td>
                        </tr>
                                
                        <div class="modal fade" id="exampleModal<?php echo $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Hostel Incharge Information</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="/HMS/dashboard/admin/notification/update-incharge.php" method="POST">
                                            
                                    <div class="mb-3 mt-3">
                                        <label for="email" class="form-label">Email:</label>
                                        <input type="email" class="form-control" id="email" placeholder="Enter Email" name="uploaded_by" value="<?php echo $row['uploaded_by']?>">
                                        <input type="hidden" class="form-control" id="id"  name="id" value="<?php echo $row['id']?>">
                                       </div>
                                
                                    <div class="mb-3 mt-3">
                                        <label for="incharge" class="form-label">Incharge:</label>
                                        <input type="text" class="form-control" id="incharge" placeholder="Enter Wardan Name" name="incharge" value="<?php echo $row['incharge']?>">
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="incharge_contact" class="form-label">Incharge Contact:</label>
                                        <input type="text" class="form-control" id="incharge_contact" placeholder="Enter Wardan Contact" name="incharge_contact" value="<?php echo $row['incharge_contact']?>">
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
                        <td><h4 class="text-danger text-center">Oops! No information available</h4></td>
                    <?php }?>
                    </tbody>
                </table>
    </div>
</div>
 

<?php include '../include/footer.php';?> 
