-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Maio-2021 às 13:46
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tcc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `armazenamento`
--

CREATE TABLE `armazenamento` (
  `arm_id` int(11) NOT NULL,
  `arm_descricao` varchar(255) DEFAULT NULL,
  `arm_endereco` varchar(255) DEFAULT NULL,
  `arm_cidade` varchar(255) DEFAULT NULL,
  `arm_uf_id` varchar(255) DEFAULT NULL,
  `arm_usu_id` varchar(255) DEFAULT NULL,
  `arm_numero` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `armazenamento`
--

INSERT INTO `armazenamento` (`arm_id`, `arm_descricao`, `arm_endereco`, `arm_cidade`, `arm_uf_id`, `arm_usu_id`, `arm_numero`) VALUES
(1, 'ICM - Pedregulho', 'Rua Alberto Barbeta', 'Guaratinguetá', '25', '1', '68');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `cat_id` int(11) NOT NULL,
  `cat_descricao` varchar(255) DEFAULT NULL,
  `cat_sub` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`cat_id`, `cat_descricao`, `cat_sub`) VALUES
(1, '	Caixas P.A	', '	Ativa	'),
(2, '	Caixas P.A	', '	Passiva	'),
(3, '	Monitor	', '	Ativo	'),
(4, '	Monitor	', '	Passivo	'),
(5, '	Cabo	', '	PP	'),
(6, '	Cabo	', '	XLR	'),
(7, '	Cabo	', '	P10 TS	'),
(8, '	Cabo	', '	P10 TRS	'),
(9, '	Cabo	', '	SPEAKON 2V	'),
(10, '	Cabo	', '	SPEAKON 4V	'),
(11, '	Cabo	', '	RCA	'),
(12, '	Cabo	', '	P2	'),
(13, '	Mixer	', '	Analógico	'),
(14, '	Mixer	', '	Digital	'),
(15, '	Amplificador	', '	1,3 Ohms	'),
(16, '	Amplificador	', '	2 Ohms	'),
(17, '	Amplificador	', '	4 Ohms	'),
(18, '	Microfone	', '	S/Fio Mão	'),
(19, '	Microfone	', '	S/Fio headset	'),
(20, '	Microfone	', '	S/Fio Instrumento	'),
(21, '	Microfone	', '	Condensador	'),
(22, '	Microfone	', '	Dinâmico	'),
(23, '	Processador P.A	', '		'),
(24, '	Dinâmicos	', '	Compressor	'),
(25, '	Dinâmicos	', '	Expander/Gate	'),
(26, '	Dinâmicos	', '	Delay	'),
(27, '	Efeitos	', '		'),
(28, '	Equalizador	', '		'),
(29, '	Periféricos	', '	Adaptadores	'),
(30, '	Periféricos	', '	Rack	'),
(31, '	Periféricos	', '	Interface USB	');

-- --------------------------------------------------------

--
-- Estrutura da tabela `detalhe_lista`
--

