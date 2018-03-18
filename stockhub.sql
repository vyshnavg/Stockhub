-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2018 at 04:52 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stockhub`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `add_id` int(10) NOT NULL,
  `state` varchar(25) NOT NULL,
  `city` varchar(30) NOT NULL,
  `street` varchar(100) NOT NULL,
  `building_no` varchar(25) NOT NULL,
  `land_mark` varchar(50) DEFAULT NULL,
  `pincode` int(7) NOT NULL,
  `country` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`add_id`, `state`, `city`, `street`, `building_no`, `land_mark`, `pincode`, `country`) VALUES
(1, 'Karnataka', 'Bangalore', '25th main, 3rd A Cross, J P Nagar', '1211', 'near playground', 650078, 'India'),
(2, 'Jharkhand', 'Bokaro', '35th Street', '200', '', 680625, 'India'),
(4, 'Chhattisgarh', 'Bastar', 'fdgdfg', 'dggg', 'dsf', 343422, 'India'),
(5, 'Madhya Pradesh', 'Alirajpur', 'sdf', 'fdsf', 'sdf', 323232, 'India'),
(6, 'Kerala', 'Alappuzha', 'dsfdsf', 'dsfdsf', 'fdsf', 343423, 'India'),
(14, 'Madhya Pradesh', 'Alirajpur', 'fdf', '5d', 'hhh', 323232, 'India');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registerdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `firstname`, `lastname`, `username`, `password`, `registerdate`) VALUES
(1, 'jim', 'jones', 'jim12345', '0a80250fe4bbd7759207d6bff43c8661', '2017-12-28 20:40:32');

-- --------------------------------------------------------

--
-- Table structure for table `diff_vendor_req`
--

CREATE TABLE `diff_vendor_req` (
  `request_id` int(11) NOT NULL,
  `vendor_id` varchar(11) NOT NULL,
  `quantity` int(10) NOT NULL,
  `quantity_unit` varchar(15) NOT NULL,
  `quoted_price` int(10) NOT NULL,
  `tender_id` int(11) NOT NULL,
  `delivery_date` date NOT NULL,
  `req_desc` text NOT NULL,
  `req_status` set('accepted','declined','pending','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diff_vendor_req`
--

INSERT INTO `diff_vendor_req` (`request_id`, `vendor_id`, `quantity`, `quantity_unit`, `quoted_price`, `tender_id`, `delivery_date`, `req_desc`, `req_status`) VALUES
(3, 'V1', 203, 'Pounds', 2500, 8, '2018-03-02', '', 'accepted'),
(4, 'V1', 100, 'Kilograms', 12000, 9, '2018-03-04', '', 'accepted'),
(5, 'V1', 1, 'Kilograms', 500, 29, '2018-03-15', '', 'accepted'),
(6, 'V1', 20, 'Kilograms', 500, 30, '2018-03-14', '', 'accepted'),
(7, 'V1', 1, 'Kilograms', 3000, 31, '2018-03-15', '', 'accepted'),
(8, 'V1', 50, 'Kilograms', 600, 32, '2018-03-19', '', 'declined'),
(9, 'V1', 50, 'Kilograms', 500, 32, '2018-03-20', '', 'declined'),
(10, 'V1', 50, 'Kilograms', 1000, 32, '2018-03-20', '', 'declined'),
(11, 'V1', 50, 'Kilograms', 1000, 32, '2018-03-20', '', 'pending'),
(12, 'V1', 3, 'Kilograms', 4500, 36, '2018-03-23', '', 'accepted');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `user_id` varchar(11) NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `m_id` varchar(11) NOT NULL,
  `m_firstname` varchar(25) NOT NULL,
  `m_lastname` varchar(25) NOT NULL,
  `m_email` varchar(100) NOT NULL,
  `m_username` varchar(21) NOT NULL,
  `m_password` varchar(255) NOT NULL,
  `m_org_name` int(50) DEFAULT NULL,
  `m_status` set('Active','Inactive') NOT NULL,
  `m_profile_pic` varchar(200) DEFAULT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`m_id`, `m_firstname`, `m_lastname`, `m_email`, `m_username`, `m_password`, `m_org_name`, `m_status`, `m_profile_pic`, `register_date`) VALUES
