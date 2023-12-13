<?php include 'detail_user_left.php'; ?>
<?php if (isset($thongbao)) :  ?>
    <script>
        alert('<?= $thongbao ?>');
    </script>
<?php endif ?>
<article class="detail_user_right">
    <div class="title_detail_user">
        <h3>Kho voucher</h3>
    </div>
    <form action="?act=add_voucher" method="post" class="detail_voucher_child">
        <input type="text" name="voucher" id="" placeholder="Nhập voucher">
        <input type="submit" value="Lưu" name="add_vc">
    </form>
    <section class="detail_donhang">
        <nav>
            <ul class="detail_voucher">
                <?php
                if (isset($load_giamgia_user)) {
                    foreach ($load_giamgia_user as $mgg) {
                        extract($mgg);
                        $xoamgg = "?act=xoamgg&id_mgg_kh=" . $id_mgg_kh;
                ?>

                        <li>
                            <picture>
                                <img src="image/abc.png" alt="">
                            </picture>
                            <section>
                                <p style="font-size: 25px; font-weight: bolder;"><?= $name_mgg ?></p>
                            </section>
                            <section>
                                <a href="<?= $xoamgg ?>">
                                    <i class="fa-regular fa-trash-can" title="Xóa Mã Giảm Giá" onclick="return confirm('Bạn có muốn có muốn xóa mã giảm giá này không?')"></i>
                                </a>
                            </section>
                        </li>
                <?php
                    }
                }
                ?>

            </ul>

        </nav>
    </section>
</article>
</main>