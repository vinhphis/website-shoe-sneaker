<?php
include '../model/pdo.php';
include '../model/danhmuc.php';
include '../model/donhang.php';
include '../model/sanpham.php';
if (isset($_POST['tksp'])) {
    $kyw = $_POST['kyw'];
} else {
    $kyw = "";
}
if (isset($_GET['iddm']) && ($_GET['iddm'] > 0)) {
    $iddm = $_GET['iddm'];
} else {
    $iddm = 0;
}
if (isset($_POST['giatien'])) {
} else {
    $_POST['giatien'] = "";
}
$load_dm_sp = loadall_dm();
$listsp = loadall_product($kyw="", $iddm="", $_POST['giatien']);

