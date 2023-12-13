<?php if (isset($_COOKIE['thongbao'])) :  ?>
    <script>
        alert('<?= $_COOKIE['thongbao'] ?>');
    </script>
<?php endif ?>

<div class="cartegory">
    <?php include 'left_sanpham.php'; ?>
    <div class="cartegory-right row">
        <div class="cartegory-right-top">
            <div class="cartegory-right-top-item">
                <p>SẢN PHẨM SALE HOT <i class="fa-solid fa-fire fa-bounce" style="color: red; font-size: 20px;"></i></p>
            </div>
            <div class="cartegory-right-top-item">
                <form action="?act=sanpham" method="post" >
                    <select name="giatien" id="mySelect">
                        <option value="" hidden>Sắp xếp</option>
                        <option value="tang" onchange="">Tăng dần</option>
                        <option value="giam" onchange="">Giảm dần</option>
                        <option value="a->z" onchange="">A->Z</option>
                        <option value="z->a" onchange="">Z->A</option>
                    </select>
                    <button type="submit"></button>
                </form>
            </div>
        </div>
        <section class="cartegory-right-content row" id="products">
            <?php
            if (isset($load_giamgia) && !empty($load_giamgia)) {
                foreach ($load_giamgia as $sanpham) {
                    extract($sanpham);
                    $pt = (($price - $price_sale) / $price) * 100;
                    $linksp = "?act=ctsp&idsp=" . $idsp;
                    $imagepath = "../upload/" . $image;

            ?>
                    <div class="cartegory-right-content-item">
                        <section class="price_sale">
                            <p>-<?= ceil($pt) ?>%</p>
                        </section>
                        <div class="img">
                            <a href="<?= $linksp ?>"> <img src="<?= $imagepath ?>" alt=""></a>
                            <section class="cartegory_icon">
                                <form action="?act=spyt" method="post">
                                    <input type="hidden" name="idsp" value="<?= $idsp ?>">
                                    <input type="hidden" name="idtk_kh" value="<?= $idtk_kh ?>">
                                    <button type="submit" class="tym" name="spyt">
                                        <i class="fa-regular fa-heart"></i>
                                    </button>
                                </form>
                                <section class="cartegory_icon_gh">
                                    <button class="openModalBtn cart" name="add_gh_sp">
                                        <i class="fa-solid fa-cart-shopping fa-xl"></i>

                                    </button>
                                    <!-- modal -->
                                    <div id="myModal<?= $idsp ?>" class="modal">
                                        <form action="?act=thanhtoan_sp_tt" method="post">
                                            <div class="modal-content">
                                                <section class="modal-content-image">
                                                    <picture style="width: 100%; margin-bottom: 10px;">
                                                        <img src="<?= $imagepath ?>" alt="">
                                                    </picture>
                                                    <section>
                                                        <?php
                                                        $loadimage_mota = loadall_image($idsp);
                                                        foreach ($loadimage_mota as $value) {
                                                            extract($value);
                                                            $imgpath = "../../../upload/" . $url_image;
                                                        ?>
                                                            <img src="<?= $imgpath ?>" alt="">
                                                        <?php
                                                        }
                                                        ?>
                                                    </section>
                                                </section>
                                                <section style="text-align: left;">
                                                    <span class="close"><i class="fa-solid fa-xmark"></i></span>
                                                    <h3><?= $name_product ?></h3>
                                                    <p><?= number_format($price_sale) ?><sup>đ</sup>
                                                        <span style="font-size: 0.8vw; color: black;"> Giá cũ:</span>
                                                        <del style="font-size: 0.8vw;color: black;"> <?= number_format($price) ?><sup>đ</sup></del>
                                                    </p>
                                                    <section class="modal-content-color-size">
                                                        <span>
                                                            <p> Màu</p>
                                                            <select name="mau" id="">
                                                                <option value="" hidden>-- vui lòng chọn --</option>
                                                                <?php
                                                                if (isset($list_color)) {
                                                                    foreach ($list_color as $color) {
                                                                        extract($color);
                                                                        echo ' <option value="' . $id_color . '">' . $name_color . '</option>';
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </span>
                                                        <span>
                                                            <p> Kích Thước </p>
                                                            <select name="size" id="">
                                                                <option value="" hidden>-- vui lòng chọn --</option>
                                                                <?php
                                                                if (isset($list_size)) {
                                                                    foreach ($list_size as $size) {
                                                                        extract($size);
                                                                        echo ' <option value="' . $id_size . '">' . $name_size . '</option>';
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </span>

                                                    </section>
                                                    <section class="modal-content-soluong">
                                                        <p>Số Lượng</p>
                                                        <!-- <button type="button" class="minus-btn" onclick="handleMinus()">-</button> -->
                                                        <input type="number" name="soluong" id="soluong" value="1">
                                                        <!-- <button type="button" class="plus-btn" onclick="handlePlus()">+</button> -->
                                                    </section>

                                                    <input type="hidden" name="idsp" id="" value="<?= $idsp ?>">
                                                    <input type="submit" name="thanhtoan_sp" id="" value="Mua Hàng">
                                                    <div class="modal-content-mota">
                                                        <h3>Mô tả sản phẩm</h3>
                                                        <p style="width: 90%; font-size: 15px;"><?= $mota ?></p>
                                                    </div>

                                                </section>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- end modal -->
                                </section>
                                <!-- kết thúc  class="cartegory_icon_gh" -->
                            </section>
                            <!-- kết thúc class="cartegory_icon" -->
                        </div>
                        <!-- end class="img" -->
                        <div class="detail_cartegory">
                            <div class="cartegory-right-tensp">
                                <a href="<?= $linksp ?>"><?= $name_product ?></a>
                            </div>
                            <!-- <a class="cartegory-right-danhmuc" href="#"><?= $name_dm ?></a> -->
                            <div class="bottom_cartegory">
                                <div class="category_star">
                                    <?php
                                    $load_stars_dg =  loadall_danhgia_stars($idsp);
                                    if (isset($load_stars_dg)) :
                                        foreach ($load_stars_dg as  $value) :
                                            extract($value);
                                            if ($tong == 0 || $soluong == 0) {
                                                $trungbinh = "";
                                            } else {
                                                $trungbinh = $tong / $soluong;
                                            }
                                            if ($trungbinh != "") {
                                                if (is_int($trungbinh)) {
                                                    if ($trungbinh == 5) {
                                                        for ($i = 1; $i < $trungbinh + 1; $i++) {
                                                            echo '<i class="fa-solid fa-star"></i>';
                                                        }
                                                    } else {
                                                        $tb = 5 - $trungbinh;
                                                        for ($i = 1; $i < $trungbinh + 1; $i++) {
                                                            echo '<i class="fa-solid fa-star"></i>';
                                                        }
                                                        for ($i = 1; $i < $tb + 1; $i++) {
                                                            echo '<i class="fa-regular fa-star"></i>';
                                                        }
                                                    }
                                                } else {
                                                    for ($i = 1; $i < $trungbinh; $i++) {
                                                        echo ' <i class="fa-solid fa-star"></i>';
                                                    }
                                                    echo '<i class="fa-solid fa-star-half-stroke"></i>';
                                                }
                                            } else {
                                                // echo "chưa có đánh giá";
                                                for ($i = 1; $i < 6; $i++) {
                                                    echo '<i class="fa-regular fa-star"></i>';
                                                }
                                            }
                                        endforeach;
                                    endif; ?>
                                </div>
                                <div class="category_price">
                                    <span><?= number_format($price_sale) ?><sup>đ</sup></span>
                                    <span><?= number_format($price) ?><sup>đ</sup></span>
                                </div>
                                <?php
                                $load_luotban = load_luotban($idsp);
                                if (isset($load_luotban)) {
                                    foreach ($load_luotban as $value) {
                                        extract($value);
                                        if ($luotban > 0) {
                                            echo "<span>Đã bán: $luotban</span>";
                                        } else {
                                            echo "<span>Đã bán: 0</span>";
                                        }
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- end sản phẩm -->
                <?php
                }
            } 
                ?>
               
        </section>

    </div>
</div>

<script>
    // Lấy tất cả button và modal
    var openModalBtns = document.querySelectorAll(".openModalBtn");
    var modals = document.querySelectorAll(".modal");

    openModalBtns.forEach(function(btn, index) {
        btn.addEventListener("click", function() {
            modals[index].style.display = "block";
        });

        var closeBtn = modals[index].querySelector(".close");
        closeBtn.addEventListener("click", function() {
            modals[index].style.display = "none";
        });

        window.addEventListener("click", function(event) {
            if (event.target == modals[index]) {
                modals[index].style.display = "none";
            }
        });
    });
</script>