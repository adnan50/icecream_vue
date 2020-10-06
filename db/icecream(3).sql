-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2018 at 05:20 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `icecream`
--

-- --------------------------------------------------------

--
-- Table structure for table `availability`
--

CREATE TABLE `availability` (
  `id` int(11) NOT NULL,
  `start` varchar(100) NOT NULL,
  `end` varchar(100) NOT NULL,
  `booked` tinyint(1) NOT NULL DEFAULT '0',
  `available_user` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `availability`
--

INSERT INTO `availability` (`id`, `start`, `end`, `booked`, `available_user`, `created`) VALUES
(107, '2018-07-08T10:30:00', '2018-07-08T11:00', 0, 5, '2018-07-11 16:36:17'),
(108, '2018-07-09T09:30:00', '2018-07-09T10:00', 0, 5, '2018-07-11 16:36:17'),
(109, '2018-07-09T10:30:00', '2018-07-09T11:00', 0, 5, '2018-07-11 16:36:17'),
(110, '2018-07-10T09:30:00', '2018-07-10T10:00', 0, 5, '2018-07-11 16:36:17'),
(111, '2018-07-10T08:00:00', '2018-07-10T08:30', 0, 5, '2018-07-11 16:36:17'),
(112, '2018-07-12T07:00:00', '2018-07-12T07:30', 0, 5, '2018-07-11 16:36:17'),
(113, '2018-07-12T10:00:00', '2018-07-12T10:30', 0, 5, '2018-07-11 16:36:17'),
(114, '2018-07-11T11:00:00', '2018-07-11T11:30', 0, 5, '2018-07-11 16:36:17'),
(115, '2018-07-11T09:00:00', '2018-07-11T09:30', 0, 5, '2018-07-11 16:36:17'),
(116, '2018-07-13T08:30:00', '2018-07-13T09:00', 0, 5, '2018-07-11 16:36:17'),
(117, '2018-07-13T07:00:00', '2018-07-13T07:30', 1, 5, '2018-07-11 16:36:17'),
(118, '2018-07-11T07:30:00', '2018-07-11T08:00', 1, 5, '2018-07-11 16:36:17'),
(119, '2018-07-14T08:00:00', '2018-07-14T08:30', 1, 5, '2018-07-11 16:36:17'),
(120, '2018-07-14T09:30:00', '2018-07-14T10:00', 0, 5, '2018-07-11 16:36:17'),
(121, '2018-07-13T11:00:00', '2018-07-13T11:30', 1, 5, '2018-07-11 16:36:17'),
(122, '2018-07-15T10:00:00', '2018-07-15T10:30', 1, 5, '2018-07-11 16:36:17'),
(123, '2018-07-16T09:00:00', '2018-07-16T09:30', 1, 5, '2018-07-11 16:36:17'),
(124, '2018-07-17T10:30:00', '2018-07-17T11:00', 0, 5, '2018-07-11 16:36:17'),
(125, '2018-07-18T07:30:00', '2018-07-18T08:00', 0, 5, '2018-07-11 16:36:17'),
(126, '2018-07-19T09:00:00', '2018-07-19T09:30', 0, 5, '2018-07-11 16:36:18'),
(127, '2018-07-19T12:00:00', '2018-07-19T12:30', 0, 5, '2018-07-11 16:36:18'),
(128, '2018-07-21T08:00:00', '2018-07-21T08:30', 0, 5, '2018-07-11 16:36:18'),
(129, '2018-08-07T10:00:00', '2018-08-07T10:30', 0, 5, '2018-08-10 20:05:50'),
(130, '2018-08-08T09:00:00', '2018-08-08T09:30', 0, 5, '2018-08-10 20:05:50'),
(131, '2018-08-10T09:00:00', '2018-08-10T09:30', 0, 5, '2018-08-10 20:05:50'),
(132, '2018-08-11T07:30:00', '2018-08-11T08:00', 1, 5, '2018-08-10 20:05:51'),
(133, '2018-08-09T08:00:00', '2018-08-09T08:30', 0, 5, '2018-08-10 20:05:51'),
(134, '2018-08-09T11:30:00', '2018-08-09T12:00', 0, 5, '2018-08-10 20:05:51'),
(135, '2018-08-06T11:00:00', '2018-08-06T11:30', 0, 5, '2018-08-10 20:05:51'),
(136, '2018-08-06T08:30:00', '2018-08-06T09:00', 0, 5, '2018-08-10 20:05:51'),
(137, '2018-08-05T10:00:00', '2018-08-05T10:30', 0, 5, '2018-08-10 20:05:51'),
(138, '2018-08-05T13:00:00', '2018-08-05T13:30', 0, 5, '2018-08-10 20:05:51'),
(139, '2018-08-12T12:00:00', '2018-08-12T12:30', 0, 5, '2018-08-10 20:12:30'),
(140, '2018-08-14T10:00:00', '2018-08-14T10:30', 1, 5, '2018-08-10 20:12:30'),
(141, '2018-08-15T08:00:00', '2018-08-15T08:30', 0, 5, '2018-08-10 20:12:30'),
(142, '2018-08-16T09:30:00', '2018-08-16T10:00', 0, 5, '2018-08-10 20:12:30'),
(143, '2018-08-17T10:00:00', '2018-08-17T10:30', 0, 5, '2018-08-10 20:12:30'),
(144, '2018-08-18T08:00:00', '2018-08-18T08:30', 0, 5, '2018-08-10 20:12:30'),
(145, '2018-08-12T09:00:00', '2018-08-12T09:30', 0, 5, '2018-08-10 20:12:30'),
(146, '2018-08-13T08:00:00', '2018-08-13T08:30', 1, 5, '2018-08-10 20:12:30');

-- --------------------------------------------------------

--
-- Table structure for table `booked_plans`
--

CREATE TABLE `booked_plans` (
  `booking_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `payment_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booked_plans`
--

INSERT INTO `booked_plans` (`booking_id`, `student_id`, `plan_id`, `payment_status`) VALUES
(1, 7, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `class_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `ticket_id` varchar(20) NOT NULL,
  `availability_id` int(11) NOT NULL,
  `class_status` int(11) NOT NULL,
  `reason_for_uncompleted` longtext NOT NULL,
  `completed_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`class_id`, `student_id`, `ticket_id`, `availability_id`, `class_status`, `reason_for_uncompleted`, `completed_date`, `created_at`) VALUES
(38, 7, 'level_test', 132, 2, '', '0000-00-00', '2018-08-10 20:08:26'),
(39, 7, '12', 140, 0, '', '0000-00-00', '2018-08-10 20:13:44'),
(40, 7, '12', 146, 4, '', '0000-00-00', '2018-08-10 20:13:44');

-- --------------------------------------------------------

--
-- Table structure for table `level_test_result`
--

CREATE TABLE `level_test_result` (
  `result_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `level` varchar(50) NOT NULL,
  `total_points` int(11) NOT NULL,
  `teachers_remarks` longtext NOT NULL,
  `getting_know_you` longtext NOT NULL,
  `getting_know_you_points` int(11) NOT NULL,
  `what_the_word` longtext NOT NULL,
  `what_the_word_points` longtext NOT NULL,
  `use_the_word` longtext NOT NULL,
  `use_the_word_points` int(11) NOT NULL,
  `describe_the_picture` longtext NOT NULL,
  `describe_the_picture_points` int(11) NOT NULL,
  `answer_the_questions` longtext NOT NULL,
  `answer_the_questions_points` int(11) NOT NULL,
  `comprehension_questions` longtext NOT NULL,
  `comprehension_questions_points` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level_test_result`
--

INSERT INTO `level_test_result` (`result_id`, `class_id`, `student_id`, `teacher_id`, `level`, `total_points`, `teachers_remarks`, `getting_know_you`, `getting_know_you_points`, `what_the_word`, `what_the_word_points`, `use_the_word`, `use_the_word_points`, `describe_the_picture`, `describe_the_picture_points`, `answer_the_questions`, `answer_the_questions_points`, `comprehension_questions`, `comprehension_questions_points`, `created`) VALUES
(4, 38, 7, 5, 'Low Beginner', 6, 'Teacher\'s Remarks', 'Getting to Know You ', 1, 'What\'s the Word?', '1', ' Use the words(Adult) / Match the words(Kids) ', 1, 'Describe the Picture ', 1, ' Answer the Questions ', 1, 'Comprehension Questions ', 1, '2018-08-10 20:31:53');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notify_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notify_id`, `sender_id`, `receiver_id`, `title`, `description`, `created`) VALUES
(43, 8, 7, 'Payment status of booking', 'Your Payment status has been aproved for package SILVER A', '2018-08-11 17:16:16');

-- --------------------------------------------------------

--
-- Table structure for table `pricing_plans`
--

CREATE TABLE `pricing_plans` (
  `plan_id` int(11) NOT NULL,
  `plan_name` varchar(50) NOT NULL,
  `classes_per_week` bigint(20) NOT NULL,
  `class_duration_in_mins` bigint(20) NOT NULL,
  `duration_in_months` int(11) NOT NULL,
  `total_classes` int(11) NOT NULL,
  `price` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pricing_plans`
--

INSERT INTO `pricing_plans` (`plan_id`, `plan_name`, `classes_per_week`, `class_duration_in_mins`, `duration_in_months`, `total_classes`, `price`) VALUES
(1, 'SILVER A', 3, 25, 1, 12, 76700),
(2, 'SILVER B', 3, 25, 3, 36, 216200),
(3, 'SILVER C', 3, 25, 6, 72, 419000),
(4, 'GOLD A', 3, 50, 1, 12, 145000),
(5, 'GOLD B', 3, 50, 3, 36, 409000),
(6, 'GOLD C', 3, 50, 6, 72, 792000),
(7, 'PLATINUM A', 5, 25, 1, 12, 122300),
(8, 'PLATINUM B', 5, 25, 3, 36, 344900),
(9, 'PLATINUM C', 5, 25, 6, 72, 668000),
(10, 'DIAMOND A', 5, 50, 1, 12, 236400),
(11, 'DIAMOND B', 5, 50, 3, 36, 667000),
(12, 'DIAMOND C', 5, 50, 6, 72, 1245000);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `ticket_id` int(11) NOT NULL,
  `ticket_number` varchar(15) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `extra_classes` int(11) NOT NULL,
  `remaining_extra_classes` int(11) NOT NULL,
  `remaining_classes` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`ticket_id`, `ticket_number`, `plan_id`, `student_id`, `extra_classes`, `remaining_extra_classes`, `remaining_classes`, `start_date`, `end_date`) VALUES
(12, 'ITOq7O3SewERvG6', 1, 7, 10, 10, 10, '2018-08-10', '2018-09-10');

-- --------------------------------------------------------

--
-- Table structure for table `usermeta`
--

CREATE TABLE `usermeta` (
  `umeta_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `meta_key` varchar(255) NOT NULL,
  `meta_value` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usermeta`
--

INSERT INTO `usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES
(1, 7, 'date_of_birth', '2018-06-12'),
(2, 7, 'zoom_id', '436'),
(3, 7, 'want_to_learn', '5'),
(4, 5, 'date_of_birth', '2018-06-22'),
(5, 5, 'class_name', 'melody'),
(6, 5, 'gender', '0'),
(7, 5, 'address', 'lahore'),
(8, 5, 'skype_id', 'haider.javaid2'),
(9, 5, 'univ_location', 'Pu'),
(10, 5, 'degree_major', 'Ibit'),
(11, 5, 'teaching_experience', 'ok123'),
(12, 11, 'date_of_birth', '2018-06-22'),
(13, 11, 'class_name', 'melody'),
(14, 11, 'gender', '2'),
(15, 11, 'address', 'lahore'),
(16, 11, 'skype_id', 'haider.javaid2'),
(17, 11, 'univ_location', 'Pu'),
(18, 11, 'degree_major', 'Ibit'),
(19, 11, 'teaching_experience', '  '),
(20, 12, 'date_of_birth', '2018-06-23'),
(21, 12, 'class_name', 'melody'),
(22, 12, 'gender', '2'),
(23, 12, 'address', 'lahore'),
(24, 12, 'skype_id', 'haider.javaid2'),
(25, 12, 'univ_location', 'Pu'),
(26, 12, 'degree_major', 'Ibit'),
(27, 12, 'teaching_experience', '  '),
(28, 5, 'toefl_toeic', '0'),
(29, 5, 'ilets_opic', '0'),
(30, 5, 'profile_image', '171798896810931088_918727158150438_6644825365207855135_n.jpg'),
(31, 6, 'date_of_birth', '2018-06-23'),
(32, 6, 'class_name', 'test'),
(33, 6, 'gender', '1'),
(34, 6, 'address', 'test'),
(35, 6, 'skype_id', 'test'),
(36, 6, 'univ_location', 'test'),
(37, 6, 'degree_major', 'test'),
(38, 6, 'teaching_experience', '  test'),
(39, 6, 'toefl_toeic', '1'),
(40, 6, 'ilets_opic', '1'),
(41, 6, 'profile_image', '1784291309200.gif'),
(42, 5, 'profile_video', '1538537171SampleVideo_1280x720_1mb.mp4'),
(43, 5, 'competency', 'Competency'),
(44, 5, 'paypal_account', 'hdr'),
(45, 5, 'bank_account', ''),
(46, 8, 'date_of_birth', '2018-06-23'),
(47, 6, 'competency', 'test'),
(48, 6, 'paypal_account', 'test'),
(49, 6, 'bank_account', ''),
(50, 7, 'gender', '1'),
(51, 7, 'skype_id', 'haider.javaid2'),
(52, 5, 'per_hour_rate', '15'),
(53, 10, 'date_of_birth', '2018-06-27'),
(54, 10, 'gender', '1'),
(55, 10, 'skype_id', 'asdasd21'),
(56, 10, 'zoom_id', '12312'),
(57, 10, 'want_to_learn', '1'),
(58, 9, 'date_of_birth', ''),
(59, 9, 'gender', '1'),
(60, 9, 'skype_id', ''),
(61, 9, 'zoom_id', ''),
(62, 9, 'want_to_learn', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `contact_number` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `contact_number`, `email`, `password`, `role`, `register_date`) VALUES
(5, 'Haider', 123456, 'myhdr@e.com', '123456', 'teacher', '2018-06-21 14:02:37'),
(7, 'Student', 9990009, 'student@e.com', 'student', 'student', '2018-06-21 14:02:37'),
(8, 'admin', 234, 'admin@e.com', 'admin123', 'admin', '2018-06-21 14:02:37'),
(9, 'haider', 0, 'hdr@e.com', '123456', 'student', '2018-08-11 15:59:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `availability`
--
ALTER TABLE `availability`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booked_plans`
--
ALTER TABLE `booked_plans`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `level_test_result`
--
ALTER TABLE `level_test_result`
  ADD PRIMARY KEY (`result_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notify_id`);

--
-- Indexes for table `pricing_plans`
--
ALTER TABLE `pricing_plans`
  ADD PRIMARY KEY (`plan_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ticket_id`);

--
-- Indexes for table `usermeta`
--
ALTER TABLE `usermeta`
  ADD PRIMARY KEY (`umeta_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `availability`
--
ALTER TABLE `availability`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `booked_plans`
--
ALTER TABLE `booked_plans`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `level_test_result`
--
ALTER TABLE `level_test_result`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notify_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `pricing_plans`
--
ALTER TABLE `pricing_plans`
  MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `usermeta`
--
ALTER TABLE `usermeta`
  MODIFY `umeta_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
