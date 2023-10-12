<?php 
session_start();  
include 'include/database.php';
include 'include/header.php';?> 
<?php include 'include/main-content.php';?>  

<div class="row offset-4 mt-4">
    <h4 class="text-success">Unread Notification</h4>
    <div class="col-md-8"> 
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>View</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $querynotify = "SELECT * FROM contact WHERE isread='0' ";
                        $not = mysqli_query($conn, $querynotify);
                        if (mysqli_num_rows($not) > 0) {
                            while($row = mysqli_fetch_assoc($not)) {
                                ?>
                        <tr>
                            <td><?php echo $row['name'];?></td>
                            <td><?php echo $row['email'];?></td>
                            <td><a href="" class="btn btn-success btn-modal" data-toggle="modal" data-target="#exampleModal<?php echo $row['id']?>"><i class="fa fa-eye"></i></a></td>
                        </tr>
                        <div class="modal fade" id="exampleModal<?php echo $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Notification Center</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>Name: </strong><span id="name"><?php echo $row['name'];?></span></p><hr class="hr">
                                    <p><strong>Email: </strong><span id="email"><?php echo $row['email'];?></span></p><hr class="hr">
                                    <p><strong>Subject: </strong><span id="subject"><?php echo $row['subject'];?></span></p><hr class="hr">
                                    <p><strong>Message: </strong><span id="message"><?php echo $row['message'];?></span></p><hr class="hr">
                                    <a href="" class="masread"><u>Mark as Read</u></a>
                            
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
                        <td><h4 class="text-danger text-center">Oops! No new notification available</h4></td>
                    <?php }?>
                    </tbody>
                </table>
                
        
    </div>
</div>
   
<?php include 'include/footer.php';?>     