<?php
ob_start();
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh'); // add this line with config timezone =)
// if (isset($_SESSION['role']) && ($_SESSION['role'] == 1)) {



include "../../model/pdo.php";
include "../../model/danhmuc.php";
include "../../model/sanpham.php";
include "../../model/danhgia.php";
include "../../model/taikhoan_kh.php";
include "../../model/donhang.php";
include "../../model/magiamgia.php";
include "../../model/thongke.php";
include "header.php";

$thongke_sanpham = thongke_sp();
$thongke_danhmuc = thongke_dm();
$load_luotban_admin = load_luotban_admin();
$loadall_tongtien = loadall_tongtien();
$loadall_th_kh = loadall_th_kh();
$load_luotxem = load_luotxem();

function checkData($data)
{
    $dl = ltrim($data); // hàm xóa khoảng trắng ở cuối với đầu của chuỗi
    $dl = stripslashes($data); // hàm xóa dấu gạch chéo ngược (\) 
    $dl = htmlspecialchars($data);
    $dl = strip_tags($data);
    // $dl = preg_replace("/[^a-zA-Z0-9 ]/", "", $data);
    return $dl;
}

//controller
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
            //Thêm danh mục
        case 'adddm':
            //kiểm tra xem người dùng có nhấn vào nút add không
            if (isset($_POST['themmoidm']) && ($_POST['themmoidm'])) {
                $tenloai =  checkData($_POST['tenloai']);
                if ($tenloai == "") {
                    $thongbao = "Mời nhập tên danh mục";
                    header("location: ?act=adddm");
                    setcookie("thongbao", $thongbao, time() + 1);
                } else {
                    $checkdm = check_dm_admin($tenloai);
                    if ($checkdm == true) {
                        $thongbao = "Tên danh mục đã tồn tại";
                        header("location: ?act=adddm");
                        setcookie("thongbao", $thongbao, time() + 1);
                    } else {
                        add_dm($tenloai);
                        $thongbao = "Thêm thành công";
                        header("location: ?act=adddm");
                        setcookie("thongbao", $thongbao, time() + 1);
                    }
                }
            }
            include "danhmuc/add.php";
            break;

            //List danh mục
        case 'listdm':
            $listdm = loadall_dm_admin();
            include "danhmuc/list.php";
            break;

            //Ẩn danh mục
        case 'xoadm';
            if (isset($_GET['iddm']) && ($_GET['iddm'] > 0)) {
                update_status0_dm($_GET['iddm']);
                update_status0_sp($_GET['iddm']);
            }
            $listdm = loadall_dm_admin();
            include "danhmuc/list.php";
            break;
            // Hiện dm
        case 'hiendm';
            if (isset($_GET['iddm']) && ($_GET['iddm'] > 0)) {
                update_status1_dm($_GET['iddm']);
                update_status1_sp($_GET['iddm']);
            }
            $listdm = loadall_dm_admin();
            include "danhmuc/list.php";
            break;
            //Sửa danh mục
        case 'suadm';
            if (isset($_GET['iddm']) && ($_GET['iddm'] > 0)) {
                $dm = loadone_dm($_GET['iddm']);
            }
            include "danhmuc/update.php";
            break;

            //Update danh mục
        case 'updatedm';
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $iddm = $_POST['id'];
                $tenloai =  checkData($_POST['tenloai']);
                if ($tenloai == "") {
                    $thongbao = "Mời nhập danh mục";
                    header("location: ?act=suadm&iddm=$iddm");
                    setcookie("thongbao", $thongbao, time() + 1);
                } else {
                    $checkdm = check_dm_admin($tenloai);
                    $check_namedm = check_namedm_iddm_admin($tenloai, $iddm);
                    if ($check_namedm['name_dm'] == $tenloai) {
                        $thongbao = "Tên danh mục chưa được thay đổi";
                        header("location: ?act=listdm");
                        setcookie("thongbao", $thongbao, time() + 1);
                    } else if ($checkdm == true) {
                        $thongbao = "Tên danh mục đã tồn tại";
                        header("location: ?act=suadm&iddm=$iddm");
                        setcookie("thongbao", $thongbao, time() + 1);
                    } else {
                        // die;
                        update_dm($tenloai, $iddm);
                        $thongbao = "Cập nhật thành công";
                        header("location: ?act=listdm");
                        setcookie("thongbao", $thongbao, time() + 1);
                    }
                }
            }
            $listdm =  loadall_dm_admin();
            // include "danhmuc/update.php";
            break;

            // Màu
        case 'addmau':
            //kiểm tra xem người dùng có nhấn vào nút add không
            if (isset($_POST['themmoimau']) && ($_POST['themmoimau'])) {
                $tenmau =  checkData($_POST['tenmau']);
                if ($tenmau == "") {
                    $thongbao = "Mời nhập tên danh mục";
                    header("location: ?act=addmau");
                    setcookie("thongbao", $thongbao, time() + 1);
                } else {
                    $check_color =  check_color_admin($tenmau);
                    if ($check_color == true) {
                        $thongbao = "Màu đã tồn tại";
                        header("location: ?act=addmau");
                        setcookie("thongbao", $thongbao, time() + 1);
                    } else {
                        add_color($tenmau);
                        $thongbao = "Thêm thành công";
                        header("location: ?act=listmau");
                        setcookie("thongbao", $thongbao, time() + 1);
                    }
                }
            }
            include "mau/add.php";
            break;


        case 'listmau':
            $list_color = loadall_color_admin();
            include "mau/list.php";
            break;

            // ẩn màu
        case 'xoamau';
            if (isset($_GET['id_color']) && ($_GET['id_color'] > 0)) {
                update_status0_color($_GET['id_color']);
            }
            $list_color = loadall_color_admin();
            include "mau/list.php";
            break;
            // hiện màu
        case 'hienmau';
            if (isset($_GET['id_color']) && ($_GET['id_color'] > 0)) {
                update_status1_color($_GET['id_color']);
            }
            $list_color = loadall_color_admin();
            include "mau/list.php";
            break;

        case 'suamau';
            if (isset($_GET['id_color']) && ($_GET['id_color'] > 0)) {
                $mau = loadone_color($_GET['id_color']);
            }
            include "mau/update.php";
            break;


        case 'updatemau';
            if (isset($_POST['capnhatmau']) && ($_POST['capnhatmau'])) {
                $id_color = $_POST['id_color'];
                $tenmau =  checkData($_POST['tenmau']);
                if ($tenmau == "") {
                    $thongbao = "Mời nhập màu";
                    header("location: ?act=suamau&id_color=$id_color");
                    setcookie("thongbao", $thongbao, time() + 1);
                } else {
                    // check xem màu có trùng với trong csdl không
                    $check_color =  check_color_admin($tenmau);
                    // kiểm tra xem màu này có đượcthay đổi hay không
                    $check_namecolor =  check_namecolor_admin($tenmau, $id_color);
                    if ($check_namecolor['name_color'] == $tenmau) {
                        $thongbao = "Màu chưa được thay đổi";
                        header("location: ?act=listmau");
                        setcookie("thongbao", $thongbao, time() + 1);
                    } else  if ($check_color == true) {
                        $thongbao = "Màu đã tồn tại";
                        header("location: ?act=suamau&id_color=$id_color");
                        setcookie("thongbao", $thongbao, time() + 1);
                    } else {
                        update_color($tenmau, $id_color);
                        $thongbao = "Cập nhật thành công";
                        header("location: ?act=listmau");
                        setcookie("thongbao", $thongbao, time() + 1);
                    }
                }
            }
            $list_color = loadall_color_admin();
            // include "mau/update.php";
            break;

            // Size
        case 'addsize':
            if (isset($_POST['themmoisize']) && ($_POST['themmoisize'])) {
                $tensize = checkData($_POST['tensize']);
                if ($tensize == "") {
                    $thongbao = "Mời nhập tên danh mục";
                    header("location: ?act=addsize");
                    setcookie("thongbao", $thongbao, time() + 1);
                } else {
                    $check_size = check_size_admin($tensize);
                    if ($check_size == true) {
                        $thongbao = "Size đã tồn tại";
                        header("location: ?act=addsize");
                        setcookie("thongbao", $thongbao, time() + 1);
                    } else {
                        add_size($tensize);
                        $thongbao = "Thêm thành công";
                        header("location: ?act=listsize");
                        setcookie("thongbao", $thongbao, time() + 1);
                    }
                }
            }
            include "size/add.php";
            break;

        case 'listsize':
            $list_size = loadall_size_admin();
            include "size/list.php";
            break;

            // ẩn size
        case 'xoasize';
            if (isset($_GET['id_size']) && ($_GET['id_size'] > 0)) {
                update_status0_size($_GET['id_size']);
            }
            $list_size = loadall_size_admin();
            include "size/list.php";
            break;
            // hiện size
        case 'hiensize';
            if (isset($_GET['id_size']) && ($_GET['id_size'] > 0)) {
                update_status1_size($_GET['id_size']);
            }
            $list_size = loadall_size_admin();
            include "size/list.php";
            break;

        case 'suasize';
            if (isset($_GET['id_size']) && ($_GET['id_size'] > 0)) {
                $size = loadone_size($_GET['id_size']);
                // var_dump($size);
                // die;
            }
            include "size/update.php";
            break;


        case 'updatesize';
            if (isset($_POST['capnhatsize']) && ($_POST['capnhatsize'])) {
                $id_size = $_POST['id'];
                $tensize = checkData($_POST['tensize']);
                if ($tensize == "") {
                    $thongbao = "Mời nhập danh mục";
                    header("location: ?act=suasize&id_size=$id_size");
                    setcookie("thongbao", $thongbao, time() + 1);
                } else {
                    $check_size = check_size_admin($tensize);
                    $check_namesize = check_namesize_admin($tensize, $id_size);
                    if ($check_namesize['name_size'] == $tensize) {
                        $thongbao = "Size chưa được thay đổi";
                        header("location: ?act=listsize");
                        setcookie("thongbao", $thongbao, time() + 1);
                    } else  if ($check_size == true) {
                        $thongbao = "Size đã tồn tại";
                        header("location: ?act=suasize&id_size=$id_size");
                        setcookie("thongbao", $thongbao, time() + 1);
                    } else {
                        // die;
                        update_size($tensize, $id_size);
                        $thongbao = "Cập nhật thành công";
                        header("location: ?act=listsize");
                        setcookie("thongbao", $thongbao, time() + 1);
                    }
                }
            }
            $list_size = loadall_size_admin();
            // include "size/update.php";
            break;


            /** SẢN PHẨM */
        case 'addsp':
            if (isset($_POST['themmoisp']) && ($_POST['themmoisp'])) {
                if (empty($_POST['iddm']) || empty($_POST['name_product']) || empty($_POST['price']) || empty($_POST['mota']) || empty($_FILES['image']['name']) || empty($_FILES['images']['name'])) {
                    $thongbao = "Vui lòng nhập thông tin sản phẩm";
                    header("location: ?act=addsp");
                    setcookie("thongbao", $thongbao, time() + 1);
                } else {
                    $check_product = check_product($_POST['iddm'], $_POST['name_product'], $price, $price_sale, $mota);
                    if ($check_product == true) {
                        $thongbao = "Đã tồn tại sản phẩm này";
                        header("location: ?act=addsp");
                        setcookie("thongbao", $thongbao, time() + 1);
                    } else {
                        $iddm = $_POST['iddm'];
                        $name_product =  checkData($_POST['name_product']);
                        $price =  checkData($_POST['price']);
                        $price_sale =  checkData($_POST['price_sale']);
                        $mota =  checkData($_POST['mota']);
                        // thêm ảnh chính
                        $image = $_FILES['image']['name'];
                        if (isset($_FILES['image'])) {
                            $file = $_FILES['image'];
                            $file_name = $file['name'];
                            //if($file['type'] == 'image/jpg' || $file == 'image/png'){
                            move_uploaded_file($file['tmp_name'], '../../upload/' . $file_name);
                            // }else{
                            //     $thongbao= "Không đúng định dạng ảnh";
                            // }
                        }
                        // thêm ảnh mô tả
                        if (isset($_FILES['images'])) {
                            $files = $_FILES['images'];
                            $file_names = $files['name'];
                            foreach ($file_names as $key => $value) {
                                move_uploaded_file($files['tmp_name'][$key], '../../upload/' . $value);
                            }
                        }
                        add_product($iddm, $image, $price, $price_sale, $name_product, $mota);

                        foreach ($file_names as $key => $value) {
                            $product = load_idsp();
                            extract($product);
                            add_image($value, $idsp);
                        }
                        $thongbao = "Thêm thành công";
                        header("location: ?act=listsp");
                        setcookie("thongbao", $thongbao, time() + 1);
                    }
                }
            }
            $listdm = loadall_dm();
            include "sanpham/add.php";
            break;
            //List sản phẩm
        case 'listsp':

            if (isset($_POST['kyw'])) {
                $kyw = trim($_POST['kyw']);
            } else {
                $kyw = "";
            }
            if (isset($_POST['iddm']) && ($_POST['iddm']) > 0) {
                $iddm = $_POST['iddm'];
            } else {
                $iddm = 0;
            }


            $listdm = loadall_dm();
            $listsanpham = loadall_product_admin($kyw, $iddm);
            include "sanpham/list.php";
            break;

            //ẩn sản phẩm
        case 'xoasp';
            if (isset($_GET['idsp']) && ($_GET['idsp'] > 0)) {
                update_status0_product($_GET['idsp']);
            }
            $listsanpham = loadall_product_admin($kyw = "", $iddm = "");
            include "sanpham/list.php";
            break;
            //hiện sản phẩm
        case 'hiensp';
            if (isset($_GET['idsp']) && ($_GET['idsp'] > 0)) {
                update_status1_product($_GET['idsp']);
            }
            $listsanpham = loadall_product_admin($kyw = "", $iddm = "");
            include "sanpham/list.php";
            break;
        case 'suasp';
            if (isset($_GET['idsp']) && ($_GET['idsp'] > 0)) {
                $sanpham = loadone_product($_GET['idsp']);
            }
            $loaddm = loadall_dm();
            include "sanpham/update.php";
            break;

            //Update sản phẩm
        case 'updatesp';
            if (isset($_POST['capnhatsp']) && ($_POST['capnhatsp'])) {
                $idsp = $_POST['idsp'];
                $name_product =  checkData($_POST['name_product']);
                $price =  checkData($_POST['price']);
                $price_sale =  checkData($_POST['price_sale']);
                $mota =  checkData($_POST['mota']);
                $hinh = $_FILES['image']['name'];
                if ($name_product == "" ||  $price == "" || $price_sale == "" || $mota == "") {
                    $thongbao = "Vui lòng nhập thông tin sản phẩm";
                    header("location: ?act=suasp&idsp=$idsp");
                    setcookie("thongbao", $thongbao, time() + 1);
                } else {

                    if (isset($_FILES['image'])) {
                        $file = $_FILES['image'];
                        $file_name = $file['name'];
                        //if($file['type'] == 'image/jpg' || $file == 'image/png'){
                        move_uploaded_file($file['tmp_name'], '../../upload/' . $file_name);
                        // }else{
                        //     $thongbao= "Không đúng định dạng ảnh";
                        // }
                    }
                    // if(isset($_FILES['images'])){
                    //     $files=$_FILES['images'];
                    //     $file_names= $files['name'];
                    //     foreach($file_names as $key => $value){
                    //             move_uploaded_file($files['tmp_name'][$key], 'upload/'.$value);
                    //     }
                    // }
                    // $product=insert_idsp();
                    // extract($product);
                    // foreach($file_names as $key => $value){
                    //     update_image($value , $idsp);
                    // }


                    $check_name_product = check_name_product($name_product);
                    $check_product = check_product($idsp, $name_product);

                    // var_dump($check_name_product);
                    // die;
                    if ($check_product['name_product'] == $name_product) {
                        if ($check_product['price'] == intval($price) && $check_product['price_sale'] == intval($price_sale) && $check_product['mota'] == $mota) {

                            $thongbao = "Sản phẩm chưa được thay đổi";
                            header("location: ?act=listsp");
                            setcookie("thongbao", $thongbao, time() + 1);
                        } else {
                            if ($price > $price_sale && $price > 0 && $price_sale > 0) {
                                update_product($idsp, $name_product, $hinh, $price, $price_sale, $mota);
                                $thongbao = "Cập nhật thành công";
                                header("location: ?act=listsp");
                                setcookie("thongbao", $thongbao, time() + 1);
                            } else {
                                $thongbao = "Giá gốc phải lớn hơn giá sale";
                                header("location: ?act=suasp&idsp=$idsp");
                                setcookie("thongbao", $thongbao, time() + 1);
                            }
                        }
                    } else if ($check_name_product == true) {
                        $thongbao = "Tên sản phẩm đã tồn tại";
                        header("location: ?act=suasp&idsp=$idsp");
                        setcookie("thongbao", $thongbao, time() + 1);
                    } else {
                        if ($price > $price_sale && $price > 0 && $price_sale > 0) {
                            update_product($idsp, $name_product, $hinh, $price, $price_sale, $mota);
                            $thongbao = "Cập nhật thành công";
                            header("location: ?act=listsp");
                            setcookie("thongbao", $thongbao, time() + 1);
                        } else {
                            $thongbao = "Giá gốc phải lớn hơn giá sale";
                            header("location: ?act=suasp&idsp=$idsp");
                            setcookie("thongbao", $thongbao, time() + 1);
                        }
                    }
                }
            }
            $loaddm = loadall_dm();
            $sanpham = loadall_product_admin($kyw = "", $iddm = "");
            // include "sanpham/update.php";
            break;

            // Ảnh mô tả sản phẩm
        case 'listimage';
            $loadall_image_admin = loadall_image_admin();
            include "image/list.php";
            break;

            //Danh sách tài khoản
        case 'dskh';
            $listtaikhoan = loadall_tk_kh_admin();
            include "taikhoan/list.php";
            break;
        case 'dstk_nv';
            $listtaikhoan = loadall_tk_nv_admin();
            include "taikhoan/list_nv.php";
            break;
            // case 'suatk';
            //     $listtaikhoan = loadall_taikhoan();
            //     include "taikhoan/list.php";
            //     break;
            // ẩn tk kh
        case 'xoatk';
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                update_status0_tk_kh($_GET['id']);
            }
            $listtaikhoan = loadall_tk_kh_admin();
            include "taikhoan/list.php";
            break;
            // hiện tk kh
        case 'hientk';
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                update_status1_tk_kh($_GET['id']);
            }
            $listtaikhoan = loadall_tk_kh_admin();
            include "taikhoan/list.php";
            break;


        case 'dsbl';
            $listbinhluan = loadall_danhgia();
            include "danhgia/list.php";
            break;

            // Xoá bình luận
        case 'xoabl';
            if (isset($_GET['iddg']) && ($_GET['iddg'] > 0)) {
                delete_danhgia_product($_GET['iddg']);
            }
            $listbinhluan = loadall_danhgia();
            include "danhgia/list.php";
            break;

            // ẩn bình luận
        case 'anbl';
            if (isset($_GET['iddg']) && ($_GET['iddg'] > 0)) {
                update_status0_dg($_GET['iddg']);
            }
            $listbinhluan = loadall_danhgia();
            include "danhgia/list.php";
            break;
            // 
        case 'hienbl';
            if (isset($_GET['iddg']) && ($_GET['iddg'] > 0)) {
                update_status1_dg($_GET['iddg']);
            }
            $listbinhluan = loadall_danhgia();
            include "danhgia/list.php";
            break;

            // Biến thể sản phẩm
        case 'addbt':
            if (isset($_POST['themmoibt']) && ($_POST['themmoibt'])) {
                $idsp = $_POST['idsp'];
                $id_color = $_POST['id_color'];
                $id_size = $_POST['id_size'];
                $soluong =  $_POST['soluong'];

                if ($idsp == 0 || $id_color == 0 || $id_size == 0 || $soluong == 0) {
                    $thongbao = "Mời nhập thông tin biến thể";
                    header("location: ?act=addbt");
                    setcookie("thongbao", $thongbao, time() + 1);
                } else {
                    $checkbt = loadone_bienthe($id_color, $id_size, $idsp);
                    if ($checkbt == true) {
                        $thongbao = "Biến thể này đã tồn tại";
                        header("location: ?act=addbt");
                        setcookie("thongbao", $thongbao, time() + 1);
                    } else {
                        if ($soluong <= 0) {
                            $thongbao = "Số lượng phải lớn hơn 0";
                            header("location: ?act=listbt");
                            setcookie("thongbao", $thongbao, time() + 1);
                        } else {
                            add_bienthe_sp($idsp, $id_color, $id_size, $soluong);
                            $thongbao = "Thêm biến thể thành công";
                            header("location: ?act=listbt");
                            setcookie("thongbao", $thongbao, time() + 1);
                        }
                    }
                }
            }
            $listsanpham = loadall_product_admin($kyw = "", $iddm = "");
            $list_color = loadall_color();
            $list_size = loadall_size();
            include "bienthe/add.php";
            break;

        case 'listbt':
            if (isset($_POST['kyw'])) {
                $kyw = trim($_POST['kyw']);
            } else {
                $kyw = "";
            }
            if (isset($_POST['iddm']) && ($_POST['iddm']) > 0) {
                $iddm = $_POST['iddm'];
            } else {
                $iddm = 0;
            }
            $listbienthe = loadall_bienthe_sp_admin($kyw,$iddm);
            $listdm =  loadall_dm();
            include "bienthe/list.php";
            break;

            // ẩn biến thể
        case 'xoabt';
            if (isset($_GET['id_bienthe']) && ($_GET['id_bienthe'] > 0)) {
                update_status0_bt($_GET['id_bienthe']);
            }
            $listbienthe = loadall_bienthe_sp_admin($kyw="",$iddm="");
            include "bienthe/list.php";
            break;
            // hiện biến thể
        case 'hienbt';
            if (isset($_GET['id_bienthe']) && ($_GET['id_bienthe'] > 0)) {
                update_status1_bt($_GET['id_bienthe']);
            }
            $listbienthe = loadall_bienthe_sp_admin($kyw="",$iddm="");
            include "bienthe/list.php";
            break;

        case 'suabt';
            if (isset($_GET['id_bienthe']) && ($_GET['id_bienthe'] > 0)) {
                $bienthe = loadone_bienthe_admin($_GET['id_bienthe']);
            }
            $listsanpham = loadall_product_admin($kyw = "", $iddm = "");
            $list_color = loadall_color_admin();
            $list_size = loadall_size_admin();
            include "bienthe/update.php";
            break;

        case 'updatebt';
            if (isset($_POST['capnhatbt']) && ($_POST['capnhatbt'])) {
                $id_bienthe = $_POST['id_bienthe'];
                $soluong =  checkData($_POST['soluong']);;
                if ($soluong > 0) {
                    update_bienthe($id_bienthe, $soluong);
                    $listbienthe = loadall_bienthe_admin();
                    // include "bienthe/updatebt.php";
                    header("location: ?act=listbt");
                    $thongbao  = "Cập nhật thành công";
                    setcookie("thongbao", $thongbao, time() + 1);
                } else {
                    // $listsanpham = loadall_product_admin($kyw = "", $iddm = "");
                    // $list_color = loadall_color_admin();
                    // $list_size = loadall_size_admin();
                    header("location: ?act=suabt&id_bienthe=$id_bienthe");
                    $thongbao  = "Số lượng phải lớn hơn 0";
                    setcookie("thongbao", $thongbao, time() + 1);
                }
            }
            break;

            // mã giảm giá
        case 'listmgg':
            $listvoucher = loadall_mgg_admin();
            include "voucher/list_voucher.php";
            break;

        case 'addmgg':
            if (isset($_POST['themmgg'])) {
                $name_mgg =  $_POST['namemgg'];
                var_dump($name_mgg);
                die;
                $discount = $_POST['discount'];
                $category = $_POST['category'];

                if ($name_mgg == "" || $discount == "" || $category == "") {
                    $thongbao = "Mời nhập thông tin mã giảm giá";
                    header("location: ?act=addmgg");
                    setcookie("thongbao", $thongbao, time() + 1);
                } else {
                    $checkmgg = loadone_mgg_admin($name_mgg);

                    if ($checkmgg == true) {
                        $thongbao = "Mã giảm giá này đã tồn tại";
                        header("location: ?act=addmgg");
                        setcookie("thongbao", $thongbao, time() + 1);
                    } else {
                        add_mgg($name_mgg, $discount, $category);
                        $thongbao = "Thêm thành công";
                        header("location: ?act=listmgg");
                        setcookie("thongbao", $thongbao, time() + 1);
                    }
                }
            }
            $listvoucher = loadall_mgg_admin();
            include "voucher/add.php";
            break;
            // ẩn mgg
        case 'xoamgg';
            if (isset($_GET['idmgg']) && ($_GET['idmgg'] > 0)) {
                update_status0_mgg($_GET['idmgg']);
            }
            $listvoucher = loadall_mgg_admin();
            include "voucher/list_voucher.php";
            break;
            // hiện mgg
        case 'hienmgg';
            if (isset($_GET['idmgg']) && ($_GET['idmgg'] > 0)) {
                update_status1_mgg($_GET['idmgg']);
            }
            $listvoucher = loadall_mgg_admin();
            include "voucher/list_voucher.php";
            break;

            // đơn hàng
        case 'listhd':
            $listhd = load_bill_admin();
            include "donhang/listdh.php";
            break;
        case 'list_detaildh':
            if (isset($_GET['iddh'])) {
                $detail_dh = load_bill_detail($_GET['iddh']);
            }
            include "donhang/list_detaildh.php";
            break;
        case 'status2';
            if (isset($_GET['iddh']) && ($_GET['iddh'] > 0)) {
                // $load_iddh =  load_iddh($iddh);
                extract(load_iddh($_GET['iddh']));
                if ($action < 2) {
                    update_status2_bill($_GET['iddh']);
                } else {
                    $thongbao = "Không thể thay đổi trang thái";
                }
                // var_dump($action);
                // die;
            }
            $listhd = load_bill_admin();
            include "donhang/listdh.php";
            break;
        case 'status3';
            if (isset($_GET['iddh']) && ($_GET['iddh'] > 0)) {
                extract(load_iddh($_GET['iddh']));
                if ($action < 3) {
                    update_status3_bill($_GET['iddh']);
                } else {
                    $thongbao = "Không thể thay đổi trang thái";
                }
            }
            $listhd = load_bill_admin();
            include "donhang/listdh.php";
            break;
        case 'status4';
            if (isset($_GET['iddh']) && ($_GET['iddh'] > 0)) {
                extract(load_iddh($_GET['iddh']));
                if ($action < 5) {
                    update_status4_bill($_GET['iddh']);
                } else {
                    $thongbao = "Không thể thay đổi trang thái";
                }
            }
            $listhd = load_bill_admin();
            include "donhang/listdh.php";
            break;
        case 'status5';
            if (isset($_GET['iddh']) && ($_GET['iddh'] > 0)) {
                extract(load_iddh($_GET['iddh']));
                if ($action < 5) {
                    update_status5_bill($_GET['iddh']);
                } else {
                    $thongbao = "Không thể thay đổi trang thái";
                }
            }
            $listhd = load_bill_admin();
            include "donhang/listdh.php";
            break;
        default:
            include "home.php";
            // $thongke_danhmuc = thongke_dm();
            break;
    }
} else {
    include "home.php";
    // $thongke_danhmuc = thongke_dm();
}

include "footer.php";
ob_end_flush();
