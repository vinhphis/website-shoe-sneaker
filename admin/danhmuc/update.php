<?php if (isset($_COOKIE['thongbao'])) :  ?>
    <script>
        alert('<?= $_COOKIE['thongbao'] ?>');
    </script>
<?php endif ?>
<?php
if (isset($dm)) {
    extract($dm);
}
?>

<div class="col-xl-8 col-md-8 mb-5">
    <div class="col-xl-8 col-md-8 mb-5">
        <h1>CẬP NHẬT LOẠI HÀNG HOÁ</h1>
    </div>
</div>
<div class="col-xl-8 col-md-8 mb-5">
    <form action="index.php?act=updatedm" method="post">
        <div class="row1 mb10">
            Mã loại <br>
            <input type="text" name="maloai" disabled>
        </div>
        <div class="row1 mb10">
            Tên loại <br>
            <input type="text" name="tenloai" value="<?php if (isset($name_dm) && ($name_dm != "")) echo $name_dm; ?>">
        </div>
        <div class="row2 mb10">
            <input type="hidden" name="id" value="<?php if (isset($iddm) && ($iddm > 0)) echo $iddm; ?>">
            <input type="submit" name="capnhat" value="CẬP NHẬT">
            <input type="reset" value="NHẬP LẠI">
            <a href="index.php?act=listdm"> <input type="button" value="DANH SÁCH"></a>
        </div>

    </form>
</div>
</div>
