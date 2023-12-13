<?php if (isset($_COOKIE['thongbao'])) :  ?>
    <script>
        alert('<?= $_COOKIE['thongbao'] ?>');
    </script>
<?php endif ?>
<div class="col-xl-8 col-md-8 mb-5">
    <div class="">
        <h1>THÊM MỚI LOẠI SIZE</h1>
    </div>
</div>
<div class="col-xl-3 col-md-6 mb-4">
    <form action="index.php?act=addsize" method="post">
        <div class="row1 mb10">
            Mã size <br>
            <input type="text" name="masize" disabled placeholder="Auto Number">
        </div>
        <div class="row1 mb10">
            Tên size <br>
            <input type="text" name="tensize">
        </div>
        <div class="row2 mb10">

            <input type="submit" name="themmoisize" value="THÊM MỚI">
            <input type="reset" value="NHẬP LẠI">
            <a href="index.php?act=listsize"> <input type="button" value="DANH SÁCH"></a>
        </div>
        <?php if (isset($thongbao) && ($thongbao != "")) echo $thongbao; ?>
    </form>
</div>
</div>
