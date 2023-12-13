<?php if (isset($thongbao)) :  ?>
    <script>
        alert('<?= $thongbao ?>');
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

                            <th>Mã Hóa Đơn</th>
                            <th>Ngày Đặt Hàng</th>
                            <th>Tên Tài Khoản</th>
                            <th>Tổng Tiền</th>
                            <th>TRẠNG THÁI</th>
                            <th colspan="2">Hành Động</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($listhd)) :
                            foreach ($listhd as $value) {
                                extract($value);
                                $detail_dh = "?act=list_detaildh&iddh=" . $iddh;
                                $status2 = "?act=status2&iddh=" . $iddh;
                                $status3 = "?act=status3&iddh=" . $iddh;
                                $status4 = "?act=status4&iddh=" . $iddh;
                                $status5 = "?act=status5&iddh=" . $iddh;

                                if ($action == 1) {
                                    $view = "Chờ xác nhận";
                                } else  if ($action == 2) {
                                    $view = "Đơn hàng đã được xác nhận";
                                } else    if ($action == 3) {
                                    $view = "Đơn hàng đang được giao";
                                } else   if ($action == 4) {
                                    $view = "Giao thành công";
                                } else  if ($action == 5) {
                                    $view = "Admin đã hủy đơn";
                                }else  if ($action == 6) {
                                    $view = "Khách hàng đã hủy đơn";
                                }
                        ?>
                                <tr>
                                    <td><?= $ma_hd ?></td>
                                    <td><?= $date ?></td>
                                    <td><?= $namekh ?></td>
                                    <td><?= number_format($tongtien) ?><sup>đ</sup></td>
                                    <td><?= $view ?></td>
                                    <td>
                                        <a href="<?= $detail_dh ?>"><i class="fa-solid fa-circle-info" title="Thông tin đơn hàng"></i></a>
                                        <a href="<?= $status2 ?>"><i class="fa-solid fa-circle-check" title="Xác Nhận Đơn"></i></a>
                                        <a href="<?= $status3 ?>"> <i class="fa-solid fa-truck-fast" title="Đơn hàng đang được giao"></i></a>
                                        <a href="<?= $status4 ?>"> <i class="fa-solid fa-check-double" title="Giao hàng thành công"></i></a>
                                        <a href="<?= $status5 ?>"><i class="fa-solid fa-trash-can" title="Hủy đơn"></i></a>
                                    </td>
                                </tr>
                        <?php
                            }
                        endif;
                        ?>
                    </tbody>

                </table>
            </div>
        </div>

        <div class="row2 mb-5">
            <!-- <input type="button" value="Chọn tất cả">
            <input type="button" value="Bỏ chọn tất cả">
            <input type="button" value="Xóa các mục đã chọn">
            <a href="index.php?act="><input type="button" value="Nhập thêm"></a> -->
        </div>

    </div>


