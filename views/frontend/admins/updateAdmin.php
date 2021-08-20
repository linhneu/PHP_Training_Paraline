<?php
if(isset($_SESSION['email']) && isset($_SESSION['password'])) {
    if($row['role_type'] == 2) {
        die('Do not have right to access');
    }
}
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Admin Account</h1>
    </div>
</div>
<!--/.row-->
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
                                <input required type="text" name="name"
                                    value="<?php if(isset($_POST['name'])){echo $_POST['name'];} else echo $row['name'] ; ?>"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input required type="text" name="email"
                                    value="<?php if(isset($_POST['email'])){echo $_POST['email'];}else echo $row['email']; ?>"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input required type="text" name="password"
                                    value="<?php if(isset($_POST['password'])){echo $_POST['password'];}else echo $row['password'] ; ?>"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Avatar</label>
                                <input type="file" name="avatar" class="form-control">
                                <input type="hidden" name='avatar' value="<?php echo $row['avatar']; ?>">
                            </div>
                            <div class="form-group"
                                <label>Role_type</label><br>
                                Super Admin <input type="radio" name="role_type" <?php
                                   if($row['role_type'] == 0){
                                      echo 'checked';
                                  }
						             ?> value="0">
                                <br>
                                Admin <input type="radio" name="role_type" <?php
                                   if($row['role_type'] == 1){
                                     echo 'checked';
                                   }
						             ?> value="1">
                            </div>

                            <input type="submit" name="submit" value="Update" class="btn btn-primary">
                            <a href="index.php" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </form>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<!--/.row-->
