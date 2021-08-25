<?php
include('./views/include/admin/header.php');
include('./views/include/admin/navbar.php');
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">SEARCH USER</h1>
        </div>
    </div>
    <script>
        function searchFocus() {
            if (document.sform.stext.value == 'Enter Name or Email') {
                document.sform.stext.value = '';
            }
        }
        function searchBlur() {
            if (document.sform.stext.value == '') {
                document.sform.stext.value = 'Enter Name or Email';
            }
        }
    </script>
    <div id="search" class="col-md-6 col-sm-12 col-xs-12">
        <form method="post" name="sform" action="index.php?controller=admin&action=findUser">
            <input onfocus="searchFocus();" onblur="searchBlur();" type="text" name="search" value="">
            <input type="submit" name="submit" value="search">
        </form>
    </div>
    <?php
    if (isset($_POST['search'])) {
    ?>
        <div class="row" style="">
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
                                    <th>Facebook ID</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td>
                                            <img width="200px" src="<?php echo $row['avatar']; ?>" class="thumbnail">
                                        </td>
                                        <td><?php echo $row['facebook_id']; ?></td>
                                        <td><?php echo $row['status']; ?></td>
                                    </tr>
                                <?php }
                                ?>
                            </tbody>
                        </table>
                        <ul class="pagination" style="float: right">
                            <?php 
                                for ($i = 1; $i <= $totalPages; $i++) {
                                    if ($page == $i) {
                                    echo $listPage .= '<li class ="active"><a href="index.php?controller=admin&action=findUser&page=' . $i . '">' . $i . '</a></li>';
                                    } else echo $listPage .= '<li><a href="index.php?controller=admin&action=findUser&page=' . $i . '">' . $i . '</a></li>';
                                    }
                            ?>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>

</div>