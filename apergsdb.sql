--
-- Database: `apergsdb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `associados`
--

CREATE TABLE `associados` (
  `pk_ass` int(11) NOT NULL,
  `fk_sit` int(11) DEFAULT '1',
  `fk_bco` int(11) DEFAULT NULL,
  `fk_lot` int(11) DEFAULT NULL,
  `fk_cme` int(11) DEFAULT NULL,
  `fk_cat` int(11) DEFAULT NULL,
  `fk_cid_resid` int(11) DEFAULT NULL,
  `fk_cid_comerc` int(11) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `matricula` varchar(50) DEFAULT NULL,
  `data_nasc` date DEFAULT NULL,
  `rg` varchar(20) DEFAULT NULL,
  `data_rg` date DEFAULT NULL,
  `orgao_expedidor` varchar(20) DEFAULT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `estado_civil` char(1) DEFAULT NULL,
  `nome_pai` varchar(100) DEFAULT NULL,
  `nome_mae` varchar(100) DEFAULT NULL,
  `sexo` char(1) DEFAULT NULL,
  `observacoes` varchar(1000) DEFAULT NULL,
  `agencia` char(4) DEFAULT NULL,
  `conta` char(20) DEFAULT NULL,
  `endereco_resid` varchar(150) DEFAULT NULL,
  `bairro_resid` varchar(50) DEFAULT NULL,
  `cep_resid` varchar(8) DEFAULT NULL,
  `telefone_resid` varchar(100) DEFAULT NULL,
  `email_resid` varchar(100) DEFAULT NULL,
  `logradouro_comerc` varchar(150) DEFAULT NULL,
  `bairro_comerc` varchar(50) DEFAULT NULL,
  `cep_comerc` varchar(8) DEFAULT NULL,
  `telefone_comerc` varchar(100) DEFAULT NULL,
  `email_comerc` varchar(100) DEFAULT NULL,
  `nro_oab` varchar(20) DEFAULT NULL,
  `unimed_ambulatorial` char(1) NOT NULL DEFAULT 'N',
  `unimed_hospitalar` char(1) NOT NULL DEFAULT 'N',
  `unimed_global` char(1) NOT NULL DEFAULT 'N',
  `unimed_sos` char(1) NOT NULL DEFAULT 'N',
  `unimed_odonto` char(1) NOT NULL DEFAULT 'N',
  `telefonia_vivo` char(1) NOT NULL DEFAULT 'N',
  `telefonia_claro` char(1) NOT NULL DEFAULT 'N',
  `anape` char(1) NOT NULL DEFAULT 'N',
  `cobranca_unimed` char(1) NOT NULL,
  `cobranca_mensalidade` char(1) NOT NULL,
  `cobranca_telefonia` char(1) NOT NULL,
  `cobranca_servicos` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `associados`
--

INSERT INTO `associados` (`pk_ass`, `fk_sit`, `fk_bco`, `fk_lot`, `fk_cme`, `fk_cat`, `fk_cid_resid`, `fk_cid_comerc`, `nome`, `matricula`, `data_nasc`, `rg`, `data_rg`, `orgao_expedidor`, `cpf`, `estado_civil`, `nome_pai`, `nome_mae`, `sexo`, `observacoes`, `agencia`, `conta`, `endereco_resid`, `bairro_resid`, `cep_resid`, `telefone_resid`, `email_resid`, `logradouro_comerc`, `bairro_comerc`, `cep_comerc`, `telefone_comerc`, `email_comerc`, `nro_oab`, `unimed_ambulatorial`, `unimed_hospitalar`, `unimed_global`, `unimed_sos`, `unimed_odonto`, `telefonia_vivo`, `telefonia_claro`, `anape`, `cobranca_unimed`, `cobranca_mensalidade`, `cobranca_telefonia`, `cobranca_servicos`) VALUES
(65, 3, 2, 1, 5, 2, 55, 55, 'ANDREIA L SOUZA', '1995', '1988-11-16', '507911053', '2007-10-09', 'SSP', '13920334701', 'C', 'MARCOS VINICIUS RAFAEL M SOUZA', 'ALANA RENATA SOUZA', 'F', 'NOVO CADASTRO EDITADO', '7882', '053669', 'RUA LINCOLN CORRÃªA DA SILVA, 200', 'MORRO DO ABEL', '23902160', '39501600', 'ANDREIALAURASOUZA_@INTEGRASJC.COM.BR', 'RUA ANITA GARIBALDI, 484 - 302', 'MONT SERRAT', '94450000', '32732601', 'ANDREIA@DELPHUS.INF.BR', '1995', 'S', 'N', 'N', 'N', 'S', 'N', 'S', 'S', 'T', 'B', 'T', 'T'),
(66, 3, 6, 1, NULL, 2, 55, 55, 'PIETRA S FIGUEIREDO', '321546', '1992-08-24', '249841795', '2014-12-31', 'SSJ-SP', '48678177756', 'C', 'BENTO JOSE FIGUEIREDO', 'LETICIA ELISA', 'F', 'OBSERVACAO FEITA E EDITADA', '123', '23345', 'RUA L, 956', 'MARIA PAULA', '94450001', '25287184', 'PIETRASARAHVALENTINAFIGUEIREDO-95@CARE-BR.COM.BR', 'RUA ANITA GARIBALDI, 484 - 302', 'MONT SERRAT', '94450000', '32732601', 'PIETRA@DELPHUS.INF.BR', '23345666', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'B', 'B', 'B', 'B');

-- --------------------------------------------------------

--
-- Estrutura da tabela `associados_celulares`
--

CREATE TABLE `associados_celulares` (
  `pk_ace` int(11) NOT NULL,
  `fk_ass` int(11) NOT NULL,
  `operadora` char(1) NOT NULL,
  `numero` char(12) NOT NULL,
  `inativo` char(1) NOT NULL DEFAULT 'N',
  `observacao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `bancos`
