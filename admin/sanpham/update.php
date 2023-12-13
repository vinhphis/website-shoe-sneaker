<?php if (isset($_COOKIE['thongbao'])) :  ?>
    <script>
        alert('<?= $_COOKIE['thongbao'] ?>');
    </script>
<?php endif ?>
<div class="col-xl-8 col-md-8 mb-5">
    <div class="">
        <h1>CẬP NHẬT SẢN PHẨM</h1>
    </div>
</div>
<div class="col-xl-8 col-md-8 mb-5">
    <form action="index.php?act=updatesp" enctype="multipart/form-data" method="post">
        <?php
        if (isset($sanpham)) {
            extract($sanpham);
            $imgpath = "../../upload/" . $image;
        }

        ?>

        <div class="row1 mb10">
            Danh mục sản phẩm 
            <select name="iddm" id="" disabled>
                <option value="0" hidden>-- Chọn danh mục hàng --</option>
                <?php
                foreach ($loaddm as $danhmuc) {
                ?>
                    <option value='<?= $danhmuc['iddm'] ?>' <?php if ($danhmuc['iddm'] == $iddm) : ?> selected <?php endif ?>><?= $danhmuc['name_dm'] ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="row1 mb10">
            Tên sản phẩm 
            <input type="text" name="name_product" value="<?php if (isset($name_product) && ($name_product != "")) echo $name_product; ?>">
        </div>
        <div class="row1 mb10">
            Giá 
            <input type="text" name="price" value="<?php if (isset($price) && ($price != "")) echo $price; ?>">
        </div>
        <div class="row1 mb10">
            Giá sale 
            <input type="text" name="price_sale" value="<?php if (isset($price_sale) && ($price_sale != "")) echo $price_sale; ?>">
        </div>

        <img src="<?php if (isset($imgpath) && ($imgpath != "")) echo $imgpath; ?>" alt="" style="height: 150px;">
        <div class="row1 mb10">
            Hình 
            <input type="file" name="image">
        </div>
        <!-- <div class="row1 mb10">
            Hình mô tả <br>
            <input type="file" name="images[]" multiple="multiple">
        </div> -->
        <div class="row1 mb10">
            Mô tả 
            <textarea name="mota" cols="30" rows="10"><?php if (isset($mota) && ($mota != "")) echo$mota; ?></textarea>
        </div>
        <div class="row2 mb10">
            <input type="submit" name="capnhatsp" value="CẬP NHẬT">
            <input type="reset" value="NHẬP LẠI">
            <input type="hidden" name="idsp" value="<?= $idsp ?>">
            <a href="index.php?act=listsp"> <input type="button" value="DANH SÁCH"></a>
        </div>
        <?php if (isset($thongbao) && ($thongbao != "")) echo $thongbao;

        ?>
    </form>
</div>

</div>