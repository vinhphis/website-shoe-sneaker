<?php

$mahoadon = "HD2737";

// Tạo nội dung mã QR
$qrData =
"Giá tiền: " . number_format($tong_hd) . " VNĐ\n
Sản phẩm: $name_product \n 
Phí vận chuyển: " . number_format($phi_vchuyen) . "\n
Mã Hóa Đơn: $mahoadon\n
Người thanh toán: $namekh
";

// Tạo URL QR code
$qrCodeUrl = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=" . urlencode($qrData);

// Hiển thị QR code trên trang web
$hienthi = "<img src='$qrCodeUrl' alt='Mã QR Code'>";