--

CREATE TABLE `bancos` (
  `pk_bco` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `bancos`
--

INSERT INTO `bancos` (`pk_bco`, `nome`) VALUES
(4, 'BRADESCO SA'),
(6, 'INTERMEDIUM'),
(2, 'ITAU D'),
(5, 'NUBANK');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias_associados`
--

CREATE TABLE `categorias_associados` (
  `pk_cat` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categorias_associados`
--

INSERT INTO `categorias_associados` (`pk_cat`, `descricao`) VALUES
(1, 'A PRIMEIRA'),
(2, 'B SEGUNDA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidades`
--

CREATE TABLE `cidades` (
  `pk_cid` int(11) NOT NULL,
  `fk_est` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cidades`
--

INSERT INTO `cidades` (`pk_cid`, `fk_est`, `nome`) VALUES
(28, 1, 'STO ANTONIO DA PATRULHA'),
(50, 1, 'TRES TIOS'),
(54, 1, 'DOIS IRMAOS'),
(55, 1, 'PORTO ALEGRE'),
(57, 8, 'LA PENZA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `classe_mensalidade`
--

CREATE TABLE `classe_mensalidade` (
  `pk_cme` int(11) NOT NULL,
  `descricao` varchar(50) DEFAULT NULL,
  `valor_mensalidade` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `classe_mensalidade`
--

INSERT INTO `classe_mensalidade` (`pk_cme`, `descricao`, `valor_mensalidade`) VALUES
(1, 'UM MENSALIDADE', 1000.45),
(2, 'REEE', 4587),
(3, 'TRES MENSALIDADE', 453.23),
(4, 'QUATRO MENSALIDADE', 123.45),
(5, 'CINCO MENSALIDADE', 12.5),
(6, 'SEIS MENSALIDADE', 456.36),
(7, 'SETE MENSALIDADE', 1500.23),
(9, 'NOVE MENSALIDADE', 1550.25),
(10, 'MENZA DOS', 150.65);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas_receber`
--

CREATE TABLE `contas_receber` (
  `pk_ctr` int(11) NOT NULL,
  `fk_ass` int(11) DEFAULT NULL,
  `fk_ser` int(11) DEFAULT NULL,
  `competencia` char(6) DEFAULT NULL,
  `valor` double DEFAULT NULL,
  `valor_recebido` double DEFAULT NULL,
  `data_geracao` date DEFAULT NULL,
  `data_emis` date DEFAULT NULL,
  `data_venc` date DEFAULT NULL,
  `data_liq` date DEFAULT NULL,
  `observacao` varchar(100) DEFAULT NULL,
  `forma_cobranca` char(1) DEFAULT NULL,
  `automatico` char(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `contas_receber`
--

INSERT INTO `contas_receber` (`pk_ctr`, `fk_ass`, `fk_ser`, `competencia`, `valor`, `valor_recebido`, `data_geracao`, `data_emis`, `data_venc`, `data_liq`, `observacao`, `forma_cobranca`, `automatico`) VALUES
(2, 66, 3, '201810', 1450.25, 300, '2018-09-11', '2018-09-10', '2018-12-05', NULL, 'É... Mais ou menos', NULL, 'N'),
(3, 65, 1, '201809', 2540.75, 2540.75, '2018-06-12', '2018-06-11', '2018-09-10', '2018-09-13', 'Bah, ficou dificil agora', NULL, 'N'),
(4, 65, 3, '201812', 451, NULL, '2018-12-10', '2018-12-10', '2018-12-12', NULL, 'OBSERVACAO AQUI', NULL, 'N'),
(6, 65, 3, '201902', 456.67, NULL, '2018-12-10', '2018-12-10', '2019-01-15', NULL, 'OBS FEITA', NULL, 'N');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dependentes`
--

CREATE TABLE `dependentes` (
  `pk_dep` int(11) NOT NULL,
  `fk_ass` int(11) NOT NULL,
  `fk_tde` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `data_nasc` date NOT NULL,
  `codigo_unimed` varchar(20) NOT NULL,
  `carteira_unimed` varchar(20) NOT NULL,
  `observacoes` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estados`
--

CREATE TABLE `estados` (
  `pk_est` int(11) NOT NULL,
  `fk_pai` int(11) NOT NULL,
  `sigla` char(2) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `estados`
--

INSERT INTO `estados` (`pk_est`, `fk_pai`, `sigla`, `nome`) VALUES
(1, 1, 'RS', 'RIO GRANDE DO SUL'),
(6, 1, 'SP', 'SAO PAULO'),
(7, 1, 'RJ', 'RIO DE JANEIRO'),
(8, 1, 'SC', 'SANTA CATARINA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lotacoes`
--

CREATE TABLE `lotacoes` (
  `pk_lot` int(11) NOT NULL,
  `descricao` varchar(50) DEFAULT NULL,
  `inativo` char(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `lotacoes`
--

INSERT INTO `lotacoes` (`pk_lot`, `descricao`, `inativo`) VALUES
(1, 'PROCURADOR', 'N'),
(2, 'SEGUNDO', 'S'),
(3, 'SECRETARIO', 'N');

-- --------------------------------------------------------

--
-- Estrutura da tabela `paises`
--

CREATE TABLE `paises` (
  `pk_pai` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `paises`
--

INSERT INTO `paises` (`pk_pai`, `nome`) VALUES
(7, 'AUSTRALIA'),
(1, 'BRASIL'),
(9, 'CHINA'),
(6, 'ESTADOS UNIDOS '),
(4, 'PORTUGAL'),
(8, 'RUSSIA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `parametros`
--

CREATE TABLE `parametros` (
  `pk_par` int(11) NOT NULL,
  `fk_cid` int(11) DEFAULT NULL,
  `razao_social` varchar(100) DEFAULT NULL,
  `nome_fantasia` varchar(50) DEFAULT NULL,
  `cnpj` char(14) DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `cep` char(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `parametros`
--

INSERT INTO `parametros` (`pk_par`, `fk_cid`, `razao_social`, `nome_fantasia`, `cnpj`, `endereco`, `bairro`, `cep`) VALUES
(999, 55, 'ASSOCIACAO APERGS', 'APERGS', '25906031000137', 'RUA ANITA GARIBALDI, 484', 'MONT SERRAT', '94450000');

-- --------------------------------------------------------

--
-- Estrutura da tabela `situacoes`
--

CREATE TABLE `situacoes` (
  `pk_sit` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `situacoes`
--

INSERT INTO `situacoes` (`pk_sit`, `descricao`) VALUES
(3, 'AFASTADO'),
(1, 'ATIVO'),
(2, 'INATIVO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipos_servicos`
--

CREATE TABLE `tipos_servicos` (
  `pk_ser` int(11) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `valor` double DEFAULT NULL,
  `inativo` char(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipos_servicos`
--

INSERT INTO `tipos_servicos` (`pk_ser`, `descricao`, `valor`, `inativo`) VALUES
(1, 'UM TIPO', 33, 'N'),
(2, 'SEGUNDO TIPO', 34.5, 'S'),
(3, 'OUTRO VALOR', 100.88, 'N');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_dependentes`
--

CREATE TABLE `tipo_dependentes` (
  `pk_tde` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipo_dependentes`
--

INSERT INTO `tipo_dependentes` (`pk_tde`, `descricao`) VALUES
(5, 'ESPOSA'),
(3, 'ESPOSO'),
(1, 'MAE'),
(2, 'PAI');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `pk_usu` int(11) NOT NULL,
  `nome` varchar(50) CHARACTER SET utf8 NOT NULL,
  `login` varchar(20) CHARACTER SET utf8 NOT NULL,
  `senha` varchar(200) CHARACTER SET utf8 NOT NULL,
  `bloqueado` char(1) CHARACTER SET utf8 NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`pk_usu`, `nome`, `login`, `senha`, `bloqueado`) VALUES
(1, 'DELPHUS', 'sysdba', '$2y$10$Oj1JpSgYk15ub/13EnSu6OKo0ncZyrcBlRUhKgUQzlaUJheLZ4J7q', 'N'),
(2, 'MARCELO ALAGGIO', 'alaggio', '$2y$10$R4y8wrLSaiiGTa/4Nsr6cuAm1K80.lEjbWFq7bk.jVyV76XPdungu', 'S'),
(5, 'FELIPE PETRY', 'felipe', '$2y$10$qfzv9gcn4c3v/5rd.nliaezfph4ptohm22mbyrstcojf2jralc/6o', 'N'),
(7, 'KELLY PAVAN', 'kelly', '$2y$10$4dvePOcbH9HlnGZ/yhro8uti7f8.fw1DSZd2SbIcWKeC/NKRpRB0e', 'N'),
(8, 'MARCOS FORNARI', 'marcos', '$2y$10$j5L5vMUuZ3X7LJr5jhN1PuRGBFreUyXZS5eFNM.KF.XBNgvHjuRoy', 'N'),
(9, 'THIAGO PAVAN', 'thiago', '$2y$10$yx8du5jgcukhckmq7awbruxmbl7incw7uzl69ehw4/0irdgscl8yo', 'S'),
(10, 'LUCIANO FIALHO', 'luciano', '$2y$10$Os8j1QVw4oQS1XrnHKcg0ej2pG.dnT1GzgBrgBt/E4nY3C.CC.70.', 'N'),
(13, 'MARCOS AURELIO', 'aurelio', '$2y$10$aK/GTsx3yuc2G1fjvLctiuPp3KEfmyDjUdtJVCsBJuelbErtTqHD.', 'N'),
(16, 'SABAO CRACRA', 'sabao', '$2y$10$ICBrfNjG13sLykduMKZgfe9PJ1wcvtPWIQXIBOjpSJ6dTkZmD.r7e', 'N');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `associados`
--
ALTER TABLE `associados`
  ADD PRIMARY KEY (`pk_ass`),
  ADD KEY `nome` (`nome`),
  ADD KEY `matricula` (`matricula`),
  ADD KEY `data_nasc` (`data_nasc`),
  ADD KEY `fk_cid_comerc` (`fk_cid_comerc`),
  ADD KEY `fk_cid_resid` (`fk_cid_resid`),
  ADD KEY `fk_sit` (`fk_sit`),
  ADD KEY `pk_ass` (`pk_ass`),
  ADD KEY `fk_bco` (`fk_bco`),
  ADD KEY `fk_lot` (`fk_lot`),
  ADD KEY `fk_cme` (`fk_cme`),
  ADD KEY `fk_cat` (`fk_cat`);

--
-- Indexes for table `associados_celulares`
--
ALTER TABLE `associados_celulares`
  ADD PRIMARY KEY (`pk_ace`),
  ADD KEY `pk_ace` (`pk_ace`),
  ADD KEY `fk_ass` (`fk_ass`),
  ADD KEY `numero` (`numero`);

--
-- Indexes for table `bancos`
--
ALTER TABLE `bancos`
  ADD PRIMARY KEY (`pk_bco`),
  ADD KEY `pk_bco` (`pk_bco`),
  ADD KEY `nome` (`nome`);

--
-- Indexes for table `categorias_associados`
--
ALTER TABLE `categorias_associados`
  ADD PRIMARY KEY (`pk_cat`),
  ADD KEY `pk_cat` (`pk_cat`),
  ADD KEY `descricao` (`descricao`);

--
-- Indexes for table `cidades`
--
ALTER TABLE `cidades`
  ADD PRIMARY KEY (`pk_cid`),
  ADD KEY `pk_cid` (`pk_cid`),
  ADD KEY `fk_est` (`fk_est`),
  ADD KEY `nome` (`nome`);

--
-- Indexes for table `classe_mensalidade`
--
ALTER TABLE `classe_mensalidade`
  ADD PRIMARY KEY (`pk_cme`),
  ADD KEY `pk_cme` (`pk_cme`),
  ADD KEY `descricao` (`descricao`);

--
-- Indexes for table `contas_receber`
--
ALTER TABLE `contas_receber`
  ADD PRIMARY KEY (`pk_ctr`),
  ADD KEY `pk_ctr` (`pk_ctr`),
  ADD KEY `fk_ass` (`fk_ass`),
  ADD KEY `fk_ser` (`fk_ser`),
  ADD KEY `data_geracao` (`data_geracao`),
  ADD KEY `data_emis` (`data_emis`),
  ADD KEY `data_venc` (`data_venc`),
  ADD KEY `data_liq` (`data_liq`);

--
-- Indexes for table `dependentes`
--
ALTER TABLE `dependentes`
  ADD PRIMARY KEY (`pk_dep`),
  ADD KEY `pk_dep` (`pk_dep`),
  ADD KEY `fk_ass` (`fk_ass`),
  ADD KEY `fk_tde` (`fk_tde`),
  ADD KEY `nome` (`nome`);

--
-- Indexes for table `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`pk_est`),
  ADD KEY `pk_est` (`pk_est`),
  ADD KEY `fk_pai` (`fk_pai`),
  ADD KEY `nome` (`nome`);

--
-- Indexes for table `lotacoes`
--
ALTER TABLE `lotacoes`
  ADD PRIMARY KEY (`pk_lot`),
  ADD KEY `pk_lot` (`pk_lot`),
  ADD KEY `descricao` (`descricao`);

--
-- Indexes for table `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`pk_pai`),
  ADD KEY `pk_pai` (`pk_pai`),
  ADD KEY `nome` (`nome`);

--
-- Indexes for table `parametros`
--
ALTER TABLE `parametros`
  ADD PRIMARY KEY (`pk_par`),
  ADD KEY `pk_par` (`pk_par`),
  ADD KEY `fk_cid` (`fk_cid`);

--
-- Indexes for table `situacoes`
--
ALTER TABLE `situacoes`
  ADD PRIMARY KEY (`pk_sit`),
  ADD KEY `pk_sit` (`pk_sit`),
  ADD KEY `descricao` (`descricao`);

--
-- Indexes for table `tipos_servicos`
--
ALTER TABLE `tipos_servicos`
  ADD PRIMARY KEY (`pk_ser`),
  ADD KEY `pk_ser` (`pk_ser`),
  ADD KEY `descricao` (`descricao`);

--
-- Indexes for table `tipo_dependentes`
--
ALTER TABLE `tipo_dependentes`
  ADD PRIMARY KEY (`pk_tde`),
  ADD KEY `pk_tde` (`pk_tde`),
  ADD KEY `descricao` (`descricao`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`pk_usu`),
  ADD KEY `pk_usu` (`pk_usu`),
  ADD KEY `nome` (`nome`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `associados`
--
ALTER TABLE `associados`
  MODIFY `pk_ass` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `associados_celulares`
--
ALTER TABLE `associados_celulares`
  MODIFY `pk_ace` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bancos`
--
ALTER TABLE `bancos`
  MODIFY `pk_bco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categorias_associados`
--
ALTER TABLE `categorias_associados`
  MODIFY `pk_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cidades`
--
ALTER TABLE `cidades`
  MODIFY `pk_cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `classe_mensalidade`
--
ALTER TABLE `classe_mensalidade`
  MODIFY `pk_cme` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contas_receber`
--
ALTER TABLE `contas_receber`
  MODIFY `pk_ctr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dependentes`
--
ALTER TABLE `dependentes`
  MODIFY `pk_dep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `estados`
--
ALTER TABLE `estados`
  MODIFY `pk_est` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `lotacoes`
--
ALTER TABLE `lotacoes`
  MODIFY `pk_lot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `paises`
--
ALTER TABLE `paises`
  MODIFY `pk_pai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `parametros`
--
ALTER TABLE `parametros`
  MODIFY `pk_par` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000;

--
-- AUTO_INCREMENT for table `situacoes`
--
ALTER TABLE `situacoes`
  MODIFY `pk_sit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tipos_servicos`
--
ALTER TABLE `tipos_servicos`
  MODIFY `pk_ser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tipo_dependentes`
--
ALTER TABLE `tipo_dependentes`
  MODIFY `pk_tde` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `pk_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `associados`
--
ALTER TABLE `associados`
  ADD CONSTRAINT `fk_banco` FOREIGN KEY (`fk_bco`) REFERENCES `bancos` (`pk_bco`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_categoria` FOREIGN KEY (`fk_cat`) REFERENCES `categorias_associados` (`pk_cat`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cidade_com` FOREIGN KEY (`fk_cid_comerc`) REFERENCES `cidades` (`pk_cid`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cidade_res` FOREIGN KEY (`fk_cid_resid`) REFERENCES `cidades` (`pk_cid`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_classe_mensalidade` FOREIGN KEY (`fk_cme`) REFERENCES `classe_mensalidade` (`pk_cme`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_lotacao` FOREIGN KEY (`fk_lot`) REFERENCES `lotacoes` (`pk_lot`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_situacao` FOREIGN KEY (`fk_sit`) REFERENCES `situacoes` (`pk_sit`) ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `associados_celulares`
--
ALTER TABLE `associados_celulares`
  ADD CONSTRAINT `fk_associado` FOREIGN KEY (`fk_ass`) REFERENCES `associados` (`pk_ass`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `cidades`
--
ALTER TABLE `cidades`
  ADD CONSTRAINT `fk_estado` FOREIGN KEY (`fk_est`) REFERENCES `estados` (`pk_est`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `contas_receber`
--
ALTER TABLE `contas_receber`
  ADD CONSTRAINT `fk_associados_ctr` FOREIGN KEY (`fk_ass`) REFERENCES `associados` (`pk_ass`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tipo_servico` FOREIGN KEY (`fk_ser`) REFERENCES `tipos_servicos` (`pk_ser`) ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `dependentes`
--
ALTER TABLE `dependentes`
  ADD CONSTRAINT `fk_associados` FOREIGN KEY (`fk_ass`) REFERENCES `associados` (`pk_ass`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tipo_dependente` FOREIGN KEY (`fk_tde`) REFERENCES `tipo_dependentes` (`pk_tde`) ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `estados`
--
ALTER TABLE `estados`
  ADD CONSTRAINT `fk_pais` FOREIGN KEY (`fk_pai`) REFERENCES `paises` (`pk_pai`) ON UPDATE NO ACTION;
COMMIT;