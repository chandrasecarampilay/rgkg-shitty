use `yii2basic`;

DROP TABLE  IF EXISTS `books`;
CREATE TABLE `books` (
  `id`  INT(9) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name`  CHAR(200) NOT NULL,
  `date_create`  DATETIME NOT NULL DEFAULT NOW(),   -- the date the book record has been created
  `date_update`  DATETIME NOT NULL DEFAULT NOW(),   -- the date the book record has been modified
  `preview`  CHAR(200) DEFAULT NULL,
  `date`  DATE NOT NULL DEFAULT 19700101,           -- the date the book has been published
  `author_id`  int(9),
  FOREIGN KEY (`author_id`)
    REFERENCES `authors` (`id`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  INDEX `name` (`name`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `books` (`name`, `author_id`, `date`) VALUES ('Фантомы', '1', '1983-01-01');
INSERT INTO `books` (`name`, `author_id`, `date`) VALUES ('Бизнес со скоростью мысли', '3', '2000-01-01');
INSERT INTO `books` (`name`, `author_id`, `date`) VALUES ('Похороните меня за плинтусом', '2', '1996-01-01');
INSERT INTO `books` (`name`, `author_id`, `date`) VALUES ('The Martian Chronicles', '4', '1950-01-01');

