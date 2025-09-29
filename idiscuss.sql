-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2025 at 02:25 PM
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
-- Database: `idiscuss`
--

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE `catagory` (
  `srno` int(11) NOT NULL,
  `catagroyname` varchar(20) NOT NULL,
  `catagroydisc` varchar(500) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`srno`, `catagroyname`, `catagroydisc`, `dt`) VALUES
(1, 'Python', 'Python is a high-level, interpreted programming language known for its simplicity and readability. It was created by Guido van Rossum and first released in 1991. Python supports multiple programming paradigms, including procedural, object-oriented, and functional programming. Its design philosophy emphasizes code readability, using significant indentation to define code blocks.', '2025-08-19 23:28:44'),
(2, 'Javascript', 'JavaScript is a versatile, dynamically typed programming language that brings life to web pages by making them interactive. It is used for building interactive web applications, supports both client-side and server-side development, and integrates seamlessly with HTML, CSS, and a rich standard library.\r\n\r\n', '2025-08-19 23:31:02'),
(3, 'HTML', 'Hypertext Markup Language (HTML) is the standard markup language[a] for documents designed to be displayed in a web browser. It defines the content and structure of web content. It is often assisted by technologies such as Cascading Style Sheets (CSS) and scripting languages such as JavaScript.', '2025-08-20 22:57:10'),
(4, 'C++', 'C++ is a powerful, cross-platform programming language developed by Bjarne Stroustrup as an extension of the C language. It provides high-level control over system resources and memory, making it suitable for creating high-performance applications. C++ has undergone several updates, with major versions released in 2011, 2014, 2017, 2020, and 2023, known as C++11, C++14, C++17, C++20, and C++23.\r\n\r\n', '2025-08-20 22:58:29'),
(5, 'CSS', 'Cascading Style Sheets (CSS) is a style sheet language used to describe the presentation of a document written in HTML or XML. It is a cornerstone technology of the World Wide Web, alongside HTML and JavaScript. CSS allows developers to separate content from presentation, enabling more flexibility and control over the layout, colors, and fonts of web pages.', '2025-08-20 22:59:09'),
(6, 'jQuery', 'jQuery is a lightweight, fast, and feature-rich JavaScript library designed to simplify the client-side scripting of HTML. The name \"jQuery\" stands for \"JavaScript Query\", reflecting its primary purpose of making it easier to query and manipulate HTML documents using JavaScript.', '2025-08-20 23:04:57'),
(7, 'PHP', 'PHP, which stands for PHP: Hypertext Preprocessor, is a widely-used, open-source scripting language designed primarily for web development. It is executed on the server, and the results are sent to the client\'s web browser as plain HTML. PHP is known for its simplicity and ease of use, making it a popular choice for both beginners and experienced developers.\r\n\r\n', '2025-08-20 23:06:21'),
(8, 'Java', 'Java is a high-level, class-based, object-oriented programming language designed to have as few implementation dependencies as possible. It was first released by Sun Microsystems in 1995 and later acquired by Oracle Corporation. Java is known for its simplicity, robustness, and security features, making it a popular choice for developing applications for desktop, web, and mobile devices.', '2025-08-20 23:07:02');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(5) NOT NULL,
  `comment_content` text NOT NULL,
  `thread_id` int(5) NOT NULL,
  `commented_by` varchar(20) NOT NULL,
  `comment_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_content`, `thread_id`, `commented_by`, `comment_date`) VALUES
