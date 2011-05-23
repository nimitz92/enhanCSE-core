CREATE TABLE IF NOT EXISTS `users` (
  `uid` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`uid`)
);

CREATE TABLE IF NOT EXISTS `sessions` (
  `sessionid` char(32) NOT NULL,
  `uid` bigint(20) NOT NULL,
  `time` bigint(20) NOT NULL,
  `expiry` bigint(20) NOT NULL,
  PRIMARY KEY (`sessionid`)
);

CREATE TABLE IF NOT EXISTS `groups` (
  `gid` bigint(20) NOT NULL AUTO_INCREMENT,
  `gname` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  PRIMARY KEY (`gid`)
);

CREATE TABLE IF NOT EXISTS `members` (
  `gid` bigint(20) NOT NULL,
  `member` bigint(20) NOT NULL,
  UNIQUE KEY `gid` (`gid`,`member`),
  KEY `gid_2` (`gid`)
);

CREATE TABLE IF NOT EXISTS `logs` (
  `lid` bigint(20) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `time` bigint(20) NOT NULL,
  PRIMARY KEY (`lid`)
);

CREATE TABLE IF NOT EXISTS `remarks` (
  `rkid` bigint(20) NOT NULL AUTO_INCREMENT,
  `uid` bigint(20) NOT NULL,
  `comment` text NOT NULL,
  `rating` int(11) NOT NULL,
  PRIMARY KEY (`rkid`)
);

CREATE TABLE IF NOT EXISTS `privileges` (
  `type` bigint(20) NOT NULL,
  `uid` bigint(20) NOT NULL,
  UNIQUE KEY `type` (`type`,`uid`)
);

