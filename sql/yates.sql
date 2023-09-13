-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2023 at 10:06 PM
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
-- Database: `yates`
--

-- --------------------------------------------------------

--
-- Table structure for table `accesories`
--

CREATE TABLE `accesories` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `info` text NOT NULL,
  `img` text NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accesories`
--

INSERT INTO `accesories` (`id`, `name`, `info`, `img`, `price`, `quantity`, `date`) VALUES
(1, 'Plataformas de baño extensibles', 'Las plataformas de baño extensibles son accesorios que se pueden extender desde la parte trasera del yate. Proporcionan un espacio adicional para nadar, bucear o embarcar en actividades acuáticas. También facilitan el acceso al agua y suelen tener escaleras incorporadas.', 'https://www.promonautica.com/2837-large_default/plataforma-de-bano-inox-600x500mm.jpg', 1000, 0, '2023-08-25 18:03:46'),
(2, 'Equipo de deportes acuáticos', 'Esto puede incluir jet skis, tablas de paddle surf, equipos de buceo, kayaks y más. Estos accesorios brindan a los amantes de los deportes acuáticos la oportunidad de disfrutar de actividades emocionantes mientras están en el yate.', 'https://www.caribbeanprodive.com/wp-content/uploads/2019/12/equipo-de-buceo.jpg', 1000, 11, '2023-08-25 18:04:24'),
(3, 'Sistema de sonido marino', ' Los sistemas de sonido marino están diseñados específicamente para su uso en entornos marinos. Ofrecen una calidad de sonido excepcional y durabilidad, permitiendo a los pasajeros disfrutar de música de alta calidad mientras navegan.', 'https://www.revistadecaraudio.com/wp-content/uploads/2019/06/audiomarino_mexico_caraudio_audioonline.jpg', 1000, 2, '2023-08-25 18:05:00'),
(4, 'Sistema de entretenimiento', 'Los sistemas de entretenimiento pueden incluir televisores de pantalla plana, reproductores de DVD, sistemas de cine en casa y más. Estos accesorios ofrecen entretenimiento a bordo para aquellos momentos en que los pasajeros desean relajarse en el interior.', 'https://martclub.in/wp-content/uploads/2023/05/10-Best-16-min.png', 1000, 3, '2023-08-25 18:05:49'),
(5, 'Luces LED submarinas', 'Las luces LED submarinas se instalan en la parte inferior del yate y proporcionan iluminación subacuática. No solo añaden un toque estético al yate, sino que también permiten la observación de la vida marina y la natación nocturna.', 'https://m.media-amazon.com/images/I/712a7gjsUGL._AC_UF894,1000_QL80_.jpg', 1000, 4, '2023-08-31 00:56:46'),
(6, 'Sistema de estabilización', 'Los sistemas de estabilización ayudan a reducir el balanceo del yate en aguas turbulentas, proporcionando una experiencia más suave y cómoda para los pasajeros. Pueden ser sistemas activos (como aletas estabilizadoras) o pasivos (como quillas).', 'http://www.fondear.org/infonautic/Equipo_y_Usos/Equipamiento/Giroscopo/ARG_02.jpg', 1000, 4, '2023-08-25 18:07:06'),
(7, 'Generadores de energía', 'Los generadores de energía a bordo proporcionan electricidad para alimentar sistemas y dispositivos en el yate, como iluminación, electrodomésticos, sistemas de climatización y más, incluso cuando el yate no está conectado a tierra.', 'http://www.navegar.com/wp-content/uploads/2014/09/generador.jpg', 1000, 6, '2023-08-25 18:07:35'),
(8, 'Cubiertas retráctiles', 'Las cubiertas retráctiles pueden extenderse sobre áreas de cubierta para proporcionar sombra y protección contra el sol. Son ideales para crear áreas de descanso al aire libre más cómodas.', 'https://i.pinimg.com/originals/04/71/56/047156998d9a0d5dc4825067805e895c.jpg', 1000, 7, '2023-08-25 18:09:25'),
(9, 'Sistema de navegación avanzado', 'Estos sistemas incluyen GPS, radares, cartas electrónicas y otros dispositivos que ayudan a los navegantes a navegar de manera segura y eficiente, incluso en condiciones de visibilidad limitada.', 'https://img.nauticexpo.es/images_ne/photo-g/23974-16300738.webp', 1000, 8, '2023-08-25 18:12:42'),
(10, 'Toldos y parasoles', 'Los toldos y parasoles se utilizan para proteger las áreas de cubierta del sol y la lluvia. Pueden ser retráctiles o fijos y están diseñados para proporcionar sombra y comodidad a bordo.', 'https://m.media-amazon.com/images/I/41Qcrc9yVXL._AC_SL1001_.jpg', 1000, 9, '2023-08-25 18:12:30');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `brand` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand`, `date`) VALUES
(1, 'No definida', '2023-08-24 20:23:37'),
(2, 'Sunseeker', '2023-08-24 20:23:37'),
(3, 'Ferretti Yacths', '2023-08-24 20:23:37'),
(4, 'Princess Yacths', '2023-08-24 20:23:37'),
(5, 'Riva Yachts', '2023-08-24 20:23:37'),
(6, 'Pershing Yatchs', '2023-08-24 20:23:37'),
(7, 'Azimut Yachts', '2023-08-24 20:23:37'),
(8, 'Mangusta Yacths', '2023-08-24 20:23:37'),
(9, 'Wally Yacths', '2023-08-24 20:23:37'),
(10, 'Sea Ray', '2023-08-24 20:23:37'),
(11, 'Monterey Boats', '2023-08-24 20:23:37'),
(12, 'Formula Boats', '2023-08-24 20:23:37'),
(13, 'Regal Boats', '2023-08-24 20:23:37'),
(14, 'Chaparral Boats', '2023-08-24 20:23:37'),
(15, 'Cobalt Boats', '2023-08-24 20:23:37'),
(16, 'MasterCraft', '2023-08-24 20:23:37');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `type`) VALUES
(1, 'Tarjeta de Identidad'),
(2, 'Cédula de Ciudadanía'),
(3, 'Tarjeta de Extranjeria'),
(4, 'Pasaporte'),
(5, 'Permiso especial de permanencia');

