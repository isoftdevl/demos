-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2021 at 04:46 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `change_update`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `access` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `username`, `email_verified_at`, `image`, `access`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin@site.com', 'admin', NULL, '5ff1c3531ed3f1609679699.jpg', NULL, '$2y$10$Z7ifEDvfu5QNI0HpDI1EeuxtokN0BBrQ75jariAYOFGuwKZ2w0iOO', NULL, '2021-01-04 03:57:14');

-- --------------------------------------------------------

--
-- Table structure for table `admin_password_resets`
--

CREATE TABLE `admin_password_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `frontend_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `commission_logs`
--

CREATE TABLE `commission_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `who` bigint(20) UNSIGNED NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(28,8) NOT NULL,
  `main_amo` decimal(28,8) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trx` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cur_sym` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sell_at` decimal(28,8) NOT NULL,
  `buy_at` decimal(28,8) NOT NULL,
  `fixed_charge` decimal(28,8) NOT NULL,
  `percent_charge` decimal(28,8) NOT NULL,
  `reserve` decimal(28,8) NOT NULL,
  `min_exchange` decimal(28,8) NOT NULL,
  `max_exchange` decimal(28,8) NOT NULL,
  `receving_details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_input` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `available_for_sell` tinyint(1) NOT NULL,
  `available_for_buy` tinyint(1) NOT NULL,
  `show_rate` tinyint(1) NOT NULL,
  `payment_type_sell` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 = manual, 1= autometic',
  `payment_type_buy` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 = manual, 1= autometic',
  `user_proof` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `exchange_id` bigint(20) UNSIGNED NOT NULL,
  `method_code` int(10) UNSIGNED NOT NULL,
  `amount` decimal(18,8) NOT NULL,
  `method_currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `charge` decimal(18,8) NOT NULL,
  `rate` decimal(18,8) NOT NULL,
  `final_amo` decimal(18,8) DEFAULT 0.00000000,
  `send_currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btc_amo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btc_wallet` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trx` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `try` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=>success, 2=>pending, 3=>cancel',
  `admin_feedback` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_sms_templates`
--

CREATE TABLE `email_sms_templates` (
  `id` int(10) UNSIGNED NOT NULL,
  `act` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subj` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shortcodes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_status` tinyint(4) NOT NULL DEFAULT 1,
  `sms_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_sms_templates`
--

INSERT INTO `email_sms_templates` (`id`, `act`, `name`, `subj`, `email_body`, `sms_body`, `shortcodes`, `email_status`, `sms_status`, `created_at`, `updated_at`) VALUES
(1, 'PASS_RESET_CODE', 'Password Reset', 'Password Reset', '<div>We have received a request to reset the password for your account on <b>{{time}} .<br></b></div><div>Requested From IP: <b>{{ip}}</b> using <b>{{browser}}</b> on <b>{{operating_system}} </b>.</div><div><br></div><br><div><div><div>Your account recovery code is:&nbsp;&nbsp; <font size=\"6\"><b>{{code}}</b></font></div><div><br></div></div></div><div><br></div><div><font size=\"4\" color=\"#CC0000\">If you do not wish to reset your password, please disregard this message.&nbsp;</font><br></div><br>', 'Your account recovery code is: {{code}}', ' {\"code\":\"Password Reset Code\",\"ip\":\"IP of User\",\"browser\":\"Browser of User\",\"operating_system\":\"Operating System of User\",\"time\":\"Request Time\"}', 1, 1, '2019-09-24 23:04:05', '2020-07-07 05:44:08'),
(2, 'PASS_RESET_DONE', 'Password Reset Confirmation', 'You have Reset your password', '<div><p>\r\n    You have successfully reset your password.</p><p>You changed from&nbsp; IP: <b>{{ip}}</b> using <b>{{browser}}</b> on <b>{{operating_system}}&nbsp;</b> on <b>{{time}}</b></p><p><b><br></b></p><p><font color=\"#FF0000\"><b>If you did not changed that, Please contact with us as soon as possible.</b></font><br></p></div>', 'Your password has been changed successfully', '{\"ip\":\"IP of User\",\"browser\":\"Browser of User\",\"operating_system\":\"Operating System of User\",\"time\":\"Request Time\"}', 1, 1, '2019-09-24 23:04:05', '2020-03-07 10:23:47'),
(3, 'EVER_CODE', 'Email Verification', 'Please verify your email address', '<div><br></div><div>Thanks For join with us. <br></div><div>Please use below code to verify your email address. <br></div><div><br></div><div>Your email verification code is:<font size=\"6\"><b> {{code}}</b></font></div>', 'Your email verification code is: {{code}}', '{\"code\":\"Verification code\"}', 1, 1, '2019-09-24 23:04:05', '2020-03-07 10:26:22'),
(4, 'SVER_CODE', 'SMS Verification ', 'Please verify your phone', 'Your phone verification code is: {{code}}', 'Your phone verification code is: {{code}}', '{\"code\":\"Verification code\"}', 0, 1, '2019-09-24 23:04:05', '2020-03-08 01:28:52'),
(5, '2FA_ENABLE', 'Google Two Factor - Enable', 'Google Two Factor Authentication is now  Enabled for Your Account', '<div>You just enabled Google Two Factor Authentication for Your Account.</div><div><br></div><div>Enabled at <b>{{time}} </b>From IP: <b>{{ip}}</b> using <b>{{browser}}</b> on <b>{{operating_system}} </b>.</div>', 'Your verification code is: {{code}}', '{\"ip\":\"IP of User\",\"browser\":\"Browser of User\",\"operating_system\":\"Operating System of User\",\"time\":\"Request Time\"}', 1, 1, '2019-09-24 23:04:05', '2020-03-08 01:42:59'),
(6, '2FA_DISABLE', 'Google Two Factor Disable', 'Google Two Factor Authentication is now  Disabled for Your Account', '<div>You just Disabled Google Two Factor Authentication for Your Account.</div><div><br></div><div>Disabled at <b>{{time}} </b>From IP: <b>{{ip}}</b> using <b>{{browser}}</b> on <b>{{operating_system}} </b>.</div>', 'Google two factor verification is disabled', '{\"ip\":\"IP of User\",\"browser\":\"Browser of User\",\"operating_system\":\"Operating System of User\",\"time\":\"Request Time\"}', 1, 1, '2019-09-24 23:04:05', '2020-03-08 01:43:46'),
(16, 'ADMIN_SUPPORT_REPLY', 'Support Ticket Reply ', 'Reply Support Ticket', '<div><p><span style=\"font-size: 11pt;\" data-mce-style=\"font-size: 11pt;\"><strong>A member from our support team has replied to the following ticket:</strong></span></p><p><b><span style=\"font-size: 11pt;\" data-mce-style=\"font-size: 11pt;\"><strong><br></strong></span></b></p><p><b>[Ticket#{{ticket_id}}] {{ticket_subject}}<br><br>Click here to reply:&nbsp; {{link}}</b></p><p>----------------------------------------------</p><p>Here is the reply : <br></p><p> {{reply}}<br></p></div><div><br></div>', '{{subject}}\r\n\r\n{{reply}}\r\n\r\n\r\nClick here to reply:  {{link}}', '{\"ticket_id\":\"Support Ticket ID\", \"ticket_subject\":\"Subject Of Support Ticket\", \"reply\":\"Reply from Staff/Admin\",\"link\":\"Ticket URL For relpy\"}', 1, 1, '2020-06-08 18:00:00', '2020-05-04 02:24:40'),
(206, 'DEPOSIT_COMPLETE', 'Automated Deposit - Successful', 'Exchange Completed Successfully', '<div>Your deposit of <b>{{amount}} {{currency}}</b> is via&nbsp; <b>{{method_name}} </b>has been completed Successfully.<b><br></b></div><div><b><br></b></div><div><b>Details of your Deposit :<br></b></div><div><br></div><div>Amount : {{amount}} {{currency}}</div><div>Charge: <font color=\"#000000\">{{charge}} {{currency}}</font></div><div><br></div><div>Conversion Rate : 1 {{currency}} = {{rate}} {{method_currency}}</div></div>', '{{amount}} {{currrency}} Deposit successfully by {{gateway_name}}', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By user\",\"charge\":\"Gateway Charge\",\"currency\":\"Site Currency\",\"rate\":\"Conversion Rate\",\"method_name\":\"Deposit Method Name\",\"method_currency\":\"Deposit Method Currency\",\"method_amount\":\"Deposit Method Amount After Conversion\", \"post_balance\":\"Users Balance After this operation\"}', 1, 1, '2020-06-24 18:00:00', '2020-07-07 06:39:22'),
(207, 'DEPOSIT_REQUEST', 'Manual Deposit - User Requested', 'Deposit Request Submitted Successfully', '<div>Your deposit request of <b>{{amount}} {{currency}}</b> is via&nbsp; <b>{{method_name}} </b>submitted successfully<b> .<br></b></div><div><b><br></b></div><div><b>Details of your Deposit :<br></b></div><div><br></div><div>Amount : {{amount}} {{currency}}</div><div>Charge: <font color=\"#FF0000\">{{charge}} {{currency}}</font></div><div><br></div><div>Conversion Rate : 1 {{currency}} = {{rate}} {{method_currency}}</div><div>Payable : {{method_amount}} {{method_currency}} <br></div><div>Pay via :&nbsp; {{method_name}}</div><div><br></div><div>Transaction Number : {{trx}}</div><div><br></div><div><br></div>', '{{amount}} Deposit requested by {{method}}. Charge: {{charge}} . Trx: {{trx}}\r\n', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By user\",\"charge\":\"Gateway Charge\",\"currency\":\"Site Currency\",\"rate\":\"Conversion Rate\",\"method_name\":\"Deposit Method Name\",\"method_currency\":\"Deposit Method Currency\",\"method_amount\":\"Deposit Method Amount After Conversion\"}', 1, 1, '2020-05-31 18:00:00', '2020-06-01 18:00:00'),
(208, 'DEPOSIT_APPROVE', 'Manual Deposit - Admin Approved', 'Your Deposit is Approved', '<div>Your deposit request of <b>{{amount}} {{currency}}</b> is via&nbsp; <b>{{method_name}} </b>is Approved .<b><br></b></div><div><b><br></b></div><div><b>Details of your Deposit :<br></b></div><div><br></div><div>Amount : {{amount}} {{currency}}</div><div>Charge: <font color=\"#FF0000\">{{charge}} {{currency}}</font></div><div><br></div><div>Conversion Rate : 1 {{currency}} = {{rate}} {{method_currency}}</div><div>Payable : {{method_amount}} {{method_currency}} <br></div><div>Paid via :&nbsp; {{method_name}}</div><div><br></div><div>Transaction Number : {{trx}}</div><div><font size=\"5\"><b><br></b></font></div><div><font size=\"5\">Your current Balance is <b>{{post_balance}} {{currency}}</b></font></div><div><br></div><div><br><br></div>', 'Admin Approve Your {{amount}} {{gateway_currency}} payment request by {{gateway_name}} transaction : {{transaction}}', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By user\",\"charge\":\"Gateway Charge\",\"currency\":\"Site Currency\",\"rate\":\"Conversion Rate\",\"method_name\":\"Deposit Method Name\",\"method_currency\":\"Deposit Method Currency\",\"method_amount\":\"Deposit Method Amount After Conversion\", \"post_balance\":\"Users Balance After this operation\"}', 1, 1, '2020-06-16 18:00:00', '2020-06-14 18:00:00'),
(209, 'DEPOSIT_REJECT', 'Manual Deposit - Admin Rejected', 'Your Deposit Request is Rejected', '<div>Your deposit request of <b>{{amount}} {{currency}}</b> is via&nbsp; <b>{{method_name}} has been rejected</b>.<b><br></b></div><br><div>Transaction Number was : {{trx}}</div><div><br></div><div>if you have any query, feel free to contact us.<br></div><br><div><br><br></div>\r\n\r\n\r\n\r\n{{rejection_message}}', 'Admin Rejected Your {{amount}} {{gateway_currency}} payment request by {{gateway_name}}\r\n\r\n{{rejection_message}}', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By user\",\"charge\":\"Gateway Charge\",\"currency\":\"Site Currency\",\"rate\":\"Conversion Rate\",\"method_name\":\"Deposit Method Name\",\"method_currency\":\"Deposit Method Currency\",\"method_amount\":\"Deposit Method Amount After Conversion\",\"rejection_message\":\"Rejection message\"}', 1, 1, '2020-06-09 18:00:00', '2020-06-14 18:00:00'),
(210, 'WITHDRAW_REQUEST', 'Withdraw  - User Requested', 'Withdraw Request Submitted Successfully', '<div>Your withdraw request of <b>{{amount}} {{currency}}</b>&nbsp; <b>&nbsp;</b>has been submitted Successfully.<b><br></b></div><div><b><br></b></div><div><b>Details of your withdraw:<br></b></div><div><br></div><div>Amount : {{amount}} {{currency}}</div><div>Charge: <font color=\"#FF0000\">{{charge}} {{method_currency}}</font></div><div><br></div><div>Conversion Rate : 1&nbsp;<span style=\"color: rgb(33, 37, 41); font-size: 1rem;\">{{method_currency}}</span><span style=\"color: rgb(33, 37, 41); font-size: 1rem;\">&nbsp;= {{rate}}&nbsp;</span><span style=\"color: rgb(33, 37, 41); font-size: 1rem;\">{{currency}}</span></div><div>You will get: {{method_amount}} {{method_currency}} <br></div><div>Via :&nbsp; {{method_name}}</div><div><br></div><div>Transaction Number : {{trx}}</div><div><font size=\"5\"><b><br></b></font></div><div><font size=\"5\">Your current Balance is <b>{{post_balance}} {{currency}}</b></font></div><div><br></div><div><br><br><br><br></div>', '{{amount}} {{currency}} withdraw requested by {{withdraw_method}}. You will get {{method_amount}} {{method_currency}} in {{duration}}. Trx: {{trx}}', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By user\",\"charge\":\"Gateway Charge\",\"currency\":\"Site Currency\",\"rate\":\"Conversion Rate\",\"method_name\":\"Deposit Method Name\",\"method_currency\":\"Deposit Method Currency\",\"method_amount\":\"Deposit Method Amount After Conversion\", \"post_balance\":\"Users Balance After this operation\", \"delay\":\"Delay time for processing\"}', 1, 1, '2020-06-07 18:00:00', '2020-12-12 07:50:25'),
(211, 'WITHDRAW_REJECT', 'Withdraw - Admin Rejected', 'Withdraw Request has been Rejected and your money is refunded to your account', '<div>Your withdraw request of <b>{{amount}} {{currency}}</b>&nbsp; via&nbsp; <b>{{method_name}} </b>has been Rejected.<b><br></b></div><div><b><br></b></div><div><b>Details of your withdraw:<br></b></div><div><br></div><div>Amount : {{amount}} {{currency}}</div><div>Charge: <font color=\"#FF0000\">{{charge}} {{currency}}</font></div><div><br></div><div>Conversion Rate : 1 {{currency}} = {{rate}} {{method_currency}}</div><div>You should get: {{method_amount}} {{method_currency}} <br></div><div>Via :&nbsp; {{method_name}}</div><div><br></div><div>Transaction Number : {{trx}}</div><div><br></div><div><br></div><div>----</div><div><font size=\"3\"><br></font></div><div><font size=\"3\"> {{amount}} {{currency}} has been <b>refunded </b>to your account and your current Balance is <b>{{post_balance}}</b><b> {{currency}}</b></font></div><div><br></div><div>-----</div><div><br></div><div><font size=\"4\">Details of Rejection :</font></div><div><font size=\"4\"><b>{{admin_details}}</b></font></div><div><br></div><div><br><br><br><br><br><br></div>', 'Admin Rejected Your {{amount}} {{currency}} withdraw request. Your Main Balance {{main_balance}}  {{method}} , Transaction {{transaction}}', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By user\",\"charge\":\"Gateway Charge\",\"currency\":\"Site Currency\",\"rate\":\"Conversion Rate\",\"method_name\":\"Deposit Method Name\",\"method_currency\":\"Deposit Method Currency\",\"method_amount\":\"Deposit Method Amount After Conversion\", \"post_balance\":\"Users Balance After this operation\", \"admin_details\":\"Details Provided By Admin\"}', 1, 1, '2020-06-09 18:00:00', '2020-06-14 18:00:00'),
(212, 'WITHDRAW_APPROVE', 'Withdraw - Admin  Approved', 'Withdraw Request has been Processed and your money is sent', '<div>Your withdraw request of <b>{{amount}} {{currency}}</b>&nbsp; via&nbsp; <b>{{method_name}} </b>has been Processed Successfully.<b><br></b></div><div><b><br></b></div><div><b>Details of your withdraw:<br></b></div><div><br></div><div>Amount : {{amount}} {{currency}}</div><div>Charge: <font color=\"#FF0000\">{{charge}} {{currency}}</font></div><div><br></div><div>Conversion Rate : 1 {{currency}} = {{rate}} {{method_currency}}</div><div>You will get: {{method_amount}} {{method_currency}} <br></div><div>Via :&nbsp; {{method_name}}</div><div><br></div><div>Transaction Number : {{trx}}</div><div><br></div><div>-----</div><div><br></div><div><font size=\"4\">Details of Processed Payment :</font></div><div><font size=\"4\"><b>{{admin_details}}</b></font></div><div><br></div><div><br><br><br><br><br></div>', 'Admin Approve Your {{amount}} {{currency}} withdraw request by {{method}}. Transaction {{transaction}}', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By user\",\"charge\":\"Gateway Charge\",\"currency\":\"Site Currency\",\"rate\":\"Conversion Rate\",\"method_name\":\"Deposit Method Name\",\"method_currency\":\"Deposit Method Currency\",\"method_amount\":\"Deposit Method Amount After Conversion\", \"admin_details\":\"Details Provided By Admin\"}', 1, 1, '2020-06-10 18:00:00', '2020-06-06 18:00:00'),
(215, 'BAL_ADD', 'Balance Add by Admin', 'Your Account has been Credited', '<div>{{amount}} {{currency}} has been added to your account .</div><div><br></div><div>Transaction Number : {{trx}}</div><div><br></div>Your Current Balance is : <font size=\"3\"><b>{{post_balance}}&nbsp; {{currency}}</b></font>', '{{amount}} {{currency}} credited in your account. Your Current Balance {{remaining_balance}} {{currency}} . Transaction: #{{trx}}', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By Admin\",\"currency\":\"Site Currency\", \"post_balance\":\"Users Balance After this operation\"}', 1, 1, '2019-09-14 19:14:22', '2019-11-10 09:07:12'),
(216, 'BAL_SUB', 'Balance Subtracted by Admin', 'Your Account has been Debited', '<div>{{amount}} {{currency}} has been subtracted from your account .</div><div><br></div><div>Transaction Number : {{trx}}</div><div><br></div>Your Current Balance is : <font size=\"3\"><b>{{post_balance}}&nbsp; {{currency}}</b></font>', '{{amount}} {{currency}} debited from your account. Your Current Balance {{remaining_balance}} {{currency}} . Transaction: #{{trx}}', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By Admin\",\"currency\":\"Site Currency\", \"post_balance\":\"Users Balance After this operation\"}', 1, 1, '2019-09-14 19:14:22', '2019-11-10 09:07:12'),
(217, 'REFFERAL_LINK', 'Reffer User', 'Refferel Link', '<div><b>{{username}} </b>reffered you.</div><div><b>Please click below to sign up&nbsp; {{link}} . <a href=\"{{link}}\"></a><br></b></div><div><br></div>', 'Your account recovery code is: {{code}}', '{\"link\":\"Refferal Link\",\"username\":\"Username\"}', 1, 1, NULL, '2020-11-23 05:04:53'),
(218, 'CANCEL_EXCHANGE', 'Cancel Exchange', 'Your Exchange Canceled', '<div>Cancel Your Exchange. Your Exchange id {{exchange}}</div>\r\n\r\n</br></br>\r\n\r\nCancel Reason : {{reason}}', 'Your Exchange is Canceled ', '{\"exchnage\":\"Exchange Id\",\"reason\":\"Reason\"}', 1, 1, NULL, '2020-11-23 05:04:53'),
(219, 'APPROVED_EXCHANGE', 'Approved Exchange', 'Your Exchange Approved', '<div><b>{{amount}} {{currency}}</b> send in your {{method}} wallet . Your Exchange id {{exchange}}</div>', 'Your Exchange is Approved. Amount send to your {{amount}} {{currency}} in {{method}} ', '{\"amount\":\"Amount\",\"method\":\"Currency Name\",\"exchange\":\"exchange Id\",\"currency\":\"Currency\"}', 1, 1, NULL, '2020-11-23 05:04:53'),
(220, 'EXCHANGE_REFUND', 'Refund Exchange', 'Your Exchange Refunded', '<div><b>{{amount}} {{currency}}</b> refunded in your {{method}} wallet . Your Exchange id {{exchange}}\r\n<br><br>\r\n\r\nRefund Reason : {{reason}}\r\n\r\n</div>\r\n\r\n', 'Your Exchange is Approved. Amount send to your {{amount}} {{currency}} in {{method}} ', '{\"amount\":\"Amount\",\"method\":\"Currency Name\",\"exchange\":\"exchange Id\",\"currency\":\"Currency\",\"reason\":\"Reason\"}', 1, 1, NULL, '2020-11-23 05:04:53');

-- --------------------------------------------------------

--
-- Table structure for table `exchanges`
--

CREATE TABLE `exchanges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deposit_id` bigint(20) UNSIGNED NOT NULL,
  `payment_from` bigint(20) UNSIGNED NOT NULL,
  `get_amount` decimal(8,2) NOT NULL,
  `buy_rate` decimal(10,2) NOT NULL,
  `payment_to` bigint(20) UNSIGNED NOT NULL,
  `send_amount` decimal(8,2) NOT NULL,
  `sell_rate` decimal(10,2) NOT NULL,
  `charge` decimal(28,8) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refund_amount` decimal(28,8) NOT NULL,
  `status` int(2) NOT NULL COMMENT '0 = inactive , 1= approved\r\n, 2= cancle, 3= refund',
  `autometic_payment_status` tinyint(1) NOT NULL,
  `wallet_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exchange_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_proof` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_trnx_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refund_reason` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancle_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `extensions`
--

CREATE TABLE `extensions` (
  `id` int(10) UNSIGNED NOT NULL,
  `act` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `script` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shortcode` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'object',
  `support` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'help section',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `extensions`
--

INSERT INTO `extensions` (`id`, `act`, `name`, `description`, `image`, `script`, `shortcode`, `support`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'tawk-chat', 'Tawk.to', 'Key location is shown bellow', 'tawky_big.png', '<script>\r\n                        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();\r\n                        (function(){\r\n                        var s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0];\r\n                        s1.async=true;\r\n                        s1.src=\"https://embed.tawk.to/{{app_key}}\";\r\n                        s1.charset=\"UTF-8\";\r\n                        s1.setAttribute(\"crossorigin\",\"*\");\r\n                        s0.parentNode.insertBefore(s1,s0);\r\n                        })();\r\n                    </script>', '{\"app_key\":{\"title\":\"App Key\",\"value\":\"----\"}}', 'twak.png', 0, NULL, '2019-10-18 23:16:05', '2021-03-24 08:08:17'),
(2, 'google-recaptcha2', 'Google Recaptcha 2', 'Key location is shown bellow', 'recaptcha3.png', '\r\n<script src=\"https://www.google.com/recaptcha/api.js\"></script>\r\n<div class=\"g-recaptcha\" data-sitekey=\"{{sitekey}}\" data-callback=\"verifyCaptcha\"></div>\r\n<div id=\"g-recaptcha-error\"></div>', '{\"sitekey\":{\"title\":\"Site Key\",\"value\":\"----\"}}', 'recaptcha.png', 0, NULL, '2019-10-18 23:16:05', '2021-04-11 12:04:15'),
(3, 'custom-captcha', 'Custom Captcha', 'Just Put Any Random String', 'customcaptcha.png', NULL, '{\"random_key\":{\"title\":\"Random String\",\"value\":\"----\"}}', 'na', 1, NULL, '2019-10-18 23:16:05', '2021-03-24 08:07:38'),
(4, 'google-analytics', 'Google Analytics', 'Key location is shown bellow', 'google-analytics.png', '<script async src=\"https://www.googletagmanager.com/gtag/js?id={{app_key}}\"></script>\r\n                <script>\r\n                  window.dataLayer = window.dataLayer || [];\r\n                  function gtag(){dataLayer.push(arguments);}\r\n                  gtag(\"js\", new Date());\r\n                \r\n                  gtag(\"config\", \"{{app_key}}\");\r\n                </script>', '{\"app_key\":{\"title\":\"App Key\",\"value\":\"----\"}}', 'ganalytics.png', 0, NULL, NULL, '2021-03-24 08:08:12'),
(5, 'fb-comment', 'Facebook Comment ', 'Key location is shown bellow', 'Facebook.png', '<div id=\"fb-root\"></div><script async defer crossorigin=\"anonymous\" src=\"https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v4.0&appId={{app_key}}&autoLogAppEvents=1\"></script>', '{\"app_key\":{\"title\":\"App Key\",\"value\":\"----\"}}', 'fb_com.png', 0, NULL, NULL, '2021-03-24 08:08:09');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `frontends`
--

