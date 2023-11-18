-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table newp.abouts
CREATE TABLE IF NOT EXISTS `abouts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `note1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `note2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table newp.abouts: ~0 rows (approximately)
INSERT INTO `abouts` (`id`, `name`, `note1`, `note2`, `created_at`, `updated_at`) VALUES
	(1, 'We\'ve retouched', '3,738,282 Photos', 'For corporate & individual clients in over 50 countries', '2023-11-14 19:05:09', '2023-11-14 20:28:59');

-- Dumping structure for table newp.admins
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table newp.admins: ~0 rows (approximately)
INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `status`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'admin@admin.com', NULL, 1, '$2y$10$UzH8iHm935U5gEGEIysZd.dCYU/0UF/20l3p4T3u93KpLKyqZFYw.', 'Fiftm4UYlqzjvGU1I8MVCvUYdfTiIlocr51AzTEgSuererESGTkdCEBUrdu1', '2023-11-14 19:04:27', '2023-11-14 19:04:27');

-- Dumping structure for table newp.blogs
CREATE TABLE IF NOT EXISTS `blogs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `section_id` bigint unsigned NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `blogs_section_id_foreign` (`section_id`),
  CONSTRAINT `blogs_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table newp.blogs: ~2 rows (approximately)
INSERT INTO `blogs` (`id`, `section_id`, `name`, `notes`, `status`, `created_at`, `updated_at`) VALUES
	(1, 2, 'Tre O\'Connell', 'A accusamus exercitationem doloribus fugiat vero doloremque. Dolorum accusantium sit est laboriosam natus. Eligendi sed ut sed earum.', 1, '2023-11-14 19:04:28', '2023-11-14 19:04:28'),
	(2, 2, 'Ms. Mozelle Moen III', 'Deserunt quia natus ducimus laudantium sit sunt quibusdam. Aut praesentium voluptas qui exercitationem libero. Exercitationem ut ea sed id rem. Reprehenderit alias corporis corporis nesciunt.', 1, '2023-11-14 19:04:28', '2023-11-14 19:04:28');

-- Dumping structure for table newp.buttons
CREATE TABLE IF NOT EXISTS `buttons` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('header','service','payment','galley') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `typePaymernts` enum('paypal','checkout') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table newp.buttons: ~6 rows (approximately)
INSERT INTO `buttons` (`id`, `name`, `type`, `status`, `typePaymernts`, `created_at`, `updated_at`, `url`) VALUES
	(1, 'Try it', 'header', 1, NULL, '2023-11-17 10:52:12', '2023-11-17 10:52:12', NULL),
	(2, 'Get Quote', 'header', 1, NULL, '2023-11-17 10:52:49', '2023-11-17 10:52:49', NULL),
	(3, 'Get Quote', 'service', 1, NULL, '2023-11-17 10:54:25', '2023-11-17 10:54:25', NULL),
	(5, 'PayPal', 'payment', 1, 'paypal', '2023-11-17 10:55:24', '2023-11-17 10:55:24', NULL),
	(8, 'try it', 'service', 1, NULL, '2023-11-18 10:49:22', '2023-11-18 11:08:36', 'www.w3schools.com'),
	(9, '2Checkout', 'payment', 1, 'checkout', '2023-11-18 10:50:13', '2023-11-18 10:50:13', NULL);

-- Dumping structure for table newp.comments
CREATE TABLE IF NOT EXISTS `comments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table newp.comments: ~0 rows (approximately)
INSERT INTO `comments` (`id`, `title`, `body`, `email`, `status`, `created_at`, `updated_at`) VALUES
	(2, 'Deserunt obcaecati e', 'Main Gallery note Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facere voluptatibus consequuntur iusto excepturi? Ab qui dolorem consequuntur, sint vitae nam dignissimos, praesentium magnam maiores consectetur nesciunt! Perferendis consequuntur atque suscipit.', 'momoleboq@mailinator.com', 1, '2023-11-14 20:26:14', '2023-11-14 20:26:14');

