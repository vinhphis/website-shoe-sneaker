<a href="?act=lsmh_user"><i class="fa-solid fa-arrow-right-from-bracket fa-rotate-180"></i>Quay lại trang hóa đơn</a>
<form class="detail_user_right" action="?act=detail_dh" method="post">
    <div class="title_detail_user">
        <h3>Chi tiết hóa đơn</h3>
    </div>
    <section class="detail_hd">

        <table class="table_detail_hd">
            <tr>
                <th colspan="2">Thông tin sản phẩm</th>
                <th>Số Lượng</th>
                <th>Tổng Tiền</th>
            </tr>
            <?php
            $tongdon = 0;
            if (isset($list_bill_detail)) :
                foreach ($list_bill_detail as $value) {
                    extract($value);
                    $huydonhang = "?act=huydh&iddh=" . $iddh;
                    $imagepath = "../upload/" . $image;
                    $sum = $soluong * $price_sale;
                    $tongdon += $sum;

            ?>
                    <tr>
                        <td style="width: 350px;"><img src="<?= $imagepath ?>" alt="" style="height: 140px; float: right; margin-top: 5px"></td>
                        <td>
                            <section style="float: left; text-align: left; margin-left: 10px;">
                                <p><?= $name_product ?></p>
                                <p><?= $name_color ?>/<?= $name_size ?></p>
                            </section>
                        </td>
                        <td><?= $soluong ?></td>
                        <td><?= number_format($sum) ?><sup>đ</sup></td>
                        <input type="hidden" name="soluong[]" value="<?= $soluong ?>">
                        <input type="hidden" name="id_bienthe[]" value="<?= $id_bienthe ?>">
                        <input type="hidden" name="iddh" value="<?= $iddh ?>">
                    </tr>
            <?php
                }
            endif;
            ?>

        </table>
    </section>
    <section class="detail_bill">
        <h2 style="text-align: center;">Thông tin người nhận</h2>
        <div class="group_detail">
            <label for="">Họ tên:</label> <span><?= $name_buyer ?></span> <br>
        </div>
        <div class="group_detail">
            <label for="">Email:</label> <span><?= $email ?></span> <br>
        </div>
        <div class="group_detail">
            <label for="">Số điện thoại:</label> <span>0<?= $phone ?></span> <br>
        </div>
        <div class="group_detail">
            <label for="">Địa chỉ:</label> <span><?= $address ?></span> <br>
        </div>

        <div class="group_detail">
            <label for="">Ngày đặt:</label> <span><?= $date ?></span> <br>
        </div>
        <div class="group_detail">
            <label for="">Phương thức vận chuyển:</label> <span><?= $vchuyen ?></span> <br>

        </div>
        <div class="group_detail">
            <label for="">Hình thức thanh toán:</label> <span><?= $payments ?></span> <br>

        </div>
        <section class="group_detail">

            <label for="">Trạng thái:</label>
            <?php
            if ($action == 1) {
            ?>
                <span style="font-weight: bolder;">Chờ xác nhận</span>

                <button name="huydonhang">
                    <i class="fa-solid fa-trash-can" title="Hủy đơn hàng" onclick="return confirm('Bạn có chắc muốn hủy đơn hàng không?')" style="color: red;"></i>
                </button>

            <?php   } else if ($action == 2) { ?>
                <span style="font-weight: bolder;color: blue;">Đơn hàng đã được xác nhận</span>

                <button name="huydonhang">
                    <i class="fa-solid fa-trash-can" title="Hủy đơn hàng" onclick="return confirm('Bạn có chắc muốn hủy đơn hàng không?')" style="color: red;"></i>
                </button>

            <?php      } else if ($action == 3) { ?>
                <span style="font-weight: bolder; color: red;">Đơn hàng đang được giao</span>
            <?php    } else if ($action == 4) { ?>
                <span style="font-weight: bolder; color: green;">Giao thành công</span> <br>
            <?php    } else if ($action == 5) { ?>
                <span style="color: red; font-weight: bolder;">Admin đã hủy</span> <br>
            <?php   } else if ($action == 6) { ?>
                <span style="color: red; font-weight: bolder;">Khách hàng đã hủy đơn</span> <br>
            <?php

            }
            ?>

        </section>

    </section>
</form>
</main>