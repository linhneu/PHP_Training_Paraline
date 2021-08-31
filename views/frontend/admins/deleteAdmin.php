<?php
    include('./views/include/admin/header.php');
    include('./views/include/admin/navbar.php');
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Admin Account</h1>
            <a href="index.php?controller=admin&action=listAdmin" style="float: left; margin-right: 15px; " class="btn btn-primary">Go back to list</a>
            <b style="color:red"><?php echo isset($report['delete']) ? $report['delete'] : ''; ?></b>
            <b style="color:red"><?php echo isset($error['id']) ? $error['id'] : ''; ?></b>
        </div>
    </div>
</div>