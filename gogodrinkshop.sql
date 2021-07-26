-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- 主機: localhost
-- 產生時間： 2021-01-15 07:43:21
-- 伺服器版本: 5.7.17-log
-- PHP 版本： 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `gogodrinkshop`
--

-- --------------------------------------------------------

--
-- 資料表結構 `cart`
--

CREATE TABLE `cart` (
  `cart_id` char(4) NOT NULL,
  `user_id` varchar(11) NOT NULL,
  `drink_id` char(4) NOT NULL,
  `size` char(1) NOT NULL,
  `sweet` int(4) NOT NULL,
  `ice` int(4) NOT NULL,
  `topping_id` char(4) DEFAULT NULL,
  `status` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `drink_id`, `size`, `sweet`, `ice`, `topping_id`, `status`) VALUES
('C001', 'a1075516', 'D007', 'M', 10, 10, 'T011', 2),
('C002', 'a1075516', 'D007', 'M', 10, 10, 'T011', 2),
('C003', 'a1075516', 'D007', 'L', 7, 7, 'T008', 2),
('C004', 'root', 'D001', 'L', 7, 7, 'T009', 2),
('C005', 'root', 'D001', 'M', 0, 0, NULL, 2),
('C006', 'root', 'D032', 'L', 7, 7, 'T008', 2);

-- --------------------------------------------------------

--
-- 資料表結構 `drinks`
--

