CREATE TABLE `queue_members` (
 `uniqueid` int(10) unsigned NOT NULL auto_increment,
 `membername` varchar(40) default NULL,
 `queue_name` varchar(128) default NULL,
 `interface` varchar(128) default NULL,
 `penalty` int(11) default NULL,
 `paused` int(11) default NULL,
 PRIMARY KEY  (`uniqueid`),
 UNIQUE KEY `queue_interface` (`queue_name`,`interface`)
 ) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;
