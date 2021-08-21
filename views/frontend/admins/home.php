<?php
session_start();
if(!isset($_SESSION['email']) && !isset($_SESSION['password'])){
    header('location: index.php?controller=admin&action=index');
    echo "Login is failed";
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
<script type="text/javascript">
		alert('Bạn đã đăng nhập thành công');
	</script>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Admin</a>
                <ul class="user-menu">
                    <li class="dropdown pull-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
                        Hello, <?php 
                            echo $_SESSION['email']; 
                            ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="index.php?controller=admin&action=index"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg>
                            Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <ul class="nav menu">
            <li role="presentation" class="divider"></li>
            <li class="active"><a href="index.php?controller=admin&action=home"><svg class="glyph stroked dashboard-dial">
                        <use xlink:href="#stroked-dashboard-dial"></use>
                    </svg>Dashboard</a></li>
            <li><a href="index.php?controller=admin&action=listAdmin"><svg class="glyph stroked folder">
                        <use xlink:href="#stroked-folder"></use>
                    </svg> Admin management </a></li>
            <li><a href="index.php?controller=admin&action=listUser"><svg class="glyph stroked notepad">
                        <use xlink:href="#stroked-notepad"></use>
                    </svg> User management </a></li>
            <li><a href=""><svg class="glyph stroked search">
                        <use xlink:href="#stroked-search"></use>
                    </svg> Search </a></li>
            <li role="presentation" class="divider"></li>
        </ul>

    </div>

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
      
    </div>
    <!--/.main-->

</body>

</html>
<?php
 //else
//header('Location: index.php?controller=admin');
?>