CREATE TABLE `detalhe_lista` (
  `det_id` int(11) NOT NULL,
  `det_lis_id` varchar(255) DEFAULT NULL,
  `det_equ_id` varchar(255) DEFAULT NULL,
  `det_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `detalhe_lista`
--

INSERT INTO `detalhe_lista` (`det_id`, `det_lis_id`, `det_equ_id`, `det_status`) VALUES
(1, '1', '1', 'Reservado'),
(2, '1', '2', 'Reservado'),
(3, '1', '3', 'Reservado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipamentos`
--

CREATE TABLE `equipamentos` (
  `equ_id` int(11) NOT NULL,
  `equ_nome` varchar(255) DEFAULT NULL,
  `equ_obs` varchar(255) DEFAULT NULL,
  `equ_quantidade` varchar(255) DEFAULT NULL,
  `equ_cat_id` varchar(255) DEFAULT NULL,
  `equ_usu_id` varchar(255) DEFAULT NULL,
  `equ_arm_id` varchar(255) DEFAULT NULL,
  `equ_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `equipamentos`
--

INSERT INTO `equipamentos` (`equ_id`, `equ_nome`, `equ_obs`, `equ_quantidade`, `equ_cat_id`, `equ_usu_id`, `equ_arm_id`, `equ_img`) VALUES
(1, 'Mesa Yamaha MG124CX', 'Guardar na ICM-Pedregulho', '1', '13', '1', '1', '27618920210529034202.jpg'),
(2, 'Potência LL Audio Cinza', 'Guardar na ICM-Pedregulho | 2° Potencia de Cima pra Baixo', '1', '17', '1', '1', 'd_nq_np_986731-mlb40193480081_122019-o20210529034455.jpg'),
(3, '6 Cabos XLR-XLR | Com Fitas Vermelhas (Vozes)', 'Guardar na ICM-Pedregulho | COM Fitas Vermelhas.', '6', '6', '1', '1', 'cabo-xlr-m-x-xlr-f-de-5m20210529034647.jpg'),
(4, '2 Cabos XLR-XLR Curtos Pretos', 'Guardar ICM-Pedregulho | Kit MIC S/Fio de Lapela', '2', '6', '1', '1', '1.20210529034840webp'),
(5, '1 Kit MIC S/Fio | Apenas 1 Mão, com Fonte.', 'Guardar ICM-Pedregulho', '1', '18', '1', '1', 'download20210529035057.jpg'),
(6, '1 Kit MIC S/Fio | 1 Mão e 1 Headset, com Transmissor e Lapela e Fonte', 'Guardar ICM-Pedregulho | ', '1', '19', '1', '1', 'bd53d84c78fafdbd5520edbf0c82a2b920210529035218.jpg'),
(7, '2 Cabos XLR-XLR Curtos, Fitas Amarelas', 'Guardar ICM-Pedregulho | Com Kit de MIC S/Fio Duplo (headset)', '2', '6', '1', '1', 'cabo_de_microfone_santo_angelo_canon_balanceado_xlr_xlr_3_metros_montado_2837_1_2020030317121420210529035425.jpg'),
(8, 'Microfone do Lapela Cinza pequena, da Microfonia', 'Guardar ICM-Pedregulho | Não utilizado, enrolar e guardar', '1', '21', '1', '1', 'download (1)20210529035600.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `eventos`
--

CREATE TABLE `eventos` (
  `eve_id` int(255) NOT NULL,
  `eve_descricao` varchar(255) DEFAULT NULL,
  `eve_contratante` varchar(255) DEFAULT NULL,
  `eve_valor` varchar(255) DEFAULT NULL,
  `eve_data` varchar(255) DEFAULT NULL,
  `eve_hora_ini` varchar(255) DEFAULT NULL,
  `eve_hora_fim` varchar(255) DEFAULT NULL,
  `eve_endereco` varchar(255) DEFAULT NULL,
  `eve_publico` varchar(255) DEFAULT NULL,
  `eve_sta_id` varchar(255) DEFAULT NULL,
  `eve_usu_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `eventos`
--

INSERT INTO `eventos` (`eve_id`, `eve_descricao`, `eve_contratante`, `eve_valor`, `eve_data`, `eve_hora_ini`, `eve_hora_fim`, `eve_endereco`, `eve_publico`, `eve_sta_id`, `eve_usu_id`) VALUES
(1, 'Especial Área Guaratinguetá - SP', 'Igreja Cristã Maranata - Carlos Alberto/Tiago Garcia', '0', '29/05/2021', '20:00', '21:30', 'ICM - Colônia Piaguí', '20', '1', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `evento_status`
--

CREATE TABLE `evento_status` (
  `sta_id` int(11) NOT NULL,
  `sta_descricao` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `evento_status`
--

INSERT INTO `evento_status` (`sta_id`, `sta_descricao`) VALUES
(1, 'Programados'),
(2, 'Realizados'),
(3, 'Cancelados');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lista`
--

CREATE TABLE `lista` (
  `lis_id` int(11) NOT NULL,
  `lis_descricao` varchar(255) DEFAULT NULL,
  `lis_usu_id` varchar(255) DEFAULT NULL,
  `lis_eve_id` varchar(255) DEFAULT NULL,
  `lis_data` varchar(255) DEFAULT NULL,
  `lis_hora` varchar(255) DEFAULT NULL,
  `lis_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `lista`
--

INSERT INTO `lista` (`lis_id`, `lis_descricao`, `lis_usu_id`, `lis_eve_id`, `lis_data`, `lis_hora`, `lis_status`) VALUES
(1, 'Desmontagem Som Colônia para Pedregulho', '1', '1', '28/05/2021', '22:40', 'Programado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `uf`
--

CREATE TABLE `uf` (
  `uf_id` int(11) NOT NULL,
  `uf_nome` varchar(255) DEFAULT NULL,
  `uf_sigla` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `uf`
--

INSERT INTO `uf` (`uf_id`, `uf_nome`, `uf_sigla`) VALUES
(1, '	Acre	', '	AC	'),
(2, '	Alagoas	', '	AL	'),
(3, '	Amapá	', '	AP	'),
(4, '	Amazonas	', '	AM	'),
(5, '	Bahia	', '	BA	'),
(6, '	Ceará	', '	CE	'),
(7, '	Distrito Federal	', '	DF	'),
(8, '	Espírito Santo	', '	ES	'),
(9, '	Goiás	', '	GO	'),
(10, '	Maranhão	', '	MA	'),
(11, '	Mato Grosso	', '	MT	'),
(12, '	Mato Grosso do Sul	', '	MS	'),
(13, '	Minas Gerais	', '	MG	'),
(14, '	Pará	', '	PA	'),
(15, '	Paraíba	', '	PB	'),
(16, '	Paraná	', '	PR	'),
(17, '	Pernambuco	', '	PE	'),
(18, '	Piauí	', '	PI	'),
(19, '	Rio de Janeiro	', '	RJ	'),
(20, '	Rio Grande do Norte	', '	RN	'),
(21, '	Rio Grande do Sul	', '	RS	'),
(22, '	Rondônia	', '	RO	'),
(23, '	Roraima	', '	RR	'),
(24, '	Santa Catarina	', '	SC	'),
(25, '	São Paulo	', '	SP	'),
(26, '	Sergipe	', '	SE	'),
(27, '	Tocantis	', '	TO	');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `usu_id` int(11) NOT NULL,
  `usu_nome` varchar(255) DEFAULT NULL,
  `usu_email` varchar(255) DEFAULT NULL,
  `usu_senha` varchar(255) DEFAULT NULL,
  `usu_cidade` varchar(255) DEFAULT NULL,
  `usu_uf_id` varchar(11) DEFAULT NULL,
  `usu_img` varchar(255) DEFAULT NULL,
  `usu_telefone` char(11) DEFAULT NULL,
  `usu_organizacao` varchar(255) DEFAULT NULL,
  `usu_img_organizacao` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`usu_id`, `usu_nome`, `usu_email`, `usu_senha`, `usu_cidade`, `usu_uf_id`, `usu_img`, `usu_telefone`, `usu_organizacao`, `usu_img_organizacao`) VALUES
(1, 'Área Som Guaratinguetá - ICM', 'icmsom@icm.com.br', '93010c575c01ce26779973aca5a1db3e', 'Guaratinguetá', '25', '20210526_icmsom@icm.com.br', '12996761999', 'Igreja Cristã Maranata - Área Guaratinguetá', '20210526_icmsom@icm.com.br_Igreja Cristã Maranata - Área Guaratinguetá');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `armazenamento`
--
ALTER TABLE `armazenamento`
  ADD PRIMARY KEY (`arm_id`);

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`cat_id`);

--
-- Índices para tabela `detalhe_lista`
--
ALTER TABLE `detalhe_lista`
  ADD PRIMARY KEY (`det_id`);

--
-- Índices para tabela `equipamentos`
--
ALTER TABLE `equipamentos`
  ADD PRIMARY KEY (`equ_id`);

--
-- Índices para tabela `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`eve_id`);

--
-- Índices para tabela `evento_status`
--
ALTER TABLE `evento_status`
  ADD PRIMARY KEY (`sta_id`);

--
-- Índices para tabela `lista`
--
ALTER TABLE `lista`
  ADD PRIMARY KEY (`lis_id`);

--
-- Índices para tabela `uf`
--
ALTER TABLE `uf`
  ADD PRIMARY KEY (`uf_id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usu_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `armazenamento`
--
ALTER TABLE `armazenamento`
  MODIFY `arm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `detalhe_lista`
--
ALTER TABLE `detalhe_lista`
  MODIFY `det_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `equipamentos`
--
ALTER TABLE `equipamentos`
  MODIFY `equ_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `eventos`
--
ALTER TABLE `eventos`
  MODIFY `eve_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `evento_status`
--
ALTER TABLE `evento_status`
  MODIFY `sta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `lista`
--
ALTER TABLE `lista`
  MODIFY `lis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `uf`
--
ALTER TABLE `uf`
  MODIFY `uf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
