-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2022 at 09:29 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newspaper`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `about_id` int(11) NOT NULL,
  `about_title` varchar(255) NOT NULL,
  `about_detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`about_id`, `about_title`, `about_detail`) VALUES
(1, 'About Us', 'Write about your site..');

-- --------------------------------------------------------

--
-- Table structure for table `admin_theme`
--

CREATE TABLE `admin_theme` (
  `theme_id` int(11) NOT NULL,
  `theme_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_theme`
--

INSERT INTO `admin_theme` (`theme_id`, `theme_name`) VALUES
(1, 'warning');

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `ads_id` int(11) NOT NULL,
  `ads_title` varchar(255) NOT NULL,
  `ads_detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`ads_id`, `ads_title`, `ads_detail`) VALUES
(1, 'Header', '<p><a href=\"#\"><img src=\"data:image/jpeg;base64,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\" alt=\"\" /></a></p>\r\n'),
(2, 'Sidebar', '<a href=\"#\"><img src=\"data:image/jpeg;base64,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\" alt=\"\" /></a>\r\n'),
(3, 'Body 1', '<a href=\"#\"><img src=\"data:image/jpeg;base64,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\" alt=\"\" /></a>\r\n'),
(4, 'Footer', '<a href=\"#\"><img src=\"data:image/jpeg;base64,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\" alt=\"\" /></a>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(150) NOT NULL,
  `category_url` varchar(150) NOT NULL,
  `category_total_posts` int(11) NOT NULL DEFAULT 0,
  `total_post_views` int(11) NOT NULL DEFAULT 0,
  `category_status` varchar(255) NOT NULL DEFAULT 'Published',
  `created_on` text NOT NULL,
  `created_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_url`, `category_total_posts`, `total_post_views`, `category_status`, `created_on`, `created_by`) VALUES
(1, 'Sports', 'sports', 1, 0, 'Published', 'May 11, 2022, at 8:20 pm', 'Admin Admin');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `com_id` int(11) NOT NULL,
  `com_user_id` int(11) NOT NULL,
  `com_user_name` varchar(255) NOT NULL,
  `com_post_id` int(11) NOT NULL,
  `com_user_email` varchar(255) NOT NULL,
  `com_detail` text NOT NULL,
  `com_date` varchar(255) NOT NULL,
  `com_status` varchar(255) NOT NULL DEFAULT 'unapprove',
  `reply` varchar(255) NOT NULL DEFAULT 'Not yet replied',
  `reply_date` varchar(255) NOT NULL DEFAULT '1',
  `replied` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `contact_title` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_phone` varchar(255) NOT NULL,
  `contact_country` varchar(255) NOT NULL,
  `contact_city` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `contact_title`, `contact_email`, `contact_phone`, `contact_country`, `contact_city`) VALUES
(1, 'Contact us', 'contact@contact.com', '1234567890', 'Website country', 'Website city');

-- --------------------------------------------------------

--
-- Table structure for table `home_theme`
--

