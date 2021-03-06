-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 16, 2016 at 01:49 AM
-- Server version: 5.5.31
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studiobca_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `images` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `content` longtext COLLATE utf8_unicode_ci,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `publish` int(11) NOT NULL,
  `featured` int(11) NOT NULL,
  `order_by` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci,
  `descriptions` text COLLATE utf8_unicode_ci,
  `keywords` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `category_id`, `name`, `images`, `description`, `content`, `slug`, `publish`, `featured`, `order_by`, `title`, `descriptions`, `keywords`, `created_at`, `updated_at`) VALUES
(2, 6, 'Who we are', 'public/media/front-pic-1473155273.png', '', '<p>BCA STUDIO IS A DIGITAL CREATIVE BOUTIQUE AGENCY BASED IN SAIGON THAT CRAFTS FUNCTIONALLY BEAUTIFUL WEBSITES AND APPS. TOGETHER, WE CAN TRANSFORM THE WAY YOUR BRAND CONNECTS WITH CLIENTS. <br />\r\n<br />\r\nOUR UX DESIGN EXPERTISE AND INTERNATIONAL WORKING MINDSET ARE WHAT SET US APART FROM OTHER LOCAL AGENCIES. IF YOU HAVE AN AMAZING IDEA THAT YOU WANNA TURN INTO REALITY, WE CAN BE YOUR DIGITAL PARTNER TO POWER ALL THE DESIGN AND DEVELOPMENT WORKS SO YOU CAN RAISE MONEY AND TAKE OVER THE WORLD!</p>\r\n', 'who-we-are', 1, 1, 1, NULL, NULL, NULL, '2016-09-08 01:53:15', '2016-09-08 01:53:15'),
(3, 6, 'What we do', 'public/media/country-img-1473155372.png', '', '<p>WE ARE A FULL-SERVICE AGENCY WITH 5 YEARS EXPERIENCE WORKING WITH CLIENTS AROUND THE WORLD FROM SINGAPORE, TO KOREA AND UK. THROUGH STRATEGY, CREATIVE AND TECHNOLOGY, WE DESIGN & BUILD FUNCTIONAL WEBSITES, APPS, AND BRAND EXPERIENCES THAT ENGAGE WITH CONSUMERS IN THE DIGITAL ERA. <br />\r\n<br />\r\nAS YOUR PARTNER, WE NOT ONLY BUILD YOUR PRODUCT BUT ALSO GROWTH HACK IT. WE UNDERSTAND VIETNAM MARKET WELL ENOUGH TO CONSULT FOR MANY STARTUPS FROM KOREA AND SINGAPORE.</p>\r\n', 'what-we-do', 1, 1, 2, NULL, NULL, NULL, '2016-09-07 16:12:53', '2016-09-07 16:12:53'),
(4, 7, 'OUR CULTURE', NULL, 'WE ARE YOUNG & BRIMMING WITH CONFIDENCE. \r\nNO RULES WITH US', '<p>OUR TEAM HAS A SINGLE QUALITY THAT TIES US TOGETHER, EVERYONE LOVES WHAT THEY DO.  OUR FRONT-END AND BACK-END DEVELOPERS WRITE ELEGANT CLEAN CODE. OUR EXCEPTIONAL UX/UI DESIGNERS CRAFTED PERFECTLY FUNCTIONAL LAYOUTS. WE ALL HAPPIEST WHEN WE CAN CREATE COOL STUFFS TOGETHER WITH OUR CLIENT. WE EMBRACE A FLAT HIERARCHY WORKING CULTURE WHERE EVERYONE HAS THE COMPLETE FREEDOM TO EXPLORE & EXCEL.</p>\r\n', 'our-culture', 1, 0, 0, NULL, NULL, NULL, '2016-09-15 07:04:02', '2016-09-15 07:04:02'),
(5, 7, 'Home', NULL, 'WE ARE A TEAM OF PERFECTIONISTS & RISK-TAKERS WHO TAKE PRIDE IN CREATING DISRUPTIVE DIGITAL EXPERIENCES.', '<p>WITH THE FOUNDERS WHO ARE RETURNEES FROM SINGAPORE AND ENGLAND, OUR TEAM IS PASSIONATE TO DELIVER INTERNATIONAL STANDARD WORK WITH LOCAL UNDERSTANDING. OVER 20 MEMBERS WITH MIX-CULTURE BUILDING OUR DREAMS TOGETHER IN A BIG INDUSTRIAL OPENED-SPACE CONCEPT STUDIO</p>\r\n', 'home', 1, 0, 0, NULL, NULL, NULL, '2016-09-15 07:08:15', '2016-09-15 07:08:15'),
(6, 8, 'Vi Thanh Ton Ho', 'public/media/vi-1473935007.jpg', 'Co-Founder / Director', 'Graduated from lasalle college of the art, singapore, Vi had 3 year experience as a graphic and web specialist in various agencies in singapore. In 2011, she co-founded Create Studio (or commonly known as Studio Bo Cong Anh) in Ho Chi Minh City, with the vision to be the one-stop visual communication solution agency that strikes to deliver international standard with local understanding. She is the Art Director of Quintessentially creative in South East Asia.', 'vi-thanh-ton-ho', 1, 0, 0, NULL, NULL, NULL, '2016-09-15 12:32:23', '2016-09-15 12:32:23'),
(7, 9, 'ACCOUNT MANAGER', 'public/media/img-position1-1473921107.svg', 'YOU ARE THE BRIDGE BETWEEN CLIENTS AND THE TEAM. YOU CAN SELL PRETTY MUCH EVERY IDEAS.', '', 'account-manager', 1, 0, 1, NULL, NULL, NULL, '2016-09-15 10:31:30', '2016-09-15 10:31:30'),
(8, 9, 'DESIGNERS &  DEVELOPERS', 'public/media/img-position2-1473921157.svg', 'TURN IDEAS INTO LIFE, BUILD WEBSITE THAT CONVERT, YOU ARE OUR MAGIC MAKERS.', '', 'designers-developers', 1, 0, 2, NULL, NULL, NULL, '2016-09-15 10:32:29', '2016-09-15 10:32:29'),
(9, 9, 'PROJECT  MANAGER', 'public/media/img-position3-1473921212.svg', 'YOU ARE A DOER THAT UNDERSTAND PRODUCT, EMPOWER THE TEAM AND MANAGE OUR BUDGET & TIMELINE.', '', 'project-manager', 1, 0, 3, NULL, NULL, NULL, '2016-09-15 10:33:22', '2016-09-15 10:33:22'),
(10, 8, 'Sieng Van Tran', 'public/media/img-ourteam1-1473928042.jpg', 'Co-Founder', 'Serial Entrepreneur having built and sold startups in Elearning, Ecommerce and Digital Media. Now having moved from London to Saigon, he is focused on disrupting the accelerator model in Asia by offering what might be the only one with a pool, spa, gym, and bar. From building up his network over the years, as Sieng explains, “We can growth hack like nobody can because of the platform we’ve built” and it’s this distribution that can help propel businesses into exponential growth on a global scale.', 'sieng-van-tran', 1, 0, 1, NULL, NULL, NULL, '2016-09-15 12:32:39', '2016-09-15 12:32:39'),
(11, 8, 'Lien Ho', 'public/media/lien-1473934810.jpg', 'General Manager', 'A graduate in International Business (Hons), Lien has been working in culturally-diverse companies in Malaysia and Vietnam. With over 5 years of experience in marketing and advertising, she has led marketing projects for various clients in Hospitality and Tourism industry, including social media campains for Vietnam Airlines, brand development for luxury hotels and properties, as well as private marketing activities catered to Elite clients for a luxury goods brand.\r\n', 'lien-ho', 1, 0, 2, NULL, NULL, NULL, '2016-09-15 13:38:58', '2016-09-15 13:38:58'),
(12, 8, 'Jinju Jung', 'public/media/img-ourteam11-1473931779.png', 'Senior UX/UI Designer', 'Graduated from RMIT Multimedia Design, Jinju - our Korean friend -  is a energetic and cheerful designer who specialize in UX/UI. Since studio BCA has many collaboration with Korean startups, Jinju helps a lot in communicating and her insight about them make us become a trustworthy creative vendor for Korean companies.', 'jinju-jung', 1, 0, 3, NULL, NULL, NULL, '2016-09-15 13:29:16', '2016-09-15 13:29:16'),
(13, 8, 'Thao Hoang', 'public/media/img-ourteam3-1473931914.jpg', 'Account Executive', 'Graduated from the RMIT Professional Communication major, Thao Hoang has worked as an Account Executive at Studio BCA for over a year. In her current role, Thao’s main responsibilities include developing and maintaining successful client business relationship as well as overseeing the internal communication between designer and developer to deliver the works in time.', 'thao-hoang', 1, 0, 4, NULL, NULL, NULL, '2016-09-15 13:31:45', '2016-09-15 13:31:45'),
(14, 8, 'Loc Vu', 'public/media/img-ourteam33-1473932041.jpg', 'Project Manager', 'With the background studied Information Technology at RMIT, Loc understands and communicates well with developer team. Moreover, he has experience as lead project manager with international clients. Besides working hours, he’s a tender photographer and passionate member of Ho Chi Minh Japanese traditional tea club.', 'loc-vu', 1, 0, 5, NULL, NULL, NULL, '2016-09-15 13:33:51', '2016-09-15 13:33:51'),
(15, 8, 'The Anh Hoang', 'public/media/img-ourteam9-1473932142.jpg', 'Full-stack Developer', 'The Anh has worked as backend website with many PHP frameworks range from CodeIgniter, CakePHP to WordPress v..v... For more than 4 years experience, he not only builds a stable structural backend but also be able to support in frontend coding.', 'the-anh-hoang', 1, 0, 6, NULL, NULL, NULL, '2016-09-15 13:35:25', '2016-09-15 13:35:25'),
(16, 8, 'Duc Nguyen', 'public/media/img-ourteam7-1473932307.jpg', 'Senior Designer', 'Trained from University of Architecture HCMC. Đuc has a solid educational foundation and a passion for design. In addition to many years of experience working for local and international companies, she has equipped herself with all the professional skills and could understand the customer’s perceptions, which helps to create the suitable direction for art works.', 'duc-nguyen', 1, 0, 7, NULL, NULL, NULL, '2016-09-15 13:38:14', '2016-09-15 13:38:14'),
(17, 8, 'Thao Nguyen', 'public/media/img-ourteam12-1473932722.jpg', 'Administrator', 'Thao has more than 2 years working in BCA as our administration. She manages all the below the line works to make sure our studio run smoothly. Moreover, she is a caring and trustworthy person who always remember to celebrate all studio members’ birthday.', 'thao-nguyen', 1, 0, 8, NULL, NULL, NULL, '2016-09-15 13:43:29', '2016-09-15 13:43:29'),
(18, 8, 'Phuong Le', 'public/media/img-ourteam13-1473932796.jpg', 'Senior Back-end Developer', 'With over 5 years of experience in back-end programing, Phuong has great contribution in developing the our own backend admin. He is not only hard-working but also concentrated while working, which makes him one of the leading member of our tech team.', 'phuong-le', 1, 0, 9, NULL, NULL, NULL, '2016-09-15 13:46:14', '2016-09-15 13:46:14'),
(19, 8, 'thien le', 'public/media/img-ourteam4-1473932963.jpg', 'graphic designer', 'Thien is a very young gifted designer with an exquisite taste in designing. He often provide creative insight and suggestions in a timely manner. Moreover, he always knows how to make working environment fun and enjoyable with his sense of humour. He believes that infusing more humour into the workplace will increase creativity, teamwork and ultimately productivity.', 'thien-le', 1, 0, 10, NULL, NULL, NULL, '2016-09-15 13:49:13', '2016-09-15 13:49:13'),
(20, 8, 'Vinh Huynh', 'public/media/img-ourteam8-1473933033.jpg', 'Senior Front-end Developer', 'Vinh is our senior developer with years of experience in front-end. He has the flexibility to create unique effects and sophistication to websites. His strength and endurance work together with great taste let him ensure the products perfection and beautifulness.', 'vinh-huynh', 1, 0, 11, NULL, NULL, NULL, '2016-09-15 13:50:22', '2016-09-15 13:50:22'),
(21, 8, 'Ha Pham', 'public/media/img-ourteam5-1473933161.png', 'Graphic Designer', 'Ha is a calm and enthusiastic designer with unique, fresh and “out of the box” ideas. He often creates a lasting impression by achieving sophisticated alignment - of customer\\\'s needs.', 'ha-pham', 1, 0, 12, NULL, NULL, NULL, '2016-09-15 13:51:53', '2016-09-15 13:51:53'),
(22, 8, 'Son Bui', 'public/media/img-ourteam10-1473933233.jpg', 'Back-end Developer', 'Trained from University of Information Technology - Vietnam National University, Ho Chi Minh City. Son Bui is a young back-end developer with strong enthusiasm for the profession. With motto \\"Learning from life”, he’s always trying to learn and experience latest technology in programming and creating innovative results. He has worked backend website by: CodeIgniter, Laravel, WordPress...', 'son-bui', 1, 0, 13, NULL, NULL, NULL, '2016-09-15 13:53:43', '2016-09-15 13:53:43'),
(23, 8, 'Rikky Nguyen', 'public/media/img-ourteam6-1473933297.jpg', 'UX/UI Designer', 'Graduated from International University RMIT, he was trained in a dynamic working environment and was provided a fundamental knowledge of graphic design in particular and multimedia in general. He is a sophisticated modern designer and a valuable asset for our design teams.', 'rikky-nguyen', 1, 0, 14, NULL, NULL, NULL, '2016-09-15 13:54:49', '2016-09-15 13:54:49');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `images` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `content` longtext COLLATE utf8_unicode_ci,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `publish` int(11) NOT NULL,
  `featured` int(11) NOT NULL,
  `order_by` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci,
  `descriptions` text COLLATE utf8_unicode_ci,
  `keywords` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blocks`
--

CREATE TABLE `blocks` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `menu_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `images` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `content` longtext COLLATE utf8_unicode_ci,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `publish` int(11) NOT NULL,
  `featured` int(11) NOT NULL,
  `order_by` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci,
  `descriptions` text COLLATE utf8_unicode_ci,
  `keywords` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blocks`
--

INSERT INTO `blocks` (`id`, `category_id`, `menu_id`, `name`, `images`, `description`, `content`, `slug`, `publish`, `featured`, `order_by`, `title`, `descriptions`, `keywords`, `created_at`, `updated_at`) VALUES
(1, '1', 0, 'Home Page', 'public/media/krfeatureimg-1473310153.jpg', '', '', 'home-page', 1, 1, 0, NULL, NULL, NULL, '2016-09-08 08:01:06', '2016-09-08 08:01:06'),
(2, '1', 0, 'Artists', 'public/media/layer-62-1473159243.png', '', '', 'artists', 1, 0, 1, NULL, NULL, NULL, '2016-09-07 14:44:10', '2016-09-07 14:44:10'),
(3, '6', 0, 'New Booking', 'public/media/dreslidec-1473310580.jpg', '', '', 'new-booking', 1, 0, 1, NULL, NULL, NULL, '2016-09-07 08:11:02', '2016-09-07 08:11:02'),
(4, '1', 0, 'Projects', 'public/media/layer-60-1473159389.png', '', '', 'projects', 1, 0, 2, NULL, NULL, NULL, '2016-09-07 14:44:47', '2016-09-07 14:44:47'),
(5, '1', 0, 'How It Works', 'public/media/kphowitworks-1473159306.png', '', '', 'how-it-works', 1, 0, 3, NULL, NULL, NULL, '2016-09-07 14:45:14', '2016-09-07 14:45:14'),
(6, '6', 0, 'Rating', 'public/media/dreslided-1473310658.jpg', '', '', 'rating', 1, 0, 2, NULL, NULL, NULL, '2016-09-07 21:57:48', '2016-09-07 21:57:48'),
(7, '17', 0, 'App Screens', 'public/media/krowdpophorizontalha-1473309076.jpg', '', '', '17-app-screens', 1, 0, 0, NULL, NULL, NULL, '2016-09-07 12:46:51', '2016-09-07 12:46:51'),
(8, '17', 0, 'Login', 'public/media/krowdpopslidec-1473310987.jpg', '', '', 'login', 1, 0, 1, NULL, NULL, NULL, '2016-09-07 12:48:19', '2016-09-07 12:48:19'),
(9, '17', 0, 'Slide', 'public/media/krowdpopslidea-1473311008.jpg', '', '', '88-slide', 1, 0, 2, NULL, NULL, NULL, '2016-09-07 22:03:37', '2016-09-07 22:03:37'),
(10, '17', 0, 'Slide', 'public/media/krowdpopslideb-1473311036.jpg', '', '', '88-slide', 1, 0, 3, NULL, NULL, NULL, '2016-09-07 22:04:14', '2016-09-07 22:04:14'),
(11, '6', 0, 'Pay With Ease', 'public/media/dreslidea-1473310609.jpg', '', '', 'pay-with-ease', 1, 0, 3, NULL, NULL, NULL, '2016-09-07 08:12:33', '2016-09-07 08:12:33'),
(13, '6', 0, 'Featured Screens', 'public/media/drefeatureimagehorizontalbha-1473308700.png', '', '', 'featured-screens', 1, 0, 0, NULL, NULL, NULL, '2016-09-08 07:54:20', '2016-09-08 07:54:20'),
(14, '16', 0, 'App Screens', 'public/media/goldentimefeatureimagehorizontalaha-1473308788.png', '', '', 'app-screens', 1, 0, 0, NULL, NULL, NULL, '2016-09-07 08:15:44', '2016-09-07 08:15:44'),
(15, '16', 0, 'Slide', 'public/media/goldentimeslidea-1473310761.jpg', '', '', 'slide', 1, 0, 1, NULL, NULL, NULL, '2016-09-07 21:59:31', '2016-09-07 21:59:31'),
(16, '16', 0, 'Users', 'public/media/goldentimeslidec-1473310808.jpg', '', '', 'users', 1, 0, 2, NULL, NULL, NULL, '2016-09-07 22:00:18', '2016-09-07 22:00:18'),
(17, '16', 0, 'Settings', 'public/media/2-1473231596.png', '', '', 'settings', 1, 0, 3, NULL, NULL, NULL, '2016-09-07 11:00:12', '2016-09-07 11:00:12'),
(18, '16', 0, 'What\'s New', 'public/media/3-1473232269.png', '', '', 'what-s-new', 0, 0, 4, NULL, NULL, NULL, '2016-09-07 11:01:36', '2016-09-07 11:01:36'),
(19, '17', 0, 'Search', 'public/media/1-8-1-account---search-result-1473238914.png', '', '', 'search', 1, 0, 4, NULL, NULL, NULL, '2016-09-07 13:01:30', '2016-09-07 13:01:30'),
(20, '18', 0, 'App Screens', 'public/media/recpicfeatureimagehorizontalha-1473309907.jpg', '', '', '18-app-screens', 1, 0, 0, NULL, NULL, NULL, '2016-09-07 13:04:27', '2016-09-07 13:04:27'),
(21, '18', 0, 'Welcome', 'public/media/recpicb-1473311169.jpg', '', '', 'welcome', 1, 0, 1, NULL, NULL, NULL, '2016-09-07 13:07:03', '2016-09-07 13:07:03'),
(22, '18', 0, 'Expenses', 'public/media/recpicc-1473311262.jpg', '', '', 'expenses', 1, 0, 2, NULL, NULL, NULL, '2016-09-07 13:07:52', '2016-09-07 13:07:52'),
(23, '18', 0, 'Income', 'public/media/6-1473239336.jpg', '', '', 'income', 1, 0, 3, NULL, NULL, NULL, '2016-09-07 13:08:41', '2016-09-07 13:08:41'),
(24, '18', 0, 'Notifications', NULL, '', '', 'notifications', 0, 0, 4, NULL, NULL, NULL, '2016-09-07 13:09:56', '2016-09-07 13:09:56'),
(25, '19', 0, 'App Screens', 'public/media/tinerifeaturehorizontalaha-1473309945.jpg', '', '', '23-app-screens', 1, 0, 0, NULL, NULL, NULL, '2016-09-07 13:27:35', '2016-09-07 13:27:35'),
(26, '19', 0, 'Welcome', 'public/media/welcome-1473241092.png', '', '', '24-welcome', 1, 0, 1, NULL, NULL, NULL, '2016-09-07 13:30:01', '2016-09-07 13:30:01'),
(27, '19', 0, 'Itinerary', 'public/media/3-1473241172.png', '', '', 'itinerary', 1, 0, 2, NULL, NULL, NULL, '2016-09-07 13:39:01', '2016-09-07 13:39:01'),
(28, '19', 0, 'Survey', 'public/media/3-1473241235.png', '', '', 'survey', 1, 0, 3, NULL, NULL, NULL, '2016-09-07 13:40:24', '2016-09-07 13:40:24'),
(29, '19', 0, 'Maps', 'public/media/3-1473241389.png', '', '', 'maps', 1, 0, 4, NULL, NULL, NULL, '2016-09-07 13:41:08', '2016-09-07 13:41:08'),
(30, '20', 0, 'Branding', 'public/media/a8-featureimg-1473242155.jpg', '', '', 'branding', 1, 0, 0, NULL, NULL, NULL, '2016-09-07 13:55:41', '2016-09-07 13:55:41'),
(31, '20', 0, 'Stationery', 'public/media/a8--mock-up-1---stationery-1473242202.jpg', '', '', 'stationery', 1, 0, 1, NULL, NULL, NULL, '2016-09-07 13:56:26', '2016-09-07 13:56:26'),
(32, '20', 0, 'Stationery', 'public/media/collection-13---mock-up-2---stationery-1473242360.jpg', '', '', '30-stationery', 1, 0, 2, NULL, NULL, NULL, '2016-09-07 13:58:34', '2016-09-07 13:58:34'),
(33, '20', 0, 'Business Card', 'public/media/embossed-business-card-mockup-2-1473242511.jpg', '', '', 'business-card', 1, 0, 3, NULL, NULL, NULL, '2016-09-07 13:59:53', '2016-09-07 13:59:53'),
(34, '7', 0, 'Branding', 'public/media/macocofeatureimage-1473242729.jpg', '', '', '32-branding', 1, 0, 0, NULL, NULL, NULL, '2016-09-07 14:03:34', '2016-09-07 14:03:34'),
(35, '7', 0, 'Coffee Tin', 'public/media/coffee-tin-mockup-1-1473242774.jpg', '', '', 'coffee-tin', 1, 0, 1, NULL, NULL, NULL, '2016-09-07 14:06:01', '2016-09-07 14:06:01'),
(36, '7', 0, 'Identity', 'public/media/macoco-branding-identity-mockup-july-09-1473242820.jpg', '', '', 'identity', 1, 0, 2, NULL, NULL, NULL, '2016-09-07 14:06:48', '2016-09-07 14:06:48'),
(37, '7', 0, 'Namecard Logo', 'public/media/macoco-namecard-logo-mock-ups-1473242872.jpg', '', '', 'namecard-logo', 1, 0, 3, NULL, NULL, NULL, '2016-09-07 14:07:41', '2016-09-07 14:07:41'),
(38, '7', 0, 'Packaging', 'public/media/macoco-packaging-mockup-1-1473242915.jpg', '', '', 'packaging', 1, 0, 4, NULL, NULL, NULL, '2016-09-07 14:08:23', '2016-09-07 14:08:23'),
(39, '21', 0, 'Branding', 'public/media/roasterfeatureimage-1473243007.jpg', '', '', '37-branding', 1, 0, 0, NULL, NULL, NULL, '2016-09-07 14:09:55', '2016-09-07 14:09:55'),
(40, '21', 0, 'Roaster Mockup', 'public/media/roaster-mockup-1473243049.jpg', '', '', 'roaster-mockup', 1, 0, 1, NULL, NULL, NULL, '2016-09-07 14:10:38', '2016-09-07 14:10:38'),
(41, '21', 0, 'Boards', 'public/media/roaster4boards1-1473243090.jpg', '', '', 'boards', 1, 0, 2, NULL, NULL, NULL, '2016-09-07 14:11:16', '2016-09-07 14:11:16'),
(42, '21', 0, 'Main Wall', 'public/media/roastermainwallmock2-1473243141.jpg', '', '', 'main-wall', 1, 0, 3, NULL, NULL, NULL, '2016-09-07 14:12:10', '2016-09-07 14:12:10'),
(43, '2', 0, 'Featured', 'public/media/acquafeatureimgha-1473309727.png', '', '', 'featured', 1, 0, 0, NULL, NULL, NULL, '2016-09-07 14:13:46', '2016-09-07 14:13:46'),
(44, '2', 0, 'Contact', 'public/media/acquacontact2-1473243295.jpg', '', '', 'contact', 1, 0, 1, NULL, NULL, NULL, '2016-09-07 14:14:38', '2016-09-07 14:14:38'),
(45, '2', 0, 'Dining Room', 'public/media/acquadiningroom-1473243339.jpg', '', '', 'dining-room', 1, 0, 2, NULL, NULL, NULL, '2016-09-07 14:15:26', '2016-09-07 14:15:26'),
(46, '2', 0, 'Rooms', 'public/media/acquarooms2-1473243384.jpg', '', '', 'rooms', 1, 0, 3, NULL, NULL, NULL, '2016-09-07 14:16:12', '2016-09-07 14:16:12'),
(47, '2', 0, 'Services', 'public/media/acquaservices1-1473243429.jpg', '', '', 'services', 1, 0, 4, NULL, NULL, NULL, '2016-09-07 14:16:50', '2016-09-07 14:16:50'),
(48, '3', 0, 'Featured', 'public/media/canmakefeatureimgha-1473310006.png', '', '', '46-featured', 1, 0, 0, NULL, NULL, NULL, '2016-09-07 14:18:54', '2016-09-07 14:18:54'),
(49, '3', 0, 'Home Page', 'public/media/canmakehomenonote-1473243599.jpg', '', '', '89-home-page', 1, 0, 1, NULL, NULL, NULL, '2016-09-08 08:01:58', '2016-09-08 08:01:58'),
(50, '3', 0, 'Products', 'public/media/canmakeproductlist1-1473244017.jpg', '', '', 'products', 1, 0, 2, NULL, NULL, NULL, '2016-09-07 14:28:28', '2016-09-07 14:28:28'),
(51, '3', 0, 'Product Detail', 'public/media/canmakeproductdetail4-1473244061.jpg', '', '', 'product-detail', 1, 0, 3, NULL, NULL, NULL, '2016-09-07 14:27:30', '2016-09-07 14:27:30'),
(52, '5', 0, 'Featured', 'public/media/chairbfeatureimgha-1473310087.png', '', '', '50-featured', 1, 0, 0, NULL, NULL, NULL, '2016-09-07 14:29:00', '2016-09-07 14:29:00'),
(53, '5', 0, 'Home Page', 'public/media/cbwebsitehome30sep-1473244268.jpg', '', '', '89-home-page', 1, 0, 1, NULL, NULL, NULL, '2016-09-08 08:02:45', '2016-09-08 08:02:45'),
(54, '5', 0, 'About Us', 'public/media/cbwebsiteaboutus30sep-1473244304.jpg', '', '', 'about-us', 1, 0, 2, NULL, NULL, NULL, '2016-09-07 14:31:33', '2016-09-07 14:31:33'),
(55, '5', 0, 'Designers', 'public/media/cbwebsitedesigners30sep-1473244356.jpg', '', '', 'designers', 1, 0, 3, NULL, NULL, NULL, '2016-09-07 14:32:23', '2016-09-07 14:32:23'),
(56, '5', 0, 'Products', 'public/media/cbwebsitelistingproductv130sep-1473244406.jpg', '', '', '54-products', 1, 0, 4, NULL, NULL, NULL, '2016-09-07 14:33:13', '2016-09-07 14:33:13'),
(57, '4', 0, 'Featured', 'public/media/harpersfeatureimgha-1473310121.png', '', '', '55-featured', 1, 0, 0, NULL, NULL, NULL, '2016-09-07 14:35:40', '2016-09-07 14:35:40'),
(58, '4', 0, 'Home Page', 'public/media/harpersbazzarhome-1473244600.jpg', '', '', '89-home-page', 1, 0, 1, NULL, NULL, NULL, '2016-09-08 08:03:00', '2016-09-08 08:03:00'),
(59, '4', 0, 'Articles', 'public/media/harpersbazzararticle3-1473244656.jpg', '', '', 'articles', 1, 0, 2, NULL, NULL, NULL, '2016-09-07 14:37:20', '2016-09-07 14:37:20'),
(60, '4', 0, 'Brands', 'public/media/harpersbazzarbrand-1473244731.jpg', '', '', 'brands', 1, 0, 3, NULL, NULL, NULL, '2016-09-07 14:37:59', '2016-09-07 14:37:59'),
(61, '4', 0, 'Catalog', 'public/media/harpersbazzarcatalog-1473244765.jpg', '', '', 'catalog', 1, 0, 4, NULL, NULL, NULL, '2016-09-07 14:39:15', '2016-09-07 14:39:15'),
(62, '22', 0, 'Featured', 'public/media/umafeatureimgha-1473310217.png', '', '', '60-featured', 1, 0, 0, NULL, NULL, NULL, '2016-09-07 14:49:29', '2016-09-07 14:49:29'),
(63, '22', 0, 'About Us', 'public/media/umaaboutus222022016-1473245441.jpg', '', '', '61-about-us', 1, 0, 1, NULL, NULL, NULL, '2016-09-07 14:50:26', '2016-09-07 14:50:26'),
(64, '22', 0, 'Category', 'public/media/umacategory25022016-1473245520.jpg', '', '', 'category', 1, 0, 2, NULL, NULL, NULL, '2016-09-07 14:51:10', '2016-09-07 14:51:10'),
(65, '22', 0, 'Product Details', 'public/media/umaproduct-details25022016-1473245583.jpg', '', '', 'product-details', 1, 0, 3, NULL, NULL, NULL, '2016-09-07 14:52:39', '2016-09-07 14:52:39'),
(66, '23', 0, 'Featured', 'public/media/w-rfeatureimgha-1473310279.png', '', '', '64-featured', 1, 0, 0, NULL, NULL, NULL, '2016-09-07 14:55:03', '2016-09-07 14:55:03'),
(67, '23', 0, 'Menus', 'public/media/wrmenurestaurant2907-1473245800.jpg', '', '', 'menus', 1, 0, 1, NULL, NULL, NULL, '2016-09-07 14:56:22', '2016-09-07 14:56:22'),
(68, '23', 0, 'About Us', 'public/media/wraboutusfinal-1473245850.jpg', '', '', '66-about-us', 1, 0, 2, NULL, NULL, NULL, '2016-09-07 14:57:17', '2016-09-07 14:57:17'),
(69, '23', 0, 'News', 'public/media/wrnews2907-1473245895.jpg', '', '', 'news', 1, 0, 3, NULL, NULL, NULL, '2016-09-07 14:57:55', '2016-09-07 14:57:55'),
(70, '23', 0, 'Stores', 'public/media/wrstores2907-1473245931.jpg', '', '', 'stores', 1, 0, 4, NULL, NULL, NULL, '2016-09-07 14:58:39', '2016-09-07 14:58:39'),
(71, '24', 0, 'Featured', 'public/media/8020featureimg1-1473246771.png', '', '', '69-featured', 1, 0, 0, NULL, NULL, NULL, '2016-09-07 15:12:33', '2016-09-07 15:12:33'),
(72, '24', 0, 'Layout', 'public/media/8020-layout-1473246842.png', '', '', 'layout', 1, 0, 1, NULL, NULL, NULL, '2016-09-07 15:13:48', '2016-09-07 15:13:48'),
(73, '24', 0, 'Layout', 'public/media/8020-thumbs5701-1473246921.png', '', '', '71-layout', 1, 0, 2, NULL, NULL, NULL, '2016-09-07 15:15:10', '2016-09-07 15:15:10'),
(74, '24', 0, 'Layout', 'public/media/8020ipad-1473247007.png', '', '', '72-layout', 1, 0, 3, NULL, NULL, NULL, '2016-09-07 15:15:57', '2016-09-07 15:15:57'),
(75, '25', 0, 'Featured', 'public/media/a8featureimg-1473247124.jpg', '', '', '73-featured', 1, 0, 0, NULL, NULL, NULL, '2016-09-07 15:18:33', '2016-09-07 15:18:33'),
(76, '25', 0, 'Layout', 'public/media/a8--layoutport-1473247173.jpg', '', '', '74-layout', 1, 0, 1, NULL, NULL, NULL, '2016-09-07 15:19:19', '2016-09-07 15:19:19'),
(77, '25', 0, 'Layout', 'public/media/a8--layoutport2-1473247241.jpg', '', '', '75-layout', 1, 0, 2, NULL, NULL, NULL, '2016-09-07 15:20:20', '2016-09-07 15:20:20'),
(78, '25', 0, 'Layout', 'public/media/a8--layoutport3-1473247310.jpg', '', '', '76-layout', 1, 0, 3, NULL, NULL, NULL, '2016-09-07 15:21:40', '2016-09-07 15:21:40'),
(79, '26', 0, 'Featured', 'public/media/canmakefeatureimg-1473247533.png', '', '', '77-featured', 1, 0, 0, NULL, NULL, NULL, '2016-09-07 15:24:52', '2016-09-07 15:24:52'),
(80, '26', 0, 'Layout', 'public/media/canmakeipad-1473247592.png', '', '', '78-layout', 1, 0, 1, NULL, NULL, NULL, '2016-09-07 15:26:17', '2016-09-07 15:26:17'),
(81, '26', 0, 'Layout', 'public/media/canmakethumb570-1473247637.png', '', '', '79-layout', 1, 0, 2, NULL, NULL, NULL, '2016-09-07 15:26:53', '2016-09-07 15:26:53'),
(82, '27', 0, 'Featured', 'public/media/decoratorfeatureimg-1473247817.png', '', '', '80-featured', 1, 0, 0, NULL, NULL, NULL, '2016-09-07 15:29:12', '2016-09-07 15:29:12'),
(83, '27', 0, 'Layout', 'public/media/decoratorlayout-1473247911.png', '', '', '81-layout', 1, 0, 1, NULL, NULL, NULL, '2016-09-07 15:30:54', '2016-09-07 15:30:54'),
(84, '27', 0, 'Layout', 'public/media/decoratorlayout2-1473247950.jpg', '', '', '82-layout', 1, 0, 2, NULL, NULL, NULL, '2016-09-07 15:32:09', '2016-09-07 15:32:09'),
(85, '27', 0, 'Layout', 'public/media/decoratorthumb5701-1473247988.png', '', '', '83-layout', 1, 0, 3, NULL, NULL, NULL, '2016-09-07 15:32:53', '2016-09-07 15:32:53'),
(86, '0', 0, 'Layout', 'public/media/decoratorthumb570-1473248022.png', '', '', '84-layout', 1, 0, 4, NULL, NULL, NULL, '2016-09-07 15:33:28', '2016-09-07 15:33:28'),
(87, '28', 0, 'Featured', 'public/media/grabfeatureimg-1473248180.png', '', '', '85-featured', 1, 0, 0, NULL, NULL, NULL, '2016-09-07 15:36:04', '2016-09-07 15:36:04'),
(88, '28', 0, 'Layout', 'public/media/grabipad-1473248248.png', '', '', '86-layout', 1, 0, 2, NULL, NULL, NULL, '2016-09-07 15:36:46', '2016-09-07 15:36:46'),
(89, '28', 0, 'Layout', 'public/media/grablayout-1473248282.png', '', '', '87-layout', 1, 0, 3, NULL, NULL, NULL, '2016-09-07 15:37:49', '2016-09-07 15:37:49'),
(90, '28', 0, 'App Screens', 'public/media/grabthumb570-1473734360.jpg', '', '', '88-app-screens', 1, 0, 1, NULL, NULL, NULL, '2016-09-08 06:54:05', '2016-09-08 06:54:05'),
(91, '29', 5, 'Branding', 'public/media/bakerpediafeatureimg-1473656744.png', '', '', '104-branding', 1, 0, 2, NULL, NULL, NULL, '2016-09-13 07:03:10', '2016-09-13 07:03:10'),
(92, '29', 5, 'Branding', 'public/media/bakerpediaipad-1473658511.png', '', '', '104-branding', 1, 0, 1, NULL, NULL, NULL, '2016-09-13 07:03:26', '2016-09-13 07:03:26'),
(93, '29', 5, 'Branding', 'public/media/bakerpediathumb5701-1473657036.png', '', '', 'branding', 1, 0, 3, NULL, NULL, NULL, '2016-09-13 07:03:35', '2016-09-13 07:03:35'),
(94, '30', 2, 'Layout', 'public/media/travelwardsfeatureimg-1473658680.png', '', '', '104-layout', 1, 0, 2, NULL, NULL, NULL, '2016-09-13 06:53:41', '2016-09-13 06:53:41'),
(95, '30', 2, 'Layout', 'public/media/travelwardsthumb570-1473657317.png', '', '', '104-layout', 1, 0, 3, NULL, NULL, NULL, '2016-09-13 06:53:07', '2016-09-13 06:53:07'),
(96, '29', 5, 'Featured', 'public/media/bakerpediafeature-1473735548.jpg', '', '', '104-featured', 1, 0, 0, NULL, NULL, NULL, '2016-09-13 07:03:58', '2016-09-13 07:03:58'),
(97, '30', 2, 'Featured', 'public/media/travelwardsfeatureimg-1473734941.jpg', '', '', '104-featured', 1, 0, 0, NULL, NULL, NULL, '2016-09-13 06:49:45', '2016-09-13 06:49:45'),
(98, '30', 2, 'Layout', 'public/media/travelwardsthumb5701-1473669143.png', '', '', '104-layout', 1, 0, 1, NULL, NULL, NULL, '2016-09-13 06:52:40', '2016-09-13 06:52:40'),
(99, '11', 0, 'Featured', 'public/media/shinhanfeatureimg-1473733654.jpg', '', '', '97-featured', 1, 0, 0, NULL, NULL, NULL, '2016-09-13 06:27:02', '2016-09-13 06:27:02'),
(100, '11', 0, 'Website', 'public/media/shinhanthumb570-1473733731.png', '', '', 'website', 1, 0, 1, NULL, NULL, NULL, '2016-09-13 06:28:43', '2016-09-13 06:28:43'),
(101, '12', 0, 'Featured', 'public/media/sunflowermarketfeatureimg-1473733827.png', '', '', '99-featured', 1, 0, 0, NULL, NULL, NULL, '2016-09-13 06:30:16', '2016-09-13 06:30:16'),
(102, '12', 0, 'Website', 'public/media/sunflowermarketthumb570-1473733861.png', '', '', '100-website', 1, 0, 1, NULL, NULL, NULL, '2016-09-13 06:30:52', '2016-09-13 06:30:52'),
(103, '31', 0, 'Featured', 'public/media/thebeautystorefeature-1473733989.jpg', '', '', '101-featured', 1, 0, 0, NULL, NULL, NULL, '2016-09-13 06:32:19', '2016-09-13 06:32:19'),
(104, '31', 0, 'Website', 'public/media/thebeautystorethumb570-1473734020.png', '', '', '102-website', 1, 0, 1, NULL, NULL, NULL, '2016-09-13 06:33:30', '2016-09-13 06:33:30'),
(105, '26', 0, 'Print', 'public/media/canmakethumb5701-1473734659.jpg', '', '', 'print', 1, 0, 3, NULL, NULL, NULL, '2016-09-13 06:44:11', '2016-09-13 06:44:11'),
(106, '32', 0, 'Featured', 'public/media/bewebfeatureimage-1473835279.jpg', '', '', '105-featured', 1, 0, 0, NULL, NULL, NULL, '2016-09-14 10:38:30', '2016-09-14 10:38:30'),
(107, '32', 0, 'Cover Letter', 'public/media/becoverletter-1473835421.jpg', '', '', 'cover-letter', 1, 0, 1, NULL, NULL, NULL, '2016-09-14 10:43:32', '2016-09-14 10:43:32'),
(108, '32', 0, 'Logo Sketch', 'public/media/belogosketch-1473835503.jpg', '', '', 'logo-sketch', 1, 0, 2, NULL, NULL, NULL, '2016-09-14 10:44:24', '2016-09-14 10:44:24'),
(109, '32', 0, 'Web Page', 'public/media/bewebpage2-1473835575.jpg', '', '', 'web-page', 1, 0, 2, NULL, NULL, NULL, '2016-09-14 10:45:43', '2016-09-14 10:45:43'),
(110, '14', 0, 'Featured', 'public/media/lordfamilyfeatureimg-1473836540.jpg', '', '', '108-featured', 1, 0, 0, NULL, NULL, NULL, '2016-09-14 11:01:57', '2016-09-14 11:01:57'),
(111, '15', 0, 'Featured', 'public/media/mortgageclubfeatureimg1-1473836583.jpg', '', '', '109-featured', 1, 0, 0, NULL, NULL, NULL, '2016-09-14 11:02:37', '2016-09-14 11:02:37'),
(112, '14', 0, 'Website', 'public/media/lordfamilythumb570-1473836635.png', '', '', '110-website', 1, 0, 1, NULL, NULL, NULL, '2016-09-14 11:03:46', '2016-09-14 11:03:46'),
(113, '15', 0, 'Website', 'public/media/mortgageclubthumb570-1473836725.png', '', '', '111-website', 1, 0, 1, NULL, NULL, NULL, '2016-09-14 11:05:09', '2016-09-14 11:05:09'),
(114, '33', 0, 'Featured', 'public/media/quinelafeatureimage-1473837514.jpg', '', '', '112-featured', 1, 0, 0, NULL, NULL, NULL, '2016-09-14 11:18:21', '2016-09-14 11:18:21'),
(115, '34', 0, 'Menu', 'public/media/villasongmenu-1473837619.jpg', '', '', 'menu', 1, 0, 0, NULL, NULL, NULL, '2016-09-14 11:20:11', '2016-09-14 11:20:11'),
(116, '34', 0, 'Stationery', 'public/media/villasongstationery-1473837765.jpg', '', '', '114-stationery', 1, 0, 1, NULL, NULL, NULL, '2016-09-14 11:22:26', '2016-09-14 11:22:26'),
(117, '34', 0, 'Website', 'public/media/villasongwebsite20-1473837796.jpg', '', '', '115-website', 1, 0, 2, NULL, NULL, NULL, '2016-09-14 11:23:04', '2016-09-14 11:23:04'),
(118, '33', 0, 'Branding', 'public/media/quinela01-1473837871.jpg', '', '', '116-branding', 1, 0, 1, NULL, NULL, NULL, '2016-09-14 11:23:54', '2016-09-14 11:23:54'),
(119, '33', 0, 'Business Card', 'public/media/quinelabusinesscard2-1473837937.jpg', '', '', '117-business-card', 1, 0, 2, NULL, NULL, NULL, '2016-09-14 11:25:03', '2016-09-14 11:25:03'),
(120, '33', 0, 'Guideline', 'public/media/quinelaguideline-1473838053.jpg', '', '', 'guideline', 1, 0, 3, NULL, NULL, NULL, '2016-09-14 11:26:00', '2016-09-14 11:26:00');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `images` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `publish` int(11) NOT NULL,
  `featured` int(11) NOT NULL,
  `order_by` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` text COLLATE utf8_unicode_ci,
  `descriptions` text COLLATE utf8_unicode_ci,
  `keywords` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `menu_id`, `name`, `images`, `description`, `publish`, `featured`, `order_by`, `type`, `slug`, `title`, `descriptions`, `keywords`) VALUES
