-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2018 at 05:30 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinestories`
--

-- --------------------------------------------------------

--
-- Table structure for table `author_review`
--

CREATE TABLE `author_review` (
  `author_review_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `author_id` int(100) NOT NULL,
  `rating` decimal(1,0) NOT NULL,
  `content` text NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bookmark`
--

CREATE TABLE `bookmark` (
  `bookmark_id` int(100) NOT NULL,
  `story_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `chapter`
--

CREATE TABLE `chapter` (
  `chapter_id` int(255) NOT NULL,
  `story_id` int(255) NOT NULL,
  `chapter_number` int(255) NOT NULL,
  `chapter_title` varchar(32) NOT NULL,
  `chapter_content` mediumtext NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chapter`
--

INSERT INTO `chapter` (`chapter_id`, `story_id`, `chapter_number`, `chapter_title`, `chapter_content`, `date_added`) VALUES
(8, 27, 1, 'The Beginning', '<p>asdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdas</p>\r\n<p>asdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdas</p>\r\n<p>&nbsp;</p>\r\n<p>asdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdas</p>', '2018-10-08 05:23:56'),
(9, 27, 1, 'The Beginning', '<p>asdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdas</p>\r\n<p>asdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdas</p>\r\n<p>&nbsp;</p>\r\n<p>asdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdas</p>', '2018-10-08 05:23:56'),
(6, 26, 1, 'asdasdasdasdasdasdasdasdasdasdas', '<p>asdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasd</p>\r\n<p>asdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasd</p>\r\n<p>&nbsp;</p>\r\n<p>asdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasd</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', '2018-10-08 05:22:47'),
(7, 26, 1, 'asdasdasdasdasdasdasdasdasdasdas', '<p>asdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasd</p>\r\n<p>asdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasd</p>\r\n<p>&nbsp;</p>\r\n<p>asdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasd</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', '2018-10-08 05:22:47');

-- --------------------------------------------------------

--
-- Table structure for table `chapter_rating`
--

CREATE TABLE `chapter_rating` (
  `chapter_rating_id` int(255) NOT NULL,
  `chapter_id` int(32) NOT NULL,
  `user_id` int(32) NOT NULL,
  `rating` int(4) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `content_warning`
--

CREATE TABLE `content_warning` (
  `content_warning_id` int(8) NOT NULL,
  `content_warning_name` varchar(16) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content_warning`
--

INSERT INTO `content_warning` (`content_warning_id`, `content_warning_name`) VALUES
(1, 'Profanity'),
(2, 'Gore'),
(5, 'Sexual Content');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `genre_id` int(4) NOT NULL,
  `genre_name` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`genre_id`, `genre_name`) VALUES
(1, 'Action'),
(2, 'Adventure'),
(3, 'Comedy'),
(4, 'Drama'),
(5, 'Fantasy'),
(6, 'Historical'),
(7, 'Horror'),
(8, 'Psychological'),
(9, 'Romance'),
(10, 'Sci-fi'),
(11, 'Mystery'),
(12, 'Tragedy'),
(13, 'Short Story'),
(14, 'Satire');

-- --------------------------------------------------------

--
-- Table structure for table `image_type`
--