-- --------------------------------------------------------

--
-- Table structure for table `hour`
--

CREATE TABLE `hour` (
  `id` int(11) NOT NULL,
  `hour` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hour`
--

INSERT INTO `hour` (`id`, `hour`) VALUES
(10, '08:00:00-09:00:00'),
(11, '09:00:00-10:00:00'),
(12, '10:00:00-11:00:00'),
(13, '11:00:00-12:00:00'),
(14, '12:00:00-13:00:00'),
(15, '13:00:00-14:00:00'),
(16, '14:00:00-15:00:00'),
(17, '15:00:00-16:00:00'),
(18, '16:00:00-17:00:00'),
(19, '08:00:00-09:00:00'),
(20, '09:00:00-10:00:00'),
(21, '10:00:00-11:00:00'),
(22, '11:00:00-12:00:00'),
(23, '12:00:00-13:00:00'),
(24, '13:00:00-14:00:00'),
(25, '14:00:00-15:00:00'),
(26, '15:00:00-16:00:00'),
(27, '16:00:00-17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `schedule` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `name`, `address`, `schedule`, `date`) VALUES
(1, 'Ubicación 1', 'location', '8:00-5:00', '2023-08-22 21:50:39'),
(3, 'Ubicación 2', 'location', '8:00-5:00', '2023-08-22 21:50:39');

-- --------------------------------------------------------

--
-- Table structure for table `mech`
--

CREATE TABLE `mech` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `id_special` int(11) NOT NULL,
  `id_location` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mech`
--

INSERT INTO `mech` (`id`, `name`, `id_special`, `id_location`, `date`) VALUES
(1, 'No definido', 1, 1, '2023-08-24 21:26:35'),
(2, 'Mecánico 1', 1, 1, '2023-08-24 20:23:59');

-- --------------------------------------------------------

--
-- Table structure for table `meetings`
--

CREATE TABLE `meetings` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `id_hour` int(11) NOT NULL,
  `id_mech` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_services` int(11) NOT NULL,
  `id_location` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meetings`
--

INSERT INTO `meetings` (`id`, `date`, `id_hour`, `id_mech`, `id_users`, `id_services`, `id_location`, `timestamp`) VALUES
(1, '2023-08-30', 11, 1, 1, 1, 1, '2023-08-31 01:07:04'),
(5, '2023-08-22', 25, 1, 2, 1, 1, '2023-08-24 20:24:18'),
(6, '2023-08-23', 24, 1, 1, 1, 3, '2023-08-24 20:24:18');

-- --------------------------------------------------------

--
-- Table structure for table `pay`
--

CREATE TABLE `pay` (
  `id` int(11) NOT NULL,
  `method` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pay`
--

INSERT INTO `pay` (`id`, `method`) VALUES
(1, 'Método 1');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'user'),
(2, 'admin\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `month` int(11) NOT NULL,
  `id_pay` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_yates` int(11) NOT NULL,
  `id_accesory` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `date`, `month`, `id_pay`, `id_users`, `id_yates`, `id_accesory`) VALUES
(6, '2023-09-13 13:51:18', 8, 1, 2, 8, 0),
(8, '2023-09-13 13:51:18', 8, 1, 2, 0, 6),
(9, '2023-09-13 13:51:18', 9, 1, 2, 8, 0),
(10, '2023-09-13 13:51:18', 9, 1, 2, 0, 6),
(11, '2023-09-13 13:51:18', 9, 1, 2, 8, 0),
(12, '2023-09-13 13:51:18', 9, 1, 2, 0, 6),
(13, '2023-09-13 13:51:18', 10, 1, 2, 8, 0),
(14, '2023-09-13 13:51:18', 10, 1, 2, 0, 6),
(15, '2023-09-13 13:51:18', 10, 1, 2, 8, 0),
(16, '2023-09-13 13:51:18', 11, 1, 2, 0, 6),
(17, '2023-09-13 13:51:18', 11, 1, 2, 8, 0),
(18, '2023-09-13 13:51:18', 12, 1, 2, 0, 6),
(19, '2023-09-13 13:51:18', 12, 1, 2, 8, 0),
(20, '2023-09-13 13:51:18', 12, 1, 2, 0, 6),
(21, '2023-09-13 13:51:18', 12, 1, 2, 8, 0),
(22, '2023-09-13 13:51:18', 12, 1, 2, 0, 6);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `service` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `service`, `date`) VALUES
(1, 'Asesoria', '2023-08-31 00:40:21'),
(2, 'Tecnomecánica', '2023-08-24 20:13:19'),
(3, 'Mantenimiento', '2023-08-24 20:12:27');

