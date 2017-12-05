CREATE TABLE IF NOT EXISTS `#__amadeus` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`airport_name` varchar(80) NOT NULL,
  `city_name` varchar(80) NOT NULL,
  `country_name` varchar(80) NOT NULL,
  `airport_code` varchar(10) NOT NULL,

  PRIMARY KEY (`id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

INSERT INTO `#__amadeus` (`airport_name`, `city_name`, `country_name`, `airport_code`) VALUES ('AAA', 'AAA', 'ANAA', 'PF', 'French Polynesia', '1', 'AAA');

