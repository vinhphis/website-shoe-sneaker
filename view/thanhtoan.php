<?php if (isset($thongbao)) :  ?>
    <script>
        alert('<?= $thongbao ?>');
    </script>
<?php endif ?>
<div class="checkout">
    <form action="?act=dathang" method="post" class="chiaform_checkout">
        <!-- <div class="row3"> -->
        <div class="checkout-left">
            <div class="section-title">
                <p>Thông tin người nhận
                    <!-- <span><i class="fa-solid fa-user"></i><a href="#">Đăng nhập</a></span> -->
                </p>
            </div>
            <?php
            if (isset($_SESSION['userkh'])) :
                extract($_SESSION['userkh']);
            ?>
                <div class="form-left">
                    <input class="input" type="email" name="email" value="<?= $email ?>" placeholder="Nhập email">
                </div>
                <div class="form-left">
                    <input class="input" type="text" name="hoten" value="<?= $namekh ?>" placeholder="Nhập tên khách hàng">
                </div>
                <div class="form-left">
                    <input class="input" type="number" name="phone" value="<?= $phone ?>" placeholder="Nhập số điện thoại">
                </div>
                <div class="form-left">
                    <input class="input" type="text" name="diachi" value="<?= $address ?>" placeholder="Nhập địa chỉ">
                </div>
            <?php endif; ?>
            <div class="form-left">
                <textarea name="ghichu" id="" cols="77" rows="10" placeholder="Ghi chú"></textarea>
            </div>
            <div class="section-title-input-thanhtoan">
                <p>Vận chuyển</p>
                <div class="input-radio">
                    <input type="radio" name="vchuyen" id="" style="margin-right: 10px;" value="Giao hàng nhanh" checked>
                    <span>Giao hàng nhanh ( 1 -> 2 ngày )</span>
                </div>
                <div class="input-radio">
                    <input type="radio" name="vchuyen" id="" style="margin-right: 10px;" value="Giao hàng tiết kiệm">
                    <span>Giao hàng tiết kiệm ( 5 -> 7 ngày )</span>
                </div>
            </div>
            <div class="section-title-input-thanhtoan">
                <p>Thanh toán</p>
                <div class="input-radio">
                    <input type="radio" name="payment" id="" style="margin-right: 10px;" value="Thanh toán khi nhận hàng" checked>
                    <span>Thanh toán khi nhận hàng</span>
                </div>
                <div class="input-radio checkpayments">
                    <input type="radio" name="payment" id="" style="margin-right: 10px; " onclick="qrcode()" value="Thanh toán bằng tài khoản ngân hàng">
                    <span>Thanh toán bằng tài khoản ngân hàng </span>
                </div>
                <div class="input-radio checkpayments">
                    <input disabled type="radio" name="payment" id="" style="margin-right: 10px; " onclick="window.location.href='payment.php'" value="Thanh toán bằng VNPAY">
                    <span>Thanh toán bằng VNPAY </span> <span>(Đang trong quá trình phát triển)</span>
                </div>
            </div>
        </div>

        <div class="checkout-right">
            <div class="scroll_table_check">
                <table class="check_right_product">
                    <?php
                    $sum_hd = $tong_hd = 0;
                    if (isset($thanhtoan)) {
                        foreach ($thanhtoan as $tt) {
                            extract($tt);
                            $imagepath = "../upload/" . $image;
                            $sum_price = $soluong * $price_sale;
                            $sum_hd += $sum_price;
                            $tong_hd = $sum_hd + 30000;
                            $phi_vchuyen = 30000;
                    ?>
                            <tr>
                                <td>
                                    <img src="<?= $imagepath ?>" alt="">
                                </td>
                                <td class="detail_checkout">
                                    <a href="#"><?= $name_product ?></a>
                                    <p><?= $name_size ?>/<?= $name_color ?></p>
                                    <p>Số lượng: <?= $soluong ?></p>
                                    <input type="hidden" name="soluong[]" value="<?= $soluong ?>">
                                </td>
                                <td>
                                    <span class="giaGoc"><?= number_format($sum_price) ?><sup>đ</sup></span>
                                    <input type="hidden" name="id_bienthe[]" value="<?= $id_bienthe ?>">
                                    <input type="hidden" name="iddh_ct[]" value="<?= $iddh_ct ?>">
                                    <?php
                                    ?>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </table>
            </div>

            <div class="giamgia-right">
                <form action="?act=thanhtoan" method="post">
                    <input type="hidden" name="tamtinh" class="tamtinh" value="<?= $sum_hd ?>">
                    <select name="giamgia" id="" class="giamgia">
                        <option value="0" hidden>--- Chọn Voucher ---</option>
                        <?php
                        if (isset($load_mgg)) {
                            foreach ($load_mgg as $tt) {
                                extract($tt);
                        ?>
                                <option value="<?= $id_mgg_kh ?>">
                                    <?= $name_mgg ?>
                                </option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                    <input class="apdung" type="submit" name="apdung" value="Áp dụng">
                </form>

            </div>
            <div class="thanhtien-right">
                <p style=" font-weight: bold;">Tạm tính
                    <span style=" float: right; font-weight: 500;"><?= number_format($sum_hd) ?><sup>đ</sup></span>
                </p>
                <?php
                if (isset($ap_mgg)) {
                    extract($ap_mgg);
                    // Trường hợp 1: mã giảm giá theo - thẳng
                    if ($category == 1) {
                        $result = $sum_hd - $discount;
                        if ($result < 0) {
                            $result = 0;
                            $tong_hd = $result + 30000;
                        }else{
                            $tong_hd = $result + 30000;
                        }
                ?>
                        <p style=" font-weight: bold;">Voucher giảm giá
                            <span style=" float: right; font-weight: 500;">-<?= number_format($discount) ?><sup>đ</sup></span>
                        </p>
                        <p style=" font-weight: bold;">Phí vận chuyển
                            <span style=" float: right; font-weight: 500;"><?= number_format($phi_vchuyen) ?><sup>đ</sup></span>
                        </p>
            </div>
            <div class="sum_price">
                <span><strong>Tổng tiền</strong></span>
                <span style="font-weight: 500;"><?= number_format($tong_hd) ?><sup>đ</sup></span>
            </div>
            <!-- hết trường hợp 1 -->
        <?php
                        // Trường hợp 2 : mã giảm theo phần trăm giảm giá
                    } else if ($category == 2) {
                        $result = $sum_hd - ($sum_hd * $discount) / 100;
                        $ptgiamgia = $discount . "%";
                        $tong_hd = $result + 30000;
        ?>
            <p style=" font-weight: bold;">Voucher giảm giá
                <span style=" float: right; font-weight: 500;">-<?= $ptgiamgia ?></span>
            </p>
            <p style=" font-weight: bold;">Phí vận chuyển
                <span style=" float: right; font-weight: 500;">30.000<sup>đ</sup></span>
            </p>
        </div>
        <div class="sum_price">
            <span><strong>Tổng tiền</strong></span>
            <span style="font-weight: 500;"><?= number_format($tong_hd) ?><sup>đ</sup></span>
        </div>
        <!-- kết thúc trường hợp 2 -->
    <?php }
                    // trường hợp 3: khi chưa áp mã giảm giá
                } else {
    ?>
    <p style=" font-weight: bold;">Voucher giảm giá
        <span style=" float: right; font-weight: 500;">-0<sup>đ</sup></span>
    </p>
    <p style=" font-weight: bold;">Phí vận chuyển
        <span style=" float: right; font-weight: 500;">30.000<sup>đ</sup></span>
    </p>
</div>
<div class="sum_price">
    <span><strong>Tổng tiền</strong></span>
    <span style="font-weight: 500;"><?= number_format($tong_hd) ?><sup>đ</sup></span>
</div>
<!-- kết thúc trường hợp 3 -->
<?php
                }
?>

<div class="tieptuc">
    <a href="?act=home">Tiếp tục mua hàng</a>
    <input type="hidden" name="tongtien" value="<?= $tong_hd ?>">
    <input type="submit" value="Đặt hàng" name="dathang" onclick="return confirm('Xác nhận bạn có đồng ý đặt hàng không?')">
</div>

</div>
</form>
</div>
<?php
include 'qrcode.php';
// include 'payment.php';
if (isset($_SESSION['userkh'])) {
    extract($_SESSION['userkh']); ?>
    <script>
        // Gọi hàm swal.fire() để hiển thị popup
        function qrcode() {
            Swal.fire({
                title: 'Thông báo',
                text: 'Thanh toán đơn hàng, khách hàng <?php echo $namekh ?>',
                imageUrl: '<?php echo $qrCodeUrl ?>', // Đường dẫn đến ảnh
                imageAlt: 'Ảnh', // Mô tả ảnh
                confirmButtonText: 'Hoàn Tất',
                confirmButtonColor: 'red', // thay đổi màu sắc cho button
            });
        }
    </script>
<?php } ?>