(1, 2, 'KrowdPop', 'public/media/krthumbnailimg-1473244849.jpg', NULL, 1, 1, 2, 'block', 'krowdpop', 'Crowdfunding website ', 'For the first time in Vietnam, a Korean startup serves the new method to bring the Korean idols to organize concerts in fans’ locations. Our designs use vivid colors with strong contrast such as hot pink and dark blue to reflect the powerful, young and active feelings for audience - young generations.\r\nWebsite: http://www.krowdpop.com/ \r\nClient: Vietnam / KrowdPop', 'Website layout design and development'),
(2, 2, 'Acqua Residences', 'public/media/acquaimg-2-1473156789.png', NULL, 1, 1, 6, 'block', 'acqua-residences', 'Villa and Resort', 'Acqua Villa is a luxury resort based in Nha Trang, and we created a website to show audience the overview about the residence with the western style, giving them a perspective about the international standard of our clients.\r\nWebsite: http://acquaresidences.com/\r\nClient: Vietnam / Alternaty Group', 'Website layout design and development'),
(3, 2, 'CanMake', 'public/media/canmakeimg-1-1473156921.png', NULL, 1, 1, 7, 'block', 'canmake', 'The Beauty Store', 'The Japanese cosmetic brand is franchised by Ms Nguyen Cao Ky Duyen. The website design shows the connection with the brand identity and its target audience - teenage girls.\r\nWebsite: http://canmake.vn/\r\nClient: Vietnam / The Beauty Store', 'Website layout design and development'),
(4, 2, 'Harper Bazzar Vietnam', 'public/media/harperimg-1473157094.png', NULL, 1, 1, 5, 'block', 'harper-bazzar-vietnam', 'Online Fashion Magazine ', 'With Bazaar Vietnam magazine website, studio BCA reflected the flexibly creative skills in fashion industry. The strong black and white contrast in the background and the serif font give audience the sense of the high-end and fashionable of the famous international magazine.\r\nWebsite: http://bazaarvietnam.vn/\r\nClient: Vietnam / Sun Flower Media', 'Website layout design'),
(5, 2, 'Chair Boutique', 'public/media/chairbimg-1473157418.png', NULL, 1, 0, 4, 'block', 'chair-boutique', 'Online Furniture Store ', 'As client is a new online store offering a wide range of high end European furniture brands, we chose a clean and minimal layout to enhance customers’ impression about the quality and design of product.\r\nWebsite: http://chairboutique.co.uk/\r\nClient: England / Chair Boutique', 'Website layout design'),
(6, 4, 'Dré Valet App', 'public/media/drethumbnailimage-1473308648.jpg', NULL, 1, 1, 3, 'block', 'dre-valet-app', 'Pickup And Drop-off', 'Taking the ideas of Uber and Grab, Dre introduces a relatively new service in Singapore, through which customers can book a valet to drive their own car to selected locations. Besides designs, we also worked with client on UI to optimize user experiences.\r\nWebsite: http://drevalet.com/\r\nClient: Singapore', 'Branding, Marketing materials, app UX/UI design and development'),
(7, 5, 'Macoco Coffee', 'public/media/macoco-thumbnailimage-1473242589.jpg', NULL, 1, 1, 1, 'block', 'macoco-coffee', 'Mandalay Traditional Coffee', 'The products from Myanmar are exported to European markets, which challenged us to keep the Asian-origin feeling on the modern package design. The peacock was drawn with its tail modified into coffee beans shape to create a unique look to reflect the client’s products.\r\nWebsite: \r\nClient: Myanmar / Mandalay Traditional Coffee Company', 'Branding, packaging design'),
(9, 2, 'Cazloyd', NULL, NULL, 0, 0, 0, 'block', 'cazloyd', 'Cazenove+Loyd Travel Agent', 'Understanding that C+L is a high-end tailor-made travel agent, we created a simple and photo-oriented look and feel, and demonstrated the luxe and modern website design to convey their message straight to their target audience.\r\nWebsite: http://www.cazloyd.com/\r\nClient: England / Cazenove+Loyd', 'Website layout design'),
(11, 2, 'Shinhan Bank', 'public/media/shinhanthumb384-1473733272.png', NULL, 1, 0, 0, 'block', 'shinhan-bank', 'Banking', 'The simple and clean design go together with the easy-usage data management is the objective of BCA while developing the online card registration site for Shinhan. With depth understanding about Vietnamese customers, we give the clear structure for information field and keep the microsite be consistent with Shinhan website.\r\nWebsite: https://cardapp.shinhan.com.vn/\r\nClient: Vietnam / Shinhan Bank', 'Banking'),
(12, 2, 'Sun Flower Market', 'public/media/sunflowermarketthumb384-1473733785.png', NULL, 1, 0, 0, 'block', 'sun-flower-market', 'Sun Flower Media', 'The online market of Sun Flower media mainly focuses on Western imported products; therefore, we create e-commerce website with the modern looks and the smart backend let customers easily to search, order and make payment.\r\nWebsite: http://market.sunflower.vn/\r\nClient: Vietnam / Sun Flower Media', 'Online market'),
(14, 2, 'Lord Family\'s', 'public/media/lordfamilythumb384-1473836443.png', NULL, 1, 0, 0, 'block', 'lord-family-s', 'Gourmet & Grocery', 'Choosing the vintage style to develop, our design create the feeling about royal and traditional British for this online grocery that sells imported food and beverage.\r\nWebsite: http://lordfamilys.com/\r\nClient: Vietnam / Lord Family\'s Gourmet & Grocery Store', 'Online grocery store'),
(15, 2, 'MortgageClub', 'public/media/mortgageclubthumb-1473836348.jpg', NULL, 1, 0, 0, 'block', 'mortgageclub', 'Mortgage Consultation', 'The minimal layout to emphasize the detail-oriented feature of economic and finacial related website, we focus not only on the public users but also the internal team by the optimized user experience CRM design.\r\nWebsite: http://www.mortgageclub.co/\r\nClient: United State / Mortgage Consultation', 'Mortgage Consultation'),
(16, 4, 'Golden Time', 'public/media/goldentimethumbnailimage-1473221675.jpg', NULL, 1, 1, 5, 'block', 'golden-time', 'Kid App', 'Focusing on children from 9 to 12 years old, Golden Time creates a playful platform for children to share hobbies and communicate with friends under the supervision of parents.\r\nWebsite: \r\nClient: Vietnam, France', 'App UX/Ui design and development, animation production'),
(17, 4, 'Krowdpop App', 'public/media/krowdpopthumbnailimage-1473233176.jpg', NULL, 1, 1, 1, 'block', 'krowdpop-app', 'Power To The KPop’s Fans', 'To support the website, Kpop fans can now vote and fund to bring their idols to Vietnam by downloading and making purchases through the app.\r\nWebsite: https://krowdpop.com/\r\nClient: Vietnam', 'UX/UI design and development'),
(18, 4, 'RecPic', 'public/media/recpicthumbnailimage-1473239020.jpg', NULL, 1, 1, 2, 'block', 'recpic', 'Travel App', 'Compared to other financial management apps, Recpic stands out with the unique feature allowing users to take photo of receipts and their amounts will  be converted into recorded data automatically. Starting from the sketch, we designed the brand, consulted the UX/UI and developed the app. Currently, our team is continuing to update and maintain Recpic since the expansion in number of users requires a lot more new features.\r\nWebsite: http://www.recpic.co.kr/\r\nClient: Korea', 'Branding, UX/UI design and app development'),
(19, 4, 'Tineri', 'public/media/tinerithumbnailimage-1473240419.jpg', NULL, 1, 1, 4, 'block', 'tineri', 'Travel App', 'Tineri provides tourisms with a platform to view all booking details and store documents related to their travels. Moreover, the travel agents can purchase the app and customize the design according to their own brands.\r\nWebsite: http://tineriapp.com/\r\nClient: Singapore', 'UX/UI design and development'),
(20, 5, 'A8 Studio', 'public/media/a8-thumbnailimg-1473241514.jpg', NULL, 1, 1, 3, 'block', 'a8-studio', 'Architecture Design', 'Understanding the business ideas of the Vietnamese young architects, we redesigned the standard company profile into a creative artwork by applying graphic elements into their portfolio.\r\nWebsite: \r\nClient: Vietnam / A8 Studio', 'Branding, company profile design'),
(21, 5, 'Roaster', 'public/media/roasterthumbnailimage-1473242961.jpg', NULL, 1, 1, 4, 'block', 'roaster', 'Restaurant', 'Roaster branding is the harmony of modernity and vintage with the logo using bold type to be outstanding on white background. Besides branding, we also designed its menu with minimal and western style to be consistent with the services that Roaster provide.\r\nWebsite: \r\nClient: Vietnam / Roaster Restaurant', 'Branding, menu design'),
(22, 2, 'UMA', 'public/media/umathumbnailimg-1473245332.jpg', NULL, 1, 0, 3, 'block', 'uma', 'Furniture Store', 'Uma is an international well-known furniture store  targeting mid- to high income customers who demand high-quality designed furnitures. The revamped website focuses on the clean structures to show more product categories while being not text-heavy to draw consumer’s attention to the products.\r\nWebsite: http://uma.vn/\r\nClient: Vietnam / UMA', 'Website layout design'),
(23, 2, 'Wrap & Roll', 'public/media/wrthumbnailimg-1473245644.jpg', NULL, 1, 1, 1, 'block', 'wrap-roll', 'Vietnamese Restaurant', 'Wrap & Roll has been established for 11 years and has become one of the first franchising restaurant chains in Vietnam. To celebrate the 11th year, they decide to change the branding completely to refresh and start to develop into an international brand. Our designed website keep the main color that had been a recognition of Wrap & Roll for 11 years, while showing the innovation by clean layouts together with emphasized contrast in color usage.\r\nWebsite: http://wrap-roll.com/\r\nClient: Vietnam / Wrap & Roll', 'Website layout design and development'),
(24, 3, '8020Fit', 'public/media/8020thumbnailimg-1473246717.png', NULL, 1, 1, 4, 'block', '8020fit', 'Fitness Studio', 'We have created the branding of 8020fit and continues to design the marketing materials for them, to create awareness and build customers’ trust.\r\nWebsite: http://8020fit.com.vn/\r\nClient: Vietnam / 8020Fit', 'Branding, Website and Print Brochure'),
(25, 3, 'A8 Studio', 'public/media/a8thumbnailimg-1473247064.jpg', NULL, 1, 1, 1, 'block', '25-a8-studio', 'Architecture Design', 'Understanding the business ideas of the Vietnamese young architects, we redesigned the standard company profile into a creative artwork by applying graphic elements into their portfolio.\r\nWebsite: \r\nClient: Vietnam / A8 Studio', 'Branding, company profile design'),
(26, 3, 'CanMake', 'public/media/canmakethumbnailimg-1473247446.png', NULL, 1, 1, 3, 'block', '25-canmake', 'The Beauty Store', 'Since the establishment of Canmake in Vietnam, Studio BCA is honored to be Canmake’s creative vendor, responsible in designing all marketing materials, from brochure to monthly promotion ads.\r\nWebsite: http://canmake.vn/\r\nClient: Vietnam / The Beauty Store', 'Marketing materials design & print production'),
(27, 3, 'Decorator\'s Notebook', 'public/media/decoratorthumbnailimg-1473247706.png', NULL, 1, 1, 2, 'block', 'decorator-s-notebook', 'Luxury Furniture', 'To this luxury furniture store, Studio BCA believes the feeling of customers toward brand is firstly through the brochure, that’s a reason for us to choose the minimal and western style for this printing ad.\r\nWebsite: https://decoratorsnotebook.co/\r\nClient: Singapore / Decorator\'s Notebook', 'Digital and print brochure'),
(28, 5, 'Grab', 'public/media/grabthumbnailimg-1473248091.png', NULL, 1, 1, 2, 'block', 'grab', 'Transportation Service', 'We collaborated with the headquarter of GrabTaxi in Malaysia to produce a set of banners to promote all Grab services running in Singapore, Indonesia, Thailand and Malaysia.\r\nWebsite: https://www.grab.com/\r\nClient: Malaysia / Grab', 'Banner sets design & adaptation'),
(29, 5, 'BakerPedia', 'public/media/bakerpediathumb384-1473656290.png', NULL, 1, 0, 0, 'block', 'bakerpedia', 'Bakery Store', 'We choose the image of wheat and book to imply the service of our client. The book is stylized into the thinking box to show the digital-related to service.\r\nWebsite: http://www.bakerpedia.com/\r\nClient: BAKERpedia', 'Digital resources for commercial bakery and food innovation'),
(30, 2, 'TravelWards', 'public/media/travelwardsthumb384-1473658812.png', NULL, 1, 0, 0, 'block', 'travelwards', 'Travel Agent', 'The symbol is stylized from the name of client company with the branding color. Since it’s B2B business, the minimal and modern branding would bring the impression of trustworthy to our client.\r\nWebsite: http://www.travelwards.com/\r\nClient: Singapore / TravelWards ', 'Online booking platform for travel agent'),
(31, 2, 'The Beauty Store', 'public/media/thebeautystorethumb384-1473733911.png', NULL, 1, 0, 0, 'block', 'the-beauty-store', 'Japanese cosmetics', 'The Japanese cosmetic franchised by Ms Nguyen Cao Ky Duyen, the website design shows the connection with the brand identity and its target audience - teenager girls.\r\nWebsite: http://canmake.vn/\r\nClient: Vietnam / The Beauty Store', 'Japanese cosmetics'),
(32, 5, 'Bright Energy', 'public/media/bewebfeatureimagevertical-1473834773.jpg', NULL, 1, 0, 0, 'block', 'bright-energy', 'Solar Energy Solution', 'To be different from the solar companies in marketplace, Bright Energy emphasize on the user experience and environment protection. Studio BCA has translate client’s objectives into their branding by using the friendly fonts go with bright color with the last letter Y stylized into the smiling plug.\r\nWebsite: \r\nClient: Vietnam / Bright Energy', 'Provide and install the solar energy solution'),
(33, 5, 'Quinela', 'public/media/quinelabusinesscardthumbnailimg-1473837231.jpg', NULL, 1, 0, 0, 'block', 'quinela', 'Investment Group', 'Since the main target audience of client is high-income people, we aim to raise the feeling of luxury and high-end by using the serif font and the logo is designed by mixing the first letter of client’s brand name.\r\nWebsite: http://quinelagroup.com/\r\nClient: Singapore / Quinela Group', 'Investment group'),
(34, 3, 'Villa Song', 'public/media/villasongthumbnailimagevertical-1473837420.jpg', NULL, 1, 0, 0, 'block', 'villa-song', 'Villa Residence', 'Villa Song Saigon is a lovely boutique hotel, which located in District 2, along the banks of the Saigon River. It’s a quite high-standard hotel which requires us to choose the clean and minimal art direction that raise the feeling of luxury in customers.\r\nWebsite: http://villasong.com/\r\nClient: Vietnam / Villa Song', 'Hotel kits designs');

