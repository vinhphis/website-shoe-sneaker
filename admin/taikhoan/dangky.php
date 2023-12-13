<div class="dangky">
    <form action="index.php?act=dangky" method="post">
        <h1>Đăng ký</h1>
        <div>
            <input type="text" name="name" placeholder="   Họ tên">
        </div>
        <div>
            <input type="email" name="email" placeholder="   Email" >
        </div>

        <div>
            <input type="text" name="user" placeholder="   Tên đăng nhập">
        </div>
        <div>
            <input type="password" name="pass" placeholder="   Mật khẩu">
        </div>
        <div class="khac">
          <div class="submit">
          <input type="submit" value="Đăng ký" name="dangky">
          </div>
           <div class="reset">
           <a href="index.php?act=dangnhap"><input type="button" value="Đăng nhập" name="dangnhap"></a>
           </div>
        </div>
    </form>
    <p class="thongbao">
    <?php
     if (isset($thongbao) && ($thongbao != "")) {
      echo '<script> alert("'.$thongbao.'")</script>';
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