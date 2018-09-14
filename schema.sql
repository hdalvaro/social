-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 14-Jul-2017 às 00:48
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `bairro`
--

CREATE TABLE IF NOT EXISTS `bairro` (
  `idbairro` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idbairro`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=417 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `beneficio`
--

CREATE TABLE IF NOT EXISTS `beneficio` (
  `idbeneficio` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) DEFAULT NULL,
  `sigla` varchar(10) DEFAULT NULL,
  `codigo_programa` varchar(40) NOT NULL,
  PRIMARY KEY (`idbeneficio`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidade`
--

CREATE TABLE IF NOT EXISTS `cidade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) NOT NULL,
  `ibge` varchar(50) NOT NULL,
  `id_estado` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `escolaridade`
--

CREATE TABLE IF NOT EXISTS `escolaridade` (
  `idescolaridade` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`idescolaridade`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='		' AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado`
--

CREATE TABLE IF NOT EXISTS `estado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) DEFAULT NULL,
  `sigla` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `instituicao`
--

CREATE TABLE IF NOT EXISTS `instituicao` (
  `idinstituicao` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) DEFAULT NULL,
  `sigla` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idinstituicao`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='		' AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `logradouro`
--

CREATE TABLE IF NOT EXISTS `logradouro` (
  `idlogradouro` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) DEFAULT NULL,
  `id_bairro` int(11) NOT NULL,
  PRIMARY KEY (`idlogradouro`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2375 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE IF NOT EXISTS `pessoa` (
  `idpessoa` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `nis` varchar(45) DEFAULT NULL,
  `cartao_sus` varchar(45) DEFAULT NULL,
  `rg` varchar(45) DEFAULT NULL,
  `id_bairro` int(11) DEFAULT NULL,
  `id_logradouro` int(11) DEFAULT NULL,
  `renda_mensal` double DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `luz_eletrica` smallint(6) DEFAULT NULL,
  `agua_encanada` smallint(6) DEFAULT NULL,
  `moradia` smallint(6) DEFAULT NULL,
  `tipo_moradia` smallint(6) DEFAULT NULL,
  `area_irregular` smallint(6) DEFAULT NULL,
  `esgoto` smallint(6) DEFAULT NULL,
  `numero` varchar(100) DEFAULT NULL,
  `id_cidade` int(11) DEFAULT NULL,
  `data_atualizacao` date DEFAULT NULL,
  `cod_familia` bigint(20) DEFAULT NULL,
  `sexo` smallint(6) DEFAULT NULL,
  `id_estado_origem` int(11) DEFAULT NULL,
  `id_cidade_origem` int(11) DEFAULT NULL,
  `bolsa_familia` smallint(6) DEFAULT NULL,
  `cadastro_unico` smallint(6) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idpessoa`),
  KEY `id_bairro_idx` (`id_bairro`),
  KEY `id_logradouro_idx` (`id_logradouro`),
  KEY `id_cidade_idx` (`id_cidade`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20285 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa_beneficios`
--

CREATE TABLE IF NOT EXISTS `pessoa_beneficios` (
  `idpessoa_beneficios` int(11) NOT NULL AUTO_INCREMENT,
  `id_pessoa` int(11) NOT NULL,
  `id_beneficio` int(11) DEFAULT NULL,
  `data_concessao` date DEFAULT NULL,
  `numero_beneficio` varchar(100) DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `motivo_cancelamento` text,
  `data_cancelamento` date DEFAULT NULL,
  `valor` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`idpessoa_beneficios`),
  KEY `id_pessoa_idx` (`id_pessoa`),
  KEY `id_beneficio_idx` (`id_beneficio`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6455 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `profissao`
--

CREATE TABLE IF NOT EXISTS `profissao` (
  `idprofissao` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idprofissao`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='	' AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `questionario_bpc`
--

CREATE TABLE IF NOT EXISTS `questionario_bpc` (
  `idquestionario_bpc` int(11) NOT NULL AUTO_INCREMENT,
  `id_pessoa` int(11) DEFAULT NULL,
  `data_avaliacao` date DEFAULT NULL,
  `data_atualizacao` date DEFAULT NULL,
  `beneficiario_outro_municipio` smallint(6) DEFAULT NULL,
  `id_razao_pcd` int(11) DEFAULT NULL,
  `integracao_familiar_usuario` varchar(255) DEFAULT NULL,
  `integracao_social_usuario` varchar(255) DEFAULT NULL,
  `passe_livre_tipo` int(11) DEFAULT NULL,
  `usuario_com_dependencia` smallint(6) DEFAULT NULL,
  `situacao_dependencia` varchar(255) DEFAULT NULL,
  `id_principal_cuidador` int(11) DEFAULT NULL,
  `situacao_cuidado` varchar(255) DEFAULT NULL,
  `servico_paefi` smallint(6) DEFAULT NULL,
  `servico_mse` smallint(6) DEFAULT NULL,
  `servico_abordagem_social` smallint(6) DEFAULT NULL,
  `servico_pcd` smallint(6) DEFAULT NULL,
  `id_instituicao_pcd` int(11) DEFAULT NULL,
  `projeto_asses_defesa` smallint(6) DEFAULT NULL,
  `id_instituicao_defesa` int(11) DEFAULT NULL,
  `projeto_mercad_trab` smallint(6) DEFAULT NULL,
  `id_instituicao_merc_trab` int(11) DEFAULT NULL,
  `scfv` smallint(6) DEFAULT NULL,
  `id_instituicao_scfv` int(11) DEFAULT NULL,
  `instituicao_municipal` smallint(6) DEFAULT NULL,
  `id_instituicao_municipal` int(11) DEFAULT NULL,
  `instituicao_fora_municipio` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idquestionario_bpc`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `questionario_bpc_saude`
--

CREATE TABLE IF NOT EXISTS `questionario_bpc_saude` (
  `idquestionario_bpc_saude` int(11) NOT NULL AUTO_INCREMENT,
  `id_questionario` int(11) DEFAULT NULL,
  `esf` smallint(6) DEFAULT NULL,
  `ubs` smallint(6) DEFAULT NULL,
  `capsi` smallint(6) DEFAULT NULL,
  `capsii` smallint(6) DEFAULT NULL,
  `capsad` smallint(6) DEFAULT NULL,
  `sae` smallint(6) DEFAULT NULL,
  `melhor_em_casa` smallint(6) DEFAULT NULL,
  `crmi` smallint(6) DEFAULT NULL,
  `pim` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`idquestionario_bpc_saude`),
  KEY `fk_questionario_bpc_saude_questionario_bpc1_idx` (`id_questionario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `questionario_bpc_trab`
--

CREATE TABLE IF NOT EXISTS `questionario_bpc_trab` (
  `idquestionario_bpc_trab` int(11) NOT NULL AUTO_INCREMENT,
  `id_questionario` int(11) DEFAULT NULL,
  `bpc_trabalho_public` smallint(6) DEFAULT NULL,
  `id_profissao` int(11) DEFAULT NULL,
  `poss_participar_curso` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`idquestionario_bpc_trab`),
  KEY `fk_questionario_bpc_trab_questionario_bpc1_idx` (`id_questionario`),
  KEY `id_profissao_idx` (`id_profissao`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `razao_pcd`
--

CREATE TABLE IF NOT EXISTS `razao_pcd` (
  `idrazao_pcd` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) DEFAULT NULL,
  `sigla` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idrazao_pcd`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_cuidador`
--

CREATE TABLE IF NOT EXISTS `tipo_cuidador` (
  `idtipo_cuidador` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idtipo_cuidador`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `unidade`
--

CREATE TABLE IF NOT EXISTS `unidade` (
  `idunidade` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) DEFAULT NULL,
  `sigla` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idunidade`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `senha` text,
  `perfil_usuario` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_unidade`
--

CREATE TABLE IF NOT EXISTS `usuario_unidade` (
  `idusuario_unidade` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `id_unidade` int(11) DEFAULT NULL,
  PRIMARY KEY (`idusuario_unidade`),
  KEY `id_usuario_idx` (`id_usuario`),
  KEY `id_unidade_idx` (`id_unidade`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `pessoa`
--
ALTER TABLE `pessoa`
  ADD CONSTRAINT `id_bairro` FOREIGN KEY (`id_bairro`) REFERENCES `bairro` (`idbairro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_cidade` FOREIGN KEY (`id_cidade`) REFERENCES `cidade` (`id`),
  ADD CONSTRAINT `id_logradouro` FOREIGN KEY (`id_logradouro`) REFERENCES `logradouro` (`idlogradouro`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pessoa_beneficios`
--
ALTER TABLE `pessoa_beneficios`
  ADD CONSTRAINT `id_beneficio` FOREIGN KEY (`id_beneficio`) REFERENCES `beneficio` (`idbeneficio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `questionario_bpc_saude`
--
ALTER TABLE `questionario_bpc_saude`
  ADD CONSTRAINT `fk_questionario_bpc_saude_questionario_bpc1` FOREIGN KEY (`id_questionario`) REFERENCES `questionario_bpc` (`idquestionario_bpc`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `questionario_bpc_trab`
--
ALTER TABLE `questionario_bpc_trab`
  ADD CONSTRAINT `fk_questionario_bpc_trab_questionario_bpc1` FOREIGN KEY (`id_questionario`) REFERENCES `questionario_bpc` (`idquestionario_bpc`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_profissao` FOREIGN KEY (`id_profissao`) REFERENCES `profissao` (`idprofissao`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuario_unidade`
--
ALTER TABLE `usuario_unidade`
  ADD CONSTRAINT `id_unidade` FOREIGN KEY (`id_unidade`) REFERENCES `unidade` (`idunidade`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
