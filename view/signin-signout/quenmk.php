<?php include 'header_signin.php'; ?>
<?php if (isset($thongbao)) :  ?>
    <script>
        alert('<?= $thongbao ?>');
    </script>
<?php endif ?>
<section class="title_login">
    <h2>Quên mật khẩu</h2> <br>
    <!-- <p>Cho trải nghiệm mua hàng thú vị hơn</p> -->
</section>

<section class="detail_login">
    <form action="controller.php?act=loadmk" method="post">
        <div class="group_form" style="grid-area: a;">
            <label for="">Tài khoản</label> <br>
            <input type="text" name="user" id="" placeholder="Nhập tài khoản của bạn ">
            <!-- dùng để hiện thị cảnh báo -->
            <p></p>
        </div>

        <div class="submit_form" style="grid-area: f;">
            <input type="submit" value="Tiếp tục" name="qmk">
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


</body>

</html>