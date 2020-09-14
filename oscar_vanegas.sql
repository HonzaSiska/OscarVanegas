-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2020 at 08:31 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oscar_vanegas`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacto`
--

CREATE TABLE `contacto` (
  `id` int(50) NOT NULL,
  `fullname` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `email_alternate` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `phone` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `phone_alternate` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `address` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `address_second` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `city` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `country` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `contacto`
--

INSERT INTO `contacto` (`id`, `fullname`, `email`, `email_alternate`, `phone`, `phone_alternate`, `address`, `address_second`, `city`, `country`) VALUES
(6, 'Oscar Vanegas', 'siskajan@hotmail.com', 'siselsiska@gmail.com', '(646)34562734', '(646)46488923', 'De Iglesia Catolica', '2 cuadras al norte', 'El Jicaral', 'Nicaragua');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(30) NOT NULL,
  `title` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `thumb` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `referencias_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `title`, `thumb`, `referencias_id`) VALUES
(3, '', '44930137_335594103656008_4296273739152097280_n.jpg', 2),
(11, '', 'jan_siska.jpg', 2),
(12, '', 'google-translate-logo-42DAD4AA91-seeklogo.com.png', 2),
(13, '', '51136493_2416516931909196_6593079862297100288_n.jpg', 2),
(20, '', 'Profile.png', 2),
(21, '', 'WIN_20190114_20_51_08_Pro.jpg', 4),
(25, '', '25659358_793162000867207_5350822915985629606_n.jpg', 6),
(26, '', '40413522_10211805772451152_6876097466706427904_n.jpg', 6),
(27, '', '1936520_102394989772640_3808290_n.jpg', 6),
(28, '', '40276472_10155524046177204_8995469720530452480_n(1).jpg', 5),
(29, '', '53216072_10217301542746641_3607900772068491264_n.jpg', 5),
(30, '', '52472021_2380138528687459_3131411306339368960_n.jpg', 5),
(31, '', '18920703_1443464062342235_4408304651779608452_n.jpg', 5),
(32, '', '50985271_10156871119695502_2799363875697328128_n.jpg', 5),
(33, '', '20374656_1762187327155334_4920962576663382265_n.jpg', 6);

-- --------------------------------------------------------

--
-- Table structure for table `referencias`
--

CREATE TABLE `referencias` (
  `id` int(11) NOT NULL,
  `title` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `content` varchar(1000) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `referencias`
--

INSERT INTO `referencias` (`id`, `title`, `content`) VALUES
(2, 'Updated', '<p>Explore typographic culture and discover fonts for your next project with this collection of case studies, technical updates, and articles curated by the Google Fonts team.</p>'),
(4, 'test 3', '<p>Elements are then positioned using the top, bottom, left, and right properties. However, these properties will not work unless the&nbsp;<code>position</code>&nbsp;property is set first. They also work differently depending on the position value.</p>'),
(5, 'test 4', '<p><code>closest</code>&nbsp;actually exists in native javascript now, and&nbsp;<code>querySelectorAll</code>&nbsp;behaves like&nbsp;<code>find</code>. If you\'re using <span style=\"text-decoration: underline;\"><em><strong>jQuery</strong></em></span> you<code>re probably interested&nbsp;in</code>.siblings( [selector ] )` which is kind of between closest and find.</p>'),
(6, 'Project San Carlos', '<p>Reconstruccion del sistema de auguas negras. Podobn&eacute; pÅ™&iacute;pady se budou podle praÅ¾sk&eacute;ho radn&iacute;ho pro majetek Jana Chabra (TOP 09) Å™e&scaron;it:&nbsp;&bdquo;Povolen&aacute; jsou pouze pÅ™edsunut&aacute; prodejn&iacute; m&iacute;sta, nikoliv pÅ™esun na ulici,&ldquo; Å™ekl pro Blesk.cz. Zastupitelstvo Prahy 16. dubna schv&aacute;lila bal&iacute;Äek pomoci pro praÅ¾sk&eacute; podnikatele kvÅ¯li dopadÅ¯m koronavirov&eacute; krize. Jeho souÄ&aacute;st&iacute; je i moÅ¾nost</p>');

-- --------------------------------------------------------

--
-- Table structure for table `text`
--

CREATE TABLE `text` (
  `id` int(100) NOT NULL,
  `description` text COLLATE utf8_spanish_ci NOT NULL,
  `page` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `text`
--

INSERT INTO `text` (`id`, `description`, `page`) VALUES
(1, '<p>This is my first content <em><strong>manegment system</strong></em>.</p>\r\n<p>&nbsp;</p>\r\n<p>Here you can manage text on the entry page. Esto es un sistema de control de contenido. Aqui puedes cambiar el contenido de la pagina principal.</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', 'Pagina principal'),
(2, '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Pellentesque arcu. Aenean placerat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Mauris metus. Nulla accumsan, elit sit amet varius semper, nulla mauris mollis quam, tempor suscipit diam nulla vel leo. Ut tempus purus at lorem. Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? Quisque porta. Fusce suscipit libero eget elit. Integer malesuada. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.</p>\r\n<p><strong><span style=\"text-decoration: underline;\">Exemplos</span></strong></p>\r\n<p>- consectetueradipiscingelit. Pellentesque</p>\r\n<p>- Temporibusautemquibusdam</p>\r\n<p>- eveniet ut et voluptates repudiandae</p>', 'Inicio'),
(3, '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec ipsum massa, ullamcorper in, auctor et, scelerisque sed, est. Cras elementum. Praesent dapibus. Nullam dapibus fermentum ipsum. Aliquam erat volutpat. Donec ipsum massa, ullamcorper in, auctor et, scelerisque sed, est. Maecenas ipsum velit, consectetuer eu lobortis ut, dictum at dui. Nullam lectus justo, vulputate eget mollis sed, tempor sed magna. Vestibulum erat nulla, ullamcorper nec, rutrum non, nonummy ac, erat. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Etiam quis quam. Nulla est. Vivamus ac leo pretium faucibus. Nam quis nulla. In convallis.</p>', 'Inicio');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(200) CHARACTER SET utf8 NOT NULL,
  `pass` varchar(200) CHARACTER SET utf8 NOT NULL,
  `privilege` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `thumb` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `pass`, `privilege`, `thumb`) VALUES
(9, 'siskajan', 'c417e399854c6e5c5811bd9841b8bc112c01990bbef18924b3cbd31fdb99a0db0d043743e1d791e37d2d7a171914560eff8d19c027c9be5d3d5d5a776de31f9e', 'admin', 'jan_siska.jpg'),
(11, 'dan', 'd2029049c436ee05f87421cfa79a8797f24ea04909eab42c2abfc1f68268e5d5e33388e2513aa72223f57003a71d27e7337c65bbe27473f895663c0f1b165474', 'user', ''),
(12, 'carlos1', 'ba1714df5f5d4640794b3a5509fae0a4e30f60a0af28fa55d2b305072889f232e50f848f3e96c35edd571cfebbef22f56faf459d8ac6fefe65ffc768bc808016', 'admin', 'google-translate-logo-42DAD4AA91-seeklogo.com.png'),
(43, 'tadek', '8f006f80b5d2d585d60b03bec9cebba19e78635c85308730aa685f7b002ea7eb0fee131eb1388be024d8100bdcdc6de289b6e6f531843f3fb2ac315890288384', 'user', ''),
(44, 'alena', '1276dc43ec3aacb117b5e4d616a5cf875efd30a95cb1dd1e89663668db1cdd454ffa09391d2b3a23e929fbced77499b12d80cea774ab7d6b07acfda03db7e96e', 'user', ''),
(45, 'admin', 'admin', 'admin', ''),
(46, 'oscar', '1ae98d963d84fc84a9305a5594a48bcbc4a918a4a7f875359526cd4dbbe3aa8efaf694bafbbc30f1d957e9afdc321320b67bd7a08c78c536b02a4a9bd9f0672f', 'user', ''),
(47, 'try', 'try', 'admin', ''),
(48, 'test', 'ee26b0dd4af7e749aa1a8ee3c10ae9923f618980772e473f8819a5d4940e0db27ac185f8a0e1d5f84f88bc887fd67b143732c304cc5fa9ad8e6f57f50028a8ff', 'admin', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `referencias_id` (`referencias_id`);

--
-- Indexes for table `referencias`
--
ALTER TABLE `referencias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `text`
--
ALTER TABLE `text`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `referencias`
--
ALTER TABLE `referencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `text`
--
ALTER TABLE `text`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`referencias_id`) REFERENCES `referencias` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
