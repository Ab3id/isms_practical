-- -------------------------------------------------------------
-- TablePlus 5.3.5(494)
--
-- https://tableplus.com/
--
-- Database: isms_practical
-- Generation Time: 2023-06-07 20:01:07.8250
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


DROP TABLE IF EXISTS `ca_results`;
CREATE TABLE `ca_results` (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_id` varchar(255) DEFAULT NULL,
  `somo` varchar(255) DEFAULT NULL,
  `alama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `id` int NOT NULL AUTO_INCREMENT,
  `jina` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `reg_no` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `ca_results` (`id`, `student_id`, `somo`, `alama`) VALUES
(3, '3', 'SW50ZXJuZXQgUHJvZ3JhbW1pbmcgYW5kIEFwcGxpY2F0aW9ucw==', 'MjA='),
(4, '3', 'T2JqZWN0IE9yaWVudGVkIFByb2dyYW1taW5n', 'MjA='),
(5, '3', 'RGlzdHJpYnV0ZWQgRGF0YWJhc2Vz', 'MjA='),
(6, '3', 'RGlzdHJpYnV0ZWQgQ29tcHV0aW5nIFN5c3RlbXM=', 'MjA='),
(7, '3', 'V2ViIERlc2lnbg==', 'MjA='),
(8, '3', 'UmVzZWFyY2ggTWV0aG9kb2xvZ3k=', 'MjA='),
(9, '3', 'T3BlcmF0aW5nIFN5c3RlbXM=', 'MjA='),
(10, '3', 'V2lyZWxlc3MgQ29tbXVuaWNhdGlvbg==', 'MjA='),
(11, '3', 'RW50cmVwcmVuZXVyc2hpcCA=', 'MjA='),
(12, '3', 'U3lzdGVtcyBBbmFseXNpcyBhbmQgRGVzaWdu', 'MjA='),
(13, '3', 'SW5mb3JtYXRpb24gU2VjdXJpdHk=', 'MjA='),
(14, '3', 'QXJ0aWZpY2lhbCBJbnRlbGxpZ2VuY2U=', 'MjA=');

INSERT INTO `student` (`id`, `jina`, `sex`, `reg_no`) VALUES
(3, 'QUJFSUQgSiBBS0lEQQ==', 'TQ==', 'QkNTXzAwODFfMjAyMA=='),
(4, 'V0lMTElBTSBQIE1CT0dPCQ==', 'TQ==', 'QkNTXzAwMThfMjAyMA==');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;