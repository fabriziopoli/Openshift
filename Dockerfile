CREATE TABLE `artikel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `anz` int(11) DEFAULT NULL,
  `preis` varchar(255) DEFAULT NULL,
  `bild` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `bestellungen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `benutzer_fk` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `warenkorb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artikel_fk` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `artikel` (`id`, `name`, `anz`, `preis`, `bild`) VALUES
(NULL, 'Pullover', 67, '40.00', 'pullover-1.webp'),
(NULL, 'Rock', 35, '30.00', 'rock.webp'),
(NULL, 'Sweatshirt', 7, '50.00', 'sweatshirt.webp'),
(NULL, 'Sweatshirt', 567, '25.00', 'sweatshirt-1.webp'),
(NULL, 'Kleid', 36, '70.00', 'kleid.webp'),
(NULL, 'T-Shirt', 56, '20.00', 't-shirt.webp'),
(NULL, 'Kleid', 23, '50.00', 'kleid-1.webp');