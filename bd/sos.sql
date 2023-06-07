-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 10/06/2022 às 15:22
-- Versão do servidor: 10.4.19-MariaDB
-- Versão do PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sos`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `cliente_id` int(11) NOT NULL,
  `cliente_nome` varchar(255) DEFAULT NULL,
  `cliente_cpf` varchar(14) DEFAULT NULL,
  `cliente_endereco` varchar(255) DEFAULT NULL,
  `cliente_numero` varchar(10) DEFAULT NULL,
  `cliente_complemento` varchar(100) DEFAULT NULL,
  `cliente_bairro` varchar(100) DEFAULT NULL,
  `cliente_cidade` varchar(100) DEFAULT NULL,
  `cliente_estado` varchar(2) DEFAULT NULL,
  `cliente_pais` varchar(40) DEFAULT NULL,
  `cliente_cep` varchar(10) DEFAULT NULL,
  `cliente_senha` varchar(100) DEFAULT NULL,
  `cliente_email` varchar(100) DEFAULT NULL,
  `cliente_cadastro` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cliente_status` int(11) DEFAULT 1,
  `cliente_rg` varchar(255) DEFAULT NULL,
  `cliente_observacoes` longtext DEFAULT NULL,
  `cliente_nascimento` varchar(255) DEFAULT NULL,
  `cliente_telefone` varchar(255) DEFAULT NULL,
  `cliente_celular` varchar(255) DEFAULT NULL,
  `cliente_instagram` varchar(255) DEFAULT NULL,
  `cliente_quem` int(11) DEFAULT NULL,
  `cliente_empresa` int(11) DEFAULT 1,
  `cliente_lixeira` int(11) DEFAULT 1,
  `cliente_sexo` varchar(255) DEFAULT NULL,
  `cliente_profissao` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`cliente_id`, `cliente_nome`, `cliente_cpf`, `cliente_endereco`, `cliente_numero`, `cliente_complemento`, `cliente_bairro`, `cliente_cidade`, `cliente_estado`, `cliente_pais`, `cliente_cep`, `cliente_senha`, `cliente_email`, `cliente_cadastro`, `cliente_status`, `cliente_rg`, `cliente_observacoes`, `cliente_nascimento`, `cliente_telefone`, `cliente_celular`, `cliente_instagram`, `cliente_quem`, `cliente_empresa`, `cliente_lixeira`, `cliente_sexo`, `cliente_profissao`) VALUES
