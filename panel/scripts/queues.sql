CREATE TABLE `queues` (
 `name` varchar(128) NOT NULL,
 `musiconhold` varchar(128) default NULL,
 `announce` varchar(128) default NULL,
 `context` varchar(128) default NULL,
 `timeout` int(11) default NULL,
 `monitor_join` tinyint(1) default NULL,
 `monitor_format` varchar(128) default NULL,
 `queue_youarenext` varchar(128) default NULL,
 `queue_thereare` varchar(128) default NULL,
 `queue_callswaiting` varchar(128) default NULL,
 `queue_holdtime` varchar(128) default NULL,
 `queue_minutes` varchar(128) default NULL,
 `queue_seconds` varchar(128) default NULL,
 `queue_lessthan` varchar(128) default NULL,
 `queue_thankyou` varchar(128) default NULL,
 `queue_reporthold` varchar(128) default NULL,
 `announce_frequency` int(11) default NULL,
 `announce_round_seconds` int(11) default NULL,
 `announce_holdtime` varchar(128) default NULL,
 `retry` int(11) default NULL,
 `wrapuptime` int(11) default NULL,
 `maxlen` int(11) default NULL,
 `servicelevel` int(11) default NULL,
 `strategy` varchar(128) default NULL,
 `joinempty` varchar(128) default NULL,
 `leavewhenempty` varchar(128) default NULL,
 `eventmemberstatus` tinyint(1) default NULL,
 `eventwhencalled` tinyint(1) default NULL,
 `reportholdtime` tinyint(1) default NULL,
 `memberdelay` int(11) default NULL,
 `weight` int(11) default NULL,
 `timeoutrestart` tinyint(1) default NULL,
 `periodic_announce` varchar(50) default NULL,
 `periodic_announce_frequency` int(11) default NULL,
 `ringinuse` tinyint(1) default NULL,
 `setinterfacevar` tinyint(1) default NULL,
 PRIMARY KEY  (`name`)
 ) ENGINE=MyISAM DEFAULT CHARSET=latin1;

 
