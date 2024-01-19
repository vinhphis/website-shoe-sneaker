<!-- 
    0: sản phẩm ở giỏ hàng
    1: đặt hàng thành công và chờ xác nhận
    2: sản phẩm đã được xác nhận
    3: sản phẩm bị hủy
-->
<?php
// 
function load_luotban($idsp)
{
    $sql = "SELECT  SUM(dhct.soluong) as luotban FROM `donhang` dh
    INNER JOIN donhang_ct dhct ON dh.iddh=dhct.iddh
    INNER JOIN bienthe_sp bt ON bt.id_bienthe = dhct.id_bienthe
    INNER JOIN product p ON p.idsp = bt.idsp
    where  p.idsp = $idsp and dh.action = 4";
    $load_luotban = pdo_query($sql);
    return $load_luotban;
}
// thống kê
function loadall_tongtien()
{
    $sql = "SELECT  SUM(tongtien) as sum_price FROM `donhang` where action = 4";
    $load_luotban = pdo_query_one($sql);
    return $load_luotban;
}
function load_luotban_admin()
{
    $sql = "SELECT SUM(soluong) as luotban FROM donhang 
    left join donhang_ct on donhang_ct.iddh = donhang.iddh
    WHERE donhang.action = 4";
    $tk_kh = pdo_query_one($sql);
    return $tk_kh;
}
function load_sp()
{
    $sql = "SELECT COUNT(*) as sp FROM `product` WHERE action =1 ";
    $tk_kh = pdo_query_one($sql);
    return $tk_kh;
}
function count_status1_hd()
{
    $sql = "SELECT COUNT(*) as sp_cho FROM `donhang` WHERE action = 1";
    $tk_kh = pdo_query_one($sql);
    return $tk_kh;
}
// end thống kê
function load_top_4sp_luotban()
{
    $sql = "SELECT p.name_product,p.price_sale,p.price,p.image, p.idsp,SUM(dhct.soluong) as luotban FROM `donhang` dh
    INNER JOIN donhang_ct dhct ON dh.iddh=dhct.iddh
    INNER JOIN bienthe_sp bt ON bt.id_bienthe = dhct.id_bienthe
    INNER JOIN product p ON p.idsp = bt.idsp
    where p.action = 1
    GROUP by p.idsp, luotban
    ORDER by luotban desc
    limit 4";
    $load_luotban = pdo_query($sql);
    return $load_luotban;
}

// trang giỏ hàng
function loadall_giohang($idtk_kh)
{
    $sql = "SELECT product.name_product,size.name_size,color.name_color,product.image,product.price_sale,donhang_ct.soluong,donhang_ct.id_bienthe,donhang_ct.iddh_ct,product.idsp from donhang_ct 
    left join bienthe_sp on bienthe_sp.id_bienthe = donhang_ct.id_bienthe
    left join product on product.idsp = bienthe_sp.idsp
    left join size on size.id_size = bienthe_sp.id_size
    left join color on color.id_color = bienthe_sp.id_color
    where idtk_kh = $idtk_kh and donhang_ct.action = 0
    order by iddh_ct desc
    ";
    $list_giohang = pdo_query($sql);
    return $list_giohang;
}
function count_giohang_kh($idtk_kh)
{
    $sql = "SELECT COUNT(*) as soluong from donhang_ct 
    where idtk_kh = $idtk_kh and donhang_ct.action = 0
    ";
    $list_giohang = pdo_query_one($sql);
    return $list_giohang;
}
function update_soluong_giohang($iddh_ct, $soluong, $id_bienthe)
{
    $sql = "UPDATE donhang_ct SET
    soluong = soluong + $soluong
    where iddh_ct = $iddh_ct and id_bienthe= $id_bienthe";
    pdo_execute($sql);
}
// function check_id_bienthe_gh()
// {

