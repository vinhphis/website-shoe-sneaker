<!-- 
    0: bị ẩn 
    1: hiện thị
-->
<?php
// khách hàng thao tác
function dangky($namekh, $user, $password)
{
    $sql = "INSERT INTO tk_kh(namekh,user,password,image,action) 
    VALUE('$namekh','$user','$password','avata_default.jpg','1')";
    pdo_execute($sql);
}
function isert_idyk_kh()
{
    $sql = "SELECT max(idtk_kh) as idkh FROM tk_kh ";
    $tk_kh = pdo_query($sql);
    return $tk_kh;
}
function dangnhap($user, $password)
{
    $sql = "SELECT * FROM tk_kh WHERE  user =  '$user' and password = '$password' and action in (1,2)";
    $tk_kh = pdo_query_one($sql);
        if ($tk_kh != false) {
            $_SESSION['userkh'] = $tk_kh;
            $thongbao = "Đăng nhập thành công";
            return $thongbao;
        } else {
            $thongbao = "Đăng nhập thật bại, thông tin tài khoản sai";
            return $thongbao;
        }
    
}
function loadall_tk_user()
{
    $sql = "SELECT * FROM `tk_kh` WHERE action = 1";
    $tk_kh = pdo_query($sql);
    return $tk_kh;
}
function loadall_tk_kh_admin()
{
    $sql = "SELECT * FROM `tk_kh` WHERE action in (0,1)";
    $tk_kh = pdo_query($sql);
    return $tk_kh;
}
function loadall_tk_nv_admin()
{
    $sql = "SELECT * FROM `tk_kh` WHERE action in (2)";
    $tk_kh = pdo_query($sql);
    return $tk_kh;
}
// thống kê
function loadall_th_kh()
{
    $sql = "SELECT COUNT(*) as tk FROM `tk_kh` WHERE action = 1";
    $tk_kh = pdo_query_one($sql);
    return $tk_kh;
}
function dangxuat()
{
    if (isset($_SESSION['userkh'])) {
        unset($_SESSION['userkh']);
        header('location: controller.php?act=dangxuat_user');
    }
}
function delete_tk_kh($idtk_kh)
{
    $sql = "UPDATE tk_kh SET action = 0 WHERE idtk_kh = $idtk_kh ";
    pdo_execute($sql);
}
function load_detail_user($user)
{
    $sql = "SELECT * FROM tk_kh WHERE  user =  '$user' and action in (1,2) ";
    $tk_kh = pdo_query_one($sql);
    return $tk_kh;
}
function quen_matkhau($user, $password)
{
    $sql = "UPDATE tk_kh SET password = '$password' WHERE user = '$user' ";
    pdo_execute($sql);
}
function update_tk_kh($idtk_kh, $namekh, $image, $email, $phone, $address)
{
    if ($image != "")  $sql = "UPDATE tk_kh SET namekh='$namekh',image='$image',email='$email',phone='$phone',address='$address' WHERE idtk_kh = $idtk_kh ";
    else  $sql = "UPDATE tk_kh SET namekh='$namekh',email='$email',phone='$phone',address='$address' WHERE idtk_kh = $idtk_kh ";
    pdo_execute($sql);
}
// admin thao tác
function update_status0_tk_kh($idtk_kh)
{
    $sql = "UPDATE tk_kh SET action = '0' WHERE idtk_kh = $idtk_kh ";
    pdo_execute($sql);
}
function update_status1_tk_kh($idtk_kh)
{
    $sql = "UPDATE tk_kh SET action = '1' WHERE idtk_kh = $idtk_kh ";
    pdo_execute($sql);
}
