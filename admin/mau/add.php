<?php if (isset($_COOKIE['thongbao'])) :  ?>
    <script>
        alert('<?= $_COOKIE['thongbao'] ?>');
    </script>
<?php endif ?>
<div class="col-xl-8 col-md-8 mb-5 ">
    <div class="">
        <h1>THÊM MỚI LOẠI MÀU</h1>
    </div>
</div>
<div class="col-xl-3 col-md-6 mb-4 color">
    <form action="index.php?act=addmau" method="post">
        <div class="row1 mb10"> Mã màu <br>
            <input type="text" name="mamau" disabled placeholder="Auto Number">
        </div>
        <div class="row1 mb10"> Tên màu <br>
            <input type="text" name="tenmau" placeholder="Nhập tên màu">
        </div>
        <div class="row2 mb10">
            <input type="submit" name="themmoimau" value="THÊM MỚI">
            <input type="reset" value="NHẬP LẠI">
            <a href="index.php?act=listmau"> <input type="button" value="DANH SÁCH"></a>
        </div>

    </form>
</div>
</div>

