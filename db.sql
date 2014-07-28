CREATE TABLE series (
id_serie int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
nom_serie varchar(25) CHARACTER SET UTF8 COLLATE utf8_general_ci NOT NULL,
link_preview_serie varchar(75) NOT NULL,
position_serie int(11) UNSIGNED,
CONSTRAINT pk_series PRIMARY KEY(id_serie),
INDEX (nom_serie))
engine=innodb CHARACTER SET UTF8 COLLATE utf8_unicode_ci;


CREATE TABLE images (
id_image int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
nom_serie varchar(25) CHARACTER SET UTF8 COLLATE utf8_general_ci NOT NULL,
link_image varchar(75) NOT NULL,
link_thumbnail varchar(75) NOT NULL,
description_image varchar(255),
CONSTRAINT pk_images PRIMARY KEY(id_image),
INDEX(nom_serie),
CONSTRAINT fk_images_nom_serie FOREIGN KEY(nom_serie) REFERENCES series(nom_serie) ON DELETE CASCADE ON UPDATE CASCADE)
engine=innodb CHARACTER SET UTF8 COLLATE utf8_unicode_ci;

CREATE TABLE informations (
id_info int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
titre_info varchar(25) NOT NULL,
texte_libre_info varchar(50000),
CONSTRAINT pk_info PRIMARY KEY(id_info))
engine=innodb CHARACTER SET UTF8 COLLATE utf8_unicode_ci;;

CREATE TABLE textes (
id_texte int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
titre_texte varchar(25) NOT NULL,
texte_libre varchar(50000),
date_texte timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
CONSTRAINT pk_textes PRIMARY KEY(id_texte))
engine=innodb CHARACTER SET UTF8 COLLATE utf8_unicode_ci;;

INSERT INTO informations VALUES ('1','contact','');
INSERT INTO informations VALUES ('2','links','');