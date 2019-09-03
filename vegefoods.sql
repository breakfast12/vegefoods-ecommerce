-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2019 at 07:09 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vegefoods`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresss`
--

CREATE TABLE `addresss` (
  `id_address` int(10) UNSIGNED NOT NULL,
  `id_payment` int(10) UNSIGNED DEFAULT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `address` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `postcode` int(11) NOT NULL,
  `province` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `addresss`
--

INSERT INTO `addresss` (`id_address`, `id_payment`, `id_user`, `address`, `country`, `city`, `postcode`, `province`, `created_at`, `updated_at`) VALUES
(5, 5, 5, '321 Street Mango Number 3', 'United States', 'Oakland', 12345, 'NY', '2019-09-02 04:34:59', '2019-09-02 04:34:59');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id_level` int(10) UNSIGNED NOT NULL,
  `nama_level` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id_level`, `nama_level`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2019-08-20 09:30:38', NULL),
(2, 'users', '2019-08-20 09:30:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_13_072540_create_levels_table', 1),
(6, '2019_08_15_083117_create_products_table', 2),
(7, '2019_08_28_132124_create_payments_table', 3),
(8, '2019_08_29_160148_create_addresss_table', 4),
(9, '2019_09_02_065159_create_orders_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_orders` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id_payment` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `cc_number` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cvv` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `exp_date` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id_payment`, `id_user`, `cc_number`, `name`, `cvv`, `exp_date`, `type`, `created_at`, `updated_at`) VALUES
(1, 5, '3421356409236809', 'Fresa Ridho', '123', '03/20', 'Visa', '2019-09-02 03:17:08', '2019-09-02 03:17:08'),
(2, 5, '3482901948572345', 'Fresa Ridho', '12', '03/20', 'MasterCard', '2019-09-02 03:38:02', '2019-09-02 03:38:02'),
(3, 5, '3459102934859023', 'Fresa Ridho', '123', '03/20', 'MasterCard', '2019-09-02 03:41:12', '2019-09-02 03:41:12'),
(4, 5, '3459028931094586', 'Fresa Ridho', '123', '03/20', 'MasterCard', '2019-09-02 03:45:08', '2019-09-02 03:45:08'),
(5, 5, '3459021456789324', 'Fresa Ridho', '123', '03/20', 'MasterCard', '2019-09-02 04:17:56', '2019-09-02 04:17:56');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_products` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_products`, `name`, `price`, `image`, `category`, `created_at`, `updated_at`) VALUES
(1, 'Apple', '30000', '1013048185.jpg', 'Fruits', '2019-08-15 04:48:06', '2019-08-19 04:27:38'),
(2, 'Strawbery', '50000', '459250102.jpg', 'Fruits', '2019-08-15 05:07:45', '2019-08-19 04:26:57'),
(3, 'Chili', '10000', '814318440.jpg', 'Vegetables', '2019-08-15 22:39:24', '2019-08-15 22:39:24'),
(18, 'Tomato', '5000', '1369148816.jpg', 'Vegetables', '2019-08-19 04:17:13', '2019-08-19 04:17:13'),
(19, 'Garlic', '35000', '610584560.jpg', 'Vegetables', '2019-08-19 04:17:55', '2019-08-19 04:17:55'),
(20, 'Carrot', '15000', '948991654.jpg', 'Vegetables', '2019-08-19 04:18:47', '2019-08-19 04:18:47'),
(21, 'Dragon Fruit', '20000', 'KpV3nN99ZipswbjZ.png', 'Fruits', '2019-08-19 04:28:40', '2019-08-22 02:27:29'),
(22, 'Star Fruit', '10000', 'FWimuo3YlN7xYjOL.png', 'Fruits', '2019-08-19 07:19:49', '2019-08-22 02:12:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `id_level` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `name`, `username`, `email`, `email_verified_at`, `password`, `id_level`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'Fresa', 'TukangCoding', 'fresaridhom@gmail.com', NULL, '$2y$10$hFXNG2SFuhYOfGq3gqUGveEmnzxddq4/Vb8CUfnHvmnrtx.ti7/Ue', 1, NULL, '2019-08-21 02:43:07', '2019-08-21 02:43:07'),
(5, 'Jimmy', 'hateJim', 'abc@gmail.com', NULL, '$2y$10$viHmufsjPF3m4Dxs3uBrSeEnJfE2vs3Dwfp.k52egzaSs2hLZs3cW', 2, NULL, '2019-08-21 03:40:44', '2019-08-21 03:40:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresss`
--
ALTER TABLE `addresss`
  ADD PRIMARY KEY (`id_address`),
  ADD KEY `id_payment` (`id_payment`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_orders`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id_payment`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_products`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_level_foreign` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresss`
--
ALTER TABLE `addresss`
  MODIFY `id_address` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id_level` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_orders` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id_payment` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_products` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresss`
--
ALTER TABLE `addresss`
  ADD CONSTRAINT `addresss_ibfk_1` FOREIGN KEY (`id_payment`) REFERENCES `payments` (`id_payment`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `addresss_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_level_foreign` FOREIGN KEY (`id_level`) REFERENCES `levels` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
