<?php
include('./views/include/admin/header.php');
include('./views/include/admin/navbar.php');
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">SEARCH ADMIN</h1>
        </div>
    </div>
    <div id="search" class="col-md-6 col-sm-12 col-xs-12">
        <form method="get" name="sform">
            <input type="hidden" name="controller" value="admin" >
            <input type="hidden" name="action" value="findAdmin" >
            <input type="text" name="search" placeholder="PLease enter keyword" value="<?php echo isset($_GET["search"]) ? $_GET["search"]:null ; ?>">
            <input type="submit" value="search">
        </form>
    </div>
    <?php
    if (isset($_GET['search'])) {
    ?>
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="bootstrap-table">
                    <div class="table-responsive">
                        <table class="table table-bordered" style="margin-top:20px;">
                            <thead>
                                <tr class="bg-info">
                                    <th width>ID</th>
                                    <th width="15%">Name</th>
                                    <th>Email</th>
                                    <th width="20%">Avatar</th>
                                    <th>Role Type</th>
                                    <th> Option </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($result as $row) {
                                ?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td>
                                            <img width="200px" src="asset/images/<?php echo $row['avatar']; ?>" class="thumbnail">
                                        </td>
                                        <td><?php if($row['role_type'] == 1) { echo 'Super Admin';} else echo 'Admin' ?></td>
                                        <td>
                                            <a href="index.php?controller=admin&action=updateAdmin&id=<?php echo $rows['id']; ?>" class="btn btn-warning"><span
                                            class="glyphicon glyphicon-edit"></span>Update</a>
                                            <a href="index.php?controller=admin&action=deleteAdmin&id=<?php echo $rows['id']; ?>" class="btn btn-danger"><span
                                            class="glyphicon glyphicon-trash"></span>Delete</a>
                                        </td>
                                    </tr>
                                <?php }
                                ?>
                            </tbody>
                        </table>
                        <ul class="pagination" style="float: right">
                            <?php
                            for ($i = 1; $i <= $totalPages; $i++) {
                                if ($currentPage == $i) {
                                    echo '<li class ="active"><a href="index.php?controller=admin&action=findAdmin&search='.$_GET["search"].'&page='. $i . '">' . $i . '</a></li>';
                                } else echo '<li><a href="index.php?controller=admin&action=findAdmin&search='.$_GET["search"].'&page='. $i . '">' . $i . '</a></li>';
                            }
                            ?>
                    </div>
                </div>
            </div>
        </div>
    <?php
    } 
    ?>
</div>