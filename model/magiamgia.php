<!-- 
    0: bị ẩn 
    1: hiện thị
-->
<?php
// bên admin thêm
function add_mgg($name_mgg, $discount, $soluong, $category)
{
    $sql = "INSERT INTO voucher(name_mgg,discount,soluong,category,action) 
    VALUE('$name_mgg','$discount','$soluong','$category','1')";
    pdo_execute($sql);
}
function add_mgg_user_new($idtk_kh)
{
    $sql = "INSERT INTO voucher_kh(idmgg,idtk_kh,action) VALUE('4','$idtk_kh','1')";
    pdo_execute($sql);
}
function loadall_mgg_admin()
{
    $sql = "SELECT * FROM voucher 
    order by discount asc";
    $list_mgg = pdo_query($sql);
    return $list_mgg;
}
function loadone_mgg_admin($name_mgg)
{
    $sql = "SELECT * FROM voucher 
   where name_mgg = '$name_mgg' ";
    $list_mgg = pdo_query_one($sql);
    return $list_mgg;
}
function loadall_mgg_admin_user()
{
    $sql = "SELECT * FROM voucher 
    where action = 1
    order by discount asc";
    $list_mgg = pdo_query($sql);
    return $list_mgg;
}
function update_status0_mgg($idmgg)
{
    $sql = "UPDATE voucher SET action = '0' 
    WHERE idmgg = $idmgg ";
    pdo_execute($sql);
}
function update_status1_mgg($idmgg)
{
    $sql = "UPDATE voucher SET action = '1' 
    WHERE idmgg = $idmgg ";
    pdo_execute($sql);
}
function update_soluong_voucher($idmgg)
{
    $sql = "UPDATE voucher SET soluong = soluong - 1 
    WHERE idmgg = $idmgg ";
    pdo_execute($sql);
}
// function load_soluong_voucher($idmgg)
// {
//     $sql = "SELECT `soluong` FROM `voucher` WHERE idmgg = $idmgg";
//     $voucher =   pdo_query_one($sql);
//     return $voucher;
// }
// bảng liên kết voucher với tk khách hàng
function loadall_mgg_user($idtk_kh)
{
    $sql = "SELECT v.name_mgg,v.idmgg,vk.id_mgg_kh,category FROM voucher_kh vk
    INNER join tk_kh kh on vk.idtk_kh = kh.idtk_kh
    INNER join voucher v on v.idmgg = vk.idmgg
    WHERE kh.idtk_kh = $idtk_kh and v.action = 1 
    order by id_mgg_kh desc";
    $list_mgg = pdo_query($sql);
    return $list_mgg;
}
function loadaone_category_mgg($id_mgg_kh)
{
    $sql = "SELECT v.name_mgg,v.idmgg,vk.id_mgg_kh,category,discount FROM voucher_kh vk
    INNER join tk_kh kh on vk.idtk_kh = kh.idtk_kh
    INNER join voucher v on v.idmgg = vk.idmgg
    WHERE vk.id_mgg_kh = $id_mgg_kh";
    $list_mgg = pdo_query_one($sql);
    return $list_mgg;
}

function loadall_mgg($name_mgg)
{
    $sql = "SELECT name_mgg,idmgg,soluong FROM voucher 
    where name_mgg = '$name_mgg'";
    $list_mgg = pdo_query_one($sql);
    return $list_mgg;
}
// khách hàng thêm hoặc lưu mã giảm giá
function loadall_mgg_kh($name_mgg, $idtk_kh)
{
    $sql = "SELECT * FROM voucher_kh 
    left join voucher on voucher_kh.idmgg = voucher.idmgg
    where name_mgg = '$name_mgg' and idtk_kh = '$idtk_kh'";
    $list_mgg = pdo_query_one($sql);
    return $list_mgg;
}
function update_mgg_user($idtk_kh, $idmgg)
{
    $sql = "INSERT INTO voucher_kh(idtk_kh, idmgg, action) 
    VALUES ('$idtk_kh','$idmgg','1')";
    pdo_execute($sql);
}
function delete_mgg_user($id_mgg_kh)
{
    $sql = "DELETE FROM voucher_kh 
    where id_mgg_kh = $id_mgg_kh ";
    pdo_execute($sql);
}
