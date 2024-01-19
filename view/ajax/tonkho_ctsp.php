<?php
include '../../model/pdo.php';
include '../../model/taikhoan_kh.php';
include '../../model/sanpham.php';
include '../../model/donhang.php';
include '../../model/danhmuc.php';
include '../../model/danhgia.php';
include '../../model/magiamgia.php';
if (isset($_POST['chon_mau']) && isset($_POST['chon_size'])) {

    $id_color = $_POST['chon_mau'];
    $id_size = $_POST['chon_size'];
    $id_sp = $_POST['id_sp'];

    $sql = "SELECT soluong FROM `bienthe_sp` WHERE idsp = $id_sp and id_size = $id_size and id_color = $id_color";
    $ton_kho = pdo_query_one($sql);
}
?>
<div id="tonkho">
    <?php
    if (isset($ton_kho) && !empty($ton_kho)) {
        echo "<span>Kho: " . $ton_kho['soluong'] . " </span>";
    } else {
        echo "Kho: 0";
    }
    ?>

</div>