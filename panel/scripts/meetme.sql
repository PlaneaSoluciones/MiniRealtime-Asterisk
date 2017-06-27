CREATE TABLE `meetme` (
  `confno` varchar(80) NOT NULL default '0',
  `username` varchar(64) NOT NULL default '',
  `domain` varchar(128) NOT NULL default '',
  `pin` varchar(20) default NULL,
  `adminpin` varchar(20) default NULL,
  `members` int(11) NOT NULL default '0',
  PRIMARY KEY  (`confno`)
  ) ENGINE=MyISAM DEFAULT CHARSET=latin1;

  INSERT INTO `meetme` (`confno`,`username`,`domain`,`pin`,`adminpin`,`members`)
   VALUES
   ('3001','','','5555','4444',0);