-- --------------------------------------------------------

--
-- Table structure for table `category_products`
--

CREATE TABLE `category_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `images` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `order_by` int(11) NOT NULL DEFAULT '0',
  `publish` int(11) NOT NULL DEFAULT '1',
  `featured` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `keywords` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `publish` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `address`, `phone`, `content`, `publish`, `created_at`, `updated_at`) VALUES
(1, 'Son Bui', 'builongkyson@gmail.com', NULL, '909326508', NULL, 1, '2016-09-06 00:14:01', '2016-09-06 00:14:01'),
(2, 'Son Bui', 'builongkyson@gmail.com', NULL, '909326508', NULL, 1, '2016-09-06 00:20:43', '2016-09-06 00:20:43'),
(3, 'Son Bui', 'builongkyson@gmail.com', NULL, '909326508', NULL, 1, '2016-09-06 00:34:02', '2016-09-06 00:34:02'),
(4, 'Bui Long Ky Son', 'builongkyson@gmail.com', NULL, '909326508', NULL, 1, '2016-09-06 00:37:35', '2016-09-06 00:37:35'),
(5, 'Bui Long Ky Son', 'builongkyson@gmail.com', NULL, '909326508', NULL, 1, '2016-09-06 00:39:09', '2016-09-06 00:39:09'),
(6, 'Test', 'demondragon0101@gmail.com', NULL, '909326508', NULL, 1, '2016-09-07 10:11:50', '2016-09-07 10:11:50'),
(7, 'Ngoc Anh', 's3533004@rmit.edu.vn', NULL, '0964513996', NULL, 1, '2016-09-08 23:37:04', '2016-09-08 23:37:04'),
(8, 'Ngoc Anh', 's3533004@rmit.edu.vn', NULL, '0964513996', NULL, 1, '2016-09-08 23:37:14', '2016-09-08 23:37:14'),
(9, 'ngoc anh', 's3533004@rmit.edu.vn', NULL, '0964513996', NULL, 1, '2016-09-09 02:00:29', '2016-09-09 02:00:29'),
(10, 'Loc', 'loc@studioboconganh.com', NULL, '0916220691', NULL, 1, '2016-09-09 13:55:02', '2016-09-09 13:55:02'),
(11, 'Loc', 'loc@studioboconganh.com', NULL, '0916220691', NULL, 1, '2016-09-09 13:57:35', '2016-09-09 13:57:35'),
(12, 'Loc', 'loc@studioboconganh.com', NULL, '0916220691', NULL, 1, '2016-09-09 13:58:26', '2016-09-09 13:58:26'),
(13, 'loc', 'loc@studioboconganh.com', NULL, '0916220691', NULL, 1, '2016-09-09 13:59:24', '2016-09-09 13:59:24'),
(14, 'loc', 'loc@studioboconganh.com', NULL, '0916220691', NULL, 1, '2016-09-09 14:05:30', '2016-09-09 14:05:30'),
(15, 'asdsd', 'adasd@me.com', NULL, '12312', NULL, 1, '2016-09-09 14:22:58', '2016-09-09 14:22:58'),
(16, 'VăN', 'kv0906@yahoo.com', NULL, '0933524792', NULL, 1, '2016-09-13 16:24:27', '2016-09-13 16:24:27'),
(17, 'Tran huu khanh van', 'kv0906@yahoo.com', NULL, '0933524792', NULL, 1, '2016-09-13 16:25:11', '2016-09-13 16:25:11');

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `article_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `banner_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `block_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `setting_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `menu_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `language_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `content` longtext COLLATE utf8_unicode_ci,
  `title` text COLLATE utf8_unicode_ci,
  `descriptions` text COLLATE utf8_unicode_ci,
  `keywords` text COLLATE utf8_unicode_ci,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `countryCode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `countryName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `currencyCode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `population` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fipsCode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isoNumeric` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `north` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `south` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `east` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `west` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `capital` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `continentName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `continent` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `areaInSqKm` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `languages` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isoAlpha3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `geonameId` int(11) NOT NULL,
  `order` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `countryCode`, `countryName`, `currencyCode`, `population`, `fipsCode`, `isoNumeric`, `north`, `south`, `east`, `west`, `capital`, `continentName`, `continent`, `areaInSqKm`, `languages`, `isoAlpha3`, `geonameId`, `order`, `status`) VALUES
