-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2025 at 03:50 PM
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
-- Database: `cholo_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `purpose` enum('Business','Personal Travel','Emergency','Other') NOT NULL DEFAULT 'Other',
  `destination` varchar(100) NOT NULL,
  `pickup_location` varchar(100) NOT NULL,
  `status` enum('Pending','Approved','Rejected') NOT NULL DEFAULT 'Pending',
  `cost` int(11) NOT NULL,
  `booking_date` date NOT NULL,
  `approved_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `user_id`, `vehicle_id`, `start_date`, `end_date`, `purpose`, `destination`, `pickup_location`, `status`, `cost`, `booking_date`, `approved_date`) VALUES
(1, 11, 8, '2025-10-09', '2025-10-16', 'Business', 'iniimi', 'jjj', 'Approved', 0, '0000-00-00', '2025-10-30'),
(2, 11, 8, '2025-10-22', '2025-10-24', 'Business', 'coxs bazar', 'harua', 'Approved', 30000, '2025-10-21', '2025-10-22'),
(3, 11, 7, '2025-10-16', '2025-10-25', 'Business', 'coxs bazar', 'wryer', 'Approved', 70000, '2025-10-21', '2025-10-30'),
(4, 11, 10, '2025-10-31', '2025-10-23', 'Business', 'coxs bazar', 'harua', 'Approved', 45000, '2025-10-27', '2025-10-27'),
(5, 11, 10, '2025-10-17', '2025-10-30', 'Business', 'coxs bazar', 'harua', 'Approved', 70000, '2025-10-27', '2025-10-27'),
(6, 11, 12, '2025-10-16', '2025-11-09', 'Personal Travel', 'coxs bazar', 'harua', 'Approved', 175000, '2025-10-27', '2025-10-27'),
(7, 11, 7, '2025-10-24', '2025-10-31', 'Business', 'coxs bazar', 'harua', 'Approved', 56000, '2025-10-28', '2025-10-28'),
(8, 11, 7, '2025-10-25', '2025-11-01', 'Personal Travel', 'coxs bazar', 'harua', 'Approved', 56000, '2025-10-28', '2025-10-29'),
(9, 15, 13, '2025-10-17', '2025-10-25', 'Personal Travel', 'coxs bazar', 'harua', 'Approved', 4009995, '2025-10-29', '2025-10-29'),
(10, 16, 8, '2025-10-24', '2025-11-05', 'Emergency', 'coxs bazar', 'harua', 'Approved', 130000, '2025-10-30', '2025-10-30'),
(11, 16, 7, '2025-10-22', '2025-10-14', 'Business', 'coxs bazar', 'wryer', 'Approved', 63000, '2025-10-30', '2025-10-30'),
(12, 11, 10, '2025-11-07', '2025-12-13', 'Emergency', 'coxs bazar', 'harua', 'Approved', 185000, '2025-11-06', '2025-11-06');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `driver_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `license_number` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `license_expiry` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `status` enum('assigned','available','on_trip','inactive') DEFAULT 'available',
  `experience` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `vehicle_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`driver_id`, `name`, `license_number`, `phone`, `email`, `license_expiry`, `address`, `status`, `experience`, `created_at`, `vehicle_id`) VALUES
