-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 05, 2018 at 11:06 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `AdminUsers`
--

CREATE TABLE `AdminUsers` (
  `AdminUserID` int(11) NOT NULL,
  `EmployeeID` int(11) DEFAULT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Certifications`
--

CREATE TABLE `Certifications` (
  `CertificateID` int(11) NOT NULL,
  `DateOfCertication` varchar(20) NOT NULL,
  `CourseID` int(11) NOT NULL,
  `StudentID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Courses`
--

CREATE TABLE `Courses` (
  `CourseID` int(11) NOT NULL,
  `ClassroomId` varchar(50) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Cost` int(11) NOT NULL,
  `ClassroomUrl` varchar(100) NOT NULL,
  `DepartmentID` int(11) DEFAULT NULL,
  `EnrollmentCode` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Courses`
--

INSERT INTO `Courses` (`CourseID`, `ClassroomId`, `Name`, `Cost`, `ClassroomUrl`, `DepartmentID`, `EnrollmentCode`) VALUES
(1, '10953957559', 'English 101', 10, 'http://classroom.google.com/c/MTA5NTM5NTc1NTla', 1, ''),
(2, '10953976195', 'German A1', 30, 'http://classroom.google.com/c/MTA5NTM5NzYxOTVa', 2, ''),
(3, '10959589424', 'English Advanced', 30, 'http://classroom.google.com/c/MTA5NTk1ODk0MjRa', 1, ''),
(4, '10959650390', 'English  Elementary', 30, 'http://classroom.google.com/c/MTA5NTk2NTAzOTBa', 1, 'pk4a9j2'),
(5, '10965461860', 'French 101', 30, 'http://classroom.google.com/c/MTA5NjU0NjE4NjBa', 3, 'tn0dckn'),
(6, '10964371217', 'sdffsd', 0, 'http://classroom.google.com/c/MTA5NjQzNzEyMTda', 3, 'zoxo0zi'),
(7, '10963276193', 'French advanced', 30, 'http://classroom.google.com/c/MTA5NjMyNzYxOTNa', 3, '4ibu58h');

-- --------------------------------------------------------

--
-- Table structure for table `CoursesSchedule`
--

CREATE TABLE `CoursesSchedule` (
  `CourseScheduleID` int(11) NOT NULL,
  `StartDateAndTime` varchar(100) NOT NULL,
  `EndDateAndTIme` varchar(100) NOT NULL,
  `CourseID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Departments`
--

CREATE TABLE `Departments` (
  `DepartmentID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Departments`
--

INSERT INTO `Departments` (`DepartmentID`, `Name`, `Description`) VALUES
(1, 'English Deparment', 'This is an english department'),
(2, 'German Deparment', 'This is a german department'),
(3, 'French Deparment', 'This a french deparment');

-- --------------------------------------------------------

--
-- Table structure for table `Employees`
--

CREATE TABLE `Employees` (
  `EmployeeID` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `DateofBirth` date DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Gender` char(1) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `City` varchar(50) NOT NULL,
  `PhoneNumber` int(11) NOT NULL,
  `job` varchar(20) NOT NULL,
  `profileImage` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ExamPoints`
--

CREATE TABLE `ExamPoints` (
  `ExamPointID` int(11) NOT NULL,
  `Point` int(3) NOT NULL,
  `ExamID` int(11) NOT NULL,
  `StudentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Exams`
--

CREATE TABLE `Exams` (
  `ExamID` int(11) NOT NULL,
  `ExamName` varchar(100) NOT NULL,
  `ExamStartDateAndTime` varchar(100) NOT NULL,
  `ExamEndDateAndTIme` varchar(100) NOT NULL,
  `CourseID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Exams`
--

INSERT INTO `Exams` (`ExamID`, `ExamName`, `ExamStartDateAndTime`, `ExamEndDateAndTIme`, `CourseID`) VALUES
(1, 'ddsfsfd', 'sdffds', 'sdfds', NULL),
(2, 'dsffsd', 'sfsd', 'sfdsdf', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `GoogleUsers`
--

CREATE TABLE `GoogleUsers` (
  `UserID` int(11) NOT NULL,
  `SubGoogle` int(20) NOT NULL,
  `StudentID` int(11) DEFAULT NULL,
  `TeacherID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Students`
--

CREATE TABLE `Students` (
  `StudentID` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `DateofBirth` date DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Gender` char(1) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `City` varchar(50) NOT NULL,
  `PhoneNumber` int(11) NOT NULL,
  `profileImage` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Students`
--

INSERT INTO `Students` (`StudentID`, `FirstName`, `LastName`, `DateofBirth`, `Email`, `Gender`, `Address`, `City`, `PhoneNumber`, `profileImage`) VALUES
(1, 'Dorron', 'Zherka', '1996-11-22', 'dorron.zherka@gmail.com', 'M', 'Skenderbeu', 'Ferizaj', 2147483647, 'zhzhh.jpg'),
(2, 'Jane', 'Doe', '1990-10-13', 'janeDoe90@gmail.com', 'F', 'Death Valley', 'Lipijan', 123456789, 'image-61.png'),
(3, 'Michio', 'Kaku', '1947-01-24', 'michioKaku47@gmail.com', 'M', 'Harlem Street', 'Gjilan', 123456789, 'image-59.png');

-- --------------------------------------------------------

--
-- Table structure for table `Studies`
--

CREATE TABLE `Studies` (
  `StudiesID` int(11) NOT NULL,
  `CourseID` int(11) NOT NULL,
  `StudentID` int(11) NOT NULL,
  `isEnrolledinClassroom` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Studies`
--

INSERT INTO `Studies` (`StudiesID`, `CourseID`, `StudentID`, `isEnrolledinClassroom`) VALUES
(1, 1, 1, 0),
(2, 2, 1, 0),
(3, 1, 2, 0),
(4, 2, 2, 0),
(5, 1, 3, 0),
(6, 5, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Teachers`
--

CREATE TABLE `Teachers` (
  `TeacherID` int(11) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `DateOfBirth` varchar(100) NOT NULL,
  `Gender` char(1) NOT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Address` varchar(100) NOT NULL,
  `City` varchar(100) NOT NULL,
  `PhoneNumber` int(10) NOT NULL,
  `profileImage` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Teaches`
--

CREATE TABLE `Teaches` (
  `TeachesID` int(11) NOT NULL,
  `CourseID` int(11) NOT NULL,
  `TeacherID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `AdminUsers`
--
ALTER TABLE `AdminUsers`
  ADD PRIMARY KEY (`AdminUserID`),
  ADD KEY `EmployeeID` (`EmployeeID`);

--
-- Indexes for table `Certifications`
--
ALTER TABLE `Certifications`
  ADD PRIMARY KEY (`CertificateID`),
  ADD KEY `StudentID` (`StudentID`),
  ADD KEY `CourseID` (`CourseID`);

--
-- Indexes for table `Courses`
--
ALTER TABLE `Courses`
  ADD PRIMARY KEY (`CourseID`),
  ADD KEY `DepartmentID` (`DepartmentID`);

--
-- Indexes for table `CoursesSchedule`
--
ALTER TABLE `CoursesSchedule`
  ADD PRIMARY KEY (`CourseScheduleID`),
  ADD KEY `CourseID` (`CourseID`);

--
-- Indexes for table `Departments`
--
ALTER TABLE `Departments`
  ADD PRIMARY KEY (`DepartmentID`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `Employees`
--
ALTER TABLE `Employees`
  ADD PRIMARY KEY (`EmployeeID`);

--
-- Indexes for table `ExamPoints`
--
ALTER TABLE `ExamPoints`
  ADD PRIMARY KEY (`ExamPointID`),
  ADD KEY `StudentID` (`StudentID`);

--
-- Indexes for table `Exams`
--
ALTER TABLE `Exams`
  ADD PRIMARY KEY (`ExamID`),
  ADD KEY `CourseID` (`CourseID`);

--
-- Indexes for table `GoogleUsers`
--
ALTER TABLE `GoogleUsers`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `StudentID` (`StudentID`),
  ADD KEY `TeacherID` (`TeacherID`);

--
-- Indexes for table `Students`
--
ALTER TABLE `Students`
  ADD PRIMARY KEY (`StudentID`);

--
-- Indexes for table `Studies`
--
ALTER TABLE `Studies`
  ADD PRIMARY KEY (`StudiesID`),
  ADD KEY `StudentID` (`StudentID`),
  ADD KEY `CourseID` (`CourseID`);

--
-- Indexes for table `Teachers`
--
ALTER TABLE `Teachers`
  ADD PRIMARY KEY (`TeacherID`);

--
-- Indexes for table `Teaches`
--
ALTER TABLE `Teaches`
  ADD PRIMARY KEY (`TeachesID`),
  ADD KEY `TeacherID` (`TeacherID`),
  ADD KEY `CourseID` (`CourseID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `AdminUsers`
--
ALTER TABLE `AdminUsers`
  MODIFY `AdminUserID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Certifications`
--
ALTER TABLE `Certifications`
  MODIFY `CertificateID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Courses`
--
ALTER TABLE `Courses`
  MODIFY `CourseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `CoursesSchedule`
--
ALTER TABLE `CoursesSchedule`
  MODIFY `CourseScheduleID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Departments`
--
ALTER TABLE `Departments`
  MODIFY `DepartmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Employees`
--
ALTER TABLE `Employees`
  MODIFY `EmployeeID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ExamPoints`
--
ALTER TABLE `ExamPoints`
  MODIFY `ExamPointID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Exams`
--
ALTER TABLE `Exams`
  MODIFY `ExamID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `GoogleUsers`
--
ALTER TABLE `GoogleUsers`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Students`
--
ALTER TABLE `Students`
  MODIFY `StudentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Studies`
--
ALTER TABLE `Studies`
  MODIFY `StudiesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Teachers`
--
ALTER TABLE `Teachers`
  MODIFY `TeacherID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Teaches`
--
ALTER TABLE `Teaches`
  MODIFY `TeachesID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `AdminUsers`
--
ALTER TABLE `AdminUsers`
  ADD CONSTRAINT `AdminUsers_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `Employees` (`EmployeeID`);

--
-- Constraints for table `Certifications`
--
ALTER TABLE `Certifications`
  ADD CONSTRAINT `Certifications_ibfk_1` FOREIGN KEY (`StudentID`) REFERENCES `Students` (`StudentID`),
  ADD CONSTRAINT `Certifications_ibfk_2` FOREIGN KEY (`CourseID`) REFERENCES `Courses` (`CourseID`);

--
-- Constraints for table `Courses`
--
ALTER TABLE `Courses`
  ADD CONSTRAINT `Courses_ibfk_1` FOREIGN KEY (`DepartmentID`) REFERENCES `Departments` (`DepartmentID`);

--
-- Constraints for table `CoursesSchedule`
--
ALTER TABLE `CoursesSchedule`
  ADD CONSTRAINT `CoursesSchedule_ibfk_1` FOREIGN KEY (`CourseID`) REFERENCES `Courses` (`CourseID`);

--
-- Constraints for table `ExamPoints`
--
ALTER TABLE `ExamPoints`
  ADD CONSTRAINT `ExamPoints_ibfk_1` FOREIGN KEY (`StudentID`) REFERENCES `Students` (`StudentID`);

--
-- Constraints for table `Exams`
--
ALTER TABLE `Exams`
  ADD CONSTRAINT `Exams_ibfk_1` FOREIGN KEY (`CourseID`) REFERENCES `Courses` (`CourseID`);

--
-- Constraints for table `GoogleUsers`
--
ALTER TABLE `GoogleUsers`
  ADD CONSTRAINT `GoogleUsers_ibfk_1` FOREIGN KEY (`StudentID`) REFERENCES `Students` (`StudentID`),
  ADD CONSTRAINT `GoogleUsers_ibfk_2` FOREIGN KEY (`TeacherID`) REFERENCES `Teachers` (`TeacherID`);

--
-- Constraints for table `Studies`
--
ALTER TABLE `Studies`
  ADD CONSTRAINT `Studies_ibfk_1` FOREIGN KEY (`StudentID`) REFERENCES `Students` (`StudentID`),
  ADD CONSTRAINT `Studies_ibfk_2` FOREIGN KEY (`CourseID`) REFERENCES `Courses` (`CourseID`);

--
-- Constraints for table `Teaches`
--
ALTER TABLE `Teaches`
  ADD CONSTRAINT `Teaches_ibfk_1` FOREIGN KEY (`TeacherID`) REFERENCES `Teachers` (`TeacherID`),
  ADD CONSTRAINT `Teaches_ibfk_2` FOREIGN KEY (`CourseID`) REFERENCES `Courses` (`CourseID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
