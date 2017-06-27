CREATE TABLE `extensions` (
 `id` int(11) NOT NULL auto_increment,
 `context` varchar(20) NOT NULL default '',
 `exten` varchar(20) NOT NULL default '',
 `priority` tinyint(4) NOT NULL default '0',
 `app` varchar(20) NOT NULL default '',
 `appdata` varchar(128) NOT NULL default '',
 PRIMARY KEY  (`context`,`exten`,`priority`),
 KEY `id` (`id`)
 ) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;


 insert  into `extensions`(`context`,`exten`,`priority`,`app`,`appdata`)
  values
  ('internas','_XXX',1,'Dial','SIP/${EXTEN}|30'),
  ('internas','_XXX',2,'VoiceMail','${EXTEN}@internas'),
  ('internas','_XXX',3,'Hangup',''),
  ('internas','_9X.',1,'Dial','SIP/${EXTEN:1}@deltathree'),
  ('internas','_*0',1,'VoiceMailMain','${CALLERID(num)}@internas'),
  ('internas','12127777777',1,'Queue','my_queue'),
  ('internas','12129999999',1,'MeetMe','my_conf');