CREATE TABLE `home_theme` (
  `theme_id` int(11) NOT NULL,
  `theme_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home_theme`
--

INSERT INTO `home_theme` (`theme_id`, `theme_name`) VALUES
(1, 'style');

-- --------------------------------------------------------

--
-- Table structure for table `hot_news`
--

CREATE TABLE `hot_news` (
  `hot_post_id` int(11) NOT NULL,
  `hot_post_title` varchar(255) NOT NULL,
  `hot_post_detail` text NOT NULL,
  `hot_post_url` varchar(255) NOT NULL,
  `hot_post_category_id` int(11) NOT NULL,
  `hot_post_image` text NOT NULL,
  `hot_post_date` varchar(255) NOT NULL,
  `hot_post_status` varchar(255) NOT NULL DEFAULT 'Published',
  `hot_post_author` varchar(255) NOT NULL,
  `hot_post_views` int(11) NOT NULL DEFAULT 0,
  `hot_post_comment_count` int(11) NOT NULL DEFAULT 0,
  `hot_post_tags` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `login_activity`
--

CREATE TABLE `login_activity` (
  `login_id` int(100) NOT NULL,
  `login_ip_address` varchar(255) NOT NULL,
  `login_date` varchar(255) NOT NULL,
  `login_country` varchar(255) NOT NULL,
  `login_user` int(100) NOT NULL,
  `login_city` varchar(255) NOT NULL,
  `login_region` varchar(255) NOT NULL,
  `login_browser` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_activity`
--

INSERT INTO `login_activity` (`login_id`, `login_ip_address`, `login_date`, `login_country`, `login_user`, `login_city`, `login_region`, `login_browser`) VALUES
(1, '207.228.238.7', 'May 11, 2022, at 7:53 pm', 'United States', 1, 'Washington', 'District of Columbia', 'Chrome'),
(2, '207.228.238.7', 'May 11, 2022, at 8:13 pm', 'United States', 1, 'Washington', 'District of Columbia', 'Chrome'),
(3, '207.228.238.7', 'May 11, 2022, at 8:16 pm', 'United States', 1, 'Washington', 'District of Columbia', 'Chrome');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `ms_id` int(11) NOT NULL,
  `ms_name` varchar(255) NOT NULL,
  `ms_phone` varchar(255) NOT NULL,
  `ms_email` varchar(255) NOT NULL,
  `ms_date` varchar(255) NOT NULL,
  `ms_detail` text NOT NULL,
  `ms_status` varchar(255) NOT NULL DEFAULT 'unread',
  `ms_ip` varchar(255) NOT NULL DEFAULT '0.0.0.0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `policy`
--

CREATE TABLE `policy` (
  `policy_id` int(11) NOT NULL,
  `policy_title` varchar(255) NOT NULL,
  `policy_detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `policy`
--

INSERT INTO `policy` (`policy_id`, `policy_title`, `policy_detail`) VALUES
(1, 'Privacy Policy', 'Write your website policy here');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_user_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_url` varchar(255) NOT NULL,
  `post_category_id` int(11) NOT NULL,
  `post_detail` text NOT NULL,
  `post_image` text NOT NULL,
  `post_date` varchar(255) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'Published',
  `post_author` varchar(255) NOT NULL,
  `post_views` int(11) NOT NULL DEFAULT 0,
  `post_comment_count` int(11) NOT NULL DEFAULT 0,
  `post_tags` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_user_id`, `post_title`, `post_url`, `post_category_id`, `post_detail`, `post_image`, `post_date`, `post_status`, `post_author`, `post_views`, `post_comment_count`, `post_tags`) VALUES
(1, 1, 'WordPress clone', 'wordpress-clone', 1, '<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nostrum velit ducimus necessitatibus repudiandae quam id amet quas, quasi officia hic blanditiis officiis iure dolor optio reiciendis nam eligendi cupiditate eos pariatur! Magni autem iure optio facere quis est maiores labore ipsum fugiat tempora, officia corrupti quia, debitis velit ducimus nulla eius a cum omnis et eligendi provident in molestias dolore. Placeat iusto assumenda exercitationem, voluptatibus nisi sed vitae corporis. Labore alias vel mollitia dicta a perspiciatis nostrum voluptates dolorum officia id, consequuntur odio quia modi exercitationem molestiae fugit molestias nesciunt? Nesciunt, totam mollitia? Suscipit molestiae expedita voluptatem itaque, ad excepturi.</p>\r\n', 'photo_2022-04-16_19-39-59.jpg', 'May 11, 2022, at 8:21 pm', 'Published', 'Admin Admin', 49, 0, 'assss');

-- --------------------------------------------------------

--
-- Table structure for table `script_code`
--

CREATE TABLE `script_code` (
  `code_id` int(11) NOT NULL,
  `s_code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `script_code`
--

INSERT INTO `script_code` (`code_id`, `s_code`) VALUES
(1, ''),
(2, '');

-- --------------------------------------------------------

--
-- Table structure for table `site_detail`
--

CREATE TABLE `site_detail` (
  `site_id` int(11) NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `site_image` text NOT NULL,
  `site_desc` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `site_detail`
--

INSERT INTO `site_detail` (`site_id`, `site_name`, `site_image`, `site_desc`, `date`) VALUES
(1, 'ddsds', 'dsfds', 'sdfds', 'dsfdsds'),
(2, 'WordPress clone', '_HGYpmFhC76aPKW3pzXnVW (3).png', 'WordPress Clone', 'May 11, 2022, at 8:06 pm');

-- --------------------------------------------------------

--
-- Table structure for table `site_purpose`
--

CREATE TABLE `site_purpose` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `site_purpose`
--

INSERT INTO `site_purpose` (`p_id`, `p_name`) VALUES
(1, 'Blogs');

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `social_media_id` int(11) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `facebook_url` varchar(255) NOT NULL DEFAULT 'https://facebook.com/',
  `instagram` varchar(255) NOT NULL,
  `instagram_url` varchar(255) NOT NULL DEFAULT 'https://instagram.com/',
  `twitter_url` varchar(255) NOT NULL DEFAULT 'https://twitter.com/',
  `twitter` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL,
  `youtube_url` varchar(255) NOT NULL DEFAULT 'https://youtube.com/'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`social_media_id`, `facebook`, `facebook_url`, `instagram`, `instagram_url`, `twitter_url`, `twitter`, `youtube`, `youtube_url`) VALUES
(1, 'rose45', 'https://facebook.com/', 'mos11', 'https://instagram.com/', 'https://twitter.com/', 'res21', 'res13', 'https://youtube.com/');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `terms_id` int(11) NOT NULL,
  `terms_title` varchar(255) NOT NULL,
  `terms_detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`terms_id`, `terms_title`, `terms_detail`) VALUES
(1, 'Terms of site', 'Write your terms of site here...');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `user_name` varchar(150) NOT NULL,
  `user_email` varchar(150) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_about` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `user_allow` varchar(255) NOT NULL DEFAULT 'no',
  `user_phone` varchar(255) NOT NULL,
  `user_photo` text NOT NULL,
  `registered_on` varchar(255) NOT NULL,
  `user_fb_url` varchar(255) NOT NULL DEFAULT 'https://facebook.com/',
  `user_fb_name` varchar(255) NOT NULL DEFAULT 'Not yet added',
  `user_ig_url` varchar(255) NOT NULL DEFAULT 'https://instagram.com/',
  `user_ig_name` varchar(255) NOT NULL DEFAULT 'Not yet added',
  `user_tw_url` varchar(255) NOT NULL DEFAULT 'https://twitter.com/',
  `user_tw_name` varchar(255) NOT NULL DEFAULT 'Not yet added',
  `act` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `full_name`, `user_name`, `user_email`, `user_password`, `user_about`, `user_role`, `user_allow`, `user_phone`, `user_photo`, `registered_on`, `user_fb_url`, `user_fb_name`, `user_ig_url`, `user_ig_name`, `user_tw_url`, `user_tw_name`, `act`) VALUES
(1, 'Admin Admin', 'admin', 'admin@admin.com', '$2y$10$rNYQ/RUaTD1hny3VrMZZQuEK9boetd0sJ6Q0s4OsowbZa6YNXGpby', ' I am the admin', 'admin', 'yes', ' 09876543210', '_HGYpmFhC76aPKW3pzXnVW (8).png', 'Nov 11, 2020 at 11:49 PM', 'https://facebook.com/', 'Not yet added', 'https://instagram.com/', 'Not yet added', 'https://twitter.com/', 'Not yet added', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_permissions`
--

CREATE TABLE `user_permissions` (
  `perm_id` int(11) NOT NULL,
  `user_register` varchar(255) NOT NULL,
  `user_comment` varchar(255) NOT NULL,
  `ads_show` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_permissions`
--

INSERT INTO `user_permissions` (`perm_id`, `user_register`, `user_comment`, `ads_show`) VALUES
(1, 'No', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `visitors_count`
--

CREATE TABLE `visitors_count` (
  `v_count` bigint(255) NOT NULL,
  `id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitors_count`
--

INSERT INTO `visitors_count` (`v_count`, `id`) VALUES
(1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `visitors_ip`
--

CREATE TABLE `visitors_ip` (
  `v_id` int(110) NOT NULL,
  `v_ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitors_ip`
--

INSERT INTO `visitors_ip` (`v_id`, `v_ip`) VALUES
(1, '::1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `admin_theme`
--
ALTER TABLE `admin_theme`
  ADD PRIMARY KEY (`theme_id`);

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`ads_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_name` (`category_name`,`category_url`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `home_theme`
--
ALTER TABLE `home_theme`
  ADD PRIMARY KEY (`theme_id`);

--
-- Indexes for table `hot_news`
--
ALTER TABLE `hot_news`
  ADD PRIMARY KEY (`hot_post_id`);

--
-- Indexes for table `login_activity`
--
ALTER TABLE `login_activity`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`ms_id`);

--
-- Indexes for table `policy`
--
ALTER TABLE `policy`
  ADD PRIMARY KEY (`policy_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `script_code`
--
ALTER TABLE `script_code`
  ADD PRIMARY KEY (`code_id`);

--
-- Indexes for table `site_detail`
--
ALTER TABLE `site_detail`
  ADD PRIMARY KEY (`site_id`);

--
-- Indexes for table `site_purpose`
--
ALTER TABLE `site_purpose`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`social_media_id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`terms_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`,`user_email`);

--
-- Indexes for table `user_permissions`
--
ALTER TABLE `user_permissions`
  ADD PRIMARY KEY (`perm_id`);

--
-- Indexes for table `visitors_ip`
--
ALTER TABLE `visitors_ip`
  ADD PRIMARY KEY (`v_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_theme`
--
ALTER TABLE `admin_theme`
  MODIFY `theme_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `ads_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_theme`
--
ALTER TABLE `home_theme`
  MODIFY `theme_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hot_news`
--
ALTER TABLE `hot_news`
  MODIFY `hot_post_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login_activity`
--
ALTER TABLE `login_activity`
  MODIFY `login_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `ms_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `policy`
--
ALTER TABLE `policy`
  MODIFY `policy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `script_code`
--
ALTER TABLE `script_code`
  MODIFY `code_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `site_detail`
--
ALTER TABLE `site_detail`
  MODIFY `site_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `site_purpose`
--
ALTER TABLE `site_purpose`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `social_media_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `terms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_permissions`
--
ALTER TABLE `user_permissions`
  MODIFY `perm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visitors_ip`
--
ALTER TABLE `visitors_ip`
  MODIFY `v_id` int(110) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
