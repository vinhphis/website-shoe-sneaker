<?php
function add_danhgia($idtk_kh, $idsp, $content, $ngaybl, $star)
{
    $sql = "INSERT INTO danhgia(idtk_kh,idsp,content,date,stars,action) VALUES('$idtk_kh','$idsp','$content','$ngaybl','$star','1')";
    pdo_execute($sql);
}

function load_danhgia_product($idsp)
{
    $sql = "SELECT *,namekh from danhgia 
    left join tk_kh on danhgia.idtk_kh=tk_kh.idtk_kh
    where  idsp = $idsp and danhgia.action = 1
    order by iddg desc";
    $list_dg = pdo_query($sql);
    return $list_dg;
}
function loadone_danhgia_product($idsp, $idtk_kh)
{
    $sql = "SELECT * from danhgia 
    left join tk_kh on danhgia.idtk_kh=tk_kh.idtk_kh
    where  idsp = $idsp and danhgia.idtk_kh = $idtk_kh and danhgia.action = 1
   ";
    $list_dg = pdo_query_one($sql);
    return $list_dg;
}
function update_stars_danhgia($stars,$idsp)
{
    $sql = "UPDATE product set ratingstars = '$stars' 
    WHERE idsp = $idsp ";
    pdo_execute($sql);
}
function loadone_danhgia_stars($idsp)
{
    $sql = "SELECT SUM(stars) as tong, COUNT(*) as soluong FROM `danhgia` WHERE idsp = $idsp ";
    $list_dg = pdo_query_one($sql);
    return $list_dg;
}
function loadall_danhgia_stars($idsp)
{
    $sql = "SELECT SUM(stars) as tong, COUNT(*) as soluong FROM `danhgia` WHERE idsp = $idsp ";
    $list_dg = pdo_query($sql);
    return $list_dg;
}
function loadall_danhgia()
{
    $sql = "SELECT *,danhgia.action from danhgia 
    left join tk_kh on danhgia.idtk_kh=tk_kh.idtk_kh
    order by iddg desc";
    $list_dg = pdo_query($sql);
    return $list_dg;
}
function update_status0_dg($iddg)
{
    $sql = "UPDATE danhgia set action = 0
    WHERE iddg = $iddg ";
    pdo_execute($sql);
}
function update_status1_dg($iddg)
{
    $sql = "UPDATE danhgia set action = 1
    WHERE iddg = $iddg ";
    pdo_execute($sql);
}
// chỉ dành cho admin
function delete_danhgia_product($iddg)
{
    $sql = "DELETE FROM danhgia where iddg = $iddg";
    pdo_execute($sql);
}
