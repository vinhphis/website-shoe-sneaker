<?php if (isset($_COOKIE['thongbao'])) :  ?>
    <script>
        alert('<?= $_COOKIE['thongbao'] ?>');
    </script>
<?php endif ?>
<div class="col-xl-8 col-md-8 mb-5">
    <div class="">
        <h1>THÊM MỚI SẢN PHẨM</h1>
    </div>
</div>
<div class="col-xl-8 col-md-8 mb-5">
    <form action="index.php?act=addsp" enctype="multipart/form-data" method="post">

        <div class="row1 mb10">
            Danh mục sản phẩm <br>
            <select name="iddm" id="">
                <option value="0" hidden>-- Chọn danh mục hàng --</option>
                <?php
                foreach ($listdm as $danhmuc) {
                    extract($danhmuc);
                    echo "<option value='" . $iddm . "'>$name_dm</option>";
                } ?>
            </select>
        </div>
        <div class="row1 mb10">
            Tên sản phẩm <br>
            <input type="text" name="name_product">
        </div>
        <div class="row1 mb10">
            Giá <br>
            <input type="text" name="price">
        </div>
        <div class="row1 mb10">
            Giá sale <br>
            <input type="text" name="price_sale">
        </div>
        <div class="row1 mb10">
            Hình <br>
            <input type="file" name="image">
        </div>
        <div class="row1 mb10">
            Hình mô tả <br>
            <input type="file" name="images[]" multiple="multiple">
        </div>
        <div class="row1 mb10">
            Mô tả <br>
            <textarea name="mota" cols="30" rows="10"></textarea>
        </div>


        <div class="row2 mb10">
            <input type="submit" name="themmoisp" value="THÊM MỚI">
            <input type="reset" value="NHẬP LẠI">
            <a href="index.php?act=listsp"> <input type="button" value="DANH SÁCH"></a>
        </div>
        
    </form>
</div>
</div>

