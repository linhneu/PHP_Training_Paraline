<?php
    include('./views/include/admin/header.php');
    include('./views/include/admin/navbar.php');
?>
<?php
if(isset($_SESSION['email']) && isset($_SESSION['password'])) {
    if($row['role_type'] == 2) {
        die('Do not have right to access');
    }
}
?>
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
    <form method="post" name="sform" action="index.php?controller=admin&action=findAdmin">
        <input onfocus="searchFocus();" onblur="searchBlur();" type="text" name="search" value="">
        <input type="submit" name="submit" value="search">
    </form>
</div>
<?php
//print_r ($search);