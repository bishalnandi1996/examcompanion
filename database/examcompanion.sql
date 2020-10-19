-- Database: `examcompanion`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
);

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('bishalnandi1996@gmail.com', '$2y$10$u/NdGhd5./7GNtTeUsULtuH7daRLZuEnM65QBJnln/IqXGbHbbXU2');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `qstn_id` bigint(20) NOT NULL,
  `qstn_name` varchar(200) NOT NULL,
  `qstn_key` varchar(17) NOT NULL,
  `qstn_vector` varchar(17) NOT NULL,
  `strm_id` bigint(20) NOT NULL,
  `time` int(11) NOT NULL,
  `tchr_id` bigint(20) NOT NULL,
  `qstn_date` date NOT NULL
);

-- --------------------------------------------------------

--
-- Table structure for table `question_assign`
--

CREATE TABLE `question_assign` (
  `qstn_asgn_id` bigint(20) NOT NULL,
  `qstn_id` bigint(20) NOT NULL,
  `st_passout_year` year(4) NOT NULL
);

-- --------------------------------------------------------

--
-- Table structure for table `question_subjectwise`
--

CREATE TABLE `question_subjectwise` (
  `qstn_id` bigint(20) NOT NULL,
  `qstn` text NOT NULL,
  `option_a` varchar(100) NOT NULL,
  `option_b` varchar(100) NOT NULL,
  `option_c` varchar(100) NOT NULL,
  `option_d` varchar(100) NOT NULL,
  `answer` varchar(2) NOT NULL,
  `subj_id` bigint(20) NOT NULL,
  `tchr_id` bigint(20) NOT NULL
);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `res_id` bigint(20) NOT NULL,
  `st_id` bigint(20) NOT NULL,
  `qstn_id` bigint(20) NOT NULL,
  `res_result` float NOT NULL,
  `exam_date` date NOT NULL,
  `res_key` varchar(17) NOT NULL,
  `res_iv` varchar(17) NOT NULL
);

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `user_id` varchar(200) NOT NULL,
  `session_id` varchar(255) NOT NULL
);

-- --------------------------------------------------------

--
-- Table structure for table `stream`
--

CREATE TABLE `stream` (
  `strm_id` bigint(20) NOT NULL,
  `strm_name` varchar(100) NOT NULL
);

--
-- Dumping data for table `stream`
--

INSERT INTO `stream` (`strm_id`, `strm_name`) VALUES
(1, 'Master of Computer Application'),
(2, 'B.Tech Computer Science & Engineering'),
(3, 'B.Tech Information Technology'),
(4, 'Bachelor of Computer Application'),
(7, 'Master of Business Administration'),
(8, 'B.Tech Information Technology');

-- --------------------------------------------------------

--
-- Table structure for table `stream_subjects`
--

CREATE TABLE `stream_subjects` (
  `strm_subj_id` bigint(20) NOT NULL,
  `strm_id` bigint(20) NOT NULL,
  `subj_id` bigint(20) NOT NULL
);

--
-- Dumping data for table `stream_subjects`
--

