<?php include 'detail_user_left.php'; ?>
<?php if (isset($thongbao)) :  ?>
    <script>
        alert('<?= $thongbao ?>');
    </script>
<?php endif ?>
<?php
if (isset($_SESSION['userkh'])) {
    extract($_SESSION['userkh']);
    // var_dump($image); exit;
    $imagepath = "uploads/" . $image;
?>


    <article class="detail_user_right">
        <div class="title_detail_user">
            <h3>Thông Tin Tài Khoản</h3>
        </div>
        <section class="detail_user_right_child">

            <form action="#" method="post" class="detail_user_child">
                <div class="group_form_user">
                    <label for="">Tên đăng nhập </label>
                    <input type="text" name="" id="" value="<?= $user ?>" disabled>
                </div>
                <div class="group_form_user">
                    <label for="">Họ tên </label>
                    <input type="text" name="hoten" id="" value="<?= $namekh ?>">
                </div>
                <div class="group_form_user">
                    <label for="">Số điện thoại </label>
                    <input type="text" name="phone" id="" value="<?= $phone ?>">
                </div>
                <div class="group_form_user">
                    <label for="">Email </label>
                    <input type="email" name="email" id="" value="<?= $email ?>">
                </div>
                <div class="group_form_user">
                    <label for="">Địa chỉ </label>
                    <input type="text" name="address" id="" value="<?= $address ?>">
                </div>
                <div class="group_form_user">
                    <div></div>
                    <input type="submit" value="Lưu thay đổi" name="update_detail_user">
                </div>
            </form>

            <form action="#" method="post" class="avata_user" enctype="multipart/form-data">
                <img src="<?= $imagepath ?>" alt="" height="150" width="150" style="border: 1px solid gray;border-radius: 100%;">
                <!-- <img src="uploads/avata_default.jpg" alt=""> -->
                <!-- <input type="file" name="" id="" >   -->
            </form>
        </section>
    </article>
<?php
}
?>
</main>