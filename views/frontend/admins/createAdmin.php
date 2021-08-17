
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
                                <input required type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input required type="text" name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input required type="text" name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Avatar</label>
                                <input required id="img" type="file" name="avatar" >
                            </div>
                            <div class="form-group">
                                <label>Role Type</label><br>
                                Super Admin <input type="radio" name="role_type" value="1">
                                Admin <input type="radio" checked name="role_type" value="2">
                            </div>

                            <div class="form-group">
                                <label>Del flag</label><br>
                                Active <input type="radio" name="del_flag" value="0">
                                Banned <input type="radio" checked name="del_flag" value="1">
                            </div>
                            <input type="submit" name="submit" value="Add" class="btn btn-primary">
                            <a href="index.php" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
