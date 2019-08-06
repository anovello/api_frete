-- --------------------------------------------------------
-- Servidor:                     localhost
-- Versão do servidor:           10.3.16-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              10.2.0.5668
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando dados para a tabela truckpad.frete: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `frete` DISABLE KEYS */;
INSERT INTO `frete` (`id`, `motorista_id`, `veiculo_id`, `lat_origem`, `lng_origem`, `cidade_origem`, `estado_origem`, `lat_destino`, `lng_destino`, `cidade_destino`, `estado_destino`, `tempo`, `distancia`, `frete_id_ida`, `data`) VALUES
	(4, 11, 2, -23.618, -46.6439, 'SãO PAULO', 'SP', -22.9733, -49.8568, 'OURINHOS', 'SP', 300, 375, 0, '2019-07-06'),
	(5, 11, 2, -23.618, -46.6439, 'OURINHOS', 'SP', -22.9733, -49.8568, 'SãO PAULO', 'SP', 300, 375, 4, '2019-08-05'),
	(6, 11, 2, -23.618, -46.6439, 'OURINHOS', 'SP', -22.9733, -49.8568, 'SãO PAULO', 'SP', 300, 375, 0, '2019-08-05'),
	(7, 11, 2, -23.618, -46.6439, 'OURINHOS', 'SP', -22.9733, -49.8568, 'SãO PAULO', 'SP', 300, 375, 0, '2019-08-05'),
	(8, 11, 2, -23.618, -46.6439, 'SãO PAULO', 'SP', -22.9733, -49.8568, 'OURINHOS', 'SP', 300, 375, 7, '2019-08-05'),
	(9, 81, 3, -23.618, -46.6439, 'SãO PAULO', 'SP', -22.9733, -49.8568, 'RIO DE JANEIRO', 'SP', 300, 375, 0, '2019-08-05'),
	(10, 100, 3, -23.618, -46.6439, 'SãO PAULO', 'SP', -22.9733, -49.8568, 'RIO DE JANEIRO', 'SP', 300, 375, 0, '2019-08-05'),
	(11, 100, 3, -23.618, -46.6439, 'SãO PAULO', 'SP', -22.9733, -49.8568, 'RIO DE JANEIRO', 'SP', 300, 375, 0, '2019-08-06'),
	(12, 100, 3, -23.618, -46.6439, 'SãO PAULO', 'SP', -22.9733, -49.8568, 'OURINHOS', 'SP', 300, 375, 0, '2019-08-06');
/*!40000 ALTER TABLE `frete` ENABLE KEYS */;

