-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2026 at 07:25 PM
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
-- Database: `2025-schoolweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `assignmentId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `unitId` int(11) NOT NULL,
  `taskTitle` varchar(100) NOT NULL,
  `taskDescription` text NOT NULL,
  `maxMark` smallint(6) NOT NULL,
  `dueDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`assignmentId`, `userId`, `unitId`, `taskTitle`, `taskDescription`, `maxMark`, `dueDate`) VALUES
(39, 31, 19, 'Task 2', 'Create a School Website', 100, '2026-01-23'),
(40, 31, 20, 'Task 2', 'Develop a School App', 100, '2026-01-30');

-- --------------------------------------------------------

--
-- Table structure for table `assignments_file`
--

CREATE TABLE `assignments_file` (
  `fileId` int(11) NOT NULL,
  `assignmentId` int(11) NOT NULL,
  `originalFileName` varchar(255) NOT NULL,
  `fileName` varchar(255) NOT NULL,
  `filePath` varchar(255) NOT NULL,
  `uploadDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assignments_file`
--

INSERT INTO `assignments_file` (`fileId`, `assignmentId`, `originalFileName`, `fileName`, `filePath`, `uploadDate`) VALUES
(14, 39, 'lecturerfile.pdf', '31-lecturerfile.pdf697267a2ea00d3.87895891.pdf', 'assignmentsUploads/31-lecturerfile.pdf697267a2ea00d3.87895891.pdf', '2026-01-22 19:08:34'),
(15, 40, 'lecturerfile.pdf', '31-lecturerfile.pdf697269cfef4262.84442980.pdf', 'assignmentsUploads/31-lecturerfile.pdf697269cfef4262.84442980.pdf', '2026-01-22 19:17:51');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendanceId` int(11) NOT NULL,
  `userAccountId` int(11) NOT NULL,
  `unitId` int(11) NOT NULL,
  `unitTimetableId` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `classId` int(11) NOT NULL,
  `courseId` int(11) NOT NULL,
  `className` varchar(255) NOT NULL,
  `classDescription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`classId`, `courseId`, `className`, `classDescription`) VALUES
(18, 13, 'IDM 5.2', 'Interactive Media Second Year'),
(19, 13, 'IDM 5.1', 'Interactive Media Year 1');

-- --------------------------------------------------------

--
-- Table structure for table `class_lecturer`
--

CREATE TABLE `class_lecturer` (
  `classLecturerId` int(11) NOT NULL,
  `classId` int(11) NOT NULL,
  `lecturerId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `class_student`
--

CREATE TABLE `class_student` (
  `classStudentId` int(11) NOT NULL,
  `classId` int(11) NOT NULL,
  `studentId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_student`
--

INSERT INTO `class_student` (`classStudentId`, `classId`, `studentId`) VALUES
(17, 18, 25);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `courseId` int(11) NOT NULL,
  `courseName` varchar(255) NOT NULL,
  `courseDescription` text NOT NULL,
  `credits` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseId`, `courseName`, `courseDescription`, `credits`) VALUES
(13, 'Interactive Media', 'This degree programme prepares learners to work in various sectors within an ever-evolving digital industry by giving them exposure to creative design and software development techniques for interactive media content. Learners will receive a strong grounding in graphic design principles and programming techniques for games, website technologies and interactive installations. They will concurrently acquire applied knowledge in the fundamental practices of the industry by exploring user experience design, game design, and generative digital imaging techniques. In their final year of study, learners will be able to team up with students from other disciplines to create rich interactive experiences.', 6);

-- --------------------------------------------------------

--
-- Table structure for table `enrolment`
--

CREATE TABLE `enrolment` (
  `userAccountId` int(11) NOT NULL,
  `courseId` int(11) NOT NULL,
  `enrolmentDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrolment`
--

INSERT INTO `enrolment` (`userAccountId`, `courseId`, `enrolmentDate`) VALUES
(25, 13, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `userAccountId` int(11) NOT NULL,
  `assignmentId` int(11) NOT NULL,
  `lecturerUserAccountId` int(11) NOT NULL,
  `marksEarned` int(11) NOT NULL,
  `lecturerComment` varchar(1024) NOT NULL,
  `dateRecorded` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`userAccountId`, `assignmentId`, `lecturerUserAccountId`, `marksEarned`, `lecturerComment`, `dateRecorded`) VALUES
(25, 39, 31, 100, 'Well Done!', '2026-01-22');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `messageId` int(11) NOT NULL,
  `senderUsername` varchar(255) NOT NULL,
  `receiverUsername` varchar(255) NOT NULL,
  `messageSubject` varchar(255) NOT NULL,
  `messageBody` text NOT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `sendDateTime` datetime NOT NULL,
  `isFavourite` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`messageId`, `senderUsername`, `receiverUsername`, `messageSubject`, `messageBody`, `attachment`, `sendDateTime`, `isFavourite`) VALUES
(58, 'adminuser', 'kiarab', '1', '1', '', '2026-01-22 17:50:04', 0);

-- --------------------------------------------------------

--
-- Table structure for table `messageoutbox`
--

CREATE TABLE `messageoutbox` (
  `messageId` int(11) NOT NULL,
  `senderUsername` varchar(255) NOT NULL,
  `messageSubject` varchar(255) NOT NULL,
  `messageBody` text NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `sendDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recipient`
--

CREATE TABLE `recipient` (
  `messageId` int(11) NOT NULL,
  `recipientUsername` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `roleId` int(11) NOT NULL,
  `roleName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`roleId`, `roleName`) VALUES
