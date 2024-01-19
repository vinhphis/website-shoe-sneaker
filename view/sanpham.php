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
                <p>HÀNG MỚI VỀ</p>
            </div>

            <div class="cartegory-right-top-item">
                <form action="?act=sanpham" method="post">
                    <select name="giatien" id="sapxep">
                        <option value="" hidden>Sắp xếp</option>
                        <option value="tang">Tăng dần</option>
                        <option value="giam">Giảm dần</option>
                        <option value="a->z">A->Z</option>
                        <option value="z->a">Z->A</option>
                    </select>
                </form>

            </div>
        </div>
        <section class="cartegory-right-content row" id="products">
            <?php
            if (isset($listsanpham) && !empty($listsanpham)) {
                foreach ($listsanpham as $sanpham) {
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
                            <!-- <section class="cartegory_icon">
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
                                    modal

                                    end modal
                                </section>
                                
                            </section> -->
                            <!-- kết thúc class="cartegory_icon" -->
                        </div>
                        <!-- end class="img" -->
                        <div class="detail_cartegory">
                            <div class="cartegory-right-tensp">
                                <a href="<?= $linksp ?>"><?= $name_product ?></a>
                            </div>

                            <div class="bottom_cartegory">
                                <section class="bottom_cartegory_left">
                                    <div class="category_star">
                                        <?php
                                        $load_stars_dg =  loadall_danhgia_stars($idsp);
                                        if (isset($load_stars_dg)) :
                                            foreach ($load_stars_dg as $value) :
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
                                </section>

                                <form action="?act=spyt" method="post">
                                    <input type="hidden" name="idsp" value="<?= $idsp ?>">
                                    <input type="hidden" name="idtk_kh" value="<?= $idtk_kh ?>">
                                    <button type="submit" name="spyt">
                                        <i class="fa-regular fa-heart"></i>
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                    <!-- end sản phẩm -->
                <?php
                }
            } else {
                ?>
                <p>Không tồn tại sản phẩm bạn muốn tìm</p>
            <?php
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