<?php
include('./views/include/admin/header.php');
include('./views/include/admin/navbar.php');

?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Admin Account</h1>
        </div>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">

            <div class="panel panel-primary">
                <div class="panel-heading">Insert admin account</div>
                <div class="panel-body">
                    <form method="post" enctype="multipart/form-data">
                        <div class="row" style="margin-bottom:40px">
                            <div class="col-xs-8">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input  type="text" name="name" class="form-control">
                                    <b style="color:red"><?php echo isset($error['name']) ? $error['name'] : ''; ?></b>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control">
                                    <b style="color:red"><?php echo isset($error['email']) ? $error['email'] : ''; ?></b>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input  type="password" name="password" class="form-control">
                                    <b style="color:red"><?php echo isset($error['password']) ? $error['password'] : ''; ?></b>
                                </div>
                                <div class="form-group">
                                    <label>Avatar</label>
                                    <input  id="img" type="file" name="avatar">
                                    <b style="color:red"><?php echo isset($error['avatar']) ? $error['avatar'] : ''; ?></b>
                                </div>
                                <div class="form-group">
                                    <label>Role Type</label><br>
                                    Super Admin <input type="radio" name="role_type" value="1">
                                    Admin <input type="radio" checked name="role_type" value="2">
                                </div>
                                <input type="submit" name="submit" value="Add" class="btn btn-primary">
                                <a href="index.php?controller=admin&action=home" class="btn btn-danger">Cancel</a>
                                <b style="color:red"><?php echo isset($error['failed']) ? $error['failed'] : ''; ?></b>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
