--
-- Table structure for table `OPC_Sessions`
--
DROP TABLE IF EXISTS OPC_Sessions;
CREATE TABLE OPC_Sessions (
  ID varchar(32) NOT NULL,
  lastAccessed int(10) NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY (ID)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `OPC_Settings`
--
DROP TABLE IF EXISTS OPC_Settings;
CREATE TABLE OPC_Settings (
  `name` varchar(64) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Data for table `OPC_Settings`
--
INSERT INTO `OPC_Settings` (`name`, `value`) VALUES
('base_url', 'https://192.168.2.210/openphpcms/');
