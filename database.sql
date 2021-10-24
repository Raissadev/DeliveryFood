-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Out-2021 às 00:20
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `delivery`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `foods`
--

CREATE TABLE `foods` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `image_transparent` varchar(255) NOT NULL,
  `energy` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `foods`
--

INSERT INTO `foods` (`id`, `name`, `description`, `price`, `image`, `image_transparent`, `energy`, `weight`) VALUES
(1, 'Burger Fat', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus pellentesque aliquam blandit. Ut diam quam, luctus ultricies tortor vitae, ultricies finibus lacus. Duis viverra tortor quis est facilisis pretium. Etiam sit amet dolor velit. Orci varius na', '19.95', 'foodOne.jpg', 'foodBgTransparentOne.png', '554', '396'),
(3, 'Pizza Calabresa', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc congue sapien tincidunt, luctus tortor eget, mollis nunc. Donec eget dui id est lacinia congue ut quis est. Vestibulum aliquam elit et sem viverra ullamcorper. Nullam massa purus, pellentesque ', '20.00', 'foodTwo.jpg', 'foodBgTransparentTwo.png', '493', '267'),
(6, 'Panquecas de Mirtilos', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vel rhoncus lorem. Duis volutpat dignissim nisi at pretium. Etiam sit amet erat in lectus feugiat rutrum. Duis quis dui vitae sem sodales viverra. Phasellus at blandit nisi. Maecenas vitae ', '67.99', 'foodThree.jpg', 'foodBgTransparentThree.png', '764', '354'),
(7, 'Chocolate com Nozes', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vel rhoncus lorem. Duis volutpat dignissim nisi at pretium. Etiam sit amet erat in lectus feugiat rutrum. Duis quis dui vitae sem sodales viverra. Phasellus at blandit nisi. Maecenas vitae ', '99.99', 'foodFour.jpg', 'foodBgTransparentFour.png', '865', '467'),
(8, 'Torta de Chocolate', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vel rhoncus lorem. Duis volutpat dignissim nisi at pretium. Etiam sit amet erat in lectus feugiat rutrum. Duis quis dui vitae sem sodales viverra. Phasellus at blandit nisi. Maecenas vitae ', '89.99', 'foodFive.jpg', 'foodBgTransparentFive.png', '890', '590'),
(9, 'Queijo Italiano', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vel rhoncus lorem. Duis volutpat dignissim nisi at pretium. Etiam sit amet erat in lectus feugiat rutrum. Duis quis dui vitae sem sodales viverra. Phasellus at blandit nisi. Maecenas vitae ', '49.99', 'foodSix.jpg', 'foodBgTransparentSix.png', '490', '230'),
(10, 'Taco de Carne', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vel rhoncus lorem. Duis volutpat dignissim nisi at pretium. Etiam sit amet erat in lectus feugiat rutrum. Duis quis dui vitae sem sodales viverra. Phasellus at blandit nisi. Maecenas vitae ', '89.99', 'foodSeven.jpg', 'foodBgTransparentSeven.png', '890', '550');

-- --------------------------------------------------------

--
-- Estrutura da tabela `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `card_number` varchar(255) NOT NULL,
  `date_valid` varchar(255) NOT NULL,
  `cvv` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `product_id`, `payment_id`, `card_number`, `date_valid`, `cvv`, `amount`, `created`) VALUES
(1, '1', '1', '12', '4929 5379 1093 3770', '24/05/2022', '124', '79.99', '2021-10-24'),
(2, '12', '3', '12345', '4532 2193 5844 6123', '24/02/2023', '589', '89.99', '2021-10-24'),
(24, '1', '3, 3, 1', '123', '4716 9129 7370 8400', '24/10/2022', '102', '139.95', '2021-10-24');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `stars` int(11) DEFAULT 1,
  `feedback` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `ratings`
--

INSERT INTO `ratings` (`id`, `id_product`, `id_user`, `stars`, `feedback`) VALUES
(1, 1, 1, 4, 'Excelente'),
(2, 3, 12, 3, 'Muito bom'),
(3, 6, 13, 5, 'Ual!'),
(4, 7, 13, 1, 'Nossa!'),
(5, 8, 12, 5, 'Muito bom!'),
(6, 9, 1, 4, 'Queijo Excelente!'),
(7, 10, 12, 5, 'Tacos excelentes!');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `road` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `user`, `password`, `email`, `image`, `type`, `latitude`, `longitude`, `road`) VALUES
(1, 'RaissaDev', '123456', 'raissa.fullstack@gmail.com', 'avatar.png', 'admin', ' -15.7801', '-47.9292', 'Lorem ipsum'),
(12, 'Jhon Doe', '123456', 'jhon@doe.com', 'userSeven.jpg', 'user', '1092873', '9012912', 'Amet Dolor'),
(13, 'Amanda Doe', '123456', 'amanda@doe.com', 'profile.png', 'user', '2109832', '1092388', 'Sis am'),
(14, 'Derick Doe', '123456', 'derick@doe.com', 'userSeven.jpg', 'user', '891273', '1289037', 'Amet sis');

-- --------------------------------------------------------

--
-- Estrutura da tabela `visits`
--

CREATE TABLE `visits` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `day` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `visits`
--

INSERT INTO `visits` (`id`, `ip`, `day`) VALUES
(0, '123.342.324', '2021-10-21'),
(0, '635.983.238', '2021-10-24'),
(0, '182.928.239', '2021-10-23'),
(0, '897.219.213', '2021-10-22');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `foods`
--
ALTER TABLE `foods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
