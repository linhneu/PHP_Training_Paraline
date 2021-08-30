
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <ul class="nav menu">
            <li role="presentation" class="divider"></li>
            <li class="active"><a href="index.php?controller=admin&action=home"><svg class="glyph stroked dashboard-dial">
                        <use xlink:href="#stroked-dashboard-dial"></use>
                    </svg>Dashboard</a></li>
            <?php  if (isset($_SESSION['admin']['email']) && isset($_SESSION['admin']['password'])) {
            if ($_SESSION['admin']['role_type'] == ROLE_SUPER_ADMIN) {
            ?> 
            <li><a href="index.php?controller=admin&action=listAdmin"><svg class="glyph stroked folder">
                        <use xlink:href="#stroked-folder"></use>
                    </svg> Admin management </a></li>
            <?php } } ?>
            <li><a href="index.php?controller=admin&action=listUser"><svg class="glyph stroked notepad">
                        <use xlink:href="#stroked-notepad"></use>
                    </svg> User management </a></li>
            <li role="presentation" class="divider"></li>
        </ul>

    </div>
