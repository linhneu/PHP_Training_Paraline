<?php
include('./views/include/admin/header.php');
include('./views/include/admin/navbar.php');
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">User Account</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">

            <div class="panel panel-primary">
                <div class="panel-heading">Update admin account </div>
                <div class="panel-body">
                    <form method="post" enctype="multipart/form-data">
                        <div class="row" style="margin-bottom:40px">
                            <div class="col-xs-8">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input required type="text" name="name" value="<?php if (isset($_POST['name'])) {echo $_POST['name'];} else echo $row['name']; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Facebook ID</label>
                                    <input required type="text" name="facebook_id" value="<?php if (isset($_POST['facebook_id'])) {echo $_POST['facebook_id'];} else echo $row['facebook_id']; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input required type="text" name="email" value="<?php if (isset($_POST['email'])) {echo $_POST['email'];} else echo $row['email']; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Role type</label>
                                    <br>
                                    Active <input type="radio" name="status" <?php
                                    if ($row['status'] == 1) {echo 'checked';}?> value="1">
                                    <br>
                                    Banned <input type="radio" name="status" <?php
                                    if ($row['status'] == 2) {echo 'checked';}?> value="2">
                                </div>

                                <div class="form-group">
                                    <label>Avatar</label>
                                    <input type="file" name="avatar" class="form-control">
                                    <input type="hidden" name='avatar' value="<?php echo $row['avatar']; ?>">
                                </div>

                                <input type="submit" name="submit" value="Update" class="btn btn-primary">
                                <a href="index.php?controller=admin&action=listAdmin" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </form>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>