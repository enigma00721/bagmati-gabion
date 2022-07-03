-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 03, 2022 at 10:50 PM
-- Server version: 8.0.27
-- PHP Version: 7.3.33-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bagmatigabion`
--

-- --------------------------------------------------------

--
-- Table structure for table `citites`
--

CREATE TABLE `citites` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_infos`
--

CREATE TABLE `company_infos` (
  `id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `aboutus` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `mobile` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fb_link` varchar(220) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tw_link` varchar(220) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `projects` int DEFAULT NULL,
  `partners` int DEFAULT NULL,
  `clients` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_infos`
--

INSERT INTO `company_infos` (`id`, `created_at`, `updated_at`, `aboutus`, `message`, `mobile`, `telephone`, `location`, `mail`, `fb_link`, `tw_link`, `projects`, `partners`, `clients`) VALUES
(1, '2022-07-03 09:53:54', '2022-07-03 10:54:13', '<p>Bagmati Gabion Box Pvt. Ltd., formerly known as Bagmati suppliers established in the year 2011 at Nuwakot distirct, the famous historical place and growing business hub of Nepal, supplying the product &amp; solution for the preservation of the environment to the various government and private construction project running in Nepal. </p><p>With the advancement of technology &amp; market demand of gabion products, on the year 2016 we started manufacturing gabion box by machine i.e machine fabricated gabion box. With the continuous support, suggestion and coordination from our esteemed clients, stakeholders we also started manufacturing chain-link fence and nails through machine. </p><p>Bagmati Gabion Box works in partnership with its clients, oering technical expertise to deliver versatile, cost eective &amp; environment friendly solutions. </p><p>Bagmati Gabion Box, vision is to become a leading National provider of advanced solutions to the construction market. Implementing a strategy of vertical integration, Bagmati researches, designs, supplies and now constructs solutions within its target markets. With operations in Nuwakot Nuwakot district, you are never far from BAGMATI GABION\'s technical support and solution services.</p>', '<p>Bagmati Gabion Box Pv.t Ltd. is one of the Nepals leading integrated gabion wire box based manufacturing company. Our success is driven by our people and their commitment to get results the right way-by operating responsibility, executing with excellence, applying innovative technologies and capturing new opportunities for profitable growth. We are involved in virtually every fact of the quality produts. We explore for manufacturing and distribution of our products focusing on improving people\'s life through meaningful innovation in the areas of construction. The company is leading in manufacturing and distribution of the gabion box products and nails with NS quality products. </p><p>One of our most important company assets is our reputation for ethical behavior, honesty and fair dealing. As you know, reputation is very fragile assets that can easily be destroyed by the actions or failures of one or more of us. Because of unprecedented scrutiny on corporate behavior, we need to emphasize and reinforce our commitment and adherence to these standards.</p><p> Each employee is personally responsible and accountable for helping customers to maintain its reputation for the highest standards of integrity. Especially in times of rapid change, we need to earn the trust and loyalty of others. There are no short cut formulas or automatic answers to the choices we have to make business today; however, we should decide the questions in ways that are consistent with values.&nbsp;</p>', '9826172837', '01-412099', 'Bidur-10, Bhainse, Nuwakot', 'bagmatigabion@gmail.com', 'https://www.facebook.com/bagmatigabion/', 'tiwtter/gabion/page/1876', 300, 100, 200);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `service` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `created_at`, `updated_at`, `name`, `email`, `service`, `phone`, `message`) VALUES
(1, '2022-07-03 11:15:44', '2022-07-03 11:15:44', 'Pratik Khadka', 'pratik@gmail.com', 'Gabion Wire Box', 982726112, 'I\'m enquiring for quotaion of your gabion box and all other essential materials.');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `created_at`, `updated_at`, `title`, `image`) VALUES
(1, '2022-07-03 11:05:09', '2022-07-03 11:05:09', 'First', '1656867009.jpeg'),
(2, '2022-07-03 11:05:24', '2022-07-03 11:05:24', 'Second', '1656867024.jpeg'),
(3, '2022-07-03 11:05:36', '2022-07-03 11:05:36', 'Third', '1656867036.jpeg'),
(4, '2022-07-03 11:06:23', '2022-07-03 11:06:23', 'Fourth', '1656867083.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_29_070405_create_sliders_table', 1),
(4, '2019_08_29_071715_create_teams_table', 1),
(5, '2019_08_29_082612_create_services_table', 1),
(6, '2019_08_29_084411_create_galleries_table', 1),
(7, '2019_08_29_094022_create_contacts_table', 1),
(8, '2019_09_11_055426_create_company_infos_table', 1),
(9, '2019_09_28_081945_create_testimonials_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `created_at`, `updated_at`, `image`, `title`, `slug`, `text`, `order`) VALUES
(1, '2022-07-03 11:13:13', '2022-07-03 11:17:57', '1656867493.jpeg', 'Gabion Box', 'gabion-box', '<p>Gabion is a cage, cylinder, or box filled with rocks, concrete or sometimes sand and soil for use in civil engineering, road building, military applications and landscaping’.</p><p> Gabions are boxes made of hexagonal double twisted woven wire mesh, divided into cells by means of diaphragms which helps to reinforce and strengthen the structures. They are interconnected with other similar units and filled with stones at the project site to form flexible, permeable and monolithic structures such as gravity retaining walls, channel linings, weirs etc.</p><p> Nowadays, Gabion structures are being used in various Civil Engineering structures. A gabion wall is a retaining wall made of stacked stone-filled gabions tied together with wire. Gabion walls are usually battered (angled back towards the slope), or stepped back with the slope, rather than stacked vertically. </p><p>All gabions shall be machine woven or handmade rectangular units made from double twist hexagonal mesh of heavy galvanized mild steel wire.&nbsp;</p>', NULL),
(2, '2022-07-03 11:14:21', '2022-07-03 11:14:21', '1656867561.jpeg', 'CHAIN-LINK FENCE', 'chain-link-fence', '<p>A chain-link fence (also referred to as wire netting, wire-mesh fence, chain-wire fence, cyclone fence, hurricane fence, or diamond-mesh fence) is a type of woven fence usually made from galvanized or LLDPE-coated steel wire. The wires run vertically and are bent into a zig-zag pattern so that each \"zig\" hooks with the wire immediately on one side and each \"zag\" with the wire immediately on the other. This forms the characteristic diamond pattern seen in this type of fence.&nbsp;</p>', NULL),
(3, '2022-07-03 11:14:45', '2022-07-03 11:14:45', '1656867585.jpeg', 'Nails', 'nails', '<p>A nail consists of a metal rod or shank, pointed at one end with a formed head at the other that can be hammered into pieces of wood or other materials to fasten them together. Steel is the main material used in nail making. Aluminum, brass and other metals can also be used. The surface can be coated or plated to improve its corrosion resistance, gripping strength or decorative appearance. The head, shank, and point may have several shapes based on the intended function of the nail.&nbsp;</p>', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `order` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `created_at`, `updated_at`, `image`, `text`, `caption`, `status`, `order`) VALUES
(1, '2022-07-03 11:03:14', '2022-07-03 11:03:14', '1656866738.jpeg', 'first Text', 'First company', 1, 1),
(2, '2022-07-03 11:03:14', '2022-07-03 11:03:14', '1656863233.jpeg', 'second text', 'Second Caption', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `created_at`, `updated_at`, `name`, `position`, `image`) VALUES
(1, '2022-07-03 11:01:32', '2022-07-03 11:01:32', 'Baikuntha Baivab', 'Chief Consultant', '1656866792.jpeg'),
(2, '2022-07-03 11:01:55', '2022-07-03 11:01:55', 'RABINDRA BUDHATHOKI', 'CEO', '1656866815.jpeg'),
(3, '2022-07-03 11:02:18', '2022-07-03 11:02:18', 'Ujjwal Pyakurel', 'IT Head', '1656866838.jpeg'),
(4, '2022-07-03 11:02:31', '2022-07-03 11:02:31', 'Baikuntha Baivab', 'Manager', '1656866851.jpeg'),
(5, '2022-07-03 11:02:50', '2022-07-03 11:02:50', 'Basant Rana', 'Staff', '1656866870.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `created_at`, `updated_at`, `image`, `name`, `company`, `position`, `message`, `order`) VALUES
(1, '2022-07-03 11:10:34', '2022-07-03 11:19:34', '1656867334.jpeg', 'Raman Narayan', 'Raman Construction', 'CEO', '<p>Bagmati Gabion Box oers the most suitable products for the type of enclosure you need, starting with the advantage that all the materials used in the installation. </p>', NULL),
(2, '2022-07-03 11:11:39', '2022-07-03 11:19:44', '1656867399.jpeg', 'Baikuntha Baivab', 'Nagarjun Construction', 'General Manager', '<p>We focus our attention on high quality raw materials as a specialized company, with technical personnel trained in the proper installation of these products.</p>', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'demo', 'demo@demo.com', NULL, '$2y$10$FmoiMvLcEaYnGGFV4XYNhOHrHuYdt.tzfJ.gPZgMBmPlkLx/XMKty', NULL, '2019-12-11 08:09:26', '2019-12-11 08:09:26'),
(3, 'Admin', 'admin@admin.com', NULL, '$2y$10$/B4bgrCuWc4RCBdV/tfE4e5WAjRCciAKx5LfH4oT6hhV6SokM0/F2', NULL, '2022-07-03 09:37:12', '2022-07-03 09:37:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `citites`
--
ALTER TABLE `citites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_infos`
--
ALTER TABLE `company_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `citites`
--
ALTER TABLE `citites`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `company_infos`
--
ALTER TABLE `company_infos`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
