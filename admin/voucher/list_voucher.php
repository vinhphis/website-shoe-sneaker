<?php if (isset($_COOKIE['thongbao'])) :  ?>
    <script>
        alert('<?= $_COOKIE['thongbao'] ?>');
    </script>
<?php endif ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Danh sách mã giảm giá</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <!-- <th>MÃ GIẢM GIÁ</th> -->
                        <th>TÊN MÃ GIẢM GIÁ</th>
                        <th>CHIẾT KHẤU</th>
                        <th>SỐ LƯỢNG</th>
                        <th>LOẠI</th>
                        <th>TRẠNG THÁI</th>
                        <th>THAO TÁC</th>
                    </tr>
                    <?php
                    foreach ($listvoucher as $voucher) {
                        extract($voucher);

                        $xoamgg = "?act=xoamgg&idmgg=" . $idmgg;
                        $hienmgg = "?act=hienmgg&idmgg=" . $idmgg;

                        if ($action == 0) {
                            $view = "Không Hoạt Động";
                        } else if ($action == 1) {
                            $view = "Hoạt Động";
                        }
                    ?>
                        <tr>
                            <!-- <td><?= $idmgg ?></td> -->
                            <td><?= $name_mgg ?></td>
                            <td><?= $discount ?></td>
                            <td><?= $soluong ?></td>
                            <td><?= $category ?></td>
                            <td><?= $view ?></td>
                            <td>
                                <a onclick="return confirm(`Bạn có chắc chắn muốn ẩn mã giảm giá không?`)" href="<?= $xoamgg ?>">
                                    <i class="fa-solid fa-trash-can" title="Ẩn mã giảm giá"></i>
                                </a>
                                <a href="<?= $hienmgg ?>"><i class="fa-solid fa-eye" title="Hiện mã giảm giá"></i></a>
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
            <div class="row2 mb10">
                <!-- <input type="button" value="Chọn tất cả">
                <input type="button" value="Bỏ chọn tất cả">
                <input type="button" value="Xóa các mục đã chọn"> -->
                <a href="?act=addmgg"><input type="button" value="Nhập thêm"></a>
            </div>
        </div>
    </div>
</div>

<style>
    /* .row2 input {
        width: 100px;
        height: 35px;
        background-color: black;
        color: white;
        border: 1px solid gray;
    }

    .row2 input:hover {
        background-color: white;
        color: black;
    }  */
</style>