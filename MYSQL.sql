CREATE TABLE `users` (
  `id` int AUTO_INCREMENT NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) UNIQUE NOT NULL,
  `password` varchar(100) NOT NULL,
  `birthday` date,
  `phone` varchar(10),
  `profile_type` int NOT NULL,
  `about` varchar(300),
  `open_to` varchar(10),
  PRIMARY KEY (`Id`)
);

CREATE TABLE `premium`(
  `user_id` int NOT NULL,
  `start_date` date NOT NULL,
  `exp_date` date NOT NULL,
  PRIMARY KEY (`user_id`),
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE `websites` (
  `id` int AUTO_INCREMENT NOT NULL,
  `user_id` int NOT NULL,
  `link` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE `educations` (
  `id` int AUTO_INCREMENT NOT NULL,
  `user_id` int NOT NULL,
  `school` varchar(50) NOT NULL,
  `degree` varchar(50) NOT NULL,
  `field of study` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date,
  `grade` varchar(50),
  PRIMARY KEY (`id`),
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE `positions` (
  `id` int AUTO_INCREMENT NOT NULL,
  `user_id` int NOT NULL,
  `title` varchar(50) NOT NULL,
  `type` varchar(50),
  `company` varchar(50) NOT NULL,
  `location` varchar(100),
  `start_date` date NOT NULL,
  `end_date` date,
  `currently_working` boolean DEFAULT 1 NOT NULL,
  `industry` varchar(50),
  PRIMARY KEY (`id`),
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE `certifications` (
  `id` int AUTO_INCREMENT NOT NULL,
  `user_id` int  NOT NULL,
  `name` varchar(50)  NOT NULL,
  `organization` varchar(50),
  `issue_date` date  NOT NULL,
  `exp_date` date,
  `cred_id` varchar(50)  NOT NULL,
  `cred_url` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE `messege` (
  `id` int AUTO_INCREMENT NOT NULL,
  `sender_id` int  NOT NULL,
  `receiver_id` int  NOT NULL,
  `messege` varchar(100)  NOT NULL,
  `date_time` datetime  NOT NULL,
  PRIMARY KEY (`id`, `sender_id`, `receiver_id`),
  FOREIGN KEY (sender_id) REFERENCES users(id) ON DELETE CASCADE,
  FOREIGN KEY (receiver_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE `following` (
  `user1_id` int,
  `user2_id` int,
  PRIMARY KEY (`user1_id`, `user2_id`),
  FOREIGN KEY (user1_id) REFERENCES users(id) ON DELETE CASCADE,
  FOREIGN KEY (user2_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE `connections` (
  `user1_id` int,
  `user2_id` int,
  `state` boolean DEFAULT 0,
  PRIMARY KEY (`user1_id`, `user2_id`),
  FOREIGN KEY (user1_id) REFERENCES users(id) ON DELETE CASCADE,
  FOREIGN KEY (user2_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE `skills` (
  `id` int AUTO_INCREMENT NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `user_skills` (
  `user_id` int NOT NULL,
  `skill_id` int  NOT NULL,
  PRIMARY KEY (`user_id`, `skill_id`),
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
  FOREIGN KEY (skill_id) REFERENCES skills(id) ON DELETE CASCADE
);

CREATE TABLE `cert_skills` (
  `skill_id` int NOT NULL,
  `cert_id` int NOT NULL,
  PRIMARY KEY (`skill_id`, `cert_id`),
  FOREIGN KEY (skill_id) REFERENCES skills(id) ON DELETE CASCADE,
  FOREIGN KEY (cert_id) REFERENCES certifications(id) ON DELETE CASCADE
);

CREATE TABLE `endorses` (
  `user1_id` int NOT NULL,
  `user2_id` int NOT NULL,
  `skill_id` int NOT NULL,
  PRIMARY KEY (`user1_id`, `user2_id`, `skill_id`),
  FOREIGN KEY (user1_id) REFERENCES users(id) ON DELETE CASCADE,
  FOREIGN KEY (user2_id) REFERENCES users(id) ON DELETE CASCADE,
  FOREIGN KEY (skill_id) REFERENCES skills(id) ON DELETE CASCADE
);

CREATE TABLE `jobs` (
  `id` int AUTO_INCREMENT NOT NULL,
  `title` varchar(100) NOT NULL,
  `desc` varchar(100)  NOT NULL,
  `req.` varchar(100),
  `salary` int,
  `company` varchar(50),
  `location` varchar(50),
  `creator_id` int  NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (creator_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE `applied_jobs` (
  `user_id` int,
  `job_id` int,
  PRIMARY KEY (`user_id`, `job_id`),
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
  FOREIGN KEY (job_id) REFERENCES jobs(id) ON DELETE CASCADE
);

CREATE TABLE `groups` (
  `id` int AUTO_INCREMENT NOT NULL,
  `name` varchar(50),
  `desc` varchar(150),
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY(user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE `joined_groups` (
  `user_id` int,
  `group_id` int,
  PRIMARY KEY (`user_id`, `group_id`),
  FOREIGN KEY(user_id) REFERENCES users(id) ON DELETE CASCADE,
  FOREIGN KEY(group_id) REFERENCES groups(id) ON DELETE CASCADE
);

CREATE TABLE `events` (
  `id` int AUTO_INCREMENT not null,
  `title` varchar(50) not null,
  `desc` varchar(200),
  `date` datetime not null,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY(user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE `events_Going` (
  `user_id` int,
  `event_id` int,
  PRIMARY KEY (`user_id`, `event_id`),
  foreign key(user_id) references users(id) ON DELETE CASCADE,
  foreign key(event_id) references `events`(id) ON DELETE CASCADE
);

CREATE TABLE `posts` (
  `id` int auto_increment not null,
  `user_id` int not null,
  `group_id` int,
  `desc` varchar(1000) ,
  PRIMARY KEY (`id`),
  foreign key(group_id) references `groups`(id) ON DELETE CASCADE
);

CREATE TABLE `post_comments` (
  `post_id` int NOT NULL,
  `user_id` int NOT NULL,
  `comment`  varchar(200) NOT NULL,
  foreign key (post_id) references posts(id) ON DELETE CASCADE,
  foreign key(user_id) references users(id) ON DELETE CASCADE
);

CREATE TABLE `post_Likes` (
  `post_id` int NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`post_id`, `user_id`),
  foreign key(user_id) references users(id) ON DELETE CASCADE,
  foreign key(post_id) references posts(id) ON DELETE CASCADE
);

CREATE TABLE `courses` (
  `course_id` int auto_increment not null,
  `name` varchar(50),
  `desc` varchar(100),
  `skills` varchar(100),
  `hours` int,
  `price` int NOT NULL,
  `url` varchar(300),
  PRIMARY KEY (`course_id`)
);

CREATE TABLE `quizzes` (
  `course_quiz_id` int auto_increment not null,
  `name` varchar(50) not null,
  `url` varchar(100) not null,
  PRIMARY KEY (`course_quiz_id`)
);

CREATE TABLE `course_quiz` (
  `course_id` int not null,
  `quiz_id` int not null,
  PRIMARY KEY (`course_id`, `quiz_id`),
  foreign key(course_id) references courses(course_id) ON DELETE CASCADE,
  foreign key(quiz_id) references quizzes(course_quiz_id) ON DELETE CASCADE
);

CREATE TABLE `courses_users` (
  `course_id` int not null,
  `user_id` int not null,
  PRIMARY KEY (`course_id`, `user_id`),
  foreign key(course_id) references courses(course_id) ON DELETE CASCADE,
  foreign key(user_id) references users(id) ON DELETE CASCADE
);

CREATE TABLE `review_courses` (
  `user_id` int not null,
  `course_id` int not null,
  `review` decimal(1,1) not null,
  PRIMARY KEY (`user_id`, `course_id`),
  foreign key(course_id) references courses(course_id) ON DELETE CASCADE,
  foreign key(user_id) references users(id) ON DELETE CASCADE
);

CREATE TABLE `saved_courses` (
  `user_id` int not null,
  `course_id` int not null,
  PRIMARY KEY (`user_id`, `course_id`),
  foreign key(course_id) references courses(course_id) ON DELETE CASCADE,
  foreign key(user_id) references users(id) ON DELETE CASCADE
);