CREATE TABLE `frontends` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_keys` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_values` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clicks` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `frontends`
--

INSERT INTO `frontends` (`id`, `data_keys`, `data_values`, `clicks`, `created_at`, `updated_at`) VALUES
(1, 'seo.data', '{\"seo_image\":\"1\",\"keywords\":[\"exchange platform\",\"currency exchange platform\",\"changalab\",\"usd to inr\",\"currency exchange\",\"easy exchange\"],\"description\":\"ChangaLab can be explained as a network of buyers and sellers, who transfer currency between each other or for their own. It is the means by which individuals, companies convert one currency into another. This Currency Exchange Platform is the most advanced script in Codecanyon. The Currency Exchange Platform is endlessly appealing, feature-loaded, customized, and possesses the remarkable capability of running on all devices and operating systems.\",\"social_title\":\"ChangeLab\",\"social_description\":\"ChangaLab can be explained as a network of buyers and sellers, who transfer currency between each other or for their own. It is the means by which individuals, companies convert one currency into another. This Currency Exchange Platform is the most advanced script in Codecanyon. The Currency Exchange Platform is endlessly appealing, feature-loaded, customized, and possesses the remarkable capability of running on all devices and operating systems.\",\"image\":\"605b48789960c1616595064.png\"}', NULL, '2020-07-04 23:42:52', '2021-03-24 08:11:04'),
(24, 'about.content', '{\"has_image\":\"1\",\"heading\":\"About Changalab\",\"sub_heading\":\"The smartest way to collect, convert and transfer money globally\",\"description\":\"<p class=\\\"MsoNormal\\\" style=\\\"margin-bottom:0.0001pt;line-height:normal;\\\"><br \\/><\\/p><p class=\\\"MsoNormal\\\" style=\\\"margin-bottom:0.0001pt;line-height:normal;\\\">At Changalab, our mission is to create the world\\u2019s best exchange platform for individuals and\\ninternational businesses.<\\/p><p class=\\\"MsoNormal\\\" style=\\\"margin-bottom:0.0001pt;line-height:normal;\\\"><br \\/><\\/p><p><\\/p><p class=\\\"MsoNormal\\\" style=\\\"margin-bottom:0.0001pt;line-height:normal;\\\">Changalab was born back\\nin 2016 by innovators in a London basement armed with ten years of banking\\nexperience, an entrepreneurial spirit, and a desire to provide customers a real alternative to the big banks. Since then, we\\u2019ve grown exponentially, and with a global team around 600 strong, have become a market-leading, multi-award\\nwinning, bank-beating, rapidly-growing, fun-loving international payments\\ncompany.<\\/p><p class=\\\"MsoNormal\\\" style=\\\"margin-bottom:0.0001pt;line-height:normal;\\\"><br \\/><\\/p><p><\\/p><p class=\\\"MsoNormal\\\" style=\\\"margin-bottom:0.0001pt;line-height:normal;\\\">Currently, more than\\n250,000 global customers &amp; 150,000 global businesses choose Changalab for their\\ninternational transfers. We have transferred \\u00a370 Billion for our customers\\nsince we launched, more than 1 million transfers per year<\\/p>\",\"about_icon\":\"<i class=\\\"las la-address-card\\\"><\\/i>\",\"about_image\":\"5fbd0a58bff5f1606224472.png\"}', NULL, '2020-10-28 00:51:20', '2021-02-04 19:28:53'),
(27, 'contact_us.content', '{\"has_image\":\"1\",\"title\":\"Contact With Us\",\"short_details\":\"Get In Touch With Us\",\"email_address\":\"Changalab\",\"contact_details\":\"changylab@gamil.com\",\"contact_number\":\"+0111-0000000\",\"latitude\":\"1\",\"longitude\":\"1\",\"website_footer\":\"<span style=\\\"color:rgb(0,0,0);font-family:Arial, sans-serif;\\\">changalab<\\/span>@gamil.com\",\"image\":\"5feb39cd71dbc1609251277.png\"}', NULL, '2020-10-28 00:59:19', '2021-02-04 19:39:04'),
(28, 'counter.content', '{\"has_image\":\"1\",\"background_image\":\"5feda9df53d471609411039.png\"}', NULL, '2020-10-28 01:04:02', '2020-12-31 10:37:19'),
(34, 'banner.content', '{\"has_image\":\"1\",\"heading\":\"Changalab - Secure and Suitable Currency Exchange Platform\",\"sub_heading\":\"One of the most renowned global foreign exchange platforms with a professionally designed website that is easy to use and navigate.\",\"background_image\":\"5ff06adf6cfaf1609591519.jpg\"}', NULL, '2020-11-16 23:51:06', '2021-02-04 19:29:33'),
(35, 'footer.content', '{\"details\":\"Changalab - Secure and Suitable Currency Exchange Platform\",\"copyright\":\"Copyright \\u00a9 2016 - 2020 Changalab All Rights reserved\"}', NULL, '2020-11-16 23:59:01', '2021-02-04 19:40:29'),
(43, 'footer.element', '{\"icon_title\":\"facebook\",\"feature_icon\":\"<i class=\\\"fab fa-facebook-f\\\"><\\/i>\",\"url\":\"https:\\/\\/www.facebook.com\\/\"}', NULL, '2020-11-17 03:14:16', '2020-11-17 03:14:16'),
(44, 'footer.element', '{\"icon_title\":\"twitter\",\"feature_icon\":\"<i class=\\\"fab fa-twitter\\\"><\\/i>\",\"url\":\"https:\\/\\/www.twitter.com\\/\"}', NULL, '2020-11-17 03:14:36', '2020-11-17 03:14:36'),
(45, 'footer.element', '{\"icon_title\":\"instagram\",\"feature_icon\":\"<i class=\\\"fab fa-instagram\\\"><\\/i>\",\"url\":\"https:\\/\\/www.instagram.com\\/\"}', NULL, '2020-11-17 03:15:45', '2020-11-17 03:15:45'),
(46, 'feature.content', '{\"heading\":\"Our Special Features\",\"sub_heading\":\"We support the most secure services and features. This secured website supports a user-friendly interface and various attractive features that ready to use.\"}', NULL, '2020-11-17 03:45:56', '2020-12-17 14:40:12'),
(47, 'feature.element', '{\"id\":\"47\",\"title\":\"Safe and Secure\",\"description\":\"We value your money and your privacy. We have deployed the best systems to ensure that your money and your account.\",\"feature_icon\":\"<i class=\\\"fas fa-hand-holding-heart\\\"><\\/i>\"}', NULL, '2020-11-17 03:48:41', '2021-02-03 23:01:32'),
(48, 'feature.element', '{\"id\":\"48\",\"title\":\"Low Transparent Fee\",\"description\":\"We make sure that you are able to send as much money as possibles, we offer the best exchange rates possible here.\",\"feature_icon\":\"<i class=\\\"far fa-money-bill-alt\\\"><\\/i>\"}', NULL, '2020-11-17 03:49:48', '2021-02-03 23:02:22'),
(49, 'feature.element', '{\"id\":\"49\",\"title\":\"Fast Transaction\",\"description\":\"We support fast transactions all over the world. With changalab sending money is simple, quick, and hassle-free.\",\"feature_icon\":\"<i class=\\\"fas fa-shipping-fast\\\"><\\/i>\"}', NULL, '2020-11-17 03:51:12', '2021-02-03 23:03:25'),
(54, 'service.content', '{\"heading\":\"Our Services\",\"sub_heading\":\"Our industry-leading technology protects your money and guarantees it arrives safely every time.\"}', NULL, '2020-11-17 04:14:33', '2020-12-17 16:49:23'),
(61, 'faq.content', '{\"has_image\":\"1\",\"heading\":\"Frequently Asked Question\",\"sub_heading\":\"Some frequently Asked Questios\",\"faq_image\":\"5fb3b28b717df1605612171.png\"}', NULL, '2020-11-17 05:17:49', '2020-12-17 17:57:58'),
(64, 'faq.element', '{\"id\":\"64\",\"question\":\"How To Exchange Currency?\",\"answer\":\"Always decline if given the opportunity to charge your purchase in USD. This may bring hidden transaction and conversion fees that will amount to much more than charging your purchase in the local currency. Insist that all purchases are charged in the local currency. \\n\\nThere are always financial risks involved with traveling internationally, which is why it is important to take extra precautions making exchanges, purchases, or withdrawals abroad.\"}', NULL, '2020-11-17 05:18:38', '2020-12-17 18:04:59'),
(65, 'faq.element', '{\"id\":\"65\",\"question\":\"In which forms can I buy foreign exchange?\",\"answer\":\"<div>You can choose to buy foreign exchange in one or more of these modes: cash\\/currency notes, traveller\\u2019s cheques and prepaid multi-currency forex cards. Most people prefer to carry their currency in a combination of cash (generally for smaller expenses) and prepaid multi-currency cards which can be swiped at merchant outlets or used to withdraw cash at an ATM.<\\/div>\"}', NULL, '2020-11-17 05:18:54', '2020-12-19 11:34:40'),
(66, 'faq.element', '{\"id\":\"66\",\"question\":\"How To Create a Changylab account?\",\"answer\":\"<div>If you want to open an account for personal use you can do it over the phone or online.<\\/div><div>Opening an account online should only take a few minutes<\\/div><div>You need to register to the site and just login to the site using the userid and password<\\/div>\"}', NULL, '2020-11-17 05:19:07', '2021-02-03 23:43:28'),
(67, 'faq.element', '{\"id\":\"67\",\"question\":\"Is Two-Factor Authentication (2FA) mandatory?\",\"answer\":\"All the clients  who have signed up to on the site, are required to perform additional authorization at the following stages online:\\n\\n- Login\\n- Adding or managing beneficiaries\\n- Instructing a payment or booking a site\"}', NULL, '2020-11-17 05:19:22', '2020-12-17 17:19:13'),
(68, 'transaction.content', '{\"heading\":\"Our Latest Transaction\",\"sub_heading\":\"Transfer funds around the world from the comfort of your home with our easy-to-use online.\"}', NULL, '2020-11-17 05:48:44', '2020-12-17 18:10:47'),
(69, 'client.content', '{\"heading\":\"Our client\'s say about us\",\"sub_heading\":\"We always care for our clients and love to getting good feedbacks from you. Take a look at what some of our clients think of us.\"}', NULL, '2020-11-17 23:54:47', '2021-02-03 23:42:37'),
(70, 'newslatter.content', '{\"has_image\":\"1\",\"heading\":\"Subscribe Our Newsletter\",\"sub_heading\":\"Subscribe Our Newslater Now to get all the updates and Discount Offer News\",\"button_image\":\"5fbcfef10e5fe1606221553.png\",\"image_property\":\"5fedb4b80178b1609413816.png\"}', NULL, '2020-11-18 00:32:13', '2020-12-31 11:23:36'),
(71, 'mission.element', '{\"id\":\"71\",\"has_image\":[\"1\"],\"heading\":\"Our Mission\",\"sub_heading\":\"Our values reflect who we are and what we stand for as a company.\",\"description\":\"<p class=\\\"MsoNormal\\\" style=\\\"margin-bottom:0.0001pt;line-height:normal;\\\"><span style=\\\"background-color:rgb(248,248,248);color:rgb(29,28,29);font-family:\'Slack-Lato\', appleLogo, sans-serif;font-size:15px;\\\">Changalab\\u00a0<\\/span><span style=\\\"font-size:11.5pt;font-family:Arial, sans-serif;color:#444444;\\\">our local\\nand global expertise to be a leading service provider of payment solutions for\\nour customers globally by delivering high quality, innovative and world-class\\nproducts and services; while maintaining the highest standards of governance\\nand ethics.<\\/span><span style=\\\"font-size:12pt;font-family:Arial, sans-serif;\\\"><\\/span><\\/p><p><\\/p><p class=\\\"MsoNormal\\\" style=\\\"margin-bottom:0.0001pt;line-height:normal;\\\"><span style=\\\"font-size:12pt;font-family:Arial, sans-serif;color:#212529;\\\"><br \\/><br \\/><\\/span><span style=\\\"font-size:12pt;font-family:\'Times New Roman\', serif;\\\"><\\/span><\\/p><p><\\/p><p class=\\\"MsoNormal\\\" style=\\\"margin-bottom:0.0001pt;line-height:normal;\\\"><b><span style=\\\"font-size:11.5pt;font-family:Arial, sans-serif;color:#444444;\\\">Customer Commitment\\n:\\u00a0<\\/span><\\/b><span style=\\\"font-size:11.5pt;font-family:Arial, sans-serif;color:#444444;\\\">We develop\\nrelationships that make a positive difference in our customers\' lives.<\\/span><span style=\\\"font-size:12pt;font-family:Arial, sans-serif;\\\"><\\/span><\\/p><p><\\/p><p class=\\\"MsoNormal\\\" style=\\\"margin-bottom:0.0001pt;line-height:normal;\\\"><b><span style=\\\"font-size:11.5pt;font-family:Arial, sans-serif;color:#444444;\\\">Quality:\\u00a0<\\/span><\\/b><span style=\\\"font-size:11.5pt;font-family:Arial, sans-serif;color:#444444;\\\">We provide outstanding products and\\nunsurpassed service that, together, deliver premium value to our customers.<\\/span><span style=\\\"font-size:12pt;font-family:Arial, sans-serif;\\\"><\\/span><\\/p><p><\\/p><p class=\\\"MsoNormal\\\" style=\\\"margin-bottom:0.0001pt;line-height:normal;\\\"><b><span style=\\\"font-size:11.5pt;font-family:Arial, sans-serif;color:#444444;\\\">Integrity:\\u00a0<\\/span><\\/b><span style=\\\"font-size:11.5pt;font-family:Arial, sans-serif;color:#444444;\\\">We uphold the highest standards of integrity\\nin all of our actions.<\\/span><span style=\\\"font-size:12pt;font-family:Arial, sans-serif;\\\"><\\/span><\\/p><p><\\/p><p class=\\\"MsoNormal\\\" style=\\\"margin-bottom:0.0001pt;line-height:normal;\\\"><b><span style=\\\"font-size:11.5pt;font-family:Arial, sans-serif;color:#444444;\\\">Teamwork:\\u00a0<\\/span><\\/b><span style=\\\"font-size:11.5pt;font-family:Arial, sans-serif;color:#444444;\\\">We work together, across boundaries, to meet\\nthe needs of our customers and to help the company win.<\\/span><span style=\\\"font-size:12pt;font-family:Arial, sans-serif;\\\"><\\/span><\\/p><p><\\/p><p class=\\\"MsoNormal\\\" style=\\\"margin-bottom:0.0001pt;line-height:normal;\\\"><b><span style=\\\"font-size:11.5pt;font-family:Arial, sans-serif;color:#444444;\\\">Respect for People\\n:\\u00a0<\\/span><\\/b><span style=\\\"font-size:11.5pt;font-family:Arial, sans-serif;color:#444444;\\\">We value our people,\\nencourage their development, and reward their performance.<\\/span><span style=\\\"font-size:12pt;font-family:Arial, sans-serif;\\\"><\\/span><\\/p><p><\\/p><p class=\\\"MsoNormal\\\" style=\\\"margin-bottom:0.0001pt;line-height:normal;\\\"><b><span style=\\\"font-size:11.5pt;font-family:Arial, sans-serif;color:#444444;\\\">Good Citizenship\\n:\\u00a0<\\/span><\\/b><span style=\\\"font-size:11.5pt;font-family:Arial, sans-serif;color:#444444;\\\">We are good citizens\\nin the communities in which we live and work.<\\/span><span style=\\\"font-size:12pt;font-family:Arial, sans-serif;\\\"><\\/span><\\/p><p><\\/p><p class=\\\"MsoNormal\\\" style=\\\"margin-bottom:0.0001pt;line-height:normal;\\\"><b><span style=\\\"font-size:11.5pt;font-family:Arial, sans-serif;color:#444444;\\\">A Will to Win:\\u00a0<\\/span><\\/b><span style=\\\"font-size:11.5pt;font-family:Arial, sans-serif;color:#444444;\\\">We exhibit a strong will to win in the\\nmarketplace and in every aspect of our business.<\\/span><span style=\\\"font-size:12pt;font-family:Arial, sans-serif;\\\"><\\/span><\\/p><p><\\/p><p class=\\\"MsoNormal\\\" style=\\\"margin-bottom:0.0001pt;line-height:normal;\\\"><b><span style=\\\"font-size:11.5pt;font-family:Arial, sans-serif;color:#444444;\\\">Personal\\nAccountability:\\u00a0<\\/span><\\/b><span style=\\\"font-size:11.5pt;font-family:Arial, sans-serif;color:#444444;\\\">We\\nare personally accountable for delivering on our commitments.<\\/span><span style=\\\"font-size:12pt;font-family:Arial, sans-serif;\\\"><\\/span><\\/p><p><\\/p><p class=\\\"MsoNormal\\\" style=\\\"margin-bottom:0.0001pt;line-height:normal;\\\"><span style=\\\"font-size:11.5pt;font-family:Arial, sans-serif;color:#444444;\\\">Changalab\\u00a0operates\\nwith best-in-class economics We focus on managing our business as efficiently\\nas possible to continually improve the quality of our service and invest in\\ngrowth.\\u00a0<\\/span><b><span style=\\\"font-size:12pt;font-family:Arial, sans-serif;\\\">\\u00a0<\\/span><\\/b><span style=\\\"font-size:12pt;font-family:Arial, sans-serif;\\\">Changalabbuilt on service and sustained by\\ninnovation. We\'re a global services company that provides customers with access\\nto products, insights, and experiences that enrich lives and build business\\nsuccess.<\\/span><\\/p><p><\\/p><p style=\\\"margin:0in 0in 16.5pt;\\\">\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n<\\/p><p class=\\\"MsoNormal\\\"><\\/p><p>\\u00a0<\\/p><p><\\/p>\",\"image\":\"5fbdeca9a0c041606282409.png\"}', NULL, '2020-11-24 23:33:29', '2021-02-04 19:41:52'),
(72, 'mission.element', '{\"id\":\"72\",\"has_image\":[\"1\"],\"heading\":\"Our Vision\",\"sub_heading\":\"To be leading provider of payment solutions globally.\",\"description\":\"<div class=\\\"section-header left-style margin-olpo text-left\\\" style=\\\"margin:0px auto 50px;\\\"><p class=\\\"MsoNormal\\\" style=\\\"margin-bottom:0.0001pt;line-height:normal;\\\"><br \\/><\\/p><p class=\\\"MsoNormal\\\" style=\\\"margin-bottom:0.0001pt;line-height:normal;\\\">\\nAt\\u00a0Changalab, our mission is to create the world\\u2019s best exchange platform for\\nindividuals and international businesses.<\\/p><p><\\/p><p class=\\\"MsoNormal\\\" style=\\\"margin-bottom:0.0001pt;line-height:normal;\\\">Changalab was born\\nback in 2000 by innovators in a London basement armed with ten years of banking\\nexperience, an entrepreneurial spirit, and a desire to provide customers a real alternative to the big banks. Since then, we\\u2019ve grown exponentially and with a\\nglobal team around 600 strong, have become a market-leading, multi-award\\nwinning, bank-beating, rapidly-growing, fun-loving international payments company.<\\/p><p><\\/p><p class=\\\"MsoNormal\\\" style=\\\"margin-bottom:0.0001pt;line-height:normal;\\\">\\u00a0<\\/p><p><\\/p><p class=\\\"MsoNormal\\\" style=\\\"margin-bottom:0.0001pt;line-height:normal;\\\">For ensuring fast\\n&amp; secure online transactions and providing value-added services across the\\nglobal horizon has been our centralized vision. We are ready with every\\nintention, tool, skill, and technique to accomplish such pre-defined\\nobjectives, while we are also fully devoted to prove the best customer\\nexperience and have implemented various efforts to safeguard them earnestly.<\\/p><p><\\/p><p class=\\\"MsoNormal\\\" style=\\\"margin-bottom:0.0001pt;line-height:normal;\\\">Likewise, Our R&amp;D\\ndepartment has been working constantly to initiate newer measures for safer and\\nmore secure monetary transactions across the globe. We have cherished a variety\\nof objectives since the beginning.<\\/p><p><\\/p><p class=\\\"MsoNormal\\\" style=\\\"margin-bottom:0.0001pt;line-height:normal;\\\">\\u00a0<\\/p><p><\\/p><p class=\\\"MsoNormal\\\">\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n<\\/p><p class=\\\"MsoNormal\\\"><\\/p><p>\\u00a0<\\/p><\\/div>\",\"image\":\"5fbdeccb9cb391606282443.jpg\"}', NULL, '2020-11-24 23:33:53', '2021-02-04 19:41:28'),
(73, 'blog.content', '{\"heading\":\"Our Latest News\",\"sub_heading\":\"Welcome to Changylab! Please check our latest news and article here...\"}', NULL, '2020-11-25 00:05:48', '2021-02-03 23:41:31'),
(74, 'blog.element', '{\"id\":\"74\",\"has_image\":[\"1\"],\"title\":\"US Dollar 1Q 2021 Forecast: Safe Haven Status Versus Fading Growth Position\",\"short_details\":\"US Dollar 1Q 2021 Forecast: Safe Haven Status Versus Fading Growth Position\",\"description_nic\":\"<div>US DOLLAR FUNDAMENTAL FORECAST TALKING POINTS:<\\/div><div>Through the final quarter of the 2020 (up until December 18th), the Dollar dropped against the majors between 7.5% in NZDUSD and 2.2% with USDJPY<\\/div><div>Prominent themes like the Covid-19 spread and vaccine as well as stimulus debates have weighed the Dollar but older matters like trade are likely to also return<\\/div><div>Ultimately, the state of risk appetite is the top qualifier for USD direction and intensity with the Greenback\\u2019s safe haven status ready to go to work<\\/div><div>Coming Soon! Download the NEW 1st Quarter Forecast Live on Monday on our Free Trading Guides Page!<\\/div><div><br \\/><\\/div><div>DOLLAR STARES OVER THE TECHNICAL PRECIPICE - WILL FUNDAMENTALS SHOVE OR SAVE?<\\/div><div>The US Dollar was staring down the barrel of a more prolific bearish trend heading into the close of 2020. Fundamentally, the slide in prominence for the Greenback reflects upon uneven growth and stimulus efforts, years of building isolationism and many investors around the world casting aside havens as even mere hedges were deemed to be too much of a burden on returns. In this shift, the very role of the most liquid currency in the financial system is at risk of further systemic alteration. Yet, that slide in international prominence would depend in part on steadfast themes carrying over from 2020 into 2021.<\\/div><div><br \\/><\\/div><div>There is reason to believe, however, that many of these currents are likely to change - even if temporarily - with significant risk that the alterations begin in the first quarter. From a bigger picture perspective, one of the most important fundamental considerations for the USD\'s performance heading into the new year is whether its drive is more principally a relative fundamental shift or reversion to a more primal function. In other words, are the prospects for competitive economic activity and a higher rate of return the guiding light for the USD? Or, perhaps, a systemic collapse in sentiment is due to resuscitate the currency\'s safe haven appeal? The potential is palpable and yet highly variable for the open of the new year.<\\/div><div><br \\/><\\/div><div>ECONOMIC GROWTH FORECAST INITIALLY REFLECTS THE RELATIVE CORONAVIRUS RECOVERY PATH<\\/div><div>Should risk trends continue to point higher or otherwise maintain an inconsistent path into the coming months, the Greenback\'s outlook will more likely draw from its relative potential. That can prove either a comparable boon or burden for the currency, depending on how the standardized data performs. While actual economic data like the 4Q GDP and monthly PMIs (a timely proxy for official growth figures) will represent important milestones, the medium-term forecast could matter far more than immediate statistics. That is because there are critical interim developments that can drastically alter the United States\' course. Following the FDA\'s approval of the first Covid-19 vaccine from Pfizer on December 11th, the arduous process of restoring the US economy to a state of normality began. The effort will take months, but markets are forward-looking in nature. The question is whether the perceived timetable for a return to tempo for the US keeps apace of its major counterparts.<\\/div>\",\"blog_icon\":\"<i class=\\\"las la-history\\\"><\\/i>\",\"blog_image\":\"601a83cd3bb8b1612350413.jpg\"}', 92, '2020-11-25 00:10:48', '2021-05-22 04:35:59'),
(75, 'blog.element', '{\"id\":\"75\",\"has_image\":[\"1\"],\"title\":\"Nasdaq 100, Hang Seng, ASX 200 Rise on Big Tech Earnings Boost\",\"short_details\":\"Nasdaq 100, Hang Seng, ASX 200 Rise on Big Tech Earnings Boost\",\"description_nic\":\"<h2 class=\\\"article-subheader\\\" style=\\\"margin-top:1rem;margin-bottom:1rem;font-weight:700;line-height:1.2;color:rgb(0,0,0);font-family:Roboto, Arial, Helvetica, sans-serif;font-size:1.3rem;text-transform:uppercase;\\\">NASDAQ 100, HANG SENG, ASX 200 INDEX OUTLOOK:<\\/h2><ul class=\\\"gsstx\\\" style=\\\"margin-bottom:1rem;font-family:Roboto, Arial, Helvetica, sans-serif;color:rgb(0,0,0);\\\"><li class=\\\"gsstx\\\"><span class=\\\"gsstx\\\" style=\\\"font-size:1rem;font-style:italic;\\\">US equities returned to upward trajectory as retail trading frenzy faded, stimulus in focus<\\/span><\\/li><li class=\\\"gsstx\\\"><span class=\\\"gsstx\\\" style=\\\"font-size:1rem;font-style:italic;\\\">Alphabet and Amazon delivered strong Q4 earnings, surging 7.7% and 1.3% respectively afterhours<\\/span><\\/li><li class=\\\"gsstx\\\"><span class=\\\"gsstx\\\" style=\\\"font-size:1rem;font-style:italic;\\\">Asia-Pacific markets\\u00a0<\\/span><span class=\\\"gsstx\\\" style=\\\"font-size:1rem;font-style:italic;\\\">are poised to extend a three-day gain amid favourable sentiment,\\u00a0<a href=\\\"https:\\/\\/www.dailyfx.com\\/crude-oil\\\" title=\\\"oil\\\" style=\\\"color:rgb(0,129,194);\\\">oil<\\/a>\\u00a0gained<\\/span><\\/li><\\/ul><p class=\\\"gsstx\\\" style=\\\"margin:0.75rem 0px;font-family:Roboto, Arial, Helvetica, sans-serif;font-size:16px;color:rgb(0,0,0);\\\"><span class=\\\"gsstx\\\">All three major US equity benchmarks climbed for a second day as a retail trading frenzy faded and market volatility declined. The\\u00a0<a href=\\\"https:\\/\\/www.dailyfx.com\\/nas-100\\\" title=\\\"Nasdaq\\\" style=\\\"color:rgb(0,129,194);\\\">Nasdaq<\\/a>,\\u00a0<a href=\\\"https:\\/\\/www.dailyfx.com\\/dow-jones\\\" title=\\\"Dow Jones\\\" style=\\\"color:rgb(0,129,194);\\\">Dow Jones<\\/a>\\u00a0and\\u00a0<a href=\\\"https:\\/\\/www.dailyfx.com\\/sp-500\\\" title=\\\"S&amp;P 500\\\" style=\\\"color:rgb(0,129,194);\\\">S&amp;P 500<\\/a>\\u00a0indices finished up 1.6%, 1.6% and 1.4% respectively. Market focus returned to\\u00a0<\\/span><span class=\\\"gsstx\\\" style=\\\"font-weight:bold;\\\">corporate earnings<\\/span><span class=\\\"gsstx\\\">, pandemic developments and President Joe Biden\\u2019s US$ 1.9 trillion fiscal stimulus plan. Sentiment appears to be boosted by strong Q4 corporate earnings, with\\u00a0<\\/span><span class=\\\"gsstx\\\" style=\\\"font-weight:bold;\\\">Alphabet<\\/span><span class=\\\"gsstx\\\">\\u00a0and\\u00a0<\\/span><span class=\\\"gsstx\\\" style=\\\"font-weight:bold;\\\">Amazon\\u00a0<\\/span><span class=\\\"gsstx\\\">and<\\/span><span class=\\\"gsstx\\\" style=\\\"font-weight:bold;\\\">\\u00a0Alibaba<\\/span><span class=\\\"gsstx\\\">\\u00a0delivering upbeat results in afterhours trade. This may lead the Nasdaq 100 futures to advance further and set a favorable tone for Asia-Pacific markets.<\\/span><\\/p><p class=\\\"gsstx\\\" style=\\\"margin:0.75rem 0px;font-family:Roboto, Arial, Helvetica, sans-serif;font-size:16px;color:rgb(0,0,0);\\\"><span class=\\\"gsstx\\\">Alphabet (beat)<\\/span><span class=\\\"gsstx\\\">:<\\/span><\\/p><ul class=\\\"gsstx\\\" style=\\\"margin-bottom:1rem;font-family:Roboto, Arial, Helvetica, sans-serif;color:rgb(0,0,0);\\\"><li class=\\\"gsstx\\\"><span class=\\\"gsstx\\\" style=\\\"font-size:16px;\\\">Revenue: US$ 46.3 billion vs. US$ 44.55 billion estimated<\\/span><\\/li><li class=\\\"gsstx\\\"><span class=\\\"gsstx\\\" style=\\\"font-size:16px;\\\">EPS: US$ 22.30 vs. US$ 15.57 estimated<\\/span><\\/li><li class=\\\"gsstx\\\"><span class=\\\"gsstx\\\" style=\\\"font-size:16px;\\\">Strong advertisement revenue and growth in the cloud business are among the highlights<\\/span><\\/li><\\/ul><p class=\\\"gsstx\\\" style=\\\"margin:0.75rem 0px;font-family:Roboto, Arial, Helvetica, sans-serif;font-size:16px;color:rgb(0,0,0);\\\"><span class=\\\"gsstx\\\">Amazon (beat)<\\/span><span class=\\\"gsstx\\\">:<\\/span><\\/p><ul class=\\\"gsstx\\\" style=\\\"margin-bottom:1rem;font-family:Roboto, Arial, Helvetica, sans-serif;color:rgb(0,0,0);\\\"><li class=\\\"gsstx\\\"><span class=\\\"gsstx\\\" style=\\\"font-size:16px;\\\">Revenue: US$ 125.6 billion vs. US$ 119.7 billion estimated<\\/span><\\/li><li class=\\\"gsstx\\\"><span class=\\\"gsstx\\\" style=\\\"font-size:16px;\\\">EPS: US$ 14.1 vs. US$ 7.34 estimated<\\/span><\\/li><li class=\\\"gsstx\\\"><span class=\\\"gsstx\\\" style=\\\"font-size:16px;\\\">Largest quarterly revenue by far is encouraging<\\/span><span class=\\\"gsstx\\\" style=\\\"font-size:16px;\\\">, but\\u00a0<\\/span><a href=\\\"https:\\/\\/www.dailyfx.com\\/forex\\/market_alert\\/2021\\/02\\/02\\/Dow-Jones-SP-500-Recover-Amazon-and-Google-Earnings-Impress.html?ref-author=Yang\\\" class=\\\"gsstx\\\" style=\\\"color:rgb(0,129,194);\\\"><span class=\\\"gsstx\\\" style=\\\"font-size:16px;\\\">c<\\/span><span class=\\\"gsstx\\\" style=\\\"font-size:16px;\\\">hange in CEO<\\/span><\\/a><span class=\\\"gsstx\\\" style=\\\"font-size:16px;\\\">may raise concerns over the transition period<\\/span><\\/li><\\/ul><p class=\\\"gsstx\\\" style=\\\"margin:0.75rem 0px;font-family:Roboto, Arial, Helvetica, sans-serif;font-size:16px;color:rgb(0,0,0);\\\"><span class=\\\"gsstx\\\">Alibaba (beat) :<\\/span><\\/p><ul class=\\\"gsstx\\\" style=\\\"margin-bottom:1rem;font-family:Roboto, Arial, Helvetica, sans-serif;color:rgb(0,0,0);\\\"><li class=\\\"gsstx\\\"><span class=\\\"gsstx\\\" style=\\\"font-size:16px;\\\">Revenue: 221.08 billion yuan, vs. 214.4 billion yuan estimated<\\/span><\\/li><li class=\\\"gsstx\\\"><span class=\\\"gsstx\\\" style=\\\"font-size:16px;\\\">EPS: 22.03 yuan vs. 20.87 yuan estimated<\\/span><\\/li><li class=\\\"gsstx\\\"><span class=\\\"gsstx\\\" style=\\\"font-size:16px;\\\">Core commerce revenue registered 38% yoy growth, and cloud computing business turned profit<\\/span><\\/li><\\/ul><p class=\\\"gsstx\\\" style=\\\"margin:0.75rem 0px;font-family:Roboto, Arial, Helvetica, sans-serif;font-size:16px;color:rgb(0,0,0);\\\"><span class=\\\"gsstx\\\">On the\\u00a0<\\/span><span class=\\\"gsstx\\\" style=\\\"font-weight:bold;\\\">pandemic<\\/span><span class=\\\"gsstx\\\">\\u00a0front, the US has vaccinated 32.22 million people, more than the total number of Covid-19 infections in the country (26.4 million). The 7-day average of the daily new cases has fallen to 146,486 on February 1<\\/span><span class=\\\"gsstx\\\">st<\\/span><span class=\\\"gsstx\\\">\\u00a0from a peak of 259,564 seen on January 8<\\/span><span class=\\\"gsstx\\\">th<\\/span><span class=\\\"gsstx\\\">, marking a rapid decline in new infections with the rollout of vaccines. This trend may hint at a faster removal of lockdowns and normalize in business activity, buoying reflation hopes.<\\/span><\\/p><p class=\\\"gsstx\\\" style=\\\"margin:0.75rem 0px;font-family:Roboto, Arial, Helvetica, sans-serif;font-size:16px;color:rgb(0,0,0);\\\"><span class=\\\"gsstx\\\" style=\\\"font-weight:bold;\\\">WTI crude oil prices<\\/span><span class=\\\"gsstx\\\">\\u00a0advanced to a 12-month high of US$ 54.93, reflecting an improved energy demand outlook as the rollout of coronavirus vaccines have shown effectiveness in bringing down the global infections.<\\/span><\\/p><p class=\\\"gsstx\\\" style=\\\"margin:0.75rem 0px;font-family:Roboto, Arial, Helvetica, sans-serif;font-size:16px;color:rgb(0,0,0);\\\"><span class=\\\"gsstx\\\" style=\\\"font-weight:bold;\\\">Nasdaq 100 Top 10 Stocks Performance 02-02-2021<\\/span><\\/p><a href=\\\"https:\\/\\/a.c-dn.net\\/b\\/3RPYaJ\\/Nasdaq-100-Hang-Seng-ASX-200-Rise-on-Big-Tech-Earnings-Boost-_body_Picture_4.png.full.png\\\" style=\\\"color:rgb(0,129,194);background-color:rgb(255,255,255);font-family:Roboto, Arial, Helvetica, sans-serif;font-size:16px;\\\"><img class=\\\"gsstx dfx-lazyload--loaded\\\" src=\\\"https:\\/\\/a.c-dn.net\\/b\\/313gZz\\/Nasdaq-100-Hang-Seng-ASX-200-Rise-on-Big-Tech-Earnings-Boost-_body_Picture_4.png\\\" alt=\\\"Nasdaq 100, Hang Seng, ASX 200 Rise on Big Tech Earnings Boost\\\" width=\\\"680\\\" height=\\\"224\\\" style=\\\"margin:0.5rem auto;padding-bottom:0px;\\\" \\/><\\/a><p class=\\\"gsstx\\\" style=\\\"margin:0.75rem 0px;font-family:Roboto, Arial, Helvetica, sans-serif;font-size:16px;color:rgb(0,0,0);\\\"><span class=\\\"gsstx\\\">Source: Bloomberg, DailyFX<\\/span><\\/p><p class=\\\"gsstx\\\" style=\\\"margin:0.75rem 0px;font-family:Roboto, Arial, Helvetica, sans-serif;font-size:16px;color:rgb(0,0,0);\\\"><span class=\\\"gsstx\\\">Asia-Pacific markets look set to gain for a third day following a strong US lead overnight. Australia\\u2019s\\u00a0<\\/span><span class=\\\"gsstx\\\" style=\\\"font-weight:bold;\\\"><a href=\\\"https:\\/\\/www.dailyfx.com\\/asx-200\\\" title=\\\"ASX 200\\\" style=\\\"color:rgb(0,129,194);\\\">ASX 200<\\/a>\\u00a0index<\\/span><span class=\\\"gsstx\\\">\\u00a0traded 0.8% higher at open, testing a key resistance level of 6,810. Yesterday, the\\u00a0<\\/span><span class=\\\"gsstx\\\" style=\\\"font-weight:bold;\\\">RBA<\\/span><span class=\\\"gsstx\\\">\\u00a0unexpectedly announced an extension of its asset purchasing program by another A$ 100 billion after the current one expires in April. The move led the\\u00a0<a href=\\\"https:\\/\\/www.dailyfx.com\\/aud\\\" title=\\\"Australian Dollar\\\" style=\\\"color:rgb(0,129,194);\\\">Australian Dollar<\\/a>\\u00a0and the 10-year yield to fall and boosted equity prices. The central bank\\u2019s dovish stance may continue to support a rally in its stock market alongside improvement observed in the labor market.<\\/span><\\/p><p class=\\\"gsstx\\\" style=\\\"margin:0.75rem 0px;font-family:Roboto, Arial, Helvetica, sans-serif;font-size:16px;color:rgb(0,0,0);\\\"><span class=\\\"gsstx\\\">The\\u00a0<\\/span><span class=\\\"gsstx\\\" style=\\\"font-weight:bold;\\\">Hang Seng Index<\\/span><span class=\\\"gsstx\\\">\\u00a0is attempting to recover some lost ground this week as mainland investors returned to bid for tech stocks. Liquidity conditions eased after the PBOC injected CNY 80 billion via reverse repo operations on Tuesday, leading the short-term money market rates to fall. Southbound net capital flows via the stock connections rebounded this week, with HK$ 17.3 billion flowing into the Hong Kong stock market on Tuesday. Total southbound flows contributed to around 30% of total turnover in the HKEX.<\\/span><\\/p><a href=\\\"https:\\/\\/a.c-dn.net\\/b\\/2YVI36\\/Nasdaq-100-Hang-Seng-ASX-200-Rise-on-Big-Tech-Earnings-Boost-_body_Chart_5.png.full.png\\\" style=\\\"color:rgb(0,129,194);background-color:rgb(255,255,255);font-family:Roboto, Arial, Helvetica, sans-serif;font-size:16px;\\\"><img class=\\\"gsstx dfx-lazyload--loaded\\\" src=\\\"https:\\/\\/a.c-dn.net\\/b\\/2wf1uE\\/Nasdaq-100-Hang-Seng-ASX-200-Rise-on-Big-Tech-Earnings-Boost-_body_Chart_5.png\\\" alt=\\\"Nasdaq 100, Hang Seng, ASX 200 Rise on Big Tech Earnings Boost\\\" width=\\\"680\\\" height=\\\"392\\\" style=\\\"margin:0.5rem auto;padding-bottom:0px;\\\" \\/><\\/a><p class=\\\"gsstx\\\" style=\\\"margin:0.75rem 0px;font-family:Roboto, Arial, Helvetica, sans-serif;font-size:16px;color:rgb(0,0,0);\\\"><span class=\\\"gsstx\\\">Source: Bloomberg, DailyFX<\\/span><\\/p><p class=\\\"gsstx\\\" style=\\\"margin:0.75rem 0px;font-family:Roboto, Arial, Helvetica, sans-serif;font-size:16px;color:rgb(0,0,0);\\\"><span class=\\\"gsstx\\\" style=\\\"font-weight:bold;\\\">Nasdaq 100 Index Technical Analysis:<\\/span><\\/p><p class=\\\"gsstx\\\" style=\\\"margin:0.75rem 0px;font-family:Roboto, Arial, Helvetica, sans-serif;font-size:16px;color:rgb(0,0,0);\\\"><span class=\\\"gsstx\\\" style=\\\"font-weight:bold;\\\">Technically<\\/span><span class=\\\"gsstx\\\">, the Nasdaq 100 index has returned to the \\u201cAscending Channel\\u201d and is set to carry on its upward trajectory within it as highlighted in the chart below. The bull trend remains intact and is well-supported by its 50-Day Simple Moving Average (SMA) line. The formation of a bullish MACD crossover suggests that near-term momentum has turned upwards. Immediate support and resistance levels can be found at 13,360 (127.2% Fibonacci extension) and 13,860 (161.8% Fibonacci extension) respectively.<\\/span><\\/p><p class=\\\"gsstx\\\" style=\\\"margin:0.75rem 0px;font-family:Roboto, Arial, Helvetica, sans-serif;font-size:16px;color:rgb(0,0,0);\\\"><span class=\\\"gsstx\\\" style=\\\"font-weight:bold;\\\">Nasdaq 100 Index<\\/span><span class=\\\"gsstx\\\" style=\\\"font-weight:bold;\\\">\\u00a0\\u2013 Daily Chart<\\/span><\\/p><a href=\\\"https:\\/\\/a.c-dn.net\\/b\\/24WFg4\\/Nasdaq-100-Hang-Seng-ASX-200-Rise-on-Big-Tech-Earnings-Boost-_body_Picture_7.png.full.png\\\" style=\\\"color:rgb(0,129,194);background-color:rgb(255,255,255);font-family:Roboto, Arial, Helvetica, sans-serif;font-size:16px;\\\"><img class=\\\"gsstx dfx-lazyload--loaded\\\" src=\\\"https:\\/\\/a.c-dn.net\\/b\\/0C9UGI\\/Nasdaq-100-Hang-Seng-ASX-200-Rise-on-Big-Tech-Earnings-Boost-_body_Picture_7.png\\\" alt=\\\"Nasdaq 100, Hang Seng, ASX 200 Rise on Big Tech Earnings Boost\\\" width=\\\"680\\\" height=\\\"330\\\" style=\\\"margin:0.5rem auto;padding-bottom:0px;\\\" \\/><\\/a><p class=\\\"gsstx\\\" style=\\\"margin:0.75rem 0px;font-family:Roboto, Arial, Helvetica, sans-serif;font-size:16px;color:rgb(0,0,0);\\\"><span class=\\\"gsstx\\\" style=\\\"font-weight:bold;\\\">Hang Seng Index Technical Analysis:<\\/span><\\/p><p class=\\\"gsstx\\\" style=\\\"margin:0.75rem 0px;font-family:Roboto, Arial, Helvetica, sans-serif;font-size:16px;color:rgb(0,0,0);\\\"><span class=\\\"gsstx\\\">The Hang Seng index has regained upward momentum after suffering from severe selling last week. The index has likely found strong support at the 50% Fibonacci retracement level (28,060) and has since rebounded. Clearing the next resistance of 29,160 (23.6% Fibonacci retracement) may open the door for further upside potential with an eye on 30,000-30,140.<\\/span><\\/p>\",\"blog_icon\":\"<i class=\\\"lar la-hospital\\\"><\\/i>\",\"blog_image\":\"5feb0e6005c1e1609240160.jpg\"}', 168, '2020-11-25 00:14:09', '2021-05-23 09:54:16'),
(76, 'blog.element', '{\"id\":\"76\",\"has_image\":[\"1\"],\"title\":\"Bitcoin (BTC) Playing Catch Up as Ethereum (ETH) Surges to Fresh Highs\",\"short_details\":\"Bitcoin (BTC) Playing Catch Up as Ethereum (ETH) Surges to Fresh Highs\",\"description_nic\":\"<h2 class=\\\"article-subheader\\\" style=\\\"margin-top:1rem;margin-bottom:1rem;font-weight:700;line-height:1.2;color:rgb(0,0,0);font-family:Roboto, Arial, Helvetica, sans-serif;font-size:1.3rem;text-transform:uppercase;\\\">BITCOIN, ETHEREUM, ETH\\/USD, BTC\\/USD, BTC\\/ETH RATIO \\u2013 TALKING POINTS:<\\/h2><ul class=\\\"gsstx\\\" style=\\\"margin-bottom:1rem;font-family:Roboto, Arial, Helvetica, sans-serif;color:rgb(0,0,0);\\\"><li class=\\\"gsstx\\\"><span class=\\\"gsstx\\\" style=\\\"font-size:16px;font-style:italic;color:rgb(0,0,0);\\\">The breakdown in the\\u00a0<a href=\\\"https:\\/\\/www.dailyfx.com\\/bitcoin\\\" title=\\\"BTC\\\" style=\\\"color:rgb(0,129,194);\\\">BTC<\\/a>\\/<a href=\\\"https:\\/\\/www.dailyfx.com\\/ether-eth\\\" title=\\\"ETH\\\" style=\\\"color:rgb(0,129,194);\\\">ETH<\\/a>\\u00a0ratio suggests Ethereum may continue outperforming Bitcoin.<\\/span><\\/li><li class=\\\"gsstx\\\"><span class=\\\"gsstx\\\" style=\\\"font-size:16px;font-style:italic;color:rgb(0,0,0);\\\">BTC poised to retest its yearly high after breaching Descending Triangle resistance.<\\/span><\\/li><li class=\\\"gsstx\\\"><span class=\\\"gsstx\\\" style=\\\"font-size:16px;font-style:italic;color:rgb(0,0,0);\\\">ETH looking to extend climb to fresh record highs after penetrating key resistance.<\\/span><\\/li><\\/ul><p class=\\\"gsstx\\\" style=\\\"margin:0.75rem 0px;font-family:Roboto, Arial, Helvetica, sans-serif;font-size:16px;color:rgb(0,0,0);\\\"><a href=\\\"https:\\/\\/www.dailyfx.com\\/forex\\/market_alert\\/2021\\/01\\/26\\/Bitcoin-Ethereum-Outlook-ETH-Poised-to-Outperform-BTC-in-Near-Term.html?ref-author=Moss\\\" class=\\\"gsstx\\\" style=\\\"color:rgb(0,129,194);\\\"><span class=\\\"gsstx\\\" style=\\\"font-size:1rem;\\\">As mentioned in previous reports<\\/span><\\/a><span class=\\\"gsstx\\\" style=\\\"color:rgb(0,0,0);\\\">, the BTC\\/ETH ratio\\u2019s break to its lowest levels since August of 2018 suggests that Ethereum may continue to outperform Bitcoin in the short term. Indeed, this has held true in recent days as the second-most heavily trade cryptocurrency has surged to fresh record highs, while Bitcoin has stagnated above key support.<\\/span><\\/p><p class=\\\"gsstx\\\" style=\\\"margin:0.75rem 0px;font-family:Roboto, Arial, Helvetica, sans-serif;font-size:16px;color:rgb(0,0,0);\\\"><span class=\\\"gsstx\\\" style=\\\"color:rgb(0,0,0);\\\">However, BTC looks set to follow ETH higher, after bursting through key resistance. Here are the key technical levels to watch in the coming weeks.<\\/span><\\/p><h2 class=\\\"article-subheader\\\" style=\\\"margin-top:1rem;margin-bottom:1rem;font-weight:700;line-height:1.2;color:rgb(0,0,0);font-family:Roboto, Arial, Helvetica, sans-serif;font-size:1.3rem;text-transform:uppercase;\\\">BTC\\/ETH RATIO DAILY CHART<\\/h2><a href=\\\"https:\\/\\/a.c-dn.net\\/b\\/1aQRRq\\/Bitcoin-BTC-Playing-Catch-Up-as-Ethereum-ETH-Surges-to-Fresh-Highs_body_Picture_1.png.full.png\\\" style=\\\"color:rgb(0,129,194);background-color:rgb(255,255,255);font-family:Roboto, Arial, Helvetica, sans-serif;font-size:16px;\\\"><img class=\\\"gsstx dfx-lazyload--loaded\\\" src=\\\"https:\\/\\/a.c-dn.net\\/b\\/2Wnzdt\\/Bitcoin-BTC-Playing-Catch-Up-as-Ethereum-ETH-Surges-to-Fresh-Highs_body_Picture_1.png\\\" alt=\\\"Bitcoin (BTC) Playing Catch Up as Ethereum (ETH) Surges to Fresh Highs\\\" width=\\\"680\\\" height=\\\"346\\\" style=\\\"margin:0.5rem auto;padding-bottom:0px;\\\" \\/><\\/a><p class=\\\"gsstx\\\" style=\\\"margin:0.75rem 0px;font-family:Roboto, Arial, Helvetica, sans-serif;font-size:16px;color:rgb(0,0,0);\\\"><span class=\\\"gsstx\\\" style=\\\"font-style:italic;color:rgb(0,0,0);\\\">BTC\\/ETH ratio daily chart created using Tradingview<\\/span><\\/p><h2 class=\\\"article-subheader\\\" style=\\\"margin-top:1rem;margin-bottom:1rem;font-weight:700;line-height:1.2;color:rgb(0,0,0);font-family:Roboto, Arial, Helvetica, sans-serif;font-size:1.3rem;text-transform:uppercase;\\\">BITCOIN (BTC) DAILY CHART \\u2013 DESCENDING TRIANGLE BREAK HINTS AT GAINS<\\/h2><p class=\\\"gsstx\\\" style=\\\"margin:0.75rem 0px;font-family:Roboto, Arial, Helvetica, sans-serif;font-size:16px;color:rgb(0,0,0);\\\"><span class=\\\"gsstx\\\" style=\\\"color:rgb(0,0,0);\\\">Bitcoin looks poised to extend recent gains, as prices burst above Descending Triangle resistance and the psychologically imposing 35,000 mark. With the RSI eyeing a push above 60, and a bullish crossover taking place on the MACD indicator, the path of least resistance seems skewed to the topside.<\\/span><\\/p><p class=\\\"gsstx\\\" style=\\\"margin:0.75rem 0px;font-family:Roboto, Arial, Helvetica, sans-serif;font-size:16px;color:rgb(0,0,0);\\\"><span class=\\\"gsstx\\\" style=\\\"color:rgb(0,0,0);\\\">Clearing the January 29 high (38711) would probably intensify near-term buying pressure and carve a path for price to challenge the yearly high (41969).Breaking that is needed to signal the resumption of the primary uptrend and pave the way for the popular cryptocurrency to fulfil the Descending Triangle\\u2019s implied measured move (47699).<\\/span><\\/p><p class=\\\"gsstx\\\" style=\\\"margin:0.75rem 0px;font-family:Roboto, Arial, Helvetica, sans-serif;font-size:16px;color:rgb(0,0,0);\\\"><span class=\\\"gsstx\\\" style=\\\"color:rgb(0,0,0);\\\">Alternatively, failing to breach the 38700 mark could trigger a pullback to former resistance-turned-support at the January 2 high (33292).<\\/span><\\/p><a href=\\\"https:\\/\\/a.c-dn.net\\/b\\/11OION\\/Bitcoin-BTC-Playing-Catch-Up-as-Ethereum-ETH-Surges-to-Fresh-Highs_body_Picture_4.png.full.png\\\" style=\\\"color:rgb(0,129,194);background-color:rgb(255,255,255);font-family:Roboto, Arial, Helvetica, sans-serif;font-size:16px;\\\"><img class=\\\"gsstx dfx-lazyload--loaded\\\" src=\\\"https:\\/\\/a.c-dn.net\\/b\\/2LSos1\\/Bitcoin-BTC-Playing-Catch-Up-as-Ethereum-ETH-Surges-to-Fresh-Highs_body_Picture_4.png\\\" alt=\\\"Bitcoin (BTC) Playing Catch Up as Ethereum (ETH) Surges to Fresh Highs\\\" width=\\\"680\\\" height=\\\"333\\\" style=\\\"margin:0.5rem auto;padding-bottom:0px;\\\" \\/><\\/a><p class=\\\"gsstx\\\" style=\\\"margin:0.75rem 0px;font-family:Roboto, Arial, Helvetica, sans-serif;font-size:16px;color:rgb(0,0,0);\\\"><span class=\\\"gsstx\\\" style=\\\"font-style:italic;color:rgb(0,0,0);\\\">BTC daily chart created using Tradingview<\\/span><\\/p><h2 class=\\\"article-subheader\\\" style=\\\"margin-top:1rem;margin-bottom:1rem;font-weight:700;line-height:1.2;color:rgb(0,0,0);font-family:Roboto, Arial, Helvetica, sans-serif;font-size:1.3rem;text-transform:uppercase;\\\">IG CLIENT SENTIMENT REPORT<\\/h2><p class=\\\"gsstx\\\" style=\\\"margin:0.75rem 0px;font-family:Roboto, Arial, Helvetica, sans-serif;font-size:16px;color:rgb(0,0,0);\\\"><span class=\\\"gsstx\\\" style=\\\"color:rgb(0,0,0);\\\">The\\u00a0<\\/span><a href=\\\"https:\\/\\/www.dailyfx.com\\/sentiment-report?ref-author=Moss\\\" class=\\\"gsstx\\\" style=\\\"color:rgb(0,129,194);\\\"><span class=\\\"gsstx\\\" style=\\\"font-size:1rem;\\\">IG Client Sentiment Report<\\/span><\\/a><span class=\\\"gsstx\\\" style=\\\"color:rgb(0,0,0);\\\">\\u00a0shows 83.58% of traders are net-long with the ratio of traders long to short at 5.09 to 1. The number of traders net-long is 2.05% lower than yesterday and 9.82% lower from last week, while the number of traders net-short is 1.30% higher than yesterday and 9.11% lower from last week.<\\/span><\\/p><p class=\\\"gsstx\\\" style=\\\"margin:0.75rem 0px;font-family:Roboto, Arial, Helvetica, sans-serif;font-size:16px;color:rgb(0,0,0);\\\"><span class=\\\"gsstx\\\" style=\\\"color:rgb(0,0,0);\\\">We typically take a contrarian view to crowd sentiment, and the fact traders are net-long suggests Bitcoin prices may continue to fall.<\\/span><\\/p><p class=\\\"gsstx\\\" style=\\\"margin:0.75rem 0px;font-family:Roboto, Arial, Helvetica, sans-serif;font-size:16px;color:rgb(0,0,0);\\\"><span class=\\\"gsstx\\\" style=\\\"color:rgb(0,0,0);\\\">Yet traders are less net-long than yesterday and compared with last week. Recent changes in sentiment warn that the current Bitcoin price trend may soon reverse higher despite the fact traders remain net-long.<\\/span><\\/p><img class=\\\"gsstx dfx-lazyload--loaded\\\" src=\\\"https:\\/\\/a.c-dn.net\\/b\\/4vXvJg\\/Bitcoin-BTC-Playing-Catch-Up-as-Ethereum-ETH-Surges-to-Fresh-Highs_body_Bitcoin_Client_Positioning.png\\\" alt=\\\"Bitcoin (BTC) Playing Catch Up as Ethereum (ETH) Surges to Fresh Highs\\\" width=\\\"680\\\" height=\\\"453\\\" style=\\\"font-family:Roboto, Arial, Helvetica, sans-serif;margin:0.5rem auto;padding-bottom:0px;color:rgb(0,0,0);\\\" \\/><h2 class=\\\"article-subheader\\\" style=\\\"margin-top:1rem;margin-bottom:1rem;font-weight:700;line-height:1.2;color:rgb(0,0,0);font-family:Roboto, Arial, Helvetica, sans-serif;font-size:1.3rem;text-transform:uppercase;\\\">ETHEREUM (ETH) DAILY CHART \\u2013 BREACH OF KEY RESISTANCE OPENS DOOR TO FRESH HIGHS<\\/h2><p class=\\\"gsstx\\\" style=\\\"margin:0.75rem 0px;font-family:Roboto, Arial, Helvetica, sans-serif;font-size:16px;color:rgb(0,0,0);\\\"><span class=\\\"gsstx\\\" style=\\\"color:rgb(0,0,0);\\\">Ethereum also appears poised to continue its recent surge higher, after piercing through range resistance at 1400 \\u2013 1440.<\\/span><\\/p><p class=\\\"gsstx\\\" style=\\\"margin:0.75rem 0px;font-family:Roboto, Arial, Helvetica, sans-serif;font-size:16px;color:rgb(0,0,0);\\\"><span class=\\\"gsstx\\\" style=\\\"color:rgb(0,0,0);\\\">A bullish crossover on the MACD indicator, in tandem with the RSI gearing up for a push into overbought territory, hints at further upside in the near term.<\\/span><\\/p><p class=\\\"gsstx\\\" style=\\\"margin:0.75rem 0px;font-family:Roboto, Arial, Helvetica, sans-serif;font-size:16px;color:rgb(0,0,0);\\\"><span class=\\\"gsstx\\\" style=\\\"color:rgb(0,0,0);\\\">Hurdling the psychologically imposing 1600 mark would probably ignite a more impulsive upside push to probe the 100% Fibonacci (1726).<\\/span><\\/p><p class=\\\"gsstx\\\" style=\\\"margin:0.75rem 0px;font-family:Roboto, Arial, Helvetica, sans-serif;font-size:16px;color:rgb(0,0,0);\\\"><span class=\\\"gsstx\\\" style=\\\"color:rgb(0,0,0);\\\">However, failing to breach psychological resistance could result in price pulling back to former resistance-turned0support at the 2018 high (1424).<\\/span><\\/p>\",\"blog_icon\":\"<i class=\\\"las la-history\\\"><\\/i>\",\"blog_image\":\"5feb2f0231bd81609248514.jpg\"}', 73, '2020-11-25 00:17:48', '2021-05-26 02:31:16'),
(77, 'affiliation.content', '{\"heading\":\"Changalab Affiliates\",\"sub_heading\":\"Changalab - Secure and Suitable Currency Exchange Platform\",\"description\":\"Changalab Affiliates, our program is an opportunity for affiliates to create an additional revenue stream.\\n\\nPromote Changalab, connect with potential digital wallet holders, and earn a lifetime revenue share.\"}', NULL, '2020-11-25 00:46:02', '2021-02-04 19:29:18'),
(83, 'affiliation.element', '{\"title\":\"Modi unde beatae et sequi rerum explicabo ipsum perferendis dolor sed repellat accusamus asperiores, esse ea sunt commodi, quisquam suscipit at! Consequatur ad ab veniam.\"}', NULL, '2020-11-25 00:55:16', '2020-11-25 00:55:16'),
(84, 'affiliation.element', '{\"title\":\"Modi unde beatae et sequi rerum explicabo ipsum perferendis dolor sed repellat accusamus asperiores, esse ea sunt commodi, quisquam suscipit at! Consequatur ad ab veniam.\"}', NULL, '2020-11-25 00:55:21', '2020-11-25 00:55:21'),
(85, 'affiliation.element', '{\"title\":\"Modi unde beatae et sequi rerum explicabo ipsum perferendis dolor sed repellat accusamus asperiores, esse ea sunt commodi, quisquam suscipit at! Consequatur ad ab veniam.\"}', NULL, '2020-11-25 00:55:25', '2020-11-25 00:55:25'),
(86, 'affiliation.element', '{\"title\":\"Modi unde beatae et sequi rerum explicabo ipsum perferendis dolor sed repellat accusamus asperiores, esse ea sunt commodi, quisquam suscipit at! Consequatur ad ab veniam.\"}', NULL, '2020-11-25 00:55:29', '2020-11-25 00:55:29'),
(87, 'call.content', '{\"has_image\":\"1\",\"heading\":\"What Are You Thinking About? Join And Earn\",\"sub_heading\":\"Changylab- Secure and Suitable Currency Exchange Platform\",\"button_text\":\"Join Us\",\"button_url\":\"Register\",\"image\":\"5fbe052fe91461606288687.jpg\"}', NULL, '2020-11-25 01:15:40', '2021-02-03 23:41:49'),
(88, 'how_works.content', '{\"heading\":\"How It Works\",\"sub_heading\":\"Please visit the Changalab Affiliation process\"}', NULL, '2020-11-25 01:28:04', '2021-02-04 19:40:41');
INSERT INTO `frontends` (`id`, `data_keys`, `data_values`, `clicks`, `created_at`, `updated_at`) VALUES
(93, 'policy.content', '{\"has_image\":\"1\",\"title\":\"Personally Identifiable Information Collected by Changalab\",\"description\":\"<p class=\\\"MsoNormal\\\" style=\\\"margin-bottom:0.0001pt;line-height:normal;\\\"><b><span style=\\\"font-size:13.5pt;font-family:Arial, sans-serif;color:#444444;\\\">Privacy Policy<\\/span><\\/b><span style=\\\"font-size:12pt;font-family:Arial, sans-serif;color:#444444;\\\"><br \\/><\\/span><span style=\\\"font-size:11.5pt;font-family:Arial, sans-serif;\\\">Welcome to our site (\\\"Site\\\"). Changalab\\nknows how our clients and visitors like you value your privacy, and we have\\ncreated this privacy policy to ensure that you understand our policies and\\nprocedures, what personally identifiable information you must provide if you\\nwish to use the Site and, ultimately, just how we use such personally\\nidentifiable information.<\\/span><span style=\\\"font-size:12pt;font-family:Arial, sans-serif;\\\"><\\/span><\\/p><p><\\/p><p class=\\\"MsoNormal\\\" style=\\\"margin-bottom:0.0001pt;line-height:normal;\\\"><span style=\\\"font-size:11.5pt;font-family:Arial, sans-serif;color:#444444;\\\">This policy applies\\nonly to the web site located at www.Changylabexchange.com, and not to any other\\nweb site or service. If you do not agree with this policy, then you should not\\nuse the Site<\\/span><span style=\\\"font-size:12pt;font-family:Arial, sans-serif;\\\"><\\/span><\\/p><p><\\/p><p class=\\\"MsoNormal\\\" style=\\\"margin-top:8.25pt;margin-right:0in;margin-bottom:0.0001pt;margin-left:0in;line-height:normal;\\\"><i><span style=\\\"font-size:13.5pt;font-family:Arial, sans-serif;color:#00073E;\\\">Personally, Identifiable Information Collected\\nby Changalab<\\/span><\\/i><span style=\\\"font-size:13.5pt;font-family:Arial, sans-serif;color:#34495E;\\\"><\\/span><\\/p><p><\\/p><p class=\\\"MsoNormal\\\" style=\\\"margin-bottom:0.0001pt;line-height:20.65pt;\\\"><i><span style=\\\"font-size:12pt;font-family:Georgia, serif;color:#444444;\\\">Changalab may collect and store personally identifiable\\ninformation about you if you voluntarily submit such information to Changylab.\\nPersonally, identifiable information may include your name, email address,\\nphysical address and other information that specifically identifies you.<\\/span><\\/i><span style=\\\"font-size:12pt;font-family:Arial, sans-serif;\\\"><\\/span><\\/p><p><\\/p><p class=\\\"MsoNormal\\\" style=\\\"margin:8.25pt 0in 0.0001pt;line-height:normal;\\\"><span style=\\\"font-size:13.5pt;font-family:Arial, sans-serif;color:#00073E;\\\">Non\\u00adPersonally\\nIdentifiable Information Collected by Changalab<\\/span><span style=\\\"font-size:13.5pt;font-family:Arial, sans-serif;color:#34495E;\\\"><\\/span><\\/p><p><\\/p><p class=\\\"MsoNormal\\\" style=\\\"margin-bottom:0.0001pt;line-height:normal;\\\"><span style=\\\"font-size:11.5pt;font-family:Arial, sans-serif;color:#444444;\\\">Changylab may also\\nautomatically collect (through cookies, described below, and other methods) and\\nstore aggregate or anonymous information about user contact with and use of the\\nSite. Examples of this type of information include demographic information, the\\ntype of internet browser you are using, the type of computer operating system\\napplication software and peripherals you are using, the domain name of the web\\nsite from which you linked to our Site and your browsing habits on and usage of\\nthe Site. Non\\u00adPersonally identifiable information may also include personally\\nidentifiable information that has been aggregated so that no one individual is\\nspecifically identifiable (such as, how many users in a particular city access\\nthe Site).<\\/span><span style=\\\"font-size:12pt;font-family:Arial, sans-serif;\\\"><\\/span><\\/p><p><\\/p><p class=\\\"MsoNormal\\\" style=\\\"margin:8.25pt 0in 0.0001pt;line-height:normal;\\\"><span style=\\\"font-size:13.5pt;font-family:Arial, sans-serif;color:#00073E;\\\">How We Use Your\\nPersonally Identifiable Information<\\/span><span style=\\\"font-size:13.5pt;font-family:Arial, sans-serif;color:#34495E;\\\"><\\/span><\\/p><p><\\/p><p class=\\\"MsoNormal\\\" style=\\\"margin-bottom:0.0001pt;line-height:normal;\\\"><span style=\\\"font-size:11.5pt;font-family:Arial, sans-serif;color:#444444;\\\">Changylab will only\\nuse your personally identifiable information as described in this policy. Changylab\\nmay use the personally identifiable information we collect to contact you about\\nour products and services or those of our clients or other third parties from\\ntime to time. Except for the parties described below, we do not sell or share\\nyour personally identifiable information with third parties without your\\nconsent. We may share your personally identifiable information with our clients\\n(if they have agreed to comply with privacy protections similar to those set\\nforth in this policy), companies that are affiliates of Changylab, technical\\nconsultants and other third parties who make our Site available, enhance its\\nfunctionality, or provide associated services (but only for the purpose of\\nproviding such services to CHANGYLAB<\\/span><span style=\\\"font-size:12pt;font-family:Arial, sans-serif;\\\"><\\/span><\\/p><p><\\/p><p class=\\\"MsoNormal\\\" style=\\\"margin:8.25pt 0in 0.0001pt;line-height:normal;\\\"><span style=\\\"font-size:13.5pt;font-family:Arial, sans-serif;color:#00073E;\\\">Non\\u00adPersonally\\nIdentifiable Information Collected by Changalab<\\/span><span style=\\\"font-size:13.5pt;font-family:Arial, sans-serif;color:#34495E;\\\"><\\/span><\\/p><p><\\/p><p class=\\\"MsoNormal\\\" style=\\\"margin-bottom:0.0001pt;line-height:normal;\\\"><span style=\\\"font-size:11.5pt;font-family:Arial, sans-serif;color:#444444;\\\">Information obtained\\nin connection with the Site may be intermingled with and used by us in\\nconjunction with information obtained through sources other than the Site,\\nincluding both offline and online sources.<\\/span><span style=\\\"font-size:12pt;font-family:Arial, sans-serif;\\\"><\\/span><\\/p><p><\\/p><p class=\\\"MsoNormal\\\" style=\\\"margin-bottom:0.0001pt;line-height:normal;\\\"><span style=\\\"font-size:11.5pt;font-family:Arial, sans-serif;color:#444444;\\\">We reserve the right\\nto transfer any information to our successors in business and purchasers of\\nSite assets or a particular division or line of business.<\\/span><span style=\\\"font-size:12pt;font-family:Arial, sans-serif;\\\"><\\/span><\\/p><p><\\/p><p class=\\\"MsoNormal\\\" style=\\\"margin-bottom:0.0001pt;line-height:normal;\\\"><span style=\\\"font-size:11.5pt;font-family:Arial, sans-serif;color:#444444;\\\">We also reserve the\\nright to access and\\/or disclose any information as required by courts or\\nadministrative agencies and to the extent necessary to permit us to investigate\\nsuspected fraud, harassment or other violations of any law, rule or regulation,\\nthe Site rules or policies, or the rights of third parties or to investigate\\nany suspected conduct which CHANGALAB deems improper<\\/span><span style=\\\"font-size:12pt;font-family:Arial, sans-serif;\\\"><\\/span><\\/p><p><\\/p><p class=\\\"MsoNormal\\\" style=\\\"margin-bottom:0.0001pt;line-height:normal;\\\"><span style=\\\"font-size:11.5pt;font-family:Arial, sans-serif;color:#444444;\\\">How We Use Your Non\\u00adPersonally\\nIdentifiable Information We may share non\\u00adpersonally identifiable information\\nwith third parties for any number of reasons, including advertising, promotional\\nand\\/or other purposes.<\\/span><span style=\\\"font-size:12pt;font-family:Arial, sans-serif;\\\"><\\/span><\\/p><p><\\/p><p class=\\\"MsoNormal\\\" style=\\\"margin:8.25pt 0in 0.0001pt;line-height:normal;\\\"><span style=\\\"font-size:13.5pt;font-family:Arial, sans-serif;color:#00073E;\\\">Cookies<\\/span><span style=\\\"font-size:13.5pt;font-family:Arial, sans-serif;color:#34495E;\\\"><\\/span><\\/p><p><\\/p><p class=\\\"MsoNormal\\\" style=\\\"margin-bottom:0.0001pt;line-height:normal;\\\"><span style=\\\"font-size:11.5pt;font-family:Arial, sans-serif;color:#444444;\\\">We may use cookies and\\nsimilar technologies to collect non\\u00adpersonally identifiable information from\\nyou and to customize your use of the Site. A cookie is a small data file that\\ncertain websites write to your hard drive when you visit them. We may also use\\nweb bugs, clear gifs, and similar technologies that collect data similar to that\\ncollected by a cookie. A cookie file can contain various types of information,\\nincluding a user ID that the site uses to track the pages you have visited.<\\/span><span style=\\\"font-size:12pt;font-family:Arial, sans-serif;\\\"><\\/span><\\/p><p><\\/p><p class=\\\"MsoNormal\\\" style=\\\"margin-bottom:0.0001pt;line-height:normal;\\\"><span style=\\\"font-size:11.5pt;font-family:Arial, sans-serif;color:#444444;\\\">Most browsers are\\ninitially set up to accept cookies\\u037e however, you can reset your browser to\\nrefuse all cookies or indicate when a cookie is being sent or you can flush\\nyour browser of cookies from time to time. (Note: you may need to consult the\\nhelp area of your browser application for instructions.) If you choose to\\ndisable cookies or refuse to accept a cookie, you may not be able to utilize\\nall features of the Site.<\\/span><span style=\\\"font-size:12pt;font-family:Arial, sans-serif;\\\"><\\/span><\\/p><p><\\/p><p class=\\\"MsoNormal\\\" style=\\\"margin-bottom:0.0001pt;line-height:normal;\\\"><span style=\\\"font-size:11.5pt;font-family:Arial, sans-serif;color:#444444;\\\">At times, some of our\\nadvertisers and their ad service providers set cookies when you click their\\nadvertising banners. While we use cookies in other parts of the Site (as\\ndiscussed above), cookies received with banner ads are collected by those\\nadvertisers and their ad service providers. The advertiser\\u2019s privacy policy and\\/or\\nthat of its service provider will govern the use of this information and CHANGYLAB\\nis not responsible for the privacy practices of such advertiser or ad service\\nprovider.<\\/span><span style=\\\"font-size:12pt;font-family:Arial, sans-serif;\\\"><\\/span><\\/p><p><\\/p><p class=\\\"MsoNormal\\\" style=\\\"margin:8.25pt 0in 0.0001pt;line-height:normal;\\\"><span style=\\\"font-size:13.5pt;font-family:Arial, sans-serif;color:#00073E;\\\">Links<\\/span><span style=\\\"font-size:13.5pt;font-family:Arial, sans-serif;color:#34495E;\\\"><\\/span><\\/p><p><\\/p><p class=\\\"MsoNormal\\\" style=\\\"margin-bottom:0.0001pt;line-height:normal;\\\"><span style=\\\"font-size:11.5pt;font-family:Arial, sans-serif;color:#444444;\\\">The Site may contain\\nlinks to web sites maintained by third parties. CHANGALAB is not responsible\\nfor the privacy practices of such third party sites. You should carefully read\\ntheir own privacy policies before providing any information to such third\\nparties.<\\/span><span style=\\\"font-size:12pt;font-family:Arial, sans-serif;\\\"><\\/span><\\/p><p><\\/p><p class=\\\"MsoNormal\\\" style=\\\"margin:8.25pt 0in 0.0001pt;line-height:normal;\\\"><span style=\\\"font-size:13.5pt;font-family:Arial, sans-serif;color:#00073E;\\\">Opt\\u00adOut Procedures<\\/span><span style=\\\"font-size:13.5pt;font-family:Arial, sans-serif;color:#34495E;\\\"><\\/span><\\/p><p><\\/p><p class=\\\"MsoNormal\\\" style=\\\"margin-bottom:0.0001pt;line-height:normal;\\\"><span style=\\\"font-size:11.5pt;font-family:Arial, sans-serif;color:#444444;\\\">You have the option to\\nopt\\u00adout of receiving information from Changylab. This opt-out messaging will\\nappear at the bottom of every promotional email that is sent out to you by Changylab\\nin relation to this Site. Changylab also gives you the option to remove your\\ninformation from its database of active users. If you no longer wish to take\\nadvantage of this Site or to receive any form of direct contact from Changylab,\\nwhether it is email, discounts, newsletters, or other promotional offers or\\nmaterials, or wish us to delete your personally identifiable information from\\nour database of active users, send us a request marked \\\"Privacy\\u00adUrgent\\\",\\nand contact us<\\/span><span style=\\\"font-size:12pt;font-family:Arial, sans-serif;\\\"><\\/span><\\/p><p><\\/p><p class=\\\"MsoNormal\\\" style=\\\"margin-bottom:0.0001pt;line-height:normal;\\\"><span style=\\\"font-size:11.5pt;font-family:Arial, sans-serif;color:#444444;\\\">However, Changylab is\\nnot responsible for removing information from third-party lists or databases\\nof any kind, if we have shared your information with such third parties as\\npermitted by this policy. Please note that notwithstanding the fact that we\\nmay have removed your information from our list of active users, we reserve the\\nright to keep any information submitted or collected for business reasons, such\\nas archiving data.<\\/span><span style=\\\"font-size:12pt;font-family:Arial, sans-serif;\\\"><\\/span><\\/p><p><\\/p><p class=\\\"MsoNormal\\\" style=\\\"margin-bottom:0.0001pt;line-height:normal;\\\"><span style=\\\"font-size:12pt;font-family:Arial, sans-serif;\\\">\\u00a0<\\/span><\\/p><p><\\/p><p style=\\\"margin:0in 0in 16.5pt;\\\">\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n\\n<\\/p><p class=\\\"MsoNormal\\\"><\\/p><p>\\u00a0<\\/p>\",\"image\":\"5fbe1dc3394d11606294979.jpg\"}', NULL, '2020-11-25 03:00:19', '2021-02-04 19:43:49'),
(94, 'client.element', '{\"id\":\"94\",\"name\":\"Robart\",\"designation\":\"Businessman\",\"description\":\"This is a trustable site, I have joined here recently but their working process is so user-friendly and riable.\"}', NULL, '2020-11-28 23:44:00', '2021-02-03 20:09:56'),
(95, 'client.element', '{\"id\":\"95\",\"name\":\"Faisal Kabir\",\"designation\":\"Group General Counsel and Compliance Officer\",\"description\":\"I joined here in 2017, this is legal, compliance, risk, financial crime, internal audit and company secretariat teams.\"}', NULL, '2020-11-28 23:44:22', '2021-02-03 19:52:32'),
(96, 'client.element', '{\"id\":\"96\",\"name\":\"Nadine Reeves\",\"designation\":\"Chief Executive Officer\",\"description\":\"Changalab is the largest financial market in the world, it is a relatively unfamiliar terrain for retail traders.\"}', NULL, '2020-11-28 23:44:54', '2021-02-03 19:50:57'),
(98, 'footer.element', '{\"id\":\"98\",\"icon_title\":\"youtube\",\"feature_icon\":\"<i class=\\\"fab fa-youtube\\\"><\\/i>\",\"url\":\"https:\\/\\/www.youtube.com\\/\"}', NULL, '2020-12-28 14:26:18', '2020-12-28 14:28:49'),
(99, 'social_icon.element', '{\"id\":\"99\",\"title\":\"facebook\",\"social_icon\":\"<i class=\\\"fab fa-facebook-f\\\"><\\/i>\",\"url\":\"https:\\/\\/www.facebook.com\\/\"}', NULL, '2020-12-29 09:43:48', '2020-12-29 09:48:55'),
(100, 'social_icon.element', '{\"id\":\"100\",\"title\":\"twitter\",\"social_icon\":\"<i class=\\\"fab fa-twitter\\\"><\\/i>\",\"url\":\"https:\\/\\/www.twitter.com\\/\"}', NULL, '2020-12-29 09:45:32', '2020-12-29 09:48:45'),
(101, 'reserve.content', '{\"heading\":\"Our Reserved Currency\",\"sub_heading\":\"We support the most secure services and features. This secured website supports a user-friendly interface and various attractive features that ready to use.\",\"button_text\":\"Load More\"}', NULL, '2021-01-02 09:37:33', '2021-01-02 11:07:14'),
(102, 'footer.element', '{\"icon_title\":\"pinterest\",\"feature_icon\":\"<i class=\\\"fab fa-pinterest-p\\\"><\\/i>\",\"url\":\"https:\\/\\/www.google.com\\/\"}', NULL, '2021-02-02 10:15:01', '2021-02-02 10:15:01'),
(106, 'feature.element', '{\"id\":\"106\",\"title\":\"Reliable\",\"description\":\"We are highly reliable and trusted by thousands of people. Your security is our top priority.\",\"feature_icon\":\"<i class=\\\"far fa-heart\\\"><\\/i>\"}', NULL, '2021-02-03 22:56:18', '2021-02-03 22:56:47'),
(107, 'feature.element', '{\"id\":\"107\",\"title\":\"Crypto\",\"description\":\"Our platform supports all types of cryptocurrency having an easy deposit and withdrawal system.\",\"feature_icon\":\"<i class=\\\"fas fa-money-check-alt\\\"><\\/i>\"}', NULL, '2021-02-03 22:57:26', '2021-02-03 22:58:40'),
(108, 'feature.element', '{\"id\":\"108\",\"title\":\"24\\/7 Support\",\"description\":\"We are here for you. We provide 24\\/7 customer support through e-mail and support tickets.\",\"feature_icon\":\"<i class=\\\"fas fa-hands-helping\\\"><\\/i>\"}', NULL, '2021-02-03 22:59:39', '2021-02-03 23:00:24'),
(109, 'counter.element', '{\"id\":\"109\",\"title\":\"Currency\",\"counter_digit\":\"20\",\"counter_icon\":\"<i class=\\\"fas fa-money-bill-alt\\\"><\\/i>\"}', NULL, '2021-03-21 11:44:21', '2021-03-21 11:44:41'),
(110, 'counter.element', '{\"title\":\"Transaction\",\"counter_digit\":\"93\",\"counter_icon\":\"<i class=\\\"fas fa-money-check-alt\\\"><\\/i>\"}', NULL, '2021-03-21 11:47:21', '2021-03-21 11:47:21'),
(111, 'counter.element', '{\"title\":\"Customer\",\"counter_digit\":\"98.4\",\"counter_icon\":\"<i class=\\\"fas fa-users\\\"><\\/i>\"}', NULL, '2021-03-21 11:47:52', '2021-03-21 11:47:52'),
(112, 'counter.element', '{\"title\":\"Exchange\",\"counter_digit\":\"20\",\"counter_icon\":\"<i class=\\\"fas fa-exchange-alt\\\"><\\/i>\"}', NULL, '2021-03-21 11:48:21', '2021-03-21 11:48:21'),
(113, 'service.element', '{\"id\":\"113\",\"title\":\"Advanced Security\",\"service_icon\":\"<i class=\\\"fas fa-user-clock\\\"><\\/i>\",\"description\":\"Our SSL encryption protects your data and money transfer process.\",\"button_text\":\"Get Service\",\"button_url\":\"http:\\/\\/localhost\\/currencia\"}', NULL, '2021-03-21 12:51:07', '2021-03-21 12:53:17'),
(114, 'service.element', '{\"id\":\"114\",\"title\":\"Multiple Wallet\",\"service_icon\":\"<i class=\\\"fas fa-wallet\\\"><\\/i>\",\"description\":\"We offer multiple wallet with instant payment system to thousand of site.\",\"button_text\":\"Get Service\",\"button_url\":\"http:\\/\\/localhost\\/currencia\"}', NULL, '2021-03-21 12:51:43', '2021-03-21 12:53:34'),
(115, 'service.element', '{\"id\":\"115\",\"title\":\"Simple To Integrate\",\"service_icon\":\"<i class=\\\"fab fa-simplybuilt\\\"><\\/i>\",\"description\":\"We offer a simple integration where you can enable 100+ local payment methods.\",\"button_text\":\"Get Service\",\"button_url\":\"http:\\/\\/localhost\\/currencia\"}', NULL, '2021-03-21 12:52:36', '2021-03-21 13:26:40'),
(116, 'howto.content', '{\"has_image\":\"1\",\"background_image\":\"60575a1aecb201616337434.jpg\"}', NULL, '2021-03-21 14:37:14', '2021-03-21 14:37:15'),
(117, 'howto.element', '{\"id\":\"117\",\"how_icon\":\"<i class=\\\"fas fa-retweet\\\"><\\/i>\",\"title\":\"Pair Your Currency\"}', NULL, '2021-03-21 14:39:16', '2021-03-21 14:42:29'),
(118, 'howto.element', '{\"id\":\"118\",\"how_icon\":\"<i class=\\\"fas fa-check\\\"><\\/i>\",\"title\":\"Confirm Your Exchange\"}', NULL, '2021-03-21 14:40:25', '2021-03-21 14:41:19'),
(119, 'howto.element', '{\"how_icon\":\"<i class=\\\"fas fa-money-check-alt\\\"><\\/i>\",\"title\":\"Get Expected Currency\"}', NULL, '2021-03-21 14:40:44', '2021-03-21 14:40:44'),
(120, 'policy.element', '{\"title\":\"Privacy and  Policy\",\"description\":\"<div class=\\\"content-block\\\" style=\\\"color:rgb(111,111,111);font-family:Roboto, sans-serif;\\\"><h4 class=\\\"content__title\\\" style=\\\"margin-bottom:20px;font-weight:600;font-size:22px;font-family:\'Baloo Tammudu 2\', cursive;color:rgb(54,54,54);\\\">Metus laoreet vestibulum aliquam elit. Magna lacinia vitae, id lacus etiam lectus<\\/h4><p style=\\\"margin-right:0px;margin-left:0px;font-size:16px;color:rgb(111,111,111);\\\">Mollis nam ante libero netus. Elit massa ut egestas nisl lacus. Libero litora montes vulputate, porta vel orci maiores ultricies maecenas, placerat vehicula non. Ipsum suspendisse metus lobortis et in, sem nunc vitae metus pellentesque, vel orci ac ultrices. Ut arcu eget erat, sapien suspendisse mauris mauris mollis conubia tortor, nulla venenatis tortor semper sed. Aute sit elementum condimentum, iaculis non. Pellentesque dictum, metus dolor enim nec eget aut quisque, bibendum ut arcu magnis sed cursus.<\\/p><p style=\\\"margin-right:0px;margin-left:0px;font-size:16px;color:rgb(111,111,111);\\\">Nunc in fringilla aptent. Nonummy diam sed, metus odio pretium elit. Mi sit bibendum orci, ac dolorum neque id nunc vel arcu, hic diam at ipsum dolor eu, porttitor ac suspendisse varius pulvinar a. Elit sed, dolor scelerisque congue, nisl rutrum, amet integer arcu dolor velit. Non suspendisse et ligula ut posuere nec, urna mollis congue morbi arcu augue. Sem ac id eu vehicula eu. Commodo vestibulum dui et duis, turpis sit varius ut euismod. Amet<\\/p><\\/div><div class=\\\"content-block\\\" style=\\\"margin-top:50px;color:rgb(111,111,111);font-family:Roboto, sans-serif;\\\"><h4 class=\\\"content__title\\\" style=\\\"margin-bottom:20px;font-weight:600;font-size:22px;font-family:\'Baloo Tammudu 2\', cursive;color:rgb(54,54,54);\\\">Where we transfer and\\/or store your personal information<\\/h4><p style=\\\"margin-right:0px;margin-left:0px;font-size:16px;color:rgb(111,111,111);\\\">Eget lacus, consectetuer sed ut, et ut suspendisse interdum pede in. Mattis etiam et. Eros mauris. Dictumst at consectetuer semper libero ipsum, pellentesque eu dolor platea amet sapien, erat wisi vitae eget in, ante leo purus consectetuer gravida sed, at et. Lacinia scelerisque lacus parturient porttitor quis amet, sollicitudin volutpat magna sus Ut a ipsum luctus, tincidunt mauris eos sollicitudin, nascetur a ac iaculis cum praesent, sollicitudin elementum<\\/p><\\/div><div class=\\\"content-block\\\" style=\\\"margin-top:50px;color:rgb(111,111,111);font-family:Roboto, sans-serif;\\\"><h4 class=\\\"content__title\\\" style=\\\"margin-bottom:20px;font-weight:600;font-size:22px;font-family:\'Baloo Tammudu 2\', cursive;color:rgb(54,54,54);\\\">Information about Me<\\/h4><p style=\\\"margin-right:0px;margin-left:0px;font-size:16px;color:rgb(111,111,111);\\\">Eget lacus, consectetuer sed ut, et ut suspendisse interdum pede in. Mattis etiam et. Eros mauris. Dictumst at consectetuer semper libero ipsum, pellentesque eu dolor platea amet sapien, erat wisi vitae eget in, ante leo purus consectetuer gravida sed, at et. Lacinia scelerisque lacus parturient porttitor quis amet, sollicitudin volutpat magna sus Ut a ipsum luctus, tincidunt mauris eos sollicitudin, nascetur a ac iaculis cum praesent, sollicitudin elementum aliquet non ligula, vivamus aenean a nullam convallis elit magna. Ligula dapibus eros ornare sed<\\/p><p style=\\\"margin-right:0px;margin-left:0px;font-size:16px;color:rgb(111,111,111);\\\"><br \\/><\\/p><div class=\\\"content-block\\\"><h4 class=\\\"content__title\\\" style=\\\"margin-bottom:20px;font-weight:600;font-size:22px;font-family:\'Baloo Tammudu 2\', cursive;color:rgb(54,54,54);\\\">Metus laoreet vestibulum aliquam elit. Magna lacinia vitae, id lacus etiam lectus<\\/h4><p style=\\\"margin-right:0px;margin-left:0px;font-size:16px;color:rgb(111,111,111);\\\">Mollis nam ante libero netus. Elit massa ut egestas nisl lacus. Libero litora montes vulputate, porta vel orci maiores ultricies maecenas, placerat vehicula non. Ipsum suspendisse metus lobortis et in, sem nunc vitae metus pellentesque, vel orci ac ultrices. Ut arcu eget erat, sapien suspendisse mauris mauris mollis conubia tortor, nulla venenatis tortor semper sed. Aute sit elementum condimentum, iaculis non. Pellentesque dictum, metus dolor enim nec eget aut quisque, bibendum ut arcu magnis sed cursus.<\\/p><p style=\\\"margin-right:0px;margin-left:0px;font-size:16px;color:rgb(111,111,111);\\\">Nunc in fringilla aptent. Nonummy diam sed, metus odio pretium elit. Mi sit bibendum orci, ac dolorum neque id nunc vel arcu, hic diam at ipsum dolor eu, porttitor ac suspendisse varius pulvinar a. Elit sed, dolor scelerisque congue, nisl rutrum, amet integer arcu dolor velit. Non suspendisse et ligula ut posuere nec, urna mollis congue morbi arcu augue. Sem ac id eu vehicula eu. Commodo vestibulum dui et duis, turpis sit varius ut euismod. Amet<\\/p><\\/div><div class=\\\"content-block\\\" style=\\\"margin-top:50px;\\\"><h4 class=\\\"content__title\\\" style=\\\"margin-bottom:20px;font-weight:600;font-size:22px;font-family:\'Baloo Tammudu 2\', cursive;color:rgb(54,54,54);\\\">Where we transfer and\\/or store your personal information<\\/h4><p style=\\\"margin-right:0px;margin-left:0px;font-size:16px;color:rgb(111,111,111);\\\">Eget lacus, consectetuer sed ut, et ut suspendisse interdum pede in. Mattis etiam et. Eros mauris. Dictumst at consectetuer semper libero ipsum, pellentesque eu dolor platea amet sapien, erat wisi vitae eget in, ante leo purus consectetuer gravida sed, at et. Lacinia scelerisque lacus parturient porttitor quis amet, sollicitudin volutpat magna sus Ut a ipsum luctus, tincidunt mauris eos sollicitudin, nascetur a ac iaculis cum praesent, sollicitudin elementum<\\/p><\\/div><div class=\\\"content-block\\\" style=\\\"margin-top:50px;\\\"><h4 class=\\\"content__title\\\" style=\\\"margin-bottom:20px;font-weight:600;font-size:22px;font-family:\'Baloo Tammudu 2\', cursive;color:rgb(54,54,54);\\\">Information about Me<\\/h4><p style=\\\"margin-right:0px;margin-left:0px;font-size:16px;color:rgb(111,111,111);\\\">Eget lacus, consectetuer sed ut, et ut suspendisse interdum pede in. Mattis etiam et. Eros mauris. Dictumst at consectetuer semper libero ipsum, pellentesque eu dolor platea amet sapien, erat wisi vitae eget in, ante leo purus consectetuer gravida sed, at et. Lacinia scelerisque lacus parturient porttitor quis amet, sollicitudin volutpat magna sus Ut a ipsum luctus, tincidunt mauris eos sollicitudin, nascetur a ac iaculis cum praesent, sollicitudin elementum aliquet non ligula, vivamus aenean a nullam convallis elit magna. Ligula dapibus eros ornare sed<\\/p><p style=\\\"margin-right:0px;margin-left:0px;font-size:16px;color:rgb(111,111,111);\\\"><br \\/><\\/p><div class=\\\"content-block\\\"><h4 class=\\\"content__title\\\" style=\\\"margin-bottom:20px;font-weight:600;font-size:22px;font-family:\'Baloo Tammudu 2\', cursive;color:rgb(54,54,54);\\\">Metus laoreet vestibulum aliquam elit. Magna lacinia vitae, id lacus etiam lectus<\\/h4><p style=\\\"margin-right:0px;margin-left:0px;font-size:16px;color:rgb(111,111,111);\\\">Mollis nam ante libero netus. Elit massa ut egestas nisl lacus. Libero litora montes vulputate, porta vel orci maiores ultricies maecenas, placerat vehicula non. Ipsum suspendisse metus lobortis et in, sem nunc vitae metus pellentesque, vel orci ac ultrices. Ut arcu eget erat, sapien suspendisse mauris mauris mollis conubia tortor, nulla venenatis tortor semper sed. Aute sit elementum condimentum, iaculis non. Pellentesque dictum, metus dolor enim nec eget aut quisque, bibendum ut arcu magnis sed cursus.<\\/p><p style=\\\"margin-right:0px;margin-left:0px;font-size:16px;color:rgb(111,111,111);\\\">Nunc in fringilla aptent. Nonummy diam sed, metus odio pretium elit. Mi sit bibendum orci, ac dolorum neque id nunc vel arcu, hic diam at ipsum dolor eu, porttitor ac suspendisse varius pulvinar a. Elit sed, dolor scelerisque congue, nisl rutrum, amet integer arcu dolor velit. Non suspendisse et ligula ut posuere nec, urna mollis congue morbi arcu augue. Sem ac id eu vehicula eu. Commodo vestibulum dui et duis, turpis sit varius ut euismod. Amet<\\/p><\\/div><div class=\\\"content-block\\\" style=\\\"margin-top:50px;\\\"><h4 class=\\\"content__title\\\" style=\\\"margin-bottom:20px;font-weight:600;font-size:22px;font-family:\'Baloo Tammudu 2\', cursive;color:rgb(54,54,54);\\\">Where we transfer and\\/or store your personal information<\\/h4><p style=\\\"margin-right:0px;margin-left:0px;font-size:16px;color:rgb(111,111,111);\\\">Eget lacus, consectetuer sed ut, et ut suspendisse interdum pede in. Mattis etiam et. Eros mauris. Dictumst at consectetuer semper libero ipsum, pellentesque eu dolor platea amet sapien, erat wisi vitae eget in, ante leo purus consectetuer gravida sed, at et. Lacinia scelerisque lacus parturient porttitor quis amet, sollicitudin volutpat magna sus Ut a ipsum luctus, tincidunt mauris eos sollicitudin, nascetur a ac iaculis cum praesent, sollicitudin elementum<\\/p><\\/div><div class=\\\"content-block\\\" style=\\\"margin-top:50px;\\\"><h4 class=\\\"content__title\\\" style=\\\"margin-bottom:20px;font-weight:600;font-size:22px;font-family:\'Baloo Tammudu 2\', cursive;color:rgb(54,54,54);\\\">Information about Me<\\/h4><p style=\\\"margin-right:0px;margin-left:0px;font-size:16px;color:rgb(111,111,111);\\\">Eget lacus, consectetuer sed ut, et ut suspendisse interdum pede in. Mattis etiam et. Eros mauris. Dictumst at consectetuer semper libero ipsum, pellentesque eu dolor platea amet sapien, erat wisi vitae eget in, ante leo purus consectetuer gravida sed, at et. Lacinia scelerisque lacus parturient porttitor quis amet, sollicitudin volutpat magna sus Ut a ipsum luctus, tincidunt mauris eos sollicitudin, nascetur a ac iaculis cum praesent, sollicitudin elementum aliquet non ligula, vivamus aenean a nullam convallis elit magna. Ligula dapibus eros ornare sed<\\/p><p style=\\\"margin-right:0px;margin-left:0px;font-size:16px;color:rgb(111,111,111);\\\"><br \\/><\\/p><div class=\\\"content-block\\\"><h4 class=\\\"content__title\\\" style=\\\"margin-bottom:20px;font-weight:600;font-size:22px;font-family:\'Baloo Tammudu 2\', cursive;color:rgb(54,54,54);\\\">Metus laoreet vestibulum aliquam elit. Magna lacinia vitae, id lacus etiam lectus<\\/h4><p style=\\\"margin-right:0px;margin-left:0px;font-size:16px;color:rgb(111,111,111);\\\">Mollis nam ante libero netus. Elit massa ut egestas nisl lacus. Libero litora montes vulputate, porta vel orci maiores ultricies maecenas, placerat vehicula non. Ipsum suspendisse metus lobortis et in, sem nunc vitae metus pellentesque, vel orci ac ultrices. Ut arcu eget erat, sapien suspendisse mauris mauris mollis conubia tortor, nulla venenatis tortor semper sed. Aute sit elementum condimentum, iaculis non. Pellentesque dictum, metus dolor enim nec eget aut quisque, bibendum ut arcu magnis sed cursus.<\\/p><p style=\\\"margin-right:0px;margin-left:0px;font-size:16px;color:rgb(111,111,111);\\\">Nunc in fringilla aptent. Nonummy diam sed, metus odio pretium elit. Mi sit bibendum orci, ac dolorum neque id nunc vel arcu, hic diam at ipsum dolor eu, porttitor ac suspendisse varius pulvinar a. Elit sed, dolor scelerisque congue, nisl rutrum, amet integer arcu dolor velit. Non suspendisse et ligula ut posuere nec, urna mollis congue morbi arcu augue. Sem ac id eu vehicula eu. Commodo vestibulum dui et duis, turpis sit varius ut euismod. Amet<\\/p><\\/div><div class=\\\"content-block\\\" style=\\\"margin-top:50px;\\\"><h4 class=\\\"content__title\\\" style=\\\"margin-bottom:20px;font-weight:600;font-size:22px;font-family:\'Baloo Tammudu 2\', cursive;color:rgb(54,54,54);\\\">Where we transfer and\\/or store your personal information<\\/h4><p style=\\\"margin-right:0px;margin-left:0px;font-size:16px;color:rgb(111,111,111);\\\">Eget lacus, consectetuer sed ut, et ut suspendisse interdum pede in. Mattis etiam et. Eros mauris. Dictumst at consectetuer semper libero ipsum, pellentesque eu dolor platea amet sapien, erat wisi vitae eget in, ante leo purus consectetuer gravida sed, at et. Lacinia scelerisque lacus parturient porttitor quis amet, sollicitudin volutpat magna sus Ut a ipsum luctus, tincidunt mauris eos sollicitudin, nascetur a ac iaculis cum praesent, sollicitudin elementum<\\/p><\\/div><div class=\\\"content-block\\\" style=\\\"margin-top:50px;\\\"><h4 class=\\\"content__title\\\" style=\\\"margin-bottom:20px;font-weight:600;font-size:22px;font-family:\'Baloo Tammudu 2\', cursive;color:rgb(54,54,54);\\\">Information about Me<\\/h4><p style=\\\"margin-right:0px;margin-left:0px;font-size:16px;color:rgb(111,111,111);\\\">Eget lacus, consectetuer sed ut, et ut suspendisse interdum pede in. Mattis etiam et. Eros mauris. Dictumst at consectetuer semper libero ipsum, pellentesque eu dolor platea amet sapien, erat wisi vitae eget in, ante leo purus consectetuer gravida sed, at et. Lacinia scelerisque lacus parturient porttitor quis amet, sollicitudin volutpat magna sus Ut a ipsum luctus, tincidunt mauris eos sollicitudin, nascetur a ac iaculis cum praesent, sollicitudin elementum aliquet non ligula, vivamus aenean a nullam convallis elit magna. Ligula dapibus eros ornare sed<\\/p><\\/div><\\/div><\\/div><\\/div>\"}', NULL, '2021-03-24 07:35:33', '2021-03-24 07:35:33'),
(121, 'policy.element', '{\"title\":\"Terms &amp; Condition\",\"description\":\"<div class=\\\"content-block\\\" style=\\\"color:rgb(111,111,111);font-family:Roboto, sans-serif;\\\"><h4 class=\\\"content__title\\\" style=\\\"margin-bottom:20px;font-weight:600;font-size:22px;color:rgb(54,54,54);font-family:\'Baloo Tammudu 2\', cursive;\\\">Metus laoreet vestibulum aliquam elit. Magna lacinia vitae, id lacus etiam lectus<\\/h4><p style=\\\"margin-right:0px;margin-left:0px;color:rgb(111,111,111);font-size:16px;\\\">Mollis nam ante libero netus. Elit massa ut egestas nisl lacus. Libero litora montes vulputate, porta vel orci maiores ultricies maecenas, placerat vehicula non. Ipsum suspendisse metus lobortis et in, sem nunc vitae metus pellentesque, vel orci ac ultrices. Ut arcu eget erat, sapien suspendisse mauris mauris mollis conubia tortor, nulla venenatis tortor semper sed. Aute sit elementum condimentum, iaculis non. Pellentesque dictum, metus dolor enim nec eget aut quisque, bibendum ut arcu magnis sed cursus.<\\/p><p style=\\\"margin-right:0px;margin-left:0px;color:rgb(111,111,111);font-size:16px;\\\">Nunc in fringilla aptent. Nonummy diam sed, metus odio pretium elit. Mi sit bibendum orci, ac dolorum neque id nunc vel arcu, hic diam at ipsum dolor eu, porttitor ac suspendisse varius pulvinar a. Elit sed, dolor scelerisque congue, nisl rutrum, amet integer arcu dolor velit. Non suspendisse et ligula ut posuere nec, urna mollis congue morbi arcu augue. Sem ac id eu vehicula eu. Commodo vestibulum dui et duis, turpis sit varius ut euismod. Amet<\\/p><\\/div><div class=\\\"content-block\\\" style=\\\"margin-top:50px;color:rgb(111,111,111);font-family:Roboto, sans-serif;\\\"><h4 class=\\\"content__title\\\" style=\\\"margin-bottom:20px;font-weight:600;font-size:22px;color:rgb(54,54,54);font-family:\'Baloo Tammudu 2\', cursive;\\\">Where we transfer and\\/or store your personal information<\\/h4><p style=\\\"margin-right:0px;margin-left:0px;color:rgb(111,111,111);font-size:16px;\\\">Eget lacus, consectetuer sed ut, et ut suspendisse interdum pede in. Mattis etiam et. Eros mauris. Dictumst at consectetuer semper libero ipsum, pellentesque eu dolor platea amet sapien, erat wisi vitae eget in, ante leo purus consectetuer gravida sed, at et. Lacinia scelerisque lacus parturient porttitor quis amet, sollicitudin volutpat magna sus Ut a ipsum luctus, tincidunt mauris eos sollicitudin, nascetur a ac iaculis cum praesent, sollicitudin elementum<\\/p><\\/div><div class=\\\"content-block\\\" style=\\\"margin-top:50px;color:rgb(111,111,111);font-family:Roboto, sans-serif;\\\"><h4 class=\\\"content__title\\\" style=\\\"margin-bottom:20px;font-weight:600;font-size:22px;color:rgb(54,54,54);font-family:\'Baloo Tammudu 2\', cursive;\\\">Information about Me<\\/h4><p style=\\\"margin-right:0px;margin-left:0px;color:rgb(111,111,111);font-size:16px;\\\">Eget lacus, consectetuer sed ut, et ut suspendisse interdum pede in. Mattis etiam et. Eros mauris. Dictumst at consectetuer semper libero ipsum, pellentesque eu dolor platea amet sapien, erat wisi vitae eget in, ante leo purus consectetuer gravida sed, at et. Lacinia scelerisque lacus parturient porttitor quis amet, sollicitudin volutpat magna sus Ut a ipsum luctus, tincidunt mauris eos sollicitudin, nascetur a ac iaculis cum praesent, sollicitudin elementum aliquet non ligula, vivamus aenean a nullam convallis elit magna. Ligula dapibus eros ornare sed<\\/p><p style=\\\"margin-right:0px;margin-left:0px;color:rgb(111,111,111);font-size:16px;\\\"><br \\/><\\/p><div class=\\\"content-block\\\"><h4 class=\\\"content__title\\\" style=\\\"margin-bottom:20px;font-weight:600;font-size:22px;color:rgb(54,54,54);font-family:\'Baloo Tammudu 2\', cursive;\\\">Metus laoreet vestibulum aliquam elit. Magna lacinia vitae, id lacus etiam lectus<\\/h4><p style=\\\"margin-right:0px;margin-left:0px;color:rgb(111,111,111);font-size:16px;\\\">Mollis nam ante libero netus. Elit massa ut egestas nisl lacus. Libero litora montes vulputate, porta vel orci maiores ultricies maecenas, placerat vehicula non. Ipsum suspendisse metus lobortis et in, sem nunc vitae metus pellentesque, vel orci ac ultrices. Ut arcu eget erat, sapien suspendisse mauris mauris mollis conubia tortor, nulla venenatis tortor semper sed. Aute sit elementum condimentum, iaculis non. Pellentesque dictum, metus dolor enim nec eget aut quisque, bibendum ut arcu magnis sed cursus.<\\/p><p style=\\\"margin-right:0px;margin-left:0px;color:rgb(111,111,111);font-size:16px;\\\">Nunc in fringilla aptent. Nonummy diam sed, metus odio pretium elit. Mi sit bibendum orci, ac dolorum neque id nunc vel arcu, hic diam at ipsum dolor eu, porttitor ac suspendisse varius pulvinar a. Elit sed, dolor scelerisque congue, nisl rutrum, amet integer arcu dolor velit. Non suspendisse et ligula ut posuere nec, urna mollis congue morbi arcu augue. Sem ac id eu vehicula eu. Commodo vestibulum dui et duis, turpis sit varius ut euismod. Amet<\\/p><\\/div><div class=\\\"content-block\\\" style=\\\"margin-top:50px;\\\"><h4 class=\\\"content__title\\\" style=\\\"margin-bottom:20px;font-weight:600;font-size:22px;color:rgb(54,54,54);font-family:\'Baloo Tammudu 2\', cursive;\\\">Where we transfer and\\/or store your personal information<\\/h4><p style=\\\"margin-right:0px;margin-left:0px;color:rgb(111,111,111);font-size:16px;\\\">Eget lacus, consectetuer sed ut, et ut suspendisse interdum pede in. Mattis etiam et. Eros mauris. Dictumst at consectetuer semper libero ipsum, pellentesque eu dolor platea amet sapien, erat wisi vitae eget in, ante leo purus consectetuer gravida sed, at et. Lacinia scelerisque lacus parturient porttitor quis amet, sollicitudin volutpat magna sus Ut a ipsum luctus, tincidunt mauris eos sollicitudin, nascetur a ac iaculis cum praesent, sollicitudin elementum<\\/p><\\/div><div class=\\\"content-block\\\" style=\\\"margin-top:50px;\\\"><h4 class=\\\"content__title\\\" style=\\\"margin-bottom:20px;font-weight:600;font-size:22px;color:rgb(54,54,54);font-family:\'Baloo Tammudu 2\', cursive;\\\">Information about Me<\\/h4><p style=\\\"margin-right:0px;margin-left:0px;color:rgb(111,111,111);font-size:16px;\\\">Eget lacus, consectetuer sed ut, et ut suspendisse interdum pede in. Mattis etiam et. Eros mauris. Dictumst at consectetuer semper libero ipsum, pellentesque eu dolor platea amet sapien, erat wisi vitae eget in, ante leo purus consectetuer gravida sed, at et. Lacinia scelerisque lacus parturient porttitor quis amet, sollicitudin volutpat magna sus Ut a ipsum luctus, tincidunt mauris eos sollicitudin, nascetur a ac iaculis cum praesent, sollicitudin elementum aliquet non ligula, vivamus aenean a nullam convallis elit magna. Ligula dapibus eros ornare sed<\\/p><p style=\\\"margin-right:0px;margin-left:0px;color:rgb(111,111,111);font-size:16px;\\\"><br \\/><\\/p><div class=\\\"content-block\\\"><h4 class=\\\"content__title\\\" style=\\\"margin-bottom:20px;font-weight:600;font-size:22px;color:rgb(54,54,54);font-family:\'Baloo Tammudu 2\', cursive;\\\">Metus laoreet vestibulum aliquam elit. Magna lacinia vitae, id lacus etiam lectus<\\/h4><p style=\\\"margin-right:0px;margin-left:0px;color:rgb(111,111,111);font-size:16px;\\\">Mollis nam ante libero netus. Elit massa ut egestas nisl lacus. Libero litora montes vulputate, porta vel orci maiores ultricies maecenas, placerat vehicula non. Ipsum suspendisse metus lobortis et in, sem nunc vitae metus pellentesque, vel orci ac ultrices. Ut arcu eget erat, sapien suspendisse mauris mauris mollis conubia tortor, nulla venenatis tortor semper sed. Aute sit elementum condimentum, iaculis non. Pellentesque dictum, metus dolor enim nec eget aut quisque, bibendum ut arcu magnis sed cursus.<\\/p><p style=\\\"margin-right:0px;margin-left:0px;color:rgb(111,111,111);font-size:16px;\\\">Nunc in fringilla aptent. Nonummy diam sed, metus odio pretium elit. Mi sit bibendum orci, ac dolorum neque id nunc vel arcu, hic diam at ipsum dolor eu, porttitor ac suspendisse varius pulvinar a. Elit sed, dolor scelerisque congue, nisl rutrum, amet integer arcu dolor velit. Non suspendisse et ligula ut posuere nec, urna mollis congue morbi arcu augue. Sem ac id eu vehicula eu. Commodo vestibulum dui et duis, turpis sit varius ut euismod. Amet<\\/p><\\/div><div class=\\\"content-block\\\" style=\\\"margin-top:50px;\\\"><h4 class=\\\"content__title\\\" style=\\\"margin-bottom:20px;font-weight:600;font-size:22px;color:rgb(54,54,54);font-family:\'Baloo Tammudu 2\', cursive;\\\">Where we transfer and\\/or store your personal information<\\/h4><p style=\\\"margin-right:0px;margin-left:0px;color:rgb(111,111,111);font-size:16px;\\\">Eget lacus, consectetuer sed ut, et ut suspendisse interdum pede in. Mattis etiam et. Eros mauris. Dictumst at consectetuer semper libero ipsum, pellentesque eu dolor platea amet sapien, erat wisi vitae eget in, ante leo purus consectetuer gravida sed, at et. Lacinia scelerisque lacus parturient porttitor quis amet, sollicitudin volutpat magna sus Ut a ipsum luctus, tincidunt mauris eos sollicitudin, nascetur a ac iaculis cum praesent, sollicitudin elementum<\\/p><\\/div><div class=\\\"content-block\\\" style=\\\"margin-top:50px;\\\"><h4 class=\\\"content__title\\\" style=\\\"margin-bottom:20px;font-weight:600;font-size:22px;color:rgb(54,54,54);font-family:\'Baloo Tammudu 2\', cursive;\\\">Information about Me<\\/h4><p style=\\\"margin-right:0px;margin-left:0px;color:rgb(111,111,111);font-size:16px;\\\">Eget lacus, consectetuer sed ut, et ut suspendisse interdum pede in. Mattis etiam et. Eros mauris. Dictumst at consectetuer semper libero ipsum, pellentesque eu dolor platea amet sapien, erat wisi vitae eget in, ante leo purus consectetuer gravida sed, at et. Lacinia scelerisque lacus parturient porttitor quis amet, sollicitudin volutpat magna sus Ut a ipsum luctus, tincidunt mauris eos sollicitudin, nascetur a ac iaculis cum praesent, sollicitudin elementum aliquet non ligula, vivamus aenean a nullam convallis elit magna. Ligula dapibus eros ornare sed<\\/p><p style=\\\"margin-right:0px;margin-left:0px;color:rgb(111,111,111);font-size:16px;\\\"><br \\/><\\/p><div class=\\\"content-block\\\"><h4 class=\\\"content__title\\\" style=\\\"margin-bottom:20px;font-weight:600;font-size:22px;color:rgb(54,54,54);font-family:\'Baloo Tammudu 2\', cursive;\\\">Metus laoreet vestibulum aliquam elit. Magna lacinia vitae, id lacus etiam lectus<\\/h4><p style=\\\"margin-right:0px;margin-left:0px;color:rgb(111,111,111);font-size:16px;\\\">Mollis nam ante libero netus. Elit massa ut egestas nisl lacus. Libero litora montes vulputate, porta vel orci maiores ultricies maecenas, placerat vehicula non. Ipsum suspendisse metus lobortis et in, sem nunc vitae metus pellentesque, vel orci ac ultrices. Ut arcu eget erat, sapien suspendisse mauris mauris mollis conubia tortor, nulla venenatis tortor semper sed. Aute sit elementum condimentum, iaculis non. Pellentesque dictum, metus dolor enim nec eget aut quisque, bibendum ut arcu magnis sed cursus.<\\/p><p style=\\\"margin-right:0px;margin-left:0px;color:rgb(111,111,111);font-size:16px;\\\">Nunc in fringilla aptent. Nonummy diam sed, metus odio pretium elit. Mi sit bibendum orci, ac dolorum neque id nunc vel arcu, hic diam at ipsum dolor eu, porttitor ac suspendisse varius pulvinar a. Elit sed, dolor scelerisque congue, nisl rutrum, amet integer arcu dolor velit. Non suspendisse et ligula ut posuere nec, urna mollis congue morbi arcu augue. Sem ac id eu vehicula eu. Commodo vestibulum dui et duis, turpis sit varius ut euismod. Amet<\\/p><\\/div><div class=\\\"content-block\\\" style=\\\"margin-top:50px;\\\"><h4 class=\\\"content__title\\\" style=\\\"margin-bottom:20px;font-weight:600;font-size:22px;color:rgb(54,54,54);font-family:\'Baloo Tammudu 2\', cursive;\\\">Where we transfer and\\/or store your personal information<\\/h4><p style=\\\"margin-right:0px;margin-left:0px;color:rgb(111,111,111);font-size:16px;\\\">Eget lacus, consectetuer sed ut, et ut suspendisse interdum pede in. Mattis etiam et. Eros mauris. Dictumst at consectetuer semper libero ipsum, pellentesque eu dolor platea amet sapien, erat wisi vitae eget in, ante leo purus consectetuer gravida sed, at et. Lacinia scelerisque lacus parturient porttitor quis amet, sollicitudin volutpat magna sus Ut a ipsum luctus, tincidunt mauris eos sollicitudin, nascetur a ac iaculis cum praesent, sollicitudin elementum<\\/p><\\/div><div class=\\\"content-block\\\" style=\\\"margin-top:50px;\\\"><h4 class=\\\"content__title\\\" style=\\\"margin-bottom:20px;font-weight:600;font-size:22px;color:rgb(54,54,54);font-family:\'Baloo Tammudu 2\', cursive;\\\">Information about Me<\\/h4><p style=\\\"margin-right:0px;margin-left:0px;color:rgb(111,111,111);font-size:16px;\\\">Eget lacus, consectetuer sed ut, et ut suspendisse interdum pede in. Mattis etiam et. Eros mauris. Dictumst at consectetuer semper libero ipsum, pellentesque eu dolor platea amet sapien, erat wisi vitae eget in, ante leo purus consectetuer gravida sed, at et. Lacinia scelerisque lacus parturient porttitor quis amet, sollicitudin volutpat magna sus Ut a ipsum luctus, tincidunt mauris eos sollicitudin, nascetur a ac iaculis cum praesent, sollicitudin elementum aliquet non ligula, vivamus aenean a nullam convallis elit magna. Ligula dapibus eros ornare sed<\\/p><\\/div><\\/div><\\/div><\\/div>\"}', NULL, '2021-03-24 07:35:44', '2021-03-24 07:35:44');
INSERT INTO `frontends` (`id`, `data_keys`, `data_values`, `clicks`, `created_at`, `updated_at`) VALUES
(122, 'policy.element', '{\"title\":\"Refund Policy\",\"description\":\"<div class=\\\"content-block\\\" style=\\\"color:rgb(111,111,111);font-family:Roboto, sans-serif;\\\"><h4 class=\\\"content__title\\\" style=\\\"margin-bottom:20px;font-weight:600;font-size:22px;color:rgb(54,54,54);font-family:\'Baloo Tammudu 2\', cursive;\\\">Metus laoreet vestibulum aliquam elit. Magna lacinia vitae, id lacus etiam lectus<\\/h4><p style=\\\"margin-right:0px;margin-left:0px;color:rgb(111,111,111);font-size:16px;\\\">Mollis nam ante libero netus. Elit massa ut egestas nisl lacus. Libero litora montes vulputate, porta vel orci maiores ultricies maecenas, placerat vehicula non. Ipsum suspendisse metus lobortis et in, sem nunc vitae metus pellentesque, vel orci ac ultrices. Ut arcu eget erat, sapien suspendisse mauris mauris mollis conubia tortor, nulla venenatis tortor semper sed. Aute sit elementum condimentum, iaculis non. Pellentesque dictum, metus dolor enim nec eget aut quisque, bibendum ut arcu magnis sed cursus.<\\/p><p style=\\\"margin-right:0px;margin-left:0px;color:rgb(111,111,111);font-size:16px;\\\">Nunc in fringilla aptent. Nonummy diam sed, metus odio pretium elit. Mi sit bibendum orci, ac dolorum neque id nunc vel arcu, hic diam at ipsum dolor eu, porttitor ac suspendisse varius pulvinar a. Elit sed, dolor scelerisque congue, nisl rutrum, amet integer arcu dolor velit. Non suspendisse et ligula ut posuere nec, urna mollis congue morbi arcu augue. Sem ac id eu vehicula eu. Commodo vestibulum dui et duis, turpis sit varius ut euismod. Amet<\\/p><\\/div><div class=\\\"content-block\\\" style=\\\"margin-top:50px;color:rgb(111,111,111);font-family:Roboto, sans-serif;\\\"><h4 class=\\\"content__title\\\" style=\\\"margin-bottom:20px;font-weight:600;font-size:22px;color:rgb(54,54,54);font-family:\'Baloo Tammudu 2\', cursive;\\\">Where we transfer and\\/or store your personal information<\\/h4><p style=\\\"margin-right:0px;margin-left:0px;color:rgb(111,111,111);font-size:16px;\\\">Eget lacus, consectetuer sed ut, et ut suspendisse interdum pede in. Mattis etiam et. Eros mauris. Dictumst at consectetuer semper libero ipsum, pellentesque eu dolor platea amet sapien, erat wisi vitae eget in, ante leo purus consectetuer gravida sed, at et. Lacinia scelerisque lacus parturient porttitor quis amet, sollicitudin volutpat magna sus Ut a ipsum luctus, tincidunt mauris eos sollicitudin, nascetur a ac iaculis cum praesent, sollicitudin elementum<\\/p><\\/div><div class=\\\"content-block\\\" style=\\\"margin-top:50px;color:rgb(111,111,111);font-family:Roboto, sans-serif;\\\"><h4 class=\\\"content__title\\\" style=\\\"margin-bottom:20px;font-weight:600;font-size:22px;color:rgb(54,54,54);font-family:\'Baloo Tammudu 2\', cursive;\\\">Information about Me<\\/h4><p style=\\\"margin-right:0px;margin-left:0px;color:rgb(111,111,111);font-size:16px;\\\">Eget lacus, consectetuer sed ut, et ut suspendisse interdum pede in. Mattis etiam et. Eros mauris. Dictumst at consectetuer semper libero ipsum, pellentesque eu dolor platea amet sapien, erat wisi vitae eget in, ante leo purus consectetuer gravida sed, at et. Lacinia scelerisque lacus parturient porttitor quis amet, sollicitudin volutpat magna sus Ut a ipsum luctus, tincidunt mauris eos sollicitudin, nascetur a ac iaculis cum praesent, sollicitudin elementum aliquet non ligula, vivamus aenean a nullam convallis elit magna. Ligula dapibus eros ornare sed<\\/p><p style=\\\"margin-right:0px;margin-left:0px;color:rgb(111,111,111);font-size:16px;\\\"><br \\/><\\/p><div class=\\\"content-block\\\"><h4 class=\\\"content__title\\\" style=\\\"margin-bottom:20px;font-weight:600;font-size:22px;color:rgb(54,54,54);font-family:\'Baloo Tammudu 2\', cursive;\\\">Metus laoreet vestibulum aliquam elit. Magna lacinia vitae, id lacus etiam lectus<\\/h4><p style=\\\"margin-right:0px;margin-left:0px;color:rgb(111,111,111);font-size:16px;\\\">Mollis nam ante libero netus. Elit massa ut egestas nisl lacus. Libero litora montes vulputate, porta vel orci maiores ultricies maecenas, placerat vehicula non. Ipsum suspendisse metus lobortis et in, sem nunc vitae metus pellentesque, vel orci ac ultrices. Ut arcu eget erat, sapien suspendisse mauris mauris mollis conubia tortor, nulla venenatis tortor semper sed. Aute sit elementum condimentum, iaculis non. Pellentesque dictum, metus dolor enim nec eget aut quisque, bibendum ut arcu magnis sed cursus.<\\/p><p style=\\\"margin-right:0px;margin-left:0px;color:rgb(111,111,111);font-size:16px;\\\">Nunc in fringilla aptent. Nonummy diam sed, metus odio pretium elit. Mi sit bibendum orci, ac dolorum neque id nunc vel arcu, hic diam at ipsum dolor eu, porttitor ac suspendisse varius pulvinar a. Elit sed, dolor scelerisque congue, nisl rutrum, amet integer arcu dolor velit. Non suspendisse et ligula ut posuere nec, urna mollis congue morbi arcu augue. Sem ac id eu vehicula eu. Commodo vestibulum dui et duis, turpis sit varius ut euismod. Amet<\\/p><\\/div><div class=\\\"content-block\\\" style=\\\"margin-top:50px;\\\"><h4 class=\\\"content__title\\\" style=\\\"margin-bottom:20px;font-weight:600;font-size:22px;color:rgb(54,54,54);font-family:\'Baloo Tammudu 2\', cursive;\\\">Where we transfer and\\/or store your personal information<\\/h4><p style=\\\"margin-right:0px;margin-left:0px;color:rgb(111,111,111);font-size:16px;\\\">Eget lacus, consectetuer sed ut, et ut suspendisse interdum pede in. Mattis etiam et. Eros mauris. Dictumst at consectetuer semper libero ipsum, pellentesque eu dolor platea amet sapien, erat wisi vitae eget in, ante leo purus consectetuer gravida sed, at et. Lacinia scelerisque lacus parturient porttitor quis amet, sollicitudin volutpat magna sus Ut a ipsum luctus, tincidunt mauris eos sollicitudin, nascetur a ac iaculis cum praesent, sollicitudin elementum<\\/p><\\/div><div class=\\\"content-block\\\" style=\\\"margin-top:50px;\\\"><h4 class=\\\"content__title\\\" style=\\\"margin-bottom:20px;font-weight:600;font-size:22px;color:rgb(54,54,54);font-family:\'Baloo Tammudu 2\', cursive;\\\">Information about Me<\\/h4><p style=\\\"margin-right:0px;margin-left:0px;color:rgb(111,111,111);font-size:16px;\\\">Eget lacus, consectetuer sed ut, et ut suspendisse interdum pede in. Mattis etiam et. Eros mauris. Dictumst at consectetuer semper libero ipsum, pellentesque eu dolor platea amet sapien, erat wisi vitae eget in, ante leo purus consectetuer gravida sed, at et. Lacinia scelerisque lacus parturient porttitor quis amet, sollicitudin volutpat magna sus Ut a ipsum luctus, tincidunt mauris eos sollicitudin, nascetur a ac iaculis cum praesent, sollicitudin elementum aliquet non ligula, vivamus aenean a nullam convallis elit magna. Ligula dapibus eros ornare sed<\\/p><p style=\\\"margin-right:0px;margin-left:0px;color:rgb(111,111,111);font-size:16px;\\\"><br \\/><\\/p><div class=\\\"content-block\\\"><h4 class=\\\"content__title\\\" style=\\\"margin-bottom:20px;font-weight:600;font-size:22px;color:rgb(54,54,54);font-family:\'Baloo Tammudu 2\', cursive;\\\">Metus laoreet vestibulum aliquam elit. Magna lacinia vitae, id lacus etiam lectus<\\/h4><p style=\\\"margin-right:0px;margin-left:0px;color:rgb(111,111,111);font-size:16px;\\\">Mollis nam ante libero netus. Elit massa ut egestas nisl lacus. Libero litora montes vulputate, porta vel orci maiores ultricies maecenas, placerat vehicula non. Ipsum suspendisse metus lobortis et in, sem nunc vitae metus pellentesque, vel orci ac ultrices. Ut arcu eget erat, sapien suspendisse mauris mauris mollis conubia tortor, nulla venenatis tortor semper sed. Aute sit elementum condimentum, iaculis non. Pellentesque dictum, metus dolor enim nec eget aut quisque, bibendum ut arcu magnis sed cursus.<\\/p><p style=\\\"margin-right:0px;margin-left:0px;color:rgb(111,111,111);font-size:16px;\\\">Nunc in fringilla aptent. Nonummy diam sed, metus odio pretium elit. Mi sit bibendum orci, ac dolorum neque id nunc vel arcu, hic diam at ipsum dolor eu, porttitor ac suspendisse varius pulvinar a. Elit sed, dolor scelerisque congue, nisl rutrum, amet integer arcu dolor velit. Non suspendisse et ligula ut posuere nec, urna mollis congue morbi arcu augue. Sem ac id eu vehicula eu. Commodo vestibulum dui et duis, turpis sit varius ut euismod. Amet<\\/p><\\/div><div class=\\\"content-block\\\" style=\\\"margin-top:50px;\\\"><h4 class=\\\"content__title\\\" style=\\\"margin-bottom:20px;font-weight:600;font-size:22px;color:rgb(54,54,54);font-family:\'Baloo Tammudu 2\', cursive;\\\">Where we transfer and\\/or store your personal information<\\/h4><p style=\\\"margin-right:0px;margin-left:0px;color:rgb(111,111,111);font-size:16px;\\\">Eget lacus, consectetuer sed ut, et ut suspendisse interdum pede in. Mattis etiam et. Eros mauris. Dictumst at consectetuer semper libero ipsum, pellentesque eu dolor platea amet sapien, erat wisi vitae eget in, ante leo purus consectetuer gravida sed, at et. Lacinia scelerisque lacus parturient porttitor quis amet, sollicitudin volutpat magna sus Ut a ipsum luctus, tincidunt mauris eos sollicitudin, nascetur a ac iaculis cum praesent, sollicitudin elementum<\\/p><\\/div><div class=\\\"content-block\\\" style=\\\"margin-top:50px;\\\"><h4 class=\\\"content__title\\\" style=\\\"margin-bottom:20px;font-weight:600;font-size:22px;color:rgb(54,54,54);font-family:\'Baloo Tammudu 2\', cursive;\\\">Information about Me<\\/h4><p style=\\\"margin-right:0px;margin-left:0px;color:rgb(111,111,111);font-size:16px;\\\">Eget lacus, consectetuer sed ut, et ut suspendisse interdum pede in. Mattis etiam et. Eros mauris. Dictumst at consectetuer semper libero ipsum, pellentesque eu dolor platea amet sapien, erat wisi vitae eget in, ante leo purus consectetuer gravida sed, at et. Lacinia scelerisque lacus parturient porttitor quis amet, sollicitudin volutpat magna sus Ut a ipsum luctus, tincidunt mauris eos sollicitudin, nascetur a ac iaculis cum praesent, sollicitudin elementum aliquet non ligula, vivamus aenean a nullam convallis elit magna. Ligula dapibus eros ornare sed<\\/p><p style=\\\"margin-right:0px;margin-left:0px;color:rgb(111,111,111);font-size:16px;\\\"><br \\/><\\/p><div class=\\\"content-block\\\"><h4 class=\\\"content__title\\\" style=\\\"margin-bottom:20px;font-weight:600;font-size:22px;color:rgb(54,54,54);font-family:\'Baloo Tammudu 2\', cursive;\\\">Metus laoreet vestibulum aliquam elit. Magna lacinia vitae, id lacus etiam lectus<\\/h4><p style=\\\"margin-right:0px;margin-left:0px;color:rgb(111,111,111);font-size:16px;\\\">Mollis nam ante libero netus. Elit massa ut egestas nisl lacus. Libero litora montes vulputate, porta vel orci maiores ultricies maecenas, placerat vehicula non. Ipsum suspendisse metus lobortis et in, sem nunc vitae metus pellentesque, vel orci ac ultrices. Ut arcu eget erat, sapien suspendisse mauris mauris mollis conubia tortor, nulla venenatis tortor semper sed. Aute sit elementum condimentum, iaculis non. Pellentesque dictum, metus dolor enim nec eget aut quisque, bibendum ut arcu magnis sed cursus.<\\/p><p style=\\\"margin-right:0px;margin-left:0px;color:rgb(111,111,111);font-size:16px;\\\">Nunc in fringilla aptent. Nonummy diam sed, metus odio pretium elit. Mi sit bibendum orci, ac dolorum neque id nunc vel arcu, hic diam at ipsum dolor eu, porttitor ac suspendisse varius pulvinar a. Elit sed, dolor scelerisque congue, nisl rutrum, amet integer arcu dolor velit. Non suspendisse et ligula ut posuere nec, urna mollis congue morbi arcu augue. Sem ac id eu vehicula eu. Commodo vestibulum dui et duis, turpis sit varius ut euismod. Amet<\\/p><\\/div><div class=\\\"content-block\\\" style=\\\"margin-top:50px;\\\"><h4 class=\\\"content__title\\\" style=\\\"margin-bottom:20px;font-weight:600;font-size:22px;color:rgb(54,54,54);font-family:\'Baloo Tammudu 2\', cursive;\\\">Where we transfer and\\/or store your personal information<\\/h4><p style=\\\"margin-right:0px;margin-left:0px;color:rgb(111,111,111);font-size:16px;\\\">Eget lacus, consectetuer sed ut, et ut suspendisse interdum pede in. Mattis etiam et. Eros mauris. Dictumst at consectetuer semper libero ipsum, pellentesque eu dolor platea amet sapien, erat wisi vitae eget in, ante leo purus consectetuer gravida sed, at et. Lacinia scelerisque lacus parturient porttitor quis amet, sollicitudin volutpat magna sus Ut a ipsum luctus, tincidunt mauris eos sollicitudin, nascetur a ac iaculis cum praesent, sollicitudin elementum<\\/p><\\/div><div class=\\\"content-block\\\" style=\\\"margin-top:50px;\\\"><h4 class=\\\"content__title\\\" style=\\\"margin-bottom:20px;font-weight:600;font-size:22px;color:rgb(54,54,54);font-family:\'Baloo Tammudu 2\', cursive;\\\">Information about Me<\\/h4><p style=\\\"margin-right:0px;margin-left:0px;color:rgb(111,111,111);font-size:16px;\\\">Eget lacus, consectetuer sed ut, et ut suspendisse interdum pede in. Mattis etiam et. Eros mauris. Dictumst at consectetuer semper libero ipsum, pellentesque eu dolor platea amet sapien, erat wisi vitae eget in, ante leo purus consectetuer gravida sed, at et. Lacinia scelerisque lacus parturient porttitor quis amet, sollicitudin volutpat magna sus Ut a ipsum luctus, tincidunt mauris eos sollicitudin, nascetur a ac iaculis cum praesent, sollicitudin elementum aliquet non ligula, vivamus aenean a nullam convallis elit magna. Ligula dapibus eros ornare sed<\\/p><\\/div><\\/div><\\/div><\\/div>\"}', NULL, '2021-03-24 07:35:56', '2021-03-24 07:35:56');

-- --------------------------------------------------------

--
-- Table structure for table `gateways`
--

CREATE TABLE `gateways` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` int(11) DEFAULT NULL,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NULL',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `parameters` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supported_currencies` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `crypto` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: fiat currency, 1: crypto currency',
  `extra` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `input_form` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gateways`
--

INSERT INTO `gateways` (`id`, `code`, `alias`, `image`, `name`, `status`, `parameters`, `supported_currencies`, `crypto`, `extra`, `description`, `input_form`, `created_at`, `updated_at`) VALUES
(1, 101, 'paypal', '5f6f1bd8678601601117144.jpg', 'Paypal', 1, '{\"paypal_email\":{\"title\":\"PayPal Email\",\"global\":true,\"value\":\"sb-zlbi7986064@personal.example.com\"}}', '{\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CZK\":\"CZK\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"HKD\":\"HKD\",\"HUF\":\"HUF\",\"INR\":\"INR\",\"ILS\":\"ILS\",\"JPY\":\"JPY\",\"MYR\":\"MYR\",\"MXN\":\"MXN\",\"TWD\":\"TWD\",\"NZD\":\"NZD\",\"NOK\":\"NOK\",\"PHP\":\"PHP\",\"PLN\":\"PLN\",\"GBP\":\"GBP\",\"RUB\":\"RUB\",\"SGD\":\"SGD\",\"SEK\":\"SEK\",\"CHF\":\"CHF\",\"THB\":\"THB\",\"USD\":\"$\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2021-01-17 03:02:44'),
(2, 102, 'perfect_money', '5f6f1d2a742211601117482.jpg', 'Perfect Money', 1, '{\"passphrase\":{\"title\":\"ALTERNATE PASSPHRASE\",\"global\":true,\"value\":\"6451561651551\"},\"wallet_id\":{\"title\":\"PM Wallet\",\"global\":false,\"value\":\"\"}}', '{\"USD\":\"$\",\"EUR\":\"\\u20ac\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-12-28 01:26:46'),
(3, 103, 'stripe', '5f6f1d4bc69e71601117515.jpg', 'Stripe Hosted', 1, '{\"secret_key\":{\"title\":\"Secret Key\",\"global\":true,\"value\":\"sk_test_51HuxFUHyGzEKoTKAfIosswAQduMOGU4q4elcNr8OE6LoBZcp2MHKalOW835wjRiF6fxVTc7RmBgatKfAt1Qq0heb00rUaCOd2T\"},\"publishable_key\":{\"title\":\"PUBLISHABLE KEY\",\"global\":true,\"value\":\"pk_test_51HuxFUHyGzEKoTKAueAuF9BrMDA5boMcpJLLt0vu4q3QdPX5isaGudKNe6OyVjZP1UugpYd6JA7i7TczRWsbutaP004YmBiSp5\"}}', '{\"USD\":\"USD\",\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"INR\":\"INR\",\"JPY\":\"JPY\",\"MXN\":\"MXN\",\"MYR\":\"MYR\",\"NOK\":\"NOK\",\"NZD\":\"NZD\",\"PLN\":\"PLN\",\"SEK\":\"SEK\",\"SGD\":\"SGD\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-12-28 01:26:49'),
(4, 104, 'skrill', '5f6f1d41257181601117505.jpg', 'Skrill', 1, '{\"pay_to_email\":{\"title\":\"Skrill Email\",\"global\":true,\"value\":\"merchant@skrill.com\"},\"secret_key\":{\"title\":\"Secret Key\",\"global\":true,\"value\":\"---\"}}', '{\"AED\":\"AED\",\"AUD\":\"AUD\",\"BGN\":\"BGN\",\"BHD\":\"BHD\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"CZK\":\"CZK\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"HRK\":\"HRK\",\"HUF\":\"HUF\",\"ILS\":\"ILS\",\"INR\":\"INR\",\"ISK\":\"ISK\",\"JOD\":\"JOD\",\"JPY\":\"JPY\",\"KRW\":\"KRW\",\"KWD\":\"KWD\",\"MAD\":\"MAD\",\"MYR\":\"MYR\",\"NOK\":\"NOK\",\"NZD\":\"NZD\",\"OMR\":\"OMR\",\"PLN\":\"PLN\",\"QAR\":\"QAR\",\"RON\":\"RON\",\"RSD\":\"RSD\",\"SAR\":\"SAR\",\"SEK\":\"SEK\",\"SGD\":\"SGD\",\"THB\":\"THB\",\"TND\":\"TND\",\"TRY\":\"TRY\",\"TWD\":\"TWD\",\"USD\":\"USD\",\"ZAR\":\"ZAR\",\"COP\":\"COP\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-12-28 01:26:52'),
(5, 105, 'paytm', '5f6f1d1d3ec731601117469.jpg', 'PayTM', 1, '{\"MID\":{\"title\":\"Merchant ID\",\"global\":true,\"value\":\"DIY12386817555501617\"},\"merchant_key\":{\"title\":\"Merchant Key\",\"global\":true,\"value\":\"bKMfNxPPf_QdZppa\"},\"WEBSITE\":{\"title\":\"Paytm Website\",\"global\":true,\"value\":\"DIYtestingweb\"},\"INDUSTRY_TYPE_ID\":{\"title\":\"Industry Type\",\"global\":true,\"value\":\"Retail\"},\"CHANNEL_ID\":{\"title\":\"CHANNEL ID\",\"global\":true,\"value\":\"WEB\"},\"transaction_url\":{\"title\":\"Transaction URL\",\"global\":true,\"value\":\"https:\\/\\/pguat.paytm.com\\/oltp-web\\/processTransaction\"},\"transaction_status_url\":{\"title\":\"Transaction STATUS URL\",\"global\":true,\"value\":\"https:\\/\\/pguat.paytm.com\\/paytmchecksum\\/paytmCallback.jsp\"}}', '{\"AUD\":\"AUD\",\"ARS\":\"ARS\",\"BDT\":\"BDT\",\"BRL\":\"BRL\",\"BGN\":\"BGN\",\"CAD\":\"CAD\",\"CLP\":\"CLP\",\"CNY\":\"CNY\",\"COP\":\"COP\",\"HRK\":\"HRK\",\"CZK\":\"CZK\",\"DKK\":\"DKK\",\"EGP\":\"EGP\",\"EUR\":\"EUR\",\"GEL\":\"GEL\",\"GHS\":\"GHS\",\"HKD\":\"HKD\",\"HUF\":\"HUF\",\"INR\":\"INR\",\"IDR\":\"IDR\",\"ILS\":\"ILS\",\"JPY\":\"JPY\",\"KES\":\"KES\",\"MYR\":\"MYR\",\"MXN\":\"MXN\",\"MAD\":\"MAD\",\"NPR\":\"NPR\",\"NZD\":\"NZD\",\"NGN\":\"NGN\",\"NOK\":\"NOK\",\"PKR\":\"PKR\",\"PEN\":\"PEN\",\"PHP\":\"PHP\",\"PLN\":\"PLN\",\"RON\":\"RON\",\"RUB\":\"RUB\",\"SGD\":\"SGD\",\"ZAR\":\"ZAR\",\"KRW\":\"KRW\",\"LKR\":\"LKR\",\"SEK\":\"SEK\",\"CHF\":\"CHF\",\"THB\":\"THB\",\"TRY\":\"TRY\",\"UGX\":\"UGX\",\"UAH\":\"UAH\",\"AED\":\"AED\",\"GBP\":\"GBP\",\"USD\":\"USD\",\"VND\":\"VND\",\"XOF\":\"XOF\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-12-28 01:26:54'),
(6, 106, 'payeer', '5f6f1bc61518b1601117126.jpg', 'Payeer', 1, '{\"merchant_id\":{\"title\":\"Merchant ID\",\"global\":true,\"value\":\"866989763\"},\"secret_key\":{\"title\":\"Secret key\",\"global\":true,\"value\":\"7575\"}}', '{\"USD\":\"USD\",\"EUR\":\"EUR\",\"RUB\":\"RUB\"}', 0, '{\"status\":{\"title\": \"Status URL\",\"value\":\"ipn.payeer\"}}', NULL, NULL, '2019-09-14 13:14:22', '2020-12-28 01:26:58'),
(7, 107, 'paystack', '5f7096563dfb71601214038.jpg', 'PayStack', 1, '{\"public_key\":{\"title\":\"Public key\",\"global\":true,\"value\":\"pk_test_3c9c87f51b13c15d99eb367ca6ebc52cc9eb1f33\"},\"secret_key\":{\"title\":\"Secret key\",\"global\":true,\"value\":\"sk_test_2a3f97a146ab5694801f993b60fcb81cd7254f12\"}}', '{\"USD\":\"USD\",\"NGN\":\"NGN\"}', 0, '{\"callback\":{\"title\": \"Callback URL\",\"value\":\"ipn.paystack\"},\"webhook\":{\"title\": \"Webhook URL\",\"value\":\"ipn.paystack\"}}\r\n', NULL, NULL, '2019-09-14 13:14:22', '2020-12-28 01:25:38'),
(8, 108, 'voguepay', '5f6f1d5951a111601117529.jpg', 'VoguePay', 1, '{\"merchant_id\":{\"title\":\"MERCHANT ID\",\"global\":true,\"value\":\"demo\"}}', '{\"USD\":\"USD\",\"GBP\":\"GBP\",\"EUR\":\"EUR\",\"GHS\":\"GHS\",\"NGN\":\"NGN\",\"ZAR\":\"ZAR\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-09-26 04:52:09'),
(9, 109, 'flutterwave', '5f6f1b9e4bb961601117086.jpg', 'Flutterwave', 1, '{\"public_key\":{\"title\":\"Public Key\",\"global\":true,\"value\":\"demo_publisher_key\"},\"secret_key\":{\"title\":\"Secret Key\",\"global\":true,\"value\":\"demo_secret_key\"},\"encryption_key\":{\"title\":\"Encryption Key\",\"global\":true,\"value\":\"demo_encryption_key\"}}', '{\"BIF\":\"BIF\",\"CAD\":\"CAD\",\"CDF\":\"CDF\",\"CVE\":\"CVE\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"GHS\":\"GHS\",\"GMD\":\"GMD\",\"GNF\":\"GNF\",\"KES\":\"KES\",\"LRD\":\"LRD\",\"MWK\":\"MWK\",\"MZN\":\"MZN\",\"NGN\":\"NGN\",\"RWF\":\"RWF\",\"SLL\":\"SLL\",\"STD\":\"STD\",\"TZS\":\"TZS\",\"UGX\":\"UGX\",\"USD\":\"USD\",\"XAF\":\"XAF\",\"XOF\":\"XOF\",\"ZMK\":\"ZMK\",\"ZMW\":\"ZMW\",\"ZWD\":\"ZWD\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2021-01-04 03:29:50'),
(10, 110, 'razorpay', '5f6f1d3672dd61601117494.jpg', 'RazorPay', 1, '{\"key_id\":{\"title\":\"Key Id\",\"global\":true,\"value\":\"rzp_test_kiOtejPbRZU90E\"},\"key_secret\":{\"title\":\"Key Secret \",\"global\":true,\"value\":\"osRDebzEqbsE1kbyQJ4y0re7\"}}', '{\"INR\":\"INR\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-09-26 04:51:34'),
(11, 111, 'stripe_js', '5f7096a31ed9a1601214115.jpg', 'Stripe Storefront', 1, '{\"secret_key\":{\"title\":\"Secret Key\",\"global\":true,\"value\":\"sk_test_51HuxFUHyGzEKoTKAfIosswAQduMOGU4q4elcNr8OE6LoBZcp2MHKalOW835wjRiF6fxVTc7RmBgatKfAt1Qq0heb00rUaCOd2T\"},\"publishable_key\":{\"title\":\"PUBLISHABLE KEY\",\"global\":true,\"value\":\"pk_test_51HuxFUHyGzEKoTKAueAuF9BrMDA5boMcpJLLt0vu4q3QdPX5isaGudKNe6OyVjZP1UugpYd6JA7i7TczRWsbutaP004YmBiSp5\"}}', '{\"USD\":\"USD\",\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"INR\":\"INR\",\"JPY\":\"JPY\",\"MXN\":\"MXN\",\"MYR\":\"MYR\",\"NOK\":\"NOK\",\"NZD\":\"NZD\",\"PLN\":\"PLN\",\"SEK\":\"SEK\",\"SGD\":\"SGD\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-12-05 03:56:20'),
(12, 112, 'instamojo', '5f6f1babbdbb31601117099.jpg', 'Instamojo', 1, '{\"api_key\":{\"title\":\"API KEY\",\"global\":true,\"value\":\"test_2241633c3bc44a3de84a3b33969\"},\"auth_token\":{\"title\":\"Auth Token\",\"global\":true,\"value\":\"test_279f083f7bebefd35217feef22d\"},\"salt\":{\"title\":\"Salt\",\"global\":true,\"value\":\"19d38908eeff4f58b2ddda2c6d86ca25\"}}', '{\"INR\":\"INR\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-09-26 04:44:59'),
(13, 501, 'blockchain', '5f6f1b2b20c6f1601116971.jpg', 'Blockchain', 1, '{\"api_key\":{\"title\":\"API Key\",\"global\":true,\"value\":\"55529946-05ca-48ff-8710-f279d86b1cc5\"},\"xpub_code\":{\"title\":\"XPUB CODE\",\"global\":true,\"value\":\"xpub6CKQ3xxWyBoFAF83izZCSFUorptEU9AF8TezhtWeMU5oefjX3sFSBw62Lr9iHXPkXmDQJJiHZeTRtD9Vzt8grAYRhvbz4nEvBu3QKELVzFK\"}}', '{\"BTC\":\"BTC\"}', 1, NULL, NULL, NULL, '2019-09-14 13:14:22', '2021-01-31 06:55:45'),
(14, 502, 'blockio', '5f6f19432bedf1601116483.jpg', 'Block.io', 1, '{\"api_key\":{\"title\":\"API Key\",\"global\":false,\"value\":\"1658-8015-2e5e-9afb\"},\"api_pin\":{\"title\":\"API PIN\",\"global\":true,\"value\":\"covidvai2020\"}}', '{\"BTC\":\"BTC\",\"LTC\":\"LTC\",\"DOGE\":\"DOGE\"}', 1, '{\"cron\":{\"title\": \"Cron URL\",\"value\":\"ipn.blockio\"}}', NULL, NULL, '2019-09-14 13:14:22', '2021-01-03 23:19:59'),
(15, 503, 'coinpayments', '5f6f1b6c02ecd1601117036.jpg', 'CoinPayments', 1, '{\"public_key\":{\"title\":\"Public Key\",\"global\":true,\"value\":\"7638eebaf4061b7f7cdfceb14046318bbdabf7e2f64944773d6550bd59f70274\"},\"private_key\":{\"title\":\"Private Key\",\"global\":true,\"value\":\"Cb6dee7af8Eb9E0D4123543E690dA3673294147A5Dc8e7a621B5d484a3803207\"},\"merchant_id\":{\"title\":\"Merchant ID\",\"global\":true,\"value\":\"93a1e014c4ad60a7980b4a7239673cb4\"}}', '{\"BTC\":\"Bitcoin\",\"BTC.LN\":\"Bitcoin (Lightning Network)\",\"LTC\":\"Litecoin\",\"CPS\":\"CPS Coin\",\"VLX\":\"Velas\",\"APL\":\"Apollo\",\"AYA\":\"Aryacoin\",\"BAD\":\"Badcoin\",\"BCD\":\"Bitcoin Diamond\",\"BCH\":\"Bitcoin Cash\",\"BCN\":\"Bytecoin\",\"BEAM\":\"BEAM\",\"BITB\":\"Bean Cash\",\"BLK\":\"BlackCoin\",\"BSV\":\"Bitcoin SV\",\"BTAD\":\"Bitcoin Adult\",\"BTG\":\"Bitcoin Gold\",\"BTT\":\"BitTorrent\",\"CLOAK\":\"CloakCoin\",\"CLUB\":\"ClubCoin\",\"CRW\":\"Crown\",\"CRYP\":\"CrypticCoin\",\"CRYT\":\"CryTrExCoin\",\"CURE\":\"CureCoin\",\"DASH\":\"DASH\",\"DCR\":\"Decred\",\"DEV\":\"DeviantCoin\",\"DGB\":\"DigiByte\",\"DOGE\":\"Dogecoin\",\"EBST\":\"eBoost\",\"EOS\":\"EOS\",\"ETC\":\"Ether Classic\",\"ETH\":\"Ethereum\",\"ETN\":\"Electroneum\",\"EUNO\":\"EUNO\",\"EXP\":\"EXP\",\"Expanse\":\"Expanse\",\"FLASH\":\"FLASH\",\"GAME\":\"GameCredits\",\"GLC\":\"Goldcoin\",\"GRS\":\"Groestlcoin\",\"KMD\":\"Komodo\",\"LOKI\":\"LOKI\",\"LSK\":\"LSK\",\"MAID\":\"MaidSafeCoin\",\"MUE\":\"MonetaryUnit\",\"NAV\":\"NAV Coin\",\"NEO\":\"NEO\",\"NMC\":\"Namecoin\",\"NVST\":\"NVO Token\",\"NXT\":\"NXT\",\"OMNI\":\"OMNI\",\"PINK\":\"PinkCoin\",\"PIVX\":\"PIVX\",\"POT\":\"PotCoin\",\"PPC\":\"Peercoin\",\"PROC\":\"ProCurrency\",\"PURA\":\"PURA\",\"QTUM\":\"QTUM\",\"RES\":\"Resistance\",\"RVN\":\"Ravencoin\",\"RVR\":\"RevolutionVR\",\"SBD\":\"Steem Dollars\",\"SMART\":\"SmartCash\",\"SOXAX\":\"SOXAX\",\"STEEM\":\"STEEM\",\"STRAT\":\"STRAT\",\"SYS\":\"Syscoin\",\"TPAY\":\"TokenPay\",\"TRIGGERS\":\"Triggers\",\"TRX\":\" TRON\",\"UBQ\":\"Ubiq\",\"UNIT\":\"UniversalCurrency\",\"USDT\":\"Tether USD (Omni Layer)\",\"VTC\":\"Vertcoin\",\"WAVES\":\"Waves\",\"XCP\":\"Counterparty\",\"XEM\":\"NEM\",\"XMR\":\"Monero\",\"XSN\":\"Stakenet\",\"XSR\":\"SucreCoin\",\"XVG\":\"VERGE\",\"XZC\":\"ZCoin\",\"ZEC\":\"ZCash\",\"ZEN\":\"Horizen\"}', 1, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-09-26 04:43:56'),
(16, 504, 'coinpayments_fiat', '5f6f1b94e9b2b1601117076.jpg', 'CoinPayments Fiat', 1, '{\"merchant_id\":{\"title\":\"Merchant ID\",\"global\":true,\"value\":\"93a1e014c4ad60a7980b4a7239673cb4\"}}', '{\"USD\":\"USD\",\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"CLP\":\"CLP\",\"CNY\":\"CNY\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"INR\":\"INR\",\"ISK\":\"ISK\",\"JPY\":\"JPY\",\"KRW\":\"KRW\",\"NZD\":\"NZD\",\"PLN\":\"PLN\",\"RUB\":\"RUB\",\"SEK\":\"SEK\",\"SGD\":\"SGD\",\"THB\":\"THB\",\"TWD\":\"TWD\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-10-22 03:17:29'),
(17, 505, 'coingate', '5f6f1b5fe18ee1601117023.jpg', 'Coingate', 1, '{\"api_key\":{\"title\":\"API Key\",\"global\":true,\"value\":\"Ba1VgPx6d437xLXGKCBkmwVCEw5kHzRJ6thbGo-N\"}}', '{\"USD\":\"USD\",\"EUR\":\"EUR\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-09-26 04:43:44'),
(18, 506, 'coinbase_commerce', '5f6f1b4c774af1601117004.jpg', 'Coinbase Commerce', 1, '{\"api_key\":{\"title\":\"API Key\",\"global\":true,\"value\":\"c47cd7df-d8e8-424b-a20a\"},\"secret\":{\"title\":\"Webhook Shared Secret\",\"global\":true,\"value\":\"55871878-2c32-4f64-ab66\"}}', '{\"USD\":\"USD\",\"EUR\":\"EUR\",\"JPY\":\"JPY\",\"GBP\":\"GBP\",\"AUD\":\"AUD\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"CNY\":\"CNY\",\"SEK\":\"SEK\",\"NZD\":\"NZD\",\"MXN\":\"MXN\",\"SGD\":\"SGD\",\"HKD\":\"HKD\",\"NOK\":\"NOK\",\"KRW\":\"KRW\",\"TRY\":\"TRY\",\"RUB\":\"RUB\",\"INR\":\"INR\",\"BRL\":\"BRL\",\"ZAR\":\"ZAR\",\"AED\":\"AED\",\"AFN\":\"AFN\",\"ALL\":\"ALL\",\"AMD\":\"AMD\",\"ANG\":\"ANG\",\"AOA\":\"AOA\",\"ARS\":\"ARS\",\"AWG\":\"AWG\",\"AZN\":\"AZN\",\"BAM\":\"BAM\",\"BBD\":\"BBD\",\"BDT\":\"BDT\",\"BGN\":\"BGN\",\"BHD\":\"BHD\",\"BIF\":\"BIF\",\"BMD\":\"BMD\",\"BND\":\"BND\",\"BOB\":\"BOB\",\"BSD\":\"BSD\",\"BTN\":\"BTN\",\"BWP\":\"BWP\",\"BYN\":\"BYN\",\"BZD\":\"BZD\",\"CDF\":\"CDF\",\"CLF\":\"CLF\",\"CLP\":\"CLP\",\"COP\":\"COP\",\"CRC\":\"CRC\",\"CUC\":\"CUC\",\"CUP\":\"CUP\",\"CVE\":\"CVE\",\"CZK\":\"CZK\",\"DJF\":\"DJF\",\"DKK\":\"DKK\",\"DOP\":\"DOP\",\"DZD\":\"DZD\",\"EGP\":\"EGP\",\"ERN\":\"ERN\",\"ETB\":\"ETB\",\"FJD\":\"FJD\",\"FKP\":\"FKP\",\"GEL\":\"GEL\",\"GGP\":\"GGP\",\"GHS\":\"GHS\",\"GIP\":\"GIP\",\"GMD\":\"GMD\",\"GNF\":\"GNF\",\"GTQ\":\"GTQ\",\"GYD\":\"GYD\",\"HNL\":\"HNL\",\"HRK\":\"HRK\",\"HTG\":\"HTG\",\"HUF\":\"HUF\",\"IDR\":\"IDR\",\"ILS\":\"ILS\",\"IMP\":\"IMP\",\"IQD\":\"IQD\",\"IRR\":\"IRR\",\"ISK\":\"ISK\",\"JEP\":\"JEP\",\"JMD\":\"JMD\",\"JOD\":\"JOD\",\"KES\":\"KES\",\"KGS\":\"KGS\",\"KHR\":\"KHR\",\"KMF\":\"KMF\",\"KPW\":\"KPW\",\"KWD\":\"KWD\",\"KYD\":\"KYD\",\"KZT\":\"KZT\",\"LAK\":\"LAK\",\"LBP\":\"LBP\",\"LKR\":\"LKR\",\"LRD\":\"LRD\",\"LSL\":\"LSL\",\"LYD\":\"LYD\",\"MAD\":\"MAD\",\"MDL\":\"MDL\",\"MGA\":\"MGA\",\"MKD\":\"MKD\",\"MMK\":\"MMK\",\"MNT\":\"MNT\",\"MOP\":\"MOP\",\"MRO\":\"MRO\",\"MUR\":\"MUR\",\"MVR\":\"MVR\",\"MWK\":\"MWK\",\"MYR\":\"MYR\",\"MZN\":\"MZN\",\"NAD\":\"NAD\",\"NGN\":\"NGN\",\"NIO\":\"NIO\",\"NPR\":\"NPR\",\"OMR\":\"OMR\",\"PAB\":\"PAB\",\"PEN\":\"PEN\",\"PGK\":\"PGK\",\"PHP\":\"PHP\",\"PKR\":\"PKR\",\"PLN\":\"PLN\",\"PYG\":\"PYG\",\"QAR\":\"QAR\",\"RON\":\"RON\",\"RSD\":\"RSD\",\"RWF\":\"RWF\",\"SAR\":\"SAR\",\"SBD\":\"SBD\",\"SCR\":\"SCR\",\"SDG\":\"SDG\",\"SHP\":\"SHP\",\"SLL\":\"SLL\",\"SOS\":\"SOS\",\"SRD\":\"SRD\",\"SSP\":\"SSP\",\"STD\":\"STD\",\"SVC\":\"SVC\",\"SYP\":\"SYP\",\"SZL\":\"SZL\",\"THB\":\"THB\",\"TJS\":\"TJS\",\"TMT\":\"TMT\",\"TND\":\"TND\",\"TOP\":\"TOP\",\"TTD\":\"TTD\",\"TWD\":\"TWD\",\"TZS\":\"TZS\",\"UAH\":\"UAH\",\"UGX\":\"UGX\",\"UYU\":\"UYU\",\"UZS\":\"UZS\",\"VEF\":\"VEF\",\"VND\":\"VND\",\"VUV\":\"VUV\",\"WST\":\"WST\",\"XAF\":\"XAF\",\"XAG\":\"XAG\",\"XAU\":\"XAU\",\"XCD\":\"XCD\",\"XDR\":\"XDR\",\"XOF\":\"XOF\",\"XPD\":\"XPD\",\"XPF\":\"XPF\",\"XPT\":\"XPT\",\"YER\":\"YER\",\"ZMW\":\"ZMW\",\"ZWL\":\"ZWL\"}\r\n\r\n', 0, '{\"endpoint\":{\"title\": \"Webhook Endpoint\",\"value\":\"ipn.coinbase_commerce\"}}', NULL, NULL, '2019-09-14 13:14:22', '2020-09-26 04:43:24'),
(24, 113, 'paypal_sdk', '5f6f1bec255c61601117164.jpg', 'Paypal Express', 1, '{\"clientId\":{\"title\":\"Paypal Client ID\",\"global\":true,\"value\":\"Ae0-tixtSV7DvLwIh3Bmu7JvHrjh5EfGdXr_cEklKAVjjezRZ747BxKILiBdzlKKyp-W8W_T7CKH1Ken\"},\"clientSecret\":{\"title\":\"Client Secret\",\"global\":true,\"value\":\"EOhbvHZgFNO21soQJT1L9Q00M3rK6PIEsdiTgXRBt2gtGtxwRer5JvKnVUGNU5oE63fFnjnYY7hq3HBA\"}}', '{\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CZK\":\"CZK\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"HKD\":\"HKD\",\"HUF\":\"HUF\",\"INR\":\"INR\",\"ILS\":\"ILS\",\"JPY\":\"JPY\",\"MYR\":\"MYR\",\"MXN\":\"MXN\",\"TWD\":\"TWD\",\"NZD\":\"NZD\",\"NOK\":\"NOK\",\"PHP\":\"PHP\",\"PLN\":\"PLN\",\"GBP\":\"GBP\",\"RUB\":\"RUB\",\"SGD\":\"SGD\",\"SEK\":\"SEK\",\"CHF\":\"CHF\",\"THB\":\"THB\",\"USD\":\"$\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-10-31 23:50:27'),
(25, 114, 'stripe_v3', '5f709684736321601214084.jpg', 'Stripe Checkout', 1, '{\"secret_key\":{\"title\":\"Secret Key\",\"global\":true,\"value\":\"sk_test_51HuxFUHyGzEKoTKAfIosswAQduMOGU4q4elcNr8OE6LoBZcp2MHKalOW835wjRiF6fxVTc7RmBgatKfAt1Qq0heb00rUaCOd2T\"},\"publishable_key\":{\"title\":\"PUBLISHABLE KEY\",\"global\":true,\"value\":\"pk_test_51HuxFUHyGzEKoTKAueAuF9BrMDA5boMcpJLLt0vu4q3QdPX5isaGudKNe6OyVjZP1UugpYd6JA7i7TczRWsbutaP004YmBiSp5\"},\"end_point\":{\"title\":\"End Point Secret\",\"global\":true,\"value\":\"w5555\"}}', '{\"USD\":\"USD\",\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"INR\":\"INR\",\"JPY\":\"JPY\",\"MXN\":\"MXN\",\"MYR\":\"MYR\",\"NOK\":\"NOK\",\"NZD\":\"NZD\",\"PLN\":\"PLN\",\"SEK\":\"SEK\",\"SGD\":\"SGD\"}', 0, '{\"webhook\":{\"title\": \"Webhook Endpoint\",\"value\":\"ipn.stripe_v3\"}}', NULL, NULL, '2019-09-14 13:14:22', '2020-12-05 03:56:14'),
(27, 115, 'mollie', '5f6f1bb765ab11601117111.jpg', 'Mollie', 1, '{\"mollie_email\":{\"title\":\"Mollie Email \",\"global\":true,\"value\":\"admin@gmail.com\"},\"api_key\":{\"title\":\"API KEY\",\"global\":true,\"value\":\"test_cucfwKTWfft9s337qsVfn5CC4vNkrn\"}}', '{\"AED\":\"AED\",\"AUD\":\"AUD\",\"BGN\":\"BGN\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"CZK\":\"CZK\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"HRK\":\"HRK\",\"HUF\":\"HUF\",\"ILS\":\"ILS\",\"ISK\":\"ISK\",\"JPY\":\"JPY\",\"MXN\":\"MXN\",\"MYR\":\"MYR\",\"NOK\":\"NOK\",\"NZD\":\"NZD\",\"PHP\":\"PHP\",\"PLN\":\"PLN\",\"RON\":\"RON\",\"RUB\":\"RUB\",\"SEK\":\"SEK\",\"SGD\":\"SGD\",\"THB\":\"THB\",\"TWD\":\"TWD\",\"USD\":\"USD\",\"ZAR\":\"ZAR\"}', 0, NULL, NULL, NULL, '2019-09-14 13:14:22', '2020-09-26 04:45:11'),
(30, 116, 'cashmaal', '5f9a8b62bb4dd1603963746.png', 'Cashmaal', 1, '{\"web_id\":{\"title\":\"Web Id\",\"global\":true,\"value\":\"3748\"},\"ipn_key\":{\"title\":\"IPN Key\",\"global\":true,\"value\":\"546254628759524554647987\"}}', '{\"PKR\":\"PKR\",\"USD\":\"USD\"}', 0, '{\"webhook\":{\"title\": \"IPN URL\",\"value\":\"ipn.cashmaal\"}}', NULL, NULL, NULL, '2020-10-29 03:29:06');

-- --------------------------------------------------------

--
-- Table structure for table `gateway_currencies`
--

CREATE TABLE `gateway_currencies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method_code` int(11) DEFAULT NULL,
  `gateway_alias` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_amount` decimal(18,8) NOT NULL,
  `max_amount` decimal(18,8) NOT NULL,
  `percent_charge` decimal(5,2) NOT NULL DEFAULT 0.00,
  `fixed_charge` decimal(18,8) NOT NULL DEFAULT 0.00000000,
  `rate` decimal(18,8) NOT NULL DEFAULT 0.00000000,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gateway_parameter` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sitename` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cur_text` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'currency text',
  `cur_sym` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'currency symbol',
  `email_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_template` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_api` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `base_color` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_config` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'email configuration',
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `working_hour` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ev` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'email verification, 0 - dont check, 1 - check',
  `en` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'email notification, 0 - dont send, 1 - send',
  `sv` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'sms verication, 0 - dont check, 1 - check',
  `sn` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'sms notification, 0 - dont send, 1 - send',
  `registration` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: Off	, 1: On',
  `social_login` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'social login',
  `social_credential` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_template` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sys_version` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `sitename`, `cur_text`, `cur_sym`, `email_from`, `email_template`, `sms_api`, `base_color`, `mail_config`, `location`, `phone`, `working_hour`, `ev`, `en`, `sv`, `sn`, `registration`, `social_login`, `social_credential`, `active_template`, `sys_version`, `created_at`, `updated_at`) VALUES
