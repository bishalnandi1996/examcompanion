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
  `time` int(11) NOT NULL
);

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`qstn_id`, `qstn_name`, `qstn_key`, `qstn_vector`, `strm_id`, `time`) VALUES
(8, 'infosys', '8a2919717fce42f1', 'acc307db125773e1', 1, 120),
(17, 'wipro', '64152e85a13582c7', 'ec487df5d2eb3de6', 1, 120);

-- --------------------------------------------------------

--
-- Table structure for table `question_assign`
--

CREATE TABLE `question_assign` (
  `qstn_asgn_id` bigint(20) NOT NULL,
  `qstn_id` bigint(20) NOT NULL,
  `st_passout_year` year(4) NOT NULL
);

--
-- Dumping data for table `question_assign`
--

INSERT INTO `question_assign` (`qstn_asgn_id`, `qstn_id`, `st_passout_year`) VALUES
(7, 8, 2020),
(8, 8, 2021),
(11, 17, 2020);

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
  `subj_id` bigint(20) NOT NULL
);

--
-- Dumping data for table `question_subjectwise`
--

INSERT INTO `question_subjectwise` (`qstn_id`, `qstn`, `option_a`, `option_b`, `option_c`, `option_d`, `answer`, `subj_id`) VALUES
(1, 'In a class there are 60% of girls of which 25% poor.  What is the probability that a poor girl is selected is leader?', '0.2', '0.15', '0.18', '0.25', 'b', 1),
(2, 'A and B are running around a circular track of length 120 meters with speeds 12 m/s and 6 m/s in the same direction.  When will they meet for the first time?', 'after 20 seconds A meets B', 'after 22 seconds A meets B', 'after 30 seconds A meets B', 'after 25 seconds A meets B', 'a', 1),
(3, 'A completes a work in 20 days B in 60 days C in 45 days.  All three persons working together on a project got a profit of Rs.26000 what is the profit of B?', '4385', '4875', '4785', '4755', 'b', 1),
(4, 'A completes a piece of work in 3/4 of the time in B does, B takes 4/5 of the time in C does.  They got a profit of Rs. 40000  how much B gets?', '17876', '13523', '12487', '12765', 'd', 1),
(5, 'An empty tank be filled with an inlet pipe â€˜Aâ€™ in 42 minutes. After 12 minutes an outlet pipe â€˜Bâ€™ is opened which can empty the tank in 30 minutes. After 6 minutes another inlet pipe â€˜Câ€™ opened into the same tank, which can fill the tank in 35 minutes and the tank is filled. Find the time taken to fill the tank?', '53.5', '65.5', '51', '51.5', 'd', 1),
(6, 'Mother, daughter and an infant combined age is 74, and mother\'s age is 46 more than daughter and infant.  If infant age is 0.4 times of daughter age, then find daughters age.', '9', '8', '10', '11', 'c', 1),
(7, 'A Grocer bought 24 kg coffee beans at price X per kg. After a while one third of stock got spoiled so he sold the rest for $200 per kg and made a total profit of twice the cost. What must be the price of X?', '34.34', '42.43', '44.44', '45.45', 'c', 1),
(8, 'Bhanu spends 30% of his income on petrol on scooter 20% of the remaining on house rent and the balance on food. If he spends Rs.300 on petrol then what is the expenditure on house rent? ', '140', '145', '135', '175', 'a', 1),
(9, 'How many kgs. of wheat costing Rs. 5 per kg must be mixed with 45 kg of rice costing Rs. 6.40 per kg so that 20% gain may be obtained by  selling the mixture at Rs. 7.20 per kg ?', '16', '18', '17', '19', 'a', 1),
(10, 'An article manufactured by a company consists of two parts X and Y. In the process of manufacturing of part X, 9 out 100 parts many be defective. Similarly , 5 out of 100 are likely to be defective in the manufacturer of Y. Calculate the probability that the assembled product will not be defective?', '0.8435', '0.8465', '0.8645', 'none', 'c', 1),
(11, 'If there are Six periods in each working day of a school, In how many ways can one arrange 5 subjects such that each subject is allowed at least one period?', '720', '3600', '7200', '1800', 'b', 1),
(12, 'The remainder when 1!+2!+3!...+50! divided by 5! will be', '23', '87', '33', '27', 'c', 1),
(13, 'X, Y, W and Z are intezers and the expressing X - Y - Z is even and Y - W - Z is odd.  If X is even then which of the following is true?', 'Y must be odd ', ' Z must be odd ', 'Y-Z must be odd ', 'W must be odd ', 'd', 1),
(14, 'In  a 8 x 8 chess board what is the total number of squares.', '204', '184', '246', '104', 'a', 1),
(15, 'A is twice efficient than B. A and B can both work together to complete a work in 7 days. Then find in how many days A alone can complete the work?', '11.2', '10.2', '11.5', '10.5', 'd', 1),
(16, 'letters in the word ABUSER are permuted in all possible ways and arranged in alphabetical order then find the word at position 49 in the permuted alphabetical order?', 'ARBSEU', 'ARBESU', 'ARBSUE', 'ARBEUS', ' b', 1),
(17, 'Apple costs L rupees per kilogram for first 30kgs and Q rupees per kilogram for each additional kilogram. If the price of 33 kilograms is 11.67and for 36kgs of Apples is 12.48 then the cost of first 10 kgs of Apples is', '3.63', '3.62', '4.34', '4.23', 'b', 1),
(18, 'In how many ways can 3 postcards can be posted in 5 postboxes?', '125', '225', '75', '150', 'a', 1),
(19, 'There are two boxes,one containing 39 red balls & the other containing 26 green balls.you are allowed to move the balls b/w the boxes so that when you choose a box random & a ball at random from the chosen box,the probability of getting a red ball is maximized.this maximum probability is', '0.9', '0.8', '0.7', '0.76', 'b', 1),
(20, 'A dog taken four leaps for every five leaps of hare but three leaps of the dog is equal to four leaps of the hare. Compare speed?\nAns: In terms of number of leaps, the ratio of the Dog and hare speeds are 4 : 5\nBut Given that 3 leaps of dog = 4 leaps of hare,.  i.e., Leap lengths = 4 : 3 (If Dog is covering in 3 leaps what hare as covered in 4 leaps then Leap lengths are inversely proportional)\nSo Dog speed = 4 x 4 = 16\nHare speed = 5 x 3 = 15\nSo speeds ratio = 16 : 15\n', '0.55138888888889', '0.59236111111111', '0.67569444444444', '0.67708333333333', 'd', 1),
(21, 'Country Club has an indoor swimming club. Thirty percent of the members of a swim club have passed the lifesaving test. Among the members who have not passed the test, 12 have taken the preparatory course and 30 have not taken the course. How many members are there in the swim club?', '67', '87', '60', '68', 'c', 1),
(22, 'Among a group of 2500 people, 35 percent invest in municipal bonds, 18 percent invest in oil stocks, and 7 percent invest in both municipal bonds and oil stocks. If 1 person is to be randomly selected from 2500 people, what is the probability that the person selected will be one who invests in municipal bonds but not in oil stocks', '0.28', '0.24', '0.25', '0.27', 'a', 1),
(23, 'My flight takes of at 2am from a place at 18N 10E and landed 10 Hrs later at a place with coordinates 36N70W. What is the local time when my plane landed?', '5:40PM', '5:30AM', '6:30AM', '0.27777777777778', 'd', 1),
(24, 'A hollow cube of size 5 cm is taken, with a thickness of 1 cm. It is made of smaller cubes of size 1 cm. If 4 faces of the outer surface of the cube are painted, totally how many faces of the smaller cubes remain unpainted?', '628', '488', '729', '624', 'b', 1),
(25, 'After the typist writes 12 letters and addresses 12 envelopes, she inserts the letters randomly into the envelopes (1 letter per envelope). What is the probability that exactly 1 letter is inserted in an improper envelope?', '0', '1', '2', '3', 'a', 1),
(26, 'In a class there are 60% of girls of which 25% poor.  What is the probability that a poor girl is selected is leader?', '0.2', '0.15', '0.18', '0.25', 'b', 2),
(27, 'A and B are running around a circular track of length 120 meters with speeds 12 m/s and 6 m/s in the same direction.  When will they meet for the first time?', 'after 20 seconds A meets B', 'after 22 seconds A meets B', 'after 30 seconds A meets B', 'after 25 seconds A meets B', 'a', 2),
(28, 'A completes a work in 20 days B in 60 days C in 45 days.  All three persons working together on a project got a profit of Rs.26000 what is the profit of B?', '4385', '4875', '4785', '4755', 'b', 2),
(29, 'A completes a piece of work in 3/4 of the time in B does, B takes 4/5 of the time in C does.  They got a profit of Rs. 40000  how much B gets?', '17876', '13523', '12487', '12765', 'd', 2),
(30, 'An empty tank be filled with an inlet pipe â€˜Aâ€™ in 42 minutes. After 12 minutes an outlet pipe â€˜Bâ€™ is opened which can empty the tank in 30 minutes. After 6 minutes another inlet pipe â€˜Câ€™ opened into the same tank, which can fill the tank in 35 minutes and the tank is filled. Find the time taken to fill the tank?', '53.5', '65.5', '51', '51.5', 'd', 2),
(31, 'Mother, daughter and an infant combined age is 74, and mother\'s age is 46 more than daughter and infant.  If infant age is 0.4 times of daughter age, then find daughters age.', '9', '8', '10', '11', 'c', 2),
(32, 'A Grocer bought 24 kg coffee beans at price X per kg. After a while one third of stock got spoiled so he sold the rest for $200 per kg and made a total profit of twice the cost. What must be the price of X?', '34.34', '42.43', '44.44', '45.45', 'c', 2),
(33, 'Bhanu spends 30% of his income on petrol on scooter 20% of the remaining on house rent and the balance on food. If he spends Rs.300 on petrol then what is the expenditure on house rent? ', '140', '145', '135', '175', 'a', 2),
(34, 'How many kgs. of wheat costing Rs. 5 per kg must be mixed with 45 kg of rice costing Rs. 6.40 per kg so that 20% gain may be obtained by  selling the mixture at Rs. 7.20 per kg ?', '16', '18', '17', '19', 'a', 2),
(35, 'An article manufactured by a company consists of two parts X and Y. In the process of manufacturing of part X, 9 out 100 parts many be defective. Similarly , 5 out of 100 are likely to be defective in the manufacturer of Y. Calculate the probability that the assembled product will not be defective?', '0.8435', '0.8465', '0.8645', 'none', 'c', 2),
(36, 'If there are Six periods in each working day of a school, In how many ways can one arrange 5 subjects such that each subject is allowed at least one period?', '720', '3600', '7200', '1800', 'b', 2),
(37, 'The remainder when 1!+2!+3!...+50! divided by 5! will be', '23', '87', '33', '27', 'c', 2),
(38, 'X, Y, W and Z are intezers and the expressing X - Y - Z is even and Y - W - Z is odd.  If X is even then which of the following is true?', 'Y must be odd ', ' Z must be odd ', 'Y-Z must be odd ', 'W must be odd ', 'd', 2),
(39, 'In  a 8 x 8 chess board what is the total number of squares.', '204', '184', '246', '104', 'a', 2),
(40, 'A is twice efficient than B. A and B can both work together to complete a work in 7 days. Then find in how many days A alone can complete the work?', '11.2', '10.2', '11.5', '10.5', 'd', 2),
(41, 'letters in the word ABUSER are permuted in all possible ways and arranged in alphabetical order then find the word at position 49 in the permuted alphabetical order?', 'ARBSEU', 'ARBESU', 'ARBSUE', 'ARBEUS', ' b', 2),
(42, 'Apple costs L rupees per kilogram for first 30kgs and Q rupees per kilogram for each additional kilogram. If the price of 33 kilograms is 11.67and for 36kgs of Apples is 12.48 then the cost of first 10 kgs of Apples is', '3.63', '3.62', '4.34', '4.23', 'b', 2),
(43, 'In how many ways can 3 postcards can be posted in 5 postboxes?', '125', '225', '75', '150', 'a', 2),
(44, 'There are two boxes,one containing 39 red balls & the other containing 26 green balls.you are allowed to move the balls b/w the boxes so that when you choose a box random & a ball at random from the chosen box,the probability of getting a red ball is maximized.this maximum probability is', '0.9', '0.8', '0.7', '0.76', 'b', 2),
(45, 'A dog taken four leaps for every five leaps of hare but three leaps of the dog is equal to four leaps of the hare. Compare speed?\nAns: In terms of number of leaps, the ratio of the Dog and hare speeds are 4 : 5\nBut Given that 3 leaps of dog = 4 leaps of hare,.  i.e., Leap lengths = 4 : 3 (If Dog is covering in 3 leaps what hare as covered in 4 leaps then Leap lengths are inversely proportional)\nSo Dog speed = 4 x 4 = 16\nHare speed = 5 x 3 = 15\nSo speeds ratio = 16 : 15\n', '0.55138888888889', '0.59236111111111', '0.67569444444444', '0.67708333333333', 'd', 2),
(46, 'Country Club has an indoor swimming club. Thirty percent of the members of a swim club have passed the lifesaving test. Among the members who have not passed the test, 12 have taken the preparatory course and 30 have not taken the course. How many members are there in the swim club?', '67', '87', '60', '68', 'c', 2),
(47, 'Among a group of 2500 people, 35 percent invest in municipal bonds, 18 percent invest in oil stocks, and 7 percent invest in both municipal bonds and oil stocks. If 1 person is to be randomly selected from 2500 people, what is the probability that the person selected will be one who invests in municipal bonds but not in oil stocks', '0.28', '0.24', '0.25', '0.27', 'a', 2),
(48, 'My flight takes of at 2am from a place at 18N 10E and landed 10 Hrs later at a place with coordinates 36N70W. What is the local time when my plane landed?', '5:40PM', '5:30AM', '6:30AM', '0.27777777777778', 'd', 2),
(49, 'A hollow cube of size 5 cm is taken, with a thickness of 1 cm. It is made of smaller cubes of size 1 cm. If 4 faces of the outer surface of the cube are painted, totally how many faces of the smaller cubes remain unpainted?', '628', '488', '729', '624', 'b', 2),
(50, 'After the typist writes 12 letters and addresses 12 envelopes, she inserts the letters randomly into the envelopes (1 letter per envelope). What is the probability that exactly 1 letter is inserted in an improper envelope?', '0', '1', '2', '3', 'a', 2);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `res_id` bigint(20) NOT NULL,
  `st_id` bigint(20) NOT NULL,
  `qstn_id` bigint(20) NOT NULL,
  `res_result` float NOT NULL,
  `attempt_count` int(11) NOT NULL,
  `exam_date` date NOT NULL,
  `res_key` varchar(17) NOT NULL,
  `res_iv` varchar(17) NOT NULL
);

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`res_id`, `st_id`, `qstn_id`, `res_result`, `attempt_count`, `exam_date`, `res_key`, `res_iv`) VALUES
(1, 1, 8, 20, 1, '2019-10-23', 'e30726c3f9b8d60b', '0d08651a2a0b4715'),
(2, 1, 8, 0, 2, '2019-11-05', 'ea5134cf4e4e2046', '779d81c1e4cc7191'),
(3, 1, 8, 0, 3, '2019-11-05', 'bcedc65388bff9c6', 'f43a79f93b6977bc'),
(4, 1, 8, 0, 4, '2019-11-05', 'f2ec4adffd71d059', '6fc84934519e4c4a'),
(5, 1, 8, 0, 5, '2019-11-06', '6e172d29fd872589', 'd54e8293b82f3fb2'),
(6, 1, 8, 0, 6, '2019-11-06', '90eee6fdbae3c47a', '10e77f3171989f7b'),
(7, 13, 8, 8, 1, '2019-11-11', 'a84680a85ecf73d9', '377e048e80f1ab8b'),
(8, 1, 17, 4, 1, '2019-11-11', 'bc48db224af93aa4', 'b3b9cba7cff4b51e'),
(9, 1, 17, 0, 2, '2019-11-16', 'fa242a2070ff8cd9', '88ce80585ed2d001'),
(10, 1, 8, 4, 7, '2019-11-16', 'c7b6067b14bbfed4', 'fb00f0763d4af26e'),
(11, 1, 8, 0, 8, '2019-11-29', '7785f7880add6b8b', 'ec522112c76caef5'),
(12, 1, 17, 4, 3, '2019-11-29', '9229627c3e589f15', '00428de007e78bb8'),
(13, 1, 8, 0, 9, '2020-02-16', 'd68e12bddd8aabd5', '74f4458cf7d5a6e1'),
(14, 1, 8, 0, 10, '2020-02-16', '051c9d0463f195e2', '8474c57ea2aee1a8');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `user_id` varchar(200) NOT NULL,
  `session_id` varchar(255) NOT NULL
);

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`user_id`, `session_id`) VALUES
('tchr_1', '2ab4226da338c1d8ce4383949fbefd9f');

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
(1, 'MCA'),
(2, 'B.Tech CSE'),
(3, 'B.Tech IT'),
(4, 'BCA');

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
(4, 4, 2);

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
  `st_email` varchar(200) DEFAULT NULL,
  `st_password` varchar(255) DEFAULT NULL,
  `st_signup` int(1) NOT NULL DEFAULT 0
);

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`st_id`, `st_name`, `st_univ_roll`, `strm_id`, `st_passout_year`, `st_email`, `st_password`, `st_signup`) VALUES
(1, 'Bishal Nandi', 33601018021, 1, 2020, 'bishalnandi1996@gmail.com', '$2y$10$pMN7vJDMMtkuKoZjFRNmFOLvXtRtz8KAFnPq2vGl2KnJkT3ubE/0S', 1),
(13, 'a', 11101, 1, 2020, 'a@gmail.com', '$2y$10$cRHOAwTxbLZq/ewskskACu2MRvBpex8tLrOhzm.uxbI4iD8J1zIae', 1),
(14, 'b', 2222, NULL, NULL, NULL, NULL, 0),
(15, 'abishal', 45343545356675, NULL, 2021, NULL, NULL, 0),
(16, 'aaabishal ssdfsfs', 6756756, NULL, 2020, NULL, NULL, 0);

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
(3, 'OOP with C++');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `tchr_id` bigint(20) NOT NULL,
  `tchr_name` varchar(100) NOT NULL,
  `strm_id` bigint(20) DEFAULT NULL,
  `tchr_employee_id` varchar(10) NOT NULL,
  `tchr_email` varchar(200) DEFAULT NULL,
  `tchr_password` varchar(255) DEFAULT NULL,
  `tchr_signup` int(1) DEFAULT 0
);

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`tchr_id`, `tchr_name`, `strm_id`, `tchr_employee_id`, `tchr_email`, `tchr_password`, `tchr_signup`) VALUES
(1, 'Bishal Nandi', 1, '1996', 'bishalnandi1996@gmail.com', '$2y$10$fgWlXjv.mFUx4Rbeq4ufP.k37c0.cAtV06yPtKnfYiPgWh810RyHO', 1),
(68, 'a', 1, '1111', 'a@gmail.com', '$2y$10$43ZNO./fSku.nq5ZucZRc.UuPcaXFruIrcK6XLNGPru.LYyhYNWjq', 1),
(69, 'b', 4, '2222', NULL, NULL, 0);

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
  ADD KEY `strm_id` (`strm_id`);

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
  ADD KEY `subj_id` (`subj_id`);

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
  MODIFY `qstn_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `question_assign`
--
ALTER TABLE `question_assign`
  MODIFY `qstn_asgn_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `question_subjectwise`
--
ALTER TABLE `question_subjectwise`
  MODIFY `qstn_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `res_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `stream`
--
ALTER TABLE `stream`
  MODIFY `strm_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stream_subjects`
--
ALTER TABLE `stream_subjects`
  MODIFY `strm_subj_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `st_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subj_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `tchr_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`strm_id`) REFERENCES `stream` (`strm_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `question_assign`
--
ALTER TABLE `question_assign`
  ADD CONSTRAINT `question_assign_ibfk_1` FOREIGN KEY (`qstn_id`) REFERENCES `question` (`qstn_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `question_subjectwise`
--
ALTER TABLE `question_subjectwise`
  ADD CONSTRAINT `question_subjectwise_ibfk_1` FOREIGN KEY (`subj_id`) REFERENCES `subject` (`subj_id`);

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
