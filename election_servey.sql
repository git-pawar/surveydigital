-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2020 at 12:45 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `election_servey`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('admin','parshad') COLLATE utf8mb4_unicode_ci DEFAULT 'parshad',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` bigint(20) UNSIGNED DEFAULT NULL,
  `city` bigint(20) UNSIGNED DEFAULT NULL,
  `nnn_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nn_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ward_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `type`, `name`, `mobile`, `email`, `password`, `state`, `city`, `nnn_id`, `nn_id`, `ward_id`, `remember_token`, `deleted_at`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', '1234567890', NULL, '$2y$10$Pn4hXryUgTsAHbqh5D1C.uGWQq9DuYHkUduhG8AeirpfivEjaKhjq', NULL, NULL, NULL, NULL, NULL, 'igElDyk1yr75onXrRPNkvXuWPQ3KOtZf1O8vq0uepSXhQew5Gz06XCqH46Fx', NULL, 1, '2020-11-25 07:43:33', '2020-11-25 07:43:33'),
(2, 'parshad', 'Nishant Shukla', '8962616480', 'nishant@gmail.com', '$2y$10$9zJVms2n4l0YPsO9n8p2rOYZ525ohtx9wOkKXk/fzjXXQKL/pRxy.', 20, 707, 1, 1, 1, 'u3zU22HzL4t38H5fwpB0BAbzzhiXvvj3A7Unr2Fwpq9Cd1qwc0vbpxvq5N6M', NULL, 1, '2020-11-26 02:11:22', '2020-11-26 02:11:22'),
(3, 'parshad', 'Siddhant Goyel', '8962616481', 'siddhant@mail.com', '$2y$10$AkwYrJmKl9KdO5X7MlbC2.0.aOHiAu3RAj3O/rg06qJ1JunhV9tqK', 20, 707, 1, 1, 2, NULL, NULL, 1, '2020-11-26 02:18:47', '2020-11-26 02:18:47');

-- --------------------------------------------------------

--
-- Table structure for table `booth_data`
--

CREATE TABLE `booth_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parshad_id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` bigint(20) UNSIGNED NOT NULL,
  `part_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ward_id` bigint(20) UNSIGNED DEFAULT NULL,
  `s_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booth_data`
--