(1, 'ChangaLab', 'USD', '$', 'do-not-reply@viserlab.com', '<table style=\"color: rgb(0, 0, 0); font-family: &quot;Times New Roman&quot;; font-size: medium; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(0, 23, 54); text-decoration-style: initial; text-decoration-color: initial;\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#001736\"><tbody><tr><td valign=\"top\" align=\"center\"><table class=\"mobile-shell\" width=\"650\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\"><tbody><tr><td class=\"td container\" style=\"width: 650px; min-width: 650px; font-size: 0pt; line-height: 0pt; margin: 0px; font-weight: normal; padding: 55px 0px;\"><div style=\"text-align: center;\"><img src=\"https://i.ibb.co/Pcp1vqG/logo.png\" style=\"height: 240 !important;width: 338px;margin-bottom: 20px;\"></div><table style=\"width: 650px; margin: 0px auto;\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\"><tbody><tr><td style=\"padding-bottom: 10px;\"><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\"><tbody><tr><td class=\"tbrr p30-15\" style=\"padding: 60px 30px; border-radius: 26px 26px 0px 0px;\" bgcolor=\"#000036\"><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\"><tbody><tr><td style=\"color: rgb(255, 255, 255); font-family: Muli, Arial, sans-serif; font-size: 20px; line-height: 46px; padding-bottom: 25px; font-weight: bold;\">Hi {{name}} ,</td></tr><tr><td style=\"color: rgb(193, 205, 220); font-family: Muli, Arial, sans-serif; font-size: 20px; line-height: 30px; padding-bottom: 25px;\">{{message}}</td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table><table style=\"width: 650px; margin: 0px auto;\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\"><tbody><tr><td class=\"p30-15 bbrr\" style=\"padding: 50px 30px; border-radius: 0px 0px 26px 26px;\" bgcolor=\"#000036\"><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\"><tbody><tr><td class=\"text-footer1 pb10\" style=\"color: rgb(0, 153, 255); font-family: Muli, Arial, sans-serif; font-size: 18px; line-height: 30px; text-align: center; padding-bottom: 10px;\">© 2020 ChangaLab. All Rights Reserved.</td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table>', 'https://api.infobip.com/api/v3/sendsms/plain?user=******&password=*********&sender=ChangaLab&SMSText={{message}}&GSM={{number}}&type=longSMS', '2985c8', '{\"name\":\"php\"}', 'California, USA', '+1 (101) 100000', '24', 0, 1, 0, 0, 1, 0, '{\"google_client_id\":\"53929591142-l40gafo7efd9onfe6tj545sf9g7tv15t.apps.googleusercontent.com\",\"google_client_secret\":\"BRdB3np2IgYLiy4-bwMcmOwN\",\"fb_client_id\":\"277229062999748\",\"fb_client_secret\":\"1acfc850f73d1955d14b282938585122\"}', 'basic', NULL, NULL, '2021-03-24 08:28:20');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_align` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: left to right text align, 1: right to left text align',
  `is_default` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: not default language, 1: default language',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `code`, `icon`, `text_align`, `is_default`, `created_at`, `updated_at`) VALUES
(1, 'English', 'en', '5f15968db08911595250317.png', 0, 1, '2020-07-06 03:47:55', '2021-03-18 06:45:08'),
(5, 'Hindi', 'hn', NULL, 0, 0, '2020-12-29 02:20:07', '2020-12-29 02:20:16'),
(9, 'Bangla', 'bn', NULL, 0, 0, '2021-03-14 04:37:41', '2021-03-14 04:37:41');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_06_14_061757_create_support_tickets_table', 3),
(5, '2020_06_14_061837_create_support_messages_table', 3),
(6, '2020_06_14_061904_create_support_attachments_table', 3),
(7, '2020_06_14_062359_create_admins_table', 3),
(8, '2020_06_14_064604_create_transactions_table', 4),
(9, '2020_06_14_065247_create_general_settings_table', 5),
(12, '2014_10_12_100000_create_password_resets_table', 6),
(13, '2020_06_14_060541_create_user_logins_table', 6),
(14, '2020_06_14_071708_create_admin_password_resets_table', 7),
(15, '2020_09_14_053026_create_countries_table', 8),
(16, '2021_03_15_084721_create_admin_notifications_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'template name',
  `secs` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_default` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `slug`, `tempname`, `secs`, `is_default`, `created_at`, `updated_at`) VALUES
