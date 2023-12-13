<?php if (isset($_COOKIE['thongbao'])) :  ?>
    <script>
        alert('<?= $_COOKIE['thongbao'] ?>');
    </script>
<?php endif ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Danh sách loại màu</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                           
                            <th>MÃ MÀU</th>
                            <th>TÊN MÀU</th>
                            <th>TRẠNG THÁI</th>
                            <th>THAO TÁC</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($list_color as $dsmau) {
                            extract($dsmau);
                            $suamau = "index.php?act=suamau&id_color=" . $id_color;
                            $xoamau = "index.php?act=xoamau&id_color=" . $id_color;
                            $hienmau = "index.php?act=hienmau&id_color=" . $id_color;
                            if ($action == 1) {
                                $view = "Hoạt động";
                            } else {
                                $view = "Không hoạt động";
                            }
                        ?>
                            <tr>
                              
                                <td><?= $id_color ?></td>
                                <td><?= $name_color ?></td>
                                <td><?= $view ?></td>
                                <td>
                                    <a href="<?= $suamau ?>"><i class="fa-regular fa-pen-to-square" title="Sửa màu sắc"></i></a>
                                    <a onclick="return confirm(`Bạn có chắc chắn muốn ẩn màu không?`)" href="<?= $xoamau ?>"> <i class="fa-solid fa-trash-can" title="Ẩn màu sắc"></i></a>
                                    <a href="<?= $hienmau ?>"><i class="fa-solid fa-eye" title="Hiện màu sắc"></i></a>
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
            <a href="index.php?act=addmau"><input type="button" value="Nhập thêm"></a>
        </div>

    </div>
