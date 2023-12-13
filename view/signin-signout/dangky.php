<?php include 'header_signin.php'; ?>
<?php if (isset($thongbao)) :  ?>
    <script>
        alert('<?= $thongbao ?>');
    </script>
<?php endif ?>
<section class="title_login">
    <h2>Tạo Tài Khoản</h2> <br>
    <p>Cho trải nghiệm mua hàng thú vị hơn</p>
</section>
<form action="controller.php?act=dangky" method="post">
    <section class="detail_signin">

        <div class="group_form" style="grid-area: a;">
            <label for="">Họ và tên</label> <br>
            <input type="text" name="hoten" id="" placeholder="Nhập họ tên của bạn">
            <!-- dùng để hiện thị cảnh báo -->
            <p></p>
        </div>
        <div class="group_form" style="grid-area: b;">
            <label for="">Tài khoản </label> <br>
            <input type="text" name="user" id="" placeholder="Nhập tài khoản  ">
            <!-- dùng để hiện thị cảnh báo -->
            <p></p>
        </div>
        <div class="group_form" style="grid-area: c;">
            <label for="">Mật khẩu</label> <br>
            <input type="password" name="pw" id="" placeholder="Nhập mật khẩu">
            <!-- dùng để hiện thị cảnh báo -->
            <p></p>
        </div>
        <div class="group_form" style="grid-area: d;">
            <label for="">Nhập lại mật khẩu</label> <br>
            <input type="password" name="re_pw" id="" placeholder="Nhập lại mật khẩu">
            <!-- dùng để hiện thị cảnh báo -->
            <p></p>
        </div>
        <div class="action_form" style="grid-area: e;margin: 20px;">
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
            <input type="submit" value="Đăng Ký" name="dkuser">
        </div>

    </section>
</form>
<div class="sign_in">
    <span>Bạn đã có tải khoản?</span> <a href="controller.php?act=dangnhap"><span class="text_color_red">Đăng nhập ngay</span></a>
    <br><br>
    <a href="controller.php?act=home">
        <p>Quay lại trang chủ</p>
    </a>
</div>
</article>
</section>