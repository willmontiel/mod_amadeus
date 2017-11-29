CREATE TABLE IF NOT EXISTS `#__amadeus` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`iata_code` varchar(10) NOT NULL,
	`city_code` varchar(10) NOT NULL,
    `city_name` varchar(80) NOT NULL,
    `country_code` varchar(10) NOT NULL,
    `country_name` varchar(80) NOT NULL,
    `nbr_of_airport_codes` varchar(10) NOT NULL,
    `airport_code` varchar(10) NOT NULL,

  PRIMARY KEY (`id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

INSERT INTO `#__amadeus` (`iata_code`, `city_code`, `city_name`, `country_code`, `country_name`, `nbr_of_airport_codes`, `airport_code`) VALUES ('AAA', 'AAA', 'ANAA', 'PF', 'French Polynesia', '1', 'AAA');