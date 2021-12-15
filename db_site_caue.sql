-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2021 at 06:59 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_site_caue`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb-admin_visitas`
--

CREATE TABLE `tb-admin_visitas` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `dia` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb-admin_visitas`
--

INSERT INTO `tb-admin_visitas` (`id`, `ip`, `dia`) VALUES
(1, '::1', '2021-10-25'),
(3, '::1', '2021-10-26'),
(4, '::1', '2021-10-26'),
(5, '::1', '2021-10-27'),
(6, '::1', '2021-10-27'),
(7, '192.168.1.114', '2021-10-28'),
(8, '::1', '2021-10-29'),
(9, '::1', '2021-10-29'),
(10, '::1', '2021-10-30'),
(11, '::1', '2021-10-30'),
(12, '::1', '2021-10-30'),
(13, '::1', '2021-10-30'),
(14, '::1', '2021-11-06'),
(15, '::1', '2021-11-16'),
(16, '::1', '2021-11-16'),
(17, '::1', '2021-11-27'),
(18, '::1', '2021-11-27');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin_config`
--

CREATE TABLE `tb_admin_config` (
  `id` int(1) NOT NULL,
  `titulo_site` varchar(255) NOT NULL,
  `titulo_1` varchar(255) NOT NULL,
  `descricao_1` text NOT NULL,
  `titulo_2` varchar(255) NOT NULL,
  `descricao_2` text NOT NULL,
  `link_you` varchar(255) NOT NULL,
  `link_face` varchar(255) NOT NULL,
  `link_insta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin_config`
--

INSERT INTO `tb_admin_config` (`id`, `titulo_site`, `titulo_1`, `descricao_1`, `titulo_2`, `descricao_2`, `link_you`, `link_face`, `link_insta`) VALUES
(1, 'UNV Networt', 'O que nós fazemos', 'Sua arte é importante, mostre sua imaginação com estilo. Temas WordPress modernos, limpos e fáceis de usar para profissionais criativos.\r\n', 'Sobre nós', 'Somos um pequeno grupo de designers e arquitetos apaixonados, procurando mudar e criar imagens digitais incríveis para inspirar outras pessoas a seguirem nossos passos inovadores..', 'https://www.youtube.com/c/UVNNETWORK', 'https://www.facebook.com/', 'https://www.instagram.com/');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin_online`
--

CREATE TABLE `tb_admin_online` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `ultima_acao` datetime NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin_online`
--

INSERT INTO `tb_admin_online` (`id`, `ip`, `ultima_acao`, `token`) VALUES
(36, '::1', '2021-11-27 21:40:53', '61a2cf8de1feb'),
(37, '::1', '2021-11-27 21:41:43', '61a2d0473d4de');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin_users`
--

CREATE TABLE `tb_admin_users` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `cargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin_users`
--

INSERT INTO `tb_admin_users` (`id`, `nome`, `email`, `senha`, `img`, `cargo`) VALUES
(3, 'Marcos ', 'mmuramota1@gmail.com', 'adminDe', '617b2b522a6e8.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_site_posts`
--

CREATE TABLE `tb_site_posts` (
  `id` int(11) NOT NULL,
  `titulo_post` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_site_posts`
--

INSERT INTO `tb_site_posts` (`id`, `titulo_post`, `descricao`, `img`, `order_id`) VALUES
(124, 'Christopher Robin - Um Reencontro Inesquecível | Antes e Depois do Elenco (2018) 2021', 'Before and After / Then And Now / Gifted Hands: The Ben Carson Story / Idades e Parceiros na Vida Real / Real Partners and Ages / Globo / Sessão da Tarde / Gloobo / Record / Sbt / TempeBefore and After / Then And Now / Gifted Hands: The Ben Carson Story / Idades e Parceiros na Vida Real / Real Partners and Ages / Globo / Sessão da Tarde / Gloobo / Record / Sbt / Temperatura Máxima / Sessão Aventura / Cine Maior / Filme Completo Dublado/ Christopher Robin (bra: Christopher Robin - Um Reencontro Inesquecível; prt: Christopher Robin) é um filme estadunidense de 2018, do gênero comédia dramático-musical-aventuresco-fantástica, dirigido por Marc Forster, com roteiro de Alex Ross Perry, Tom McCarthy e Allison Schroeder baseados no livro Winnie-the-Pooh, de A. A. Milne e E. H. Shepard.', '617ddc0aaa290.png', 1),
(125, 'Christopher Robin - Um Reencontro Inesquecível | Antes e Depois do Elenco (2018) 2021', 'Christopher Robin - Um Reencontro Inesquecível | Antes e Depois do Elenco (2018) 2021Christopher Robin - Um Reencontro Inesquecível | Antes e Depois do Elenco (2018) 2021Christopher Robin - Um Reencontro Inesquecível | Antes e Depois do Elenco (2018) 2021', '617ddc2a49645.png', 2),
(126, 'Jurassic World: Reino Ameaçado | Antes e Depois do Elenco (2018) 2021', 'dirigido por J. A. Bayona, com roteiro de Colin Trevorrow e Derek Connolly baseado nos personagens de Jurassic Park, de Michael Crichton./ É o quinto da franquia Jurassic Park e a sequência direta de Jurassic World. Colin Trevorrow, diretor de Jurassic World, e Derek Connolly retornaram como roteiristas. Belén Atienza, Frank Marshall e Patrick Crowleye ficaram responsáveis pela produção, enquanto Trevorrow e Steven Spielberg, diretor dos dois primeiros longas da série de filmes, encabeçam a produção executiva. Tela quente: ‘Jurassic World: Reino ameaçado’ é exibido nesta segunda (20/9)/ O filme ‘Jurassic World: Reino ameaçado’ tem os atores Chris Pratt, Bryce Dallas Howard, Rafe Spall no elenco / Tela Quente de hoje (20/9): Globo exibe filme Jurassic World - Reino Ameaçado ./ Tela Quente exibe o filme Jurassic World: Reino Ameaçado ', '617ddc52d7c24.png', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_site_posts_indi`
--

CREATE TABLE `tb_site_posts_indi` (
  `id` int(11) NOT NULL,
  `sub_titulo` varchar(255) NOT NULL,
  `sub_descricao` text NOT NULL,
  `id_post` int(11) NOT NULL,
  `imagem_sub` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_site_posts_indi`
--

INSERT INTO `tb_site_posts_indi` (`id`, `sub_titulo`, `sub_descricao`, `id_post`, `imagem_sub`, `order_id`) VALUES
(36, '2', '2', 119, '617c475186a0f.PNG', 1),
(37, '3', '3', 119, '617c475190520.PNG', 2),
(38, '4', '4', 119, '617c475191bab.PNG', 3),
(39, 'sem conhecimento sem chance', 'Porque nós o usamos?\r\nÉ um fato conhecido de todos que um leitor se distrairá com o conteúdo de texto legível de uma página quando estiver examinando sua diagramação. A vantagem de usar Lorem Ipsum é que ele tem uma distribuição normal de letras, ao contrário de \"Conteúdo aqui, conteúdo aqui\", fazendo com que ele tenha uma aparência similar a de um texto legível. Muitos softwares de publicação e editores de páginas na internet agora usam Lorem Ipsum como texto-modelo padrão, e uma rápida busca por \'lorem ipsum\' mostra vários websites ainda em sua fase de construção. Várias versões novas surgiram ao longo dos anos, eventualmente por acidente, e às vezes de propósito (injetando humor, e coisas do gênero).', 120, '617c4db696372.PNG', 4),
(40, 'terceiro título va mos lá hahaha...', 'Porque nós o usamos?\r\nÉ um fato conhecido de todos que um leitor se distrairá com o conteúdo de texto legível de uma página quando estiver examinando sua diagramação. A vantagem de usar Lorem Ipsum é que ele tem uma distribuição normal de letras, ao contrário de \"Conteúdo aqui, conteúdo aqui\", fazendo com que ele tenha uma aparência similar a de um texto legível. Muitos softwares de publicação e editores de páginas na internet agora usam Lorem Ipsum como texto-modelo padrão, e uma rápida busca por \'lorem ipsum\' mostra vários websites ainda em sua fase de construção. Várias versões novas surgiram ao longo dos anos, eventualmente por acidente, e às vezes de propósito (injetando humor, e coisas do gênero).', 120, '617c4db697c30.PNG', 5),
(41, 'quardo-titulo', 'Porque nós o usamos?\r\nÉ um fato conhecido de todos que um leitor se distrairá com o conteúdo de texto legível de uma página quando estiver examinando sua diagramação. A vantagem de usar Lorem Ipsum é que ele tem uma distribuição normal de letras, ao contrário de \"Conteúdo aqui, conteúdo aqui\", fazendo com que ele tenha uma aparência similar a de um texto legível. Muitos softwares de publicação e editores de páginas na internet agora usam Lorem Ipsum como texto-modelo padrão, e uma rápida busca por \'lorem ipsum\' mostra vários websites ainda em sua fase de construção. Várias versões novas surgiram ao longo dos anos, eventualmente por acidente, e às vezes de propósito (injetando humor, e coisas do gênero).', 120, '617c4db699474.PNG', 6),
(42, 'asdf', 'asdf', 121, '617d82f173b9c.PNG', 7),
(43, 'asdf', 'asf', 122, '617d82fd726fc.PNG', 8),
(44, 'asdf', 'asdf', 123, '617d8865176fc.PNG', 9),
(45, 'Christopher Robin - Um Reencontro Inesquecível | Antes e Depois do Elenco (2018) 2021', 'Before and After / Then And Now / Gifted Hands: The Ben Carson Story / Idades e Parceiros na Vida Real / Real Partners and Ages / Globo / Sessão da Tarde / Gloobo / Record / Sbt / TempeBefore and After / Then And Now / Gifted Hands: The Ben Carson Story / Idades e Parceiros na Vida Real / Real Partners and Ages / Globo / Sessão da Tarde / Gloobo / Record / Sbt / Temperatura Máxima / Sessão Aventura / Cine Maior / Filme Completo Dublado/ Christopher Robin (bra: Christopher Robin - Um Reencontro Inesquecível; prt: Christopher Robin) é um filme estadunidense de 2018, do gênero comédia dramático-musical-aventuresco-fantástica, dirigido por Marc Forster, com roteiro de Alex Ross Perry, Tom McCarthy e Allison Schroeder baseados no livro Winnie-the-Pooh, de A. A. Milne e E. H. Shepard.', 124, '617ddc0ab1008.png', 10),
(46, 'Christopher Robin - Um Reencontro Inesquecível | Antes e Depois do Elenco (2018) 2021', 'Before and After / Then And Now / Gifted Hands: The Ben Carson Story / Idades e Parceiros na Vida Real / Real Partners and Ages / Globo / Sessão da Tarde / Gloobo / Record / Sbt / TempeBefore and After / Then And Now / Gifted Hands: The Ben Carson Story / Idades e Parceiros na Vida Real / Real Partners and Ages / Globo / Sessão da Tarde / Gloobo / Record / Sbt / Temperatura Máxima / Sessão Aventura / Cine Maior / Filme Completo Dublado/ Christopher Robin (bra: Christopher Robin - Um Reencontro Inesquecível; prt: Christopher Robin) é um filme estadunidense de 2018, do gênero comédia dramático-musical-aventuresco-fantástica, dirigido por Marc Forster, com roteiro de Alex Ross Perry, Tom McCarthy e Allison Schroeder baseados no livro Winnie-the-Pooh, de A. A. Milne e E. H. Shepard.', 124, '617ddc0ab537f.png', 11),
(47, 'Christopher Robin - Um Reencontro Inesquecível | Antes e Depois do Elenco (2018) 2021', 'Before and After / Then And Now / Gifted Hands: The Ben Carson Story / Idades e Parceiros na Vida Real / Real Partners and Ages / Globo / Sessão da Tarde / Gloobo / Record / Sbt / TempeBefore and After / Then And Now / Gifted Hands: The Ben Carson Story / Idades e Parceiros na Vida Real / Real Partners and Ages / Globo / Sessão da Tarde / Gloobo / Record / Sbt / Temperatura Máxima / Sessão Aventura / Cine Maior / Filme Completo Dublado/ Christopher Robin (bra: Christopher Robin - Um Reencontro Inesquecível; prt: Christopher Robin) é um filme estadunidense de 2018, do gênero comédia dramático-musical-aventuresco-fantástica, dirigido por Marc Forster, com roteiro de Alex Ross Perry, Tom McCarthy e Allison Schroeder baseados no livro Winnie-the-Pooh, de A. A. Milne e E. H. Shepard.', 124, '617ddc0ab6b9c.png', 12),
(48, 'Christopher Robin - Um Reencontro Inesquecível | Antes e Depois do Elenco (2018) 2021', 'Christopher Robin - Um Reencontro Inesquecível | Antes e Depois do Elenco (2018) 2021Christopher Robin - Um Reencontro Inesquecível | Antes e Depois do Elenco (2018) 2021', 125, '617ddc2a5308d.png', 13),
(49, 'Jurassic World: Reino Ameaçado | Antes e Depois do Elenco (2018) 2021', 'dirigido por J. A. Bayona, com roteiro de Colin Trevorrow e Derek Connolly baseado nos personagens de Jurassic Park, de Michael Crichton./ É o quinto da franquia Jurassic Park e a sequência direta de Jurassic World. Colin Trevorrow, diretor de Jurassic World, e Derek Connolly retornaram como roteiristas. Belén Atienza, Frank Marshall e Patrick Crowleye ficaram responsáveis pela produção, enquanto Trevorrow e Steven Spielberg, diretor dos dois primeiros longas da série de filmes, encabeçam a produção executiva. Tela quente: ‘Jurassic World: Reino ameaçado’ é exibido nesta segunda (20/9)/ O filme ‘Jurassic World: Reino ameaçado’ tem os atores Chris Pratt, Bryce Dallas Howard, Rafe Spall no elenco / Tela Quente de hoje (20/9): Globo exibe filme Jurassic World - Reino Ameaçado ./ Tela Quente exibe o filme Jurassic World: Reino Ameaçado ', 126, '617ddc52e29f7.png', 14);

-- --------------------------------------------------------

--
-- Table structure for table `tb_site_slides`
--

CREATE TABLE `tb_site_slides` (
  `id` int(11) NOT NULL,
  `titulo_slide` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `codigo_slide` text NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_site_slides`
--

INSERT INTO `tb_site_slides` (`id`, `titulo_slide`, `descricao`, `codigo_slide`, `order_id`) VALUES
(17, 'A Família Addams | Antes e Depois do Elenco (1991) 2021', 'The Addams Family (prt/bra: A Família Addams) é um filme americano de humor negro baseado na série de quadrinhos homônima criada pelo cartunista Charles \\ A Família Addams na Sessão de Sábado: Veja como está o elenco depois de 30 anos ... - A Família Addams: veja como está o elenco, 30 anos depois \\ A Família Addams 2 chega aos cinemas com divertida história', '<iframe width=\"727\" height=\"409\" src=\"https://www.youtube.com/embed/DOWNXv7LTJg\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 1),
(18, 'Sky High - Super Escola de Heróis | Antes e Depois do Elenco (2005) 2021', 'Sky High (bra: Super Escola de Heróis ou Sky High - Super Escola de Heróis; prt: Escola de Heróis ou Sky High - Escola de Heróis) é um filme estadunidense, Sky High (Escola de Heróis), Super Escola de Heróis na Sessão da Tarde (29/10): Estúdio barrou homenagem à Mulher-Maravilha no filme; entenda, Filme de super-heróis é estrelado por Kurt Russell — que já trabalhou com Quentin Tarantino em Os Oito Odiados., Sessão da Tarde exibe o filme Super Escola de Heróis nesta ', '<iframe width=\"727\" height=\"409\" src=\"https://www.youtube.com/embed/F8ZcM5YzQ1I\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 2),
(19, 'Velozes & Furiosos 5: Operação Rio | Antes e Depois do Elenco (2011) ', 'Fast Five (Velocidade Furiosa 5), Fast Five (bra: Velozes e Furiosos 5: Operação Rio; prt: Velocidade Furiosa 5) é um filme estadunidense de 2011, do gênero ação, dirigido por Justin Lin, Globo exibe “Velozes & Furiosos 5 – Operação Rio” no Temperatura Máxima deste domingo, Filme da Temperatura Máxima de Domingo (24/10): Velozes & Furiosos 5 – Operação Rio, Velozes & Furiosos 5 - Operação Rio na Temperatura Máxima (24/10): Dwayne Johnson quase ficou de ', '<iframe width=\"727\" height=\"409\" src=\"https://www.youtube.com/embed/3_ynkFR3pKw\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 3),
(20, 'Buffy, a Caça-Vampiros | Antes e Depois do Elenco (1997) 2021', 'Buffy, a Caça-Vampiros, no Brasil, e Buffy - Caçadora de Vampiros, em Portugal) é uma série de televisão estadunisense de drama sobrenatural criada por Joss Whedon com a Mutant Enemy Productions e com os posteriores coprodutores executivos sendo Jane Espenson, David Fury, e Marti Noxon. A série estreou em 10 de março de 1997, no The WB e concluiu em 20 de maio de 2003, na UPN. A narrativa segue a vida de Buffy Summers (Sarah Michelle Gellar), a mais recente numa linha de jovens mulheres conhecidas como Caçadoras. As Caçadoras são escolhidas pelo destino para a batalha contra vampiros, demónios, e outras forças das trevas. Tal como anteriores Caçadoras, Buffy é auxiliada por um Conselho de Observadores, que orienta, ensina, e as conduz. Contrariamente às suas antecessoras, Buffy tinha um círculo de amigos leais, que se tornou conhecido como o \"Scooby Gang\".\r\n', '<iframe width=\"727\" height=\"409\" src=\"https://www.youtube.com/embed/nu2R16lkBo0\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 4),
(21, 'Christopher Robin - Um Reencontro Inesquecível | Antes e Depois do Elenco (2018) 2021', 'Sbt / Temperatura Máxima / Sessão Aventura / Cine Maior / Filme Completo Dublado/ Christopher Robin (bra: Christopher Robin - Um Reencontro Inesquecível; prt: Christopher Robin) é um filme estadunidense de 2018, do gênero comédia dramático-musical-aventuresco-fantástica, dirigido por Marc Forster, com roteiro de Alex Ross Perry, Tom McCarthy e Allison Schroeder baseados no livro Winnie-the-Pooh, de A. A. Milne e E. H. Shepard.\r\n', '<iframe width=\"727\" height=\"409\" src=\"https://www.youtube.com/embed/SBuSrtgR8iI\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_site_videos`
--

CREATE TABLE `tb_site_videos` (
  `id` int(11) NOT NULL,
  `titulo_video` varchar(255) NOT NULL,
  `codigo_video` text NOT NULL,
  `descricao` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_site_videos`
--

INSERT INTO `tb_site_videos` (`id`, `titulo_video`, `codigo_video`, `descricao`, `img`, `order_id`) VALUES
(31, 'A Família Addams | Antes e Depois do Elenco (1991) 2021', '<iframe width=\"727\" height=\"409\" src=\"https://www.youtube.com/embed/DOWNXv7LTJg\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', ' The Addams Family (prt/bra: A Família Addams) é um filme americano de humor negro baseado na série de quadrinhos homônima criada pelo cartunista Charles \\ A Família Addams na Sessão de Sábado: Veja como está o elenco depois de 30 anos ... - A Família Addams: veja como está o elenco, 30 anos depois \\ A Família Addams 2 chega aos cinemas com divertida história', '617dd896611ff.png', 2),
(32, 'Sky High - Super Escola de Heróis | Antes e Depois do Elenco (2005) 2021', 'asdf', 'asdf', '617dd8c8835bd.png', 1),
(34, 'Romeu e Julieta | Antes e Depois do Elenco (2013) 2021', 'asdf', 'asdf', '617dd8e300d95.png', 4),
(38, 'Buffy, a Caça-Vampiros | Antes e Depois do Elenco (1997) 2021', 'sadf', 'asf', '617dd98889e43.png', 8),
(39, 'Extraordinário | Antes e Depois do Elenco (2017) 2021', 'asdf', 'asdf', '617dd99f60e68.png', 9),
(40, 'Goosebumps: Monstros e Arrepios | Antes e Depois do Elenco (2015) 2021', 'asdf', 'asdf', '617dd9afe78e4.png', 12),
(42, 'As Loucuras de Dick e Jane | Antes e Depois do Elenco (2005) 2021', 'asdf', 'asdf', '617dd9cd6dd4a.png', 10),
(43, 'E.T. O Extraterrestre | Antes e Depois do Elenco (1982) 2021', '<iframe width=\"727\" height=\"409\" src=\"https://www.youtube.com/embed/_HyhZ1k-OeI\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', ' E.T. the Extra-Terrestrial (bra/prt: E.T. O Extraterrestre) é um filme americano de ficção científica de 1982 produzido e dirigido por Steven Spielberg e escrito por Melissa Mathison. O filme apresenta efeitos especiais de Carlo Rambaldi e Dennis Muren e é estrelado por Henry Thomas, Dee Wallace, Peter Coyote, Robert MacNaughton, Drew Barrymore e Pat Welsh. A produção conta a história de Elliott, um menino que faz amizade com um extraterrestre, apelidado de \"E.T\", que está preso na Terra; Elliott e seus irmãos ajudam o ET a retornar ao seu planeta natal enquanto tentam mantê-lo escondido do governo. \'ET\': Confira 11 curiosidades do filme que conquista gerações desde 1982\r\n', '617dd9fb67121.png', 13),
(44, 'Sky High - Super Escola de Heróis | Antes e Depois do Elenco (2005) 2021', 'asdf', 'asdf', '617ddd5e90519.png', 14),
(45, 'Sky High - Super Escola de Heróis | Antes e Depois do Elenco (2005) 2021', '<iframe width=\"727\" height=\"409\" src=\"https://www.youtube.com/embed/F8ZcM5YzQ1I\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>021', ' Escola de Heróis ou Sky High - Escola de Heróis) é um filme estadunidense, Sky High (Escola de Heróis), Super Escola de Heróis na Sessão da Tarde (29/10): Estúdio barrou homenagem à Mulher-Maravilha no filme; entenda, Filme de super-heróis é estrelado por Kurt Russell — que já trabalhou com Quentin Tarantino em Os Oito Odiados., Sessão da Tarde exibe o filme Super Escola de Heróis nesta sexta-feira, ', '617ddda613fc0.png', 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb-admin_visitas`
--
ALTER TABLE `tb-admin_visitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_admin_config`
--
ALTER TABLE `tb_admin_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_admin_online`
--
ALTER TABLE `tb_admin_online`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_admin_users`
--
ALTER TABLE `tb_admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_site_posts`
--
ALTER TABLE `tb_site_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_site_posts_indi`
--
ALTER TABLE `tb_site_posts_indi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_site_slides`
--
ALTER TABLE `tb_site_slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_site_videos`
--
ALTER TABLE `tb_site_videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb-admin_visitas`
--
ALTER TABLE `tb-admin_visitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_admin_online`
--
ALTER TABLE `tb_admin_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tb_admin_users`
--
ALTER TABLE `tb_admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_site_posts`
--
ALTER TABLE `tb_site_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `tb_site_posts_indi`
--
ALTER TABLE `tb_site_posts_indi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tb_site_slides`
--
ALTER TABLE `tb_site_slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_site_videos`
--
ALTER TABLE `tb_site_videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
