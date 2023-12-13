<div class="container-fluid">

    <!-- Page Heading -->
    <section>
        <a href="?act=listhd">Quay Lại Trang Hóa Đơn</a>
    </section>
    <h1 class="h3 mb-2 text-gray-800">Chi Tiết Đơn Hàng</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Ảnh Sản Phẩm</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Màu/Size</th>
                            <th>Số Lượng</th>
                            <th>Tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($detail_dh)) :
                            foreach ($detail_dh as $value) {
                                extract($value);
                                $imagepath = "../../../upload/" . $image;
                                $tongtien = $price_sale*$soluong
                        ?>
                                <tr>
                                    <td><img src="<?= $imagepath ?>" alt="" style="height: 150px;"></td>
                                    <td><?= $name_product ?></td>
                                    <td><?= $name_color ?>/<?= $name_size ?></td>
                                    <td><?= $soluong ?></td>
                                    <td><?= number_format($tongtien) ?><sup>đ</sup></td>

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
           
            <section class="detail_bill">
            <h4>Thông Tin Người Đặt</h4>
                <div class="group_detail">
                    <label for="">Họ tên:</label> 
                    <span><?= $name_buyer ?></span> 
                </div>
                <div class="group_detail">
                    <label for="">Email:</label> 
                    <span><?= $email ?></span> 
                </div>
                <div class="group_detail">
                    <label for="">Số điện thoại:</label> 
                    <span>0<?= $phone ?></span> 
                </div>
                <div class="group_detail">
                    <label for="">Địa chỉ:</label> 
                    <span><?= $address ?></span> 
                </div>
                <div class="group_detail">
                    <label for="">Ngày đặt:</label> 
                    <span><?= $date ?></span> 
                </div>
                <div class="group_detail">
                    <label for="">Phương thức vận chuyển:</label> 
                    <span><?= $vchuyen ?></span> 
                </div>
                <div class="group_detail">
                    <label for="">Hình thức thanh toán:</label> 
                    <span><?= $payments ?></span> 
                </div>
            </section>
        </div>

    </div>