INSERT INTO `booth_data` (`id`, `parshad_id`, `agent_id`, `part_id`, `ward_id`, `s_no`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, 4, 1, 1, '1', NULL, '2020-11-26 07:36:43', '2020-11-26 07:36:43'),
(2, 2, 4, 1, 1, '2', NULL, '2020-11-26 07:40:15', '2020-11-26 07:40:15');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_id` bigint(20) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city_name`, `state_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Kolhapur', 21, NULL, NULL, NULL),
(2, 'Port Blair', 1, NULL, NULL, NULL),
(3, 'Adilabad', 2, NULL, NULL, NULL),
(4, 'Adoni', 2, NULL, NULL, NULL),
(5, 'Amadalavalasa', 2, NULL, NULL, NULL),
(6, 'Amalapuram', 2, NULL, NULL, NULL),
(7, 'Anakapalle', 2, NULL, NULL, NULL),
(8, 'Anantapur', 2, NULL, NULL, NULL),
(9, 'Badepalle', 2, NULL, NULL, NULL),
(10, 'Banganapalle', 2, NULL, NULL, NULL),
(11, 'Bapatla', 2, NULL, NULL, NULL),
(12, 'Bellampalle', 2, NULL, NULL, NULL),
(13, 'Bethamcherla', 2, NULL, NULL, NULL),
(14, 'Bhadrachalam', 2, NULL, NULL, NULL),
(15, 'Bhainsa', 2, NULL, NULL, NULL),
(16, 'Bheemunipatnam', 2, NULL, NULL, NULL),
(17, 'Bhimavaram', 2, NULL, NULL, NULL),
(18, 'Bhongir', 2, NULL, NULL, NULL),
(19, 'Bobbili', 2, NULL, NULL, NULL),
(20, 'Bodhan', 2, NULL, NULL, NULL),
(21, 'Chilakaluripet', 2, NULL, NULL, NULL),
(22, 'Chirala', 2, NULL, NULL, NULL),
(23, 'Chittoor', 2, NULL, NULL, NULL),
(24, 'Cuddapah', 2, NULL, NULL, NULL),
(25, 'Devarakonda', 2, NULL, NULL, NULL),
(26, 'Dharmavaram', 2, NULL, NULL, NULL),
(27, 'Eluru', 2, NULL, NULL, NULL),
(28, 'Farooqnagar', 2, NULL, NULL, NULL),
(29, 'Gadwal', 2, NULL, NULL, NULL),
(30, 'Gooty', 2, NULL, NULL, NULL),
(31, 'Gudivada', 2, NULL, NULL, NULL),
(32, 'Gudur', 2, NULL, NULL, NULL),
(33, 'Guntakal', 2, NULL, NULL, NULL),
(34, 'Guntur', 2, NULL, NULL, NULL),
(35, 'Hanuman Junction', 2, NULL, NULL, NULL),
(36, 'Hindupur', 2, NULL, NULL, NULL),
(37, 'Hyderabad', 2, NULL, NULL, NULL),
(38, 'Ichchapuram', 2, NULL, NULL, NULL),
(39, 'Jaggaiahpet', 2, NULL, NULL, NULL),
(40, 'Jagtial', 2, NULL, NULL, NULL),
(41, 'Jammalamadugu', 2, NULL, NULL, NULL),
(42, 'Jangaon', 2, NULL, NULL, NULL),
(43, 'Kadapa', 2, NULL, NULL, NULL),
(44, 'Kadiri', 2, NULL, NULL, NULL),
(45, 'Kagaznagar', 2, NULL, NULL, NULL),
(46, 'Kakinada', 2, NULL, NULL, NULL),
(47, 'Kalyandurg', 2, NULL, NULL, NULL),
(48, 'Kamareddy', 2, NULL, NULL, NULL),
(49, 'Kandukur', 2, NULL, NULL, NULL),
(50, 'Karimnagar', 2, NULL, NULL, NULL),
(51, 'Kavali', 2, NULL, NULL, NULL),
(52, 'Khammam', 2, NULL, NULL, NULL),
(53, 'Koratla', 2, NULL, NULL, NULL),
(54, 'Kothagudem', 2, NULL, NULL, NULL),
(55, 'Kothapeta', 2, NULL, NULL, NULL),
(56, 'Kovvur', 2, NULL, NULL, NULL),
(57, 'Kurnool', 2, NULL, NULL, NULL),
(58, 'Kyathampalle', 2, NULL, NULL, NULL),
(59, 'Macherla', 2, NULL, NULL, NULL),
(60, 'Machilipatnam', 2, NULL, NULL, NULL),
(61, 'Madanapalle', 2, NULL, NULL, NULL),
(62, 'Mahbubnagar', 2, NULL, NULL, NULL),
(63, 'Mancherial', 2, NULL, NULL, NULL),
(64, 'Mandamarri', 2, NULL, NULL, NULL),
(65, 'Mandapeta', 2, NULL, NULL, NULL),
(66, 'Manuguru', 2, NULL, NULL, NULL),
(67, 'Markapur', 2, NULL, NULL, NULL),
(68, 'Medak', 2, NULL, NULL, NULL),
(69, 'Miryalaguda', 2, NULL, NULL, NULL),
(70, 'Mogalthur', 2, NULL, NULL, NULL),
(71, 'Nagari', 2, NULL, NULL, NULL),
(72, 'Nagarkurnool', 2, NULL, NULL, NULL),
(73, 'Nandyal', 2, NULL, NULL, NULL),
(74, 'Narasapur', 2, NULL, NULL, NULL),
(75, 'Narasaraopet', 2, NULL, NULL, NULL),
(76, 'Narayanpet', 2, NULL, NULL, NULL),
(77, 'Narsipatnam', 2, NULL, NULL, NULL),
(78, 'Nellore', 2, NULL, NULL, NULL),
(79, 'Nidadavole', 2, NULL, NULL, NULL),
(80, 'Nirmal', 2, NULL, NULL, NULL),
(81, 'Nizamabad', 2, NULL, NULL, NULL),
(82, 'Nuzvid', 2, NULL, NULL, NULL),
(83, 'Ongole', 2, NULL, NULL, NULL),
(84, 'Palacole', 2, NULL, NULL, NULL),
(85, 'Palasa Kasibugga', 2, NULL, NULL, NULL),
(86, 'Palwancha', 2, NULL, NULL, NULL),
(87, 'Parvathipuram', 2, NULL, NULL, NULL),
(88, 'Pedana', 2, NULL, NULL, NULL),
(89, 'Peddapuram', 2, NULL, NULL, NULL),
(90, 'Pithapuram', 2, NULL, NULL, NULL),
(91, 'Pondur', 2, NULL, NULL, NULL),
(92, 'Ponnur', 2, NULL, NULL, NULL),
(93, 'Proddatur', 2, NULL, NULL, NULL),
(94, 'Punganur', 2, NULL, NULL, NULL),
(95, 'Puttur', 2, NULL, NULL, NULL),
(96, 'Rajahmundry', 2, NULL, NULL, NULL),
(97, 'Rajam', 2, NULL, NULL, NULL),
(98, 'Ramachandrapuram', 2, NULL, NULL, NULL),
(99, 'Ramagundam', 2, NULL, NULL, NULL),
(100, 'Rayachoti', 2, NULL, NULL, NULL),
(101, 'Rayadurg', 2, NULL, NULL, NULL),
(102, 'Renigunta', 2, NULL, NULL, NULL),
(103, 'Repalle', 2, NULL, NULL, NULL),
(104, 'Sadasivpet', 2, NULL, NULL, NULL),
(105, 'Salur', 2, NULL, NULL, NULL),
(106, 'Samalkot', 2, NULL, NULL, NULL),
(107, 'Sangareddy', 2, NULL, NULL, NULL),
(108, 'Sattenapalle', 2, NULL, NULL, NULL),
(109, 'Siddipet', 2, NULL, NULL, NULL),
(110, 'Singapur', 2, NULL, NULL, NULL),
(111, 'Sircilla', 2, NULL, NULL, NULL),
(112, 'Srikakulam', 2, NULL, NULL, NULL),
(113, 'Srikalahasti', 2, NULL, NULL, NULL),
(115, 'Suryapet', 2, NULL, NULL, NULL),
(116, 'Tadepalligudem', 2, NULL, NULL, NULL),
(117, 'Tadpatri', 2, NULL, NULL, NULL),
(118, 'Tandur', 2, NULL, NULL, NULL),
(119, 'Tanuku', 2, NULL, NULL, NULL),
(120, 'Tenali', 2, NULL, NULL, NULL),
(121, 'Tirupati', 2, NULL, NULL, NULL),
(122, 'Tuni', 2, NULL, NULL, NULL),
(123, 'Uravakonda', 2, NULL, NULL, NULL),
(124, 'Venkatagiri', 2, NULL, NULL, NULL),
(125, 'Vicarabad', 2, NULL, NULL, NULL),
(126, 'Vijayawada', 2, NULL, NULL, NULL),
(127, 'Vinukonda', 2, NULL, NULL, NULL),
(128, 'Visakhapatnam', 2, NULL, NULL, NULL),
(129, 'Vizianagaram', 2, NULL, NULL, NULL),
(130, 'Wanaparthy', 2, NULL, NULL, NULL),
(131, 'Warangal', 2, NULL, NULL, NULL),
(132, 'Yellandu', 2, NULL, NULL, NULL),
(133, 'Yemmiganur', 2, NULL, NULL, NULL),
(134, 'Yerraguntla', 2, NULL, NULL, NULL),
(135, 'Zahirabad', 2, NULL, NULL, NULL),
(136, 'Rajampet', 2, NULL, NULL, NULL),
(137, 'Along', 3, NULL, NULL, NULL),
(138, 'Bomdila', 3, NULL, NULL, NULL),
(139, 'Itanagar', 3, NULL, NULL, NULL),
(140, 'Naharlagun', 3, NULL, NULL, NULL),
(141, 'Pasighat', 3, NULL, NULL, NULL),
(142, 'Abhayapuri', 4, NULL, NULL, NULL),
(143, 'Amguri', 4, NULL, NULL, NULL),
(144, 'Anandnagaar', 4, NULL, NULL, NULL),
(145, 'Barpeta', 4, NULL, NULL, NULL),
(146, 'Barpeta Road', 4, NULL, NULL, NULL),
(147, 'Bilasipara', 4, NULL, NULL, NULL),
(148, 'Bongaigaon', 4, NULL, NULL, NULL),
(149, 'Dhekiajuli', 4, NULL, NULL, NULL),
(150, 'Dhubri', 4, NULL, NULL, NULL),
(151, 'Dibrugarh', 4, NULL, NULL, NULL),
(152, 'Digboi', 4, NULL, NULL, NULL),
(153, 'Diphu', 4, NULL, NULL, NULL),
(154, 'Dispur', 4, NULL, NULL, NULL),
(156, 'Gauripur', 4, NULL, NULL, NULL),
(157, 'Goalpara', 4, NULL, NULL, NULL),
(158, 'Golaghat', 4, NULL, NULL, NULL),
(159, 'Guwahati', 4, NULL, NULL, NULL),
(160, 'Haflong', 4, NULL, NULL, NULL),
(161, 'Hailakandi', 4, NULL, NULL, NULL),
(162, 'Hojai', 4, NULL, NULL, NULL),
(163, 'Jorhat', 4, NULL, NULL, NULL),
(164, 'Karimganj', 4, NULL, NULL, NULL),
(165, 'Kokrajhar', 4, NULL, NULL, NULL),
(166, 'Lanka', 4, NULL, NULL, NULL),
(167, 'Lumding', 4, NULL, NULL, NULL),
(168, 'Mangaldoi', 4, NULL, NULL, NULL),
(169, 'Mankachar', 4, NULL, NULL, NULL),
(170, 'Margherita', 4, NULL, NULL, NULL),
(171, 'Mariani', 4, NULL, NULL, NULL),
(172, 'Marigaon', 4, NULL, NULL, NULL),
(173, 'Nagaon', 4, NULL, NULL, NULL),
(174, 'Nalbari', 4, NULL, NULL, NULL),
(175, 'North Lakhimpur', 4, NULL, NULL, NULL),
(176, 'Rangia', 4, NULL, NULL, NULL),
(177, 'Sibsagar', 4, NULL, NULL, NULL),
(178, 'Silapathar', 4, NULL, NULL, NULL),
(179, 'Silchar', 4, NULL, NULL, NULL),
(180, 'Tezpur', 4, NULL, NULL, NULL),
(181, 'Tinsukia', 4, NULL, NULL, NULL),
(182, 'Amarpur', 5, NULL, NULL, NULL),
(183, 'Araria', 5, NULL, NULL, NULL),
(184, 'Areraj', 5, NULL, NULL, NULL),
(185, 'Arrah', 5, NULL, NULL, NULL),
(186, 'Asarganj', 5, NULL, NULL, NULL),
(187, 'Aurangabad', 5, NULL, NULL, NULL),
(188, 'Bagaha', 5, NULL, NULL, NULL),
(189, 'Bahadurganj', 5, NULL, NULL, NULL),
(190, 'Bairgania', 5, NULL, NULL, NULL),
(191, 'Bakhtiarpur', 5, NULL, NULL, NULL),
(192, 'Banka', 5, NULL, NULL, NULL),
(193, 'Banmankhi Bazar', 5, NULL, NULL, NULL),
(194, 'Barahiya', 5, NULL, NULL, NULL),
(195, 'Barauli', 5, NULL, NULL, NULL),
(196, 'Barbigha', 5, NULL, NULL, NULL),
(197, 'Barh', 5, NULL, NULL, NULL),
(198, 'Begusarai', 5, NULL, NULL, NULL),
(199, 'Behea', 5, NULL, NULL, NULL),
(200, 'Bettiah', 5, NULL, NULL, NULL),
(201, 'Bhabua', 5, NULL, NULL, NULL),
(202, 'Bhagalpur', 5, NULL, NULL, NULL),
(203, 'Bihar Sharif', 5, NULL, NULL, NULL),
(204, 'Bikramganj', 5, NULL, NULL, NULL),
(205, 'Bodh Gaya', 5, NULL, NULL, NULL),
(206, 'Buxar', 5, NULL, NULL, NULL),
(207, 'Chandan Bara', 5, NULL, NULL, NULL),
(208, 'Chanpatia', 5, NULL, NULL, NULL),
(209, 'Chhapra', 5, NULL, NULL, NULL),
(210, 'Colgong', 5, NULL, NULL, NULL),
(211, 'Dalsinghsarai', 5, NULL, NULL, NULL),
(212, 'Darbhanga', 5, NULL, NULL, NULL),
(213, 'Daudnagar', 5, NULL, NULL, NULL),
(214, 'Dehri-on-Sone', 5, NULL, NULL, NULL),
(215, 'Dhaka', 5, NULL, NULL, NULL),
(216, 'Dighwara', 5, NULL, NULL, NULL),
(217, 'Dumraon', 5, NULL, NULL, NULL),
(218, 'Fatwah', 5, NULL, NULL, NULL),
(219, 'Forbesganj', 5, NULL, NULL, NULL),
(220, 'Gaya', 5, NULL, NULL, NULL),
(221, 'Gogri Jamalpur', 5, NULL, NULL, NULL),
(222, 'Gopalganj', 5, NULL, NULL, NULL),
(223, 'Hajipur', 5, NULL, NULL, NULL),
(224, 'Hilsa', 5, NULL, NULL, NULL),
(225, 'Hisua', 5, NULL, NULL, NULL),
(226, 'Islampur', 5, NULL, NULL, NULL),
(227, 'Jagdispur', 5, NULL, NULL, NULL),
(228, 'Jamalpur', 5, NULL, NULL, NULL),
(229, 'Jamui', 5, NULL, NULL, NULL),
(230, 'Jehanabad', 5, NULL, NULL, NULL),
(231, 'Jhajha', 5, NULL, NULL, NULL),
(232, 'Jhanjharpur', 5, NULL, NULL, NULL),
(233, 'Jogabani', 5, NULL, NULL, NULL),
(234, 'Kanti', 5, NULL, NULL, NULL),
(235, 'Katihar', 5, NULL, NULL, NULL),
(236, 'Khagaria', 5, NULL, NULL, NULL),
(237, 'Kharagpur', 5, NULL, NULL, NULL),
(238, 'Kishanganj', 5, NULL, NULL, NULL),
(239, 'Lakhisarai', 5, NULL, NULL, NULL),
(240, 'Lalganj', 5, NULL, NULL, NULL),
(241, 'Madhepura', 5, NULL, NULL, NULL),
(242, 'Madhubani', 5, NULL, NULL, NULL),
(243, 'Maharajganj', 5, NULL, NULL, NULL),
(244, 'Mahnar Bazar', 5, NULL, NULL, NULL),
(245, 'Makhdumpur', 5, NULL, NULL, NULL),
(246, 'Maner', 5, NULL, NULL, NULL),
(247, 'Manihari', 5, NULL, NULL, NULL),
(248, 'Marhaura', 5, NULL, NULL, NULL),
(249, 'Masaurhi', 5, NULL, NULL, NULL),
(250, 'Mirganj', 5, NULL, NULL, NULL),
(251, 'Mokameh', 5, NULL, NULL, NULL),
(252, 'Motihari', 5, NULL, NULL, NULL),
(253, 'Motipur', 5, NULL, NULL, NULL),
(254, 'Munger', 5, NULL, NULL, NULL),
(255, 'Murliganj', 5, NULL, NULL, NULL),
(256, 'Muzaffarpur', 5, NULL, NULL, NULL),
(257, 'Narkatiaganj', 5, NULL, NULL, NULL),
(258, 'Naugachhia', 5, NULL, NULL, NULL),
(259, 'Nawada', 5, NULL, NULL, NULL),
(260, 'Nokha', 5, NULL, NULL, NULL),
(261, 'Patna', 5, NULL, NULL, NULL),
(262, 'Piro', 5, NULL, NULL, NULL),
(263, 'Purnia', 5, NULL, NULL, NULL),
(264, 'Rafiganj', 5, NULL, NULL, NULL),
(265, 'Rajgir', 5, NULL, NULL, NULL),
(266, 'Ramnagar', 5, NULL, NULL, NULL),
(267, 'Raxaul Bazar', 5, NULL, NULL, NULL),
(268, 'Revelganj', 5, NULL, NULL, NULL),
(269, 'Rosera', 5, NULL, NULL, NULL),
(270, 'Saharsa', 5, NULL, NULL, NULL),
(271, 'Samastipur', 5, NULL, NULL, NULL),
(272, 'Sasaram', 5, NULL, NULL, NULL),
(273, 'Sheikhpura', 5, NULL, NULL, NULL),
(274, 'Sheohar', 5, NULL, NULL, NULL),
(275, 'Sherghati', 5, NULL, NULL, NULL),
(276, 'Silao', 5, NULL, NULL, NULL),
(277, 'Sitamarhi', 5, NULL, NULL, NULL),
(278, 'Siwan', 5, NULL, NULL, NULL),
(279, 'Sonepur', 5, NULL, NULL, NULL),
(280, 'Sugauli', 5, NULL, NULL, NULL),
(281, 'Sultanganj', 5, NULL, NULL, NULL),
(282, 'Supaul', 5, NULL, NULL, NULL),
(283, 'Warisaliganj', 5, NULL, NULL, NULL),
(284, 'Ahiwara', 7, NULL, NULL, NULL),
(285, 'Akaltara', 7, NULL, NULL, NULL),
(286, 'Ambagarh Chowki', 7, NULL, NULL, NULL),
(287, 'Ambikapur', 7, NULL, NULL, NULL),
(288, 'Arang', 7, NULL, NULL, NULL),
(289, 'Bade Bacheli', 7, NULL, NULL, NULL),
(290, 'Balod', 7, NULL, NULL, NULL),
(291, 'Baloda Bazar', 7, NULL, NULL, NULL),
(292, 'Bemetra', 7, NULL, NULL, NULL),
(293, 'Bhatapara', 7, NULL, NULL, NULL),
(294, 'Bilaspur', 7, NULL, NULL, NULL),
(295, 'Birgaon', 7, NULL, NULL, NULL),
(296, 'Champa', 7, NULL, NULL, NULL),
(297, 'Chirmiri', 7, NULL, NULL, NULL),
(298, 'Dalli-Rajhara', 7, NULL, NULL, NULL),
(299, 'Dhamtari', 7, NULL, NULL, NULL),
(300, 'Dipka', 7, NULL, NULL, NULL),
(301, 'Dongargarh', 7, NULL, NULL, NULL),
(302, 'Durg-Bhilai Nagar', 7, NULL, NULL, NULL),
(303, 'Gobranawapara', 7, NULL, NULL, NULL),
(304, 'Jagdalpur', 7, NULL, NULL, NULL),
(305, 'Janjgir', 7, NULL, NULL, NULL),
(306, 'Jashpurnagar', 7, NULL, NULL, NULL),
(307, 'Kanker', 7, NULL, NULL, NULL),
(308, 'Kawardha', 7, NULL, NULL, NULL),
(309, 'Kondagaon', 7, NULL, NULL, NULL),
(310, 'Korba', 7, NULL, NULL, NULL),
(311, 'Mahasamund', 7, NULL, NULL, NULL),
(312, 'Mahendragarh', 7, NULL, NULL, NULL),
(313, 'Mungeli', 7, NULL, NULL, NULL),
(314, 'Naila Janjgir', 7, NULL, NULL, NULL),
(315, 'Raigarh', 7, NULL, NULL, NULL),
(316, 'Raipur', 7, NULL, NULL, NULL),
(317, 'Rajnandgaon', 7, NULL, NULL, NULL),
(318, 'Sakti', 7, NULL, NULL, NULL),
(319, 'Tilda Newra', 7, NULL, NULL, NULL),
(320, 'Amli', 8, NULL, NULL, NULL),
(321, 'Silvassa', 8, NULL, NULL, NULL),
(322, 'Daman and Diu', 9, NULL, NULL, NULL),
(323, 'Daman and Diu', 9, NULL, NULL, NULL),
(324, 'Asola', 10, NULL, NULL, NULL),
(325, 'Delhi', 10, NULL, NULL, NULL),
(326, 'Aldona', 11, NULL, NULL, NULL),
(327, 'Curchorem Cacora', 11, NULL, NULL, NULL),
(328, 'Madgaon', 11, NULL, NULL, NULL),
(329, 'Mapusa', 11, NULL, NULL, NULL),
(330, 'Margao', 11, NULL, NULL, NULL),
(331, 'Marmagao', 11, NULL, NULL, NULL),
(332, 'Panaji', 11, NULL, NULL, NULL),
(333, 'Ahmedabad', 12, NULL, NULL, NULL),
(334, 'Amreli', 12, NULL, NULL, NULL),
(335, 'Anand', 12, NULL, NULL, NULL),
(336, 'Ankleshwar', 12, NULL, NULL, NULL),
(337, 'Bharuch', 12, NULL, NULL, NULL),
(338, 'Bhavnagar', 12, NULL, NULL, NULL),
(339, 'Bhuj', 12, NULL, NULL, NULL),
(340, 'Cambay', 12, NULL, NULL, NULL),
(341, 'Dahod', 12, NULL, NULL, NULL),
(342, 'Deesa', 12, NULL, NULL, NULL),
(344, 'Dholka', 12, NULL, NULL, NULL),
(345, 'Gandhinagar', 12, NULL, NULL, NULL),
(346, 'Godhra', 12, NULL, NULL, NULL),
(347, 'Himatnagar', 12, NULL, NULL, NULL),
(348, 'Idar', 12, NULL, NULL, NULL),
(349, 'Jamnagar', 12, NULL, NULL, NULL),
(350, 'Junagadh', 12, NULL, NULL, NULL),
(351, 'Kadi', 12, NULL, NULL, NULL),
(352, 'Kalavad', 12, NULL, NULL, NULL),
(353, 'Kalol', 12, NULL, NULL, NULL),
(354, 'Kapadvanj', 12, NULL, NULL, NULL),
(355, 'Karjan', 12, NULL, NULL, NULL),
(356, 'Keshod', 12, NULL, NULL, NULL),
(357, 'Khambhalia', 12, NULL, NULL, NULL),
(358, 'Khambhat', 12, NULL, NULL, NULL),
(359, 'Kheda', 12, NULL, NULL, NULL),
(360, 'Khedbrahma', 12, NULL, NULL, NULL),
(361, 'Kheralu', 12, NULL, NULL, NULL),
(362, 'Kodinar', 12, NULL, NULL, NULL),
(363, 'Lathi', 12, NULL, NULL, NULL),
(364, 'Limbdi', 12, NULL, NULL, NULL),
(365, 'Lunawada', 12, NULL, NULL, NULL),
(366, 'Mahesana', 12, NULL, NULL, NULL),
(367, 'Mahuva', 12, NULL, NULL, NULL),
(368, 'Manavadar', 12, NULL, NULL, NULL),
(369, 'Mandvi', 12, NULL, NULL, NULL),
(370, 'Mangrol', 12, NULL, NULL, NULL),
(371, 'Mansa', 12, NULL, NULL, NULL),
(372, 'Mehmedabad', 12, NULL, NULL, NULL),
(373, 'Modasa', 12, NULL, NULL, NULL),
(374, 'Morvi', 12, NULL, NULL, NULL),
(375, 'Nadiad', 12, NULL, NULL, NULL),
(376, 'Navsari', 12, NULL, NULL, NULL),
(377, 'Padra', 12, NULL, NULL, NULL),
(378, 'Palanpur', 12, NULL, NULL, NULL),
(379, 'Palitana', 12, NULL, NULL, NULL),
(380, 'Pardi', 12, NULL, NULL, NULL),
(381, 'Patan', 12, NULL, NULL, NULL),
(382, 'Petlad', 12, NULL, NULL, NULL),
(383, 'Porbandar', 12, NULL, NULL, NULL),
(384, 'Radhanpur', 12, NULL, NULL, NULL),
(385, 'Rajkot', 12, NULL, NULL, NULL),
(386, 'Rajpipla', 12, NULL, NULL, NULL),
(387, 'Rajula', 12, NULL, NULL, NULL),
(388, 'Ranavav', 12, NULL, NULL, NULL),
(389, 'Rapar', 12, NULL, NULL, NULL),
(390, 'Salaya', 12, NULL, NULL, NULL),
(391, 'Sanand', 12, NULL, NULL, NULL),
(392, 'Savarkundla', 12, NULL, NULL, NULL),
(393, 'Sidhpur', 12, NULL, NULL, NULL),
(394, 'Sihor', 12, NULL, NULL, NULL),
(395, 'Songadh', 12, NULL, NULL, NULL),
(396, 'Surat', 12, NULL, NULL, NULL),
(397, 'Talaja', 12, NULL, NULL, NULL),
(398, 'Thangadh', 12, NULL, NULL, NULL),
(399, 'Tharad', 12, NULL, NULL, NULL),
(400, 'Umbergaon', 12, NULL, NULL, NULL),
(401, 'Umreth', 12, NULL, NULL, NULL),
(402, 'Una', 12, NULL, NULL, NULL),
(403, 'Unjha', 12, NULL, NULL, NULL),
(404, 'Upleta', 12, NULL, NULL, NULL),
(405, 'Vadnagar', 12, NULL, NULL, NULL),
(406, 'Vadodara', 12, NULL, NULL, NULL),
(407, 'Valsad', 12, NULL, NULL, NULL),
(408, 'Vapi', 12, NULL, NULL, NULL),
(409, 'Vapi', 12, NULL, NULL, NULL),
(410, 'Veraval', 12, NULL, NULL, NULL),
(411, 'Vijapur', 12, NULL, NULL, NULL),
(412, 'Viramgam', 12, NULL, NULL, NULL),
(413, 'Visnagar', 12, NULL, NULL, NULL),
(414, 'Vyara', 12, NULL, NULL, NULL),
(415, 'Wadhwan', 12, NULL, NULL, NULL),
(416, 'Wankaner', 12, NULL, NULL, NULL),
(417, 'Adalaj', 12, NULL, NULL, NULL),
(418, 'Adityana', 12, NULL, NULL, NULL),
(419, 'Alang', 12, NULL, NULL, NULL),
(420, 'Ambaji', 12, NULL, NULL, NULL),
(421, 'Ambaliyasan', 12, NULL, NULL, NULL),
(422, 'Andada', 12, NULL, NULL, NULL),
(423, 'Anjar', 12, NULL, NULL, NULL),
(424, 'Anklav', 12, NULL, NULL, NULL),
(425, 'Antaliya', 12, NULL, NULL, NULL),
(426, 'Arambhada', 12, NULL, NULL, NULL),
(427, 'Atul', 12, NULL, NULL, NULL),
(428, 'Ballabhgarh', 13, NULL, NULL, NULL),
(429, 'Ambala', 13, NULL, NULL, NULL),
(430, 'Ambala', 13, NULL, NULL, NULL),
(431, 'Asankhurd', 13, NULL, NULL, NULL),
(432, 'Assandh', 13, NULL, NULL, NULL),
(433, 'Ateli', 13, NULL, NULL, NULL),
(434, 'Babiyal', 13, NULL, NULL, NULL),
(435, 'Bahadurgarh', 13, NULL, NULL, NULL),
(436, 'Barwala', 13, NULL, NULL, NULL),
(437, 'Bhiwani', 13, NULL, NULL, NULL),
(438, 'Charkhi Dadri', 13, NULL, NULL, NULL),
(439, 'Cheeka', 13, NULL, NULL, NULL),
(440, 'Ellenabad 2', 13, NULL, NULL, NULL),
(441, 'Faridabad', 13, NULL, NULL, NULL),
(442, 'Fatehabad', 13, NULL, NULL, NULL),
(443, 'Ganaur', 13, NULL, NULL, NULL),
(444, 'Gharaunda', 13, NULL, NULL, NULL),
(445, 'Gohana', 13, NULL, NULL, NULL),
(446, 'Gurgaon', 13, NULL, NULL, NULL),
(447, 'Haibat(Yamuna Nagar)', 13, NULL, NULL, NULL),
(448, 'Hansi', 13, NULL, NULL, NULL),
(449, 'Hisar', 13, NULL, NULL, NULL),
(450, 'Hodal', 13, NULL, NULL, NULL),
(451, 'Jhajjar', 13, NULL, NULL, NULL),
(452, 'Jind', 13, NULL, NULL, NULL),
(453, 'Kaithal', 13, NULL, NULL, NULL),
(454, 'Kalan Wali', 13, NULL, NULL, NULL),
(455, 'Kalka', 13, NULL, NULL, NULL),
(456, 'Karnal', 13, NULL, NULL, NULL),
(457, 'Ladwa', 13, NULL, NULL, NULL),
(458, 'Mahendragarh', 13, NULL, NULL, NULL),
(459, 'Mandi Dabwali', 13, NULL, NULL, NULL),
(460, 'Narnaul', 13, NULL, NULL, NULL),
(461, 'Narwana', 13, NULL, NULL, NULL),
(462, 'Palwal', 13, NULL, NULL, NULL),
(463, 'Panchkula', 13, NULL, NULL, NULL),
(464, 'Panipat', 13, NULL, NULL, NULL),
(465, 'Pehowa', 13, NULL, NULL, NULL),
(466, 'Pinjore', 13, NULL, NULL, NULL),
(467, 'Rania', 13, NULL, NULL, NULL),
(468, 'Ratia', 13, NULL, NULL, NULL),
(469, 'Rewari', 13, NULL, NULL, NULL),
(470, 'Rohtak', 13, NULL, NULL, NULL),
(471, 'Safidon', 13, NULL, NULL, NULL),
(472, 'Samalkha', 13, NULL, NULL, NULL),
(473, 'Shahbad', 13, NULL, NULL, NULL),
(474, 'Sirsa', 13, NULL, NULL, NULL),
(475, 'Sohna', 13, NULL, NULL, NULL),
(476, 'Sonipat', 13, NULL, NULL, NULL),
(477, 'Taraori', 13, NULL, NULL, NULL),
(478, 'Thanesar', 13, NULL, NULL, NULL),
(479, 'Tohana', 13, NULL, NULL, NULL),
(480, 'Yamunanagar', 13, NULL, NULL, NULL),
(481, 'Arki', 14, NULL, NULL, NULL),
(482, 'Baddi', 14, NULL, NULL, NULL),
(483, 'Bilaspur', 14, NULL, NULL, NULL),
(484, 'Chamba', 14, NULL, NULL, NULL),
(485, 'Dalhousie', 14, NULL, NULL, NULL),
(486, 'Dharamsala', 14, NULL, NULL, NULL),
(487, 'Hamirpur', 14, NULL, NULL, NULL),
(488, 'Mandi', 14, NULL, NULL, NULL),
(489, 'Nahan', 14, NULL, NULL, NULL),
(490, 'Shimla', 14, NULL, NULL, NULL),
(491, 'Solan', 14, NULL, NULL, NULL),
(492, 'Sundarnagar', 14, NULL, NULL, NULL),
(493, 'Jammu', 15, NULL, NULL, NULL),
(494, 'Achabbal', 15, NULL, NULL, NULL),
(495, 'Akhnoor', 15, NULL, NULL, NULL),
(496, 'Anantnag', 15, NULL, NULL, NULL),
(497, 'Arnia', 15, NULL, NULL, NULL),
(498, 'Awantipora', 15, NULL, NULL, NULL),
(499, 'Bandipore', 15, NULL, NULL, NULL),
(500, 'Baramula', 15, NULL, NULL, NULL),
(501, 'Kathua', 15, NULL, NULL, NULL),
(502, 'Leh', 15, NULL, NULL, NULL),
(503, 'Punch', 15, NULL, NULL, NULL),
(504, 'Rajauri', 15, NULL, NULL, NULL),
(505, 'Sopore', 15, NULL, NULL, NULL),
(506, 'Srinagar', 15, NULL, NULL, NULL),
(507, 'Udhampur', 15, NULL, NULL, NULL),
(508, 'Amlabad', 16, NULL, NULL, NULL),
(509, 'Ara', 16, NULL, NULL, NULL),
(510, 'Barughutu', 16, NULL, NULL, NULL),
(511, 'Bokaro Steel City', 16, NULL, NULL, NULL),
(512, 'Chaibasa', 16, NULL, NULL, NULL),
(513, 'Chakradharpur', 16, NULL, NULL, NULL),
(514, 'Chandrapura', 16, NULL, NULL, NULL),
(515, 'Chatra', 16, NULL, NULL, NULL),
(516, 'Chirkunda', 16, NULL, NULL, NULL),
(517, 'Churi', 16, NULL, NULL, NULL),
(518, 'Daltonganj', 16, NULL, NULL, NULL),
(519, 'Deoghar', 16, NULL, NULL, NULL),
(520, 'Dhanbad', 16, NULL, NULL, NULL),
(521, 'Dumka', 16, NULL, NULL, NULL),
(522, 'Garhwa', 16, NULL, NULL, NULL),
(523, 'Ghatshila', 16, NULL, NULL, NULL),
(524, 'Giridih', 16, NULL, NULL, NULL),
(525, 'Godda', 16, NULL, NULL, NULL),
(526, 'Gomoh', 16, NULL, NULL, NULL),
(527, 'Gumia', 16, NULL, NULL, NULL),
(528, 'Gumla', 16, NULL, NULL, NULL),
(529, 'Hazaribag', 16, NULL, NULL, NULL),
(530, 'Hussainabad', 16, NULL, NULL, NULL),
(531, 'Jamshedpur', 16, NULL, NULL, NULL),
(532, 'Jamtara', 16, NULL, NULL, NULL),
(533, 'Jhumri Tilaiya', 16, NULL, NULL, NULL),
(534, 'Khunti', 16, NULL, NULL, NULL),
(535, 'Lohardaga', 16, NULL, NULL, NULL),
(536, 'Madhupur', 16, NULL, NULL, NULL),
(537, 'Mihijam', 16, NULL, NULL, NULL),
(538, 'Musabani', 16, NULL, NULL, NULL),
(539, 'Pakaur', 16, NULL, NULL, NULL),
(540, 'Patratu', 16, NULL, NULL, NULL),
(541, 'Phusro', 16, NULL, NULL, NULL),
(542, 'Ramngarh', 16, NULL, NULL, NULL),
(543, 'Ranchi', 16, NULL, NULL, NULL),
(544, 'Sahibganj', 16, NULL, NULL, NULL),
(545, 'Saunda', 16, NULL, NULL, NULL),
(546, 'Simdega', 16, NULL, NULL, NULL),
(547, 'Tenu Dam-cum- Kathhara', 16, NULL, NULL, NULL),
(548, 'Arasikere', 17, NULL, NULL, NULL),
(549, 'Bangalore', 17, NULL, NULL, NULL),
(550, 'Belgaum', 17, NULL, NULL, NULL),
(551, 'Bellary', 17, NULL, NULL, NULL),
(552, 'Chamrajnagar', 17, NULL, NULL, NULL),
(553, 'Chikkaballapur', 17, NULL, NULL, NULL),
(554, 'Chintamani', 17, NULL, NULL, NULL),
(555, 'Chitradurga', 17, NULL, NULL, NULL),
(556, 'Gulbarga', 17, NULL, NULL, NULL),
(557, 'Gundlupet', 17, NULL, NULL, NULL),
(558, 'Hassan', 17, NULL, NULL, NULL),
(559, 'Hospet', 17, NULL, NULL, NULL),
(560, 'Hubli', 17, NULL, NULL, NULL),
(561, 'Karkala', 17, NULL, NULL, NULL),
(562, 'Karwar', 17, NULL, NULL, NULL),
(563, 'Kolar', 17, NULL, NULL, NULL),
(564, 'Kota', 17, NULL, NULL, NULL),
(565, 'Lakshmeshwar', 17, NULL, NULL, NULL),
(566, 'Lingsugur', 17, NULL, NULL, NULL),
(567, 'Maddur', 17, NULL, NULL, NULL),
(568, 'Madhugiri', 17, NULL, NULL, NULL),
(569, 'Madikeri', 17, NULL, NULL, NULL),
(570, 'Magadi', 17, NULL, NULL, NULL),
(571, 'Mahalingpur', 17, NULL, NULL, NULL),
(572, 'Malavalli', 17, NULL, NULL, NULL),
(573, 'Malur', 17, NULL, NULL, NULL),
(574, 'Mandya', 17, NULL, NULL, NULL),
(575, 'Mangalore', 17, NULL, NULL, NULL),
(576, 'Manvi', 17, NULL, NULL, NULL),
(577, 'Mudalgi', 17, NULL, NULL, NULL),
(578, 'Mudbidri', 17, NULL, NULL, NULL),
(579, 'Muddebihal', 17, NULL, NULL, NULL),
(580, 'Mudhol', 17, NULL, NULL, NULL),
(581, 'Mulbagal', 17, NULL, NULL, NULL),
(582, 'Mundargi', 17, NULL, NULL, NULL),
(583, 'Mysore', 17, NULL, NULL, NULL),
(584, 'Nanjangud', 17, NULL, NULL, NULL),
(585, 'Pavagada', 17, NULL, NULL, NULL),
(586, 'Puttur', 17, NULL, NULL, NULL),
(587, 'Rabkavi Banhatti', 17, NULL, NULL, NULL),
(588, 'Raichur', 17, NULL, NULL, NULL),
(589, 'Ramanagaram', 17, NULL, NULL, NULL),
(590, 'Ramdurg', 17, NULL, NULL, NULL),
(591, 'Ranibennur', 17, NULL, NULL, NULL),
(592, 'Robertson Pet', 17, NULL, NULL, NULL),
(593, 'Ron', 17, NULL, NULL, NULL),
(594, 'Sadalgi', 17, NULL, NULL, NULL),
(595, 'Sagar', 17, NULL, NULL, NULL),
(596, 'Sakleshpur', 17, NULL, NULL, NULL),
(597, 'Sandur', 17, NULL, NULL, NULL),
(598, 'Sankeshwar', 17, NULL, NULL, NULL),
(599, 'Saundatti-Yellamma', 17, NULL, NULL, NULL),
(600, 'Savanur', 17, NULL, NULL, NULL),
(601, 'Sedam', 17, NULL, NULL, NULL),
(602, 'Shahabad', 17, NULL, NULL, NULL),
(603, 'Shahpur', 17, NULL, NULL, NULL),
(604, 'Shiggaon', 17, NULL, NULL, NULL),
(605, 'Shikapur', 17, NULL, NULL, NULL),
(606, 'Shimoga', 17, NULL, NULL, NULL),
(607, 'Shorapur', 17, NULL, NULL, NULL),
(608, 'Shrirangapattana', 17, NULL, NULL, NULL),
(609, 'Sidlaghatta', 17, NULL, NULL, NULL),
(610, 'Sindgi', 17, NULL, NULL, NULL),
(611, 'Sindhnur', 17, NULL, NULL, NULL),
(612, 'Sira', 17, NULL, NULL, NULL),
(613, 'Sirsi', 17, NULL, NULL, NULL),
(614, 'Siruguppa', 17, NULL, NULL, NULL),
(615, 'Srinivaspur', 17, NULL, NULL, NULL),
(616, 'Talikota', 17, NULL, NULL, NULL),
(617, 'Tarikere', 17, NULL, NULL, NULL),
(618, 'Tekkalakota', 17, NULL, NULL, NULL),
(619, 'Terdal', 17, NULL, NULL, NULL),
(620, 'Tiptur', 17, NULL, NULL, NULL),
(621, 'Tumkur', 17, NULL, NULL, NULL),
(622, 'Udupi', 17, NULL, NULL, NULL),
(623, 'Vijayapura', 17, NULL, NULL, NULL),
(624, 'Wadi', 17, NULL, NULL, NULL),
(625, 'Yadgir', 17, NULL, NULL, NULL),
(626, 'Adoor', 18, NULL, NULL, NULL),
(627, 'Akathiyoor', 18, NULL, NULL, NULL),
(628, 'Alappuzha', 18, NULL, NULL, NULL),
(629, 'Ancharakandy', 18, NULL, NULL, NULL),
(630, 'Aroor', 18, NULL, NULL, NULL),
(631, 'Ashtamichira', 18, NULL, NULL, NULL),
(632, 'Attingal', 18, NULL, NULL, NULL),
(633, 'Avinissery', 18, NULL, NULL, NULL),
(634, 'Chalakudy', 18, NULL, NULL, NULL),
(635, 'Changanassery', 18, NULL, NULL, NULL),
(636, 'Chendamangalam', 18, NULL, NULL, NULL),
(637, 'Chengannur', 18, NULL, NULL, NULL),
(638, 'Cherthala', 18, NULL, NULL, NULL),
(639, 'Cheruthazham', 18, NULL, NULL, NULL),
(640, 'Chittur-Thathamangalam', 18, NULL, NULL, NULL),
(641, 'Chockli', 18, NULL, NULL, NULL),
(642, 'Erattupetta', 18, NULL, NULL, NULL),
(643, 'Guruvayoor', 18, NULL, NULL, NULL),
(644, 'Irinjalakuda', 18, NULL, NULL, NULL),
(645, 'Kadirur', 18, NULL, NULL, NULL),
(646, 'Kalliasseri', 18, NULL, NULL, NULL),
(647, 'Kalpetta', 18, NULL, NULL, NULL),
(648, 'Kanhangad', 18, NULL, NULL, NULL),
(649, 'Kanjikkuzhi', 18, NULL, NULL, NULL),
(650, 'Kannur', 18, NULL, NULL, NULL),
(651, 'Kasaragod', 18, NULL, NULL, NULL),
(652, 'Kayamkulam', 18, NULL, NULL, NULL),
(653, 'Kochi', 18, NULL, NULL, NULL),
(654, 'Kodungallur', 18, NULL, NULL, NULL),
(655, 'Kollam', 18, NULL, NULL, NULL),
(656, 'Koothuparamba', 18, NULL, NULL, NULL),
(657, 'Kothamangalam', 18, NULL, NULL, NULL),
(658, 'Kottayam', 18, NULL, NULL, NULL),
(659, 'Kozhikode', 18, NULL, NULL, NULL),
(660, 'Kunnamkulam', 18, NULL, NULL, NULL),
(661, 'Malappuram', 18, NULL, NULL, NULL),
(662, 'Mattannur', 18, NULL, NULL, NULL),
(663, 'Mavelikkara', 18, NULL, NULL, NULL),
(664, 'Mavoor', 18, NULL, NULL, NULL),
(665, 'Muvattupuzha', 18, NULL, NULL, NULL),
(666, 'Nedumangad', 18, NULL, NULL, NULL),
(667, 'Neyyattinkara', 18, NULL, NULL, NULL),
(668, 'Ottappalam', 18, NULL, NULL, NULL),
(669, 'Palai', 18, NULL, NULL, NULL),
(670, 'Palakkad', 18, NULL, NULL, NULL),
(671, 'Panniyannur', 18, NULL, NULL, NULL),
(672, 'Pappinisseri', 18, NULL, NULL, NULL),
(673, 'Paravoor', 18, NULL, NULL, NULL),
(674, 'Pathanamthitta', 18, NULL, NULL, NULL),
(675, 'Payyannur', 18, NULL, NULL, NULL),
(676, 'Peringathur', 18, NULL, NULL, NULL),
(677, 'Perinthalmanna', 18, NULL, NULL, NULL),
(678, 'Perumbavoor', 18, NULL, NULL, NULL),
(679, 'Ponnani', 18, NULL, NULL, NULL),
(680, 'Punalur', 18, NULL, NULL, NULL),
(681, 'Quilandy', 18, NULL, NULL, NULL),
(682, 'Shoranur', 18, NULL, NULL, NULL),
(683, 'Taliparamba', 18, NULL, NULL, NULL),
(684, 'Thiruvalla', 18, NULL, NULL, NULL),
(685, 'Thiruvananthapuram', 18, NULL, NULL, NULL),
(686, 'Thodupuzha', 18, NULL, NULL, NULL),
(687, 'Thrissur', 18, NULL, NULL, NULL),
(688, 'Tirur', 18, NULL, NULL, NULL),
(689, 'Vadakara', 18, NULL, NULL, NULL),
(690, 'Vaikom', 18, NULL, NULL, NULL),
(691, 'Varkala', 18, NULL, NULL, NULL),
(692, 'Kavaratti', 19, NULL, NULL, NULL),
(693, 'Ashok Nagar', 20, NULL, NULL, NULL),
(694, 'Balaghat', 20, NULL, NULL, NULL),
(695, 'Betul', 20, NULL, NULL, NULL),
(696, 'Bhopal', 20, NULL, NULL, NULL),
(697, 'Burhanpur', 20, NULL, NULL, NULL),
(698, 'Chhatarpur', 20, NULL, NULL, NULL),
(699, 'Dabra', 20, NULL, NULL, NULL),
(700, 'Datia', 20, NULL, NULL, NULL),
(701, 'Dewas', 20, NULL, NULL, NULL),
(702, 'Dhar', 20, NULL, NULL, NULL),
(703, 'Fatehabad', 20, NULL, NULL, NULL),
(704, 'Gwalior', 20, NULL, NULL, NULL),
(705, 'Indore', 20, NULL, NULL, NULL),
(706, 'Itarsi', 20, NULL, NULL, NULL),
(707, 'Jabalpur', 20, NULL, NULL, NULL),
(708, 'Katni', 20, NULL, NULL, NULL),
(709, 'Kotma', 20, NULL, NULL, NULL),
(710, 'Lahar', 20, NULL, NULL, NULL),
(711, 'Lundi', 20, NULL, NULL, NULL),
(712, 'Maharajpur', 20, NULL, NULL, NULL),
(713, 'Mahidpur', 20, NULL, NULL, NULL),
(714, 'Maihar', 20, NULL, NULL, NULL),
(715, 'Malajkhand', 20, NULL, NULL, NULL),
(716, 'Manasa', 20, NULL, NULL, NULL),
(717, 'Manawar', 20, NULL, NULL, NULL),
(718, 'Mandideep', 20, NULL, NULL, NULL),
(719, 'Mandla', 20, NULL, NULL, NULL),
(720, 'Mandsaur', 20, NULL, NULL, NULL),
(721, 'Mauganj', 20, NULL, NULL, NULL),
(722, 'Mhow Cantonment', 20, NULL, NULL, NULL),
(723, 'Mhowgaon', 20, NULL, NULL, NULL),
(724, 'Morena', 20, NULL, NULL, NULL),
(725, 'Multai', 20, NULL, NULL, NULL),
(726, 'Murwara', 20, NULL, NULL, NULL),
(727, 'Nagda', 20, NULL, NULL, NULL),
(728, 'Nainpur', 20, NULL, NULL, NULL),
(729, 'Narsinghgarh', 20, NULL, NULL, NULL),
(730, 'Narsinghgarh', 20, NULL, NULL, NULL),
(731, 'Neemuch', 20, NULL, NULL, NULL),
(732, 'Nepanagar', 20, NULL, NULL, NULL),
(733, 'Niwari', 20, NULL, NULL, NULL),
(734, 'Nowgong', 20, NULL, NULL, NULL),
(735, 'Nowrozabad', 20, NULL, NULL, NULL),
(736, 'Pachore', 20, NULL, NULL, NULL),
(737, 'Pali', 20, NULL, NULL, NULL),
(738, 'Panagar', 20, NULL, NULL, NULL),
(739, 'Pandhurna', 20, NULL, NULL, NULL),
(740, 'Panna', 20, NULL, NULL, NULL),
(741, 'Pasan', 20, NULL, NULL, NULL),
(742, 'Pipariya', 20, NULL, NULL, NULL),
(743, 'Pithampur', 20, NULL, NULL, NULL),
(744, 'Porsa', 20, NULL, NULL, NULL),
(745, 'Prithvipur', 20, NULL, NULL, NULL),
(746, 'Raghogarh-Vijaypur', 20, NULL, NULL, NULL),
(747, 'Rahatgarh', 20, NULL, NULL, NULL),
(748, 'Raisen', 20, NULL, NULL, NULL),
(749, 'Rajgarh', 20, NULL, NULL, NULL),
(750, 'Ratlam', 20, NULL, NULL, NULL),
(751, 'Rau', 20, NULL, NULL, NULL),
(752, 'Rehli', 20, NULL, NULL, NULL),
(753, 'Rewa', 20, NULL, NULL, NULL),
(754, 'Sabalgarh', 20, NULL, NULL, NULL),
(755, 'Sagar', 20, NULL, NULL, NULL),
(756, 'Sanawad', 20, NULL, NULL, NULL),
(757, 'Sarangpur', 20, NULL, NULL, NULL),
(758, 'Sarni', 20, NULL, NULL, NULL),
(759, 'Satna', 20, NULL, NULL, NULL),
(760, 'Sausar', 20, NULL, NULL, NULL),
(761, 'Sehore', 20, NULL, NULL, NULL),
(762, 'Sendhwa', 20, NULL, NULL, NULL),
(763, 'Seoni', 20, NULL, NULL, NULL),
(764, 'Seoni-Malwa', 20, NULL, NULL, NULL),
(765, 'Shahdol', 20, NULL, NULL, NULL),
(766, 'Shajapur', 20, NULL, NULL, NULL),
(767, 'Shamgarh', 20, NULL, NULL, NULL),
(768, 'Sheopur', 20, NULL, NULL, NULL),
(769, 'Shivpuri', 20, NULL, NULL, NULL),
(770, 'Shujalpur', 20, NULL, NULL, NULL),
(771, 'Sidhi', 20, NULL, NULL, NULL),
(772, 'Sihora', 20, NULL, NULL, NULL),
(773, 'Singrauli', 20, NULL, NULL, NULL),
(774, 'Sironj', 20, NULL, NULL, NULL),
(775, 'Sohagpur', 20, NULL, NULL, NULL),
(776, 'Tarana', 20, NULL, NULL, NULL),
(777, 'Tikamgarh', 20, NULL, NULL, NULL),
(778, 'Ujhani', 20, NULL, NULL, NULL),
(779, 'Ujjain', 20, NULL, NULL, NULL),
(780, 'Umaria', 20, NULL, NULL, NULL),
(781, 'Vidisha', 20, NULL, NULL, NULL),
(782, 'Wara Seoni', 20, NULL, NULL, NULL),
(783, 'Ahmednagar', 21, NULL, NULL, NULL),
(784, 'Akola', 21, NULL, NULL, NULL),
(785, 'Amravati', 21, NULL, NULL, NULL),
(786, 'Aurangabad', 21, NULL, NULL, NULL),
(787, 'Baramati', 21, NULL, NULL, NULL),
(788, 'Chalisgaon', 21, NULL, NULL, NULL),
(789, 'Chinchani', 21, NULL, NULL, NULL),
(790, 'Devgarh', 21, NULL, NULL, NULL),
(791, 'Dhule', 21, NULL, NULL, NULL),
(792, 'Dombivli', 21, NULL, NULL, NULL),
(793, 'Durgapur', 21, NULL, NULL, NULL),
(794, 'Ichalkaranji', 21, NULL, NULL, NULL),
(795, 'Jalna', 21, NULL, NULL, NULL),
(796, 'Kalyan', 21, NULL, NULL, NULL),
(797, 'Latur', 21, NULL, NULL, NULL),
(798, 'Loha', 21, NULL, NULL, NULL),
(799, 'Lonar', 21, NULL, NULL, NULL),
(800, 'Lonavla', 21, NULL, NULL, NULL),
(801, 'Mahad', 21, NULL, NULL, NULL),
(802, 'Mahuli', 21, NULL, NULL, NULL),
(803, 'Malegaon', 21, NULL, NULL, NULL),
(804, 'Malkapur', 21, NULL, NULL, NULL),
(805, 'Manchar', 21, NULL, NULL, NULL),
(806, 'Mangalvedhe', 21, NULL, NULL, NULL),
(807, 'Mangrulpir', 21, NULL, NULL, NULL),
(808, 'Manjlegaon', 21, NULL, NULL, NULL),
(809, 'Manmad', 21, NULL, NULL, NULL),
(810, 'Manwath', 21, NULL, NULL, NULL),
(811, 'Mehkar', 21, NULL, NULL, NULL),
(812, 'Mhaswad', 21, NULL, NULL, NULL),
(813, 'Miraj', 21, NULL, NULL, NULL),
(814, 'Morshi', 21, NULL, NULL, NULL),
(815, 'Mukhed', 21, NULL, NULL, NULL),
(816, 'Mul', 21, NULL, NULL, NULL),
(817, 'Mumbai', 21, NULL, NULL, NULL),
(818, 'Murtijapur', 21, NULL, NULL, NULL),
(819, 'Nagpur', 21, NULL, NULL, NULL),
(820, 'Nalasopara', 21, NULL, NULL, NULL),
(821, 'Nanded-Waghala', 21, NULL, NULL, NULL),
(822, 'Nandgaon', 21, NULL, NULL, NULL),
(823, 'Nandura', 21, NULL, NULL, NULL),
(824, 'Nandurbar', 21, NULL, NULL, NULL),
(825, 'Narkhed', 21, NULL, NULL, NULL),
(826, 'Nashik', 21, NULL, NULL, NULL),
(827, 'Navi Mumbai', 21, NULL, NULL, NULL),
(828, 'Nawapur', 21, NULL, NULL, NULL),
(829, 'Nilanga', 21, NULL, NULL, NULL),
(830, 'Osmanabad', 21, NULL, NULL, NULL),
(831, 'Ozar', 21, NULL, NULL, NULL),
(832, 'Pachora', 21, NULL, NULL, NULL),
(833, 'Paithan', 21, NULL, NULL, NULL),
(834, 'Palghar', 21, NULL, NULL, NULL),
(835, 'Pandharkaoda', 21, NULL, NULL, NULL),
(836, 'Pandharpur', 21, NULL, NULL, NULL),
(837, 'Panvel', 21, NULL, NULL, NULL),
(838, 'Parbhani', 21, NULL, NULL, NULL),
(839, 'Parli', 21, NULL, NULL, NULL),
(840, 'Parola', 21, NULL, NULL, NULL),
(841, 'Partur', 21, NULL, NULL, NULL),
(842, 'Pathardi', 21, NULL, NULL, NULL),
(843, 'Pathri', 21, NULL, NULL, NULL),
(844, 'Patur', 21, NULL, NULL, NULL),
(845, 'Pauni', 21, NULL, NULL, NULL),
(846, 'Pen', 21, NULL, NULL, NULL),
(847, 'Phaltan', 21, NULL, NULL, NULL),
(848, 'Pulgaon', 21, NULL, NULL, NULL),
(849, 'Pune', 21, NULL, NULL, NULL),
(850, 'Purna', 21, NULL, NULL, NULL),
(851, 'Pusad', 21, NULL, NULL, NULL),
(852, 'Rahuri', 21, NULL, NULL, NULL),
(853, 'Rajura', 21, NULL, NULL, NULL),
(854, 'Ramtek', 21, NULL, NULL, NULL),
(855, 'Ratnagiri', 21, NULL, NULL, NULL),
(856, 'Raver', 21, NULL, NULL, NULL),
(857, 'Risod', 21, NULL, NULL, NULL),
(858, 'Sailu', 21, NULL, NULL, NULL),
(859, 'Sangamner', 21, NULL, NULL, NULL),
(860, 'Sangli', 21, NULL, NULL, NULL),
(861, 'Sangole', 21, NULL, NULL, NULL),
(862, 'Sasvad', 21, NULL, NULL, NULL),
(863, 'Satana', 21, NULL, NULL, NULL),
(864, 'Satara', 21, NULL, NULL, NULL),
(865, 'Savner', 21, NULL, NULL, NULL),
(866, 'Sawantwadi', 21, NULL, NULL, NULL),
(867, 'Shahade', 21, NULL, NULL, NULL),
(868, 'Shegaon', 21, NULL, NULL, NULL),
(869, 'Shendurjana', 21, NULL, NULL, NULL),
(870, 'Shirdi', 21, NULL, NULL, NULL),
(871, 'Shirpur-Warwade', 21, NULL, NULL, NULL),
(872, 'Shirur', 21, NULL, NULL, NULL),
(873, 'Shrigonda', 21, NULL, NULL, NULL),
(874, 'Shrirampur', 21, NULL, NULL, NULL),
(875, 'Sillod', 21, NULL, NULL, NULL),
(876, 'Sinnar', 21, NULL, NULL, NULL),
(877, 'Solapur', 21, NULL, NULL, NULL),
(878, 'Soyagaon', 21, NULL, NULL, NULL),
(879, 'Talegaon Dabhade', 21, NULL, NULL, NULL),
(880, 'Talode', 21, NULL, NULL, NULL),
(881, 'Tasgaon', 21, NULL, NULL, NULL),
(882, 'Tirora', 21, NULL, NULL, NULL),
(883, 'Tuljapur', 21, NULL, NULL, NULL),
(884, 'Tumsar', 21, NULL, NULL, NULL),
(885, 'Uran', 21, NULL, NULL, NULL),
(886, 'Uran Islampur', 21, NULL, NULL, NULL),
(887, 'Wadgaon Road', 21, NULL, NULL, NULL),
(888, 'Wai', 21, NULL, NULL, NULL),
(889, 'Wani', 21, NULL, NULL, NULL),
(890, 'Wardha', 21, NULL, NULL, NULL),
(891, 'Warora', 21, NULL, NULL, NULL),
(892, 'Warud', 21, NULL, NULL, NULL),
(893, 'Washim', 21, NULL, NULL, NULL),
(894, 'Yevla', 21, NULL, NULL, NULL),
(895, 'Uchgaon', 21, NULL, NULL, NULL),
(896, 'Udgir', 21, NULL, NULL, NULL),
(897, 'Umarga', 21, NULL, NULL, NULL),
(898, 'Umarkhed', 21, NULL, NULL, NULL),
(899, 'Umred', 21, NULL, NULL, NULL),
(900, 'Vadgaon Kasba', 21, NULL, NULL, NULL),
(901, 'Vaijapur', 21, NULL, NULL, NULL),
(902, 'Vasai', 21, NULL, NULL, NULL),
(903, 'Virar', 21, NULL, NULL, NULL),
(904, 'Vita', 21, NULL, NULL, NULL),
(905, 'Yavatmal', 21, NULL, NULL, NULL),
(906, 'Yawal', 21, NULL, NULL, NULL),
(907, 'Imphal', 22, NULL, NULL, NULL),
(908, 'Kakching', 22, NULL, NULL, NULL),
(909, 'Lilong', 22, NULL, NULL, NULL),
(910, 'Mayang Imphal', 22, NULL, NULL, NULL),
(911, 'Thoubal', 22, NULL, NULL, NULL),
(912, 'Jowai', 23, NULL, NULL, NULL),
(913, 'Nongstoin', 23, NULL, NULL, NULL),
(914, 'Shillong', 23, NULL, NULL, NULL),
(915, 'Tura', 23, NULL, NULL, NULL),
(916, 'Aizawl', 24, NULL, NULL, NULL),
(917, 'Champhai', 24, NULL, NULL, NULL),
(918, 'Lunglei', 24, NULL, NULL, NULL),
(919, 'Saiha', 24, NULL, NULL, NULL),
(920, 'Dimapur', 25, NULL, NULL, NULL),
(921, 'Kohima', 25, NULL, NULL, NULL),
(922, 'Mokokchung', 25, NULL, NULL, NULL),
(923, 'Tuensang', 25, NULL, NULL, NULL),
(924, 'Wokha', 25, NULL, NULL, NULL),
(925, 'Zunheboto', 25, NULL, NULL, NULL),
(950, 'Anandapur', 26, NULL, NULL, NULL),
(951, 'Anugul', 26, NULL, NULL, NULL),
(952, 'Asika', 26, NULL, NULL, NULL),
(953, 'Balangir', 26, NULL, NULL, NULL),
(954, 'Balasore', 26, NULL, NULL, NULL),
(955, 'Baleshwar', 26, NULL, NULL, NULL),
(956, 'Bamra', 26, NULL, NULL, NULL),
(957, 'Barbil', 26, NULL, NULL, NULL),
(958, 'Bargarh', 26, NULL, NULL, NULL),
(959, 'Bargarh', 26, NULL, NULL, NULL),
(960, 'Baripada', 26, NULL, NULL, NULL),
(961, 'Basudebpur', 26, NULL, NULL, NULL),
(962, 'Belpahar', 26, NULL, NULL, NULL),
(963, 'Bhadrak', 26, NULL, NULL, NULL),
(964, 'Bhawanipatna', 26, NULL, NULL, NULL),
(965, 'Bhuban', 26, NULL, NULL, NULL),
(966, 'Bhubaneswar', 26, NULL, NULL, NULL),
(967, 'Biramitrapur', 26, NULL, NULL, NULL),
(968, 'Brahmapur', 26, NULL, NULL, NULL),
(969, 'Brajrajnagar', 26, NULL, NULL, NULL),
(970, 'Byasanagar', 26, NULL, NULL, NULL),
(971, 'Cuttack', 26, NULL, NULL, NULL),
(972, 'Debagarh', 26, NULL, NULL, NULL),
(973, 'Dhenkanal', 26, NULL, NULL, NULL),
(974, 'Gunupur', 26, NULL, NULL, NULL),
(975, 'Hinjilicut', 26, NULL, NULL, NULL),
(976, 'Jagatsinghapur', 26, NULL, NULL, NULL),
(977, 'Jajapur', 26, NULL, NULL, NULL),
(978, 'Jaleswar', 26, NULL, NULL, NULL),
(979, 'Jatani', 26, NULL, NULL, NULL),
(980, 'Jeypur', 26, NULL, NULL, NULL),
(981, 'Jharsuguda', 26, NULL, NULL, NULL),
(982, 'Joda', 26, NULL, NULL, NULL),
(983, 'Kantabanji', 26, NULL, NULL, NULL),
(984, 'Karanjia', 26, NULL, NULL, NULL),
(985, 'Kendrapara', 26, NULL, NULL, NULL),
(986, 'Kendujhar', 26, NULL, NULL, NULL),
(987, 'Khordha', 26, NULL, NULL, NULL),
(988, 'Koraput', 26, NULL, NULL, NULL),
(989, 'Malkangiri', 26, NULL, NULL, NULL),
(990, 'Nabarangapur', 26, NULL, NULL, NULL),
(991, 'Paradip', 26, NULL, NULL, NULL),
(992, 'Parlakhemundi', 26, NULL, NULL, NULL),
(993, 'Pattamundai', 26, NULL, NULL, NULL),
(994, 'Phulabani', 26, NULL, NULL, NULL),
(995, 'Puri', 26, NULL, NULL, NULL),
(996, 'Rairangpur', 26, NULL, NULL, NULL),
(997, 'Rajagangapur', 26, NULL, NULL, NULL),
(998, 'Raurkela', 26, NULL, NULL, NULL),
(999, 'Rayagada', 26, NULL, NULL, NULL),
(1000, 'Sambalpur', 26, NULL, NULL, NULL),
(1001, 'Soro', 26, NULL, NULL, NULL),
(1002, 'Sunabeda', 26, NULL, NULL, NULL),
(1003, 'Sundargarh', 26, NULL, NULL, NULL),
(1004, 'Talcher', 26, NULL, NULL, NULL),
(1005, 'Titlagarh', 26, NULL, NULL, NULL),
(1006, 'Umarkote', 26, NULL, NULL, NULL),
(1007, 'Karaikal', 27, NULL, NULL, NULL),
(1008, 'Mahe', 27, NULL, NULL, NULL),
(1009, 'Puducherry', 27, NULL, NULL, NULL),
(1010, 'Yanam', 27, NULL, NULL, NULL),
(1011, 'Ahmedgarh', 28, NULL, NULL, NULL),
(1012, 'Amritsar', 28, NULL, NULL, NULL),
(1013, 'Barnala', 28, NULL, NULL, NULL),
(1014, 'Batala', 28, NULL, NULL, NULL),
(1015, 'Bathinda', 28, NULL, NULL, NULL),
(1016, 'Bhagha Purana', 28, NULL, NULL, NULL),
(1017, 'Budhlada', 28, NULL, NULL, NULL),
(1018, 'Chandigarh', 28, NULL, NULL, NULL),
(1019, 'Dasua', 28, NULL, NULL, NULL),
(1020, 'Dhuri', 28, NULL, NULL, NULL),
(1021, 'Dinanagar', 28, NULL, NULL, NULL),
(1022, 'Faridkot', 28, NULL, NULL, NULL),
(1023, 'Fazilka', 28, NULL, NULL, NULL),
(1024, 'Firozpur', 28, NULL, NULL, NULL),
(1025, 'Firozpur Cantt.', 28, NULL, NULL, NULL),
(1026, 'Giddarbaha', 28, NULL, NULL, NULL),
(1027, 'Gobindgarh', 28, NULL, NULL, NULL),
(1028, 'Gurdaspur', 28, NULL, NULL, NULL),
(1029, 'Hoshiarpur', 28, NULL, NULL, NULL),
(1030, 'Jagraon', 28, NULL, NULL, NULL),
(1031, 'Jaitu', 28, NULL, NULL, NULL),
(1032, 'Jalalabad', 28, NULL, NULL, NULL),
(1033, 'Jalandhar', 28, NULL, NULL, NULL),
(1034, 'Jalandhar Cantt.', 28, NULL, NULL, NULL),
(1035, 'Jandiala', 28, NULL, NULL, NULL),
(1036, 'Kapurthala', 28, NULL, NULL, NULL),
(1037, 'Karoran', 28, NULL, NULL, NULL),
(1038, 'Kartarpur', 28, NULL, NULL, NULL),
(1039, 'Khanna', 28, NULL, NULL, NULL),
(1040, 'Kharar', 28, NULL, NULL, NULL),
(1041, 'Kot Kapura', 28, NULL, NULL, NULL),
(1042, 'Kurali', 28, NULL, NULL, NULL),
(1043, 'Longowal', 28, NULL, NULL, NULL),
(1044, 'Ludhiana', 28, NULL, NULL, NULL),
(1045, 'Malerkotla', 28, NULL, NULL, NULL),
(1046, 'Malout', 28, NULL, NULL, NULL),
(1047, 'Mansa', 28, NULL, NULL, NULL),
(1048, 'Maur', 28, NULL, NULL, NULL),
(1049, 'Moga', 28, NULL, NULL, NULL),
(1050, 'Mohali', 28, NULL, NULL, NULL),
(1051, 'Morinda', 28, NULL, NULL, NULL),
(1052, 'Mukerian', 28, NULL, NULL, NULL),
(1053, 'Muktsar', 28, NULL, NULL, NULL),
(1054, 'Nabha', 28, NULL, NULL, NULL),
(1055, 'Nakodar', 28, NULL, NULL, NULL),
(1056, 'Nangal', 28, NULL, NULL, NULL),
(1057, 'Nawanshahr', 28, NULL, NULL, NULL),
(1058, 'Pathankot', 28, NULL, NULL, NULL),
(1059, 'Patiala', 28, NULL, NULL, NULL),
(1060, 'Patran', 28, NULL, NULL, NULL),
(1061, 'Patti', 28, NULL, NULL, NULL),
(1062, 'Phagwara', 28, NULL, NULL, NULL),
(1063, 'Phillaur', 28, NULL, NULL, NULL),
(1064, 'Qadian', 28, NULL, NULL, NULL),
(1065, 'Raikot', 28, NULL, NULL, NULL),
(1066, 'Rajpura', 28, NULL, NULL, NULL),
(1067, 'Rampura Phul', 28, NULL, NULL, NULL),
(1068, 'Rupnagar', 28, NULL, NULL, NULL),
(1069, 'Samana', 28, NULL, NULL, NULL),
(1070, 'Sangrur', 28, NULL, NULL, NULL),
(1071, 'Sirhind Fatehgarh Sahib', 28, NULL, NULL, NULL),
(1072, 'Sujanpur', 28, NULL, NULL, NULL),
(1073, 'Sunam', 28, NULL, NULL, NULL),
(1074, 'Talwara', 28, NULL, NULL, NULL),
(1075, 'Tarn Taran', 28, NULL, NULL, NULL),
(1076, 'Urmar Tanda', 28, NULL, NULL, NULL),
(1077, 'Zira', 28, NULL, NULL, NULL),
(1078, 'Zirakpur', 28, NULL, NULL, NULL),
(1079, 'Bali', 29, NULL, NULL, NULL),
(1080, 'Banswara', 29, NULL, NULL, NULL),
(1081, 'Ajmer', 29, NULL, NULL, NULL),
(1082, 'Alwar', 29, NULL, NULL, NULL),
(1083, 'Bandikui', 29, NULL, NULL, NULL),
(1084, 'Baran', 29, NULL, NULL, NULL),
(1085, 'Barmer', 29, NULL, NULL, NULL),
(1086, 'Bikaner', 29, NULL, NULL, NULL),
(1087, 'Fatehpur', 29, NULL, NULL, NULL),
(1088, 'Jaipur', 29, NULL, NULL, NULL),
(1089, 'Jaisalmer', 29, NULL, NULL, NULL),
(1090, 'Jodhpur', 29, NULL, NULL, NULL),
(1091, 'Kota', 29, NULL, NULL, NULL),
(1092, 'Lachhmangarh', 29, NULL, NULL, NULL),
(1093, 'Ladnu', 29, NULL, NULL, NULL),
(1094, 'Lakheri', 29, NULL, NULL, NULL),
(1095, 'Lalsot', 29, NULL, NULL, NULL),
(1096, 'Losal', 29, NULL, NULL, NULL),
(1097, 'Makrana', 29, NULL, NULL, NULL),
(1098, 'Malpura', 29, NULL, NULL, NULL),
(1099, 'Mandalgarh', 29, NULL, NULL, NULL),
(1100, 'Mandawa', 29, NULL, NULL, NULL),
(1101, 'Mangrol', 29, NULL, NULL, NULL),
(1102, 'Merta City', 29, NULL, NULL, NULL),
(1103, 'Mount Abu', 29, NULL, NULL, NULL),
(1104, 'Nadbai', 29, NULL, NULL, NULL),
(1105, 'Nagar', 29, NULL, NULL, NULL),
(1106, 'Nagaur', 29, NULL, NULL, NULL),
(1107, 'Nargund', 29, NULL, NULL, NULL),
(1108, 'Nasirabad', 29, NULL, NULL, NULL),
(1109, 'Nathdwara', 29, NULL, NULL, NULL),
(1110, 'Navalgund', 29, NULL, NULL, NULL),
(1111, 'Nawalgarh', 29, NULL, NULL, NULL),
(1112, 'Neem-Ka-Thana', 29, NULL, NULL, NULL),
(1113, 'Nelamangala', 29, NULL, NULL, NULL),
(1114, 'Nimbahera', 29, NULL, NULL, NULL),
(1115, 'Nipani', 29, NULL, NULL, NULL),
(1116, 'Niwai', 29, NULL, NULL, NULL),
(1117, 'Nohar', 29, NULL, NULL, NULL),
(1118, 'Nokha', 29, NULL, NULL, NULL),
(1119, 'Pali', 29, NULL, NULL, NULL),
(1120, 'Phalodi', 29, NULL, NULL, NULL),
(1121, 'Phulera', 29, NULL, NULL, NULL),
(1122, 'Pilani', 29, NULL, NULL, NULL),
(1123, 'Pilibanga', 29, NULL, NULL, NULL),
(1124, 'Pindwara', 29, NULL, NULL, NULL),
(1125, 'Pipar City', 29, NULL, NULL, NULL),
(1126, 'Prantij', 29, NULL, NULL, NULL),
(1127, 'Pratapgarh', 29, NULL, NULL, NULL),
(1128, 'Raisinghnagar', 29, NULL, NULL, NULL),
(1129, 'Rajakhera', 29, NULL, NULL, NULL),
(1130, 'Rajaldesar', 29, NULL, NULL, NULL),
(1131, 'Rajgarh (Alwar)', 29, NULL, NULL, NULL),
(1132, 'Rajgarh (Churu', 29, NULL, NULL, NULL),
(1133, 'Rajsamand', 29, NULL, NULL, NULL),
(1134, 'Ramganj Mandi', 29, NULL, NULL, NULL),
(1135, 'Ramngarh', 29, NULL, NULL, NULL),
(1136, 'Ratangarh', 29, NULL, NULL, NULL),
(1137, 'Rawatbhata', 29, NULL, NULL, NULL),
(1138, 'Rawatsar', 29, NULL, NULL, NULL),
(1139, 'Reengus', 29, NULL, NULL, NULL),
(1140, 'Sadri', 29, NULL, NULL, NULL),
(1141, 'Sadulshahar', 29, NULL, NULL, NULL),
(1142, 'Sagwara', 29, NULL, NULL, NULL),
(1143, 'Sambhar', 29, NULL, NULL, NULL),
(1144, 'Sanchore', 29, NULL, NULL, NULL),
(1145, 'Sangaria', 29, NULL, NULL, NULL),
(1146, 'Sardarshahar', 29, NULL, NULL, NULL),
(1147, 'Sawai Madhopur', 29, NULL, NULL, NULL),
(1148, 'Shahpura', 29, NULL, NULL, NULL),
(1149, 'Shahpura', 29, NULL, NULL, NULL),
(1150, 'Sheoganj', 29, NULL, NULL, NULL),
(1151, 'Sikar', 29, NULL, NULL, NULL),
(1152, 'Sirohi', 29, NULL, NULL, NULL),
(1153, 'Sojat', 29, NULL, NULL, NULL),
(1154, 'Sri Madhopur', 29, NULL, NULL, NULL),
(1155, 'Sujangarh', 29, NULL, NULL, NULL),
(1156, 'Sumerpur', 29, NULL, NULL, NULL),
(1157, 'Suratgarh', 29, NULL, NULL, NULL),
(1158, 'Taranagar', 29, NULL, NULL, NULL),
(1159, 'Todabhim', 29, NULL, NULL, NULL),
(1160, 'Todaraisingh', 29, NULL, NULL, NULL),
(1161, 'Tonk', 29, NULL, NULL, NULL),
(1162, 'Udaipur', 29, NULL, NULL, NULL),
(1163, 'Udaipurwati', 29, NULL, NULL, NULL),
(1164, 'Vijainagar', 29, NULL, NULL, NULL),
(1165, 'Gangtok', 30, NULL, NULL, NULL),
(1166, 'Calcutta', 36, NULL, NULL, NULL),
(1167, 'Arakkonam', 31, NULL, NULL, NULL),
(1168, 'Arcot', 31, NULL, NULL, NULL),
(1169, 'Aruppukkottai', 31, NULL, NULL, NULL),
(1170, 'Bhavani', 31, NULL, NULL, NULL),
(1171, 'Chengalpattu', 31, NULL, NULL, NULL),
(1172, 'Chennai', 31, NULL, NULL, NULL),
(1173, 'Chinna salem', 31, NULL, NULL, NULL),
(1174, 'Coimbatore', 31, NULL, NULL, NULL),
(1175, 'Coonoor', 31, NULL, NULL, NULL),
(1176, 'Cuddalore', 31, NULL, NULL, NULL),
(1177, 'Dharmapuri', 31, NULL, NULL, NULL),
(1178, 'Dindigul', 31, NULL, NULL, NULL),
(1179, 'Erode', 31, NULL, NULL, NULL),
(1180, 'Gudalur', 31, NULL, NULL, NULL),
(1181, 'Gudalur', 31, NULL, NULL, NULL),
(1182, 'Gudalur', 31, NULL, NULL, NULL),
(1183, 'Kanchipuram', 31, NULL, NULL, NULL),
(1184, 'Karaikudi', 31, NULL, NULL, NULL),
(1185, 'Karungal', 31, NULL, NULL, NULL),
(1186, 'Karur', 31, NULL, NULL, NULL),
(1187, 'Kollankodu', 31, NULL, NULL, NULL),
(1188, 'Lalgudi', 31, NULL, NULL, NULL),
(1189, 'Madurai', 31, NULL, NULL, NULL),
(1190, 'Nagapattinam', 31, NULL, NULL, NULL),
(1191, 'Nagercoil', 31, NULL, NULL, NULL),
(1192, 'Namagiripettai', 31, NULL, NULL, NULL),
(1193, 'Namakkal', 31, NULL, NULL, NULL),
(1194, 'Nandivaram-Guduvancheri', 31, NULL, NULL, NULL),
(1195, 'Nanjikottai', 31, NULL, NULL, NULL),
(1196, 'Natham', 31, NULL, NULL, NULL),
(1197, 'Nellikuppam', 31, NULL, NULL, NULL),
(1198, 'Neyveli', 31, NULL, NULL, NULL),
(1199, 'O\' Valley', 31, NULL, NULL, NULL),
(1200, 'Oddanchatram', 31, NULL, NULL, NULL),
(1201, 'P.N.Patti', 31, NULL, NULL, NULL),
(1202, 'Pacode', 31, NULL, NULL, NULL),
(1203, 'Padmanabhapuram', 31, NULL, NULL, NULL),
(1204, 'Palani', 31, NULL, NULL, NULL),
(1205, 'Palladam', 31, NULL, NULL, NULL),
(1206, 'Pallapatti', 31, NULL, NULL, NULL),
(1207, 'Pallikonda', 31, NULL, NULL, NULL),
(1208, 'Panagudi', 31, NULL, NULL, NULL),
(1209, 'Panruti', 31, NULL, NULL, NULL),
(1210, 'Paramakudi', 31, NULL, NULL, NULL),
(1211, 'Parangipettai', 31, NULL, NULL, NULL),
(1212, 'Pattukkottai', 31, NULL, NULL, NULL),
(1213, 'Perambalur', 31, NULL, NULL, NULL),
(1214, 'Peravurani', 31, NULL, NULL, NULL),
(1215, 'Periyakulam', 31, NULL, NULL, NULL),
(1216, 'Periyasemur', 31, NULL, NULL, NULL),
(1217, 'Pernampattu', 31, NULL, NULL, NULL),
(1218, 'Pollachi', 31, NULL, NULL, NULL),
(1219, 'Polur', 31, NULL, NULL, NULL),
(1220, 'Ponneri', 31, NULL, NULL, NULL),
(1221, 'Pudukkottai', 31, NULL, NULL, NULL),
(1222, 'Pudupattinam', 31, NULL, NULL, NULL),
(1223, 'Puliyankudi', 31, NULL, NULL, NULL),
(1224, 'Punjaipugalur', 31, NULL, NULL, NULL),
(1225, 'Rajapalayam', 31, NULL, NULL, NULL),
(1226, 'Ramanathapuram', 31, NULL, NULL, NULL),
(1227, 'Rameshwaram', 31, NULL, NULL, NULL),
(1228, 'Rasipuram', 31, NULL, NULL, NULL),
(1229, 'Salem', 31, NULL, NULL, NULL),
(1230, 'Sankarankoil', 31, NULL, NULL, NULL),
(1231, 'Sankari', 31, NULL, NULL, NULL),
(1232, 'Sathyamangalam', 31, NULL, NULL, NULL),
(1233, 'Sattur', 31, NULL, NULL, NULL),
(1234, 'Shenkottai', 31, NULL, NULL, NULL),
(1235, 'Sholavandan', 31, NULL, NULL, NULL),
(1236, 'Sholingur', 31, NULL, NULL, NULL),
(1237, 'Sirkali', 31, NULL, NULL, NULL),
(1238, 'Sivaganga', 31, NULL, NULL, NULL),
(1239, 'Sivagiri', 31, NULL, NULL, NULL),
(1240, 'Sivakasi', 31, NULL, NULL, NULL),
(1241, 'Srivilliputhur', 31, NULL, NULL, NULL),
(1242, 'Surandai', 31, NULL, NULL, NULL),
(1243, 'Suriyampalayam', 31, NULL, NULL, NULL),
(1244, 'Tenkasi', 31, NULL, NULL, NULL),
(1245, 'Thammampatti', 31, NULL, NULL, NULL),
(1246, 'Thanjavur', 31, NULL, NULL, NULL),
(1247, 'Tharamangalam', 31, NULL, NULL, NULL),
(1248, 'Tharangambadi', 31, NULL, NULL, NULL),
(1249, 'Theni Allinagaram', 31, NULL, NULL, NULL),
(1250, 'Thirumangalam', 31, NULL, NULL, NULL),
(1251, 'Thirunindravur', 31, NULL, NULL, NULL),
(1252, 'Thiruparappu', 31, NULL, NULL, NULL),
(1253, 'Thirupuvanam', 31, NULL, NULL, NULL),
(1254, 'Thiruthuraipoondi', 31, NULL, NULL, NULL),
(1255, 'Thiruvallur', 31, NULL, NULL, NULL),
(1256, 'Thiruvarur', 31, NULL, NULL, NULL),
(1257, 'Thoothukudi', 31, NULL, NULL, NULL),
(1258, 'Thuraiyur', 31, NULL, NULL, NULL),
(1259, 'Tindivanam', 31, NULL, NULL, NULL),
(1260, 'Tiruchendur', 31, NULL, NULL, NULL),
(1261, 'Tiruchengode', 31, NULL, NULL, NULL),
(1262, 'Tiruchirappalli', 31, NULL, NULL, NULL),
(1263, 'Tirukalukundram', 31, NULL, NULL, NULL),
(1264, 'Tirukkoyilur', 31, NULL, NULL, NULL),
(1265, 'Tirunelveli', 31, NULL, NULL, NULL),
(1266, 'Tirupathur', 31, NULL, NULL, NULL),
(1267, 'Tirupathur', 31, NULL, NULL, NULL),
(1268, 'Tiruppur', 31, NULL, NULL, NULL),
(1269, 'Tiruttani', 31, NULL, NULL, NULL),
(1270, 'Tiruvannamalai', 31, NULL, NULL, NULL),
(1271, 'Tiruvethipuram', 31, NULL, NULL, NULL),
(1272, 'Tittakudi', 31, NULL, NULL, NULL),
(1273, 'Udhagamandalam', 31, NULL, NULL, NULL),
(1274, 'Udumalaipettai', 31, NULL, NULL, NULL),
(1275, 'Unnamalaikadai', 31, NULL, NULL, NULL),
(1276, 'Usilampatti', 31, NULL, NULL, NULL),
(1277, 'Uthamapalayam', 31, NULL, NULL, NULL),
(1278, 'Uthiramerur', 31, NULL, NULL, NULL),
(1279, 'Vadakkuvalliyur', 31, NULL, NULL, NULL),
(1280, 'Vadalur', 31, NULL, NULL, NULL),
(1281, 'Vadipatti', 31, NULL, NULL, NULL),
(1282, 'Valparai', 31, NULL, NULL, NULL),
(1283, 'Vandavasi', 31, NULL, NULL, NULL),
(1284, 'Vaniyambadi', 31, NULL, NULL, NULL),
(1285, 'Vedaranyam', 31, NULL, NULL, NULL),
(1286, 'Vellakoil', 31, NULL, NULL, NULL),
(1287, 'Vellore', 31, NULL, NULL, NULL),
(1288, 'Vikramasingapuram', 31, NULL, NULL, NULL),
(1289, 'Viluppuram', 31, NULL, NULL, NULL),
(1290, 'Virudhachalam', 31, NULL, NULL, NULL),
(1291, 'Virudhunagar', 31, NULL, NULL, NULL),
(1292, 'Viswanatham', 31, NULL, NULL, NULL),
(1293, 'Agartala', 33, NULL, NULL, NULL),
(1294, 'Badharghat', 33, NULL, NULL, NULL),
(1295, 'Dharmanagar', 33, NULL, NULL, NULL),
(1296, 'Indranagar', 33, NULL, NULL, NULL),
(1297, 'Jogendranagar', 33, NULL, NULL, NULL),
(1298, 'Kailasahar', 33, NULL, NULL, NULL),
(1299, 'Khowai', 33, NULL, NULL, NULL),
(1300, 'Pratapgarh', 33, NULL, NULL, NULL),
(1301, 'Udaipur', 33, NULL, NULL, NULL),
(1302, 'Achhnera', 34, NULL, NULL, NULL),
(1303, 'Adari', 34, NULL, NULL, NULL);
INSERT INTO `cities` (`id`, `city_name`, `state_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1304, 'Agra', 34, NULL, NULL, NULL),
(1305, 'Aligarh', 34, NULL, NULL, NULL),
(1306, 'Allahabad', 34, NULL, NULL, NULL),
(1307, 'Amroha', 34, NULL, NULL, NULL),
(1308, 'Azamgarh', 34, NULL, NULL, NULL),
(1309, 'Bahraich', 34, NULL, NULL, NULL),
(1310, 'Ballia', 34, NULL, NULL, NULL),
(1311, 'Balrampur', 34, NULL, NULL, NULL),
(1312, 'Banda', 34, NULL, NULL, NULL),
(1313, 'Bareilly', 34, NULL, NULL, NULL),
(1314, 'Chandausi', 34, NULL, NULL, NULL),
(1315, 'Dadri', 34, NULL, NULL, NULL),
(1316, 'Deoria', 34, NULL, NULL, NULL),
(1317, 'Etawah', 34, NULL, NULL, NULL),
(1318, 'Fatehabad', 34, NULL, NULL, NULL),
(1319, 'Fatehpur', 34, NULL, NULL, NULL),
(1320, 'Fatehpur', 34, NULL, NULL, NULL),
(1321, 'Greater Noida', 34, NULL, NULL, NULL),
(1322, 'Hamirpur', 34, NULL, NULL, NULL),
(1323, 'Hardoi', 34, NULL, NULL, NULL),
(1324, 'Jajmau', 34, NULL, NULL, NULL),
(1325, 'Jaunpur', 34, NULL, NULL, NULL),
(1326, 'Jhansi', 34, NULL, NULL, NULL),
(1327, 'Kalpi', 34, NULL, NULL, NULL),
(1328, 'Kanpur', 34, NULL, NULL, NULL),
(1329, 'Kota', 34, NULL, NULL, NULL),
(1330, 'Laharpur', 34, NULL, NULL, NULL),
(1331, 'Lakhimpur', 34, NULL, NULL, NULL),
(1332, 'Lal Gopalganj Nindaura', 34, NULL, NULL, NULL),
(1333, 'Lalganj', 34, NULL, NULL, NULL),
(1334, 'Lalitpur', 34, NULL, NULL, NULL),
(1335, 'Lar', 34, NULL, NULL, NULL),
(1336, 'Loni', 34, NULL, NULL, NULL),
(1337, 'Lucknow', 34, NULL, NULL, NULL),
(1338, 'Mathura', 34, NULL, NULL, NULL),
(1339, 'Meerut', 34, NULL, NULL, NULL),
(1340, 'Modinagar', 34, NULL, NULL, NULL),
(1341, 'Muradnagar', 34, NULL, NULL, NULL),
(1342, 'Nagina', 34, NULL, NULL, NULL),
(1343, 'Najibabad', 34, NULL, NULL, NULL),
(1344, 'Nakur', 34, NULL, NULL, NULL),
(1345, 'Nanpara', 34, NULL, NULL, NULL),
(1346, 'Naraura', 34, NULL, NULL, NULL),
(1347, 'Naugawan Sadat', 34, NULL, NULL, NULL),
(1348, 'Nautanwa', 34, NULL, NULL, NULL),
(1349, 'Nawabganj', 34, NULL, NULL, NULL),
(1350, 'Nehtaur', 34, NULL, NULL, NULL),
(1351, 'NOIDA', 34, NULL, NULL, NULL),
(1352, 'Noorpur', 34, NULL, NULL, NULL),
(1353, 'Obra', 34, NULL, NULL, NULL),
(1354, 'Orai', 34, NULL, NULL, NULL),
(1355, 'Padrauna', 34, NULL, NULL, NULL),
(1356, 'Palia Kalan', 34, NULL, NULL, NULL),
(1357, 'Parasi', 34, NULL, NULL, NULL),
(1358, 'Phulpur', 34, NULL, NULL, NULL),
(1359, 'Pihani', 34, NULL, NULL, NULL),
(1360, 'Pilibhit', 34, NULL, NULL, NULL),
(1361, 'Pilkhuwa', 34, NULL, NULL, NULL),
(1362, 'Powayan', 34, NULL, NULL, NULL),
(1363, 'Pukhrayan', 34, NULL, NULL, NULL),
(1364, 'Puranpur', 34, NULL, NULL, NULL),
(1365, 'Purquazi', 34, NULL, NULL, NULL),
(1366, 'Purwa', 34, NULL, NULL, NULL),
(1367, 'Rae Bareli', 34, NULL, NULL, NULL),
(1368, 'Rampur', 34, NULL, NULL, NULL),
(1369, 'Rampur Maniharan', 34, NULL, NULL, NULL),
(1370, 'Rasra', 34, NULL, NULL, NULL),
(1371, 'Rath', 34, NULL, NULL, NULL),
(1372, 'Renukoot', 34, NULL, NULL, NULL),
(1373, 'Reoti', 34, NULL, NULL, NULL),
(1374, 'Robertsganj', 34, NULL, NULL, NULL),
(1375, 'Rudauli', 34, NULL, NULL, NULL),
(1376, 'Rudrapur', 34, NULL, NULL, NULL),
(1377, 'Sadabad', 34, NULL, NULL, NULL),
(1378, 'Safipur', 34, NULL, NULL, NULL),
(1379, 'Saharanpur', 34, NULL, NULL, NULL),
(1380, 'Sahaspur', 34, NULL, NULL, NULL),
(1381, 'Sahaswan', 34, NULL, NULL, NULL),
(1382, 'Sahawar', 34, NULL, NULL, NULL),
(1383, 'Sahjanwa', 34, NULL, NULL, NULL),
(1385, 'Sambhal', 34, NULL, NULL, NULL),
(1386, 'Samdhan', 34, NULL, NULL, NULL),
(1387, 'Samthar', 34, NULL, NULL, NULL),
(1388, 'Sandi', 34, NULL, NULL, NULL),
(1389, 'Sandila', 34, NULL, NULL, NULL),
(1390, 'Sardhana', 34, NULL, NULL, NULL),
(1391, 'Seohara', 34, NULL, NULL, NULL),
(1394, 'Shahganj', 34, NULL, NULL, NULL),
(1395, 'Shahjahanpur', 34, NULL, NULL, NULL),
(1396, 'Shamli', 34, NULL, NULL, NULL),
(1399, 'Sherkot', 34, NULL, NULL, NULL),
(1401, 'Shikohabad', 34, NULL, NULL, NULL),
(1402, 'Shishgarh', 34, NULL, NULL, NULL),
(1403, 'Siana', 34, NULL, NULL, NULL),
(1404, 'Sikanderpur', 34, NULL, NULL, NULL),
(1405, 'Sikandra Rao', 34, NULL, NULL, NULL),
(1406, 'Sikandrabad', 34, NULL, NULL, NULL),
(1407, 'Sirsaganj', 34, NULL, NULL, NULL),
(1408, 'Sirsi', 34, NULL, NULL, NULL),
(1409, 'Sitapur', 34, NULL, NULL, NULL),
(1410, 'Soron', 34, NULL, NULL, NULL),
(1411, 'Suar', 34, NULL, NULL, NULL),
(1412, 'Sultanpur', 34, NULL, NULL, NULL),
(1413, 'Sumerpur', 34, NULL, NULL, NULL),
(1414, 'Tanda', 34, NULL, NULL, NULL),
(1415, 'Tanda', 34, NULL, NULL, NULL),
(1416, 'Tetri Bazar', 34, NULL, NULL, NULL),
(1417, 'Thakurdwara', 34, NULL, NULL, NULL),
(1418, 'Thana Bhawan', 34, NULL, NULL, NULL),
(1419, 'Tilhar', 34, NULL, NULL, NULL),
(1420, 'Tirwaganj', 34, NULL, NULL, NULL),
(1421, 'Tulsipur', 34, NULL, NULL, NULL),
(1422, 'Tundla', 34, NULL, NULL, NULL),
(1423, 'Unnao', 34, NULL, NULL, NULL),
(1424, 'Utraula', 34, NULL, NULL, NULL),
(1425, 'Varanasi', 34, NULL, NULL, NULL),
(1426, 'Vrindavan', 34, NULL, NULL, NULL),
(1427, 'Warhapur', 34, NULL, NULL, NULL),
(1428, 'Zaidpur', 34, NULL, NULL, NULL),
(1429, 'Zamania', 34, NULL, NULL, NULL),
(1430, 'Almora', 35, NULL, NULL, NULL),
(1431, 'Bazpur', 35, NULL, NULL, NULL),
(1432, 'Chamba', 35, NULL, NULL, NULL),
(1433, 'Dehradun', 35, NULL, NULL, NULL),
(1434, 'Haldwani', 35, NULL, NULL, NULL),
(1435, 'Haridwar', 35, NULL, NULL, NULL),
(1436, 'Jaspur', 35, NULL, NULL, NULL),
(1437, 'Kashipur', 35, NULL, NULL, NULL),
(1438, 'kichha', 35, NULL, NULL, NULL),
(1439, 'Kotdwara', 35, NULL, NULL, NULL),
(1440, 'Manglaur', 35, NULL, NULL, NULL),
(1441, 'Mussoorie', 35, NULL, NULL, NULL),
(1442, 'Nagla', 35, NULL, NULL, NULL),
(1443, 'Nainital', 35, NULL, NULL, NULL),
(1444, 'Pauri', 35, NULL, NULL, NULL),
(1445, 'Pithoragarh', 35, NULL, NULL, NULL),
(1446, 'Ramnagar', 35, NULL, NULL, NULL),
(1447, 'Rishikesh', 35, NULL, NULL, NULL),
(1448, 'Roorkee', 35, NULL, NULL, NULL),
(1449, 'Rudrapur', 35, NULL, NULL, NULL),
(1450, 'Sitarganj', 35, NULL, NULL, NULL),
(1451, 'Tehri', 35, NULL, NULL, NULL),
(1452, 'Muzaffarnagar', 34, NULL, NULL, NULL),
(1454, 'Alipurduar', 36, NULL, NULL, NULL),
(1455, 'Arambagh', 36, NULL, NULL, NULL),
(1456, 'Asansol', 36, NULL, NULL, NULL),
(1457, 'Baharampur', 36, NULL, NULL, NULL),
(1458, 'Bally', 36, NULL, NULL, NULL),
(1459, 'Balurghat', 36, NULL, NULL, NULL),
(1460, 'Bankura', 36, NULL, NULL, NULL),
(1461, 'Barakar', 36, NULL, NULL, NULL),
(1462, 'Barasat', 36, NULL, NULL, NULL),
(1463, 'Bardhaman', 36, NULL, NULL, NULL),
(1464, 'Bidhan Nagar', 36, NULL, NULL, NULL),
(1465, 'Chinsura', 36, NULL, NULL, NULL),
(1466, 'Contai', 36, NULL, NULL, NULL),
(1467, 'Cooch Behar', 36, NULL, NULL, NULL),
(1468, 'Darjeeling', 36, NULL, NULL, NULL),
(1469, 'Durgapur', 36, NULL, NULL, NULL),
(1470, 'Haldia', 36, NULL, NULL, NULL),
(1471, 'Howrah', 36, NULL, NULL, NULL),
(1472, 'Islampur', 36, NULL, NULL, NULL),
(1473, 'Jhargram', 36, NULL, NULL, NULL),
(1474, 'Kharagpur', 36, NULL, NULL, NULL),
(1475, 'Kolkata', 36, NULL, NULL, NULL),
(1476, 'Mainaguri', 36, NULL, NULL, NULL),
(1477, 'Mal', 36, NULL, NULL, NULL),
(1478, 'Mathabhanga', 36, NULL, NULL, NULL),
(1479, 'Medinipur', 36, NULL, NULL, NULL),
(1480, 'Memari', 36, NULL, NULL, NULL),
(1481, 'Monoharpur', 36, NULL, NULL, NULL),
(1482, 'Murshidabad', 36, NULL, NULL, NULL),
(1483, 'Nabadwip', 36, NULL, NULL, NULL),
(1484, 'Naihati', 36, NULL, NULL, NULL),
(1485, 'Panchla', 36, NULL, NULL, NULL),
(1486, 'Pandua', 36, NULL, NULL, NULL),
(1487, 'Paschim Punropara', 36, NULL, NULL, NULL),
(1488, 'Purulia', 36, NULL, NULL, NULL),
(1489, 'Raghunathpur', 36, NULL, NULL, NULL),
(1490, 'Raiganj', 36, NULL, NULL, NULL),
(1491, 'Rampurhat', 36, NULL, NULL, NULL),
(1492, 'Ranaghat', 36, NULL, NULL, NULL),
(1493, 'Sainthia', 36, NULL, NULL, NULL),
(1494, 'Santipur', 36, NULL, NULL, NULL),
(1495, 'Siliguri', 36, NULL, NULL, NULL),
(1496, 'Sonamukhi', 36, NULL, NULL, NULL),
(1497, 'Srirampore', 36, NULL, NULL, NULL),
(1498, 'Suri', 36, NULL, NULL, NULL),
(1499, 'Taki', 36, NULL, NULL, NULL),
(1500, 'Tamluk', 36, NULL, NULL, NULL),
(1501, 'Tarakeswar', 36, NULL, NULL, NULL),
(1502, 'Chikmagalur', 17, NULL, NULL, NULL),
(1503, 'Davanagere', 17, NULL, NULL, NULL),
(1504, 'Dharwad', 17, NULL, NULL, NULL),
(1505, 'Gadag', 17, NULL, NULL, NULL),
(1506, 'Chennai', 31, NULL, NULL, NULL),
(1507, 'Coimbatore', 31, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_11_24_073529_create_admins_table', 1),
(5, '2020_11_24_080913_create_survey_data_table', 1),
(6, '2020_11_24_081449_create_booth_data_table', 1),
(7, '2020_11_25_123745_create_n_n_n_types_table', 1),
(8, '2020_11_25_124209_create_n_n_s_table', 1),
(9, '2020_11_25_124417_create_wards_table', 1),
(10, '2020_11_25_125043_create_part_nos_table', 1),
(11, '2020_11_25_125604_create_pollings_table', 1),
(12, '2020_11_25_130205_create_sections_table', 1),
(14, '2020_11_26_112426_add_poling_column_to_users_table', 2),
(15, '2020_11_26_124508_add_ward_column_to_booth_data_table', 3),
(16, '2020_11_26_124733_add_ward_column_to_survey_data_table', 3),
(17, '2020_11_26_131251_add_city_column_to_users_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `n_n_n_types`
--

CREATE TABLE `n_n_n_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `n_n_n_types`
--

INSERT INTO `n_n_n_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Nagar Palika Nigam', '2020-11-26 06:18:05', NULL),
(2, 'Nagar Parishad Nigam', '2020-11-26 06:18:05', NULL),
(3, 'Nagar Parishad ', '2020-11-26 06:19:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `n_n_s`
--

CREATE TABLE `n_n_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nnn_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `n_n_s`
--

INSERT INTO `n_n_s` (`id`, `city_id`, `nnn_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 707, 1, 'Jabalpur', '2020-11-27 13:17:56', '2020-11-27 13:18:00');

-- --------------------------------------------------------

--
-- Table structure for table `part_nos`
--

CREATE TABLE `part_nos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ward_id` bigint(20) UNSIGNED DEFAULT NULL,
  `part_no` bigint(20) DEFAULT NULL,
  `part_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_voter` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `part_nos`
--

INSERT INTO `part_nos` (`id`, `ward_id`, `part_no`, `part_name`, `total_voter`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '', 1230, '2020-11-27 08:02:23', '2020-11-27 08:02:23'),
(2, 1, 2, '', 1230, '2020-11-28 08:02:23', '2020-11-28 08:02:23'),
(3, 1, 3, '', 1230, '2020-11-29 08:02:23', '2020-11-29 08:02:23'),
(4, 1, 4, '', 1230, '2020-11-30 08:02:23', '2020-11-30 08:02:23'),
(5, 1, 5, '', 1230, '2020-12-01 08:02:23', '2020-12-01 08:02:23'),
(6, 1, 6, '', 1230, '2020-12-02 08:02:23', '2020-12-02 08:02:23'),
(7, 1, 7, '', 1230, '2020-12-03 08:02:23', '2020-12-03 08:02:23'),
(8, 1, 8, '', 1230, '2020-12-04 08:02:23', '2020-12-04 08:02:23'),
(9, 1, 9, '', 1230, '2020-12-05 08:02:23', '2020-12-05 08:02:23'),
(10, 1, 10, '', 1230, '2020-12-06 08:02:23', '2020-12-06 08:02:23'),
(11, 1, 11, '', 1230, '2020-12-07 08:02:23', '2020-12-07 08:02:23'),
(12, 1, 12, '', 1230, '2020-12-08 08:02:23', '2020-12-08 08:02:23'),
(13, 1, 13, '', 1230, '2020-12-09 08:02:23', '2020-12-09 08:02:23'),
(14, 1, 14, '', 1230, '2020-12-10 08:02:23', '2020-12-10 08:02:23'),
(15, 2, 1, '', 0, '2020-12-11 08:02:23', '2020-12-11 08:02:23'),
(16, 2, 2, '', 0, '2020-12-12 08:02:23', '2020-12-12 08:02:23'),
(17, 2, 3, '', 0, '2020-12-13 08:02:23', '2020-12-13 08:02:23'),
(18, 2, 4, '', 0, '2020-12-14 08:02:23', '2020-12-14 08:02:23'),
(19, 2, 5, '', 0, '2020-12-15 08:02:23', '2020-12-15 08:02:23'),
(20, 2, 6, '', 0, '2020-12-16 08:02:23', '2020-12-16 08:02:23'),
(21, 2, 7, '', 0, '2020-12-17 08:02:23', '2020-12-17 08:02:23'),
(22, 2, 8, '', 0, '2020-12-18 08:02:23', '2020-12-18 08:02:23'),
(23, 2, 9, '', 0, '2020-12-19 08:02:23', '2020-12-19 08:02:23'),
(24, 2, 10, '', 0, '2020-12-20 08:02:23', '2020-12-20 08:02:23'),
(25, 2, 11, '', 0, '2020-12-21 08:02:23', '2020-12-21 08:02:23'),
(26, 2, 12, '', 0, '2020-12-22 08:02:23', '2020-12-22 08:02:23'),
(27, 2, 13, '', 0, '2020-12-23 08:02:23', '2020-12-23 08:02:23'),
(28, 2, 14, '', 0, '2020-12-24 08:02:23', '2020-12-24 08:02:23'),
(29, 3, 1, '', 0, '2020-12-25 08:02:23', '2020-12-25 08:02:23'),
(30, 3, 2, '', 0, '2020-12-26 08:02:23', '2020-12-26 08:02:23'),
(31, 3, 3, '', 0, '2020-12-27 08:02:23', '2020-12-27 08:02:23'),
(32, 3, 4, '', 0, '2020-12-28 08:02:23', '2020-12-28 08:02:23'),
(33, 3, 5, '', 0, '2020-12-29 08:02:23', '2020-12-29 08:02:23'),
(34, 3, 6, '', 0, '2020-12-30 08:02:23', '2020-12-30 08:02:23'),
(35, 3, 7, '', 0, '2020-12-31 08:02:23', '2020-12-31 08:02:23'),
(36, 3, 8, '', 0, '2021-01-01 08:02:23', '2021-01-01 08:02:23'),
(37, 3, 9, '', 0, '2021-01-02 08:02:23', '2021-01-02 08:02:23');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pollings`
--

CREATE TABLE `pollings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ward_id` bigint(20) UNSIGNED DEFAULT NULL,
  `part_id` bigint(20) UNSIGNED DEFAULT NULL,
  `polling_no` bigint(20) DEFAULT NULL,
  `polling_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pollings`
--

INSERT INTO `pollings` (`id`, `ward_id`, `part_id`, `polling_no`, `polling_name`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 5, 'Polling no 5', '2020-11-26 08:01:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ward_id` bigint(20) UNSIGNED DEFAULT NULL,
  `part_id` bigint(20) UNSIGNED DEFAULT NULL,
  `section_no` bigint(20) DEFAULT NULL,
  `section_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_voter` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `ward_id`, `part_id`, `section_no`, `section_name`, `total_voter`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 1, 'पंडा की मढिया ', 100, '2020-11-27 08:02:23', '2020-11-27 08:02:23'),
(2, 0, 1, 2, 'गढ़ा बाज़ार', 200, '2020-11-28 08:02:23', '2020-11-28 08:02:23'),
(3, 0, 1, 3, 'पंडा की मढिया शाही नका रोड ', 500, '2020-11-29 08:02:23', '2020-11-29 08:02:23'),
(4, 0, 1, 4, 'गढ़ा बाज़ार पंडा मढिया शाही नाका रोड ', 100, '2020-11-30 08:02:23', '2020-11-30 08:02:23'),
(5, 0, 1, 5, 'संजीवनी नगर दुर्गा कॉलोनी', 200, '2020-12-01 08:02:23', '2020-12-01 08:02:23'),
(6, 0, 2, 1, 'हरदौल मंदिर के पीछे गढा', 100, '2020-12-02 08:02:23', '2020-12-02 08:02:23'),
(7, 0, 2, 2, 'बड़ा जैन मंदिर', 200, '2020-12-03 08:02:23', '2020-12-03 08:02:23'),
(8, 0, 2, 3, 'हरदौल मंदिर के पीछे व बड़ा जैन मंदिर', 100, '2020-12-04 08:02:23', '2020-12-04 08:02:23'),
(9, 0, 3, 1, 'बड़ा जैन मंदिर', 500, '2020-12-05 08:02:23', '2020-12-05 08:02:23'),
(10, 0, 3, 2, 'बड़ा जैन मंदिर', 600, '2020-12-06 08:02:23', '2020-12-06 08:02:23'),
(11, 0, 3, 3, 'छोटा जैन मंदिर शिवनगर', 100, '2020-12-07 08:02:23', '2020-12-07 08:02:23');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `state_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `irradiation` double(10,2) DEFAULT NULL,
  `electricity_per_day` double(10,2) DEFAULT NULL,
  `annual_generation` double(10,2) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `state_name`, `country_id`, `irradiation`, `electricity_per_day`, `annual_generation`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Andaman & Nicobar Islands', 1, 1156.39, 4.60, 1380.00, NULL, '2020-03-13 19:16:18', NULL),
(2, 'Andhra Pradesh', 1, 1266.52, 5.00, 1500.00, NULL, '2020-03-13 19:16:18', NULL),
(3, 'Arunachal Pradesh', 1, 1046.26, 4.10, 1230.00, NULL, '2020-03-13 19:16:18', NULL),
(4, 'Assam', 1, 1046.26, 4.10, 1230.00, NULL, '2020-03-13 19:16:18', NULL),
(5, 'Bihar', 1, 1156.39, 4.60, 1380.00, NULL, '2020-03-13 19:16:18', NULL),
(6, 'Chandigarh', 1, 1156.39, 4.60, 1380.00, NULL, '2020-03-13 19:16:18', NULL),
(7, 'Chhattisgarh', 1, 1266.52, 5.00, 1500.00, NULL, '2020-03-13 19:16:18', NULL),
(8, 'Dadra & Nagar Haveli', 1, 1266.52, 5.00, 1500.00, NULL, '2020-03-13 19:16:18', NULL),
(9, 'Daman & Diu', 1, 1266.52, 5.00, 1500.00, NULL, '2020-03-13 19:16:18', NULL),
(10, 'Delhi', 1, 1156.39, 4.60, 1380.00, NULL, '2020-03-13 19:16:18', NULL),
(11, 'Goa', 1, 1266.52, 5.00, 1500.00, NULL, '2020-03-13 19:16:18', NULL),
(12, 'Gujarat', 1, 1266.52, 5.00, 1500.00, NULL, '2020-03-13 19:16:18', NULL),
(13, 'Haryana', 1, 1156.39, 4.60, 1380.00, NULL, '2020-03-13 19:16:18', NULL),
(14, 'Himachal Pradesh', 1, 1046.26, 4.10, 1230.00, NULL, '2020-03-13 19:16:18', NULL),
(15, 'Jammu & Kashmir', 1, NULL, NULL, NULL, NULL, '2020-03-13 19:16:18', NULL),
(16, 'Jharkhand', 1, NULL, NULL, NULL, NULL, '2020-03-13 19:16:18', NULL),
(17, 'Karnataka', 1, NULL, NULL, NULL, NULL, '2020-03-13 19:16:18', NULL),
(18, 'Kerala', 1, NULL, NULL, NULL, NULL, '2020-03-13 19:16:18', NULL),
(19, 'Lakshadweep', 1, NULL, NULL, NULL, NULL, '2020-03-13 19:16:18', NULL),
(20, 'Madhya Pradesh', 1, 1266.52, 5.00, 1500.00, NULL, '2020-03-13 19:16:18', NULL),
(21, 'Maharashtra', 1, NULL, NULL, NULL, NULL, '2020-03-13 19:16:18', NULL),
(22, 'Manipur', 1, NULL, NULL, NULL, NULL, '2020-03-13 19:16:18', NULL),
(23, 'Meghalaya', 1, NULL, NULL, NULL, NULL, '2020-03-13 19:16:18', NULL),
(24, 'Mizoram', 1, NULL, NULL, NULL, NULL, '2020-03-13 19:16:18', NULL),
(25, 'Nagaland', 1, NULL, NULL, NULL, NULL, '2020-03-13 19:16:18', NULL),
(26, 'Odisha', 1, NULL, NULL, NULL, NULL, '2020-03-13 19:16:18', NULL),
(27, 'Puducherry', 1, NULL, NULL, NULL, NULL, '2020-03-13 19:16:18', NULL),
(28, 'Punjab', 1, NULL, NULL, NULL, NULL, '2020-03-13 19:16:18', NULL),
(29, 'Rajasthan', 1, NULL, NULL, NULL, NULL, '2020-03-13 19:16:18', NULL),
(30, 'Sikkim', 1, NULL, NULL, NULL, NULL, '2020-03-13 19:16:18', NULL),
(31, 'Tamil Nadu', 1, NULL, NULL, NULL, NULL, '2020-03-13 19:16:18', NULL),
(32, 'Telangana', 1, NULL, NULL, NULL, NULL, '2020-03-13 19:16:18', NULL),
(33, 'Tripura', 1, NULL, NULL, NULL, NULL, '2020-03-13 19:16:18', NULL),
(34, 'Uttar Pradesh', 1, NULL, NULL, NULL, NULL, '2020-03-13 19:16:18', NULL),
(35, 'Uttarakhand', 1, NULL, NULL, NULL, NULL, '2020-03-13 19:16:18', NULL),
(36, 'West Bengal', 1, NULL, NULL, NULL, NULL, '2020-03-13 19:16:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `survey_data`
--

CREATE TABLE `survey_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parshad_id` bigint(20) UNSIGNED NOT NULL,
  `surveyor_id` bigint(20) UNSIGNED NOT NULL,
  `part_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ward_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ward_no` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `part_no` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_no` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `house_no` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cast` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `voter_count` bigint(20) DEFAULT 0,
  `retative_to` bigint(20) UNSIGNED DEFAULT NULL,
  `red_green_blue` enum('green','blue','red') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `survey_data`
--

INSERT INTO `survey_data` (`id`, `parshad_id`, `surveyor_id`, `part_id`, `ward_id`, `ward_no`, `part_no`, `s_no`, `house_no`, `category`, `name`, `cast`, `mobile`, `voter_count`, `retative_to`, `red_green_blue`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, 1, NULL, NULL, '1', '20', '5', '20', NULL, 'Sharma', 'Brahmin', '8962616448', 5, NULL, 'green', NULL, '2020-11-26 06:56:29', '2020-11-26 06:56:29'),
(2, 5, 1, 1, 1, '1', '1', '55', '55', 'General', 'ljfdlfjldk', 'kjkjkj', '8962616480', 5, NULL, 'green', NULL, '2020-12-08 02:46:39', '2020-12-08 02:46:39'),
(3, 5, 1, 1, 1, '1', '1', '520', '12', 'OBC', 'jlkjlkjlkjl lkjlkjlkj', 'jjh', '1236547890', 3, NULL, 'green', NULL, '2020-12-08 05:32:55', '2020-12-08 05:32:55'),
(4, 5, 1, 1, 1, '1', '1', '520', '12', 'OBC', 'jlkjlkjlkjl lkjlkjlkj', 'jjh', '1236547890', 3, NULL, 'green', NULL, '2020-12-08 05:36:09', '2020-12-08 05:36:09'),
(5, 5, 1, NULL, NULL, '1', '1', '520', '12', 'OBC', 'lkjlkjlkjlk lkjlkjlkj', 'jjh', '2', 0, 4, 'green', NULL, '2020-12-08 05:36:09', '2020-12-08 05:36:09'),
(6, 5, 1, NULL, NULL, '1', '1', '520', '12', 'OBC', 'kjlkjlk', 'jjh', '2', 0, 4, 'green', NULL, '2020-12-08 05:36:09', '2020-12-08 05:36:09'),
(7, 5, 1, NULL, NULL, '1', '1', '520', '12', 'OBC', ';lkjl;kjlkjlk', 'jjh', '1', 0, 4, 'green', NULL, '2020-12-08 05:36:09', '2020-12-08 05:36:09'),
(8, 5, 1, 1, 1, '1', '1', '4545', '5454', 'OBC', 'jkkjhkj', 'khkj', '4685654680', 5, NULL, 'blue', NULL, '2020-12-08 05:40:27', '2020-12-08 05:40:27'),
(9, 5, 1, 1, 1, '1', '1', '4545', '5454', 'OBC', 'desafsdfsdf', 'khkj', '5465464658', 0, 8, 'blue', NULL, '2020-12-08 05:40:27', '2020-12-08 05:40:27'),
(10, 5, 1, 1, 1, '1', '1', '4545', '5454', 'OBC', 'gffdsgsdfgdfg', 'khkj', '6546546564', 0, 8, 'blue', NULL, '2020-12-08 05:40:27', '2020-12-08 05:40:27'),
(11, 5, 1, 1, 1, '1', '1', '4545', '5454', 'OBC', 'gdfgdfg', 'khkj', '6546549840', 0, 8, 'blue', NULL, '2020-12-08 05:40:27', '2020-12-08 05:40:27'),
(12, 5, 1, 1, 1, '1', '1', '4545', '5454', 'OBC', '5cfdhsjfcskdjh', 'khkj', '4564506540', 0, 8, 'blue', NULL, '2020-12-08 05:40:27', '2020-12-08 05:40:27'),
(13, 5, 1, 1, 1, '1', '1', '4545', '5454', 'OBC', 'dgdfgdf', 'khkj', '6540646046', 0, 8, 'blue', NULL, '2020-12-08 05:40:27', '2020-12-08 05:40:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parshad_id` bigint(20) DEFAULT 0,
  `type` enum('surveyor','agent','parshad') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` bigint(20) UNSIGNED DEFAULT NULL,
  `city` bigint(20) UNSIGNED DEFAULT NULL,
  `nnn_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nn_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ward_id` bigint(20) UNSIGNED DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `part_id` bigint(20) UNSIGNED DEFAULT NULL,
  `section_id` bigint(20) UNSIGNED DEFAULT NULL,
  `polling_id` bigint(20) UNSIGNED DEFAULT NULL,
  `s_no_from` bigint(20) DEFAULT NULL,
  `s_no_to` bigint(20) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `parshad_id`, `type`, `name`, `mobile`, `email`, `state`, `city`, `nnn_id`, `nn_id`, `ward_id`, `password`, `part_id`, `section_id`, `polling_id`, `s_no_from`, `s_no_to`, `is_active`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 5, 'surveyor', 'Rohit Sharma', '8962616488', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$ayifXqfUJJaBeCXVF1R32OS/5gVpgmj/qO9H3RR.LENf/Nfbi.n6a', 1, 2, NULL, 1, 10, 1, NULL, 'LXKk3RwWapg2DGA8CMnphFK8VgqRkZ4Vcf4Y9IWZ9YgdDtmJbQcXgjFP5zsL', '2020-11-26 04:11:28', '2020-11-26 04:11:28'),
(2, 5, 'surveyor', 'Virat Kohli', '8962616481', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$XEJnFZXDTsbFu9Sk3Bmmq.199Ip9d8b59SN3y8mp0p0rfDseomVTa', 1, 2, NULL, 11, 20, 1, NULL, NULL, '2020-11-26 04:58:25', '2020-11-26 04:58:25'),
(3, 5, 'surveyor', 'Pooja Yadao', '8962616482', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$uGtT4j7V1fD90ZMv34vS3eOJI/XZKxU2sFM2JEl7Q4msWHxcXcKgi', 1, 2, NULL, 21, 35, 1, NULL, NULL, '2020-11-26 05:25:17', '2020-11-26 05:25:17'),
(4, 5, 'agent', 'M S Dhoni', '8962616486', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$ZLB8n1HEd4nD/H58XEruCOBOZT8Ot9kZCWEgyMqsMhb7PZItQ2j5i', 1, NULL, 1, NULL, NULL, 1, NULL, 'oDpvLrkTzJOq3k1kM3OdwOd2SVxjm6KvdopBMUTmXG289edfpzgN7O7bMX9K', '2020-11-26 06:24:03', '2020-11-26 06:24:03'),
(5, 0, 'parshad', 'Nishant Shukla', '8962616441', 'nishant@mail.com', 20, 707, 1, 1, 1, '$2y$10$lheKbTq2Y0IWdlMkInRrzOzFE9/tV5kJuuc6BU0S0W/01ba9TEhAO', NULL, NULL, NULL, NULL, NULL, 1, NULL, 'pqtsIva8UgDczGqIW5CrE7K4PSdGmZS1k50y4NAkvNWu55Bq5cu6e10PzBwx', '2020-11-26 07:56:46', '2020-11-26 07:56:46'),
(6, 5, 'surveyor', 'Nishant Shukla', '1231231230', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$ONiNfeXJ27a5CxFItXeXUe2p/I/UT4yNzdYHuuHnSWszNHpCock0m', 1, 3, NULL, 1, 20, 1, NULL, 'HCkuOgAamILyb0tKVR4o42YKiI6iELeS1SIcfBJA5rvrbKdWFFoQ2aJj4IwL', '2020-11-26 08:08:10', '2020-11-26 08:08:10'),
(7, 5, 'surveyor', 'Suresh Raina', '4564564560', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$ZWcA/h3bLezP0jHvrU4P0uClLdDothicplm7NhZmSBi0v2gm1T2Ua', 1, 3, NULL, 21, 30, 1, NULL, NULL, '2020-11-26 08:10:05', '2020-11-26 08:10:05');

-- --------------------------------------------------------

--
-- Table structure for table `wards`
--

CREATE TABLE `wards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nn_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ward_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ward_no` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wards`
--

INSERT INTO `wards` (`id`, `nn_id`, `ward_name`, `ward_no`, `created_at`, `updated_at`) VALUES
(1, 1, 'गढ़ा वार्ड ', 1, '2020-11-27 08:02:23', '2020-11-27 08:02:23'),
(2, 1, 'वीरेंद्रपुरी वार्ड ', 2, '2020-11-28 08:02:23', '2020-11-28 08:02:23'),
(3, 1, 'त्रिपुरी वार्ड ', 3, '2020-11-29 08:02:23', '2020-11-29 08:02:23'),
(4, 1, 'शंकरशाह नगर ', 4, '2020-11-30 08:02:23', '2020-11-30 08:02:23'),
(5, 1, 'सरदार वल्लभ भाई पटेल ', 5, '2020-12-01 08:02:23', '2020-12-01 08:02:23'),
(6, 1, 'इंदिरागांधी वार्ड ', 6, '2020-12-02 08:02:23', '2020-12-02 08:02:23'),
(7, 1, 'वीरसवारकर वार्ड ', 7, '2020-12-03 08:02:23', '2020-12-03 08:02:23'),
(8, 1, 'ग्वारीघाट ', 8, '2020-12-04 08:02:23', '2020-12-04 08:02:23'),
(9, 1, 'दादा बाबुराव परांजपे वार्ड ', 9, '2020-12-05 08:02:23', '2020-12-05 08:02:23'),
(10, 1, 'गुपतेश्वर वार्ड ', 10, '2020-12-06 08:02:23', '2020-12-06 08:02:23'),
(11, 1, 'गिरिराज कपूर वार्ड ', 11, '2020-12-07 08:02:23', '2020-12-07 08:02:23'),
(12, 1, 'डॉ. जोर्ज डिसिल्वा वार्ड ', 12, '2020-12-08 08:02:23', '2020-12-08 08:02:23'),
(13, 1, 'पं. बनारसीदास भानो ', 13, '2020-12-09 08:02:23', '2020-12-09 08:02:23'),
(14, 1, 'नरसिंह वार्ड ', 14, '2020-12-10 08:02:23', '2020-12-10 08:02:23'),
(15, 1, 'महाराणा प्रताप वार्ड ', 15, '2020-12-11 08:02:23', '2020-12-11 08:02:23'),
(16, 1, 'रानी दुर्गावती वार्ड ', 16, '2020-12-12 08:02:23', '2020-12-12 08:02:23'),
(17, 1, 'शहीद गुलाब सिंह वार्ड ', 17, '2020-12-13 08:02:23', '2020-12-13 08:02:23'),
(18, 1, 'कमला नेहरु वार्ड ', 18, '2020-12-14 08:02:23', '2020-12-14 08:02:23'),
(19, 1, 'कस्तूरी गाँधी वार्ड ', 19, '2020-12-15 08:02:23', '2020-12-15 08:02:23'),
(20, 1, 'स्वामी विवेकानंद वार्ड ', 21, '2020-12-16 08:02:23', '2020-12-16 08:02:23'),
(21, 1, 'जवाहर गंज वार्ड ', 22, '2020-12-17 08:02:23', '2020-12-17 08:02:23'),
(22, 1, 'पं. लोकमान्य बालगंगाधर तिलक वार्ड ', 23, '2020-12-18 08:02:23', '2020-12-18 08:02:23'),
(23, 1, 'हनुमानताल वार्ड ', 24, '2020-12-19 08:02:23', '2020-12-19 08:02:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admins_mobile_email_index` (`mobile`,`email`),
  ADD KEY `admins_nnn_id_city_index` (`nnn_id`,`city`),
  ADD KEY `admins_nn_id_ward_id_index` (`nn_id`,`ward_id`);

--
-- Indexes for table `booth_data`
--
ALTER TABLE `booth_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booth_data_parshad_id_agent_id_index` (`parshad_id`,`agent_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `n_n_n_types`
--
ALTER TABLE `n_n_n_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `n_n_s`
--
ALTER TABLE `n_n_s`
  ADD PRIMARY KEY (`id`),
  ADD KEY `n_n_s_city_id_nnn_id_index` (`city_id`,`nnn_id`);

--
-- Indexes for table `part_nos`
--
ALTER TABLE `part_nos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `part_nos_ward_id_index` (`ward_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pollings`
--
ALTER TABLE `pollings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey_data`
--
ALTER TABLE `survey_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `survey_data_parshad_id_surveyor_id_index` (`parshad_id`,`surveyor_id`),
  ADD KEY `survey_data_mobile_index` (`mobile`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_parshad_id_mobile_index` (`parshad_id`,`mobile`),
  ADD KEY `part_id` (`part_id`),
  ADD KEY `section_id` (`section_id`);

--
-- Indexes for table `wards`
--
ALTER TABLE `wards`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `booth_data`
--
ALTER TABLE `booth_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1508;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `n_n_n_types`
--
ALTER TABLE `n_n_n_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `n_n_s`
--
ALTER TABLE `n_n_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `part_nos`
--
ALTER TABLE `part_nos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `pollings`
--
ALTER TABLE `pollings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `survey_data`
--
ALTER TABLE `survey_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wards`
--
ALTER TABLE `wards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
