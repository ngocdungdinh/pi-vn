-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2016 at 05:15 AM
-- Server version: 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pivn`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_attributes`
--

CREATE TABLE IF NOT EXISTS `cart_attributes` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `position` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cart_categories`
--

CREATE TABLE IF NOT EXISTS `cart_categories` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL DEFAULT '1',
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `showon_menu` tinyint(1) NOT NULL DEFAULT '1',
  `showon_homepage` tinyint(1) NOT NULL DEFAULT '1',
  `status` varchar(20) NOT NULL DEFAULT 'on',
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart_categories`
--

INSERT INTO `cart_categories` (`id`, `parent_id`, `media_id`, `type_id`, `name`, `slug`, `showon_menu`, `showon_homepage`, `status`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(36, 0, 0, 1, 'Đèn trang trí', 'den-trang-tri', 0, 0, 'on', 1, '2016-07-06 18:43:20', '2016-07-06 18:43:20', '0000-00-00 00:00:00'),
(37, 0, 0, 2, 'Sơn', 'son', 0, 0, 'on', 1, '2016-07-06 18:44:00', '2016-07-06 18:44:00', '0000-00-00 00:00:00'),
(38, 0, 0, 2, 'Chống thấm Sika', 'chong-tham-sika', 0, 0, 'on', 1, '2016-07-06 18:44:16', '2016-07-06 18:44:16', '0000-00-00 00:00:00'),
(35, 0, 0, 1, 'Nội thất phòng ngủ', 'noi-that-phong-ngu', 0, 0, 'on', 1, '2016-07-06 18:43:05', '2016-07-06 18:43:05', '0000-00-00 00:00:00'),
(34, 0, 0, 1, 'Nội thất bếp', 'noi-that-bep', 0, 0, 'on', 1, '2016-07-06 18:42:48', '2016-07-06 18:42:48', '0000-00-00 00:00:00'),
(40, 0, 0, 2, 'Sản phẩm khác', 'san-pham-khac', 0, 0, 'on', 1, '2016-07-06 18:44:38', '2016-07-06 18:44:38', '0000-00-00 00:00:00'),
(33, 0, 0, 1, 'Nội thất phòng khách', 'noi-that-phong-khach', 0, 0, 'on', 1, '2016-07-06 18:42:33', '2016-07-06 18:42:33', '0000-00-00 00:00:00'),
(39, 0, 0, 2, 'Sàn gỗ', 'san-go', 0, 0, 'on', 1, '2016-07-06 18:44:26', '2016-07-06 18:44:26', '0000-00-00 00:00:00'),
(41, 37, 0, 2, 'Dulux', 'dulux', 0, 0, 'on', 1, '2016-07-06 18:50:20', '2016-07-06 18:50:20', '0000-00-00 00:00:00'),
(42, 37, 0, 2, 'Nippon', 'nippon', 0, 0, 'on', 1, '2016-07-06 18:51:06', '2016-07-06 18:51:06', '0000-00-00 00:00:00'),
(43, 37, 0, 2, 'Kova', 'kova', 0, 0, 'on', 1, '2016-07-06 18:51:28', '2016-07-06 18:51:28', '0000-00-00 00:00:00'),
(44, 38, 0, 2, 'Chống thấm', 'chong-tham', 0, 0, 'on', 1, '2016-07-06 18:51:49', '2016-07-06 18:51:49', '0000-00-00 00:00:00'),
(45, 38, 0, 2, 'Trám khe', 'tram-khe', 0, 0, 'on', 1, '2016-07-06 18:52:20', '2016-07-06 18:52:20', '0000-00-00 00:00:00'),
(46, 38, 0, 2, 'Vữa Rót', 'vua-rot', 0, 0, 'on', 1, '2016-07-06 18:52:34', '2016-07-06 18:52:34', '0000-00-00 00:00:00'),
(47, 38, 0, 2, 'Sửa chữa & Bảo vệ bê tông', 'sua-chua-bao-ve-be-tong', 0, 0, 'on', 1, '2016-07-06 18:52:54', '2016-07-06 18:52:54', '0000-00-00 00:00:00'),
(48, 38, 0, 2, 'Lớp phủ bảo vệ sàn', 'lop-phu-bao-ve-san', 0, 0, 'on', 1, '2016-07-06 18:53:15', '2016-07-06 18:53:15', '0000-00-00 00:00:00'),
(49, 38, 0, 2, 'Sản xuất bê tông', 'san-xuat-be-tong', 0, 0, 'on', 1, '2016-07-06 18:53:33', '2016-07-06 18:53:33', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cart_category_product`
--

CREATE TABLE IF NOT EXISTS `cart_category_product` (
  `id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=97 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cart_category_product`
--

INSERT INTO `cart_category_product` (`id`, `category_id`, `product_id`, `created_at`, `updated_at`) VALUES
(88, 16, 13, '2014-02-23 13:25:18', '2014-02-23 13:25:18'),
(89, 15, 14, '2014-02-23 13:25:42', '2014-02-23 13:25:42'),
(87, 15, 15, '2014-02-22 15:30:48', '2014-02-22 15:30:48'),
(93, 15, 16, '2014-02-24 09:22:53', '2014-02-24 09:22:53'),
(95, 15, 17, '2016-07-03 18:17:39', '2016-07-03 18:17:39'),
(96, 37, 37, '2016-07-06 19:11:04', '2016-07-06 19:11:04');

-- --------------------------------------------------------

--
-- Table structure for table `cart_orders`
--

CREATE TABLE IF NOT EXISTS `cart_orders` (
  `id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `admin_note` varchar(255) NOT NULL,
  `customer_note` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'new',
  `country` varchar(50) NOT NULL,
  `total` int(11) NOT NULL DEFAULT '0',
  `payment_gateway` varchar(20) NOT NULL DEFAULT '1',
  `shipping_method` varchar(20) NOT NULL,
  `shipping_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cart_order_product`
--

CREATE TABLE IF NOT EXISTS `cart_order_product` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `price` int(11) NOT NULL DEFAULT '0',
  `discount_price` int(11) NOT NULL DEFAULT '0',
  `subtotal` int(11) NOT NULL DEFAULT '0',
  `qty` tinyint(2) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cart_products`
--

CREATE TABLE IF NOT EXISTS `cart_products` (
  `id` int(11) NOT NULL,
  `sku` varchar(10) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `excerpt` text NOT NULL,
  `content` text NOT NULL,
  `price` varchar(20) NOT NULL,
  `discount_price` varchar(20) NOT NULL,
  `quantity` tinyint(5) NOT NULL,
  `stock_status` varchar(20) NOT NULL DEFAULT 'in_stock',
  `media_id` int(11) NOT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `is_popular` tinyint(1) NOT NULL DEFAULT '0',
  `buy_count` int(11) NOT NULL,
  `review_cache` int(11) NOT NULL,
  `review_count` int(11) NOT NULL,
  `view_count` int(11) NOT NULL,
  `showon_homepage` tinyint(1) NOT NULL DEFAULT '1',
  `allow_comments` tinyint(1) NOT NULL DEFAULT '1',
  `status` varchar(20) NOT NULL DEFAULT '',
  `meta_title` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `meta_keywords` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart_products`
--

INSERT INTO `cart_products` (`id`, `sku`, `category_id`, `name`, `slug`, `excerpt`, `content`, `price`, `discount_price`, `quantity`, `stock_status`, `media_id`, `is_featured`, `is_popular`, `buy_count`, `review_cache`, `review_count`, `view_count`, `showon_homepage`, `allow_comments`, `status`, `meta_title`, `meta_description`, `meta_keywords`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(13, 'P1513', 16, 'Eco Safety No Sebum Sun Milk', 'eco-safety-no-sebum-sun-milk', 'Chống nắng chiết xuất từ tinh dầu hoa hướng dương và trà xanh , dạng sữa thấm nhanh và giúp kiềm dầu hiệu quả', '<p align="center"><img src="/uploads/medias/2014/02/22/550x500/22.02.2014_bb_1393077978.jpg" style="padding: 10px 0; width: 500px; text-align: center" /></p>\r\n', '350000', '250000', 1, 'in_stock', 43, 0, 0, 0, 0, 0, 0, 1, 1, 'published', '', '', '', 1, '2014-02-18 14:56:37', '2014-02-23 13:25:18', '0000-00-00 00:00:00'),
(14, 'P014', 15, 'Mirenal Blusher', 'mirenal-blusher', 'Má hồng không nhũ màu sắc trẻ trung, độ bám tốt', '', '240000', '', 1, 'in_stock', 44, 1, 1, 0, 0, 0, 0, 1, 1, 'published', '', '', '', 1, '2014-02-22 14:24:29', '2014-02-23 13:25:42', '0000-00-00 00:00:00'),
(15, 'P015', 15, 'Innisfree Juicy Gloss Penci', 'innisfree-juicy-gloss-penci', 'Son thiết kế dạng thỏi tạo độ bóng nhẹ cho môi. Độ bám cao,nhiều dưỡng với hương hoa quả ngọt ngào. Đặc biệt em nó giúp đôi môi k lộ rõ lằn vân môi nhá. Xinh xắn đáng yêu lại tiện lợi. Cái đuôi thiết kế dạng vặn để đẩy ruột lên khi dùng hết', '<p align="center"><img src="/uploads/medias/2014/02/22/550x500/22.02.2014_bb_1393082708.jpg" style="padding: 10px 0; width: 500px; text-align: center" /></p>\r\n', '200000', '', 1, 'in_stock', 40, 1, 1, 0, 0, 0, 0, 1, 1, 'published', '', '', '', 1, '2014-02-22 15:25:23', '2014-02-22 15:30:48', '0000-00-00 00:00:00'),
(16, 'P016', 15, 'Innisfree Glossy Lip Lacquer', 'innisfree-glossy-lip-lacquer', 'Em son này nếu apply lớp đậm thì sẽ có độ bóng nhẹ cho môi kiểu như son bóng nhé. Hoàn toàn không dính. Nếu apply lớp mỏng và blend thì em nó lại như son tint lên môi xinh xắn nhẹ nhàng cho môi. Không bóng chút nào. Siêu nhiều dưỡng', '<p align="center"><img src="/uploads/medias/2014/02/22/550x500/22.02.2014_bb_1393082844.jpg" style="padding: 10px 0; width: 500px; text-align: center" /></p>\r\n', '180000', '', 4, 'in_stock', 41, 0, 0, 0, 5, 1, 0, 1, 1, 'published', '', '', '', 1, '2014-02-22 15:26:52', '2014-02-28 09:03:24', '0000-00-00 00:00:00'),
(17, 'P017', 15, 'No Sebum Bbcream', 'no-sebum-bbcream', 'Bbcream kiềm dầu tốt, che phủ tương đối ổn dành cho riêng cho các bạn da hỗn hợp thiên dầu tới da dầu nhiều vào mùa hè đây nhé. Em nó cực kì lành tính luôn. Bộ sản phẩm hoàn hảo của dòng no sebum với thành phần là lá bạc hà và lá phong từ đảo jeju luôn được chị em ưa chuông. Có 3 tone màu : no.1 trắng hồng cho các gái da trắng, no.2 tone vàng cho da các bạn mún makeup tự nhiên trắng vừa phải, no.3 màu trung bình cho các bạn mún makeup tự nhiên da không trắng lắm. Riêng màu no.3 này lên da sẽ tiệp với màu da tạo độ tự nhiên trong suốt nhé. Nhìn không thì hơi khó hình dung. Mình dịch từ tiếng Hàn trên vỏ hộp thôi hihi', '<p align="center"><img src="/uploads/medias/2014/02/22/550x500/22.02.2014_bb_1393082977.jpg" style="padding: 10px 0; width: 500px; text-align: center" /></p>\r\n', '420000', '', 1, 'in_stock', 49, 0, 0, 0, 4, 6, 0, 1, 1, 'published', '', '', '', 1, '2014-02-22 15:29:45', '2016-07-03 18:17:39', '0000-00-00 00:00:00'),
(19, '', 37, 'tests sadf &agrave; &agrave; ', 'tests-sadf-a-a', 'à à à à sà sfdzxcv ádvsafvafsv', '<p>zxc v&aacute; vasfvasfvcvsacv ascv sacv</p>\r\n', '', '', 1, 'in_stock', 0, 0, 0, 0, 0, 0, 0, 1, 1, 'published', '', '', '', 1, '2016-07-06 19:11:04', '2016-07-06 19:11:04', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cart_product_attribute`
--

CREATE TABLE IF NOT EXISTS `cart_product_attribute` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cart_product_media`
--

CREATE TABLE IF NOT EXISTS `cart_product_media` (
  `id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `media_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cart_product_media`
--

INSERT INTO `cart_product_media` (`id`, `product_id`, `media_id`, `created_at`, `updated_at`) VALUES
(24, 13, 13, '2014-02-20 14:49:18', '2014-02-20 14:49:18'),
(23, 13, 15, '2014-02-20 14:49:17', '2014-02-20 14:49:17'),
(22, 13, 16, '2014-02-20 14:49:15', '2014-02-20 14:49:15'),
(21, 13, 17, '2014-02-20 14:49:14', '2014-02-20 14:49:14'),
(25, 13, 9, '2014-02-20 14:49:19', '2014-02-20 14:49:19'),
(26, 13, 10, '2014-02-20 14:49:20', '2014-02-20 14:49:20'),
(27, 13, 11, '2014-02-20 14:49:21', '2014-02-20 14:49:21'),
(28, 13, 12, '2014-02-20 14:49:22', '2014-02-20 14:49:22'),
(29, 16, 44, '2014-02-24 09:22:30', '2014-02-24 09:22:30'),
(30, 16, 43, '2014-02-24 09:22:31', '2014-02-24 09:22:31'),
(31, 16, 42, '2014-02-24 09:22:31', '2014-02-24 09:22:31'),
(32, 16, 41, '2014-02-24 09:22:32', '2014-02-24 09:22:32'),
(33, 17, 49, '2016-07-03 18:16:27', '2016-07-03 18:16:27');

-- --------------------------------------------------------

--
-- Table structure for table `cart_product_tag`
--

CREATE TABLE IF NOT EXISTS `cart_product_tag` (
  `id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cart_product_tag`
--

INSERT INTO `cart_product_tag` (`id`, `product_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(16, 13, 51, '2014-02-23 13:25:18', '2014-02-23 13:25:18');

-- --------------------------------------------------------

--
-- Table structure for table `cart_reviews`
--

CREATE TABLE IF NOT EXISTS `cart_reviews` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text NOT NULL,
  `approved` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `spam` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `showon_menu` tinyint(3) NOT NULL,
  `showon_homepage` int(11) NOT NULL,
  `list_layout` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `item_layout` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_count` int(11) NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'on',
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `slug`, `showon_menu`, `showon_homepage`, `list_layout`, `item_layout`, `post_count`, `status`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(21, 0, 'Sử dụng mỹ phẩm', 'su-dung-my-pham', 3, 3, NULL, NULL, 0, 'on', 1, '2013-12-23 00:28:13', '2014-02-25 20:35:36', NULL),
(20, 0, 'Làm đẹp', 'lam-dep', 2, 2, NULL, NULL, 0, 'on', 1, '2013-12-23 00:28:01', '2014-02-25 20:35:21', NULL),
(19, 0, 'Tin tức Sammi', 'tin-tuc-sammi', 1, 1, NULL, NULL, 0, 'on', 1, '2013-12-23 00:26:51', '2014-02-25 20:35:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_post`
--

CREATE TABLE IF NOT EXISTS `category_post` (
  `id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `post_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=520 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category_post`
--

INSERT INTO `category_post` (`id`, `category_id`, `post_id`, `created_at`, `updated_at`) VALUES
(513, 22, 67, '2014-02-25 19:53:31', '2014-02-25 19:53:31'),
(508, 22, 66, '2013-12-23 01:31:30', '2013-12-23 01:31:30'),
(507, 20, 66, '2013-12-23 01:31:30', '2013-12-23 01:31:30'),
(504, 20, 65, '2013-12-23 01:30:12', '2013-12-23 01:30:12'),
(503, 20, 64, '2013-12-23 01:25:14', '2013-12-23 01:25:14'),
(510, 22, 63, '2013-12-23 02:05:08', '2013-12-23 02:05:08'),
(501, 22, 62, '2013-12-23 01:22:02', '2013-12-23 01:22:02'),
(500, 23, 61, '2013-12-23 01:19:50', '2013-12-23 01:19:50'),
(499, 23, 60, '2013-12-23 01:18:07', '2013-12-23 01:18:07'),
(498, 22, 59, '2013-12-23 01:16:39', '2013-12-23 01:16:39'),
(497, 21, 59, '2013-12-23 01:16:39', '2013-12-23 01:16:39'),
(496, 21, 58, '2013-12-23 01:14:57', '2013-12-23 01:14:57'),
(495, 20, 58, '2013-12-23 01:14:57', '2013-12-23 01:14:57'),
(494, 20, 57, '2013-12-23 01:10:52', '2013-12-23 01:10:52'),
(512, 23, 56, '2013-12-23 02:05:17', '2013-12-23 02:05:17'),
(511, 22, 56, '2013-12-23 02:05:17', '2013-12-23 02:05:17'),
(515, 20, 70, '2014-02-25 19:57:16', '2014-02-25 19:57:16'),
(517, 20, 71, '2014-02-25 19:59:47', '2014-02-25 19:59:47'),
(519, 20, 72, '2014-02-25 20:01:13', '2014-02-25 20:01:13');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `post_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `comment_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'post',
  `status` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'on',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

CREATE TABLE IF NOT EXISTS `conversations` (
  `c_id` int(11) NOT NULL,
  `user_one` int(11) NOT NULL,
  `user_two` int(11) NOT NULL,
  `is_read` tinyint(4) NOT NULL DEFAULT '0',
  `type` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `conversation_reply`
--

CREATE TABLE IF NOT EXISTS `conversation_reply` (
  `cr_id` int(11) NOT NULL,
  `reply` text,
  `user_id_fk` int(11) NOT NULL,
  `c_id_fk` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `email_queue`
--

CREATE TABLE IF NOT EXISTS `email_queue` (
  `id` int(11) NOT NULL,
  `from_name` varchar(255) DEFAULT NULL,
  `from_email` varchar(255) NOT NULL,
  `to_name` varchar(255) NOT NULL,
  `to_email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `type_mail` tinytext NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '{"users":1,"news.create":1,"admin":1,"user.create":1,"user.edit":1,"user.detele":1,"group.create":1,"group.edit":1,"group.detele":1,"news.edit":1,"news.editpublish":1,"news.editowner":1,"news.delete":1,"news.publish":1,"news.editcategory":1,"news.deletecategory":1,"news.editcomment":1,"pages.create":1,"pages.edit":1,"pages.delete":1,"news.deletecomment":1,"medias.upload":1,"medias.edit":1,"medias.delete":1,"news.createcategory":1,"news.createtag":1,"news.edittag":1,"news.deletetag":1,"handbooks.createpost":1,"handbooks.editpost":1,"handbooks.deletepost":1,"handbooks.createcategory":1,"handbooks.editcategory":1,"handbooks.deletecategory":1,"handbooks.createjob":1,"cart.createproduct":1,"cart.editproduct":1,"cart.deleteproduct":1,"cart.createcategory":1,"cart.editcategory":1,"cart.deletecategory":1,"question.create":1,"question.edit":1,"question.detele":1,"user.doctor":1,"answer.create":1,"answer.edit":1,"answer.detele":1,"user.full":1,"question.full":1,"group.full":1,"pages.full":1,"medias.full":1,"handbooks.full":1,"news.full":1,"royalty.view":1,"royalty.set":1,"royalty.full":1,"royalty.ownerview":1,"doctor.full":1,"doctor.doctor":1,"settings.config":1,"menus.full":1,"menus.create":1,"menus.edit":1,"menus.delete":1,"cart.checkout":1,"cart.editorder":1,"cart.deleteorder":1}', '2013-09-11 13:36:59', '2014-02-27 17:19:54'),
(2, 'Biên tập viên', '{"news.create":1,"admin":1,"question.create":1,"question.edit":1,"question.detele":1,"user.doctor":1,"answer.create":1,"answer.edit":1,"answer.detele":1,"news.edit":1,"news.delete":1,"news.editcomment":1,"news.deletecomment":1,"news.createtag":1,"news.edittag":1,"news.deletetag":1,"pages.edit":1,"medias.upload":1,"medias.edit":1,"medias.delete":1,"handbooks.createpost":1,"handbooks.editpost":1,"handbooks.deletepost":1,"handbooks.createcategory":1,"handbooks.editcategory":1,"handbooks.deletecategory":1,"handbooks.createjob":1,"news.review":1}', '2013-09-11 13:41:04', '2013-12-21 11:26:02'),
(3, 'Phóng viên', '{"admin":1,"news.edit":1,"question.create":1,"question.edit":1,"question.detele":1,"news.create":1,"news.delete":1,"news.createtag":1,"news.edittag":1,"news.deletetag":1,"medias.upload":1,"medias.edit":1,"medias.delete":1,"news.editpublish":1,"news.editowner":1}', '2013-09-19 22:36:18', '2013-12-11 12:20:15'),
(4, 'Thành viên', '{"question.create":1,"question.edit":1,"question.detele":1,"medias.upload":1,"medias.edit":1,"medias.delete":1}', '2013-09-19 22:36:52', '2013-11-15 12:45:48'),
(5, 'Cộng tác viên', '{"news.create":1,"news.edit":1,"news.editpublish":1,"news.editowner":1,"news.delete":1,"news.publish":1,"news.createtag":1,"news.edittag":1,"news.deletetag":1,"medias.upload":1,"medias.edit":1,"medias.delete":1,"user.doctor":1,"answer.create":1,"answer.edit":1,"answer.detele":1,"question.create":1,"question.edit":1,"question.detele":1,"doctor.doctor":1}', '2013-11-14 02:18:39', '2013-12-22 21:49:32'),
(6, 'Thư kí tòa soạn', '{"admin":1,"user.full":1,"user.create":1,"user.edit":1,"user.detele":1,"question.full":1,"question.create":1,"question.edit":1,"question.detele":1,"doctor.full":1,"answer.create":1,"answer.edit":1,"answer.detele":1,"group.full":1,"group.create":1,"group.edit":1,"group.detele":1,"news.full":1,"news.create":1,"news.edit":1,"news.editpublish":1,"news.delete":1,"news.publish":1,"news.createcategory":1,"news.editcategory":1,"news.deletecategory":1,"news.editcomment":1,"news.deletecomment":1,"news.createtag":1,"news.edittag":1,"news.deletetag":1,"royalty.full":1,"royalty.view":1,"royalty.ownerview":1,"royalty.set":1,"pages.full":1,"pages.create":1,"pages.edit":1,"pages.delete":1,"medias.full":1,"medias.upload":1,"medias.edit":1,"medias.delete":1,"handbooks.full":1,"handbooks.createpost":1,"handbooks.editpost":1,"handbooks.deletepost":1,"handbooks.createcategory":1,"handbooks.editcategory":1,"handbooks.deletecategory":1,"handbooks.createjob":1,"settings.config":1}', '2013-12-21 11:21:30', '2013-12-21 11:22:25');

-- --------------------------------------------------------

--
-- Table structure for table `medias`
--

CREATE TABLE IF NOT EXISTS `medias` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `mpath` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medias`
--

INSERT INTO `medias` (`id`, `title`, `mpath`, `mname`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '', 'uploads/medias/2013/12/23', '23.12.2013_bb_1387785961.png', 1, '2013-12-23 01:06:03', '2013-12-23 01:06:03'),
(2, '', 'uploads/medias/2013/12/23', '23.12.2013_bb_1387786241.jpg', 1, '2013-12-23 01:10:42', '2013-12-23 01:10:42'),
(3, '', 'uploads/medias/2013/12/23', '23.12.2013_bb_1387786467.jpg', 1, '2013-12-23 01:14:28', '2013-12-23 01:14:28'),
(4, '', 'uploads/medias/2013/12/23', '23.12.2013_bb_1387786581.jpg', 1, '2013-12-23 01:16:22', '2013-12-23 01:16:22'),
(5, '', 'uploads/medias/2013/12/23', '23.12.2013_bb_1387786664.jpg', 1, '2013-12-23 01:17:45', '2013-12-23 01:17:45'),
(6, '', 'uploads/medias/2013/12/23', '23.12.2013_bb_1387786763.jpg', 1, '2013-12-23 01:19:23', '2013-12-23 01:19:23'),
(7, '', 'uploads/medias/2013/12/23', '23.12.2013_bb_1387786901.jpg', 1, '2013-12-23 01:21:41', '2013-12-23 01:21:41'),
(8, '', 'uploads/medias/2013/12/23', '23.12.2013_bb_1387787010.jpg', 1, '2013-12-23 01:23:31', '2013-12-23 01:23:31'),
(9, '', 'uploads/medias/2013/12/23', '23.12.2013_bb_1387787109.jpg', 1, '2013-12-23 01:25:09', '2013-12-23 01:25:09'),
(10, '', 'uploads/medias/2013/12/23', '23.12.2013_bb_1387787401.jpg', 1, '2013-12-23 01:30:02', '2013-12-23 01:30:02'),
(11, '', 'uploads/medias/2013/12/23', '23.12.2013_bb_1387787451.png', 1, '2013-12-23 01:30:52', '2013-12-23 01:30:52'),
(12, '', 'uploads/medias/2013/12/23', '23.12.2013_bb_1387787657.jpg', 1, '2013-12-23 01:34:17', '2013-12-23 01:34:17'),
(13, '', 'uploads/medias/2013/12/23', '23.12.2013_bb_1387787859.png', 1, '2013-12-23 01:37:40', '2013-12-23 01:37:40'),
(18, '', 'uploads/medias/2014/02/21', '21.02.2014_bb_1392918798.jpg', 1, '2014-02-20 17:53:19', '2014-02-20 17:53:19'),
(15, '', 'uploads/medias/2014/02/19', '19.02.2014_bb_1392802732.jpg', 1, '2014-02-19 09:38:53', '2014-02-19 09:38:53'),
(16, '', 'uploads/medias/2014/02/19', '19.02.2014_bb_1392802732.png', 1, '2014-02-19 09:38:54', '2014-02-19 09:38:54'),
(17, '', 'uploads/medias/2014/02/19', '19.02.2014_bb_1392802787.jpg', 1, '2014-02-19 09:39:47', '2014-02-19 09:39:47'),
(19, '', 'uploads/medias/2014/02/22', '22.02.2014_bb_1393077978.jpg', 1, '2014-02-22 14:06:18', '2014-02-22 14:06:18'),
(20, '', 'uploads/medias/2014/02/22', '22.02.2014_bb_1393079035.jpg', 1, '2014-02-22 14:23:56', '2014-02-22 14:23:56'),
(36, '', 'uploads/medias/2014/02/22', '22.02.2014_bb_1393081568.png', 1, '2014-02-22 15:06:08', '2014-02-22 15:06:08'),
(37, '', 'uploads/medias/2014/02/22', '22.02.2014_bb_1393081572.png', 1, '2014-02-22 15:06:13', '2014-02-22 15:06:13'),
(35, '', 'uploads/medias/2014/02/22', '22.02.2014_bb_1393081564.png', 1, '2014-02-22 15:06:04', '2014-02-22 15:06:04'),
(30, '', 'uploads/medias/2014/02/22', '22.02.2014_bb_1393081533.png', 1, '2014-02-22 15:05:33', '2014-02-22 15:05:33'),
(31, '', 'uploads/medias/2014/02/22', '22.02.2014_bb_1393081537.png', 1, '2014-02-22 15:05:38', '2014-02-22 15:05:38'),
(32, '', 'uploads/medias/2014/02/22', '22.02.2014_bb_1393081542.png', 1, '2014-02-22 15:05:43', '2014-02-22 15:05:43'),
(33, '', 'uploads/medias/2014/02/22', '22.02.2014_bb_1393081554.png', 1, '2014-02-22 15:05:54', '2014-02-22 15:05:54'),
(34, '', 'uploads/medias/2014/02/22', '22.02.2014_bb_1393081559.png', 1, '2014-02-22 15:06:00', '2014-02-22 15:06:00'),
(38, '', 'uploads/medias/2014/02/22', '22.02.2014_bb_1393081576.png', 1, '2014-02-22 15:06:16', '2014-02-22 15:06:16'),
(40, '', 'uploads/medias/2014/02/22', '22.02.2014_bb_1393082708.jpg', 1, '2014-02-22 15:25:08', '2014-02-22 15:25:08'),
(41, '', 'uploads/medias/2014/02/22', '22.02.2014_bb_1393082844.jpg', 1, '2014-02-22 15:27:24', '2014-02-22 15:27:24'),
(42, '', 'uploads/medias/2014/02/22', '22.02.2014_bb_1393082977.jpg', 1, '2014-02-22 15:29:38', '2014-02-22 15:29:38'),
(43, '', 'uploads/medias/2014/02/23', '23.02.2014_bb_1393161910.jpg', 1, '2014-02-23 13:25:11', '2014-02-23 13:25:11'),
(44, '', 'uploads/medias/2014/02/23', '23.02.2014_bb_1393161936.jpg', 1, '2014-02-23 13:25:37', '2014-02-23 13:25:37'),
(45, '', 'uploads/medias/2014/02/26', '26.02.2014_bb_1393358004.png', 1, '2014-02-25 19:53:24', '2014-02-25 19:53:24'),
(46, '', 'uploads/medias/2014/02/26', '26.02.2014_bb_1393358216.jpg', 1, '2014-02-25 19:56:57', '2014-02-25 19:56:57'),
(47, '', 'uploads/medias/2014/02/26', '26.02.2014_bb_1393358349.PNG', 1, '2014-02-25 19:59:09', '2014-02-25 19:59:09'),
(48, '', 'uploads/medias/2014/02/26', '26.02.2014_bb_1393358456.jpg', 1, '2014-02-25 20:00:57', '2014-02-25 20:00:57'),
(53, '', 'uploads/medias/2016/07/11', '11.07.2016_bb_1468173417.jpg', 1, '2016-07-10 17:56:59', '2016-07-10 17:56:59'),
(54, '', 'uploads/medias/2016/07/11', '11.07.2016_bb_1468173484.jpg', 1, '2016-07-10 17:58:06', '2016-07-10 17:58:06');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `position` varchar(15) NOT NULL DEFAULT 'top',
  `status` varchar(5) NOT NULL DEFAULT 'on',
  `showon` tinyint(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `title`, `position`, `status`, `showon`, `created_at`, `updated_at`) VALUES
(1, 'Menu chính', 'nav', 'on', 0, '2014-02-12 09:35:30', '2014-02-12 10:06:44'),
(3, 'Footer', 'bottom', 'on', 0, '2014-02-24 04:55:06', '2014-02-24 04:55:06');

-- --------------------------------------------------------

--
-- Table structure for table `menu_links`
--

CREATE TABLE IF NOT EXISTS `menu_links` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `alt` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `target` varchar(20) NOT NULL DEFAULT '_self',
  `showon` tinyint(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu_links`
--

INSERT INTO `menu_links` (`id`, `parent_id`, `menu_id`, `title`, `alt`, `url`, `target`, `showon`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 'Trang chủ', '', '/', '_self', 1, '2014-02-12 11:36:13', '2014-02-24 04:48:26'),
(2, 0, 1, 'Giới thiệu', '', '/page/gioi-thieu', '_self', 5, '2014-02-12 11:37:59', '2014-02-24 04:48:26'),
(3, 0, 1, 'Liên hệ', '', '/page/lien-he', '_self', 6, '2014-02-12 12:03:31', '2014-02-24 04:48:26'),
(4, 0, 1, 'Hỏi đáp', '', '/page/hoi-dap', '_self', 2, '2014-02-22 15:46:17', '2014-02-25 21:03:20'),
(5, 0, 1, 'Tin tức - Cẩm nang', '', '/news', '_self', 3, '2014-02-22 15:46:49', '2014-02-24 04:48:26'),
(6, 0, 1, 'Vận chuyển - Thanh toán', '', '/page/van-chuyen-thanh-toan', '_self', 4, '2014-02-22 15:47:18', '2014-02-24 04:48:26'),
(7, 0, 3, 'Trang chủ', '', '/', '_self', 1, '2014-02-24 04:55:20', '2014-02-24 04:57:54'),
(8, 0, 3, 'Giới thiệu', '', '/page/gioi-thieu', '_self', 2, '2014-02-24 04:55:35', '2014-02-24 04:57:54'),
(9, 0, 3, 'Vận chuyển - Thanh toán', '', '/page/van-chuyen-thanh-toan', '_self', 3, '2014-02-24 04:55:50', '2014-02-24 04:57:54'),
(10, 0, 3, 'Liên hệ', '', '/page/lien-he', '_self', 4, '2014-02-24 04:56:02', '2014-02-24 04:57:54'),
(11, 0, 3, 'Member VIP', '', '/page/member-vip', '_self', 5, '2014-02-24 04:56:18', '2014-02-24 04:57:54');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2012_12_06_225921_migration_cartalyst_sentry_install_users', 1),
('2012_12_06_225929_migration_cartalyst_sentry_install_groups', 1),
('2012_12_06_225945_migration_cartalyst_sentry_install_users_groups_pivot', 1),
('2012_12_06_225988_migration_cartalyst_sentry_install_throttle', 1),
('2013_01_19_011903_create_posts_table', 2),
('2013_01_19_044505_create_comments_table', 2),
('2013_03_23_193214_update_users_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE IF NOT EXISTS `newsletters` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_conceive` tinyint(1) NOT NULL DEFAULT '0',
  `is_pregnant` tinyint(1) NOT NULL DEFAULT '0',
  `is_baby` tinyint(1) NOT NULL DEFAULT '0',
  `is_news` tinyint(1) NOT NULL DEFAULT '1',
  `day` int(5) NOT NULL,
  `month` int(5) NOT NULL,
  `year` int(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE IF NOT EXISTS `places` (
  `id` int(11) NOT NULL,
  `gid` varchar(100) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(60) NOT NULL,
  `slug` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `country` varchar(60) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) NOT NULL,
  `url` varchar(255) NOT NULL,
  `follows` int(11) NOT NULL,
  `search_count` int(11) NOT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `is_popular` tinyint(1) NOT NULL DEFAULT '0',
  `status` varchar(10) NOT NULL DEFAULT 'open',
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`id`, `gid`, `parent_id`, `name`, `slug`, `address`, `country`, `lat`, `lng`, `type`, `url`, `follows`, `search_count`, `is_featured`, `is_popular`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(59, '9a848a73f44fb63af49f0e3937433fdff336fe71', 0, 'Hotels Hanoi Vietnam', 'hotels-hanoi-vietnam', '17 Phan Dinh Phung, Hanoi, Vietnam', 'Vietnam', 0.000000, 0.000000, 'lodging', 'https://plus.google.com/105586973844585666200/about?hl=en-US', 0, 0, 0, 0, 'open', 1, '2013-11-14 13:13:49', '2013-11-14 13:13:49'),
(60, '80ec0160a2175da645aac12f8124b816e405b074', 0, 'Hanoi', 'hanoi', 'Hanoi, Vietnam', 'Vietnam', 0.000000, 0.000000, 'administrative_area_level_1', 'https://maps.google.com/maps/place?q=Hanoi&amp;ftid=0x3135008e13800a29:0x2987e416210b90d', 0, 1, 0, 0, 'open', 1, '2013-11-14 13:14:32', '2013-11-14 13:15:11'),
(61, '039195f6cf308db8c691914ff2ed21982a7663c4', 0, '1A L&yacute; Thường Kiệt', '1a-ly-thuong-kiet', 'Vietnam', 'Vietnam', 10.787494, 106.653366, 'bus_station', 'https://maps.google.com/maps/place?cid=4615036442815569793', 0, 1, 0, 0, 'open', 1, '2013-11-14 13:37:15', '2013-11-16 11:02:10'),
(62, '555829a0d040ad2dda281c6bc18b93137504a3d8', 0, '1 L&yacute; Thường Kiệt', '1-ly-thuong-kiet', '1 L&yacute; Thường Kiệt, H&agrave;ng B&agrave;i, Hoan Kiem District, Hanoi, Viet', 'Vietnam', 21.022877, 105.852112, 'street_address', 'https://maps.google.com/maps/place?q=1+L%C3%BD+Th%C6%B0%E1%BB%9Dng+Ki%E1%BB%87t&amp;ftid=0x3135ab9339de5523:0x25ee8d32e1796ea8', 0, 0, 0, 0, 'open', 1, '2013-11-16 11:03:34', '2013-11-16 11:03:34'),
(63, 'f41f7c38dddbb520a489459c2f9d1592e21ba9ee', 0, '1A, L&ecirc; Thanh Nghị, Hai B&agrave; Trưng , H&agrave; Nội', '1a-le-thanh-nghi-hai-ba-trung-ha-noi', '1 L&ecirc; Thanh Nghị, Đồng T&acirc;m, Hai B&agrave; Trưng, Hanoi, Vietnam', 'Vietnam', 21.001909, 105.842186, 'establishment', 'https://plus.google.com/116642198910972397200/about?hl=en-US', 0, 1, 0, 0, 'open', 1, '2013-11-16 11:10:12', '2013-11-16 11:15:42'),
(64, '1e8a44658d74a7db082388cd4b0f706770824b35', 0, 'Vietnam National Hospital of Pediatrics', 'vietnam-national-hospital-of-pediatrics', '18/879 La Th&agrave;nh, Đống Đa, Hanoi, Vietnam', 'Vietnam', 21.024645, 105.808578, 'hospital', 'https://plus.google.com/117239016232736507606/about?hl=en-US', 0, 0, 0, 0, 'open', 1, '2013-11-17 02:43:48', '2013-11-17 02:43:48'),
(65, 'a3806773a254a9b56f71d15ca712aa706de6f09e', 0, 'Hanh Phuc International Hospital', 'hanh-phuc-international-hospital', '13, Vĩnh Ph&uacute;, Thuận An, Binh Duong, Vietnam', 'Vietnam', 10.868111, 106.714462, 'hospital', 'https://plus.google.com/107354551259445823052/about?hl=en-US', 0, 0, 0, 0, 'open', 1, '2013-11-17 03:26:54', '2013-11-17 03:26:54');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8_unicode_ci NOT NULL,
  `media_id` int(11) NOT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(25) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'draft',
  `allow_comments` tinyint(1) NOT NULL DEFAULT '1',
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `is_popular` tinyint(1) NOT NULL DEFAULT '0',
  `showon_homepage` tinyint(1) NOT NULL DEFAULT '0',
  `view_count` int(11) NOT NULL DEFAULT '0',
  `comment_count` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'post',
  `publish_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=87 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `category_id`, `title`, `slug`, `content`, `excerpt`, `media_id`, `meta_title`, `meta_description`, `meta_keywords`, `status`, `allow_comments`, `is_featured`, `is_popular`, `showon_homepage`, `view_count`, `comment_count`, `post_type`, `publish_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(72, 1, 20, '5 mẹo make up gi&uacute;p bạn trẻ hơn 10 tuổi', '5-meo-make-up-giup-ban-tre-hon-10-tuoi', '<p>1. Lớp nền nhẹ nh&agrave;ng&nbsp;<br />\r\n<br />\r\n&nbsp;</p>\r\n\r\n<div align="center"><img alt="5 mẹo make up giúp bạn trẻ hơn 10 tuổi " src="http://afamily1.vcmedia.vn/dUhc0aqDzooTX7tSQIufzpc5mFq8G2/Image/2012/09/3-c235a.jpg" style="border:none;" title="5 mẹo make up giúp bạn trẻ hơn 10 tuổi " /></div>\r\n\r\n<p><br />\r\nMột l&agrave;n da qu&aacute; nhiều phấn đến mức tr&ocirc;ng giả tạo l&agrave; c&aacute;ch nhanh nhất khiến bạn gi&agrave; đi trong mọi t&igrave;nh huống. C&aacute;c chuy&ecirc;n gia trang điểm khuy&ecirc;n bạn, nếu khu&ocirc;n mặt c&oacute; quầng th&acirc;m mắt hay những khuyết điểm, h&atilde;y chỉ chấm nhẹ v&agrave;i giọt kem che khuyết điểm l&ecirc;n đ&uacute;ng v&ugrave;ng da đ&oacute;, d&ugrave;ng tay t&aacute;n nhẹ nh&agrave;ng để ch&uacute;ng vừa c&oacute; thể che được khuyết điểm m&agrave; l&agrave;n da bạn tr&ocirc;ng vẫn rất nhẹ nh&agrave;ng.&nbsp;<br />\r\n<br />\r\n2. L&agrave;m s&aacute;ng da&nbsp;<br />\r\n&nbsp;</p>\r\n\r\n<div align="center"><img alt="5 mẹo make up giúp bạn trẻ hơn 10 tuổi " src="http://afamily1.vcmedia.vn/dUhc0aqDzooTX7tSQIufzpc5mFq8G2/Image/2012/09/5-c235a.jpg" style="border:none;" title="5 mẹo make up giúp bạn trẻ hơn 10 tuổi " /></div>\r\n\r\n<p><br />\r\nKem dưỡng ẩm dạng lỏng hay kem nền lỏng, tone m&agrave;u nhạt sẽ l&agrave; chọn lựa tốt nhất cho l&agrave;n da bắt đầu xuất hiện nếp nhăn. Kh&ocirc;ng như phấn phủ dạng n&eacute;n sẽ khiến c&aacute;c nếp nhăn v&agrave; khuyết điểm của bạn lu&ocirc;n hiện ra r&otilde; hơn thực tế - c&aacute;ch nhanh nhất &quot;tặng&quot; th&ecirc;m cho bạn chục tuổi. C&aacute;c loại mĩ phẩm dạng lỏng, c&oacute; độ tương phản nhẹ sẽ gi&uacute;p l&agrave;n da bạn tươi tắn hơn v&agrave; bừng s&aacute;ng.&nbsp;<br />\r\n<br />\r\nĐể sử dụng kem nền hiệu quả nhất, bạn n&ecirc;n d&ugrave;ng bọt biển ẩm hay cọ trang điểm để t&aacute;n đều ch&uacute;ng từ những chấm nhỏ trải đều quanh mặt. Nếu phải sử dụng phấn phủ, bạn h&atilde;y d&ugrave;ng cọ dạng dẹp phủ đều phấn l&ecirc;n mẳ, nhưng đừng phủ phấn l&ecirc;n v&ugrave;ng mắt nh&eacute;!&nbsp;<br />\r\n<br />\r\n3. L&agrave;m to tr&ograve;n đ&ocirc;i mắt&nbsp;<br />\r\n&nbsp;</p>\r\n\r\n<div align="center"><img alt="5 mẹo make up giúp bạn trẻ hơn 10 tuổi " src="http://afamily1.vcmedia.vn/dUhc0aqDzooTX7tSQIufzpc5mFq8G2/Image/2012/09/4-c235a.jpg" style="border:none;" title="5 mẹo make up giúp bạn trẻ hơn 10 tuổi " /></div>\r\n\r\n<p><br />\r\nBấm mi, mascara, b&oacute;ng mắt chứa nhũ v&agrave; phấn n&acirc;u lu&ocirc;n l&agrave; những sản phẩm trang điểm mắt gi&uacute;p bạn tr&ocirc;ng trẻ hơn. Bấm mi mang đến h&agrave;ng mi cong ho&agrave;n hảo v&agrave; d&ugrave;ng phấn nhũ highlight sẽ gi&uacute;p đ&ocirc;i mắt bạn tr&ocirc;ng to hơn - v&agrave; trẻ trung hơn trong bất k&igrave; ho&agrave;n cảnh n&agrave;o. C&aacute;c loại mascara tone m&agrave;u sậm như n&acirc;u hay đen sẽ c&oacute; t&aacute;c dụng tương phản với phần l&ograve;ng trắng mắt để gi&uacute;p đ&ocirc;i mắt bạn tr&ocirc;ng sắc n&eacute;t, to tr&ograve;n. V&agrave; cuối c&ugrave;ng, đừng qu&ecirc;n định dạng cho đ&ocirc;i ch&acirc;n m&agrave;y bạn bằng phấn n&acirc;u. Một đ&ocirc;i ch&acirc;n m&agrave;y đầy đặn, vừa phải v&agrave; c&oacute; h&igrave;nh lưỡi m&aacute;c sẽ l&agrave;m giảm đi &iacute;t nhất 10 tuổi cho bạn.&nbsp;<br />\r\n<br />\r\n4. L&agrave;m ấm khu&ocirc;n mặt&nbsp;<br />\r\n&nbsp;</p>\r\n\r\n<div align="center"><img alt="5 mẹo make up giúp bạn trẻ hơn 10 tuổi " src="http://afamily1.vcmedia.vn/dUhc0aqDzooTX7tSQIufzpc5mFq8G2/Image/2012/09/2-c235a.jpg" style="border:none;" title="5 mẹo make up giúp bạn trẻ hơn 10 tuổi " /></div>\r\n\r\n<p><br />\r\nSon m&ocirc;i m&agrave;u nude kết hợp c&ugrave;ng phấn n&acirc;u đồng sẽ khiến khu&ocirc;n mặt bạn trở n&ecirc;n nhạt nh&ograve;a, thiếu sức sống. Thay v&agrave;o đ&oacute;, sử dụng tone m&agrave;u hồng nude nhẹ nh&agrave;ng cho m&ocirc;i v&agrave; m&aacute; sẽ gi&uacute;p bạn lu&ocirc;n rạng ngời, trẻ trung. Hồng nude l&agrave; gam m&agrave;u ph&ugrave; hợp với mọi loại da, v&igrave; thế, bạn ho&agrave;n to&agrave;n c&oacute; thể sử dụng ch&uacute;ng dễ d&agrave;ng d&ugrave; sở hữu l&agrave;n da trung b&igrave;nh, da s&aacute;ng m&agrave;u hay b&aacute;nh mật.&nbsp;<br />\r\n<br />\r\n5. Viền m&ocirc;i nhẹ nh&agrave;ng&nbsp;<br />\r\n&nbsp;</p>\r\n\r\n<div align="center"><img alt="5 mẹo make up giúp bạn trẻ hơn 10 tuổi " src="http://afamily1.vcmedia.vn/dUhc0aqDzooTX7tSQIufzpc5mFq8G2/Image/2012/09/1-c235a.jpg" style="border:none;" title="5 mẹo make up giúp bạn trẻ hơn 10 tuổi " /></div>\r\n\r\n<p><br />\r\nC&agrave;ng c&oacute; tuổi, đường viền m&ocirc;i của bạn sẽ ng&agrave;y c&agrave;ng biến mất - đ&acirc;y l&agrave; nguy&ecirc;n nh&acirc;n ch&iacute;nh khiến son m&ocirc;i thường tr&ocirc;ng sẽ lem luốc hay thường tr&agrave;n ra ngo&agrave;i m&ocirc;i. Ch&iacute;nh v&igrave; thế, việc kẻ viền m&ocirc;i sẽ gi&uacute;p bạn định dạng đ&ocirc;i m&ocirc;i v&agrave; ngăn chặn việc son mội bị lem một c&aacute;ch ho&agrave;n hảo nhất. Việc n&agrave;y sẽ gi&uacute;p cho h&igrave;nh ảnh bạn lu&ocirc;n chỉn chu v&agrave; trẻ trung (thay v&igrave; ấn tượng về một &quot;cụ b&agrave; hom hem&quot; với đ&ocirc;i m&ocirc;i lem luốc).&nbsp;</p>\r\n', 'Ngoài việc làm đẹp, những mẹo make up cực kì đơn giản dưới đây còn giúp bạn trông trẻ hơn 10 tuổi trong mọi trường hợp.', 48, '', '', '', 'published', 1, 1, 1, 1, 12, 0, 'post', '2014-02-25 20:01:05', '2014-02-25 20:01:05', '2016-07-09 20:25:39', NULL),
(73, 1, 0, 'Giới thiệu', 'gioi-thieu', '<p>Giới thiệu</p>\r\n', 'Giới thiệu', 0, NULL, NULL, NULL, 'published', 1, 0, 0, 0, 0, 0, 'page', '0000-00-00 00:00:00', '2014-02-25 20:20:58', '2014-02-25 20:20:58', NULL),
(74, 1, 0, 'Member VIP', 'member-vip', '<p>Member VIP</p>\r\n', 'Member VIP', 0, NULL, NULL, NULL, 'published', 1, 0, 0, 0, 0, 0, 'page', '0000-00-00 00:00:00', '2014-02-25 20:21:13', '2014-02-25 20:21:33', NULL),
(75, 1, 0, 'Vận chuyển - Thanh toán', 'van-chuyen-thanh-toan', '<p>Vận chuyển - Thanh to&aacute;n</p>\r\n', 'Vận chuyển - Thanh toán', 0, NULL, NULL, NULL, 'published', 1, 0, 0, 0, 0, 0, 'page', '0000-00-00 00:00:00', '2014-02-25 20:21:55', '2014-02-25 20:21:55', NULL),
(76, 1, 0, 'Liên hệ', 'lien-he', '<p>Li&ecirc;n hệ</p>\r\n', 'Liên hệ', 0, NULL, NULL, NULL, 'published', 1, 0, 0, 0, 0, 0, 'page', '0000-00-00 00:00:00', '2014-02-25 20:22:04', '2014-03-10 17:47:43', NULL),
(77, 1, 0, 'Hỏi đáp', 'hoi-dap', '<p>Hỏi đ&aacute;p</p>\r\n', 'Hỏi đáp', 0, NULL, NULL, NULL, 'published', 1, 0, 0, 0, 0, 0, 'page', '0000-00-00 00:00:00', '2014-02-25 21:02:42', '2014-03-03 02:01:29', NULL),
(71, 1, 20, 'Trang điểm hồng h&agrave;o, tự nhi&ecirc;n cho những ng&agrave;y mưa ph&ugrave;n', 'trang-diem-hong-hao-tu-nhien-cho-nhung-ngay-mua-phun', '<div>\r\n<div>Cứ mỗi khi ra ngo&agrave;i, hẳn ai cũng sẽ phải lo sợ mưa gi&oacute; sẽ l&agrave;m lem hết lớp trang điểm tr&ecirc;n mặt, chưa kể n&oacute; c&ograve;n khiến bạn cảm thấy kh&oacute; chịu v&igrave; da bị ẩm hơn, h&ograve;a c&ugrave;ng với lớp trang điểm bị tr&ocirc;i lại c&agrave;ng dễ mẩn đỏ v&agrave; ngứa. Nhưng xuất hiện ở c&ocirc;ng sở với khu&ocirc;n mặt mộc c&ugrave;ng l&agrave;n da x&aacute;m xịt th&igrave; quả l&agrave; thử th&aacute;ch lớn. Chẳng ai muốn m&igrave;nh mất điểm trong mắt người kh&aacute;c, nhất l&agrave; ở nơi lu&ocirc;n đề cao sự chỉn chu, nền n&atilde; v&agrave; thanh lịch như văn ph&ograve;ng.&nbsp;</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>Vậy th&igrave; h&atilde;y c&ugrave;ng theo d&otilde;i c&aacute;ch trang điểm rất đơn giản dưới đ&acirc;y. N&oacute; sẽ cho bạn vẻ ngo&agrave;i tươi tắn, tự nhi&ecirc;n trong những ng&agrave;y mưa gi&oacute; v&agrave; tất nhi&ecirc;n, sẽ c&oacute; nhữn b&iacute; quyết khiến bạn chẳng c&ograve;n phải lo lắng l&agrave;m sao để giữ lớp trang điểm được bền đẹp.&nbsp;</div>\r\n\r\n<div><br />\r\n<img alt="Trang điểm hồng hào, tự nhiên cho những ngày mưa phùn 1" h="1215" lb="1" src="http://afamily1.vcmedia.vn/k:thumb_w/600/v2JDLtCJemgaUnkrroicIy4eMrxcc/Image/2014/02/Kim_Ha_Neul_Harper_s_Bazaar_Magazine_February_Issue_2014_2_-c9309/trang-diem-hong-hao-tu-nhien-cho-nhung-ngay-mua-phun.jpg" style="border:none;" title="Trang điểm hồng hào, tự nhiên cho những ngày mưa phùn 1" w="936" /><br />\r\nC&ugrave;ng chuẩn bị đồ nghề v&agrave; l&agrave;m theo c&aacute;c bước trong clip hướng dẫn dưới đ&acirc;y.</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div><img alt="Trang điểm hồng hào, tự nhiên cho những ngày mưa phùn 2" lb="2" src="http://afamily1.vcmedia.vn/k:v2JDLtCJemgaUnkrroicIy4eMrxcc/Image/2014/02/art_1388367244-c9309/trang-diem-hong-hao-tu-nhien-cho-nhung-ngay-mua-phun.jpg" style="border:none;" title="Trang điểm hồng hào, tự nhiên cho những ngày mưa phùn 2" />\r\n<div>&nbsp;</div>\r\n\r\n<div>\r\n<div align="center">&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div>Bước 1. Thoa kem chống nắng</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>Bạn lu&ocirc;n nghĩ rằng kem chống nắng chỉ cần sử dụng cho những ng&agrave;y nắng gắt? Ch&uacute;ng ta vẫn n&ecirc;n sử dụng kem chống nắng c&oacute; chỉ số SPF từ 15+ cho d&ugrave; ngo&agrave;i trời kh&ocirc;ng nắng, để bảo vệ l&agrave;n da khỏi những t&aacute;c hại tiềm ẩn c&oacute; trong &aacute;nh s&aacute;ng mặt trời nh&eacute;.</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div><img alt="Trang điểm hồng hào, tự nhiên cho những ngày mưa phùn 3" h="475" lb="3" src="http://afamily1.vcmedia.vn/k:thumb_w/600/kpSuvmXqx4noKq8A1VybqYqOKmgtQZ/Image/2014/02/1-f6ba1/trang-diem-hong-hao-tu-nhien-cho-nhung-ngay-mua-phun.PNG" style="border:none;" title="Trang điểm hồng hào, tự nhiên cho những ngày mưa phùn 3" w="856" /><br />\r\n&nbsp;</div>\r\n\r\n<div>Bước 2. Kem nền</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>Bơm 1 &iacute;t kem nền dạng lỏng l&ecirc;n mu b&agrave;n tay, sử dụng ng&oacute;n tay chấm đều những chấm nhỏ kem nền l&ecirc;n to&agrave;n bộ khu&ocirc;n mặt. H&atilde;y nhớ, bạn kh&ocirc;ng cần sử dụng qu&aacute; nhiều kem nền cho những ng&agrave;y trời mưa, ch&uacute;ng chỉ khiến lớp nền của bạn dễ bị lem nhem v&agrave; b&iacute;t lỗ ch&acirc;n l&ocirc;ng hơn m&agrave; th&ocirc;i. H&atilde;y d&ugrave;ng 1 lượng kem nhỏ rồi chấm th&agrave;nh nhiều chấm nhỏ l&ecirc;n khắp mặt, c&aacute;ch n&agrave;y sẽ gi&uacute;p bạn dễ d&agrave;ng t&aacute;n kem mỏng mịn v&agrave; đều hơn. Sử dụng b&ocirc;ng m&uacute;t trang điểm để t&aacute;n đều lớp kem tr&ecirc;n mặt.&nbsp;</div>\r\n\r\n<div><br />\r\n<img alt="Trang điểm hồng hào, tự nhiên cho những ngày mưa phùn 4" h="475" lb="4" src="http://afamily1.vcmedia.vn/k:thumb_w/600/kpSuvmXqx4noKq8A1VybqYqOKmgtQZ/Image/2014/02/kemnen-c2777/trang-diem-hong-hao-tu-nhien-cho-nhung-ngay-mua-phun.jpg" style="border:none;" title="Trang điểm hồng hào, tự nhiên cho những ngày mưa phùn 4" w="852" /><br />\r\n&nbsp;</div>\r\n\r\n<div>Bước 3. Kem che khuyết điểm</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>D&ugrave;ng cọ t&aacute;n kem che khuyết điểm chống thấm nước l&ecirc;n v&ugrave;ng mắt quầng th&acirc;m cũng như c&aacute;c v&ugrave;ng c&oacute; khuyết điểm tr&ecirc;n mặt. Tiếp tục t&aacute;n sang c&aacute;c v&ugrave;ng da tối m&agrave;u kh&aacute;c như kho&eacute; miệng, c&aacute;nh mũi.</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div><img alt="Trang điểm hồng hào, tự nhiên cho những ngày mưa phùn 5" h="474" lb="5" src="http://afamily1.vcmedia.vn/k:thumb_w/600/kpSuvmXqx4noKq8A1VybqYqOKmgtQZ/Image/2014/02/2-f6ba1/trang-diem-hong-hao-tu-nhien-cho-nhung-ngay-mua-phun.PNG" style="border:none;" title="Trang điểm hồng hào, tự nhiên cho những ngày mưa phùn 5" w="855" /></div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>Bước 4. Kẻ l&ocirc;ng m&agrave;y</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>Để kẻ một đ&ocirc;i l&ocirc;ng m&agrave;y ngang tự nhi&ecirc;n v&agrave; hợp xu hướng, trước ti&ecirc;n bản sử dụng bột t&aacute;n m&agrave;y nhạt hơn m&agrave;u t&oacute;c một t&ocirc;ng để định h&igrave;nh d&aacute;ng l&ocirc;ng m&agrave;y, nhẹ nh&agrave;ng t&ocirc; v&agrave;o những phần l&ocirc;ng m&agrave;y kh&ocirc;ng đều, d&ugrave;ng ng&oacute;n tay t&aacute;n nhẹ ph&iacute;a 2 đầu l&ocirc;ng m&agrave;y cho th&ecirc;m phần tự nhi&ecirc;n, sau đ&oacute; sử dụng ch&igrave; kẻ m&agrave;y tr&ugrave;ng m&agrave;u t&oacute;c, c&oacute; đầu dẹt để t&ocirc; lại cho đ&ocirc;i m&agrave;y được sắc n&eacute;t v&agrave; l&acirc;u tr&ocirc;i.</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div><img alt="Trang điểm hồng hào, tự nhiên cho những ngày mưa phùn 6" h="471" lb="6" src="http://afamily1.vcmedia.vn/k:thumb_w/600/kpSuvmXqx4noKq8A1VybqYqOKmgtQZ/Image/2014/02/6-f6ba1/trang-diem-hong-hao-tu-nhien-cho-nhung-ngay-mua-phun.PNG" style="border:none;" title="Trang điểm hồng hào, tự nhiên cho những ngày mưa phùn 6" w="851" /><br />\r\n&nbsp;</div>\r\n\r\n<div>Bước 5. Trang điểm m&agrave;u mắt</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>T&aacute;n nhẹ một lớp phấn mắt m&agrave;u da l&agrave;m nền tr&ecirc;n bầu mắt, sau đ&oacute; d&ugrave;ng m&agrave;u n&acirc;u đất t&aacute;n đều tạo chiều s&acirc;u cho mắt một c&aacute;ch nhẹ nh&agrave;ng tự nhi&ecirc;n. Cuối c&ugrave;ng lấy nhũ đồng t&ocirc; điểm một ch&uacute;t cho th&ecirc;m phần long lanh v&agrave;o đầu v&agrave; cuối mi mắt dưới.</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div><img alt="Trang điểm hồng hào, tự nhiên cho những ngày mưa phùn 7" h="472" lb="7" src="http://afamily1.vcmedia.vn/k:thumb_w/600/kpSuvmXqx4noKq8A1VybqYqOKmgtQZ/Image/2014/02/7-f6ba1/trang-diem-hong-hao-tu-nhien-cho-nhung-ngay-mua-phun.PNG" style="border:none;" title="Trang điểm hồng hào, tự nhiên cho những ngày mưa phùn 7" w="854" /><br />\r\n&nbsp;</div>\r\n\r\n<div>Bước 6. Kẻ viền mắt</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>Sử dụng gel kẻ mắt m&agrave;u đen hoặc n&acirc;u, lựa chọn gel kẻ mắt c&oacute; đặc t&iacute;nh kh&ocirc;ng lem, kh&ocirc;ng tr&ocirc;i để kẻ s&aacute;t ch&acirc;n mi tạo ch&acirc;n mi d&agrave;y, đ&ocirc;i mắt th&ecirc;m to tr&ograve;n m&agrave; kh&ocirc;ng hề nặng nề với đường kẻ mắt mỏng, tự nhi&ecirc;n. K&eacute;o d&agrave;i đu&ocirc;i mắt 0,5 cm khiến đu&ocirc;i mắt mở rộng, kh&ocirc;ng chếch đường kẻ qu&aacute; cao sẽ khiến đ&ocirc;i mắt trở n&ecirc;n sắc .</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div><img alt="Trang điểm hồng hào, tự nhiên cho những ngày mưa phùn 8" h="472" lb="8" src="http://afamily1.vcmedia.vn/k:thumb_w/600/kpSuvmXqx4noKq8A1VybqYqOKmgtQZ/Image/2014/02/keviemat-c2777/trang-diem-hong-hao-tu-nhien-cho-nhung-ngay-mua-phun.jpg" style="border:none;" title="Trang điểm hồng hào, tự nhiên cho những ngày mưa phùn 8" w="851" /><br />\r\n&nbsp;</div>\r\n\r\n<div>Bước 7. Kẹp v&agrave; chuốt mi</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>Sử dụng mascara kh&ocirc;ng tr&ocirc;i, kẹp v&agrave; chuốt hai h&agrave;ng mi tr&ecirc;n-dưới của bạn, tạo điểm nhấn cho đ&ocirc;i mắt th&ecirc;m long lanh.</div>\r\n\r\n<div><br />\r\n<img alt="Trang điểm hồng hào, tự nhiên cho những ngày mưa phùn 9" h="473" lb="9" src="http://afamily1.vcmedia.vn/k:thumb_w/600/kpSuvmXqx4noKq8A1VybqYqOKmgtQZ/Image/2014/02/kepmi-c2777/trang-diem-hong-hao-tu-nhien-cho-nhung-ngay-mua-phun.jpg" style="border:none;" title="Trang điểm hồng hào, tự nhiên cho những ngày mưa phùn 9" w="852" /><br />\r\n&nbsp;</div>\r\n\r\n<div>Bước 8. M&aacute; hồng v&agrave; hight light</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>Sử dụng m&aacute; hồng bằng ch&iacute;nh c&acirc;y son m&ocirc;i m&agrave;u hồng cam nhẹ, d&ugrave;ng khăn giấy lau bớt m&agrave;u thật của son rồi chấm nhẹ l&ecirc;n v&ugrave;ng g&ograve; m&aacute; v&agrave; t&aacute;n đều bằng tay hoặc m&uacute;t trang điểm. T&ocirc;ng m&agrave;u nhẹ nh&agrave;ng gi&uacute;p bạn c&oacute; được vẻ đẹp trẻ trung.</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div><img alt="Trang điểm hồng hào, tự nhiên cho những ngày mưa phùn 10" h="472" lb="10" src="http://afamily1.vcmedia.vn/k:thumb_w/600/kpSuvmXqx4noKq8A1VybqYqOKmgtQZ/Image/2014/02/9-f6ba1/trang-diem-hong-hao-tu-nhien-cho-nhung-ngay-mua-phun.PNG" style="border:none;" title="Trang điểm hồng hào, tự nhiên cho những ngày mưa phùn 10" w="855" /><br />\r\n&nbsp;</div>\r\n\r\n<div>Bước 9. Thoa son m&ocirc;i</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>Sử dụng son m&ocirc;i nhiều dưỡng m&agrave;u hồng nhẹ, t&aacute;n đều l&ecirc;n bờ m&ocirc;i để được đ&ocirc;i m&ocirc;i cong mịn v&agrave; cươi tắn. Thoa một ch&uacute;t son b&oacute;ng nếu bạn th&iacute;ch, vậy l&agrave; ch&uacute;ng ta đ&atilde; ho&agrave;n th&agrave;nh c&aacute;c bước trang điểm rồi !</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div><img alt="Trang điểm hồng hào, tự nhiên cho những ngày mưa phùn 11" h="469" lb="11" src="http://afamily1.vcmedia.vn/k:thumb_w/600/kpSuvmXqx4noKq8A1VybqYqOKmgtQZ/Image/2014/02/10-f6ba1/trang-diem-hong-hao-tu-nhien-cho-nhung-ngay-mua-phun.PNG" style="border:none;" title="Trang điểm hồng hào, tự nhiên cho những ngày mưa phùn 11" w="854" /></div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div><img alt="Trang điểm hồng hào, tự nhiên cho những ngày mưa phùn 12" h="762" lb="12" src="http://afamily1.vcmedia.vn/k:thumb_w/600/kpSuvmXqx4noKq8A1VybqYqOKmgtQZ/Image/2014/02/kakakaka-(8)-12485/trang-diem-hong-hao-tu-nhien-cho-nhung-ngay-mua-phun.jpg" style="border:none;" title="Trang điểm hồng hào, tự nhiên cho những ngày mưa phùn 12" w="640" /></div>\r\n', 'Những ngày mưa phùn ẩm ướt của mùa xuân luôn là "nỗi ám ảnh" của nhiều chị em phụ nữ.', 47, '', '', '', 'published', 1, 1, 1, 1, 6, 0, 'post', '2014-02-25 19:59:22', '2014-02-25 19:59:22', '2014-03-03 02:00:52', NULL),
(70, 1, 20, 'Đi t&igrave;m sản phẩm dưỡng ẩm ph&ugrave; hợp với mọi loại da', 'di-tim-san-pham-duong-am-phu-hop-voi-moi-loai-da', '<div>Thời tiết m&ugrave;a đ&ocirc;ng l&agrave; một trong những l&yacute; do khiến l&agrave;n da của bạn kh&ocirc;ng giữ được vẻ căng mịn, khỏe khoắn. D&ugrave; với bất cứ loại da n&agrave;o, từ da dầu, da kh&ocirc; hay da hỗn hợp đi chăng nữa.Đặc biệt, trong những ng&agrave;y cuối đ&ocirc;ng đầu xu&acirc;n n&agrave;y, t&igrave;nh thế cũng kh&ocirc;ng c&oacute; vẻ g&igrave; l&agrave; &quot;kh&aacute; khẩm&quot; hơn.Tiết trời khi th&igrave; kh&ocirc;, l&uacute;c lại nồm c&agrave;ng khiến da của bạn bị &quot;quay như chong ch&oacute;ng&quot;.Vậy n&ecirc;n, kh&ocirc;ng &iacute;t c&aacute;c chị em cuống cuồng thay đổi c&aacute;c loại kem dưỡng ẩm để chăm s&oacute;c cho da trong tiết trời n&agrave;y.</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>L&uacute;c n&agrave;y, c&acirc;u hỏi lại được đặt ra l&agrave;: &quot;Da của bạn hợp với những sản phẩm dưỡng ẩm như thế n&agrave;o?&quot;.Mỗi loại da, lại ph&ugrave; hợp với những sản phẩm dưỡng ẩm kh&aacute;c nhau v&agrave; v&igrave; thế, h&ocirc;m nay, h&atilde;y c&ugrave;ng ch&uacute;ng t&ocirc;i t&igrave;m ra những sản phẩm ho&agrave;n hảo nhất cho da của bạn qua b&agrave;i viết n&agrave;y nh&eacute;.</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>1. Da dầu</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>Với da dầu, bạn kh&ocirc;ng cần phải suy nghĩ qu&aacute; nhiều trong tiết trời n&agrave;y.Tuy nhi&ecirc;n, bạn n&ecirc;n chọn cho m&igrave;nh c&aacute;c loại sữa tắm c&oacute; độ pH thấp, ch&uacute;ng vừa gi&uacute;p da bạn giữ được độ mềm, ẩm cần thiết, vừa hạn chế lượng dầu tiết ra. B&ecirc;n cạnh đ&oacute;, bạn cũng cần sử dụng c&aacute;c loại body lotion dạng lỏng, kh&ocirc;ng chứa hoặc chứa &iacute;t kem v&agrave; lưu &yacute; chỉ n&ecirc;n b&ocirc;i v&agrave;o những v&ugrave;ng da dễ bị kh&ocirc; như khuỷu tay, đầu gối. Một điều cần lưu &yacute; nữa đ&oacute; l&agrave; c&aacute;c sản phẩm dưỡng ẩm cho người c&oacute; da dầu n&ecirc;n c&oacute; chiết xuất từ thi&ecirc;n nhi&ecirc;n, tr&aacute;i c&acirc;y, thảo mộc v&agrave; tr&aacute;nh c&aacute;c sản phẩm c&oacute; chứa nhiều dầu.</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div><img alt="Đi tìm sản phẩm dưỡng ẩm phù hợp với mọi loại da 1" h="566" lb="1" src="http://afamily1.vcmedia.vn/k:thumb_w/600/kpSuvmXqx4noKq8A1VybqYqOKmgtQZ/Image/2014/02/1a-0e81f/di-tim-san-pham-duong-am-phu-hop-voi-moi-loai-da.jpg" style="border:none;" title="Đi tìm sản phẩm dưỡng ẩm phù hợp với mọi loại da 1" w="850" /><br />\r\n<br />\r\n<img alt="Đi tìm sản phẩm dưỡng ẩm phù hợp với mọi loại da 2" h="534" lb="2" src="http://afamily1.vcmedia.vn/k:thumb_w/600/kpSuvmXqx4noKq8A1VybqYqOKmgtQZ/Image/2014/02/1b-0e81f/di-tim-san-pham-duong-am-phu-hop-voi-moi-loai-da.jpg" style="border:none;" title="Đi tìm sản phẩm dưỡng ẩm phù hợp với mọi loại da 2" w="800" /><br />\r\n&nbsp;</div>\r\n\r\n<div>\r\n<div>2. Da kh&ocirc;</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>M&ugrave;a đ&ocirc;ng v&agrave; tiết trời nồm l&agrave; khoảng thời gian &quot;khủng khiếp&quot; với những c&ocirc; n&agrave;ng da kh&ocirc;.Ch&iacute;nh v&igrave; thế, bạn cần t&iacute;ch cực sử dụng c&aacute;c loại kem dưỡng ẩm.B&ecirc;n cạnh việc chọn cho m&igrave;nh sữa tắm c&oacute; chứa nhiều kem, bạn cũng phải thoa body lotion đều đặn l&ecirc;n da ngay sau khi tắm để duy tr&igrave; độ ẩm cho da. Với những v&ugrave;ng da dễ bị kh&ocirc;, bong tr&oacute;c hơn cả như khuỷu tay, đầu gối,... bạn n&ecirc;n d&ugrave;ng th&ecirc;m body butter để chăm s&oacute;c v&agrave; l&agrave;m tăng độ ẩm. C&aacute;c sản phẩm dưỡng ẩm cho người da kh&ocirc; n&ecirc;n chứa nhiều chất b&eacute;o hoặc c&oacute; dạng sữa để cung cấp độ ẩm tối đa cho l&agrave;n da.</div>\r\n</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div><img alt="Đi tìm sản phẩm dưỡng ẩm phù hợp với mọi loại da 3" lb="3" src="http://afamily1.vcmedia.vn/k:kpSuvmXqx4noKq8A1VybqYqOKmgtQZ/Image/2014/02/2a-0e81f/di-tim-san-pham-duong-am-phu-hop-voi-moi-loai-da.jpg" style="border:none;" title="Đi tìm sản phẩm dưỡng ẩm phù hợp với mọi loại da 3" /><br />\r\n<br />\r\n<img alt="Đi tìm sản phẩm dưỡng ẩm phù hợp với mọi loại da 4" h="501" lb="4" src="http://afamily1.vcmedia.vn/k:thumb_w/600/kpSuvmXqx4noKq8A1VybqYqOKmgtQZ/Image/2014/02/2b-0e81f/di-tim-san-pham-duong-am-phu-hop-voi-moi-loai-da.jpg" style="border:none;" title="Đi tìm sản phẩm dưỡng ẩm phù hợp với mọi loại da 4" w="755" /><br />\r\n&nbsp;</div>\r\n\r\n<div>\r\n<div>3. Da hỗn hợp</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>Với những người sở hữu l&agrave;n da hỗn hợp th&igrave; c&aacute;c sản phẩm sữa tắm, kem dưỡng c&oacute; chiết xuất thi&ecirc;n nhi&ecirc;n với c&aacute;c th&agrave;nh phần dịu nhẹ sẽ l&agrave; lựa chọn ho&agrave;n hảo nhất.</div>\r\n</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div><img alt="Đi tìm sản phẩm dưỡng ẩm phù hợp với mọi loại da 5" h="531" lb="5" src="http://afamily1.vcmedia.vn/k:thumb_w/600/kpSuvmXqx4noKq8A1VybqYqOKmgtQZ/Image/2014/02/3-0e81f/di-tim-san-pham-duong-am-phu-hop-voi-moi-loai-da.jpg" style="border:none;" title="Đi tìm sản phẩm dưỡng ẩm phù hợp với mọi loại da 5" w="800" /><br />\r\n&nbsp;</div>\r\n\r\n<div>Một điều cần lưu &yacute; với những người c&oacute; da hỗn hợp, đ&oacute; l&agrave; họ thường xuất hiện nhiều dầu ở v&ugrave;ng chữ T, trong khi g&ograve; m&aacute; v&agrave; cổ lại rất kh&ocirc;.Vậy n&ecirc;n, trong th&agrave;nh phần sản phẩm dưỡng ẩm, bạn n&ecirc;n t&igrave;m loại c&oacute; chứa SPF tối thiểu l&agrave; 15 v&agrave; kh&ocirc;ng g&acirc;y mụn.&nbsp;</div>\r\n', 'Da dầu, da khô và da hỗn hợp, mỗi loại da lại có các dòng sản phẩm phù hợp nhất.', 46, '', '', '', 'published', 1, 1, 1, 1, 1, 0, 'post', '2014-02-25 19:57:12', '2014-02-25 19:57:12', '2014-02-25 21:41:29', NULL),
(78, 1, 0, 'tets sadf ádf', 'tets-sadf-adf', '<p>asd fasf asdf asfasd f<img src="/uploads/medias/2016/07/04/550x500/04.07.2016_bb_1467569778.png" style="padding: 10px 0; width: 500px; text-align: center" /></p>\r\n', 'asd fasf à ', 49, NULL, NULL, NULL, 'published', 1, 0, 0, 0, 0, 0, 'page', '0000-00-00 00:00:00', '2016-07-06 20:34:42', '2016-07-06 20:35:14', '2016-07-06 20:35:14'),
(79, 1, 0, 'fsd gsdfg sdf g', 'fsd-gsdfg-sdf-g', '<p>dsf gsdfg dsf g</p>\r\n', 'sd fgsdf gdsf g', 0, NULL, NULL, NULL, 'published', 1, 0, 0, 0, 0, 0, 'page', '0000-00-00 00:00:00', '2016-07-06 20:35:28', '2016-07-06 20:35:28', NULL),
(80, 1, 0, 'sà sf', 'sa-sf', '<p>&aacute; fas fa f</p>\r\n', 'á dfasf ', 0, NULL, NULL, NULL, 'published', 1, 0, 0, 0, 0, 0, 'intro', '0000-00-00 00:00:00', '2016-07-06 20:37:05', '2016-07-06 20:37:19', '2016-07-06 20:37:19'),
(81, 1, 0, 'Quá trình hình thành', 'qua-trinh-hinh-thanh', '<p style="margin: 0px 0px 10px; padding: 0px; line-height: normal; color: rgb(102, 102, 102); font-family: Verdana, Geneva, sans-serif; font-size: 10px;">Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</p>\r\n\r\n<p style="margin: 0px 0px 10px; padding: 0px; line-height: normal; color: rgb(102, 102, 102); font-family: Verdana, Geneva, sans-serif; font-size: 10px;">Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.</p>\r\n\r\n<p style="margin: 0px 0px 10px; padding: 0px; line-height: normal; color: rgb(102, 102, 102); font-family: Verdana, Geneva, sans-serif; font-size: 10px;">Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus.</p>\r\n\r\n<p style="margin: 0px 0px 10px; padding: 0px; line-height: normal; color: rgb(102, 102, 102); font-family: Verdana, Geneva, sans-serif; font-size: 10px;">Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet.</p>\r\n\r\n<p style="margin: 0px 0px 10px; padding: 0px; line-height: normal; color: rgb(102, 102, 102); font-family: Verdana, Geneva, sans-serif; font-size: 10px;">Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar,</p>\r\n', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 0, NULL, NULL, NULL, 'published', 1, 0, 0, 0, 0, 0, 'intro', '0000-00-00 00:00:00', '2016-07-09 19:12:07', '2016-07-09 19:12:07', NULL),
(82, 1, 0, 'Lĩnh vực hoạt động', 'linh-vuc-hoat-dong', '<p style="margin: 0px 0px 10px; padding: 0px; line-height: normal; color: rgb(102, 102, 102); font-family: Verdana, Geneva, sans-serif; font-size: 10px;">Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</p>\r\n\r\n<p style="margin: 0px 0px 10px; padding: 0px; line-height: normal; color: rgb(102, 102, 102); font-family: Verdana, Geneva, sans-serif; font-size: 10px;">Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.</p>\r\n\r\n<p style="margin: 0px 0px 10px; padding: 0px; line-height: normal; color: rgb(102, 102, 102); font-family: Verdana, Geneva, sans-serif; font-size: 10px;">Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus.</p>\r\n\r\n<p style="margin: 0px 0px 10px; padding: 0px; line-height: normal; color: rgb(102, 102, 102); font-family: Verdana, Geneva, sans-serif; font-size: 10px;">Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet.</p>\r\n', 'Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam ', 0, NULL, NULL, NULL, 'published', 1, 0, 0, 0, 0, 0, 'intro', '0000-00-00 00:00:00', '2016-07-09 19:12:48', '2016-07-09 19:12:48', NULL),
(83, 1, 0, 'Tiêu chí', 'tieu-chi', '<p style="margin: 0px 0px 10px; padding: 0px; line-height: normal; color: rgb(102, 102, 102); font-family: Verdana, Geneva, sans-serif; font-size: 10px;">Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.</p>\r\n\r\n<p style="margin: 0px 0px 10px; padding: 0px; line-height: normal; color: rgb(102, 102, 102); font-family: Verdana, Geneva, sans-serif; font-size: 10px;">Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus.</p>\r\n\r\n<p align="center"><img src="/uploads/medias/2016/07/11/550x500/11.07.2016_bb_1468173484.jpg" style="padding: 10px 0; width: 500px; text-align: center" /></p>\r\n\r\n<p style="margin: 0px 0px 10px; padding: 0px; line-height: normal; color: rgb(102, 102, 102); font-family: Verdana, Geneva, sans-serif; font-size: 10px;">Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet.</p>\r\n\r\n<p style="margin: 0px 0px 10px; padding: 0px; line-height: normal; color: rgb(102, 102, 102); font-family: Verdana, Geneva, sans-serif; font-size: 10px;">Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar,</p>\r\n', 'Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.', 54, NULL, NULL, NULL, 'published', 1, 0, 0, 0, 0, 0, 'intro', '0000-00-00 00:00:00', '2016-07-09 19:13:18', '2016-07-10 18:01:12', NULL),
(84, 1, 0, 'Thiết kế kiến trúc nội thất', 'thiet-ke-kien-truc-noi-that', '<div class="jqDnR" id="idTextPanel" style="margin: 0px; padding: 0px; position: relative; color: rgb(102, 102, 102); font-family: Verdana, Geneva, Helvetica, sans-serif; font-size: 11px; line-height: normal;">\r\n<p style="margin: 0px 0px 10px; padding: 0px; font-family: Verdana, Geneva, sans-serif; font-size: 10px;">Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.</p>\r\n\r\n<p style="margin: 0px 0px 10px; padding: 0px; font-family: Verdana, Geneva, sans-serif; font-size: 10px;">Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus.</p>\r\n\r\n<p style="margin: 0px 0px 10px; padding: 0px; font-family: Verdana, Geneva, sans-serif; font-size: 10px;">Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet.</p>\r\n\r\n<p style="margin: 0px 0px 10px; padding: 0px; font-family: Verdana, Geneva, sans-serif; font-size: 10px;">Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar,</p>\r\n\r\n<div>&nbsp;</div>\r\n</div>\r\n', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.', 0, NULL, NULL, NULL, 'published', 1, 0, 0, 0, 0, 0, 'service', '0000-00-00 00:00:00', '2016-07-09 19:14:49', '2016-07-09 19:14:49', NULL),
(85, 1, 0, 'Thi công Nội thất - Ngoại thất', 'thi-cong-noi-that-ngoai-that', '<p style="margin: 0px 0px 10px; padding: 0px; line-height: normal; color: rgb(102, 102, 102); font-family: Verdana, Geneva, sans-serif; font-size: 10px;">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>\r\n\r\n<p style="margin: 0px 0px 10px; padding: 0px; line-height: normal; color: rgb(102, 102, 102); font-family: Verdana, Geneva, sans-serif; font-size: 10px;">Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</p>\r\n\r\n<p style="margin: 0px 0px 10px; padding: 0px; line-height: normal; color: rgb(102, 102, 102); font-family: Verdana, Geneva, sans-serif; font-size: 10px;">Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.</p>\r\n\r\n<p style="margin: 0px 0px 10px; padding: 0px; line-height: normal; color: rgb(102, 102, 102); font-family: Verdana, Geneva, sans-serif; font-size: 10px;">Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus.</p>\r\n\r\n<p style="margin: 0px 0px 10px; padding: 0px; line-height: normal; color: rgb(102, 102, 102); font-family: Verdana, Geneva, sans-serif; font-size: 10px;">Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet.</p>\r\n', 'Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar,', 0, NULL, NULL, NULL, 'published', 1, 0, 0, 0, 0, 0, 'service', '0000-00-00 00:00:00', '2016-07-09 19:15:37', '2016-07-09 19:15:37', NULL),
(86, 1, 0, 'Đo đạc bản đồ', 'do-dac-ban-do', '<p><span style="color: rgb(102, 102, 102); font-family: Verdana, Geneva, sans-serif; font-size: 10px; line-height: normal;">Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</span></p>\r\n\r\n<p style="margin: 0px 0px 10px; padding: 0px; line-height: normal; color: rgb(102, 102, 102); font-family: Verdana, Geneva, sans-serif; font-size: 10px;">Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.</p>\r\n\r\n<p align="center"><img src="/uploads/medias/2016/07/10/550x500/10.07.2016_bb_1468093298.jpg" style="padding: 10px 0; width: 500px; text-align: center" /></p>\r\n\r\n<p style="margin: 0px 0px 10px; padding: 0px; line-height: normal; color: rgb(102, 102, 102); font-family: Verdana, Geneva, sans-serif; font-size: 10px;">Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus.</p>\r\n\r\n<p style="margin: 0px 0px 10px; padding: 0px; line-height: normal; color: rgb(102, 102, 102); font-family: Verdana, Geneva, sans-serif; font-size: 10px;">Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet.</p>\r\n', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.', 50, NULL, NULL, NULL, 'published', 1, 0, 0, 0, 0, 0, 'service', '0000-00-00 00:00:00', '2016-07-09 19:16:10', '2016-07-09 19:44:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE IF NOT EXISTS `post_tag` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=109 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post_tag`
--

INSERT INTO `post_tag` (`id`, `post_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(19, 6, 18, '2013-11-15 15:04:02', '2013-11-15 15:04:02'),
(18, 16, 19, '2013-11-15 15:01:37', '2013-11-15 15:01:37'),
(43, 31, 26, '2013-11-17 13:27:56', '2013-11-17 13:27:56'),
(42, 31, 24, '2013-11-17 13:27:56', '2013-11-17 13:27:56'),
(41, 31, 23, '2013-11-17 13:27:56', '2013-11-17 13:27:56'),
(40, 31, 20, '2013-11-17 13:27:56', '2013-11-17 13:27:56'),
(39, 31, 21, '2013-11-17 13:27:56', '2013-11-17 13:27:56'),
(54, 45, 26, '2013-12-12 15:17:01', '2013-12-12 15:17:01'),
(53, 45, 25, '2013-12-12 15:17:01', '2013-12-12 15:17:01'),
(52, 45, 13, '2013-12-12 15:17:01', '2013-12-12 15:17:01'),
(27, 42, 26, '2013-11-17 10:03:36', '2013-11-17 10:03:36'),
(38, 31, 22, '2013-11-17 13:27:56', '2013-11-17 13:27:56'),
(34, 33, 26, '2013-11-17 10:11:10', '2013-11-17 10:11:10'),
(35, 29, 26, '2013-11-17 10:11:30', '2013-11-17 10:11:30'),
(37, 46, 27, '2013-11-17 13:15:01', '2013-11-17 13:15:01'),
(44, 49, 26, '2013-11-17 14:50:32', '2013-11-17 14:50:32'),
(45, 49, 27, '2013-11-17 14:50:32', '2013-11-17 14:50:32'),
(46, 48, 27, '2013-11-17 14:50:43', '2013-11-17 14:50:43'),
(47, 47, 28, '2013-11-17 14:51:23', '2013-11-17 14:51:23'),
(48, 47, 27, '2013-11-17 14:51:23', '2013-11-17 14:51:23'),
(49, 47, 29, '2013-11-17 14:51:23', '2013-11-17 14:51:23'),
(50, 51, 26, '2013-12-06 04:04:08', '2013-12-06 04:04:08'),
(57, 41, 26, '2013-12-14 13:53:36', '2013-12-14 13:53:36'),
(58, 41, 13, '2013-12-14 13:53:36', '2013-12-14 13:53:36'),
(59, 38, 26, '2013-12-14 13:53:53', '2013-12-14 13:53:53'),
(105, 56, 33, '2013-12-23 02:05:17', '2013-12-23 02:05:17'),
(104, 56, 32, '2013-12-23 02:05:17', '2013-12-23 02:05:17'),
(103, 56, 0, '2013-12-23 02:05:17', '2013-12-23 02:05:17'),
(78, 58, 34, '2013-12-23 01:14:57', '2013-12-23 01:14:57'),
(79, 58, 35, '2013-12-23 01:14:57', '2013-12-23 01:14:57'),
(80, 58, 36, '2013-12-23 01:14:57', '2013-12-23 01:14:57'),
(81, 59, 37, '2013-12-23 01:16:39', '2013-12-23 01:16:39'),
(82, 59, 38, '2013-12-23 01:16:39', '2013-12-23 01:16:39'),
(83, 59, 34, '2013-12-23 01:16:39', '2013-12-23 01:16:39'),
(84, 60, 39, '2013-12-23 01:18:07', '2013-12-23 01:18:07'),
(85, 60, 40, '2013-12-23 01:18:07', '2013-12-23 01:18:07'),
(86, 61, 41, '2013-12-23 01:19:50', '2013-12-23 01:19:50'),
(87, 61, 42, '2013-12-23 01:19:50', '2013-12-23 01:19:50'),
(88, 62, 43, '2013-12-23 01:22:02', '2013-12-23 01:22:02'),
(89, 62, 44, '2013-12-23 01:22:02', '2013-12-23 01:22:02'),
(101, 63, 46, '2013-12-23 02:05:08', '2013-12-23 02:05:08'),
(100, 63, 45, '2013-12-23 02:05:08', '2013-12-23 02:05:08'),
(99, 63, 0, '2013-12-23 02:05:08', '2013-12-23 02:05:08'),
(93, 64, 48, '2013-12-23 01:25:14', '2013-12-23 01:25:14'),
(94, 64, 49, '2013-12-23 01:25:14', '2013-12-23 01:25:14'),
(95, 66, 0, '2013-12-23 01:31:30', '2013-12-23 01:31:30'),
(96, 66, 50, '2013-12-23 01:31:30', '2013-12-23 01:31:30'),
(107, 67, 51, '2014-02-25 19:53:31', '2014-02-25 19:53:31'),
(106, 67, 0, '2014-02-25 19:53:31', '2014-02-25 19:53:31'),
(102, 63, 47, '2013-12-23 02:05:08', '2013-12-23 02:05:08'),
(108, 67, 37, '2014-02-25 19:53:31', '2014-02-25 19:53:31');

-- --------------------------------------------------------

--
-- Table structure for table `royalties`
--

CREATE TABLE IF NOT EXISTS `royalties` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_type` varchar(10) NOT NULL DEFAULT 'post' COMMENT 'post, answer...',
  `user_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `royalty` int(11) NOT NULL,
  `tax` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `received` tinyint(1) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL,
  `key` varchar(50) NOT NULL,
  `value` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM AUTO_INCREMENT=86 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `updated_at`, `created_at`) VALUES
(81, 'maintain_info', 'asdasd', '2016-07-06 21:08:36', '0000-00-00 00:00:00'),
(80, 'maintain_mode', 'no', '2016-07-06 21:08:36', '0000-00-00 00:00:00'),
(79, 'language', 'vi', '2016-07-06 21:08:36', '0000-00-00 00:00:00'),
(78, 'admin_email', 'dungdn@dungdn.com', '2016-07-06 21:08:36', '0000-00-00 00:00:00'),
(77, 'site_url', 'http://pi-vn.com', '2016-07-06 21:08:36', '0000-00-00 00:00:00'),
(76, 'site_info', 'Công ty TNHH Kiến Trúc và Công Nghệ Pi Việt Nam', '2016-07-06 21:08:36', '0000-00-00 00:00:00'),
(75, 'sitename', 'Công ty TNHH Kiến Trúc và Công Nghệ Pi Việt Nam', '2016-07-06 21:08:36', '0000-00-00 00:00:00'),
(82, 'keywords', '', '2016-07-06 21:08:36', '0000-00-00 00:00:00'),
(83, 'active_date', '', '2016-07-06 21:08:36', '0000-00-00 00:00:00'),
(84, 'currency', '₫', '2016-07-06 21:08:36', '0000-00-00 00:00:00'),
(85, 'productperpage', '10', '2016-07-06 21:08:36', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'tag',
  `status` varchar(5) NOT NULL DEFAULT 'on',
  `news_count` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`, `type`, `status`, `news_count`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Chống tham nhũng', 'chong-tham-nhung', 'topic', 'on', 0, 1, '2013-09-23 02:26:53', '2013-09-22 19:26:53'),
(2, 'thời gian c&ocirc;ng sở m&ugrave;a đ&ocirc;ng', 'thoi-gian-cong-so-mua-dong', 'topic', 'on', 0, 1, '2013-09-22 21:52:56', '2013-09-22 21:52:56'),
(3, 'Sao lộ h&agrave;ng', 'sao-lo-hang', 'topic', 'on', 0, 1, '2013-09-22 21:53:56', '2013-09-22 21:53:56'),
(4, 'Đời thừa', 'doi-thua', 'tag', 'on', 0, 1, '2013-09-24 14:23:42', '2013-09-24 14:23:42'),
(16, 'Thật không thế', 'that-khong-the', 'tag', 'on', 0, 1, '2013-09-24 17:06:02', '2013-09-24 17:06:02'),
(6, 'Mai Hương', 'mai-huong', 'tag', 'on', 0, 1, '2013-09-24 14:51:35', '2013-09-24 14:51:35'),
(17, 'đùa thôi :D', 'dua-thoi-d', 'tag', 'on', 0, 1, '2013-09-24 17:06:07', '2013-09-24 17:06:07'),
(8, 'timtrueman', 'timtrueman', 'tag', 'on', 0, 1, '2013-09-24 16:11:49', '2013-09-24 16:11:49'),
(10, 'dờ cờ mờ', 'do-co-mo', 'tag', 'on', 0, 1, '2013-09-24 16:55:59', '2013-09-24 16:55:59'),
(15, 'Ngon tuyệt phẩm', 'ngon-tuyet-pham', 'tag', 'on', 0, 1, '2013-09-24 17:05:56', '2013-09-24 17:05:56'),
(14, 'bia Hà Nội', 'bia-ha-noi', 'tag', 'on', 0, 1, '2013-09-24 17:05:50', '2013-09-24 17:05:50'),
(13, 'vì bé yêu', 'vi-be-yeu', 'tag', 'on', 0, 1, '2013-09-24 16:58:45', '2013-09-24 16:58:45'),
(18, 'dọa con', 'doa-con', 'tag', 'on', 0, 1, '2013-09-29 20:08:03', '2013-09-29 20:08:03'),
(19, 'ăn sáng', 'an-sang', 'tag', 'on', 0, 1, '2013-09-29 20:41:19', '2013-09-29 20:41:19'),
(20, 'đi nhà trẻ sớm', 'di-nha-tre-som', 'tag', 'on', 0, 1, '2013-10-03 04:28:29', '2013-10-03 04:28:29'),
(21, 'nhà trẻ', 'nha-tre', 'tag', 'on', 0, 1, '2013-10-03 04:28:45', '2013-10-03 04:28:45'),
(22, 'trường mẫu giáo', 'truong-mau-giao', 'tag', 'on', 0, 1, '2013-10-03 04:28:50', '2013-10-03 04:28:50'),
(23, 'bà mẹ trẻ', 'ba-me-tre', 'tag', 'on', 0, 1, '2013-10-03 06:00:03', '2013-10-03 06:00:03'),
(24, 'con nhỏ', 'con-nho', 'tag', 'on', 0, 1, '2013-10-03 06:00:10', '2013-10-03 06:00:10'),
(25, 'xì nước bọt', 'xi-nuoc-bot', 'tag', 'on', 0, 1, '2013-11-17 10:01:34', '2013-11-17 10:01:34'),
(26, 'dockids', 'dockids', 'tag', 'on', 0, 1, '2013-11-17 10:02:11', '2013-11-17 10:02:11'),
(27, 'bé yêu', 'be-yeu', 'tag', 'on', 0, 1, '2013-11-17 13:14:40', '2013-11-17 13:14:40'),
(28, 'vợ đoảng', 'vo-doang', 'tag', 'on', 0, 1, '2013-11-17 14:51:01', '2013-11-17 14:51:01'),
(29, 'con hư', 'con-hu', 'tag', 'on', 0, 1, '2013-11-17 14:51:10', '2013-11-17 14:51:10'),
(30, 'rượu giả', 'ruou-gia', 'tag', 'on', 0, 1, '2013-12-11 03:24:35', '2013-12-11 03:24:35'),
(31, 'abc abc', 'abc-abc', 'topic', 'on', 0, 1, '2013-12-21 09:08:47', '2013-12-21 09:08:47'),
(32, 'thương mại điện tử', 'thuong-mai-dien-tu', 'tag', 'on', 0, 1, '2013-12-23 01:07:25', '2013-12-23 01:07:25'),
(33, 'mẹ và bé', 'me-va-be', 'tag', 'on', 0, 1, '2013-12-23 01:07:32', '2013-12-23 01:07:32'),
(34, 'ott', 'ott', 'tag', 'on', 0, 1, '2013-12-23 01:14:39', '2013-12-23 01:14:39'),
(35, 'nhà mạng', 'nha-mang', 'tag', 'on', 0, 1, '2013-12-23 01:14:47', '2013-12-23 01:14:47'),
(36, 'vng', 'vng', 'tag', 'on', 0, 1, '2013-12-23 01:14:52', '2013-12-23 01:14:52'),
(37, 'facebook', 'facebook', 'tag', 'on', 0, 1, '2013-12-23 01:16:04', '2013-12-23 01:16:04'),
(38, 'google hangouts', 'google-hangouts', 'tag', 'on', 0, 1, '2013-12-23 01:16:10', '2013-12-23 01:16:10'),
(39, 'báo giấy', 'bao-giay', 'tag', 'on', 0, 1, '2013-12-23 01:18:01', '2013-12-23 01:18:01'),
(40, 'báo điện tử', 'bao-dien-tu', 'tag', 'on', 0, 1, '2013-12-23 01:18:04', '2013-12-23 01:18:04'),
(41, 'The Internship', 'the-internship', 'tag', 'on', 0, 1, '2013-12-23 01:19:36', '2013-12-23 01:19:36'),
(42, 'google', 'google', 'tag', 'on', 0, 1, '2013-12-23 01:19:38', '2013-12-23 01:19:38'),
(43, 'ngôn ngữ lập trình', 'ngon-ngu-lap-trinh', 'tag', 'on', 0, 1, '2013-12-23 01:21:54', '2013-12-23 01:21:54'),
(44, 'lập trình', 'lap-trinh', 'tag', 'on', 0, 1, '2013-12-23 01:21:56', '2013-12-23 01:21:56'),
(45, 'smartphone', 'smartphone', 'tag', 'on', 0, 1, '2013-12-23 01:23:12', '2013-12-23 01:23:12'),
(46, 'quà tặng', 'qua-tang', 'tag', 'on', 0, 1, '2013-12-23 01:23:19', '2013-12-23 01:23:19'),
(47, 'lễ tết', 'le-tet', 'tag', 'on', 0, 1, '2013-12-23 01:23:22', '2013-12-23 01:23:22'),
(48, 'Victoria’s Secret', 'victorias-secret', 'tag', 'on', 0, 1, '2013-12-23 01:24:24', '2013-12-23 01:24:24'),
(49, 'Roy Raymond', 'roy-raymond', 'tag', 'on', 0, 1, '2013-12-23 01:24:32', '2013-12-23 01:24:32'),
(50, 'startup việt', 'startup-viet', 'tag', 'on', 0, 1, '2013-12-23 01:31:27', '2013-12-23 01:31:27'),
(51, 'instagram', 'instagram', 'tag', 'on', 0, 1, '2013-12-23 01:34:37', '2013-12-23 01:34:37');

-- --------------------------------------------------------

--
-- Table structure for table `tag_post`
--

CREATE TABLE IF NOT EXISTS `tag_post` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tag_post`
--

INSERT INTO `tag_post` (`id`, `post_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(2, 3, 1, '2013-09-22 21:38:25', '2013-09-22 21:38:25'),
(5, 1, 1, '2013-09-22 23:00:13', '2013-09-22 23:00:13'),
(6, 33, 1, '2013-10-06 18:24:37', '2013-10-06 18:24:37'),
(7, 32, 1, '2013-10-06 18:24:37', '2013-10-06 18:24:37'),
(8, 31, 1, '2013-10-06 18:24:37', '2013-10-06 18:24:37'),
(9, 47, 1, '2013-12-21 09:07:06', '2013-12-21 09:07:06'),
(10, 46, 1, '2013-12-21 09:07:06', '2013-12-21 09:07:06'),
(11, 53, 1, '2013-12-21 09:07:12', '2013-12-21 09:07:12'),
(12, 52, 1, '2013-12-21 09:07:12', '2013-12-21 09:07:12'),
(15, 52, 31, '2013-12-21 09:27:59', '2013-12-21 09:27:59'),
(16, 53, 31, '2013-12-21 09:28:06', '2013-12-21 09:28:06'),
(17, 52, 31, '2013-12-21 09:28:06', '2013-12-21 09:28:06'),
(18, 48, 31, '2013-12-21 09:30:04', '2013-12-21 09:30:04'),
(19, 47, 31, '2013-12-21 09:30:04', '2013-12-21 09:30:04');

-- --------------------------------------------------------

--
-- Table structure for table `throttle`
--

CREATE TABLE IF NOT EXISTS `throttle` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attempts` int(11) NOT NULL DEFAULT '0',
  `suspended` tinyint(1) NOT NULL DEFAULT '0',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `last_attempt_at` timestamp NULL DEFAULT NULL,
  `suspended_at` timestamp NULL DEFAULT NULL,
  `banned_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `throttle`
--

INSERT INTO `throttle` (`id`, `user_id`, `ip_address`, `attempts`, `suspended`, `banned`, `last_attempt_at`, `suspended_at`, `banned_at`) VALUES
(2, 3, '127.0.0.1', 0, 0, 0, NULL, NULL, NULL),
(3, 1, '127.0.0.1', 0, 0, 0, NULL, NULL, NULL),
(4, 4, '127.0.0.1', 0, 0, 0, NULL, NULL, NULL),
(5, 5, '127.0.0.1', 0, 0, 0, NULL, NULL, NULL),
(6, 6, '127.0.0.1', 0, 0, 0, NULL, NULL, NULL),
(7, 7, '127.0.0.1', 0, 0, 0, NULL, NULL, NULL),
(8, 8, '127.0.0.1', 0, 0, 0, NULL, NULL, NULL),
(9, 9, '127.0.0.1', 0, 0, 0, NULL, NULL, NULL),
(10, 10, '127.0.0.1', 0, 0, 0, NULL, NULL, NULL),
(11, 11, '127.0.0.1', 0, 0, 0, NULL, NULL, NULL),
(12, 12, NULL, 0, 0, 0, NULL, NULL, NULL),
(13, 13, '127.0.0.1', 0, 0, 0, NULL, NULL, NULL),
(14, 14, '127.0.0.1', 0, 0, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `hometown` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `phone_cog` tinyint(1) NOT NULL DEFAULT '1',
  `birth_day` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `birth_month` int(2) NOT NULL,
  `birth_year` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `fb_user` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fb_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `fb_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `place_id` int(11) NOT NULL,
  `bio` text COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `activation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `persist_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reset_password_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `has_msg` tinyint(1) NOT NULL DEFAULT '0',
  `follows` int(11) NOT NULL,
  `is_doctor` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `avatar`, `username`, `gender`, `hometown`, `phone`, `phone_cog`, `birth_day`, `birth_month`, `birth_year`, `fb_user`, `fb_id`, `fb_link`, `location`, `place_id`, `bio`, `password`, `permissions`, `activated`, `activation_code`, `activated_at`, `last_login`, `persist_code`, `reset_password_code`, `first_name`, `last_name`, `has_msg`, `follows`, `is_doctor`, `created_at`, `updated_at`, `deleted_at`, `website`, `country`, `gravatar`) VALUES
(1, 'dungdn@dungdn.com', '17.11.2013_bb_1384635439.jpg', 'dungdn', 'male', '', '0903201241', 1, '12', 6, '1961', 'binhbeervn', '100004513421116', 'https://www.facebook.com/binhbeervn', 'Hanoi, Vietnam', 61, '', '$2y$10$qKxYZnG7OfD8K3wimRuIq.Sfvxl4H91xYrVocQqTyIJh95miQqDHS', '{"admin":1,"user":1,"user.doctor":1}', 1, NULL, NULL, '2016-07-09 18:57:28', '$2y$10$VgJvIibpuXKHprAqcJUTY.Mo0XzDZAcPhKP9HRJimvhuh3qAbyCIW', NULL, 'Dung', 'Dinh', 0, 0, 0, '2013-09-11 13:37:00', '2016-07-09 18:57:28', NULL, 'http://taymay.vn', 'Viet Nam', ''),
(2, 'blacksheep@example.com', '', '', '', '', '', 1, '', 0, '', '', '0', '', '', 0, '', '$2y$10$3oMfmNfE9eYo496zd/Z71.jPbsbYNNRs9or6lwgEFdD7qlnxnMede', '{"superuser":-1}', 1, NULL, NULL, NULL, NULL, NULL, 'Black', 'Sheep', 0, 0, 0, '2013-09-11 13:37:00', '2016-07-03 18:00:06', '2016-07-03 18:00:06', NULL, NULL, NULL),
(9, 'member@gmail.com', '17.11.2013_bb_1384682295.jpg', 'caoxuan', '', '', '', 1, '', 0, '', '', '0', '', '', 0, '', '$2y$10$0iqNeia/aHfmt.rUMWOWEOVbqOfKtKtcssemAcVAfUqYapevsufcq', NULL, 1, 'nYboHvVdn2hUrBfGnvsnw6rS5vVm5vXkna62O0X7u0', NULL, '2013-11-17 02:56:33', '$2y$10$1.aWWnKI8MYw3eZuEkbojeW3sUjx..aTEBUsPf.K1LRLml1kwTDz.', NULL, 'Cao', NULL, 0, 0, 0, '2013-11-17 02:55:32', '2016-07-03 18:00:08', '2016-07-03 18:00:08', NULL, NULL, NULL),
(10, 'member3@gmail.com', '17.11.2013_bb_1384682725.jpg', 'member2', '', '', '', 1, '', 0, '', '', '0', '', '', 0, '', '$2y$10$o59zbwoeU.BIo5wAnBQ45OyqxGaPF9.td6UroZVHQQHx5ZnP4y3T6', NULL, 1, 'V1eiBv0REsGYi297JGmd9C0GXzW7gvKd37C8H1zzWv', NULL, '2013-11-17 03:04:27', '$2y$10$ZCFN2xwOXy7Qn5diExIszOUMZaWmpUFDbsmPODqB/qxPW6qfjStGi', NULL, 'Xuân', NULL, 0, 0, 0, '2013-11-17 03:04:10', '2016-07-03 18:00:10', '2016-07-03 18:00:10', NULL, NULL, NULL),
(11, 'member4@gmail.com', '17.11.2013_bb_1384683706.jpg', 'member4', '', '', '', 1, '', 0, '', '', '0', '', '', 0, '', '$2y$10$8NAmhW.svgvkGIUoINBhveHi758qWKSA42DG45FXR31P4usl3rnSW', NULL, 1, 'Gh0XDnrN6lUyT1iE59bY5YcQvcq8NXttfIp2epXsgM', NULL, '2013-11-17 03:20:44', '$2y$10$TxYpkOo133urc3thKOWzuuF8LCjpCQBFAu8GdkdyyTlfNJnJTobN6', NULL, 'Hương', NULL, 1, 0, 0, '2013-11-17 03:20:33', '2016-07-03 18:00:11', '2016-07-03 18:00:11', NULL, NULL, NULL),
(13, 'phongvien@gmail.com', '', '', '', '', '', 1, '', 0, '', '', '', '', '', 0, '', '$2y$10$JTbSJFilQlK7QtmJvjKyiOUkRBkqOgpb92Ga/ItfkiH.42BAOd8na', '', 1, NULL, NULL, '2013-12-11 11:40:59', '$2y$10$7omPDmkNBp5SZz2.LLO4v.VTkvniSUWHtfJAgyjJSH3/yhQ74Un4C', NULL, 'Phóng', 'Viên', 0, 0, 0, '2013-12-11 11:40:30', '2016-07-03 18:00:13', '2016-07-03 18:00:13', NULL, NULL, NULL),
(14, 'admin@pi-vn.com', '', 'admin', '', '', '', 1, '', 0, '', '', '', '', '', 0, '', '$2y$10$J1mimaKnIcy4eTo7//UGFOdQVukHUX7EMB9W.QMGczyXsCULO.tXy', '{"admin":1}', 1, NULL, NULL, '2016-07-11 03:14:27', '$2y$10$4Tcb1o.PGQ2AkqpWEijcMu7esYK7S1nvFs.Iygue7wCHf5VFe.8Su', NULL, 'pi-vn', 'admin', 0, 0, 0, '2016-07-11 03:13:32', '2016-07-11 03:14:27', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `user_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`user_id`, `group_id`) VALUES
(1, 1),
(1, 4),
(1, 5),
(14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_follow`
--

CREATE TABLE IF NOT EXISTS `user_follow` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `follow_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_place`
--

CREATE TABLE IF NOT EXISTS `user_place` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `widgets`
--

CREATE TABLE IF NOT EXISTS `widgets` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `form` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `widgets`
--

INSERT INTO `widgets` (`id`, `name`, `form`, `description`, `updated_at`, `created_at`) VALUES
(1, 'Contact', 'contact', 'Liên hệ (form)', '2014-03-10 10:20:53', '2014-03-09 10:00:00'),
(2, 'HTML', 'html', 'Hiển thị nội dung văn bản', '2014-03-10 11:21:35', '2014-03-09 10:00:00'),
(3, 'Google Maps', 'map', 'hiển thị bản đồ', '2014-03-10 10:20:22', '0000-00-00 00:00:00'),
(4, 'Votes', 'vote', 'Thăm dò ý kiến', '2014-03-10 10:20:22', '2014-03-09 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `widgets_refs`
--

CREATE TABLE IF NOT EXISTS `widgets_refs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `item_id` int(11) NOT NULL,
  `widget_id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `position` tinyint(2) NOT NULL,
  `content` text NOT NULL,
  `status` varchar(5) NOT NULL DEFAULT 'open',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `widgets_refs`
--

INSERT INTO `widgets_refs` (`id`, `title`, `item_id`, `widget_id`, `type`, `position`, `content`, `status`, `created_at`, `updated_at`) VALUES
(29, '', 76, 1, 'post', 0, '', 'open', '2014-03-10 20:59:04', '2014-03-10 20:59:04'),
(23, '', 76, 2, 'post', 2, '{"id":"23","title":"","showtitle":"no","content":"","status":"open","submit":"C\\u1eadp nh\\u1eadt"}', 'open', '2014-03-10 20:04:54', '2014-03-10 20:58:58'),
(24, '', 76, 3, 'post', 1, '{"id":"24","title":"","showtitle":"no","location":"","zoom":"1","maptype":"HYBRID","width":"","height":"","content":"","status":"open","submit":"C\\u1eadp nh\\u1eadt"}', 'open', '2014-03-10 20:18:30', '2014-03-10 20:58:58'),
(28, '', 76, 4, 'post', 0, '', 'open', '2014-03-10 20:59:02', '2014-03-10 20:59:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_attributes`
--
ALTER TABLE `cart_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_categories`
--
ALTER TABLE `cart_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_category_product`
--
ALTER TABLE `cart_category_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_orders`
--
ALTER TABLE `cart_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_order_product`
--
ALTER TABLE `cart_order_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_products`
--
ALTER TABLE `cart_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_product_attribute`
--
ALTER TABLE `cart_product_attribute`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_product_media`
--
ALTER TABLE `cart_product_media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cat_con_unique` (`product_id`,`media_id`),
  ADD KEY `category_content_content_id_foreign` (`media_id`);

--
-- Indexes for table `cart_product_tag`
--
ALTER TABLE `cart_product_tag`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cat_con_unique` (`product_id`,`tag_id`),
  ADD KEY `category_content_content_id_foreign` (`tag_id`);

--
-- Indexes for table `cart_reviews`
--
ALTER TABLE `cart_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_post`
--
ALTER TABLE `category_post`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cat_con_unique` (`category_id`,`post_id`),
  ADD KEY `category_content_content_id_foreign` (`post_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `user_one` (`user_one`),
  ADD KEY `user_two` (`user_two`);

--
-- Indexes for table `conversation_reply`
--
ALTER TABLE `conversation_reply`
  ADD PRIMARY KEY (`cr_id`),
  ADD KEY `user_id_fk` (`user_id_fk`),
  ADD KEY `c_id_fk` (`c_id_fk`);

--
-- Indexes for table `email_queue`
--
ALTER TABLE `email_queue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `groups_name_unique` (`name`);

--
-- Indexes for table `medias`
--
ALTER TABLE `medias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_links`
--
ALTER TABLE `menu_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `royalties`
--
ALTER TABLE `royalties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag_post`
--
ALTER TABLE `tag_post`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `throttle`
--
ALTER TABLE `throttle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`user_id`,`group_id`);

--
-- Indexes for table `user_follow`
--
ALTER TABLE `user_follow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_place`
--
ALTER TABLE `user_place`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `widgets`
--
ALTER TABLE `widgets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `widgets_refs`
--
ALTER TABLE `widgets_refs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_attributes`
--
ALTER TABLE `cart_attributes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `cart_categories`
--
ALTER TABLE `cart_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `cart_category_product`
--
ALTER TABLE `cart_category_product`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=97;
--
-- AUTO_INCREMENT for table `cart_orders`
--
ALTER TABLE `cart_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `cart_order_product`
--
ALTER TABLE `cart_order_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `cart_products`
--
ALTER TABLE `cart_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `cart_product_attribute`
--
ALTER TABLE `cart_product_attribute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `cart_product_media`
--
ALTER TABLE `cart_product_media`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `cart_product_tag`
--
ALTER TABLE `cart_product_tag`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `cart_reviews`
--
ALTER TABLE `cart_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `category_post`
--
ALTER TABLE `category_post`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=520;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `conversation_reply`
--
ALTER TABLE `conversation_reply`
  MODIFY `cr_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `email_queue`
--
ALTER TABLE `email_queue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `medias`
--
ALTER TABLE `medias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `menu_links`
--
ALTER TABLE `menu_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT for table `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=109;
--
-- AUTO_INCREMENT for table `royalties`
--
ALTER TABLE `royalties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `tag_post`
--
ALTER TABLE `tag_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `throttle`
--
ALTER TABLE `throttle`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `user_follow`
--
ALTER TABLE `user_follow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_place`
--
ALTER TABLE `user_place`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `widgets`
--
ALTER TABLE `widgets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `widgets_refs`
--
ALTER TABLE `widgets_refs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
