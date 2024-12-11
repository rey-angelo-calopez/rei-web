-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2024 at 02:15 PM
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
-- Database: `acalopez`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminacc`
--

CREATE TABLE `adminacc` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminacc`
--

INSERT INTO `adminacc` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$RjQH/IupGCywi5fScZbq/u9QigSPtNjniLv1eNInQ4OoXekBdNS7q');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`, `description`) VALUES
(1, 'Action', 'High adrenaline games with intense action sequences.'),
(2, 'Adventure', 'Games filled with story-driven adventures and exploration.'),
(5, 'Animation', NULL),
(106, 'Strategy', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock_quantity` int(11) NOT NULL,
  `imgsrc` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `views` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `category_id`, `name`, `description`, `price`, `stock_quantity`, `imgsrc`, `created_at`, `views`) VALUES
(34, 1, 'Call of Duty®: Black Ops 6 - Vault Edition Upgrade', 'Call of Duty®: Warzone™ is the massive free-to-play combat arena, featuring Battle Royale and Resurgence.', 23999.00, 25, 'play1.jpg', '2024-12-11 10:06:31', 30),
(35, 106, 'Wildfrost', 'Take on the elements in Wildfrost, a tactical roguelike deckbuilder! Collect and upgrade card companions, ready to withstand waves of deceptively cute Pengoons, Gobblers and brutish boss monsters. Test your skills in daily challenges, and build up the town of Snowdwell, unlocking more cards to aid in your fight against the everlasting frost…\r\n\r\nThe sun has frozen over, succumbing to the Wildfrost. The town of Snowdwell and its survivors stand as the last bastion against an eternal winter... Build up a deck of powerful card companions and elemental items, as you battle to reach the Sun Temple and banish the frost once and for all!', 12999.00, 25, 'play2.jpg', '2024-12-11 10:09:41', 4),
(36, 2, 'Indiana Jones and the Great Circle', 'Uncover one of history’s greatest mysteries in Indiana Jones and the Great Circle™, a first-person, single-player adventure set between the events of Raiders of the Lost Ark™ and The Last Crusade™. The year is 1937, sinister forces are scouring the globe for the secret to an ancient power connected to the Great Circle, and only one person can stop them - Indiana Jones™. You’ll become the legendary archaeologist in this cinematic action-adventure game from MachineGames, the award-winning studio behind the recent Wolfenstein series, and executive produced by Hall of Fame game designer Todd Howard.', 2599.00, 25, 'play3.jpg', '2024-12-11 10:10:38', 3),
(37, 5, 'Overthrown', 'This game is a work in progress. It may or may not change over time or release as a final product. Purchase only if you are comfortable with the current state of the unfinished game.\r\n\r\nYou play as a Monarch in possession of an ancient soul-stealing crown with magical abilities. With its power, establish a kingdom in a perilous wilderness and defend it from mutants and bandits roaming the land.\r\n\r\nBuild, gather resources, farm the land and more to turn your fledgling realm into a commanding, self-sustaining kingdom. As your fame grows, more will flock to your banner – but so will those who have come to overthrow you, including your friends in up to six-player co-op.', 23000.00, 25, 'play4.jpg', '2024-12-11 10:12:31', 3),
(38, 5, 'EA SPORTS™ WRC', 'Build the car of your dreams in our biggest rally game ever, EA SPORTS™ WRC, the all-new official videogame of the FIA World Rally Championship, the first developed by the award-winning team behind the DiRT Rally series.\r\n\r\n', 75000.00, 25, 'play5.jpg', '2024-12-11 10:13:40', 6),
(39, 5, 'Crash™ Team Racing Nitro-Fueled', 'Crash is back in the driver’s seat! Get ready to go fur-throttle with Crash™ Team Racing Nitro-Fueled. It’s the authentic CTR experience plus a whole lot more, now fully-remastered and revved up to the max!', 65000.00, 25, 'play6.jpg', '2024-12-11 10:14:55', 3),
(40, 106, 'Aliens: Dark Descent', 'In Aliens: Dark Descent, command a squad of hardened Colonial Marines to stop a terrifying Xenomorph outbreak on Moon Lethe. Lead your soldiers in real-time combat against iconic Xenomorphs, rogue operatives from the insatiable Weyland-Yutani Corporation, and a host of horrifying creatures new to the Alien franchise.', 9000.00, 25, 'play7.jpg', '2024-12-11 10:15:46', 1),
(41, 1, 'Nine Sols', 'Nine Sols is a lore-rich, hand-drawn 2D action-platformer with Sekiro-inspired, deflection-based combat. Embark on a journey of Asian fantasy, explore a land once ruled by an ancient alien race, and follow a vengeful hero on a quest to slay the 9 Sols—the powerful rulers of this forsaken realm.\r\n', 99000.00, 25, 'play8.jpg', '2024-12-11 10:16:46', 7),
(42, 1, 'S.T.A.L.K.E.R. 2: Heart of Chornobyl', 'S.T.A.L.K.E.R. 2: Heart of Chornobyl is the unforgiving FPS survival adventure in a dark science-fiction open world. Scavenge for gear and resources, hunt for wonders, make hard decisions to survive and pave the path through the Chornobyl Anomalous Zone.', 89000.00, 25, 'play9.jpg', '2024-12-11 10:17:48', 11),
(43, 1, 'Genshin Impact', 'Genshin Impact is an open-world adventure RPG. In the game, set forth on a journey across a fantasy world called Teyvat. In this vast world, you can explore seven nations, meet a diverse cast of characters with unique personalities and abilities, and fight powerful enemies together with them, all on the way during your quest to find your lost sibling. You can also wander freely, immersing yourself in a world filled with life, and let your sense of wonder lead you to uncover all of its mysteries... Until you are at long last reunited with your lost sibling and bear witness to the culmination of all things at the end of your journey.', 1.00, 25, 'play10.jpg', '2024-12-11 10:18:22', 86),
(44, 5, 'Microsoft Flight Simulator 2024 - Standard Edition', 'Standard Edition\r\nExplore the world with our largest fleet of aircraft and take simulation to new heights while pursuing your aviation career within Microsoft Flight Simulator 2024. The Standard Edition includes over 65 aircraft and 150 handcrafted airports.', 99000.00, 25, 'play11.jpg', '2024-12-11 10:22:04', 1),
(45, 106, 'Age of Empires II: Definitive Edition', 'Age of Empires II: Definitive Edition celebrates the 20th anniversary of one of the most popular strategy games ever, now with stunning 4K Ultra HD graphics, and a fully remastered soundtrack. Age of Empires II: DE features “The Last Khans” with 3 new campaigns and 4 new Civilizations. Frequent updates include events, additional content, new game modes, and enhanced features with the recent addition of Co-Op mode!', 12300.00, 25, 'play12.jpg', '2024-12-11 10:23:02', 3),
(46, 2, 'Spyro™ Reignited Trilogy', 'The original roast master is back! Same sick burns, same smoldering attitude, now all scaled up in stunning HD. Spyro is bringing the heat like never before in the Spyro™ Reignited Trilogy game collection. Rekindle the fire with the original three games, Spyro™ the Dragon, Spyro™ 2: Ripto\'s Rage! and Spyro™: Year of the Dragon. Explore the expansive realms, re-encounter the fiery personalities and relive the adventure in fully remastered glory. Because when there’s a realm that needs saving, there’s only one dragon to call.', 67000.00, 25, 'play13.jpg', '2024-12-11 10:24:03', 9),
(47, 5, 'Forza Horizon 4 Standard Edition', 'Dynamic seasons change everything at the world’s greatest automotive festival. Go it alone or team up with others to explore beautiful and historic Britain in a shared open world. Collect, modify and drive over 450 cars. Race, stunt, create and explore – choose your own path to become a Horizon Superstar. The Forza Horizon 4 Standard Edition digital bundle includes the full game of Forza Horizon 4 and the Formula Drift Car Pack.', 77000.00, 25, 'play14.jpg', '2024-12-11 10:24:59', 13),
(48, 106, 'Tin Hearts', 'SOLVE A TRAIL OF PUZZLES: Set out on an immersive adventure through 50+ lemmings-like puzzles which constantly evolve as you progress. Uncover new routes to your destination each time you play, with multiple ways to solve the intricate puzzles.', 26000.00, 25, 'play15.jpg', '2024-12-11 10:26:06', 3),
(49, 2, 'Minecraft', 'CREATE\r\nBuild whatever you can imagine in your own infinite world that’s unique in every playthrough.\r\n\r\nEXPLORE\r\nDiscover biomes, resources and mobs, and craft your way through a world filled with surprises in the ultimate sandbox game.\r\n\r\nSURVIVE\r\nExperience unforgettable adventures as you face mysterious foes, traverse exciting landscapes, and travel to perilous dimensions.\r\n\r\nPLAY TOGETHER\r\nHave a blast with friends, whether you’re sitting on the same couch in split screen or miles apart in cross-platform play for console, mobile and PC. Connect with millions of players on community servers or subscribe to Realms Plus to play with up to 10 friends on your own private server.\r\n\r\nEXPERIENCE MORE\r\nGet creator-made add-ons, thrilling worlds, and stylish cosmetics on Minecraft Marketplace. Subscribe to Marketplace Pass (or Realms Plus) to access 150+ worlds, skin & textures packs, and more – refreshed monthly.', 87000.00, 25, 'play16.jpg', '2024-12-11 10:28:16', 2),
(50, 1, 'Sniper Elite: Resistance', 'NEW OPERATIVE, NEW THREAT, NEW EPIC CAMPAIGN\r\nOffering unparalleled sniping mechanics, stealth and tactical third-person combat, Sniper Elite: Resistance turns the attention of the award-winning series towards a hidden war, far from the front lines, deep within the heart of occupied France.', 45000.00, 25, 'play17.jpg', '2024-12-11 10:29:30', 21),
(52, 106, 'Avowed', 'Welcome to the Living Lands, a mysterious island filled with adventure and danger.\r\nSet in the fictional world of Eora that was first introduced to players in the Pillars of Eternity franchise, Avowed is a first-person fantasy action RPG from the award-winning team at Obsidian Entertainment.\r\nYou are the envoy of Aedyr, a distant land, sent to investigate rumors of a spreading plague throughout the Living Lands - an island full of mysteries and secrets, danger and adventure, and choices and consequences, and untamed wilderness. You discover a personal connection to the Living Lands and an ancient secret that threatens to destroy everything. Can you save this unknown frontier and your soul from the forces threatening to tear them asunder?', 18999.00, 25, 'play18.jpg', '2024-12-11 10:31:10', 12),
(53, 2, 'Road 96', 'Road 96 is a crazy, beautiful road-trip. The discovery of exciting places, and unusual people on your own personal journey to freedom.\r\nAn ever-evolving story-driven adventure inspired by Tarantino, The Coen Brothers, and Bong Joon-ho. Made by the award-winning creators of Valiant Hearts and Memories Retold.\r\nMoments of action, exploration, contemplative melancholy, human encounters and wacky situations. Set against a backdrop of authoritarian rule and oppression.\r\nA stunning visual style, a soundtrack filled with 90s hits, and a thousand routes through the game combine so each player can create their own unique stories on Road 96.', 9069.00, 69, 'play19.jpg', '2024-12-11 10:32:25', 2),
(54, 2, 'Carrion', 'CARRION is a reverse horror game in which you assume the role of an amorphous creature of unknown origin. Stalk and consume those that imprisoned you to spread fear and panic throughout the facility. Grow and evolve as you tear down this prison and acquire more and more devastating abilities on the path to retribution.', 89999.00, 25, 'play20.jpg', '2024-12-11 10:33:39', 2);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `review` text DEFAULT NULL,
  `rating` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `product_id`, `user_id`, `review`, `rating`, `created_at`) VALUES
(16, 43, 5, 'Pota libre nagid na sa playstore hahahahaha', 1, '2024-12-11 10:47:41'),
(17, 43, 6, 'kung sa playstore ka nalang nag install mayu pa', 1, '2024-12-11 12:31:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `imgsrc` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `full_name`, `imgsrc`, `created_at`) VALUES
(2, 'a', 'a@gmail.com', '$2y$10$lop4wHqX9lTwD.f81DFv8evtxU7yWJ8v5rJ.zD5PccMTyN24ZAIve', 'a', NULL, '2024-12-05 10:36:11'),
(3, 'user', 'user@gmail.com', '$2y$10$03WFTxE4wpCPOBGaN5ZwNOBepwBaSgJ65Ewc2WkcMNegO2QAhC6Ym', 'user', NULL, '2024-12-05 14:22:46'),
(4, 'test', 'test@gmail.com', '$2y$10$YyHN1cU/2f7oHrn0RE2i/OpHasvT6IoJotwe7Sa3weeaaGO.bFdZu', 'test', NULL, '2024-12-07 07:49:17'),
(5, 'palagan', 'tiwibarotac@gmail.com', '$2y$10$jQp0CykKl6.LQkWrtzRZYuBdfy1cPAdyhbVUxuWs28QaZWI7YN.AC', 'Cedric Talon', NULL, '2024-12-11 10:44:31'),
(6, 'ace', 'ace@gmail.com', '$2y$10$6It82scFZ3Pbs.50ihupO.axDwq6M3IOVnQmZR/G7Vp.Hrt6m5fsO', 'Ace Bagilidad', NULL, '2024-12-11 12:31:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminacc`
--
ALTER TABLE `adminacc`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminacc`
--
ALTER TABLE `adminacc`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
