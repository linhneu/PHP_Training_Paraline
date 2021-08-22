<?php
    include('./views/include/admin/header.php');
    include('./views/include/admin/navbar.php');
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
<?php
//session_start();
//if(isset($_SESSION['email']) && isset($_SESSION['password'])) {
    if($row['role_type'] == 2) {
        die('Do not have right to access');
?>
<?php } else if ($row['role_type'] == 1){ ?>
    <script type="text/javascript">
		alert('Bạn có quyền truy cập');
	</script>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Admin List</h1>
    </div>
</div>
<!--/.row-->
<div class="row" style="">
    <div class="col-xs-12 col-md-12 col-lg-12">
        <a href="index.php?controller=admin&action=createAdmin" class="btn btn-primary">Create Admin</a>
        <div class="bootstrap-table">
            <div class="table-responsive">
                <table class="table table-bordered" style="margin-top:20px;">
                    <thead>
                        <tr class="bg-info">
                            <th width>ID</th>
                            <th width="30%">Name</th>
                            <th>Email</th>
                            <th width="20%">Avatar</th>
                            <th>Role Type</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
					
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name'];?></td>
                            <td><?php echo $row['email'];?></td>
                            <td>
                                <img width="200px" src="img/<?php echo $row['avatar'];?>" class="thumbnail">
                            </td>
                            <td><?php echo $row['role_type'];?></td>
                            <td>
                                <a href="quantri.php?controller=admin&action=updateAdmin&id=<?php echo $row['id']; ?>" class="btn btn-warning"><span
                                        class="glyphicon glyphicon-edit"></span>Sửa</a>
                                <a href="quantri.php?controller=admin&action=deleteAdmin&id=<?php echo $row['id']; ?>" class="btn btn-danger"><span
                                        class="glyphicon glyphicon-trash"></span>Xóa</a>
                            </td>
						</tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
<?php } 
?>
</div>