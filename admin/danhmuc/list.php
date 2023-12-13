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
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th></th>
                            <th>MÃ LOẠI</th>
                            <th>TÊN LOẠI</th>
                            <th>TRẠNG THÁI</th>
                            <th>THAO TÁC</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($listdm as $danhmuc) {
                            extract($danhmuc);
                            $suadm = "?act=suadm&iddm=" . $iddm;
                            $xoadm = "?act=xoadm&iddm=" . $iddm;
                            $hiendm = "?act=hiendm&iddm=" . $iddm;
                            if ($action == 1) {
                                $view = "Hoạt động";
                            } else {
                                $view = "Không hoạt động";
                            }
                        ?>
                            <tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td> <?= $iddm ?> </td>
                                <td><?= $name_dm ?></td>
                                <td><?= $view ?></td>
                                <td>
                                    <a href="<?= $suadm ?>"><i class="fa-regular fa-pen-to-square" title="Sửa danh mục"></i></a>
                                    <a onclick="return confirm(`Bạn có chắc chắn muốn ẩn danh mục không?`)" href="<?= $xoadm ?>"> <i class="fa-solid fa-trash-can" title="Ẩn danh mục"></i></a>
                                    <a href="<?=$hiendm?>"><i class="fa-solid fa-eye" title="Hiện danh mục"></i></a>
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
            <a href="index.php?act=adddm"><input type="button" value="Nhập thêm"></a>
        </div>

    </div>


 