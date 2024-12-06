CREATE DATABASE php_store;

USE php_store;


CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(1, 'Vestidos', NULL),
(2, 'Pantalones y Jeans', NULL),
(3, 'Bragas', NULL),
(4, 'Trajes de Baños', NULL),
(5, 'Chaquetas y Suéteres', NULL),
(6, 'Shorts y Faldas', NULL),
(7, 'Blusas y Tops', NULL),
(8, 'Accesorios', NULL),
(9, 'Pijamas y Lencería', NULL),
(10, 'Ropa Deportiva', NULL);



CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_phone` varchar(20) NOT NULL,
  `customer_address` text NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `orders` (`id`, `customer_name`, `customer_phone`, `customer_address`, `total_amount`, `created_at`) VALUES
(1, 'joel', '04141944144', 'Calle 3', 62.00, '2024-12-06 15:02:16'),
(2, 'joel', '04141944144', 'Calle 3', 62.00, '2024-12-06 15:02:30'),
(3, 'joel', '04141944144', 'Calle 3', 62.00, '2024-12-06 15:07:24'),
(4, 'jose', '04245678900', 'el Valle', 24.00, '2024-12-06 15:08:33'),
(5, 'joalis', '04142256789', 'Petare', 55.00, '2024-12-06 15:12:28'),
(6, 'manuel', '04245689076', 'La Urbina', 62.00, '2024-12-06 15:35:48'),
(7, 'grecia', '0424879906', 'tachira', 62.00, '2024-12-06 16:47:18');


CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(1, 3, 2, 1, 12.00),
(2, 3, 3, 1, 25.00),
(3, 3, 8, 1, 25.00),
(4, 4, 2, 1, 12.00),
(5, 4, 18, 1, 12.00),
(6, 5, 9, 1, 28.00),
(7, 5, 16, 1, 12.00),
(8, 5, 26, 1, 15.00),
(9, 6, 2, 1, 12.00),
(10, 6, 3, 1, 25.00),
(11, 6, 8, 1, 25.00),
(12, 7, 2, 1, 12.00),
(13, 7, 3, 1, 25.00),
(14, 7, 11, 1, 25.00);


CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `products` (`id`, `name`, `description`, `price`, `stock`, `image`, `category_id`) VALUES
(2, 'Lenceria', 'Size:\r\nM', 12.00, 3, 'images/product.jpeg', 9),
(3, 'Jeans', 'Size: \r\n5-6', 25.00, 3, 'images/product2.jpeg', 2),
(8, 'Sueter Tejido', 'Size:\r\nS', 25.00, 1, 'images/product28.jpeg', 5),
(9, 'Vestido Largo', 'Size:\r\nL', 28.00, 3, 'images/product29.jpeg', 1),
(10, 'Set negro manga larga', 'Size:\r\nL', 25.00, 2, 'images/product30.jpeg', 3),
(11, 'Vestido', 'Size:\r\nM', 25.00, 1, 'images/product31.jpeg', 1),
(12, 'Vestido Globo', 'Size:\r\nM', 28.00, 2, 'images/product32.jpeg', 1),
(13, 'Vestido Globo', 'Size:\r\nM', 28.00, 2, 'images/product3.jpeg', 1),
(14, 'Top', 'Size: \r\nUica', 10.00, 2, 'images/product4.jpeg', 7),
(15, 'Lenceria', 'Size:\r\nS', 12.00, 3, 'images/product5.jpeg', 9),
(16, 'Lenceria', 'Size:\r\nS', 12.00, 3, 'images/product6.jpeg', 9),
(17, 'Lenceria', 'Size:\r\nL', 12.00, 2, 'images/product7.jpeg', 9),
(18, 'Lenceria', 'Size:\r\nL', 12.00, 1, 'images/product8.jpeg', 9),
(19, 'Lenceria', 'Size:\r\nM', 12.00, 2, 'images/product9.jpeg', 9),
(20, 'Top asimetrico', 'Size: \r\nUnica', 12.00, 3, 'images/product10.jpeg', 7),
(21, 'Camisa Oversize', 'Size:\r\nUnica', 20.00, 2, 'images/product11.jpeg', 7),
(22, 'Traje de Baño', 'Size:\r\nS', 15.00, 3, 'images/product20.jpeg', 4),
(23, 'Set de Rayas', 'Size:\r\nM', 25.00, 8, 'images/product21.jpeg', 3),
(24, 'Traje de Baño', 'Size:\r\nS', 15.00, 2, 'images/product22.jpeg', 4),
(25, 'Traje de Baño', 'Size:\r\nL', 15.00, 2, 'images/product23.jpeg', 4),
(26, 'Traje de Baño', 'Size:\r\nL', 15.00, 2, 'images/product24.jpeg', 4),
(27, 'Bermuda de Jean', 'Size:\r\nM', 20.00, 6, 'images/product25.jpeg', 6),
(38, 'Camisa manga larga', 'Size:\r\nM', 18.00, 3, 'images/product12.jpeg', 7),
(39, 'Braga Casual', 'Size:\r\nM', 25.00, 2, 'images/product13.jpeg', 3),
(40, 'Top', 'Size:\r\nS', 10.00, 2, 'images/product14.jpeg', 7),
(41, 'Sueter Tejido', 'Size:\r\nS', 25.00, 3, 'images/product15.jpeg', 5),
(42, 'Maxi Dress', 'Size:\r\nM', 20.00, 2, 'images/product16.jpeg', 1),
(43, 'Sueter Tejido', 'Size: \r\nM', 25.00, 3, 'images/product17.jpeg', 5),
(44, 'Jeans Brillos', 'Size:\r\n7-8, 9-10', 25.00, 2, 'images/product18.jpeg', 2),
(45, 'Collar Playero', 'Size:\r\nUnica', 5.00, 2, 'images/product19.jpeg', 8),
(63, 'Camisa de Vestir', 'Size:\r\nS', 20.00, 2, 'images/product33.jpeg', 7),
(64, 'Chaleco', 'Size:\r\nL', 15.00, 5, 'images/product34.jpeg', 7),
(65, 'Koala', 'Koala deportivo', 6.00, 1, 'images/product35.jpeg', 10),
(66, 'Cinturon', 'Size:\r\nUnica', 5.00, 2, 'images/product36.jpeg', 8),
(67, 'Antifaz', 'Negro', 4.00, 1, 'images/product37.jpeg', 8),
(68, 'Antifaz', 'Plateado', 4.00, 3, 'images/product39.jpeg', 8),
(69, 'Porta Cosmeticos', '', 5.00, 4, 'images/product40.jpeg', 8),
(70, 'Mini Bolso', 'Mini bolso negro', 12.00, 3, 'images/product41.jpeg', 8),
(71, 'Peineta', 'Peinetas para el pelo', 2.00, 10, 'images/product42.jpeg', 8),
(72, 'Sueter Basico', 'Sueter deportivo\r\nSize:\r\nM', 14.00, 3, 'images/product43.jpeg', 10),
(73, 'Bermuda de Jean', 'Size:\r\nS', 20.00, 2, 'images/product26.jpeg', 6),
(74, 'Short', 'Size:\r\nL', 18.00, 2, 'images/product27.jpeg', 6),
(77, 'Antifaz', 'Rosado', 4.00, 2, 'images/product38.jpeg', 8);



CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'Jacosta07', 'joelacosta712@gmail.com', '$2y$10$swwlNxWYiVK275wuLRuGheLYV1yYlEVRlZX48rIMJJpbQ5c.A4JLK', '2024-12-06 15:44:59'),
(2, 'yel_acce', 'joelacostaleon@gmail.com', '$2y$10$GDbWm0P1M8Y2NzUVZaiY1ewdgcnZXHNEPHylqzFpnRVESuX3/6TAu', '2024-12-06 15:48:21');


ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);


ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);


ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);


ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;


ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;


ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;


ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;


ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);


ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;


