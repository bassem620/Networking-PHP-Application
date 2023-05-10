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

-- Connections
INSERT INTO `connections` (`user1_id`, `user2_id`, `state`) VALUES 
('1', '4', '1'),
('3', '1', '1'),
('1', '2', '0'),
('3', '4', '0');

-- --------------------------------------------------------

-- User Profile
INSERT INTO `user_skills` (`user_id`, `skill_id`) VALUES 
('1','1'),('2','2'),('1','3'),('2','4'),('1','5'),('2','6'),('1','7'),('2','8'),('1','9'),
('3','1'),('4','2'),('3','3'),('4','4'),('3','5'),('4','6'),('3','7'),('4','8'),('3','9');

INSERT INTO `websites` (`user_id`, `link`, `type`) VALUES
("1", "www.github.com", "Github"),
("1", "www.facebook.com", "Facebook"),
("1", "www.linkedin.com", "LinkedIn"),
("2", "www.github.com", "Github"),
("2", "www.facebook.com", "Facebook"),
("2", "www.linkedin.com", "LinkedIn"),
("3", "www.github.com", "Github"),
("3", "www.facebook.com", "Facebook"),
("3", "www.linkedin.com", "LinkedIn"),
("4", "www.github.com", "Github"),
("4", "www.facebook.com", "Facebook"),
("4", "www.linkedin.com", "LinkedIn");

INSERT INTO `positions` (`user_id`, `title`, `type`, `company`, `location`, `start_date`, `end_date`, `currently_working`, `industry`) VALUES 
('1', 'Full-Stack Developer', 'Developer', "Orange", 'Smart Village', "2018-01-11", '', '1', "Development"),
('1', 'Backend Developer', 'Developer', "TE", 'Smart Village', "2015-01-11", '2018-01-11', '1', "Development"),
('2', 'Full-Stack Developer', 'Developer', "Orange", 'Smart Village', "2018-01-11", '', '1', "Development"),
('2', 'Backend Developer', 'Developer', "TE", 'Smart Village', "2015-01-11", '2018-01-11', '1', "Development"),
('3', 'Full-Stack Developer', 'Developer', "Orange", 'Smart Village', "2018-01-11", '', '1', "Development"),
('3', 'Backend Developer', 'Developer', "TE", 'Smart Village', "2015-01-11", '2018-01-11', '1', "Development"),
('4', 'Full-Stack Developer', 'Developer', "Orange", 'Smart Village', "2018-01-11", '', '1', "Development"),
('4', 'Backend Developer', 'Developer', "TE", 'Smart Village', "2015-01-11", '2018-01-11', '1', "Development");

INSERT INTO `certifications` (`user_id`, `name`, `organization`, `issue_date`, `exp_date`, `cred_id`, `cred_url`) VALUES 
('1', 'React.JS Advanced', 'Udacity', '2017-01-01', '', 'BJWB4D3B4TKJFB5FEK445T', 'WWWW.LINK.COM'),
('1', 'Node.JS Advanced', 'egFWD', '2018-10-01', '', 'BJWB4D3B4TKJFB5FEK445T', 'WWWW.LINK.COM'),
('1', 'Testing', 'Coursera', '2019-09-01', '', 'BJWB4D3B4TKJFB5FEK445T', 'WWWW.LINK.COM'),
('2', 'React.JS Advanced', 'Udacity', '2017-01-01', '', 'BJWB4D3B4TKJFB5FEK445T', 'WWWW.LINK.COM'),
('2', 'Node.JS Advanced', 'egFWD', '2018-10-01', '', 'BJWB4D3B4TKJFB5FEK445T', 'WWWW.LINK.COM'),
('2', 'Testing', 'Coursera', '2019-09-01', '', 'BJWB4D3B4TKJFB5FEK445T', 'WWWW.LINK.COM'),
('3', 'React.JS Advanced', 'Udacity', '2017-01-01', '', 'BJWB4D3B4TKJFB5FEK445T', 'WWWW.LINK.COM'),
('3', 'Node.JS Advanced', 'egFWD', '2018-10-01', '', 'BJWB4D3B4TKJFB5FEK445T', 'WWWW.LINK.COM'),
('3', 'Testing', 'Coursera', '2019-09-01', '', 'BJWB4D3B4TKJFB5FEK445T', 'WWWW.LINK.COM'),
('4', 'React.JS Advanced', 'Udacity', '2017-01-01', '', 'BJWB4D3B4TKJFB5FEK445T', 'WWWW.LINK.COM'),
('4', 'Node.JS Advanced', 'egFWD', '2018-10-01', '', 'BJWB4D3B4TKJFB5FEK445T', 'WWWW.LINK.COM'),
('4', 'Testing', 'Coursera', '2019-09-01', '', 'BJWB4D3B4TKJFB5FEK445T', 'WWWW.LINK.COM');