(1, 'Shoaban', '3333', '01609109108', 'shoab@gamil.com', '2025-10-25', 'Dhaka', 'assigned', 2005, '2025-10-20 16:35:59', NULL),
(2, 'T.K. Labib', '4634', '01609109108', 'tahmidulkhan2003@gmail.com', '2025-10-16', 'Dhaka', 'assigned', 2005, '2025-10-21 19:11:14', NULL),
(3, 'xy', '12343', '01609109108', 'tahmidulkhan2003@gmail.com', '2025-10-12', 'Dhaka', 'assigned', 4, '2025-10-23 05:47:06', NULL),
(4, 'asif', '2222223', '2382287', 'nakshikatha101@gmail.com', '2025-10-16', 'Dhaka', 'available', 4, '2025-10-27 17:35:53', NULL),
(5, 'shoaban', '3267842387', '34578348', 'nakshikatha101@gmail.com', '2025-11-26', 'Dhaka', 'assigned', 33, '2025-11-06 14:36:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fuel`
--

CREATE TABLE `fuel` (
  `fuel_name` int(11) NOT NULL,
  `efficiency` int(11) NOT NULL,
  `mileage` int(11) NOT NULL,
  `cost_per_litre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

CREATE TABLE `maintenance` (
  `maintenance_id` int(11) NOT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `maintenance_type` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `cost` int(11) NOT NULL,
  `maintenance_date` date NOT NULL,
  `next_date` date NOT NULL,
  `main_status` varchar(20) NOT NULL DEFAULT 'Ongoing'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `maintenance`
--

INSERT INTO `maintenance` (`maintenance_id`, `vehicle_id`, `maintenance_type`, `description`, `cost`, `maintenance_date`, `next_date`, `main_status`) VALUES
(1, 10, 'engine', 'yes', 200, '2025-11-02', '2026-02-02', 'Done'),
(2, 10, 'engine', 'yok', 200, '2025-11-02', '2026-02-02', 'Done'),
(3, 7, 'engine', 'tt', 200, '2025-11-02', '2026-02-02', 'Done'),
(4, 7, 'engine', 'tretr', 200, '2025-11-02', '2026-02-02', 'Done'),
(5, 7, 'backdala', 'rrr', 3535, '2025-11-02', '2026-02-02', 'Done'),
(6, 7, 'engine', 'yy', 3535, '2025-11-02', '2026-02-02', 'Done'),
(7, 7, 'backdala', 'fdedr', 3535, '2025-11-02', '2026-02-02', 'Done'),
(8, 7, 'backdala', 'tt', 3535, '2025-11-02', '2026-02-02', 'Done'),
(9, 7, 'engine', 'asif ', 200, '2025-11-06', '2026-02-06', 'Done'),
(10, 14, 'backdala', 'hfh', 34534, '2025-11-06', '2026-02-06', 'Ongoing');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `message` varchar(255) NOT NULL,
  `status` enum('Unread','Read') DEFAULT 'Unread',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notification_id`, `user_id`, `booking_id`, `title`, `message`, `status`, `created_at`) VALUES
(1, 11, 4, 'Booking Approved', 'Your booking has been Approved. Please proceed to pay.', 'Read', '2025-10-27 17:27:03'),
(2, 11, 5, 'Booking Approved', 'Your booking has been Approved. Please proceed to pay.', 'Read', '2025-10-27 17:28:33'),
(3, 11, 6, 'Booking Approved', 'Your booking has been Approved. Please proceed to pay.', 'Read', '2025-10-27 17:29:42'),
(4, 11, 7, 'Booking Approved', 'Your booking has been Approved. Please proceed to pay.', 'Read', '2025-10-28 04:46:45'),
(5, 11, 8, 'Booking Approved', 'Your booking has been Approved. Please proceed to pay.', 'Read', '2025-10-28 18:11:13'),
(6, 15, 9, 'Booking Approved', 'Your booking has been Approved. Please proceed to pay.', 'Unread', '2025-10-29 10:48:02'),
(7, 16, 10, 'Booking Approved', 'Your booking has been Approved. Please proceed to pay.', 'Unread', '2025-10-30 07:01:23'),
(8, 16, 11, 'Booking Approved', 'Your booking has been Approved. Please proceed to pay.', 'Unread', '2025-10-30 07:24:08'),
(9, 11, 3, 'Booking Approved', 'Your booking has been Approved. Please proceed to pay.', 'Read', '2025-10-30 07:55:15'),
(10, 11, 12, 'Booking Approved', 'Your booking has been Approved. Please proceed to pay.', 'Read', '2025-11-06 14:43:21');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `transaction_id` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending',
  `payment_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` text NOT NULL,
  `role` varchar(15) NOT NULL DEFAULT 'user',
  `phone` varchar(15) DEFAULT NULL,
  `address` varchar(50) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `password`, `name`, `role`, `phone`, `address`, `status`) VALUES