(1, 'HOME', 'home', 'templates.basic.', '[\"reserve\",\"feature\",\"counter\",\"client\",\"howto\",\"faq\",\"transaction\",\"newslatter\",\"blog\"]', 1, '2020-07-11 06:23:58', '2021-03-24 06:15:38'),
(2, 'About', 'about-us', 'templates.basic.', '[\"about\",\"mission\",\"client\"]', 0, '2020-07-11 06:35:35', '2021-03-24 06:17:24'),
(4, 'Blog', 'blog', 'templates.basic.', '[\"blog\",\"newslatter\"]', 1, '2020-10-22 01:14:43', '2020-12-29 11:42:03'),
(5, 'Contact', 'contact', 'templates.basic.', NULL, 1, '2020-10-22 01:14:53', '2020-10-22 01:14:53'),
(6, 'Affiliation', 'affiliate-program', 'templates.basic.', '[\"affiliation\",\"call\"]', 0, '2020-11-25 00:42:23', '2021-03-24 04:26:27');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `refferals`
--

CREATE TABLE `refferals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `level` int(11) NOT NULL,
  `percent` decimal(11,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `support_attachments`
--

CREATE TABLE `support_attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `support_message_id` int(11) NOT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `support_messages`
--

CREATE TABLE `support_messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `supportticket_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` int(11) NOT NULL DEFAULT 0,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `support_tickets`
--

CREATE TABLE `support_tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(91) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ticket` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL COMMENT '0: Open, 1: Answered, 2: Replied, 3: Closed',
  `last_reply` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `amount` decimal(18,8) NOT NULL DEFAULT 0.00000000,
  `charge` decimal(18,8) NOT NULL DEFAULT 0.00000000,
  `post_balance` decimal(18,8) NOT NULL DEFAULT 0.00000000,
  `trx_type` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trx` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref_by` int(11) DEFAULT NULL,
  `balance` decimal(18,8) NOT NULL DEFAULT 0.00000000,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(91) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'contains full address',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0: banned, 1: active',
  `ev` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: email unverified, 1: email verified',
  `sv` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: sms unverified, 1: sms verified',
  `ver_code` varchar(91) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'stores verification code',
  `ver_code_send_at` datetime DEFAULT NULL COMMENT 'verification send time',
  `ts` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: 2fa off, 1: 2fa on',
  `tv` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0: 2fa unverified, 1: 2fa verified',
  `tsc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_logins`
--

CREATE TABLE `user_logins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_ip` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(91) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `browser` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `os` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `withdrawals`
--

CREATE TABLE `withdrawals` (
  `id` int(10) UNSIGNED NOT NULL,
  `method_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `get_amount` decimal(18,8) NOT NULL,
  `get_currency` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `send_amount` decimal(18,8) NOT NULL,
  `send_currency` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` decimal(18,8) NOT NULL,
  `charge` decimal(18,8) NOT NULL,
  `trx` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `final_amount` decimal(18,8) NOT NULL DEFAULT 0.00000000,
  `withdraw_information` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=>success, 2=>pending, 3=>cancel,  ',
  `admin_feedback` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commission_logs`
