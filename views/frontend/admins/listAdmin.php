<?php
if(isset($_SESSION['email']) && isset($_SESSION['password'])) {
    if($row['role_type'] == 2) {
        die('Do not have right to access');
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="asset/css/style.css" rel="stylesheet">
    <script src="asset/js/lumino.glyphs.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Admin</a>
                <ul class="user-menu">
                    <li class="dropdown pull-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
                        Hello, <?php// if(isset($_SESSION['email'])){echo $_SESSION['email'];}?> <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="index.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg>
                            Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Admin List</h1>
    </div>
</div>
<!--/.row-->
<div class="row" style="">
    <div class="col-xs-12 col-md-12 col-lg-12">
        <a href="quantri.php?page_layout=themsp" class="btn btn-primary">Thêm sản phẩm</a>
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
