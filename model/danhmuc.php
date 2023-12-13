<!-- 
    0: bị ẩn 
    1: hiện thị
-->
<?php
function add_dm($name_dm)
{
    $sql = "INSERT INTO danhmuc(name_dm,action) VALUE('$name_dm','1')";
    pdo_execute($sql);
}
function loadall_dm()
{
    $sql = "SELECT name_dm,iddm FROM danhmuc 
    where action = '1' 
    order by iddm asc
    limit 4";
    $list_dm = pdo_query($sql);
    return $list_dm;
}
function loadall_dm_admin()
{
    $sql = "SELECT * FROM danhmuc 
    order by iddm asc ";
    $list_dm = pdo_query($sql);
    return $list_dm;
}
function check_dm_admin($name_dm)
{
    $sql = "SELECT name_dm,iddm FROM danhmuc 
    where name_dm = '$name_dm '";
    $list_dm = pdo_query_one($sql);
    return $list_dm;
}
function check_namedm_iddm_admin($name_dm,$iddm)
{
    $sql = "SELECT name_dm,iddm FROM danhmuc 
    where name_dm = '$name_dm ' and iddm = '$iddm '";
    $list_dm = pdo_query_one($sql);
    return $list_dm;
}
function loadone_dm($iddm)
{
    $sql = "SELECT * FROM danhmuc WHERE iddm = $iddm";
    $list_dm = pdo_query_one($sql);
    return $list_dm;
}
function update_dm($name_dm, $iddm)
{
    $sql = "UPDATE danhmuc SET name_dm='$name_dm' WHERE iddm = $iddm ";
    pdo_execute($sql);
}
// khi muốn ẩn danh mục
function update_status0_dm($iddm)
{
    $sql = "UPDATE danhmuc SET action = '0' WHERE iddm = $iddm ";
    pdo_execute($sql);
}
function update_status0_sp($iddm)
{
    $sql = "UPDATE product SET action = '0' WHERE iddm = $iddm ";
    pdo_execute($sql);
}
// hiện danh mục
function update_status1_dm($iddm)
{
    $sql = "UPDATE danhmuc SET action = '1' WHERE iddm = $iddm ";
    pdo_execute($sql);
}
function update_status1_sp($iddm)
{
    $sql = "UPDATE product SET action = '1' WHERE iddm = $iddm ";
    pdo_execute($sql);
}
