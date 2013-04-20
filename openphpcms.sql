--
-- Table structure for table `OPC_Settings`
--

CREATE TABLE IF NOT EXISTS `OPC_Settings` (
  `name` varchar(64) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`name`)
);

--
-- Dumping data for table `OPC_Settings`
--

INSERT INTO `OPC_Settings` (`name`, `value`) VALUES
('base_url', 'https://192.168.2.210/openphpcms/');
