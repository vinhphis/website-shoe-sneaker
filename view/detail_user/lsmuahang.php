<?php include 'detail_user_left.php';

?>
<article class="detail_user_right">
    <div class="title_detail_user">
        <h3>Danh sách hóa đơn</h3>
    </div>
    <section class="detail_donhang">

        <table class="table_detail_donhang">
            <tr>
                <!-- <th>STT</th> -->
                <th>Mã Hóa Đơn</th>
                <th>Ngày Đặt Hàng</th>
                <th>Tổng Tiền</th>
                <th>Hành Động</th>
            </tr>
            <?php
            if (isset($load_bill)) :
                foreach ($load_bill as $value) {
                    extract($value);
                    $xoadh = "?act=xoadh&iddh=" . $iddh;
                    $detail_dh = "?act=detail_dh&iddh=" . $iddh;
                    // $counter = count_iddh();  Biến đếm số lượng hóa đơn
                    // extract($counter);
                    // $stt = str_pad($sodh, 3, '0', STR_PAD_LEFT);
            ?>
                    <tr>
                        <!-- <td></td> -->
                        <td><?= $ma_hd ?></td>
                        <td><?= $date ?></td>
                        <td><?= number_format($tongtien) ?><sup>đ</sup></td>
                        <td><a href="<?= $detail_dh ?>"><i class="fa-solid fa-circle-info"  title="Thông tin đơn hàng"></i></a></td>
                    </tr>
            <?php
                }
            endif;
            ?>

        </table>
    </section>
</article>
</main>