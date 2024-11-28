DROP TABLE IF EXISTS `produtos`;
CREATE TABLE `produtos` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
   `nome` varchar(100) NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `estoque` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;