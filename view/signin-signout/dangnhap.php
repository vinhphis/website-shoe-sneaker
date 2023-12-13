<?php include 'header_signin.php';
?>
<?php if (isset($thongbao)) {  ?>
    <script>
        alert('<?= $thongbao ?>');
    </script>
<?php } else if (isset($_COOKIE['thongbao'])) { ?>
    <script>
        alert('<?= $_COOKIE['thongbao'] ?>');
    </script>
<?php } ?>
<section class="title_login">
    <h2>Đăng Nhập</h2> <br>
    <p>Cho trải nghiệm mua hàng thú vị hơn</p>
</section>

<section class="detail_login">
    <form action="controller.php?act=dangnhap" method="post">
        <div class="group_form" style="grid-area: a;">
            <label for="">Tài khoản</label> <br>
            <input type="text" name="user" id="" placeholder="Nhập tài khoản">
            <!-- dùng để hiện thị cảnh báo -->
            <p></p>
        </div>
        <div class="group_form" style="grid-area: b;">
            <label for="">Mật khẩu</label> <br>
            <input type="password" name="pw" id="" placeholder="Nhập mật khẩu">
            <!-- dùng để hiện thị cảnh báo -->
            <p></p>
        </div>

        <div class="action_form" style="grid-area: c;margin: 20px;">
            <section>
                <input type="checkbox">
                <span>Ghi nhớ tài khoản</span> <br> <br>
                <input type="checkbox" name="" id="">
                <span>Tôi đồng ý với
                    <a href="#"><span class="text_color_blue">điều khoản</span></a>
                    và
                    <a href="#"><span class="text_color_blue">chính sách</span></a>
                </span>
            </section>

            <a href="controller.php?act=quenmk">
                <p class="text_color_blue">Quên mật khẩu</p>
            </a>
        </div>

        <div class="submit_form" style="grid-area: f;">
            <input type="submit" value="Đăng Nhập" name="dangnhap">
        </div>
    </form>
</section>



<div class="sign_in">
    <span>Bạn chưa có tải khoản?</span> <a href="controller.php?act=dangky"><span class="text_color_red">Đăng ký ngay</span></a>
    <br><br>
    <a href="controller.php?act=home">
        <p>Quay lại trang chủ</p>
    </a>
</div>
</article>
</section>

</body>

</html>