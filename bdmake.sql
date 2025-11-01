-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01/11/2025 às 06:38
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdmake`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `membros`
--

CREATE TABLE `membros` (
  `id` int(11) NOT NULL,
  `nome` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `senha` varchar(120) NOT NULL,
  `telefone` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `membros`
--

INSERT INTO `membros` (`id`, `nome`, `email`, `senha`, `telefone`) VALUES
(1, 'Street', 'fighter@gmail.com', '9876', '(11) 999569800'),
(2, 'Daniel', 'caesar@gmail.com', '777', '(11) 999569900'),
(3, 'Brent', 'faiyaz@gmail.com', '1602', '(11) 999568888'),
(5, 'Tupac', 'notorius@gmail.com', '888', '(11) 999569855');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `preco` decimal(10,2) DEFAULT NULL,
  `quantidade` int(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `preco`, `quantidade`) VALUES
(1, 'Contorno Glam', 109.90, 20),
(2, 'Pó translúcido', 89.90, 15),
(3, 'Base Dior', 129.90, 30),
(4, 'Batom Matte', 79.90, 25),
(5, 'Base Líquida HD Matte (Cor Nude 3)', 69.90, 50),
(6, 'Corretivo Cremoso de Alta Cobertura (Cor Clara)', 35.50, 75),
(7, 'Pó Compacto Translúcido Banana', 45.00, 60),
(8, 'Máscara de Cílios Alongadora 24h', 39.90, 90),
(9, 'Delineador Líquido Preto Ultra-Fino', 28.50, 100),
(10, 'Paleta de Sombras Neutras (12 Cores)', 89.90, 45),
(11, 'Blush Compacto Rosado Matte', 32.00, 80),
(12, 'Batom Líquido Matte (Cor Vermelho Clássico)', 49.90, 70),
(13, 'Sérum Facial com Vitamina C 10%', 95.00, 40),
(14, 'Hidratante Facial com Ácido Hialurônico (Dia)', 78.90, 55),
(15, 'Protetor Solar Facial FPS 60 Sem Óleo', 55.00, 95),
(16, 'Tônico Adstringente Pós-Limpeza', 38.00, 85),
(17, 'Esfoliante Corporal com Cristais de Quartzo', 42.50, 65),
(18, 'Máscara de Argila Rosa Detox', 29.90, 75),
(19, 'Balm Labial Reparador com Manteiga de Karité', 22.00, 110);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `senha` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`) VALUES
(3, 'Ana', 'ana@gmail.com', '123'),
(4, 'Linda', 'linda@gmail.com', '234'),
(5, 'helena', 'helena@gmail.com', '567'),
(6, 'clara', 'clara@gmail.com', '098'),
(7, 'Joel', 'joel.ellie@gmail.com', '1010'),
(8, 'cindy', 'lauper@gmail.com', '1900'),
(9, 'bruno', 'mars@gmail.com', '2020'),
(10, 'michael', 'jackson@gmail.com', '2009'),
(11, 'rita', 'lee@gmail.com', '3030'),
(12, 'Mariah', 'carey@gmail.com', '444'),
(17, 'chun', 'li@gmail.com', '1900'),
(20, 'elias', 'elias@gmail.com', '987'),
(21, 'Clairo', 'sofia@gmail.com', '214'),
(22, 'Gustavo', 'guanabara@gmail.com', '667'),
(23, 'cayo', 'cayoteste@gmail.com', '12345'),
(25, 'teste', 'teste@gmail.com', 'teste');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `membros`
--
ALTER TABLE `membros`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_unico_membros` (`email`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_unico_usuario` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `membros`
--
ALTER TABLE `membros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
