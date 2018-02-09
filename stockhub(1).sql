-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2018 at 06:51 AM
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
(2, 'Jharkhand', 'Bokaro', '35th Street', '200', '', 680625, 'India');

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
-- Table structure for table `adv_table`
--

CREATE TABLE `adv_table` (
  `adv_id` int(11) NOT NULL,
  `raw_material_id` int(11) NOT NULL,
  `adv_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `diff_vendor_req`
--

CREATE TABLE `diff_vendor_req` (
  `request_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `quantity` int(10) NOT NULL,
  `quoted_price` int(10) NOT NULL,
  `tender_id` int(11) NOT NULL,
  `delivery_date` date NOT NULL,
  `req_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `disadv_table`
--

CREATE TABLE `disadv_table` (
  `disadv_id` int(11) NOT NULL,
  `raw_material_id` int(11) NOT NULL,
  `disadv_desc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `m_id` int(11) NOT NULL,
  `m_firstname` varchar(25) NOT NULL,
  `m_lastname` varchar(25) NOT NULL,
  `m_email` varchar(100) NOT NULL,
  `m_username` varchar(21) NOT NULL,
  `m_password` varchar(255) NOT NULL,
  `m_address_id` int(10) DEFAULT NULL,
  `m_org_name` int(50) DEFAULT NULL,
  `m_status` set('Active','Inactive') NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`m_id`, `m_firstname`, `m_lastname`, `m_email`, `m_username`, `m_password`, `m_address_id`, `m_org_name`, `m_status`, `register_date`) VALUES
(2, 'Jack', 'Doe', 'jack@google.com', 'jackdoe12', '0a80250fe4bbd7759207d6bff43c8661', 1, NULL, 'Active', '2018-02-09 05:47:27'),
(8, 'Tim', 'Cook', 'tim@cook.in', 'tim12345', '0a80250fe4bbd7759207d6bff43c8661', NULL, NULL, 'Inactive', '2018-01-10 05:59:35');

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
(2, 'Glass', '2018-01-27 14:40:38');

-- --------------------------------------------------------

--
-- Table structure for table `m_address_dict`
--