INSERT INTO `educations` (`user_id`, `school`, `degree`, `field_of_study`, `start_date`, `end_date`, `grade`) VALUES 
('1', 'Helwan Uni', 'Bachelor', 'CS', '2019-09-01', '2021-09-01', "4"),
('1', 'Hollberton', 'Master', 'CS', '2022-09-01', NULL, "3"),
('2', 'Helwan Uni', 'Bachelor', 'CS', '2019-09-01', '2021-09-01', "4"),
('2', 'Hollberton', 'Master', 'CS', '2022-09-01', NULL, "3"),
('3', 'Helwan Uni', 'Bachelor', 'CS', '2019-09-01', '2021-09-01', "4"),
('3', 'Hollberton', 'Master', 'CS', '2022-09-01', NULL, "3"),
('4', 'Helwan Uni', 'Bachelor', 'CS', '2019-09-01', '2021-09-01', "4"),
('4', 'Hollberton', 'Master', 'CS', '2022-09-01', NULL, "3");

-- Courses
INSERT INTO `courses` (`name`, `desc`, `skills`, `hours`, `price`, `url`) VALUES 
('PHP', 'Learn PHP coding language fundamentals and develop dynamic web applications with MySQL integration.', "PHP - HTML - CSS - JS", "12", '1500', 'https://www.youtube.com/embed/xcg9qq6SZ0w'),
('HTML Template', 'Learn HTML basics to create and structure web pages using text, images, links, and forms.', "HTML - CSS", "5", '750', 'https://www.youtube.com/embed/4OGWPn-Q__I'),
('Bootstrap', 'Learn Bootstrap to create responsive web designs with pre-built CSS and JavaScript components for faster and easier web development.', "HTML - CSS - SASS - Bootstrap", '8', '1200', 'https://www.youtube.com/embed/9mdGUKFu5OQ');

-- --------------------------------------------------------

INSERT INTO `courses_users` (`user_id`, `course_id`) VALUES
('1', '1'),('2', '2'),('3', '3'),('4', '1');

-- Groups
INSERT INTO `groups` (`name`, `desc`, `user_id`) VALUES 
('CS', 'computer science community', '1'),
('FCAI', 'computer science community', '2'),
('Machine Learning', 'computer science community', '3'),
('ROI', 'computer science community', '4');

-- --------------------------------------------------------