--
ALTER TABLE `commission_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `currencies_name_unique` (`name`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_sms_templates`
--
ALTER TABLE `email_sms_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exchanges`
--
ALTER TABLE `exchanges`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `exchanges_exchange_id_unique` (`exchange_id`);

--
-- Indexes for table `extensions`
--
ALTER TABLE `extensions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frontends`
--
ALTER TABLE `frontends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gateways`
--
ALTER TABLE `gateways`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gateway_currencies`
--
ALTER TABLE `gateway_currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `refferals`
--
ALTER TABLE `refferals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_attachments`
--
ALTER TABLE `support_attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_messages`
--
ALTER TABLE `support_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_tickets`
--
ALTER TABLE `support_tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_logins`
--
ALTER TABLE `user_logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `commission_logs`
--
ALTER TABLE `commission_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email_sms_templates`
--
ALTER TABLE `email_sms_templates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;

--
-- AUTO_INCREMENT for table `exchanges`
--
ALTER TABLE `exchanges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `extensions`
--
ALTER TABLE `extensions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `frontends`
--
ALTER TABLE `frontends`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `gateways`
--
ALTER TABLE `gateways`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `gateway_currencies`
--
ALTER TABLE `gateway_currencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `refferals`
--
ALTER TABLE `refferals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `support_attachments`
--
ALTER TABLE `support_attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `support_messages`
--
ALTER TABLE `support_messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `support_tickets`
--
ALTER TABLE `support_tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_logins`
--
ALTER TABLE `user_logins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
