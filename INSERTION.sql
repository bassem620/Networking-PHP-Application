-- Skills
INSERT INTO skills (`name`) VALUES 
('Java'),
('Python'),
('C++'),
('JavaScript'),
('SQL'),
('Algorithms'),
('Ruby'),
('PHP'),
('Kotlin');

-- Users
INSERT INTO users (`firstName`, `lastName`, `email`, `password`, `birthday`, `phone`, `profile_type`, `about`, `open_to`) VALUES 
('Premium', 'One', 'premium1@gmail.com', 'test', '11-09-2002', '1281441143', 1, '', 'Work'),
('Premium', 'Two', 'premium2@gmail.com', 'test', '03-12-2002', '1119697361', 1, '', 'Hiring'),
('Free', 'One', 'free1@gmail.com', 'test', '12-09-2003', '1281441143', 0, '', 'Work'),
('Free', 'One', 'free2@gmail.com', 'test', '10-05-2001', '1119697361', 0, '', 'Hiring');

-- --------------------------------------------------------

-- User Premium
INSERT INTO `premium` (`user_id`, `start_date`, `exp_date`) VALUES
(1, '2023-05-01', '2023-06-01'),
(2, '2023-05-05', '2023-06-05');

-- --------------------------------------------------------

-- User Skills
INSERT INTO `user_skills` (`user_id`, `skill_id`) VALUES 
('1','1'),('2','2'),('1','3'),('2','4'),('1','5'),('2','6'),('1','7'),('2','8'),('1','9'),
('3','1'),('4','2'),('3','3'),('4','4'),('3','5'),('4','6'),('3','7'),('4','8'),('3','9');
