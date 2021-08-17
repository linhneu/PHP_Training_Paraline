<?php
if(isset($_POST["submit"])) {
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Admin</h1>
    </div>
</div>
<!--/.row-->

<div class="row">
    <div class="col-xs-12 col-md-12 col-lg-12">

        <div class="panel panel-primary">
            <div class="panel-heading">Thêm sản phẩm</div>
            <div class="panel-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="row" style="margin-bottom:40px">
                        <div class="col-xs-8">
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input required type="text" name="ten_sp" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Giá sản phẩm</label>
                                <input required type="text" name="gia_sp" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Ảnh sản phẩm</label>
                                <input required id="img" type="file" name="anh_sp" >
                            </div>
                            <div class="form-group">
                                <label>Bảo hành</label>
                                <input required type="text" name="bao_hanh" value="15 ngày" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Tình trạng</label>
                                <input required type="text" name="tinh_trang" value="Sách mới" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Trạng thái</label>
                                <select required name="trang_thai" class="form-control">
                                    <option value="Còn hàng">Còn hàng</option>
                                    <option value="Hết hàng">Hết hàng</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Miêu tả</label>
                                <textarea rows="5" class="form-control" required name="chi_tiet_sp"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Danh mục</label>
                                <select required name="id_dm" class="form-control">
                                    <option value="unselect">Lựa chọn danh mục</option>
                                    <?php
						           while($rowDm = mysqli_fetch_array($queryDm)){
						           ?>
                                    <option value="<?php echo $rowDm['id_dm']; ?>"><?php echo $rowDm['ten_dm']; ?>
                                    </option>
                                    <?php
                                   }
						             ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Sản phẩm nổi bật</label><br>
                                Có: <input type="radio" name="dac_biet" value="1">
                                Không: <input type="radio" checked name="dac_biet" value="0">
                            </div>
                            <input type="submit" name="submit" value="Thêm" class="btn btn-primary">
                            <a href="quantri.php?page_layout=danhsachsp" class="btn btn-danger">Hủy bỏ</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
}else
header('location: index.php');
?>