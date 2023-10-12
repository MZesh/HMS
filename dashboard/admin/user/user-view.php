<?php 
session_start();
include '../include/header.php';
include '../include/main-content.php';
include '../include/database.php';
?>

<div class="row"> 
        
        <div class="col-sm-8 offset-3">
            <div class="card mt-3 ">
                <div class="card-body">
                    <div class="card-header">
                        <h4 class="text-info text-center">Registered Users Details<a href="/HMS/dashboard/admin/user/user-add.php"  class="btn btn-info mb-1 " style="float:right;"><i class="fa fa-plus"></i></a></h4>                        <form>
                            <div class="input-group">
                                <input type="text" id="myInput" class="form-control" placeholder="Search">
                                <div class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">S/NO</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>  
                    <th scope="col">Contact</th> 
                    <th scope="col">Address</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                <?php
                        $result = mysqli_query($conn,"SELECT * FROM users");
                        $i = 0;
                        while ($row = mysqli_fetch_assoc($result)) 
                        {
                            $i++;
                    ?>
                    <tr>
                        <td scope="row"><?php echo $i;?></td>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php echo $row['contact'];?></td>
                        <td><?php echo $row['address'];?></td>
                        <td><?php echo $row['role'];?></td> 
                        <td><a href="/HMS/dashboard/admin/user/user-edit.php?user_id=<?php echo $row['id'];?>"  class="btn btn-success"><i class="fa fa-edit"></i></a></td>
                         <td><a href="/HMS/dashboard/admin/user/user-delete.php?user_id=<?php echo $row['id'];?>"  class="btn btn-danger "><i class="fa fa-trash"></i></a></td>
                    </tr>  
                    <?php } ?>
                </tbody>
            </table> 
               
        </div>
    </div>
<?php include '../include/footer.php'?>