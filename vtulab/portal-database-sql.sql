-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2020 at 08:22 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recharge`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_bank`
--

CREATE TABLE `add_bank` (
  `serial` int(11) NOT NULL,
  `BankName` varchar(255) DEFAULT NULL,
  `AccNo` varchar(255) DEFAULT NULL,
  `AccName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `serial` int(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `pass` varchar(355) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`serial`, `user_id`, `pass`, `date`) VALUES
(1, 'admin', 'control', '2017-11-22 21:49:46');

-- --------------------------------------------------------

--
-- Table structure for table `api_setting`
--

CREATE TABLE `api_setting` (
  `serial` int(11) NOT NULL,
  `APIkey` varchar(255) DEFAULT NULL,
  `simKey` varchar(255) DEFAULT NULL,
  `smsUserid` varchar(255) DEFAULT NULL,
  `smsPass` varchar(255) DEFAULT NULL,
  `baseurl` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `api_setting`
--

INSERT INTO `api_setting` (`serial`, `APIkey`, `simKey`, `smsUserid`, `smsPass`, `baseurl`) VALUES
(1, '', '', '', '', 'https://www.epins.com.ng/sms/index.php?option=com_spc&comm=spc_api');

-- --------------------------------------------------------

--
-- Table structure for table `bankinfo`
--

CREATE TABLE `bankinfo` (
  `serial` int(11) NOT NULL,
  `bankname` varchar(255) DEFAULT NULL,
  `accno` varchar(255) DEFAULT NULL,
  `accname` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `serial` int(11) NOT NULL,
  `airtelvtu` varchar(255) NOT NULL,
  `mtnvtu` varchar(255) NOT NULL,
  `glovtu` varchar(255) NOT NULL,
  `9mobilevtu` varchar(255) NOT NULL,
  `dstv` varchar(255) NOT NULL,
  `gotv` varchar(255) NOT NULL,
  `startimes` varchar(255) NOT NULL,
  `airtelData` varchar(255) NOT NULL,
  `mtnData` varchar(255) NOT NULL,
  `gloData` varchar(255) NOT NULL,
  `9mobileData` varchar(255) NOT NULL,
  `IkejaElectric` varchar(255) NOT NULL,
  `EkoElectric` varchar(255) NOT NULL,
  `Kedc` varchar(255) NOT NULL,
  `Phed` varchar(255) NOT NULL,
  `Ibedc` varchar(255) NOT NULL,
  `JosElectric` varchar(255) NOT NULL,
  `smile` varchar(255) NOT NULL,
  `waec` varchar(255) NOT NULL,
  `reseller` varchar(255) DEFAULT NULL,
  `setup` varchar(255) DEFAULT NULL,
  `sms` varchar(255) NOT NULL,
  `aedc` varchar(255) NOT NULL,
  `affiliate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`serial`, `airtelvtu`, `mtnvtu`, `glovtu`, `9mobilevtu`, `dstv`, `gotv`, `startimes`, `airtelData`, `mtnData`, `gloData`, `9mobileData`, `IkejaElectric`, `EkoElectric`, `Kedc`, `Phed`, `Ibedc`, `JosElectric`, `smile`, `waec`, `reseller`, `setup`, `sms`, `aedc`, `affiliate`) VALUES
(1, '4', '3', '4', '4', '1.5', '1.5', '2.5', '4', '3', '4', '4', '2', '0.8', '1', '2', '1', '0.9', '5', '120', '5000', '45000', '2', '0.8', '10');

-- --------------------------------------------------------

--
-- Table structure for table `buypin`
--