-- Copiando dados para a tabela truckpad.motorista: ~52 rows (aproximadamente)
/*!40000 ALTER TABLE `motorista` DISABLE KEYS */;
INSERT INTO `motorista` (`id`, `nome`, `data_nascimento`, `sexo`, `tipo_cnh`, `cpf`) VALUES
	(7, 'Pedro teste', '1980-08-08', 'm', 'E', '76471883803'),
	(11, 'Angelo Augusto Novello', '1992-08-08', 'm', 'E', '40289288851'),
	(62, 'Brendan', '1970-12-14', 'm', 'E', '66632374468'),
	(63, 'Dante', '1971-04-23', 'm', 'E', '42421659787'),
	(64, 'Nicholas', '1972-01-12', 'm', 'E', '87126921586'),
	(65, 'Mufutau', '1972-02-23', 'm', 'E', '80225232405'),
	(66, 'Stephen', '1973-05-08', 'm', 'E', '42113934485'),
	(67, 'Elijah', '1974-05-29', 'm', 'E', '57564691174'),
	(68, 'Drake', '1978-09-19', 'm', 'E', '52517558302'),
	(69, 'Dolan', '1978-08-04', 'm', 'E', '87585216408'),
	(70, 'Keegan', '1975-09-10', 'm', 'E', '34834711706'),
	(71, 'Sawyer', '1976-09-24', 'm', 'E', '86385706273'),
	(72, 'Chester', '1977-01-29', 'm', 'E', '14587014338'),
	(73, 'Solomon', '1978-02-18', 'm', 'E', '40423015257'),
	(74, 'Calvin', '1979-01-06', 'm', 'E', '55722316300'),
	(75, 'Carlos', '1980-08-22', 'm', 'E', '18268636300'),
	(76, 'Hakeem', '1981-10-19', 'm', 'E', '31821335350'),
	(77, 'Cade', '1982-01-21', 'm', 'E', '53637618311'),
	(78, 'Gregory', '1983-04-09', 'm', 'E', '74850518656'),
	(79, 'Ishmael', '1984-01-10', 'm', 'E', '39325622246'),
	(80, 'Seth', '1985-12-01', 'm', 'E', '47522320739'),
	(81, 'Bevis', '1986-08-05', 'm', 'E', '63537564457'),
	(82, 'Fuller', '1987-08-22', 'm', 'E', '22641854651'),
	(83, 'Michael', '1988-05-08', 'm', 'E', '43984033028'),
	(84, 'Colby', '1989-02-07', 'm', 'E', '60700457852'),
	(85, 'Tanek', '1990-10-10', 'm', 'E', '61144377480'),
	(86, 'Gabriel', '1980-04-29', 'm', 'E', '12018251805'),
	(87, 'Reece', '1990-07-29', 'm', 'E', '88084373706'),
	(88, 'Burton', '1983-02-12', 'm', 'E', '77253969774'),
	(89, 'Maxwell', '1999-06-07', 'm', 'E', '19163511827'),
	(90, 'Jakeem', '2000-03-21', 'm', 'E', '24749474851'),
	(91, 'Nathaniel', '1999-01-02', 'm', 'E', '23337550916'),
	(92, 'Jakeem', '2000-05-05', 'm', 'E', '83977615190'),
	(93, 'Macon', '2000-01-21', 'm', 'E', '22626448290'),
	(94, 'Steven', '1998-11-22', 'm', 'E', '47842468788'),
	(95, 'Magee', '1998-09-15', 'm', 'E', '72546884000'),
	(96, 'Kyle', '1993-12-04', 'm', 'E', '26282172608'),
	(97, 'Colt', '1992-04-16', 'm', 'E', '47110054632'),
	(98, 'Francis', '1998-12-27', 'm', 'E', '67214704463'),
	(99, 'James', '1998-09-26', 'm', 'E', '81220604631'),
	(100, 'Bruce', '1991-04-12', 'm', 'E', '00133580903'),
	(101, 'Kasimir', '2000-02-13', 'm', 'E', '66318260714'),
	(102, 'Myles', '2000-01-01', 'm', 'E', '01717176780'),
	(103, 'Kuame', '2000-04-12', 'm', 'E', '53641858690'),
	(104, 'Giacomo', '1988-09-06', 'm', 'E', '16333155179'),
	(105, 'Marshall', '1999-02-06', 'm', 'E', '77812629139'),
	(106, 'Zane', '1991-12-17', 'm', 'E', '82110128550'),
	(107, 'Oscar', '2000-03-12', 'm', 'E', '21663469440'),
	(108, 'Reuben', '1991-04-05', 'm', 'E', '63882693207'),
	(109, 'Zachery', '1995-12-16', 'm', 'E', '81218155841'),
	(110, 'Rooney', '2000-07-06', 'm', 'E', '35563719367'),
	(111, 'Len', '2000-05-18', 'm', 'E', '15283456307');
/*!40000 ALTER TABLE `motorista` ENABLE KEYS */;

-- Copiando dados para a tabela truckpad.veiculo: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `veiculo` DISABLE KEYS */;
INSERT INTO `veiculo` (`id`, `motorista_id`, `placa`, `marca`, `modelo`, `veiculo_tipo_id`) VALUES
	(2, 11, 'AAA1010', 'FORD', 'F1000', 1),
	(3, 81, 'AAA1011', 'M.BENZ', 'L1513', 2),
	(4, 100, 'BBB1010', 'M.BENZ', 'L1113', 3),
	(5, NULL, 'ZZZ1Z00', 'IVENCO', 'IVENCO', 4);
/*!40000 ALTER TABLE `veiculo` ENABLE KEYS */;

-- Copiando dados para a tabela truckpad.veiculo_tipo: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `veiculo_tipo` DISABLE KEYS */;
INSERT INTO `veiculo_tipo` (`id`, `nome`) VALUES
	(1, 'Caminhão 3/4'),
	(2, 'Caminhão Toco'),
	(3, 'Caminhão Truck'),
	(4, 'Carreta Simples'),
	(5, 'Carreta Eixo Extendido');
/*!40000 ALTER TABLE `veiculo_tipo` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
