-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 21, 2024 at 04:33 PM
-- Server version: 5.7.44
-- PHP Version: 8.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dahleezexhibitio_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'Admin', 'admin@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `post_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `location` text NOT NULL,
  `blogger_name` varchar(50) NOT NULL,
  `post` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `date_added` datetime NOT NULL,
  `metatitle` varchar(500) NOT NULL,
  `metadescription` varchar(500) NOT NULL,
  `metakeywords` varchar(500) NOT NULL,
  `category` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `post_title`, `link`, `image`, `location`, `blogger_name`, `post`, `status`, `date_added`, `metatitle`, `metadescription`, `metakeywords`, `category`) VALUES
(14, 'test', 'test', 'speaker_img42.jpg', '', '', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,&nbsp;but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,and more recently with desktop publishing software like Aldus PageMaker including versions of&nbsp;Lorem Ipsum.</p>\r\n', 1, '2024-04-18 00:00:00', 'test', 'test', 'test', 'seo-development-company'),
(15, 'There Are Many Variations Of Passages Of Available But Majority', 'there-are-many-variations-of-passages-of-available', 'about-carousel-211.jpg', '', '', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,&nbsp;but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,and more recently with desktop publishing software like Aldus PageMaker including versions of&nbsp;Lorem Ipsum.</p>\r\n', 1, '2024-05-25 00:00:00', 'test meta title', 'metadescription', 'dgd gdg sdfgsfdhb fdhgdf gdfg dfgfg ag', '');

-- --------------------------------------------------------

--
-- Table structure for table `booked-stalls`
--

CREATE TABLE `booked-stalls` (
  `id` int(11) NOT NULL,
  `stall_number` int(11) NOT NULL,
  `exhibition_id` int(11) NOT NULL,
  `stall_id` int(11) NOT NULL,
  `booking_date` text NOT NULL,
  `price` varchar(500) NOT NULL,
  `user_id` int(11) NOT NULL,
  `wallet` varchar(500) DEFAULT '0',
  `booked_by` varchar(500) NOT NULL DEFAULT 'user',
  `is_booked` varchar(500) NOT NULL,
  `modeofpayment` varchar(500) NOT NULL DEFAULT 'online',
  `remark` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booked-stalls`
--

INSERT INTO `booked-stalls` (`id`, `stall_number`, `exhibition_id`, `stall_id`, `booking_date`, `price`, `user_id`, `wallet`, `booked_by`, `is_booked`, `modeofpayment`, `remark`) VALUES
(355, 84, 18, 0, '2024-08-21', '6599.3466666667', 1, '6599.3466666667', 'user', '', 'online', ''),
(356, 85, 18, 0, '2024-08-21', '6599.3466666667', 1, '6599.3466666667', 'user', '', 'online', ''),
(357, 86, 18, 0, '2024-08-21', '6599.3466666667', 1, '6599.3466666667', 'user', '', 'online', '');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `image` varchar(500) NOT NULL,
  `link` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `image`, `link`, `url`, `status`) VALUES
(3, 'about-carousel-212.jpg', '7084', '', 1),
(5, 'about-carousel-162.jpg', '138', '', 1),
(6, 'about-carousel-351.jpg', '3220', '', 1),
(7, 'comment-author-32.jpg', '5246', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `parent` varchar(50) DEFAULT '',
  `name` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL,
  `link` varchar(200) NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `parent`, `name`, `image`, `link`, `title`, `description`, `status`) VALUES
(156, '', 'Web Development Company India', '', 'web-development-company-india', '', '', 1),
(157, '', 'SEO Development Company', '', 'seo-development-company', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `value` float NOT NULL,
  `min_amt` int(11) NOT NULL,
  `max_dis` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `name`, `type`, `value`, `min_amt`, `max_dis`, `quantity`, `status`) VALUES
(9, 'Test', 'percentage', 10, 100, 10000, 999, 1),
(10, 'Test1', 'percentage', 12, 0, 1222, 981, 1),
(11, 'sale', 'percentage', 5, 500, 800, 1000, 1),
(12, 'qwer', 'fixed', 100, 100, 5000, 1000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `mobile` varchar(13) NOT NULL,
  `attachment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `exhibition`
--

CREATE TABLE `exhibition` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `image` varchar(500) NOT NULL,
  `featured_image` varchar(500) NOT NULL,
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `venue` varchar(255) NOT NULL,
  `featured` varchar(20) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exhibition`
--

INSERT INTO `exhibition` (`id`, `name`, `link`, `description`, `email`, `phone`, `image`, `featured_image`, `images`, `venue`, `featured`, `start_date`, `end_date`, `status`) VALUES
(9, 'Dahleez Fort', 'i-am-a-new-one', '<p>Page builder allow you to&nbsp;<strong>build</strong>&nbsp;custom sites without touching a line of code.&nbsp;<strong>Drag and drop</strong>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>\r\n', 'ajayshekhawat.2251@gmail.com', '7878196997', 'seven2.jpg', 'sponser-bg2.jpg', '[]', 'Mexico', 'on', '2024-08-21', '2024-08-22', 1),
(11, 'Cloths Exhibition', 'cloths-exhibition', '<p>Page builder allow you to&nbsp;<strong>build</strong>&nbsp;custom sites without touching a line of code.&nbsp;<strong>Drag and drop</strong>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.Page builder allow you to&nbsp;<strong>build</strong>&nbsp;custom sites without touching a line of code.&nbsp;<strong>Drag and drop</strong>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>\r\n', 'vishwasmoorjani02@gmail.com', '7878196997', 'nine13.jpg', 'venue2.jpg', '[\"gallery_img31.jpg\",\"gallery_img21.jpg\",\"gallery_img63.jpg\",\"gallery_img111.jpg\",\"gallery_img411.jpg\",\"gallery_img511.jpg\"]', 'SMS Stadium Jaipur', NULL, '2024-07-27', '2024-07-28', 1),
(12, 'Dehleez Kesari Bagh', 'dehleez-kesari-bagh', '', 'info@dehleez.com', '9876543210', 'kesaribagh1.jpeg', 'WhatsApp_Image_2024-06-28_at_4.34.54_PM.jpeg', '[]', 'Vaishali Nagar', 'on', '2024-08-04', '2024-08-05', 1),
(13, 'Leather Shoe Collection', 'leather-shoe-collection', '<p>his one-day fashion &amp; lifestyle exhibition will feature pret &amp; couture fashion, precious &amp; destination jewellery, accessories, gifting, home decor, beauty &amp; wellness and much more. Our aim is to provide a strong platform to sell your latest collections. The central location of the event combined with our marketing expertise provides unparalleled access to Delhis elite shoppers.</p>\r\n', 'vishwasmoorjani02@gmail.com', '7878196997', 'six11.jpg', 'venue3.jpg', '[\"speaker_img32.jpg\",\"speaker_img43.jpg\",\"speaker_img111.jpg\",\"speaker_img211.jpg\",\"speaker_img311.jpg\",\"speaker_img411.jpg\",\"speaker_img421.jpg\",\"spearker_12.jpg\"]', 'Jawahar Kala Kendra', NULL, '2024-08-14', '2024-08-15', 1),
(14, 'Mega Cotton Saless', 'mega-cotton-sale', '<p>?&nbsp;<strong>Mega Cotton Sale: Unleash Your Inner Fabric Enthusiast!</strong>&nbsp;?</p>\r\n\r\n<p>Attention, textile aficionados and fashionistas alike! The much-awaited&nbsp;<strong>Mega Cotton Sale</strong>&nbsp;is here, and it&rsquo;s like a soft, fluffy cloud of savings drifting down upon us. ???</p>\r\n\r\n<p><strong>Event Details:</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Date:</strong>&nbsp;Starting this weekend (because who doesn&rsquo;t love a good Saturday spree?)</li>\r\n	<li><strong>Venue:</strong>&nbsp;The sprawling Cottonopolis Convention Center (yes, that&rsquo;s a made-up name, but it sounds fancy, doesn&rsquo;t it?)</li>\r\n	<li><strong>Theme:</strong>&nbsp;&ldquo;Threads of Joy&rdquo; (because life is too short for scratchy fabrics)</li>\r\n</ul>\r\n\r\n<p><strong>Why You Should Be Excited:</strong></p>\r\n\r\n<ol>\r\n	<li>\r\n	<p><strong>Cotton Galore:</strong>&nbsp;Picture row upon row of cotton rolls, bolts, and swatches in every conceivable hue. From pristine whites to vibrant prints, this sale has it all. Whether you&rsquo;re a quilter, a DIY enthusiast, or just someone who appreciates the breathability of cotton, you&rsquo;re in for a treat.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Discounts That Make Your Wallet Dance:</strong>&nbsp;We&rsquo;re talking discounts so juicy, they&rsquo;ll make your piggy bank shimmy. ?? Whether you&rsquo;re hunting for summer dresses, cozy bedsheets, or that perfect pair of cotton pajamas, your budget will thank you.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Fashion Whisperers:</strong>&nbsp;Expert stylists will be on hand to guide you through the cotton jungle. Need advice on pairing prints? Wondering if that polka-dot blouse clashes with your striped skirt? Fear not&mdash;our fashion gurus have got your back.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Sustainable Chic:</strong>&nbsp;Cotton is the OG sustainable fabric, and this sale celebrates that. Learn about eco-friendly dyeing techniques, organic cotton farming, and how your choices can positively impact the planet. ?</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Snack Stations:</strong>&nbsp;Because shopping burns calories (trust us, it&rsquo;s science), we&rsquo;ve set up cotton candy stations strategically throughout the venue. Grab a fluffy pink cloud of spun sugar and keep browsing!</p>\r\n	</li>\r\n</ol>\r\n\r\n<p><strong>Activities:</strong></p>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong>Cotton Couture Runway:</strong>&nbsp;Watch models strut their stuff in cotton creations&mdash;from elegant evening gowns to quirky jumpsuits. Who knew cotton could be so versatile?</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Thread-Count Trivia:</strong>&nbsp;Test your fabric knowledge. Can you tell a 200-thread-count sheet from a 400-thread-count one? Impress your friends and win prizes!</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>DIY Den:</strong>&nbsp;Roll up your sleeves and get crafty. Tie-dye workshops, sewing demos, and macram&eacute; sessions await. Bonus points if you make a cotton tote bag that screams, &ldquo;I&rsquo;m eco-chic!&rdquo;</p>\r\n	</li>\r\n</ul>\r\n\r\n<p><strong>Parting Words:</strong>&nbsp;Whether you&rsquo;re a seasoned seamstress or a cotton newbie, the&nbsp;<strong>Mega Cotton Sale</strong>&nbsp;promises a day of softness, style, and sheer delight. So gather your fabric-loving friends, fluff up your enthusiasm, and let&rsquo;s spin some textile magic! ??</p>\r\n', 'ajayshekhawat.2251@gmail.com', '7878196997', 'seven21.jpg', 'WhatsApp_Image_2024-06-28_at_16.34.55.jpeg', '[]', 'Birla Auditorium', NULL, '2024-07-21', '2024-07-23', 1),
(17, 'Riya Kurti Exhibition', 'riya-kurti-exhibition', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit animi illo quisquam quae vel nam accusamus asperiores dolores ad, ut quidem iusto, sunt doloremque excepturi placeat cumque omnis eligendi provident?</p>\r\n', 'ajayshekhawat.2251@gmail.com', '7878196997', 'download.jfif', 'download1.jfif', '[\"testi-monails12.jpg\"]', 'Sanganer', NULL, '2024-08-05', '2024-08-07', 1),
(18, 'Birla Aud', 'birla-aud', '<p>ccgj</p>\r\n', 'manish.gdigital@gmail.com', '9828866677', 'logo.jpg', 'logo1.jpg', '[]', 'Staute Circle ', NULL, '2024-08-27', '2024-09-29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `mobile` varchar(13) NOT NULL,
  `email` varchar(500) NOT NULL,
  `service` varchar(50) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `global`
--

CREATE TABLE `global` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `value` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `global`
--

INSERT INTO `global` (`id`, `name`, `value`, `status`) VALUES
(1, 'headerlogo', 'tmc-logo.png', 1),
(2, 'footerlogo', 'tmc-logo.png', 1),
(3, 'footercontent', '', 1),
(4, 'address', 'Ground Floor, 45-A Cosmo Colony, Vaishali Nagar Jaipur 302021', 1),
(5, 'mobile', '+91 9784833137', 1),
(6, 'email', 'yashchachan111@gmail.com', 1),
(7, 'topdata', '', 1),
(8, 'facebook', '', 1),
(9, 'twitter', '', 1),
(10, 'instagram', '', 1),
(11, 'youtube', '', 1),
(12, 'whatsapp', '919784833137', 1),
(13, 'youtubevideo', 'BnMmVj_U8Q4', 1),
(14, 'mobile2', '', 1),
(15, 'banner_title', '', 1),
(16, 'banner_content', '', 1),
(17, 'experience', '15', 1),
(18, 'satisfied_customer', '2000', 1),
(19, 'success', '95', 1),
(20, 'team', '200', 1),
(21, 'gmblink', '', 1),
(22, 'referral_amount', '1500', 1),
(23, 'gst', '18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user` varchar(255) NOT NULL,
  `remark` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `date_added`, `user`, `remark`) VALUES
(3, '2024-07-19 09:34:47', 'Admin', 'Stall Number 8 of Exhibition Dehleez Kesari Bagh has been cancelled by Admin'),
(4, '2024-07-19 09:40:36', 'ajay@gmail.com', 'Stall Number 20 of Exhibition Cloths Exhibition has been cancelled by ajay@gmail.com'),
(5, '2024-07-19 09:54:59', 'Admin', 'Stall Number 8 of Exhibition Dehleez Kesari Bagh has been cancelled by Admin'),
(6, '2024-07-19 09:57:28', 'ajay@gmail.com', 'Stall Number 6 of Exhibition Dehleez Kesari Bagh has been cancelled by ajay@gmail.com'),
(7, '2024-07-19 11:10:20', 'Admin', 'Mega Cotton Saless Exhibition  has been edited by Admin'),
(8, '2024-07-19 11:15:11', 'Admin', 'Test Exhibition  has been created by  Admin'),
(9, '2024-07-19 11:15:31', 'Admin', 'Test Exhibition  has been edited by Admin'),
(10, '2024-07-19 11:50:50', 'Admin', 'Test Exhibition has been deleted by Admin'),
(11, '2024-07-19 11:55:09', 'ajay@gmail.com', 'rewser Exhibition  has been created by ajay@gmail.com'),
(12, '2024-07-19 11:55:35', 'ajay@gmail.com', 'rewsersdfws Exhibition  has been edited by ajay@gmail.com'),
(13, '2024-07-19 11:56:15', 'ajay@gmail.com', ' Stall Name test has been created by ajay@gmail.com'),
(14, '2024-07-19 12:00:13', 'ajay@gmail.com', ' Stall Name test has been edited by ajay@gmail.com'),
(15, '2024-07-19 12:24:26', 'Admin', 'test Stall has been deleted by Admin'),
(16, '2024-07-19 12:27:52', 'ajay@gmail.com', ' Stall Name tessss has been created by ajay@gmail.com'),
(17, '2024-07-19 12:28:33', 'ajay@gmail.com', 'tessss Stall has been deleted by ajay@gmail.com'),
(18, '2024-07-19 12:40:52', 'Admin', '₹ 150 has been debited from user vishwasmoorjani02@gmail.com by Admin'),
(19, '2024-07-19 12:41:42', 'Admin', '₹ 1500 has been credited from user vishwasmoorjani02@gmail.com by Admin'),
(20, '2024-07-19 12:44:09', 'ajay@gmail.com', '₹ 150 has been credited from user ajayshekhawat.2251@gmail.com by ajay@gmail.com'),
(21, '2024-07-19 12:44:26', 'ajay@gmail.com', '₹ 50 has been debited from user ajayshekhawat.2251@gmail.com by ajay@gmail.com'),
(22, '2024-07-19 12:54:14', 'Admin', 'Stall Number 2 of Cloths Exhibition has been booked offlined by Admin'),
(23, '2024-07-19 13:11:51', 'ajay@gmail.com', '₹ 150 has been debited from user ajayshekhawat.2251@gmail.com by ajay@gmail.com'),
(24, '2024-07-20 05:38:10', 'officeadmin@gmail.com', ' Stall Name silver has been created by officeadmin@gmail.com'),
(25, '2024-08-03 12:46:52', 'Admin', 'rewsersdfws Exhibition has been deleted by Admin'),
(26, '2024-08-03 12:53:30', 'Admin', 'Riya Kurti Exhibition Exhibition  has been created by  Admin'),
(27, '2024-08-03 12:55:46', 'Admin', 'Gold Stall has been created by Admin'),
(28, '2024-08-03 12:56:42', 'Admin', 'Stall Number 5 of Riya Kurti Exhibition has been booked by Admin for user '),
(29, '2024-08-03 12:58:49', 'Admin', 'Stall Number 5 of Exhibition Riya Kurti Exhibition has been cancelled by Admin'),
(30, '2024-08-03 12:59:36', 'Admin', 'Stall Number 2 of Exhibition Riya Kurti Exhibition has been cancelled by Admin'),
(31, '2024-08-03 13:00:13', 'Admin', '₹ 2000 has been credited from user sushilgdigital@gmail.com by Admin'),
(32, '2024-08-03 13:00:52', 'Admin', 'Stall Number 5 of Exhibition Riya Kurti Exhibition has been cancelled from offline bookings by Admin'),
(33, '2024-08-03 13:01:04', 'Admin', 'Stall Number 2 of Exhibition Riya Kurti Exhibition has been cancelled from offline bookings by Admin'),
(34, '2024-08-03 13:06:03', 'Admin', 'Stall Number 6 of Exhibition Riya Kurti Exhibition has been cancelled by Admin'),
(35, '2024-08-03 13:06:47', 'Admin', 'Stall Number 6 of Exhibition Riya Kurti Exhibition has been cancelled from offline bookings by Admin'),
(36, '2024-08-03 13:11:47', 'Admin', 'Stall Number 4 of Exhibition Riya Kurti Exhibition has been cancelled by Admin'),
(37, '2024-08-03 13:15:04', 'Admin', '₹ 10000 has been credited from user sushilgdigital@gmail.com by Admin'),
(38, '2024-08-09 19:05:48', 'Admin', '₹ 50 has been debited from user ajayshekhawat.2251@gmail.com by Admin'),
(39, '2024-08-09 19:06:27', 'Admin', 'Stall Number 14 of Leather Shoe Collection has been booked by Admin for user '),
(40, '2024-08-09 19:06:53', 'Admin', 'Stall Number 14 of Exhibition Leather Shoe Collection has been cancelled by Admin'),
(41, '2024-08-09 19:07:12', 'Admin', 'Stall Number 14 of Exhibition Leather Shoe Collection has been cancelled from offline bookings by Admin'),
(42, '2024-08-09 19:07:30', 'Admin', 'Stall Number 19 of Leather Shoe Collection has been booked offlined by Admin'),
(43, '2024-08-20 07:09:55', 'Admin', 'Dahleez Fort Exhibition  has been edited by Admin'),
(44, '2024-08-20 07:10:08', 'Admin', 'Dahleez Fort Exhibition  has been edited by Admin'),
(45, '2024-08-20 10:21:03', 'Admin', 'Birla Aud Exhibition  has been created by  Admin'),
(46, '2024-08-20 10:24:10', 'Admin', 'table stall Stall has been created by Admin'),
(47, '2024-08-20 10:25:38', 'Admin', 'Platinum Stall has been edited by Admin');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(500) NOT NULL,
  `status` int(20) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`, `status`) VALUES
(1, 'admin@gmail.com', 1),
(2, 'admin@gmail.com', 1),
(3, 'jesus_martinkq7g@outlook.com', 1),
(4, 'jesus_martinkq7g@outlook.com', 1),
(5, 'laura.white2001@yahoo.com', 1),
(6, 'laura.white2001@yahoo.com', 1),
(7, '2kJO_generic_a88b7dcd_dahleezexhibition.com@serviseantilogin.com', 1),
(8, '6YrP_generic_a88b7dcd_dahleezexhibition.com@serviseantilogin.com', 1),
(9, 'sharon_huneycutt5oxk@outlook.com', 1),
(10, 'sharon_huneycutt5oxk@outlook.com', 1),
(11, 'dragan_schaffer848478@yahoo.com', 1),
(12, 'dragan_schaffer848478@yahoo.com', 1),
(13, 'joseph_fishback1vci@outlook.com', 1),
(14, 'joseph_fishback1vci@outlook.com', 1),
(15, 'kinchristian33@gmail.com', 1),
(16, 'kinchristian33@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `id` int(11) NOT NULL,
  `userId` varchar(20) NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL,
  `name` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `size` varchar(50) DEFAULT NULL,
  `freebie` varchar(50) DEFAULT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `transactionId` varchar(100) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userId` varchar(20) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `userEmail` varchar(50) NOT NULL,
  `shippingAddress` text NOT NULL,
  `billingAddress` text NOT NULL,
  `currency` varchar(50) NOT NULL,
  `totalAmount` float NOT NULL,
  `totalShipping` float NOT NULL,
  `totalDiscount` float NOT NULL,
  `paymentMethod` varchar(50) NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  `message` text,
  `tracking_id` varchar(500) NOT NULL,
  `tracking_url` varchar(500) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending',
  `seen` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `title` varchar(500) NOT NULL,
  `image` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `content2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `title`, `image`, `content`, `content2`) VALUES
(1, 'about', 'About Us', 'spearker_6.jpg', '<p><strong>Welcome to Dahleez Exhibition!</strong></p>\r\n\r\n<p>At Dahleez Exhibition, we are dedicated to showcasing creativity, innovation, and talent across various industries. Our mission is to provide a vibrant platform for exhibitors and visitors to connect, share ideas, and inspire one another.</p>\r\n\r\n<p><strong>Who We Are</strong><br />\r\nFounded 10 years ago, Dahleez Exhibition has become a leading name in the exhibition industry, bringing together diverse exhibitors. Our events are designed to create meaningful interactions and foster collaboration among participants.</p>\r\n\r\n<p><strong>What We Do</strong><br />\r\nWe organize a variety of exhibitions, trade shows, and events throughout the year, each tailored to meet the needs of our exhibitors and visitors. From small-scale events to large international expos, our goal is to provide a seamless experience for everyone involved.</p>\r\n\r\n<p><strong>Our Values</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Innovation:</strong> We strive to promote new ideas and trends that shape the future.</li>\r\n	<li><strong>Community:</strong> Building strong relationships among exhibitors, visitors, and partners is at the heart of our mission.</li>\r\n	<li><strong>Excellence:</strong> We are committed to delivering high-quality events and exceptional customer service.</li>\r\n</ul>\r\n\r\n<p><strong>Join Us</strong><br />\r\nWhether you&rsquo;re an exhibitor looking to showcase your products or a visitor eager to explore the latest trends, Dahleez Exhibition is the place for you. Join us and be a part of our growing community!</p>\r\n\r\n<p><strong>Contact Us</strong><br />\r\nFor more information about our events or to get involved, please reach out to us at <a href=\"tel:+91 9784833137\">+91 9784833137</a>.</p>\r\n', ''),
(2, 'privacy', 'Privacy Policy', '', '<p><strong>Effective Date:</strong>&nbsp;15th July 2024</p>  <p><strong>1. Introduction</strong><br /> Dahleez Exhibition (&quot;we,&quot; &quot;us,&quot; &quot;our&quot;) is committed to protecting your privacy. This Privacy Policy explains how we collect, use, and disclose your personal information.</p>  <p><strong>2. Information We Collect</strong></p>  <ul> 	<li>Personal Information: Name, email address, phone number, and payment information.</li> 	<li>Usage Data: Information about how you use our website and services.</li> </ul>  <p><strong>3. How We Use Your Information</strong></p>  <ul> 	<li>To process transactions.</li> 	<li>To communicate with you regarding your account and services.</li> 	<li>To improve our website and services.</li> 	<li>To comply with legal obligations.</li> </ul>  <p><strong>4. Disclosure of Your Information</strong><br /> We do not sell your personal information to third parties. We may share your information with service providers to assist in operations.</p>  <p><strong>5. Security of Your Information</strong><br /> We implement reasonable security measures to protect your personal information from unauthorized access or disclosure.</p>  <p><strong>6. Your Rights</strong><br /> You have the right to access, correct, or delete your personal information. You can contact us to exercise these rights.</p>  <p><strong>7. Changes to This Privacy Policy</strong><br /> We may update this Privacy Policy from time to time. We will notify you of any changes by posting the new policy on our website.</p>  <p><strong>8. Contact Us</strong><br /> If you have any questions about this Privacy Policy, please contact us at&nbsp;<a href=\"tel:+91 9784833137\">+91 9784833137</a></p>', ''),
(3, 'refund', 'Refund Policy', '', '<p><strong>Effective Date:</strong> 15th July 2024</p>\n\n<p><strong>1. Introduction</strong><br />\nAt Dahleez Exhibition, we strive to provide high-quality services. If you are not satisfied, please review our refund policy.</p>\n\n<p><strong>2. Eligibility for Refunds</strong><br />\nRefunds are available for stalls booking prior to the event date, provided you meet the following conditions:</p>\n\n<ul>\n	<li>Stalls booking was made directly through our website.</li>\n	<li>You submit your refund request in writing.</li>\n</ul>\n\n<p><strong>3. Refund Process</strong><br />\nTo request a refund, contact us at&nbsp;<a href=\"tel:+91 9784833137\">+91 9784833137</a> with your order number and reason for the refund. We will process your request as per policies.</p>\n\n<p><strong>4. Non-Refundable Items</strong><br />\nStall booking in an ongoing event are non-refundable.</p>\n\n<p><strong>5. Changes to This Policy</strong><br />\nWe may revise this Refund Policy from time to time, and changes will be posted on our website.</p>\n', ''),
(4, 'terms', 'Terms & Conditions', '', '<p><strong>Effective Date:</strong> 15th July 2024</p>\n\n<p><strong>1. Introduction</strong><br />\nThese Terms and Conditions govern your use of the Dahleez Exhibition website. By using our website, you agree to these terms.</p>\n\n<p><strong>2. Registration and Account</strong><br />\nYou may need to create an account to access certain features. You are responsible for maintaining the confidentiality of your account information.</p>\n\n<p><strong>3. Exhibition Stall Booking</strong><br />\nAll exhibition stall booking are subject to availability and confirmation. Prices are subject to change without notice.</p>\n\n<p><strong>4. Cancellation Policy</strong><br />\nWe reserve the right to cancel or reschedule exhibition. In such cases, refunds will be processed according to our Refund Policy.</p>\n\n<p><strong>5. Limitation of Liability</strong><br />\nTo the fullest extent permitted by law, we shall not be liable for any indirect, incidental, or consequential damages arising from your use of our website.</p>\n\n<p><strong>6. Governing Law</strong><br />\nThese Terms and Conditions shall be governed by and construed in accordance with the laws.</p>\n\n<p><strong>7. Changes to These Terms</strong><br />\nWe may update these Terms and Conditions from time to time, and the updated version will be posted on our website.</p>\n\n<p><strong>8. Contact Us</strong><br />\nIf you have any questions about these Terms and Conditions, please contact us at <a href=\"tel:+91 9784833137\">+91 9784833137</a>.</p>', '');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `link` varchar(500) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `link`, `status`) VALUES
(1, 'Dashboard', 'dashboard', 1),
(2, 'Appointments', 'appointments', 1),
(4, 'Exhibitions', 'exhibitions', 1),
(5, 'Add Exhibitions', 'addexhibition', 1),
(6, 'Edit Exhibitions', 'editexhibition', 1),
(63, 'Delete', 'delete', 1),
(79, 'Sliders', 'sliders', 1),
(81, 'Add Sliders', 'addsliders', 1),
(83, 'Edit Slider', 'editslider', 1),
(85, 'Global Settings', 'globalsettings', 1),
(91, 'Blogs', 'blogs', 1),
(92, 'Add Blog', 'addblog', 1),
(93, 'Edit Blog', 'editblog', 1),
(96, 'Reviews', 'reviews', 1),
(97, 'Add Review', 'addreview', 1),
(98, 'Edit Reviews', 'editreviews', 1),
(110, 'Staff', 'staff', 1),
(111, 'Add Staff', 'addstaff', 1),
(112, 'Edit Staff', 'editstaff', 1),
(113, 'Roles', 'roles', 1),
(114, 'Add Roles', 'addrole', 1),
(115, 'Edit Roles', 'editrole', 1),
(122, 'Customers', 'customers', 1),
(123, 'Order History', 'order_history', 1),
(125, 'Gallery', 'gallerys', 1),
(126, 'Stalls', 'stalls', 1),
(127, 'Add Stall', 'addstall', 1),
(128, 'Edit Stall', 'editstall', 1),
(129, 'Video Gallery', 'vgallery', 1),
(130, 'Add Video Gallery', 'addvideogallery', 1),
(131, 'Edit Video Gallery', 'editvideogallery', 1),
(132, 'Coupons', 'coupons', 1),
(133, 'Add Coupon', 'addcoupon', 1),
(134, 'Edit Coupon', 'editcoupon', 1),
(135, 'Orders', 'orders', 1),
(144, 'Offline Bookings', 'offline', 1),
(145, 'Booked Stalls', 'booked', 1),
(146, 'Book Stalls Offline', 'bookstalls', 1),
(150, 'Profile', 'profile', 1),
(151, 'Book Stalls for User', 'bookstallsforuser', 1),
(152, 'Debit/Credit Wallet', 'editwallet', 1),
(153, 'Sponsors', 'brands', 1),
(154, 'Add Sponsors', 'addbrands', 1),
(155, 'Edit Sponsors', 'editbrand', 1),
(156, 'Cancel Orders', 'cancelorder', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `rating` varchar(13) NOT NULL,
  `message` text NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `image`, `rating`, `message`, `date_added`, `status`) VALUES
(6, 'Varsha Ji', 'about-carousel-161.jpg', '5', '<p>Value for money and I can see better investment for future need. Everyone in Adobe are very professional. Based on my budget, they have showed what will be the best for me. Happy with there services. Will be recommending to my friends and relatives. Thank you!</p>\r\n', '2023-08-01 18:30:00', 1),
(8, 'Shivani Guptas', 'about-carousel-151.jpg', '', '<p>Value for money and I can see better investment for future need. Everyone in Adobe are very professional. Based on my budget, they have showed what will be the best for me. Happy with there services. Will be recommending to my friends and relatives. Thank you!</p>\r\n', '2024-06-30 18:30:00', 1),
(10, 'Tring', 'about-carousel-321.jpg', '', 'Tring does not wants to write a review by writting a review', '2024-07-18 18:30:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `link` varchar(500) NOT NULL,
  `permissions` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `link`, `permissions`, `status`, `date`) VALUES
(4, 'Office Admin Manager', '', 'dashboard,exhibitions,addexhibition,editexhibition,delete,order_history,stalls,addstall,editstall,vgallery,addvideogallery,editvideogallery,coupons,addcoupon,editcoupon,orders,offline,booked,bookstalls,profile,bookstallsforuser,editwallet,cancelorder', '1', '05-01-2024 12:44:18'),
(10, 'Exhibition Manager ', 'testing', 'dashboard,exhibitions,addexhibition,editexhibition,customers,order_history,stalls,addstall,editstall,offline,booked,bookstalls,profile,bookstallsforuser,editwallet,cancelorder', '1', '19-07-2024 08:14:34');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `location` varchar(50) NOT NULL,
  `image` varchar(500) NOT NULL,
  `title` varchar(500) NOT NULL,
  `title1` varchar(500) NOT NULL,
  `title2` varchar(500) NOT NULL,
  `paragraph` varchar(500) NOT NULL,
  `link` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `venue` varchar(500) NOT NULL,
  `date_added` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `location`, `image`, `title`, `title1`, `title2`, `paragraph`, `link`, `url`, `venue`, `date_added`, `status`) VALUES
(1, 'vgallery', 'ggD6STayK7s', '', '', '', '', '9299', '', '', '2024-05-25', 1),
(2, 'gallery', 'about-carousel-16.jpg', '', '', '', '', '', '', '', '2024-05-25', 1),
(3, 'gallery', 'about-carousel-26.jpg', '', '', '', '', '', '', '', '2024-05-25', 1),
(4, 'gallery', 'about-carousel-35.jpg', '', '', '', '', '', '', '', '2024-05-25', 1),
(5, 'gallery', 'about-carousel-113.jpg', '', '', '', '', '', '', '', '2024-05-25', 1),
(6, 'gallery', 'about-carousel-123.jpg', '', '', '', '', '', '', '', '2024-05-25', 1),
(7, 'slider', 'kesaribagh.jpeg', 'Kesari Bagh', '4th July to 5th July', '', '', '4358', '', 'Vaishali Nagar', '2024-07-04', 1),
(9, 'gallery', 'why-choose-two-bg.jpg', '', '', '', '', '', '', '', '0000-00-00', 1),
(10, 'gallery', 'slider-1-3.jpg', '', '', '', '', '', '', '', '0000-00-00', 1),
(11, 'slider', 'blog_800x51011.jpg', 'Mega Cotton Sale', '', '', '', '9387', '', 'Birla Auditorium', '2024-07-21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `role` varchar(500) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `role`, `email`, `password`, `phone`, `status`) VALUES
(1, 'Staff', 'Exhibition Manager ', 'staff@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '9988779977', 1),
(4, 'Office Admin', 'Office Admin Manager', 'officeadmin@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '9988779988', 1);

-- --------------------------------------------------------

--
-- Table structure for table `stalltype`
--

CREATE TABLE `stalltype` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `exhibition` varchar(500) NOT NULL,
  `color` varchar(500) NOT NULL,
  `size` varchar(500) NOT NULL,
  `price` double NOT NULL,
  `stalls` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `link` varchar(500) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stalltype`
--

INSERT INTO `stalltype` (`id`, `name`, `exhibition`, `color`, `size`, `price`, `stalls`, `link`, `status`) VALUES
(9, 'New Stall', '4', '#73ab44', '15', 3000, '[\"2\",\"4\",\"6\",\"8\",\"10\"]', 'new-stall', 1),
(10, 'New Stall Again', '4', '#5e7119', '16', 1500, '[\"1\",\"3\",\"5\",\"7\",\"9\"]', 'new-stall-again', 1),
(11, 'Premium', '9', '#f20707', '5 * 5', 10000, '[\"1\",\"2\",\"3\",\"4\",\"5\"]', 'premium', 1),
(12, 'Platinum', '9', '#8d29a8', '4 * 4', 8000, '[\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"13\",\"14\",\"15\"]', 'platinum', 1),
(13, 'Gold', '9', '#d7ef25', '3 * 3', 6000, '[\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\",\"23\",\"24\",\"25\",\"26\",\"27\",\"28\",\"29\",\"30\",\"31\",\"32\",\"33\",\"34\",\"35\",\"36\",\"37\",\"38\",\"39\",\"40\",\"41\",\"42\",\"43\",\"44\",\"45\"]', 'gold', 1),
(14, 'Silver', '9', '#73a59d', '2 * 2', 4000, '[\"46\",\"47\",\"48\",\"49\",\"50\",\"51\",\"52\",\"53\",\"54\",\"55\",\"56\",\"57\",\"58\",\"59\",\"60\",\"61\",\"62\",\"63\",\"64\",\"65\",\"66\",\"67\",\"68\",\"69\",\"70\",\"71\",\"72\",\"73\",\"74\",\"75\",\"76\",\"77\",\"78\",\"79\",\"80\"]', 'silver', 1),
(15, 'Bronze', '9', '#897910', '1 * 1', 2000, '[\"81\",\"82\",\"83\",\"84\",\"85\",\"86\",\"87\",\"88\",\"89\",\"90\",\"91\",\"92\",\"93\",\"94\",\"95\",\"96\",\"97\",\"98\",\"99\",\"100\"]', 'bronze', 1),
(16, 'Freaking', '6', '#161313', '5 * 5', 300, '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"12\",\"13\",\"14\",\"15\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\",\"23\",\"24\",\"25\",\"26\",\"27\",\"28\",\"29\",\"30\",\"31\",\"32\",\"33\",\"34\",\"35\",\"36\",\"37\",\"38\",\"39\",\"40\",\"41\",\"42\",\"43\",\"44\",\"45\",\"46\",\"47\",\"48\",\"49\",\"50\",\"51\",\"52\",\"53\",\"54\",\"55\",\"56\",\"57\",\"58\",\"59\",\"60\",\"100\"]', 'freaking', 1),
(17, 'New test', '8', '#29526a', '5 * 5', 3000, '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"12\",\"13\",\"14\",\"15\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\",\"23\",\"24\",\"25\",\"26\",\"27\",\"28\",\"29\",\"31\"]', 'new-test', 1),
(18, 'Premium', '11', '#654e4e', '5 * 5', 20000, '[\"1\",\"10\",\"11\",\"20\",\"21\",\"30\",\"31\",\"32\",\"33\",\"34\",\"35\",\"36\",\"37\",\"38\",\"39\",\"40\",\"41\",\"50\",\"51\",\"60\",\"61\",\"65\",\"66\",\"69\",\"70\",\"74\",\"75\",\"79\",\"80\"]', 'premium', 1),
(19, 'Platinum', '11', '#8d29a8', '4 * 4', 8000, '[\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"13\",\"14\",\"15\"]', 'platinum', 1),
(20, 'Gold', '11', '#ff0000', '3 * 3', 10000, '[\"91\",\"92\",\"93\",\"94\",\"95\",\"96\",\"97\",\"98\",\"99\",\"100\"]', 'gold', 1),
(21, 'Gold', '12', '#caff0a', '5 * 5', 3000, '[\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"12\",\"13\",\"14\",\"15\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\",\"23\",\"24\",\"25\",\"26\",\"27\"]', 'gold', 1),
(22, 'Leather One', '13', '#7e6b0c', '5 * 5', 3000, '[\"11\",\"12\",\"13\",\"14\",\"15\",\"16\",\"17\",\"18\",\"19\",\"20\"]', 'leather-one', 1),
(23, 'First Class', '14', '#da0707', '4*4', 4500, '[\"11\",\"12\",\"13\",\"14\",\"15\",\"16\",\"17\",\"18\",\"19\",\"20\"]', 'first-class', 1),
(24, 'silver', '16', '#559b96', '2*3', 3500, '[\"2\",\"3\",\"7\",\"12\",\"13\",\"94\",\"95\",\"96\",\"97\"]', 'silver', 1),
(25, 'Gold', '17', '#c1df2a', '5 * 5', 1500, '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\"]', 'gold', 1),
(26, 'table stall', '18', '#565ba4', '2*2', 6000, '[\"81\",\"82\",\"83\",\"84\",\"85\",\"86\",\"87\",\"88\",\"89\",\"90\",\"91\",\"92\",\"93\",\"94\",\"95\",\"96\",\"97\",\"98\",\"99\",\"100\"]', 'table-stall', 1);

-- --------------------------------------------------------

--
-- Table structure for table `temporders`
--

CREATE TABLE `temporders` (
  `id` int(11) NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userId` varchar(20) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `userEmail` varchar(50) NOT NULL,
  `shippingAddress` text NOT NULL,
  `billingAddress` text NOT NULL,
  `currency` varchar(50) NOT NULL,
  `totalAmount` float NOT NULL,
  `totalShipping` float NOT NULL,
  `totalDiscount` float NOT NULL,
  `paymentMethod` varchar(50) NOT NULL,
  `message` text,
  `tracking_id` varchar(500) NOT NULL,
  `tracking_url` varchar(500) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `transcation_id` varchar(500) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` varchar(500) NOT NULL,
  `stall_number` varchar(255) NOT NULL,
  `exhibition_id` varchar(11) NOT NULL,
  `modeofpayment` varchar(500) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `remark` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `transcation_id`, `user_id`, `amount`, `stall_number`, `exhibition_id`, `modeofpayment`, `date_added`, `remark`) VALUES
(550, '11884BOOK6599.3466666667', 1, '6599.3466666667', '84', '18', 'Wallet', '2024-08-21 11:00:30', 'Booked Stall'),
(551, '11885BOOK6599.3466666667', 1, '6599.3466666667', '85', '18', 'Wallet', '2024-08-21 11:00:30', 'Booked Stall'),
(552, '11886BOOK6599.3466666667', 1, '6599.3466666667', '86', '18', 'Wallet', '2024-08-21 11:00:30', 'Booked Stall');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `gst` varchar(500) NOT NULL,
  `currentaddress` text NOT NULL,
  `shippingaddress` text NOT NULL,
  `shippingcountry` varchar(50) DEFAULT 'India',
  `password` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL DEFAULT 'customer',
  `code` varchar(20) DEFAULT NULL,
  `resetcode` varchar(500) NOT NULL,
  `wallet` varchar(500) NOT NULL DEFAULT '0',
  `referred_by` varchar(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `phone`, `gst`, `currentaddress`, `shippingaddress`, `shippingcountry`, `password`, `type`, `code`, `resetcode`, `wallet`, `referred_by`, `status`) VALUES
(1, 'Vishwas', 'Moorjani', 'vishwasmoorjani02@gmail.com', '9549060381', '', '', '', 'India', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'customer', '', '', '201.96', '', 1),
(5, 'Testing', 'Person', 'ajayshekhawat.2251@gmail.com', '7878196997', '', '', '', 'India', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'customer', NULL, '', '1400', '', 1),
(8, 'Arun', 'Dhetarwal', 'arun@gmail.com', '9809898761', '', '', '', 'India', '601f1889667efaebb33b8c12572835da3f027f78', 'customer', NULL, '3632', '12', '', 1),
(10, 'Test', 'Person', 'test@gmail.com', '7878196996', '', '', '', 'India', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'customer', NULL, '', '8000', '', 1),
(11, 'nadeem', 'jaj', 'nadeem@gmail.com', '78794546521', '', '', '', 'India', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'customer', NULL, '', '10000', '', 1),
(12, 'rahul', 'jain', 'rahuljai1706@gmail.com', '9116175159', '', '', '', 'India', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'customer', NULL, '', '5000', '', 1),
(13, 'manish', 'jain', 'manish.gdigital@gmail.com', '9828866677', '', '', '', 'India', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'customer', NULL, '', '0', '', 1),
(14, 'Ram', 'Singh', 'mddm2251@gmail.com', '7878196998', '', '', '', 'India', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'customer', NULL, '', '0', '', 1),
(15, 'sushil', 'Sharma', 'sushilgdigital@gmail.com', '8290941978', '', '', '', 'India', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'customer', NULL, '', '9575', '', 1),
(16, 'Yash', 'Chachan', 'Yashchachan111@gmai.com', '9784833137', '', '', '', 'India', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'customer', NULL, '', '0', '', 1),
(17, 'Vishwas', 'Moorjani', 'vishwasmoorjani@gmail.com', '9549060382', '', '', '', 'India', '7c222fb2927d828af22f592134e8932480637c0d', 'customer', NULL, '', '0', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booked-stalls`
--
ALTER TABLE `booked-stalls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exhibition`
--
ALTER TABLE `exhibition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `global`
--
ALTER TABLE `global`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stalltype`
--
ALTER TABLE `stalltype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temporders`
--
ALTER TABLE `temporders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `booked-stalls`
--
ALTER TABLE `booked-stalls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=358;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exhibition`
--
ALTER TABLE `exhibition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `global`
--
ALTER TABLE `global`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stalltype`
--
ALTER TABLE `stalltype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `temporders`
--
ALTER TABLE `temporders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=553;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
