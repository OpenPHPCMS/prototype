-- --------------------------------------------------------
--
-- Table structure for table `OPC_Pages`
--
DROP TABLE IF EXISTS `OPC_Pages`;
CREATE TABLE `OPC_Pages` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `title` varchar(128) NOT NULL,
  `type` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
-- --------------------------------------------------------
--
-- Table structure for table `OPC_Page_content`
--
DROP TABLE IF EXISTS `OPC_Page_content`;
CREATE TABLE `OPC_Page_content` (
  `page_id` int(10) NOT NULL,
  `name` varchar(32) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`page_id`,`name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
-- --------------------------------------------------------
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
-- --------------------------------------------------------
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
-- Ddata for table `OPC_Settings`
--
INSERT INTO `OPC_Settings` (`appid`, `setting_name`, `setting_value`) VALUES
('core', 'base_url', 'http://openphpcms,org'),
('core', 'slogan', ''),
('core', 'title', 'Open PHP CMS'),
('core', 'description', ''),
('core', 'title_format', '[title]-[page]'),
('core', 'admin_email', '');

-- --------------------------------------------------------
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

--
-- Data for table `OPC_Users`
--
INSERT INTO `OPC_Users` (`username`, `password`, `level`, `name`, `surname`, `email`, `create_date`) VALUES
('Admin', '861ef23e2b79e42d8c2a8dde30add3ab8632b2bdacc6ca42f275d97ad231935f449315581fea5a4f70b35ce6a533f752b03be2174ff4386da0f009ce66a9d16df0084ff7', 3, 'Admin', 'Admin', 'Admin', '2013-04-22 18:47:11'),
('User', '861ef23e2b79e42d8c2a8dde30add3ab8632b2bdacc6ca42f275d97ad231935f449315581fea5a4f70b35ce6a533f752b03be2174ff4386da0f009ce66a9d16df0084ff7', 1, 'user', 'user', 'user', '2013-04-22 22:40:09'),
('Dev', '861ef23e2b79e42d8c2a8dde30add3ab8632b2bdacc6ca42f275d97ad231935f449315581fea5a4f70b35ce6a533f752b03be2174ff4386da0f009ce66a9d16df0084ff7', 2, 'dev', 'dev', 'dev', '2013-04-22 22:40:09');