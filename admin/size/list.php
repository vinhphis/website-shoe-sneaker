<?php if (isset($_COOKIE['thongbao'])) :  ?>
    <script>
        alert('<?= $_COOKIE['thongbao'] ?>');
    </script>
<?php endif ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Danh sách loại size</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th></th>
                            <th>MÃ SIZE</th>
                            <th>TÊN SIZE</th>
                            <th>TRẠNG THÁI</th>
                            <th>THAO TÁC</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($list_size as $dssize) {
                            extract($dssize);
                            $suasize = "index.php?act=suasize&id_size=" . $id_size;
                            $xoasize = "index.php?act=xoasize&id_size=" . $id_size;
                            $hiensize = "index.php?act=hiensize&id_size=" . $id_size;
                            if ($action == 1) {
                                $view = "Hoạt động";
                            } else {
                                $view = "Không hoạt động";
                            }
                        ?>
                            <tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td><?= $id_size ?></td>
                                <td><?= $name_size ?></td>
                                <td><?= $view ?></td>
                                <td>
                                    <a href="<?= $suasize ?>"><i class="fa-regular fa-pen-to-square" title="Sửa kích thước"></i></a>
                                    <a onclick="return confirm(`Bạn có chắc chắn muốn ẩn kích thước không?`)" href="<?= $xoasize ?>"> <i class="fa-solid fa-trash-can" title="Ẩn kích thước"></i></a>
                                    <a href="<?= $hiensize ?>"><i class="fa-solid fa-eye" title="Hiện kích thước"></i></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>

                </table>
            </div>
        </div>

        <div class="row2 mb-5">
            <!-- <input type="button" value="Chọn tất cả">
            <input type="button" value="Bỏ chọn tất cả">
            <input type="button" value="Xóa các mục đã chọn"> -->
            <a href="index.php?act=addsize"><input type="button" value="Nhập thêm"></a>
        </div>

    </div>


   