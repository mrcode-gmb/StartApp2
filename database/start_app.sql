-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 11, 2023 at 05:30 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `start_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat_tbl`
--

CREATE TABLE `chat_tbl` (
  `id` int(254) NOT NULL,
  `request_id_c` varchar(250) NOT NULL,
  `sender_id` varchar(250) NOT NULL,
  `contents` text NOT NULL,
  `chat_type` varchar(20) NOT NULL,
  `chat_status` int(10) NOT NULL DEFAULT '0',
  `message_date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_tbl`
--

INSERT INTO `chat_tbl` (`id`, `request_id_c`, `sender_id`, `contents`, `chat_type`, `chat_status`, `message_date`) VALUES
(4, '2', '7', 'Hello bro', 'text', 0, '07 Sep, 2023. 03:43 pm'),
(5, '3', '7', 'ssss', 'text', 0, '07 Sep, 2023. 03:53 pm'),
(6, '3', '7', 'Screenshot_2023-09-06-13-28-52.png', 'photo', 0, '07 Sep, 2023. 03:53 pm'),
(7, '6', '7', 'Hello brother', 'text', 0, '07 Sep, 2023. 04:05 pm'),
(8, '6', '7', 'IMG_20230902_094826.jpg', 'photo', 0, '07 Sep, 2023. 04:05 pm'),
(9, '6', '7', 'ðŸ’°ðŸ‘©â€ðŸŽ¤ðŸ’°ðŸŽ¼ðŸ‘†ðŸ’‰ðŸ’‰ðŸš—ðŸ”¥ðŸ˜‹ðŸ˜ŒðŸ˜‹ðŸ˜Œ', 'text', 0, '07 Sep, 2023. 04:05 pm'),
(10, '7', '13', 'Assalamualaikum ', 'text', 0, '07 Sep, 2023. 04:24 pm'),
(11, '13', '7', 'Wslm', 'text', 0, '07 Sep, 2023. 04:24 pm'),
(12, '7', '13', 'Ykk', 'text', 0, '07 Sep, 2023. 04:24 pm'),
(13, '13', '7', 'Can you send me your pic', 'text', 0, '07 Sep, 2023. 04:24 pm'),
(14, '7', '13', '16940966961261735441031.jpg', 'photo', 0, '07 Sep, 2023. 04:25 pm'),
(15, '13', '7', 'Thank you', 'text', 0, '07 Sep, 2023. 04:25 pm'),
(16, '7', '13', 'Aha', 'text', 0, '07 Sep, 2023. 04:25 pm');

-- --------------------------------------------------------

--
-- Table structure for table `comment_tbl`
--

CREATE TABLE `comment_tbl` (
  `comt_id` int(222) NOT NULL,
  `postId` varchar(250) DEFAULT NULL,
  `sender_comment_id` varchar(250) DEFAULT NULL,
  `comment_content` text,
  `comt_date` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment_tbl`
--

INSERT INTO `comment_tbl` (`comt_id`, `postId`, `sender_comment_id`, `comment_content`, `comt_date`) VALUES
(1, '3', '7', 'Good day all my guys', '01 Sep, 2023. 03:36 pm'),
(2, '3', '7', 'Good day all my guys', '01 Sep, 2023. 03:36 pm'),
(3, '2', '7', 'Good day all my guys', '01 Sep, 2023. 03:36 pm'),
(4, '1', '7', 'Good day all my guys Good day all my guys Good day all my guys Good day all my guys Good day all my guys Good day all my guys v', '01 Sep, 2023. 03:37 pm'),
(5, '1', '7', 'Good day all my guys', '01 Sep, 2023. 03:41 pm'),
(6, '3', '3', 'Helloe', '01 Sep, 2023. 03:44 pm'),
(7, '3', '3', 'ero, blanditiis nobis excepturi aut. Rerum, illum nostrum ratione modi reiciendis maxime omnis perferendis reprehenderit fuga in optio error autem. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sequi atque vero, blanditiis nobis excepturi aut. Rerum, illum nostrum rati', '01 Sep, 2023. 03:48 pm'),
(8, '2', '3', 'ero, blanditiis nobis excepturi aut. Rerum, illum nostrum ratione modi reiciendis maxime omnis perferendis reprehenderit fuga in optio error autem. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sequi atque vero, blanditiis nobis excepturi aut. Rerum, illum nostrum rati', '01 Sep, 2023. 03:49 pm'),
(9, '2', '7', 'dfsfd', '01 Sep, 2023. 03:49 pm'),
(10, '2', '3', 'Hello all peopels ', '01 Sep, 2023. 03:51 pm'),
(11, '1', '3', 'My commwenrr', '01 Sep, 2023. 04:32 pm'),
(12, '1', '7', 'Good day all my guysssssss', '02 Sep, 2023. 11:15 am'),
(13, '2', '7', 'fhjhjkk;kljkhgfdssfggjk54675', '02 Sep, 2023. 02:32 pm'),
(14, '3', '7', 'Good day all my guys', '05 Sep, 2023. 02:45 pm'),
(15, '1', '7', 'Good day all my guys', '06 Sep, 2023. 01:08 pm'),
(16, '3', '7', 'Hello all', '06 Sep, 2023. 01:10 pm'),
(17, '4', '7', 'Hello my bro how are you', '06 Sep, 2023. 01:27 pm'),
(18, '4', '7', 'Good day all my guys', '06 Sep, 2023. 04:40 pm'),
(19, '6', '12', 'hi', '06 Sep, 2023. 05:16 pm'),
(20, '6', '12', 'jhgfdv', '06 Sep, 2023. 05:34 pm'),
(21, '1', '7', 'Hello my brother ', '07 Sep, 2023. 04:06 pm'),
(22, '1', '7', 'ðŸ‘¬âš•ï¸ðŸ‘¬âš•ï¸â™¥ï¸ðŸ‘©â€âœˆï¸â™¥ï¸âš•ï¸ðŸ’«ðŸ’¸ðŸ‚ðŸŽðŸ‚ðŸŽðŸ‚ðŸŽ', '07 Sep, 2023. 04:07 pm'),
(23, '7', '7', 'Heee', '07 Sep, 2023. 04:08 pm'),
(24, '8', '7', 'Xxxxx', '07 Sep, 2023. 04:16 pm'),
(25, '10', '7', 'Good day all my guys', '07 Sep, 2023. 04:32 pm');

-- --------------------------------------------------------

--
-- Table structure for table `create_posting`
--

CREATE TABLE `create_posting` (
  `post_id` int(254) NOT NULL,
  `poster_id` varchar(250) NOT NULL,
  `post_content` text,
  `post_img` varchar(200) DEFAULT NULL,
  `date_post` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `create_posting`
--

INSERT INTO `create_posting` (`post_id`, `poster_id`, `post_content`, `post_img`, `date_post`) VALUES
(1, '7', '\r\nLorem ipsum, dolor sit amet consectetur adipisicing elit. Sequi atque vero, blanditiis nobis excepturi aut. Rerum, illum nostrum ratione modi reiciendis maxime omnis perferendis reprehenderit fuga in optio error autem.\r\nLorem ipsum, dolor sit amet consectetur adipisicing elit. Sequi atque vero, blanditiis nobis excepturi aut. Rerum, illum nostrum ratione modi reiciendis maxime omnis perferendis reprehenderit fuga in optio error autem.\r\nLorem ipsum, dolor sit amet consectetur adipisicing elit. Sequi atque vero, blanditiis nobis excepturi aut. Rerum, illum nostrum ratione modi reiciendis maxime omnis perferendis reprehenderit fuga in optio error autem.', 'briatek_logo.png', '2023-09-01'),
(2, '7', '', '1689262089941(1).jpg', '2023-09-01'),
(3, '7', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sequi atque vero, blanditiis nobis excepturi aut. Rerum, illum nostrum ratione modi reiciendis maxime omnis perferendis reprehenderit fuga in optio error autem. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sequi atque vero, blanditiis nobis excepturi aut. Rerum, illum nostrum ratione modi reiciendis maxime omnis perferendis reprehenderit fuga in optio error autem. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sequi atque vero, blanditiis nobis excepturi aut. Rerum, illum nostrum ratione modi reiciendis maxime omnis perferendis reprehenderit fuga in optio error a', 'Screenshot from 2023-08-30 14-15-39.png', '01 Sep, 2023. 02:30 pm'),
(4, '7', 'Happy Friday my guys and my ðŸ‘¨ðŸ‘©ðŸ‘¦ðŸ˜‰ðŸ˜¡ðŸ˜•ðŸ˜¢ðŸ˜ŠðŸ˜†ðŸ˜¢ðŸ˜•ðŸ˜¢ðŸ˜•ðŸ˜¢ðŸ˜•ðŸ˜¢ðŸ˜•ðŸ˜¢ðŸ˜•ðŸ˜¢ðŸ˜¢ðŸ˜•ðŸ˜¢ðŸ˜•ðŸ˜¢ðŸ˜•ðŸ˜¢ðŸ˜•ðŸ˜¢ðŸ˜•ðŸ˜¢ðŸ˜•ðŸ˜¡ðŸ˜¡ðŸ˜¡ðŸ˜¡ðŸ˜¡ðŸ˜¡ðŸ˜¡ðŸ˜¡ðŸ˜¡ðŸ˜£ðŸ˜¡ðŸ˜£ðŸ˜¢ðŸ˜ ðŸ˜¢ðŸ˜ ðŸ˜¢ðŸ˜ ðŸ˜¢ðŸ˜ ', 'Screenshot_2023-09-04-14-36-20.png', '06 Sep, 2023. 12:56 pm'),
(6, '12', 'Hi guys happy friday', 'Screenshot from 2023-09-06 12-38-24.png', '06 Sep, 2023. 05:16 pm'),
(7, '7', 'Hello â™¥ï¸â™¥ï¸â™¥ï¸â™¥ï¸â™¥ï¸â™¥ï¸â™¥ï¸â™¥ï¸â™¥ï¸â™¥ï¸â™¥ï¸â™¥ï¸â™¥ï¸â™¥ï¸â™¥ï¸â™¥ï¸â™¥ï¸â™¥ï¸', 'Screenshot_2023-09-03-23-00-02.png', '07 Sep, 2023. 04:08 pm'),
(8, '7', 'ghffdgfhjhkluytrrfg cjhffdyfyguuyjg', 'Screenshot from 2023-09-06 11-17-03.png', '07 Sep, 2023. 04:12 pm'),
(9, '7', 'Hello all ðŸ‘ŽðŸ‘ŽðŸ‘ŽðŸ‘ŽðŸ‘ŽðŸ‘ŽðŸ‘ŽðŸ‘ŽðŸ‘ŽðŸ‘ŽðŸ‘ŽðŸ™ŒðŸ™ŒðŸ™ŒðŸ™ŒðŸ™ŒðŸ™ŒðŸ™ŒðŸ‘ŽðŸ™ŒðŸ™ŒðŸ™ŒðŸ™ŒðŸ–ï¸ðŸ‘ŠðŸ–ï¸ðŸ‘ŠðŸ–ï¸ðŸ‘ŠðŸ–ï¸ðŸ‘ŠðŸ–ï¸ðŸ‘ŠðŸ–ï¸ðŸ‘ŠðŸ–ï¸ðŸ‘ŠðŸ–ï¸ðŸ‘ŠðŸ–ï¸ðŸ–ï¸ðŸ¤™ðŸ–ï¸ðŸ‘Š', 'IMG_20230902_094826.jpg', '07 Sep, 2023. 04:13 pm'),
(10, '7', 'Yayyayayaa', '', '07 Sep, 2023. 04:17 pm'),
(11, '13', 'Maganar tinubu ake ', '', '07 Sep, 2023. 04:23 pm');

-- --------------------------------------------------------

--
-- Table structure for table `friend_request`
--

CREATE TABLE `friend_request` (
  `id` int(254) NOT NULL,
  `request_id` varchar(250) NOT NULL,
  `my_id` varchar(250) NOT NULL,
  `accept_status` varchar(4) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friend_request`
--

INSERT INTO `friend_request` (`id`, `request_id`, `my_id`, `accept_status`, `date`) VALUES
(2, '3', '7', '1', '2015-08-23 00:00:00'),
(3, '3', '2', '1', '2015-08-23 00:00:00'),
(4, '7', '2', '1', '2015-08-23 00:00:00'),
(8, '1', '3', '1', '2015-08-23 00:00:00'),
(11, '6', '7', '1', '2015-08-23 00:00:00'),
(13, '4', '3', '0', '2017-08-23 00:00:00'),
(17, '2', '6', '1', '2018-08-23 00:00:00'),
(34, '1', '6', '1', '2018-08-23 00:00:00'),
(48, '5', '2', '0', '2019-08-23 00:00:00'),
(51, '6', '8', '0', '2022-08-23 00:00:00'),
(52, '8', '7', '1', '2022-08-23 00:00:00'),
(54, '2', '8', '0', '2022-08-23 00:00:00'),
(55, '2', '8', '0', '2022-08-23 00:00:00'),
(73, '4', '1', '0', '2023-08-23 00:00:00'),
(74, '5', '1', '0', '2023-08-23 00:00:00'),
(81, '4', '9', '0', '2023-08-23 00:00:00'),
(129, '4', '7', '0', '2007-09-23 00:00:00'),
(130, '5', '7', '0', '2007-09-23 00:00:00'),
(131, '9', '7', '0', '2007-09-23 00:00:00'),
(132, '10', '7', '0', '2007-09-23 00:00:00'),
(135, '13', '7', '1', '2007-09-23 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `group_chat`
--

CREATE TABLE `group_chat` (
  `chatId` int(255) NOT NULL,
  `group_C_Id` varchar(122) NOT NULL,
  `sender_id` varchar(123) NOT NULL,
  `message` varchar(9999) NOT NULL,
  `mess_type` varchar(20) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_chat`
--

INSERT INTO `group_chat` (`chatId`, `group_C_Id`, `sender_id`, `message`, `mess_type`, `time`) VALUES
(1, '3', '7', 'Hello to alll', 'text', '2023-08-17 11:57:14'),
(2, '3', '3', 'How are you', 'text', '2023-08-17 11:57:37'),
(3, '3', '7', 'Find', 'text', '2023-08-17 11:57:44'),
(4, '3', '7', 'studnt_hall.jpeg', 'file', '2023-08-17 11:57:57'),
(5, '3', '3', 'Thank you lemme send my own photo', 'text', '2023-08-17 12:00:19'),
(6, '3', '3', 'Screenshot from 2023-08-15 09-34-52.png', 'file', '2023-08-17 12:00:40'),
(7, '3', '7', 'What is this ??', 'text', '2023-08-17 12:00:55'),
(8, '3', '3', 'Nothing all clear', 'text', '2023-08-17 12:01:12'),
(9, '3', '3', 'hi', 'text', '2023-08-17 12:19:43'),
(10, '2', '3', 'hello', 'text', '2023-08-17 12:20:28'),
(11, '2', '3', 'hello', 'text', '2023-08-17 12:21:22'),
(12, '3', '3', 'hello', 'text', '2023-08-17 12:21:42'),
(13, '2', '3', 'ykk', 'text', '2023-08-17 12:21:54'),
(14, '4', '7', 'Hello guys', 'text', '2023-08-18 09:47:47'),
(15, '4', '7', 'students.jpg', 'file', '2023-08-18 09:47:53'),
(16, '7', '7', 'heelo', 'text', '2023-08-18 09:49:17'),
(17, '7', '2', 'How fer', 'text', '2023-08-18 09:49:29'),
(18, '7', '3', 'barkan guys', 'text', '2023-08-18 09:50:02'),
(19, '2', '7', 'How are them', 'text', '2023-08-18 13:47:13'),
(20, '2', '2', 'Hellodd', 'text', '2023-08-18 13:47:24'),
(21, '2', '3', 'clear', 'text', '2023-08-18 13:47:33'),
(22, '3', '2', 'hello', 'text', '2023-08-18 13:48:44'),
(23, '3', '6', 'Kuna lfy', 'text', '2023-08-18 15:30:19'),
(24, '7', '6', 'Kuna lfy', 'text', '2023-08-18 15:30:29'),
(25, '7', '2', 'hello', 'text', '2023-08-18 16:18:12'),
(26, '9', '2', 'hello', 'text', '2023-08-18 16:19:48'),
(27, '10', '2', 'hello', 'text', '2023-08-21 12:19:32'),
(28, '11', '8', 'hello', 'text', '2023-08-22 11:52:06'),
(29, '11', '8', 'Screenshot from 2023-08-21 16-28-32.png', 'file', '2023-08-22 11:52:47'),
(30, '9', '7', 'Screenshot from 2023-08-30 14-14-35.png', 'file', '2023-08-30 15:57:27'),
(31, '10', '7', 'hello', 'text', '2023-09-04 08:33:27'),
(32, '9', '7', 'Hi h', 'text', '2023-09-06 10:47:17'),
(33, '11', '7', 'Hello all', 'text', '2023-09-07 14:06:02'),
(34, '2', '13', 'Slm', 'text', '2023-09-07 14:26:48'),
(35, '2', '7', 'Wsln your welcome', 'text', '2023-09-07 14:27:23'),
(36, '2', '13', 'Y aiki', 'text', '2023-09-07 14:27:31');

-- --------------------------------------------------------

--
-- Table structure for table `group_name`
--

CREATE TABLE `group_name` (
  `group_id` int(254) NOT NULL,
  `creator_id` varchar(250) NOT NULL,
  `group_named` varchar(999) NOT NULL,
  `group_logo` varchar(9000) NOT NULL,
  `verify_status` varchar(20) NOT NULL DEFAULT '0',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_name`
--

INSERT INTO `group_name` (`group_id`, `creator_id`, `group_named`, `group_logo`, `verify_status`, `time`) VALUES
(1, '3', 'Hello', 'user3-128x128.jpg', '1', '2023-08-15 16:06:22'),
(2, '3', 'Gandu', 'student1.jpeg', '1', '2023-08-15 16:06:52'),
(3, '3', 'Kano', 'user6-128x128.jpg', '1', '2023-08-15 16:08:15'),
(4, '7', 'Kanosaa', 'thilak-wattugewa-principal.png', '1', '2023-08-16 10:05:22'),
(5, '3', 'Amercan', 'thilak-wattugewa-principal.png', '1', '2023-08-16 11:54:44'),
(6, '2', 'Nigeria', 'user1-128x128.jpg', '1', '2023-08-18 08:44:18'),
(7, '7', 'StartApp', '1689262089941.jpg', '1', '2023-08-18 09:48:41'),
(8, '6', 'Science Two', 'students.jpg', '1', '2023-08-18 15:31:09'),
(9, '2', 'Masoya Barhama', 'Screenshot from 2023-08-02 14-13-13.png', '1', '2023-08-18 16:19:36'),
(10, '2', 'Bool India', 'user6-128x128.jpg', '1', '2023-08-21 12:19:23'),
(11, '8', 'Ismaeel', '57ed30ff46a0e.image.jpg', '1', '2023-08-21 14:57:11');

-- --------------------------------------------------------

--
-- Table structure for table `group_request`
--

CREATE TABLE `group_request` (
  `key_id` int(254) NOT NULL,
  `group_key` varchar(250) NOT NULL,
  `joiner_id` varchar(250) NOT NULL,
  `request_status` varchar(4) NOT NULL,
  `role_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_request`
--

INSERT INTO `group_request` (`key_id`, `group_key`, `joiner_id`, `request_status`, `role_status`) VALUES
(1, '7', '7', '1', 'admin'),
(2, '4', '7', '1', 'admin'),
(3, '6', '2', '1', 'admin'),
(4, '5', '3', '1', 'admin'),
(5, '3', '3', '1', 'admin'),
(6, '3', '7', '1', 'member'),
(7, '3', '2', '1', 'member'),
(8, '7', '3', '1', 'member'),
(9, '7', '2', '1', 'member'),
(10, '7', '1', '1', 'member'),
(11, '7', '4', '1', 'member'),
(12, '7', '6', '1', 'member'),
(13, '7', '5', '1', 'member'),
(14, '2', '3', '1', 'admin'),
(15, '1', '3', '1', 'admin'),
(16, '2', '7', '1', 'member'),
(17, '2', '2', '1', 'member'),
(18, '2', '4', '1', 'member'),
(19, '3', '6', '1', 'member'),
(20, '3', '5', '1', 'member'),
(21, '3', '4', '1', 'member'),
(22, '3', '1', '1', 'member'),
(26, '8', '6', '1', 'admin'),
(27, '8', '7', '1', 'member'),
(28, '8', '5', '1', 'member'),
(29, '8', '3', '1', 'member'),
(30, '8', '2', '1', 'member'),
(31, '8', '1', '1', 'member'),
(32, '8', '4', '1', 'member'),
(33, '2', '6', '1', 'member'),
(34, '4', '6', '1', 'member'),
(35, '1', '6', '1', 'member'),
(36, '6', '6', '1', 'member'),
(37, '5', '6', '1', 'member'),
(38, '5', '5', '1', 'member'),
(39, '5', '1', '1', 'member'),
(40, '5', '7', '1', 'member'),
(41, '4', '2', '1', 'member'),
(42, '9', '2', '1', 'admin'),
(43, '9', '7', '1', 'member'),
(44, '9', '6', '1', 'member'),
(45, '9', '5', '1', 'member'),
(48, '6', '7', '1', 'member'),
(49, '6', '5', '1', 'member'),
(50, '10', '2', '1', 'admin'),
(51, '10', '7', '1', 'member'),
(52, '10', '5', '1', 'member'),
(53, '10', '4', '1', 'member'),
(54, '10', '6', '1', 'member'),
(55, '10', '3', '1', 'member'),
(56, '11', '8', '1', 'admin'),
(57, '11', '7', '1', 'member'),
(58, '11', '6', '1', 'member'),
(59, '11', '5', '1', 'member'),
(60, '11', '4', '1', 'member'),
(61, '10', '12', '1', 'member'),
(62, '10', '10', '1', 'member'),
(63, '10', '9', '1', 'member'),
(64, '10', '8', '1', 'member'),
(65, '10', '1', '1', 'member'),
(66, '10', '11', '1', 'member'),
(67, '3', '9', '1', 'member'),
(68, '3', '11', '1', 'member'),
(69, '3', '10', '1', 'member'),
(70, '1', '7', '1', 'member'),
(71, '11', '1', '1', 'member'),
(72, '11', '2', '1', 'member'),
(73, '11', '3', '1', 'member'),
(74, '8', '8', '1', 'member'),
(75, '2', '13', '1', 'member'),
(76, '2', '8', '1', 'member'),
(77, '2', '9', '1', 'member'),
(78, '2', '9', '1', 'member');

-- --------------------------------------------------------

--
-- Table structure for table `like_table`
--

CREATE TABLE `like_table` (
  `like_id` int(254) NOT NULL,
  `posting_id_like` varchar(250) NOT NULL,
  `sender_like_id` varchar(250) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `like_table`
--

INSERT INTO `like_table` (`like_id`, `posting_id_like`, `sender_like_id`, `date`) VALUES
(2, '1', '7', '2023-09-01'),
(4, '3', '3', '2023-09-01'),
(5, '2', '3', '2023-09-01'),
(10, '2', '7', '2023-09-06'),
(13, '4', '7', '2023-09-06'),
(14, '3', '7', '2023-09-06'),
(15, '4', '12', '2023-09-06'),
(16, '3', '12', '2023-09-06'),
(17, '2', '12', '2023-09-06'),
(18, '1', '12', '2023-09-06'),
(20, '6', '12', '2023-09-06'),
(22, '6', '7', '2023-09-07'),
(23, '6', '7', '2023-09-07'),
(24, '6', '7', '2023-09-07'),
(25, '6', '7', '2023-09-07'),
(26, '7', '7', '2023-09-07'),
(27, '8', '7', '2023-09-07'),
(28, '11', '7', '2023-09-07'),
(29, '10', '7', '2023-09-07');

-- --------------------------------------------------------

--
-- Table structure for table `unlike_tbl`
--

CREATE TABLE `unlike_tbl` (
  `unlike_id` int(254) NOT NULL,
  `unlike_post_id` varchar(250) DEFAULT NULL,
  `create_unlike_id` varchar(250) DEFAULT NULL,
  `date_unlike` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unlike_tbl`
--

INSERT INTO `unlike_tbl` (`unlike_id`, `unlike_post_id`, `create_unlike_id`, `date_unlike`) VALUES
(9, '2', '7', '06 Sep, 2023. 12:45 pm'),
(10, '4', '7', '06 Sep, 2023. 12:57 pm'),
(11, '3', '7', '06 Sep, 2023. 04:16 pm'),
(13, '6', '12', '06 Sep, 2023. 05:36 pm'),
(14, '7', '7', '07 Sep, 2023. 04:08 pm'),
(15, '11', '7', '07 Sep, 2023. 04:31 pm'),
(16, '10', '7', '07 Sep, 2023. 04:31 pm');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(250) NOT NULL,
  `public_id` varchar(999) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `email` varchar(111) NOT NULL,
  `dob` varchar(111) NOT NULL,
  `username` varchar(111) NOT NULL,
  `password` varchar(111) NOT NULL,
  `profile_pic` varchar(234) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `public_id`, `first_name`, `last_name`, `gender`, `phone_number`, `email`, `dob`, `username`, `password`, `profile_pic`) VALUES
(1, '1867648114766856960', 'StartApp', '', 'Male', '08037858023', 'abubakar@gmail.com', '2023-08-19', 'startappcommunity', '1', '1689262089941.jpg'),
(2, '1152000320249716224', 'Ahmad', 'Isa', 'Male', '08130033655', 'abubakar@gmail.com', '2023-08-16', 'abubakar21', '1', 'student2.jpg'),
(3, '1916347619062272256', 'Maryama', 'Ibrahim', 'Femal', '08037858023', 'abubakaribrahim30012@gmail.com', '2023-08-21', 'maryam', '2', 'user5-128x128.jpg'),
(4, '1261568102834427136', 'Walida', 'mrcode', 'female', '09021344455', 'walidamrcode@gmail.com', '2023-08-10', 'walidamrcode', '4', 'user7-128x128.jpg'),
(5, '1661188468743186688', 'Muhammad  ', 'Bello', 'Male', '08130033655', 'abubakar@gmail.com', '2023-08-09', 'muhammadbello', '2', 'istockphoto-1283724500-612x612.jpg'),
(6, '562705319923537600', 'Alameen ', 'Muhammad', 'male', '08037858023', 'abubakaribrahim30012@gmail.com', '2023-08-22', 'alameenmuhammad', '5', 'students.jpg'),
(7, '652820934005238656', 'Fatima', 'Ahmad musa', 'Female', '08037858023', 'fatima@gmail.com', '18-8-2002', 'fatimamuhammad', '12345', 'IMG_20230902_100056.jpg'),
(8, '1513603212145416704', 'Muhammed', 'Ibrahim Umar', 'Male', '08037858023', 'abubakar@gmail.com', '2023-08-21', 'abubakar1112', '123456', 'user8-128x128.jpg'),
(9, '209739067415956992', 'Abdulmumini', 'yusuf', 'male', '07066719616', 'Abdulmuminiyusuf749@gmail.com', '2024-01-01', 'Abdulmumini', 'yahoo', 'user2-160x160.jpg'),
(10, '1410327241089496320', 'Muhammed', 'Ibrahim Umar', 'Male', '08037858023', 'abubakar@gmail.com', '2023-08-31', 'abubakar11121', '12', NULL),
(11, '1260579577542237440', 'Muhammed', 'Ibrahim Umar', 'Male', '08037858023', 'abubakar@gmail.com', '2023-08-31', 'abubakar111', '22', 'Screenshot from 2023-08-23 09-45-26.png'),
(12, '1733383553890275072', 'Maryam', 'Pepe', 'Female', '08130033655', 'abubakar@gmail.com', '12 aug, 2005', 'abubakar1111', '11', 'Snapchat-1906549363.jpg'),
(13, '1465321171391026688', 'Ahmad Adamu', 'Usman', 'Male', '07062977944', 'ahmadadamuusmanuncle@gmail.com', '2003-02-02', 'Ahmad01', 'Uncle6951', 'IMG_20230708_175907.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat_tbl`
--
ALTER TABLE `chat_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_tbl`
--
ALTER TABLE `comment_tbl`
  ADD PRIMARY KEY (`comt_id`);

--
-- Indexes for table `create_posting`
--
ALTER TABLE `create_posting`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `friend_request`
--
ALTER TABLE `friend_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_chat`
--
ALTER TABLE `group_chat`
  ADD PRIMARY KEY (`chatId`);

--
-- Indexes for table `group_name`
--
ALTER TABLE `group_name`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `group_request`
--
ALTER TABLE `group_request`
  ADD PRIMARY KEY (`key_id`);

--
-- Indexes for table `like_table`
--
ALTER TABLE `like_table`
  ADD PRIMARY KEY (`like_id`);

--
-- Indexes for table `unlike_tbl`
--
ALTER TABLE `unlike_tbl`
  ADD PRIMARY KEY (`unlike_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat_tbl`
--
ALTER TABLE `chat_tbl`
  MODIFY `id` int(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `comment_tbl`
--
ALTER TABLE `comment_tbl`
  MODIFY `comt_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `create_posting`
--
ALTER TABLE `create_posting`
  MODIFY `post_id` int(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `friend_request`
--
ALTER TABLE `friend_request`
  MODIFY `id` int(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;
--
-- AUTO_INCREMENT for table `group_chat`
--
ALTER TABLE `group_chat`
  MODIFY `chatId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `group_name`
--
ALTER TABLE `group_name`
  MODIFY `group_id` int(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `group_request`
--
ALTER TABLE `group_request`
  MODIFY `key_id` int(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `like_table`
--
ALTER TABLE `like_table`
  MODIFY `like_id` int(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `unlike_tbl`
--
ALTER TABLE `unlike_tbl`
  MODIFY `unlike_id` int(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
