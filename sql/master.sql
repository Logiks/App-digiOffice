--
-- MySQL 5.5.43
-- Sun, 17 May 2015 10:12:30 +0000
--

CREATE TABLE `addressbook_tbl` (
   `id` int(11) not null auto_increment,
   `title` varchar(10) not null default 'Mr.',
   `full_name` varchar(255) not null,
   `type` varchar(25),
   `tags` varchar(200),
   `email1` varchar(250),
   `email2` varchar(250),
   `phone1` varchar(25),
   `phone2` varchar(25),
   `mobile` varchar(15),
   `mobile_others` varchar(500),
   `fax` varchar(25),
   `im` varchar(55),
   `gender` enum('male','female') not null default 'male',
   `dob` date,
   `doj` date,
   `organization` varchar(200),
   `department` varchar(55),
   `org_category` varchar(155),
   `org_establishment` date,
   `designation` varchar(155),
   `flat_no` varchar(55),
   `address` varchar(200),
   `street` varchar(100),
   `city` varchar(100),
   `state` varchar(100),
   `country` varchar(100),
   `zipcode` varchar(20),
   `geolocation` varchar(255) not null,
   `website` varchar(200),
   `aboutme` varchar(255),
   `avatar` varchar(200),
   `loginid` varchar(55),
   `privilege` varchar(1000) not null default '*',
   `blocked` enum('false','true') not null default 'false',
   `userid` varchar(155),
   `dtoc` datetime not null,
   `dtoe` datetime not null,
   PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


CREATE TABLE `do_calendars` (
   `id` int(10) unsigned not null auto_increment,
   `title` varchar(255) not null,
   `category` varchar(255) not null,
   `srctable` varchar(155) not null,
   `col_title` varchar(155) not null,
   `col_date_start` varchar(155) not null,
   `col_date_end` varchar(155) not null,
   `col_class` varchar(155),
   `col_privilege` varchar(155),
   `col_where` varchar(500),
   `color` varchar(25),
   `lnk_url` varchar(255),
   `lnk_create` varchar(255),
   `params` varchar(1000),
   `editable` enum('false','true') not null default 'false',
   `privilege` varchar(500) default '*',
   `blocked` enum('true','false') default 'false',
   `site` varchar(55) default '*',
   `userid` varchar(255),
   `doc` date,
   `doe` date,
   PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


CREATE TABLE `do_contents` (
   `id` int(10) unsigned not null auto_increment,
   `reflink` varchar(75) not null,
   `title` varchar(255),
   `category` varchar(255),
   `text` text,
   `blocked` enum('true','false') default 'false',
   `site` varchar(100) default '*',
   `userid` varchar(255),
   `doc` date,
   `doe` date,
   PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


CREATE TABLE `do_forms` (
   `id` int(10) unsigned not null auto_increment,
   `title` varchar(255),
   `category` varchar(255),
   `header` varchar(255),
   `footer` varchar(255),
   `frmdata` text,
   `engine` varchar(10) default 'auto',
   `layout` varchar(100) not null default 'plain',
   `style` text,
   `script` text,
   `trigger` varchar(255),
   `def_mode` varchar(20) default 'insert',
   `adapter` varchar(255) default 'db',
   `submit_action` varchar(255) default 'reload',
   `submit_table` varchar(255),
   `submit_wherecol` varchar(255),
   `datatable_table` varchar(255),
   `datatable_cols` text,
   `datatable_where` text,
   `datatable_colnames` text,
   `datatable_hiddenCols` text,
   `datatable_params` text,
   `datatable_model` text,
   `blocked` enum('true','false') default 'false',
   `onmenu` enum('true','false') default 'true',
   `privilege` varchar(500) default '*',
   `privilege_model` varchar(2000) default '*',
   `weight` int(11) default '0',
   `hits` int(11) default '0',
   `site` varchar(55) default '*',
   `userid` varchar(255),
   `doc` date,
   `doe` date,
   PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


CREATE TABLE `do_links` (
   `id` int(10) unsigned not null auto_increment,
   `menuid` varchar(255) not null,
   `title` varchar(255) not null,
   `category` varchar(255),
   `menugroup` varchar(255),
   `class` varchar(255),
   `link` varchar(255) default '#',
   `iconpath` varchar(255),
   `tips` varchar(255),
   `site` varchar(255) default '*',
   `privilege` varchar(500) default '*',
   `blocked` enum('true','false') default 'false',
   `onmenu` enum('true','false') default 'true',
   `target` varchar(55),
   `device` varchar(20) default '*',
   `to_check` varchar(200),
   `weight` int(11) default '0',
   `userid` varchar(155),
   `doc` date,
   `doe` date,
   PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


CREATE TABLE `do_lists` (
   `id` int(10) unsigned not null auto_increment,
   `groupid` varchar(255) not null,
   `title` varchar(255) not null,
   `value` varchar(255),
   `class` varchar(255),
   `site` varchar(255) default '*',
   `privilege` varchar(50) default '*',
   `blocked` varchar(5) default 'false',
   `userid` varchar(255),
   `doc` date,
   `doe` date,
   PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


CREATE TABLE `do_photos` (
   `id` int(11) not null auto_increment,
   `title` varchar(150),
   `image_data` blob,
   `image_type` varchar(255),
   `image_size` varchar(10),
   `thumbnails` blob,
   `remarks` varchar(255),
   `site` varchar(150),
   `userid` varchar(150),
   `doc` date,
   `doe` date,
   PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


CREATE TABLE `do_reports` (
   `id` int(10) unsigned not null auto_increment,
   `title` varchar(255) not null,
   `category` varchar(255),
   `header` varchar(255),
   `footer` varchar(255),
   `engine` varchar(255) not null default 'grid',
   `actionlink` varchar(255),
   `style` text,
   `script` text,
   `datatable_table` varchar(255),
   `datatable_cols` text,
   `datatable_colnames` text,
   `datatable_hiddenCols` text,
   `datatable_where` text,
   `datatable_params` text,
   `datatable_model` text,
   `blocked` enum('true','false') default 'false',
   `onmenu` enum('true','false') default 'true',
   `privilege` varchar(500) default '*',
   `privilege_model` varchar(2000) default '*',
   `weight` int(11) default '0',
   `hits` int(11) default '0',
   `site` varchar(55) default '*',
   `userid` varchar(255),
   `doc` date,
   `doe` date,
   PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


CREATE TABLE `do_rss` (
   `id` int(11) not null auto_increment,
   `rssid` varchar(155) not null,
   `title` varchar(150) not null,
   `category` varchar(255),
   `descs` text not null,
   `language` varchar(25) not null,
   `author` varchar(55) not null,
   `ref_url` varchar(255),
   `datatable_table` varchar(35) not null,
   `datatable_cols` varchar(1000) default '*',
   `datatable_where` varchar(1000) not null,
   `datatable_orderby` varchar(25) not null,
   `attributes` varchar(255),
   `image_link` varchar(55) not null,
   `image_height` int(11) not null default '48',
   `image_width` int(11) not null default '48',
   `avlbl_till` date default '0000-00-00',
   `secure` enum('true','false') default 'false',
   `blocked` enum('true','false') default 'false',
   `site` varchar(55) default '*',
   `userid` varchar(55) not null,
   `doc` date,
   `doe` date,
   PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


CREATE TABLE `do_search` (
   `id` int(10) unsigned not null auto_increment,
   `title` varchar(255) not null,
   `category` varchar(255),
   `engine` varchar(255) not null default 'grid',
   `style` text,
   `script` text,
   `sql_query` text,
   `searchCols` text not null,
   `template` text,
   `images` varchar(255),
   `datalink` varchar(155),
   `checkModule` varchar(55) not null,
   `blocked` enum('true','false') default 'false',
   `privilege` varchar(500) default '*',
   `site` varchar(55) default '*',
   `userid` varchar(155) not null,
   `dtoc` datetime not null,
   `dtoe` datetime not null,
   PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
