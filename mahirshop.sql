-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2019 at 07:48 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mahirshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `banner_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_des` text COLLATE utf8mb4_unicode_ci,
  `banner_image` text COLLATE utf8mb4_unicode_ci,
  `banner_sort` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_type` enum('Slide','HomeBanner','CategoryBanner','BrandBanner') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `user_id`, `banner_name`, `banner_des`, `banner_image`, `banner_sort`, `banner_type`, `banner_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Banner 1', 'Test Banner', 'upload/banner/1576046543.jpg', '1', 'Slide', 'Active', '2019-11-04 06:48:37', '2019-12-11 06:42:24', NULL),
(2, 1, 'Test Slide', 'Test Slide For Me Global Ltd', 'upload/banner/1576046600.jpg', '2', 'Slide', 'Active', '2019-11-14 11:37:28', '2019-12-11 06:43:21', NULL),
(3, 1, 'Lorem ipsum', 'Lorem Ipsum', 'upload/banner/1574668749.png', '1', 'Slide', 'Inactive', '2019-11-25 07:59:09', '2019-12-11 06:43:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_sort` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `user_id`, `brand_name`, `brand_sort`, `brand_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Tecno', '1', 'Active', '2019-10-28 21:37:19', '2019-10-28 21:40:01', NULL),
(2, 1, 'Nike', '2', 'Active', '2019-10-28 21:40:26', '2019-10-28 21:40:26', NULL),
(3, 1, 'DELL', '3', 'Active', '2019-10-28 21:40:36', '2019-10-28 21:41:34', NULL),
(4, 1, 'Easy', '4', 'Active', '2019-10-28 21:41:55', '2019-10-28 21:42:04', NULL),
(5, 1, 'Symphony', '5', 'Active', '2019-10-28 21:42:13', '2019-10-28 21:42:13', NULL),
(6, 1, 'Samsung', '6', 'Active', '2019-10-31 00:27:09', '2019-10-31 00:27:09', NULL),
(7, 1, 'Banglalion', '7', 'Active', '2019-11-02 17:35:11', '2019-11-02 17:35:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_sort` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_featured` enum('True','False') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `user_id`, `category_name`, `category_sort`, `category_featured`, `category_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Technology', '1', 'True', 'Active', '2019-10-28 22:50:24', '2019-10-28 22:50:24', NULL),
(2, 1, 'Accessories', '2', 'True', 'Active', '2019-10-28 22:50:37', '2019-10-29 16:03:22', '2019-10-29 16:03:22'),
(3, 1, 'Stationary', '3', 'False', 'Active', '2019-10-28 22:50:53', '2019-10-28 22:51:55', '2019-10-28 22:51:55'),
(4, 1, 'Accessories', '2', 'True', 'Active', '2019-10-29 16:13:03', '2019-10-29 16:13:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phonecode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_symbol` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `code`, `name`, `phonecode`, `currency_name`, `currency_symbol`, `currency_code`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'AF', 'Afghanistan', '93', 'Afghan afghani', '؋', 'AFN', NULL, NULL, NULL),
(2, 'AL', 'Albania', '355', 'Albanian lek', 'L', 'ALL', NULL, NULL, NULL),
(3, 'DZ', 'Algeria', '213', 'Algerian dinar', 'د.ج', 'DZD', NULL, NULL, NULL),
(4, 'AS', 'American Samoa', '1684', '', '', '', NULL, NULL, NULL),
(5, 'AD', 'Andorra', '376', 'Euro', '€', 'EUR', NULL, NULL, NULL),
(6, 'AO', 'Angola', '244', 'Angolan kwanza', 'Kz', 'AOA', NULL, NULL, NULL),
(7, 'AI', 'Anguilla', '1264', 'East Caribbean dolla', '$', 'XCD', NULL, NULL, NULL),
(8, 'AQ', 'Antarctica', '0', '', '', '', NULL, NULL, NULL),
(9, 'AG', 'Antigua And Barbuda', '1268', 'East Caribbean dolla', '$', 'XCD', NULL, NULL, NULL),
(10, 'AR', 'Argentina', '54', 'Argentine peso', '$', 'ARS', NULL, NULL, NULL),
(11, 'AM', 'Armenia', '374', 'Armenian dram', '', 'AMD', NULL, NULL, NULL),
(12, 'AW', 'Aruba', '297', 'Aruban florin', 'ƒ', 'AWG', NULL, NULL, NULL),
(13, 'AU', 'Australia', '61', 'Australian dollar', '$', 'AUD', NULL, NULL, NULL),
(14, 'AT', 'Austria', '43', 'Euro', '€', 'EUR', NULL, NULL, NULL),
(15, 'AZ', 'Azerbaijan', '994', 'Azerbaijani manat', '', 'AZN', NULL, NULL, NULL),
(16, 'BS', 'Bahamas The', '1242', '', '', '', NULL, NULL, NULL),
(17, 'BH', 'Bahrain', '973', 'Bahraini dinar', '.د.ب', 'BHD', NULL, NULL, NULL),
(18, 'BD', 'Bangladesh', '88', 'Bangladeshi taka', '৳', 'BDT', NULL, NULL, NULL),
(19, 'BB', 'Barbados', '1246', 'Barbadian dollar', '$', 'BBD', NULL, NULL, NULL),
(20, 'BY', 'Belarus', '375', 'Belarusian ruble', 'Br', 'BYR', NULL, NULL, NULL),
(21, 'BE', 'Belgium', '32', 'Euro', '€', 'EUR', NULL, NULL, NULL),
(22, 'BZ', 'Belize', '501', 'Belize dollar', '$', 'BZD', NULL, NULL, NULL),
(23, 'BJ', 'Benin', '229', 'West African CFA fra', 'Fr', 'XOF', NULL, NULL, NULL),
(24, 'BM', 'Bermuda', '1441', 'Bermudian dollar', '$', 'BMD', NULL, NULL, NULL),
(25, 'BT', 'Bhutan', '975', 'Bhutanese ngultrum', 'Nu.', 'BTN', NULL, NULL, NULL),
(26, 'BO', 'Bolivia', '591', 'Bolivian boliviano', 'Bs.', 'BOB', NULL, NULL, NULL),
(27, 'BA', 'Bosnia and Herzegovina', '387', 'Bosnia and Herzegovi', 'KM or КМ', 'BAM', NULL, NULL, NULL),
(28, 'BW', 'Botswana', '267', 'Botswana pula', 'P', 'BWP', NULL, NULL, NULL),
(29, 'BV', 'Bouvet Island', '0', '', '', '', NULL, NULL, NULL),
(30, 'BR', 'Brazil', '55', 'Brazilian real', 'R$', 'BRL', NULL, NULL, NULL),
(31, 'IO', 'British Indian Ocean Territory', '246', 'United States dollar', '$', 'USD', NULL, NULL, NULL),
(32, 'BN', 'Brunei', '673', 'Brunei dollar', '$', 'BND', NULL, NULL, NULL),
(33, 'BG', 'Bulgaria', '359', 'Bulgarian lev', 'лв', 'BGN', NULL, NULL, NULL),
(34, 'BF', 'Burkina Faso', '226', 'West African CFA fra', 'Fr', 'XOF', NULL, NULL, NULL),
(35, 'BI', 'Burundi', '257', 'Burundian franc', 'Fr', 'BIF', NULL, NULL, NULL),
(36, 'KH', 'Cambodia', '855', 'Cambodian riel', '៛', 'KHR', NULL, NULL, NULL),
(37, 'CM', 'Cameroon', '237', 'Central African CFA ', 'Fr', 'XAF', NULL, NULL, NULL),
(38, 'CA', 'Canada', '1', 'Canadian dollar', '$', 'CAD', NULL, NULL, NULL),
(39, 'CV', 'Cape Verde', '238', 'Cape Verdean escudo', 'Esc or $', 'CVE', NULL, NULL, NULL),
(40, 'KY', 'Cayman Islands', '1345', 'Cayman Islands dolla', '$', 'KYD', NULL, NULL, NULL),
(41, 'CF', 'Central African Republic', '236', 'Central African CFA ', 'Fr', 'XAF', NULL, NULL, NULL),
(42, 'TD', 'Chad', '235', 'Central African CFA ', 'Fr', 'XAF', NULL, NULL, NULL),
(43, 'CL', 'Chile', '56', 'Chilean peso', '$', 'CLP', NULL, NULL, NULL),
(44, 'CN', 'China', '86', 'Chinese yuan', '¥ or 元', 'CNY', NULL, NULL, NULL),
(45, 'CX', 'Christmas Island', '61', '', '', '', NULL, NULL, NULL),
(46, 'CC', 'Cocos (Keeling) Islands', '672', 'Australian dollar', '$', 'AUD', NULL, NULL, NULL),
(47, 'CO', 'Colombia', '57', 'Colombian peso', '$', 'COP', NULL, NULL, NULL),
(48, 'KM', 'Comoros', '269', 'Comorian franc', 'Fr', 'KMF', NULL, NULL, NULL),
(49, 'CG', 'Congo', '242', '', '', '', NULL, NULL, NULL),
(50, 'CD', 'Congo The Democratic Republic Of The', '242', '', '', '', NULL, NULL, NULL),
(51, 'CK', 'Cook Islands', '682', 'New Zealand dollar', '$', 'NZD', NULL, NULL, NULL),
(52, 'CR', 'Costa Rica', '506', 'Costa Rican colón', '₡', 'CRC', NULL, NULL, NULL),
(53, 'CI', 'Cote D\'Ivoire (Ivory Coast)', '225', '', '', '', NULL, NULL, NULL),
(54, 'HR', 'Croatia (Hrvatska)', '385', '', '', '', NULL, NULL, NULL),
(55, 'CU', 'Cuba', '53', 'Cuban convertible pe', '$', 'CUC', NULL, NULL, NULL),
(56, 'CY', 'Cyprus', '357', 'Euro', '€', 'EUR', NULL, NULL, NULL),
(57, 'CZ', 'Czech Republic', '420', 'Czech koruna', 'Kč', 'CZK', NULL, NULL, NULL),
(58, 'DK', 'Denmark', '45', 'Danish krone', 'kr', 'DKK', NULL, NULL, NULL),
(59, 'DJ', 'Djibouti', '253', 'Djiboutian franc', 'Fr', 'DJF', NULL, NULL, NULL),
(60, 'DM', 'Dominica', '1767', 'East Caribbean dolla', '$', 'XCD', NULL, NULL, NULL),
(61, 'DO', 'Dominican Republic', '1809', 'Dominican peso', '$', 'DOP', NULL, NULL, NULL),
(62, 'TP', 'East Timor', '670', 'United States dollar', '$', 'USD', NULL, NULL, NULL),
(63, 'EC', 'Ecuador', '593', 'United States dollar', '$', 'USD', NULL, NULL, NULL),
(64, 'EG', 'Egypt', '20', 'Egyptian pound', '£ or ج.م', 'EGP', NULL, NULL, NULL),
(65, 'SV', 'El Salvador', '503', 'United States dollar', '$', 'USD', NULL, NULL, NULL),
(66, 'GQ', 'Equatorial Guinea', '240', 'Central African CFA ', 'Fr', 'XAF', NULL, NULL, NULL),
(67, 'ER', 'Eritrea', '291', 'Eritrean nakfa', 'Nfk', 'ERN', NULL, NULL, NULL),
(68, 'EE', 'Estonia', '372', 'Euro', '€', 'EUR', NULL, NULL, NULL),
(69, 'ET', 'Ethiopia', '251', 'Ethiopian birr', 'Br', 'ETB', NULL, NULL, NULL),
(70, 'XA', 'External Territories of Australia', '61', '', '', '', NULL, NULL, NULL),
(71, 'FK', 'Falkland Islands', '500', 'Falkland Islands pou', '£', 'FKP', NULL, NULL, NULL),
(72, 'FO', 'Faroe Islands', '298', 'Danish krone', 'kr', 'DKK', NULL, NULL, NULL),
(73, 'FJ', 'Fiji Islands', '679', '', '', '', NULL, NULL, NULL),
(74, 'FI', 'Finland', '358', 'Euro', '€', 'EUR', NULL, NULL, NULL),
(75, 'FR', 'France', '33', 'Euro', '€', 'EUR', NULL, NULL, NULL),
(76, 'GF', 'French Guiana', '594', '', '', '', NULL, NULL, NULL),
(77, 'PF', 'French Polynesia', '689', 'CFP franc', 'Fr', 'XPF', NULL, NULL, NULL),
(78, 'TF', 'French Southern Territories', '0', '', '', '', NULL, NULL, NULL),
(79, 'GA', 'Gabon', '241', 'Central African CFA ', 'Fr', 'XAF', NULL, NULL, NULL),
(80, 'GM', 'Gambia The', '220', '', '', '', NULL, NULL, NULL),
(81, 'GE', 'Georgia', '995', 'Georgian lari', 'ლ', 'GEL', NULL, NULL, NULL),
(82, 'DE', 'Germany', '49', 'Euro', '€', 'EUR', NULL, NULL, NULL),
(83, 'GH', 'Ghana', '233', 'Ghana cedi', '₵', 'GHS', NULL, NULL, NULL),
(84, 'GI', 'Gibraltar', '350', 'Gibraltar pound', '£', 'GIP', NULL, NULL, NULL),
(85, 'GR', 'Greece', '30', 'Euro', '€', 'EUR', NULL, NULL, NULL),
(86, 'GL', 'Greenland', '299', '', '', '', NULL, NULL, NULL),
(87, 'GD', 'Grenada', '1473', 'East Caribbean dolla', '$', 'XCD', NULL, NULL, NULL),
(88, 'GP', 'Guadeloupe', '590', '', '', '', NULL, NULL, NULL),
(89, 'GU', 'Guam', '1671', '', '', '', NULL, NULL, NULL),
(90, 'GT', 'Guatemala', '502', 'Guatemalan quetzal', 'Q', 'GTQ', NULL, NULL, NULL),
(91, 'XU', 'Guernsey and Alderney', '44', '', '', '', NULL, NULL, NULL),
(92, 'GN', 'Guinea', '224', 'Guinean franc', 'Fr', 'GNF', NULL, NULL, NULL),
(93, 'GW', 'Guinea-Bissau', '245', 'West African CFA fra', 'Fr', 'XOF', NULL, NULL, NULL),
(94, 'GY', 'Guyana', '592', 'Guyanese dollar', '$', 'GYD', NULL, NULL, NULL),
(95, 'HT', 'Haiti', '509', 'Haitian gourde', 'G', 'HTG', NULL, NULL, NULL),
(96, 'HM', 'Heard and McDonald Islands', '0', '', '', '', NULL, NULL, NULL),
(97, 'HN', 'Honduras', '504', 'Honduran lempira', 'L', 'HNL', NULL, NULL, NULL),
(98, 'HK', 'Hong Kong S.A.R.', '852', '', '', '', NULL, NULL, NULL),
(99, 'HU', 'Hungary', '36', 'Hungarian forint', 'Ft', 'HUF', NULL, NULL, NULL),
(100, 'IS', 'Iceland', '354', 'Icelandic króna', 'kr', 'ISK', NULL, NULL, NULL),
(101, 'IN', 'India', '91', 'Indian rupee', '₹', 'INR', NULL, NULL, NULL),
(102, 'ID', 'Indonesia', '62', 'Indonesian rupiah', 'Rp', 'IDR', NULL, NULL, NULL),
(103, 'IR', 'Iran', '98', 'Iranian rial', '﷼', 'IRR', NULL, NULL, NULL),
(104, 'IQ', 'Iraq', '964', 'Iraqi dinar', 'ع.د', 'IQD', NULL, NULL, NULL),
(105, 'IE', 'Ireland', '353', 'Euro', '€', 'EUR', NULL, NULL, NULL),
(106, 'IL', 'Israel', '972', 'Israeli new shekel', '₪', 'ILS', NULL, NULL, NULL),
(107, 'IT', 'Italy', '39', 'Euro', '€', 'EUR', NULL, NULL, NULL),
(108, 'JM', 'Jamaica', '1876', 'Jamaican dollar', '$', 'JMD', NULL, NULL, NULL),
(109, 'JP', 'Japan', '81', 'Japanese yen', '¥', 'JPY', NULL, NULL, NULL),
(110, 'XJ', 'Jersey', '44', 'British pound', '£', 'GBP', NULL, NULL, NULL),
(111, 'JO', 'Jordan', '962', 'Jordanian dinar', 'د.ا', 'JOD', NULL, NULL, NULL),
(112, 'KZ', 'Kazakhstan', '7', 'Kazakhstani tenge', '', 'KZT', NULL, NULL, NULL),
(113, 'KE', 'Kenya', '254', 'Kenyan shilling', 'Sh', 'KES', NULL, NULL, NULL),
(114, 'KI', 'Kiribati', '686', 'Australian dollar', '$', 'AUD', NULL, NULL, NULL),
(115, 'KP', 'Korea North', '850', '', '', '', NULL, NULL, NULL),
(116, 'KR', 'Korea South', '82', '', '', '', NULL, NULL, NULL),
(117, 'KW', 'Kuwait', '965', 'Kuwaiti dinar', 'د.ك', 'KWD', NULL, NULL, NULL),
(118, 'KG', 'Kyrgyzstan', '996', 'Kyrgyzstani som', 'лв', 'KGS', NULL, NULL, NULL),
(119, 'LA', 'Laos', '856', 'Lao kip', '₭', 'LAK', NULL, NULL, NULL),
(120, 'LV', 'Latvia', '371', 'Euro', '€', 'EUR', NULL, NULL, NULL),
(121, 'LB', 'Lebanon', '961', 'Lebanese pound', 'ل.ل', 'LBP', NULL, NULL, NULL),
(122, 'LS', 'Lesotho', '266', 'Lesotho loti', 'L', 'LSL', NULL, NULL, NULL),
(123, 'LR', 'Liberia', '231', 'Liberian dollar', '$', 'LRD', NULL, NULL, NULL),
(124, 'LY', 'Libya', '218', 'Libyan dinar', 'ل.د', 'LYD', NULL, NULL, NULL),
(125, 'LI', 'Liechtenstein', '423', 'Swiss franc', 'Fr', 'CHF', NULL, NULL, NULL),
(126, 'LT', 'Lithuania', '370', 'Euro', '€', 'EUR', NULL, NULL, NULL),
(127, 'LU', 'Luxembourg', '352', 'Euro', '€', 'EUR', NULL, NULL, NULL),
(128, 'MO', 'Macau S.A.R.', '853', '', '', '', NULL, NULL, NULL),
(129, 'MK', 'Macedonia', '389', '', '', '', NULL, NULL, NULL),
(130, 'MG', 'Madagascar', '261', 'Malagasy ariary', 'Ar', 'MGA', NULL, NULL, NULL),
(131, 'MW', 'Malawi', '265', 'Malawian kwacha', 'MK', 'MWK', NULL, NULL, NULL),
(132, 'MY', 'Malaysia', '60', 'Malaysian ringgit', 'RM', 'MYR', NULL, NULL, NULL),
(133, 'MV', 'Maldives', '960', 'Maldivian rufiyaa', '.ރ', 'MVR', NULL, NULL, NULL),
(134, 'ML', 'Mali', '223', 'West African CFA fra', 'Fr', 'XOF', NULL, NULL, NULL),
(135, 'MT', 'Malta', '356', 'Euro', '€', 'EUR', NULL, NULL, NULL),
(136, 'XM', 'Man (Isle of)', '44', '', '', '', NULL, NULL, NULL),
(137, 'MH', 'Marshall Islands', '692', 'United States dollar', '$', 'USD', NULL, NULL, NULL),
(138, 'MQ', 'Martinique', '596', '', '', '', NULL, NULL, NULL),
(139, 'MR', 'Mauritania', '222', 'Mauritanian ouguiya', 'UM', 'MRO', NULL, NULL, NULL),
(140, 'MU', 'Mauritius', '230', 'Mauritian rupee', '₨', 'MUR', NULL, NULL, NULL),
(141, 'YT', 'Mayotte', '269', '', '', '', NULL, NULL, NULL),
(142, 'MX', 'Mexico', '52', 'Mexican peso', '$', 'MXN', NULL, NULL, NULL),
(143, 'FM', 'Micronesia', '691', 'Micronesian dollar', '$', '', NULL, NULL, NULL),
(144, 'MD', 'Moldova', '373', 'Moldovan leu', 'L', 'MDL', NULL, NULL, NULL),
(145, 'MC', 'Monaco', '377', 'Euro', '€', 'EUR', NULL, NULL, NULL),
(146, 'MN', 'Mongolia', '976', 'Mongolian tögrög', '₮', 'MNT', NULL, NULL, NULL),
(147, 'MS', 'Montserrat', '1664', 'East Caribbean dolla', '$', 'XCD', NULL, NULL, NULL),
(148, 'MA', 'Morocco', '212', 'Moroccan dirham', 'د.م.', 'MAD', NULL, NULL, NULL),
(149, 'MZ', 'Mozambique', '258', 'Mozambican metical', 'MT', 'MZN', NULL, NULL, NULL),
(150, 'MM', 'Myanmar', '95', 'Burmese kyat', 'Ks', 'MMK', NULL, NULL, NULL),
(151, 'NA', 'Namibia', '264', 'Namibian dollar', '$', 'NAD', NULL, NULL, NULL),
(152, 'NR', 'Nauru', '674', 'Australian dollar', '$', 'AUD', NULL, NULL, NULL),
(153, 'NP', 'Nepal', '977', 'Nepalese rupee', '₨', 'NPR', NULL, NULL, NULL),
(154, 'AN', 'Netherlands Antilles', '599', '', '', '', NULL, NULL, NULL),
(155, 'NL', 'Netherlands The', '31', '', '', '', NULL, NULL, NULL),
(156, 'NC', 'New Caledonia', '687', 'CFP franc', 'Fr', 'XPF', NULL, NULL, NULL),
(157, 'NZ', 'New Zealand', '64', 'New Zealand dollar', '$', 'NZD', NULL, NULL, NULL),
(158, 'NI', 'Nicaragua', '505', 'Nicaraguan córdoba', 'C$', 'NIO', NULL, NULL, NULL),
(159, 'NE', 'Niger', '227', 'West African CFA fra', 'Fr', 'XOF', NULL, NULL, NULL),
(160, 'NG', 'Nigeria', '234', 'Nigerian naira', '₦', 'NGN', NULL, NULL, NULL),
(161, 'NU', 'Niue', '683', 'New Zealand dollar', '$', 'NZD', NULL, NULL, NULL),
(162, 'NF', 'Norfolk Island', '672', '', '', '', NULL, NULL, NULL),
(163, 'MP', 'Northern Mariana Islands', '1670', '', '', '', NULL, NULL, NULL),
(164, 'NO', 'Norway', '47', 'Norwegian krone', 'kr', 'NOK', NULL, NULL, NULL),
(165, 'OM', 'Oman', '968', 'Omani rial', 'ر.ع.', 'OMR', NULL, NULL, NULL),
(166, 'PK', 'Pakistan', '92', 'Pakistani rupee', '₨', 'PKR', NULL, NULL, NULL),
(167, 'PW', 'Palau', '680', 'Palauan dollar', '$', '', NULL, NULL, NULL),
(168, 'PS', 'Palestinian Territory Occupied', '970', '', '', '', NULL, NULL, NULL),
(169, 'PA', 'Panama', '507', 'Panamanian balboa', 'B/.', 'PAB', NULL, NULL, NULL),
(170, 'PG', 'Papua new Guinea', '675', 'Papua New Guinean ki', 'K', 'PGK', NULL, NULL, NULL),
(171, 'PY', 'Paraguay', '595', 'Paraguayan guaraní', '₲', 'PYG', NULL, NULL, NULL),
(172, 'PE', 'Peru', '51', 'Peruvian nuevo sol', 'S/.', 'PEN', NULL, NULL, NULL),
(173, 'PH', 'Philippines', '63', 'Philippine peso', '₱', 'PHP', NULL, NULL, NULL),
(174, 'PN', 'Pitcairn Island', '0', '', '', '', NULL, NULL, NULL),
(175, 'PL', 'Poland', '48', 'Polish złoty', 'zł', 'PLN', NULL, NULL, NULL),
(176, 'PT', 'Portugal', '351', 'Euro', '€', 'EUR', NULL, NULL, NULL),
(177, 'PR', 'Puerto Rico', '1787', '', '', '', NULL, NULL, NULL),
(178, 'QA', 'Qatar', '974', 'Qatari riyal', 'ر.ق', 'QAR', NULL, NULL, NULL),
(179, 'RE', 'Reunion', '262', '', '', '', NULL, NULL, NULL),
(180, 'RO', 'Romania', '40', 'Romanian leu', 'lei', 'RON', NULL, NULL, NULL),
(181, 'RU', 'Russia', '70', 'Russian ruble', '', 'RUB', NULL, NULL, NULL),
(182, 'RW', 'Rwanda', '250', 'Rwandan franc', 'Fr', 'RWF', NULL, NULL, NULL),
(183, 'SH', 'Saint Helena', '290', 'Saint Helena pound', '£', 'SHP', NULL, NULL, NULL),
(184, 'KN', 'Saint Kitts And Nevis', '1869', 'East Caribbean dolla', '$', 'XCD', NULL, NULL, NULL),
(185, 'LC', 'Saint Lucia', '1758', 'East Caribbean dolla', '$', 'XCD', NULL, NULL, NULL),
(186, 'PM', 'Saint Pierre and Miquelon', '508', '', '', '', NULL, NULL, NULL),
(187, 'VC', 'Saint Vincent And The Grenadines', '1784', 'East Caribbean dolla', '$', 'XCD', NULL, NULL, NULL),
(188, 'WS', 'Samoa', '684', 'Samoan tālā', 'T', 'WST', NULL, NULL, NULL),
(189, 'SM', 'San Marino', '378', 'Euro', '€', 'EUR', NULL, NULL, NULL),
(190, 'ST', 'Sao Tome and Principe', '239', 'São Tomé and Príncip', 'Db', 'STD', NULL, NULL, NULL),
(191, 'SA', 'Saudi Arabia', '966', 'Saudi riyal', 'ر.س', 'SAR', NULL, NULL, NULL),
(192, 'SN', 'Senegal', '221', 'West African CFA fra', 'Fr', 'XOF', NULL, NULL, NULL),
(193, 'RS', 'Serbia', '381', 'Serbian dinar', 'дин. or din.', 'RSD', NULL, NULL, NULL),
(194, 'SC', 'Seychelles', '248', 'Seychellois rupee', '₨', 'SCR', NULL, NULL, NULL),
(195, 'SL', 'Sierra Leone', '232', 'Sierra Leonean leone', 'Le', 'SLL', NULL, NULL, NULL),
(196, 'SG', 'Singapore', '65', 'Brunei dollar', '$', 'BND', NULL, NULL, NULL),
(197, 'SK', 'Slovakia', '421', 'Euro', '€', 'EUR', NULL, NULL, NULL),
(198, 'SI', 'Slovenia', '386', 'Euro', '€', 'EUR', NULL, NULL, NULL),
(199, 'XG', 'Smaller Territories of the UK', '44', '', '', '', NULL, NULL, NULL),
(200, 'SB', 'Solomon Islands', '677', 'Solomon Islands doll', '$', 'SBD', NULL, NULL, NULL),
(201, 'SO', 'Somalia', '252', 'Somali shilling', 'Sh', 'SOS', NULL, NULL, NULL),
(202, 'ZA', 'South Africa', '27', 'South African rand', 'R', 'ZAR', NULL, NULL, NULL),
(203, 'GS', 'South Georgia', '0', '', '', '', NULL, NULL, NULL),
(204, 'SS', 'South Sudan', '211', 'South Sudanese pound', '£', 'SSP', NULL, NULL, NULL),
(205, 'ES', 'Spain', '34', 'Euro', '€', 'EUR', NULL, NULL, NULL),
(206, 'LK', 'Sri Lanka', '94', 'Sri Lankan rupee', 'Rs or රු', 'LKR', NULL, NULL, NULL),
(207, 'SD', 'Sudan', '249', 'Sudanese pound', 'ج.س.', 'SDG', NULL, NULL, NULL),
(208, 'SR', 'Suriname', '597', 'Surinamese dollar', '$', 'SRD', NULL, NULL, NULL),
(209, 'SJ', 'Svalbard And Jan Mayen Islands', '47', '', '', '', NULL, NULL, NULL),
(210, 'SZ', 'Swaziland', '268', 'Swazi lilangeni', 'L', 'SZL', NULL, NULL, NULL),
(211, 'SE', 'Sweden', '46', 'Swedish krona', 'kr', 'SEK', NULL, NULL, NULL),
(212, 'CH', 'Switzerland', '41', 'Swiss franc', 'Fr', 'CHF', NULL, NULL, NULL),
(213, 'SY', 'Syria', '963', 'Syrian pound', '£ or ل.س', 'SYP', NULL, NULL, NULL),
(214, 'TW', 'Taiwan', '886', 'New Taiwan dollar', '$', 'TWD', NULL, NULL, NULL),
(215, 'TJ', 'Tajikistan', '992', 'Tajikistani somoni', 'ЅМ', 'TJS', NULL, NULL, NULL),
(216, 'TZ', 'Tanzania', '255', 'Tanzanian shilling', 'Sh', 'TZS', NULL, NULL, NULL),
(217, 'TH', 'Thailand', '66', 'Thai baht', '฿', 'THB', NULL, NULL, NULL),
(218, 'TG', 'Togo', '228', 'West African CFA fra', 'Fr', 'XOF', NULL, NULL, NULL),
(219, 'TK', 'Tokelau', '690', '', '', '', NULL, NULL, NULL),
(220, 'TO', 'Tonga', '676', 'Tongan paʻanga', 'T$', 'TOP', NULL, NULL, NULL),
(221, 'TT', 'Trinidad And Tobago', '1868', 'Trinidad and Tobago ', '$', 'TTD', NULL, NULL, NULL),
(222, 'TN', 'Tunisia', '216', 'Tunisian dinar', 'د.ت', 'TND', NULL, NULL, NULL),
(223, 'TR', 'Turkey', '90', 'Turkish lira', '', 'TRY', NULL, NULL, NULL),
(224, 'TM', 'Turkmenistan', '7370', 'Turkmenistan manat', 'm', 'TMT', NULL, NULL, NULL),
(225, 'TC', 'Turks And Caicos Islands', '1649', 'United States dollar', '$', 'USD', NULL, NULL, NULL),
(226, 'TV', 'Tuvalu', '688', 'Australian dollar', '$', 'AUD', NULL, NULL, NULL),
(227, 'UG', 'Uganda', '256', 'Ugandan shilling', 'Sh', 'UGX', NULL, NULL, NULL),
(228, 'UA', 'Ukraine', '380', 'Ukrainian hryvnia', '₴', 'UAH', NULL, NULL, NULL),
(229, 'AE', 'United Arab Emirates', '971', 'United Arab Emirates', 'د.إ', 'AED', NULL, NULL, NULL),
(230, 'GB', 'United Kingdom', '44', 'British pound', '£', 'GBP', NULL, NULL, NULL),
(231, 'US', 'United States', '1', 'United States dollar', '$', 'USD', NULL, NULL, NULL),
(232, 'UM', 'United States Minor Outlying Islands', '1', '', '', '', NULL, NULL, NULL),
(233, 'UY', 'Uruguay', '598', 'Uruguayan peso', '$', 'UYU', NULL, NULL, NULL),
(234, 'UZ', 'Uzbekistan', '998', 'Uzbekistani som', '', 'UZS', NULL, NULL, NULL),
(235, 'VU', 'Vanuatu', '678', 'Vanuatu vatu', 'Vt', 'VUV', NULL, NULL, NULL),
(236, 'VA', 'Vatican City State (Holy See)', '39', '', '', '', NULL, NULL, NULL),
(237, 'VE', 'Venezuela', '58', 'Venezuelan bolívar', 'Bs F', 'VEF', NULL, NULL, NULL),
(238, 'VN', 'Vietnam', '84', 'Vietnamese đồng', '₫', 'VND', NULL, NULL, NULL),
(239, 'VG', 'Virgin Islands (British)', '1284', '', '', '', NULL, NULL, NULL),
(240, 'VI', 'Virgin Islands (US)', '1340', '', '', '', NULL, NULL, NULL),
(241, 'WF', 'Wallis And Futuna Islands', '681', '', '', '', NULL, NULL, NULL),
(242, 'EH', 'Western Sahara', '212', '', '', '', NULL, NULL, NULL),
(243, 'YE', 'Yemen', '967', 'Yemeni rial', '﷼', 'YER', NULL, NULL, NULL),
(244, 'YU', 'Yugoslavia', '38', '', '', '', NULL, NULL, NULL),
(245, 'ZM', 'Zambia', '260', 'Zambian kwacha', 'ZK', 'ZMW', NULL, NULL, NULL),
(246, 'ZW', 'Zimbabwe', '263', 'Botswana pula', 'P', 'BWP', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cupon_codes`
--

CREATE TABLE `cupon_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_user_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cupon_code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cupon_amount` decimal(20,2) DEFAULT NULL,
  `cupon_type` enum('withdrawal','user','admin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `cupon_flow` enum('in','out') COLLATE utf8mb4_unicode_ci NOT NULL,
  `cupon_check` enum('used','unused') COLLATE utf8mb4_unicode_ci NOT NULL,
  `cupon_details` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cupon_status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dealers`
--

CREATE TABLE `dealers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dealer_type` enum('company','division','district','upazila','union','admin') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district_id` bigint(100) DEFAULT NULL,
  `division_id` bigint(100) DEFAULT NULL,
  `upazila_id` bigint(100) DEFAULT NULL,
  `dealer_union` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dealer_delivery_address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dealer_delivery_phone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dealer_delivery_email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dealer_delivery_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dealer_delivery_city` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dealer_delivery_state` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dealer_delivery_country` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dealer_delivery_postcode` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dealer_bonus` decimal(20,2) DEFAULT NULL,
  `dealer_ref_bonus` decimal(20,2) DEFAULT NULL,
  `dealer_status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dealers`
--

INSERT INTO `dealers` (`id`, `user_id`, `dealer_type`, `district_id`, `division_id`, `upazila_id`, `dealer_union`, `dealer_delivery_address`, `dealer_delivery_phone`, `dealer_delivery_email`, `dealer_delivery_name`, `dealer_delivery_city`, `dealer_delivery_state`, `dealer_delivery_country`, `dealer_delivery_postcode`, `dealer_bonus`, `dealer_ref_bonus`, `dealer_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', 'admin', 1, 5, 116, 'New Union', 'fdsfsd', '0171145', 'info@megloballtd.com', 'Test Account User', '38', '5', '18', '4655', NULL, NULL, NULL, '2019-11-14 06:21:18', '2019-11-14 06:21:18', NULL),
(3, '7', 'company', 1, 5, 116, 'New Union', 'fdsfsd', '0171145', 'info@megloballtd.com', 'Test Account User', '38', '5', '18', '4655', NULL, NULL, NULL, '2019-11-14 06:21:18', '2019-11-14 06:21:18', NULL),
(4, '8', 'district', 1, 3, 164, 'New Union56', 'gfdgdgd', '019114236745', 'admin@addmin.com', 'S M Rifat', '1', '3', '18', NULL, NULL, NULL, NULL, '2019-11-14 06:28:31', '2019-11-14 06:28:31', NULL),
(5, '9', 'upazila', 1, 3, 164, 'Upazila Union', NULL, '6456456', 'infodf@megloballtd.com', 'Test Upazilla', '1', '3', '18', NULL, NULL, NULL, NULL, '2019-11-14 11:27:23', '2019-11-14 11:27:23', NULL),
(6, '10', 'union', 1, 3, 164, 'union', NULL, '234234', 'info2342@megloballtd.com', 'Test Union', '1', '3', '18', '5675', NULL, NULL, NULL, '2019-11-14 11:28:44', '2019-11-14 11:28:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation_title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation_details` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bn_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `division_id`, `name`, `bn_name`, `lat`, `lon`, `website`, `sort`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '3', 'Dhaka', 'ঢাকা', '23.7115253', '90.4111451', 'www.dhaka.gov.bd', '', NULL, NULL, NULL),
(2, '3', 'Faridpur', 'ফরিদপুর', '23.6070822', '89.8429406', 'www.faridpur.gov.bd', '', NULL, NULL, NULL),
(3, '3', 'Gazipur', 'গাজীপুর', '24.0022858', '90.4264283', 'www.gazipur.gov.bd', '', NULL, NULL, NULL),
(4, '3', 'Gopalganj', 'গোপালগঞ্জ', '23.0050857', '89.8266059', 'www.gopalganj.gov.bd', '', NULL, NULL, NULL),
(5, '8', 'Jamalpur', 'জামালপুর', '24.937533', '89.937775', 'www.jamalpur.gov.bd', '', NULL, NULL, NULL),
(6, '3', 'Kishoreganj', 'কিশোরগঞ্জ', '24.444937', '90.776575', 'www.kishoreganj.gov.bd', '', NULL, NULL, NULL),
(7, '3', 'Madaripur', 'মাদারীপুর', '23.164102', '90.1896805', 'www.madaripur.gov.bd', '', NULL, NULL, NULL),
(8, '3', 'Manikganj', 'মানিকগঞ্জ', '0', '0', 'www.manikganj.gov.bd', '', NULL, NULL, NULL),
(9, '3', 'Munshiganj', 'মুন্সিগঞ্জ', '0', '0', 'www.munshiganj.gov.bd', '', NULL, NULL, NULL),
(10, '8', 'Mymensingh', 'ময়মনসিংহ', '0', '0', 'www.mymensingh.gov.bd', '', NULL, NULL, NULL),
(11, '3', 'Narayanganj', 'নারায়াণগঞ্জ', '23.63366', '90.496482', 'www.narayanganj.gov.bd', '', NULL, NULL, NULL),
(12, '3', 'Narsingdi', 'নরসিংদী', '23.932233', '90.71541', 'www.narsingdi.gov.bd', '', NULL, NULL, NULL),
(13, '8', 'Netrokona', 'নেত্রকোণা', '24.870955', '90.727887', 'www.netrokona.gov.bd', '', NULL, NULL, NULL),
(14, '3', 'Rajbari', 'রাজবাড়ি', '23.7574305', '89.6444665', 'www.rajbari.gov.bd', '', NULL, NULL, NULL),
(15, '3', 'Shariatpur', 'শরীয়তপুর', '0', '0', 'www.shariatpur.gov.bd', '', NULL, NULL, NULL),
(16, '8', 'Sherpur', 'শেরপুর', '25.0204933', '90.0152966', 'www.sherpur.gov.bd', '', NULL, NULL, NULL),
(17, '3', 'Tangail', 'টাঙ্গাইল', '0', '0', 'www.tangail.gov.bd', '', NULL, NULL, NULL),
(18, '5', 'Bogura', 'বগুড়া', '24.8465228', '89.377755', 'www.bogra.gov.bd', '', NULL, NULL, NULL),
(19, '5', 'Joypurhat', 'জয়পুরহাট', '0', '0', 'www.joypurhat.gov.bd', '', NULL, NULL, NULL),
(20, '5', 'Naogaon', 'নওগাঁ', '0', '0', 'www.naogaon.gov.bd', '', NULL, NULL, NULL),
(21, '5', 'Natore', 'নাটোর', '24.420556', '89.000282', 'www.natore.gov.bd', '', NULL, NULL, NULL),
(22, '5', 'Nawabganj', 'নবাবগঞ্জ', '24.5965034', '88.2775122', 'www.chapainawabganj.gov.bd', '', NULL, NULL, NULL),
(23, '5', 'Pabna', 'পাবনা', '23.998524', '89.233645', 'www.pabna.gov.bd', '', NULL, NULL, NULL),
(24, '5', 'Rajshahi', 'রাজশাহী', '0', '0', 'www.rajshahi.gov.bd', '', NULL, NULL, NULL),
(25, '5', 'Sirajgonj', 'সিরাজগঞ্জ', '24.4533978', '89.7006815', 'www.sirajganj.gov.bd', '', NULL, NULL, NULL),
(26, '6', 'Dinajpur', 'দিনাজপুর', '25.6217061', '88.6354504', 'www.dinajpur.gov.bd', '', NULL, NULL, NULL),
(27, '6', 'Gaibandha', 'গাইবান্ধা', '25.328751', '89.528088', 'www.gaibandha.gov.bd', '', NULL, NULL, NULL),
(28, '6', 'Kurigram', 'কুড়িগ্রাম', '25.805445', '89.636174', 'www.kurigram.gov.bd', '', NULL, NULL, NULL),
(29, '6', 'Lalmonirhat', 'লালমনিরহাট', '0', '0', 'www.lalmonirhat.gov.bd', '', NULL, NULL, NULL),
(30, '6', 'Nilphamari', 'নীলফামারী', '25.931794', '88.856006', 'www.nilphamari.gov.bd', '', NULL, NULL, NULL),
(31, '6', 'Panchagarh', 'পঞ্চগড়', '26.3411', '88.5541606', 'www.panchagarh.gov.bd', '', NULL, NULL, NULL),
(32, '6', 'Rangpur', 'রংপুর', '25.7558096', '89.244462', 'www.rangpur.gov.bd', '', NULL, NULL, NULL),
(33, '6', 'Thakurgaon', 'ঠাকুরগাঁও', '26.0336945', '88.4616834', 'www.thakurgaon.gov.bd', '', NULL, NULL, NULL),
(34, '1', 'Barguna', 'বরগুনা', '0', '0', 'www.barguna.gov.bd', '', NULL, NULL, NULL),
(35, '1', 'Barishal', 'বরিশাল', '0', '0', 'www.barisal.gov.bd', '', NULL, NULL, NULL),
(36, '1', 'Bhola', 'ভোলা', '22.685923', '90.648179', 'www.bhola.gov.bd', '', NULL, NULL, NULL),
(37, '1', 'Jhalokati', 'ঝালকাঠি', '0', '0', 'www.jhalakathi.gov.bd', '', NULL, NULL, NULL),
(38, '1', 'Patuakhali', 'পটুয়াখালী', '22.3596316', '90.3298712', 'www.patuakhali.gov.bd', '', NULL, NULL, NULL),
(39, '1', 'Pirojpur', 'পিরোজপুর', '0', '0', 'www.pirojpur.gov.bd', '', NULL, NULL, NULL),
(40, '2', 'Bandarban', 'বান্দরবান', '22.1953275', '92.2183773', 'www.bandarban.gov.bd', '', NULL, NULL, NULL),
(41, '2', 'Brahmanbaria', 'ব্রাহ্মণবাড়িয়া', '23.9570904', '91.1119286', 'www.brahmanbaria.gov.bd', '', NULL, NULL, NULL),
(42, '2', 'Chandpur', 'চাঁদপুর', '23.2332585', '90.6712912', 'www.chandpur.gov.bd', '', NULL, NULL, NULL),
(43, '2', 'Chattogram', 'চট্টগ্রাম', '22.335109', '91.834073', 'www.chittagong.gov.bd', '', NULL, NULL, NULL),
(44, '2', 'Cumilla', 'কুমিল্লা', '23.4682747', '91.1788135', 'www.comilla.gov.bd', '', NULL, NULL, NULL),
(45, '2', 'Cox\'s Bazar', 'কক্স বাজার', '0', '0', 'www.coxsbazar.gov.bd', '', NULL, NULL, NULL),
(46, '2', 'Feni', 'ফেনী', '23.023231', '91.3840844', 'www.feni.gov.bd', '', NULL, NULL, NULL),
(47, '2', 'Khagrachari', 'খাগড়াছড়ি', '23.119285', '91.984663', 'www.khagrachhari.gov.bd', '', NULL, NULL, NULL),
(48, '2', 'Lakshmipur', 'লক্ষ্মীপুর', '22.942477', '90.841184', 'www.lakshmipur.gov.bd', '', NULL, NULL, NULL),
(49, '2', 'Noakhali', 'নোয়াখালী', '22.869563', '91.099398', 'www.noakhali.gov.bd', '', NULL, NULL, NULL),
(50, '2', 'Rangamati', 'রাঙ্গামাটি', '0', '0', 'www.rangamati.gov.bd', '', NULL, NULL, NULL),
(51, '7', 'Habiganj', 'হবিগঞ্জ', '24.374945', '91.41553', 'www.habiganj.gov.bd', '', NULL, NULL, NULL),
(52, '7', 'Maulvibazar', 'মৌলভীবাজার', '24.482934', '91.777417', 'www.moulvibazar.gov.bd', '', NULL, NULL, NULL),
(53, '7', 'Sunamganj', 'সুনামগঞ্জ', '25.0658042', '91.3950115', 'www.sunamganj.gov.bd', '', NULL, NULL, NULL),
(54, '7', 'Sylhet', 'সিলেট', '24.8897956', '91.8697894', 'www.sylhet.gov.bd', '', NULL, NULL, NULL),
(55, '4', 'Bagerhat', 'বাগেরহাট', '22.651568', '89.785938', 'www.bagerhat.gov.bd', '', NULL, NULL, NULL),
(56, '4', 'Chuadanga', 'চুয়াডাঙ্গা', '23.6401961', '88.841841', 'www.chuadanga.gov.bd', '', NULL, NULL, NULL),
(57, '4', 'Jashore', 'যশোর', '23.16643', '89.2081126', 'www.jessore.gov.bd', '', NULL, NULL, NULL),
(58, '4', 'Jhenaidah', 'ঝিনাইদহ', '23.5448176', '89.1539213', 'www.jhenaidah.gov.bd', '', NULL, NULL, NULL),
(59, '4', 'Khulna', 'খুলনা', '22.815774', '89.568679', 'www.khulna.gov.bd', '', NULL, NULL, NULL),
(60, '4', 'Kushtia', 'কুষ্টিয়া', '23.901258', '89.120482', 'www.kushtia.gov.bd', '', NULL, NULL, NULL),
(61, '4', 'Magura', 'মাগুরা', '23.487337', '89.419956', 'www.magura.gov.bd', '', NULL, NULL, NULL),
(62, '4', 'Meherpur', 'মেহেরপুর', '23.762213', '88.631821', 'www.meherpur.gov.bd', '', NULL, NULL, NULL),
(63, '4', 'Narail', 'নড়াইল', '23.172534', '89.512672', 'www.narail.gov.bd', '', NULL, NULL, NULL),
(64, '4', 'Satkhira', 'সাতক্ষীরা', '0', '0', 'www.satkhira.gov.bd', '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bn_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `bn_name`, `sort`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Barishal', 'বরিশাল', '6', NULL, NULL, NULL),
(2, 'Chattogram', 'চট্টগ্রাম', '2', NULL, NULL, NULL),
(3, 'Dhaka', 'ঢাকা', '1', NULL, NULL, NULL),
(4, 'Khulna', 'খুলনা', '4', NULL, NULL, NULL),
(5, 'Rajshahi', 'রাজশাহী', '3', NULL, NULL, NULL),
(6, 'Rangpur', 'রংপুর', '7', NULL, NULL, NULL),
(7, 'Sylhet', 'সিলেট', '5', NULL, NULL, NULL),
(8, 'Mymensingh', 'ময়মনসিংহ', '8', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `incentive_settings`
--

CREATE TABLE `incentive_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reserve_percentage` decimal(20,2) DEFAULT NULL,
  `designation` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_amount` decimal(20,2) DEFAULT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `period` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'NULL',
  `last_incentive` timestamp NULL DEFAULT NULL,
  `next_incentive` timestamp NULL DEFAULT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `incentive_settings`
--

INSERT INTO `incentive_settings` (`id`, `user_id`, `reserve_percentage`, `designation`, `title`, `pay_amount`, `type`, `period`, `last_incentive`, `next_incentive`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', '25.00', 'tso', 'Achiever Royalty  Income', '100.00', 'achiever', '1', NULL, NULL, 'active', '2019-11-03 11:20:00', '2019-11-03 11:20:00', NULL),
(2, '1', '15.00', 'asm', 'Achiever Royalty  Income', '75.00', 'achiever', '1', NULL, NULL, 'active', '2019-11-03 11:20:00', '2019-11-03 11:20:00', NULL),
(3, '1', '15.00', 'rsm', 'Achiever Royalty  Income', '50.00', 'achiever', '1', NULL, NULL, 'active', '2019-11-03 11:20:00', '2019-11-03 11:20:00', NULL),
(4, '1', '10.00', 'zsm', 'Achiever Royalty  Income', '30.00', 'achiever', '1', NULL, NULL, 'active', '2019-11-03 11:20:00', '2019-11-03 11:20:00', NULL),
(5, '1', '10.00', 'dsm', 'Achiever Royalty  Income', '25.00', 'achiever', '1', '2019-11-04 05:28:06', '2019-12-04 05:28:06', 'active', '2019-11-03 11:20:00', '2019-11-04 05:28:06', NULL),
(6, '1', '10.00', 'nsm', 'Achiever Royalty  Income', '20.00', 'achiever', '1', NULL, NULL, 'active', '2019-11-03 11:20:00', '2019-11-03 11:20:00', NULL),
(7, '1', '5.00', 'agm', 'Achiever Royalty  Income', '15.00', 'achiever', '1', '2019-11-04 06:41:36', '2019-12-04 06:41:36', 'active', '2019-11-03 11:20:00', '2019-11-04 06:41:36', NULL),
(8, '1', '5.00', 'gm', 'Achiever Royalty  Income', '10.00', 'achiever', '1', '2019-11-04 05:29:20', '2019-12-04 05:29:20', 'active', '2019-11-03 11:20:00', '2019-11-04 05:29:20', NULL),
(9, '1', '5.00', 'ed', 'Achiever Royalty  Income', '5.00', 'achiever', '1', NULL, NULL, 'active', '2019-11-03 11:20:01', '2019-11-03 11:20:01', NULL),
(10, '1', NULL, 'dsm', 'Chairman Club Income ', '50.00', 'chairman_club', '3', '2019-11-04 05:28:07', '2020-02-04 05:28:07', 'active', '2019-11-03 11:20:00', '2019-11-04 05:28:07', NULL),
(11, '1', NULL, 'nsm', 'N.S.M Royalty Income', '30.00', 'nsm_royalty', '3', NULL, NULL, 'active', '2019-11-03 11:20:00', '2019-11-03 11:20:00', NULL),
(12, '1', NULL, 'ed', 'E.D Royalty Income', '5.00', 'ed_royalty', '12', NULL, NULL, 'active', '2019-11-03 11:20:01', '2019-11-03 11:20:01', NULL),
(13, '1', NULL, 'dealer', 'Stockiest  Royalty Bonus', '5.00', 'stockist_royalty', '1', NULL, NULL, 'active', '2019-11-03 11:20:01', '2019-11-03 11:20:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `member_bonuses`
--

CREATE TABLE `member_bonuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_user_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(20,2) DEFAULT NULL,
  `bonus_type` enum('achiever','chairman_club','nsm_royalty','ed_royalty','stockist_royalty','matching','mega_matching','sponsor','stockist_sponsor','stockist') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `incentive_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bonus_pv` decimal(20,2) DEFAULT NULL,
  `details` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member_bonuses`
--

INSERT INTO `member_bonuses` (`id`, `user_id`, `from_user_id`, `amount`, `bonus_type`, `incentive_type`, `bonus_pv`, `details`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', '3', '288.00', 'sponsor', NULL, NULL, 'You have received 288 Tk Sponsor bonus for 24 PV sales commission from rifat', 'active', '2019-12-05 12:16:56', '2019-12-05 12:16:56', NULL),
(2, '1', '3', '18.00', 'sponsor', NULL, NULL, 'You have received 18 Tk Sponsor bonus for 1.5 PV sales commission from rifat', 'active', '2019-12-05 12:19:01', '2019-12-05 12:19:01', NULL),
(3, '2', '4', '438.00', 'sponsor', NULL, NULL, 'You have received 438 Tk Sponsor bonus for 36.5 PV sales commission from rishad', 'active', '2019-12-05 12:25:37', '2019-12-05 12:25:37', NULL),
(4, '7', '7', '0.00', 'stockist', NULL, '0.00', 'You have received 0 TK Stockist Bonus for 0 PV Sales Commission from testcompany dealer', 'active', '2019-12-05 12:27:35', '2019-12-05 12:27:35', NULL),
(5, '1', '7', '50.00', 'stockist_sponsor', NULL, NULL, 'You have received 50 TK Stockist Sponsor Bonus for 25 PV sales commission from testcompany dealer.', 'active', '2019-12-05 12:27:42', '2019-12-05 12:27:42', NULL),
(6, '7', '7', '300.00', 'stockist', NULL, '25.00', 'You have received 300 TK Stockist Bonus for 25 PV Sales Commission from testcompany dealer', 'active', '2019-12-05 12:27:42', '2019-12-05 12:27:42', NULL),
(7, '1', '7', '50.00', 'stockist_sponsor', NULL, NULL, 'You have received 50 TK Stockist Sponsor Bonus for 25 PV sales commission from testcompany dealer.', 'active', '2019-12-05 12:27:50', '2019-12-05 12:27:50', NULL),
(8, '7', '7', '300.00', 'stockist', NULL, '25.00', 'You have received 300 TK Stockist Bonus for 25 PV Sales Commission from testcompany dealer', 'active', '2019-12-05 12:27:50', '2019-12-05 12:27:50', NULL),
(9, '1', NULL, '250.00', 'matching', NULL, NULL, 'You have received 250 TK for 1 Matching Bonus', NULL, '2019-12-05 12:28:26', '2019-12-05 12:28:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `member_trees`
--

CREATE TABLE `member_trees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sponsor_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `l_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `l_member` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_member` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_point` decimal(20,2) DEFAULT NULL,
  `l_point` decimal(20,2) DEFAULT NULL,
  `r_point` decimal(20,2) DEFAULT NULL,
  `is_premium` timestamp NULL DEFAULT NULL,
  `is_valid` timestamp NULL DEFAULT NULL,
  `l_matching` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_matching` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_matching` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_matching` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_matching_pv` decimal(20,2) DEFAULT NULL,
  `paid_matching_pv` decimal(20,2) DEFAULT NULL,
  `last_matching` date DEFAULT NULL,
  `last_incentive` date DEFAULT NULL,
  `last_royalty_incentive` date DEFAULT NULL,
  `incentive_start_from` date DEFAULT NULL,
  `extra_data` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member_trees`
--

INSERT INTO `member_trees` (`id`, `user_id`, `sponsor_id`, `designation`, `l_id`, `r_id`, `l_member`, `r_member`, `p_point`, `l_point`, `r_point`, `is_premium`, `is_valid`, `l_matching`, `r_matching`, `total_matching`, `paid_matching`, `total_matching_pv`, `paid_matching_pv`, `last_matching`, `last_incentive`, `last_royalty_incentive`, `incentive_start_from`, `extra_data`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', NULL, NULL, '2', '4', '4', '4', NULL, NULL, NULL, '2019-12-04 18:00:00', NULL, '1', '1', '1', '1', NULL, NULL, '2019-12-05', NULL, NULL, NULL, '{\"total_member\":{\"premium_l\":1,\"premium_r\":1,\"premium\":2,\"free_l\":3,\"free_r\":3,\"free\":6,\"total\":8},\"total\":{\"tso\":0,\"asm\":0,\"rsm\":0,\"zsm\":0,\"dsm\":0,\"nsm\":0,\"agm\":0,\"gm\":0,\"ed\":0},\"member_designation\":null,\"is_premium\":\"2019-12-05 00:00:00\",\"is_valid\":null,\"matching\":{\"matching_total\":2,\"matching_l\":1,\"matching_r\":1}}', NULL, '2019-12-05 12:38:03', NULL),
(2, '2', '1', NULL, '11', '3', '1', '2', NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"total_member\":{\"premium_l\":0,\"premium_r\":1,\"premium\":1,\"free_l\":1,\"free_r\":1,\"free\":2,\"total\":3},\"total\":{\"tso\":0,\"asm\":0,\"rsm\":0,\"zsm\":0,\"dsm\":0,\"nsm\":0,\"agm\":0,\"gm\":0,\"ed\":0},\"member_designation\":null,\"is_premium\":null,\"is_valid\":null,\"matching\":{\"matching_total\":1,\"matching_l\":0,\"matching_r\":1}}', '2019-11-07 10:58:37', '2019-12-05 12:19:45', NULL),
(3, '3', '1', NULL, '10', NULL, '1', NULL, NULL, NULL, NULL, '2019-12-05 12:19:01', '2019-12-05 12:19:01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"total_member\":{\"premium_l\":0,\"premium_r\":0,\"premium\":0,\"free_l\":1,\"free_r\":0,\"free\":1,\"total\":1},\"total\":{\"tso\":0,\"asm\":0,\"rsm\":0,\"zsm\":0,\"dsm\":0,\"nsm\":0,\"agm\":0,\"gm\":0,\"ed\":0},\"member_designation\":null,\"is_premium\":\"2019-12-05 18:19:01\",\"is_valid\":\"2019-12-05 18:19:01\",\"matching\":{\"matching_total\":0,\"matching_l\":0,\"matching_r\":0}}', '2019-11-07 12:37:30', '2019-12-05 12:19:45', NULL),
(4, '4', '2', NULL, NULL, '7', NULL, '3', NULL, NULL, NULL, '2019-12-05 12:25:37', '2019-12-05 12:25:37', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"total_member\":{\"premium_l\":0,\"premium_r\":0,\"premium\":0,\"free_l\":0,\"free_r\":3,\"free\":3,\"total\":3},\"total\":{\"tso\":0,\"asm\":0,\"rsm\":0,\"zsm\":0,\"dsm\":0,\"nsm\":0,\"agm\":0,\"gm\":0,\"ed\":0},\"member_designation\":null,\"is_premium\":\"2019-12-05 18:25:37\",\"is_valid\":\"2019-12-05 18:25:37\",\"matching\":{\"matching_total\":0,\"matching_l\":0,\"matching_r\":0}}', '2019-11-07 12:50:58', '2019-12-05 12:38:03', NULL),
(6, '7', '1', NULL, '8', '9', '1', '1', NULL, NULL, NULL, '2019-12-10 18:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"total_member\":{\"premium_l\":0,\"premium_r\":0,\"premium\":0,\"free_l\":1,\"free_r\":1,\"free\":2,\"total\":2},\"total\":{\"tso\":0,\"asm\":0,\"rsm\":0,\"zsm\":0,\"dsm\":0,\"nsm\":0,\"agm\":0,\"gm\":0,\"ed\":0},\"member_designation\":null,\"is_premium\":null,\"is_valid\":null,\"matching\":{\"matching_total\":0,\"matching_l\":0,\"matching_r\":0}}', '2019-11-14 06:21:18', '2019-12-05 12:38:03', NULL),
(7, '8', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-10 18:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-14 06:28:31', '2019-11-14 06:28:31', NULL),
(8, '9', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-14 11:27:23', '2019-11-14 11:27:23', NULL),
(9, '10', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-14 11:28:44', '2019-11-14 11:28:44', NULL),
(10, '11', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-03 11:13:26', '2019-12-03 11:13:26', NULL);

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
(3, '2019_10_05_181221_create_member_trees_table', 1),
(4, '2019_10_09_092903_create_products_table', 1),
(5, '2019_10_09_092948_create_categories_table', 1),
(6, '2019_10_09_093224_create_brands_table', 1),
(7, '2019_10_09_093247_create_units_table', 1),
(8, '2019_10_09_093315_create_banners_table', 1),
(9, '2019_10_21_091751_create_permission_tables', 1),
(10, '2019_10_21_092821_create_designations_table', 1),
(11, '2019_10_21_092903_create_dealers_table', 1),
(12, '2019_10_21_093213_create_dealer_bonuses_table', 1),
(13, '2019_10_21_093246_create_withdrawals_table', 1),
(14, '2019_10_21_093339_create_topup_balances_table', 1),
(15, '2019_10_21_093410_create_transfer_balances_table', 1),
(16, '2019_10_21_093627_create_cupon_codes_table', 1),
(17, '2019_10_21_093936_create_notices_table', 1),
(18, '2019_10_21_094042_create_stock_managers_table', 1),
(19, '2019_10_21_100146_create_orders_table', 1),
(20, '2019_10_21_112318_create_member_bonuses_table', 1),
(21, '2019_10_21_120801_create_countries_table', 1),
(22, '2019_10_21_120819_create_districts_table', 1),
(23, '2019_10_21_120834_create_divisions_table', 1),
(24, '2019_10_22_071231_create_points_table', 1),
(25, '2019_11_03_170220_create_incentive_settings_table', 2),
(26, '2019_11_05_132343_create_upazilas_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `massage` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_amount` decimal(20,2) DEFAULT NULL,
  `order_discount` decimal(20,2) DEFAULT NULL,
  `order_charge` decimal(20,2) DEFAULT NULL,
  `order_vat` decimal(20,2) DEFAULT NULL,
  `order_net_amount` decimal(20,2) DEFAULT NULL,
  `order_total_point` decimal(20,2) DEFAULT NULL,
  `is_dealer_order` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_order` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_delivery_type` enum('cod','self') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_delivery_from` enum('company','dealer','user','admin') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_delivery_from_user_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_delivery_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_delivery_address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_district` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_postcode` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_delivery_phone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_delivery_mobile` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_delivery_company` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_delivery_status` enum('Pending','Delivered','Cancel') COLLATE utf8mb4_unicode_ci DEFAULT 'Pending',
  `order_status` enum('Pending','Complete','Cancel') COLLATE utf8mb4_unicode_ci DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_amount`, `order_discount`, `order_charge`, `order_vat`, `order_net_amount`, `order_total_point`, `is_dealer_order`, `is_order`, `order_delivery_type`, `order_delivery_from`, `order_delivery_from_user_id`, `order_delivery_name`, `order_delivery_address`, `order_district`, `order_postcode`, `order_delivery_phone`, `order_delivery_mobile`, `order_delivery_company`, `order_delivery_status`, `order_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, '7', '1200.00', NULL, NULL, NULL, '1200.00', '730.00', '1', NULL, 'self', 'admin', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Delivered', 'Complete', '2019-12-05 10:52:00', '2019-12-05 10:52:16', NULL),
(11, '3', '160.00', NULL, NULL, NULL, '160.00', '24.00', NULL, NULL, 'self', 'company', '7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Delivered', 'Complete', '2019-12-05 12:16:56', '2019-12-05 12:27:35', NULL),
(12, '3', '10.00', NULL, NULL, NULL, '10.00', '1.50', NULL, NULL, 'self', 'company', '7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Delivered', 'Complete', '2019-12-05 12:19:01', '2019-12-05 12:27:42', NULL),
(13, '4', '60.00', NULL, NULL, NULL, '60.00', '36.50', NULL, NULL, 'self', 'company', '7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Delivered', 'Complete', '2019-12-05 12:25:37', '2019-12-05 12:27:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_value` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_details` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_default` enum('True','False') COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `user_id`, `title`, `package_value`, `package_details`, `is_default`, `package_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', 'Test Package ', '25', 'Package Details', 'True', 'Active', NULL, NULL, NULL),
(3, '1', 'Package Title', '100', 'fgdf', 'False', 'Inactive', '2019-11-07 03:42:33', '2019-11-07 03:51:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'edit account', 'web', '2019-10-29 02:31:15', '2019-10-29 02:31:15'),
(2, 'delete account', 'web', '2019-10-29 02:31:15', '2019-10-29 02:31:15'),
(3, 'view account', 'web', '2019-10-29 02:31:15', '2019-10-29 02:31:15'),
(4, 'edit product', 'web', '2019-10-29 02:31:15', '2019-10-29 02:31:15'),
(5, 'delete product', 'web', '2019-10-29 02:31:15', '2019-10-29 02:31:15'),
(6, 'view product', 'web', '2019-10-29 02:31:15', '2019-10-29 02:31:15'),
(7, 'edit order', 'web', '2019-10-29 02:31:15', '2019-10-29 02:31:15'),
(8, 'delete order', 'web', '2019-10-29 02:31:15', '2019-10-29 02:31:15'),
(9, 'view order', 'web', '2019-10-29 02:31:15', '2019-10-29 02:31:15'),
(10, 'edit user_manager', 'web', '2019-10-29 02:31:15', '2019-10-29 02:31:15'),
(11, 'delete user_manager', 'web', '2019-10-29 02:31:15', '2019-10-29 02:31:15'),
(12, 'view user_manager', 'web', '2019-10-29 02:31:15', '2019-10-29 02:31:15'),
(13, 'edit withdrawal', 'web', '2019-10-29 02:31:15', '2019-10-29 02:31:15'),
(14, 'delete withdrawal', 'web', '2019-10-29 02:31:15', '2019-10-29 02:31:15'),
(15, 'view withdrawal', 'web', '2019-10-29 02:31:16', '2019-10-29 02:31:16'),
(16, 'edit dealer_management', 'web', '2019-10-29 02:31:16', '2019-10-29 02:31:16'),
(17, 'delete dealer_management', 'web', '2019-10-29 02:31:16', '2019-10-29 02:31:16'),
(18, 'view dealer_management', 'web', '2019-10-29 02:31:16', '2019-10-29 02:31:16');

-- --------------------------------------------------------

--
-- Table structure for table `points`
--

CREATE TABLE `points` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_user_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `point_amount` decimal(20,2) DEFAULT NULL,
  `is_order` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `point_flow` enum('in','out') COLLATE utf8mb4_unicode_ci NOT NULL,
  `point_details` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `point_status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `points`
--

INSERT INTO `points` (`id`, `user_id`, `from_user_id`, `point_amount`, `is_order`, `point_flow`, `point_details`, `point_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', '1', '500.00', NULL, 'in', 'You have received 500 PV for new stock of Samsung V2 and product quantity is 50', 'active', '2019-12-05 10:44:48', '2019-12-05 10:44:48', NULL),
(2, '1', '1', '1750.00', NULL, 'in', 'You have received 1750 PV for new stock of Symphony V47 and product quantity is 50', 'active', '2019-12-05 10:44:54', '2019-12-05 10:44:54', NULL),
(3, '1', '1', '75.00', NULL, 'in', 'You have received 75 PV for new stock of Full Shirt and product quantity is 50', 'active', '2019-12-05 10:45:02', '2019-12-05 10:45:02', NULL),
(4, '1', '1', '200.00', NULL, 'in', 'You have received 200 PV for new stock of Shirt and product quantity is 20', 'active', '2019-12-05 10:45:07', '2019-12-05 10:45:07', NULL),
(5, '1', '1', '5000.00', NULL, 'in', 'You have received 5000 PV for new stock of Tecno Spark 4 air and product quantity is 50', 'active', '2019-12-05 10:45:12', '2019-12-05 10:45:12', NULL),
(8, '7', '7', '730.00', NULL, 'in', 'You have received 730 PV for order 2033899500', 'active', '2019-12-05 10:52:00', '2019-12-05 10:52:00', NULL),
(9, '1', '7', '730.00', NULL, 'out', 'You have transfer 730.00 PV for delivery order 2 to testcompany', 'active', '2019-12-05 10:52:16', '2019-12-05 10:52:16', NULL),
(19, '3', '3', '24.00', '1', 'in', 'You have received 24 PV for order 1318237993', 'active', '2019-12-05 12:16:56', '2019-12-05 12:16:56', NULL),
(20, '3', '3', '1.50', '1', 'in', 'You have received 1.5 PV for order 792742922', 'active', '2019-12-05 12:19:01', '2019-12-05 12:19:01', NULL),
(21, '3', '3', '25.00', NULL, 'out', 'Your account auto upgraded to Premium with 25 PV', 'active', '2019-12-05 12:19:01', '2019-12-05 12:19:01', NULL),
(22, '4', '4', '36.50', '1', 'in', 'You have received 36.5 PV for order 221111663', 'active', '2019-12-05 12:25:37', '2019-12-05 12:25:37', NULL),
(23, '4', '4', '25.00', NULL, 'out', 'Your account auto upgraded to Premium with 25 PV', 'active', '2019-12-05 12:25:37', '2019-12-05 12:25:37', NULL),
(24, '7', '3', '24.00', NULL, 'out', 'You have transfer 24.00 PV for delivery order 11 to rifat', 'active', '2019-12-05 12:27:35', '2019-12-05 12:27:35', NULL),
(25, '7', '3', '1.50', NULL, 'out', 'You have transfer 1.50 PV for delivery order 12 to rifat', 'active', '2019-12-05 12:27:42', '2019-12-05 12:27:42', NULL),
(26, '7', '4', '36.50', NULL, 'out', 'You have transfer 36.50 PV for delivery order 13 to rishad', 'active', '2019-12-05 12:27:50', '2019-12-05 12:27:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `unit_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_des` text COLLATE utf8mb4_unicode_ci,
  `product_base_price` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_discount_price` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_vat` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_point` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_featured` enum('True','False') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_type` enum('Single','Bundle') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `brand_id`, `unit_id`, `user_id`, `product_name`, `product_code`, `product_des`, `product_base_price`, `product_discount_price`, `product_vat`, `product_point`, `product_image`, `product_featured`, `product_type`, `product_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4, 1, 1, 1, 'Shirt', 'PRO147852', 'Product for Testing purpose', '10500', '1200', '10', '10', 'upload/product/Shirt1572413810.jpg', 'True', NULL, 'Active', '2019-10-29 16:17:51', '2019-10-29 22:59:10', NULL),
(2, 1, 1, 1, 1, 'Tecno Spark 4 air', 'PRO147853', 'Techno Spark 4 Air\r\n3GB Ram, 32GB ROM, 15mp CamperaTecno Spark 4 Air Summary\r\nTecno Spark 4 Air smartphone was launched on 29th August 2019. The phone comes with a 6.10-inch touchscreen display and an aspect ratio of 19.5:9.\r\n\r\nTecno Spark 4 Air is powered by a 2GHz quad-core MediaTek Helio A22 processor. It comes with 3GB of RAM.\r\n\r\nThe Tecno Spark 4 Air runs Android 9 Pie and is powered by a 3000mAh battery.\r\n\r\nAs far as the cameras are concerned, the Tecno Spark 4 Air on the rear packs a 13-megapixel primary camera with an f/1.8 aperture and a second 0.3-megapixel camera. It sports a 5-megapixel camera on the front for selfies.\r\n\r\nThe Tecno Spark 4 Air runs HiOS 5.0 based on Android 9 Pie and packs 32GB of inbuilt storage that can be expanded via microSD card (up to 256GB) with a dedicated slot. The Tecno Spark 4 Air is a dual-SIM (GSM and GSM) smartphone that accepts Nano-SIM and Nano-SIM cards.\r\n\r\nConnectivity options on the Tecno Spark 4 Air include Wi-Fi, GPS, 3G, and 4G. Sensors on the phone include accelerometer and fingerprint sensor. The Tecno Spark 4 Air supports face unlock.\r\n\r\nIt was launched in Nebula Black and Royal Purple colours.', '10500', NULL, '100', '100', 'upload/product/Tecno Spark 4 air1572427890.png', 'True', 'Single', 'Active', '2019-10-29 21:31:31', '2019-10-29 21:31:31', NULL),
(3, 1, 1, 1, 2, 'Symphony V47', '2012536985', 'Description', '350', '50', '10', '35', 'upload/product/Symphony V471571664080.png', 'True', 'Single', 'Active', '2019-10-20 19:21:21', '2019-10-20 19:21:21', NULL),
(4, 4, 2, 1, 2, 'Full Shirt', '65465465445', 'sdfd', '150', '10', '5', '1.5', 'upload/product/Full Shirt1571664115.jpeg', 'True', 'Single', 'Active', '2019-10-20 19:21:55', '2019-10-20 19:21:55', NULL),
(5, 1, 6, 1, 2, 'Samsung V2', '1012', 'samsung', '1500', '1000', '0', '10', 'upload/product/Samsung V21571901420.png', 'True', 'Single', 'Active', '2019-10-23 13:17:00', '2019-10-23 13:17:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'accountant', 'web', '2019-10-29 02:31:16', '2019-10-29 02:31:16'),
(2, 'manager', 'web', '2019-10-29 02:31:16', '2019-10-29 02:31:16'),
(3, 'admin', 'web', '2019-10-29 02:31:16', '2019-10-29 02:31:16'),
(4, 'user', 'web', '2019-10-29 02:31:17', '2019-10-29 02:31:17'),
(5, 'free', 'web', '2019-10-29 02:31:17', '2019-10-29 02:31:17'),
(6, 'dealer', 'web', '2019-10-29 02:31:17', '2019-10-29 02:31:17');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 3),
(2, 1),
(2, 3),
(3, 1),
(3, 3),
(4, 2),
(4, 3),
(5, 2),
(5, 3),
(6, 2),
(6, 3),
(7, 3),
(8, 3),
(9, 3),
(10, 3),
(11, 3),
(12, 3),
(13, 3),
(13, 4),
(14, 3),
(14, 4),
(15, 3),
(15, 4),
(16, 3),
(16, 6),
(17, 3),
(17, 6),
(18, 3),
(18, 6);

-- --------------------------------------------------------

--
-- Table structure for table `sms_logs`
--

CREATE TABLE `sms_logs` (
  `id` int(100) NOT NULL,
  `sender` varchar(100) DEFAULT NULL,
  `action` varchar(100) DEFAULT NULL,
  `massage` mediumtext,
  `to` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(100) DEFAULT NULL,
  `status_details` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sms_logs`
--

INSERT INTO `sms_logs` (`id`, `sender`, `action`, `massage`, `to`, `created_at`, `updated_at`, `status`, `status_details`) VALUES
(11, 'nomask', 'cart-order', 'You have received 24 PV for order 184056211', '01911423670', '2019-12-05 12:07:05', '2019-12-05 12:07:05', 'insufficient balance', '{\"code\":402,\"status\":\"insufficient balance\",\"message\":\"Insufficient balance, please recharge.\"}'),
(12, 'nomask', 'upgrade', 'Your account successfully  auto upgrade to Premium with 25 PV', '01911423670', '2019-12-05 12:08:31', '2019-12-05 12:08:31', 'insufficient balance', '{\"code\":402,\"status\":\"insufficient balance\",\"message\":\"Insufficient balance, please recharge.\"}'),
(13, 'nomask', 'cart-order', 'You have received 24 PV for order 1755651828', '01911423670', '2019-12-05 12:08:31', '2019-12-05 12:08:31', 'insufficient balance', '{\"code\":402,\"status\":\"insufficient balance\",\"message\":\"Insufficient balance, please recharge.\"}'),
(14, 'nomask', 'cart-order', 'You have received 24 PV for order 1318237993', '01911423670', '2019-12-05 12:16:57', '2019-12-05 12:16:57', 'success', '{\"code\":200,\"status\":\"success\",\"count\":1}'),
(15, 'nomask', 'upgrade', 'Your account successfully  auto upgrade to Premium with 25 PV', '01911423670', '2019-12-05 12:19:02', '2019-12-05 12:19:02', 'success', '{\"code\":200,\"status\":\"success\",\"count\":1}'),
(16, 'nomask', 'cart-order', 'You have received 1.5 PV for order 792742922', '01911423670', '2019-12-05 12:19:02', '2019-12-05 12:19:02', 'success', '{\"code\":200,\"status\":\"success\",\"count\":1}'),
(17, 'nomask', 'upgrade', 'Your account successfully  auto upgrade to Premium with 25 PV', '4564563', '2019-12-05 12:25:37', '2019-12-05 12:25:37', 'success', '{\"code\":200,\"status\":\"success\",\"count\":0}'),
(18, 'nomask', 'cart-order', 'You have received 36.5 PV for order 221111663', '4564563', '2019-12-05 12:25:37', '2019-12-05 12:25:37', 'success', '{\"code\":200,\"status\":\"success\",\"count\":0}');

-- --------------------------------------------------------

--
-- Table structure for table `stock_managers`
--

CREATE TABLE `stock_managers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_user_id` bigint(20) DEFAULT NULL,
  `product_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_qty` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock_flow` enum('in','out') COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock_status` enum('Ordered','Delivered','Hold','Cancel','Pending') COLLATE utf8mb4_unicode_ci DEFAULT 'Ordered',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stock_managers`
--

INSERT INTO `stock_managers` (`id`, `user_id`, `delivery_user_id`, `product_id`, `order_id`, `product_qty`, `stock_flow`, `stock_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', NULL, '5', NULL, '50', 'in', 'Delivered', '2019-12-05 10:44:48', '2019-12-05 10:44:48', NULL),
(2, '1', NULL, '3', NULL, '50', 'in', 'Delivered', '2019-12-05 10:44:54', '2019-12-05 10:44:54', NULL),
(3, '1', NULL, '4', NULL, '50', 'in', 'Delivered', '2019-12-05 10:45:02', '2019-12-05 10:45:02', NULL),
(4, '1', NULL, '1', NULL, '20', 'in', 'Delivered', '2019-12-05 10:45:07', '2019-12-05 10:45:07', NULL),
(5, '1', NULL, '2', NULL, '50', 'in', 'Delivered', '2019-12-05 10:45:12', '2019-12-05 10:45:12', NULL),
(7, '7', 1, '4', '2', '20', 'in', 'Delivered', '2019-12-05 10:52:00', '2019-12-05 10:52:16', NULL),
(8, '7', 1, '3', '2', '20', 'in', 'Delivered', '2019-12-05 10:52:00', '2019-12-05 10:52:16', NULL),
(16, '3', 7, '4', '11', '16', 'out', 'Delivered', '2019-12-05 12:16:56', '2019-12-05 12:27:35', NULL),
(17, '3', 7, '4', '12', '1', 'out', 'Delivered', '2019-12-05 12:19:01', '2019-12-05 12:27:42', NULL),
(18, '4', 7, '4', '13', '1', 'out', 'Delivered', '2019-12-05 12:25:37', '2019-12-05 12:27:50', NULL),
(19, '4', 7, '3', '13', '1', 'out', 'Delivered', '2019-12-05 12:25:37', '2019-12-05 12:27:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `topup_balances`
--

CREATE TABLE `topup_balances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_user_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `topup_amount` decimal(20,2) DEFAULT NULL,
  `topup_type` enum('withdrawal','user','admin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `topup_flow` enum('in','out') COLLATE utf8mb4_unicode_ci NOT NULL,
  `topup_generate_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `topup_details` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `topup_status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topup_balances`
--

INSERT INTO `topup_balances` (`id`, `user_id`, `from_user_id`, `topup_amount`, `topup_type`, `topup_flow`, `topup_generate_by`, `topup_details`, `topup_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', '1', '5000.00', 'admin', 'in', '1', 'You Received 5000 Tk TopUp Balance From System Administrator', 'active', '2019-11-07 10:52:53', '2019-11-07 10:52:53', NULL),
(35, '1', '4', '2000.00', 'user', 'out', '1', 'You have transfer 2000 Tk TopUp balance to rishad .', 'active', '2019-12-05 10:47:05', '2019-12-05 10:47:05', NULL),
(36, '4', '1', '2000.00', 'user', 'in', '1', 'You have received 2000 Tk TopUp balance From admin .', 'active', '2019-12-05 10:47:05', '2019-12-05 10:47:05', NULL),
(37, '4', '4', '150.00', 'user', 'out', '4', 'You have purchase 458047115 this order with 150 Tk TopUp balance.', 'active', '2019-12-05 10:47:19', '2019-12-05 10:47:19', NULL),
(38, '1', '3', '2000.00', 'user', 'out', '1', 'You have transfer 2000 Tk TopUp balance to rifat .', 'active', '2019-12-05 10:48:50', '2019-12-05 10:48:50', NULL),
(39, '3', '1', '2000.00', 'user', 'in', '1', 'You have received 2000 Tk TopUp balance From admin .', 'active', '2019-12-05 10:48:50', '2019-12-05 10:48:50', NULL),
(40, '1', '1', '10000.00', 'admin', 'in', '1', 'You Received 10000 Tk TopUp Balance From System Administrator', 'active', '2019-12-05 10:50:12', '2019-12-05 10:50:12', NULL),
(41, '1', '7', '5000.00', 'user', 'out', '1', 'You have transfer 5000 Tk TopUp balance to testcompany .', 'active', '2019-12-05 10:50:28', '2019-12-05 10:50:28', NULL),
(42, '7', '1', '5000.00', 'user', 'in', '1', 'You have received 5000 Tk TopUp balance From admin .', 'active', '2019-12-05 10:50:28', '2019-12-05 10:50:28', NULL),
(43, '7', '7', '1200.00', 'user', 'out', '7', 'You have purchase 2033899500 this order with 1200 Tk TopUp balance.', 'active', '2019-12-05 10:52:00', '2019-12-05 10:52:00', NULL),
(48, '3', '3', '160.00', 'user', 'out', '3', 'You have purchase 1318237993 this order with 160 Tk TopUp balance.', 'active', '2019-12-05 12:16:56', '2019-12-05 12:16:56', NULL),
(49, '3', '3', '10.00', 'user', 'out', '3', 'You have purchase 792742922 this order with 10 Tk TopUp balance.', 'active', '2019-12-05 12:19:01', '2019-12-05 12:19:01', NULL),
(50, '3', '4', '1000.00', 'user', 'out', '3', 'You have transfer 1000 Tk TopUp balance to rishad .', 'active', '2019-12-05 12:20:43', '2019-12-05 12:20:43', NULL),
(51, '4', '3', '1000.00', 'user', 'in', '3', 'You have received 1000 Tk TopUp balance From rifat .', 'active', '2019-12-05 12:20:43', '2019-12-05 12:20:43', NULL),
(52, '4', '4', '60.00', 'user', 'out', '4', 'You have purchase 221111663 this order with 60 Tk TopUp balance.', 'active', '2019-12-05 12:25:37', '2019-12-05 12:25:37', NULL),
(53, '1', '3', '100.00', 'user', 'out', '1', 'You have transfer 100 Tk TopUp balance to rifat .', 'active', '2019-12-11 10:08:13', '2019-12-11 10:08:13', NULL),
(54, '3', '1', '100.00', 'user', 'in', '1', 'You have received 100 Tk TopUp balance From admin .', 'active', '2019-12-11 10:08:13', '2019-12-11 10:08:13', NULL),
(55, '1', '8', '2000.00', 'user', 'out', '1', 'You have transfer 2000 Tk TopUp balance to testdistrict .', 'active', '2019-12-11 10:53:38', '2019-12-11 10:53:38', NULL),
(56, '8', '1', '2000.00', 'user', 'in', '1', 'You have received 2000 Tk TopUp balance From admin .', 'active', '2019-12-11 10:53:38', '2019-12-11 10:53:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `unit_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_sort` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `user_id`, `unit_name`, `unit_sort`, `unit_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'PC', '1', 'Active', '2019-10-29 16:02:16', '2019-10-29 16:02:16', NULL),
(2, 1, 'KG', '1', 'Active', '2019-10-29 16:03:19', '2019-10-29 16:06:15', '2019-10-29 16:06:15'),
(3, 1, 'KG', '2', 'Active', '2019-10-29 16:06:32', '2019-10-29 16:06:58', '2019-10-29 16:06:58');

-- --------------------------------------------------------

--
-- Table structure for table `upazilas`
--

CREATE TABLE `upazilas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bn_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `upazilas`
--

INSERT INTO `upazilas` (`id`, `district_id`, `name`, `bn_name`, `sort`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 34, 'Amtali Upazila', 'আমতলী', NULL, NULL, NULL, NULL),
(2, 34, 'Bamna Upazila', 'বামনা', NULL, NULL, NULL, NULL),
(3, 34, 'Barguna Sadar Upazila', 'বরগুনা সদর', NULL, NULL, NULL, NULL),
(4, 34, 'Betagi Upazila', 'বেতাগি', NULL, NULL, NULL, NULL),
(5, 34, 'Patharghata Upazila', 'পাথরঘাটা', NULL, NULL, NULL, NULL),
(6, 34, 'Taltali Upazila', 'তালতলী', NULL, NULL, NULL, NULL),
(7, 35, 'Muladi Upazila', 'মুলাদি', NULL, NULL, NULL, NULL),
(8, 35, 'Babuganj Upazila', 'বাবুগঞ্জ', NULL, NULL, NULL, NULL),
(9, 35, 'Agailjhara Upazila', 'আগাইলঝরা', NULL, NULL, NULL, NULL),
(10, 35, 'Barisal Sadar Upazila', 'বরিশাল সদর', NULL, NULL, NULL, NULL),
(11, 35, 'Bakerganj Upazila', 'বাকেরগঞ্জ', NULL, NULL, NULL, NULL),
(12, 35, 'Banaripara Upazila', 'বানাড়িপারা', NULL, NULL, NULL, NULL),
(13, 35, 'Gaurnadi Upazila', 'গৌরনদী', NULL, NULL, NULL, NULL),
(14, 35, 'Hizla Upazila', 'হিজলা', NULL, NULL, NULL, NULL),
(15, 35, 'Mehendiganj Upazila', 'মেহেদিগঞ্জ ', NULL, NULL, NULL, NULL),
(16, 35, 'Wazirpur Upazila', 'ওয়াজিরপুর', NULL, NULL, NULL, NULL),
(17, 36, 'Bhola Sadar Upazila', 'ভোলা সদর', NULL, NULL, NULL, NULL),
(18, 36, 'Burhanuddin Upazila', 'বুরহানউদ্দিন', NULL, NULL, NULL, NULL),
(19, 36, 'Char Fasson Upazila', 'চর ফ্যাশন', NULL, NULL, NULL, NULL),
(20, 36, 'Daulatkhan Upazila', 'দৌলতখান', NULL, NULL, NULL, NULL),
(21, 36, 'Lalmohan Upazila', 'লালমোহন', NULL, NULL, NULL, NULL),
(22, 36, 'Manpura Upazila', 'মনপুরা', NULL, NULL, NULL, NULL),
(23, 36, 'Tazumuddin Upazila', 'তাজুমুদ্দিন', NULL, NULL, NULL, NULL),
(24, 37, 'Jhalokati Sadar Upazila', 'ঝালকাঠি সদর', NULL, NULL, NULL, NULL),
(25, 37, 'Kathalia Upazila', 'কাঁঠালিয়া', NULL, NULL, NULL, NULL),
(26, 37, 'Nalchity Upazila', 'নালচিতি', NULL, NULL, NULL, NULL),
(27, 37, 'Rajapur Upazila', 'রাজাপুর', NULL, NULL, NULL, NULL),
(28, 38, 'Bauphal Upazila', 'বাউফল', NULL, NULL, NULL, NULL),
(29, 38, 'Dashmina Upazila', 'দশমিনা', NULL, NULL, NULL, NULL),
(30, 38, 'Galachipa Upazila', 'গলাচিপা', NULL, NULL, NULL, NULL),
(31, 38, 'Kalapara Upazila', 'কালাপারা', NULL, NULL, NULL, NULL),
(32, 38, 'Mirzaganj Upazila', 'মির্জাগঞ্জ ', NULL, NULL, NULL, NULL),
(33, 38, 'Patuakhali Sadar Upazila', 'পটুয়াখালী সদর', NULL, NULL, NULL, NULL),
(34, 38, 'Dumki Upazila', 'ডুমকি', NULL, NULL, NULL, NULL),
(35, 38, 'Rangabali Upazila', 'রাঙ্গাবালি', NULL, NULL, NULL, NULL),
(36, 39, 'Bhandaria', 'ভ্যান্ডারিয়া', NULL, NULL, NULL, NULL),
(37, 39, 'Kaukhali', 'কাউখালি', NULL, NULL, NULL, NULL),
(38, 39, 'Mathbaria', 'মাঠবাড়িয়া', NULL, NULL, NULL, NULL),
(39, 39, 'Nazirpur', 'নাজিরপুর', NULL, NULL, NULL, NULL),
(40, 39, 'Nesarabad', 'নেসারাবাদ', NULL, NULL, NULL, NULL),
(41, 39, 'Pirojpur Sadar', 'পিরোজপুর সদর', NULL, NULL, NULL, NULL),
(42, 39, 'Zianagar', 'জিয়ানগর', NULL, NULL, NULL, NULL),
(43, 40, 'Bandarban Sadar', 'বান্দরবন সদর', NULL, NULL, NULL, NULL),
(44, 40, 'Thanchi', 'থানচি', NULL, NULL, NULL, NULL),
(45, 40, 'Lama', 'লামা', NULL, NULL, NULL, NULL),
(46, 40, 'Naikhongchhari', 'নাইখংছড়ি ', NULL, NULL, NULL, NULL),
(47, 40, 'Ali kadam', 'আলী কদম', NULL, NULL, NULL, NULL),
(48, 40, 'Rowangchhari', 'রউয়াংছড়ি ', NULL, NULL, NULL, NULL),
(49, 40, 'Ruma', 'রুমা', NULL, NULL, NULL, NULL),
(50, 41, 'Brahmanbaria Sadar Upazila', 'ব্রাহ্মণবাড়িয়া সদর', NULL, NULL, NULL, NULL),
(51, 41, 'Ashuganj Upazila', 'আশুগঞ্জ', NULL, NULL, NULL, NULL),
(52, 41, 'Nasirnagar Upazila', 'নাসির নগর', NULL, NULL, NULL, NULL),
(53, 41, 'Nabinagar Upazila', 'নবীনগর', NULL, NULL, NULL, NULL),
(54, 41, 'Sarail Upazila', 'সরাইল', NULL, NULL, NULL, NULL),
(55, 41, 'Shahbazpur Town', 'শাহবাজপুর টাউন', NULL, NULL, NULL, NULL),
(56, 41, 'Kasba Upazila', 'কসবা', NULL, NULL, NULL, NULL),
(57, 41, 'Akhaura Upazila', 'আখাউরা', NULL, NULL, NULL, NULL),
(58, 41, 'Bancharampur Upazila', 'বাঞ্ছারামপুর', NULL, NULL, NULL, NULL),
(59, 41, 'Bijoynagar Upazila', 'বিজয় নগর', NULL, NULL, NULL, NULL),
(60, 42, 'Chandpur Sadar', 'চাঁদপুর সদর', NULL, NULL, NULL, NULL),
(61, 42, 'Faridganj', 'ফরিদগঞ্জ', NULL, NULL, NULL, NULL),
(62, 42, 'Haimchar', 'হাইমচর', NULL, NULL, NULL, NULL),
(63, 42, 'Haziganj', 'হাজীগঞ্জ', NULL, NULL, NULL, NULL),
(64, 42, 'Kachua', 'কচুয়া', NULL, NULL, NULL, NULL),
(65, 42, 'Matlab Uttar', 'মতলব উত্তর', NULL, NULL, NULL, NULL),
(66, 42, 'Matlab Dakkhin', 'মতলব দক্ষিণ', NULL, NULL, NULL, NULL),
(67, 42, 'Shahrasti', 'শাহরাস্তি', NULL, NULL, NULL, NULL),
(68, 43, 'Anwara Upazila', 'আনোয়ারা', NULL, NULL, NULL, NULL),
(69, 43, 'Banshkhali Upazila', 'বাশখালি', NULL, NULL, NULL, NULL),
(70, 43, 'Boalkhali Upazila', 'বোয়ালখালি', NULL, NULL, NULL, NULL),
(71, 43, 'Chandanaish Upazila', 'চন্দনাইশ', NULL, NULL, NULL, NULL),
(72, 43, 'Fatikchhari Upazila', 'ফটিকছড়ি', NULL, NULL, NULL, NULL),
(73, 43, 'Hathazari Upazila', 'হাঠহাজারী', NULL, NULL, NULL, NULL),
(74, 43, 'Lohagara Upazila', 'লোহাগারা', NULL, NULL, NULL, NULL),
(75, 43, 'Mirsharai Upazila', 'মিরসরাই', NULL, NULL, NULL, NULL),
(76, 43, 'Patiya Upazila', 'পটিয়া', NULL, NULL, NULL, NULL),
(77, 43, 'Rangunia Upazila', 'রাঙ্গুনিয়া', NULL, NULL, NULL, NULL),
(78, 43, 'Raozan Upazila', 'রাউজান', NULL, NULL, NULL, NULL),
(79, 43, 'Sandwip Upazila', 'সন্দ্বীপ', NULL, NULL, NULL, NULL),
(80, 43, 'Satkania Upazila', 'সাতকানিয়া', NULL, NULL, NULL, NULL),
(81, 43, 'Sitakunda Upazila', 'সীতাকুণ্ড', NULL, NULL, NULL, NULL),
(82, 44, 'Barura Upazila', 'বড়ুরা', NULL, NULL, NULL, NULL),
(83, 44, 'Brahmanpara Upazila', 'ব্রাহ্মণপাড়া', NULL, NULL, NULL, NULL),
(84, 44, 'Burichong Upazila', 'বুড়িচং', NULL, NULL, NULL, NULL),
(85, 44, 'Chandina Upazila', 'চান্দিনা', NULL, NULL, NULL, NULL),
(86, 44, 'Chauddagram Upazila', 'চৌদ্দগ্রাম', NULL, NULL, NULL, NULL),
(87, 44, 'Daudkandi Upazila', 'দাউদকান্দি', NULL, NULL, NULL, NULL),
(88, 44, 'Debidwar Upazila', 'দেবীদ্বার', NULL, NULL, NULL, NULL),
(89, 44, 'Homna Upazila', 'হোমনা', NULL, NULL, NULL, NULL),
(90, 44, 'Comilla Sadar Upazila', 'কুমিল্লা সদর', NULL, NULL, NULL, NULL),
(91, 44, 'Laksam Upazila', 'লাকসাম', NULL, NULL, NULL, NULL),
(92, 44, 'Monohorgonj Upazila', 'মনোহরগঞ্জ', NULL, NULL, NULL, NULL),
(93, 44, 'Meghna Upazila', 'মেঘনা', NULL, NULL, NULL, NULL),
(94, 44, 'Muradnagar Upazila', 'মুরাদনগর', NULL, NULL, NULL, NULL),
(95, 44, 'Nangalkot Upazila', 'নাঙ্গালকোট', NULL, NULL, NULL, NULL),
(96, 44, 'Comilla Sadar South Upazila', 'কুমিল্লা সদর দক্ষিণ', NULL, NULL, NULL, NULL),
(97, 44, 'Titas Upazila', 'তিতাস', NULL, NULL, NULL, NULL),
(98, 45, 'Chakaria Upazila', 'চকরিয়া', NULL, NULL, NULL, NULL),
(100, 45, 'Cox\'s Bazar Sadar Upazila', 'কক্স বাজার সদর', NULL, NULL, NULL, NULL),
(101, 45, 'Kutubdia Upazila', 'কুতুবদিয়া', NULL, NULL, NULL, NULL),
(102, 45, 'Maheshkhali Upazila', 'মহেশখালী', NULL, NULL, NULL, NULL),
(103, 45, 'Ramu Upazila', 'রামু', NULL, NULL, NULL, NULL),
(104, 45, 'Teknaf Upazila', 'টেকনাফ', NULL, NULL, NULL, NULL),
(105, 45, 'Ukhia Upazila', 'উখিয়া', NULL, NULL, NULL, NULL),
(106, 45, 'Pekua Upazila', 'পেকুয়া', NULL, NULL, NULL, NULL),
(107, 46, 'Feni Sadar', 'ফেনী সদর', NULL, NULL, NULL, NULL),
(108, 46, 'Chagalnaiya', 'ছাগল নাইয়া', NULL, NULL, NULL, NULL),
(109, 46, 'Daganbhyan', 'দাগানভিয়া', NULL, NULL, NULL, NULL),
(110, 46, 'Parshuram', 'পরশুরাম', NULL, NULL, NULL, NULL),
(111, 46, 'Fhulgazi', 'ফুলগাজি', NULL, NULL, NULL, NULL),
(112, 46, 'Sonagazi', 'সোনাগাজি', NULL, NULL, NULL, NULL),
(113, 47, 'Dighinala Upazila', 'দিঘিনালা ', NULL, NULL, NULL, NULL),
(114, 47, 'Khagrachhari Upazila', 'খাগড়াছড়ি', NULL, NULL, NULL, NULL),
(115, 47, 'Lakshmichhari Upazila', 'লক্ষ্মীছড়ি', NULL, NULL, NULL, NULL),
(116, 47, 'Mahalchhari Upazila', 'মহলছড়ি', NULL, NULL, NULL, NULL),
(117, 47, 'Manikchhari Upazila', 'মানিকছড়ি', NULL, NULL, NULL, NULL),
(118, 47, 'Matiranga Upazila', 'মাটিরাঙ্গা', NULL, NULL, NULL, NULL),
(119, 47, 'Panchhari Upazila', 'পানছড়ি', NULL, NULL, NULL, NULL),
(120, 47, 'Ramgarh Upazila', 'রামগড়', NULL, NULL, NULL, NULL),
(121, 48, 'Lakshmipur Sadar Upazila', 'লক্ষ্মীপুর সদর', NULL, NULL, NULL, NULL),
(122, 48, 'Raipur Upazila', 'রায়পুর', NULL, NULL, NULL, NULL),
(123, 48, 'Ramganj Upazila', 'রামগঞ্জ', NULL, NULL, NULL, NULL),
(124, 48, 'Ramgati Upazila', 'রামগতি', NULL, NULL, NULL, NULL),
(125, 48, 'Komol Nagar Upazila', 'কমল নগর', NULL, NULL, NULL, NULL),
(126, 49, 'Noakhali Sadar Upazila', 'নোয়াখালী সদর', NULL, NULL, NULL, NULL),
(127, 49, 'Begumganj Upazila', 'বেগমগঞ্জ', NULL, NULL, NULL, NULL),
(128, 49, 'Chatkhil Upazila', 'চাটখিল', NULL, NULL, NULL, NULL),
(129, 49, 'Companyganj Upazila', 'কোম্পানীগঞ্জ', NULL, NULL, NULL, NULL),
(130, 49, 'Shenbag Upazila', 'শেনবাগ', NULL, NULL, NULL, NULL),
(131, 49, 'Hatia Upazila', 'হাতিয়া', NULL, NULL, NULL, NULL),
(132, 49, 'Kobirhat Upazila', 'কবিরহাট ', NULL, NULL, NULL, NULL),
(133, 49, 'Sonaimuri Upazila', 'সোনাইমুরি', NULL, NULL, NULL, NULL),
(134, 49, 'Suborno Char Upazila', 'সুবর্ণ চর ', NULL, NULL, NULL, NULL),
(135, 50, 'Rangamati Sadar Upazila', 'রাঙ্গামাটি সদর', NULL, NULL, NULL, NULL),
(136, 50, 'Belaichhari Upazila', 'বেলাইছড়ি', NULL, NULL, NULL, NULL),
(137, 50, 'Bagaichhari Upazila', 'বাঘাইছড়ি', NULL, NULL, NULL, NULL),
(138, 50, 'Barkal Upazila', 'বরকল', NULL, NULL, NULL, NULL),
(139, 50, 'Juraichhari Upazila', 'জুরাইছড়ি', NULL, NULL, NULL, NULL),
(140, 50, 'Rajasthali Upazila', 'রাজাস্থলি', NULL, NULL, NULL, NULL),
(141, 50, 'Kaptai Upazila', 'কাপ্তাই', NULL, NULL, NULL, NULL),
(142, 50, 'Langadu Upazila', 'লাঙ্গাডু', NULL, NULL, NULL, NULL),
(143, 50, 'Nannerchar Upazila', 'নান্নেরচর ', NULL, NULL, NULL, NULL),
(144, 50, 'Kaukhali Upazila', 'কাউখালি', NULL, NULL, NULL, NULL),
(145, 1, 'Dhamrai Upazila', 'ধামরাই', NULL, NULL, NULL, NULL),
(146, 1, 'Dohar Upazila', 'দোহার', NULL, NULL, NULL, NULL),
(147, 1, 'Keraniganj Upazila', 'কেরানীগঞ্জ', NULL, NULL, NULL, NULL),
(148, 1, 'Nawabganj Upazila', 'নবাবগঞ্জ', NULL, NULL, NULL, NULL),
(149, 1, 'Savar Upazila', 'সাভার', NULL, NULL, NULL, NULL),
(150, 2, 'Faridpur Sadar Upazila', 'ফরিদপুর সদর', NULL, NULL, NULL, NULL),
(151, 2, 'Boalmari Upazila', 'বোয়ালমারী', NULL, NULL, NULL, NULL),
(152, 2, 'Alfadanga Upazila', 'আলফাডাঙ্গা', NULL, NULL, NULL, NULL),
(153, 2, 'Madhukhali Upazila', 'মধুখালি', NULL, NULL, NULL, NULL),
(154, 2, 'Bhanga Upazila', 'ভাঙ্গা', NULL, NULL, NULL, NULL),
(155, 2, 'Nagarkanda Upazila', 'নগরকান্ড', NULL, NULL, NULL, NULL),
(156, 2, 'Charbhadrasan Upazila', 'চরভদ্রাসন ', NULL, NULL, NULL, NULL),
(157, 2, 'Sadarpur Upazila', 'সদরপুর', NULL, NULL, NULL, NULL),
(158, 2, 'Shaltha Upazila', 'শালথা', NULL, NULL, NULL, NULL),
(159, 3, 'Gazipur Sadar-Joydebpur', 'গাজীপুর সদর', NULL, NULL, NULL, NULL),
(160, 3, 'Kaliakior', 'কালিয়াকৈর', NULL, NULL, NULL, NULL),
(161, 3, 'Kapasia', 'কাপাসিয়া', NULL, NULL, NULL, NULL),
(162, 3, 'Sripur', 'শ্রীপুর', NULL, NULL, NULL, NULL),
(163, 3, 'Kaliganj', 'কালীগঞ্জ', NULL, NULL, NULL, NULL),
(164, 3, 'Tongi', 'টঙ্গি', NULL, NULL, NULL, NULL),
(165, 4, 'Gopalganj Sadar Upazila', 'গোপালগঞ্জ সদর', NULL, NULL, NULL, NULL),
(166, 4, 'Kashiani Upazila', 'কাশিয়ানি', NULL, NULL, NULL, NULL),
(167, 4, 'Kotalipara Upazila', 'কোটালিপাড়া', NULL, NULL, NULL, NULL),
(168, 4, 'Muksudpur Upazila', 'মুকসুদপুর', NULL, NULL, NULL, NULL),
(169, 4, 'Tungipara Upazila', 'টুঙ্গিপাড়া', NULL, NULL, NULL, NULL),
(170, 5, 'Dewanganj Upazila', 'দেওয়ানগঞ্জ', NULL, NULL, NULL, NULL),
(171, 5, 'Baksiganj Upazila', 'বকসিগঞ্জ', NULL, NULL, NULL, NULL),
(172, 5, 'Islampur Upazila', 'ইসলামপুর', NULL, NULL, NULL, NULL),
(173, 5, 'Jamalpur Sadar Upazila', 'জামালপুর সদর', NULL, NULL, NULL, NULL),
(174, 5, 'Madarganj Upazila', 'মাদারগঞ্জ', NULL, NULL, NULL, NULL),
(175, 5, 'Melandaha Upazila', 'মেলানদাহা', NULL, NULL, NULL, NULL),
(176, 5, 'Sarishabari Upazila', 'সরিষাবাড়ি ', NULL, NULL, NULL, NULL),
(177, 5, 'Narundi Police I.C', 'নারুন্দি', NULL, NULL, NULL, NULL),
(178, 6, 'Astagram Upazila', 'অষ্টগ্রাম', NULL, NULL, NULL, NULL),
(179, 6, 'Bajitpur Upazila', 'বাজিতপুর', NULL, NULL, NULL, NULL),
(180, 6, 'Bhairab Upazila', 'ভৈরব', NULL, NULL, NULL, NULL),
(181, 6, 'Hossainpur Upazila', 'হোসেনপুর ', NULL, NULL, NULL, NULL),
(182, 6, 'Itna Upazila', 'ইটনা', NULL, NULL, NULL, NULL),
(183, 6, 'Karimganj Upazila', 'করিমগঞ্জ', NULL, NULL, NULL, NULL),
(184, 6, 'Katiadi Upazila', 'কতিয়াদি', NULL, NULL, NULL, NULL),
(185, 6, 'Kishoreganj Sadar Upazila', 'কিশোরগঞ্জ সদর', NULL, NULL, NULL, NULL),
(186, 6, 'Kuliarchar Upazila', 'কুলিয়ারচর', NULL, NULL, NULL, NULL),
(187, 6, 'Mithamain Upazila', 'মিঠামাইন', NULL, NULL, NULL, NULL),
(188, 6, 'Nikli Upazila', 'নিকলি', NULL, NULL, NULL, NULL),
(189, 6, 'Pakundia Upazila', 'পাকুন্ডা', NULL, NULL, NULL, NULL),
(190, 6, 'Tarail Upazila', 'তাড়াইল', NULL, NULL, NULL, NULL),
(191, 7, 'Madaripur Sadar', 'মাদারীপুর সদর', NULL, NULL, NULL, NULL),
(192, 7, 'Kalkini', 'কালকিনি', NULL, NULL, NULL, NULL),
(193, 7, 'Rajoir', 'রাজইর', NULL, NULL, NULL, NULL),
(194, 7, 'Shibchar', 'শিবচর', NULL, NULL, NULL, NULL),
(195, 8, 'Manikganj Sadar Upazila', 'মানিকগঞ্জ সদর', NULL, NULL, NULL, NULL),
(196, 8, 'Singair Upazila', 'সিঙ্গাইর', NULL, NULL, NULL, NULL),
(197, 8, 'Shibalaya Upazila', 'শিবালয়', NULL, NULL, NULL, NULL),
(198, 8, 'Saturia Upazila', 'সাঠুরিয়া', NULL, NULL, NULL, NULL),
(199, 8, 'Harirampur Upazila', 'হরিরামপুর', NULL, NULL, NULL, NULL),
(200, 8, 'Ghior Upazila', 'ঘিওর', NULL, NULL, NULL, NULL),
(201, 8, 'Daulatpur Upazila', 'দৌলতপুর', NULL, NULL, NULL, NULL),
(202, 9, 'Lohajang Upazila', 'লোহাজং', NULL, NULL, NULL, NULL),
(203, 9, 'Sreenagar Upazila', 'শ্রীনগর', NULL, NULL, NULL, NULL),
(204, 9, 'Munshiganj Sadar Upazila', 'মুন্সিগঞ্জ সদর', NULL, NULL, NULL, NULL),
(205, 9, 'Sirajdikhan Upazila', 'সিরাজদিখান', NULL, NULL, NULL, NULL),
(206, 9, 'Tongibari Upazila', 'টঙ্গিবাড়ি', NULL, NULL, NULL, NULL),
(207, 9, 'Gazaria Upazila', 'গজারিয়া', NULL, NULL, NULL, NULL),
(208, 10, 'Bhaluka', 'ভালুকা', NULL, NULL, NULL, NULL),
(209, 10, 'Trishal', 'ত্রিশাল', NULL, NULL, NULL, NULL),
(210, 10, 'Haluaghat', 'হালুয়াঘাট', NULL, NULL, NULL, NULL),
(211, 10, 'Muktagachha', 'মুক্তাগাছা', NULL, NULL, NULL, NULL),
(212, 10, 'Dhobaura', 'ধবারুয়া', NULL, NULL, NULL, NULL),
(213, 10, 'Fulbaria', 'ফুলবাড়িয়া', NULL, NULL, NULL, NULL),
(214, 10, 'Gaffargaon', 'গফরগাঁও', NULL, NULL, NULL, NULL),
(215, 10, 'Gauripur', 'গৌরিপুর', NULL, NULL, NULL, NULL),
(216, 10, 'Ishwarganj', 'ঈশ্বরগঞ্জ', NULL, NULL, NULL, NULL),
(217, 10, 'Mymensingh Sadar', 'ময়মনসিং সদর', NULL, NULL, NULL, NULL),
(218, 10, 'Nandail', 'নন্দাইল', NULL, NULL, NULL, NULL),
(219, 10, 'Phulpur', 'ফুলপুর', NULL, NULL, NULL, NULL),
(220, 11, 'Araihazar Upazila', 'আড়াইহাজার', NULL, NULL, NULL, NULL),
(221, 11, 'Sonargaon Upazila', 'সোনারগাঁও', NULL, NULL, NULL, NULL),
(222, 11, 'Bandar', 'বান্দার', NULL, NULL, NULL, NULL),
(223, 11, 'Naryanganj Sadar Upazila', 'নারায়ানগঞ্জ সদর', NULL, NULL, NULL, NULL),
(224, 11, 'Rupganj Upazila', 'রূপগঞ্জ', NULL, NULL, NULL, NULL),
(225, 11, 'Siddirgonj Upazila', 'সিদ্ধিরগঞ্জ', NULL, NULL, NULL, NULL),
(226, 12, 'Belabo Upazila', 'বেলাবো', NULL, NULL, NULL, NULL),
(227, 12, 'Monohardi Upazila', 'মনোহরদি', NULL, NULL, NULL, NULL),
(228, 12, 'Narsingdi Sadar Upazila', 'নরসিংদী সদর', NULL, NULL, NULL, NULL),
(229, 12, 'Palash Upazila', 'পলাশ', NULL, NULL, NULL, NULL),
(230, 12, 'Raipura Upazila, Narsingdi', 'রায়পুর', NULL, NULL, NULL, NULL),
(231, 12, 'Shibpur Upazila', 'শিবপুর', NULL, NULL, NULL, NULL),
(232, 13, 'Kendua Upazilla', 'কেন্দুয়া', NULL, NULL, NULL, NULL),
(233, 13, 'Atpara Upazilla', 'আটপাড়া', NULL, NULL, NULL, NULL),
(234, 13, 'Barhatta Upazilla', 'বরহাট্টা', NULL, NULL, NULL, NULL),
(235, 13, 'Durgapur Upazilla', 'দুর্গাপুর', NULL, NULL, NULL, NULL),
(236, 13, 'Kalmakanda Upazilla', 'কলমাকান্দা', NULL, NULL, NULL, NULL),
(237, 13, 'Madan Upazilla', 'মদন', NULL, NULL, NULL, NULL),
(238, 13, 'Mohanganj Upazilla', 'মোহনগঞ্জ', NULL, NULL, NULL, NULL),
(239, 13, 'Netrakona-S Upazilla', 'নেত্রকোনা সদর', NULL, NULL, NULL, NULL),
(240, 13, 'Purbadhala Upazilla', 'পূর্বধলা', NULL, NULL, NULL, NULL),
(241, 13, 'Khaliajuri Upazilla', 'খালিয়াজুরি', NULL, NULL, NULL, NULL),
(242, 14, 'Baliakandi Upazila', 'বালিয়াকান্দি', NULL, NULL, NULL, NULL),
(243, 14, 'Goalandaghat Upazila', 'গোয়ালন্দ ঘাট', NULL, NULL, NULL, NULL),
(244, 14, 'Pangsha Upazila', 'পাংশা', NULL, NULL, NULL, NULL),
(245, 14, 'Kalukhali Upazila', 'কালুখালি', NULL, NULL, NULL, NULL),
(246, 14, 'Rajbari Sadar Upazila', 'রাজবাড়ি সদর', NULL, NULL, NULL, NULL),
(247, 15, 'Shariatpur Sadar -Palong', 'শরীয়তপুর সদর ', NULL, NULL, NULL, NULL),
(248, 15, 'Damudya Upazila', 'দামুদিয়া', NULL, NULL, NULL, NULL),
(249, 15, 'Naria Upazila', 'নড়িয়া', NULL, NULL, NULL, NULL),
(250, 15, 'Jajira Upazila', 'জাজিরা', NULL, NULL, NULL, NULL),
(251, 15, 'Bhedarganj Upazila', 'ভেদারগঞ্জ', NULL, NULL, NULL, NULL),
(252, 15, 'Gosairhat Upazila', 'গোসাইর হাট ', NULL, NULL, NULL, NULL),
(253, 16, 'Jhenaigati Upazila', 'ঝিনাইগাতি', NULL, NULL, NULL, NULL),
(254, 16, 'Nakla Upazila', 'নাকলা', NULL, NULL, NULL, NULL),
(255, 16, 'Nalitabari Upazila', 'নালিতাবাড়ি', NULL, NULL, NULL, NULL),
(256, 16, 'Sherpur Sadar Upazila', 'শেরপুর সদর', NULL, NULL, NULL, NULL),
(257, 16, 'Sreebardi Upazila', 'শ্রীবরদি', NULL, NULL, NULL, NULL),
(258, 17, 'Tangail Sadar Upazila', 'টাঙ্গাইল সদর', NULL, NULL, NULL, NULL),
(259, 17, 'Sakhipur Upazila', 'সখিপুর', NULL, NULL, NULL, NULL),
(260, 17, 'Basail Upazila', 'বসাইল', NULL, NULL, NULL, NULL),
(261, 17, 'Madhupur Upazila', 'মধুপুর', NULL, NULL, NULL, NULL),
(262, 17, 'Ghatail Upazila', 'ঘাটাইল', NULL, NULL, NULL, NULL),
(263, 17, 'Kalihati Upazila', 'কালিহাতি', NULL, NULL, NULL, NULL),
(264, 17, 'Nagarpur Upazila', 'নগরপুর', NULL, NULL, NULL, NULL),
(265, 17, 'Mirzapur Upazila', 'মির্জাপুর', NULL, NULL, NULL, NULL),
(266, 17, 'Gopalpur Upazila', 'গোপালপুর', NULL, NULL, NULL, NULL),
(267, 17, 'Delduar Upazila', 'দেলদুয়ার', NULL, NULL, NULL, NULL),
(268, 17, 'Bhuapur Upazila', 'ভুয়াপুর', NULL, NULL, NULL, NULL),
(269, 17, 'Dhanbari Upazila', 'ধানবাড়ি', NULL, NULL, NULL, NULL),
(270, 55, 'Bagerhat Sadar Upazila', 'বাগেরহাট সদর', NULL, NULL, NULL, NULL),
(271, 55, 'Chitalmari Upazila', 'চিতলমাড়ি', NULL, NULL, NULL, NULL),
(272, 55, 'Fakirhat Upazila', 'ফকিরহাট', NULL, NULL, NULL, NULL),
(273, 55, 'Kachua Upazila', 'কচুয়া', NULL, NULL, NULL, NULL),
(274, 55, 'Mollahat Upazila', 'মোল্লাহাট ', NULL, NULL, NULL, NULL),
(275, 55, 'Mongla Upazila', 'মংলা', NULL, NULL, NULL, NULL),
(276, 55, 'Morrelganj Upazila', 'মরেলগঞ্জ', NULL, NULL, NULL, NULL),
(277, 55, 'Rampal Upazila', 'রামপাল', NULL, NULL, NULL, NULL),
(278, 55, 'Sarankhola Upazila', 'স্মরণখোলা', NULL, NULL, NULL, NULL),
(279, 56, 'Damurhuda Upazila', 'দামুরহুদা', NULL, NULL, NULL, NULL),
(280, 56, 'Chuadanga-S Upazila', 'চুয়াডাঙ্গা সদর', NULL, NULL, NULL, NULL),
(281, 56, 'Jibannagar Upazila', 'জীবন নগর ', NULL, NULL, NULL, NULL),
(282, 56, 'Alamdanga Upazila', 'আলমডাঙ্গা', NULL, NULL, NULL, NULL),
(283, 57, 'Abhaynagar Upazila', 'অভয়নগর', NULL, NULL, NULL, NULL),
(284, 57, 'Keshabpur Upazila', 'কেশবপুর', NULL, NULL, NULL, NULL),
(285, 57, 'Bagherpara Upazila', 'বাঘের পাড়া ', NULL, NULL, NULL, NULL),
(286, 57, 'Jessore Sadar Upazila', 'যশোর সদর', NULL, NULL, NULL, NULL),
(287, 57, 'Chaugachha Upazila', 'চৌগাছা', NULL, NULL, NULL, NULL),
(288, 57, 'Manirampur Upazila', 'মনিরামপুর ', NULL, NULL, NULL, NULL),
(289, 57, 'Jhikargachha Upazila', 'ঝিকরগাছা', NULL, NULL, NULL, NULL),
(290, 57, 'Sharsha Upazila', 'সারশা', NULL, NULL, NULL, NULL),
(291, 58, 'Jhenaidah Sadar Upazila', 'ঝিনাইদহ সদর', NULL, NULL, NULL, NULL),
(292, 58, 'Maheshpur Upazila', 'মহেশপুর', NULL, NULL, NULL, NULL),
(293, 58, 'Kaliganj Upazila', 'কালীগঞ্জ', NULL, NULL, NULL, NULL),
(294, 58, 'Kotchandpur Upazila', 'কোট চাঁদপুর ', NULL, NULL, NULL, NULL),
(295, 58, 'Shailkupa Upazila', 'শৈলকুপা', NULL, NULL, NULL, NULL),
(296, 58, 'Harinakunda Upazila', 'হাড়িনাকুন্দা', NULL, NULL, NULL, NULL),
(297, 59, 'Terokhada Upazila', 'তেরোখাদা', NULL, NULL, NULL, NULL),
(298, 59, 'Batiaghata Upazila', 'বাটিয়াঘাটা ', NULL, NULL, NULL, NULL),
(299, 59, 'Dacope Upazila', 'ডাকপে', NULL, NULL, NULL, NULL),
(300, 59, 'Dumuria Upazila', 'ডুমুরিয়া', NULL, NULL, NULL, NULL),
(301, 59, 'Dighalia Upazila', 'দিঘলিয়া', NULL, NULL, NULL, NULL),
(302, 59, 'Koyra Upazila', 'কয়ড়া', NULL, NULL, NULL, NULL),
(303, 59, 'Paikgachha Upazila', 'পাইকগাছা', NULL, NULL, NULL, NULL),
(304, 59, 'Phultala Upazila', 'ফুলতলা', NULL, NULL, NULL, NULL),
(305, 59, 'Rupsa Upazila', 'রূপসা', NULL, NULL, NULL, NULL),
(306, 60, 'Kushtia Sadar', 'কুষ্টিয়া সদর', NULL, NULL, NULL, NULL),
(307, 60, 'Kumarkhali', 'কুমারখালি', NULL, NULL, NULL, NULL),
(308, 60, 'Daulatpur', 'দৌলতপুর', NULL, NULL, NULL, NULL),
(309, 60, 'Mirpur', 'মিরপুর', NULL, NULL, NULL, NULL),
(310, 60, 'Bheramara', 'ভেরামারা', NULL, NULL, NULL, NULL),
(311, 60, 'Khoksa', 'খোকসা', NULL, NULL, NULL, NULL),
(312, 61, 'Magura Sadar Upazila', 'মাগুরা সদর', NULL, NULL, NULL, NULL),
(313, 61, 'Mohammadpur Upazila', 'মোহাম্মাদপুর', NULL, NULL, NULL, NULL),
(314, 61, 'Shalikha Upazila', 'শালিখা', NULL, NULL, NULL, NULL),
(315, 61, 'Sreepur Upazila', 'শ্রীপুর', NULL, NULL, NULL, NULL),
(316, 62, 'angni Upazila', 'আংনি', NULL, NULL, NULL, NULL),
(317, 62, 'Mujib Nagar Upazila', 'মুজিব নগর', NULL, NULL, NULL, NULL),
(318, 62, 'Meherpur-S Upazila', 'মেহেরপুর সদর', NULL, NULL, NULL, NULL),
(319, 63, 'Narail-S Upazilla', 'নড়াইল সদর', NULL, NULL, NULL, NULL),
(320, 63, 'Lohagara Upazilla', 'লোহাগাড়া', NULL, NULL, NULL, NULL),
(321, 63, 'Kalia Upazilla', 'কালিয়া', NULL, NULL, NULL, NULL),
(322, 64, 'Satkhira Sadar Upazila', 'সাতক্ষীরা সদর', NULL, NULL, NULL, NULL),
(323, 64, 'Assasuni Upazila', 'আসসাশুনি ', NULL, NULL, NULL, NULL),
(324, 64, 'Debhata Upazila', 'দেভাটা', NULL, NULL, NULL, NULL),
(325, 64, 'Tala Upazila', 'তালা', NULL, NULL, NULL, NULL),
(326, 64, 'Kalaroa Upazila', 'কলরোয়া', NULL, NULL, NULL, NULL),
(327, 64, 'Kaliganj Upazila', 'কালীগঞ্জ', NULL, NULL, NULL, NULL),
(328, 64, 'Shyamnagar Upazila', 'শ্যামনগর', NULL, NULL, NULL, NULL),
(329, 18, 'Adamdighi', 'আদমদিঘী', NULL, NULL, NULL, NULL),
(330, 18, 'Bogra Sadar', 'বগুড়া সদর', NULL, NULL, NULL, NULL),
(331, 18, 'Sherpur', 'শেরপুর', NULL, NULL, NULL, NULL),
(332, 18, 'Dhunat', 'ধুনট', NULL, NULL, NULL, NULL),
(333, 18, 'Dhupchanchia', 'দুপচাচিয়া', NULL, NULL, NULL, NULL),
(334, 18, 'Gabtali', 'গাবতলি', NULL, NULL, NULL, NULL),
(335, 18, 'Kahaloo', 'কাহালু', NULL, NULL, NULL, NULL),
(336, 18, 'Nandigram', 'নন্দিগ্রাম', NULL, NULL, NULL, NULL),
(337, 18, 'Sahajanpur', 'শাহজাহানপুর', NULL, NULL, NULL, NULL),
(338, 18, 'Sariakandi', 'সারিয়াকান্দি', NULL, NULL, NULL, NULL),
(339, 18, 'Shibganj', 'শিবগঞ্জ', NULL, NULL, NULL, NULL),
(340, 18, 'Sonatala', 'সোনাতলা', NULL, NULL, NULL, NULL),
(341, 19, 'Joypurhat S', 'জয়পুরহাট সদর', NULL, NULL, NULL, NULL),
(342, 19, 'Akkelpur', 'আক্কেলপুর', NULL, NULL, NULL, NULL),
(343, 19, 'Kalai', 'কালাই', NULL, NULL, NULL, NULL),
(344, 19, 'Khetlal', 'খেতলাল', NULL, NULL, NULL, NULL),
(345, 19, 'Panchbibi', 'পাঁচবিবি', NULL, NULL, NULL, NULL),
(346, 20, 'Naogaon Sadar Upazila', 'নওগাঁ সদর', NULL, NULL, NULL, NULL),
(347, 20, 'Mohadevpur Upazila', 'মহাদেবপুর', NULL, NULL, NULL, NULL),
(348, 20, 'Manda Upazila', 'মান্দা', NULL, NULL, NULL, NULL),
(349, 20, 'Niamatpur Upazila', 'নিয়ামতপুর', NULL, NULL, NULL, NULL),
(350, 20, 'Atrai Upazila', 'আত্রাই', NULL, NULL, NULL, NULL),
(351, 20, 'Raninagar Upazila', 'রাণীনগর', NULL, NULL, NULL, NULL),
(352, 20, 'Patnitala Upazila', 'পত্নীতলা', NULL, NULL, NULL, NULL),
(353, 20, 'Dhamoirhat Upazila', 'ধামইরহাট ', NULL, NULL, NULL, NULL),
(354, 20, 'Sapahar Upazila', 'সাপাহার', NULL, NULL, NULL, NULL),
(355, 20, 'Porsha Upazila', 'পোরশা', NULL, NULL, NULL, NULL),
(356, 20, 'Badalgachhi Upazila', 'বদলগাছি', NULL, NULL, NULL, NULL),
(357, 21, 'Natore Sadar Upazila', 'নাটোর সদর', NULL, NULL, NULL, NULL),
(358, 21, 'Baraigram Upazila', 'বড়াইগ্রাম', NULL, NULL, NULL, NULL),
(359, 21, 'Bagatipara Upazila', 'বাগাতিপাড়া', NULL, NULL, NULL, NULL),
(360, 21, 'Lalpur Upazila', 'লালপুর', NULL, NULL, NULL, NULL),
(361, 21, 'Natore Sadar Upazila', 'নাটোর সদর', NULL, NULL, NULL, NULL),
(362, 21, 'Baraigram Upazila', 'বড়াই গ্রাম', NULL, NULL, NULL, NULL),
(363, 22, 'Bholahat Upazila', 'ভোলাহাট', NULL, NULL, NULL, NULL),
(364, 22, 'Gomastapur Upazila', 'গোমস্তাপুর', NULL, NULL, NULL, NULL),
(365, 22, 'Nachole Upazila', 'নাচোল', NULL, NULL, NULL, NULL),
(366, 22, 'Nawabganj Sadar Upazila', 'নবাবগঞ্জ সদর', NULL, NULL, NULL, NULL),
(367, 22, 'Shibganj Upazila', 'শিবগঞ্জ', NULL, NULL, NULL, NULL),
(368, 23, 'Atgharia Upazila', 'আটঘরিয়া', NULL, NULL, NULL, NULL),
(369, 23, 'Bera Upazila', 'বেড়া', NULL, NULL, NULL, NULL),
(370, 23, 'Bhangura Upazila', 'ভাঙ্গুরা', NULL, NULL, NULL, NULL),
(371, 23, 'Chatmohar Upazila', 'চাটমোহর', NULL, NULL, NULL, NULL),
(372, 23, 'Faridpur Upazila', 'ফরিদপুর', NULL, NULL, NULL, NULL),
(373, 23, 'Ishwardi Upazila', 'ঈশ্বরদী', NULL, NULL, NULL, NULL),
(374, 23, 'Pabna Sadar Upazila', 'পাবনা সদর', NULL, NULL, NULL, NULL),
(375, 23, 'Santhia Upazila', 'সাথিয়া', NULL, NULL, NULL, NULL),
(376, 23, 'Sujanagar Upazila', 'সুজানগর', NULL, NULL, NULL, NULL),
(377, 24, 'Bagha', 'বাঘা', NULL, NULL, NULL, NULL),
(378, 24, 'Bagmara', 'বাগমারা', NULL, NULL, NULL, NULL),
(379, 24, 'Charghat', 'চারঘাট', NULL, NULL, NULL, NULL),
(380, 24, 'Durgapur', 'দুর্গাপুর', NULL, NULL, NULL, NULL),
(381, 24, 'Godagari', 'গোদাগারি', NULL, NULL, NULL, NULL),
(382, 24, 'Mohanpur', 'মোহনপুর', NULL, NULL, NULL, NULL),
(383, 24, 'Paba', 'পবা', NULL, NULL, NULL, NULL),
(384, 24, 'Puthia', 'পুঠিয়া', NULL, NULL, NULL, NULL),
(385, 24, 'Tanore', 'তানোর', NULL, NULL, NULL, NULL),
(386, 25, 'Sirajganj Sadar Upazila', 'সিরাজগঞ্জ সদর', NULL, NULL, NULL, NULL),
(387, 25, 'Belkuchi Upazila', 'বেলকুচি', NULL, NULL, NULL, NULL),
(388, 25, 'Chauhali Upazila', 'চৌহালি', NULL, NULL, NULL, NULL),
(389, 25, 'Kamarkhanda Upazila', 'কামারখান্দা', NULL, NULL, NULL, NULL),
(390, 25, 'Kazipur Upazila', 'কাজীপুর', NULL, NULL, NULL, NULL),
(391, 25, 'Raiganj Upazila', 'রায়গঞ্জ', NULL, NULL, NULL, NULL),
(392, 25, 'Shahjadpur Upazila', 'শাহজাদপুর', NULL, NULL, NULL, NULL),
(393, 25, 'Tarash Upazila', 'তারাশ', NULL, NULL, NULL, NULL),
(394, 25, 'Ullahpara Upazila', 'উল্লাপাড়া', NULL, NULL, NULL, NULL),
(395, 26, 'Birampur Upazila', 'বিরামপুর', NULL, NULL, NULL, NULL),
(396, 26, 'Birganj', 'বীরগঞ্জ', NULL, NULL, NULL, NULL),
(397, 26, 'Biral Upazila', 'বিড়াল', NULL, NULL, NULL, NULL),
(398, 26, 'Bochaganj Upazila', 'বোচাগঞ্জ', NULL, NULL, NULL, NULL),
(399, 26, 'Chirirbandar Upazila', 'চিরিরবন্দর', NULL, NULL, NULL, NULL),
(400, 26, 'Phulbari Upazila', 'ফুলবাড়ি', NULL, NULL, NULL, NULL),
(401, 26, 'Ghoraghat Upazila', 'ঘোড়াঘাট', NULL, NULL, NULL, NULL),
(402, 26, 'Hakimpur Upazila', 'হাকিমপুর', NULL, NULL, NULL, NULL),
(403, 26, 'Kaharole Upazila', 'কাহারোল', NULL, NULL, NULL, NULL),
(404, 26, 'Khansama Upazila', 'খানসামা', NULL, NULL, NULL, NULL),
(405, 26, 'Dinajpur Sadar Upazila', 'দিনাজপুর সদর', NULL, NULL, NULL, NULL),
(406, 26, 'Nawabganj', 'নবাবগঞ্জ', NULL, NULL, NULL, NULL),
(407, 26, 'Parbatipur Upazila', 'পার্বতীপুর', NULL, NULL, NULL, NULL),
(408, 27, 'Fulchhari', 'ফুলছড়ি', NULL, NULL, NULL, NULL),
(409, 27, 'Gaibandha sadar', 'গাইবান্ধা সদর', NULL, NULL, NULL, NULL),
(410, 27, 'Gobindaganj', 'গোবিন্দগঞ্জ', NULL, NULL, NULL, NULL),
(411, 27, 'Palashbari', 'পলাশবাড়ী', NULL, NULL, NULL, NULL),
(412, 27, 'Sadullapur', 'সাদুল্যাপুর', NULL, NULL, NULL, NULL),
(413, 27, 'Saghata', 'সাঘাটা', NULL, NULL, NULL, NULL),
(414, 27, 'Sundarganj', 'সুন্দরগঞ্জ', NULL, NULL, NULL, NULL),
(415, 28, 'Kurigram Sadar', 'কুড়িগ্রাম সদর', NULL, NULL, NULL, NULL),
(416, 28, 'Nageshwari', 'নাগেশ্বরী', NULL, NULL, NULL, NULL),
(417, 28, 'Bhurungamari', 'ভুরুঙ্গামারি', NULL, NULL, NULL, NULL),
(418, 28, 'Phulbari', 'ফুলবাড়ি', NULL, NULL, NULL, NULL),
(419, 28, 'Rajarhat', 'রাজারহাট', NULL, NULL, NULL, NULL),
(420, 28, 'Ulipur', 'উলিপুর', NULL, NULL, NULL, NULL),
(421, 28, 'Chilmari', 'চিলমারি', NULL, NULL, NULL, NULL),
(422, 28, 'Rowmari', 'রউমারি', NULL, NULL, NULL, NULL),
(423, 28, 'Char Rajibpur', 'চর রাজিবপুর', NULL, NULL, NULL, NULL),
(424, 29, 'Lalmanirhat Sadar', 'লালমনিরহাট সদর', NULL, NULL, NULL, NULL),
(425, 29, 'Aditmari', 'আদিতমারি', NULL, NULL, NULL, NULL),
(426, 29, 'Kaliganj', 'কালীগঞ্জ', NULL, NULL, NULL, NULL),
(427, 29, 'Hatibandha', 'হাতিবান্ধা', NULL, NULL, NULL, NULL),
(428, 29, 'Patgram', 'পাটগ্রাম', NULL, NULL, NULL, NULL),
(429, 30, 'Nilphamari Sadar', 'নীলফামারী সদর', NULL, NULL, NULL, NULL),
(430, 30, 'Saidpur', 'সৈয়দপুর', NULL, NULL, NULL, NULL),
(431, 30, 'Jaldhaka', 'জলঢাকা', NULL, NULL, NULL, NULL),
(432, 30, 'Kishoreganj', 'কিশোরগঞ্জ', NULL, NULL, NULL, NULL),
(433, 30, 'Domar', 'ডোমার', NULL, NULL, NULL, NULL),
(434, 30, 'Dimla', 'ডিমলা', NULL, NULL, NULL, NULL),
(435, 31, 'Panchagarh Sadar', 'পঞ্চগড় সদর', NULL, NULL, NULL, NULL),
(436, 31, 'Debiganj', 'দেবীগঞ্জ', NULL, NULL, NULL, NULL),
(437, 31, 'Boda', 'বোদা', NULL, NULL, NULL, NULL),
(438, 31, 'Atwari', 'আটোয়ারি', NULL, NULL, NULL, NULL),
(439, 31, 'Tetulia', 'তেতুলিয়া', NULL, NULL, NULL, NULL),
(440, 32, 'Badarganj', 'বদরগঞ্জ', NULL, NULL, NULL, NULL),
(441, 32, 'Mithapukur', 'মিঠাপুকুর', NULL, NULL, NULL, NULL),
(442, 32, 'Gangachara', 'গঙ্গাচরা', NULL, NULL, NULL, NULL),
(443, 32, 'Kaunia', 'কাউনিয়া', NULL, NULL, NULL, NULL),
(444, 32, 'Rangpur Sadar', 'রংপুর সদর', NULL, NULL, NULL, NULL),
(445, 32, 'Pirgachha', 'পীরগাছা', NULL, NULL, NULL, NULL),
(446, 32, 'Pirganj', 'পীরগঞ্জ', NULL, NULL, NULL, NULL),
(447, 32, 'Taraganj', 'তারাগঞ্জ', NULL, NULL, NULL, NULL),
(448, 33, 'Thakurgaon Sadar Upazila', 'ঠাকুরগাঁও সদর', NULL, NULL, NULL, NULL),
(449, 33, 'Pirganj Upazila', 'পীরগঞ্জ', NULL, NULL, NULL, NULL),
(450, 33, 'Baliadangi Upazila', 'বালিয়াডাঙ্গি', NULL, NULL, NULL, NULL),
(451, 33, 'Haripur Upazila', 'হরিপুর', NULL, NULL, NULL, NULL),
(452, 33, 'Ranisankail Upazila', 'রাণীসংকইল', NULL, NULL, NULL, NULL),
(453, 51, 'Ajmiriganj', 'আজমিরিগঞ্জ', NULL, NULL, NULL, NULL),
(454, 51, 'Baniachang', 'বানিয়াচং', NULL, NULL, NULL, NULL),
(455, 51, 'Bahubal', 'বাহুবল', NULL, NULL, NULL, NULL),
(456, 51, 'Chunarughat', 'চুনারুঘাট', NULL, NULL, NULL, NULL),
(457, 51, 'Habiganj Sadar', 'হবিগঞ্জ সদর', NULL, NULL, NULL, NULL),
(458, 51, 'Lakhai', 'লাক্ষাই', NULL, NULL, NULL, NULL),
(459, 51, 'Madhabpur', 'মাধবপুর', NULL, NULL, NULL, NULL),
(460, 51, 'Nabiganj', 'নবীগঞ্জ', NULL, NULL, NULL, NULL),
(461, 51, 'Shaistagonj Upazila', 'শায়েস্তাগঞ্জ', NULL, NULL, NULL, NULL),
(462, 52, 'Moulvibazar Sadar', 'মৌলভীবাজার', NULL, NULL, NULL, NULL),
(463, 52, 'Barlekha', 'বড়লেখা', NULL, NULL, NULL, NULL),
(464, 52, 'Juri', 'জুড়ি', NULL, NULL, NULL, NULL),
(465, 52, 'Kamalganj', 'কামালগঞ্জ', NULL, NULL, NULL, NULL),
(466, 52, 'Kulaura', 'কুলাউরা', NULL, NULL, NULL, NULL),
(467, 52, 'Rajnagar', 'রাজনগর', NULL, NULL, NULL, NULL),
(468, 52, 'Sreemangal', 'শ্রীমঙ্গল', NULL, NULL, NULL, NULL),
(469, 53, 'Bishwamvarpur', 'বিসশম্ভারপুর', NULL, NULL, NULL, NULL),
(470, 53, 'Chhatak', 'ছাতক', NULL, NULL, NULL, NULL),
(471, 53, 'Derai', 'দেড়াই', NULL, NULL, NULL, NULL),
(472, 53, 'Dharampasha', 'ধরমপাশা', NULL, NULL, NULL, NULL),
(473, 53, 'Dowarabazar', 'দোয়ারাবাজার', NULL, NULL, NULL, NULL),
(474, 53, 'Jagannathpur', 'জগন্নাথপুর', NULL, NULL, NULL, NULL),
(475, 53, 'Jamalganj', 'জামালগঞ্জ', NULL, NULL, NULL, NULL),
(476, 53, 'Sulla', 'সুল্লা', NULL, NULL, NULL, NULL),
(477, 53, 'Sunamganj Sadar', 'সুনামগঞ্জ সদর', NULL, NULL, NULL, NULL),
(478, 53, 'Shanthiganj', 'শান্তিগঞ্জ', NULL, NULL, NULL, NULL),
(479, 53, 'Tahirpur', 'তাহিরপুর', NULL, NULL, NULL, NULL),
(480, 54, 'Sylhet Sadar', 'সিলেট সদর', NULL, NULL, NULL, NULL),
(481, 54, 'Beanibazar', 'বেয়ানিবাজার', NULL, NULL, NULL, NULL),
(482, 54, 'Bishwanath', 'বিশ্বনাথ', NULL, NULL, NULL, NULL),
(483, 54, 'Dakshin Surma Upazila', 'দক্ষিণ সুরমা', NULL, NULL, NULL, NULL),
(484, 54, 'Balaganj', 'বালাগঞ্জ', NULL, NULL, NULL, NULL),
(485, 54, 'Companiganj', 'কোম্পানিগঞ্জ', NULL, NULL, NULL, NULL),
(486, 54, 'Fenchuganj', 'ফেঞ্চুগঞ্জ', NULL, NULL, NULL, NULL),
(487, 54, 'Golapganj', 'গোলাপগঞ্জ', NULL, NULL, NULL, NULL),
(488, 54, 'Gowainghat', 'গোয়াইনঘাট', NULL, NULL, NULL, NULL),
(489, 54, 'Jaintiapur', 'জয়ন্তপুর', NULL, NULL, NULL, NULL),
(490, 54, 'Kanaighat', 'কানাইঘাট', NULL, NULL, NULL, NULL),
(491, 54, 'Zakiganj', 'জাকিগঞ্জ', NULL, NULL, NULL, NULL),
(492, 54, 'Nobigonj', 'নবীগঞ্জ', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upazila` int(10) DEFAULT NULL,
  `user_union` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomine_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `txn_pin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `national_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `register_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` enum('admin','accountant','user','free','manager','dealer') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `is_signup_without_payment` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_premium` timestamp NULL DEFAULT NULL,
  `is_banned` timestamp NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `phone`, `address`, `email`, `position`, `city`, `state`, `country`, `upazila`, `user_union`, `post_code`, `father_name`, `mother_name`, `nomine_name`, `txn_pin`, `national_id`, `register_by`, `profile_picture`, `user_type`, `is_signup_without_payment`, `is_premium`, `is_banned`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Rishaf', 'admin', '01911', 'Dhaka bangladesh', 'rishad.black@gmail.com', NULL, '1', '1', '1', 1, 'Lebanon', NULL, 'father', 'Mother', 'Nomine', '123321', '123456789', '123456789', 'admin.png', 'admin', NULL, NULL, NULL, NULL, '$2y$10$8iPliL8kjSHW.Z1Undf2rOQrOMF5ua1SzUPfYnRRn5l.MiKldO2gG', NULL, NULL, '2019-11-26 08:08:27', NULL),
(2, 'Admin', 'mehedi', '34543534', 'fadsfs', 'admin@adddmin.com', NULL, '15', '7', '18', NULL, NULL, '1234563', 'Abdul Khalek', NULL, NULL, '123456', '415646', '415646', 'mehedi.jpg', 'user', NULL, '2019-11-06 18:00:00', NULL, NULL, '$2y$10$DMBPNP7XjdJMIFfrCNlaY.xMoLEo12aQes802Uay2NROYZxEpsROO', NULL, '2019-11-07 10:58:37', '2019-12-12 11:58:50', NULL),
(3, 'Rifat', 'rifat', '01911423670', 'dgdfg', 'rifatsdfsd@gmail.com', NULL, '1', '3', '18', NULL, NULL, '23453245', NULL, NULL, NULL, '123456', '43534543', '43534543', 'rifat.png', 'user', NULL, '2019-11-06 18:00:00', NULL, NULL, '$2y$10$0RWxUWwHmPBrSd8OnWY8nOS.YKIxdd1gZ8ftDx1DJi9YMDWIGuTei', NULL, '2019-11-07 12:37:29', '2019-11-12 11:53:24', NULL),
(4, 'Rishad', 'rishad', '4564563', 'dfgdgd', 'adminpdsfa@admin.com', NULL, '16', '3', '18', NULL, NULL, '7567', 'Father', 'Mother', 'Nomine', '123456', '9876543', '9876543', 'rishad.png', 'user', NULL, '2019-11-06 18:00:00', NULL, NULL, '$2y$10$SJct.AX0MjFW25fG12EWxO6BXOLyxuP6sFCja187bRFHWPe6fkwe.', NULL, '2019-11-07 12:50:58', '2019-11-25 10:57:34', NULL),
(7, 'Test Account User', 'testcompany', '0171145', 'fdsfsd', 'info@megloballtd.com', NULL, '38', '5', '18', NULL, NULL, '4655', NULL, NULL, NULL, '123456', '456456', '1', NULL, 'dealer', NULL, '2019-12-10 18:00:00', NULL, NULL, '$2y$10$enPJ8LyIziTYEFIUN.y1U.BV..4QBLLXSMJt3miC..qhddHWc4O/m', NULL, '2019-11-14 06:21:18', '2019-11-14 06:21:18', NULL),
(8, 'S M Rifat', 'testdistrict', '01911423674', 'gfdgdgd', 'admin@addmin.com', NULL, '1', '3', '18', NULL, NULL, NULL, NULL, NULL, NULL, '123456', '123123', '1', NULL, 'dealer', NULL, '2019-12-10 18:00:00', NULL, NULL, '$2y$10$zONDgAFHJLElrjBApcJ23eTEPHBBPr8xwiw/zElTDydx7WoL.gaJu', NULL, '2019-11-14 06:28:31', '2019-11-14 06:28:31', NULL),
(9, 'Test Upazilla', 'testupazila', '6456456', NULL, 'infodf@megloballtd.com', NULL, '1', '3', '18', NULL, NULL, NULL, NULL, NULL, NULL, '123456', '556456', '1', NULL, 'dealer', NULL, '2019-12-10 18:00:00', NULL, NULL, '$2y$10$167m2iqOr6kMH1OhOsNHeeLOMlGG4tRbE4g5pvANVIR73wbU7A7Fe', NULL, '2019-11-14 11:27:23', '2019-11-14 11:27:23', NULL),
(10, 'Test Union', 'testunion', '234234', NULL, 'info2342@megloballtd.com', NULL, '1', '3', '18', NULL, NULL, '5675', NULL, NULL, NULL, '123456', '675477', '1', NULL, 'dealer', NULL, '2019-12-10 18:00:00', NULL, NULL, '$2y$10$d4ndW5U4blKz27RWoXy8ceWjeSxY02l4qLC5Y7tJ1sbzfekjIZx9y', NULL, '2019-11-14 11:28:43', '2019-11-14 11:28:43', NULL),
(11, 'test user', 'testadmin', '01672130499', 'dsafsdf', 'dfgdf@fdgd.dh', NULL, '1', '3', '18', NULL, NULL, '45343', 'test', 'fdgdfg', 'sdfgdsf', '123456', '3534534', '1', NULL, 'user', NULL, NULL, NULL, NULL, '$2y$10$C5iSK51H.dCjbOTCnjgXO.HNTDVRt8A3w1TmU4FojZ5HkITV.t4V6', NULL, '2019-12-03 11:13:26', '2019-12-03 11:13:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_has_permissions`
--

CREATE TABLE `user_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_has_roles`
--

CREATE TABLE `user_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_has_roles`
--

INSERT INTO `user_has_roles` (`role_id`, `model_type`, `user_id`) VALUES
(1, 'App\\User', 7),
(3, 'App\\User', 1),
(4, 'App\\User', 3),
(4, 'App\\User', 4),
(4, 'App\\User', 11),
(6, 'App\\User', 2),
(6, 'App\\User', 7),
(6, 'App\\User', 8),
(6, 'App\\User', 9),
(6, 'App\\User', 10);

-- --------------------------------------------------------

--
-- Table structure for table `withdrawals`
--

CREATE TABLE `withdrawals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_by_user_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `withdrawal_amount` decimal(20,2) DEFAULT NULL,
  `payment_method` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method_details` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `withdrawal_charge` decimal(20,2) DEFAULT NULL,
  `vat_amount` decimal(20,2) DEFAULT NULL,
  `insurance_amount` decimal(20,2) DEFAULT NULL,
  `total_withdrawal_amount` decimal(20,2) DEFAULT NULL,
  `withdrawal_details` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `withdrawal_status` enum('paid','hold','pending','cancel') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `withdrawals`
--

INSERT INTO `withdrawals` (`id`, `user_id`, `pay_by_user_id`, `withdrawal_amount`, `payment_method`, `payment_method_details`, `withdrawal_charge`, `vat_amount`, `insurance_amount`, `total_withdrawal_amount`, `withdrawal_details`, `withdrawal_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', NULL, '200.00', NULL, NULL, '22.00', '20.00', '2.00', '178.00', 'test', 'paid', '2019-11-07 12:58:53', '2019-11-26 09:34:08', NULL),
(2, '1', NULL, '100.00', NULL, NULL, '11.00', '10.00', '1.00', '89.00', 'fddg', 'paid', '2019-12-05 08:24:28', '2019-12-05 08:24:28', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cupon_codes`
--
ALTER TABLE `cupon_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dealers`
--
ALTER TABLE `dealers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incentive_settings`
--
ALTER TABLE `incentive_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_bonuses`
--
ALTER TABLE `member_bonuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_trees`
--
ALTER TABLE `member_trees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `points`
--
ALTER TABLE `points`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sms_logs`
--
ALTER TABLE `sms_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_managers`
--
ALTER TABLE `stock_managers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topup_balances`
--
ALTER TABLE `topup_balances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upazilas`
--
ALTER TABLE `upazilas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD UNIQUE KEY `users_national_id_unique` (`national_id`);

--
-- Indexes for table `user_has_permissions`
--
ALTER TABLE `user_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`user_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`user_id`,`model_type`);

--
-- Indexes for table `user_has_roles`
--
ALTER TABLE `user_has_roles`
  ADD PRIMARY KEY (`role_id`,`user_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`user_id`,`model_type`);

--
-- Indexes for table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `cupon_codes`
--
ALTER TABLE `cupon_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dealers`
--
ALTER TABLE `dealers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `incentive_settings`
--
ALTER TABLE `incentive_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `member_bonuses`
--
ALTER TABLE `member_bonuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `member_trees`
--
ALTER TABLE `member_trees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `points`
--
ALTER TABLE `points`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sms_logs`
--
ALTER TABLE `sms_logs`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `stock_managers`
--
ALTER TABLE `stock_managers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `topup_balances`
--
ALTER TABLE `topup_balances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `upazilas`
--
ALTER TABLE `upazilas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=493;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_has_permissions`
--
ALTER TABLE `user_has_permissions`
  ADD CONSTRAINT `user_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_has_roles`
--
ALTER TABLE `user_has_roles`
  ADD CONSTRAINT `user_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
