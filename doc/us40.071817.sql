-- --------------------------------------------------------
-- Host:                         54.236.60.216
-- Server version:               5.6.36 - MySQL Community Server (GPL)
-- Server OS:                    Linux
-- HeidiSQL Version:             9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for mph
DROP DATABASE IF EXISTS `mph`;
CREATE DATABASE IF NOT EXISTS `mph` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `mph`;


-- Dumping structure for table mph.cart
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table mph.cart: 0 rows
DELETE FROM `cart`;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;


-- Dumping structure for table mph.order
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table mph.order: 0 rows
DELETE FROM `order`;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
/*!40000 ALTER TABLE `order` ENABLE KEYS */;


-- Dumping structure for table mph.product
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
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- Dumping data for table mph.product: 36 rows
DELETE FROM `product`;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` (`id`, `name`, `description`, `status`, `images`, `my_price`, `us_price`, `us_cost`, `us_url`, `cn_price`, `cn_url`, `created_at`, `updated_at`, `category`, `favnum`, `soldnum`) VALUES
	(1, 'Gerber 嘉宝星星泡芙puffs， 42g， 宝宝辅食', 'Gerber 泡芙 1.48oz-42g', 1, '170504152317GerberPuffs.jpg', 38.00, 1.97, 20.00, 'https://www.walmart.com/ip/Gerber-Graduates-Puffs-Banana-Strawberry-Apple-Cereal-Snack-Variety-Pack-1.48-oz-4-count/50422899', 48.00, 'https://item.jd.hk/1952873685.html', '2017-05-01 21:34:00', '2017-06-13 16:44:50', 1, 1, 81),
	(2, '美国Aveeno Baby艾维诺宝宝燕麦润肤舒缓乳液防湿疹 139ml', '艾维诺宝宝润肤舒缓乳液', 1, '170504153918AveenoBabySoothing.jpg', 98.00, 4.97, 50.00, 'https://www.walmart.com/ip/Aveeno-Baby-Soothing-Relief-Moisturizing-Cream-5-oz/49883626', 108.00, 'https://item.jd.hk/1950407939.html', '2017-05-04 19:40:15', '2017-06-02 21:16:02', 2, 1, 5),
	(3, '美国原装进口Culturelle益生菌 康萃乐 维护肠胃健康 儿童咀嚼片 30粒/盒', '美国原装进口 康萃乐益生菌', 1, '170505231708cultab.jpg', 210.00, 18.59, 148.00, 'http://www.target.com/p/kid-s-culturelle-probiotic-bursting-berry-chewable-tablets-30-count/-/A-15146557', 218.00, 'https://item.jd.hk/1964063952.html', '2017-05-06 03:19:18', '2017-06-02 21:13:59', 2, 1, 6),
	(4, 'Ayer 艾儿钙C-20美国原装进口营养素饮料甘氨 宝宝补钙', '美国原装进口 口感好 不刺激肠胃', 1, '170505232043ayercal.jpg', 198.00, 15.19, 95.00, 'https://smile.amazon.com/Ayer-Calcium-Supplement-Drops/dp/B01FYDVSU8/', 209.00, 'https://world.tmall.com/item/10250132703.htm?id=10250132703', '2017-05-06 03:21:23', '2017-06-02 21:00:54', 2, 1, 6),
	(5, '美国原装进口Thinkbaby Sunscreen  宝宝防晒 SPF 50+ 3oz', '儿童男女隔离霜婴儿防晒霜spf50', 1, '170505232227thinkby.jpg', 148.00, 12.99, 106.00, 'http://www.target.com/p/thinkbaby-safe-sunscreen-spf-50-3oz/-/A-51525033', 168.00, 'https://item.jd.hk/1982784093.html', '2017-05-06 03:25:00', '2017-06-13 16:45:18', 2, 1, 0),
	(6, '美国Mederma 医生推荐 #1 For Kids Gel, 儿童祛疤, 20g', '美国进口疤痕 修复膏儿童版  祛手术疤新旧疤', 1, '170505232857medkid.jpg', 168.00, 17.97, 98.00, 'https://www.walmart.com/ip/10532847', 188.00, 'https://item.jd.hk/1955649145.html', '2017-05-06 03:29:32', '2017-06-02 21:08:25', 2, 1, 9),
	(7, '美国原装进口Ayer艾儿宝宝铁营养补充液美国原装进口甘氨酸亚铁50ml', '美国原装进口 口感好 不刺激肠胃', 1, '170505233324ayeriron.jpg', 198.00, 15.19, 95.00, 'https://smile.amazon.com/Ayer-Iron-Supplement-Drops/dp/B01FYD9RF6/', 209.00, 'https://world.tmall.com/item/10218892989.htm?id=10218892989', '2017-05-06 03:36:11', '2017-06-02 20:56:21', 2, 1, 6),
	(8, '美国原装进口Ayer艾儿宝宝补锌Z-30液体营养素饮料甘氨酸锌 50ml', '美国原装进口 口感好 不刺激肠胃', 1, '170505233848ayerzine.jpg', 198.00, 15.19, 95.00, 'https://smile.amazon.com/Ayer-Zinc-Supplement-Drops/dp/B01FYDVQXW/', 209.00, 'https://world.tmall.com/item/12500285024.htm?id=12500285024', '2017-05-06 03:39:31', '2017-06-02 20:59:43', 2, 1, 6),
	(9, '美国Culturelle益生菌 康萃乐 维护儿童肠胃健康 30包/盒', '', 1, '170505234653culpak.jpg', 210.00, 18.59, 148.00, 'http://www.target.com/p/culturelle-kids-probiotic-packets-30-count/-/A-13921277', 218.00, 'https://item.jd.hk/2666142.html', '2017-05-06 03:48:58', '2017-06-13 16:45:07', 2, 1, 6),
	(10, '美国原装进口Aveeno天然祛痘靓肤洗面奶 美皮肤科医生推荐 产地美国 非韩国 180ml', 'AVEENO® Clear Complexion Foaming Cleanser helps prevent breakouts and improve skin tone and texture. This foaming cleanser leaves skin feeling soft and smooth. Salicylic acid treats and clears up blemishes. The mild formula with ACTIVE NATURALS® soy extra', 1, '170508084737aveeno-acne.jpg', 126.00, 5.99, 56.00, 'http://www.target.com/p/aveeno-174-clear-complexion-foaming-cleanser-6-fl-oz/-/A-11537413', 136.00, 'n/a', '2017-05-08 12:52:48', '2017-06-02 20:47:45', 20, 1, 0),
	(11, '美国原装进口Aveeno天然洗面奶 平滑光亮面部皮肤， 改善面部肤色和纹理 200ml', 'AVEENO® POSITIVELY RADIANT® Brightening Cleanser lifts away dirt, oil, and makeup to help even skin tone and texture. This non-drying cleanser helps improve skin\'s tone and texture and reduces dullness. This cleanser with moisture-rich soy extract leaves ', 1, '170508090913aveeno-radiant.jpg', 118.00, 5.99, 59.00, 'http://www.target.com/p/aveeno-174-positively-radiant-174-brightening-cleanser-6-7-fl-oz/-/A-11537364', 126.00, 'n/a', '2017-05-08 13:10:08', '2017-06-02 20:46:02', 10, 1, 10),
	(12, '美国原装进口Aveeno天然大豆柠檬精华60秒沐浴洗面奶 深度清理 去死皮 还原亮丽自然肤色 141g', 'New AVEENO® ACTIVE NATURALS® POSITIVELY RADIANT® 60 Second In-Shower Facial reveals healthy, glowing skin 4x faster than at home masks and peels*. This oil-free facial treatment works with the steam of your shower to deeply but gently exfoliate all traces', 1, '170508091759aveeno-rad-60s.jpg', 138.00, 6.79, 68.00, 'http://www.target.com/p/aveeno-174-active-naturals-positively-radiant-60-second-in-shower-facial-5oz/-/A-51108532', 145.00, 'n/a', '2017-05-08 13:18:32', '2017-06-02 20:42:57', 10, 1, 0),
	(13, '美国原装进口Aveeno天然深度清洁去死皮按摩洗面乳 5oz 140g', 'AVEENO® POSITIVELY RADIANT® Skin Brightening Daily Scrub helps improve skin tone, texture, and clarity to reveal brighter, more radiant skin. It\'s designed to help improve dullness, blotchiness, so your skin looks and feels fresh. This unique formula comb', 1, '170508095816aveeno-scrub.jpg', 118.00, 4.79, 50.00, 'http://www.target.com/p/aveeno-174-positively-radiant-174-skin-brightening-daily-scrub-5-oz/-/A-11537365', 128.00, 'n/a', '2017-05-08 13:57:58', '2017-06-02 20:41:31', 10, 1, 0),
	(14, '美国原装进口Aveeno超舒缓泡沫洁面乳 敏感皮肤 180ml', 'AVEENO ULTRA-CALMING® Foaming Cleanser gently cleanses and softens even dry, sensitive skin while helps visibly reduce redness and calm irritation. This light foaming cleanser lifts away dirt, oil, and makeup without over- drying. The gentle, soap-free fo', 1, '170508100008aveeno-sensitive.jpg', 128.00, 5.69, 58.00, 'http://www.target.com/p/aveeno-174-ultra-calming-174-foaming-cleanser-for-sensitive-skin-6-fl-oz/-/A-11537197', 138.00, 'n/a', '2017-05-08 14:00:51', '2017-06-02 19:31:41', 10, 1, 0),
	(15, '瑞士Invicta Pro潜水员表 200m防水', 'INVICTA是瑞士超100年历史的手表品牌之一', 0, '', 1380.00, 99.99, 860.00, 'https://www.costco.com/Invicta-Pro-Diver-Scuba-Watch.product.100343913.html', 1550.00, 'https://detail.tmall.hk/hk/item.htm?id=546475751426', '2017-06-03 13:17:07', '2017-06-03 13:17:07', 30, 0, 0),
	(16, '瑞士Invicta Pro潜水员表 200m防水', 'INVICTA是瑞士超100年历史的手表品牌之一', 1, '170604184016InvictaProDiver.jpg', 1380.00, 99.99, 860.00, 'https://www.costco.com/Invicta-Pro-Diver-Scuba-Watch.product.100343913.html', 1550.00, '', '2017-06-04 18:40:23', '2017-06-04 18:40:23', 30, 1, 0),
	(17, '美国原装进口Thinkbaby内不锈钢无BPA宝宝餐具套装 多色可选', 'The Complete BPA Free Feeding Set', 1, '170607161601thinkbabyfeedset.jpg', 368.00, 35.00, 335.00, 'https://smile.amazon.com/dp/B00HT6EAUE/', 638.00, 'https://item.jd.hk/1983377693.html', '2017-06-07 16:16:11', '2017-07-08 12:29:44', 2, 1, 4),
	(18, '美国原装进口B Box水杯 无BPA', 'B Box Watermelon Sippy Cup Limited Edition BPA free', 1, '170607163227bboxcup.jpg', 138.00, 12.00, 118.00, 'https://smile.amazon.com/gp/product/B01B7G2AO4/', 148.00, 'http://item.jd.com/10919446068.html', '2017-06-07 16:35:02', '2017-06-13 17:49:34', 2, 1, 16),
	(19, '美国原装进口Aveeno Baby 天然燕麦洗发沐浴液二合一 236ml', '美国原装进口Aveeno Baby wash&shampoo天然燕麦洗发沐浴液二合一 236ml', 1, '170609013522aveenobabywash.jpg', 98.00, 4.97, 58.00, 'https://www.walmart.com/ip/Aveeno-Baby-Wash-Shampoo-8-oz/16940612', 108.00, 'https://item.jd.hk/1952623641.html', '2017-06-09 01:37:47', '2017-06-13 16:44:59', 2, 1, 0),
	(30, '美国医生推荐热销#1耐信Nexium胃药三盒装', '美国医生推荐热销#1耐信Nexium胃药， 125/盒', 1, '170613170642nexium.jpg', 328.00, 23.99, 188.00, 'http://www.target.com/p/nexium-24hr-20mg-acid-reducer-tablet-42-count/-/A-50220782', 358.00, 'https://item.jd.hk/1983571049.html', '2017-06-13 17:09:17', '2017-06-12 17:09:17', 60, 1, 6),
	(20, '美国发货JBL Flip3 防水蓝牙音箱', 'Full-featured splashproof portable speaker with surprisingly powerful sound in a compact form', 1, '170609174658jbl_flip3.jpg', 780.00, 79.95, 674.80, 'http://www.jbl.com/bluetooth-speakers/JBL+FLIP+III.html?dwvar_JBL%20FLIP%20III_color=Black', 820.00, 'https://item.jd.hk/1977700422.html', '2017-06-09 17:52:32', '2017-06-09 18:28:45', 20, 1, 0),
	(21, '美国发货JBL GO 音乐金砖 蓝牙音箱 低音炮 便携迷你 多色可选', 'Full-featured, great-sounding, great-value portable speaker', 1, '170609175802jbl_go.jpg', 239.00, 19.95, 196.00, 'http://www.jbl.com/JBLGOBLUE.html', 259.00, 'http://item.jd.com/1436718.html', '2017-06-09 17:58:06', '2017-07-08 12:13:36', 20, 1, 0),
	(22, '美国发货JBL T450BT 无线蓝牙头戴式耳机 带麦', 'JBL T450BTWireless on-ear headphones', 1, '170609180121jbl_T450BT.jpg', 458.00, 44.95, 375.00, 'http://www.jbl.com/JBLT450BTBLK.html', 489.00, 'http://item.jd.com/4215862.html', '2017-06-09 18:02:53', '2017-06-09 18:29:56', 20, 1, 0),
	(23, '美国发货JBL yurbuds Inspire 100运动耳机防汗', 'Inspire® 100 Mossy Oak In-the-ear, sport earphones feature TwistLock® Technology 懂的都说好', 1, '170609180754inspire100_mo.jpg', 158.00, 4.99, 42.00, 'http://www.jbl.com/YBMOINSP01GREAM.html', 188.00, 'na', '2017-06-09 18:12:19', '2017-06-09 18:29:41', 20, 1, 0),
	(24, '美国发货JBL Flip4 防水蓝牙音箱', 'Full-featured splashproof portable speaker with surprisingly powerful sound in a compact form', 1, '170609181412jbl_flip4.jpg', 998.00, 99.95, 826.00, 'http://www.jbl.com/bluetooth-speakers/JBL+Flip+4.html?dwvar_JBL%20Flip%204_color=Black', 1099.00, 'https://item.jd.com/4946152.html', '2017-06-09 18:16:32', '2017-06-12 15:39:38', 30, 1, 0),
	(25, '美国发货JBL Xtreme', 'JBL’s ultimate splashproof portable speaker with ultra-powerful performance and comprehensive features', 1, '170609181956jbl_extreme.jpg', 1998.00, 229.95, 1809.00, 'http://www.jbl.com/bluetooth-speakers/XTREME.html?dwvar_XTREME_color=Black#start=1', 2699.00, 'http://item.jd.com/4935086.html', '2017-06-09 18:23:00', '2017-06-09 19:20:12', 30, 1, 0),
	(26, '美国发货Bose蓝牙Mini II代 黑金限量版 美亚五星', 'Bose SoundLink Mini II (Black/Copper) - Limited Edition', 1, '170612152404BoseMiniII.jpg', 1798.00, 179.00, 1458.00, 'https://smile.amazon.com/Bose-SoundLink-Mini-Black-Copper', 1880.00, 'http://item.jd.com/3169597.html', '2017-06-12 15:29:44', '2017-06-12 15:29:44', 30, 2, 0),
	(27, '美国发货Bose QC35专业无线蓝牙耳麦 消噪 消噪 消噪', '音乐发烧不备有罪', 1, '170612153411BoseQuietComfort35.jpg', 2888.00, 349.00, 2722.00, 'https://smile.amazon.com/Bose-QuietComfort-Wireless-Headphones-Cancelling', 2988.00, 'http://item.jd.com/3599502.html', '2017-06-12 15:38:45', '2017-06-12 15:38:45', 30, 1, 0),
	(28, '美国发货瑞士军用品牌Wenger威戈经典男表', '不锈钢表盘 皮质表带 瑞士军品经典', 1, '170612154812WengerMen.jpg', 1498.00, 119.99, 991.00, 'https://www.costco.com/Wenger-Gents-Classic-Stainless-Steel-Men\'s-Watch.product.100312383.html', 1688.00, 'https://item.jd.hk/1975961963.html', '2017-06-12 15:53:40', '2017-06-12 16:00:42', 30, 1, 0),
	(29, '美国直邮 MK TINA 北美限量版 不撞包 ;-D', 'NWT,MICHAEL KORS MK MONOGRAM TINA MEDIUM CHAIN SATCHEL CROSSBODY HANDBAG', 1, '170613164345mk_tina.jpg', 1798.00, 158.00, 1500.00, 'http://www.ebay.com/itm/NWT-MICHAEL-KORS-MK-MONOGRAM-TINA-MEDIUM-CHAIN-SATCHEL-CROSSBODY-HANDBAG-WALLET/172724774807', 1998.00, 'na', '2017-06-13 16:43:58', '2017-06-13 19:06:33', 10, 1, 0),
	(31, '美国发货Culturelle益生菌 康萃乐 维护肠胃健康 儿童咀嚼片 60粒/盒', 'Culturelle Kids Chewables Probiotic, 60 Tablets', 1, '170618034147culturelle60.jpg', 348.00, 24.99, 193.00, 'https://www.costco.com/Culturelle-Kids-Chewables-Probiotic%2c-60-Tablets.product.100073152.html', 360.00, 'https://item.jd.hk/1956387173.html', '2017-06-18 03:41:52', '2017-06-18 03:41:52', 2, 0, 0),
	(32, '美国直邮美医生推荐#1 Refresh tears人工泪 抗疲劳 干涩 过敏 不含防腐剂', 'Refresh Tears Multi-pack 4大（15ml）1小（5ml） 长期用电脑手机眼不适必备', 1, '170620172641refreshdrop.jpg', 238.00, 21.59, 168.00, 'https://www.costco.com/Refresh-Tears-Multi-pack%2c-65-ml..product.11590056.html', 258.00, 'https://item.jd.hk/1986064196.html', '2017-06-20 17:29:04', '2017-06-20 17:30:56', 60, 0, 0),
	(33, '美国发货原装Gerber Melts溶豆', 'Gerber Graduates Fruit & Veggie Melts Very Berry Blend 1 oz', 1, '170708124741gerbermelt.jpg', 39.00, 2.47, 28.00, 'https://www.target.com/p/gerber-graduates-fruit-veggie-melts-very-berry-blend-1-oz/-/A-13996946', 39.50, 'https://item.jd.hk/1956617171.html', '2017-07-08 12:46:47', '2017-07-08 13:03:12', 1, 0, 0),
	(34, '美国挪威小鱼Nordic Naturals挪威鱼油深海鳕鱼油婴幼儿补充DHA维生素D3 小鱼60ml', '美国挪威小鱼Nordic Naturals挪威鱼油深海鳕鱼油婴幼儿补充DHA维生素D3 小鱼60ml ', 1, '170708125453nordicdha.jpg', 129.00, 15.95, 119.00, 'https://smile.amazon.com/Nordic-Naturals-Supports-Visual-Development/dp/B003DYQ59U/', 75.00, 'https://item.jd.hk/1975791542.html', '2017-07-08 12:55:01', '2017-07-08 12:59:40', 1, 0, 0),
	(35, '美国Gerber嘉宝婴儿营养米粉227g', 'Gerber Oatmeal Baby Cereal, 8 oz', 1, '170708131800gerberrice.jpg', 65.00, 3.18, 52.50, 'https://www.walmart.com/ip/Gerber-Oatmeal-Baby-Cereal-8-oz/23803895', 69.00, 'https://item.jd.hk/1951657427.html', '2017-07-08 13:18:04', '2017-07-08 13:18:04', 1, 0, 0),
	(36, '美国原装进口小蜜蜂 Burt’s Bees 天然蜂蜡保湿滋润护唇膏  孕妇可用', '两支55， 4支100', 1, '170709151717burtsbees.jpg', 29.00, 2.25, 17.50, 'https://smile.amazon.com/Burts-Bees-Natural-Moisturizing-Beeswax/dp/B0054LHI5A/', 38.00, 'https://item.jd.hk/1065770271.html', '2017-07-09 15:17:21', '2017-07-09 15:17:21', 10, 0, 0);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;


-- Dumping structure for table mph.user
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table mph.user: 0 rows
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
