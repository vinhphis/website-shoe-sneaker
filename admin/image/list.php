<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Danh Sách Ảnh Mô Tả Sản Phẩm</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>TÊN SẢN PHẨM</th>
                            <th>ẢNH MÔ TẢ</th>
                            <th>TRẠNG THÁI</th>
                            <th>THAO TÁC</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($loadall_image_admin as $dsanh) {
                            extract($dsanh);
                            $imgpath = "../../../upload/" . $url_image;
                            // var_dump($url_image);
                            // die;
                        ?>
                        <!-- <img src="../../../upload/anh mo ta (1).jpg" alt=""> -->
                            <tr>
                                <td><?= $name_product ?></td>
                                <td>
                                    <img src="<?=$imgpath ?>" alt="" style="height: 100px;">
                                </td>
                                <!-- <td><?= $view ?></td> -->
                                <td>
                                    <!-- <a href="<?= $suamau ?>"><i class="fa-regular fa-pen-to-square" title="Sửa danh mục"></i></a> -->
                                    <!-- <a onclick="return confirm(`Bạn có chắc chắn muốn ẩn màu không?`)" href="<?= $xoamau ?>"> <i class="fa-solid fa-trash-can" title="Ẩn danh mục"></i></a> -->
                                    <!-- <a href="<?= $hienmau ?>"><i class="fa-solid fa-eye" title="Hiện danh mục"></i></a> -->
                                </td>
                                <td></td>
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
            <input type="button" value="Xóa các mục đã chọn">
            <a href="index.php?act=addmau"><input type="button" value="Nhập thêm"></a> -->
        </div>

    </div>