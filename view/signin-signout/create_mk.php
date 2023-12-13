<?php include 'header_signin.php'; ?>
<?php if (isset($thongbao)) :  ?>
    <script>
        alert('<?= $thongbao ?>');
    </script>
<?php endif ?>
<?php 
 if (isset($detail_user)) {
    extract($detail_user);
?>

<section class="title_login">
    <h2>Tạo mật khẩu</h2> <br>
    <!-- <p>Cho trải nghiệm mua hàng thú vị hơn</p> -->
</section>

<section class="detail_login">
    <form action="controller.php?act=create_mk" method="post">
        <div class="group_form" style="grid-area: a;">
            <label for="">Tài khoản</label> <br>
            <input type="text" name="" id="" value="<?=$user?>" disabled>
            <input type="hidden" name="user" value="<?=$user?>">
            <!-- dùng để hiện thị cảnh báo -->
            <p></p>
        </div>
        <div class="group_form" style="grid-area: c;">
            <label for="">Mật khẩu</label> <br>
            <input type="password" name="pw" id="" placeholder="Nhập mật khẩu" required>
            <!-- dùng để hiện thị cảnh báo -->
            <p></p>
        </div>
        <div class="group_form" style="grid-area: d;">
            <label for="">Nhập lại mật khẩu</label> <br>
            <input type="password" name="re_pw" id="" placeholder="Nhập lại mật khẩu" required>
            <!-- dùng để hiện thị cảnh báo -->
            <p></p>
        </div>

        <div class="submit_form" style="grid-area: f;">
            <input type="submit" value="Đổi mật khẩu" name="create_mk">
        </div>
    </form>
</section>

<div class="sign_in">
    <a href="controller.php?act=dangnhap">
        <p>Quay lại trang đăng nhập</p>
    </a>
    <br>
    <a href="controller.php?act=home">
        <p>Quay lại trang chủ</p>
    </a>
</div>
</article>
</section>
<?php } ?>
</body>

</html>
