<?php if (isset($thongbao)) :  ?>
    <script>
        alert('<?= $thongbao ?>');
    </script>
<?php endif ?>
<div class="baner">
    <div class="slide">
        <img src="image/giay-sneaker-la-gi.jpg">
    </div>
    <div class="slide">
        <img src="image/aadesh-sawant-shoes-output.jpg">
    </div>
    <div class="slide">
        <img src="image/88811730807693.563375465ea95.jpg">
    </div>
    <div class="slide">
        <img src="image/image duan1 (5).jpg">
    </div>
    <button class="prew" onclick="prev()">&#10094;</button>
    <button class="next" onclick="next()">&#10095;</button>
</div>


<div class="boxtitle">
    <p class="tin">Nổi bật Nhất</p>
    <h1>NIKE </h1>
    <p class="noidung">Thoải mái cực độ. Siêu bền. Âm lượng cao nhất. Giới thiệu NIKE
        được thiết kế để đẩy bạn vượt qua giới hạn của mình và giúp bạn đạt đến mức tối đa.</p>
    <form action="">
        <div class="formtitle ">
            <input type="button" value="Thông báo" name="thongbao">
            <input type="button" value="Cửa hàng Air Max" name="sanpham">
        </div>

    </form>
</div>

<div class="slide-sp row" style="width: 80%;">
    <h3 id="sphot" style="text-align: center;">HÀNG MỚI VỀ</h3>
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
<div class="banner1">
    <!-- <h3>Tin Tức Nổi Bật</h3> -->
    <video src="video/CGI _ Puma Suede Shoe Ad _ 4K.mp4" type="video/mp4" autoplay loop muted></video>
</div>
<div class="boxtitle">
    <h1>BƯỚC VÀO NHỮNG GÌ CẢM THẤY TỐT</h1>
    <p>Những bộ quần áo bền đẹp, dùng được cả tuần của bạn nhưng với phong cách chỉ có những đôi giày của Thế Giới Sneaker mới có thể
        mang lại. </p>
    <form action="">
        <div class="formtitle">
            <a href="#tksp"> <input type="button" value="Tìm giày của bạn" name="sp"></a>
        </div>
    </form>
</div>


<div class="boxsp-theoloai">

    <h3 style="text-align: center;">TOP 4 SẢN PHẨM BÁN CHẠY</h3>

    <div class="sanpham">
        <?php
        if (isset($load_top4)) {
            foreach ($load_top4 as  $value) {
                extract($value);
                $linksp = "?act=ctsp&idsp=" . $idsp;
                $imagepath = "../upload/" . $image;
        ?>
                <div class="sp">
                    <div class="img "><a href="<?= $linksp ?>"><img src="<?= $imagepath ?>" alt=""></a></div>
                    <div class="text">
                        <a href="#"><?= $name_product ?></a>
                        <span><?= number_format($price_sale) ?><sup>đ</sup></span>
                      
                    </div>
                    <p>Đã bán: <?= $luotban ?></p>
                </div>

        <?php
            }
        }
        ?>

    </div>
</div>
<h2 style="text-align: center;margin-top: 100px;">KHUYẾN MÃI <i class="fa-solid fa-fire fa-bounce" style="color: red; font-size: 25px;"></i></h2>
<div class="baner2">

    <picture>
        <img src="image/sale.png" alt="">
        <?php
        if (isset($load_top1)) {
            extract($load_top1);
        }
        ?>
        <p><?= ceil($top1) ?>%</p>
    </picture>

    <section class="baner2-detail">
        <div class="baner2-detail-top">
            <?php
            if (isset($load_6sp)) {
                foreach ($load_6sp as  $value) {
                    extract($value);
                    $imagepath = "../upload/" . $image;
                    $linksp = "?act=ctsp&idsp=" . $idsp;
            ?>

                    <!-- start sản phẩm -->
                    <div class="baner2-detail-top-product">
                        <picture>
                            <a href="<?= $linksp ?>"> <img src="<?= $imagepath ?>" alt=""></a>
                            <section id="ptgiamgia">
                                <p>-<?= ceil($ptgiamgia) ?>%</p>
                            </section>
                        </picture>
                        <section class="baner2-detail-top-product-detail">
                            <p><a href="<?= $linksp ?>"><?= $name_product ?></a> </p>
                            <p>
                                <span><?= number_format($price_sale) ?> <sup>đ</sup> </span>
                                <span><?= number_format($price) ?> <sup>đ</sup></span>
                            </p>
                        </section>
                    </div>
                    <!-- end sản phẩm -->
            <?php
                }
            }
            ?>

        </div>

        <div class="baner2-detail-bottom">
            <p><a href="?act=salesp" style="color: black;">Xem thêm >></a></p>
        </div>
    </section>
</div>
<div class="boxtitle">
    <h1>THIẾT YẾU</h1>
    <p>Những đôi giày bền đẹp, dùng được cả tuần của bạn nhưng với phong cách chỉ có những hãng giày bên Thế Giới Sneaker mới có thể mang lại. </p>
    <form action="">
        <div class="formtitle">
            <input type="button" value="CỬA HÀNG" name="cuahang">
        </div>
    </form>
</div>
<div class="index-danhmuc">
    <div class="danhmuc-sp">
        <img src="image/logo_hang (1).jpg" alt="">
    </div>
    <div class="danhmuc-sp">
        <img src="image/logo_hang (2).jpg" alt="">
    </div>
    <div class="danhmuc-sp" style="width: 70%;margin-left: 40px;">
        <img src="image/logo_hang__3_-removebg-preview.png" alt="">
    </div>
    <div class="danhmuc-sp">
        <img src="image/logo_hang (4).jpg" alt="">
    </div>
</div>
<script>
    var slideIndex = 0;
    var timeout;

    function slideshow() {
        var slides = document.querySelectorAll('.slide')
        for (var i = 0; i < slides.length; i++) {
            slides[i].style.display = 'none'
        }
        slideIndex++
        if (slideIndex > slides.length) {
            slideIndex = 1
        }
        if (slideIndex < 1) {
            slideIndex = slides.length
        }
        slides[slideIndex - 1].style.display = 'block'
        timeout = setTimeout(slideshow, 3000)
    }
    slideshow()

    function next() {
        slideIndex
        slideshow(clearTimeout(timeout))
        return true
    }

    function prev() {
        slideIndex = slideIndex - 2
        slideshow(clearTimeout(timeout))
    }
</script>