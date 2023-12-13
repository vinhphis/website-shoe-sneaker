<?php if (isset($_COOKIE['thongbao'])) :  ?>
    <script>
        alert('<?= $_COOKIE['thongbao'] ?>');
    </script>
<?php endif ?>
<div class="col-xl-8 col-md-8 mb-5">
    <div class="">
        <h1>THÊM MỚI LOẠI HÀNG HOÁ</h1>
    </div>
</div>
<div class="col-xl-3 col-md-6 mb-4">
    <form action="index.php?act=adddm" method="post">
        <div class="row1 mb10">
            Mã loại <br>
            <input type="text" name="maloai" disabled placeholder="Auto Number">
        </div>
        <div class="row1 mb10">
            Tên loại <br>
            <input type="text" name="tenloai" placeholder="Nhập Tên Danh Mục" >
        </div>
        <div class="row2 mb10">

            <input type="submit" name="themmoidm" value="THÊM MỚI">
            <input type="reset" value="NHẬP LẠI">
            <a href="index.php?act=listdm"> <input type="button" value="DANH SÁCH"></a>
        </div>

    </form>
</div>
</div>

