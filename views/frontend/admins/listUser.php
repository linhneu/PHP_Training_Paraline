<?php
    include('./views/include/admin/header.php');
    include('./views/include/admin/navbar.php');
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">User List</h1>
    </div>
</div>
<!--/.row-->
<div class="row" style="">
    <div class="col-xs-12 col-md-12 col-lg-12">
        <a href="index.php?controller=admin&action=createAdmin" class="btn btn-primary">Create User</a>
        <div class="bootstrap-table">
            <div class="table-responsive">
                <table class="table table-bordered" style="margin-top:20px;">
                    <thead>
                        <tr class="bg-info">
                            <th >ID</th>
                            <th width="15%">Name</th>
                            <th>Email</th>
                            <th width="20%">Avatar</th>
                            <th>Facebook ID</th>
                            <th>Status</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($rows = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                            <td><?php echo $rows['id']; ?></td>
                            <td><?php echo $rows['name'];?></td>
                            <td><?php echo $rows['email'];?></td>
                            <td>
                                <img width="200px" src="img/<?php echo $rows['avatar'];?>" class="thumbnail">
                            </td>
                            <td><?php echo $rows['facebook_id'];?></td>
                            <td><?php echo $rows['status'];?></td>
                            <td>
                                <a href="index.php?controller=admin&action=editUser&id=<?php echo $rows['id']; ?>" class="btn btn-warning"><span
                                        class="glyphicon glyphicon-edit"></span>Edit</a>
                                <a href="index.php?controller=admin&action=deleteUser&id=<?php echo $rows['id']; ?>" class="btn btn-danger"><span
                                        class="glyphicon glyphicon-trash"></span>Delete</a>
                            </td>
						</tr>
                        <?php }
						?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
<?php 
?>
</div>