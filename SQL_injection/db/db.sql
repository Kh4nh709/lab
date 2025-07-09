CREATE DATABASE IF NOT EXISTS user;

GRANT SELECT, INSERT, UPDATE, CREATE ON *.* TO 'db_user'@'%';
FLUSH PRIVILEGES;
USE user;
ALTER DATABASE user CHARACTER SET utf8 COLLATE utf8_general_ci;

DROP TABLE IF EXISTS `users`;
DROP TABLE IF EXISTS `blogs`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `blogs`(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `flag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `flag` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `tracking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trackingID` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO users (id,username,password) VALUES (1,'admin','admin');
INSERT INTO tracking (id,trackingID) VALUES (1,'awfnkajawhfiua');

INSERT INTO blogs (id,title,author,url) VALUES (1,'SQL_injection','Khanh709','blogs/blog1/blog1.html');
INSERT INTO blogs (id,title,author,url) VALUES (2,'Path_Traversal','Khanh709','blogs/blog2/blog2.html');
INSERT INTO blogs (id,title,author,url) VALUES (3,'XSS','Khanh709','blogs/blog3/blog3.html');


INSERT INTO flag (id,flag) VALUES (1,'flag{SQL_injection_challenge_1_success}');
INSERT INTO flag (id,flag) VALUES (2,'flag{SQL_injection_challenge_2_passed}');
INSERT INTO flag (id,flag) VALUES (3,'flag{SQL_injection_challenge_3_very_easy}');
INSERT INTO flag (id,flag) VALUES (4,'flag{SQL_injection_challenge_4_so_easy}');
INSERT INTO flag (id,flag) VALUES (5,'flag{SQL_injection_challenge_5_simple}');
INSERT INTO flag (id,flag) VALUES (6,'flag{SQL_injection_challenge_6_kjahfwkla}');
INSERT INTO flag (id,flag) VALUES (7,'flag{SQL_injection_challenge_7_uighweuity7823uihsk}');
INSERT INTO flag (id,flag) VALUES (8,'flag{SQL_injection_challenge_8_f48w79fhnujiklhs789fv}');
INSERT INTO flag (id,flag) VALUES (9,'flag{SQL_injection_challenge_9_up4utpowijlkfj9823t}');
INSERT INTO flag (id,flag) VALUES (10,'flag{SQL_injection_challenge_10_i4538yuhsdnflkug8934}');

