<?php
function add_product($iddm, $image, $price, $price_sale, $name_product, $mota)
{
    $sql = "INSERT INTO product(iddm,image,price,price_sale,name_product,mota,luotxem,luotban,action) 
    VALUE('$iddm','$image','$price','$price_sale','$name_product','$mota','0','0','1')";
    pdo_execute($sql);
}
function loadall_product($kyw, $iddm, $sapxep, $price_max, $price_min, $stars, $id_color, $id_size)
{
    $sql = "SELECT DISTINCT product.idsp,danhmuc.name_dm,danhmuc.iddm,image,name_product,price,price_sale,mota,luotban,ratingstars FROM product 
    left join danhmuc on danhmuc.iddm=product.iddm
    left join bienthe_sp on product.idsp = bienthe_sp.idsp
    left join color on color.id_color = bienthe_sp.id_color
    left join size on size.id_size = bienthe_sp.id_size
    where product.action = 1 
    ";
    if ($kyw != "") $sql .= " AND name_product like '%" . $kyw . "%'";
    if ($iddm > 0) {
        $sql .= " AND danhmuc.iddm ='" . $iddm . "' ";
        if ($kyw != "") $sql .= " AND name_product like '%" . $kyw . "%'";
    }

    if ($id_color != "") {
        $sql .= " AND bienthe_sp.id_color in ($id_color)";
    }
    if ($id_size != "") {
        $sql .= " AND bienthe_sp.id_size in ($id_size)";
    }
    if ($stars != "") {
        $sql .= " AND ratingstars in ($stars)";
    }
    if ($price_max > $price_min) {
        $sql .= " AND price_sale BETWEEN $price_min and $price_max
        ORDER BY ratingstars,price_sale asc";
    }

    if ($sapxep == "giam") {
        $sql .= " order by price_sale desc";
    } else if ($sapxep == "tang") {
        $sql .= " order by price_sale asc";
    } else if ($sapxep == "a->z") {
        $sql .= " order by name_product asc";
    } else if ($sapxep == "z->a") {
        $sql .= " order by name_product desc";
    }
    // echo $sql;
    $list_product = pdo_query($sql);
    return $list_product;
}
function loadall_product_admin($kyw, $iddm)
{
    $sql = "SELECT product.idsp,danhmuc.name_dm,danhmuc.iddm,image,name_product,price,price_sale,mota,luotban,product.action FROM product 
    left join danhmuc on danhmuc.iddm=product.iddm
    where 1";
    if ($kyw != "") $sql .= " AND name_product like '%" . $kyw . "%'";
    if ($iddm > 0)  $sql .= " AND danhmuc.iddm ='" . $iddm . "' ";
    $list_product = pdo_query($sql);
    return $list_product;
}
function check_product($idsp, $name_product)
{
    $sql = "SELECT * FROM product 
    WHERE  idsp = '$idsp' and  name_product= '$name_product'";
    // echo $sql;
    $list_product = pdo_query_one($sql);
    return $list_product;
}
function check_name_product($name_product)
{
    $sql = "SELECT name_product FROM product 
    WHERE name_product= '$name_product'  ";
    $list_product = pdo_query_one($sql);
    return $list_product;
}

function load_max_min_price_sale()
{
    $sql = "SELECT max(price_sale) as maxp,min(price_sale) as minp FROM `product`
    where action = 1";
    $list_product = pdo_query_one($sql);
    return $list_product;
}
function ton_kho($idsp)
{
    $sql = "SELECT SUM(soluong) as kho FROM `bienthe_sp` WHERE idsp = $idsp";
    $list_product = pdo_query_one($sql);
    return $list_product;
}
function loadall_pt_giamgia()
{
    $sql = "SELECT *,((price-price_sale)/price)*100 as ptgiamgia FROM `product` 
    left join danhmuc on danhmuc.iddm=product.iddm
    where product.action = 1
    order by ptgiamgia desc";
    $list_product = pdo_query($sql);
    return $list_product;
}
function loadall_6sp_giamgia()
{
    $sql = "SELECT *,((price-price_sale)/price)*100 as ptgiamgia FROM `product` 
    left join danhmuc on danhmuc.iddm=product.iddm
    where product.action = 1
    order by ptgiamgia desc
    limit 6";
    $list_product = pdo_query($sql);
    return $list_product;
}
function loadall_top1_giamgia()
{
    $sql = "SELECT max(((price-price_sale)/price)*100)  as top1 FROM `product` ";
    $list_product = pdo_query_one($sql);
    return $list_product;
}
function loadone_bt_tt($id_bienthe)
{
    $sql = "SELECT p.image,name_product,name_color,name_size,price_sale,id_bienthe FROM `bienthe_sp` bt
    INNER join product p on bt.idsp=p.idsp
    INNER join color c on c.id_color = bt.id_color
    INNER join size s on s.id_size = bt.id_size
    WHERE id_bienthe = $id_bienthe";
    $list_product = pdo_query_one($sql);
    return $list_product;
}
function loadall_name_product()
{
    $sql = "SELECT idsp,name_product FROM product 
    where action = 1
    ";
    $list_product = pdo_query($sql);
    return $list_product;
}
function load_luotxem()
{
    $sql = "SELECT sum(luotxem) as lx FROM product 
    ";
    $list_product = pdo_query_one($sql);
    return $list_product;
}
// load 12 sản phẩm ở trang chủ
function loadall_product_home()
{
    $sql = "SELECT *,name_dm FROM product 
    left join danhmuc on danhmuc.iddm = product.iddm
    where product.action = 1
    order by idsp desc 
    limit 12
    ";
    $list_product = pdo_query($sql);
    return $list_product;
}
// load sản phẩm theo danh mục phần header
function loadall_name_product_dm($iddm)
{
    $sql = "SELECT idsp,name_product FROM product 
    where iddm = $iddm";
    $list_product = pdo_query($sql);
    return $list_product;
}
// load sản phẩm trang ctsp
function loadone_product($idsp)
{
    $sql = "SELECT * FROM product WHERE idsp = $idsp and action=1";
    $list_product = pdo_query_one($sql);
    return $list_product;
}