CREATE TABLE `image_type` (
  `type_id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `dimension` varchar(9) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image_type`
--

INSERT INTO `image_type` (`type_id`, `name`, `dimension`) VALUES
(1, 'original', NULL),
(2, 'story', '300x300'),
(3, 'user', '100x100');

-- --------------------------------------------------------

--
-- Table structure for table `last_read`
--

CREATE TABLE `last_read` (
  `last_read_id` int(50) NOT NULL,
  `story_id` int(50) NOT NULL,
  `chapter_id` int(50) NOT NULL,
  `reader_id` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `last_read`
--

INSERT INTO `last_read` (`last_read_id`, `story_id`, `chapter_id`, `reader_id`) VALUES
(20, 50, 19, 16),
(21, 70, 31, 16),
(22, 70, 31, 17);

-- --------------------------------------------------------

--
-- Table structure for table `profile_image`
--

CREATE TABLE `profile_image` (
  `image_id` int(100) NOT NULL,
  `type_id` int(100) NOT NULL,
  `file_name` varchar(32) NOT NULL,
  `file_path` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile_image`
--

INSERT INTO `profile_image` (`image_id`, `type_id`, `file_name`, `file_path`) VALUES
(14, 2, '_story_image.jpeg', 'http://localhost/onlinestories/assets/uploaded_images/_story_image.jpeg'),
(13, 2, '_story_image.jpeg', 'http://localhost/onlinestories/assets/uploaded_images/_story_image.jpeg'),
(11, 2, '_story_image.jpeg', 'http://localhost/onlinestories/assets/uploaded_images/_story_image.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `story`
--

CREATE TABLE `story` (
  `story_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `story_title` varchar(32) NOT NULL,
  `synopsis` text NOT NULL,
  `image_id` int(100) DEFAULT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `story`
--

INSERT INTO `story` (`story_id`, `user_id`, `story_title`, `synopsis`, `image_id`, `date_added`) VALUES
(25, 16, 'asdasdasdas', '<p>asdasdasdasdasdasdasdasdas</p>', NULL, '2018-10-08 05:22:12'),
(26, 16, 'asdasdasdas', '<p>asdasdasdasdasdasdasdasdas</p>', NULL, '2018-10-08 05:22:47'),
(27, 16, 'Sample New Story', '<p>asdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdasasdasdasdas</p>', NULL, '2018-10-08 05:23:56');

-- --------------------------------------------------------

--
-- Table structure for table `story_content_warning`
--

CREATE TABLE `story_content_warning` (
  `story_content_warning_id` int(8) NOT NULL,
  `story_id` int(4) NOT NULL,
  `content_warning_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `story_content_warning`
--

INSERT INTO `story_content_warning` (`story_content_warning_id`, `story_id`, `content_warning_id`) VALUES
(1, 22, 1),
(2, 22, 2),
(3, 22, 5),
(4, 23, 1),
(5, 23, 2),
(6, 23, 5),
(7, 24, 1),
(8, 24, 2),
(9, 24, 5),
(10, 25, 1),
(11, 25, 2),
(12, 26, 1),
(13, 26, 2),
(14, 27, 1),
(15, 27, 2);

-- --------------------------------------------------------

--
-- Table structure for table `story_genre`
--

CREATE TABLE `story_genre` (
  `story_genre_id` int(8) NOT NULL,
  `story_id` int(4) NOT NULL,
  `genre_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `story_genre`
--

INSERT INTO `story_genre` (`story_genre_id`, `story_id`, `genre_id`) VALUES
(318, 25, 1),
(319, 25, 2),
(320, 25, 8),
(321, 25, 9),
(322, 25, 10),
(323, 26, 1),
(324, 26, 2),
(325, 26, 8),
(326, 26, 9),
(327, 26, 10),
(328, 27, 1),
(329, 27, 2),
(330, 27, 3),
(331, 27, 5);

-- --------------------------------------------------------

--
-- Table structure for table `story_image`
--

CREATE TABLE `story_image` (
  `story_image_id` int(11) NOT NULL,
  `story_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `story_review`
--

CREATE TABLE `story_review` (
  `story_review_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `story_id` int(100) NOT NULL,
  `rating` decimal(1,0) NOT NULL,
  `content` text NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `story_tag`
--

CREATE TABLE `story_tag` (
  `story_tag_id` int(8) NOT NULL,
  `story_id` int(4) NOT NULL,
  `tag_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `story_tag`
--

INSERT INTO `story_tag` (`story_tag_id`, `story_id`, `tag_id`) VALUES
(19, 25, 1),
(20, 25, 2),
(21, 25, 8),
(22, 25, 10),
(23, 26, 1),
(24, 26, 2),
(25, 26, 8),
(26, 26, 10),
(27, 27, 5),
(28, 27, 8),
(29, 27, 10);

-- --------------------------------------------------------

--
-- Table structure for table `suggested_tags`
--

CREATE TABLE `suggested_tags` (
  `suggested_tags_id` int(10) NOT NULL,
  `story_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `tag_id` int(5) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tag_id` int(4) NOT NULL,
  `tag_name` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tag_id`, `tag_name`) VALUES
(1, 'LitRPG'),
(2, 'Virtual Reality'),
(3, 'Cyberpunk'),
(4, 'Reincarnation'),
(5, 'Summoned Hero'),
(6, 'Martial Arts'),
(7, 'Slice of Life'),
(8, 'Overpowered'),
(9, 'Non-Human'),
(10, 'Anti-hero');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(11) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_created` date NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `date_created`, `last_login`) VALUES
(16, 'John', '$2y$10$g61ghl.Uh53oKlGK9jtVh.cge.H0LjnN2/g4EE6Nzuu9zdU9l7rxm', '2018-02-10', '2018-10-08 02:29:35'),
(17, 'Peter', '$2y$10$yNVdF9hsuUzx5b3gXJT53OYP379LijVGp6pjvJ2zYtNLalJFUgamq', '2018-02-10', '2018-03-10 06:16:35'),
(18, 'Lloyd', '$2y$10$FjfG4DkTiTaqQMiYnh5V.eNsqp.afeyThmUoc7PlsIinujHuB1sDy', '2018-02-10', '2018-03-09 11:01:55'),
(19, 'Christian', '$2y$10$sPYrugTPDVsFMqauuXg2eOMPn0.q/83dqD1Gn1KUvJ3PgrfvC.aFa', '2018-02-26', '2018-03-09 11:01:13'),
(20, 'Kris', '$2y$10$moCQOtFLAl55.xUmLAf.7OyV2hDZwhtQd9evKbIm0g02ot068Ar76', '2018-02-26', '2018-03-09 11:00:16');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `profile_id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image_id` int(100) NOT NULL,
  `display_name` varchar(16) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `last_updated` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`profile_id`, `user_id`, `image_id`, `display_name`, `birthdate`, `gender`, `last_updated`) VALUES
(2, 16, 0, 'John', '1993-05-24', 'Male', NULL),
(3, 17, 0, 'Peter', '1991-01-01', 'Female', NULL),
(4, 18, 0, 'Lloyd', '1993-05-24', 'Female', NULL),
(5, 19, 0, 'Christian', '1995-05-24', 'Male', NULL),
(6, 20, 0, 'Kris', '1990-02-02', 'Male', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author_review`
--
ALTER TABLE `author_review`
  ADD PRIMARY KEY (`author_review_id`);

--
-- Indexes for table `bookmark`
--
ALTER TABLE `bookmark`
  ADD PRIMARY KEY (`bookmark_id`);

--
-- Indexes for table `chapter`
--
ALTER TABLE `chapter`
  ADD PRIMARY KEY (`chapter_id`);

--
-- Indexes for table `chapter_rating`
--
ALTER TABLE `chapter_rating`
  ADD PRIMARY KEY (`chapter_rating_id`),
  ADD UNIQUE KEY `chapter_id` (`chapter_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `content_warning`
--
ALTER TABLE `content_warning`
  ADD PRIMARY KEY (`content_warning_id`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`genre_id`);

--
-- Indexes for table `image_type`
--
ALTER TABLE `image_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `last_read`
--
ALTER TABLE `last_read`
  ADD PRIMARY KEY (`last_read_id`);

--
-- Indexes for table `profile_image`
--
ALTER TABLE `profile_image`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `story`
--
ALTER TABLE `story`
  ADD PRIMARY KEY (`story_id`);

--
-- Indexes for table `story_content_warning`
--
ALTER TABLE `story_content_warning`
  ADD PRIMARY KEY (`story_content_warning_id`);

--
-- Indexes for table `story_genre`
--
ALTER TABLE `story_genre`
  ADD PRIMARY KEY (`story_genre_id`);

--
-- Indexes for table `story_image`
--
ALTER TABLE `story_image`
  ADD PRIMARY KEY (`story_image_id`);

--
-- Indexes for table `story_review`
--
ALTER TABLE `story_review`
  ADD PRIMARY KEY (`story_review_id`);

--
-- Indexes for table `story_tag`
--
ALTER TABLE `story_tag`
  ADD PRIMARY KEY (`story_tag_id`);

--
-- Indexes for table `suggested_tags`
--
ALTER TABLE `suggested_tags`
  ADD PRIMARY KEY (`suggested_tags_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`profile_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author_review`
--
ALTER TABLE `author_review`
  MODIFY `author_review_id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bookmark`
--
ALTER TABLE `bookmark`
  MODIFY `bookmark_id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `chapter`
--
ALTER TABLE `chapter`
  MODIFY `chapter_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `content_warning`
--
ALTER TABLE `content_warning`
  MODIFY `content_warning_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `genre_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `image_type`
--
ALTER TABLE `image_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `last_read`
--
ALTER TABLE `last_read`
  MODIFY `last_read_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `profile_image`
--
ALTER TABLE `profile_image`
  MODIFY `image_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `story`
--
ALTER TABLE `story`
  MODIFY `story_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `story_content_warning`
--
ALTER TABLE `story_content_warning`
  MODIFY `story_content_warning_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `story_genre`
--
ALTER TABLE `story_genre`
  MODIFY `story_genre_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=332;
--
-- AUTO_INCREMENT for table `story_image`
--
ALTER TABLE `story_image`
  MODIFY `story_image_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `story_review`
--
ALTER TABLE `story_review`
  MODIFY `story_review_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `story_tag`
--
ALTER TABLE `story_tag`
  MODIFY `story_tag_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `suggested_tags`
--
ALTER TABLE `suggested_tags`
  MODIFY `suggested_tags_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `profile_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
