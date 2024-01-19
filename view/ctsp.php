<?php if (isset($thongbao)) {  ?>
    <script>
        alert('<?= $thongbao ?>');
    </script>
<?php } else if (isset($_COOKIE['thongbao'])) {
?>
    <script>
        alert('<?= $_COOKIE['thongbao'] ?> ');
    </script>
<?php
}
?>
<div class="product">

    <div class="product-content row">
        <?php

        if (isset($loadone_sp)) :


            extract($loadone_sp);
            $imagepath = "../upload/" . $image;
        ?>
            <section class="chia_product">

                <div class="product-content-left row">
                    <!-- Ảnh chính -->
                    <div class="product-content-left-big-img">
                        <img src="<?= $imagepath ?>" alt="">
                    </div>
                    <!-- Ảnh mô tả -->
                    <div class="product-content-left-small-img">
                        <?php
                        foreach ($loadimage_mota as $value) :
                            extract($value);
                            $imgpath = "../../../upload/" . $url_image;
                        ?>
                            <div class="product-content-left-small-img-sp">
                                <img src="<?= $imgpath ?>" alt="">
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>
                <!-- detail sản phẩm -->
                <div class="product-content-right">
                    <!--  -->

                    <div class="product-content-right-product-name">
                        <h1><?= $name_product ?> </h1>
                    </div>
                    <div class="product-content-right-product-price">
                        <p><?= number_format($price_sale) ?><sup>đ </sup>
                            <span style="font-size: 0.8vw; color: black;"> Giá cũ:</span>
                            <del style="font-size: 0.8vw;color: black;"> <?= number_format($price) ?><sup>đ</sup></del>
                        </p>
                    </div>
                    <div class="product-content-right-product-star">
                        <?php if (isset($load_stars_dg)) :
                            extract($load_stars_dg);
                            if ($tong == 0 || $soluong == 0) {
                                $trungbinh = "";
                            } else {
                                $trungbinh = $tong / $soluong;
                            }
                            if ($trungbinh != "") {
                                if (is_int($trungbinh)) {
                                    if ($trungbinh == 5) {
                                        for ($i = 1; $i < $trungbinh + 1; $i++) {
                                            echo '<i class="fa-solid fa-star" title="' . $soluong . ' người đã đánh giá"></i>';
                                        }
                                    } else {
                                        $tb = 5 - $trungbinh;
                                        for ($i = 1; $i < $trungbinh + 1; $i++) {
                                            echo '<i class="fa-solid fa-star" title="' . $soluong . ' người đã đánh giá"></i>';
                                        }
                                        for ($i = 1; $i < $tb + 1; $i++) {
                                            echo '<i class="fa-regular fa-star" title="' . $soluong . ' người đã đánh giá"></i>';
                                        }
                                    }
                                } else {
                                    for ($i = 1; $i < $trungbinh; $i++) {
                                        echo ' <i class="fa-solid fa-star" title="' . $soluong . ' người đã đánh giá"></i>';
                                    }
                                    echo '<i class="fa-solid fa-star-half-stroke" title="' . $soluong . ' người đã đánh giá"></i>';
                                }
                            } else {
                                for ($i = 1; $i < 6; $i++) {
                                    echo '<i class="fa-regular fa-star" title="' . $soluong . ' người đã đánh giá"></i>';
                                }
                            }
                        ?>
                            <span>( <?= floatval($trungbinh) ?>/5 )</span>
                        <?php
                            update_stars_danhgia(intval($trungbinh), $idsp);
                        endif; ?>
                    </div>
                    <hr>
                    <div class="product-content-right-product-where">
                        <!-- <p style="padding: 5px 0;font-weight: bold; margin-bottom: 10px;">Sản xuất tại: Việt Nam<span style="float:right">Xuất xứ: Đang cập nhật</span></p> -->
                    </div>
                    <form action="?act=giohang" method="post">
                        <section style=" width: 90%; ">

                            <div class="mausac" style="width: 100%; margin-top: 20px;">
                                <p style="font-weight: bold;">Màu sắc</p>
                                <select name="chon_mau" id="chon_mau" <?php if (empty($list_color)) echo "disabled"  ?>>
                                    <option value="0" hidden>-- Vui lòng chọn màu --</option>
                                    <?php

                                    if (isset($list_color)) {
                                        foreach ($list_color as $color) {
                                            extract($color);
                                            echo ' <option value="' . $id_color . '">' . $name_color . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="size" style="width: 100%; margin-top: 20px;">
                                <p style="font-weight: bold;">Size</p>

                                <select name="chon_size" id="chon_size" <?php if (empty($list_size)) echo "disabled"  ?>>

                                    <option value="0" hidden>-- Vui lòng chọn size --</option>
                                    <?php
                                    if (isset($list_size)) {
                                        foreach ($list_size as $size) {
                                            extract($size);
                                            echo '<option value="' . $id_size . '">' . $name_size . '</option>';
                                        }
                                    }
                                    ?>
                                </select>

                            </div>

                        </section>
                        <div class="quantity">
                            <p style="font-weight: bold;"> Số lượng</p>
                            <div class="ctsp-soluong">
                                <button type="button" class="minus-btn" onclick="handleMinus()">-</button>
                                <input type="number" name="soluong" id="soluong_ctsp" value="1">
                                <button type="button" class="plus-btn" onclick="handlePlus()">+</button>
                            </div>
                        </div>
                        <div id="tonkho">
                            <?php
                            if (isset($ton_kho)) {
                                extract($ton_kho);
                                echo "<span>Kho: $kho </span>";
                            } else {
                                echo "<span>Kho: 0 </span>";
                            }
                            ?>

                        </div>
                        <div class="product-content-right-product-button">
                            <?php
                            if (isset($_SESSION['userkh'])) :
                            ?>
                                <input type="hidden" name="image" value="<?= $_SESSION['userkh']['idtk_kh'] ?>">
                            <?php
                            endif;
                            ?>
                            <input type="hidden" name="idsp" id="id_sp" value="<?= $idsp ?>">
                            <button name="tgiohang" class="tgiohang">
                                <i class="fas fa-shopping-cart"></i>
                                <span>Thêm Vào Giỏ Hàng</span>
                            </button>


                            <button name="muangay" class="muahang">
                                <span>Mua Ngay</span>
                            </button>

                        </div>
                    </form>
                    <div class="product-content-right-product-icon">
                        <div class="product-content-right-product-icon-item">
                            <!-- <i class="fas fa-phone-alt"></i> -->
                            <i class="fa-solid fa-mobile-screen-button"></i>
                            <span>Hotline : 0981.xxx.xxx</span>
                        </div>
                        <!-- <div class="product-content-right-product-icon-item">
                            <i class="far fa-comments"></i>
                            <span>Chat : </span>
                        </div> -->
                        <div class="product-content-right-product-icon-item">
                            <i class="far fa-envelope"></i>
                            <span>Mail : vinhpqph37185@fpt.edu.vn</span>
                        </div>
                    </div>
                    <div class="product-content-right-product-gioithieu">
                        <h4>Thông tin sản phẩm</h4>
                        <p><?= $mota ?></p>
                    </div>
                    <!--  -->

                    <section class="danhgia">
                        <h1>Đánh giá </h1>
                        <div class="danhgia_content">
                            <table>
                                <?php if (isset($list_dg)) {
                                    foreach ($list_dg as $dg) {
                                        extract($dg);
                                        $xoa = "?act=xoadg&iddg=$iddg&idsp=$idsp";

                                ?>
                                        <tr>
                                            <th>
                                                <img src="./uploads/avata_default.jpg" alt="avata user" style="border-radius: 100%; width: 80px; border: 1px solid;">
                                            </th>
                                            <th>
                                                <p style="font-weight: bold;"><?= $namekh ?>
                                                    <span style="font-size: 10px; color: gray;"><?= $date ?></span>
                                                </p>
                                                <p>

                                                    <?php
                                                    // var_dump(intval(5.9));
                                                    // die;
                                                    if ($stars == 5) {
                                                        for ($i = 1; $i < $stars + 1; $i++) {
                                                            echo '<i class="fa-solid fa-star"style="color: #ffcc00;"></i>';
                                                        }
                                                    } else {
                                                        $tb = 5 - $stars;
                                                        for ($i = 1; $i <= $stars; $i++) {
                                                            echo '<i class="fa-solid fa-star"style="color: #ffcc00;"></i>';
                                                        }
                                                        for ($i = 1; $i <= $tb; $i++) {
                                                            echo '<i class="fa-regular fa-star"style="color: #ffcc00;"></i>';
                                                        }
                                                    } ?>
                                                </p>

                                                <p style="font-size: 15px; color: gray; font-weight: 500;"><?= $content ?>
                                                    <?php if (isset($_SESSION['userkh'])) {
                                                    ?>
                                                        <?php if ($idtk_kh == $_SESSION['userkh']['idtk_kh']) :
                                                        ?>
                                                            <span><a href="<?= $xoa ?>" onclick="return confirm('Bạn có muốn xóa đánh giá không?')"><i class="fa-solid fa-trash" title="Xóa đánh giá"></i></a></span>
                                                    <?php
                                                        endif;
                                                    } ?>
                                                </p>

                                            </th>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </table>
                        </div>

                        <section class="create_danhgia">
                            <form action="?act=ctsp&idsp=<?= $idsp ?>" method="post">
                                <div class="create_danhgia_star">
                                    <input type="radio" name="star" id="" value="1"> <span>1 Sao </span>
                                    <input type="radio" name="star" id="" value="2"> <span>2 Sao </span>
                                    <input type="radio" name="star" id="" value="3"> <span>3 Sao </span>
                                    <input type="radio" name="star" id="" value="4"> <span>4 Sao </span>
                                    <input type="radio" name="star" id="" value="5" checked> <span>5 Sao </span>
                                </div>
                                <textarea name="danhgia" id="" cols="86" rows="8" placeholder="Viết đánh giá sản phẩm của bạn vào đây"></textarea>
                                <input type="hidden" name="idsp" value="<?= $idsp ?>">
                                <input type="submit" value="Gửi" name="gui_danhgia">
                            </form>
                        </section>

                    </section>
                </div>

                <!--  -->
            </section>
    </div>

    <div class="slide-sp">
        <h3>Sản Phẩm Liên Quan</h3>
        <div class="owl-carousel owl-theme">
            <?php
            if (isset($listsp)) {
                foreach ($listsp as $pro) {
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
            }
            ?>
        </div>
    </div>

<?php
        endif;
?>
</div>

</div>