-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 20, 2025 at 01:11 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smart_choice`
--

-- --------------------------------------------------------

--
-- Table structure for table `danh_gia`
--

CREATE TABLE `danh_gia` (
  `id_danh_gia` int UNSIGNED NOT NULL,
  `id_user` int UNSIGNED NOT NULL,
  `ten_danh_gia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `danh_gia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `danh_gia_binh_luan` longtext COLLATE utf8mb4_unicode_ci,
  `id_san_pham` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `danh_gia`
--

INSERT INTO `danh_gia` (`id_danh_gia`, `id_user`, `ten_danh_gia`, `danh_gia`, `danh_gia_binh_luan`, `id_san_pham`, `created_at`, `updated_at`) VALUES
(1, 2, 'Nguyễn Văn A', '4.5', 'Sản phẩm tốt', 1, '2025-03-19 21:37:59', '2025-03-19 21:37:59'),
(2, 2, 'Nguyễn Văn A', '5', 'Sản phẩm tốt', 16, '2025-03-20 05:56:38', '2025-03-20 05:56:38');

-- --------------------------------------------------------

--
-- Table structure for table `don_hang`
--

CREATE TABLE `don_hang` (
  `id_don_hang` int UNSIGNED NOT NULL,
  `id_user` int UNSIGNED NOT NULL,
  `ten_nguoi_nhan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia_chi_nhan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ghi_chu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tong_tien` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hinh_thuc_thanh_toan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trang_thai` enum('Đang xử lý','Đã xác nhận','Đã hoàn thành','Đã hủy') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Đang xử lý',
  `hoa_don` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `props` json DEFAULT (json_array()),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `don_hang`
--

INSERT INTO `don_hang` (`id_don_hang`, `id_user`, `ten_nguoi_nhan`, `sdt`, `dia_chi_nhan`, `ghi_chu`, `tong_tien`, `hinh_thuc_thanh_toan`, `trang_thai`, `hoa_don`, `props`, `created_at`, `updated_at`) VALUES
(1, 2, 'Nguyễn Văn A', '0123456788', 'Hà Nội', '123', '1,020,000 VNĐ', 'Thanh toán qua MoMo', 'Đã hoàn thành', 'a:1:{i:1;a:5:{s:10:\"hinh_anh_1\";s:12:\"sanpham1.png\";s:12:\"ten_san_pham\";s:13:\"Adidas NMD R2\";s:7:\"don_gia\";s:7:\"1200000\";s:8:\"so_luong\";s:1:\"1\";s:10:\"khuyen_mai\";s:2:\"15\";}}', '{\"amount\": 1020000, \"orderId\": \"DH_1742445370_2\", \"requestId\": \"b0c59e61f03387dce916544d3b1c1ea9\"}', '2025-03-19 21:36:52', '2025-03-19 21:37:25'),
(2, 2, 'Nguyễn Văn A', '0123456788', 'Thanh Xuân', NULL, '1,530,000 VNĐ', 'Sau khi nhận hàng', 'Đã hoàn thành', 'a:1:{i:4;a:5:{s:10:\"hinh_anh_1\";s:27:\"09092022024829_bdj-1000.png\";s:12:\"ten_san_pham\";s:32:\"BDJ 1000 Headphones DJ Behringer\";s:7:\"don_gia\";s:7:\"1800000\";s:8:\"so_luong\";s:1:\"1\";s:10:\"khuyen_mai\";s:2:\"15\";}}', '[]', '2025-03-20 04:51:57', '2025-03-20 04:54:01'),
(3, 2, 'Nguyễn Văn A', '0123456788', 'Hà Nội', NULL, '380,000 VNĐ', 'Thanh toán qua MoMo', 'Đã hoàn thành', 'a:1:{i:16;a:5:{s:10:\"hinh_anh_1\";s:99:\"34400_dareu_eh469_pink_1d57e30add8f42eca3eaa006d32481e2_5fea9259b65343acadecc1b76079c8b4_grande.png\";s:12:\"ten_san_pham\";s:24:\"DareU EH469 7.1 RGB Pink\";s:7:\"don_gia\";s:6:\"380000\";s:8:\"so_luong\";s:1:\"1\";s:10:\"khuyen_mai\";s:1:\"0\";}}', '{\"amount\": 380000, \"orderId\": \"DH_1742475199_2\", \"requestId\": \"bbd0f09ce5c10998ae4fbc7d4a068f86\"}', '2025-03-20 05:53:45', '2025-03-20 05:55:19');

