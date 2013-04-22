--
-- Table structure for table `OPC_Sessions`
--
DROP TABLE IF EXISTS `OPC_Sessions`;
CREATE TABLE `OPC_Sessions` (
  `ID` varchar(32) NOT NULL,
  `last_accessed` int(10) NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `OPC_Settings`
--
DROP TABLE IF EXISTS `OPC_Settings`;
CREATE TABLE `OPC_Settings` (
  `appid` varchar(64) NOT NULL,
  `setting_name` varchar(64) NOT NULL,
  `setting_value` text NOT NULL,
  PRIMARY KEY (`setting_name`,`appid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `OPC_Users`
--
DROP TABLE IF EXISTS `OPC_Users`;
CREATE TABLE `OPC_Users` (
  `username` varchar(32) NOT NULL,
  `password` varchar(136) NOT NULL,
  `level` int(10) NOT NULL DEFAULT '0',
  `name` varchar(128) NOT NULL,
  `surname` varchar(128) NOT NULL,
  `email` varchar(256) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
