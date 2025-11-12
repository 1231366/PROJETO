-- Criar a base de dados 'ap' (se ainda não existir)
CREATE DATABASE IF NOT EXISTS `ap` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ap`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargos`
-- Tabela para definir os tipos de utilizadores (visto em Admin_Users.php)
--
CREATE TABLE `cargos` (
  `id_cargo` int(11) NOT NULL AUTO_INCREMENT,
  `cargo` varchar(100) NOT NULL,
  PRIMARY KEY (`id_cargo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Inserir dados essenciais para a tabela `cargos`
-- (Baseado na lógica de Admin_Users.php e +Doentes.php)
--
INSERT INTO `cargos` (`id_cargo`, `cargo`) VALUES
(1, 'enfermeiro'),
(2, 'médico'),
(3, 'secretário'),
(4, 'administrador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `trabalhadores`
-- Tabela principal de utilizadores/funcionários (visto em Admin_Users.php, perfilpaciente.php)
--
CREATE TABLE `trabalhadores` (
  `id_trabalhador` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `id_cargo` int(11) NOT NULL,
  `contacto` varchar(20) DEFAULT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT 'default.png',
  PRIMARY KEY (`id_trabalhador`),
  UNIQUE KEY `login` (`login`),
  KEY `id_cargo` (`id_cargo`),
  CONSTRAINT `trabalhadores_ibfk_1` FOREIGN KEY (`id_cargo`) REFERENCES `cargos` (`id_cargo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pacientes`
-- Tabela para os dados dos utentes (visto em +Doentes.php, EditPaciente.php, perfilpaciente.php)
--
CREATE TABLE `pacientes` (
  `id_paciente` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `data_nascimento` date NOT NULL,
  `genero` enum('M','F') NOT NULL,
  `contacto` varchar(20) DEFAULT NULL,
  `morada` varchar(255) DEFAULT NULL,
  `id_medico_responsavel` int(11) DEFAULT NULL,
  `id_enfermeiro_responsavel` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_paciente`),
  KEY `id_medico_responsavel` (`id_medico_responsavel`),
  KEY `id_enfermeiro_responsavel` (`id_enfermeiro_responsavel`),
  CONSTRAINT `pacientes_ibfk_1` FOREIGN KEY (`id_medico_responsavel`) REFERENCES `trabalhadores` (`id_trabalhador`),
  CONSTRAINT `pacientes_ibfk_2` FOREIGN KEY (`id_enfermeiro_responsavel`) REFERENCES `trabalhadores` (`id_trabalhador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `programassaude`
-- Tabela para os programas de saúde (visto em +Doentes.php, perfilpaciente.php)
--
CREATE TABLE `programassaude` (
  `id_programa` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  PRIMARY KEY (`id_programa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Inserir dados essenciais para a tabela `programassaude`
-- (Baseado na lógica de +Doentes.php e indicadoresdiabetes.php)
--
INSERT INTO `programassaude` (`id_programa`, `nome`) VALUES
(0, 'Sem programa de Saúde especial'),
(1, 'Hipertensao'),
(2, 'Saúde Materna'),
(3, 'Diabetes');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pacientes_programas`
-- Tabela de ligação entre pacientes e programas de saúde (visto em +Doentes.php, perfilpaciente.php)
--
CREATE TABLE `pacientes_programas` (
  `id_paciente_programa` int(11) NOT NULL AUTO_INCREMENT,
  `id_paciente` int(11) NOT NULL,
  `id_doenca` int(11) NOT NULL,
  `atual` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_paciente_programa`),
  KEY `id_paciente` (`id_paciente`),
  KEY `id_doenca` (`id_doenca`),
  CONSTRAINT `pacientes_programas_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`),
  CONSTRAINT `pacientes_programas_ibfk_2` FOREIGN KEY (`id_doenca`) REFERENCES `programassaude` (`id_programa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipos_consultas`
-- Tabela para os tipos de consulta (visto em AddConsulta.php, perfilpaciente.php, indicadoresdiabetes.php)
--
CREATE TABLE `tipos_consultas` (
  `id_tipo_consulta` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  PRIMARY KEY (`id_tipo_consulta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Inserir dados essenciais para a tabela `tipos_consultas`
-- (Baseado na lógica de AddConsulta.php e indicadoresdiabetes.php)
--
INSERT INTO `tipos_consultas` (`id_tipo_consulta`, `nome`) VALUES
(1, 'Saúde Infantil'),
(2, 'Saúde Grávida'),
(3, 'Vacinação'),
(4, 'Consulta de Diabetes'),
(5, 'Consulta de Hipertensão'),
(6, 'Consulta de Enfermagem Diabetes'),
(7, 'Consulta Médica Diabetes');

-- --------------------------------------------------------

--
-- Estrutura da tabela `consultas`
-- Tabela principal para agendamentos (visto em AddConsulta.php, perfilpaciente.php)
--
CREATE TABLE `consultas` (
  `id_consulta` int(11) NOT NULL AUTO_INCREMENT,
  `id_paciente` int(11) NOT NULL,
  `id_trabalhador` int(11) NOT NULL,
  `data_hora_inicio` datetime NOT NULL,
  `data_hora_fim` datetime DEFAULT NULL,
  `id_tipo_consulta` int(11) NOT NULL,
  `observacoes` text DEFAULT NULL,
  `sitio` int(11) DEFAULT NULL COMMENT '1=Usf, 2=Domicílio',
  PRIMARY KEY (`id_consulta`),
  KEY `id_paciente` (`id_paciente`),
  KEY `id_trabalhador` (`id_trabalhador`),
  KEY `id_tipo_consulta` (`id_tipo_consulta`),
  CONSTRAINT `consultas_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`),
  CONSTRAINT `consultas_ibfk_2` FOREIGN KEY (`id_trabalhador`) REFERENCES `trabalhadores` (`id_trabalhador`),
  CONSTRAINT `consultas_ibfk_3` FOREIGN KEY (`id_tipo_consulta`) REFERENCES `tipos_consultas` (`id_tipo_consulta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `materiais`
-- Tabela para os materiais de stock (visto em +Material.php)
--
CREATE TABLE `materiais` (
  `id_material` int(11) NOT NULL AUTO_INCREMENT,
  `material` varchar(255) NOT NULL,
  PRIMARY KEY (`id_material`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipamentos`
-- Tabela para os equipamentos de stock (visto em +Equipamento.php)
--
CREATE TABLE `equipamentos` (
  `id_equipamento` int(11) NOT NULL AUTO_INCREMENT,
  `equipamento` varchar(255) NOT NULL,
  PRIMARY KEY (`id_equipamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `inventario`
-- Tabela de stock (visto em +Material.php e +Equipamento.php)
-- Nota: Esta estrutura é baseada no código; ambos os formulários inserem na mesma tabela.
--
CREATE TABLE `inventario` (
  `id_inventario` int(11) NOT NULL AUTO_INCREMENT,
  `id_material` int(11) DEFAULT NULL,
  `id_equipamento` int(11) DEFAULT NULL,
  `quantidade` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_inventario`),
  KEY `id_material` (`id_material`),
  KEY `id_equipamento` (`id_equipamento`),
  CONSTRAINT `inventario_ibfk_1` FOREIGN KEY (`id_material`) REFERENCES `materiais` (`id_material`),
  CONSTRAINT `inventario_ibfk_2` FOREIGN KEY (`id_equipamento`) REFERENCES `equipamentos` (`id_equipamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
