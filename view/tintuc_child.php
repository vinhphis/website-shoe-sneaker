<?php if (isset($thongbao)) :  ?>
    <script>
        alert('<?= $thongbao ?>');
    </script>
<?php endif ?>
<main class="tintuc_child">
    <h2 style="text-align: center; margin: 20px 0px;">Mã Giảm Giá</h2>

    <nav>
        <ul class="tintuc_detail">
            <?php
            if (isset($load_giamgia_user)) {
                foreach ($load_giamgia_user as $mgg) {
                    extract($mgg);
            ?>
                    <form action="?act=luu_voucher" method="post">
                        <li>
                            <!-- <picture style="height: 200px;"> -->
                            <img src="image/Screenshot_2023-11-10_120943-removebg-preview.png" alt="" height="80%">
                            <!-- </picture> -->
                            <section>
                                <p style="font-size: 25px; font-weight: bolder;"><?= $name_mgg ?></p>
                            </section>
                            <section>
                                <input type="hidden" name="name_mgg" value="<?= $name_mgg ?>">
                                <input type="hidden" name="idmgg" value="<?= $idmgg ?>">
                                <input type="submit" value="LƯU" name="luu_mgg">
                            </section>
                        </li>
                    </form>
            <?php
                }
            }
            ?>

        </ul>

    </nav>

</main>