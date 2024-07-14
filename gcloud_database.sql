-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2024 at 04:06 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugas_akhir`
--

-- --------------------------------------------------------

--
-- Table structure for table `archive_purchase_items`
--

CREATE TABLE `archive_purchase_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `material_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `archive_purchase_items`
--

INSERT INTO `archive_purchase_items` (`id`, `transaction_id`, `material_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 13, '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(2, 1, 2, 62, '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(3, 1, 3, 31, '2024-07-09 09:59:32', '2024-07-09 09:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `archive_purchase_transactions`
--

CREATE TABLE `archive_purchase_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `total` int(11) NOT NULL DEFAULT 0,
  `paid` int(11) NOT NULL DEFAULT 0,
  `discount` double(8,2) NOT NULL,
  `payment_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `archive_purchase_transactions`
--

INSERT INTO `archive_purchase_transactions` (`id`, `supplier_id`, `total`, `paid`, `discount`, `payment_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1000, 1000, 2.50, 1, '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(2, 2, 2000, 2000, 5.00, 2, '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(3, 3, 2000, 1500, 7.50, 4, '2024-07-09 09:59:32', '2024-07-09 09:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `archive_selling_items`
--

CREATE TABLE `archive_selling_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `archive_selling_items`
--

INSERT INTO `archive_selling_items` (`id`, `transaction_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 13, '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(2, 1, 2, 62, '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(3, 1, 3, 31, '2024-07-09 09:59:32', '2024-07-09 09:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `archive_selling_transactions`
--

CREATE TABLE `archive_selling_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `total` int(11) NOT NULL DEFAULT 0,
  `paid` int(11) NOT NULL DEFAULT 0,
  `payment_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `archive_selling_transactions`
--

INSERT INTO `archive_selling_transactions` (`id`, `customer_id`, `total`, `paid`, `payment_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1000, 1000, 1, '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(2, 2, 2000, 2000, 2, '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(3, 3, 2000, 1500, 4, '2024-07-09 09:59:32', '2024-07-09 09:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `catalogs`
--

CREATE TABLE `catalogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `due_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catalogs`
--

INSERT INTO `catalogs` (`id`, `name`, `due_date`, `created_at`, `updated_at`) VALUES
(1, 'Juli Batch 1', '2024-07-14', '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(2, 'Juli Batch 2', '2024-07-30', '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(3, 'Agustus Batch 1', '2024-08-10', '2024-07-09 09:59:32', '2024-07-09 09:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Kerudung', '2024-07-09 09:59:30', '2024-07-09 09:59:30'),
(2, 'Gamis', '2024-07-09 09:59:30', '2024-07-09 09:59:30'),
(3, 'Rok', '2024-07-09 09:59:30', '2024-07-09 09:59:30'),
(4, 'Koko', '2024-07-09 09:59:30', '2024-07-09 09:59:30');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Red', '2024-07-09 09:59:30', '2024-07-09 09:59:30'),
(2, 'White', '2024-07-09 09:59:30', '2024-07-09 09:59:30'),
(3, 'Cream', '2024-07-09 09:59:30', '2024-07-09 09:59:30'),
(4, 'Coffee', '2024-07-09 09:59:30', '2024-07-09 09:59:30');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `telp` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `class_id`, `telp`, `created_at`, `updated_at`) VALUES
(1, 'Sengud', 1, '0812-4567-7890', '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(2, 'Suryati', 2, '0898-5765-4321', '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(3, 'Maryono', 3, '0855-5555-5555', '2024-07-09 09:59:32', '2024-07-09 09:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `customer_classes`
--

CREATE TABLE `customer_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `discount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_classes`
--

INSERT INTO `customer_classes` (`id`, `name`, `discount`, `created_at`, `updated_at`) VALUES
(1, 'Retail', 10.50, '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(2, 'Gol A', 20.00, '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(3, 'Gol B', 25.00, '2024-07-09 09:59:32', '2024-07-09 09:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `item_grades`
--

CREATE TABLE `item_grades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_grades`
--

INSERT INTO `item_grades` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Normal Grade', '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(2, 'Grade B', '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(3, 'Grade C', '2024-07-09 09:59:32', '2024-07-09 09:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `machines`
--

CREATE TABLE `machines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `use_id` bigint(20) UNSIGNED NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `machines`
--

INSERT INTO `machines` (`id`, `name`, `use_id`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 'Potong 1', 2, 2, '2024-07-09 09:59:31', '2024-07-09 09:59:31'),
(2, 'Jahit 1', 1, 3, '2024-07-09 09:59:31', '2024-07-09 09:59:31'),
(3, 'Jahit 2', 3, 2, '2024-07-09 09:59:31', '2024-07-09 09:59:31'),
(4, 'Jahit 3', 3, 3, '2024-07-09 09:59:31', '2024-07-09 09:59:31'),
(5, 'Setrika 1', 3, 2, '2024-07-09 09:59:31', '2024-07-09 09:59:31');

-- --------------------------------------------------------

--
-- Table structure for table `machine_statuses`
--

CREATE TABLE `machine_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `machine_statuses`
--

INSERT INTO `machine_statuses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Baik', '2024-07-09 09:59:30', '2024-07-09 09:59:30'),
(2, 'Digunakan', '2024-07-09 09:59:30', '2024-07-09 09:59:30'),
(3, 'Rusak', '2024-07-09 09:59:30', '2024-07-09 09:59:30');

-- --------------------------------------------------------

--
-- Table structure for table `machine_uses`
--

CREATE TABLE `machine_uses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `machine_uses`
--

INSERT INTO `machine_uses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Potong', '2024-07-09 09:59:31', '2024-07-09 09:59:31'),
(2, 'Jahit', '2024-07-09 09:59:31', '2024-07-09 09:59:31'),
(3, 'Setrika', '2024-07-09 09:59:31', '2024-07-09 09:59:31');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `unit_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `purchase_price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `name`, `stock`, `unit_id`, `category_id`, `code`, `purchase_price`, `created_at`, `updated_at`) VALUES
(1, 'Kancing merah', 1000, 3, 2, 'KCGMR01', 1000, '2024-07-09 09:59:30', '2024-07-09 09:59:30'),
(2, 'Resleting pink', 2000, 4, 3, 'RLTPN01', 1500, '2024-07-09 09:59:30', '2024-07-09 09:59:30'),
(3, 'Benang putih', 3000, 3, 2, 'BNGPT01', 5000, '2024-07-09 09:59:30', '2024-07-09 09:59:30'),
(4, 'Benang merah', 4000, 2, 2, 'BNGMR01', 10000, '2024-07-09 09:59:30', '2024-07-09 09:59:30'),
(5, 'Kain merah', 5000, 2, 2, 'KAIN01', 15000, '2024-07-09 09:59:30', '2024-07-09 09:59:30');

-- --------------------------------------------------------

--
-- Table structure for table `material_categories`
--

CREATE TABLE `material_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `material_categories`
--

INSERT INTO `material_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Benang', '2024-07-09 09:59:30', '2024-07-09 09:59:30'),
(2, 'Aksesoris', '2024-07-09 09:59:30', '2024-07-09 09:59:30'),
(3, 'Kain', '2024-07-09 09:59:30', '2024-07-09 09:59:30'),
(4, 'Kancing', '2024-07-09 09:59:30', '2024-07-09 09:59:30'),
(5, 'Resleting', '2024-07-09 09:59:30', '2024-07-09 09:59:30');

-- --------------------------------------------------------

--
-- Table structure for table `material_units`
--

CREATE TABLE `material_units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `material_units`
--

INSERT INTO `material_units` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Roll', '2024-07-09 09:59:30', '2024-07-09 09:59:30'),
(2, 'Meter', '2024-07-09 09:59:30', '2024-07-09 09:59:30'),
(3, 'Piece', '2024-07-09 09:59:30', '2024-07-09 09:59:30'),
(4, 'Pack', '2024-07-09 09:59:30', '2024-07-09 09:59:30');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2024_05_02_195428_create_categories_table', 1),
(5, '2024_05_02_195428_create_colors_table', 1),
(6, '2024_05_02_195428_create_sizes_table', 1),
(7, '2024_05_02_195503_create_type_table', 1),
(8, '2024_05_02_201350_create_sign_table', 1),
(9, '2024_05_21_113021_create_unit_table', 1),
(10, '2024_05_21_113159_create_material_category_table', 1),
(11, '2024_05_23_063811_create_machine_use_table', 1),
(12, '2024_05_23_063818_create_machine_status_table', 1),
(13, '2024_05_23_063843_create_machine_table', 1),
(14, '2024_05_23_101150_create_workforce_position_table', 1),
(15, '2024_05_23_101156_create_workforce_status_table', 1),
(16, '2024_05_23_201144_create_workforce_table', 1),
(17, '2024_05_27_140837_create_project_status', 1),
(18, '2024_06_05_165751_add_provider_fields_to_users_table', 1),
(19, '2024_06_05_170112_make_password_nullable_in_users_table', 1),
(20, '2024_06_12_031053_create_customer_class_table', 1),
(21, '2024_06_12_031059_create_customer_table', 1),
(22, '2024_06_12_165823_create_payment_methods_table', 1),
(23, '2024_06_16_071030_create_supplier_classes_table', 1),
(24, '2024_06_16_071035_create_suppliers_table', 1),
(25, '2024_06_20_140453_create_catalogs_table', 1),
(26, '2024_06_30_213600_create_item_grades_table', 1),
(27, '2024_07_04_101924_create_roles_table', 1),
(28, '2024_07_04_101938_create_permissions_table', 1),
(29, '2024_07_04_102014_create_role_users_table', 1),
(30, '2024_07_04_102022_create_permission_roles_table', 1),
(31, '2025_03_15_062252_create_materials_table', 1),
(32, '2025_03_15_062252_create_products_table', 1),
(33, '2025_03_15_065119_create_product_material_table', 1),
(34, '2025_05_27_071451_create_project', 1),
(35, '2025_05_27_071844_create_project_product', 1),
(36, '2025_06_13_164321_create_archive_selling_table', 1),
(37, '2025_06_13_165118_create_archive_selling_item_table', 1),
(38, '2025_06_16_070841_create_archive_purchase_transactions_table', 1),
(39, '2025_06_16_070925_create_archive_purchase_items_table', 1),
(40, '2025_06_20_141300_create_orders_table', 1),
(41, '2025_06_23_115527_create_productions_table', 1),
(42, '2025_06_23_132607_create_production_workforces_table', 1),
(43, '2025_06_23_132609_create_production_machines_table', 1),
(44, '2025_06_26_223908_create_return_customer_categories_table', 1),
(45, '2025_06_26_224854_create_return_customers_table', 1),
(46, '2025_06_27_001430_create_return_production_categories_table', 1),
(47, '2025_06_27_001433_create_return_productions_table', 1),
(48, '2025_06_27_013933_create_return_material_categories_table', 1),
(49, '2025_06_27_014921_create_return_materials_table', 1),
(50, '2025_06_30_222816_create_rejected_products_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `catalog_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `catalog_id`, `customer_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 2, 1, '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(2, 1, 3, 2, 8, '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(3, 1, 1, 2, 3, '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(4, 1, 1, 2, 2, '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(5, 1, 2, 1, 6, '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(6, 1, 2, 1, 2, '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(7, 2, 3, 3, 9, '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(8, 2, 3, 3, 9, '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(9, 2, 2, 1, 5, '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(10, 2, 2, 1, 3, '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(11, 2, 2, 2, 10, '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(12, 2, 2, 2, 4, '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(13, 3, 2, 3, 4, '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(14, 3, 2, 3, 4, '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(15, 3, 3, 1, 5, '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(16, 3, 3, 1, 4, '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(17, 3, 1, 1, 7, '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(18, 3, 1, 1, 1, '2024-07-09 09:59:32', '2024-07-09 09:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Cash', '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(2, 'Transfer', '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(3, 'QRIS', '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(4, 'Hutang', '2024-07-09 09:59:32', '2024-07-09 09:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'assign roles', '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(2, 'access product', '2024-07-09 09:59:32', '2024-07-09 09:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `permission_roles`
--

CREATE TABLE `permission_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_roles`
--

INSERT INTO `permission_roles` (`id`, `permission_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 1, NULL, NULL),
(3, 2, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productions`
--

CREATE TABLE `productions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `production_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productions`
--

INSERT INTO `productions` (`id`, `quantity`, `product_id`, `project_id`, `production_date`, `created_at`, `updated_at`) VALUES
(1, 10, 1, 1, '2024-07-14', '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(2, 3, 1, 2, '2024-07-14', '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(3, 53, 3, 2, '2024-07-14', '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(4, 13, 2, 2, '2024-07-14', '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(5, 25, 2, 3, '2024-07-14', '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(6, 15, 3, 4, '2024-07-14', '2024-07-09 09:59:32', '2024-07-09 09:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `production_machines`
--

CREATE TABLE `production_machines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `production_id` bigint(20) UNSIGNED NOT NULL,
  `machine_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `production_machines`
--

INSERT INTO `production_machines` (`id`, `production_id`, `machine_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 2, 3),
(4, 2, 4),
(5, 2, 5),
(6, 3, 1),
(7, 3, 5),
(8, 4, 2),
(9, 5, 1),
(10, 5, 2),
(11, 6, 4),
(12, 6, 5);

-- --------------------------------------------------------

--
-- Table structure for table `production_workforces`
--

CREATE TABLE `production_workforces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `production_id` bigint(20) UNSIGNED NOT NULL,
  `workforce_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `production_workforces`
--

INSERT INTO `production_workforces` (`id`, `production_id`, `workforce_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 2, 3),
(4, 2, 4),
(5, 3, 1),
(6, 3, 2),
(7, 4, 4),
(8, 4, 2),
(9, 5, 1),
(10, 5, 2),
(11, 6, 4),
(12, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `size_id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED NOT NULL,
  `sign_id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `purchase_price` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `type_id`, `category_id`, `size_id`, `color_id`, `sign_id`, `code`, `purchase_price`, `selling_price`, `stock`, `created_at`, `updated_at`) VALUES
(1, 'Kerudung bergo', 2, 2, 3, 4, 2, 'KRDBG01', 107000, 7000, 20, '2024-07-09 09:59:31', '2024-07-09 09:59:32'),
(2, 'Gamis pria merah', 3, 1, 4, 4, 1, 'GMSPR01', 110000, 9000, 10, '2024-07-09 09:59:31', '2024-07-09 09:59:32'),
(3, 'Gamis wanita putih', 2, 1, 3, 1, 1, 'GMSWT01', 205000, 9000, 15, '2024-07-09 09:59:31', '2024-07-09 09:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `product_materials`
--

CREATE TABLE `product_materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `material_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_materials`
--

INSERT INTO `product_materials` (`id`, `product_id`, `material_id`, `quantity`) VALUES
(1, 1, 5, 4),
(2, 1, 1, 2),
(3, 1, 3, 9),
(4, 3, 4, 2),
(5, 3, 5, 9),
(6, 3, 3, 10),
(7, 2, 5, 4),
(8, 2, 1, 5),
(9, 2, 3, 9);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `start_date`, `end_date`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 'Ramadhan 2024', '2024-03-03', '2024-03-13', 2, '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(2, 'Ramadhan 2024 v2', '2024-03-05', '2024-03-20', 6, '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(3, 'Pesanan Bu Minah', '2024-03-23', '2024-04-05', 7, '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(4, 'Batch Kerudung Mei', '2024-04-03', '2024-04-13', 1, '2024-07-09 09:59:32', '2024-07-09 09:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `project_products`
--

CREATE TABLE `project_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `producted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_products`
--

INSERT INTO `project_products` (`id`, `project_id`, `product_id`, `quantity`, `producted`) VALUES
(1, 4, 3, 4, 0),
(2, 4, 2, 8, 0),
(3, 1, 1, 6, 0),
(4, 1, 2, 3, 0),
(5, 2, 1, 10, 0),
(6, 2, 3, 6, 0),
(7, 3, 3, 5, 0),
(8, 3, 2, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `project_statuses`
--

CREATE TABLE `project_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_statuses`
--

INSERT INTO `project_statuses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Scheduled', '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(2, 'Modeling', '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(3, 'Cutting', '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(4, 'Sewing', '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(5, 'Finishing', '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(6, 'Packing', '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(7, 'Finish', '2024-07-09 09:59:32', '2024-07-09 09:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `rejected_products`
--

CREATE TABLE `rejected_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `grade_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rejected_products`
--

INSERT INTO `rejected_products` (`id`, `product_id`, `grade_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 3, '2024-07-09 09:59:32', '2024-07-09 10:19:58');

-- --------------------------------------------------------

--
-- Table structure for table `return_customers`
--

CREATE TABLE `return_customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `grade_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `information` varchar(255) DEFAULT NULL,
  `return_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `return_customers`
--

INSERT INTO `return_customers` (`id`, `product_id`, `grade_id`, `category_id`, `quantity`, `information`, `return_date`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3, 10, 'Beli ulang pindah distributor', '2024-07-14', '2024-07-09 09:59:32', '2024-07-09 10:46:59'),
(2, 2, 1, 2, 5, 'Beli ulang pindah distributor', '2024-07-14', '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(3, 1, 1, 3, 10, 'Ganti size dari XL ke L', '2024-07-14', '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(4, 3, 1, 3, 3, 'Ganti size dari XL ke L', '2024-07-15', '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(5, 2, 2, 1, 3, 'Rusak bagian lengan, Kancing, Resleting (lihat label di packaging)', '2024-07-15', '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(6, 3, 2, 1, 5, 'Rusak bagian lengan, Kancing, Resleting (lihat label di packaging)', '2024-07-15', '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(7, 1, 1, 4, 10, 'Batal gagal lunas', '2024-07-16', '2024-07-09 09:59:32', '2024-07-09 09:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `return_customer_categories`
--

CREATE TABLE `return_customer_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `return_customer_categories`
--

INSERT INTO `return_customer_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Rejected', '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(2, 'Buy Back', '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(3, 'Size Change', '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(4, 'Canceled', '2024-07-09 09:59:32', '2024-07-09 09:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `return_materials`
--

CREATE TABLE `return_materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `material_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `information` varchar(255) DEFAULT NULL,
  `return_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `return_materials`
--

INSERT INTO `return_materials` (`id`, `material_id`, `category_id`, `quantity`, `information`, `return_date`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 10, 'Material Sobek/Terpotong', '2024-07-14', '2024-07-09 09:59:32', '2024-07-09 11:11:06'),
(2, 2, 1, 5, 'Material Sobek/Terpotong', '2024-07-14', '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(3, 1, 2, 10, 'Warna berubah dikarenakan penyimpanan', '2024-07-14', '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(4, 3, 2, 3, 'Warna berubah dikarenakan penyimpanan', '2024-07-15', '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(5, 2, 3, 3, 'Salah warna', '2024-07-15', '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(6, 3, 3, 15, 'Salah Bahan', '2024-07-16', '2024-07-09 09:59:32', '2024-07-09 09:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `return_material_categories`
--

CREATE TABLE `return_material_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `return_material_categories`
--

INSERT INTO `return_material_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Broken Material', '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(2, 'Damaged Color', '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(3, 'Change Material', '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(4, 'Changing Color', '2024-07-09 09:59:32', '2024-07-09 09:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `return_productions`
--

CREATE TABLE `return_productions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `material_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `information` varchar(255) DEFAULT NULL,
  `return_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `return_productions`
--

INSERT INTO `return_productions` (`id`, `material_id`, `category_id`, `quantity`, `information`, `return_date`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 10, 'Material lebih dikarenakan potongan lebih efisien', '2024-07-14', '2024-07-09 09:59:32', '2024-07-09 10:59:54'),
(2, 2, 1, 5, 'Material lebih dikarenakan potongan lebih efisien', '2024-07-14', '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(3, 1, 2, 10, 'Material yang dibutuhkan lebih sedikit daripada planning (perlu dirubah pada tabel product)', '2024-07-14', '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(4, 3, 2, 3, 'Material yang dibutuhkan lebih sedikit daripada planning (perlu dirubah pada tabel product)', '2024-07-15', '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(5, 2, 3, 3, 'Material sedikit berubah', '2024-07-15', '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(6, 1, 4, 10, 'Salah Material yang digunakan', '2024-07-16', '2024-07-09 09:59:32', '2024-07-09 09:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `return_production_categories`
--

CREATE TABLE `return_production_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `return_production_categories`
--

INSERT INTO `return_production_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Efficient Material', '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(2, 'Different from Planning', '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(3, 'Change Material', '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(4, 'Wrong Material', '2024-07-09 09:59:32', '2024-07-09 09:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2024-07-09 09:59:31', '2024-07-09 09:59:31'),
(2, 'user', '2024-07-09 09:59:31', '2024-07-09 09:59:31'),
(3, 'production', '2024-07-09 09:59:31', '2024-07-09 09:59:31'),
(4, 'inventory', '2024-07-09 09:59:31', '2024-07-09 09:59:31'),
(5, 'marketing', '2024-07-09 09:59:31', '2024-07-09 09:59:31');

-- --------------------------------------------------------

--
-- Table structure for table `role_users`
--

CREATE TABLE `role_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_users`
--

INSERT INTO `role_users` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 2, NULL, NULL),
(3, 1, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `signs`
--

CREATE TABLE `signs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `signs`
--

INSERT INTO `signs` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'KAEN', '2024-07-09 09:59:30', '2024-07-09 09:59:30'),
(2, 'EMKA', '2024-07-09 09:59:30', '2024-07-09 09:59:30'),
(3, 'LUPA', '2024-07-09 09:59:30', '2024-07-09 09:59:30');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'S', '2024-07-09 09:59:30', '2024-07-09 09:59:30'),
(2, 'M', '2024-07-09 09:59:30', '2024-07-09 09:59:30'),
(3, 'L', '2024-07-09 09:59:30', '2024-07-09 09:59:30'),
(4, 'XL', '2024-07-09 09:59:30', '2024-07-09 09:59:30');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `telp` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `class_id`, `telp`, `created_at`, `updated_at`) VALUES
(1, 'AMP', 1, '0812-4567-7890', '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(2, 'KMDL', 2, '0898-5765-4321', '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(3, 'Pak Hikmal', 3, '0855-5555-5555', '2024-07-09 09:59:32', '2024-07-09 09:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_classes`
--

CREATE TABLE `supplier_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplier_classes`
--

INSERT INTO `supplier_classes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Benang', '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(2, 'Aksesoris', '2024-07-09 09:59:32', '2024-07-09 09:59:32'),
(3, 'Kain', '2024-07-09 09:59:32', '2024-07-09 09:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'DAD', '2024-07-09 09:59:30', '2024-07-09 09:59:30'),
(2, 'KIDS', '2024-07-09 09:59:30', '2024-07-09 09:59:30'),
(3, 'MOM', '2024-07-09 09:59:30', '2024-07-09 09:59:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `provider_id` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `role`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `provider`, `provider_id`, `avatar`) VALUES
(1, 'Admin User', 'admin', 'admin', 'admin@example.com', '$2y$12$b5p1nq7d1aRyHpK0IsRRLe6tjIMWVtHijFfYLbxO.ZwJAAN9onvZy', NULL, '2024-07-09 09:59:32', '2024-07-09 09:59:32', NULL, NULL, NULL),
(2, 'User', 'user', 'user', 'user@example.com', '$2y$12$/.098oAaUdua170EllgGtuMAyNE4chFDQvdQkmB8yUaSnfzObz2DG', NULL, '2024-07-09 09:59:32', '2024-07-09 09:59:32', NULL, NULL, NULL),
(3, 'Kaza', 'kaza', 'admin', 'kaza@example.com', '$2y$12$jBvUbl5OdsXSmIEtbYY7p.Uv9MQ0PaxvQGsBG5N5klWqF7sMF2QaO', NULL, '2024-07-09 09:59:32', '2024-07-09 09:59:32', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `workforces`
--

CREATE TABLE `workforces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `position_id` bigint(20) UNSIGNED NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `workforces`
--

INSERT INTO `workforces` (`id`, `name`, `position_id`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 'Juan Meta', 3, 2, '2024-07-09 09:59:31', '2024-07-09 09:59:31'),
(2, 'Edwin Makarim', 3, 2, '2024-07-09 09:59:31', '2024-07-09 09:59:31'),
(3, 'Bagus Mahardika', 3, 2, '2024-07-09 09:59:31', '2024-07-09 09:59:31'),
(4, 'Yoandhika Surya', 3, 1, '2024-07-09 09:59:31', '2024-07-09 09:59:31');

-- --------------------------------------------------------

--
-- Table structure for table `workforce_positions`
--

CREATE TABLE `workforce_positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `workforce_positions`
--

INSERT INTO `workforce_positions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Tukang Potong', '2024-07-09 09:59:31', '2024-07-09 09:59:31'),
(2, 'Tukang Jahit', '2024-07-09 09:59:31', '2024-07-09 09:59:31'),
(3, 'Tukang Setrika', '2024-07-09 09:59:31', '2024-07-09 09:59:31'),
(4, 'Tukang Packing', '2024-07-09 09:59:31', '2024-07-09 09:59:31');

-- --------------------------------------------------------

--
-- Table structure for table `workforce_statuses`
--

CREATE TABLE `workforce_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `workforce_statuses`
--

INSERT INTO `workforce_statuses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Masuk', '2024-07-09 09:59:31', '2024-07-09 09:59:31'),
(2, 'Bolos', '2024-07-09 09:59:31', '2024-07-09 09:59:31'),
(3, 'Izin', '2024-07-09 09:59:31', '2024-07-09 09:59:31'),
(4, 'Sakit', '2024-07-09 09:59:31', '2024-07-09 09:59:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `archive_purchase_items`
--
ALTER TABLE `archive_purchase_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `archive_purchase_items_transaction_id_foreign` (`transaction_id`),
  ADD KEY `archive_purchase_items_material_id_foreign` (`material_id`);

--
-- Indexes for table `archive_purchase_transactions`
--
ALTER TABLE `archive_purchase_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `archive_purchase_transactions_supplier_id_foreign` (`supplier_id`),
  ADD KEY `archive_purchase_transactions_payment_id_foreign` (`payment_id`);

--
-- Indexes for table `archive_selling_items`
--
ALTER TABLE `archive_selling_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `archive_selling_items_transaction_id_foreign` (`transaction_id`),
  ADD KEY `archive_selling_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `archive_selling_transactions`
--
ALTER TABLE `archive_selling_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `archive_selling_transactions_customer_id_foreign` (`customer_id`),
  ADD KEY `archive_selling_transactions_payment_id_foreign` (`payment_id`);

--
-- Indexes for table `catalogs`
--
ALTER TABLE `catalogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_class_id_foreign` (`class_id`);

--
-- Indexes for table `customer_classes`
--
ALTER TABLE `customer_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_grades`
--
ALTER TABLE `item_grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `machines`
--
ALTER TABLE `machines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `machines_use_id_foreign` (`use_id`),
  ADD KEY `machines_status_id_foreign` (`status_id`);

--
-- Indexes for table `machine_statuses`
--
ALTER TABLE `machine_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `machine_uses`
--
ALTER TABLE `machine_uses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `materials_code_unique` (`code`),
  ADD KEY `materials_unit_id_foreign` (`unit_id`),
  ADD KEY `materials_category_id_foreign` (`category_id`);

--
-- Indexes for table `material_categories`
--
ALTER TABLE `material_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material_units`
--
ALTER TABLE `material_units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_product_id_foreign` (`product_id`),
  ADD KEY `orders_customer_id_foreign` (`customer_id`),
  ADD KEY `orders_catalog_id_foreign` (`catalog_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_roles`
--
ALTER TABLE `permission_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_roles_permission_id_foreign` (`permission_id`),
  ADD KEY `permission_roles_role_id_foreign` (`role_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `productions`
--
ALTER TABLE `productions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productions_product_id_foreign` (`product_id`),
  ADD KEY `productions_project_id_foreign` (`project_id`);

--
-- Indexes for table `production_machines`
--
ALTER TABLE `production_machines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `production_machines_production_id_foreign` (`production_id`),
  ADD KEY `production_machines_machine_id_foreign` (`machine_id`);

--
-- Indexes for table `production_workforces`
--
ALTER TABLE `production_workforces`
  ADD PRIMARY KEY (`id`),
  ADD KEY `production_workforces_production_id_foreign` (`production_id`),
  ADD KEY `production_workforces_workforce_id_foreign` (`workforce_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_code_unique` (`code`),
  ADD KEY `products_type_id_foreign` (`type_id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_size_id_foreign` (`size_id`),
  ADD KEY `products_color_id_foreign` (`color_id`),
  ADD KEY `products_sign_id_foreign` (`sign_id`);

--
-- Indexes for table `product_materials`
--
ALTER TABLE `product_materials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_materials_product_id_foreign` (`product_id`),
  ADD KEY `product_materials_material_id_foreign` (`material_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_status_id_foreign` (`status_id`);

--
-- Indexes for table `project_products`
--
ALTER TABLE `project_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_products_project_id_foreign` (`project_id`),
  ADD KEY `project_products_product_id_foreign` (`product_id`);

--
-- Indexes for table `project_statuses`
--
ALTER TABLE `project_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rejected_products`
--
ALTER TABLE `rejected_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rejected_products_product_id_foreign` (`product_id`),
  ADD KEY `rejected_products_grade_id_foreign` (`grade_id`);

--
-- Indexes for table `return_customers`
--
ALTER TABLE `return_customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `return_customers_product_id_foreign` (`product_id`),
  ADD KEY `return_customers_grade_id_foreign` (`grade_id`),
  ADD KEY `return_customers_category_id_foreign` (`category_id`);

--
-- Indexes for table `return_customer_categories`
--
ALTER TABLE `return_customer_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `return_materials`
--
ALTER TABLE `return_materials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `return_materials_material_id_foreign` (`material_id`),
  ADD KEY `return_materials_category_id_foreign` (`category_id`);

--
-- Indexes for table `return_material_categories`
--
ALTER TABLE `return_material_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `return_productions`
--
ALTER TABLE `return_productions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `return_productions_material_id_foreign` (`material_id`),
  ADD KEY `return_productions_category_id_foreign` (`category_id`);

--
-- Indexes for table `return_production_categories`
--
ALTER TABLE `return_production_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_users_role_id_foreign` (`role_id`),
  ADD KEY `role_users_user_id_foreign` (`user_id`);

--
-- Indexes for table `signs`
--
ALTER TABLE `signs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `suppliers_class_id_foreign` (`class_id`);

--
-- Indexes for table `supplier_classes`
--
ALTER TABLE `supplier_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `workforces`
--
ALTER TABLE `workforces`
  ADD PRIMARY KEY (`id`),
  ADD KEY `workforces_position_id_foreign` (`position_id`),
  ADD KEY `workforces_status_id_foreign` (`status_id`);

--
-- Indexes for table `workforce_positions`
--
ALTER TABLE `workforce_positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workforce_statuses`
--
ALTER TABLE `workforce_statuses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `archive_purchase_items`
--
ALTER TABLE `archive_purchase_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `archive_purchase_transactions`
--
ALTER TABLE `archive_purchase_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `archive_selling_items`
--
ALTER TABLE `archive_selling_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `archive_selling_transactions`
--
ALTER TABLE `archive_selling_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `catalogs`
--
ALTER TABLE `catalogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer_classes`
--
ALTER TABLE `customer_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `item_grades`
--
ALTER TABLE `item_grades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `machines`
--
ALTER TABLE `machines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `machine_statuses`
--
ALTER TABLE `machine_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `machine_uses`
--
ALTER TABLE `machine_uses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `material_categories`
--
ALTER TABLE `material_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `material_units`
--
ALTER TABLE `material_units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permission_roles`
--
ALTER TABLE `permission_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productions`
--
ALTER TABLE `productions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `production_machines`
--
ALTER TABLE `production_machines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `production_workforces`
--
ALTER TABLE `production_workforces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_materials`
--
ALTER TABLE `product_materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `project_products`
--
ALTER TABLE `project_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `project_statuses`
--
ALTER TABLE `project_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rejected_products`
--
ALTER TABLE `rejected_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `return_customers`
--
ALTER TABLE `return_customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `return_customer_categories`
--
ALTER TABLE `return_customer_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `return_materials`
--
ALTER TABLE `return_materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `return_material_categories`
--
ALTER TABLE `return_material_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `return_productions`
--
ALTER TABLE `return_productions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `return_production_categories`
--
ALTER TABLE `return_production_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `role_users`
--
ALTER TABLE `role_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `signs`
--
ALTER TABLE `signs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supplier_classes`
--
ALTER TABLE `supplier_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `workforces`
--
ALTER TABLE `workforces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `workforce_positions`
--
ALTER TABLE `workforce_positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `workforce_statuses`
--
ALTER TABLE `workforce_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `archive_purchase_items`
--
ALTER TABLE `archive_purchase_items`
  ADD CONSTRAINT `archive_purchase_items_material_id_foreign` FOREIGN KEY (`material_id`) REFERENCES `materials` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `archive_purchase_items_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `archive_purchase_transactions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `archive_purchase_transactions`
--
ALTER TABLE `archive_purchase_transactions`
  ADD CONSTRAINT `archive_purchase_transactions_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payment_methods` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `archive_purchase_transactions_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `archive_selling_items`
--
ALTER TABLE `archive_selling_items`
  ADD CONSTRAINT `archive_selling_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `archive_selling_items_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `archive_selling_transactions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `archive_selling_transactions`
--
ALTER TABLE `archive_selling_transactions`
  ADD CONSTRAINT `archive_selling_transactions_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `archive_selling_transactions_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payment_methods` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `customer_classes` (`id`);

--
-- Constraints for table `machines`
--
ALTER TABLE `machines`
  ADD CONSTRAINT `machines_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `machine_statuses` (`id`),
  ADD CONSTRAINT `machines_use_id_foreign` FOREIGN KEY (`use_id`) REFERENCES `machine_uses` (`id`);

--
-- Constraints for table `materials`
--
ALTER TABLE `materials`
  ADD CONSTRAINT `materials_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `material_categories` (`id`),
  ADD CONSTRAINT `materials_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `material_units` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_catalog_id_foreign` FOREIGN KEY (`catalog_id`) REFERENCES `catalogs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_roles`
--
ALTER TABLE `permission_roles`
  ADD CONSTRAINT `permission_roles_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `productions`
--
ALTER TABLE `productions`
  ADD CONSTRAINT `productions_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `productions_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `production_machines`
--
ALTER TABLE `production_machines`
  ADD CONSTRAINT `production_machines_machine_id_foreign` FOREIGN KEY (`machine_id`) REFERENCES `machines` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `production_machines_production_id_foreign` FOREIGN KEY (`production_id`) REFERENCES `productions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `production_workforces`
--
ALTER TABLE `production_workforces`
  ADD CONSTRAINT `production_workforces_production_id_foreign` FOREIGN KEY (`production_id`) REFERENCES `productions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `production_workforces_workforce_id_foreign` FOREIGN KEY (`workforce_id`) REFERENCES `workforces` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`),
  ADD CONSTRAINT `products_sign_id_foreign` FOREIGN KEY (`sign_id`) REFERENCES `signs` (`id`),
  ADD CONSTRAINT `products_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`),
  ADD CONSTRAINT `products_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`);

--
-- Constraints for table `product_materials`
--
ALTER TABLE `product_materials`
  ADD CONSTRAINT `product_materials_material_id_foreign` FOREIGN KEY (`material_id`) REFERENCES `materials` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_materials_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `project_statuses` (`id`);

--
-- Constraints for table `project_products`
--
ALTER TABLE `project_products`
  ADD CONSTRAINT `project_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `project_products_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rejected_products`
--
ALTER TABLE `rejected_products`
  ADD CONSTRAINT `rejected_products_grade_id_foreign` FOREIGN KEY (`grade_id`) REFERENCES `item_grades` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rejected_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `return_customers`
--
ALTER TABLE `return_customers`
  ADD CONSTRAINT `return_customers_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `return_customer_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `return_customers_grade_id_foreign` FOREIGN KEY (`grade_id`) REFERENCES `item_grades` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `return_customers_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `return_materials`
--
ALTER TABLE `return_materials`
  ADD CONSTRAINT `return_materials_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `return_material_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `return_materials_material_id_foreign` FOREIGN KEY (`material_id`) REFERENCES `materials` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `return_productions`
--
ALTER TABLE `return_productions`
  ADD CONSTRAINT `return_productions_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `return_production_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `return_productions_material_id_foreign` FOREIGN KEY (`material_id`) REFERENCES `materials` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_users`
--
ALTER TABLE `role_users`
  ADD CONSTRAINT `role_users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD CONSTRAINT `suppliers_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `supplier_classes` (`id`);

--
-- Constraints for table `workforces`
--
ALTER TABLE `workforces`
  ADD CONSTRAINT `workforces_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `workforce_positions` (`id`),
  ADD CONSTRAINT `workforces_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `workforce_statuses` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
