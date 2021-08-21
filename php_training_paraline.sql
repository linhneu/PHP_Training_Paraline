-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 21, 2021 lúc 03:11 PM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `php_training_paraline`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `role_type` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `ins_id` int(11) NOT NULL,
  `upd_id` int(11) DEFAULT NULL,
  `ins_datetime` datetime NOT NULL,
  `upd_datetime` datetime DEFAULT NULL,
  `del_flag` char(1) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`, `email`, `avatar`, `role_type`, `ins_id`, `upd_id`, `ins_datetime`, `upd_datetime`, `del_flag`) VALUES
(1, 'trần linh', 'admin', 'tranlinh@gmail.com', '', '1', 1, 1, '2021-08-17 16:23:27', '2021-08-17 16:23:27', '0'),
(2, 'Trần Khánh', '12345', 'trankhanh@gmail.com', '', '2', 1, NULL, '2021-08-17 16:23:27', '2021-08-17 16:23:27', '0'),
(3, 'trần ngân', 'tranngan', 'tranngan@gmail.com', '', '2', 1, 0, '2021-08-18 13:42:46', '2021-08-18 13:42:46', '0'),
(4, 'trần bống', 'tranbong', 'tranbong@gmail.com', '', '2', 0, 0, '2021-08-18 13:02:57', '2021-08-18 13:02:57', '0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `facebook_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `status` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `ins_id` int(11) NOT NULL,
  `upd_id` int(11) DEFAULT NULL,
  `ins_datetime` datetime NOT NULL,
  `upd_datetime` datetime DEFAULT NULL,
  `del_flag` char(1) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `name`, `facebook_id`, `email`, `avatar`, `status`, `ins_id`, `upd_id`, `ins_datetime`, `upd_datetime`, `del_flag`) VALUES
(1, 'Trần Linh', '67438579342', 'tranlinh@gmail.com', 'https://ict-imgs.vgcloud.vn/2020/09/01/19/huong-dan-tao-facebook-avatar.jpg', '1', 0, NULL, '2021-08-19 07:34:48', '2021-08-19 07:34:48', '0');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ins_id` (`ins_id`,`upd_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