CREATE TABLE `buypin` (
  `serial` int(11) NOT NULL,
  `orderno` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `descr` varchar(1000) NOT NULL,
  `status` varchar(100) NOT NULL,
  `process` varchar(100) NOT NULL,
  `del` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `commission`
--

CREATE TABLE `commission` (
  `serial` int(11) NOT NULL,
  `airtelvtu` varchar(255) NOT NULL,
  `mtnvtu` varchar(255) NOT NULL,
  `glovtu` varchar(255) NOT NULL,
  `9mobilevtu` varchar(255) NOT NULL,
  `dstv` varchar(255) NOT NULL,
  `gotv` varchar(255) NOT NULL,
  `startimes` varchar(255) NOT NULL,
  `airtelData` varchar(255) NOT NULL,
  `mtnData` varchar(255) NOT NULL,
  `gloData` varchar(255) NOT NULL,
  `9mobileData` varchar(255) NOT NULL,
  `IkejaElectric` varchar(255) NOT NULL,
  `EkoElectric` varchar(255) NOT NULL,
  `Kedc` varchar(255) NOT NULL,
  `Phed` varchar(255) NOT NULL,
  `Ibedc` varchar(255) NOT NULL,
  `JosElectric` varchar(255) NOT NULL,
  `smile` varchar(255) NOT NULL,
  `waec` varchar(255) NOT NULL,
  `reseller` varchar(255) DEFAULT NULL,
  `setup` varchar(255) DEFAULT NULL,
  `sms` varchar(255) DEFAULT NULL,
  `aedc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commission`
--

INSERT INTO `commission` (`serial`, `airtelvtu`, `mtnvtu`, `glovtu`, `9mobilevtu`, `dstv`, `gotv`, `startimes`, `airtelData`, `mtnData`, `gloData`, `9mobileData`, `IkejaElectric`, `EkoElectric`, `Kedc`, `Phed`, `Ibedc`, `JosElectric`, `smile`, `waec`, `reseller`, `setup`, `sms`, `aedc`) VALUES
(0, '0.2', '0.7', '1', '1', '0.5', '0.5', '0.5', '0.5', '0.5', '0.5', '0.5', '0.5', '0.3', '0.5', '0.5', '0.5', '0.5', '1', '30', NULL, NULL, '', '0.5');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `serial` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `numbers` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contactx`
--

CREATE TABLE `contactx` (
  `serial` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `deposit`
--

CREATE TABLE `deposit` (
  `serial` int(11) NOT NULL,
  `orderno` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `charge` varchar(100) NOT NULL,
  `currency` varchar(100) NOT NULL,
  `method` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `reg` varchar(100) NOT NULL,
  `process` varchar(100) NOT NULL,
  `del` varchar(100) NOT NULL,
  `switch` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `token` varchar(255) DEFAULT NULL,
  `ref` varchar(255) NOT NULL,
  `refer` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `earnings`
--

CREATE TABLE `earnings` (
  `serial` int(11) NOT NULL,
  `transaction` varchar(255) NOT NULL,
  `commission` varchar(255) NOT NULL,
  `withdrawal` varchar(255) NOT NULL,
  `alltime` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `period` varchar(255) NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `earnings`
--

INSERT INTO `earnings` (`serial`, `transaction`, `commission`, `withdrawal`, `alltime`, `status`, `user`, `period`, `date`) VALUES
(1, '', '', '0', '0', '', 'test@gmail.com', '2020-04', 0);

-- --------------------------------------------------------

--
-- Table structure for table `earnlog`
--

CREATE TABLE `earnlog` (
  `serial` int(11) NOT NULL,
  `transaction` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `refby` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `serial` int(11) NOT NULL,
  `network` varchar(100) NOT NULL,
  `recipient` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `email` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `serial` int(11) NOT NULL,
  `recipient` varchar(255) NOT NULL,
  `caller` varchar(255) NOT NULL,
  `callgroup` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `dat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `loginattempts`
--

CREATE TABLE `loginattempts` (
  `IP` varchar(20) NOT NULL,
  `Attempts` int(11) NOT NULL,
  `LastLogin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message_history`
--

CREATE TABLE `message_history` (
  `serial` int(11) NOT NULL,
  `mobile` mediumtext NOT NULL,
  `username` varchar(255) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `message` varchar(650) NOT NULL,
  `refid` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `senttime` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payalert`
--

CREATE TABLE `payalert` (
  `serial` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `teller` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `action` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `del` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `serial` int(11) NOT NULL,
  `paystackSecret` varchar(255) DEFAULT NULL,
  `paystackpub` varchar(255) DEFAULT NULL,
  `flutterpub` varchar(255) DEFAULT NULL,
  `flutterSecret` varchar(255) DEFAULT NULL,
  `bitpub` varchar(500) DEFAULT NULL,
  `bitsec` varchar(500) DEFAULT NULL,
  `activepay` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`serial`, `paystackSecret`, `paystackpub`, `flutterpub`, `flutterSecret`, `bitpub`, `bitsec`, `activepay`) VALUES
(36, '', '', '', '', '', '', 'paystack');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `serial` int(11) NOT NULL,
  `file` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `size` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `shortdes` varchar(100) NOT NULL,
  `salespage` varchar(200) NOT NULL,
  `download` varchar(200) NOT NULL,
  `code` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `del` varchar(100) NOT NULL,
  `downloadbutton` varchar(100) NOT NULL,
  `detailbutton` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `robocall`
--

CREATE TABLE `robocall` (
  `serial` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `fileurl` varchar(255) NOT NULL,
  `fileno` varchar(100) NOT NULL,
  `duration` varchar(100) NOT NULL,
  `charge` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sentsms`
--

CREATE TABLE `sentsms` (
  `serial` int(11) NOT NULL,
  `service` varchar(255) NOT NULL,
  `channel` varchar(255) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `recipient` varchar(255) NOT NULL,
  `msg` varchar(2000) NOT NULL,
  `ref` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `charge` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `serial` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `fileurl` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `action` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `edit` varchar(255) NOT NULL,
  `del` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`serial`, `filename`, `fileurl`, `link`, `name`, `description`, `action`, `date`, `edit`, `del`) VALUES
(6, '18112019120535EKEDC-1280x720.jpg', ' localhost/ap/admin/uploads/18112019120535EKEDC-1280x720.jpg ', 'disco.php?id=3', 'Eko Electric Payment', 'Generate Eko Electric Prepaid Meter Token Instantly. Pay for Postpaid Meter. ', 'Generate Token', '2020-04-10 13:15:14', '<button class="btn btn-info" style="cursor:pointer">Edit</button>', '<button class="btn btn-danger" style="cursor:pointer">Delete</button>'),
(7, '18112019121439Smile-Payment.jpg', ' localhost/ap/admin/uploads/18112019121439Smile-Payment.jpg ', 'smile.php', 'Smile Internet Payment', 'Top up Smile Internet data and Voice account instantly.', 'Recharge Now', '2020-04-10 13:27:07', '<button class="btn btn-info" style="cursor:pointer">Edit</button>', '<button class="btn btn-danger" style="cursor:pointer">Delete</button>'),
(9, '18112019122710Gotv-Payment.jpg', ' localhost/ap/admin/uploads/18112019122710Gotv-Payment.jpg ', 'paytv.php?id=2', 'GOTV Payment', 'Renew your GOTV account and get it activated instantly', 'Renew Now', '2020-04-10 13:29:42', '<button class="btn btn-info" style="cursor:pointer">Edit</button>', '<button class="btn btn-danger" style="cursor:pointer">Delete</button>'),
(10, '18112019123054IBEDC-Ibadan-Electricity-Distribution-Company.jpg', ' localhost/ap/admin/uploads/18112019123054IBEDC-Ibadan-Electricity-Distribution-Company.jpg ', 'disco.php?id=4', 'Ibadan Electric Payment', 'Generate IBEDC Electric Prepaid Meter Token Instantly or Pay for Postpaid Meter. ', 'Generate Token', '2020-04-10 13:31:19', '<button class="btn btn-info" style="cursor:pointer">Edit</button>', '<button class="btn btn-danger" style="cursor:pointer">Delete</button>'),
(11, '18112019123605MTN-Data.jpg', ' localhost/ap/admin/uploads/18112019123605MTN-Data.jpg ', 'airtime.php', 'VTU Airtime Recharge', 'Instant Airtime topup for all network', 'Recharge Now', '2020-04-10 13:40:12', '<button class="btn btn-info" style="cursor:pointer">Edit</button>', '<button class="btn btn-danger" style="cursor:pointer">Delete</button>'),
(12, '18112019124118Pay-DSTV-Subscription.jpg', ' localhost/ap/admin/uploads/18112019124118Pay-DSTV-Subscription.jpg ', 'paytv.php?id=6', 'DSTV Payment', 'Renew your DSTV account and get it activated instantly ', 'Renew Now', '2020-04-10 13:42:23', '<button class="btn btn-info" style="cursor:pointer">Edit</button>', '<button class="btn btn-danger" style="cursor:pointer">Delete</button>'),
(13, '18112019124358Startimes-Subscription.jpg', ' localhost/ap/admin/uploads/18112019124358Startimes-Subscription.jpg ', 'paytv.php?id=8', 'Startimes Payment', 'Renew your Startimes account and get it activated instantly ', 'Renew Now', '2020-04-10 13:42:54', '<button class="btn btn-info" style="cursor:pointer">Edit</button>', '<button class="btn btn-danger" style="cursor:pointer">Delete</button>'),
(14, '18112019125457WAEC-Result-Checker.jpg', ' localhost/ap/admin/uploads/18112019125457WAEC-Result-Checker.jpg ', 'waec.php', 'WAEC Result Checker PIN', 'Generate WAEC result checker PIN instantly', 'Generate  PIN', '2020-04-10 13:43:55', '<button class="btn btn-info" style="cursor:pointer">Edit</button>', '<button class="btn btn-danger" style="cursor:pointer">Delete</button>'),
(15, '18112019141721Port-Harcourt-Electric.jpg', ' localhost/ap/admin/uploads/18112019141721Port-Harcourt-Electric.jpg ', 'disco.php?id=5', 'Port Harcourt Electricity Payment', 'Generate Port Harcourt Electric Prepaid Meter Token Instantly or Pay for Postpaid Meter. ', 'Generate Token', '2020-04-10 13:45:16', '<button class="btn btn-info" style="cursor:pointer">Edit</button>', '<button class="btn btn-danger" style="cursor:pointer">Delete</button>'),
(16, '18112019143015Ikeja-Electric-Payment-PHCN.jpg', ' localhost/ap/admin/uploads/18112019143015Ikeja-Electric-Payment-PHCN.jpg ', 'disco.php?id=6', 'Ikeja Electric Payment', 'Generate Ikeja Electric Prepaid Meter Token Instantly or Pay for Postpaid Meter.', 'Generate Token', '2020-04-10 13:45:31', '<button class="btn btn-info" style="cursor:pointer">Edit</button>', '<button class="btn btn-danger" style="cursor:pointer">Delete</button>'),
(17, '18112019143807Jos-Electric-JED.jpg', ' localhost/ap/admin/uploads/18112019143807Jos-Electric-JED.jpg ', 'disco.php?id=9', 'Jos Electric Payment', 'Generate Jos Electric Prepaid Meter Token Instantly or Pay for Postpaid Meter. ', 'Generate Token', '2020-04-10 13:46:56', '<button class="btn btn-info" style="cursor:pointer">Edit</button>', '<button class="btn btn-danger" style="cursor:pointer">Delete</button>'),
(18, '18112019150117EEDC-Enugu-electricity-payment.jpg', ' localhost/ap/admin/uploads/18112019150117EEDC-Enugu-electricity-payment.jpg ', 'disco.php?id=9', 'Enugu Electricity Payment', 'Generate EEDC Electric Prepaid Meter Token Instantly or Pay for Postpaid Meter. ', 'Generate Token', '2020-04-10 13:47:31', '<button class="btn btn-info" style="cursor:pointer">Edit</button>', '<button class="btn btn-danger" style="cursor:pointer">Delete</button>'),
(21, '18112019181703cheap-bulksms-to-dnd-numbers.jpg', ' localhost/ap/admin/uploads/18112019181703cheap-bulksms-to-dnd-numbers.jpg ', 'sendsms.php', 'Send BulkSMS', 'Send bulksms to any GSM Number', 'Send SMS', '2020-04-10 13:48:08', '<button class="btn btn-info" style="cursor:pointer">Edit</button>', '<button class="btn btn-danger" style="cursor:pointer">Delete</button>'),
(29, '0303202020411307022020172151buy-data.jpg', ' localhost/ap/admin/uploads/0303202020411307022020172151buy-data.jpg ', 'data.php', 'Buy Internet Data', 'Topup your internet Data Directly', 'Buy Data', '2020-04-10 13:50:51', '<button class="btn btn-info" style="cursor:pointer">Edit</button>', '<button class="btn btn-danger" style="cursor:pointer">Delete</button>'),
(30, '06032020011038sme-data.jpg', ' localhost/ap/admin/uploads/06032020011038sme-data.jpg ', 'sme-data.php', 'SME Data', 'Buy SME Data for all network with instant activation', 'Buy Data', '2020-04-10 13:51:52', '<button class="btn btn-info" style="cursor:pointer">Edit</button>', '<button class="btn btn-danger" style="cursor:pointer">Delete</button>'),
(31, '06032020012306one-card.jpg', ' localhost/ap/admin/uploads/06032020012306one-card.jpg ', 'universal_card.php', 'Universal Airtime', 'Send airtime to any phone even if you do not know the receivers network', 'Recharge Now', '2020-04-10 14:04:08', '<button class="btn btn-info" style="cursor:pointer">Edit</button>', '<button class="btn btn-danger" style="cursor:pointer">Delete</button>');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `serial` int(11) NOT NULL,
  `sitekey` varchar(255) DEFAULT NULL,
  `secretkey` varchar(255) DEFAULT NULL,
  `sitelogo` varchar(255) NOT NULL,
  `sitename` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`serial`, `sitekey`, `secretkey`, `sitelogo`, `sitename`, `mobile`, `email`) VALUES
(0, '6LcoKN0UAAAAAKKIEwgtD3YRyj5B0-IKkWd1tQZt', '6LcoKN0UAAAAAJH4RU0KHr-CYubioUHfIJhAKBUM', '11042020112523logo-new-home.png', 'VTU Portal Creator', '08084121526', 'support@vtuportalcreator.com');

-- --------------------------------------------------------

--
-- Table structure for table `sme_data`
--

CREATE TABLE `sme_data` (
  `serial` int(11) NOT NULL,
  `mtnA` varchar(255) NOT NULL,
  `mtnB` varchar(255) NOT NULL,
  `mtnC` varchar(255) NOT NULL,
  `mtnD` varchar(255) NOT NULL,
  `mtnE` varchar(255) NOT NULL,
  `mtnF` varchar(255) NOT NULL,
  `airtelA` varchar(255) NOT NULL,
  `airtelB` varchar(2552) NOT NULL,
  `airtelC` varchar(255) NOT NULL,
  `airtelD` varchar(255) NOT NULL,
  `airtelE` varchar(255) NOT NULL,
  `airtelF` varchar(255) NOT NULL,
  `gloA` varchar(255) NOT NULL,
  `gloB` varchar(255) NOT NULL,
  `gloC` varchar(255) NOT NULL,
  `gloD` varchar(255) NOT NULL,
  `gloE` varchar(255) NOT NULL,
  `gloF` varchar(255) NOT NULL,
  `gloG` varchar(255) NOT NULL,
  `gloH` varchar(255) NOT NULL,
  `gloI` varchar(255) NOT NULL,
  `etisalatA` varchar(255) NOT NULL,
  `etisalatB` varchar(255) NOT NULL,
  `etisalatC` varchar(255) NOT NULL,
  `etisalatD` varchar(255) NOT NULL,
  `etisalatE` varchar(255) NOT NULL,
  `etisalatF` varchar(255) NOT NULL,
  `etisalatG` varchar(255) NOT NULL,
  `etisalatH` varchar(255) NOT NULL,
  `etisalatI` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sme_data`
--

INSERT INTO `sme_data` (`serial`, `mtnA`, `mtnB`, `mtnC`, `mtnD`, `mtnE`, `mtnF`, `airtelA`, `airtelB`, `airtelC`, `airtelD`, `airtelE`, `airtelF`, `gloA`, `gloB`, `gloC`, `gloD`, `gloE`, `gloF`, `gloG`, `gloH`, `gloI`, `etisalatA`, `etisalatB`, `etisalatC`, `etisalatD`, `etisalatE`, `etisalatF`, `etisalatG`, `etisalatH`, `etisalatI`) VALUES
(1, '430', '860', '1152', '2150', '1920', '3360', '960', '1960', '2350', '4350', '5500', '13500', '100', '200', '300', '400', '500', '1200', '1300', '3000', '4000', '480', '900', '1300', '1900', '3500', '4500', '7000', '9500', '13000');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `serial` int(11) NOT NULL,
  `network` varchar(100) NOT NULL,
  `serviceid` varchar(100) DEFAULT NULL,
  `vcode` varchar(255) DEFAULT NULL,
  `meterno` varchar(255) DEFAULT NULL,
  `channel` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `charge` varchar(100) DEFAULT NULL,
  `ref` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `email` varchar(100) NOT NULL,
  `refer` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `customer` varchar(100) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `del` varchar(255) DEFAULT NULL,
  `credit` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `acc` varchar(100) NOT NULL,
  `firstname` varchar(15) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `joining_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `level` varchar(100) NOT NULL,
  `IPaddress` varchar(45) NOT NULL,
  `block` varchar(100) NOT NULL,
  `blockpro` varchar(100) NOT NULL,
  `unblock` varchar(100) NOT NULL,
  `activate` varchar(100) NOT NULL,
  `blockinfo` varchar(100) NOT NULL,
  `blockstat` varchar(100) NOT NULL,
  `del` varchar(100) NOT NULL,
  `bal` varchar(100) NOT NULL,
  `pincredit` varchar(100) NOT NULL,
  `currency` varchar(100) NOT NULL,
  `acctype` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `accno` varchar(100) NOT NULL,
  `refid` varchar(100) NOT NULL,
  `refcount` varchar(100) NOT NULL,
  `refby` varchar(100) NOT NULL,
  `refbyid` varchar(100) NOT NULL,
  `refwallet` varchar(100) NOT NULL,
  `reflink` varchar(200) NOT NULL,
  `refunverified` varchar(100) NOT NULL,
  `refverified` varchar(100) NOT NULL,
  `apikey` varchar(255) NOT NULL,
  `credit` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `withdraw`
--

CREATE TABLE `withdraw` (
  `serial` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `method` varchar(255) NOT NULL,
  `action` varchar(255) DEFAULT NULL,
  `del` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `xpress`
--

CREATE TABLE `xpress` (
  `serial` int(11) NOT NULL,
  `network` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `orderno` varchar(100) NOT NULL,
  `serviceid` varchar(100) NOT NULL,
  `meter` varchar(100) NOT NULL,
  `meter_type` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_bank`
--
ALTER TABLE `add_bank`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `api_setting`
--
ALTER TABLE `api_setting`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `bankinfo`
--
ALTER TABLE `bankinfo`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `buypin`
--
ALTER TABLE `buypin`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `contactx`
--
ALTER TABLE `contactx`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `deposit`
--
ALTER TABLE `deposit`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `earnings`
--
ALTER TABLE `earnings`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `earnlog`
--
ALTER TABLE `earnlog`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `message_history`
--
ALTER TABLE `message_history`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `payalert`
--
ALTER TABLE `payalert`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `robocall`
--
ALTER TABLE `robocall`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `sentsms`
--
ALTER TABLE `sentsms`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `sme_data`
--
ALTER TABLE `sme_data`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `withdraw`
--
ALTER TABLE `withdraw`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `xpress`
--
ALTER TABLE `xpress`
  ADD PRIMARY KEY (`serial`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_bank`
--
ALTER TABLE `add_bank`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `serial` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `api_setting`
--
ALTER TABLE `api_setting`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bankinfo`
--
ALTER TABLE `bankinfo`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `buypin`
--
ALTER TABLE `buypin`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contactx`
--
ALTER TABLE `contactx`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `deposit`
--
ALTER TABLE `deposit`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1025;
--
-- AUTO_INCREMENT for table `earnings`
--
ALTER TABLE `earnings`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `earnlog`
--
ALTER TABLE `earnlog`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4796;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `message_history`
--
ALTER TABLE `message_history`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;
--
-- AUTO_INCREMENT for table `payalert`
--
ALTER TABLE `payalert`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `robocall`
--
ALTER TABLE `robocall`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
--
-- AUTO_INCREMENT for table `sentsms`
--
ALTER TABLE `sentsms`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `sme_data`
--
ALTER TABLE `sme_data`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `withdraw`
--
ALTER TABLE `withdraw`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `xpress`
--
ALTER TABLE `xpress`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
