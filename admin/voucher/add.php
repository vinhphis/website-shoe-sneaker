<?php if (isset($_COOKIE['thongbao'])) :  ?>
    <script>
        alert('<?= $_COOKIE['thongbao'] ?>');
    </script>
<?php endif ?>
<div class="col-xl-8 col-md-8 mb-5 ">
    <div class="">
        <h1>THÊM MÃ GIẢM GIÁ</h1>
    </div>
</div>
<div class="col-xl-3 col-md-6 mb-4 mgg">
    <form action="index.php?act=addmgg" method="post">
        <div class="row1 mb10"> Mã Giảm Giá <br>
            <input type="text" name="" disabled placeholder="Auto Number">
        </div>
        <div class="row1 mb10"> Tên Mã Giảm Giá <br>
            <input type="text" name="namemgg" placeholder="Nhập Tên Mã Giảm Giá (Gợi ý: Giảm 100k, Giảm 200k,...)" >
        </div>
        <div class="row1 mb10"> Chiết Khấu <br>
            <input type="text" name="discount" placeholder="Nhập Chiết Chiết Khấu">
        </div>

        <div class="row1 mb10"> Loại <br>
            <input type="text" name="category" placeholder="Nhập Mã Loại (Gợi ý: 1 Mã 100k 200k, 2: Mã 20% 30% 50%)">
        </div>

        <div class="row2 mb10">
            <input type="submit" name="themmgg" value="THÊM MỚI">
            <!-- <input type="reset" value="NHẬP LẠI"> -->
            <a href="index.php?act=listmgg"> <input type="button" value="DANH SÁCH"></a>
        </div>
        <?php if (isset($thongbao) && ($thongbao != "")) echo $thongbao; ?>
    </form>
</div>
</div>