-- --------------------------------------------------------

--
-- Table structure for table `special`
--

CREATE TABLE `special` (
  `id` int(11) NOT NULL,
  `special` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `special`
--

INSERT INTO `special` (`id`, `special`, `date`) VALUES
(1, 'No definido', '2023-08-31 00:41:42'),
(2, 'Especialidad 1', '2023-08-21 16:05:44');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status`) VALUES
(1, 'Active'),
(2, 'Unactive');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `mail` text NOT NULL,
  `password` text NOT NULL,
  `document` int(12) NOT NULL,
  `id_roles` int(11) NOT NULL,
  `id_documents` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `mail`, `password`, `document`, `id_roles`, `id_documents`, `id_status`, `date`) VALUES
(1, 'admin', 'admin@gmail.com', '0192023a7bbd73250516f069df18b500', 0, 2, 2, 1, '2023-08-23 01:59:19'),
(2, 'Nombre0', 'a@a', 'cfcd208495d565ef66e7dff9f98764da', 10, 1, 2, 1, '2023-08-26 21:31:34'),
(75, 'Nombre', 'a@b', 'c4ca4238a0b923820dcc509a6f75849b', 1, 1, 1, 1, '2023-08-24 00:02:46'),
(82, 'Nombre', 'a@c', 'c4ca4238a0b923820dcc509a6f75849b', 1, 1, 1, 2, '2023-08-24 00:02:50');

-- --------------------------------------------------------

--
-- Table structure for table `yates`
--

CREATE TABLE `yates` (
  `id` int(11) NOT NULL,
  `model` text NOT NULL,
  `price` int(11) NOT NULL,
  `info` text NOT NULL,
  `serie` text NOT NULL,
  `img` text NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_brand` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `yates`
--

INSERT INTO `yates` (`id`, `model`, `price`, `info`, `serie`, `img`, `id_users`, `id_brand`, `date`) VALUES
(0, 'Null', 0, '', '', '', 1, 1, '2023-08-23 23:23:33'),
(1, 'Model 1', 1000, 'New, 500 horses', '100-10-100', 'https://cdn.computerhoy.com/sites/navi.axelspringer.es/public/media/image/2020/09/avanguardia-yate-lujo-forma-cisne-2058675.jpg?tf=3840x', 2, 1, '2023-08-23 14:28:48'),
(2, 'Sunseeker Predator', 1000, '', '100-10-101', 'https://www.ambasciatorisorrento.com/wp-content/uploads/sites/344/2022/03/foto-sunseeker-neutra_1-1200x700.jpg', 75, 2, '2023-08-25 15:24:06'),
(3, 'Ferretti Yachts 850', 1000, '', '100-10-102', 'https://www.mennyacht.com/wp-content/uploads/2020/01/33048-1900x1069.jpg', 1, 3, '2023-08-31 00:54:25'),
(4, 'Princess F55', 1000, '', '100-10-103', 'https://www.princess.co.uk/wp-content/uploads/2017/10/f55-exterior-white-hull-sea-trial-16-scaled.jpg', 1, 4, '2023-08-25 15:25:18'),
(5, 'Riva Rivamare', 1000, '', '100-10-104', 'https://frg-fwm.azurewebsites.net/asset/fwm/Upload/Models/Images/PhotoGallery/Riva/Zoom/46104.jpg', 1, 5, '2023-08-25 15:26:38'),
(6, 'Pershing 9X', 1000, '', '100-10-105', 'https://frg-fwm.azurewebsites.net/asset/fwm/Upload/Models/Images/PhotoGallery/Pershing/Zoom/47008.jpg', 1, 6, '2023-08-25 15:27:21'),
(7, 'Azimut S7', 1000, '', '100-10-106', 'https://images.boats.com/resize/1/8/70/6720870_20230321034453245_1_XLARGE.jpg?t=1527074727000&w=1200&h=1200', 1, 7, '2023-08-25 15:30:21'),
(8, 'Mangusta Oceano 43', 1000, '', '100-10-107', 'https://image.yachtcharterfleet.com/w1920/h620/qh/ca/kbfdf57b8/model/photo/406259.jpg', 2, 8, '2023-08-25 15:32:32'),
(9, 'Wallytender X', 1000, '', '100-10-108', 'https://itboat.com/uploads/5bf7/fbe2a52c0f43.jpg', 1, 9, '2023-08-25 15:36:06'),
(10, 'Sea Ray SLX 400', 1000, '', '100-10-109', 'https://www.searay.com/content/dam/searay/2020/model-images/sxo400/2020-SLX-400-Outboard-lifestyle-42.jpg.transform/small/image.jpg', 1, 10, '2023-08-25 15:37:21'),
(11, 'Monterey M6', 1000, '', '100-10-110', 'https://www.montereyboats.com/zupload/site-options/header-copy12111.jpg', 1, 11, '2023-08-25 15:37:39'),
(12, 'Formula 350 Crossover Bowrider', 1000, '', '100-10-111', 'https://images.boats.com/resize/1/21/52/7142152_20200129073518625_1_XLARGE.jpg?t=1690057057000&w=1200&h=1200', 1, 12, '2023-08-25 15:38:44'),
(13, 'Regal 33 SAV', 1000, '', '100-10-112', 'https://s3.amazonaws.com/regalboats-dev/wp-content/uploads/33_sav_beauty_18_2448-2k-624x624.jpg', 1, 13, '2023-08-25 15:39:36'),
(14, 'Chaparral 297 SSX', 1000, '', '100-10-113', 'https://sdr.chaparralboats.com/images_inventory/ssx287_19/1500px/SSX-297-Running-19.jpg', 1, 14, '2023-08-25 15:42:16'),
(15, 'Cobalt R5', 1000, '', '100-10-114', 'https://www.motonauticallonch.com/tmp/images/BIBLIOTECA_ITEMS_516_R5_11_W_1200.JPG', 1, 15, '2023-08-25 15:43:03'),
(16, 'MasterCraft X26', 1000, '', '100-10-115', 'https://images.boats.com/resize/1/11/8/8611108_0_291120221114_0.jpg?t=1669749242000&w=1200&h=1200', 1, 16, '2023-08-25 15:43:28'),
(59, 'Ferretti Yachts 850', 1000, '', '100-10-116', 'https://www.mennyacht.com/wp-content/uploads/2020/01/33048-1900x1069.jpg', 1, 3, '2023-08-31 00:54:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accesories`
--
ALTER TABLE `accesories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hour`
--
ALTER TABLE `hour`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mech`
--
ALTER TABLE `mech`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_special` (`id_special`,`id_location`),
  ADD KEY `id_location` (`id_location`);

--
-- Indexes for table `meetings`
--
ALTER TABLE `meetings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_services` (`id_services`),
  ADD KEY `id_users` (`id_users`),
  ADD KEY `id_hour` (`id_hour`),
  ADD KEY `id_mech` (`id_mech`) USING BTREE,
  ADD KEY `id_location` (`id_location`) USING BTREE;

--
-- Indexes for table `pay`
--
ALTER TABLE `pay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pay` (`id_pay`),
  ADD KEY `id_users` (`id_users`,`id_yates`,`id_accesory`),
  ADD KEY `id_yates` (`id_yates`),
  ADD KEY `id_accesory` (`id_accesory`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `special`
--
ALTER TABLE `special`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_documents` (`id_documents`),
  ADD KEY `id_roles` (`id_roles`),
  ADD KEY `id_status` (`id_status`);

--
-- Indexes for table `yates`
--
ALTER TABLE `yates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_users` (`id_users`),
  ADD KEY `id_brand` (`id_brand`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `meetings`
--
ALTER TABLE `meetings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `yates`
--
ALTER TABLE `yates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
