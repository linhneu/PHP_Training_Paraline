<?php
    include('./views/include/admin/header.php');
    include('./views/include/admin/navbar.php');
    ?>

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <h2><b style="color:red"><?php echo isset($error['role']) ? $error['role'] : ''; ?></b></h2>
        <h1>Hello, <?php echo $_SESSION['admin']['email']; ?></h1>
        <h1>role type, <?php echo $_SESSION['admin']['role_type']; ?></h1>
        <h1>ID, <?php echo $_SESSION['admin']['id']; ?></h1>
    </div>

</body>
