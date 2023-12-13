<?php if (isset($_COOKIE['thongbao'])) :  ?>
    <script>
        alert('<?= $_COOKIE['thongbao'] ?>');
    </script>
<?php endif ?>
<?php
if (isset($mau)) {
    extract($mau);
}
?>

    <div class="col-xl-8 col-md-8 mb-5">
        <div class="col-xl-8 col-md-8 mb-5">
            <h1>CẬP NHẬT LOẠI MÀU</h1>
        </div>
    </div>
    <div class="col-xl-8 col-md-8 mb-5">
        <form action="?act=updatemau" method="post">
            <div class="row1 mb10">
                Mã màu <br>
                <input type="text" name="" disabled value="<?php if (isset($id_color) && ($id_color != "")) echo $id_color; ?>">
            </div>
            <div class="row1 mb10">
                Tên màu <br>
                <input type="text" name="tenmau" value="<?php if (isset($name_color) && ($name_color != "")) echo $name_color; ?>">
            </div>
            <div class="row2 mb10">
                <input type="hidden" name="id_color" value="<?= $id_color ?>">
                <input type="submit" name="capnhatmau" value="CẬP NHẬT">
                <input type="reset" value="NHẬP LẠI">
                <a href="index.php?act=listmau"> <input type="button" value="DANH SÁCH"></a>
            </div>

        </form>
    </div>
    </div>