-- --------------------------------------------------------

--
-- Table structure for table `khuyen_mai`
--

CREATE TABLE `khuyen_mai` (
  `id_khuyen_mai` int UNSIGNED NOT NULL,
  `ten_khuyen_mai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia_tri_khuyen_mai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `khuyen_mai`
--

INSERT INTO `khuyen_mai` (`id_khuyen_mai`, `ten_khuyen_mai`, `gia_tri_khuyen_mai`) VALUES
(1, 'Không khuyễn mãi', '0'),
(2, 'Ngày lễ', '15'),
(3, 'Mới ra mắt', '10'),
(4, 'Sale cuối năm', '5'),
(5, 'Chủ vui nên khuyến mãi', '3');

-- --------------------------------------------------------

--
-- Table structure for table `loai_san_pham`
--

CREATE TABLE `loai_san_pham` (
  `id_loai_san_pham` int UNSIGNED NOT NULL,
  `ten_loai_san_pham` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loai_san_pham`
--

INSERT INTO `loai_san_pham` (`id_loai_san_pham`, `ten_loai_san_pham`, `created_at`, `updated_at`) VALUES
(1, 'Tai nghe kiểm âm', '2025-03-19 21:30:04', '2025-03-20 04:13:43'),
(2, 'Tai nghe bluetooth', '2025-03-19 21:30:04', '2025-03-20 04:14:04'),
(3, 'DJ & Broadcast HeadPhones', '2025-03-19 21:30:04', '2025-03-20 04:14:29'),
(4, 'Tai nghe gaming', '2025-03-19 21:30:04', '2025-03-20 04:16:37');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2024_11_05_083501_create_phan_quyen_table', 1),
(3, '2024_11_05_083502_create_thuong_hieu_table', 1),
(4, '2024_11_05_083503_create_loai_san_pham_table', 1),
(5, '2024_11_05_083504_create_khuyen_mai_table', 1),
(6, '2024_11_05_083505_create_san_pham_table', 1),
(7, '2024_11_05_083506_create_users_table', 1),
(8, '2024_11_05_083507_create_don_hang_table', 1),
(9, '2024_11_05_083508_create_danh_gia_table', 1),
(10, '2024_11_05_083509_create_sessions_table', 1),
(11, '2024_11_06_183222_add_prop_data_to_don_hang_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phan_quyen`
--

CREATE TABLE `phan_quyen` (
  `id_phan_quyen` int UNSIGNED NOT NULL,
  `ten_phan_quyen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phan_quyen`
--

INSERT INTO `phan_quyen` (`id_phan_quyen`, `ten_phan_quyen`) VALUES
(1, 'Quản trị viên'),
(2, 'Người dùng');

-- --------------------------------------------------------

--
-- Table structure for table `san_pham`
--

CREATE TABLE `san_pham` (
  `id_san_pham` int UNSIGNED NOT NULL,
  `ten_san_pham` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_loai_san_pham` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_thuong_hieu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_ta` longtext COLLATE utf8mb4_unicode_ci,
  `don_gia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_luong` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hinh_anh_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hinh_anh_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hinh_anh_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hinh_anh_4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ten_khuyen_mai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `so_luong_mua` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `san_pham`
--

INSERT INTO `san_pham` (`id_san_pham`, `ten_san_pham`, `ten_loai_san_pham`, `ten_thuong_hieu`, `mo_ta`, `don_gia`, `so_luong`, `hinh_anh_1`, `hinh_anh_2`, `hinh_anh_3`, `hinh_anh_4`, `ten_khuyen_mai`, `so_luong_mua`, `created_at`, `updated_at`) VALUES
(1, 'HD 300 PRO Professional Monitoring Headphones Sennheiser', 'Tai nghe kiểm âm', 'B&O', '<p>HD 300 PRO Professional Monitoring Headphones Sennheiser chính hãng</p><p>Xuất xứ: Romania</p><p>Độ phân giải cao nhất nhờ sự tái tạo âm thanh chính xác và tuyến tính</p><p>Thiết kế lớp đệm thoải mái cho phép sử dụng kéo dài</p><p>Khả năng giảm tiếng ồn xung quanh vượt trội trong môi trường ồn ào nhờ thiết kế vỏ tai đóng kín</p>', '1200000', '100', '21062023040818_hd-300-pro-5.png', '21062023040818_hd-300-pro-5.png', '21062023040818_hd-300-pro-5.png', '21062023040344_hd-280-pro-5.png', 'Ngày lễ', '5', '2024-10-29 00:59:26', '2025-03-20 04:21:46'),
(2, 'HD 280 PRO Sennheiser Tai nghe kiểm âm', 'Tai nghe kiểm âm', 'Harman Kardon', '<p>HD 280 PRO Tai nghe kiểm âm Sennheiser chính hãng</p><p>Xuất xứ: Romania</p><p>Khả năng cách âm cao đối với tiếng ồn môi trường</p><p>Phục hồi âm thanh chính xác, tuyến tính</p><p>Bọt tai mềm mại mang lại cảm giác thoải mái khi đeo</p>', '999000', '100', '21062023040344_hd-280-pro-5.png', '21062023040344_hd-280-pro-5.png', '21062023040344_hd-280-pro-5.png', '21062023040344_hd-280-pro-5.png', 'Ngày lễ', '5', '2024-10-29 00:59:26', '2025-03-20 04:23:12'),
(3, 'HD 26 PRO Professional Monitoring Headphones Sennheiser', 'Tai nghe kiểm âm', 'Marshall', '<p>HD 26 PRO Professional Monitoring Headphones Sennheiser chính hãng</p><p>Xuất xứ: Đức</p><p>Phát lại âm thanh chính xác cho việc giám sát đòi hỏi cao</p><p>Áp suất âm thanh cao</p><p>Dây cáp đặc biệt giảm tiếng ồn</p>', '1500000', '100', '29072023085233_hd-26-pro.png', '29072023085233_hd-26-pro.png', '29072023085233_hd-26-pro.png', '29072023085233_hd-26-pro.png', 'Ngày lễ', '6', '2024-10-29 00:59:26', '2025-03-20 04:23:59'),
(4, 'BDJ 1000 Headphones DJ Behringer', 'Tai nghe kiểm âm', 'Focal', '<p>Tai nghe DJ chuyên nghiệp chất lượng cao và cực kỳ linh hoạt</p><p>Driver 57 mm cung cấp đáp tuyến tần số rộng (20 Hz - 20 kHz) mang lại âm trầm mạnh mẽ và dải động rộng</p><p>Cáp dài tới 2,5m</p><p>Chương trình bảo hành 1 năm *</p><p><a href=\"https://hoangbaokhoa.com/headphone.php\"><i>Tai nghe</i></a><i> DJ chất lượng cao&nbsp;Behringer BDJ 1000</i><br><i>High-Quality Professional DJ Headphones</i></p>', '1800000', '100', '09092022024829_bdj-1000.png', '09092022024829_bdj-1000.png', '09092022024829_bdj-1000.png', '09092022024829_bdj-1000.png', 'Ngày lễ', '8', '2024-10-29 00:59:26', '2025-03-20 04:51:57'),
(5, 'HC 2000BNC Bluetooth Headphones Behringer', 'Tai nghe bluetooth', 'JBL', '<p>Tai nghe chống ồn chủ động không dây</p><p>Kết nối Bluetooth *</p><p>Bảo hành 1 năm</p>', '1500000', '100', '12102022012409_hc-2000bnc.png', '12102022012409_hc-2000bnc.png', '12102022012409_hc-2000bnc.png', '12102022012409_hc-2000bnc.png', 'Ngày lễ', '8', '2024-10-29 00:59:26', '2025-03-20 04:25:38'),
(6, 'LIFE BUDS Tai Nghe Không Dây Tannoy', 'Tai nghe bluetooth', 'Apple', '<p>Tai nghe in-ear không dây giúp bạn tự do thường thức âm nhạc khi di chuyển</p><p>Hiệu suất âm thanh đồng trục kép từng đoạt giải thường</p><p>Micro tích hợp cho khả năng đàm thoại rảnh tay âm thanh trong trẻo</p><p>Bảo hành 1 năm.</p>', '1500000', '100', '13102022084154_life-buds-1.png', '13102022084154_life-buds-1.png', '13102022084154_life-buds-1.png', '13102022084154_life-buds-1.png', 'Ngày lễ', '9', '2024-10-29 00:59:26', '2025-03-20 04:26:42'),
(7, 'HC 2000B Bluetooth Headphones Behringer', 'Tai nghe bluetooth', 'Harman Kardon', '<p>Tai nghe không dây kết nối Bluetooth* với củ loa 40 mm</p><p>Tần số toàn dải (20 Hz - 20 kHz) mang lại âm trầm và âm cao đầy đủ</p><p>Pin Li-ion dung lượng cao mang lại thời gian phát lại 7 giờ</p><p>Sạc nhanh 2 giờ qua USB (không bao gồm bộ sạc tường)</p>', '1500000', '100', '13102022083810_hc-2000b.png', '13102022083810_hc-2000b.png', '13102022083810_hc-2000b.png', '13102022083810_hc-2000b.png', 'Ngày lễ', '10', '2024-10-29 00:59:26', '2025-03-20 04:27:29'),
(8, 'LIVE BUDS Tai nghe Bluetooth Behringer', 'Tai nghe bluetooth', 'Sony', '<p>Tai nghe không dây có độ trung thực cao</p><p>Cung cấp tần số rộng (20 Hz - 20 kHz) mang lại âm trầm và âm cao đầy đủ</p><p>Bao gồm cáp sạc USB</p><p>Thiết kế trong tai chắc chắn đảm bảo sự ổn định và thoải mái</p><p>Bao gồm nút tai bằng silicon với 3 kích cỡ vừa vặn hoàn hảo</p>', '1500000', '100', '13102022084024_live-buds.png', '13102022084024_live-buds.png', '13102022084024_live-buds.png', '13102022084024_live-buds.png', 'Ngày lễ', '11', '2024-10-29 00:59:26', '2025-03-20 04:28:16'),
(9, 'HMD 300 PRO Tai nghe Broadcast Sennheiser', 'DJ & Broadcast HeadPhones', 'JBL', '<p>HMD 300 PRO Tai nghe Broadcast Sennheiser chính hãng</p><p>ActiveGard (chức năng bật/tắt) để bảo vệ thính giác chống lại âm thanh đỉnh trên 110 dB</p><p>Micro định hướng siêu cardioid để truyền đạt âm thanh rõ ràng</p><p>Micro có thể đeo ở phía bên phải hoặc bên trái</p>', '1500000', '100', '21062023043500_hmd-300-pro.png', '21062023043500_hmd-300-pro.png', '21062023043500_hmd-300-pro.png', '21062023043500_hmd-300-pro.png', 'Ngày lễ', '12', '2024-10-29 00:59:26', '2025-03-20 04:29:10'),
(10, 'HPX6000 Headphones DJ Behringer', 'DJ & Broadcast HeadPhones', 'Yamaha', '<p>Chất lượng âm thanh vượt trội với đáp tuyến tần số rộng và tăng cường âm trầm</p><p>Dải động cực cao</p><p>Trình điều khiển neodymium đầu ra cao 50 mm</p><p>Cáp rời một mặt với 1/8? giắc cắm và 1/4? bộ chuyển đổi mạ vàng</p>', '1500000', '100', '09092022024941_hpx4000.png', '09092022024941_hpx4000.png', '09092022024941_hpx4000.png', '09092022024941_hpx4000.png', 'Ngày lễ', '13', '2024-10-29 00:59:26', '2025-03-20 04:29:59'),
(11, 'HLC660U Studio Headphones Behringer', 'DJ & Broadcast HeadPhones', 'JBL', '<p>Tai nghe âm thanh nổi USB</p><p>Micrô tích hợp</p><p>Bảo hành 1 năm</p>', '750000', '100', '12102022012024_hlc660u.png', '12102022012024_hlc660u.png', '12102022012024_hlc660u.png', '12102022012024_hlc660u.png', 'Ngày lễ', '0', '2025-03-20 05:05:00', '2025-03-20 05:06:31'),
(12, 'BH470U Studio Headphones Behringer', 'DJ & Broadcast HeadPhones', 'Apple', '<p>Tai nghe âm thanh nổi USB cấp phòng thu với micrô âm thanh tự nhiên cho cuộc gọi VoIP và cuộc gọi hội nghị rõ ràng</p><p>Lý tưởng cho các cài đặt văn phòng mở, làm việc tại nhà, học trực tuyến</p><p>Nghe nhạc và chơi game trực tuyến</p>', '690000', '100', '12102022010839_bh470u.png', '12102022010839_bh470u.png', '12102022010839_bh470u.png', '12102022010839_bh470u.png', 'Không khuyễn mãi', '0', '2025-03-20 05:08:03', '2025-03-20 05:08:03'),
(13, 'Tai nghe gaming Rapoo VH520C', 'Tai nghe gaming', 'Sony', '<ul><li>Hãng sản xuất: Rapoo</li><li>Tình trạng: Mới</li><li>Bảo hành: 24 Tháng</li><li>Màu sắc: Đen</li><li>Kết nối: 3.5mm (Audio) +&nbsp;USB (LED)</li></ul>', '370000', '100', '1603715876104_c8a610885fec4b17bd681411c5b258f5_3290fcefd26b44e5a79c471f94daefe1_grande.png', '1603715876104_c8a610885fec4b17bd681411c5b258f5_3290fcefd26b44e5a79c471f94daefe1_grande.png', '1603715876104_c8a610885fec4b17bd681411c5b258f5_3290fcefd26b44e5a79c471f94daefe1_grande.png', '1603715876104_c8a610885fec4b17bd681411c5b258f5_3290fcefd26b44e5a79c471f94daefe1_grande.png', 'Không khuyễn mãi', '0', '2025-03-20 05:10:24', '2025-03-20 05:10:24'),
(14, 'Tai nghe Razer Kraken V3 X USB', 'Tai nghe gaming', 'Focal', '<p>Nhà sản xuất : Razer</p><p>Tình trạng : Fullbox-100%</p><p>Bảo hành : 24 tháng&nbsp;</p>', '1250000', '100', 'ezgif-3-2a102e266ba9_15326bef447c473eb07d61b0e843d206_5771f81db9cb441cbc3698ac0e24f888_grande.png', 'ezgif-3-2a102e266ba9_15326bef447c473eb07d61b0e843d206_5771f81db9cb441cbc3698ac0e24f888_grande.png', 'ezgif-3-2a102e266ba9_15326bef447c473eb07d61b0e843d206_5771f81db9cb441cbc3698ac0e24f888_grande.png', 'ezgif-3-2a102e266ba9_15326bef447c473eb07d61b0e843d206_5771f81db9cb441cbc3698ac0e24f888_grande.png', 'Mới ra mắt', '0', '2025-03-20 05:13:21', '2025-03-20 05:13:21'),
(15, 'Asus ROG Cetra True Wireless', 'Tai nghe gaming', 'Yamaha', '<ul><li>Hãng sản xuất: Asus</li><li>Tình trạng: Mới</li><li>Bảo hành: 24 tháng</li><li>Màu sắc: Đen</li></ul>', '1750000', '100', 'ezgif-3-2a102e266ba9_15326bef447c473eb07d61b0e843d206_5771f81db9cb441cbc3698ac0e24f888_grande.png', 'ezgif-3-2a102e266ba9_15326bef447c473eb07d61b0e843d206_5771f81db9cb441cbc3698ac0e24f888_grande.png', 'ezgif-3-2a102e266ba9_15326bef447c473eb07d61b0e843d206_5771f81db9cb441cbc3698ac0e24f888_grande.png', 'ezgif-3-2a102e266ba9_15326bef447c473eb07d61b0e843d206_5771f81db9cb441cbc3698ac0e24f888_grande.png', 'Không khuyễn mãi', '0', '2025-03-20 05:14:59', '2025-03-20 05:14:59'),
(16, 'DareU EH469 7.1 RGB Pink', 'Tai nghe gaming', 'Marshall', '<h2><strong>Đánh giá chi tiết tai nghe&nbsp;DareU EH469 7.1 RGB Pink</strong></h2><h3><strong>Thiết kế đáng yêu cá tính</strong></h3><p>DareU EH469 7.1 RGB Pink&nbsp;mang thiết kế headband kép đơn giản, trọng lượng chỉ&nbsp;280g (không bao gồm dây) một trong những sự lựa chọn <a href=\"https://gearvn.com/collections/tai-nghe-may-tinh\">tai nghe máy tính</a> vô cùng&nbsp;thoải mái khi đeo mà không gây áp lực khó chịu cho đầu.</p><p>Phần chụp tai với kích thước lớn hình Oval chụp kín tai, phần đệm đầu có thể co dãn cho cảm giác đeo rất thoải mái.&nbsp;Gọng của tai nghe được làm bằng thép cho độ chắc chắn bền bỉ cao. Ngoài ra, phiên bản màu hồng còn đi kèm tai mèo cho những cô nàng đáng yêu.&nbsp;Tai nghe&nbsp;DareU EH469 7.1 RGB Pink&nbsp;có đệm tai tai rất lớn, rất êm, cho cảm giác đeo thoải mái lâu dài.&nbsp;</p><p><img src=\"https://file.hstatic.net/1000026716/file/gearvn-tai-nghe-dareu-eh469-7-1-rgb-pink-1_e565a0e85a8144f9b13cd544a6a18260_grande.jpg\"></p><p><strong>Âm thanh chất lượng</strong></p><p>Mặc dù DareU EH469 7.1 RGB Pink thuộc phân khúc <a href=\"https://gearvn.com/collections/tai-nghe-duoi-1-trieu\">tai nghe gaming dưới 1 triệu</a>&nbsp;nhưng lại sở hữu&nbsp;chất lượng âm thanh trên sản phẩm vẫn đáp ứng tốt cho nhu cầu của bạn từ học tập, làm việc cho tới những phút giây giải trí cùng các bộ phim hay các tựa game thú vị.</p><p><img src=\"https://file.hstatic.net/1000026716/file/gearvn-tai-nghe-dareu-eh469-7-1-rgb-pink-2_fb68215ff4ae463c8fd67ed6f5cfbf5a_grande.jpg\"></p>', '380000', '100', '34400_dareu_eh469_pink_1d57e30add8f42eca3eaa006d32481e2_5fea9259b65343acadecc1b76079c8b4_grande.png', '34400_dareu_eh469_pink_1d57e30add8f42eca3eaa006d32481e2_5fea9259b65343acadecc1b76079c8b4_grande.png', '34400_dareu_eh469_pink_1d57e30add8f42eca3eaa006d32481e2_5fea9259b65343acadecc1b76079c8b4_grande.png', '34400_dareu_eh469_pink_1d57e30add8f42eca3eaa006d32481e2_5fea9259b65343acadecc1b76079c8b4_grande.png', 'Không khuyễn mãi', '1', '2025-03-20 05:16:26', '2025-03-20 05:53:45');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('bJ7PfrsXQIidamyZwb592eTDfNyqr4v71mD52I6B', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiQUg2WVVnNzM2MEIyVkpJbERmd1JOVTVkN2JabmdvV0Q1U1RQdEVHZiI7czo4OiJnaW9faGFuZyI7YTowOnt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9naW9pLXRoaWV1Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1OiJjaGVjayI7czoxOiIyIjtzOjk6ImRhbmhfZ2lhcyI7YToyOntpOjQ7YTo1OntzOjEwOiJoaW5oX2FuaF8xIjtzOjI3OiIwOTA5MjAyMjAyNDgyOV9iZGotMTAwMC5wbmciO3M6MTI6InRlbl9zYW5fcGhhbSI7czozMjoiQkRKIDEwMDAgSGVhZHBob25lcyBESiBCZWhyaW5nZXIiO3M6NzoiZG9uX2dpYSI7czo3OiIxODAwMDAwIjtzOjg6InNvX2x1b25nIjtzOjE6IjEiO3M6MTA6ImtodXllbl9tYWkiO3M6MjoiMTUiO31pOjE2O2E6NTp7czoxMDoiaGluaF9hbmhfMSI7czo5OToiMzQ0MDBfZGFyZXVfZWg0NjlfcGlua18xZDU3ZTMwYWRkOGY0MmVjYTNlYWEwMDZkMzI0ODFlMl81ZmVhOTI1OWI2NTM0M2FjYWRlY2MxYjc2MDc5YzhiNF9ncmFuZGUucG5nIjtzOjEyOiJ0ZW5fc2FuX3BoYW0iO3M6MjQ6IkRhcmVVIEVINDY5IDcuMSBSR0IgUGluayI7czo3OiJkb25fZ2lhIjtzOjY6IjM4MDAwMCI7czo4OiJzb19sdW9uZyI7czoxOiIxIjtzOjEwOiJraHV5ZW5fbWFpIjtzOjE6IjAiO319czo4OiJEYW5nTmhhcCI7aToyO30=', 1742476233);

-- --------------------------------------------------------

--
-- Table structure for table `thuong_hieu`
--

CREATE TABLE `thuong_hieu` (
  `id_thuong_hieu` int UNSIGNED NOT NULL,
  `ten_thuong_hieu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `thuong_hieu`
--

INSERT INTO `thuong_hieu` (`id_thuong_hieu`, `ten_thuong_hieu`) VALUES
(1, 'JBL'),
(2, 'B&O'),
(3, 'Apple'),
(4, 'Harman Kardon'),
(5, 'Marshall'),
(6, 'Sony'),
(7, 'Focal'),
(8, 'Yamaha');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `ten_nguoi_dung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ten_dang_nhap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_phan_quyen` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ten_nguoi_dung`, `email`, `sdt`, `ten_dang_nhap`, `password`, `id_phan_quyen`) VALUES
(1, 'Admin', 'admin@gmail.com', '0123456789', 'admin', '$2y$10$uXdVA13qRBr8hpfIY09PI.C8Xi0voRmWHVpgZXCqqko.GoL.CCoV.', 1),
(2, 'Nguyễn Văn A', 'user@gmail.com', '0123456788', 'user1', '$2y$10$8mLhYENaILpulYZZCiC4RusvqYixMMddWR9xVMpCthqml5UymCZsC', 2),
(3, 'Nguyễn Văn B', 'user2@gmail.com', '0123456787', 'user2', '$2y$10$VhTPr09OB2diyrKzt.LKW..NJ4fAoSLm4rjFarGytqR6ceyKYuuee', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `danh_gia`
--
ALTER TABLE `danh_gia`
  ADD PRIMARY KEY (`id_danh_gia`),
  ADD KEY `danh_gia_id_user_foreign` (`id_user`),
  ADD KEY `danh_gia_id_san_pham_foreign` (`id_san_pham`);

--
-- Indexes for table `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`id_don_hang`),
  ADD KEY `don_hang_id_user_foreign` (`id_user`);

--
-- Indexes for table `khuyen_mai`
--
ALTER TABLE `khuyen_mai`
  ADD PRIMARY KEY (`id_khuyen_mai`);

--
-- Indexes for table `loai_san_pham`
--
ALTER TABLE `loai_san_pham`
  ADD PRIMARY KEY (`id_loai_san_pham`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `phan_quyen`
--
ALTER TABLE `phan_quyen`
  ADD PRIMARY KEY (`id_phan_quyen`);

--
-- Indexes for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id_san_pham`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `thuong_hieu`
--
ALTER TABLE `thuong_hieu`
  ADD PRIMARY KEY (`id_thuong_hieu`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_ten_dang_nhap_unique` (`ten_dang_nhap`),
  ADD KEY `users_id_phan_quyen_foreign` (`id_phan_quyen`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `danh_gia`
--
ALTER TABLE `danh_gia`
  MODIFY `id_danh_gia` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `id_don_hang` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `khuyen_mai`
--
ALTER TABLE `khuyen_mai`
  MODIFY `id_khuyen_mai` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `loai_san_pham`
--
ALTER TABLE `loai_san_pham`
  MODIFY `id_loai_san_pham` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phan_quyen`
--
ALTER TABLE `phan_quyen`
  MODIFY `id_phan_quyen` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id_san_pham` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `thuong_hieu`
--
ALTER TABLE `thuong_hieu`
  MODIFY `id_thuong_hieu` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `danh_gia`
--
ALTER TABLE `danh_gia`
  ADD CONSTRAINT `danh_gia_id_san_pham_foreign` FOREIGN KEY (`id_san_pham`) REFERENCES `san_pham` (`id_san_pham`) ON DELETE CASCADE,
  ADD CONSTRAINT `danh_gia_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `don_hang`
--
ALTER TABLE `don_hang`
  ADD CONSTRAINT `don_hang_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_phan_quyen_foreign` FOREIGN KEY (`id_phan_quyen`) REFERENCES `phan_quyen` (`id_phan_quyen`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