-- Dumping structure for table newp.couples
CREATE TABLE IF NOT EXISTS `couples` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table newp.couples: ~0 rows (approximately)
INSERT INTO `couples` (`id`, `name`, `note`, `created_at`, `updated_at`) VALUES
	(1, 'Couple Photo Gallery', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facere voluptatibus consequuntur iusto excepturi? Ab qui dolorem consequuntur, sint vitae nam dignissimos, praesentium magnam maiores consectetur nesciunt! Perferendis consequuntur atque suscipit.', '2023-11-14 20:17:47', '2023-11-14 20:17:47');

-- Dumping structure for table newp.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table newp.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table newp.features
CREATE TABLE IF NOT EXISTS `features` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `note1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `note2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `note3` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table newp.features: ~0 rows (approximately)
INSERT INTO `features` (`id`, `name`, `note1`, `note2`, `note3`, `created_at`, `updated_at`) VALUES
	(1, 'Featured in:', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident tenetur voluptatibus placeat, ab ea nulla magni. Sed ratione harum debitis adipisci maiores hic similique totam?', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident tenetur voluptatibus placeat, ab ea nulla magni. Sed ratione harum debitis adipisci maiores hic similique totam?', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident tenetur voluptatibus placeat, ab ea nulla magni. Sed ratione harum debitis adipisci maiores hic similique totam?', '2023-11-14 20:18:30', '2023-11-14 20:18:30');

-- Dumping structure for table newp.free_orders
CREATE TABLE IF NOT EXISTS `free_orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_service_id` json DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('waiting','progress','completed') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `show` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note1` text COLLATE utf8mb4_unicode_ci,
  `note2` text COLLATE utf8mb4_unicode_ci,
  `note3` text COLLATE utf8mb4_unicode_ci,
  `note4` text COLLATE utf8mb4_unicode_ci,
  `note5` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `free_orders_slug_unique` (`slug`),
  UNIQUE KEY `free_orders_phone_unique` (`phone`),
  UNIQUE KEY `free_orders_website_unique` (`website`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table newp.free_orders: ~1 rows (approximately)
INSERT INTO `free_orders` (`id`, `order_service_id`, `slug`, `type`, `show`, `created_at`, `updated_at`, `name`, `email`, `phone`, `website`, `note1`, `note2`, `note3`, `note4`, `note5`) VALUES
	(23, '["1"]', '9683053', NULL, 0, '2023-11-18 19:15:55', '2023-11-18 19:16:29', 'Kibo Burton', 'lyvit@mailinator.com', NULL, 'https://www.miwucuhypeqyv.biz', NULL, NULL, NULL, NULL, NULL);

-- Dumping structure for table newp.free_order_details
CREATE TABLE IF NOT EXISTS `free_order_details` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `free_order_id` bigint unsigned NOT NULL,
  `order_service_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_offer` int DEFAULT NULL,
  `photo_count` int NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `order_status` tinyint unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `free_order_details_free_order_id_foreign` (`free_order_id`),
  CONSTRAINT `free_order_details_free_order_id_foreign` FOREIGN KEY (`free_order_id`) REFERENCES `free_orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table newp.free_order_details: ~0 rows (approximately)
INSERT INTO `free_order_details` (`id`, `free_order_id`, `order_service_id`, `price_offer`, `photo_count`, `total`, `order_status`, `created_at`, `updated_at`) VALUES
	(4, 23, '1', NULL, 1, 50.00, 0, '2023-11-18 19:16:53', '2023-11-18 19:16:53');

-- Dumping structure for table newp.free_order_service_notes
CREATE TABLE IF NOT EXISTS `free_order_service_notes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `free_order_id` bigint unsigned NOT NULL,
  `order_service_id` bigint unsigned NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `free_order_service_notes_free_order_id_foreign` (`free_order_id`),
  KEY `free_order_service_notes_order_service_id_foreign` (`order_service_id`),
  CONSTRAINT `free_order_service_notes_free_order_id_foreign` FOREIGN KEY (`free_order_id`) REFERENCES `free_orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `free_order_service_notes_order_service_id_foreign` FOREIGN KEY (`order_service_id`) REFERENCES `order_services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table newp.free_order_service_notes: ~1 rows (approximately)
INSERT INTO `free_order_service_notes` (`id`, `free_order_id`, `order_service_id`, `notes`, `created_at`, `updated_at`) VALUES
	(1, 23, 1, 'aaaaaaaaaaaa', '2023-11-18 19:16:53', '2023-11-18 19:16:53');

-- Dumping structure for table newp.free_service_images
CREATE TABLE IF NOT EXISTS `free_service_images` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `free_order_id` bigint unsigned NOT NULL,
  `order_service_id` bigint unsigned NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('main','referance') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `free_service_images_free_order_id_foreign` (`free_order_id`),
  KEY `free_service_images_order_service_id_foreign` (`order_service_id`),
  CONSTRAINT `free_service_images_free_order_id_foreign` FOREIGN KEY (`free_order_id`) REFERENCES `free_orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `free_service_images_order_service_id_foreign` FOREIGN KEY (`order_service_id`) REFERENCES `order_services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table newp.free_service_images: ~0 rows (approximately)
INSERT INTO `free_service_images` (`id`, `free_order_id`, `order_service_id`, `image_path`, `type`, `created_at`, `updated_at`) VALUES
	(8, 23, 1, 'Kibo Burton_lyvit@mailinator.com/9683053/Basic/Basic_cuV2WQrU9DStqL0c3J9fVO9vaa5Ynr16XVwqkByD.jpg', 'main', '2023-11-18 19:16:53', '2023-11-18 19:16:53'),
	(9, 23, 1, 'Kibo Burton_lyvit@mailinator.com/9683053/Basic/Basic_reference_EQtfylSjDIhf22OehI1DKeHLz8ejceVG4ScKIgVl.jpg', 'referance', '2023-11-18 19:16:53', '2023-11-18 19:16:53');

-- Dumping structure for table newp.galleries
CREATE TABLE IF NOT EXISTS `galleries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table newp.galleries: ~0 rows (approximately)
INSERT INTO `galleries` (`id`, `name`, `note`) VALUES
	(1, 'Main Gallery', 'Main Gallery note Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facere voluptatibus consequuntur iusto excepturi? Ab qui dolorem consequuntur, sint vitae nam dignissimos, praesentium magnam maiores consectetur nesciunt! Perferendis consequuntur atque suscipit.');

-- Dumping structure for table newp.gallery_images
CREATE TABLE IF NOT EXISTS `gallery_images` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `gallery_id` bigint unsigned NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `gallery_images_gallery_id_foreign` (`gallery_id`),
  CONSTRAINT `gallery_images_gallery_id_foreign` FOREIGN KEY (`gallery_id`) REFERENCES `galleries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table newp.gallery_images: ~12 rows (approximately)
INSERT INTO `gallery_images` (`id`, `gallery_id`, `photo`, `created_at`, `updated_at`) VALUES
	(1, 1, '0DCO1DkeHeCZMeuHVF8FkGVv0OsSDpD2LXGh7ABj.jpg', '2023-11-14 20:24:25', '2023-11-14 20:24:25'),
	(2, 1, 'pJ71IzRkvYk3Y1R6zaUCm1seIA9kXpcHfP9MsPHT.jpg', '2023-11-14 20:24:25', '2023-11-14 20:24:25'),
	(3, 1, 'ATC13kJLO4gfGMVJVNzFw1PasVsg3aiqicv2JVa8.jpg', '2023-11-14 20:24:25', '2023-11-14 20:24:25'),
	(4, 1, '8fu5Hxd2xiuMkDZmHcovKjx4B9KRpovbhKjfdnZj.jpg', '2023-11-14 20:24:25', '2023-11-14 20:24:25'),
	(5, 1, '5PVAvUERWEspvniYaSsIT1Kz3WQKgpcCo3cfai1Y.jpg', '2023-11-14 20:24:25', '2023-11-14 20:24:25'),
	(6, 1, 'hyuhXrSCgdIi2McdSew1ln481lS83CqVevwUGE7v.jpg', '2023-11-14 20:24:25', '2023-11-14 20:24:25'),
	(7, 1, 'd57Fv5zNqROCm06aCdAymhp2Hy02HwhJ9mx1WEiT.jpg', '2023-11-14 20:24:25', '2023-11-14 20:24:25'),
	(8, 1, 'Z9szJ57aXReZCs5IGW7HwLJ5dxoSfHxAJZsaZn5c.jpg', '2023-11-14 20:24:25', '2023-11-14 20:24:25'),
	(9, 1, 'YgEOFMJ6ItTOISdvenwFEKT845EXTxHskEU78aMH.jpg', '2023-11-14 20:24:25', '2023-11-14 20:24:25'),
	(10, 1, 'AyWxOryniQoedubC0GLrs4mrNIaCeLcU7B8e1VXx.jpg', '2023-11-14 20:24:25', '2023-11-14 20:24:25'),
	(11, 1, 'KWHeqADqh4oWdRHnWSxxraOj0r5Z69yfw2FcwMxA.jpg', '2023-11-14 20:24:25', '2023-11-14 20:24:25'),
	(12, 1, '7eqScfBn7fmkzKiz3fTbm9pHjsVqQwsze3T1J8YH.jpg', '2023-11-14 20:24:25', '2023-11-14 20:24:25');

-- Dumping structure for table newp.homes
CREATE TABLE IF NOT EXISTS `homes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `home_compression_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_compression_description` text COLLATE utf8mb4_unicode_ci,
  `service_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_title_colored` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_gallery_description` text COLLATE utf8mb4_unicode_ci,
  `note1` text COLLATE utf8mb4_unicode_ci,
  `note2` text COLLATE utf8mb4_unicode_ci,
  `note3` text COLLATE utf8mb4_unicode_ci,
  `note4` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table newp.homes: ~0 rows (approximately)

-- Dumping structure for table newp.icons
CREATE TABLE IF NOT EXISTS `icons` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table newp.icons: ~0 rows (approximately)

-- Dumping structure for table newp.images
CREATE TABLE IF NOT EXISTS `images` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('main','gallery','gallery_media','home_navigation','home_banner') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'main',
  `imageable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageable_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `images_imageable_type_imageable_id_index` (`imageable_type`,`imageable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table newp.images: ~22 rows (approximately)
INSERT INTO `images` (`id`, `filename`, `type`, `imageable_type`, `imageable_id`, `created_at`, `updated_at`) VALUES
	(5, 'slide-1700000095.jpg', 'main', 'App\\Models\\Slide', 3, '2023-11-14 20:14:55', '2023-11-14 20:14:55'),
	(6, 'partner-1700000398.png', 'main', 'App\\Models\\Partner', 1, '2023-11-14 20:19:58', '2023-11-14 20:19:58'),
	(7, 'partner-1700000407.png', 'main', 'App\\Models\\Partner', 2, '2023-11-14 20:20:07', '2023-11-14 20:20:07'),
	(8, 'partner-1700000416.png', 'main', 'App\\Models\\Partner', 3, '2023-11-14 20:20:16', '2023-11-14 20:20:16'),
	(9, 'partner-1700000427.png', 'main', 'App\\Models\\Partner', 4, '2023-11-14 20:20:27', '2023-11-14 20:20:27'),
	(10, 'partner-1700000441.png', 'main', 'App\\Models\\Partner', 5, '2023-11-14 20:20:41', '2023-11-14 20:20:41'),
	(11, 'partner-1700000452.png', 'main', 'App\\Models\\Partner', 6, '2023-11-14 20:20:52', '2023-11-14 20:20:52'),
	(12, 'partner-1700000464.png', 'main', 'App\\Models\\Partner', 7, '2023-11-14 20:21:04', '2023-11-14 20:21:04'),
	(13, 'slide-1700000747.jpg', 'main', 'App\\Models\\Slide', 2, '2023-11-14 20:25:47', '2023-11-14 20:25:47'),
	(14, 'about-1700000898.png', 'main', 'App\\Models\\About', 1, '2023-11-14 20:28:18', '2023-11-14 20:28:18'),
	(15, 'service-1700001449.jpg', 'main', 'App\\Models\\Service', 1, '2023-11-14 20:37:29', '2023-11-14 20:37:29'),
	(16, 'service-1700001468.jpg', 'main', 'App\\Models\\Service', 2, '2023-11-14 20:37:48', '2023-11-14 20:37:48'),
	(17, 'service-1700001484.jpg', 'main', 'App\\Models\\Service', 3, '2023-11-14 20:38:04', '2023-11-14 20:38:04'),
	(18, 'service-1700001498.jpg', 'main', 'App\\Models\\Service', 4, '2023-11-14 20:38:18', '2023-11-14 20:38:18'),
	(19, 'service-1700001520.jpg', 'main', 'App\\Models\\Service', 5, '2023-11-14 20:38:40', '2023-11-14 20:38:40'),
	(20, 'service-1700001534.jpg', 'main', 'App\\Models\\Service', 6, '2023-11-14 20:38:54', '2023-11-14 20:38:54'),
	(21, 'service-1700001587.jpg', 'main', 'App\\Models\\Service', 8, '2023-11-14 20:39:47', '2023-11-14 20:39:47'),
	(22, 'service-1700001604.jpg', 'main', 'App\\Models\\Service', 7, '2023-11-14 20:40:04', '2023-11-14 20:40:04'),
	(23, 'slider-1700001695.jpg', 'main', 'App\\Models\\Slider', 1, '2023-11-14 20:41:35', '2023-11-14 20:41:35'),
	(24, 'slider-1700001717.jpg', 'main', 'App\\Models\\Slider', 2, '2023-11-14 20:41:57', '2023-11-14 20:41:57'),
	(25, 'retouchservice-1700002946.jpg', 'main', 'App\\Models\\RetouchService', 1, '2023-11-14 21:02:26', '2023-11-14 21:02:26'),
	(26, 'retouchservice-1700002960.jpg', 'main', 'App\\Models\\RetouchService', 2, '2023-11-14 21:02:40', '2023-11-14 21:02:40'),
	(27, 'retouchservice-1700002975.jpg', 'main', 'App\\Models\\RetouchService', 3, '2023-11-14 21:02:55', '2023-11-14 21:02:55');

-- Dumping structure for table newp.img_extensions
CREATE TABLE IF NOT EXISTS `img_extensions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ext` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table newp.img_extensions: ~2 rows (approximately)
INSERT INTO `img_extensions` (`id`, `ext`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'jpg', 'JPEG Image', '2023-11-14 19:04:29', '2023-11-14 19:04:29'),
	(2, 'png', 'PNG Image', '2023-11-14 19:04:29', '2023-11-14 19:04:29'),
	(3, 'txt', 'فءف', '2023-11-14 22:47:32', '2023-11-14 22:47:32');

-- Dumping structure for table newp.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table newp.migrations: ~33 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2023_09_10_073647_create_admins_table', 1),
	(6, '2023_09_11_111501_create_settings_table', 1),
	(7, '2023_09_11_111515_create_sliders_table', 1),
	(8, '2023_09_11_111535_create_sections_table', 1),
	(9, '2023_09_11_111542_create_blogs_table', 1),
	(10, '2023_09_11_111556_create_services_table', 1),
	(11, '2023_09_11_111607_create_packages_table', 1),
	(12, '2023_09_13_082427_create_homes_table', 1),
	(13, '2023_09_17_111839_create_icons_table', 1),
	(14, '2023_09_17_211257_create_abouts_table', 1),
	(15, '2023_09_19_090602_create_galleries_table', 1),
	(16, '2023_09_19_132023_create_partners_table', 1),
	(17, '2023_09_20_121226_create_images_table', 1),
	(18, '2023_10_03_104839_create_retouch_services_table', 1),
	(19, '2023_10_03_114732_create_retouches_table', 1),
	(20, '2023_10_03_175406_create_order_services_table', 1),
	(21, '2023_10_04_130621_create_orders_table', 1),
	(22, '2023_10_04_194830_add_status_to_orders_table', 1),
	(23, '2023_10_06_195210_create_order_details_table', 1),
	(24, '2023_10_06_195803_create_order_service_times_table', 1),
	(25, '2023_10_06_195804_create_order_service_note_table', 1),
	(26, '2023_10_06_200604_create_service_image_table', 1),
	(27, '2023_11_03_151627_create_img_extensions_table', 1),
	(28, '2023_11_05_104610_create_gallery_images_table', 1),
	(30, '2023_11_14_145808_create_couples_table', 1),
	(31, '2023_11_14_151327_create_features_table', 1),
	(32, '2023_11_14_203037_create_comments_table', 1),
	(33, '2023_11_14_211146_create_slides_table', 2),
	(35, '2023_11_14_142735_create_buttons_table', 3),
	(36, '2023_11_18_121447_add_columns_table', 4),
	(42, '2023_11_18_160715_create_free_orders_table', 5),
	(43, '2023_11_18_160728_create_free_order_details_table', 5),
	(44, '2023_11_18_162915_create_free_service_images_table', 5),
	(46, '2023_11_18_182853_add_columns_to_free_orders_table', 6),
	(47, '2023_11_18_204653_create_free_order_service_notes_table', 7);

-- Dumping structure for table newp.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `retouch_id` bigint unsigned DEFAULT NULL,
  `order_service_id` json DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` enum('waiting','progress','completed') COLLATE utf8mb4_unicode_ci NOT NULL,
  `show` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `orders_slug_unique` (`slug`),
  KEY `orders_user_id_foreign` (`user_id`),
  KEY `orders_retouch_id_foreign` (`retouch_id`),
  CONSTRAINT `orders_retouch_id_foreign` FOREIGN KEY (`retouch_id`) REFERENCES `retouches` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table newp.orders: ~3 rows (approximately)
INSERT INTO `orders` (`id`, `user_id`, `retouch_id`, `order_service_id`, `slug`, `created_at`, `updated_at`, `type`, `show`) VALUES
	(1, 1, 2, NULL, '2622328', '2023-11-14 22:00:14', '2023-11-14 22:00:14', 'waiting', 0),
	(2, 1, 2, '["1"]', '6862478', '2023-11-14 22:16:22', '2023-11-14 22:16:26', 'waiting', 0),
	(3, 1, 2, '["1"]', '8373993', '2023-11-14 22:18:41', '2023-11-14 22:18:45', 'completed', 0),
	(4, 1, 2, '["1"]', '3467715', '2023-11-14 22:47:43', '2023-11-14 22:47:48', 'waiting', 0),
	(5, 1, 2, '["1"]', '7327171', '2023-11-17 10:21:58', '2023-11-17 10:56:29', 'waiting', 0),
	(6, 1, 2, '["1"]', '9835881', '2023-11-17 11:29:11', '2023-11-17 11:29:29', 'waiting', 0),
	(7, 1, 2, '["1"]', '6030254', '2023-11-17 14:52:33', '2023-11-17 14:52:38', 'waiting', 0);

-- Dumping structure for table newp.order_details
CREATE TABLE IF NOT EXISTS `order_details` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint unsigned NOT NULL,
  `order_service_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_offer` int DEFAULT NULL,
  `photo_count` int NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `order_status` tinyint unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_details_order_id_foreign` (`order_id`),
  CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table newp.order_details: ~2 rows (approximately)
INSERT INTO `order_details` (`id`, `order_id`, `order_service_id`, `price_offer`, `photo_count`, `total`, `order_status`, `created_at`, `updated_at`) VALUES
	(1, 2, '1', 1, 1, 50.00, 0, '2023-11-14 22:16:57', '2023-11-14 22:16:57'),
	(2, 3, '1', 1, 1, 60.00, 1, '2023-11-14 22:19:07', '2023-11-14 22:19:26'),
	(3, 4, '1', 2, 1, 65.00, 0, '2023-11-14 22:48:24', '2023-11-14 22:48:24'),
	(4, 5, '1', 1, 1, 60.00, 0, '2023-11-17 11:28:07', '2023-11-17 11:28:07');

-- Dumping structure for table newp.order_services
CREATE TABLE IF NOT EXISTS `order_services` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table newp.order_services: ~2 rows (approximately)
INSERT INTO `order_services` (`id`, `name`, `price`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Basic', '50', 1, '2023-11-14 21:01:39', '2023-11-14 21:01:39'),
	(2, 'Advanced', '100', 1, '2023-11-14 21:01:55', '2023-11-14 21:01:55');

-- Dumping structure for table newp.order_service_note
CREATE TABLE IF NOT EXISTS `order_service_note` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint unsigned NOT NULL,
  `order_service_id` bigint unsigned NOT NULL,
  `order_service_time_id` bigint unsigned DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_service_note_order_id_foreign` (`order_id`),
  KEY `order_service_note_order_service_id_foreign` (`order_service_id`),
  KEY `order_service_note_order_service_time_id_foreign` (`order_service_time_id`),
  CONSTRAINT `order_service_note_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `order_service_note_order_service_id_foreign` FOREIGN KEY (`order_service_id`) REFERENCES `order_services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `order_service_note_order_service_time_id_foreign` FOREIGN KEY (`order_service_time_id`) REFERENCES `order_service_times` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table newp.order_service_note: ~2 rows (approximately)
INSERT INTO `order_service_note` (`id`, `order_id`, `order_service_id`, `order_service_time_id`, `notes`, `created_at`, `updated_at`) VALUES
	(1, 2, 1, 1, 'zzzzzz', '2023-11-14 22:16:57', '2023-11-14 22:16:57'),
	(2, 3, 1, 1, 'aaaaaaaa', '2023-11-14 22:19:07', '2023-11-14 22:19:07'),
	(3, 4, 1, 2, 'aaaaaaaa', '2023-11-14 22:48:24', '2023-11-14 22:48:24'),
	(4, 5, 1, 1, 'qqqqqqqqqqq', '2023-11-17 11:28:07', '2023-11-17 11:28:07');

-- Dumping structure for table newp.order_service_times
CREATE TABLE IF NOT EXISTS `order_service_times` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `price` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table newp.order_service_times: ~3 rows (approximately)
INSERT INTO `order_service_times` (`id`, `name`, `notes`, `status`, `price`, `created_at`, `updated_at`) VALUES
	(1, 'Time 1 $10', 'Notes for Time 1', 1, 10, NULL, NULL),
	(2, 'Time 2', 'Notes for Time 2', 1, 15, NULL, NULL),
	(3, 'Time 3', 'Notes for Time 3', 1, 20, NULL, NULL);

-- Dumping structure for table newp.packages
CREATE TABLE IF NOT EXISTS `packages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `service_id` bigint unsigned NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `packages_service_id_foreign` (`service_id`),
  CONSTRAINT `packages_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table newp.packages: ~2 rows (approximately)
INSERT INTO `packages` (`id`, `service_id`, `name`, `notes`, `status`, `created_at`, `updated_at`) VALUES
	(1, 2, 'Derick Rogahn', 'Et qui aut in. Voluptatem dolores dolores minima ut sapiente sit cum voluptatem. Nam dolorem voluptatem omnis.', 0, '2023-11-14 19:04:29', '2023-11-14 19:04:29'),
	(2, 1, 'Mr. Darius Pouros', 'Odio facilis quis minima. Dicta aut id aut sit. Architecto odio et assumenda distinctio beatae.', 1, '2023-11-14 19:04:29', '2023-11-14 19:04:29');

-- Dumping structure for table newp.partners
CREATE TABLE IF NOT EXISTS `partners` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table newp.partners: ~6 rows (approximately)
INSERT INTO `partners` (`id`, `status`, `created_at`, `updated_at`) VALUES
	(1, 1, '2023-11-14 20:19:58', '2023-11-14 20:19:58'),
	(2, 1, '2023-11-14 20:20:07', '2023-11-14 20:20:07'),
	(3, 1, '2023-11-14 20:20:16', '2023-11-14 20:20:16'),
	(4, 1, '2023-11-14 20:20:27', '2023-11-14 20:20:27'),
	(5, 1, '2023-11-14 20:20:41', '2023-11-14 20:20:41'),
	(6, 1, '2023-11-14 20:20:52', '2023-11-14 20:20:52'),
	(7, 1, '2023-11-14 20:21:04', '2023-11-14 20:21:04');

-- Dumping structure for table newp.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table newp.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table newp.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table newp.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table newp.retouches
CREATE TABLE IF NOT EXISTS `retouches` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `retouch_service_id` bigint unsigned NOT NULL,
  `retouching_note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `retouches_user_id_foreign` (`user_id`),
  KEY `retouches_retouch_service_id_foreign` (`retouch_service_id`),
  CONSTRAINT `retouches_retouch_service_id_foreign` FOREIGN KEY (`retouch_service_id`) REFERENCES `retouch_services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `retouches_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table newp.retouches: ~1 rows (approximately)
INSERT INTO `retouches` (`id`, `user_id`, `retouch_service_id`, `retouching_note`, `created_at`, `updated_at`) VALUES
	(2, 1, 3, 'aaaaaaaaMed111111111111111aaaaaaaaaaaaaaarrrrrrrrrrrrrhhhhhhhhhhhhhhhhhhhhhhh', '2023-11-14 21:34:05', '2023-11-16 04:44:40');

-- Dumping structure for table newp.retouch_services
CREATE TABLE IF NOT EXISTS `retouch_services` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table newp.retouch_services: ~2 rows (approximately)
INSERT INTO `retouch_services` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Slight', 1, '2023-11-14 21:02:26', '2023-11-14 21:02:26'),
	(2, 'Med', 1, '2023-11-14 21:02:40', '2023-11-14 21:02:40'),
	(3, 'Heavy', 1, '2023-11-14 21:02:55', '2023-11-14 21:02:55');

-- Dumping structure for table newp.sections
CREATE TABLE IF NOT EXISTS `sections` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table newp.sections: ~2 rows (approximately)
INSERT INTO `sections` (`id`, `name`, `notes`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Dennis Quitzon', 'Illum fuga non laboriosam officiis. Laudantium ut dolorem est mollitia in ut aut.', 1, '2023-11-14 19:04:28', '2023-11-14 19:04:28'),
	(2, 'Rosa Kessler', 'Aut rerum sed harum accusantium corporis et sed. Similique harum accusamus sint rerum mollitia.', 1, '2023-11-14 19:04:28', '2023-11-14 19:04:28');

-- Dumping structure for table newp.services
CREATE TABLE IF NOT EXISTS `services` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table newp.services: ~8 rows (approximately)
INSERT INTO `services` (`id`, `name`, `price`, `notes`, `status`, `created_at`, `updated_at`, `url`) VALUES
	(1, 'Hayley Jacobi I', '57', 'Laborum voluptas accusantium qui nihil assumenda. Impedit quia aliquam repellendus et distinctio ipsam. Excepturi numquam dolores asperiores tempora impedit asperiores.', 1, '2023-11-14 19:04:29', '2023-11-14 19:04:29', ''),
	(2, 'Mack Grant III', '32', 'Animi eius dolorum aut minima asperiores quaerat. Explicabo omnis dicta at alias excepturi consequuntur. Distinctio doloribus animi officia deleniti. Eum cum quasi nihil nemo velit consequuntur aperiam.', 1, '2023-11-14 19:04:29', '2023-11-14 19:04:29', NULL),
	(3, 'Brando Carroll MD', '51', 'Incidunt et ab rem nihil et aliquid. Assumenda voluptas dolores consequatur culpa reprehenderit id. Qui autem sed placeat. Ut vitae architecto consequuntur omnis qui.', 1, '2023-11-14 19:04:29', '2023-11-14 19:04:29', NULL),
	(4, 'Dr. Joanie Orn Sr.', '12', 'Pariatur eveniet quae fugiat. Veniam repellendus error tempora aliquid deleniti ea aut. Id hic officiis suscipit quibusdam sapiente. Asperiores nihil voluptatem cumque temporibus.', 1, '2023-11-14 19:04:29', '2023-11-14 19:04:29', NULL),
	(5, 'Jeanie Senger', '14', 'Dolor nesciunt consequuntur tempore sint repellendus. Nihil soluta eligendi sed ut nemo. Earum dolores id iste tempora laboriosam soluta necessitatibus. Dolores distinctio distinctio et consectetur nam provident omnis.', 1, '2023-11-14 19:04:29', '2023-11-14 19:04:29', NULL),
	(6, 'Kaleigh Mann MD', '26', 'Eveniet itaque maxime consequatur. Perferendis natus commodi porro eos voluptas. Velit eaque qui minima quibusdam. Consequatur suscipit earum ut aperiam aut et suscipit. Itaque quos maiores dignissimos est rerum quia porro.', 1, '2023-11-14 19:04:29', '2023-11-14 19:04:29', NULL),
	(7, 'Napol', '39', 'Blanditiis autem ad vitae voluptas nesciunt. Nam incidunt deserunt magni aliquam et. Eum omnis veniam et fugit vitae magni. Pariatur ipsa dolorum reiciendis consequatur repellendus iusto ut id.', 1, '2023-11-14 19:04:29', '2023-11-14 20:40:58', NULL),
	(8, 'Mr. Joh', '34', 'Nesciunt rerum debitis magni aut. Sed qui dolorum omnis aspernatur et ut. Est rerum nisi est error quo earum. Debitis vel sunt minus impedit nesciunt laudantium dolores.', 1, '2023-11-14 19:04:29', '2023-11-14 20:40:38', NULL);

-- Dumping structure for table newp.service_image
CREATE TABLE IF NOT EXISTS `service_image` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint unsigned NOT NULL,
  `order_service_id` bigint unsigned NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('main','referance') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `service_image_order_id_foreign` (`order_id`),
  KEY `service_image_order_service_id_foreign` (`order_service_id`),
  CONSTRAINT `service_image_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `service_image_order_service_id_foreign` FOREIGN KEY (`order_service_id`) REFERENCES `order_services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table newp.service_image: ~2 rows (approximately)
INSERT INTO `service_image` (`id`, `order_id`, `order_service_id`, `image_path`, `type`, `created_at`, `updated_at`) VALUES
	(1, 2, 1, 'Normal User/6862478/Basic/Basic_yASvxDLGTOlZdmnHzjWrmKlvKVOZinFcKZ9AtHTA.png', 'main', '2023-11-14 22:16:57', '2023-11-14 22:16:57'),
	(2, 3, 1, 'Normal User/8373993/Basic/Basic_C695JAZZSr9tuioOBRawnb6PSEzxewGpFHYm0EEw.png', 'main', '2023-11-14 22:19:07', '2023-11-14 22:19:07'),
	(3, 4, 1, 'Normal User/3467715/Basic/Basic_1z2czF8NM3SYdVQ6ZhB8pBxXgajTaaQl9kSoVm9I.txt', 'main', '2023-11-14 22:48:24', '2023-11-14 22:48:24'),
	(4, 5, 1, 'Normal User/7327171/Basic/Basic_RthSUlfuBjCzIdIhxWCI1Gu5RTxFDek4ghmOrsQX.jpg', 'main', '2023-11-17 11:28:07', '2023-11-17 11:28:07');

-- Dumping structure for table newp.settings
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_unicode_ci,
  `phone` text COLLATE utf8mb4_unicode_ci,
  `whatsapp` text COLLATE utf8mb4_unicode_ci,
  `email` text COLLATE utf8mb4_unicode_ci,
  `facebook` text COLLATE utf8mb4_unicode_ci,
  `twitter` text COLLATE utf8mb4_unicode_ci,
  `instagram` text COLLATE utf8mb4_unicode_ci,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `notes1` text COLLATE utf8mb4_unicode_ci,
  `notes2` text COLLATE utf8mb4_unicode_ci,
  `notes3` text COLLATE utf8mb4_unicode_ci,
  `notes4` text COLLATE utf8mb4_unicode_ci,
  `notes5` text COLLATE utf8mb4_unicode_ci,
  `notes6` text COLLATE utf8mb4_unicode_ci,
  `notes7` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table newp.settings: ~0 rows (approximately)
INSERT INTO `settings` (`id`, `name`, `phone`, `whatsapp`, `email`, `facebook`, `twitter`, `instagram`, `notes`, `notes1`, `notes2`, `notes3`, `notes4`, `notes5`, `notes6`, `notes7`, `created_at`, `updated_at`) VALUES
	(1, 'Gerald Wilkinson', '1-586-531-8361', '+1 (424) 888-0848', 'hane.gunnar@hotmail.com', 'http://www.predovic.com/qui-corporis-officia-ullam-est-autem-voluptas.html', 'http://www.hoeger.com/tenetur-voluptas-sunt-labore-laborum-modi-est', 'http://mraz.org/laudantium-unde-qui-est-mollitia-ratione-ipsum-cum', 'Nihil hic saepe velit optio temporibus. Maxime atque accusamus officiis aut sed voluptas ut. Voluptatem error adipisci et nam.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-14 19:04:27', '2023-11-14 19:04:27');

-- Dumping structure for table newp.sliders
CREATE TABLE IF NOT EXISTS `sliders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table newp.sliders: ~2 rows (approximately)
INSERT INTO `sliders` (`id`, `name`, `notes`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Aisha Krajcik', 'Id nisi repellat sapiente nesciunt. Voluptas distinctio est enim sit et quo blanditiis neque. Sint eligendi possimus quis est quaerat qui.', 1, '2023-11-14 19:04:28', '2023-11-14 20:42:22'),
	(2, 'Adrienne Hand', 'Consectetur aut ullam adipisci neque non. Earum aliquid consequuntur autem voluptas ab est earum. Quaerat animi explicabo quis aut. Sint et sit repellendus natus nulla.', 1, '2023-11-14 19:04:28', '2023-11-14 20:41:57');

-- Dumping structure for table newp.slides
CREATE TABLE IF NOT EXISTS `slides` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_unicode_ci,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note1` text COLLATE utf8mb4_unicode_ci,
  `note2` text COLLATE utf8mb4_unicode_ci,
  `note3` text COLLATE utf8mb4_unicode_ci,
  `note4` text COLLATE utf8mb4_unicode_ci,
  `note5` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table newp.slides: ~2 rows (approximately)
INSERT INTO `slides` (`id`, `name`, `notes`, `status`, `created_at`, `updated_at`, `url`, `note1`, `note2`, `note3`, `note4`, `note5`) VALUES
	(2, 'slide', 'Main Gallery note Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facere voluptatibus consequuntur iusto excepturi? Ab qui dolorem consequuntur, sint vitae nam dignissimos, praesentium magnam maiores consectetur nesciunt! Perferendis consequuntur atque suscipit.', 1, '2023-11-14 20:09:25', '2023-11-14 20:27:05', NULL, NULL, NULL, NULL, NULL, NULL),
	(3, 'slide2', 'slide2 note', 1, '2023-11-14 20:14:55', '2023-11-14 20:14:55', NULL, NULL, NULL, NULL, NULL, NULL);

-- Dumping structure for table newp.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('user','general') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table newp.users: ~2 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `type`, `status`, `email_verified_at`, `password`, `phone`, `remember_token`, `created_at`, `updated_at`, `website`) VALUES
	(1, 'Normal User', 'user@app.com', 'user', 1, NULL, '$2y$10$AVL7zhlFow31.erEJfe73Ofz.OBCDhHbdsInNREBaKqmTsfCAyuDa', NULL, NULL, '2023-11-14 19:04:26', '2023-11-14 19:04:26', NULL),
	(2, 'General User', 'general@app.com', 'general', 1, NULL, '$2y$10$P3g9hgJY.NU31tJKwMStdOVu8hF2yK5DTcRdjGIZMJcdxDS1Yhpi2', NULL, NULL, '2023-11-14 19:04:26', '2023-11-14 19:04:26', NULL),
	(3, 'xxxxxxxxx', 'x@x.com', 'user', 1, NULL, '$2y$10$lWdrKEzt.gf98WP9lu0veOH0BQnUnQU8GooEIlvHUlv8yA1nO3k7y', NULL, NULL, '2023-11-18 12:09:39', '2023-11-18 12:15:07', 'aaaaaa.com');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
