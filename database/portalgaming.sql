-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 24, 2018 at 02:10 PM
-- Server version: 5.7.21-log
-- PHP Version: 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portalgaming`
--

-- --------------------------------------------------------

--
-- Table structure for table `devupdate`
--

CREATE TABLE `devupdate` (
  `id` int(11) NOT NULL,
  `title` varchar(64) NOT NULL,
  `titledesc` varchar(64) NOT NULL,
  `description` text NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `devupdate`
--

INSERT INTO `devupdate` (`id`, `title`, `titledesc`, `description`, `timestamp`) VALUES
(2, 'First Update', 'This is my first Update', 'More Hats! I am crazy about hats these days. Some text about this blog entry. Fashion fashion and mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at. Phasellus sed ultricies mi non congue ullam corper. Praesent tincidunt sedtellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.\r\n\r\nSunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.', '2018-04-20 21:52:19'),
(3, 'Second Update', 'This is a second update', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '2018-04-20 22:07:30'),
(6, 'Third Update', 'This is a third update', 'Ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugito ', '2018-04-21 19:48:16');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `image` varchar(49) NOT NULL,
  `p_price` double NOT NULL,
  `description` text NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `p_name`, `image`, `p_price`, `description`, `link`) VALUES
(1, 'Cuphead', 'images/cuphead.jpg', 19.99, 'Cuphead is a classic run and gun action game heavily focused on boss battles. Inspired by cartoons of the 1930s, the visuals and audio are painstakingly created with the same techniques of the era, i.e. traditional hand drawn cel animation, watercolor backgrounds, and original jazz recordings.', 'http://store.steampowered.com/app/268910/Cuphead/'),
(2, 'Divinity: Original Sin 2', 'images/divinity.jpg', 49.99, 'The eagerly anticipated sequel to the award-winning RPG. Gather your party. Master deep, tactical combat. Join up to 3 other players - but know that only one of you will have the chance to become a God.', 'http://store.steampowered.com/app/435150/Divinity_Original_Sin_2/'),
(3, 'Resident Evil 7: Biohazard', 'images/resident.jpg', 29.99, 'Fear and isolation seep through the walls of an abandoned southern farmhouse. ', 'http://store.steampowered.com/app/418370/RESIDENT_EVIL_7_biohazard__BIOHAZARD_7_resident_evil/'),
(4, 'Prey', 'images/prey.jpg', 24.99, 'In Prey, you awaken aboard Talos I, a space station orbiting the moon in the year 2032. You are the key subject of an experiment meant to alter humanity forever – but things have gone terribly wrong. The space station has been overrun by hostile aliens and you are now being hunted.', 'http://store.steampowered.com/app/480490/Prey/'),
(8, 'Far Cry 5', 'images/fc5.jpg', 59.99, 'Welcome to Hope County, Montana, home to a fanatical doomsday cult known as Eden’s Gate. Stand up to cult leader Joseph Seed & his siblings, the Heralds, to spark the fires of resistance & liberate the besieged community.', 'http://store.steampowered.com/app/552520/Far_Cry_5/'),
(9, 'Rocket League', 'images/rl.jpg', 19.99, 'Soccer meets driving once again in the long-awaited, physics-based multiplayer-focused sequel to Supersonic Acrobatic Rocket-Powered Battle-Cars! Choose a variety of high-flying vehicles equipped with huge rocket boosters to score amazing aerial goals and pull-off incredible game-changing saves!', 'http://store.steampowered.com/app/252950/Rocket_League/');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member_rating`
--

CREATE TABLE `tbl_member_rating` (
  `id` int(11) NOT NULL,
  `tutorial_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_member_rating`
--

INSERT INTO `tbl_member_rating` (`id`, `tutorial_id`, `member_id`, `rating`) VALUES
(1, 1, 1, 4),
(2, 2, 1, 4),
(3, 3, 1, 2),
(4, 4, 1, 5),
(5, 8, 1, 4),
(6, 9, 1, 4),
(7, 1, 10, 4),
(8, 2, 10, 2),
(9, 3, 10, 5),
(10, 4, 10, 2),
(11, 8, 10, 5),
(12, 9, 10, 4),
(13, 1, 7, 4),
(14, 2, 7, 1),
(15, 3, 7, 5),
(16, 4, 7, 3),
(17, 8, 7, 5),
(18, 9, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hash` varchar(32) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `hash`, `active`, `admin`) VALUES
(1, 'Admin', 'CURD', 'admin@admin.com', '$2y$10$HPZR/TMJPwKK061WBmOvsOpkQrISKeKZufd12y/aHEpkI2G9Zi3pO', '08c5433a60135c32e34f46a71175850c', 1, 1),
(5, 'John', 'Sample', 'test@gmail.com', '$2y$10$Zfa3Wq8tnFpPYHgKfitOaOGr5UJqeP7zA9bANj6DW6oIDcKGM4GHm', 'caf1a3dfb505ffed0d024130f58c5cfa', 1, 0),
(7, 'Wiktor', 'Lesiak', 'sypher62@hotmail.com', '$2y$10$jbSvDKsZXfFZNdJWNXNcb..ZoRrFwy/8mKrm3JvPndenBtsc3H6k6', '0336dcbab05b9d5ad24f4333c7658a0e', 1, 0),
(10, 'Wiktor', 'Lesiak', 'sypher62@gmail.com', '$2y$10$TN2W1rBs1oYUytc9AExUwe9AC2WtmW9gNcbQmRFkUjCTanTi.s1xO', 'e3796ae838835da0b6f6ea37bcf8bcb7', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `devupdate`
--
ALTER TABLE `devupdate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_member_rating`
--
ALTER TABLE `tbl_member_rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `pro` (`tutorial_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `devupdate`
--
ALTER TABLE `devupdate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_member_rating`
--
ALTER TABLE `tbl_member_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_member_rating`
--
ALTER TABLE `tbl_member_rating`
  ADD CONSTRAINT `pro` FOREIGN KEY (`tutorial_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `tbl_member_rating_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