(1, 'AD', 'Andorra', 'EUR', '84000', 'AN', '020', '42.65604389629997', '42.42849259876837', '1.7865427778319827', '1.4071867141112762', 'Andorra la Vella', 'Europe', 'EU', '468.0', 'ca', 'AND', 3041565, NULL, 1),
(2, 'AE', 'United Arab Emirates', 'AED', '4975593', 'AE', '784', '26.08415985107422', '22.633329391479492', '56.38166046142578', '51.58332824707031', 'Abu Dhabi', 'Asia', 'AS', '82880.0', 'ar-AE,fa,en,hi,ur', 'ARE', 290557, NULL, 1),
(3, 'AF', 'Afghanistan', 'AFN', '29121286', 'AF', '004', '38.483418', '29.377472', '74.879448', '60.478443', 'Kabul', 'Asia', 'AS', '647500.0', 'fa-AF,ps,uz-AF,tk', 'AFG', 1149361, NULL, 1),
(4, 'AG', 'Antigua and Barbuda', 'XCD', '86754', 'AC', '028', '17.729387', '16.996979', '-61.672421', '-61.906425', 'St. John\'s', 'North America', 'NA', '443.0', 'en-AG', 'ATG', 3576396, NULL, 1),
(5, 'AI', 'Anguilla', 'XCD', '13254', 'AV', '660', '18.283424', '18.166815', '-62.971359', '-63.172901', 'The Valley', 'North America', 'NA', '102.0', 'en-AI', 'AIA', 3573511, NULL, 1),
(6, 'AL', 'Albania', 'ALL', '2986952', 'AL', '008', '42.665611', '39.648361', '21.068472', '19.293972', 'Tirana', 'Europe', 'EU', '28748.0', 'sq,el', 'ALB', 783754, NULL, 1),
(7, 'AM', 'Armenia', 'AMD', '2968000', 'AM', '051', '41.301834', '38.830528', '46.772435045159995', '43.44978', 'Yerevan', 'Asia', 'AS', '29800.0', 'hy', 'ARM', 174982, NULL, 1),
(8, 'AO', 'Angola', 'AOA', '13068161', 'AO', '024', '-4.376826', '-18.042076', '24.082119', '11.679219', 'Luanda', 'Africa', 'AF', '1246700.0', 'pt-AO', 'AGO', 3351879, NULL, 1),
(9, 'AQ', 'Antarctica', '', '0', 'AY', '010', '-60.515533', '-89.9999', '179.9999', '-179.9999', '', 'Antarctica', 'AN', '1.4E7', '', 'ATA', 6697173, NULL, 1),
(10, 'AR', 'Argentina', 'ARS', '41343201', 'AR', '032', '-21.781277', '-55.061314', '-53.591835', '-73.58297', 'Buenos Aires', 'South America', 'SA', '2766890.0', 'es-AR,en,it,de,fr,gn', 'ARG', 3865483, NULL, 1),
(11, 'AS', 'American Samoa', 'USD', '57881', 'AQ', '016', '-11.0497', '-14.382478', '-169.416077', '-171.091888', 'Pago Pago', 'Oceania', 'OC', '199.0', 'en-AS,sm,to', 'ASM', 5880801, NULL, 1),
(12, 'AT', 'Austria', 'EUR', '8205000', 'AU', '040', '49.017056', '46.378029', '17.162722', '9.535916', 'Vienna', 'Europe', 'EU', '83858.0', 'de-AT,hr,hu,sl', 'AUT', 2782113, NULL, 1),
(13, 'AU', 'Australia', 'AUD', '21515754', 'AS', '036', '-10.062805', '-43.64397', '153.639252', '112.911057', 'Canberra', 'Oceania', 'OC', '7686850.0', 'en-AU', 'AUS', 2077456, NULL, 1),
(14, 'AW', 'Aruba', 'AWG', '71566', 'AA', '533', '12.623718127152925', '12.411707706190716', '-69.86575120104982', '-70.0644737196045', 'Oranjestad', 'North America', 'NA', '193.0', 'nl-AW,es,en', 'ABW', 3577279, NULL, 1),
(15, 'AX', 'Åland', 'EUR', '26711', '', '248', '60.488861', '59.90675', '21.011862', '19.317694', 'Mariehamn', 'Europe', 'EU', '', 'sv-AX', 'ALA', 661882, NULL, 1),
(16, 'AZ', 'Azerbaijan', 'AZN', '8303512', 'AJ', '031', '41.90564', '38.38915252685547', '50.370083', '44.774113', 'Baku', 'Asia', 'AS', '86600.0', 'az,ru,hy', 'AZE', 587116, NULL, 1),
(17, 'BA', 'Bosnia and Herzegovina', 'BAM', '4590000', 'BK', '070', '45.239193', '42.546112', '19.622223', '15.718945', 'Sarajevo', 'Europe', 'EU', '51129.0', 'bs,hr-BA,sr-BA', 'BIH', 3277605, NULL, 1),
(18, 'BB', 'Barbados', 'BBD', '285653', 'BB', '052', '13.327257', '13.039844', '-59.420376', '-59.648922', 'Bridgetown', 'North America', 'NA', '431.0', 'en-BB', 'BRB', 3374084, NULL, 1),
(19, 'BD', 'Bangladesh', 'BDT', '156118464', 'BG', '050', '26.631945', '20.743334', '92.673668', '88.028336', 'Dhaka', 'Asia', 'AS', '144000.0', 'bn-BD,en', 'BGD', 1210997, NULL, 1),
(20, 'BE', 'Belgium', 'EUR', '10403000', 'BE', '056', '51.505444', '49.49361', '6.403861', '2.546944', 'Brussels', 'Europe', 'EU', '30510.0', 'nl-BE,fr-BE,de-BE', 'BEL', 2802361, NULL, 1),
(21, 'BF', 'Burkina Faso', 'XOF', '16241811', 'UV', '854', '15.082593', '9.401108', '2.405395', '-5.518916', 'Ouagadougou', 'Africa', 'AF', '274200.0', 'fr-BF', 'BFA', 2361809, NULL, 1),
(22, 'BG', 'Bulgaria', 'BGN', '7148785', 'BU', '100', '44.21764', '41.242084', '28.612167', '22.371166', 'Sofia', 'Europe', 'EU', '110910.0', 'bg,tr-BG', 'BGR', 732800, NULL, 1),
(23, 'BH', 'Bahrain', 'BHD', '738004', 'BA', '048', '26.282583', '25.796862', '50.664471', '50.45414', 'Manama', 'Asia', 'AS', '665.0', 'ar-BH,en,fa,ur', 'BHR', 290291, NULL, 1),
(24, 'BI', 'Burundi', 'BIF', '9863117', 'BY', '108', '-2.310123', '-4.465713', '30.847729', '28.993061', 'Bujumbura', 'Africa', 'AF', '27830.0', 'fr-BI,rn', 'BDI', 433561, NULL, 1),
(25, 'BJ', 'Benin', 'XOF', '9056010', 'BN', '204', '12.418347', '6.225748', '3.851701', '0.774575', 'Porto-Novo', 'Africa', 'AF', '112620.0', 'fr-BJ', 'BEN', 2395170, NULL, 1),
(26, 'BL', 'Saint Barthélemy', 'EUR', '8450', 'TB', '652', '17.928808791949283', '17.878183227405575', '-62.788983372985854', '-62.8739118253784', 'Gustavia', 'North America', 'NA', '21.0', 'fr', 'BLM', 3578476, NULL, 1),
(27, 'BM', 'Bermuda', 'BMD', '65365', 'BD', '060', '32.393833', '32.246639', '-64.651993', '-64.89605', 'Hamilton', 'North America', 'NA', '53.0', 'en-BM,pt', 'BMU', 3573345, NULL, 1),
(28, 'BN', 'Brunei', 'BND', '395027', 'BX', '096', '5.047167', '4.003083', '115.359444', '114.071442', 'Bandar Seri Begawan', 'Asia', 'AS', '5770.0', 'ms-BN,en-BN', 'BRN', 1820814, NULL, 1),
(29, 'BO', 'Bolivia', 'BOB', '9947418', 'BL', '068', '-9.680567', '-22.896133', '-57.45809600000001', '-69.640762', 'Sucre', 'South America', 'SA', '1098580.0', 'es-BO,qu,ay', 'BOL', 3923057, NULL, 1),
(30, 'BQ', 'Bonaire', 'USD', '18012', '', '535', '12.304535', '12.017149', '-68.192307', '-68.416458', '', 'North America', 'NA', '', 'nl,pap,en', 'BES', 7626844, NULL, 1),
(31, 'BR', 'Brazil', 'BRL', '201103330', 'BR', '076', '5.264877', '-33.750706', '-32.392998', '-73.985535', 'Brasília', 'South America', 'SA', '8511965.0', 'pt-BR,es,en,fr', 'BRA', 3469034, NULL, 1),
(32, 'BS', 'Bahamas', 'BSD', '301790', 'BF', '044', '26.919243', '22.852743', '-74.423874', '-78.995911', 'Nassau', 'North America', 'NA', '13940.0', 'en-BS', 'BHS', 3572887, NULL, 1),
(33, 'BT', 'Bhutan', 'BTN', '699847', 'BT', '064', '28.323778', '26.70764', '92.125191', '88.75972', 'Thimphu', 'Asia', 'AS', '47000.0', 'dz', 'BTN', 1252634, NULL, 1),
(34, 'BV', 'Bouvet Island', 'NOK', '0', 'BV', '074', '-54.400322', '-54.462383', '3.487976', '3.335499', '', 'Antarctica', 'AN', '', '', 'BVT', 3371123, NULL, 1),
(35, 'BW', 'Botswana', 'BWP', '2029307', 'BC', '072', '-17.780813', '-26.907246', '29.360781', '19.999535', 'Gaborone', 'Africa', 'AF', '600370.0', 'en-BW,tn-BW', 'BWA', 933860, NULL, 1),
(36, 'BY', 'Belarus', 'BYR', '9685000', 'BO', '112', '56.165806', '51.256416', '32.770805', '23.176889', 'Minsk', 'Europe', 'EU', '207600.0', 'be,ru', 'BLR', 630336, NULL, 1),
(37, 'BZ', 'Belize', 'BZD', '314522', 'BH', '084', '18.496557', '15.8893', '-87.776985', '-89.224815', 'Belmopan', 'North America', 'NA', '22966.0', 'en-BZ,es', 'BLZ', 3582678, NULL, 1),
(38, 'CA', 'Canada', 'CAD', '33679000', 'CA', '124', '83.110626', '41.67598', '-52.636291', '-141', 'Ottawa', 'North America', 'NA', '9984670.0', 'en-CA,fr-CA,iu', 'CAN', 6251999, NULL, 1),
(39, 'CC', 'Cocos [Keeling] Islands', 'AUD', '628', 'CK', '166', '-12.072459094', '-12.208725839', '96.929489344', '96.816941408', 'West Island', 'Asia', 'AS', '14.0', 'ms-CC,en', 'CCK', 1547376, NULL, 1),
(40, 'CD', 'Democratic Republic of the Congo', 'CDF', '70916439', 'CG', '180', '5.386098', '-13.455675', '31.305912', '12.204144', 'Kinshasa', 'Africa', 'AF', '2345410.0', 'fr-CD,ln,kg', 'COD', 203312, NULL, 1),
(41, 'CF', 'Central African Republic', 'XAF', '4844927', 'CT', '140', '11.007569', '2.220514', '27.463421', '14.420097', 'Bangui', 'Africa', 'AF', '622984.0', 'fr-CF,sg,ln,kg', 'CAF', 239880, NULL, 1),
(42, 'CG', 'Republic of the Congo', 'XAF', '3039126', 'CF', '178', '3.703082', '-5.027223', '18.649839', '11.205009', 'Brazzaville', 'Africa', 'AF', '342000.0', 'fr-CG,kg,ln-CG', 'COG', 2260494, NULL, 1),
(43, 'CH', 'Switzerland', 'CHF', '7581000', 'SZ', '756', '47.805332', '45.825695', '10.491472', '5.957472', 'Berne', 'Europe', 'EU', '41290.0', 'de-CH,fr-CH,it-CH,rm', 'CHE', 2658434, NULL, 1),
(44, 'CI', 'Ivory Coast', 'XOF', '21058798', 'IV', '384', '10.736642', '4.357067', '-2.494897', '-8.599302', 'Yamoussoukro', 'Africa', 'AF', '322460.0', 'fr-CI', 'CIV', 2287781, NULL, 1),
(45, 'CK', 'Cook Islands', 'NZD', '21388', 'CW', '184', '-10.023114', '-21.944164', '-157.312134', '-161.093658', 'Avarua', 'Oceania', 'OC', '240.0', 'en-CK,mi', 'COK', 1899402, NULL, 1),
(46, 'CL', 'Chile', 'CLP', '16746491', 'CI', '152', '-17.507553', '-55.916348', '-66.417557', '-80.785851', 'Santiago', 'South America', 'SA', '756950.0', 'es-CL', 'CHL', 3895114, NULL, 1),
(47, 'CM', 'Cameroon', 'XAF', '19294149', 'CM', '120', '13.078056', '1.652548', '16.192116', '8.494763', 'Yaoundé', 'Africa', 'AF', '475440.0', 'en-CM,fr-CM', 'CMR', 2233387, NULL, 1),
(48, 'CN', 'China', 'CNY', '1330044000', 'CH', '156', '53.56086', '15.775416', '134.773911', '73.557693', 'Beijing', 'Asia', 'AS', '9596960.0', 'zh-CN,yue,wuu,dta,ug,za', 'CHN', 1814991, NULL, 1),
(49, 'CO', 'Colombia', 'COP', '44205293', 'CO', '170', '13.380502', '-4.225869', '-66.869835', '-81.728111', 'Bogotá', 'South America', 'SA', '1138910.0', 'es-CO', 'COL', 3686110, NULL, 1),
(50, 'CR', 'Costa Rica', 'CRC', '4516220', 'CS', '188', '11.216819', '8.032975', '-82.555992', '-85.950623', 'San José', 'North America', 'NA', '51100.0', 'es-CR,en', 'CRI', 3624060, NULL, 1),
(51, 'CU', 'Cuba', 'CUP', '11423000', 'CU', '192', '23.226042', '19.828083', '-74.131775', '-84.957428', 'Havana', 'North America', 'NA', '110860.0', 'es-CU', 'CUB', 3562981, NULL, 1),
(52, 'CV', 'Cape Verde', 'CVE', '508659', 'CV', '132', '17.197178', '14.808022', '-22.669443', '-25.358747', 'Praia', 'Africa', 'AF', '4033.0', 'pt-CV', 'CPV', 3374766, NULL, 1),
(53, 'CW', 'Curacao', 'ANG', '141766', 'UC', '531', '12.385672', '12.032745', '-68.733948', '-69.157204', 'Willemstad', 'North America', 'NA', '', 'nl,pap', 'CUW', 7626836, NULL, 1),
(54, 'CX', 'Christmas Island', 'AUD', '1500', 'KT', '162', '-10.412356007', '-10.5704829995', '105.712596992', '105.533276992', 'The Settlement', 'Asia', 'AS', '135.0', 'en,zh,ms-CC', 'CXR', 2078138, NULL, 1),
(55, 'CY', 'Cyprus', 'EUR', '1102677', 'CY', '196', '35.701527', '34.6332846722908', '34.59791599999994', '32.27308300000004', 'Nicosia', 'Europe', 'EU', '9250.0', 'el-CY,tr-CY,en', 'CYP', 146669, NULL, 1),
(56, 'CZ', 'Czechia', 'CZK', '10476000', 'EZ', '203', '51.058887', '48.542915', '18.860111', '12.096194', 'Prague', 'Europe', 'EU', '78866.0', 'cs,sk', 'CZE', 3077311, NULL, 1),
(57, 'DE', 'Germany', 'EUR', '81802257', 'GM', '276', '55.055637', '47.275776', '15.039889', '5.865639', 'Berlin', 'Europe', 'EU', '357021.0', 'de', 'DEU', 2921044, NULL, 1),
(58, 'DJ', 'Djibouti', 'DJF', '740528', 'DJ', '262', '12.706833', '10.909917', '43.416973', '41.773472', 'Djibouti', 'Africa', 'AF', '23000.0', 'fr-DJ,ar,so-DJ,aa', 'DJI', 223816, NULL, 1),
(59, 'DK', 'Denmark', 'DKK', '5484000', 'DA', '208', '57.748417', '54.562389', '15.158834', '8.075611', 'Copenhagen', 'Europe', 'EU', '43094.0', 'da-DK,en,fo,de-DK', 'DNK', 2623032, NULL, 1),
(60, 'DM', 'Dominica', 'XCD', '72813', 'DO', '212', '15.631809', '15.20169', '-61.244152', '-61.484108', 'Roseau', 'North America', 'NA', '754.0', 'en-DM', 'DMA', 3575830, NULL, 1),
(61, 'DO', 'Dominican Republic', 'DOP', '9823821', 'DR', '214', '19.929859', '17.543159', '-68.32', '-72.003487', 'Santo Domingo', 'North America', 'NA', '48730.0', 'es-DO', 'DOM', 3508796, NULL, 1),
(62, 'DZ', 'Algeria', 'DZD', '34586184', 'AG', '012', '37.093723', '18.960028', '11.979548', '-8.673868', 'Algiers', 'Africa', 'AF', '2381740.0', 'ar-DZ', 'DZA', 2589581, NULL, 1),
(63, 'EC', 'Ecuador', 'USD', '14790608', 'EC', '218', '1.43902', '-4.998823', '-75.184586', '-81.078598', 'Quito', 'South America', 'SA', '283560.0', 'es-EC', 'ECU', 3658394, NULL, 1),
(64, 'EE', 'Estonia', 'EUR', '1291170', 'EN', '233', '59.676224', '57.516193', '28.209972', '21.837584', 'Tallinn', 'Europe', 'EU', '45226.0', 'et,ru', 'EST', 453733, NULL, 1),
(65, 'EG', 'Egypt', 'EGP', '80471869', 'EG', '818', '31.667334', '21.725389', '35.794861', '24.698111', 'Cairo', 'Africa', 'AF', '1001450.0', 'ar-EG,en,fr', 'EGY', 357994, NULL, 1),
(66, 'EH', 'Western Sahara', 'MAD', '273008', 'WI', '732', '27.669674', '20.774158', '-8.670276', '-17.103182', 'El Aaiún', 'Africa', 'AF', '266000.0', 'ar,mey', 'ESH', 2461445, NULL, 1),
(67, 'ER', 'Eritrea', 'ERN', '5792984', 'ER', '232', '18.003084', '12.359555', '43.13464', '36.438778', 'Asmara', 'Africa', 'AF', '121320.0', 'aa-ER,ar,tig,kun,ti-ER', 'ERI', 338010, NULL, 1),
(68, 'ES', 'Spain', 'EUR', '46505963', 'SP', '724', '43.791721', '36.000332', '4.315389', '-9.290778', 'Madrid', 'Europe', 'EU', '504782.0', 'es-ES,ca,gl,eu,oc', 'ESP', 2510769, NULL, 1),
(69, 'ET', 'Ethiopia', 'ETB', '88013491', 'ET', '231', '14.89375', '3.402422', '47.986179', '32.999939', 'Addis Ababa', 'Africa', 'AF', '1127127.0', 'am,en-ET,om-ET,ti-ET,so-ET,sid', 'ETH', 337996, NULL, 1),
(70, 'FI', 'Finland', 'EUR', '5244000', 'FI', '246', '70.096054', '59.808777', '31.580944', '20.556944', 'Helsinki', 'Europe', 'EU', '337030.0', 'fi-FI,sv-FI,smn', 'FIN', 660013, NULL, 1),
(71, 'FJ', 'Fiji', 'FJD', '875983', 'FJ', '242', '-12.480111', '-20.67597', '-178.424438', '177.129334', 'Suva', 'Oceania', 'OC', '18270.0', 'en-FJ,fj', 'FJI', 2205218, NULL, 1),
(72, 'FK', 'Falkland Islands', 'FKP', '2638', 'FK', '238', '-51.24065', '-52.360512', '-57.712486', '-61.345192', 'Stanley', 'South America', 'SA', '12173.0', 'en-FK', 'FLK', 3474414, NULL, 1),
(73, 'FM', 'Micronesia', 'USD', '107708', 'FM', '583', '10.08904', '1.02629', '163.03717', '137.33648', 'Palikir', 'Oceania', 'OC', '702.0', 'en-FM,chk,pon,yap,kos,uli,woe,', 'FSM', 2081918, NULL, 1),
(74, 'FO', 'Faroe Islands', 'DKK', '48228', 'FO', '234', '62.400749', '61.394943', '-6.399583', '-7.458', 'Tórshavn', 'Europe', 'EU', '1399.0', 'fo,da-FO', 'FRO', 2622320, NULL, 1),
(75, 'FR', 'France', 'EUR', '64768389', 'FR', '250', '51.092804', '41.371582', '9.561556', '-5.142222', 'Paris', 'Europe', 'EU', '547030.0', 'fr-FR,frp,br,co,ca,eu,oc', 'FRA', 3017382, NULL, 1),
(76, 'GA', 'Gabon', 'XAF', '1545255', 'GB', '266', '2.322612', '-3.978806', '14.502347', '8.695471', 'Libreville', 'Africa', 'AF', '267667.0', 'fr-GA', 'GAB', 2400553, NULL, 1),
(77, 'GB', 'United Kingdom', 'GBP', '62348447', 'UK', '826', '59.360249', '49.906193', '1.759', '-8.623555', 'London', 'Europe', 'EU', '244820.0', 'en-GB,cy-GB,gd', 'GBR', 2635167, NULL, 1),
(78, 'GD', 'Grenada', 'XCD', '107818', 'GJ', '308', '12.318283928171299', '11.986893', '-61.57676970108031', '-61.802344', 'St. George\'s', 'North America', 'NA', '344.0', 'en-GD', 'GRD', 3580239, NULL, 1),
(79, 'GE', 'Georgia', 'GEL', '4630000', 'GG', '268', '43.586498', '41.053196', '46.725971', '40.010139', 'Tbilisi', 'Asia', 'AS', '69700.0', 'ka,ru,hy,az', 'GEO', 614540, NULL, 1),
(80, 'GF', 'French Guiana', 'EUR', '195506', 'FG', '254', '5.776496', '2.127094', '-51.613949', '-54.542511', 'Cayenne', 'South America', 'SA', '91000.0', 'fr-GF', 'GUF', 3381670, NULL, 1),
(81, 'GG', 'Guernsey', 'GBP', '65228', 'GK', '831', '49.731727816705416', '49.40764156876899', '-2.1577152112246267', '-2.673194593476069', 'St Peter Port', 'Europe', 'EU', '78.0', 'en,fr', 'GGY', 3042362, NULL, 1),
(82, 'GH', 'Ghana', 'GHS', '24339838', 'GH', '288', '11.173301', '4.736723', '1.191781', '-3.25542', 'Accra', 'Africa', 'AF', '239460.0', 'en-GH,ak,ee,tw', 'GHA', 2300660, NULL, 1),
(83, 'GI', 'Gibraltar', 'GIP', '27884', 'GI', '292', '36.155439135670726', '36.10903070140248', '-5.338285164001491', '-5.36626149743654', 'Gibraltar', 'Europe', 'EU', '6.5', 'en-GI,es,it,pt', 'GIB', 2411586, NULL, 1),
(84, 'GL', 'Greenland', 'DKK', '56375', 'GL', '304', '83.627357', '59.777401', '-11.312319', '-73.04203', 'Nuuk', 'North America', 'NA', '2166086.0', 'kl,da-GL,en', 'GRL', 3425505, NULL, 1),
(85, 'GM', 'Gambia', 'GMD', '1593256', 'GA', '270', '13.826571', '13.064252', '-13.797793', '-16.825079', 'Banjul', 'Africa', 'AF', '11300.0', 'en-GM,mnk,wof,wo,ff', 'GMB', 2413451, NULL, 1),
(86, 'GN', 'Guinea', 'GNF', '10324025', 'GV', '324', '12.67622', '7.193553', '-7.641071', '-14.926619', 'Conakry', 'Africa', 'AF', '245857.0', 'fr-GN', 'GIN', 2420477, NULL, 1),
(87, 'GP', 'Guadeloupe', 'EUR', '443000', 'GP', '312', '16.516848', '15.867565', '-61', '-61.544765', 'Basse-Terre', 'North America', 'NA', '1780.0', 'fr-GP', 'GLP', 3579143, NULL, 1),
(88, 'GQ', 'Equatorial Guinea', 'XAF', '1014999', 'EK', '226', '2.346989', '0.92086', '11.335724', '9.346865', 'Malabo', 'Africa', 'AF', '28051.0', 'es-GQ,fr', 'GNQ', 2309096, NULL, 1),
(89, 'GR', 'Greece', 'EUR', '11000000', 'GR', '300', '41.7484999849641', '34.8020663391466', '28.2470831714347', '19.3736035624134', 'Athens', 'Europe', 'EU', '131940.0', 'el-GR,en,fr', 'GRC', 390903, NULL, 1),
(90, 'GS', 'South Georgia and the South Sandwich Islands', 'GBP', '30', 'SX', '239', '-53.970467', '-59.479259', '-26.229326', '-38.021175', 'Grytviken', 'Antarctica', 'AN', '3903.0', 'en', 'SGS', 3474415, NULL, 1),
(91, 'GT', 'Guatemala', 'GTQ', '13550440', 'GT', '320', '17.81522', '13.737302', '-88.223198', '-92.23629', 'Guatemala City', 'North America', 'NA', '108890.0', 'es-GT', 'GTM', 3595528, NULL, 1),
(92, 'GU', 'Guam', 'USD', '159358', 'GQ', '316', '13.652333', '13.240611', '144.953979', '144.619247', 'Hagåtña', 'Oceania', 'OC', '549.0', 'en-GU,ch-GU', 'GUM', 4043988, NULL, 1),
(93, 'GW', 'Guinea-Bissau', 'XOF', '1565126', 'PU', '624', '12.680789', '10.924265', '-13.636522', '-16.717535', 'Bissau', 'Africa', 'AF', '36120.0', 'pt-GW,pov', 'GNB', 2372248, NULL, 1),
(94, 'GY', 'Guyana', 'GYD', '748486', 'GY', '328', '8.557567', '1.17508', '-56.480251', '-61.384762', 'Georgetown', 'South America', 'SA', '214970.0', 'en-GY', 'GUY', 3378535, NULL, 1),
(95, 'HK', 'Hong Kong', 'HKD', '6898686', 'HK', '344', '22.559778', '22.15325', '114.434753', '113.837753', 'Hong Kong', 'Asia', 'AS', '1092.0', 'zh-HK,yue,zh,en', 'HKG', 1819730, NULL, 1),
(96, 'HM', 'Heard Island and McDonald Islands', 'AUD', '0', 'HM', '334', '-52.909416', '-53.192001', '73.859146', '72.596535', '', 'Antarctica', 'AN', '412.0', '', 'HMD', 1547314, NULL, 1),
(97, 'HN', 'Honduras', 'HNL', '7989415', 'HO', '340', '16.510256', '12.982411', '-83.155403', '-89.350792', 'Tegucigalpa', 'North America', 'NA', '112090.0', 'es-HN', 'HND', 3608932, NULL, 1),
(98, 'HR', 'Croatia', 'HRK', '4491000', 'HR', '191', '46.53875', '42.43589', '19.427389', '13.493222', 'Zagreb', 'Europe', 'EU', '56542.0', 'hr-HR,sr', 'HRV', 3202326, NULL, 1),
(99, 'HT', 'Haiti', 'HTG', '9648924', 'HA', '332', '20.08782', '18.021032', '-71.613358', '-74.478584', 'Port-au-Prince', 'North America', 'NA', '27750.0', 'ht,fr-HT', 'HTI', 3723988, NULL, 1),
(100, 'HU', 'Hungary', 'HUF', '9982000', 'HU', '348', '48.585667', '45.74361', '22.906', '16.111889', 'Budapest', 'Europe', 'EU', '93030.0', 'hu-HU', 'HUN', 719819, NULL, 1),
(101, 'ID', 'Indonesia', 'IDR', '242968342', 'ID', '360', '5.904417', '-10.941861', '141.021805', '95.009331', 'Jakarta', 'Asia', 'AS', '1919440.0', 'id,en,nl,jv', 'IDN', 1643084, NULL, 1),
(102, 'IE', 'Ireland', 'EUR', '4622917', 'EI', '372', '55.387917', '51.451584', '-6.002389', '-10.478556', 'Dublin', 'Europe', 'EU', '70280.0', 'en-IE,ga-IE', 'IRL', 2963597, NULL, 1),
(103, 'IL', 'Israel', 'ILS', '7353985', 'IS', '376', '33.340137', '29.496639', '35.876804', '34.270278754419145', '', 'Asia', 'AS', '20770.0', 'he,ar-IL,en-IL,', 'ISR', 294640, NULL, 1),
(104, 'IM', 'Isle of Man', 'GBP', '75049', 'IM', '833', '54.419724', '54.055916', '-4.3115', '-4.798722', 'Douglas', 'Europe', 'EU', '572.0', 'en,gv', 'IMN', 3042225, NULL, 1),
(105, 'IN', 'India', 'INR', '1173108018', 'IN', '356', '35.504223', '6.747139', '97.403305', '68.186691', 'New Delhi', 'Asia', 'AS', '3287590.0', 'en-IN,hi,bn,te,mr,ta,ur,gu,kn,', 'IND', 1269750, NULL, 1),
(106, 'IO', 'British Indian Ocean Territory', 'USD', '4000', 'IO', '086', '-5.268333', '-7.438028', '72.493164', '71.259972', '', 'Asia', 'AS', '60.0', 'en-IO', 'IOT', 1282588, NULL, 1),
(107, 'IQ', 'Iraq', 'IQD', '29671605', 'IZ', '368', '37.378029', '29.069445', '48.575916', '38.795887', 'Baghdad', 'Asia', 'AS', '437072.0', 'ar-IQ,ku,hy', 'IRQ', 99237, NULL, 1),
(108, 'IR', 'Iran', 'IRR', '76923300', 'IR', '364', '39.777222', '25.064083', '63.317471', '44.047279', 'Tehran', 'Asia', 'AS', '1648000.0', 'fa-IR,ku', 'IRN', 130758, NULL, 1),
(109, 'IS', 'Iceland', 'ISK', '308910', 'IC', '352', '66.53463', '63.393253', '-13.495815', '-24.546524', 'Reykjavik', 'Europe', 'EU', '103000.0', 'is,en,de,da,sv,no', 'ISL', 2629691, NULL, 1),
(110, 'IT', 'Italy', 'EUR', '60340328', 'IT', '380', '47.095196', '36.652779', '18.513445', '6.614889', 'Rome', 'Europe', 'EU', '301230.0', 'it-IT,de-IT,fr-IT,sc,ca,co,sl', 'ITA', 3175395, NULL, 1),
(111, 'JE', 'Jersey', 'GBP', '90812', 'JE', '832', '49.265057', '49.169834', '-2.022083', '-2.260028', 'Saint Helier', 'Europe', 'EU', '116.0', 'en,pt', 'JEY', 3042142, NULL, 1),
(112, 'JM', 'Jamaica', 'JMD', '2847232', 'JM', '388', '18.526976', '17.703554', '-76.180321', '-78.366638', 'Kingston', 'North America', 'NA', '10991.0', 'en-JM', 'JAM', 3489940, NULL, 1),
(113, 'JO', 'Jordan', 'JOD', '6407085', 'JO', '400', '33.367668', '29.185888', '39.301167', '34.959999', 'Amman', 'Asia', 'AS', '92300.0', 'ar-JO,en', 'JOR', 248816, NULL, 1),
(114, 'JP', 'Japan', 'JPY', '127288000', 'JA', '392', '45.52314', '24.249472', '145.820892', '122.93853', 'Tokyo', 'Asia', 'AS', '377835.0', 'ja', 'JPN', 1861060, NULL, 1),
(115, 'KE', 'Kenya', 'KES', '40046566', 'KE', '404', '5.019938', '-4.678047', '41.899078', '33.908859', 'Nairobi', 'Africa', 'AF', '582650.0', 'en-KE,sw-KE', 'KEN', 192950, NULL, 1),
(116, 'KG', 'Kyrgyzstan', 'KGS', '5508626', 'KG', '417', '43.238224', '39.172832', '80.283165', '69.276611', 'Bishkek', 'Asia', 'AS', '198500.0', 'ky,uz,ru', 'KGZ', 1527747, NULL, 1),
(117, 'KH', 'Cambodia', 'KHR', '14453680', 'CB', '116', '14.686417', '10.409083', '107.627724', '102.339996', 'Phnom Penh', 'Asia', 'AS', '181040.0', 'km,fr,en', 'KHM', 1831722, NULL, 1),
(118, 'KI', 'Kiribati', 'AUD', '92533', 'KR', '296', '4.71957', '-11.437038', '-150.215347', '169.556137', 'Tarawa', 'Oceania', 'OC', '811.0', 'en-KI,gil', 'KIR', 4030945, NULL, 1),
(119, 'KM', 'Comoros', 'KMF', '773407', 'CN', '174', '-11.362381', '-12.387857', '44.538223', '43.21579', 'Moroni', 'Africa', 'AF', '2170.0', 'ar,fr-KM', 'COM', 921929, NULL, 1),
(120, 'KN', 'Saint Kitts and Nevis', 'XCD', '51134', 'SC', '659', '17.420118', '17.095343', '-62.543266', '-62.86956', 'Basseterre', 'North America', 'NA', '261.0', 'en-KN', 'KNA', 3575174, NULL, 1),
(121, 'KP', 'North Korea', 'KPW', '22912177', 'KN', '408', '43.006054', '37.673332', '130.674866', '124.315887', 'Pyongyang', 'Asia', 'AS', '120540.0', 'ko-KP', 'PRK', 1873107, NULL, 1),
(122, 'KR', 'South Korea', 'KRW', '48422644', 'KS', '410', '38.612446', '33.190945', '129.584671', '125.887108', 'Seoul', 'Asia', 'AS', '98480.0', 'ko-KR,en', 'KOR', 1835841, NULL, 1),
(123, 'KW', 'Kuwait', 'KWD', '2789132', 'KU', '414', '30.095945', '28.524611', '48.431473', '46.555557', 'Kuwait City', 'Asia', 'AS', '17820.0', 'ar-KW,en', 'KWT', 285570, NULL, 1),
(124, 'KY', 'Cayman Islands', 'KYD', '44270', 'CJ', '136', '19.7617', '19.263029', '-79.727272', '-81.432777', 'George Town', 'North America', 'NA', '262.0', 'en-KY', 'CYM', 3580718, NULL, 1),
(125, 'KZ', 'Kazakhstan', 'KZT', '15340000', 'KZ', '398', '55.451195', '40.936333', '87.312668', '46.491859', 'Astana', 'Asia', 'AS', '2717300.0', 'kk,ru', 'KAZ', 1522867, NULL, 1),
(126, 'LA', 'Laos', 'LAK', '6368162', 'LA', '418', '22.500389', '13.910027', '107.697029', '100.093056', 'Vientiane', 'Asia', 'AS', '236800.0', 'lo,fr,en', 'LAO', 1655842, NULL, 1),
(127, 'LB', 'Lebanon', 'LBP', '4125247', 'LE', '422', '34.691418', '33.05386', '36.639194', '35.114277', 'Beirut', 'Asia', 'AS', '10400.0', 'ar-LB,fr-LB,en,hy', 'LBN', 272103, NULL, 1),
(128, 'LC', 'Saint Lucia', 'XCD', '160922', 'ST', '662', '14.103245', '13.704778', '-60.874203', '-61.07415', 'Castries', 'North America', 'NA', '616.0', 'en-LC', 'LCA', 3576468, NULL, 1),
(129, 'LI', 'Liechtenstein', 'CHF', '35000', 'LS', '438', '47.273529', '47.055862', '9.632195', '9.477805', 'Vaduz', 'Europe', 'EU', '160.0', 'de-LI', 'LIE', 3042058, NULL, 1),
(130, 'LK', 'Sri Lanka', 'LKR', '21513990', 'CE', '144', '9.831361', '5.916833', '81.881279', '79.652916', 'Colombo', 'Asia', 'AS', '65610.0', 'si,ta,en', 'LKA', 1227603, NULL, 1),
(131, 'LR', 'Liberia', 'LRD', '3685076', 'LI', '430', '8.551791', '4.353057', '-7.365113', '-11.492083', 'Monrovia', 'Africa', 'AF', '111370.0', 'en-LR', 'LBR', 2275384, NULL, 1),
(132, 'LS', 'Lesotho', 'LSL', '1919552', 'LT', '426', '-28.572058', '-30.668964', '29.465761', '27.029068', 'Maseru', 'Africa', 'AF', '30355.0', 'en-LS,st,zu,xh', 'LSO', 932692, NULL, 1),
(133, 'LT', 'Lithuania', 'LTL', '3565000', 'LH', '440', '56.446918', '53.901306', '26.871944', '20.941528', 'Vilnius', 'Europe', 'EU', '65200.0', 'lt,ru,pl', 'LTU', 597427, NULL, 1),
(134, 'LU', 'Luxembourg', 'EUR', '497538', 'LU', '442', '50.184944', '49.446583', '6.528472', '5.734556', 'Luxembourg', 'Europe', 'EU', '2586.0', 'lb,de-LU,fr-LU', 'LUX', 2960313, NULL, 1),
(135, 'LV', 'Latvia', 'EUR', '2217969', 'LG', '428', '58.082306', '55.668861', '28.241167', '20.974277', 'Riga', 'Europe', 'EU', '64589.0', 'lv,ru,lt', 'LVA', 458258, NULL, 1),
(136, 'LY', 'Libya', 'LYD', '6461454', 'LY', '434', '33.168999', '19.508045', '25.150612', '9.38702', 'Tripoli', 'Africa', 'AF', '1759540.0', 'ar-LY,it,en', 'LBY', 2215636, NULL, 1),
(137, 'MA', 'Morocco', 'MAD', '31627428', 'MO', '504', '35.9224966985384', '27.662115', '-0.991750000000025', '-13.168586', 'Rabat', 'Africa', 'AF', '446550.0', 'ar-MA,fr', 'MAR', 2542007, NULL, 1),
(138, 'MC', 'Monaco', 'EUR', '32965', 'MN', '492', '43.75196717037228', '43.72472839869377', '7.439939260482788', '7.408962249755859', 'Monaco', 'Europe', 'EU', '1.95', 'fr-MC,en,it', 'MCO', 2993457, NULL, 1),
(139, 'MD', 'Moldova', 'MDL', '4324000', 'MD', '498', '48.490166', '45.468887', '30.135445', '26.618944', 'Chişinău', 'Europe', 'EU', '33843.0', 'ro,ru,gag,tr', 'MDA', 617790, NULL, 1),
(140, 'ME', 'Montenegro', 'EUR', '666730', 'MJ', '499', '43.570137', '41.850166', '20.358833', '18.461306', 'Podgorica', 'Europe', 'EU', '14026.0', 'sr,hu,bs,sq,hr,rom', 'MNE', 3194884, NULL, 1),
(141, 'MF', 'Saint Martin', 'EUR', '35925', 'RN', '663', '18.130354', '18.052231', '-63.012993', '-63.152767', 'Marigot', 'North America', 'NA', '53.0', 'fr', 'MAF', 3578421, NULL, 1),
(142, 'MG', 'Madagascar', 'MGA', '21281844', 'MA', '450', '-11.945433', '-25.608952', '50.48378', '43.224876', 'Antananarivo', 'Africa', 'AF', '587040.0', 'fr-MG,mg', 'MDG', 1062947, NULL, 1),
(143, 'MH', 'Marshall Islands', 'USD', '65859', 'RM', '584', '14.62', '5.587639', '171.931808', '165.524918', 'Majuro', 'Oceania', 'OC', '181.3', 'mh,en-MH', 'MHL', 2080185, NULL, 1),
(144, 'MK', 'Macedonia', 'MKD', '2062294', 'MK', '807', '42.361805', '40.860195', '23.038139', '20.464695', 'Skopje', 'Europe', 'EU', '25333.0', 'mk,sq,tr,rmm,sr', 'MKD', 718075, NULL, 1),
(145, 'ML', 'Mali', 'XOF', '13796354', 'ML', '466', '25.000002', '10.159513', '4.244968', '-12.242614', 'Bamako', 'Africa', 'AF', '1240000.0', 'fr-ML,bm', 'MLI', 2453866, NULL, 1),
(146, 'MM', 'Myanmar [Burma]', 'MMK', '53414374', 'BM', '104', '28.543249', '9.784583', '101.176781', '92.189278', 'Nay Pyi Taw', 'Asia', 'AS', '678500.0', 'my', 'MMR', 1327865, NULL, 1),
(147, 'MN', 'Mongolia', 'MNT', '3086918', 'MG', '496', '52.154251', '41.567638', '119.924309', '87.749664', 'Ulan Bator', 'Asia', 'AS', '1565000.0', 'mn,ru', 'MNG', 2029969, NULL, 1),
(148, 'MO', 'Macao', 'MOP', '449198', 'MC', '446', '22.222334', '22.180389', '113.565834', '113.528946', 'Macao', 'Asia', 'AS', '254.0', 'zh,zh-MO,pt', 'MAC', 1821275, NULL, 1),
(149, 'MP', 'Northern Mariana Islands', 'USD', '53883', 'CQ', '580', '20.55344', '14.11023', '146.06528', '144.88626', 'Saipan', 'Oceania', 'OC', '477.0', 'fil,tl,zh,ch-MP,en-MP', 'MNP', 4041468, NULL, 1),
(150, 'MQ', 'Martinique', 'EUR', '432900', 'MB', '474', '14.878819', '14.392262', '-60.81551', '-61.230118', 'Fort-de-France', 'North America', 'NA', '1100.0', 'fr-MQ', 'MTQ', 3570311, NULL, 1),
(151, 'MR', 'Mauritania', 'MRO', '3205060', 'MR', '478', '27.298073', '14.715547', '-4.827674', '-17.066521', 'Nouakchott', 'Africa', 'AF', '1030700.0', 'ar-MR,fuc,snk,fr,mey,wo', 'MRT', 2378080, NULL, 1),
(152, 'MS', 'Montserrat', 'XCD', '9341', 'MH', '500', '16.824060205313184', '16.674768935441556', '-62.144100129608205', '-62.24138237036129', 'Plymouth', 'North America', 'NA', '102.0', 'en-MS', 'MSR', 3578097, NULL, 1),
(153, 'MT', 'Malta', 'EUR', '403000', 'MT', '470', '36.079112527087844', '35.810276', '14.577639', '14.184376415657312', 'Valletta', 'Europe', 'EU', '316.0', 'mt,en-MT', 'MLT', 2562770, NULL, 1),
(154, 'MU', 'Mauritius', 'MUR', '1294104', 'MP', '480', '-10.319255', '-20.525717', '63.500179', '56.512718', 'Port Louis', 'Africa', 'AF', '2040.0', 'en-MU,bho,fr', 'MUS', 934292, NULL, 1),
(155, 'MV', 'Maldives', 'MVR', '395650', 'MV', '462', '7.091587495414767', '-0.692694', '73.637276', '72.693222', 'Malé', 'Asia', 'AS', '300.0', 'dv,en', 'MDV', 1282028, NULL, 1),
(156, 'MW', 'Malawi', 'MWK', '15447500', 'MI', '454', '-9.367541', '-17.125', '35.916821', '32.67395', 'Lilongwe', 'Africa', 'AF', '118480.0', 'ny,yao,tum,swk', 'MWI', 927384, NULL, 1),
(157, 'MX', 'Mexico', 'MXN', '112468855', 'MX', '484', '32.716759', '14.532866', '-86.703392', '-118.453949', 'Mexico City', 'North America', 'NA', '1972550.0', 'es-MX', 'MEX', 3996063, NULL, 1),
(158, 'MY', 'Malaysia', 'MYR', '28274729', 'MY', '458', '7.363417', '0.855222', '119.267502', '99.643448', 'Kuala Lumpur', 'Asia', 'AS', '329750.0', 'ms-MY,en,zh,ta,te,ml,pa,th', 'MYS', 1733045, NULL, 1),
(159, 'MZ', 'Mozambique', 'MZN', '22061451', 'MZ', '508', '-10.471883', '-26.868685', '40.842995', '30.217319', 'Maputo', 'Africa', 'AF', '801590.0', 'pt-MZ,vmw', 'MOZ', 1036973, NULL, 1),
(160, 'NA', 'Namibia', 'NAD', '2128471', 'WA', '516', '-16.959894', '-28.97143', '25.256701', '11.71563', 'Windhoek', 'Africa', 'AF', '825418.0', 'en-NA,af,de,hz,naq', 'NAM', 3355338, NULL, 1),
(161, 'NC', 'New Caledonia', 'XPF', '216494', 'NC', '540', '-19.549778', '-22.698', '168.129135', '163.564667', 'Noumea', 'Oceania', 'OC', '19060.0', 'fr-NC', 'NCL', 2139685, NULL, 1),
(162, 'NE', 'Niger', 'XOF', '15878271', 'NG', '562', '23.525026', '11.696975', '15.995643', '0.16625', 'Niamey', 'Africa', 'AF', '1267000.0', 'fr-NE,ha,kr,dje', 'NER', 2440476, NULL, 1),
(163, 'NF', 'Norfolk Island', 'AUD', '1828', 'NF', '574', '-28.995170686948427', '-29.063076742954735', '167.99773740209957', '167.91543230151365', 'Kingston', 'Oceania', 'OC', '34.6', 'en-NF', 'NFK', 2155115, NULL, 1),
(164, 'NG', 'Nigeria', 'NGN', '154000000', 'NI', '566', '13.892007', '4.277144', '14.680073', '2.668432', 'Abuja', 'Africa', 'AF', '923768.0', 'en-NG,ha,yo,ig,ff', 'NGA', 2328926, NULL, 1),
(165, 'NI', 'Nicaragua', 'NIO', '5995928', 'NU', '558', '15.025909', '10.707543', '-82.738289', '-87.690308', 'Managua', 'North America', 'NA', '129494.0', 'es-NI,en', 'NIC', 3617476, NULL, 1),
(166, 'NL', 'Netherlands', 'EUR', '16645000', 'NL', '528', '53.512196', '50.753918', '7.227944', '3.362556', 'Amsterdam', 'Europe', 'EU', '41526.0', 'nl-NL,fy-NL', 'NLD', 2750405, NULL, 1),
(167, 'NO', 'Norway', 'NOK', '5009150', 'NO', '578', '71.18811', '57.977917', '31.078052520751953', '4.650167', 'Oslo', 'Europe', 'EU', '324220.0', 'no,nb,nn,se,fi', 'NOR', 3144096, NULL, 1),
(168, 'NP', 'Nepal', 'NPR', '28951852', 'NP', '524', '30.43339', '26.356722', '88.199333', '80.056274', 'Kathmandu', 'Asia', 'AS', '140800.0', 'ne,en', 'NPL', 1282988, NULL, 1),
(169, 'NR', 'Nauru', 'AUD', '10065', 'NR', '520', '-0.504306', '-0.552333', '166.945282', '166.899033', '', 'Oceania', 'OC', '21.0', 'na,en-NR', 'NRU', 2110425, NULL, 1),
(170, 'NU', 'Niue', 'NZD', '2166', 'NE', '570', '-18.951069', '-19.152193', '-169.775177', '-169.951004', 'Alofi', 'Oceania', 'OC', '260.0', 'niu,en-NU', 'NIU', 4036232, NULL, 1),
(171, 'NZ', 'New Zealand', 'NZD', '4252277', 'NZ', '554', '-34.389668', '-47.286026', '-180', '166.7155', 'Wellington', 'Oceania', 'OC', '268680.0', 'en-NZ,mi', 'NZL', 2186224, NULL, 1),
(172, 'OM', 'Oman', 'OMR', '2967717', 'MU', '512', '26.387972', '16.64575', '59.836582', '51.882', 'Muscat', 'Asia', 'AS', '212460.0', 'ar-OM,en,bal,ur', 'OMN', 286963, NULL, 1),
(173, 'PA', 'Panama', 'PAB', '3410676', 'PM', '591', '9.637514', '7.197906', '-77.17411', '-83.051445', 'Panama City', 'North America', 'NA', '78200.0', 'es-PA,en', 'PAN', 3703430, NULL, 1),
(174, 'PE', 'Peru', 'PEN', '29907003', 'PE', '604', '-0.012977', '-18.349728', '-68.677986', '-81.326744', 'Lima', 'South America', 'SA', '1285220.0', 'es-PE,qu,ay', 'PER', 3932488, NULL, 1),
(175, 'PF', 'French Polynesia', 'XPF', '270485', 'FP', '258', '-7.903573', '-27.653572', '-134.929825', '-152.877167', 'Papeete', 'Oceania', 'OC', '4167.0', 'fr-PF,ty', 'PYF', 4030656, NULL, 1),
(176, 'PG', 'Papua New Guinea', 'PGK', '6064515', 'PP', '598', '-1.318639', '-11.657861', '155.96344', '140.842865', 'Port Moresby', 'Oceania', 'OC', '462840.0', 'en-PG,ho,meu,tpi', 'PNG', 2088628, NULL, 1),
(177, 'PH', 'Philippines', 'PHP', '99900177', 'RP', '608', '21.120611', '4.643306', '126.601524', '116.931557', 'Manila', 'Asia', 'AS', '300000.0', 'tl,en-PH,fil', 'PHL', 1694008, NULL, 1),
(178, 'PK', 'Pakistan', 'PKR', '184404791', 'PK', '586', '37.097', '23.786722', '77.840919', '60.878613', 'Islamabad', 'Asia', 'AS', '803940.0', 'ur-PK,en-PK,pa,sd,ps,brh', 'PAK', 1168579, NULL, 1),
(179, 'PL', 'Poland', 'PLN', '38500000', 'PL', '616', '54.839138', '49.006363', '24.150749', '14.123', 'Warsaw', 'Europe', 'EU', '312685.0', 'pl', 'POL', 798544, NULL, 1),
(180, 'PM', 'Saint Pierre and Miquelon', 'EUR', '7012', 'SB', '666', '47.146286', '46.786041', '-56.252991', '-56.420658', 'Saint-Pierre', 'North America', 'NA', '242.0', 'fr-PM', 'SPM', 3424932, NULL, 1),
(181, 'PN', 'Pitcairn Islands', 'NZD', '46', 'PC', '612', '-24.315865', '-24.672565', '-124.77285', '-128.346436', 'Adamstown', 'Oceania', 'OC', '47.0', 'en-PN', 'PCN', 4030699, NULL, 1),
(182, 'PR', 'Puerto Rico', 'USD', '3916632', 'RQ', '630', '18.520166', '17.926405', '-65.242737', '-67.942726', 'San Juan', 'North America', 'NA', '9104.0', 'en-PR,es-PR', 'PRI', 4566966, NULL, 1),
(183, 'PS', 'Palestine', 'ILS', '3800000', 'WE', '275', '32.54638671875', '31.216541290283203', '35.5732955932617', '34.21665954589844', '', 'Asia', 'AS', '5970.0', 'ar-PS', 'PSE', 6254930, NULL, 1),
(184, 'PT', 'Portugal', 'EUR', '10676000', 'PO', '620', '42.145638', '36.96125', '-6.182694', '-9.495944', 'Lisbon', 'Europe', 'EU', '92391.0', 'pt-PT,mwl', 'PRT', 2264397, NULL, 1),
(185, 'PW', 'Palau', 'USD', '19907', 'PS', '585', '8.46966', '2.8036', '134.72307', '131.11788', 'Melekeok - Palau State Capital', 'Oceania', 'OC', '458.0', 'pau,sov,en-PW,tox,ja,fil,zh', 'PLW', 1559582, NULL, 1),
(186, 'PY', 'Paraguay', 'PYG', '6375830', 'PA', '600', '-19.294041', '-27.608738', '-54.259354', '-62.647076', 'Asunción', 'South America', 'SA', '406750.0', 'es-PY,gn', 'PRY', 3437598, NULL, 1),
(187, 'QA', 'Qatar', 'QAR', '840926', 'QA', '634', '26.154722', '24.482944', '51.636639', '50.757221', 'Doha', 'Asia', 'AS', '11437.0', 'ar-QA,es', 'QAT', 289688, NULL, 1),
(188, 'RE', 'Réunion', 'EUR', '776948', 'RE', '638', '-20.868391324576944', '-21.383747301469107', '55.838193901930026', '55.21219224792685', 'Saint-Denis', 'Africa', 'AF', '2517.0', 'fr-RE', 'REU', 935317, NULL, 1),
(189, 'RO', 'Romania', 'RON', '21959278', 'RO', '642', '48.266945', '43.627304', '29.691055', '20.269972', 'Bucharest', 'Europe', 'EU', '237500.0', 'ro,hu,rom', 'ROU', 798549, NULL, 1),
(190, 'RS', 'Serbia', 'RSD', '7344847', 'RI', '688', '46.18138885498047', '42.232215881347656', '23.00499725341797', '18.817020416259766', 'Belgrade', 'Europe', 'EU', '88361.0', 'sr,hu,bs,rom', 'SRB', 6290252, NULL, 1),
(191, 'RU', 'Russia', 'RUB', '140702000', 'RS', '643', '81.857361', '41.188862', '-169.05', '19.25', 'Moscow', 'Europe', 'EU', '1.71E7', 'ru,tt,xal,cau,ady,kv,ce,tyv,cv', 'RUS', 2017370, NULL, 1),
(192, 'RW', 'Rwanda', 'RWF', '11055976', 'RW', '646', '-1.053481', '-2.840679', '30.895958', '28.856794', 'Kigali', 'Africa', 'AF', '26338.0', 'rw,en-RW,fr-RW,sw', 'RWA', 49518, NULL, 1),
(193, 'SA', 'Saudi Arabia', 'SAR', '25731776', 'SA', '682', '32.158333', '15.61425', '55.666584', '34.495693', 'Riyadh', 'Asia', 'AS', '1960582.0', 'ar-SA', 'SAU', 102358, NULL, 1),
(194, 'SB', 'Solomon Islands', 'SBD', '559198', 'BP', '090', '-6.589611', '-11.850555', '166.980865', '155.508606', 'Honiara', 'Oceania', 'OC', '28450.0', 'en-SB,tpi', 'SLB', 2103350, NULL, 1),
(195, 'SC', 'Seychelles', 'SCR', '88340', 'SE', '690', '-4.283717', '-9.753867', '56.279507', '46.204769', 'Victoria', 'Africa', 'AF', '455.0', 'en-SC,fr-SC', 'SYC', 241170, NULL, 1),
(196, 'SD', 'Sudan', 'SDG', '35000000', 'SU', '729', '22.232219696044922', '8.684720993041992', '38.60749816894531', '21.827774047851562', 'Khartoum', 'Africa', 'AF', '1861484.0', 'ar-SD,en,fia', 'SDN', 366755, NULL, 1),
(197, 'SE', 'Sweden', 'SEK', '9555893', 'SW', '752', '69.0625', '55.337112', '24.156292483918484', '11.118694', 'Stockholm', 'Europe', 'EU', '449964.0', 'sv-SE,se,sma,fi-SE', 'SWE', 2661886, NULL, 1),
(198, 'SG', 'Singapore', 'SGD', '4701069', 'SN', '702', '1.471278', '1.258556', '104.007469', '103.638275', 'Singapore', 'Asia', 'AS', '692.7', 'cmn,en-SG,ms-SG,ta-SG,zh-SG', 'SGP', 1880251, NULL, 1),
(199, 'SH', 'Saint Helena', 'SHP', '7460', 'SH', '654', '-7.887815', '-16.019543', '-5.638753', '-14.42123', 'Jamestown', 'Africa', 'AF', '410.0', 'en-SH', 'SHN', 3370751, NULL, 1),
(200, 'SI', 'Slovenia', 'EUR', '2007000', 'SI', '705', '46.8766275518195', '45.421812998164', '16.6106311807', '13.3753342064709', 'Ljubljana', 'Europe', 'EU', '20273.0', 'sl,sh', 'SVN', 3190538, NULL, 1),
(201, 'SJ', 'Svalbard and Jan Mayen', 'NOK', '2550', 'SV', '744', '80.762085', '79.220306', '33.287334', '17.699389', 'Longyearbyen', 'Europe', 'EU', '62049.0', 'no,ru', 'SJM', 607072, NULL, 1),
(202, 'SK', 'Slovakia', 'EUR', '5455000', 'LO', '703', '49.603168', '47.728111', '22.570444', '16.84775', 'Bratislava', 'Europe', 'EU', '48845.0', 'sk,hu', 'SVK', 3057568, NULL, 1),
(203, 'SL', 'Sierra Leone', 'SLL', '5245695', 'SL', '694', '10', '6.929611', '-10.284238', '-13.307631', 'Freetown', 'Africa', 'AF', '71740.0', 'en-SL,men,tem', 'SLE', 2403846, NULL, 1),
(204, 'SM', 'San Marino', 'EUR', '31477', 'SM', '674', '43.99223730851663', '43.8937092171425', '12.51653186779788', '12.403538978820734', 'San Marino', 'Europe', 'EU', '61.2', 'it-SM', 'SMR', 3168068, NULL, 1),
(205, 'SN', 'Senegal', 'XOF', '12323252', 'SG', '686', '16.691633', '12.307275', '-11.355887', '-17.535236', 'Dakar', 'Africa', 'AF', '196190.0', 'fr-SN,wo,fuc,mnk', 'SEN', 2245662, NULL, 1),
(206, 'SO', 'Somalia', 'SOS', '10112453', 'SO', '706', '11.979166', '-1.674868', '51.412636', '40.986595', 'Mogadishu', 'Africa', 'AF', '637657.0', 'so-SO,ar-SO,it,en-SO', 'SOM', 51537, NULL, 1),
(207, 'SR', 'Suriname', 'SRD', '492829', 'NS', '740', '6.004546', '1.831145', '-53.977493', '-58.086563', 'Paramaribo', 'South America', 'SA', '163270.0', 'nl-SR,en,srn,hns,jv', 'SUR', 3382998, NULL, 1),
(208, 'SS', 'South Sudan', 'SSP', '8260490', 'OD', '728', '12.219148635864258', '3.493394374847412', '35.9405517578125', '24.140274047851562', 'Juba', 'Africa', 'AF', '644329.0', 'en', 'SSD', 7909807, NULL, 1),
(209, 'ST', 'São Tomé and Príncipe', 'STD', '175808', 'TP', '678', '1.701323', '0.024766', '7.466374', '6.47017', 'São Tomé', 'Africa', 'AF', '1001.0', 'pt-ST', 'STP', 2410758, NULL, 1),
(210, 'SV', 'El Salvador', 'USD', '6052064', 'ES', '222', '14.445067', '13.148679', '-87.692162', '-90.128662', 'San Salvador', 'North America', 'NA', '21040.0', 'es-SV', 'SLV', 3585968, NULL, 1),
(211, 'SX', 'Sint Maarten', 'ANG', '37429', 'NN', '534', '18.070248', '18.011692', '-63.012993', '-63.144039', 'Philipsburg', 'North America', 'NA', '', 'nl,en', 'SXM', 7609695, NULL, 1),
(212, 'SY', 'Syria', 'SYP', '22198110', 'SY', '760', '37.319138', '32.310665', '42.385029', '35.727222', 'Damascus', 'Asia', 'AS', '185180.0', 'ar-SY,ku,hy,arc,fr,en', 'SYR', 163843, NULL, 1),
(213, 'SZ', 'Swaziland', 'SZL', '1354051', 'WZ', '748', '-25.719648', '-27.317101', '32.13726', '30.794107', 'Mbabane', 'Africa', 'AF', '17363.0', 'en-SZ,ss-SZ', 'SWZ', 934841, NULL, 1),
(214, 'TC', 'Turks and Caicos Islands', 'USD', '20556', 'TK', '796', '21.961878', '21.422626', '-71.123642', '-72.483871', 'Cockburn Town', 'North America', 'NA', '430.0', 'en-TC', 'TCA', 3576916, NULL, 1),
(215, 'TD', 'Chad', 'XAF', '10543464', 'CD', '148', '23.450369', '7.441068', '24.002661', '13.473475', 'N\'Djamena', 'Africa', 'AF', '1284000.0', 'fr-TD,ar-TD,sre', 'TCD', 2434508, NULL, 1),
(216, 'TF', 'French Southern Territories', 'EUR', '140', 'FS', '260', '-37.790722', '-49.735184', '77.598808', '50.170258', 'Port-aux-Français', 'Antarctica', 'AN', '7829.0', 'fr', 'ATF', 1546748, NULL, 1),
(217, 'TG', 'Togo', 'XOF', '6587239', 'TO', '768', '11.138977', '6.104417', '1.806693', '-0.147324', 'Lomé', 'Africa', 'AF', '56785.0', 'fr-TG,ee,hna,kbp,dag,ha', 'TGO', 2363686, NULL, 1),
(218, 'TH', 'Thailand', 'THB', '67089500', 'TH', '764', '20.463194', '5.61', '105.639389', '97.345642', 'Bangkok', 'Asia', 'AS', '514000.0', 'th,en', 'THA', 1605651, NULL, 1),
(219, 'TJ', 'Tajikistan', 'TJS', '7487489', 'TI', '762', '41.042252', '36.674137', '75.137222', '67.387138', 'Dushanbe', 'Asia', 'AS', '143100.0', 'tg,ru', 'TJK', 1220409, NULL, 1),
(220, 'TK', 'Tokelau', 'NZD', '1466', 'TL', '772', '-8.553613662719727', '-9.381111145019531', '-171.21142578125', '-172.50033569335938', '', 'Oceania', 'OC', '10.0', 'tkl,en-TK', 'TKL', 4031074, NULL, 1),
(221, 'TL', 'East Timor', 'USD', '1154625', 'TT', '626', '-8.135833740234375', '-9.463626861572266', '127.30859375', '124.04609680175781', 'Dili', 'Oceania', 'OC', '15007.0', 'tet,pt-TL,id,en', 'TLS', 1966436, NULL, 1),
(222, 'TM', 'Turkmenistan', 'TMT', '4940916', 'TX', '795', '42.795555', '35.141083', '66.684303', '52.441444', 'Ashgabat', 'Asia', 'AS', '488100.0', 'tk,ru,uz', 'TKM', 1218197, NULL, 1),
(223, 'TN', 'Tunisia', 'TND', '10589025', 'TS', '788', '37.543915', '30.240417', '11.598278', '7.524833', 'Tunis', 'Africa', 'AF', '163610.0', 'ar-TN,fr', 'TUN', 2464461, NULL, 1),
(224, 'TO', 'Tonga', 'TOP', '122580', 'TN', '776', '-15.562988', '-21.455057', '-173.907578', '-175.682266', 'Nuku\'alofa', 'Oceania', 'OC', '748.0', 'to,en-TO', 'TON', 4032283, NULL, 1),
(225, 'TR', 'Turkey', 'TRY', '77804122', 'TU', '792', '42.107613', '35.815418', '44.834999', '25.668501', 'Ankara', 'Asia', 'AS', '780580.0', 'tr-TR,ku,diq,az,av', 'TUR', 298795, NULL, 1),
(226, 'TT', 'Trinidad and Tobago', 'TTD', '1228691', 'TD', '780', '11.338342', '10.036105', '-60.517933', '-61.923771', 'Port of Spain', 'North America', 'NA', '5128.0', 'en-TT,hns,fr,es,zh', 'TTO', 3573591, NULL, 1),
(227, 'TV', 'Tuvalu', 'AUD', '10472', 'TV', '798', '-5.641972', '-10.801169', '179.863281', '176.064865', 'Funafuti', 'Oceania', 'OC', '26.0', 'tvl,en,sm,gil', 'TUV', 2110297, NULL, 1),
(228, 'TW', 'Taiwan', 'TWD', '22894384', 'TW', '158', '25.29825', '21.901806', '122.000443', '119.534691', 'Taipei', 'Asia', 'AS', '35980.0', 'zh-TW,zh,nan,hak', 'TWN', 1668284, NULL, 1),
(229, 'TZ', 'Tanzania', 'TZS', '41892895', 'TZ', '834', '-0.990736', '-11.745696', '40.443222', '29.327168', 'Dodoma', 'Africa', 'AF', '945087.0', 'sw-TZ,en,ar', 'TZA', 149590, NULL, 1),
(230, 'UA', 'Ukraine', 'UAH', '45415596', 'UP', '804', '52.369362', '44.390415', '40.20739', '22.128889', 'Kyiv', 'Europe', 'EU', '603700.0', 'uk,ru-UA,rom,pl,hu', 'UKR', 690791, NULL, 1),
(231, 'UG', 'Uganda', 'UGX', '33398682', 'UG', '800', '4.214427', '-1.48405', '35.036049', '29.573252', 'Kampala', 'Africa', 'AF', '236040.0', 'en-UG,lg,sw,ar', 'UGA', 226074, NULL, 1),
(232, 'UM', 'U.S. Minor Outlying Islands', 'USD', '0', '', '581', '28.219814', '-0.389006', '166.654526', '-177.392029', '', 'Oceania', 'OC', '0.0', 'en-UM', 'UMI', 5854968, NULL, 1),
(233, 'US', 'United States', 'USD', '310232863', 'US', '840', '49.388611', '24.544245', '-66.954811', '-124.733253', 'Washington', 'North America', 'NA', '9629091.0', 'en-US,es-US,haw,fr', 'USA', 6252001, NULL, 1),
(234, 'UY', 'Uruguay', 'UYU', '3477000', 'UY', '858', '-30.082224', '-34.980816', '-53.073933', '-58.442722', 'Montevideo', 'South America', 'SA', '176220.0', 'es-UY', 'URY', 3439705, NULL, 1),
(235, 'UZ', 'Uzbekistan', 'UZS', '27865738', 'UZ', '860', '45.575001', '37.184444', '73.132278', '55.996639', 'Tashkent', 'Asia', 'AS', '447400.0', 'uz,ru,tg', 'UZB', 1512440, NULL, 1),
(236, 'VA', 'Vatican City', 'EUR', '921', 'VT', '336', '41.90743830885576', '41.90027960306854', '12.45837546629481', '12.44570678169205', 'Vatican', 'Europe', 'EU', '0.44', 'la,it,fr', 'VAT', 3164670, NULL, 1),
(237, 'VC', 'Saint Vincent and the Grenadines', 'XCD', '104217', 'VC', '670', '13.377834', '12.583984810969037', '-61.11388', '-61.46090317727658', 'Kingstown', 'North America', 'NA', '389.0', 'en-VC,fr', 'VCT', 3577815, NULL, 1),
(238, 'VE', 'Venezuela', 'VEF', '27223228', 'VE', '862', '12.201903', '0.626311', '-59.80378', '-73.354073', 'Caracas', 'South America', 'SA', '912050.0', 'es-VE', 'VEN', 3625428, NULL, 1),
(239, 'VG', 'British Virgin Islands', 'USD', '21730', 'VI', '092', '18.757221', '18.383710898211305', '-64.268768', '-64.71312752730364', 'Road Town', 'North America', 'NA', '153.0', 'en-VG', 'VGB', 3577718, NULL, 1),
(240, 'VI', 'U.S. Virgin Islands', 'USD', '108708', 'VQ', '850', '18.391747', '17.681725', '-64.565178', '-65.038231', 'Charlotte Amalie', 'North America', 'NA', '352.0', 'en-VI', 'VIR', 4796775, NULL, 1),
(241, 'VN', 'Vietnam', 'VND', '89571130', 'VM', '704', '23.388834', '8.559611', '109.464638', '102.148224', 'Hanoi', 'Asia', 'AS', '329560.0', 'vi,en,fr,zh,km', 'VNM', 1562822, NULL, 1),
(242, 'VU', 'Vanuatu', 'VUV', '221552', 'NH', '548', '-13.073444', '-20.248945', '169.904785', '166.524979', 'Port Vila', 'Oceania', 'OC', '12200.0', 'bi,en-VU,fr-VU', 'VUT', 2134431, NULL, 1),
(243, 'WF', 'Wallis and Futuna', 'XPF', '16025', 'WF', '876', '-13.216758181061444', '-14.314559989820843', '-176.16174317718253', '-178.1848112896414', 'Mata-Utu', 'Oceania', 'OC', '274.0', 'wls,fud,fr-WF', 'WLF', 4034749, NULL, 1),
(244, 'WS', 'Samoa', 'WST', '192001', 'WS', '882', '-13.432207', '-14.040939', '-171.415741', '-172.798599', 'Apia', 'Oceania', 'OC', '2944.0', 'sm,en-WS', 'WSM', 4034894, NULL, 1),
(245, 'XK', 'Kosovo', 'EUR', '1800000', 'KV', '0', '43.2682495807952', '41.856369601859925', '21.80335088694943', '19.977481504492914', 'Pristina', 'Europe', 'EU', '', 'sq,sr', 'XKX', 831053, NULL, 1),
(246, 'YE', 'Yemen', 'YER', '23495361', 'YM', '887', '18.9999989031009', '12.1110910264462', '54.5305388163283', '42.5325394314234', 'Sanaa', 'Asia', 'AS', '527970.0', 'ar-YE', 'YEM', 69543, NULL, 1),
(247, 'YT', 'Mayotte', 'EUR', '159042', 'MF', '175', '-12.648891', '-13.000132', '45.29295', '45.03796', 'Mamoutzou', 'Africa', 'AF', '374.0', 'fr-YT', 'MYT', 1024031, NULL, 1),
(248, 'ZA', 'South Africa', 'ZAR', '49000000', 'SF', '710', '-22.126612', '-34.839828', '32.895973', '16.458021', 'Pretoria', 'Africa', 'AF', '1219912.0', 'zu,xh,af,nso,en-ZA,tn,st,ts,ss', 'ZAF', 953987, NULL, 1),
(249, 'ZM', 'Zambia', 'ZMK', '13460305', 'ZA', '894', '-8.22436', '-18.079473', '33.705704', '21.999371', 'Lusaka', 'Africa', 'AF', '752614.0', 'en-ZM,bem,loz,lun,lue,ny,toi', 'ZMB', 895949, NULL, 1),
(250, 'ZW', 'Zimbabwe', 'ZWL', '11651858', 'ZI', '716', '-15.608835', '-22.417738', '33.056305', '25.237028', 'Harare', 'Africa', 'AF', '390580.0', 'en-ZW,sn,nr,nd', 'ZWE', 878675, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `language` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `publish` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `language`, `publish`, `created_at`, `updated_at`) VALUES
(1, 'Vietnam', 'vn', 1, NULL, NULL),
(2, 'France', 'fr', 1, NULL, NULL),
(3, 'Japan', 'jp', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `map_tags`
--

CREATE TABLE `map_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `article_id` int(11) NOT NULL,
  `tags_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `map_tags`
--

INSERT INTO `map_tags` (`id`, `article_id`, `tags_id`, `created_at`, `updated_at`) VALUES
(2, 2, 2, '2016-08-31 23:30:23', '2016-08-31 23:30:23');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL DEFAULT '0',
  `article_id` int(11) NOT NULL DEFAULT '0',
  `banner_id` int(11) NOT NULL DEFAULT '0',
  `block_id` int(11) NOT NULL DEFAULT '0',
  `images` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `category_id`, `article_id`, `banner_id`, `block_id`, `images`, `type`) VALUES
