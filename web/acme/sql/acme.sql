-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 05, 2017 at 07:40 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `acme`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryId` int(10) UNSIGNED NOT NULL,
  `categoryName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Category classifications of inventory items';

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryId`, `categoryName`) VALUES
(1, 'Cannon'),
(2, 'Explosive'),
(3, 'Misc'),
(4, 'Rocket'),
(5, 'Trap');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `clientId` int(10) UNSIGNED NOT NULL,
  `clientFirstName` varchar(15) NOT NULL,
  `clientLastName` varchar(25) NOT NULL,
  `clientEmail` varchar(40) NOT NULL,
  `clientPassword` varchar(255) NOT NULL,
  `clientLevel` enum('1','2','3') NOT NULL DEFAULT '1',
  `comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`clientId`, `clientFirstName`, `clientLastName`, `clientEmail`, `clientPassword`, `clientLevel`, `comments`) VALUES
(1, 'Tony', 'Stark', 'tony@starkent.com', '$2y$10$5H1IZGSlvnyl3frNmfr3FOBs7KJeX/62fkYw5VLjxV8ZL0Br.2cx6', '1', 'I am the real Ironman'),
(3, 'Thor', 'Odinson', 'thor@marvel.com', '$2y$10$5H1IZGSlvnyl3frNmfr3FOBs7KJeX/62fkYw5VLjxV8ZL0Br.2cx6', '1', ''),
(4, 'Admin', 'SUPERUSER', 'adminA@cit336.net', '$2y$10$5H1IZGSlvnyl3frNmfr3FOBs7KJeX/62fkYw5VLjxV8ZL0Br.2cx6', '3', ''),
(5, 'Batman', 'DarkKnight', 'bruce@dc.com', '$2y$10$5H1IZGSlvnyl3frNmfr3FOBs7KJeX/62fkYw5VLjxV8ZL0Br.2cx6', '1', ''),
(6, 'Natasha', 'Romanav', 'natasha@marvel.com', '$2y$10$PuXErD9WIVvEkzu3MyoV5OyXkTRyaeYHf/m948CLObANiqHTLauQW', '1', ''),
(7, 'Loki', 'Odison', 'loki@marvel.com', '$2y$10$2mVIcOnN2djAMnKUvBWpWuQm5Qs1j2x.iNt/lM1WhjVoHUks05PVm', '1', ''),
(12, 'Harry', 'Vashisht', 'vas13008@byui.edu', '$2y$10$IRKBB3EoHV8poERmK5bFiu8rHUegKL.gWJwAXwmNzIcRRjXbu.5s.', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `imgId` int(10) UNSIGNED NOT NULL,
  `invId` int(11) UNSIGNED NOT NULL,
  `imgName` varchar(50) NOT NULL,
  `imgPath` varchar(50) NOT NULL,
  `imgDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`imgId`, `invId`, `imgName`, `imgPath`, `imgDate`) VALUES
(15, 2, 'rocket.png', '/acme/images/products//rocket.png', '2017-03-19 01:03:22'),
(16, 2, 'rocket-tn.png', '/acme/images/products//rocket-tn.png', '2017-03-19 01:03:22'),
(17, 4, 'catapult.png', '/acme/images/products//catapult.png', '2017-03-19 01:03:54'),
(18, 4, 'catapult-tn.png', '/acme/images/products//catapult-tn.png', '2017-03-19 01:03:54'),
(19, 16, 'helmet.png', '/acme/images/products//helmet.png', '2017-03-19 01:04:15'),
(20, 16, 'helmet-tn.png', '/acme/images/products//helmet-tn.png', '2017-03-19 01:04:15'),
(21, 5, 'roadrunner.jpg', '/acme/images/products//roadrunner.jpg', '2017-03-19 01:05:05'),
(22, 5, 'roadrunner-tn.jpg', '/acme/images/products//roadrunner-tn.jpg', '2017-03-19 01:05:05'),
(23, 6, 'trap.gif', '/acme/images/products//trap.gif', '2017-03-19 01:05:44'),
(24, 6, 'trap-tn.gif', '/acme/images/products//trap-tn.gif', '2017-03-19 01:05:44'),
(27, 15, 'piano.jpg', '/acme/images/products//piano.jpg', '2017-03-19 01:06:42'),
(28, 15, 'piano-tn.jpg', '/acme/images/products//piano-tn.jpg', '2017-03-19 01:06:42'),
(29, 7, 'hole.png', '/acme/images/products//hole.png', '2017-03-19 01:06:54'),
(30, 7, 'hole-tn.png', '/acme/images/products//hole-tn.png', '2017-03-19 01:06:54'),
(31, 9, 'anvil.png', '/acme/images/products//anvil.png', '2017-03-19 01:07:49'),
(32, 9, 'anvil-tn.png', '/acme/images/products//anvil-tn.png', '2017-03-19 01:07:49'),
(33, 20, 'mortar.jpg', '/acme/images/products//mortar.jpg', '2017-03-19 01:08:26'),
(34, 20, 'mortar-tn.jpg', '/acme/images/products//mortar-tn.jpg', '2017-03-19 01:08:26'),
(35, 17, 'rope.jpg', '/acme/images/products//rope.jpg', '2017-03-19 01:08:38'),
(36, 17, 'rope-tn.jpg', '/acme/images/products//rope-tn.jpg', '2017-03-19 01:08:38'),
(37, 14, 'seed.jpg', '/acme/images/products//seed.jpg', '2017-03-19 01:08:59'),
(38, 14, 'seed-tn.jpg', '/acme/images/products//seed-tn.jpg', '2017-03-19 01:08:59'),
(39, 22, 'rubberband.jpg', '/acme/images/products//rubberband.jpg', '2017-03-19 01:09:26'),
(40, 22, 'rubberband-tn.jpg', '/acme/images/products//rubberband-tn.jpg', '2017-03-19 01:09:26'),
(41, 19, 'bomb.png', '/acme/images/products//bomb.png', '2017-03-19 01:09:39'),
(42, 19, 'bomb-tn.png', '/acme/images/products//bomb-tn.png', '2017-03-19 01:09:39'),
(43, 18, 'fence.png', '/acme/images/products//fence.png', '2017-03-19 01:09:51'),
(44, 18, 'fence-tn.png', '/acme/images/products//fence-tn.png', '2017-03-19 01:09:51'),
(45, 13, 'tnt.png', '/acme/images/products//tnt.png', '2017-03-19 01:10:08'),
(46, 13, 'tnt-tn.png', '/acme/images/products//tnt-tn.png', '2017-03-19 01:10:08'),
(47, 12, 'mallet.png', '/acme/images/products//mallet.png', '2017-03-19 01:11:05'),
(48, 12, 'mallet-tn.png', '/acme/images/products//mallet-tn.png', '2017-03-19 01:11:05'),
(49, 8, 'no-image.png', '/acme/images/products//no-image.png', '2017-03-19 01:11:20'),
(50, 8, 'no-image-tn.png', '/acme/images/products//no-image-tn.png', '2017-03-19 01:11:20'),
(51, 10, 'anvil.gif', '/acme/images/products//anvil.gif', '2017-03-19 01:12:08'),
(52, 10, 'anvil-tn.gif', '/acme/images/products//anvil-tn.gif', '2017-03-19 01:12:08'),
(53, 13, 'tnt2.png', '/acme/images/products//tnt2.png', '2017-03-19 01:50:01'),
(54, 13, 'tnt2-tn.png', '/acme/images/products//tnt2-tn.png', '2017-03-19 01:50:01'),
(55, 2, 'imgres.png', '/acme/images/products//imgres.png', '2017-03-19 07:27:12'),
(56, 2, 'imgres-tn.png', '/acme/images/products//imgres-tn.png', '2017-03-19 07:27:12'),
(57, 8, 'rocketFLying.png', '/acme/images/products//rocketFLying.png', '2017-03-19 07:35:02'),
(58, 8, 'rocketFLying-tn.png', '/acme/images/products//rocketFLying-tn.png', '2017-03-19 07:35:02');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `invId` int(11) UNSIGNED NOT NULL,
  `invName` varchar(50) NOT NULL DEFAULT '',
  `invDescription` text NOT NULL,
  `invImage` varchar(50) NOT NULL DEFAULT '',
  `invThumbnail` varchar(50) NOT NULL DEFAULT '',
  `invPrice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `invStock` smallint(6) NOT NULL DEFAULT '0',
  `invSize` smallint(6) NOT NULL DEFAULT '0',
  `invWeight` smallint(6) NOT NULL DEFAULT '0',
  `invLocation` varchar(35) NOT NULL DEFAULT '',
  `categoryId` int(10) UNSIGNED NOT NULL,
  `invVendor` varchar(20) NOT NULL DEFAULT '',
  `invStyle` varchar(20) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Acme Inc. Inventory Table';

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`invId`, `invName`, `invDescription`, `invImage`, `invThumbnail`, `invPrice`, `invStock`, `invSize`, `invWeight`, `invLocation`, `categoryId`, `invVendor`, `invStyle`) VALUES
(2, 'Back-mounted Rocket', 'Rocket for multiple purposes. This can be launched independently to deliver a payload or strapped on to help get you to where you want to be FAST!!! Really Fast!', '/acme/images/products/rocket.png', '/acme/images/products/rocket-tn.png', '1320.00', 5, 60, 90, 'California', 4, 'Goddard', 'metal'),
(3, 'Mortar', 'Our Mortar is very powerful. This cannon can launch a projectile or bomb 3 miles. Made of solid steel and mounted on cement or metal stands [not included].', '/acme/images/products/mortar.jpg', '/acme/images/products/mortar-tn.jpg', '1500.00', 26, 250, 750, 'San Jose', 1, 'Smith & Wesson', 'Metal'),
(4, 'Catapult', 'Our best wooden catapult. Ideal for hurling objects for up to 1000 yards. Payloads of up to 300 lbs.', '/acme/images/products/catapult.png', '/acme/images/products/catapult-tn.png', '2500.00', 4, 1569, 400, 'Cedar Point, IO', 1, 'Wooden Creations', 'Wood'),
(5, 'Female RoadRuner Cutout', 'This carbon fiber backed cutout of a female roadrunner is sure to catch the eye of any male roadrunner.', '/acme/images/products/roadrunner.jpg', '/acme/images/products/roadrunner-tn.jpg', '20.00', 500, 27, 2, 'San Jose', 5, 'Picture Perfect', 'Carbon Fiber'),
(6, 'Giant Mouse Trap', 'Our big mouse trap. This trap is multifunctional. It can be used to catch dogs, mountain lions, road runners or even muskrats. Must be staked for larger varmints [stakes not included] and baited with approptiate bait [sold seperately].\r\n', '/acme/images/products/trap.jpg', '/acme/images/products/trap-tn.jpg', '20.00', 34, 470, 28, 'Cedar Point, IO', 5, 'Rodent Control', 'Wood'),
(7, 'Instant Hole', 'Instant hole - Wonderful for creating the appearance of openings.', '/acme/images/products/hole.png', '/acme/images/products/hole-tn.png', '25.00', 269, 24, 2, 'San Jose', 3, 'Hidden Valley', 'Ether'),
(8, 'Koenigsegg CCX', 'This high performance car is sure to get you where you are going fast. It holds the production car land speed record at an amazing 250mph.', '/acme/images/products/no-image.png', '/acme/images/products/no-image.png', '500000.00', 1, 25000, 3000, 'San Jose', 3, 'Koenigsegg', 'Metal'),
(9, 'Large Anvil', '50 lb. Anvil - perfect for any task requireing lots of weight. Made of solid, tempered steel.', '/acme/images/products/anvil.png', '/acme/images/products/anvil-tn.png', '150.00', 15, 80, 50, 'San Jose', 5, 'Steel Made', 'Metal'),
(10, 'Medium Anvil', 'This solid iron 35 lb. anvil is sure to crush anything under it and provide a solid surface for all metal on it.', '/acme/images/products/anvil.png', '/acme/images/products/anvil-tn.png', '65.00', 5000, 60, 35, 'San Jose', 5, 'Steel Made', 'Metal'),
(11, 'Monster Rubber Band', 'These are not tiny rubber bands. These are MONSTERS! These bands can stop a train locamotive or be used as a slingshot for cows. Only the best materials are used!', '/acme/images/products/rubberband.jpg', '/acme/images/products/rubberband-tn.jpg', '4.00', 4589, 75, 1, 'Cedar Point, IO', 3, 'Rubbermaid', 'Rubber'),
(12, 'Mallet', 'Ten pound mallet for bonking roadrunners on the head. Can also be used for bunny rabbits.', '/acme/images/products/mallet.png', '/acme/images/products/mallet-tn.png', '25.00', 100, 36, 10, 'Cedar Point, IA', 3, 'Wooden Creations', 'Wood'),
(13, 'TNT', 'The biggest bang for your buck with our nitro-based TNT. Price is per stick.', '/acme/images/products/tnt.png', '/acme/images/products/tnt-tn.png', '10.00', 1000, 25, 2, 'San Jose', 2, 'Nobel Enterprises', 'Plastic'),
(14, 'Roadrunner Custom Bird Seed Mix', 'Our best varmint seed mix - varmints on two or four legs can''t resist this mix. Contains meat, nuts, cereals and our own special ingredient. Guaranteed to bring them in. Can be used with our monster trap.', '/acme/images/products/seed.jpg', '/acme/images/products/seed-tn.jpg', '8.00', 150, 24, 3, 'San Jose', 5, 'Acme', 'Plastic'),
(15, 'Grand Piano', 'This upright grand piano is guaranteed to play well and smash anything beneath it if dropped from a height.', '/acme/images/products/piano.jpg', '/acme/images/products/piano-tn.jpg', '3500.00', 36, 500, 1200, 'Cedar Point, IA', 3, 'Wulitzer', 'Wood'),
(16, 'Crash Helmet', 'This carbon fiber and plastic helmet is the ultimate in protection for your head. comes in assorted colors.', '/acme/images/products/helmet.png', '/acme/images/products/helmet-tn.png', '100.00', 25, 48, 9, 'San Jose', 3, 'Suzuki', 'Carbon Fiber'),
(17, 'Nylon Rope', 'This nylon rope is ideal for all uses. Each rope is the highest quality nylon and comes in 100 foot lengths.', '/acme/images/products/rope.jpg', '/acme/images/products/rope-tn.jpg', '15.00', 200, 200, 6, 'San Jose', 3, 'Marina Sales', 'Nylon'),
(18, 'Sticky Fence', 'This fence is covered with Gorilla Glue and is guaranteed to stick to anything that touches it and is sure to hold it tight.', '/acme/images/products/fence.png', '/acme/images/products/fence-tn.png', '75.00', 15, 48, 2, 'San Jose', 3, 'Acme', 'Nylon'),
(19, 'Small Bomb', 'Bomb with a fuse - A little old fashioned, but highly effective. This bomb has the ability to devistate anything within 30 feet.', '/acme/images/products/bomb.png', '/acme/images/products/bomb-tn.png', '275.00', 58, 30, 12, 'San Jose', 2, 'Nobel Enterprises', 'Metal'),
(20, 'Large Mortar', 'This mortar is great for getting over those large mountains that get in the way.', '/acme/images/products/mortar.jpg', '/acme/images/products/mortar-tn.jpg', '125.00', 2, 207, 87, 'Las Vegas', 1, 'Mortar Baby', 'Metal'),
(22, 'Rubber Boa', 'Realistic', '/acme/images/products/no-image.png', '/acme/images/products/no-image.png', '12.00', 3, 90, 2, 'Bangkok', 7, 'Thai Novelties', 'Rubber');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `reviewId` int(10) UNSIGNED NOT NULL,
  `reviewText` text NOT NULL,
  `reviewDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `invId` int(11) UNSIGNED NOT NULL,
  `clientId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`reviewId`, `reviewText`, `reviewDate`, `invId`, `clientId`) VALUES
(1, 'Good Product, works nicely.', '2017-04-03 09:15:29', 9, 3),
(2, 'I dont  like it anymore', '2017-04-03 09:18:06', 5, 4),
(3, 'It works great', '2017-04-05 17:30:19', 4, 5),
(4, 'Its good for daily use. It very Good indeed 2', '2017-04-04 06:59:53', 4, 5),
(7, 'Great for usage', '2017-04-05 17:20:31', 7, 5),
(8, 'Good Product, works nicely.', '2017-04-03 09:15:29', 7, 3),
(9, 'This TNT is great for use, It has good explosion powers', '2017-04-05 05:25:15', 13, 1),
(13, 'IT looks great, works great. Pretty Handy.', '2017-04-05 17:11:20', 4, 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`clientId`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`imgId`),
  ADD KEY `invId` (`invId`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`invId`),
  ADD KEY `categoryId` (`categoryId`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`reviewId`),
  ADD KEY `invId` (`invId`),
  ADD KEY `clientId` (`clientId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `clientId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `imgId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `invId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `reviewId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `FK_inventory` FOREIGN KEY (`invId`) REFERENCES `inventory` (`invId`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
