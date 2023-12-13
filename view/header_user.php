<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Bán Giày Sneaker</title>
    <link rel="stylesheet" href="owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="owlcarousel/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>


<body>

    <header>
        <section class="top_header" id="header">
            <section></section>
            <nav class="top_header_menu">
                <ul>
                    <li><a href="#">Tìm Cửa Hàng</a> </li>
                    <li><a href="?act=help">Hỗ Trợ</a> </li>
                    <li><a href="?act=tintuc">Tin Tức</a> </li>
                    <?php
                    // var_dump($_SESSION['userkh']);
                    // die;
                    if (isset($_SESSION['userkh'])) {
                        extract($_SESSION['userkh']);
                    ?>
                        <li><a href="controller.php?act=detail_user"><?= $namekh ?></a> </li>
                    <?php
                    } else {
                    ?>
                        <li><a href="controller.php?act=dangnhap">Sign in/Sign out</a> </li>
                    <?php
                    }
                    ?>

                </ul>
            </nav>
        </section>

        <section class="bottom_header">
            <div class="bottom_header_logo">
                <a href="controller.php?act=home"><img src="image/Screenshot_2023-11-10_120943-removebg-preview.png" alt="logo" 90%></a>
            </div>

            <nav class="menu_header">
                <ul>
                    <li>
                        <a href="controller.php?act=sanpham">Mới & Nổi bật</a>
                        <ul class="drop_menu_header">
                            <div class="drop_menu_header_child">
                                <?php
                                if (isset($list_name_product)) {
                                    foreach ($list_name_product as  $name) {
                                        extract($name);
                                        $linksp = "?act=ctsp&idsp=" . $idsp;
                                        echo '<li><a href="' . $linksp . '">' . $name_product . '</a></li>';
                                    }
                                }
                                ?>
                            </div>
                        </ul>
                    </li>
                    <?php
                    if (isset($list_dm_header)) {
                        foreach ($list_dm_header as  $dm) {
                            extract($dm);
                            $linkdm = "?act=sanpham&iddm=" . $iddm;
                            $linksp = "?act=ctsp&idsp=" . $idsp;
                    ?>
                            <li>
                                <a href="<?= $linkdm ?>"><?= $name_dm ?></a>
                                <ul class="drop_menu_header">
                                    <div class="drop_menu_header_child">
                                        <?php
                                        $load_product_dm = loadall_name_product_dm($iddm);
                                        if (isset($load_product_dm)) {
                                            foreach ($load_product_dm as  $name) {
                                                extract($name);
                                                $linksp = "?act=ctsp&idsp=" . $idsp;
                                                echo '<li><a href="' . $linksp . '">' . $name_product . '</a></li>';
                                            }
                                        }
                                        ?>


                                    </div>
                                </ul>
                            </li>
                    <?php
                        }
                    }
                    ?>

                    <li><a href="?act=salesp">Sale</a>
                        <ul class="drop_menu_header">
                            <div class="drop_menu_header_child">
                                <?php
                                if (isset($load_giamgia)) {
                                    foreach ($load_giamgia as  $name) {
                                        extract($name);
                                        $linksp = "?act=ctsp&idsp=" . $idsp;
                                        echo '<li><a href="' . $linksp . '">' . $name_product . '</a></li>';
                                    }
                                }
                                ?>
                            </div>
                        </ul>
                    </li>

                </ul>
            </nav>

            <section class="search_header">
                <form action="?act=sanpham" method="post">
                    <input type="text" name="kyw" id="tksp" placeholder="Search">
                    <button name="tksp" class="search_header_button">
                        <i class="fa-solid fa-magnifying-glass fa-xl"></i>
                    </button>

                </form>
                <?php
                if (isset($_SESSION['userkh'])) {
                ?>
                    <a href="?act=spyt"> <i class="fa-regular fa-heart fa-xl" style="margin-left: 10px;"></i></a>
                    <a href="?act=giohang" class="giohang">
                        <i class="fa-solid fa-bag-shopping fa-xl"></i>
                        <?php
                        $count_giohang_kh = count_giohang_kh($idtk_kh);
                        if (isset($count_giohang_kh)) {
                            extract($count_giohang_kh);
                        ?>
                            <span><?= $soluong ?></span>
                        <?php
                        }
                        ?>
                    </a>
                <?php
                } else {
                } ?>
            </section>
        </section>
        <?php if (isset($_SESSION['userkh'])) {
        ?>
            <div class="banner_child">
                <p id="top_text">Xin chào bạn, <span style="color: red;"><?= $namekh ?></span></p>
                <p id="bottom_text">Chúc Bạn ngày mới tốt lành</p>
            </div>
        <?php
        } else {
        ?>
            <div class="banner_child">
                <p id="top_text">Xin chào bạn</p>
                <p id="bottom_text">Chúc Bạn ngày mới tốt lành</p>
            </div>
        <?php
        }
        ?>
        <div class="banner_child">
            <p id="top_text">Sản phẩm sale</p>
            <p id="bottom_text">Nhiều hãng giày như NIKE, ADIDAS , PUMA ,..</p>
        </div>
        <div class="banner_child">
            <p id="top_text">Miễn Phí Giao hàng</p>
            <p id="bottom_text">Thông tin chi tiết,<a href="#tintuc">Xem thêm</a></p>
        </div>
        <div class="banner_child">
            <p id="top_text">Sản phẩm HOT</p>
            <p id="bottom_text">Thông tin sản phẩm phía bên dưới, <a href="#sphot">xem thêm</a></p>
        </div>
        <div class="loading">
            <div class="loading-spinner">
                <img src="image/hinh-anh-dang-loading-troll-dep_093253599-removebg-preview.png" alt="" style="height: 50px;">
            </div>
        </div>
        <script>
            // Sử dụng hàm `addEventListener()` để lắng nghe sự kiện `load` của window
            window.addEventListener("load", function() {
                // Hiển thị phần tử `loading`
                document.querySelector(".loading").style.opacity = "0.5";
                setTimeout(function() {
                    document.querySelector(".loading").style.display = "none";
                }, 500); // Thời gian chờ trước khi ẩn phần tử `loading`
            });
        </script>
        <script>
            // text show
            var slidetext = 0
            timeout = 0

            function textshow() {
                var texts = document.querySelectorAll('.banner_child')
                for (var i = 0; i < texts.length; i++) {
                    texts[i].style.display = 'none';
                }
                slidetext++
                if (slidetext > texts.length) {
                    slidetext = 1
                }
                if (slidetext < 1) {
                    slidetext = texts.length
                }
                texts[slidetext - 1].style.display = 'block'
                timeout = setTimeout(textshow, 3000);
            }
            textshow()
        </script>

        <section class="up_header">
            <a href="#header"><button><i class="fa-solid fa-circle-chevron-up"></i></button></a>
        </section>
    </header>