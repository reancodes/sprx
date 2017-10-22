-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 25, 2017 at 12:55 PM
-- Server version: 5.7.19-0ubuntu0.16.04.1
-- PHP Version: 7.0.23-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sitedatatest`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_options`
--

CREATE TABLE `activity_options` (
  `PID` int(5) NOT NULL,
  `Option` varchar(15) NOT NULL,
  `id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bugs`
--

CREATE TABLE `bugs` (
  `id` int(5) NOT NULL,
  `Author` varchar(45) NOT NULL,
  `Title` varchar(55) NOT NULL,
  `Text` varchar(255) NOT NULL,
  `DateTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `changelog`
--

CREATE TABLE `changelog` (
  `id` int(5) NOT NULL,
  `version` varchar(10) NOT NULL,
  `Text` varchar(550) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `poster` varchar(40) NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `datet` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `poster`, `message`, `datet`) VALUES
(308, 'BOT', 'Welcome To Your Chat! :)  :thumpsup:', '2017-09-25 12:18:51');

-- --------------------------------------------------------

--
-- Table structure for table `custom_settings`
--

CREATE TABLE `custom_settings` (
  `id` int(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `enabled` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `custom_settings`
--

INSERT INTO `custom_settings` (`id`, `name`, `enabled`) VALUES
(0, 'MOTD', 'Our Official Chat!'),
(1, 'DisableLogins', '0'),
(2, 'DisablePurchases', '1'),
(3, 'PaypalEmail', 'admin@admin.com');

-- --------------------------------------------------------

--
-- Table structure for table `downloads`
--

CREATE TABLE `downloads` (
  `id` int(11) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `size` varchar(50) NOT NULL,
  `type` varchar(10) NOT NULL,
  `Version` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emojis`
--

CREATE TABLE `emojis` (
  `id` int(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Wut` varchar(50) NOT NULL,
  `url` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emojis`
--

INSERT INTO `emojis` (`id`, `Name`, `Wut`, `url`) VALUES
(0, 'Smile', ':)', 'dist/img/Emojis/smile.png'),
(1, 'Smile', ':D', 'dist/img/Emojis/smile2.png'),
(2, ':P', ':p', 'dist/img/Emojis/tounge.png'),
(3, 'Wink', ';)', 'dist/img/Emojis/wink.png'),
(4, 'Angry', ':@', 'dist/img/Emojis/angry.png'),
(5, 'Sad', ':(', 'dist/img/Emojis/sad.png'),
(6, 'Shocked', ':o', 'dist/img/Emojis/shock.png'),
(7, 'WUT', ':|', 'dist/img/Emojis/straight.png'),
(8, 'Poop', ':poop:', 'dist/img/Emojis/poop.png'),
(9, 'Ghost', ':ghost:', 'dist/img/Emojis/ghost.png'),
(10, 'Frog', ':frog:', 'dist/img/Emojis/frog.png'),
(11, 'Turtle', ':turtle:', 'dist/img/Emojis/turtle.png'),
(12, 'Broken', ':broken:', 'dist/img/Emojis/broken.png'),
(13, 'Praying', ':praying:', 'dist/img/Emojis/praying.png'),
(14, 'Thumps Up', ':thumpsup:', 'dist/img/Emojis/ThumbsUp.png'),
(15, 'Thumps Down', ':thumpsdown:', 'dist/img/Emojis/ThumbsDown.png'),
(16, 'Fuck', ':fuck:', 'dist/img/Emojis/fuck.png'),
(17, 'WUT', ':wut:', 'dist/img/Emojis/wut.webp'),
(18, 'Doggy', ':doggy:', 'dist/img/Emojis/doggy.gif'),
(19, 'ttt', ':/', 'dist/img/Emojis/confused.png'),
(40, 'Smile', ':)', 'dist/img/Emojis/smile.png'),
(41, 'Smile', ':D', 'dist/img/Emojis/smile2.png'),
(42, 'Hand', ':hand:', 'http://www.pngmart.com/files/1/Hand-Emoji-PNG-Image.png'),
(46, 'Ring', ':ring:', 'https://cdn.shopify.com/s/files/1/1061/1924/files/Diamond_Ring_Emoji_42x42.png?5542046363841426502'),
(47, 'crying', ':crying:', 'https://cdn.shopify.com/s/files/1/1061/1924/files/Loudly_Crying_Face_Emoji_42x42.png?8026536574188759287'),
(48, 'Thinking', ':thinking:', 'https://cdn.shopify.com/s/files/1/1061/1924/files/Thinking_Face_Emoji_42x42.png?6135488989279264585'),
(49, 'Sick', ':sick:', 'https://cdn.shopify.com/s/files/1/1061/1924/files/Face_With_Thermometer_Emoji_42x42.png?6135488989279264585');

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE `logins` (
  `username` varchar(40) NOT NULL,
  `version` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login_history`
--

CREATE TABLE `login_history` (
  `username` varchar(45) NOT NULL,
  `ip` varchar(25) NOT NULL,
  `type` varchar(15) NOT NULL,
  `DateTime` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `username` varchar(40) NOT NULL,
  `action` varchar(255) NOT NULL,
  `DateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mentions`
--

CREATE TABLE `mentions` (
  `userwhotagged` varchar(45) NOT NULL,
  `taggeduser` varchar(45) NOT NULL,
  `postid` int(5) NOT NULL,
  `whotaggedid` int(5) NOT NULL,
  `taggedid` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(5) NOT NULL,
  `Title` varchar(15) NOT NULL,
  `Text` varchar(550) NOT NULL,
  `Sender` varchar(45) NOT NULL,
  `DateTime` datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP
) ;

-- --------------------------------------------------------

--
-- Table structure for table `mydownloads`
--

CREATE TABLE `mydownloads` (
  `username` varchar(40) NOT NULL,
  `file` varchar(55) NOT NULL,
  `DateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Text` varchar(255) NOT NULL,
  `Poster` varchar(40) NOT NULL,
  `DateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pharses`
--

CREATE TABLE `pharses` (
  `id` int(5) NOT NULL,
  `Text` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pharses`
--

INSERT INTO `pharses` (`id`, `Text`) VALUES
(5, 'Chat Has Been Pruned!'),
(1, 'Successfully logged in!');

-- --------------------------------------------------------

--
-- Table structure for table `refferals`
--

CREATE TABLE `refferals` (
  `id` int(5) NOT NULL,
  `BuyerName` varchar(45) NOT NULL,
  `ReffID` int(5) NOT NULL,
  `ReffUser` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `suggestions`
--

CREATE TABLE `suggestions` (
  `id` int(5) NOT NULL,
  `Author` varchar(45) NOT NULL,
  `Title` varchar(55) NOT NULL,
  `Text` varchar(255) NOT NULL,
  `DateTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supporttickets`
--

CREATE TABLE `supporttickets` (
  `Title` varchar(50) NOT NULL,
  `Text` varchar(255) NOT NULL,
  `DateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `By` varchar(40) NOT NULL,
  `id` int(10) UNSIGNED NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supportticketsreplies`
--

CREATE TABLE `supportticketsreplies` (
  `SID` int(5) NOT NULL,
  `Text` varchar(255) NOT NULL,
  `From` varchar(40) NOT NULL,
  `MsgType` varchar(15) NOT NULL,
  `DateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supportticketsreplies`
--

INSERT INTO `supportticketsreplies` (`SID`, `Text`, `From`, `MsgType`, `DateTime`) VALUES
(3, 'tse', 'HamoodDev', 'Client', '2017-07-22 20:41:50'),
(3, 'test', 'HamoodDev', 'Client', '2017-07-23 01:18:30'),
(3, 'tset', 'HamoodDev', 'Client', '2017-07-23 01:27:13'),
(3, 'test', 'HamoodDev', 'Client', '2017-07-23 01:28:10'),
(3, 'test', 'HamoodDev', 'Client', '2017-07-23 01:28:13'),
(3, 'test', 'HamoodDev', 'Client', '2017-07-23 01:33:18'),
(3, 'tset', 'HamoodDev', 'Client', '2017-07-23 01:44:11'),
(6, 'test', 'HamoodDev', 'Client', '2017-07-23 01:47:38'),
(6, 'test', 'HamoodDev', 'Client', '2017-07-23 01:47:47'),
(6, 'ttest', 'HamoodDev', 'Client', '2017-07-23 01:47:52'),
(5, 'test', 'HamoodDev', 'Client', '2017-07-23 01:52:14'),
(6, 'test', 'HamoodDev', 'Client', '2017-09-25 11:59:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `license` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `customtitle` varchar(50) NOT NULL,
  `rank` int(2) NOT NULL DEFAULT '1',
  `img` varchar(200) NOT NULL DEFAULT 'https://s-media-cache-ak0.pinimg.com/236x/ae/b3/08/aeb308736b614eb9277ef43983749e3f.jpg',
  `DateJoined` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `country` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `bio` varchar(255) NOT NULL,
  `chatbanned` varchar(5) NOT NULL DEFAULT 'false',
  `theme` varchar(20) NOT NULL DEFAULT 'purple',
  `customindex` int(2) NOT NULL DEFAULT '10',
  `Banned` int(2) NOT NULL DEFAULT '0',
  `pcip` int(50) NOT NULL,
  `ps3ip` int(50) NOT NULL,
  `ps3mac` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `license`, `email`, `customtitle`, `rank`, `img`, `DateJoined`, `country`, `city`, `bio`, `chatbanned`, `theme`, `customindex`, `Banned`, `pcip`, `ps3ip`, `ps3mac`) VALUES
(1, 'HamoodDev', '1111-1111-1111', 'hamoddev@gmail.com', 'Fuck You Bitch.', 4, 'https://s-media-cache-ak0.pinimg.com/236x/ae/b3/08/aeb308736b614eb9277ef43983749e3f.jpg', '2017-08-09 14:15:40', 'Netherlands', 'Amsterdam', '', 'false', 'purple', 3, 0, 0, 0, ''),
(2, 'BOT', 'QFMZ-V2QC-YGUE-MFDP', 'admin@admin.com', 'Fuck You Im BOT Bitch.', 4, 'https://s-media-cache-ak0.pinimg.com/236x/ae/b3/08/aeb308736b614eb9277ef43983749e3f.jpg', '0000-00-00 00:00:00', '', '', '', 'false', 'purple', 2, 1, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `user_activity`
--

CREATE TABLE `user_activity` (
  `username` varchar(40) NOT NULL,
  `text` varchar(255) NOT NULL,
  `DateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_options`
--
ALTER TABLE `activity_options`
  ADD KEY `id` (`id`);

--
-- Indexes for table `bugs`
--
ALTER TABLE `bugs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_settings`
--
ALTER TABLE `custom_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Indexes for table `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emojis`
--
ALTER TABLE `emojis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `suggestions`
--
ALTER TABLE `suggestions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_2` (`id`),
  ADD KEY `id_3` (`id`);

--
-- Indexes for table `supporttickets`
--
ALTER TABLE `supporttickets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_3` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_activity`
--
ALTER TABLE `user_activity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_options`
--
ALTER TABLE `activity_options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bugs`
--
ALTER TABLE `bugs`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=309;
--
-- AUTO_INCREMENT for table `downloads`
--
ALTER TABLE `downloads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `emojis`
--
ALTER TABLE `emojis`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `suggestions`
--
ALTER TABLE `suggestions`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `supporttickets`
--
ALTER TABLE `supporttickets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `user_activity`
--
ALTER TABLE `user_activity`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
