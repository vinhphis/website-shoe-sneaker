<?php include 'detail_user_left.php'; ?>
<?php if (isset($thongbao)) :  ?>
    <script>
        alert('<?= $thongbao ?>');
    </script>
<?php endif ?>
<?php
if (isset($_SESSION['userkh'])) {
    extract($_SESSION['userkh']);
?>
    <article class="detail_user_right">
        <div class="title_detail_user">
            <h3>Đổi Mật Khẩu</h3>
        </div>
        <section class="detail_user_right_child">

            <form action="?act=dmk_user" method="post" class="detail_user_child">
                <div class="group_form_user">
                    <label for="">Tên đăng nhập </label>
                    <input type="text" name="" id="" value="<?= $user ?>" disabled>
                    <input type="hidden" name="user" id="" value="<?= $user ?>" >
                </div>
                <div class="group_form_user" >
                    <label for="">Mật khẩu cũ </label>
                    <input type="password" name="" id="password" value="<?= $password ?>" style="position: relative;">
                    <div style="position: absolute; left: 58%; top: 53%;">
                        <i class="fa-solid fa-eye" onclick="togglePassword()" id="hien" style="display: none; position: absolute;"></i>
                        <i class="fa-solid fa-eye-slash" onclick="togglePassword()" id="an" style=" position: absolute;"></i>
                    </div>
                </div>
                <div class="group_form_user">
                    <label for="">Mật khẩu mới </label>
                    <input type="password" name="pw" id="" value="" placeholder="Nhập mật khẩu mới">
                </div>
                <div class="group_form_user">
                    <label for="">Nhập lại mật khẩu </label>
                    <input type="password" name="re_pw" id="" value="" placeholder="Nhập lại mật khẩu mới">
                </div>

                <div class="group_form_user">
                    <div></div>
                    <input type="submit" value="Lưu thay đổi" name="dmkusser">
                </div>
            </form>

        </section>
    </article>
    </main>
<?php  }
?>