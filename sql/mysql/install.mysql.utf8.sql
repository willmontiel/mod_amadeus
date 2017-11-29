CREATE TABLE IF NOT EXISTS `#__amadeus` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`hello` text NOT NULL,
	`lang` varchar(25) NOT NULL,

  PRIMARY KEY (`id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

INSERT INTO `#__helloworld` (`hello`, `lang`) VALUES ('Hello World', 'en-GB');
INSERT INTO `#__helloworld` (`hello`, `lang`) VALUES ('Hola Mundo', 'es-ES');
INSERT INTO `#__helloworld` (`hello`, `lang`) VALUES ('Bonjour tout le monde', 'fr-FR');