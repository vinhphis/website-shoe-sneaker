<?php
ob_start();
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
include '../model/pdo.php';
include '../model/taikhoan_kh.php';
include '../model/sanpham.php';
include '../model/donhang.php';
include '../model/danhmuc.php';
include '../model/danhgia.php';
include '../model/magiamgia.php';


$load_top1 =  loadall_top1_giamgia();
$load_6sp =  loadall_6sp_giamgia();
// $listsanpham = loadall_product($kyw, $iddm,  $sapxep, $price_max, $price_min, $stars);
$loadall_product_home = loadall_product_home();
$list_dm_header = loadall_dm();
$load_top4 = load_top_4sp_luotban();
// hiện thị sản phẩm ở mục mới và mô tả
$list_name_product = loadall_name_product();
$load_giamgia = loadall_pt_giamgia();

if (isset($_SESSION['userkh'])) {
    extract($_SESSION['userkh']);
    $count_giohang_kh = count_giohang_kh($idtk_kh);
} else {
    echo '';
}


include 'header_user.php';

if (isset($_GET['act']) && ($_GET['act'])) {
    switch ($_GET['act']) {

        case 'dangnhap':
            if (isset($_POST['dangnhap'])) {
                if (!empty($_POST['user']) && !empty($_POST['pw'])) {
                    $user = $_POST['user'];
                    $password = $_POST['pw'];
                    $thongbao = dangnhap($user, $password);
                    if ($thongbao == "Đăng nhập thành công") {
                        header('location:controller.php?act=home');
                    }
                } else {
                    $thongbao = "Vui lòng nhập tài khoản mật khẩu";
                }
            }
            include './signin-signout/dangnhap.php';
            break;

        case 'dangky':
            if (isset($_POST['dkuser']) && ($_POST['dkuser'])) {
                if (empty($_POST['hoten']) || empty($_POST['user']) || empty($_POST['pw']) || empty($_POST['re_pw'])) {
                    $thongbao = "Vui lòng điền thông tin bên dưới";
                } else {
                    $user = $_POST['user'];
                    $load_user = load_detail_user($user);
                    if ($load_user == false) {
                        $namekh = $_POST['hoten'];
                        $password = $_POST['pw'];
                        $re_pw = $_POST['re_pw'];
                        if ($password != $re_pw) {
                            $thongbao = "Bạn nhập lại sai mật khẩu ";
                        } else {
                            dangky($namekh, $user, $password);
                            $loadidtk_kh = isert_idyk_kh();
                            foreach ($loadidtk_kh as  $value) {
                                extract($value);
                                add_mgg_user_new($idkh);
                            }
                            $thongbao = "Đăng ký thành công, bạn được tặng 1 voucher giảm giá 20k";
                            header('location: controller.php?act=dangnhap');
                            setcookie("thongbao", $thongbao, time() + 1);
                        }
                    } else {
                        $thongbao = "Tài khoản đã tồn tại";
                    }
                }
            }
            include './signin-signout/dangky.php';
            break;
        case 'dangxuat_user':
            dangxuat();
            include 'home.php';
            break;
        case 'quenmk':
            include './signin-signout/quenmk.php';
            break;
        case 'loadmk':
            $check = false;
            if (isset($_POST['qmk']) && ($_POST['qmk'])) {
                if (empty($_POST['user'])) {
                    $thongbao = "Vui lòng nhập tài khoản";
                    $check = false;
                } else {
                    $user = $_POST['user'];
                    $load_user = load_detail_user($user);
                    if ($load_user == false) {
                        $thongbao = "Tài khoản không tồn tại";
                        $check = false;
                    } else {
                        $detail_user = load_detail_user($user);
                        $check = true;
                    }
                }
            }
            if ($check == true) {
                include './signin-signout/create_mk.php';
            } else {
                include './signin-signout/quenmk.php';
            }

            break;
        case 'create_mk':
            $check = false;
            if (isset($_POST['create_mk']) && ($_POST['create_mk'])) {
                if (!empty($_POST['pw']) && !empty($_POST['re_pw'])) {
                    $user = $_POST['user'];
                    $password = $_POST['pw'];
                    $re_password = $_POST['re_pw'];
                    if ($password == $re_password) {
                        $thongbao = "Đổi mật khẩu thành công";
                        quen_matkhau($user, $password);
                        $check = true;
                    } else {
                        $thongbao = "Nhập lại sai mật khẩu";
                        $check = false;
                    }
                } else {
                    $thongbao = "Vui lòng nhập mật khẩu mới";
                    $check = false;
                }
            }
            if ($check == true) {
                include './signin-signout/dangnhap.php';
            } else {
                include './signin-signout/quenmk.php';
            }
            break;

        case 'detail_user':
            if (isset($_POST['update_detail_user']) && ($_POST['update_detail_user'])) {
                if (!empty($_POST['hoten']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['address'])) {
                    $namekh = $_POST['hoten'];
                    $phone = $_POST['phone'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    update_tk_kh($idtk_kh, $namekh, $image, $email, $phone, $address);
                    $thongbao = "Cập nhật thông tin tài khoản thành công, vui lòng đăng nhập lại.";
                } else {
                    $thongbao = "Vui lòng nhập thông tin";
                }
            }

            include './detail_user/detail_user.php';
            break;
        case 'dmk_user':
            if (isset($_POST['dmkusser']) && ($_POST['dmkusser'])) {
                if (!empty($_POST['pw']) && !empty($_POST['re_pw'])) {
                    $user = $_POST['user'];
                    $password = $_POST['pw'];
                    $re_password = $_POST['re_pw'];
                    if ($password == $re_password) {
                        $thongbao = "Đổi mật khẩu thành công, vui lòng đăng nhập lại";
                        quen_matkhau($user, $password);
                        $check = true;
                    } else {
                        $thongbao = "Nhập lại sai mật khẩu";
                        $check = false;
                    }
                } else {
                    $thongbao = "Vui lòng nhập mật khẩu mới";
                    $check = false;
                }
            }
            include './detail_user/doimk_user.php';
            break;
        case 'help':
            include 'hotro.php';
            break;
        case 'tintuc':
            include 'tintuc.php';
            break;
        case 'tintuc_child':
            $load_giamgia_user = loadall_mgg_admin_user();
            include 'tintuc_child.php';
            break;
        case 'luu_voucher':
            if (isset($_SESSION['userkh'])) {
                if (isset($_POST['luu_mgg'])) {
                    $loadall_mgg = loadall_mgg($_POST['name_mgg']);
                    extract($loadall_mgg);
                    // var_dump($soluong);
                    // die;
                    $loadall_mgg_kh =  loadall_mgg_kh($_POST['name_mgg'], $idtk_kh);
                    if ($loadall_mgg_kh == true) {
                        $thongbao = "Bạn đã lưu mã giảm giá này rồi!";
                    } else if($soluong > 0) {
                        $idmgg = $_POST['idmgg'];
                        update_mgg_user($idtk_kh, $idmgg);
                        update_soluong_voucher($idmgg);
                        $thongbao = "Lưu voucher thành công";
                    }else{
                        $thongbao = "Số lượng mã giảm giá này đã hết";
                    }
                }
            } else {
                $thongbao = "Vui lòng đăng nhập";
            }
            $load_giamgia_user = loadall_mgg_admin_user();
            include 'tintuc_child.php';
            break;
        case 'lsmh_user':
            $load_bill = load_bill($idtk_kh);
            include './detail_user/lsmuahang.php';
            break;
        case 'detail_dh':
            if (isset($_GET['iddh']))  $list_bill_detail = load_bill_detail($_GET['iddh']);

            if (isset($_POST['huydonhang'])) {
                for ($i = 0; $i < count($_POST['id_bienthe']); $i++) {
                    $id = $_POST['id_bienthe'][$i];
                    $sl = $_POST['soluong'][$i];
                    update_bienthe_soluong_huydon($id, $sl);
                }
                update_status6_bill($_POST['iddh']);
                $list_bill_detail = load_bill_detail($_POST['iddh']);
            }
            include './detail_user/detail_donhang.php';
            break;

        case 'voucher_user':
            $load_giamgia_user = loadall_mgg_user($idtk_kh);
            include './detail_user/voucher.php';
            break;
        case 'add_voucher':
            if (isset($_POST['add_vc'])) {
                if (empty($_POST['voucher'])) {
                    $thongbao = "Vui lòng nhập tên mã giảm giá";
                } else {
                    $name_mgg = $_POST['voucher'];
                    $loadall_mgg = loadall_mgg($name_mgg);
                    extract($loadall_mgg);
                    // var_dump($soluong);
                    // die;
                    $loadall_mgg_kh =  loadall_mgg_kh($name_mgg, $idtk_kh);
                    if ($loadall_mgg_kh == true) {
                        $thongbao = "Bạn đã lưu mã giảm giá này rồi!";
                    } else if ($soluong > 0) {

                        if ($loadall_mgg == true) {
                            extract($loadall_mgg);
                            update_mgg_user($idtk_kh, $idmgg);
                            update_soluong_voucher($idmgg);
                            $thongbao = "Thêm mã giảm giá thành công";
                        } else {
                            $thongbao = "Không tồn tại mã giảm giá này";
                        }
                    } else {
                        $thongbao = "Số lượng mã giảm giá này đã hết";
                    }
                }
            }
            $load_giamgia_user = loadall_mgg_user($idtk_kh);
            include './detail_user/voucher.php';
            break;
        case 'xoamgg':
            if (isset($_GET['id_mgg_kh'])) {
                delete_mgg_user($_GET['id_mgg_kh']);
            }
            $load_giamgia_user = loadall_mgg_user($idtk_kh);
            include './detail_user/voucher.php';
            break;
        case 'ctsp':
            if (isset($_POST['gui_danhgia'])) {
                if (isset($_SESSION['userkh'])) {
                    extract($_SESSION['userkh']);
                    if (empty($_POST['danhgia'])) {
                        $thongbao = "Vui lòng nhập đánh giá của bạn";
                    } else {
                        // mỗi user mua 1 lần được bình luận 1 lần, N lần thì bình luận N lần
                        $load_sobl_user = load_sobl_user($_POST['idsp'], $idtk_kh);
                        $count_sobl_user = count_sobl_user($_POST['idsp'], $idtk_kh);
                        if ($load_sobl_user['tongbl'] == 0) {
                            $thongbao = "Khách hàng phải mua hàng mới có thể đánh giá sản phẩm";
                        } else if ($load_sobl_user['tongbl'] <= $count_sobl_user['soluongbl']) {
                            $thongbao = "Bạn đã hết lượt đánh giá sản phẩm";
                        } else {
                            $ngaybl = date('Y/m/d G:i:s');
                            add_danhgia($idtk_kh, $_POST['idsp'], $_POST['danhgia'], $ngaybl, $_POST['star']);
                        }
                    }
                } else {
                    $thongbao = "Vui lòng đăng nhập để đánh giá";
                }
            }

            if (isset($_GET['idsp']) && $_GET['idsp'] > 0) {
                update_product_view($_GET['idsp']);
                $loadone_sp = loadone_product($_GET['idsp']);
                extract($loadone_sp);
                $list_dg =  load_danhgia_product($_GET['idsp']);
                $load_stars_dg = loadone_danhgia_stars($_GET['idsp']);

                $ton_kho = ton_kho($_GET['idsp']);

                $list_size = loadall_size_bienthe($_GET['idsp']);
                $list_color = loadall_color_bienthe($_GET['idsp']);
                // var_dump($list_size);
                // var_dump($list_color);
                // die;
                $loadimage_mota = loadall_image($_GET['idsp']);
                // load sản phẩm cùng loại
                $listsp = loadall_product_cungloai($iddm, $_GET['idsp']);
                include 'ctsp.php';
            } else {
                include 'home.php';
            }

            break;
        case 'xoadg':
            if (isset($_GET['iddg'])) {
                $iddg = $_GET['iddg'];
                $idsp = $_GET['idsp'];
                delete_danhgia_product($iddg);
                $thongbao = "Xóa bình luận thành công";
                header("location:?act=ctsp&idsp=$idsp");
            }
            $list_dg =  load_danhgia_product($idsp);
            break;
        case 'sanpham':
            if (isset($_POST['size'])) {
                $id_size = join(",", $_POST['size']);
            } else {

                $id_size = "";
            }
            if (isset($_POST['color'])) {
                $id_color = join(",", $_POST['color']);
            } else {
                $id_color = "";
            }
            if (isset($_POST['stars'])) {
                $stars = join(",", $_POST['stars']);
            } else {
                $stars = "";
            }
            if (isset($_POST['price_max']) && isset($_POST['price_min'])) {
                if ($_POST['price_max'] > $_POST['price_min']) {
                    $price_max = $_POST['price_max'];
                    $price_min = $_POST['price_min'];
                } else {
                    $thongbao = "Max phải lớn hơn min";
                    header("location:?act=sanpham");
                    setcookie("thongbao", $thongbao, time() + 1);
                }
            } else {
                $price_max = "";
                $price_min = "";
            }
            if (isset($_POST['tksp'])) {
                $kyw = trim($_POST['kyw']);
            } else {
                $kyw = "";
            }
            if (isset($_GET['iddm']) && ($_GET['iddm'] > 0)) {
                $iddm = $_GET['iddm'];
            } else {
                $iddm = 0;
            }

            $list_size = loadall_size();
            $list_color = loadall_color();
            $load_dm_sp = loadall_dm();
            $load_max_min_price_sale = load_max_min_price_sale();
            $listsanpham = loadall_product($kyw, $iddm,  $sapxep = "", $price_max, $price_min, $stars, $id_color, $id_size);

            include 'sanpham.php';
            break;
        case 'salesp':
            $list_size = loadall_size();
            $list_color = loadall_color();
            $load_dm_sp = loadall_dm();
            $load_max_min_price_sale = load_max_min_price_sale();
            $load_giamgia =  loadall_pt_giamgia();
            include 'salesp.php';
            break;

            // mua hàng thông qua trang giỏ hàng
        case 'thanhtoan':
            if (isset($_POST['thanhtoan'])) {
                if (isset($_POST['thanhtoansp'])) {
                    $_SESSION['cart'] =  join(",", $_POST['thanhtoansp']);
                    if (isset($_SESSION['cart'])) {
                        // load thông tin đơn hàng vào trang thanh toán
                        $thanhtoan = loadall_thanhtoan($_SESSION['cart']);
                    }
                    $load_mgg = loadall_mgg_user($idtk_kh);
                    include "thanhtoan.php";
                } else {
                    $thongbao = "Vui lòng chọn sản phẩm";
                    $list_gh =  loadall_giohang($idtk_kh);
                    include "giohang.php";
                }
            }
            break;
        case 'dathang':
            if (isset($_POST['dathang'])) {
                $check_iddh = check_count_hd();
                extract($check_iddh);

                $counter = $sum_dh; // Biến đếm số lượng hóa đơn
                $ma_hd = 'HD' . str_pad($counter, 3, '0', STR_PAD_LEFT);
                // Thông tin người mua hàng
                $email = $_POST['email'];
                $name_buyer = $_POST['hoten'];
                $phone = $_POST['phone'];
                $address = $_POST['diachi'];
                $ghichu = $_POST['ghichu'];
                // thanh toán, vận chuyển
                $vchuyen = $_POST['vchuyen'];
                $payments = $_POST['payment'];
                // thông tin sản phẩm
                $tongtien = $_POST['tongtien'];
                $date = date('Y/m/d A G:i:s');
                $iddh_ct = join(",", $_POST['iddh_ct']);
                if (empty($email) || empty($phone) || empty($address)) {
                    $thongbao = "Vui lòng nhập thông tin của bạn";
                    $load_mgg = loadall_mgg_user($idtk_kh);
                    $thanhtoan = loadall_thanhtoan($_SESSION['cart']);
                    include "thanhtoan.php";
                } else {
                    // trừ số lượng biến thể khi mua thành công
                    for ($i = 0; $i < count($_POST['id_bienthe']); $i++) {
                        $id = $_POST['id_bienthe'][$i];
                        $sl = $_POST['soluong'][$i];
                        update_bienthe_soluong_dathang($id, $sl);
                    }
                    // xóa mã giảm giá của user khi đặt hàng thành công
                    if (isset($_SESSION['mgg'])) {
                        delete_mgg_user($_SESSION['mgg']);
                    }
                    // thêm thông tin vào bảng đơn hàng 
                    add_bill($ma_hd, $ghichu, $tongtien, $idtk_kh, $name_buyer, $phone, $email, $address, $payments, $vchuyen, $date);
                    //    update action để chuyển sang đã đặt hàng
                    update_status1_bill($iddh_ct);
                    extract(insert_iddh()); // iddh
                    update_iddh($iddh, $iddh_ct);
                    include 'order_success.php';
                }
            }
            if (isset($_POST['apdung'])) {
                if (!empty($_POST['giamgia'])) {
                    $_SESSION['mgg'] = $_POST['giamgia'];
                    $sum_hd = $_POST['tamtinh'];
                    $ap_mgg = loadaone_category_mgg($_SESSION['mgg']);
                    $load_mgg = loadall_mgg_user($idtk_kh);
                    $thanhtoan = loadall_thanhtoan($_SESSION['cart']);
                    include "thanhtoan.php";
                } else {
                    $thongbao = "Vui long chon ma giam gia";
                    $load_mgg = loadall_mgg_user($idtk_kh);
                    $thanhtoan = loadall_thanhtoan($_SESSION['cart']);
                    include "thanhtoan.php";
                }
            }
            break;
            // mua hàng từ trang sản phẩm không thông qua giỏ hàng
        case 'dathang_sp_tt':
            if (isset($_POST['dathang'])) {
                $check_iddh = check_count_hd();
                extract($check_iddh);

                $counter = $sum_dh; // Biến đếm số lượng hóa đơn
                $ma_hd = 'HD' . str_pad($counter, 3, '0', STR_PAD_LEFT);
                // Thông tin người mua hàng
                $email = $_POST['email'];
                $name_buyer = $_POST['hoten'];
                $phone = $_POST['phone'];
                $address = $_POST['diachi'];
                $ghichu = $_POST['ghichu'];
                // thanh toán, vận chuyển
                $vchuyen = $_POST['vchuyen'];
                $payments = $_POST['payment'];
                // thông tin sản phẩm
                $tongtien = $_POST['tongtien'];
                $date = date('Y/m/d A G:i:s');

                if (empty($email) || empty($phone) || empty($address)) {
                    $thongbao = "Vui lòng nhập thông tin của bạn";
                    $load_mgg = loadall_mgg_user($idtk_kh);
                    $thanhtoan_sp_tt = loadone_bt_tt($_SESSION['sp_tt']);
                    array_push($thanhtoan_sp_tt, $_SESSION['soluong']);
                    include "thanhtoan_sp_tt.php";
                } else {
                    // thêm sản phẩm vừa mua vào đơn hàng chi tiết để gộp vào đơn hàng chung
                    add_giohang($_POST['id_bienthe'], $idtk_kh, $_POST['soluong']);
                    $insert_iddh_ct = insert_iddh_ct();
                    extract($insert_iddh_ct); // top1_iddhct 

                    // trừ số lượng biến thể khi mua thành công
                    update_bienthe_soluong_dathang($_POST['id_bienthe'], $_POST['soluong']);

                    // xóa mã giảm giá của user khi đặt hàng thành công
                    if (isset($_SESSION['mgg'])) {
                        delete_mgg_user($_SESSION['mgg']);
                    }

                    // thêm thông tin vào bảng đơn hàng 
                    add_bill($ma_hd, $ghichu, $tongtien, $idtk_kh, $name_buyer, $phone, $email, $address, $payments, $vchuyen, $date);

                    //    update action để chuyển sang đã đặt hàng
                    update_status1_bill($top1_iddhct);

                    // lấy ra iddh mới được tạo 
                    extract(insert_iddh());
                    update_iddh($iddh, $top1_iddhct);

                    include 'order_success.php';
                }
            }
            if (isset($_POST['apdung_sp_tt'])) {
                if (!empty($_POST['giamgia'])) {
                    $_SESSION['mgg'] = $_POST['giamgia'];
                    $sum_hd = $_POST['tamtinh'];
                    $ap_mgg = loadaone_category_mgg($_SESSION['mgg']);
                    $load_mgg = loadall_mgg_user($idtk_kh);
                    $thanhtoan_sp_tt = loadone_bt_tt($_SESSION['sp_tt']);
                    array_push($thanhtoan_sp_tt, $_SESSION['soluong']);
                    include "thanhtoan_sp_tt.php";
                } else {
                    $thongbao = "Vui long chon ma giam gia";
                    $load_mgg = loadall_mgg_user($idtk_kh);
                    $thanhtoan_sp_tt = loadone_bt_tt($_SESSION['sp_tt']);
                    array_push($thanhtoan_sp_tt, $_SESSION['soluong']);
                    include "thanhtoan_sp_tt.php";
                }
            }
            break;

        case 'order_success':
            include 'order_success.php';
            break;

            // Trang giỏ hàng
        case 'giohang':
            if (isset($_POST['idsp']))   $idsp = $_POST['idsp'];
            if (isset($_SESSION['userkh'])) {
                if (isset($_POST['tgiohang'])) {
                    $id_size = $_POST['chon_size'];
                    $id_color = $_POST['chon_mau'];

                    if (empty($id_size) || empty($id_color) || empty($idsp)) {
                        $thongbao = "Vui lòng chọn thông tin sản phẩm ";
                        header("location:?act=ctsp&idsp=$idsp");
                        setcookie("thongbao", $thongbao, time() + 1);
                    } else {
                        // check sản phẩm có trong bảng biến thể không
                        $loadbt = loadone_bienthe($id_color, $id_size, $idsp);
                        if ($loadbt == false) {
                            $thongbao = "Sản phẩm chưa có biến thể này";
                            header("location:?act=ctsp&idsp=$idsp");
                            setcookie("thongbao", $thongbao, time() + 1);
                        } else {
                            // check sản phẩm được thêm có tồn tại trong giỏ hàng không
                            $list_gh =  loadall_giohang($idtk_kh);
                            $check = 1;
                            if ($loadbt['soluong'] == 0) {
                                $check = 3;
                            } else {
                                foreach ($list_gh as  $gh) {
                                    // extract($gh);
                                    if ($loadbt['id_bienthe'] == $gh['id_bienthe']) {
                                        $_SESSION['iddh_ct'] = $gh['iddh_ct'];
                                        $_SESSION['id_bienthe'] =  $gh['id_bienthe'];
                                        $check = 2;
                                    }
                                }
                            }

                            // xử lý thông báo
                            if ($check == 1) {
                                $soluong = $_POST['soluong'];
                                if ($loadbt['soluong'] < $soluong) {
                                    $thongbao = "Số lượng bạn chọn vượt quá tồn kho";
                                    header("location:?act=ctsp&idsp=$idsp");
                                    setcookie("thongbao", $thongbao, time() + 1);
                                } else {
                                    if ($soluong <= 0) {
                                        $thongbao = "Số lượng bạn chọn phải lớn hơn 0";
                                        header("location:?act=ctsp&idsp=$idsp");
                                        setcookie("thongbao", $thongbao, time() + 1);
                                    } else {
                                        add_giohang($loadbt['id_bienthe'], $_SESSION['userkh']['idtk_kh'], $soluong);
                                        $list_gh =  loadall_giohang($idtk_kh);
                                        include 'giohang.php';
                                        // return; 
                                    }
                                }
                            } else if ($check == 2) {
                                update_soluong_giohang($_SESSION['iddh_ct'], $_POST['soluong'], $_SESSION['id_bienthe']);
                                $list_gh = loadall_giohang($idtk_kh);
                                header("location:?act=giohang");
                            } else if ($check == 3) {
                                $thongbao = "Số lượng sản phẩm đã hết";
                                header("location:?act=ctsp&idsp=$idsp");
                                setcookie("thongbao", $thongbao, time() + 1);
                            }
                        }
                    }
                } else if (isset($_POST['muangay'])) {
                    if (!empty($_POST['chon_size']) && !empty($_POST['chon_mau']) && !empty($_POST['idsp'])) {
                        $id_size = $_POST['chon_size'];
                        $id_color = $_POST['chon_mau'];
                        $idsp = $_POST['idsp'];
                        // check sản phẩm có trong bảng biến thể không
                        $loadbt = loadone_bienthe($id_color, $id_size, $idsp);
                        if ($loadbt == false) {
                            $thongbao = "Sản phẩm chưa có biến thể này";
                            header("location:?act=ctsp&idsp=$idsp");
                            setcookie("thongbao", $thongbao, time() + 1);
                        } else {
                            $check = 1;
                            if ($loadbt['soluong'] == 0) {
                                $check = 2;
                            } else  if ($loadbt['soluong'] < $_POST['soluong']) {
                                $check = 3;
                            } else if ($_POST['soluong'] <= 0) {
                                $check = 4;
                            }

                            // xử lý thông báo
                            if ($check == 1) {
                                $_SESSION['soluong'] = $_POST['soluong'];
                                $_SESSION['sp_tt'] = $loadbt['id_bienthe'];
                                $thanhtoan_sp_tt = loadone_bt_tt($_SESSION['sp_tt']);
                                array_push($thanhtoan_sp_tt, $_SESSION['soluong']);

                                $load_mgg = loadall_mgg_user($idtk_kh);
                                // header("location: ?act=thanhtoan_sp_tt");
                                include "thanhtoan_sp_tt.php";
                            } else if ($check == 2) {
                                $thongbao = "Số lượng tồn kho đã hết";
                                header("location:?act=ctsp&idsp=$idsp");
                                setcookie("thongbao", $thongbao, time() + 1);
                            } else if ($check == 3) {
                                $thongbao = "Số lượng bạn chọn vượt quá số lượng tồn kho";
                                header("location:?act=ctsp&idsp=$idsp");
                                setcookie("thongbao", $thongbao, time() + 1);
                            } else if ($check == 4) {
                                $thongbao = "Vui lòng chọn số lượng lớn hơn 0";
                                header("location:?act=ctsp&idsp=$idsp");
                                setcookie("thongbao", $thongbao, time() + 1);
                            }
                        }
                    } else {
                        $thongbao = "Vui lòng chọn thông tin giày";
                        header("location:?act=ctsp&idsp=$idsp");
                        setcookie("thongbao", $thongbao, time() + 1);
                    }
                } else {
                    $list_gh =  loadall_giohang($idtk_kh);
                    include 'giohang.php';
                }
            } else {
                $thongbao = "Vui lòng đăng nhập để mua hàng";
                header("location:?act=ctsp&idsp=$idsp");
                setcookie("thongbao", $thongbao, time() + 1);
            }

            break;

        case 'xoagh':
            if (isset($_GET['iddh_ct'])) {
                delete_giohang($_GET['iddh_ct']);
                // $thongbao = "Xóa sản phẩm thành công";
            }
            $list_gh =  loadall_giohang($idtk_kh);

            include 'giohang.php';
            break;
            // sản phẩm yêu thích
        case 'spyt':
            if (isset($_POST['spyt'])) {
                $idsp = $_POST['idsp'];
                $idtk_kh = $_POST['idtk_kh'];
                // var_dump($_SESSION['user']);
                // die;
                if (isset($_SESSION['userkh'])) {
                    add_spyt($idsp, $idtk_kh);
                    // $listspyt = loadall_spyt($idtk_kh);
                    // include 'spyt.php';
                } else {
                    $thongbao = "Vui lòng đăng nhập";
                    $listsanpham = loadall_product($kyw = "", $iddm = "", $sapxep = "", $price_max = "", $price_min = "", $stars = "", $id_color = "", $id_size = "");
                    header("location: ?act=sanpham");
                    setcookie("thongbao", $thongbao, time() + 1);
                }
            }
            $listspyt = loadall_spyt($idtk_kh);
            include 'spyt.php';
            break;
        case 'huy_spyt':
            if (isset($_POST['huy_spyt'])) {
                $idsp_yt = $_POST['idsp_yt'];
                delete_spyt($idsp_yt);
                // $thongbao = "Xóa sản phẩm yêu thích thành công";
            }
            $listspyt = loadall_spyt($idtk_kh);
            include 'spyt.php';
            break;

        case 'home':

            include 'home.php';
            break;
    }
} else {
    include 'home.php';
}
include 'footer.php';
ob_end_flush();
