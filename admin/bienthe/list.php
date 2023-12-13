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
            <form action="index.php?act=listbt" method="post" class="tksp">
                <p> Tìm kiếm sản phẩm</p>
                <input type="text" name="kyw" id="" placeholder="Nhập tên sản phẩm">
                <select name="iddm" id="">
                    <option value="0" hidden>Tất cả</option>
                    <?php
                    foreach ($listdm as $danhmuc) {
                        extract($danhmuc);
                        echo "<option value='" . $iddm . "'>$name_dm</option>";
                    } ?>
                </select>
                <input type="submit" name="listok" value="OK">
            </form>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                       
                        <th>MÃ BIẾN THỂ</th>
                        <th>TÊN SẢN PHẨM</th>
                        <th>MÀU</th>
                        <th>SIZE</th>
                        <th>SỐ LƯỢNG</th>
                        <th>TRẠNG THÁI</th>
                        <th>THAO TÁC</th>
                    </tr>
                    <?php
                    foreach ($listbienthe as $bienthe) {
                        extract($bienthe);
                        // var_dump($id_bienthe);
                        // die;
                        $suabt = "?act=suabt&id_bienthe=" . $id_bienthe;
                        $xoabt = "?act=xoabt&id_bienthe=" . $id_bienthe;
                        $hienbt = "?act=hienbt&id_bienthe=" . $id_bienthe;
                        if ($action == 1) {
                            $view = "Hoạt động";
                        } else {
                            $view = "Không hoạt động";
                        }
                    ?>
                        <tr>
                           
                            <td><?= $id_bienthe ?></td>
                            <td><?= $name_product ?></td>
                            <td><?= $name_color ?></td>
                            <td><?= $name_size ?></td>
                            <td><?= $soluong ?></td>
                            <td><?= $view ?></td>
                            <td>
                                <a href="<?= $suabt ?>"><i class="fa-regular fa-pen-to-square" title="Sửa biến thể"></i></a>
                                <a onclick="return confirm(`Bạn có chắc chắn muốn ẩn màu không?`)" href="<?= $xoabt ?>"> 
                                <i class="fa-solid fa-trash-can" title="Ẩn biến thể"></i></a>
                                <a href="<?= $hienbt ?>"><i class="fa-solid fa-eye" title="Hiện biến thể"></i></a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>

        <div class="row2 mb10">
            <!-- <input type="button" value="Chọn tất cả">
            <input type="button" value="Bỏ chọn tất cả">
            <input type="button" value="Xóa các mục đã chọn"> -->
            <a href="index.php?act=addbt"><input type="button" value="Nhập thêm"></a>
        </div>
    </div>
 