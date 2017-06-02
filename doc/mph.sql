-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 02, 2017 at 06:00 PM
-- Server version: 5.5.53
-- PHP Version: 7.0.12

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mph`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `images` char(64) NOT NULL DEFAULT '',
  `price` decimal(6,2) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` char(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment` decimal(6,2) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` char(20) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `shiped_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `delivered_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tracking_number` char(16) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(60) NOT NULL,
  `description` varchar(255) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `images` char(64) NOT NULL DEFAULT '',
  `my_price` decimal(6,2) NOT NULL,
  `us_price` decimal(6,2) NOT NULL DEFAULT '0.00',
  `us_cost` decimal(6,2) NOT NULL DEFAULT '0.00',
  `us_url` char(255) NOT NULL DEFAULT '',
  `cn_price` decimal(6,2) NOT NULL DEFAULT '0.00',
  `cn_url` char(255) NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `category` tinyint(1) NOT NULL DEFAULT '1',
  `favnum` int(11) NOT NULL DEFAULT '0',
  `soldnum` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `category` (`category`),
  KEY `status` (`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `status`, `images`, `my_price`, `us_price`, `us_cost`, `us_url`, `cn_price`, `cn_url`, `created_at`, `updated_at`, `category`, `favnum`, `soldnum`) VALUES
