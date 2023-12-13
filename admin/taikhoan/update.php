<div class="dangky">

<?php
 if (isset($_SESSION['user'])){
    $user = loadone_taikhoan($_SESSION['user']);
    extract($user);
  }
?>


    <form action="index.php?act=edit_taikhoan" method="post">
        <h1>Cập nhật</h1>
        <div>
            <input type="text" name="name" placeholder="   Họ tên" value="<?= $name ?>">
        </div>
        <div>
            <input type="email" name="email" placeholder="   Email" value="<?= $email ?>" >
        </div>
        <div>
            <input type="text" name="address" placeholder="   Địa chỉ" value="<?= $address ?>">
        </div>
        <div>
            <input type="text" name="tel" placeholder="   Số điện thoại" value="<?= $tel ?>">
        </div>

        <div>
            <input type="text" name="user" placeholder="   Tên đăng nhập" value="<?= $user ?>">
        </div>
        <div>
            <input type="password" name="pass" placeholder="   Mật khẩu" value="<?= $pass ?>"> 
        </div>
        <div class="khac">
            <input type="hidden" name="id" value="<?= $id ?>">
          <div class="submit">
          <input type="submit" value="Cập nhật" name="capnhat">
          </div>
           <div class="reset">
           <input type="reset" value="Nhập lại">
           </div>
        </div>
    </form>
    <p class="thongbao">
    <?php
    if (isset($thongbao) && ($thongbao != "")) {
        echo $thongbao;
    }
    ?>
    </p>
   
</div>

<style>
  .thongbao{
    margin-top: 5px;
  }
    .dangky {
    width: 450px;
    margin: auto;
    margin-top: 20px;

  }

  .dangky h1 {
    text-align: center;
  }

  .dangky input {
    margin-top: 20px;
    margin-left: 20px;
    width: 400px;
    height: 35px;
  }
  .khac {
    display: grid;
    grid-template-columns: 200px 200px;
  }
  .khac input{
    width: 198px;
    margin-top: 20px;
    
  }
  .submit input{
    background-color: black;
    color: white;
  }
  .khac input:hover{
    background-color: white;
    color: black;
  }
  .reset input{
    background-color: white;
    color: black;
  }
  .reset input:hover{
    background-color: black;
    color: white;
  }
</style>