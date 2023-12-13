<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Danh sách tài khoản Admin</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>MÃ TÀI KHOẢN</th>
                        <th>HỌ VÀ TÊN</th>
                        <th>TÊN ĐĂNG NHÂP</th>
                        <th>MẬT KHẨU</th>
                        <th>ẢNH</th>
                        <th>EMAIL</th>
                        <th>ĐỊA CHỈ</th>
                        <th>SỐ ĐIỆN THOẠI</th>
                        <th>TRẠNG THÁI</th>
                        <th>THAO TÁC</th>
                    </tr>
                    <?php
                    foreach ($listtaikhoan as $taikhoan) {
                        extract($taikhoan);

                        $xoatk = "index.php?act=xoatk&id=" . $idtk_kh;
                        $hientk = "index.php?act=hientk&id=" . $idtk_kh;
                        $imagepath = "upload/" . $image;
                        if ($action == 2) {
                            $view = "Quản Lý";
                        }
                    ?>
                        <tr>
                            <td><?= $idtk_kh ?></td>
                            <td><?= $namekh ?></td>
                            <td><?= $user ?></td>
                            <td><?= $password ?></td>
                            <td><img src="<?= $imagepath ?>" alt="" style="height:100px;"> </td>
                            <td><?= $email ?></td>
                            <td><?= $address ?></td>
                            <td><?= $phone ?></td>
                            <td><?= $view ?></td>
                            <td>
                                <?php if ($action == 2) {
                                } else {
                                ?>
                                    <a onclick="return confirm(`Bạn có chắc chắn muốn ẩn tài khoản không?`)" href="<?= $xoatk ?>">
                                        <i class="fa-solid fa-trash-can" title="Ẩn tài khoản"></i>
                                    </a>
                                    <a href="<?= $hientk ?>"><i class="fa-solid fa-eye" title="Hiện tài khoản "></i></a>
                                    </a>
                                <?php
                                } ?>

                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
            <div class="row2 mb10">
            </div>
        </div>
    </div>
</div>