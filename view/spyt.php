<?php if (isset($thongbao)) :  ?>
    <script>
        alert('<?= $thongbao ?>');
    </script>
<?php endif ?>
<section class="sp_yt">
    <h1 style="text-align: center;">Sản phẩm yêu thích</h1>
    <main>
        <?php
        if (isset($listspyt)) {
            foreach ($listspyt as $spyt) {
                extract($spyt);
                $linksp = "?act=ctsp&idsp=" . $idsp;
                $imagepath = "../upload/" . $image;
        ?>
                <section class="sp_yt_child">
                    <picture>
                        <a href="<?= $linksp ?>">
                            <img src="<?= $imagepath ?>" alt="">
                        </a>
                        <form action="?act=huy_spyt" method="post">
                            <input type="hidden" name="idsp_yt" value="<?= $idsp_yt ?>">
                            <button name="huy_spyt">
                                <i class="fa-solid fa-heart" title="Hủy Thích"></i>
                            </button>
                        </form>
                    </picture>
                    <div class="sp_yt_detail">
                        <a href="<?= $linksp ?>">
                            <p><?= $name_product ?></p>
                        </a>
                        <p><?= number_format($price_sale) ?><sup>đ</sup></p>
                    </div>
                </section>
        <?php }
        }
        ?>

    </main>
</section>