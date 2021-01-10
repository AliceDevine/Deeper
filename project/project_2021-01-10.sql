# ************************************************************
# Sequel Ace SQL dump
# Version 2092
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: 127.0.0.1 (MySQL 5.7.32)
# Database: project
# Generation Time: 2021-01-10 01:51:04 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table checkin
# ------------------------------------------------------------

DROP TABLE IF EXISTS `checkin`;

CREATE TABLE `checkin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `review` varchar(500) DEFAULT NULL,
  `posted` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

LOCK TABLES `checkin` WRITE;
/*!40000 ALTER TABLE `checkin` DISABLE KEYS */;

INSERT INTO `checkin` (`id`, `product_id`, `name`, `rating`, `review`, `posted`)
VALUES
	(1,1,'John Smith',2,'Not keen on this','2020-11-26 10:13:44'),
	(2,1,'Jane Doe',5,'Love it!','2020-11-26 10:13:44'),
	(3,2,'Jane Smith',4,'It\'s ok, better than gordons','2021-01-05 21:10:27'),
	(4,3,'Jon Mith',4,'LIKE IT','2021-01-08 09:44:37'),
	(5,4,'Testy McTestface',2,'This is nice','2021-01-08 09:45:43'),
	(6,5,'Seven of Nine',5,'I forget I\'m Borg','2021-01-08 09:46:28'),
	(7,4,'test',3,'Meh','2021-01-08 15:48:59'),
	(8,1,'Clegg',3,'tasted nice','2021-01-08 15:51:16'),
	(9,1,'Clegg',3,'tasted nice','2021-01-08 16:07:01'),
	(10,0,'does this',NULL,'work ','2021-01-08 16:16:38'),
	(11,0,'does this',3,'work ','2021-01-08 16:17:33'),
	(12,2,'emily',5,'It was lovely','2021-01-08 16:21:25'),
	(13,3,'emily',5,'This is my favourite gin','2021-01-08 16:26:57'),
	(14,4,'Em',5,'This is lovely, it makes me wish I was snowboarding again','2021-01-08 16:31:16'),
	(15,4,'John',4,'Hmm how I miss snowboarding','2021-01-08 16:35:17'),
	(16,4,'John',4,'Hmm how I miss snowboarding','2021-01-08 16:36:50'),
	(17,4,'does this',2,'work ','2021-01-08 16:37:57'),
	(18,4,'does this',2,'work ','2021-01-08 16:38:05'),
	(19,4,'Emma Parkinson',5,'I love this gin it\'s so smooth and clean, it\'s great just with a good plain tonic, lots of ice and a slice of lemon.','2021-01-09 22:56:12');

/*!40000 ALTER TABLE `checkin` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table product
# ------------------------------------------------------------

DROP TABLE IF EXISTS `product`;

CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `distillery` varchar(45) NOT NULL DEFAULT '',
  `gin` varchar(45) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `blurb` varchar(1000) DEFAULT NULL,
  `serve` varchar(400) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;

INSERT INTO `product` (`id`, `distillery`, `gin`, `image`, `blurb`, `serve`)
VALUES
	(1,'Batch','Signature Gin','images/batch.jpg','<p>From the shadow of Pendle Hill comes a a truly special gin, it’s made using frankincense and myrrh. The two combine to give this tipple a rich and utterly unique flavour profile that no gin lover should pass up the chance to try!</p>\n<p><b>Origin:</b> Burnley, England</p>\n<p><b>Botanicals:</b> Frankincense, Myrrh, Coriander Seeds, Cloves, Orange Peel, Angelica Root, Lemongrass, Cinnamon Bark, Juniper Berries, Allspice Berries, Cardamom, Nutmeg.</p>\n<p><b>Tasting Notes:</b> A fresh burst of juniper is followed by a mix of lovely spices, wrapping their arms around your senses. Tangy liquorice and background notes of clove sit on top of an earthiness that acts as an undertone to the total sum of flavour.  The heat slowly fades to reveal subtle notes of cinnamon, which call you back for more.</p>','FeverTree tonic, garnished with frozen rasberrys and lime peel.'),
	(2,'Tarquins','Cornish Dry','images/tarquins.jpg','<p>Every hand-waxed bottle is still produced with the same care and attention as when Tarquin first started out. Distilled in small batches in four copper pot stills on the wild Cornish coast, this gin is a wonderful modern take on a classic London Dry.</p>\n<p><b>Origin:</b> Cornwall, England</p>\n<p><b>Botanicals:</b> Juniper, coriander seed, liquorice root, angelica root, orris root, green cardamon, cinnamon, bitter almonds, fresh orange, lemon & grapefruit peel, violets.</p>\n<p><b>Tasting Notes:</b> Beautifully smooth and bright. Touch of sherbety sweetness but still classically dry and juniper-led. Big hit of fresh citrus, giving it a full mouth-feel leading on to some gentle spice warmth. Lingering floral complexity at the end.</p>','Premium tonic garnished with a grapefruit wedge and a fresh thyme sprig.'),
	(3,'GŴYR','Rhamanta','images/rhamanta.jpg','<p>Distilled on Wales’ beautiful Gower peninsula, this very special gin features passionate pomegranate and romantic rose among its botanicals, capturing the spirit of true love.</p>\n<p><b>Origin:</b> Gower, Wales</p>\n<p><b>Botanicals:</b> Juniper, coriander, angelica, orris root, fresh pink grapefruit zest, fresh lemon zest, foraged wild fennel, pomegranate seeds and red rose petals.</p>\n<p><b>Tasting Notes:</b> Smooth, elegant and intriguing on the palate, the marriage of fruity pomegranate and floral rose takes centre stage as they are enhanced by a bright burst of citrus. The warm glow of those exotic flavours then continues long into the finish.</p>','Artisan Drinks Co. Pink Citrus Tonic with dried rosebuds and lemon slices to garnish.'),
	(4,'Altitude','Mountain Gin','images/altitude.jpg','<p>Inspired by the Alpine town of Chamonix and the beautiful mountains that surround it.</p>\n<p><b>Origin:</b> Born in Chamonix, France</p>\n<p><b>Botanicals:</b> Juniper, coriander seed, angelica root, sweet orange peel, green cardamom, dried myrtille, pine needle and elderflower.</p>\n<p><b>Tasting Notes:</b> Pine, coriander and citrus combine with the fruity and floral flavours of myrtille and elderflower to produce a clean, delicate blend evocative of alpine meadows.</p>','Tonica Superfine Tassoni with cinnamon sticks and lemon slices to garnish'),
	(5,'Perfume Trees','Hong Kong Gin','images/perfumetree.jpg','<p>This rare craft gin is an aromatic ode to its home city: Hong Kong, the fragrant harbour. Using a botanical worth its weight in gold, white champaca blossom, the team at Perfume Trees have created a gin of remarkable quality. Each sip is a floral feast for the senses!</p>\n<p><b>Origin:</b> Hong Kong</p>\n<p><b>Botanicals:</b> Juniper, white champaca blossom, Longjing green tea, aged tangerine, Chinese angelica, liquorice, sandalwood, coriander seed, orris root, green cardamom, lemon peel, grapefruit peel and cinnamon.</p>\n<p><b>Tasting Notes:</b> The nose is fragrant with the floral and herbal aromas of white champaca blossom and sandalwood. Juniper leads on the palate and is joined by the warm citrus notes of tangerine and east Asian herbs. The finish is a long-lasting cacophony of green tea and angelica.</p>','Pemium Indian tonic water and a slice of tangerines or kumquat.'),
	(6,'Wessex','Alfred the Great Gin','images/wessex.jpg','<p>This magical liquid is distilled in the heart of what was once the historic kingdom of Wessex and is inspired by the flavours of Anglo-Saxon England.</p>\n<p><b>Origin:</b> Sussex, England</p>\n<p><b>Botanicals:</b> Juniper, coriander seed, angelica root, liquorice, sweet orange peel, chervil.</p>\n<p><b>Tasting Notes:</b> Clean, crisp and classic, piney juniper is complemented by herbal chervil and coriander with a bright burst of citrus at the finish.</p>','Premium tonic garnished with apple and juniper berries.');

/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
