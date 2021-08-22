<?php

if(!isset($_SESSION['email']) && !isset($_SESSION['password'])){
    header('location: index.php?controller=admin&action=index');
    echo "Login is failed";
}
?>
<!DOCTYPE html>
<html>
<body>
<script type="text/javascript">
		alert('Bạn đã đăng nhập thành công');
	</script>
    <?php
        include('./views/include/admin/header.php');
        include('./views/include/admin/navbar.php');
        
    ?>

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
      <h1>Hello, <?php echo $_SESSION['email']; ?></h1>
      <h1>role type, <?php echo $_SESSION['role_type']; ?></h1>
    </div>
    <!--/.main-->

</body>

</html>
<?php
 //else
//header('Location: index.php?controller=admin');
?>