('M2', 'Jack', 'Doe', 'jack@google.com', 'jackdoe12', '0a80250fe4bbd7759207d6bff43c8661', NULL, 'Active', 'M2.png', '2018-03-18 14:06:36'),
('M8', 'Tim', 'Cook', 'icevys@yahoo.com', 'tim12345', '2c32c2f80b4e7801e1cbdc1cd9382dbd', NULL, 'Inactive', NULL, '2018-03-16 06:03:11'),
('M9', 'dfsd', 'sdf', 'df@sad.c', 'qweasdzxc', '0a80250fe4bbd7759207d6bff43c8661', NULL, 'Active', NULL, '2018-03-18 11:26:27');

-- --------------------------------------------------------

--
-- Table structure for table `material_subcat`
--

CREATE TABLE `material_subcat` (
  `subcat_id` int(11) NOT NULL,
  `subcat_name` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `material_subcat`
--

INSERT INTO `material_subcat` (`subcat_id`, `subcat_name`, `created_date`) VALUES
(1, 'Wood', '2017-12-31 16:11:51'),
(2, 'Glass', '2018-01-27 14:40:38'),
(3, 'Glue', '2018-02-16 12:53:49');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `messages_id` int(11) NOT NULL,
  `from_id` varchar(11) NOT NULL,
  `to_id` varchar(11) NOT NULL,
  `message_body` text NOT NULL,
  `message_type` set('Notification','DM') NOT NULL,
  `message_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`messages_id`, `from_id`, `to_id`, `message_body`, `message_type`, `message_time`) VALUES
(21, 'M2', 'V1', 'A Tender is available for Hide Glue. <a href=\"http://localhost/Stockhub/tenders/view/32\">View..</a>', 'Notification', '2018-03-12 04:26:30'),
(24, 'V1', 'M8', 'Another manufacuturer', 'DM', '2018-03-12 10:04:26'),
(30, 'M2', 'V1', 'Hello, what is the quality grade of the product?', 'DM', '2018-03-16 03:00:41'),
(36, 'M2', 'V1', 'hello\r\n', 'DM', '2018-03-16 10:48:28');

-- --------------------------------------------------------

--
-- Table structure for table `m_address_dict`
--

CREATE TABLE `m_address_dict` (
  `m_address_dict_id` int(11) NOT NULL,
  `manufacturer_id` varchar(11) NOT NULL,
  `add_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_address_dict`
--

INSERT INTO `m_address_dict` (`m_address_dict_id`, `manufacturer_id`, `add_id`) VALUES
(1, 'M2', 1),
(2, 'M2', 2),
(4, 'M9', 5),
(5, 'M9', 6);

-- --------------------------------------------------------

--
-- Table structure for table `product_cat`
--

CREATE TABLE `product_cat` (
  `product_cat_id` int(11) NOT NULL,
  `product_cat_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_cat`
--

INSERT INTO `product_cat` (`product_cat_id`, `product_cat_name`) VALUES
(1, 'Table');

-- --------------------------------------------------------

--
-- Table structure for table `product_subcat`
--

CREATE TABLE `product_subcat` (
  `product_subcat_id` int(11) NOT NULL,
  `subcat_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_subcat`
--

INSERT INTO `product_subcat` (`product_subcat_id`, `subcat_id`, `product_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `raw_material`
--

CREATE TABLE `raw_material` (
  `raw_material_id` int(11) NOT NULL,
  `rm_name` varchar(255) NOT NULL,
  `material_subcat_id` int(255) NOT NULL,
  `rm_slug` varchar(255) NOT NULL,
  `rm_pic` varchar(255) NOT NULL,
  `rm_desc` text NOT NULL,
  `rm_adv` text NOT NULL,
  `rm_disadv` text NOT NULL,
  `rm_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `raw_material`
--

INSERT INTO `raw_material` (`raw_material_id`, `rm_name`, `material_subcat_id`, `rm_slug`, `rm_pic`, `rm_desc`, `rm_adv`, `rm_disadv`, `rm_created_at`) VALUES
(1, 'Teak', 1, 'teak', 'teak1.jpg', 'Teak Lumber is a close-grained hardwood with high natural oil and silica content. It is one of the hardest, strongest and most durable of all timbers, highly resistant to any rotting and almost impervious to the effects of hot sun, rain, frost or snow. Teak Lumber requires little or no maintenance regardless of the environment. These characteristics combine to make it the ideal timber for all outdoor applications, and it has been the choice of boat builders for centuries. Once seen primarily on elegant yachts and in the most extravagant estates, teak wood is now a premium wood of choice for designers of hotels, corporate headquarters and upscale homes. Apart from its natural beauty, teak is one of the most valuable of all woods. Teak is popular for usage in Residential Teak Decking, Marine Teak Decking, Siding, Flooring, and Teak Plywood. ', 'Teak wood has a very high aesthetic appeal with a very attractive looking straight grain pattern coupled with a rich golden-brown colour. Teak wood is an exceptionally strong hardwood from broad leaved deciduous trees used as a furniture and if taken care of well it can last for ages and ages. Teak with its natural oil resists organically the termites (white ants) and also the other insects that can destroy the wood. Teak wood is a very heavy and dense wood. It has a high weight to volume ratio.', 'Teak wood is very costly. The reason behind this is the declining availability of natural resources over the years. The demand is as high as ever, but the supply has reduced. Genuine and high-quality teak wood is hard to identify for customers since many number of other alternatives (such as teak oiled and teak covered) are made available in the market. Teak is a hardwood. From a carpenters point of view it presents a minor problem since the woodworking tools become blunt and there arises a need to be sharpened while working on the wood. The teak wood furniture requires more care and maintenance.', '2018-02-16 13:01:40'),
(2, 'Oak', 1, 'oak', 'oak.png', 'Oak is a hardwood that tends to be very grainy. There are two varieties: red oak, which ranges from light brown to pinkish red with a swirling, waterlike pattern, and white oak, which has a tiger-stripe grain with yellow rays and flecks. Oak is often used in pieces made in the Arts and Crafts or Mission style.', 'It is very durable and often cut in a way that makes it resistant to warping. Because of its visible wavy grain, it has a distinctive look. A clear finish nicely highlights the grain.', 'Stain can overly darken and exaggerate the grain, so it can end up looking two-toned.', '2018-02-16 13:02:11'),
(5, 'Glass Fibre', 2, 'glass-fibre', 'glass-fibre.png', 'Glass fibre has many uses from roof insulation to medical equipment and its composition varies depending on its application.\r\n\r\nFor building insulation and glass wool the type of glass used is normally soda lime.\r\n\r\nFor textiles , an alumino-borosilicate glass with very low sodium oxide content is preferred because of its good chemical durability and high softening point. This is also the type of glass fibre used in the reinforced plastics to make protective helmets, boats, piping, car chassis, ropes, car exhausts and many other items.', 'glass fiber than organic fiber, high temperature resistance, non flammable,corrosion-resistance, heat-insulation, good- sound-insulation (especially glass wool), high tensile strength, good insulation (such as non-alkali glass fiber).', 'Brittle, weak abrasive-resistance', '2018-02-16 13:02:42'),
(7, 'Pine', 1, 'pine', 'pine.png', 'Pine is an inexpensive, lightweight wood that can be yellowish or whitish with brown knots. It\'s often used for rustic pieces, like farmhouse-style tables.', 'It\'s low-cost, and it takes paint well, so it\'s great for kids\' furniture. (The same holds true for birch and poplar.) Pine develops a nice, rustic patina from age and use, and it resists shrinking and swelling.', 'It\'s a softwood, so it\'s prone to scratches and dents.', '2018-02-16 13:03:13'),
(8, 'Cherry', 1, 'cherry', 'cherry.png', 'Cherry is a hardwood with a fine, straight grain that ranges from reddish brown to blond. It is often used for carved chairs but also shows up in clean-lined Shaker-style tables and cabinets.', 'It\'s easily shaped, and it polishes well. Unstained, it has a rich, beautiful color.', 'It\'s expensive. Sometimes the color darkens with age.', '2018-02-16 13:03:36'),
(9, 'Maple', 1, 'maple', 'maple.png', 'Maple is a creamy white hardwood that sometimes has a reddish tinge. One of the hardest wood species, maple is often chosen for heavy-use items, like dressers and kitchen cabinets.', 'Maple is affordable and ultra-durable. It can take a beating and look great for years. Because it takes dark stains well, maple is often stained to mimic a pricier wood, like cherry or mahogany (which is a controversial pick itself because of deforestation in the regions where it\'s harvested).', 'If maple is not properly sealed first, the staining can look blotchy.', '2018-02-16 13:03:59'),
(10, 'Walnut', 1, 'walnut', 'walnut.png', 'Walnut is a straight-grained hardwood that ranges from chocolate brown (when it\'s from the center of the tree) to yellow (from the outer portion of the tree). A top pick for head-boards, ornate antique-style dining tables, and mantels, walnut is typically clear-coated or oiled to bring out its color.', 'It\'s a very strong and stable wood that can take intricate carving. The color can be beautiful.', 'Some may not like the variation from dark to light that\'s sometimes found on a single wide board. It\'s also one of the more costly woods.', '2018-02-16 13:04:25'),
(11, 'PVA', 3, 'pva', 'pva.jpg', 'Polyvinyl acetate (PVA) glue is the most common type of glue out there. It’s so common that if you have a bottle of glue in your house, it’s likely to be PVA glue. White glue, yellow glue, and bottles of “wood glue” are all likely to be PVA glue. Some special formulations of PVA glue such as Titebond III are waterproof. ', 'PVA Glue is readily available at your local store', 'But after you glue up your project, bits of dried PVA glue can interfere with your finish if you’re not careful to get rid of all of it.', '2018-02-16 13:04:54'),
(12, 'Hide Glue', 3, 'hide-glue', 'hide_glue.jpg', 'Hide glue has been around for centuries, and yes, it comes from animal hides. Hot hide glue is made by heating granules of hide glue in a pot with water. As it heats, the glue liquifies, and as it cools, it becomes solid. Hot hide glue can be applied by dipping a brush in the glue pot and brushing it onto the workpiece.', 'You can use it just like PVA glue, and it has the advantage of not interfering with finishes if you don’t get the very last bit of dried hide glue off the wood. ', 'Cannot be used for water-proof projects', '2018-02-16 13:07:45'),
(13, 'Epoxy', 3, 'epoxy', 'epoxy.jpg', 'Epoxy comes in two parts: a resin and a hardener. Both are liquid, but when mixed together a chemical reaction occurs that causes the epoxy to harden.Some epoxy formulas take a while to cure, others will cure in as little as five minutes. In general, the longer it takes for the epoxy to cure, the stronger the bond will be, so patience will be rewarded.', 'Epoxy has the advantage of being waterproof and does a good job filling gaps in wood. Most other glues will not hold well if there is a gap between the pieces of wood that you are gluing together.', 'Takes a lot of time to cure.', '2018-02-16 13:07:45'),
(14, 'Cyanoacrylate glue', 3, 'cyanoacrylate-glue', 'cyanoacrylate_glue.jpg', 'CA glue, or super glue, is well known as a glue to use to join hard pieces together. It can also be used in woodworking. CA glue can be used as a temporary way of joining two pieces of wood together as a temporary step in making a project. For example, if you are joining two curved pieces of wood together, a glue block can be temporarily attached to the pieces to give your clamps a place to hold onto. CA glue is perfect for this purpose, as it can be used to attach the glue blocks, and once the pieces are glued together, a tap with a hammer or mallet will knock the glue blocks right off', 'The advantage of CA glue is that it cures in a very short period of time, and if you’re really in a hurry, you can apply an accelerant (seen in the back of the bottle of CA glue in the photo) to make the CA glue set even faster.', 'The glue joint is very hard and can fracture under impact.', '2018-02-16 13:10:13'),
(15, 'Polyurethane glue', 3, 'polyurethane-glue', 'polyurethane_glue.jpg', 'Polyurethane glue is activated by moisture, and swells as it is activated and dries. It dries very hard and quickly, and is waterproof, but dealing with dried polyurethane glue can be problematic for finishes.', 'It dries very hard and quickly, and is waterproof', 'Dealing with this glue is very problematic for finishes', '2018-02-16 13:10:13');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `rep_id` int(11) NOT NULL,
  `user_id` varchar(11) NOT NULL,
  `accused_id` varchar(11) NOT NULL,
  `message` text NOT NULL,
  `report_type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tender`
--

CREATE TABLE `tender` (
  `tender_id` int(11) NOT NULL,
  `m_id` varchar(11) NOT NULL,
  `raw_material_id` int(11) NOT NULL,
  `tender_quantity` int(11) NOT NULL,
  `tender_quantity_unit` varchar(15) NOT NULL,
  `date_of_submission` date NOT NULL,
  `time_submission` time NOT NULL,
  `date_expire` date NOT NULL,
  `time_expire` time NOT NULL,
  `delivery_location` int(11) NOT NULL,
  `estimated_price` int(9) NOT NULL,
  `extra_info` text,
  `tender_status` set('active','ongoing','completed','expired','cancelled') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tender`
--

INSERT INTO `tender` (`tender_id`, `m_id`, `raw_material_id`, `tender_quantity`, `tender_quantity_unit`, `date_of_submission`, `time_submission`, `date_expire`, `time_expire`, `delivery_location`, `estimated_price`, `extra_info`, `tender_status`) VALUES
(29, 'M2', 2, 500, 'Kilograms', '2018-03-12', '09:14:00', '2018-03-16', '09:14:00', 1, 2000, '', 'cancelled'),
(30, 'M2', 2, 500, 'Kilograms', '2018-03-12', '09:22:00', '2018-03-15', '09:21:00', 1, 5500, '', 'completed'),
(31, 'M2', 9, 5, 'Kilograms', '2018-03-12', '09:47:00', '2018-03-30', '09:47:00', 1, 5000, 'pieces of 5/2', 'cancelled'),
(32, 'M2', 12, 50, 'Kilograms', '2018-03-12', '09:56:00', '2018-03-20', '09:56:00', 2, 500, '', 'active'),
(33, 'M2', 8, 1, 'Kilograms', '2018-03-12', '09:57:00', '2018-03-29', '09:57:00', 2, 500, '', 'active'),
(34, 'M2', 7, 15, 'Kilograms', '2018-03-12', '14:44:00', '2018-03-28', '14:44:00', 2, 500, '', 'active'),
(35, 'M2', 5, 1, 'Kilograms', '2018-03-16', '11:24:00', '2018-03-19', '11:18:00', 1, 0, '', 'active'),
(36, 'M2', 11, 10, 'Kilograms', '2018-03-16', '16:03:00', '2018-03-25', '16:03:00', 2, 5000, '5*2 pieces', 'cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `trans_id` int(11) NOT NULL,
  `tender_created_id` int(11) NOT NULL,
  `diff_vendor_reqid` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `start_time` time NOT NULL,
  `delvy_date` date NOT NULL,
  `delvy_time` time NOT NULL,
  `trans_delay_time` tinyint(3) DEFAULT NULL,
  `trans_delay_unit` varchar(11) DEFAULT NULL,
  `trans_message` text,
  `trans_status` set('orderConfirmed','packed','dispatched','delivered') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`trans_id`, `tender_created_id`, `diff_vendor_reqid`, `start_date`, `start_time`, `delvy_date`, `delvy_time`, `trans_delay_time`, `trans_delay_unit`, `trans_message`, `trans_status`) VALUES
(3, 8, 3, '2018-02-26', '14:50:00', '2018-03-02', '14:50:00', 1, 'Days', '', 'delivered'),
(4, 9, 4, '2018-03-01', '22:56:00', '2018-03-04', '22:56:00', 1, 'Hours', '', 'dispatched'),
(5, 29, 5, '2018-03-12', '09:20:00', '2018-03-15', '09:20:00', 1, 'Days', '', 'orderConfirmed'),
(6, 30, 6, '2018-03-12', '09:33:00', '2018-03-14', '09:33:00', NULL, NULL, '', 'delivered'),
(7, 31, 7, '2018-03-12', '09:48:00', '2018-03-15', '09:48:00', 2, 'Days', 'sorry', 'packed'),
(8, 36, 12, '2018-03-16', '16:19:00', '2018-03-23', '16:19:00', 1, 'Days', '', 'packed');

-- --------------------------------------------------------

--
-- Table structure for table `trde_mrkt`
--

CREATE TABLE `trde_mrkt` (
  `id_trade_mrkt` int(11) NOT NULL,
  `v_id` varchar(11) NOT NULL,
  `location` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `v_id` varchar(11) NOT NULL,
  `v_email` varchar(100) NOT NULL,
  `v_username` varchar(21) NOT NULL,
  `v_password` varchar(255) NOT NULL,
  `v_firstname` varchar(25) NOT NULL,
  `v_lastname` varchar(25) NOT NULL,
  `v_address_id` varchar(10) DEFAULT NULL,
  `v_status` set('Active','Inactive') NOT NULL,
  `v_profile_pic` varchar(100) DEFAULT NULL,
  `v_org_name` varchar(50) DEFAULT NULL,
  `v_website` varchar(100) DEFAULT NULL,
  `v_exprt_mthd` varchar(25) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`v_id`, `v_email`, `v_username`, `v_password`, `v_firstname`, `v_lastname`, `v_address_id`, `v_status`, `v_profile_pic`, `v_org_name`, `v_website`, `v_exprt_mthd`, `created_at`) VALUES
('V1', 'sam@time.in', 'samlaw12', '0a80250fe4bbd7759207d6bff43c8661', 'Sam', 'Lawrence', '14', 'Active', '', 'Sam Lawrence', 'http://www.samlaw.com', 'Ship', '2018-03-15 04:48:29');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_materials`
--

CREATE TABLE `vendor_materials` (
  `v_material_id` int(11) NOT NULL,
  `vendor_id` varchar(11) NOT NULL,
  `v_raw_material_id` int(11) NOT NULL,
  `quality_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor_materials`
--

INSERT INTO `vendor_materials` (`v_material_id`, `vendor_id`, `v_raw_material_id`, `quality_info`) VALUES
(3, 'V1', 12, 'Imported from aus'),
(4, 'V1', 11, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`add_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diff_vendor_req`
--
ALTER TABLE `diff_vendor_req`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `material_subcat`
--
ALTER TABLE `material_subcat`
  ADD PRIMARY KEY (`subcat_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`messages_id`);

--
-- Indexes for table `m_address_dict`
--
ALTER TABLE `m_address_dict`
  ADD PRIMARY KEY (`m_address_dict_id`);

--
-- Indexes for table `product_cat`
--
ALTER TABLE `product_cat`
  ADD PRIMARY KEY (`product_cat_id`);

--
-- Indexes for table `product_subcat`
--
ALTER TABLE `product_subcat`
  ADD PRIMARY KEY (`product_subcat_id`);

--
-- Indexes for table `raw_material`
--
ALTER TABLE `raw_material`
  ADD PRIMARY KEY (`raw_material_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`rep_id`);

--
-- Indexes for table `tender`
--
ALTER TABLE `tender`
  ADD PRIMARY KEY (`tender_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`trans_id`);

--
-- Indexes for table `trde_mrkt`
--
ALTER TABLE `trde_mrkt`
  ADD PRIMARY KEY (`id_trade_mrkt`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`v_id`);

--
-- Indexes for table `vendor_materials`
--
ALTER TABLE `vendor_materials`
  ADD PRIMARY KEY (`v_material_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `add_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `diff_vendor_req`
--
ALTER TABLE `diff_vendor_req`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `material_subcat`
--
ALTER TABLE `material_subcat`
  MODIFY `subcat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `messages_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `m_address_dict`
--
ALTER TABLE `m_address_dict`
  MODIFY `m_address_dict_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_cat`
--
ALTER TABLE `product_cat`
  MODIFY `product_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_subcat`
--
ALTER TABLE `product_subcat`
  MODIFY `product_subcat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `raw_material`
--
ALTER TABLE `raw_material`
  MODIFY `raw_material_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `rep_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tender`
--
ALTER TABLE `tender`
  MODIFY `tender_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `trde_mrkt`
--
ALTER TABLE `trde_mrkt`
  MODIFY `id_trade_mrkt` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendor_materials`
--
ALTER TABLE `vendor_materials`
  MODIFY `v_material_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
