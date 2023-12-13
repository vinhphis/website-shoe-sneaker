<?php if (isset($thongbao)) :  ?>
    <script>
        alert('<?= $thongbao ?>');
    </script>
<?php endif ?>
<div class="gio-hang">
    <form action="?act=thanhtoan" method="post">
        <table style="width: 100%;">
            <tr style="height: 50px;">
                <th></th>
                <th>THÔNG TIN SẢN PHẨM</th>
                <th>ĐƠN GIÁ</th>
                <th>SỐ LƯỢNG</th>
                <th>THÀNH TIỀN</th>
                <th style="width: 150px;"></th>

            </tr>
            <?php
            $tong_dh = 0;
            if (isset($list_gh)) {
                foreach ($list_gh as $gh) {
                    extract($gh);
                    // var_dump($idsp);
                    // die;
                    $linksp = "?act=ctsp&idsp=" . $idsp;
                    $imagepath = "../upload/" . $image;
                    $sum_price = $price_sale * $soluong;
                    $tong_dh += $sum_price;
                    $xoagh = "?act=xoagh&iddh_ct=" . $iddh_ct;
            ?>
                    <tr class="body_table_giohang">
                        <td>
                            <input type="checkbox" name="thanhtoansp[]" value="<?= $iddh_ct ?>" id="">
                        </td>
                        <td class="detail_sp">
                            <picture>
                                <a href="<?= $linksp ?>">
                                    <img src="<?= $imagepath ?>" alt="">
                                </a>
                            </picture>
                            <div class="detail_sp_child">
                                <p><?= $name_product ?></p>
                                <p><?= $name_color ?>/<?= $name_size ?></p>
                            </div>
                        </td>

                        <td>
                            <p><?= number_format($price_sale) ?> <sup>đ</sup></p>
                        </td>
                        <td>
                            <div class="soluong">
                                <!-- <button type="button" class="minus-btn" onclick="handleMinus()">-</button> -->
                                <p><?= $soluong ?></p>
                                <!-- <button type="button" class="plus-btn" onclick="handlePlus()">+</button> -->
                            </div>
                        </td>

                        <td>
                            <p><?= number_format($sum_price) ?><sup>đ</sup></p>
                        </td>
                        <td class="xoagh">
                            <a href="<?= $xoagh ?>"><i class="fa-regular fa-trash-can"></i></a>
                        </td>
                    </tr>
            <?php
                }
            }
            ?>

            <tfoot class="gio-hang-bottom">
                <tr>
                    <td>
                    </td>
                    <td style="margin-left: -310px;">
                        <span onclick=" selectAll()">Chọn tất cả</span>
                        <span onclick=" deleteAll()">Xóa tất cả</span>
                    </td>

                    <td>

                    </td>
                    <td>
                        <p>Tổng Thanh Toán</p>
                    </td>
                    <td>
                        <p><?= number_format($tong_dh) ?> <sup>đ</sup></p>
                    </td>
                    <td>
                        <button name="thanhtoan">Tiếp Tục</button>
                    </td>
                </tr>
            </tfoot>
        </table>
    </form>
</div>
<div class="slide-sp" style="width: 80%;">
    <h3>Sản Phẩm Liên Quan</h3>
    <div class="owl-carousel owl-theme">
        <?php
        if (isset($loadall_product_home)) {
            foreach ($loadall_product_home as $pro) {
                extract($pro);
                $imagepath = "../upload/" . $image;
                $linksp = "?act=ctsp&idsp=" . $idsp;
        ?>
                <div class="item">
                    <div class="img">
                        <a href="<?= $linksp ?>"><img src="<?= $imagepath ?>" alt=""></a>
                    </div>
                    <div class="sub">
                        <a href="<?= $linksp ?>"><?= $name_product ?></a>
                        <p><?= number_format($price_sale) ?><sup>đ</sup></p>
                    </div>
                  
                </div>
        <?php
            }
        } ?>

    </div>
</div>