function check_color_size_bienthe($idsp, $idcolor, $idsize)
{
    $sql = "SELECT * FROM bienthe_sp bt
    INNER join color c on c.id_color = bt.id_color
    INNER join size s on s.id_size = bt.id_size
    where  bt.idsp = $idsp and s.id_size = $idsize and c.id_color = $idcolor
    ";
    $list_spyt = pdo_query($sql);
    return $list_spyt;
}
function loadall_product_cungloai($iddm, $idsp)
{
    $sql = "SELECT *,name_dm FROM product 
        left join danhmuc on danhmuc.iddm = product.iddm
        WHERE product.iddm = $iddm and idsp <> $idsp";
    $list_product = pdo_query($sql);
    return $list_product;
}
function load_idsp()
{
    $sql = "SELECT idsp FROM product 
    order by idsp desc 
    limit 1";
    $list_product = pdo_query_one($sql);
    return $list_product;
}

function update_product($idsp, $name_product, $hinh, $price, $price_sale, $mota)
{
    if ($hinh != "")  $sql = "UPDATE product set  name_product='" . $name_product . "', price='" . $price . "',price_sale='" . $price_sale . "'
  , mota='" . $mota . "', image='" . $hinh . "' where idsp=" . $idsp;
    else  $sql = "UPDATE product set  name_product='" . $name_product . "', price='" . $price . "',price_sale='" . $price_sale . "'
   , mota='" . $mota . "' where idsp=" . $idsp;
    pdo_execute($sql);
}
// lượt xem sản phẩm
function update_product_view($idsp)
{
    $sql = "UPDATE product set luotxem = luotxem + 1 WHERE idsp = $idsp ";
    pdo_execute($sql);
}
// cộng lượt bán khi người mua hàng đặt hàng thành công
function update_product_luotban($idsp)
{
    $sql = "UPDATE product set luotban = luotban + 1 WHERE idsp = $idsp ";
    pdo_execute($sql);
}

function update_status0_product($idsp)
{
    $sql = "UPDATE product SET action = '0' WHERE idsp = $idsp ";
    pdo_execute($sql);
}
function update_status1_product($idsp)
{
    $sql = "UPDATE product SET action = '1' WHERE idsp = $idsp ";
    pdo_execute($sql);
}
function delete_product($idsp)
{
    $sql = "DELETE FROM product WHERE idsp = $idsp";
    pdo_execute($sql);
}
// biến thể sản phẩm (chi tiết sản phẩm)

function update_bienthe($id_bienthe, $soluong)
{
    $sql = "UPDATE bienthe_sp set soluong='$soluong' WHERE id_bienthe = $id_bienthe ";
    pdo_execute($sql);
}
// dùng khi muốn ẩn sản phẩm chi tiết
function update_status_bienthe($id_bienthe)
{
    $sql = "UPDATE bienthe_sp set action = 0 WHERE id_bienthe = $id_bienthe ";
    pdo_execute($sql);
}
function add_bienthe_sp($idsp, $id_color, $id_size, $soluong)
{
    $sql = "INSERT INTO bienthe_sp(idsp,id_color,id_size,soluong,action) VALUE('$idsp','$id_color','$id_size','$soluong','1')";
    pdo_execute($sql);
}