INSERT INTO `stream_subjects` (`strm_subj_id`, `strm_id`, `subj_id`) VALUES
(1, 1, 1),
(2, 4, 3),
(3, 1, 2),
(4, 4, 2),
(5, 1, 4),
(6, 1, 6),
(7, 1, 7),
(8, 4, 9),
(9, 4, 10),
(10, 4, 9),
(11, 1, 8),
(13, 3, 7);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `st_id` bigint(20) NOT NULL,
  `st_name` varchar(100) NOT NULL,
  `st_univ_roll` bigint(20) NOT NULL,
  `strm_id` bigint(20) DEFAULT NULL,
  `st_passout_year` int(4) DEFAULT NULL,
  `st_mobile` bigint(20) DEFAULT NULL,
  `st_email` varchar(200) DEFAULT NULL,
  `st_password` varchar(255) DEFAULT NULL,
  `st_signup` int(1) NOT NULL DEFAULT 0
);

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`st_id`, `st_name`, `st_univ_roll`, `strm_id`, `st_passout_year`, `st_mobile`, `st_email`, `st_password`, `st_signup`) VALUES
(1, 'Bishal Nandi', 33601018021, 1, 2020, 0, 'bishalnandi1996@gmail.com', '$2y$10$pMN7vJDMMtkuKoZjFRNmFOLvXtRtz8KAFnPq2vGl2KnJkT3ubE/0S', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subj_id` bigint(20) NOT NULL,
  `subj_name` varchar(100) NOT NULL
);

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subj_id`, `subj_name`) VALUES
(1, 'Data Structure with C'),
(2, 'Software Engineering'),
(3, 'OOP with C++'),
(4, 'OOP with Java'),
(5, 'Unix and Shell Programming'),
(6, 'Graphics and Multimedia'),
(7, 'E-Commerce'),
(8, 'Database Management System'),
(9, 'Windows Programming with VB'),
(10, 'Business Management');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `tchr_id` bigint(20) NOT NULL,
  `tchr_name` varchar(100) NOT NULL,
  `strm_id` bigint(20) DEFAULT NULL,
  `tchr_employee_id` varchar(10) NOT NULL,
  `tchr_mobile` bigint(20) DEFAULT NULL,
  `tchr_email` varchar(200) DEFAULT NULL,
  `tchr_password` varchar(255) DEFAULT NULL,
  `tchr_signup` int(1) DEFAULT 0
);

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`tchr_id`, `tchr_name`, `strm_id`, `tchr_employee_id`, `tchr_mobile`, `tchr_email`, `tchr_password`, `tchr_signup`) VALUES
(1, 'Bishal Nandi', 1, '1996', 0, 'bishalnandi1996@gmail.com', '$2y$10$fgWlXjv.mFUx4Rbeq4ufP.k37c0.cAtV06yPtKnfYiPgWh810RyHO', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`qstn_id`),
  ADD KEY `strm_id` (`strm_id`),
  ADD KEY `tchr_id` (`tchr_id`);

--
-- Indexes for table `question_assign`
--
ALTER TABLE `question_assign`
  ADD PRIMARY KEY (`qstn_asgn_id`),
  ADD KEY `qstn_id` (`qstn_id`);

--
-- Indexes for table `question_subjectwise`
--
ALTER TABLE `question_subjectwise`
  ADD PRIMARY KEY (`qstn_id`),
  ADD KEY `subj_id` (`subj_id`),
  ADD KEY `tchr_id` (`tchr_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`res_id`),
  ADD KEY `st_id` (`st_id`),
  ADD KEY `qstn_id` (`qstn_id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `stream`
--
ALTER TABLE `stream`
  ADD PRIMARY KEY (`strm_id`);

--
-- Indexes for table `stream_subjects`
--
ALTER TABLE `stream_subjects`
  ADD PRIMARY KEY (`strm_subj_id`),
  ADD KEY `strm_id` (`strm_id`),
  ADD KEY `subj_id` (`subj_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`st_id`),
  ADD KEY `strm_id` (`strm_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subj_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`tchr_id`),
  ADD KEY `strm_id` (`strm_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `qstn_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `question_assign`
--
ALTER TABLE `question_assign`
  MODIFY `qstn_asgn_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `question_subjectwise`
--
ALTER TABLE `question_subjectwise`
  MODIFY `qstn_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `res_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stream`
--
ALTER TABLE `stream`
  MODIFY `strm_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `stream_subjects`
--
ALTER TABLE `stream_subjects`
  MODIFY `strm_subj_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `st_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subj_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `tchr_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`strm_id`) REFERENCES `stream` (`strm_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `question_ibfk_2` FOREIGN KEY (`tchr_id`) REFERENCES `teacher` (`tchr_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `question_assign`
--
ALTER TABLE `question_assign`
  ADD CONSTRAINT `question_assign_ibfk_1` FOREIGN KEY (`qstn_id`) REFERENCES `question` (`qstn_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `question_subjectwise`
--
ALTER TABLE `question_subjectwise`
  ADD CONSTRAINT `question_subjectwise_ibfk_1` FOREIGN KEY (`subj_id`) REFERENCES `subject` (`subj_id`),
  ADD CONSTRAINT `question_subjectwise_ibfk_2` FOREIGN KEY (`tchr_id`) REFERENCES `teacher` (`tchr_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`st_id`) REFERENCES `student` (`st_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `result_ibfk_2` FOREIGN KEY (`qstn_id`) REFERENCES `question` (`qstn_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `stream_subjects`
--
ALTER TABLE `stream_subjects`
  ADD CONSTRAINT `stream_subjects_ibfk_1` FOREIGN KEY (`strm_id`) REFERENCES `stream` (`strm_id`),
  ADD CONSTRAINT `stream_subjects_ibfk_2` FOREIGN KEY (`subj_id`) REFERENCES `subject` (`subj_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`strm_id`) REFERENCES `stream` (`strm_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`strm_id`) REFERENCES `stream` (`strm_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;
