-- phpMyAdmin SQL Dump
-- version 4.4.9
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jul 11, 2016 at 06:54 PM
-- Server version: 5.5.42
-- PHP Version: 5.5.26

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

CREATE TABLE `cart_attributes` (
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

CREATE TABLE `cart_categories` (
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

CREATE TABLE `cart_category_product` (
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

CREATE TABLE `cart_orders` (
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

CREATE TABLE `cart_order_product` (
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

CREATE TABLE `cart_products` (
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

CREATE TABLE `cart_product_attribute` (
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

CREATE TABLE `cart_product_media` (
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

CREATE TABLE `cart_product_tag` (
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

CREATE TABLE `cart_reviews` (
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

CREATE TABLE `categories` (
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
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `slug`, `showon_menu`, `showon_homepage`, `list_layout`, `item_layout`, `post_count`, `status`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(27, 0, 'Nội thất chung cư', 'noi-that-chung-cu', 1, 1, NULL, NULL, 0, 'on', 1, '2016-07-11 11:49:58', '2016-07-11 11:49:58', NULL),
(26, 0, 'Tin tức', 'tin-tuc', 2, 2, NULL, NULL, 0, 'on', 1, '2016-07-11 11:49:31', '2016-07-11 11:49:31', NULL),
(25, 0, 'Công trình', 'cong-trinh', 1, 1, NULL, NULL, 0, 'on', 1, '2016-07-11 11:49:15', '2016-07-11 11:49:15', NULL),
(28, 0, 'Nội thất nhà ở', 'noi-that-nha-o', 2, 2, NULL, NULL, 0, 'on', 1, '2016-07-11 11:50:08', '2016-07-11 11:50:08', NULL),
(29, 0, 'Kiến trúc nhà ở', 'kien-truc-nha-o', 3, 3, NULL, NULL, 0, 'on', 1, '2016-07-11 11:50:27', '2016-07-11 11:50:27', NULL),
(30, 0, 'Văn phòng & Showroom', 'van-phong-showroom', 4, 4, NULL, NULL, 0, 'on', 1, '2016-07-11 11:50:47', '2016-07-11 11:50:47', NULL),
(31, 0, 'Bar & Nhà hàng', 'bar-nha-hang', 4, 4, NULL, NULL, 0, 'on', 1, '2016-07-11 11:51:03', '2016-07-11 11:51:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_post`
--

CREATE TABLE `category_post` (
  `id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `post_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=520 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
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

CREATE TABLE `conversations` (
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

CREATE TABLE `conversation_reply` (
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

CREATE TABLE `email_queue` (
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

CREATE TABLE `groups` (
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

CREATE TABLE `medias` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `mpath` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
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

CREATE TABLE `menu_links` (
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

CREATE TABLE `migrations` (
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

CREATE TABLE `newsletters` (
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

CREATE TABLE `places` (
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

CREATE TABLE `posts` (
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

CREATE TABLE `post_tag` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=109 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `royalties`
--

CREATE TABLE `royalties` (
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

CREATE TABLE `settings` (
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

CREATE TABLE `tags` (
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

CREATE TABLE `tag_post` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `throttle`
--

CREATE TABLE `throttle` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attempts` int(11) NOT NULL DEFAULT '0',
  `suspended` tinyint(1) NOT NULL DEFAULT '0',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `last_attempt_at` timestamp NULL DEFAULT NULL,
  `suspended_at` timestamp NULL DEFAULT NULL,
  `banned_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(14, 14, '127.0.0.1', 0, 0, 0, NULL, NULL, NULL),
(15, 1, '::1', 0, 0, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
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
(1, 'dungdn@dungdn.com', '17.11.2013_bb_1384635439.jpg', 'dungdn', 'male', '', '0903201241', 1, '12', 6, '1961', 'binhbeervn', '100004513421116', 'https://www.facebook.com/binhbeervn', 'Hanoi, Vietnam', 61, '', '$2y$10$qKxYZnG7OfD8K3wimRuIq.Sfvxl4H91xYrVocQqTyIJh95miQqDHS', '{"admin":1,"user":1,"user.doctor":1}', 1, NULL, NULL, '2016-07-11 11:47:32', '$2y$10$9yhW2goQYqfrij7gYePyduoefLGl1lSslZtW2PcaaxIE5PXomje7a', NULL, 'Dung', 'Dinh', 0, 0, 0, '2013-09-11 13:37:00', '2016-07-11 11:47:32', NULL, 'http://taymay.vn', 'Viet Nam', ''),
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

CREATE TABLE `users_groups` (
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

CREATE TABLE `user_follow` (
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

CREATE TABLE `user_place` (
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

CREATE TABLE `widgets` (
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

CREATE TABLE `widgets_refs` (
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
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
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
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
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
