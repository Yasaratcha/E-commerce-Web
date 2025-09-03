-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2025 at 06:03 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biteandbrews`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(70) NOT NULL,
  `admin_email` varchar(70) NOT NULL,
  `admin_password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `payment_id` int(70) NOT NULL,
  `order_cost` decimal(10,2) NOT NULL,
  `order_status` varchar(20) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_phone` int(11) NOT NULL,
  `user_city` varchar(50) NOT NULL,
  `user_address` varchar(50) NOT NULL,
  `order_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `product_img` varchar(60) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(70) NOT NULL,
  `fname` varchar(70) NOT NULL,
  `lname` varchar(70) NOT NULL,
  `user_email` varchar(70) NOT NULL,
  `payment_method` varchar(70) NOT NULL,
  `payment_cost` decimal(10,2) NOT NULL,
  `payment_status` varchar(70) NOT NULL,
  `user_city` varchar(70) NOT NULL,
  `user_address` varchar(70) NOT NULL,
  `payment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(70) NOT NULL,
  `product_category` varchar(70) NOT NULL,
  `product_description` varchar(120) NOT NULL,
  `product_img` varchar(70) NOT NULL,
  `product_img1` varchar(70) NOT NULL,
  `product_img2` varchar(70) NOT NULL,
  `product_img3` varchar(70) NOT NULL,
  `product_img4` varchar(70) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `is_deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_category`, `product_description`, `product_img`, `product_img1`, `product_img2`, `product_img3`, `product_img4`, `product_price`, `is_deleted`) VALUES
(1, 'Blueberry Cheesecake', 'Pastries', 'Indulge in the perfect balance of creamy and fruity with our luscious Blueberry Cheesecake. Made with a rich, velvety cr', 'bcheesecake.jpg', 'bcheesecake.jpg', 'americano.jpg', 'caramel.jpg', 'carrotcake.jpg', 199.00, 0),
(2, 'Americano', 'Coffee', 'Our Americano is crafted with rich, freshly brewed espresso delicately blended with hot water to create a smooth, full-b', 'americano.jpg', 'americano.jpg', 'caramel.jpg', 'carrotcake.jpg', 'chocolate muffin.jpg', 99.00, 0),
(3, 'Choco Caramel', 'Milktea', 'A decadent treat that brings together the best of both worlds rich, velvety chocolate and smooth, buttery caramel.', 'caramel.jpg', 'caramel.jpg', 'carrotcake.jpg', 'chocolate muffin.jpg', 'Watermelon.jpg', 99.00, 0),
(4, 'Carrot Cake', 'Pastries', 'Moist, spiced, and irresistibly comforting our Carrot Cake is baked to perfection with freshly grated carrots, warm cinn', 'carrotcake.jpg', 'chocolate muffin.jpg', 'Watermelon.jpg', 'chocolate.jpg', 'cinnamon.jpg', 199.00, 0),
(5, 'Choco Muffin', 'Pastries', 'Soft, rich, and packed with chocolatey goodness—our Choco Muffin is a treat made for true chocolate lovers. Baked to per', 'chocolate muffin.jpg', 'Watermelon.jpg', 'chocolate.jpg', 'cinnamon.jpg', 'cookies-and-cream-milk.jpg', 99.00, 0),
(6, 'Watermelon Slushie', 'Milktea', 'Cool down with the ultimate taste of summer our Watermelon Slushie! Made with juicy, ripe watermelon blended into an icy', 'Watermelon.jpg', 'cookies-and-cream-milk.jpg', 'chocolate.jpg', 'cinnamon.jpg', 'espresso.jpg', 99.00, 0),
(7, 'Creamy Chocolate', 'Milktea', 'Indulge in the perfect blend of rich, creamy chocolate and the smooth taste of classic milk tea. Every sip offers a comf', 'chocolate.jpg', 'cinnamon.jpg', 'cookies-and-cream-milk.jpg', 'espresso.jpg', 'latte.jpg', 99.00, 0),
(8, 'Goey Cinnamon', 'Pastries', 'Soft, warm, and irresistibly sweet our Gooey Cinnamon treat is baked to perfection and swirled with layers of rich cinna', 'cinnamon.jpg', 'cookies-and-cream-milk.jpg', 'espresso.jpg', 'latte.jpg', 'limejuice.jpg', 99.00, 0),
(9, 'Cookies and Cream', 'Milktea', 'timeless favorite brought to life our Cookies and Cream is a creamy, dreamy blend of smooth sweetness and crunchy cookie', 'cookies-and-cream-milk.jpg', 'espresso.jpg', 'latte.jpg', 'limejuice.jpg', 'Matcha-Milk.jpg', 99.00, 0),
(10, 'Espresso', 'Coffee', 'Strong, smooth, and full of character our Espresso is the pure essence of coffee in its most concentrated form. Expertly', 'espresso.jpg', 'latte.jpg', 'limejuice.jpg', 'Matcha-Milk.jpg', 'okinawa.jpg', 99.00, 0),
(11, 'Latte', 'Coffee', 'Creamy, comforting, and perfectly balanced our Latte is made with rich, freshly pulled espresso blended seamlessly with ', 'latte.jpg', 'limejuice.jpg', 'Matcha-Milk.jpg', 'okinawa.jpg', 'Strawberry.jpg', 99.00, 0),
(12, 'Lime Juice', 'Milktea', 'Zesty, tangy, and refreshing our Lime Juice is the perfect thirst quencher for any occasion. Made with the fresh squeeze', 'limejuice.jpg', 'Matcha-Milk.jpg', 'okinawa.jpg', 'Strawberry.jpg', 'strawberry-matcha.jpg', 99.00, 0),
(13, 'Matcha', 'Milktea', 'Earthy, creamy, and irresistibly smooth our Matcha Milk Tea is crafted from premium green tea powder blended with fresh ', 'Matcha-Milk.jpg', 'okinawa.jpg', 'Strawberry.jpg', 'strawberry-matcha.jpg', 'Taro.jpg', 99.00, 0),
(14, 'Okinawa', 'Milktea', 'Smooth, creamy, and uniquely comforting our Okinawa Milk Tea is made with freshly brewed black tea, blended with rich mi', 'okinawa.jpg', 'Strawberry.jpg', 'strawberry-matcha.jpg', 'Taro.jpg', 'chocolate brownie.jpg', 99.00, 0),
(15, 'Strawberry', 'Milktea', 'Sweet, creamy, and refreshingly fruity our Strawberry Milk Tea is a perfect blend of freshly brewed tea, smooth milk, an', 'Strawberry.jpg', 'strawberry-matcha.jpg', 'Taro.jpg', 'chocolate brownie.jpg', 'strawberryroll.jpg', 99.00, 0),
(16, 'Strawberry Matcha', 'Milktea', 'A delightful fusion of flavors—our Strawberry Matcha combines the earthy richness of premium green tea with the sweet, f', 'strawberry-matcha.jpg', 'Taro.jpg', 'chocolate brownie.jpg', 'strawberryroll.jpg', 'bcheesecake.jpg', 99.00, 0),
(17, 'Taro', 'Milktea', 'Rich, smooth, and naturally sweet our Taro Milk Tea is made with the delicate flavor of taro root, blended into a creamy', 'Taro.jpg', 'americano.jpg', 'chocolate brownie.jpg', 'strawberryroll.jpg', 'caramel.jpg', 99.00, 0),
(18, 'Chocolate Brownies', 'Pastries', 'Fudgy, rich, and irresistibly indulgent—our Chocolate Brownies are baked to perfection with premium cocoa and just the r', 'chocolate brownie.jpg', 'strawberryroll.jpg', 'carrotcake.jpg', 'chocolate.jpg', 'espresso.jpg', 99.00, 0),
(19, 'Strawberry Roll', 'Pastries', 'Light, fluffy, and delightfully sweet our Strawberry Roll is a soft sponge cake wrapped around a smooth, creamy filling ', 'strawberryroll.jpg', 'Strawberry.jpg', 'cinnamon.jpg', 'cookies-and-cream-milk.jpg', 'Taro.jpg', 199.00, 0),
(20, 'Red Eye', 'Coffee', 'Need a serious caffeine kick to power through your day? Red-Eye Coffee is the bold answer. This energizing blend combine', 'red-eye.jpg', '', '', '', '', 99.00, 0),
(21, 'Mocha', 'Coffee', 'Indulge in the perfect harmony of rich espresso, velvety steamed milk, and smooth chocolate. Mocha Coffee is a delightfu', 'Mocha.jpg', '', '', '', '', 99.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(70) NOT NULL,
  `lname` varchar(70) NOT NULL,
  `user_email` varchar(70) NOT NULL,
  `user_password` varchar(70) NOT NULL,
  `access` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