function check_bienthe($idsp)
{
    $sql = "SELECT * FROM `bienthe_sp` 
    left join color on color.id_color = bienthe_sp.id_color
    left join size on size.id_size = bienthe_sp.id_size
    WHERE idsp = $idsp";
    $list_spyt = pdo_query($sql);
    return $list_spyt;
}
function loadall_bienthe_sp()
{
    $sql = "SELECT name_product,size.name_size,color.name_color,bienthe_sp.id_bienthe,bienthe_sp.soluong,bienthe_sp.action FROM bienthe_sp 
    left join product on bienthe_sp.idsp = product.idsp
    left join size on bienthe_sp.id_size = size.id_size
    left join color on bienthe_sp.id_color = color.id_color
    where bienthe_sp.action = 1
    ";
    $list_bienthe = pdo_query($sql);
    return $list_bienthe;
}
function loadall_bienthe_sp_admin($kyw, $iddm)
{
    $sql = "SELECT name_product,size.name_size,color.name_color,bienthe_sp.id_bienthe,bienthe_sp.soluong,bienthe_sp.action FROM bienthe_sp 
    left join product on bienthe_sp.idsp = product.idsp
    left join size on bienthe_sp.id_size = size.id_size
    left join color on bienthe_sp.id_color = color.id_color
    left join danhmuc on danhmuc.iddm = product.iddm
    where 1
    ";
    if ($kyw != "") $sql .= " AND name_product like '%" . $kyw . "%'";
    if ($iddm > 0)  $sql .= " AND danhmuc.iddm ='" . $iddm . "' ";
    $list_bienthe = pdo_query($sql);
    return $list_bienthe;
}
function update_status0_bt($id_bienthe)
{
    $sql = "UPDATE bienthe_sp SET action='0' WHERE id_bienthe = $id_bienthe ";
    pdo_execute($sql);
}
function update_status1_bt($id_bienthe)
{
    $sql = "UPDATE bienthe_sp SET action='1' WHERE id_bienthe = $id_bienthe ";
    pdo_execute($sql);
}
// sản phẩm yêu thích
function add_spyt($idsp, $idtk_kh)
{
    $sql = "INSERT INTO sp_yeuthich(idsp,idtk_kh) 
    VALUE('$idsp','$idtk_kh')";
    pdo_execute($sql);
}
function loadall_spyt($idtk_kh)
{
    $sql = "SELECT *,product.image,product.name_product,product.price_sale FROM sp_yeuthich 
    right join product on product.idsp=sp_yeuthich.idsp
    where sp_yeuthich.idtk_kh = $idtk_kh
    order by idsp_yt desc";
    $list_spyt = pdo_query($sql);
    return $list_spyt;
}
// thao tác người dùng muốn xóa trong trang sp yêu thích
function delete_spyt($idsp_yt)
{
    $sql = "DELETE FROM sp_yeuthich WHERE idsp_yt = $idsp_yt ";
    pdo_execute($sql);
}
// thao tác khi người dùng muốn xóa sp ở trang sp
function delete_sp_yt($idsp)
{
    $sql = "DELETE FROM sp_yeuthich WHERE idsp = $idsp ";
    pdo_execute($sql);
}
// size
function add_size($name_size)
{
    $sql = "INSERT INTO size(name_size,action) VALUE('$name_size','1')";
    pdo_execute($sql);
}
function loadall_size()
{
    $sql = "SELECT id_size,name_size FROM size where action = '1' ";
    $list_color = pdo_query($sql);
    return $list_color;
}
function loadall_size_bienthe($idsp)
{
    $sql = " SELECT DISTINCT size.id_size, name_size FROM `bienthe_sp`
    left join size on size.id_size = bienthe_sp.id_size
    WHERE idsp = $idsp";
    $list_color = pdo_query($sql);
    return $list_color;
}
function loadone_size($id_size)
{
    $sql = "SELECT * FROM size 
    where  id_size = $id_size ";
    $list_color = pdo_query_one($sql);
    return $list_color;
}
function loadall_size_admin()
{
    $sql = "SELECT * FROM size ";
    $list_color = pdo_query($sql);
    return $list_color;
}
function check_size_admin($name_size)
{
    $sql = "SELECT name_size FROM size 
    where name_size = '$name_size' ";
    $list_color = pdo_query_one($sql);
    return $list_color;
}
function check_namesize_admin($name_size, $id_size)
{
    $sql = "SELECT name_size FROM size 
    where name_size = '$name_size' and id_size = $id_size ";
    $list_color = pdo_query_one($sql);
    return $list_color;
}
function update_size($name_size, $idsize)
{
    $sql = "UPDATE size SET name_size='$name_size' WHERE id_size = $idsize ";
    pdo_execute($sql);
}
function update_status0_size($idsize)
{
    $sql = "UPDATE size SET action = '0' WHERE id_size = $idsize ";
    pdo_execute($sql);
}
function update_status1_size($idsize)
{
    $sql = "UPDATE size SET action = '1' WHERE id_size = $idsize ";
    pdo_execute($sql);
}
// color
function add_color($name_color)
{
    $sql = "INSERT INTO color(name_color,action) VALUE('$name_color','1')";
    pdo_execute($sql);
}
function loadall_color()
{
    $sql = "SELECT id_color,name_color FROM color where action = '1' ";
    $list_color = pdo_query($sql);
    return $list_color;
}
function loadall_color_bienthe($idsp)
{
    $sql = "SELECT DISTINCT color.id_color, name_color FROM `bienthe_sp`
    left join color on color.id_color = bienthe_sp.id_color
    WHERE idsp = $idsp";
    $list_color = pdo_query($sql);
    return $list_color;
}
function loadall_color_admin()
{
    $sql = "SELECT * FROM color  ";
    $list_color = pdo_query($sql);
    return $list_color;
}
function check_color_admin($name_color)
{
    $sql = "SELECT name_color FROM color 
    where name_color = '$name_color' ";
    $list_color = pdo_query_one($sql);
    return $list_color;
}
function check_namecolor_admin($name_color, $id_color)
{
    $sql = "SELECT name_color FROM color 
    where name_color = '$name_color' and id_color = $id_color ";
    $list_color = pdo_query_one($sql);
    return $list_color;
}
function loadone_color($id_color)
{
    $sql = "SELECT * FROM color 
    where  id_color = '$id_color' ";
    $list_color = pdo_query_one($sql);
    return $list_color;
}