CREATE TABLE `drinks` (
  `drink_id` char(4) NOT NULL COMMENT '飲料編號',
  `drink_name` varchar(10) NOT NULL COMMENT '飲料名稱',
  `mid_price` int(2) NOT NULL COMMENT '中杯價格',
  `large_price` int(2) NOT NULL COMMENT '大杯價格',
  `status` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `drinks`
--

INSERT INTO `drinks` (`drink_id`, `drink_name`, `mid_price`, `large_price`, `status`) VALUES
('D001', 'gogo奶茶', 40, 50, 1),
('D002', 'gogo巧克力', 50, 60, 1),
('D003', 'gogo咖啡', 60, 70, 1),
('D004', 'QQ奶茶', 45, 55, 1),
('D005', '雙拼巧克力', 55, 65, 1),
('D006', '雙戀奶茶', 50, 60, 1),
('D007', '奶蓋咖啡', 55, 65, 1),
('D008', '布丁巧克力', 50, 60, 1),
('D009', '紅豆奶茶', 45, 55, 1),
('D010', '紅豆巧克力', 50, 60, 1),
('D011', '西米露奶茶', 45, 55, 1),
('D012', '西米露巧克力', 50, 60, 1),
('D013', '芒果多多', 65, 75, 1),
('D014', '金桔檸檬', 60, 70, 1),
('D015', '檸檬椰果多多', 60, 70, 1),
('D016', '珍珠巧克力', 55, 65, 1),
('D017', '珍珠拿鐵', 60, 70, 1),
('D018', '美式咖啡', 50, 60, 1),
('D019', '茉莉綠茶', 30, 40, 1),
('D020', '香草拿鐵', 50, 60, 1),
('D021', '焦糖瑪奇朵', 50, 60, 1),
('D022', '摩卡咖啡', 50, 60, 1),
('D023', '椰果奶茶', 50, 60, 1),
('D024', '鮮檸檬紅茶', 50, 60, 1),
('D025', '慕斯奶蓋紅茶', 50, 60, 1),
('D026', '慕斯奶蓋綠茶', 50, 60, 1),
('D027', '摩卡咖啡', 50, 60, 1),
('D028', '仙草凍奶茶', 50, 60, 1),
('D029', '法式瑪奇朵咖啡', 60, 70, 1),
('D030', '拿鐵', 50, 60, 1),
('D031', '舒跑', 25, 40, 1),
('D032', '618運動飲料', 25, 40, 1),
('D033', '仙草凍奶茶', 50, 80, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `drink_order`
--

CREATE TABLE `drink_order` (
  `drink_order_id` char(5) NOT NULL COMMENT '訂購飲料編號',
  `order_id` char(4) NOT NULL COMMENT '訂單編號',
  `drink_id` char(4) NOT NULL COMMENT '飲料編號',
  `sweet` int(2) NOT NULL COMMENT '甜度',
  `ice` int(2) NOT NULL COMMENT '冰塊',
  `size` char(1) NOT NULL COMMENT '尺寸'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `drink_order`
--

INSERT INTO `drink_order` (`drink_order_id`, `order_id`, `drink_id`, `sweet`, `ice`, `size`) VALUES
('DO001', 'O001', 'D007', 10, 10, 'M'),
('DO002', 'O001', 'D007', 10, 10, 'M'),
('DO003', 'O001', 'D007', 7, 7, 'L'),
('DO004', 'O002', 'D001', 7, 7, 'L'),
('DO005', 'O003', 'D001', 0, 0, 'M'),
('DO006', 'O003', 'D032', 7, 7, 'L');

-- --------------------------------------------------------

--
-- 資料表結構 `orders`
--

CREATE TABLE `orders` (
  `order_id` char(4) NOT NULL COMMENT '訂單編號',
  `buyer_id` varchar(10) NOT NULL COMMENT '訂購人帳號',
  `addr` varchar(30) NOT NULL COMMENT '送貨地址',
  `phone_num` varchar(10) NOT NULL COMMENT '聯絡電話',
  `order_date` datetime NOT NULL COMMENT '訂購日期',
  `pay_way` varchar(10) NOT NULL COMMENT '付款方式',
  `pickup_way` varchar(10) NOT NULL COMMENT '取貨方式',
  `sum_money` int(4) NOT NULL COMMENT '總金額',
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `orders`
--

INSERT INTO `orders` (`order_id`, `buyer_id`, `addr`, `phone_num`, `order_date`, `pay_way`, `pickup_way`, `sum_money`, `status`) VALUES
('O001', 'a1075516', '高大', '090109923', '2021-01-14 17:13:19', 'cash', 'delivery', 285, 3),
('O002', 'root', 'root', '098888888', '2021-01-14 21:52:09', 'cash', 'delivery', 55, 0),
('O003', 'root', 'root', '098888888', '2021-01-14 21:53:38', 'cash', 'delivery', 90, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `shop_users`
--

CREATE TABLE `shop_users` (
  `admin_id` varchar(11) NOT NULL,
  `admin_pwd` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `shop_users`
--

INSERT INTO `shop_users` (`admin_id`, `admin_pwd`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- 資料表結構 `toppings`
--

CREATE TABLE `toppings` (
  `topping_id` char(4) NOT NULL COMMENT '配料ID',
  `topping_name` varchar(5) NOT NULL COMMENT '配料名稱',
  `topping_price` int(2) NOT NULL COMMENT '配料價格',
  `status` int(2) NOT NULL DEFAULT '1' COMMENT '配料狀態'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `toppings`
--

INSERT INTO `toppings` (`topping_id`, `topping_name`, `topping_price`, `status`) VALUES
('T001', '珍珠', 5, 1),
('T002', '波霸', 5, 1),
('T003', '布丁', 10, 1),
('T004', '薏仁', 10, 1),
('T005', '仙草', 10, 1),
('T006', '愛玉', 10, 1),
('T007', '西米露', 10, 1),
('T008', '蘆薈', 10, 1),
('T009', '紅豆', 5, 1),
('T010', '椰果', 10, 1),
('T011', '豆腐', 50, 1),
('T012', '麻糬', 20, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `topping_order`
--

CREATE TABLE `topping_order` (
  `topping_order_id` char(5) NOT NULL COMMENT '無用流水號',
  `drink_order_id` char(5) NOT NULL COMMENT '訂購飲料編號',
  `topping_id` char(4) NOT NULL COMMENT '配料編號'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `topping_order`
--

INSERT INTO `topping_order` (`topping_order_id`, `drink_order_id`, `topping_id`) VALUES
('TO001', 'DO001', 'T011'),
('TO002', 'DO002', 'T011'),
('TO003', 'DO003', 'T008'),
('TO004', 'DO004', 'T009'),
('TO005', 'DO006', 'T008');

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `user_id` varchar(10) NOT NULL COMMENT '用戶帳號',
  `name` varchar(10) NOT NULL COMMENT '用戶名',
  `phone_num` varchar(10) NOT NULL COMMENT '電話號碼',
  `pwd` varchar(20) NOT NULL COMMENT '密碼',
  `addr` varchar(30) NOT NULL COMMENT '地址',
  `mail` varchar(50) NOT NULL COMMENT '電子郵件',
  `status` int(2) NOT NULL DEFAULT '1' COMMENT '使用者狀態'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `users`
--

INSERT INTO `users` (`user_id`, `name`, `phone_num`, `pwd`, `addr`, `mail`, `status`) VALUES
('a1075516', '林翰廷', '090109923', 'test1', '高大', 'a1075516@mail.nuk.edu.tw', 1),
('000', '小松', '0905000000', '000', '高雄市楠梓區高雄大學路700號', 'gogonukclient@gmail.com', 1),
('root', 'root', '098888888', '12345678', 'root', 'root@oroot', 1);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `drink_id` (`drink_id`),
  ADD KEY `topping_id` (`topping_id`);

--
-- 資料表索引 `drinks`
--
ALTER TABLE `drinks`
  ADD PRIMARY KEY (`drink_id`),
  ADD KEY `drink_id` (`drink_id`);

--
-- 資料表索引 `drink_order`
--
ALTER TABLE `drink_order`
  ADD PRIMARY KEY (`drink_order_id`),
  ADD KEY `drink_order_id` (`drink_order_id`),
  ADD KEY `drink_order_id_2` (`drink_order_id`),
  ADD KEY `drink_id` (`drink_id`),
  ADD KEY `order_id` (`order_id`);

--
-- 資料表索引 `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `buyer_id` (`buyer_id`);

--
-- 資料表索引 `shop_users`
--
ALTER TABLE `shop_users`
  ADD PRIMARY KEY (`admin_id`);

--
-- 資料表索引 `toppings`
--
ALTER TABLE `toppings`
  ADD PRIMARY KEY (`topping_id`),
  ADD KEY `topping_id` (`topping_id`);

--
-- 資料表索引 `topping_order`
--
ALTER TABLE `topping_order`
  ADD PRIMARY KEY (`topping_order_id`),
  ADD KEY `topping_order_id` (`topping_order_id`),
  ADD KEY `drink_order_id` (`drink_order_id`),
  ADD KEY `topping_order_id_2` (`topping_order_id`),
  ADD KEY `topping_order_id_3` (`topping_order_id`),
  ADD KEY `topping_id` (`topping_id`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`mail`),
  ADD KEY `user_id` (`user_id`);

--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`drink_id`) REFERENCES `drinks` (`drink_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_3` FOREIGN KEY (`topping_id`) REFERENCES `toppings` (`topping_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `drink_order`
--
ALTER TABLE `drink_order`
  ADD CONSTRAINT `drink_order_ibfk_1` FOREIGN KEY (`drink_id`) REFERENCES `drinks` (`drink_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `drink_order_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`buyer_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `topping_order`
--
ALTER TABLE `topping_order`
  ADD CONSTRAINT `topping_order_ibfk_1` FOREIGN KEY (`drink_order_id`) REFERENCES `drink_order` (`drink_order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `topping_order_ibfk_2` FOREIGN KEY (`topping_id`) REFERENCES `toppings` (`topping_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