-- Posts
INSERT INTO `posts` (`user_id`, `group_id`, `desc`) VALUES 
('1', NULL, 'Are you looking to develop dynamic web applications with ease? Look no further than our PHP course! Our comprehensive curriculum covers all the fundamentals of PHP coding language and MySQL integration to help you build robust and scalable web applications. With hands-on training and expert guidance, you will be well on your way to becoming a proficient PHP developer.'),
('2', NULL, 'Attention web developers! If you want to create professional-looking web pages that are easy to navigate and visually appealing, our HTML course is just what you need. Our course covers everything from the basics of HTML syntax to advanced techniques for structuring web pages, inserting multimedia, and creating forms. Join us to develop your skills and build your portfolio!'),
('3', NULL, 'Want to create beautiful and responsive web designs quickly and easily? Look no further than Bootstrap. Our course covers all the essential components of this powerful CSS framework, including grids, forms, and typography. With practical exercises and expert guidance, you will learn how to build responsive and interactive web designs that look great on any device.'),
('4', NULL, 'Are you interested in learning the latest web development technologies and frameworks? Our full-stack web development course covers everything you need to know to build modern web applications from scratch. From front-end technologies like React and Angular to back-end technologies like Node.js and MongoDB, we will help you become a proficient full-stack web developer and launch your career in this exciting field.'),
('1', "1", 'Are you looking to develop dynamic web applications with ease? Look no further than our PHP course! Our comprehensive curriculum covers all the fundamentals of PHP coding language and MySQL integration to help you build robust and scalable web applications. With hands-on training and expert guidance, you will be well on your way to becoming a proficient PHP developer.'),
('2', "2", 'Attention web developers! If you want to create professional-looking web pages that are easy to navigate and visually appealing, our HTML course is just what you need. Our course covers everything from the basics of HTML syntax to advanced techniques for structuring web pages, inserting multimedia, and creating forms. Join us to develop your skills and build your portfolio!'),
('3', "3", 'Want to create beautiful and responsive web designs quickly and easily? Look no further than Bootstrap. Our course covers all the essential components of this powerful CSS framework, including grids, forms, and typography. With practical exercises and expert guidance, you will learn how to build responsive and interactive web designs that look great on any device.'),
('4', "4", 'Are you interested in learning the latest web development technologies and frameworks? Our full-stack web development course covers everything you need to know to build modern web applications from scratch. From front-end technologies like React and Angular to back-end technologies like Node.js and MongoDB, we will help you become a proficient full-stack web developer and launch your career in this exciting field.');

-- Events
INSERT INTO `events` (`title`, `desc`, `date`, `user_id`) VALUES 
('Classic Cars Meet 2023', '"Classic Cars Meet" - A gathering of vintage car enthusiasts showcasing and discussing their prized vehicles.', '2023-11-11', '1'),
('Egypt Career Summit 2023', '"Egypt Career Summit 2023" - A career fair and conference connecting job seekers with employers and industry leaders.', '2023-11-9', '2'),
('RiseUp', '"RiseUp 2023" - A career fair and conference connecting job seekers with employers and industry leaders.', '2023-11-9', '3'),
('RevItUp 2023', '"Racing Event" - A thrilling competition of speed and skill between drivers and their high-performance vehicles.', '2023-11-9', '4');

-- --------------------------------------------------------

-- Going Events
INSERT INTO `events_going` (`user_id`, `event_id`) VALUES 
('1', '2'), ('2', '1'), ('3', '4'), ('4', '3');

-- Jobs
INSERT INTO `jobs` (`title`, `desc`, `req.`, `salary`, `company`, `location`, `creator_id`) VALUES 
('Backend', '"Backend Job" - Developing and maintaining server-side applications, databases, and APIs to power web and mobile applications.', 'Node.JS - Express.js - MongoDB', '15800', 'Orange', 'Smart Village', '1'),
('Full Stack', '"Full Stack - MERN Job" - Developing and maintaining server-side applications, databases, and APIs to power web and mobile applications.', 'React.JS - Node.JS - Express.js - MongoDB', '15800', 'Orange', 'Smart Village', '2'),
('Frontend', '"Frontend Job" - Developing and maintaining server-side applications, databases, and APIs to power web and mobile applications.', 'React.JS, Node.JS', '15800', 'Orange', 'Smart Village', '3'),
('Middlewares - Integration', '"DevOps Job" - Developing and maintaining server-side applications, databases, and APIs to power web and mobile applications.', 'Node.JS - Express.js - MongoDB', '15800', 'Orange', 'Smart Village', '4');