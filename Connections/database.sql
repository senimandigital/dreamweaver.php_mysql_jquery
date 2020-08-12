CREATE TABLE `account` (
  `account_id` smallint(5) UNSIGNED NOT NULL,
  `account_referral_id` smallint(5) UNSIGNED DEFAULT '0' COMMENT 'Yang mengarahkan ke website senimandigital',
  `account_presenter_id` smallint(5) UNSIGNED DEFAULT '0' COMMENT 'Yang memperesenteasikan ke website senimandigital',
  `account_username` varchar(64) NOT NULL,
  `account_password` varchar(255) NOT NULL,
  `account_email` varchar(255) NOT NULL,
  `account_handphone` varchar(16) DEFAULT NULL,
  `account_callname` varchar(128) DEFAULT NULL,
  `account_realname` varchar(128) NOT NULL,
  `account_gender` enum('Men','Women') NOT NULL,
  `account_description` tinytext,
  `account_date_of_birth` date DEFAULT NULL,
  `account_date_registration` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `account_date_login` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `account_attributes` text,
  `account_group` enum('administrator','member') NOT NULL DEFAULT 'member'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Data akun anggota';

INSERT INTO `account` (`account_id`, `account_referral_id`, `account_presenter_id`, `account_username`, `account_password`, `account_email`, `account_handphone`, `account_callname`, `account_realname`, `account_gender`, `account_description`, `account_date_of_birth`, `account_date_registration`, `account_date_login`, `account_attributes`, `account_group`) VALUES
(1, 0, 0, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@localhost', NULL, NULL, 'Administrator', 'Men', 's', '1986-04-03', '2020-08-07 20:00:10', '2020-08-07 20:00:10', NULL, 'administrator');

ALTER TABLE `account`
  ADD PRIMARY KEY (`account_id`),
  ADD UNIQUE KEY `account_username` (`account_username`),
  ADD UNIQUE KEY `account_email` (`account_email`),
  ADD UNIQUE KEY `account_handphone` (`account_handphone`),
  ADD UNIQUE KEY `account_callname` (`account_callname`);
