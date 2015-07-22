use `yii2basic`;

DROP TABLE  IF EXISTS `authors`;
CREATE TABLE `authors` (
  `id` INT(9) NOT NULL PRIMARY KEY,
  `firstname` CHAR(30) NOT NULL,
  `lastname`  CHAR(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `authors` (`firstname`, `lastname`) VALUES ('Дин', 'Кунц');
INSERT INTO `authors` (`firstname`, `lastname`) VALUES ('Павел', 'Санаев');
INSERT INTO `authors` (`firstname`, `lastname`) VALUES ('Билл', 'Гейтс');