(1, 'Gerber 嘉宝星星泡芙puffs， 42g， 宝宝辅食', 'Gerber 泡芙 1.48oz-42g', 1, '170504152317GerberPuffs.jpg', '42.00', '1.97', '25.00', 'https://www.walmart.com/ip/Gerber-Graduates-Puffs-Banana-Strawberry-Apple-Cereal-Snack-Variety-Pack-1.48-oz-4-count/50422899', '48.00', 'https://item.jd.hk/1952873685.html', '2017-05-01 21:34:00', '2017-06-02 21:46:26', 1, 266, 168),
(2, '美国Aveeno Baby艾维诺宝宝燕麦润肤舒缓乳液防湿疹 139ml', '艾维诺宝宝润肤舒缓乳液', 1, '170504153918AveenoBabySoothing.jpg', '98.00', '4.97', '52.00', 'https://www.walmart.com/ip/Aveeno-Baby-Soothing-Relief-Moisturizing-Cream-5-oz/49883626', '99.00', 'https://item.jd.hk/1950407939.html', '2017-05-04 19:40:15', '2017-06-02 21:16:02', 2, 116, 48),
(3, '美国原装进口Culturelle益生菌 康萃乐 维护肠胃健康 儿童咀嚼片 30粒/盒', '美国原装进口 康萃乐益生菌', 1, '170505231708cultab.jpg', '214.00', '18.59', '154.00', 'http://www.target.com/p/kid-s-culturelle-probiotic-bursting-berry-chewable-tablets-30-count/-/A-15146557', '218.00', 'https://item.jd.hk/1964063952.html', '2017-05-06 03:19:18', '2017-06-02 21:13:59', 2, 188, 36),
(4, 'Ayer 艾儿钙C-20美国原装进口营养素饮料甘氨 宝宝补钙', '美国原装进口 口感好 不刺激肠胃', 1, '170505232043ayercal.jpg', '198.00', '15.19', '128.00', 'https://smile.amazon.com/Ayer-Calcium-Supplement-Drops/dp/B01FYDVSU8/', '209.00', 'https://world.tmall.com/item/10250132703.htm?id=10250132703', '2017-05-06 03:21:23', '2017-06-02 21:00:54', 2, 96, 35),
(5, '美国原装进口Thinkbaby Sunscreen  宝宝防晒 SPF 50+ 3oz', '儿童男女隔离霜婴儿防晒霜spf50', 1, '170505232227thinkby.jpg', '189.00', '12.99', '112.00', 'http://www.target.com/p/thinkbaby-safe-sunscreen-spf-50-3oz/-/A-51525033', '198.00', 'https://item.jd.hk/1982784093.html', '2017-05-06 03:25:00', '2017-06-02 21:11:33', 2, 102, 58),
(6, '美国Mederma 医生推荐 #1 For Kids Gel, 儿童祛疤, 20g', '美国进口疤痕 修复膏儿童版  祛手术疤新旧疤', 1, '170505232857medkid.jpg', '199.00', '17.97', '149.00', 'https://www.walmart.com/ip/10532847', '209.00', 'https://item.jd.hk/1955649145.html', '2017-05-06 03:29:32', '2017-06-02 21:08:25', 2, 56, 32),
(7, '美国原装进口Ayer艾儿宝宝铁营养补充液美国原装进口甘氨酸亚铁50ml', '美国原装进口 口感好 不刺激肠胃', 1, '170505233324ayeriron.jpg', '198.00', '15.19', '128.00', 'https://smile.amazon.com/Ayer-Iron-Supplement-Drops/dp/B01FYD9RF6/', '209.00', 'https://world.tmall.com/item/10218892989.htm?id=10218892989', '2017-05-06 03:36:11', '2017-06-02 20:56:21', 2, 106, 38),
(8, '美国原装进口Ayer艾儿宝宝补锌Z-30液体营养素饮料甘氨酸锌 50ml', '美国原装进口 口感好 不刺激肠胃', 1, '170505233848ayerzine.jpg', '198.00', '15.19', '128.00', 'https://smile.amazon.com/Ayer-Zinc-Supplement-Drops/dp/B01FYDVQXW/', '209.00', 'https://world.tmall.com/item/12500285024.htm?id=12500285024', '2017-05-06 03:39:31', '2017-06-02 20:59:43', 2, 118, 40),
(9, '美国Culturelle益生菌 康萃乐 维护儿童肠胃健康 30包/盒', '', 1, '170505234653culpak.jpg', '214.00', '18.59', '154.00', 'http://www.target.com/p/culturelle-kids-probiotic-packets-30-count/-/A-13921277', '218.00', 'https://item.jd.hk/2666142.html', '2017-05-06 03:48:58', '2017-06-02 21:46:58', 2, 117, 43),
(10, '美国原装进口Aveeno天然祛痘靓肤洗面奶 美皮肤科医生推荐 产地美国 非韩国 180ml', 'AVEENO® Clear Complexion Foaming Cleanser helps prevent breakouts and improve skin tone and texture. This foaming cleanser leaves skin feeling soft and smooth. Salicylic acid treats and clears up blemishes. The mild formula with ACTIVE NATURALS® soy extra', 1, '170508084737aveeno-acne.jpg', '126.00', '5.99', '56.00', 'http://www.target.com/p/aveeno-174-clear-complexion-foaming-cleanser-6-fl-oz/-/A-11537413', '136.00', 'n/a', '2017-05-08 12:52:48', '2017-06-02 20:47:45', 20, 56, 28),
(11, '美国原装进口Aveeno天然洗面奶 平滑光亮面部皮肤， 改善面部肤色和纹理 200ml', 'AVEENO® POSITIVELY RADIANT® Brightening Cleanser lifts away dirt, oil, and makeup to help even skin tone and texture. This non-drying cleanser helps improve skin''s tone and texture and reduces dullness. This cleanser with moisture-rich soy extract leaves ', 1, '170508090913aveeno-radiant.jpg', '126.00', '5.99', '56.00', 'http://www.target.com/p/aveeno-174-positively-radiant-174-brightening-cleanser-6-7-fl-oz/-/A-11537364', '135.00', 'n/a', '2017-05-08 13:10:08', '2017-06-02 20:46:02', 10, 78, 33),
(12, '美国原装进口Aveeno天然大豆柠檬精华60秒沐浴洗面奶 深度清理 去死皮 还原亮丽自然肤色 141g', 'New AVEENO® ACTIVE NATURALS® POSITIVELY RADIANT® 60 Second In-Shower Facial reveals healthy, glowing skin 4x faster than at home masks and peels*. This oil-free facial treatment works with the steam of your shower to deeply but gently exfoliate all traces', 1, '170508091759aveeno-rad-60s.jpg', '138.00', '6.79', '68.00', 'http://www.target.com/p/aveeno-174-active-naturals-positively-radiant-60-second-in-shower-facial-5oz/-/A-51108532', '145.00', 'n/a', '2017-05-08 13:18:32', '2017-06-02 20:42:57', 10, 66, 32),
(13, '美国原装进口Aveeno天然深度清洁去死皮按摩洗面乳 5oz 140g', 'AVEENO® POSITIVELY RADIANT® Skin Brightening Daily Scrub helps improve skin tone, texture, and clarity to reveal brighter, more radiant skin. It''s designed to help improve dullness, blotchiness, so your skin looks and feels fresh. This unique formula comb', 1, '170508095816aveeno-scrub.jpg', '118.00', '4.79', '50.00', 'http://www.target.com/p/aveeno-174-positively-radiant-174-skin-brightening-daily-scrub-5-oz/-/A-11537365', '128.00', 'n/a', '2017-05-08 13:57:58', '2017-06-02 20:41:31', 10, 112, 35),
(14, '美国原装进口Aveeno超舒缓泡沫洁面乳 敏感皮肤 180ml', 'AVEENO ULTRA-CALMING® Foaming Cleanser gently cleanses and softens even dry, sensitive skin while helps visibly reduce redness and calm irritation. This light foaming cleanser lifts away dirt, oil, and makeup without over- drying. The gentle, soap-free fo', 1, '170508100008aveeno-sensitive.jpg', '128.00', '5.69', '58.00', 'http://www.target.com/p/aveeno-174-ultra-calming-174-foaming-cleanser-for-sensitive-skin-6-fl-oz/-/A-11537197', '138.00', 'n/a', '2017-05-08 14:00:51', '2017-06-02 19:31:41', 10, 67, 26);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(20) NOT NULL,
  `pwd` char(32) NOT NULL DEFAULT '655cdcedf53e62921addc72ac48a4863',
  `wechat` char(20) NOT NULL DEFAULT '',
  `qq` int(11) NOT NULL DEFAULT '0',
  `cellphone` int(11) NOT NULL DEFAULT '0',
  `address` char(96) NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `email` char(32) NOT NULL DEFAULT '',
  `ip` char(15) NOT NULL DEFAULT '0.0.0.0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
