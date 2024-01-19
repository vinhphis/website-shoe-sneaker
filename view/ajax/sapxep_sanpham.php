<?php
include '../../model/pdo.php';
include '../../model/taikhoan_kh.php';
include '../../model/sanpham.php';
include '../../model/donhang.php';
include '../../model/danhmuc.php';
include '../../model/danhgia.php';
include '../../model/magiamgia.php';
if (isset($_POST['size'])) {

    $_SESSION['size'] = join(",", $_POST['size']);
} else {

    $_SESSION['size'] = "";
}
if (isset($_POST['color'])) {
    $id_color = join(",", $_POST['color']);
} else {
    $id_color = "";
}
if (isset($_POST['stars'])) {
    $stars = join(",", $_POST['stars']);
} else {
    $stars = "";
}
if (isset($_POST['price_max']) && isset($_POST['price_min'])) {
    if ($_POST['price_max'] > $_POST['price_min']) {
        $price_max = $_POST['price_max'];
        $price_min = $_POST['price_min'];
    } else {
        $thongbao = "Max phải lớn hơn min";
        header("location:?act=sanpham");
        setcookie("thongbao", $thongbao, time() + 1);
    }
} else {
    $price_max = "";
    $price_min = "";
}
if (isset($_POST['tksp'])) {
    $kyw = trim($_POST['kyw']);
} else {
    $kyw = "";
}
if (isset($_GET['iddm']) && ($_GET['iddm'] > 0)) {
    $iddm = $_GET['iddm'];
} else {
    $iddm = 0;
}

if (isset($_POST['giatien'])) {
    $sapxep = $_POST['giatien'];
} else {
    $sapxep = "";
}

$listsanpham = loadall_product($kyw, $iddm, $sapxep, $price_max, $price_min, $stars, $id_color,  $_SESSION['size']);
?>
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