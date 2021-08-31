<?php
    include('./views/include/admin/header.php');
    include('./views/include/admin/navbar.php');
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Admin Account</h1>
        <a href="index.php?controller=admin&action=listAdmin" style="float: left; margin-bottom: 15px; margin-right: 15px;" class="btn btn-primary">Go back to list</a>
        <b style="color:red"><?php echo isset($report['update']) ? $report['update'] : ''; ?></b>
        <b style="color:red"><?php echo isset($error['id']) ? $error['id'] : ''; ?></b>
    </div>
</div>
<!--/.row-->
<div class="row">
    <div class="col-xs-12 col-md-12 col-lg-12">

        <div class="panel panel-primary">
            <div class="panel-heading">Update admin account </div>
            <div class="panel-body">
                <form method="post" enctype="multipart/form-data" action=''>
                    <div class="row" style="margin-bottom:40px">
                        <div class="col-xs-8">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name"
                                    value="<?php if(isset($_POST['name'])){echo $_POST['name'];} else echo $row['name'] ; ?>"
                                    class="form-control">
                                <b style="color:red"><?php echo isset($error['name']) ? $error['name'] : ''; ?></b>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email"
                                    value="<?php if(isset($_POST['email'])){echo $_POST['email'];}else echo $row['email']; ?>"
                                    class="form-control">
                                <b style="color:red"><?php echo isset($error['email']) ? $error['email'] : ''; ?></b>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password"
                                    value="<?php if(isset($_POST['password'])){echo $_POST['password'];}else echo $row['password'] ; ?>"
                                    class="form-control">
                                <b style="color:red"><?php echo isset($error['password']) ? $error['password'] : ''; ?></b>
                            </div>
                            <div class="form-group">
                                <label>Avatar</label>
                                <input type="file" name="avatar" class="form-control" >
                                <input type="hidden" name='avatar' value="<?php echo $row['avatar'] ; ?>">
                                <b style="color:red"><?php echo isset($error['avatar']) ? $error['avatar'] : ''; ?></b>
                            </div>
                            <div class="form-group">
                                <label>Role type</label>
                                <br>
                                Super Admin <input type="radio" name="role_type" <?php
                                   if($row['role_type'] == 1){
                                      echo 'checked';
                                  }
						             ?> value="1">
                                <br>
                                Admin <input type="radio" name="role_type" <?php
                                   if($row['role_type'] == 2){
                                     echo 'checked';
                                   }
						             ?> value="2">
                            </div>

                            <input type="submit" name="submit" value="Update" class="btn btn-primary">
                            <a href="index.php?controller=admin&action=listAdmin" class="btn btn-danger">Cancel</a>
                            <b style="color:red"><?php echo isset($error['failed']) ? $error['failed'] : ''; ?></b>
                        </div>
                    </div>
                </form>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<!--/.row-->
</div>
