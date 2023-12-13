<?php if (isset($_COOKIE['thongbao'])) :  ?>
    <script>
        alert('<?= $_COOKIE['thongbao'] ?>');
    </script>
<?php endif ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Danh sách loại hàng</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="?act=listsp" method="post" class="tksp">
                <p>Tìm kiếm sản phẩm</p>
                <input type="text" name="kyw" id="" placeholder="Tìm kiếm sản phẩm">
                <select name="iddm" id="">
                    <option value="0" hidden>Tất cả</option>
                    <?php
                    foreach ($listdm as $danhmuc) {
                        extract($danhmuc);
                        echo "<option value='" . $iddm . "'>$name_dm</option>";
                    } ?>
                </select>
                <input type="submit" name="tksp" value="Tìm Kiếm" style="width: 100px;">
            </form>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <!-- <th></th>
                        <th>MÃ SẢN PHẨM</th> -->
                        <th>TÊN SẢN PHẨM</th>
                        <th>HÌNH</th>
                        <th>GIÁ</th>
                        <th>GIÁ SALE</th>
                        <th style="width: 550px;">MÔ TẢ</th>
                        <th>TRẠNG THÁI</th>
                        <th>THAO TÁC</th>
                    </tr>
                    <?php
                    foreach ($listsanpham as $sanpham) :
                        extract($sanpham);
                        $suasp = "index.php?act=suasp&idsp=" . $idsp;
                        $ansp = "index.php?act=xoasp&idsp=" . $idsp;
                        $hiensp = "index.php?act=hiensp&idsp=" . $idsp;
                        $hinhpart = "../../upload/" . $image;
                        // check ảnh có tồn tại hay không
                        if (is_file($hinhpart)) {
                            $hinh = "<img src='" . $hinhpart . "' height='80'>";
                        } else {
                            $hinh = "No Photo";
                        }

                        if ($action == 1) {
                            $view = "Hoạt động";
                        } else {
                            $view = "Không hoạt động";
                        }
                    ?>
                        <tr>
                         
                            <td><?= $name_product ?></td>
                            <td><?= $hinh ?></td>
                            <td><?= number_format($price) ?><sup>đ</sup></td>
                            <td><?= number_format($price_sale) ?><sup>đ</sup></td>
                            <td><?= $mota ?></td>
                            <td><?= $view ?></td>
                            <td>
                                <a href="<?= $suasp ?>"><i class="fa-regular fa-pen-to-square" title="Sửa sản phẩm"></i></a>
                                <a onclick="return confirm(`Bạn có chắc chắn muốn ẩn danh mục không?`)" href="<?= $ansp ?>"> <i class="fa-solid fa-trash-can" title="Ẩn sản phẩm"></i></a>
                                <a href="<?= $hiensp ?>"><i class="fa-solid fa-eye" title="Hiện sản phẩm"></i></a>
                            </td>
                        </tr>
                    <?php
                    endforeach;
                    ?>
                </table>

            </div>
        </div>

        <div class="row2 mb10">
            <!-- <input type="button" value="Chọn tất cả">
            <input type="button" value="Bỏ chọn tất cả"> -->
            <!-- <input type="button" value="Xóa các mục đã chọn"> -->
            <a href="index.php?act=addsp"><input type="button" value="Nhập thêm"></a>
        </div>
    </div>