//     $sql = " SELECT id_bienthe from donhang_ct;
//     ";
//     $list_giohang = pdo_query($sql);
//     return $list_giohang;
// }
function add_giohang($id_bienthe, $idtk_kh, $soluong)
{
    $sql = "INSERT INTO donhang_ct(id_bienthe,idtk_kh,soluong,action) 
    VALUE('$id_bienthe','$idtk_kh','$soluong','0')";
    pdo_execute($sql);
}
function insert_iddh_ct()
{
    $sql = "SELECT MAX(iddh_ct) as top1_iddhct FROM `donhang_ct` 
    limit 1";
    $list_giohang = pdo_query_one($sql);
    return $list_giohang;
}
function delete_giohang($iddh_ct)
{
    $sql = "DELETE FROM donhang_ct WHERE iddh_ct = $iddh_ct";
    pdo_execute($sql);
}
// trang thanh toán
function loadall_thanhtoan($iddh_ct)
{
    $sql = "SELECT *,dhct.soluong as soluong FROM donhang_ct dhct
    left join bienthe_sp bt on bt.id_bienthe= dhct.id_bienthe
    left join product p on bt.idsp= p.idsp
    left join size on bt.id_size = size.id_size
    left join color on bt.id_color = color.id_color
    where iddh_ct in ($iddh_ct) ";
    $list_thanhtoan = pdo_query($sql);
    return $list_thanhtoan;
}
// thêm số lượng giỏ hàng vòa trang thanh toán
// function update_soluong($iddh_ct, $soluong)
// {
//     $sql = "UPDATE donhang_ct SET soluong = ($soluong) 
//     WHERE iddh_ct in ($iddh_ct) ";
//     pdo_execute($sql);
// }
// bill đơn hàng
function add_bill($ma_hd,  $ghichu, $tongtien, $idtk_kh, $name_buyer, $phone, $email, $address, $payments, $vchuyen, $date)
{
    $sql = "INSERT INTO donhang(ma_hd ,ghichu,tongtien,idtk_kh ,name_buyer,phone,email,address,payments,vchuyen,date,action) 
    VALUE('$ma_hd','$ghichu','$tongtien','$idtk_kh ','$name_buyer','$phone','$email','$address','$payments','$vchuyen','$date','1')";
    pdo_execute($sql);
}

function update_bienthe_soluong_dathang($id_bienthe, $soluong)
{
    $sql = "UPDATE bienthe_sp set soluong = soluong - $soluong 
    WHERE id_bienthe = $id_bienthe ";
    pdo_execute($sql);
}
function update_bienthe_soluong_huydon($id_bienthe, $soluong)
{
    $sql = "UPDATE bienthe_sp set soluong = soluong + $soluong 
    WHERE id_bienthe = $id_bienthe ";
    pdo_execute($sql);
}
function load_bill($idtk_kh)
{
    $sql = "SELECT * from donhang dh
    where idtk_kh = $idtk_kh 
    order by dh.iddh desc
    ";
    $list_giohang = pdo_query($sql);
    return $list_giohang;
}
function load_bill_admin()
{
    $sql = "SELECT *,donhang.action FROM `donhang` 
    inner join tk_kh on tk_kh.idtk_kh = donhang.idtk_kh
    order by iddh desc
    ";
    $list_giohang = pdo_query($sql);
    return $list_giohang;
}
function load_bill_detail($iddh)
{
    $sql = "SELECT *,dhct.soluong,dh.action from donhang_ct dhct
    inner join donhang dh on dh.iddh=dhct.iddh
    inner join bienthe_sp bt on bt.id_bienthe = dhct.id_bienthe
    inner join product p on p.idsp = bt.idsp
    inner join size s on s.id_size = bt.id_size
    inner join color c on c.id_color = bt.id_color
    WHERE dhct.iddh = $iddh
    order by dhct.iddh desc
    ";
    $list_giohang = pdo_query($sql);
    return $list_giohang;
}
function count_iddh()
{
    $sql = "SELECT count(iddh) as sodh from donhang";
    $list_giohang = pdo_query_one($sql);
    return $list_giohang;
}
function insert_iddh()
{
    $sql = "SELECT iddh from donhang
    order by iddh desc
    limit 1";
    $list_giohang = pdo_query_one($sql);
    return $list_giohang;
}
function update_iddh($iddh, $iddh_ct)
{
    $sql = "UPDATE donhang_ct 
    SET iddh = $iddh 
    WHERE iddh_ct in ($iddh_ct) ";
    pdo_execute($sql);
}
function check_count_hd()
{
    $sql = "SELECT max(iddh) as sum_dh FROM `donhang`";
    $list_giohang = pdo_query_one($sql);
    return $list_giohang;
}


// trang lịch sử mua hàng
function load_iddh($iddh)
{
    $sql = "SELECT action FROM `donhang` 
    WHERE iddh = $iddh";
    $list_giohang = pdo_query_one($sql);
    return $list_giohang;
}
// #1
function update_status1_bill($iddh_ct)
{
    $sql = "UPDATE donhang_ct SET action='1' WHERE iddh_ct in ($iddh_ct) ";
    pdo_execute($sql);
}
function update_status2_bill($iddh)
{
    $sql = "UPDATE donhang SET action='2' WHERE iddh = $iddh ";
    pdo_execute($sql);
}
function update_status3_bill($iddh)
{
    $sql = "UPDATE donhang SET action='3' WHERE iddh = $iddh ";
    pdo_execute($sql);
}
function update_status4_bill($iddh)
{
    $sql = "UPDATE donhang SET action='4' WHERE iddh = $iddh ";
    pdo_execute($sql);
}
function update_status5_bill($iddh)
{
    $sql = "UPDATE donhang SET action='5' WHERE iddh = $iddh ";
    pdo_execute($sql);
}
function update_status6_bill($iddh)
{
    $sql = "UPDATE donhang SET action='6' WHERE iddh = $iddh ";
    pdo_execute($sql);
}
