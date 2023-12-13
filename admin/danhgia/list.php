<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Danh sách bình luận</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>ID</th>
                        <th>HỌ TÊN</th>
                        <th>TÊN ĐĂNG NHẬP</th>
                        <th>NỘI DUNG BÌNH LUẬN</th>
                        <th>ID SẢN PHẨM</th>
                        <th>SAO</th>
                        <th>NGÀY BÌNH LUẬN</th>
                        <th>TRẠNG THÁI</th>
                        <th>THAO TÁC</th>
                    </tr>

                    <?php
                    foreach ($listbinhluan as $binhluan) {
                        extract($binhluan);
                        $hienbl = "index.php?act=hienbl&iddg=" . $iddg;
                        $anbl = "index.php?act=anbl&iddg=" . $iddg;
                        $xoabl = "index.php?act=xoabl&iddg=" . $iddg;
                        if ($action == 0) {
                            $view = "Không hoạt động";
                        } else  if ($action == 1) {
                            $view = "Hoạt động";
                        }
                    ?>
                        <tr>
                            <td><?= $iddg ?></td>
                            <td> <?= $namekh ?> </td>
                            <td><?= $user ?></td>
                            <td> <?= $content ?> </td>
                            <td><?= $idsp ?></td>
                            <td><?= $stars ?></td>
                            <td><?= $date ?></td>
                            <td><?= $view ?></td>
                            <td>
                                <a href="<?= $anbl ?>" title="Ẩn bình luận">
                                    <i class="fa-regular fa-trash-can"></i>
                                </a>
                                <a href="<?= $hienbl ?>" title="Hiện bình luận">
                                    <i class="fa-regular fa-eye"></i>
                                </a>
                                <a onclick="return confirm(`Bạn có chắc chắn muốn xóa hay không?`)" href="<?= $xoabl ?>" title="Xóa bình luận">
                                    <i class="fa-regular fa-circle-xmark"></i>
                                </a>
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
            <a href="index.php?act=adddm"><input type="button" value="Nhập thêm"></a>
            <?php if (isset($thongbao) && ($thongbao != "")) echo $thongbao; ?>
        </div>
    </div>
</div>
</div>
<style>
    .xoa,
    .sua {
        width: 60px;
        height: 25px;
        margin-top: 10px;
        margin-left: 25px;

    }

    .xoa {
        background-color: white;
        color: black;
        border: 1px solid gray;
    }

    .xoa:hover {
        background-color: black;
        color: white;
    }

    .sua {
        background-color: black;
        border: 1px solid gray;
        color: white;

    }

    .sua:hover {
        background-color: white;
        color: black;
    }

    .row2 input {
        width: 100px;
        height: 35px;
        background-color: black;
        color: white;
        border: 1px solid gray;
    }

    .row2 input:hover {
        background-color: white;
        color: black;
    }
</style>