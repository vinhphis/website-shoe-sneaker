<?php 
function thongke_dm()
{
    $sql = "SELECT COUNT(name_dm) as soluong,name_dm FROM `danhmuc` dm
    left join product p on p.iddm = dm.iddm
    WHERE dm.action = 1
    GROUP by name_dm
    limit 4";
    $load_luotban = pdo_query($sql);
    return $load_luotban;
}
function thongke_sp()
{
    $sql = "SELECT  SUM(dhct.soluong) as luotban,p.name_product FROM `donhang` dh
    INNER JOIN donhang_ct dhct ON dh.iddh=dhct.iddh
    INNER JOIN bienthe_sp bt ON bt.id_bienthe = dhct.id_bienthe
    INNER JOIN product p ON p.idsp = bt.idsp
    where dh.action = 4
    GROUP by p.name_product ";
    $load_luotban = pdo_query($sql);
    return $load_luotban;
}
?>