(20, 0, 4, 0, 0, 'public/media/img-ourculture-1473921309.png', 'article'),
(21, 0, 4, 0, 0, 'public/media/img-ourculture3-1473921309.jpg', 'article'),
(22, 0, 4, 0, 0, 'public/media/img-ourculture4-1473921309.jpg', 'article');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `order_by` int(11) NOT NULL DEFAULT '0',
  `publish` int(11) NOT NULL DEFAULT '1',
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `keywords` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `slug`, `parent_id`, `order_by`, `publish`, `title`, `description`, `keywords`) VALUES
(1, 'Portfolio', 'portfolio', 0, 0, 1, NULL, NULL, NULL),
(2, 'Web', 'web', 1, 1, 1, NULL, NULL, NULL),
(3, 'Print', 'print', 1, 2, 1, NULL, NULL, NULL),
(4, 'App', 'app', 1, 0, 1, NULL, NULL, NULL),
(5, 'Brand', 'brand', 1, 0, 1, NULL, NULL, NULL),
(6, 'Home', 'home', 0, 0, 1, NULL, NULL, NULL),
(7, 'Team', 'team', 0, 0, 1, NULL, NULL, NULL),
(8, 'Member', 'member', 7, 0, 1, NULL, NULL, NULL),
(9, 'Position', 'position', 7, 0, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_08_26_032357_create_languages_table', 1),
('2016_08_26_032840_create_countries_table', 1),
('2016_08_26_040349_create_contact_table', 1),
('2016_08_26_081005_create_menus_table', 1),
('2016_08_26_081147_create_categories_table', 1),
('2016_08_27_041831_create_articles_table', 1),
('2016_08_27_041905_create_banners_table', 1),
('2016_08_27_041923_create_blocks_table', 1),
('2016_08_27_042013_create_contents_table', 1),
('2016_08_27_043234_create_setting_table', 1),
('2016_08_30_021730_create_media_table', 1),
('2016_08_31_093920_create_tags_table', 1),
('2016_08_31_094529_create_map_tags_table', 1),
('2016_09_05_082131_create_category_products_table', 2),
('2016_09_05_082149_create_products_table', 2),
('2016_09_05_082206_create_orders_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_id` int(10) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL DEFAULT '0',
  `unit_cost` int(11) NOT NULL DEFAULT '0',
  `price` int(11) NOT NULL DEFAULT '0',
  `publish` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `images` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `content` longtext COLLATE utf8_unicode_ci,
  `price` int(11) DEFAULT NULL,
  `sale` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `condition` int(11) NOT NULL DEFAULT '0',
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `publish` int(11) NOT NULL,
  `featured` int(11) NOT NULL,
  `order_by` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci,
  `descriptions` text COLLATE utf8_unicode_ci,
  `keywords` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `language` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `keywords` text COLLATE utf8_unicode_ci,
  `lng` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` text COLLATE utf8_unicode_ci,
  `email` text COLLATE utf8_unicode_ci,
  `address` text COLLATE utf8_unicode_ci,
  `facebook_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `google_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `images` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `title`, `language`, `name`, `description`, `keywords`, `lng`, `lat`, `phone`, `email`, `address`, `facebook_url`, `google_url`, `twitter_url`, `images`) VALUES
(1, 'Bo Cong Anh Studio', NULL, 'Bo Cong Anh Studio', 'Dịch vụ thiết kế, phát triển & lập trình website chuyên nghiệp. Tiêu chuẩn quốc tế với am hiểu về thị trường địa phương, kinh nghiệm làm việc với nhiều công ty quốc tế.', 'Web, Graphic, Web design, Graphic design, logo, namecard, poster, prosure, Thiết kế web chuyên nghiệp, thiết kế, thiết kế danh thiếp', '106.71778133254088', '10.793120949474691', '+84 8 62585605', 'admin@studioboconganh.com', 'The Manor 2<br>G07, 91 Nguyen Huu Canh Street<br>Binh Thanh District, HCMC, Vietnam ', 'https://www.facebook.com/StudioBCA', '', '', 'public/media/logo-1473238796.png');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'krowdpop', 'krowdpop', '2016-08-31 23:18:21', '2016-08-31 23:18:21'),
(2, 'home', 'home', '2016-08-31 23:30:23', '2016-08-31 23:30:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL DEFAULT '2',
  `active` int(11) NOT NULL DEFAULT '0',
  `firstname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `type`, `active`, `firstname`, `lastname`, `active_token`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sơn Bùi Long Kỳ', 'builongkyson@gmail.com', '$2y$10$bT.H4AqAturpkikfdzBwSuiAWOl9TsrvjDik8UuICDwr1znCbORpG', 1, 1, 'Ky Son', 'Bui Long', '1vDhC0uMgVZldhyoe6rVcYvImpTW7eO5SWhrgBvy9ZI3Zn9fhvXotBppGxJv', 'NIALij6ANFNjrRGx5kfMZz6Ftg22LeVac11wj9ypMuNrhfmYlfCMSkeUB29p', '2016-08-31 23:13:34', '2016-09-09 14:36:10'),
(2, 'Loc Vu Xuan', 'loc@studioboconganh.com', '$2y$10$1owpVKASsKaZhbk5FrXZZ./g4OmyPWIfwWaJHNQVkj5PV3jzu0kCq', 1, 1, 'Loc', 'Vu Xuan', 'p1I6dzBeRgJRJb52htdz8NHx58GJzC7tN8mZFgQV3jvemZKrKTlnuNCYo3hD', 'bDppC0xfGKV3ruSnQ3ANPiLndv5KhLD3zgXhAtMHukh4gWgoYu3nao4VnFvl', '2016-09-06 13:24:38', '2016-09-06 13:29:47'),
(3, 'Admin', 'vi@studioboconganh.com', '$2y$10$0mc.WWwvlzlb/1lJDUp/1uq9S1fBEIMMWlmAUc.EGlUPBF6POlP9m', 1, 1, 'Admin', '', 'ZWDzUDnoHCGhwQLApIlWF428zqCrdf1r682lqRRVZUZO6sggaXrdiInnpPfm', 'I0UccH3q4O7IaL5CiitJ6XN9ZN4qRelAEqbiZaPmL3AujaMrTpHbLCWW6Lzd', '2016-09-09 14:32:09', '2016-09-09 14:36:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articles_category_id_index` (`category_id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `banners_category_id_index` (`category_id`);

--
-- Indexes for table `blocks`
--
ALTER TABLE `blocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blocks_menu_id_index` (`menu_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_menu_id_index` (`menu_id`);

--
-- Indexes for table `category_products`
--
ALTER TABLE `category_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contents_category_id_index` (`category_id`),
  ADD KEY `contents_article_id_index` (`article_id`),
  ADD KEY `contents_banner_id_index` (`banner_id`),
  ADD KEY `contents_block_id_index` (`block_id`),
  ADD KEY `contents_setting_id_index` (`setting_id`),
  ADD KEY `contents_menu_id_index` (`menu_id`),
  ADD KEY `contents_language_id_index` (`language_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `map_tags`
--
ALTER TABLE `map_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `map_tags_article_id_tags_id_index` (`article_id`,`tags_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_category_id_index` (`category_id`),
  ADD KEY `media_article_id_index` (`article_id`),
  ADD KEY `media_banner_id_index` (`banner_id`),
  ADD KEY `media_block_id_index` (`block_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_product_id_index` (`product_id`),
  ADD KEY `orders_user_id_index` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_index` (`category_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `blocks`
--
ALTER TABLE `blocks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `category_products`
--
ALTER TABLE `category_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;
--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `map_tags`
--
ALTER TABLE `map_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `menus` (`id`);

--
-- Constraints for table `banners`
--
ALTER TABLE `banners`
  ADD CONSTRAINT `banners_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `menus` (`id`);

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category_products` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
