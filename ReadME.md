 CREATE TABLE `timetable` (
  `timetable_id` int(11) NOT NULL AUTO_INCREMENT,
  `status` enum('booked','free') DEFAULT NULL,
  `venue_id` varchar(15) DEFAULT NULL,
  `school` varchar(255) DEFAULT NULL,
  `day_of_week` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `cohort` varchar(255) DEFAULT NULL,
  `course_code` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`timetable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 



CREATE TABLE `course` (
  `cohort` varchar(255) DEFAULT NULL,
  `course_code` varchar(10) NOT NULL,
  `course_title` varchar(255) DEFAULT NULL,
  `lecturers` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `contact` int(11) DEFAULT NULL,
  PRIMARY KEY (`course_code`)
)


CREATE TABLE `contactus` (
  `contactus_id` int(11) NOT NULL AUTO_INCREMENT,
  `time` time DEFAULT NULL,
  `date` date DEFAULT NULL,
  `reg_no` varchar(15) DEFAULT NULL,
  `phone_number` varchar(13) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `message` text,
  `response` text,
  PRIMARY KEY (`contactus_id`)
)


CREATE TABLE `cohort` (
  `cohort` varchar(255) DEFAULT NULL,
  `reg_no` varchar(15) NOT NULL,
  `no_of_students` int(11) DEFAULT NULL,
  `courses_enrolled` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`reg_no`),
  CONSTRAINT `cohort_ibfk_1` FOREIGN KEY (`reg_no`) REFERENCES `classrep` (`reg_no`)
) 




 CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `venue_id` varchar(255) DEFAULT NULL,
  `time` time DEFAULT NULL,
  `date` date DEFAULT NULL,
  `transaction_type` enum('book','release') DEFAULT NULL,
  `reg_no` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 



CREATE TABLE `venue` (
  `venue_id` varchar(15) NOT NULL,
  `venue_image` varchar(100) DEFAULT NULL,
  `building` varchar(255) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `facilities` text,
  PRIMARY KEY (`venue_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4



describe view_timetable;
+--------------+-----------------------+------+-----+---------+-------+
| Field        | Type                  | Null | Key | Default | Extra |
+--------------+-----------------------+------+-----+---------+-------+
| timetable_id | int(11)               | NO   |     | 0       |       |
| status       | enum('booked','free') | YES  |     | NULL    |       |
| venue_id     | varchar(15)           | YES  |     | NULL    |       |
| school       | varchar(255)          | YES  |     | NULL    |       |
| day_of_week  | varchar(255)          | YES  |     | NULL    |       |
| duration     | varchar(255)          | YES  |     | NULL    |       |
| cohort       | varchar(255)          | YES  |     | NULL    |       |
| course_code  | varchar(10)           | YES  |     | NULL    |       |
| capacity     | int(11)               | YES  |     | NULL    |  


CREATE TABLE `classrep` (
  `reg_no` varchar(15) NOT NULL,
  `cohort` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(13) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`reg_no`)
) 




+------------------------------------------+
| Tables_in_school_venue_management_system |
+------------------------------------------+
| classrep                                 |
| cohort                                   |
| contactus                                |
| course                                   |
| timetable                                |
| transaction                              |
| venue                                    |
| view_timetable                           |
+------------------------------------------+





