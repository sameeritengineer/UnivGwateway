CREATE TABLE `master_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `master_categories`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `master_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;
INSERT INTO `master_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES (NULL, 'Testing 1', '2020-04-27 00:00:00', NULL), (NULL, 'Testing 2', '2020-04-27 00:00:00', NULL);
ALTER TABLE `master_categories` ADD `status` INT(1) NOT NULL DEFAULT '1' AFTER `name`;
ALTER TABLE `master_service` ADD `category_id` INT(11) NOT NULL AFTER `id`;
ALTER TABLE `master_service` CHANGE `name` `service_name` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL;
ALTER TABLE `master_service` CHANGE `price` `deliverables` TEXT NULL DEFAULT NULL;
ALTER TABLE `master_service` ADD `gst_rate` VARCHAR(255) NOT NULL AFTER `image`;
ALTER TABLE `master_service` ADD `parent_id` INT(11) NOT NULL DEFAULT '0' AFTER `category_id`, ADD `service_type` VARCHAR(25) NOT NULL AFTER `parent_id`;
ALTER TABLE `master_service` ADD `sort` INT(11) NOT NULL DEFAULT '0' AFTER `gst_rate`;
CREATE TABLE `master_service_price` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` int(12) NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
ALTER TABLE `master_service_price`
  ADD PRIMARY KEY (`id`);
  --
ALTER TABLE `master_service_price`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;