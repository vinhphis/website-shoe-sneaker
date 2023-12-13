<?php if (isset($_COOKIE['thongbao'])) :  ?>
    <script>
        alert('<?= $_COOKIE['thongbao'] ?>');
    </script>
<?php endif ?>
<?php
if (isset($size)) {
    extract($size);
}
?>

<div class="col-xl-8 col-md-8 mb-5">
    <div class="col-xl-8 col-md-8 mb-5">
        <h1>CẬP NHẬT LOẠI SIZE</h1>
    </div>
</div>
<div class="col-xl-8 col-md-8 mb-5">
    <form action="index.php?act=updatesize" method="post">
        <div class="row1 mb10">
            Mã size <br>
            <input type="text" name="" disabled value="<?php if (isset($id_size) && ($id_size > 0)) echo $id_size; ?>">
        </div>
        <div class="row1 mb10">
            Tên size <br>
            <input type="text" name="tensize" value="<?php if (isset($name_size) && ($name_size != "")) echo $name_size; ?>">
        </div>
        <div class="row2 mb10">
            <input type="hidden" name="id" value="<?php if (isset($id_size) && ($id_size > 0)) echo $id_size; ?>">
            <input type="submit" name="capnhatsize" value="CẬP NHẬT">
            <input type="reset" value="NHẬP LẠI">
            <a href="index.php?act=listsize"> <input type="button" value="DANH SÁCH"></a>
        </div>
        <?php if (isset($thongbao) && ($thongbao != "")) echo $thongbao; ?>
    </form>
</div>
</div>