(1, 'Student'),
(2, 'Lecturer'),
(3, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `school_calendar`
--

CREATE TABLE `school_calendar` (
  `calendarId` int(11) NOT NULL,
  `eventDate` date NOT NULL,
  `eventDescription` text NOT NULL,
  `eventType` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `school_calendar`
--

INSERT INTO `school_calendar` (`calendarId`, `eventDate`, `eventDescription`, `eventType`) VALUES
(5, '2026-01-30', 'sem break', 'event-semesterbreak'),
(7, '2026-01-27', 'teacher meeting, no school', 'event-schoolholiday'),
(8, '2026-01-27', 'teacher meeting, no school', 'event-schoolholiday'),
(9, '2026-02-13', 'carnival start', 'event-schoolholiday'),
(10, '2026-02-13', 'carnival start', 'event-schoolholiday'),
(11, '2026-02-16', 'carnival ', 'event-schoolholiday'),
(12, '2026-02-17', 'carnival start', 'event-schoolholiday');

-- --------------------------------------------------------

--
-- Table structure for table `submission`
--

CREATE TABLE `submission` (
  `submissionId` int(11) NOT NULL,
  `studentId` int(11) NOT NULL,
  `assignmentId` int(11) NOT NULL,
  `submissionDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `submission`
--

INSERT INTO `submission` (`submissionId`, `studentId`, `assignmentId`, `submissionDate`) VALUES
(11, 25, 39, '2026-01-22');

-- --------------------------------------------------------

--
-- Table structure for table `submission_file`
--

CREATE TABLE `submission_file` (
  `fileId` int(11) NOT NULL,
  `assignmentId` int(11) NOT NULL,
  `studentId` int(11) NOT NULL,
  `originalFileName` varchar(255) NOT NULL,
  `fileName` varchar(255) NOT NULL,
  `filePath` varchar(500) NOT NULL,
  `uploadDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `submission_file`
--

INSERT INTO `submission_file` (`fileId`, `assignmentId`, `studentId`, `originalFileName`, `fileName`, `filePath`, `uploadDate`) VALUES
(51, 39, 25, 'studentfile.pdf', '25-studentfile.pdf697269926c6e30.65881071.pdf', 'studentAssignment/25-studentfile.pdf697269926c6e30.65881071.pdf', '2026-01-22 19:16:50');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `unitId` int(11) NOT NULL,
  `courseId` int(11) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `unitName` varchar(255) NOT NULL,
  `unitDescription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`unitId`, `courseId`, `semester`, `unitName`, `unitDescription`) VALUES
(19, 13, '1', 'Php & Databases', 'This unit focuses on the development of dynamic, data-driven websites by integrating server-side logic with persistent storage. Students transition from static front-end design to \"back-end\" programming, learning how to use PHP to process user input, manage sessions, and control site behaviour.'),
(20, 13, '1', 'Mobile App Development', 'In an Angular-focused Mobile App Development unit, students leverage their web development expertise to build high-performance, cross-platform applications using the Ionic Framework. ');

-- --------------------------------------------------------

--
-- Table structure for table `unit_lecturer`
--

CREATE TABLE `unit_lecturer` (
  `unitLecturerId` int(11) NOT NULL,
  `lecturerId` int(11) NOT NULL,
  `unitId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `unit_lecturer`
--

INSERT INTO `unit_lecturer` (`unitLecturerId`, `lecturerId`, `unitId`) VALUES
(39, 31, 19),
(40, 31, 20);

-- --------------------------------------------------------

--
-- Table structure for table `unit_student`
--

CREATE TABLE `unit_student` (
  `unitStudentId` int(11) NOT NULL,
  `studentId` int(11) NOT NULL,
  `unitId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `unit_student`
--

INSERT INTO `unit_student` (`unitStudentId`, `studentId`, `unitId`) VALUES
(96, 25, 19),
(97, 25, 20);

-- --------------------------------------------------------

--
-- Table structure for table `unit_timetable`
--

CREATE TABLE `unit_timetable` (
  `unitTimetableId` int(11) NOT NULL,
  `unitId` int(11) NOT NULL,
  `classId` int(11) NOT NULL,
  `lecturerId` int(11) NOT NULL,
  `room` varchar(50) NOT NULL,
  `day` varchar(50) NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `unit_timetable`
--

INSERT INTO `unit_timetable` (`unitTimetableId`, `unitId`, `classId`, `lecturerId`, `room`, `day`, `startTime`, `endTime`) VALUES
(13, 19, 18, 31, 'A111', 'Monday', '08:00:00', '11:30:00'),
(14, 20, 18, 31, 'A112', 'Tuesday', '12:00:00', '15:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `userId` int(11) NOT NULL,
  `roleId` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`userId`, `roleId`, `username`, `password`) VALUES
(25, 1, 'kiarastudent', '$2y$10$Ha3KZgh/S1Sq/jejlIg/AeOdobBjnZCcpYYEbbR.ETQ7dLAruNjAO'),
(30, 3, 'adminuser', '$2y$10$EmozcJnghfhLMYOGJP9eQeg/nZs8MnO9cv6bWt6Vg1owVrQF9NpJK'),
(31, 2, 'zoelecturer', '$2y$10$/dVFQvdth376hRU2qTucFOjrP9EENUI5A33OWF7UXY.KAMXdpL/K2');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `userId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(500) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `street1` varchar(255) DEFAULT NULL,
  `street2` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `postCode` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`userId`, `name`, `surname`, `email`, `date_of_birth`, `street1`, `street2`, `city`, `postCode`) VALUES
(25, 'Kiara', 'Student', 'kiarabrown@gmail.com', '2025-12-22', '5', 'Triq Bahar', 'Zurrieq', 'ZRQ 1234'),
(30, 'Admin', 'User', 'admin@gmail.com', '2025-12-29', '7', 'Triq Flor', 'Qormi', 'QRM 222'),
(31, 'Zoe', 'Lecturer', 'zoey@gmail.com', '2025-12-29', '6', 'Triq Bay', 'Valletta', 'VRT 111');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`assignmentId`),
  ADD KEY `assignments_ibfk_1` (`unitId`),
  ADD KEY `assignments_ibfk_2` (`userId`);

--
-- Indexes for table `assignments_file`
--
ALTER TABLE `assignments_file`
  ADD PRIMARY KEY (`fileId`),
  ADD KEY `assignments_file_ibfk_1` (`assignmentId`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendanceId`),
  ADD KEY `attendance_ibfk_3` (`unitTimetableId`),
  ADD KEY `attendance_ibfk_2` (`unitId`),
  ADD KEY `attendance_ibfk_1` (`userAccountId`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`classId`),
  ADD KEY `class_ibfk_1` (`courseId`);

--
-- Indexes for table `class_lecturer`
--
ALTER TABLE `class_lecturer`
  ADD PRIMARY KEY (`classLecturerId`),
  ADD KEY `lecturerId` (`lecturerId`),
  ADD KEY `classId` (`classId`);

--
-- Indexes for table `class_student`
--
ALTER TABLE `class_student`
  ADD PRIMARY KEY (`classStudentId`),
  ADD KEY `class_student_ibfk_1` (`studentId`),
  ADD KEY `class_student_ibfk_2` (`classId`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseId`);

--
-- Indexes for table `enrolment`
--
ALTER TABLE `enrolment`
  ADD PRIMARY KEY (`userAccountId`,`courseId`),
  ADD KEY `courseId` (`courseId`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`userAccountId`,`assignmentId`,`lecturerUserAccountId`) USING BTREE,
  ADD KEY `grades_ibfk_3` (`lecturerUserAccountId`),
  ADD KEY `grades_ibfk_2` (`assignmentId`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`messageId`),
  ADD KEY `message_ibfk_2` (`senderUsername`),
  ADD KEY `message_ibfk_1` (`receiverUsername`);

--
-- Indexes for table `messageoutbox`
--
ALTER TABLE `messageoutbox`
  ADD PRIMARY KEY (`messageId`),
  ADD KEY `messageoutbox_ibfk_2` (`senderUsername`);

--
-- Indexes for table `recipient`
--
ALTER TABLE `recipient`
  ADD UNIQUE KEY `messageId` (`messageId`,`recipientUsername`),
  ADD KEY `recipient_ibfk_2` (`recipientUsername`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `school_calendar`
--
ALTER TABLE `school_calendar`
  ADD PRIMARY KEY (`calendarId`);

--
-- Indexes for table `submission`
--
ALTER TABLE `submission`
  ADD PRIMARY KEY (`submissionId`),
  ADD KEY `submission_ibfk_2` (`assignmentId`),
  ADD KEY `submission_ibfk_1` (`studentId`);

--
-- Indexes for table `submission_file`
--
ALTER TABLE `submission_file`
  ADD PRIMARY KEY (`fileId`),
  ADD KEY `submission_file_ibfk_2` (`assignmentId`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`unitId`),
  ADD KEY `courseId` (`courseId`);

--
-- Indexes for table `unit_lecturer`
--
ALTER TABLE `unit_lecturer`
  ADD PRIMARY KEY (`unitLecturerId`),
  ADD KEY `unit_lecturer_ibfk_2` (`unitId`),
  ADD KEY `unit_lecturer_ibfk_1` (`lecturerId`);

--
-- Indexes for table `unit_student`
--
ALTER TABLE `unit_student`
  ADD PRIMARY KEY (`unitStudentId`),
  ADD KEY `unit_student_ibfk_1` (`unitId`),
  ADD KEY `unit_student_ibfk_2` (`studentId`);

--
-- Indexes for table `unit_timetable`
--
ALTER TABLE `unit_timetable`
  ADD PRIMARY KEY (`unitTimetableId`),
  ADD KEY `unit_timetable_ibfk_1` (`classId`),
  ADD KEY `unit_timetable_ibfk_2` (`unitId`),
  ADD KEY `unit_timetable_ibfk_3` (`lecturerId`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `username` (`username`) USING BTREE,
  ADD KEY `roleId` (`roleId`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `assignmentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `assignments_file`
--
ALTER TABLE `assignments_file`
  MODIFY `fileId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendanceId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `classId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `class_lecturer`
--
ALTER TABLE `class_lecturer`
  MODIFY `classLecturerId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `class_student`
--
ALTER TABLE `class_student`
  MODIFY `classStudentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `courseId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `messageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `messageoutbox`
--
ALTER TABLE `messageoutbox`
  MODIFY `messageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `roleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `school_calendar`
--
ALTER TABLE `school_calendar`
  MODIFY `calendarId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `submission`
--
ALTER TABLE `submission`
  MODIFY `submissionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `submission_file`
--
ALTER TABLE `submission_file`
  MODIFY `fileId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `unitId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `unit_lecturer`
--
ALTER TABLE `unit_lecturer`
  MODIFY `unitLecturerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `unit_student`
--
ALTER TABLE `unit_student`
  MODIFY `unitStudentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `unit_timetable`
--
ALTER TABLE `unit_timetable`
  MODIFY `unitTimetableId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignments`
--
ALTER TABLE `assignments`
  ADD CONSTRAINT `assignments_ibfk_1` FOREIGN KEY (`unitId`) REFERENCES `unit` (`unitId`) ON DELETE CASCADE,
  ADD CONSTRAINT `assignments_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `user_account` (`userId`) ON DELETE CASCADE;

--
-- Constraints for table `assignments_file`
--
ALTER TABLE `assignments_file`
  ADD CONSTRAINT `assignments_file_ibfk_1` FOREIGN KEY (`assignmentId`) REFERENCES `assignments` (`assignmentId`) ON DELETE CASCADE;

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`userAccountId`) REFERENCES `user_account` (`userId`) ON DELETE CASCADE,
  ADD CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`unitId`) REFERENCES `unit` (`unitId`) ON DELETE CASCADE,
  ADD CONSTRAINT `attendance_ibfk_3` FOREIGN KEY (`unitTimetableId`) REFERENCES `unit_timetable` (`unitTimetableId`) ON DELETE CASCADE;

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_ibfk_1` FOREIGN KEY (`courseId`) REFERENCES `course` (`courseId`);

--
-- Constraints for table `class_lecturer`
--
ALTER TABLE `class_lecturer`
  ADD CONSTRAINT `class_lecturer_ibfk_1` FOREIGN KEY (`lecturerId`) REFERENCES `user_account` (`userId`),
  ADD CONSTRAINT `class_lecturer_ibfk_2` FOREIGN KEY (`classId`) REFERENCES `class` (`classId`);

--
-- Constraints for table `class_student`
--
ALTER TABLE `class_student`
  ADD CONSTRAINT `class_student_ibfk_1` FOREIGN KEY (`studentId`) REFERENCES `user_account` (`userId`) ON DELETE CASCADE,
  ADD CONSTRAINT `class_student_ibfk_2` FOREIGN KEY (`classId`) REFERENCES `class` (`classId`) ON DELETE CASCADE;

--
-- Constraints for table `enrolment`
--
ALTER TABLE `enrolment`
  ADD CONSTRAINT `enrolment_ibfk_1` FOREIGN KEY (`userAccountId`) REFERENCES `user_account` (`userId`) ON DELETE CASCADE,
  ADD CONSTRAINT `enrolment_ibfk_2` FOREIGN KEY (`courseId`) REFERENCES `course` (`courseId`);

--
-- Constraints for table `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `grades_ibfk_1` FOREIGN KEY (`userAccountId`) REFERENCES `user_account` (`userId`) ON DELETE CASCADE,
  ADD CONSTRAINT `grades_ibfk_2` FOREIGN KEY (`assignmentId`) REFERENCES `assignments` (`assignmentId`) ON DELETE CASCADE,
  ADD CONSTRAINT `grades_ibfk_3` FOREIGN KEY (`lecturerUserAccountId`) REFERENCES `user_account` (`userId`) ON DELETE CASCADE;

--
-- Constraints for table `recipient`
--
ALTER TABLE `recipient`
  ADD CONSTRAINT `recipient_ibfk_1` FOREIGN KEY (`messageId`) REFERENCES `messageoutbox` (`messageId`) ON DELETE CASCADE;

--
-- Constraints for table `submission`
--
ALTER TABLE `submission`
  ADD CONSTRAINT `submission_ibfk_1` FOREIGN KEY (`studentId`) REFERENCES `user_account` (`userId`) ON DELETE CASCADE,
  ADD CONSTRAINT `submission_ibfk_2` FOREIGN KEY (`assignmentId`) REFERENCES `assignments` (`assignmentId`) ON DELETE CASCADE;

--
-- Constraints for table `submission_file`
--
ALTER TABLE `submission_file`
  ADD CONSTRAINT `submission_file_ibfk_2` FOREIGN KEY (`assignmentId`) REFERENCES `assignments` (`assignmentId`) ON DELETE CASCADE;

--
-- Constraints for table `unit`
--
ALTER TABLE `unit`
  ADD CONSTRAINT `unit_ibfk_1` FOREIGN KEY (`courseId`) REFERENCES `course` (`courseId`);

--
-- Constraints for table `unit_lecturer`
--
ALTER TABLE `unit_lecturer`
  ADD CONSTRAINT `unit_lecturer_ibfk_1` FOREIGN KEY (`lecturerId`) REFERENCES `user_account` (`userId`) ON DELETE CASCADE,
  ADD CONSTRAINT `unit_lecturer_ibfk_2` FOREIGN KEY (`unitId`) REFERENCES `unit` (`unitId`) ON DELETE CASCADE;

--
-- Constraints for table `unit_student`
--
ALTER TABLE `unit_student`
  ADD CONSTRAINT `unit_student_ibfk_1` FOREIGN KEY (`unitId`) REFERENCES `unit` (`unitId`) ON DELETE CASCADE,
  ADD CONSTRAINT `unit_student_ibfk_2` FOREIGN KEY (`studentId`) REFERENCES `user_account` (`userId`) ON DELETE CASCADE;

--
-- Constraints for table `unit_timetable`
--
ALTER TABLE `unit_timetable`
  ADD CONSTRAINT `unit_timetable_ibfk_1` FOREIGN KEY (`classId`) REFERENCES `class` (`classId`) ON DELETE CASCADE,
  ADD CONSTRAINT `unit_timetable_ibfk_2` FOREIGN KEY (`unitId`) REFERENCES `unit` (`unitId`) ON DELETE CASCADE,
  ADD CONSTRAINT `unit_timetable_ibfk_3` FOREIGN KEY (`lecturerId`) REFERENCES `user_account` (`userId`) ON DELETE CASCADE;

--
-- Constraints for table `user_account`
--
ALTER TABLE `user_account`
  ADD CONSTRAINT `user_account_ibfk_1` FOREIGN KEY (`roleId`) REFERENCES `role` (`roleId`);

--
-- Constraints for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD CONSTRAINT `user_profile_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user_account` (`userId`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
