<?php if (isset($_COOKIE['thongbao'])) :  ?>
    <script>
        alert('<?= $_COOKIE['thongbao'] ?>');
    </script>
<?php endif ?>
<div class="col-xl-8 col-md-8 mb-5">
    <div class="">
        <h1>THÊM MỚI BIẾN THỂ SẢN PHẨM</h1>
    </div>
</div>
<div class="col-xl-8 col-md-8 mb-5">
    <form action="index.php?act=addbt" enctype="multipart/form-data" method="post">

        <div class="row1 mb10">
            Sản phẩm <br>
            <select name="idsp" id="">
                <option value="0">-- Chọn sản phẩm --</option>
                <?php
                foreach ($listsanpham as $sanpham) {
                    extract($sanpham);
                    echo "<option value='" . $idsp . "'>$name_product</option>";
                } ?>
            </select>
        </div>
        <div class="row1 mb10">
            Color <br>
            <select name="id_color" id="">
            <option value="0" hidden>-- Chọn Color --</option>
                <?php
                foreach ($list_color as $color) {
                    extract($color);
                    echo "<option value='" . $id_color . "'>$name_color</option>";
                } ?>
            </select>
        </div>
        <div class="row1 mb10">
            Size <br>
            <select name="id_size" id="">
                <option value="0" hidden>-- Chọn Size --</option>
                <?php
                foreach ($list_size as $size) {
                    extract($size);
                    echo "<option value='" . $id_size . "'>$name_size</option>";
                } ?>
            </select>
          
        <div class="row1 mb10">
            Số lượng <br>
            <input type="text" name="soluong">
        </div>

        <div class="row2 mb10">
            <input type="submit" name="themmoibt" value="THÊM MỚI">
            <input type="reset" value="NHẬP LẠI">
            <a href="index.php?act=listbt"> <input type="button" value="DANH SÁCH"></a>
        </div>
      
    </form>
</div>
</div>