CREATE TABLE `m_address_dict` (
  `m_address_dict_id` int(11) NOT NULL,
  `m_id` int(11) NOT NULL,
  `add_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_address_dict`
--

INSERT INTO `m_address_dict` (`m_address_dict_id`, `m_id`, `add_id`) VALUES
(1, 2, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `product_cat`
--

CREATE TABLE `product_cat` (
  `product_cat_id` int(11) NOT NULL,
  `product_cat_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `rm_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `raw_material`
--

INSERT INTO `raw_material` (`raw_material_id`, `rm_name`, `material_subcat_id`, `rm_slug`, `rm_pic`, `rm_desc`, `rm_created_at`) VALUES
(1, 'Teak', 1, 'teak', 'teak1.jpg', 'Teak Lumber is a close-grained hardwood with high natural oil and silica content. It is one of the hardest, strongest and most durable of all timbers, highly resistant to any rotting and almost impervious to the effects of hot sun, rain, frost or snow. Teak Lumber requires little or no maintenance regardless of the environment. These characteristics combine to make it the ideal timber for all outdoor applications, and it has been the choice of boat builders for centuries. Once seen primarily on elegant yachts and in the most extravagant estates, teak wood is now a premium wood of choice for designers of hotels, corporate headquarters and upscale homes. Apart from its natural beauty, teak is one of the most valuable of all woods. Teak is popular for usage in Residential Teak Decking, Marine Teak Decking, Siding, Flooring, and Teak Plywood. ', '2017-12-31 18:29:10'),
(2, 'White Oak', 1, 'white-oak', 'white-oak.jpg', 'White Oak wood lumber is strong, beautiful, rot-resistant, easy-to-work, and economical, representing an exceptional value to woodworkers. It’s no wonder that the White Oak Wood Lumber is so widely used in cabinet and furniture making. White Oak is commonly used in  Cabinetry, furniture, interior trim, flooring, boatbuilding, barrels, and veneer.', '2017-12-31 18:29:18'),
(3, 'Borosilicate Glass', 2, 'borosilicate-glass', 'borosilicate-glass.jpg', 'Most of us are more familiar with this type of glass in the form of ovenware and other heat-resisting ware, better known under the trade name Pyrex.\r\n\r\nBorosilicate glass (or sodium-borosilicate glass) is made mainly of silica (70-80%) and boric oxide (7-13%) with smaller amounts of the alkalis (sodium and potassium oxides) and aluminium oxide.\r\n\r\nThis type of glass has a relatively low alkali content and consequently has both excellent chemical durability and thermal shock resistance - meaning it doesn\'t break when changing temperature quickly. ', '2018-01-27 14:39:45'),
(4, 'Commercial Glass', 2, 'commercial-glass', 'commercial-glass.png', 'Most of the glass we see around us in our everyday lives in the form of bottles and jars, flat glass for windows or for drinking glasses is known as commercial glass or soda-lime glass, as soda ash is used in its manufacture.\r\n\r\nThe main constituent of practically all commercial glass is sand. Sand by itself can be fused to produce glass but the temperature at which this can be achieved is about 1700°C. Adding other minerals and chemicals to sand can considerably reduce the melting temperature.\r\n\r\nThe addition of sodium carbonate (Na2CO3), known as soda ash, to produce a mixture of 75% silica (SiO2) and 25% of sodium oxide (Na2O), will reduce the temperature of fusion to about 800°C. However, a glass of this composition is water-soluble and is known as water glass. In order to give the glass stability, other chemicals like calcium oxide (CaO) and magnesium oxide (MgO) are needed. These are obtained by adding limestone which results in a pure inert glass.', '2018-01-27 14:44:02'),
(5, 'Glass Fibre', 2, 'glass-fibre', 'glass-fibre.png', 'Glass fibre has many uses from roof insulation to medical equipment and its composition varies depending on its application.\r\n\r\nFor building insulation and glass wool the type of glass used is normally soda lime.\r\n\r\nFor textiles , an alumino-borosilicate glass with very low sodium oxide content is preferred because of its good chemical durability and high softening point. This is also the type of glass fibre used in the reinforced plastics to make protective helmets, boats, piping, car chassis, ropes, car exhausts and many other items.', '2018-01-27 14:44:02'),
(6, 'Lead Glass', 2, 'lead-glass', 'lead-glass.png', 'Commonly known as lead crystal, lead glass is used to make a wide variety of decorative glass objects. It is made by using lead oxide instead of calcium oxide, and potassium oxide instead of all or most of the sodium oxide.\r\n\r\nThe traditional English full lead crystal contains at least 30% lead oxide (PbO) but any glass containing at least 24% PbO can be described as lead crystal. Glass containing less than 24% PbO, is known simply as crystal glass. The lead is locked into the chemical structure of the glass so there is no risk to human health.\r\n\r\nLead glass has a high refractive index making it sparkle brightly and a relatively soft surface so that it is easy to decorate by grinding, cutting and engraving which highlights the crystals brilliance making it popular for glasses, decanters and other decorative objects.', '2018-01-27 14:45:32');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `rep_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `accused_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `report_type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tender`
--

CREATE TABLE `tender` (
  `tender_id` int(11) NOT NULL,
  `m_id` int(11) NOT NULL,
  `raw_material_id` int(11) NOT NULL,
  `tender_quantity` int(11) NOT NULL,
  `tender_quantity_unit` varchar(15) NOT NULL,
  `date_of_submission` date NOT NULL,
  `time_submission` time NOT NULL,
  `date_expire` date NOT NULL,
  `time_expire` time NOT NULL,
  `delivery_location` int(11) NOT NULL,
  `estimated_price` int(9) NOT NULL,
  `extra_info` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tender`
--

INSERT INTO `tender` (`tender_id`, `m_id`, `raw_material_id`, `tender_quantity`, `tender_quantity_unit`, `date_of_submission`, `time_submission`, `date_expire`, `time_expire`, `delivery_location`, `estimated_price`, `extra_info`) VALUES
(1, 2, 1, 10, 'Kilograms', '2018-02-01', '11:29:00', '2018-02-09', '11:29:00', 1, 200, 'Must be 10 meter wide piece'),
(2, 2, 2, 20, 'Kilograms', '2018-02-02', '11:35:00', '2018-02-14', '11:35:00', 1, 23, '5m x 2m piece each');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `trans_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `raw_material_id` int(11) NOT NULL,
  `amount` int(9) NOT NULL,
  `start_end` date NOT NULL,
  `delivery_date` date NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trde_mrkt`
--

CREATE TABLE `trde_mrkt` (
  `id_trade_mrkt` int(11) NOT NULL,
  `v_id` int(11) NOT NULL,
  `location` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `v_id` int(10) NOT NULL,
  `v_email` varchar(100) NOT NULL,
  `v_username` varchar(21) NOT NULL,
  `v_password` varchar(255) NOT NULL,
  `v_firstname` varchar(25) NOT NULL,
  `v_lastname` varchar(25) NOT NULL,
  `v_address_id` varchar(10) DEFAULT NULL,
  `v_status` set('Active','Inactive') NOT NULL,
  `v_org_name` varchar(50) DEFAULT NULL,
  `v_website` varchar(100) DEFAULT NULL,
  `v_exprt_mthd` varchar(25) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`v_id`, `v_email`, `v_username`, `v_password`, `v_firstname`, `v_lastname`, `v_address_id`, `v_status`, `v_org_name`, `v_website`, `v_exprt_mthd`, `created_at`) VALUES
(1, 'sam@time.in', 'samlaw12', '0a80250fe4bbd7759207d6bff43c8661', 'Sam', 'Lawrence', NULL, 'Inactive', NULL, NULL, NULL, '2018-02-08 03:59:23');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_materials`
--

CREATE TABLE `vendor_materials` (
  `v_material_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `raw_material_id` int(11) NOT NULL,
  `quality_info` text NOT NULL,
  `material_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for table `adv_table`
--
ALTER TABLE `adv_table`
  ADD PRIMARY KEY (`adv_id`);

--
-- Indexes for table `disadv_table`
--
ALTER TABLE `disadv_table`
  ADD PRIMARY KEY (`disadv_id`);

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
  MODIFY `add_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `adv_table`
--
ALTER TABLE `adv_table`
  MODIFY `adv_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `disadv_table`
--
ALTER TABLE `disadv_table`
  MODIFY `disadv_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `material_subcat`
--
ALTER TABLE `material_subcat`
  MODIFY `subcat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `m_address_dict`
--
ALTER TABLE `m_address_dict`
  MODIFY `m_address_dict_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_cat`
--
ALTER TABLE `product_cat`
  MODIFY `product_cat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `raw_material`
--
ALTER TABLE `raw_material`
  MODIFY `raw_material_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `rep_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tender`
--
ALTER TABLE `tender`
  MODIFY `tender_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trde_mrkt`
--
ALTER TABLE `trde_mrkt`
  MODIFY `id_trade_mrkt` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `v_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vendor_materials`
--
ALTER TABLE `vendor_materials`
  MODIFY `v_material_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