(1, 'Nome', '999.999.999-99', 'logradouro ', 'numero', 'complemento ', 'bairro ', 'cidade', 'uf', 'Brasil', 'cep', '999.999.999-99', 'email', '2022-06-02 13:16:51', 1, 'RG', 'obs', '2022-06-16', 'Telefone ', 'celular ', 'instagram ', 1, 1, 2, 'M', 'Profissao'),
(2, 'Nome', '4444444444444', '', '', '', '', '', '', 'Brasil', '', '242.424.24', '', '2022-06-03 18:15:36', 1, 'RG', '', '', '', '', '', 1, 1, 1, 'M', ''),
(3, '', '555.555.555', '', '', '', '', '', '', 'Brasil', '', '555.555.555', '', '2022-06-02 19:31:31', 1, '', '', '', '', '', '', 1, 1, 1, 'M', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `contas_areceber`
--

CREATE TABLE `contas_areceber` (
  `conta_areceber_id` int(11) NOT NULL,
  `conta_areceber_cliente` int(11) DEFAULT NULL,
  `conta_areceber_parcela` int(11) DEFAULT NULL,
  `conta_areceber_parcelas` int(11) DEFAULT NULL,
  `conta_areceber_valor_total` decimal(10,2) DEFAULT NULL,
  `conta_areceber_valor_parcela` decimal(10,2) DEFAULT NULL,
  `conta_areceber_vencimento` date DEFAULT NULL,
  `conta_areceber_cadastro` date DEFAULT NULL,
  `conta_areceber_referente` varchar(255) DEFAULT NULL,
  `conta_areceber_quem` int(11) NOT NULL,
  `conta_areceber_empresa` int(11) NOT NULL,
  `conta_areceber_observacoes` varchar(255) NOT NULL,
  `conta_areceber_status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `contas_pagar`
--

CREATE TABLE `contas_pagar` (
  `conta_pagar_id` int(11) NOT NULL,
  `conta_pagar_fornecedor` int(11) DEFAULT NULL,
  `conta_pagar_coloborador` int(11) DEFAULT NULL,
  `conta_pagar_tipo` varchar(255) DEFAULT NULL,
  `conta_pagar_parcela` int(11) DEFAULT NULL,
  `conta_pagar_parcelas` int(11) DEFAULT NULL,
  `conta_pagar_valor_total` decimal(10,2) DEFAULT NULL,
  `conta_pagar_valor_parcela` decimal(10,2) DEFAULT NULL,
  `conta_pagar_vencimento` date DEFAULT NULL,
  `conta_pagar_cadastro` date DEFAULT NULL,
  `conta_pagar_referente` varchar(255) DEFAULT NULL,
  `conta_pagar_quem` int(11) DEFAULT NULL,
  `conta_pagar_empresa` int(11) DEFAULT NULL,
  `conta_pagar_observacoes` varchar(255) DEFAULT NULL,
  `conta_pagar_status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `empresas`
--

CREATE TABLE `empresas` (
  `empresa_id` int(11) NOT NULL,
  `empresa_razaosocial` varchar(255) NOT NULL,
  `empresa_fantasia` varchar(255) NOT NULL,
  `empresa_cnpj` varchar(20) NOT NULL,
  `empresa_endereco` varchar(255) NOT NULL,
  `empresa_numero` varchar(10) NOT NULL,
  `empresa_complemento` varchar(100) NOT NULL,
  `empresa_bairro` varchar(100) NOT NULL,
  `empresa_cidade` varchar(100) NOT NULL,
  `empresa_estado` varchar(2) NOT NULL,
  `empresa_pais` varchar(40) NOT NULL,
  `empresa_cep` varchar(9) NOT NULL,
  `empresa_senha` varchar(100) NOT NULL,
  `empresa_email` varchar(100) NOT NULL,
  `empresa_cadastro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `empresa_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `etiquetas`
--

CREATE TABLE `etiquetas` (
  `etiqueta_id` int(11) NOT NULL,
  `etiqueta_nome` varchar(255) DEFAULT NULL,
  `etiqueta_cor` varchar(255) DEFAULT NULL,
  `etiqueta_quem` int(11) DEFAULT NULL,
  `etiqueta_emp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `etiquetas`
--

INSERT INTO `etiquetas` (`etiqueta_id`, `etiqueta_nome`, `etiqueta_cor`, `etiqueta_quem`, `etiqueta_emp`) VALUES
(1, 'Nome', '#d34a4a', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `fluxo_caixa`
--

CREATE TABLE `fluxo_caixa` (
  `fluxo_caixa_id` int(11) NOT NULL,
  `fluxo_caixa_valor` decimal(10,2) DEFAULT NULL,
  `fluxo_caixa_data` varchar(255) DEFAULT NULL,
  `fluxo_caixa_cliente` varchar(255) DEFAULT NULL,
  `fluxo_caixa_colaboradores` varchar(255) DEFAULT NULL,
  `fluxo_caixa_procedimento` varchar(255) DEFAULT NULL,
  `fluxo_caixa_forma_pagamento` varchar(255) DEFAULT NULL,
  `fluxo_caixa_quem` int(11) DEFAULT NULL,
  `fluxo_caixa_emp` int(11) DEFAULT NULL,
  `fluxo_caixa_lixeira` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `fluxo_caixa`
--

INSERT INTO `fluxo_caixa` (`fluxo_caixa_id`, `fluxo_caixa_valor`, `fluxo_caixa_data`, `fluxo_caixa_cliente`, `fluxo_caixa_colaboradores`, `fluxo_caixa_procedimento`, `fluxo_caixa_forma_pagamento`, `fluxo_caixa_quem`, `fluxo_caixa_emp`, `fluxo_caixa_lixeira`) VALUES
(1, '900.00', '2022-06-28', 'cliente11', 'colaboradores24', 'procedimentosss', 'forma 33', 1, 1, 1),
(2, '100000.00', '2022-06-14', 'cliente', 'colaboradores', 'procedimento', 'forma ', 1, 1, 2),
(3, '800.00', '2022-06-17', 'cliente', 'colaboradores', 'procedimento', 'forma ', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `fornecedor_id` int(11) NOT NULL,
  `fornecedor_nome` varchar(255) DEFAULT NULL,
  `fornecedor_cpf` varchar(20) DEFAULT NULL,
  `fornecedor_telefone` varchar(100) DEFAULT NULL,
  `fornecedor_email` varchar(100) DEFAULT NULL,
  `fornecedor_cep` varchar(20) DEFAULT NULL,
  `fornecedor_numero` varchar(20) DEFAULT NULL,
  `fornecedor_bairro` varchar(100) DEFAULT NULL,
  `fornecedor_cidade` varchar(100) DEFAULT NULL,
  `fornecedor_complemento` varchar(100) DEFAULT NULL,
  `fornecedor_estado` varchar(20) DEFAULT NULL,
  `fornecedor_pais` varchar(40) DEFAULT NULL,
  `fornecedor_quem` int(11) DEFAULT NULL,
  `fornecedor_emp` int(11) DEFAULT NULL,
  `fornecedor_observacoes` longtext DEFAULT NULL,
  `fornecedor_ie` varchar(255) DEFAULT NULL,
  `fornecedor_lixeira` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `fornecedores`
--

INSERT INTO `fornecedores` (`fornecedor_id`, `fornecedor_nome`, `fornecedor_cpf`, `fornecedor_telefone`, `fornecedor_email`, `fornecedor_cep`, `fornecedor_numero`, `fornecedor_bairro`, `fornecedor_cidade`, `fornecedor_complemento`, `fornecedor_estado`, `fornecedor_pais`, `fornecedor_quem`, `fornecedor_emp`, `fornecedor_observacoes`, `fornecedor_ie`, `fornecedor_lixeira`) VALUES
(1, 'Nome', '1313131', 'Telefone ', 'email', 'cep', 'numero', 'bairro ', 'cidade', 'complemento ', 'uf', 'Brasil', 1, 1, 'obs', 'ie', 2),
(2, 'Nome', '788788787', 'Telefone ', 'email', 'cep', 'numero', '', '', '', '', 'Brasil', 1, 1, '', 'ie', 2),
(3, '', '464622323463', '', '', '', '', '', '', '', '', 'Brasil', 1, 1, '', '', 2),
(4, '', '4242424242', '', '', '', '', '', '', '', '', 'Brasil', 1, 1, '', '', 2),
(5, '75575', '', 'Telefone 7575', '7575757', '7575', '442424', '5789', '135987', '4444488', '11635', 'Brasil', 1, 1, '4588783456', '7557', 2),
(6, 'teste', '', '3131313131', 'email@email', 'cep', 'numero', 'bairro ', 'cidade', 'complemento ', 'uf', 'Brasil', 1, 1, 'obs', 'teste', 1),
(7, '', '31313131313', '', '', '', '', '', '', '', '', 'Brasil', 1, 1, '', '', 1),
(8, '', '445545', '', '', '', '', '', '', '', '', 'Brasil', 1, 1, '', '', 1),
(9, '', '67776', '', '', '', '', '', '', '', '', 'Brasil', 1, 1, '', '', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tarefas`
--

CREATE TABLE `tarefas` (
  `tarefa_id` int(11) NOT NULL,
  `tarefa_titulo` varchar(255) DEFAULT NULL,
  `tarefa_cliente` varchar(255) DEFAULT NULL,
  `tarefa_tarefa` longtext DEFAULT NULL,
  `tarefa_para` int(11) DEFAULT NULL,
  `tarefa_prazo` datetime DEFAULT NULL,
  `tarefa_quem` int(11) DEFAULT NULL,
  `tarefa_lixeira` int(11) DEFAULT 1,
  `tarefa_emp` int(11) DEFAULT NULL,
  `tarefa_hora` varchar(255) DEFAULT NULL,
  `tarefa_etiqueta` varchar(255) DEFAULT NULL,
  `tarefa_tipo` int(11) DEFAULT 1,
  `tarefa_observacoes` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `tarefas`
--

INSERT INTO `tarefas` (`tarefa_id`, `tarefa_titulo`, `tarefa_cliente`, `tarefa_tarefa`, `tarefa_para`, `tarefa_prazo`, `tarefa_quem`, `tarefa_lixeira`, `tarefa_emp`, `tarefa_hora`, `tarefa_etiqueta`, `tarefa_tipo`, `tarefa_observacoes`) VALUES
(27, 'Título', 'Tarefa Cliente', 'Tarefa', 1, '2022-06-10 18:44:00', 1, 1, 1, NULL, '#000000', 1, 'Observações'),
(28, 'Título', 'Tarefa Cliente', 'Tarefa', 1, '2022-06-23 08:14:00', 1, 1, 1, NULL, '#ff0000', 1, 'Observações'),
(29, 'Título', 'Tarefa Cliente', 'Tarefa', 1, '2022-06-08 07:12:00', 1, 1, 1, NULL, '#d5aec7', 1, 'Observações'),
(30, 'Título ', 'Tarefa Cliente', 'Tarefa', 5, '2022-06-17 17:12:00', 1, 1, 1, NULL, '#000000', 1, 'Observações'),
(31, 'Título', 'Tarefa Cliente', 'Tarefa', 5, '2022-06-17 17:12:00', 1, 1, 1, NULL, '#000000', 1, 'Observações'),
(32, 'Título', 'sos dos elevadores', 'Tarefa', 1, '2022-06-09 08:03:00', 1, 1, 1, NULL, '#429e8c', 1, 'Entrar em contato com o cliente e passar o orçamento '),
(33, 'Título', 'Tarefa Cliente', 'Tarefa', 6, '2022-06-10 11:50:00', 1, 1, 1, NULL, '#e2ee44', 1, 'Observações'),
(34, '42424242424', 'cliente', 'eqeqe', 5, '2022-06-09 14:31:00', 1, 1, 1, NULL, '#5fb465', 1, '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_nome` varchar(255) NOT NULL,
  `user_login` varchar(100) NOT NULL,
  `user_senha` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_cadastro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_status` int(11) NOT NULL DEFAULT 1,
  `user_quem` int(11) NOT NULL,
  `user_emp` int(11) NOT NULL,
  `user_telefone` varchar(255) NOT NULL,
  `user_lixeira` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`user_id`, `user_nome`, `user_login`, `user_senha`, `user_email`, `user_cadastro`, `user_status`, `user_quem`, `user_emp`, `user_telefone`, `user_lixeira`) VALUES
(1, 'ADM', 'adm', '$2y$10$zMs6tyTnX.f9dJdS4JPPQezmiXi7YMu7c3b8Q1eVz4L9RhG1xRSo2', 'Email@Email', '2022-06-08 17:38:50', 1, 1, 1, '319912345678', 2),
(5, 'Nome1', 'Teste', '4224244', 'email@email3131831', '2022-06-08 17:16:07', 1, 1, 1, '3199999999', 1),
(6, 'Nome5', 'teste12', '$2y$10$yBUGWg0m2oasqVooP60Am.00XIloE4ttUZ2b1rDyuwvCs8fZBX.yq', 'email@email', '2022-06-08 17:21:37', 1, 1, 1, 'Telefone ', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cliente_id`);

--
-- Índices de tabela `contas_areceber`
--
ALTER TABLE `contas_areceber`
  ADD PRIMARY KEY (`conta_areceber_id`);

--
-- Índices de tabela `contas_pagar`
--
ALTER TABLE `contas_pagar`
  ADD PRIMARY KEY (`conta_pagar_id`);

--
-- Índices de tabela `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`empresa_id`);

--
-- Índices de tabela `etiquetas`
--
ALTER TABLE `etiquetas`
  ADD PRIMARY KEY (`etiqueta_id`);

--
-- Índices de tabela `fluxo_caixa`
--
ALTER TABLE `fluxo_caixa`
  ADD PRIMARY KEY (`fluxo_caixa_id`);

--
-- Índices de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`fornecedor_id`);

--
-- Índices de tabela `tarefas`
--
ALTER TABLE `tarefas`
  ADD PRIMARY KEY (`tarefa_id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `cliente_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `contas_areceber`
--
ALTER TABLE `contas_areceber`
  MODIFY `conta_areceber_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `contas_pagar`
--
ALTER TABLE `contas_pagar`
  MODIFY `conta_pagar_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `empresas`
--
ALTER TABLE `empresas`
  MODIFY `empresa_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `etiquetas`
--
ALTER TABLE `etiquetas`
  MODIFY `etiqueta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `fluxo_caixa`
--
ALTER TABLE `fluxo_caixa`
  MODIFY `fluxo_caixa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `fornecedor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tarefas`
--
ALTER TABLE `tarefas`
  MODIFY `tarefa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