(1, 'Youtube is the best source for learning any programming language .', 1, 'Mayank', '2025-08-22 14:13:25'),
(2, 'Code with harry is a best youtube channel for learn pythan and many other language', 0, 'mradul', '2025-08-22 15:10:50'),
(3, 'Code with harry is a best youtube channel for learn pythan and many other language', 1, 'Somendra', '2025-08-22 15:11:30'),
(4, 'my favorite language.', 6, 'Tarun', '2025-08-22 15:13:24'),
(5, 'if you get help tell me', 1, 'Mayank', '2025-08-22 15:23:45'),
(6, 'no bro this language is easy to learn.', 17, 'harry', '2025-08-22 16:06:44'),
(16, 'easy', 5, 'Mayank', '2025-08-23 23:27:20'),
(20, 'Easy ', 4, 'Mayank', '2025-08-28 23:04:45'),
(21, 'Easy ', 4, 'Mayank', '2025-08-28 23:05:24');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `srno` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` text NOT NULL,
  `massage` text NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`srno`, `email`, `subject`, `massage`, `dt`) VALUES
(0, 'harry@harry.com', 'django', 'create a forum for django.', '2025-08-28 15:03:20');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thread_id` int(5) NOT NULL,
  `thread_name` varchar(50) NOT NULL,
  `thread_desc` text NOT NULL,
  `thread_by` varchar(20) NOT NULL,
  `forum_id` int(5) NOT NULL,
  `time_stamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `thread_name`, `thread_desc`, `thread_by`, `forum_id`, `time_stamp`) VALUES
(1, 'How to learn pythan ?', 'Pythan is a hard language to understand because i am a fresher in this so i want a help about a best source for learning.', 'Mayank', 1, '2025-08-21 12:08:32'),
(2, 'Which software is best for pythan coding ?', 'Which software is best for pythan coding ?\r\nfor fast and enhanced programming for the fresher and a middle experience programmer.', 'Mayank', 1, '2025-08-21 12:20:36'),
(3, 'software', 'where we learn easily', 'Somendra', 1, '2025-08-21 23:46:32'),
(4, 'pythan', 'hard to learn', 'Prashant', 1, '2025-08-21 23:47:45'),
(5, 'how to include javascript in html?', 'Any one can help me about my concern ,how to include javascript in html ?', 'Nivesh', 2, '2025-08-22 14:16:44'),
(6, 'java', 'java is same as javascript', 'Nitin', 2, '2025-08-22 14:22:33'),
(16, 'C++ is a hard language.', 'anyone suggest me a plateform to learn c++ eaily .', 'Mradul', 4, '2025-08-22 15:51:45'),
(17, 'java is tough.', 'java is tough to learn', 'Tarun', 8, '2025-08-22 16:06:11'),
(20, 'Javascript', 'this is a programming language', 'Mayank', 2, '2025-08-24 18:18:17'),
(23, 'Javascript alert code', '&ltscript&gtalert(\"Hello\")&lt/script&gt', 'Mayank', 2, '2025-08-24 18:27:30');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(5) NOT NULL,
  `user_dp` varchar(300) NOT NULL DEFAULT 'partials/user.webp',
  `user_name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `varification` int(4) DEFAULT NULL,
  `mobile` decimal(10,0) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `user_dp`, `user_name`, `email`, `varification`, `mobile`, `password`, `dt`) VALUES
(16, 'partials/user.webp', 'Mohit', 'mayankbhardwaj@gmail.com', NULL, NULL, '$2y$10$bNOi/y913FRNgjpx.NJBZeYImkSVAj3Jx3Rqumcaaw/aD4Ng4rp/y', '2025-08-28 08:05:22'),
(18, 'partials/user.webp', 'Rohan', 'mayank@12gmail.com', NULL, NULL, '$2y$10$R4Tj1gD1lWSTjRcaIVgrQuzzvhaAEUoJRf6LrPk1KxDb2PJimjaue', '2025-09-09 00:47:02'),
(30, 'images/8.avif', 'mayank', 'praveen@gmail.com', 1, 3261565869, '$2y$10$qojYnZergAObEMapYS366.gNfNWYuy.ny5Z/86LF6aLqFAJVEQSOC', '2025-09-11 23:37:12'),
(37, 'partials/user.webp', 'Tarun', 'tarun@gmail.com', 1, NULL, '$2y$10$y4etGjOt8bn3ziF07.vTBuK72K7Q2IhmZb7y9.JU9VgBMhNuF87oO', '2025-09-14 11:47:06'),
(39, 'partials/user.webp', 'nivesh', 'mayank@gmail.com', 8436, NULL, '$2y$10$yfnsPnc1hy5fvdZOwPYFRu1u6BvjIWaJQKXou8sZOHylGKJ6ZHS/K', '2025-09-14 11:49:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`srno`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);
ALTER TABLE `comments` ADD FULLTEXT KEY `comment_content` (`comment_content`,`commented_by`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`srno`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thread_id`);
ALTER TABLE `threads` ADD FULLTEXT KEY `thread_name` (`thread_name`,`thread_desc`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catagory`
--
ALTER TABLE `catagory`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
