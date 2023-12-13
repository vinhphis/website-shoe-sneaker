<?php if (isset($_COOKIE['thongbao'])) :  ?>
    <script>
        alert('<?= $_COOKIE['thongbao'] ?>');
    </script>
<?php endif ?>

<div class="col-xl-8 col-md-8 mb-5">
    <div class="">
        <h1>CẬP NHẬT BIẾN THỂ SẢN PHẨM</h1>
    </div>
</div>

<div class="col-xl-8 col-md-8 mb-5">
    <?php
    if (isset($bienthe)) {
        extract($bienthe);
    }
    ?>
    <form action="index.php?act=updatebt" enctype="multipart/form-data" method="post">

        <div class="row1 mb10">
            Sản phẩm <br>
            <select name="idsp" id="" disabled>
                <option value="0">-- Chọn sản phẩm --</option>
                <?php
                foreach ($listsanpham as $sanpham) {
                    extract($sanpham);
                ?>
                    <option value='<?= $idsp ?>' <?php if ($bienthe['idsp'] == $idsp) : ?> selected <?php endif; ?>><?= $name_product ?></option>
                <?php

                } ?>
            </select>
        </div>
        <div class="row1 mb10">
            Color <br>
            <select name="id_color" id="" disabled>
                <option value="0" hidden>-- Chọn Color --</option>
                <?php
                foreach ($list_color as $color) {
                    extract($color);
                ?>
                    <option value='<?= $id_color ?>' <?php if ($bienthe['id_color'] == $id_color) : ?> selected <?php endif; ?>><?= $name_color ?></option>
                <?php
                } ?>
            </select>
        </div>
        <div class="row1 mb10">
            Size <br>
            <select name="id_size" id="" disabled>
                <option value="0" hidden>-- Chọn Size --</option>
                <?php
                foreach ($list_size as $size) {
                    extract($size);
                ?>
                    <option value='<?= $id_size ?>' <?php if ($bienthe['id_size'] == $id_size) : ?> selected <?php endif; ?>><?= $name_size ?></option>
                <?php

                } ?>
            </select>

            <div class="row1 mb10">
                Số lượng <br>
                <input type="text" name="soluong" value="<?php if (isset($bienthe['soluong']) && ($bienthe['soluong'] != "")) echo $bienthe['soluong']; ?>">
            </div>

            <div class="row2 mb10">
                <input type="hidden" name="id_bienthe" value="<?php if (isset($bienthe['id_bienthe']) && ($bienthe['id_bienthe'] != "")) echo $bienthe['id_bienthe']; ?>">
                <input type="submit" name="capnhatbt" value="THÊM MỚI">
                <input type="reset" value="NHẬP LẠI">
                <a href="index.php?act=listbt"> <input type="button" value="DANH SÁCH"></a>
            </div>

    </form>
</div>
</div>