function update_color($name_color, $id_color)
{
    $sql = "UPDATE color SET name_color='$name_color' 
    WHERE id_color = '$id_color' ";
    pdo_execute($sql);
}
function update_status0_color($idcolor)
{
    $sql = "UPDATE color SET action = '0' WHERE id_color = $idcolor ";
    pdo_execute($sql);
}
function update_status1_color($idcolor)
{
    $sql = "UPDATE color SET action = '1' WHERE id_color = $idcolor ";
    pdo_execute($sql);
}
// image
function add_image($url_image, $idsp)
{
    $sql = "INSERT INTO image(url_image,idsp) VALUE('$url_image','$idsp')";
    pdo_execute($sql);
}
function loadall_image($idsp)
{
    $sql = "SELECT url_image FROM image 
    where idsp = $idsp
    limit 4";
    $list_image = pdo_query($sql);
    return $list_image;
}
function loadall_image_admin()
{
    $sql = "SELECT name_product,url_image FROM image i
    inner join product p on p.idsp=i.idsp";
    $list_image = pdo_query($sql);
    return $list_image;
}
function update_image($url_image, $id_image)
{
    $sql = "UPDATE image SET url_image='$url_image' WHERE id_image = $id_image ";
    pdo_execute($sql);
}
function delete_image($id_image)
{
    $sql = "DELETE FROM image WHERE id_image = $id_image ";
    pdo_execute($sql);
}
// biến thể
// function add_bienthe_sp($idsp, $id_size, $id_color, $soluong)
// {
//     $sql = "INSERT INTO bienthe_sp(idsp,id_size,id_color,soluong) VALUE('$idsp','$id_size','$id_color','$soluong')";
//     pdo_execute($sql);
// }
function loadall_bienthe()
{
    $sql = "SELECT * FROM bienthe_sp 
    left join product on bienthe_sp.idsp= product.idsp
    left join color on bienthe_sp.id_color= color.id_color
    left join size on bienthe_sp.id_size= size.id_size
    -- where bienthe_sp.action = 1
    ";
    pdo_execute($sql);
    $listbienthe = pdo_query($sql);
    return $listbienthe;
}
function loadall_bienthe_admin()
{
    $sql = "SELECT * FROM bienthe_sp 
    left join product on bienthe_sp.idsp= product.idsp
    left join color on bienthe_sp.id_color= color.id_color
    left join size on bienthe_sp.id_size= size.id_size";
    pdo_execute($sql);
    $listbienthe = pdo_query($sql);
    return $listbienthe;
}
function loadone_bienthe($id_color, $id_size, $idsp)
{
    $sql = "SELECT * FROM bienthe_sp 
    where  id_size = $id_size and id_color =$id_color and idsp =$idsp and action = 1";
    pdo_execute($sql);

    $listbienthe = pdo_query_one($sql);
    return $listbienthe;
}
function loadone_bienthe_admin($id_bienthe)
{
    $sql = "SELECT * FROM bienthe_sp 
    where id_bienthe = $id_bienthe";
    pdo_execute($sql);

    $listbienthe = pdo_query_one($sql);
    return $listbienthe;
}
