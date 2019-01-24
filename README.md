# school-management-system
Venue booking system for lecture halls. 

DB STRUCTURE::

DATABASE users
TABLE students
fields::
regno, Cohort, name, password, user, tel, email

description::
MariaDB [users]> describe students;
+----------+--------------+------+-----+---------------------+-------+
| Field    | Type         | Null | Key | Default             | Extra |
+----------+--------------+------+-----+---------------------+-------+
| regno    | varchar(15)  | NO   | PRI | COM/00/00           |       |
| Cohort   | varchar(255) | YES  |     | NULL                |       |
| name     | varchar(255) | YES  |     | NULL                |       |
| user     | varchar(10)  | NO   |     | student             |       |
| tel      | varchar(14)  | NO   |     | +254700000000       |       |
| email    | varchar(255) | NO   |     | youremail@gmail.com |       |
| password | varchar(255) | YES  |     | NULL                |       |
+----------+--------------+------+-----+---------------------+-------+

TABLE lecturers
fields::
empno, name, tel, email, password, Course

description::
MariaDB [users]> describe lecturers;
+----------+--------------+------+-----+---------+-------+
| Field    | Type         | Null | Key | Default | Extra |
+----------+--------------+------+-----+---------+-------+
| empno    | varchar(255) | NO   | PRI | NULL    |       |
| name     | varchar(255) | YES  |     | NULL    |       |
| tel      | varchar(14)  | YES  |     | NULL    |       |
| email    | varchar(255) | YES  |     | NULL    |       |
| password | varchar(255) | NO   |     | NULL    |       |
| Course   | varchar(255) | NO   |     | NULL    |       |
+----------+--------------+------+-----+---------+-------+


DATABASE monday......friday

TABLES biological,tech,...etc and
their clone tables.

fields::
Venue, Status Duration, Cohort, Course, Tel, Lec, ID

Description::
MariaDB [monday]> describe biological;
+----------+-----------------------+------+-----+---------+----------------+
| Field    | Type                  | Null | Key | Default | Extra          |
+----------+-----------------------+------+-----+---------+----------------+
| Venue    | varchar(255)          | YES  |     | NULL    |                |
| Status   | enum('free','booked') | YES  |     | NULL    |                |
| Duration | varchar(255)          | YES  |     | NULL    |                |
| Cohort   | varchar(255)          | YES  |     | NULL    |                |
| Course   | varchar(50)           | YES  |     | NULL    |                |
| Tel      | int(15)               | YES  |     | NULL    |                |
| Lec      | varchar(40)           | YES  |     | NULL    |                |
| ID       | int(5)                | NO   | PRI | NULL    | auto_increment |
+----------+-----------------------+------+-----+---------+----------------+

