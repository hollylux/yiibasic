-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 06, 2017 at 10:19 PM
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
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `ship_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deliver_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
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
  `image_name` char(36) NOT NULL DEFAULT '',
  `price` decimal(6,2) NOT NULL,
  `walmart_price` decimal(6,2) NOT NULL DEFAULT '0.00',
  `walmart_url` char(255) NOT NULL DEFAULT '',
  `tmall_price` decimal(6,2) NOT NULL DEFAULT '0.00',
  `tmall_url` char(255) NOT NULL DEFAULT '',
  `costco_price` decimal(6,2) NOT NULL DEFAULT '0.00',
  `costco_url` char(255) NOT NULL DEFAULT '',
  `target_price` decimal(6,2) NOT NULL DEFAULT '0.00',
  `target_url` char(255) NOT NULL DEFAULT '',
  `amazon_price` decimal(6,2) NOT NULL DEFAULT '0.00',
  `amazon_url` char(255) NOT NULL DEFAULT '',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `status`, `image_name`, `price`, `walmart_price`, `walmart_url`, `tmall_price`, `tmall_url`, `costco_price`, `costco_url`, `target_price`, `target_url`, `amazon_price`, `amazon_url`, `create_time`, `update_time`) VALUES
(1, 'Aveeno Soothing Relief,艾惟诺 婴儿燕麦舒缓霜,139ml', '', 1, '', '79.00', '0.00', 'https://www.walmart.com/ip/Aveeno-Baby-Soothing-Relief-Moisturizing-Cream-5-oz/49883626', '79.00', 'https://detail.tmall.hk/hk/item.htm?spm=a220m.1000862.1000725.6.cLCdeN&id=537215123520&is_b=1&cat_id=2&rn=936183788ed81dc9b584fc4888c330a7', '0.00', '', '38.00', 'http://www.target.com/p/aveeno-baby-soothing-relief-moisture-cream-5-oz/-/A-13682482', '37.00', 'https://www.amazon.com/Aveeno-Soothing-Relief-Moisturizing-Cream/dp/B01EMYYK5A/ref=sr_1_20_s_it?ie=UTF8&qid=1491322371&sr=1-20&keywords=aveeno+baby', '2017-04-05 23:03:51', '2017-04-05 23:03:51'),
(2, 'Aveeno Soothing Relief,艾惟诺 婴儿燕麦舒缓霜,139ml', '', 1, '', '79.00', '37.00', '', '79.00', '', '38.00', '', '38.00', '', '38.00', '', '2017-04-05 19:42:41', '2017-04-05 19:42:41');

-- --------------------------------------------------------

--
-- Table structure for table `product_history`
--

DROP TABLE IF EXISTS `product_history`;
CREATE TABLE IF NOT EXISTS `product_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `walmart_price` decimal(6,2) NOT NULL DEFAULT '0.00',
  `walmart_url` char(255) NOT NULL DEFAULT '',
  `tmall_price` decimal(6,2) NOT NULL DEFAULT '0.00',
  `tmall_url` char(255) NOT NULL DEFAULT '',
  `amazon_price` decimal(6,2) NOT NULL DEFAULT '0.00',
  `amazon_url` char(255) NOT NULL DEFAULT '',
  `target_price` decimal(6,2) NOT NULL DEFAULT '0.00',
  `target_url` char(255) NOT NULL DEFAULT '',
  `costco_price` decimal(6,2) NOT NULL DEFAULT '0.00',
  `costco_url` char(255) NOT NULL DEFAULT '',
  `price` decimal(6,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `comment` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `email` char(32) NOT NULL DEFAULT '',
  `ip` char(15) NOT NULL DEFAULT '0.0.0.0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
