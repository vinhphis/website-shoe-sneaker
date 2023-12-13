<main class="detail_user">
    <aside class="detail_user_left">
        <nav>
            <ul>
                <h3>Trang Tài Khoản</h3>
                <?php
                if (isset($_SESSION['userkh'])) {
                    extract($_SESSION['userkh']);
                ?>
                    <p>Xin chào, <span class="text_color_red"><?= $namekh ?></span></p>
                <?php  }
                ?>
                <li><a href="controller.php?act=detail_user">Thông tin khách hàng</a></li>
                <li><a href="controller.php?act=dmk_user">Đổi mật khẩu</a></li>
                <li><a href="controller.php?act=lsmh_user">Lịch sử mua hàng</a></li>
                <li><a href="controller.php?act=voucher_user">Voucher</a></li>
                <?php
                if ($action == 2) {
                ?>
                    <li><a href="../../admin/startbootstrap-sb-admin-2/index.php">Quản lý admin</a></li>
                <?php
                }
                ?>
                <li><a href="controller.php?act=dangxuat_user">Đăng xuất</a></li>
            </ul>
        </nav>
    </aside>