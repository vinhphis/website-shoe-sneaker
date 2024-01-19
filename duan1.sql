-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th10 20, 2023 lúc 07:08 AM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duan1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bienthe_sp`
--

CREATE TABLE `bienthe_sp` (
  `id_bienthe` int NOT NULL,
  `idsp` int NOT NULL,
  `id_size` int NOT NULL,
  `id_color` int NOT NULL,
  `soluong` int NOT NULL,
  `luot_ban` int NOT NULL,
  `action` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bienthe_sp`
--

INSERT INTO `bienthe_sp` (`id_bienthe`, `idsp`, `id_size`, `id_color`, `soluong`, `luot_ban`, `action`) VALUES
(29, 124, 11, 10, 100, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `color`
--

CREATE TABLE `color` (
  `id_color` int NOT NULL,
  `name_color` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `idsp` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `color`
--

INSERT INTO `color` (`id_color`, `name_color`, `idsp`) VALUES
(8, 'Xanh', 0),
(9, 'Đen', 0),
(10, 'Trắng', 0),
(11, 'Hồng', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgia`
--

CREATE TABLE `danhgia` (
  `iddg` int NOT NULL,
  `idtk_kh` int NOT NULL,
  `idsp` int NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `date` datetime NOT NULL,
  `action` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhgia`
--

INSERT INTO `danhgia` (`iddg`, `idtk_kh`, `idsp`, `content`, `date`, `action`) VALUES
(1, 1, 124, '12', '2023-11-20 02:17:54', 0),
(2, 1, 124, '12', '2023-11-20 02:17:54', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `iddm` int NOT NULL,
  `name_dm` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `action` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`iddm`, `name_dm`, `action`) VALUES
(26, 'Nike', 0),
(27, 'Converse', 0),
(28, 'Adidas', 0),
(29, 'Puma', 0),
(30, 'Nike', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `iddh` int NOT NULL,
  `ma_hd` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `iddh_ct` int NOT NULL,
  `id_bienthe` int NOT NULL,
  `idtk_kh` int NOT NULL,
  `name_buyer` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` int NOT NULL,
  `address` text COLLATE utf8mb4_general_ci NOT NULL,
  `payments` int NOT NULL,
  `vchuyen` int NOT NULL,
  `soluong` int NOT NULL,
  `date` datetime NOT NULL,
  `action` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang_ct`
--

CREATE TABLE `donhang_ct` (
  `iddh_ct` int NOT NULL,
  `iddh` int NOT NULL,
  `id_bienthe` int NOT NULL,
  `idtk_kh` int NOT NULL,
  `soluong` int NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image`
--

CREATE TABLE `image` (
  `id_image` int NOT NULL,
  `url_image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `idsp` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `image`
--

INSERT INTO `image` (`id_image`, `url_image`, `idsp`) VALUES
(18, 'z4697448369192_c1e1fdc695dd33a101ce10fd91daf8be.jpg', 124),
(19, 'z4697448369695_cde23f53a27fd27c92c000626c191779.jpg', 124);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `idsp` int NOT NULL,
  `iddm` int NOT NULL,
  `name_product` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `image` text COLLATE utf8mb4_general_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `price_sale` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `mota` text COLLATE utf8mb4_general_ci NOT NULL,
  `luotxem` int NOT NULL,
  `luotban` int NOT NULL,
  `action` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`idsp`, `iddm`, `name_product`, `image`, `price`, `price_sale`, `mota`, `luotxem`, `luotban`, `action`) VALUES
(124, 26, 'Nike 1', 'z4697448380120_8998a927f9dc0a44b85998f821747067.jpg', '1000000', '800000', 'Giày xịn giá tốt đi thoải mái', 0, 0, 0),
(125, 30, 'nine', 'Screenshot 2023-11-06 140018.png', '150000', '100000', 'abc', 0, 0, 1),
(126, 30, 'adidas', 'Screenshot 2023-11-06 140018.png', '150000', '100000', 'ldkcnb', 0, 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size`
--

CREATE TABLE `size` (
  `id_size` int NOT NULL,
  `name_size` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `idsp` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `size`
--

INSERT INTO `size` (`id_size`, `name_size`, `idsp`) VALUES
(10, '38', 0),
(11, '39', 0),
(12, '40', 0),
(13, '41', 0),
(14, '42', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sp_yeuthich`
--

CREATE TABLE `sp_yeuthich` (
  `idsp_yt` int NOT NULL,
  `idsp` int NOT NULL,
  `action` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tk_kh`
--

CREATE TABLE `tk_kh` (
  `idtk_kh` int NOT NULL,
  `namekh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `action` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tk_kh`
--

INSERT INTO `tk_kh` (`idtk_kh`, `namekh`, `user`, `password`, `image`, `email`, `phone`, `address`, `action`) VALUES
(1, '12', '12', '12', '12', '12', '12', '12', 1),
(2, '12', '12', '12', '12', '12', '12', '12', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tk_nv`
--

CREATE TABLE `tk_nv` (
  `idtk_nv` int NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `role` int NOT NULL,
  `action` int NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `voucher`
--

CREATE TABLE `voucher` (
  `idmgg` int NOT NULL,
  `idsp` int NOT NULL,
  `name_mgg` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `discount` int NOT NULL,
  `idtk_kh` int NOT NULL,
  `action` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bienthe_sp`
--
ALTER TABLE `bienthe_sp`
  ADD PRIMARY KEY (`id_bienthe`),
  ADD KEY `fk_idsp` (`idsp`),
  ADD KEY `fk_idcolor` (`id_color`),
  ADD KEY `fk_idsize` (`id_size`);

--
-- Chỉ mục cho bảng `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id_color`);

--
-- Chỉ mục cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD PRIMARY KEY (`iddg`),
  ADD KEY `fk_id_sp` (`idsp`),
  ADD KEY `fk_idkh` (`idtk_kh`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`iddm`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`iddh`),
  ADD KEY `fk_idctdh` (`iddh_ct`),
  ADD KEY `fk_idtk_kh` (`idtk_kh`),
  ADD KEY `fk_ibbienthe` (`id_bienthe`);

--
-- Chỉ mục cho bảng `donhang_ct`
--
ALTER TABLE `donhang_ct`
  ADD PRIMARY KEY (`iddh_ct`),
  ADD KEY `fk_iddh` (`iddh`),
  ADD KEY `fkidkh` (`idtk_kh`),
  ADD KEY `fkidbienthe` (`id_bienthe`);

--
-- Chỉ mục cho bảng `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id_image`),
  ADD KEY `fk_image_product` (`idsp`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`idsp`),
  ADD KEY `fk_iddm` (`iddm`);

--
-- Chỉ mục cho bảng `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id_size`);

--
-- Chỉ mục cho bảng `sp_yeuthich`
--
ALTER TABLE `sp_yeuthich`
  ADD PRIMARY KEY (`idsp_yt`),
  ADD KEY `fkidsp` (`idsp`);

--
-- Chỉ mục cho bảng `tk_kh`
--
ALTER TABLE `tk_kh`
  ADD PRIMARY KEY (`idtk_kh`);

--
-- Chỉ mục cho bảng `tk_nv`
--
ALTER TABLE `tk_nv`
  ADD PRIMARY KEY (`idtk_nv`);

--
-- Chỉ mục cho bảng `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`idmgg`),
  ADD KEY `fk_id_tkkh` (`idtk_kh`),
  ADD KEY `fksp` (`idsp`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bienthe_sp`
--
ALTER TABLE `bienthe_sp`
  MODIFY `id_bienthe` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `color`
--
ALTER TABLE `color`
  MODIFY `id_color` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  MODIFY `iddg` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `iddm` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `iddh` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `donhang_ct`
--
ALTER TABLE `donhang_ct`
  MODIFY `iddh_ct` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `image`
--
ALTER TABLE `image`
  MODIFY `id_image` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `idsp` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT cho bảng `size`
--
ALTER TABLE `size`
  MODIFY `id_size` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `sp_yeuthich`
--
ALTER TABLE `sp_yeuthich`
  MODIFY `idsp_yt` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tk_kh`
--
ALTER TABLE `tk_kh`
  MODIFY `idtk_kh` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tk_nv`
--
ALTER TABLE `tk_nv`
  MODIFY `idtk_nv` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `voucher`
--
ALTER TABLE `voucher`
  MODIFY `idmgg` int NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bienthe_sp`
--
ALTER TABLE `bienthe_sp`
  ADD CONSTRAINT `fk_idcolor` FOREIGN KEY (`id_color`) REFERENCES `color` (`id_color`),
  ADD CONSTRAINT `fk_idsize` FOREIGN KEY (`id_size`) REFERENCES `size` (`id_size`),
  ADD CONSTRAINT `fk_idsp` FOREIGN KEY (`idsp`) REFERENCES `product` (`idsp`);

--
-- Các ràng buộc cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD CONSTRAINT `fk_id_sp` FOREIGN KEY (`idsp`) REFERENCES `product` (`idsp`),
  ADD CONSTRAINT `fk_idkh` FOREIGN KEY (`idtk_kh`) REFERENCES `tk_kh` (`idtk_kh`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `fk_ibbienthe` FOREIGN KEY (`id_bienthe`) REFERENCES `bienthe_sp` (`id_bienthe`),
  ADD CONSTRAINT `fk_idctdh` FOREIGN KEY (`iddh_ct`) REFERENCES `donhang_ct` (`iddh_ct`),
  ADD CONSTRAINT `fk_idtk_kh` FOREIGN KEY (`idtk_kh`) REFERENCES `tk_kh` (`idtk_kh`);

--
-- Các ràng buộc cho bảng `donhang_ct`
--
ALTER TABLE `donhang_ct`
  ADD CONSTRAINT `fk_iddh` FOREIGN KEY (`iddh`) REFERENCES `donhang` (`iddh`),
  ADD CONSTRAINT `fkidbienthe` FOREIGN KEY (`id_bienthe`) REFERENCES `bienthe_sp` (`id_bienthe`),
  ADD CONSTRAINT `fkidkh` FOREIGN KEY (`idtk_kh`) REFERENCES `tk_kh` (`idtk_kh`);

--
-- Các ràng buộc cho bảng `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `fk_image_product` FOREIGN KEY (`idsp`) REFERENCES `product` (`idsp`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_iddm` FOREIGN KEY (`iddm`) REFERENCES `danhmuc` (`iddm`);

--
-- Các ràng buộc cho bảng `sp_yeuthich`
--
ALTER TABLE `sp_yeuthich`
  ADD CONSTRAINT `fkidsp` FOREIGN KEY (`idsp`) REFERENCES `product` (`idsp`);

--
-- Các ràng buộc cho bảng `voucher`
--
ALTER TABLE `voucher`
  ADD CONSTRAINT `fk_id_tkkh` FOREIGN KEY (`idtk_kh`) REFERENCES `tk_kh` (`idtk_kh`),
  ADD CONSTRAINT `fksp` FOREIGN KEY (`idsp`) REFERENCES `product` (`idsp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