(1, 'swapnil.cse16@gmail.com', '$2y$10$kQXLv1eobaVzZMeaM5E0uO1w2qi6kntOqWdXfISypje', 'T.K. Labib', 'user', '34563345', '', ''),
(2, 'sumaiyasinan+cd@gmail.com', '$2y$10$1c6bqo26QKJb7ZLMklEzO.CTCX/mIMVitiidiwIaz5Q', 'xdtfyg', 'user', '1609109108', '', ''),
(3, 'shoab@gamil.com', '$2y$10$mLiPAC9RRKRMUW//ywS89uomljV9FZeN3rR0FN1mCv4', 'shoab', 'user', '324234234', '', ''),
(5, 'tahmidulkhan2003@gmail.com', '$2y$10$alVZWIFsWcqtRJxo0giqZecZnkKKMymKRVji2IpK05g', 'T.K. Labib', 'user', '1609109108', '', 'active'),
(7, 'tahmid@gamil.com', '$2y$10$nm44D3UJfJ6OBxpSG0JPj.D3HcltgzZemE2NO/V8qP7FQXbp5rWHe', 'T.K. Labib', 'user', '1609109108', '', 'active'),
(8, 'labib@gmail.com', '$2y$10$64pUgiTA6LKU/XPSd4/SA..wLtpi9qu/uSUhRTOSVPbw9aahzMlOO', 'T.K. Labib', 'user', '345', '', 'active'),
(9, 'ash@gamil.com', '$2y$10$CDyFbcp/NlrzJ/liF0AxL.4aKjy.oQXwzzHbv2Lx55k.kGmC528vu', 'ashraful haq', 'user', '0123567', 'BD', 'active'),
(10, 'tahmid@gmail.com', '$2y$10$K38qo2TD1TOu.XxKcBZK8e2W8vA.3GPhqz8V.h572mv4Gvzwc8e0u', 'T.K. Labib', 'user', '01609109108', 'Dhaka, Yt', 'active'),
(11, 'tk@gmail.com', '$2y$10$840tsQ3VHyvJeMVMJBDKE.d.yK3wy3kloENP/q3sOyBsC.uEj3mDm', 'T.K. Labib', 'user', '01609109108', 'Dhaka, Yt', 'active'),
(14, 'tklabib@gmail.com', '$2y$10$ByW35ObQBBXwWY0e8iabk.b2RyH6hmzPSNbZ/ovG27zw8Wkx1rBAa', 'T.K. Labib', 'admin', '01609109108', 'Dhaka, Yt', 'active'),
(15, 'a@gmail.com', '$2y$10$vZMF3v39hPt/7mck3vU2uunAGM00PC91CKAFLahU1Uy6Obz8zqKbq', 'f', 'user', '34563345', 'Dhaka, Yt', 'active'),
(16, 'tk@hotmail.com', '$2y$10$Oc9G.WfYLp.nnGjXG03B6Or3znX50b0ERaxbTlgBUwnPInrm6ZAhO', 'T.K. Labib', 'user', '345', 'Dhaka, Yt', 'active'),
(17, 'labib@hotmail.com', '$2y$10$qivIv6MM0QpV5T0pTr3Yj.HiS7.krKQDmCQlLLsk3ARQ5xWAxecn.', 'T.K. Labib', 'admin', '01609109108', 'Dhaka, Yt', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `user_session`
--

CREATE TABLE `user_session` (
  `session_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `login_time` datetime DEFAULT current_timestamp(),
  `logout_time` datetime DEFAULT NULL,
  `last_activity_time` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('online','offline') DEFAULT 'offline'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_session`
--

INSERT INTO `user_session` (`session_id`, `user_id`, `login_time`, `logout_time`, `last_activity_time`, `status`) VALUES
(1, 11, '2025-11-06 20:21:42', NULL, '2025-11-06 20:21:42', 'online');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `vehicle_id` int(11) NOT NULL,
  `license` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `type` enum('Car','Bus','Truck','Motorcycle') NOT NULL DEFAULT 'Car',
  `year` int(4) NOT NULL,
  `color` varchar(50) NOT NULL,
  `seat_capacity` int(11) NOT NULL,
  `status` enum('Unassigned','Available','Booked','Under Maintenance') NOT NULL DEFAULT 'Unassigned',
  `cost_per_day` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `driver_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`vehicle_id`, `license`, `model`, `type`, `year`, `color`, `seat_capacity`, `status`, `cost_per_day`, `description`, `driver_id`) VALUES
(7, 'DHA-1234', 'Toyota Hiace', 'Car', 2022, 'Black', 14, 'Available', 7000, 'A Good car', 1),
(8, 'CTG-22223', 'Noah Advantage', 'Car', 2024, 'Steel Blond', 8, 'Available', 10000, '', 2),
(9, 'DHA-12345', 'Toyota Corolla', 'Car', 2019, 'Platinum White Pearl', 5, 'Available', 6000, '', NULL),
(10, 'Bar-1234', 'Rolls Royes', 'Car', 2019, 'red', 7, 'Booked', 5000, 'BEST CAR', NULL),
(12, 'CTG-222231', 'suzuki', 'Motorcycle', 2024, 'blue', 14, 'Available', 7000, 'sss', 3),
(13, 'DHA-123456', 'Toyota Hiace', 'Car', 2019, 'Platinum White Pearl', 14, 'Available', 445555, 'htujty', 4),
(14, 'dfbghvdfsjfk', 'FZ v2', 'Motorcycle', 1923, 'Platinum White Pearl', 2, 'Under Maintenance', 30365037, 'shoban', 5);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_document`
--

CREATE TABLE `vehicle_document` (
  `document_id` int(10) NOT NULL,
  `document_type` varchar(50) NOT NULL,
  `file_name` varchar(250) NOT NULL,
  `file_path` varchar(250) NOT NULL,
  `issue_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Active',
  `vehicle_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle_document`
--

INSERT INTO `vehicle_document` (`document_id`, `document_type`, `file_name`, `file_path`, `issue_date`, `expiry_date`, `status`, `vehicle_id`) VALUES
(1, 'shoaban', 'Humayun kabir sir.pdf', 'document/690cb175049e7.pdf', '2025-11-06', '2025-11-07', 'Active', 7),
(2, 'shoaban', 'images.jpeg', 'document/690cb277ecff8.jpeg', '2025-11-06', '2025-11-27', 'Active', 14);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_images`
--

CREATE TABLE `vehicle_images` (
  `image_id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `image_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle_images`
--

INSERT INTO `vehicle_images` (`image_id`, `vehicle_id`, `image_path`, `image_name`) VALUES
(6, 7, 'img/3a9c4957d278829ddf2f1a510164236e.png', '3a9c4957d278829ddf2f1a510164236e.png'),
(7, 8, 'img/noah_steel-blonde-me_596x396.webp', 'noah_steel-blonde-me_596x396.webp'),
(8, 9, 'img/Platinum-White-Pearl-Mica-Color-Toyota-Corolla-2023.png', 'Platinum-White-Pearl-Mica-Color-Toyota-Corolla-2023.png'),
(9, 10, 'img/LA-VOITURE-NOIRE-via-Bugatti-most-expensive-car.png', 'LA-VOITURE-NOIRE-via-Bugatti-most-expensive-car.png'),
(11, 12, 'img/Platinum-White-Pearl-Mica-Color-Toyota-Corolla-2023.png', 'Platinum-White-Pearl-Mica-Color-Toyota-Corolla-2023.png'),
(12, 13, 'img/LA-VOITURE-NOIRE-via-Bugatti-most-expensive-car.png', 'LA-VOITURE-NOIRE-via-Bugatti-most-expensive-car.png'),
(13, 14, 'img/cat-and-fish-19425-1920x1200.jpg', 'cat-and-fish-19425-1920x1200.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `vehicle_id` (`vehicle_id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`driver_id`),
  ADD KEY `fk_vehicle` (`vehicle_id`);

--
-- Indexes for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD PRIMARY KEY (`maintenance_id`),
  ADD KEY `fk_vehicle_maintenance` (`vehicle_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_session`
--
ALTER TABLE `user_session`
  ADD PRIMARY KEY (`session_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`vehicle_id`),
  ADD UNIQUE KEY `license` (`license`),
  ADD KEY `fk_drivers` (`driver_id`);

--
-- Indexes for table `vehicle_document`
--
ALTER TABLE `vehicle_document`
  ADD PRIMARY KEY (`document_id`),
  ADD KEY `fk_vehicle_doc` (`vehicle_id`);

--
-- Indexes for table `vehicle_images`
--
ALTER TABLE `vehicle_images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `vehicle_id` (`vehicle_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `driver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `maintenance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_session`
--
ALTER TABLE `user_session`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `vehicle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `vehicle_document`
--
ALTER TABLE `vehicle_document`
  MODIFY `document_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vehicle_images`
--
ALTER TABLE `vehicle_images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicle` (`vehicle_id`) ON DELETE CASCADE;

--
-- Constraints for table `drivers`
--
ALTER TABLE `drivers`
  ADD CONSTRAINT `fk_vehicle` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicle` (`vehicle_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD CONSTRAINT `fk_vehicle_maintenance` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicle` (`vehicle_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notifications_ibfk_2` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`booking_id`) ON DELETE CASCADE;

--
-- Constraints for table `user_session`
--
ALTER TABLE `user_session`
  ADD CONSTRAINT `user_session_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `fk_drivers` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`driver_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vehicle_document`
--
ALTER TABLE `vehicle_document`
  ADD CONSTRAINT `fk_vehicle_doc` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicle` (`vehicle_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vehicle_images`
--
ALTER TABLE `vehicle_images`
  ADD CONSTRAINT `vehicle_images_ibfk_1` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicle` (`vehicle_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
