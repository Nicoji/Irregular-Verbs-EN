-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mar. 16 juin 2020 à 09:08
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `english`
--
CREATE DATABASE IF NOT EXISTS `english` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `english`;

-- --------------------------------------------------------

--
-- Structure de la table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `number` int(11) NOT NULL,
  `learn` int(11) NOT NULL,
  `result` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'guest', '$2y$10$Rj1jRrK9WXxzeKQlWDg71ePPrWc9zvvhoZUdq/AhrYEBxk7Yq06Di'),
(2, 'Nico', '$2y$10$CfqMm2vjCWou4UQmvBuKRO6zbzS2wawB3DhrO60jrH20SI2fSFfGW');

-- --------------------------------------------------------

--
-- Structure de la table `verbs`
--

CREATE TABLE `verbs` (
  `id` int(11) NOT NULL,
  `infinitive` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `simple_past` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `past_participle` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `translation` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `verbs`
--

INSERT INTO `verbs` (`id`, `infinitive`, `simple_past`, `past_participle`, `translation`) VALUES
(1, 'abide', 'abode', 'abode', 'respecter / se conformer à'),
(2, 'arise', 'arose', 'arisen', 'survenir'),
(3, 'awake', 'awoke', 'awoken', 'se réveiller'),
(4, 'bear', 'bore', 'borne / born', 'porter / supporter / naître'),
(5, 'beat', 'beat', 'beaten', 'battre'),
(6, 'become', 'became', 'become', 'devenir'),
(7, 'beget', 'begat / begot', 'begotten', 'engendrer'),
(8, 'begin', 'began', 'begun', 'commencer'),
(9, 'bend', 'bent', 'bent', 'plier / se courber'),
(10, 'bet', 'bet', 'bet', 'parier'),
(11, 'bid', 'bid / bade', 'bid / bidden', 'offrir'),
(12, 'bite', 'bit', 'bitten', 'mordre'),
(13, 'bleed', 'bled', 'bled', 'saigner'),
(14, 'blow', 'blew', 'blown', 'souffler / gonfler'),
(15, 'break', 'broke', 'broken', 'casser'),
(16, 'bring', 'brought', 'brought', 'apporter'),
(17, 'broadcast', 'broadcast', 'broadcast', 'diffuser / émettre'),
(18, 'build', 'built', 'built', 'construire'),
(19, 'burn', 'burnt / burned', 'burnt / burned', 'brûler'),
(20, 'burst', 'burst', 'burst', 'éclater'),
(21, 'buy', 'bought', 'bought', 'acheter'),
(22, 'can', 'could', 'could', 'pouvoir'),
(23, 'cast', 'cast', 'cast', 'jeter / distribuer (rôles)'),
(24, 'catch', 'caught', 'caught', 'attraper'),
(25, 'chide', 'chid / chode', 'chid / chidden', 'gronder'),
(26, 'choose', 'chose', 'chosen', 'choisir'),
(27, 'cling', 'clung', 'clung', 's\'accrocher'),
(28, 'clothe', 'clad / clothed', 'clad / clothed', 'habiller / recouvrir'),
(29, 'come', 'came', 'come', 'venir'),
(30, 'cost', 'cost', 'cost', 'coûter'),
(31, 'creep', 'crept', 'crept', 'ramper'),
(32, 'cut', 'cut', 'cut', 'couper'),
(33, 'deal', 'dealt', 'dealt', 'distribuer'),
(34, 'dig', 'dug', 'dug', 'creuser'),
(35, 'dive', 'dived', 'dived / dove', 'plonger'),
(36, 'do', 'did', 'done', 'faire'),
(37, 'draw', 'drew', 'drawn', 'dessiner / tirer'),
(38, 'dream', 'dreamt / dreamed', 'dreamt / dreamed', 'rêver'),
(39, 'drink', 'drank', 'drunk', 'boire'),
(40, 'drive', 'drove', 'driven', 'conduire'),
(41, 'dwell', 'dwelt', 'dwelt / dwelled', 'habiter'),
(42, 'eat', 'ate', 'eaten', 'manger'),
(43, 'fall', 'fell', 'fallen', 'tomber'),
(44, 'feed', 'fed', 'fed', 'nourrir'),
(45, 'feel', 'felt', 'felt', 'se sentir / ressentir'),
(46, 'fight', 'fought', 'fought', 'se battre'),
(47, 'find', 'found', 'found', 'trouver'),
(48, 'flee', 'fled', 'fled', 's\'enfuir'),
(49, 'fling', 'flung', 'flung', 'lancer'),
(50, 'fly', 'flew', 'flown', 'voler'),
(51, 'forbid', 'forbade', 'forbidden', 'interdire'),
(52, 'forecast', 'forecast', 'forecast', 'prévoir'),
(53, 'foresee', 'foresaw', 'foreseen', 'prévoir / presentir'),
(54, 'forget', 'forgot', 'forgotten / forgot', 'oublier'),
(55, 'forgive', 'forgave', 'forgiven', 'pardonner'),
(56, 'forsake', 'forsook', 'forsaken', 'abandonner'),
(57, 'freeze', 'froze', 'frozen', 'geler'),
(58, 'get', 'got', 'gotten / got', 'obtenir'),
(59, 'give', 'gave', 'given', 'donner'),
(60, 'go', 'went', 'gone', 'aller'),
(61, 'grind', 'ground', 'ground', 'moudre / opprimer'),
(62, 'grow', 'grew', 'grown', 'grandir / pousser'),
(63, 'hang', 'hung', 'hung', 'tenir / pendre'),
(64, 'have', 'had', 'had', 'avoir'),
(65, 'hear', 'heard', 'heard', 'entendre'),
(66, 'hide', 'hid', 'hidden', 'cacher'),
(67, 'hit', 'hit', 'hit', 'taper / appuyer'),
(68, 'hold', 'held', 'held', 'tenir'),
(69, 'hurt', 'hurt', 'hurt', 'blesser'),
(70, 'keep', 'kept', 'kept', 'garder'),
(71, 'kneel', 'knelt / knelled', 'knelt / kneeled', 's\'agenouiller'),
(72, 'know', 'knew', 'known', 'connaître / savoir'),
(73, 'lay', 'laid', 'laid', 'poser'),
(74, 'lead', 'led', 'led', 'mener / guider'),
(75, 'lean', 'leant / leaned', 'leant / leaned', 's\'incliner / se pencher'),
(76, 'leap', 'leapt / leaped', 'leapt / leaped', 'sauter / bondir'),
(77, 'learn', 'learnt', 'learnt', 'apprendre'),
(78, 'leave', 'left', 'left', 'laisser / quitter / partir'),
(79, 'lend', 'lent', 'lent', 'prêter'),
(80, 'let', 'let', 'let', 'permettre / louer'),
(81, 'lie', 'lay', 'lain', 's\'allonger'),
(82, 'light', 'lit / lighted', 'lit / lighted', 'allumer'),
(83, 'lose', 'lost', 'lost', 'perdre'),
(84, 'make', 'made', 'made', 'fabriquer'),
(85, 'mean', 'meant', 'meant', 'signifier'),
(86, 'meet', 'met', 'met', 'rencontrer'),
(87, 'mow', 'mowed', 'mowed / mown', 'tondre'),
(88, 'offset', 'offset', 'offset', 'compenser'),
(89, 'overcome', 'overcame', 'overcome', 'surmonter'),
(90, 'partake', 'partook', 'partaken', 'prendre part à'),
(91, 'pay', 'paid', 'paid', 'payer'),
(92, 'plead', 'pled / pleaded', 'pled / pleaded', 'supplier / plaider'),
(93, 'preset', 'preset', 'preset', 'programmer'),
(94, 'prove', 'proved', 'proven / proved', 'prouver'),
(95, 'put', 'put', 'put', 'mettre'),
(96, 'quit', 'quit', 'quit', 'quitter'),
(97, 'read', 'read', 'read', 'lire'),
(98, 'relay', 'relaid', 'relaid', 'relayer'),
(99, 'rend', 'rent', 'rent', 'déchirer'),
(100, 'rid', 'rid', 'rid', 'débarrasser'),
(101, 'ring', 'rang', 'rung', 'sonner / téléphoner'),
(102, 'rise', 'rose', 'risen', 'lever'),
(103, 'run', 'ran', 'run', 'courir'),
(104, 'saw', 'saw / sawed', 'sawn / sawed', 'scier'),
(105, 'say', 'said', 'said', 'dire'),
(106, 'see', 'saw', 'seen', 'voir'),
(107, 'seek', 'sought', 'sought', 'chercher'),
(108, 'sell', 'sold', 'sold', 'vendre'),
(109, 'send', 'sent', 'sent', 'envoyer'),
(110, 'set', 'set', 'set', 'fixer'),
(111, 'shake', 'shook', 'shaken', 'secouer'),
(112, 'shed', 'shed', 'shed', 'répandre / laisser tomber'),
(113, 'shine', 'shone', 'shone', 'briller'),
(114, 'shoe', 'shod', 'shod', 'chausser'),
(115, 'shoot', 'shot', 'shot', 'tirer / fusiller'),
(116, 'show', 'showed', 'shown', 'montrer'),
(117, 'shut', 'shut', 'shut', 'fermer'),
(118, 'sing', 'sang', 'sung', 'chanter'),
(119, 'sink', 'sank / sunk', 'sunk / sunken', 'couler'),
(120, 'sit', 'sat', 'sat', 's\'asseoir'),
(121, 'slay', 'slew', 'slain', 'tuer'),
(122, 'sleep', 'slept', 'slept', 'dormir'),
(123, 'slide', 'slid', 'slid', 'glisser'),
(124, 'slit', 'slit', 'slit', 'fendre'),
(125, 'smell', 'smelt', 'smelt', 'sentir'),
(126, 'sow', 'sowed', 'sown / sowed', 'semer'),
(127, 'speak', 'spoke', 'spoken', 'parler'),
(128, 'speed', 'sped', 'sped', 'aller vite'),
(129, 'spell', 'spelt', 'spelt', 'épeler / orthographier'),
(130, 'spend', 'spent', 'spent', 'dépenser / passer du temps'),
(131, 'spill', 'spilt / spilled', 'spilt / spilled', 'renverser'),
(132, 'spin', 'spun', 'spun', 'tourner / faire tourner'),
(133, 'spit', 'spat / spit', 'spat / spit', 'cracher'),
(134, 'split', 'split', 'split', 'fendre'),
(135, 'spoil', 'spoilt', 'spoilt', 'gâcher / gâter'),
(136, 'spread', 'spread', 'spread', 'répandre'),
(137, 'spring', 'sprang', 'sprung', 'surgir / jaillir / bondir'),
(138, 'stand', 'stood', 'stood', 'être debout'),
(139, 'steal', 'stole', 'stolen', 'voler / dérober'),
(140, 'stick', 'stuck', 'stuck', 'coller'),
(141, 'sting', 'stung', 'stung', 'piquer'),
(142, 'stink', 'stank', 'stunk', 'puer'),
(143, 'strew', 'strewed', 'strewn / strewed', 'éparpiller'),
(144, 'strike', 'struck', 'stricken / struck', 'frapper'),
(145, 'strive', 'strove', 'striven', 's\'efforcer'),
(146, 'swear', 'swore', 'sworn', 'jurer'),
(147, 'sweat', 'sweat / sweated', 'sweat / sweated', 'suer'),
(148, 'sweep', 'swept', 'swept', 'balayer'),
(149, 'swell', 'swelled / sweated', 'swollen', 'gonfler / enfler'),
(150, 'swim', 'swam', 'swum', 'nager'),
(151, 'swing', 'swung', 'swung', 'se balancer'),
(152, 'take', 'took', 'taken', 'prendre'),
(153, 'teach', 'taught', 'taught', 'enseigner'),
(154, 'tear', 'tore', 'torn', 'déchirer'),
(155, 'tell', 'told', 'told', 'dire / raconter'),
(156, 'think', 'thought', 'thought', 'penser'),
(157, 'thrive', 'throve / thrived', 'thriven / thrived', 'prospérer'),
(158, 'throw', 'threw', 'thrown', 'jeter'),
(159, 'thrust', 'thrust', 'thrust', 'enfoncer'),
(160, 'typeset', 'typeset', 'typeset', 'composer'),
(161, 'undergo', 'underwent', 'undergone', 'subir'),
(162, 'understand', 'understood', 'understood', 'comprendre'),
(163, 'wake', 'woke', 'woken', 'réveiller'),
(164, 'weep', 'wept', 'wept', 'pleurer'),
(165, 'wet', 'wet / wetted', 'wet / wetted', 'mouiller'),
(166, 'win', 'won', 'won', 'gagner'),
(167, 'wind', 'wound', 'wound', 'enrouler / remonter'),
(168, 'withdraw', 'withdrew', 'withdrawn', 'se retirer'),
(169, 'wring', 'wrung', 'wrung', 'tordre'),
(170, 'write', 'wrote', 'written', 'écrire');

-- --------------------------------------------------------

--
-- Structure de la table `verbs_learned`
--

CREATE TABLE `verbs_learned` (
  `id` int(11) NOT NULL,
  `id_verb` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `verbs_learned`
--

INSERT INTO `verbs_learned` (`id`, `id_verb`, `id_user`, `status`) VALUES
(1, 1, 1, 2),
(2, 2, 1, 1),
(3, 3, 1, 0),
(4, 4, 1, 0),
(5, 5, 1, 0),
(6, 6, 1, 0),
(7, 7, 1, 0),
(8, 8, 1, 0),
(9, 9, 1, 0),
(10, 10, 1, 0),
(11, 11, 1, 0),
(12, 12, 1, 0),
(13, 13, 1, 0),
(14, 14, 1, 0),
(15, 15, 1, 0),
(16, 16, 1, 0),
(17, 17, 1, 0),
(18, 18, 1, 0),
(19, 19, 1, 0),
(20, 20, 1, 0),
(21, 21, 1, 0),
(22, 22, 1, 0),
(23, 23, 1, 0),
(24, 24, 1, 0),
(25, 25, 1, 0),
(26, 26, 1, 0),
(27, 27, 1, 0),
(28, 28, 1, 0),
(29, 29, 1, 0),
(30, 30, 1, 0),
(31, 31, 1, 0),
(32, 32, 1, 0),
(33, 33, 1, 0),
(34, 34, 1, 0),
(35, 35, 1, 0),
(36, 36, 1, 0),
(37, 37, 1, 0),
(38, 38, 1, 0),
(39, 39, 1, 0),
(40, 40, 1, 0),
(41, 41, 1, 0),
(42, 42, 1, 0),
(43, 43, 1, 0),
(44, 44, 1, 0),
(45, 45, 1, 0),
(46, 46, 1, 0),
(47, 47, 1, 0),
(48, 48, 1, 0),
(49, 49, 1, 0),
(50, 50, 1, 0),
(51, 51, 1, 0),
(52, 52, 1, 0),
(53, 53, 1, 0),
(54, 54, 1, 0),
(55, 55, 1, 0),
(56, 56, 1, 0),
(57, 57, 1, 0),
(58, 58, 1, 0),
(59, 59, 1, 0),
(60, 60, 1, 0),
(61, 61, 1, 0),
(62, 62, 1, 0),
(63, 63, 1, 0),
(64, 64, 1, 0),
(65, 65, 1, 0),
(66, 66, 1, 0),
(67, 67, 1, 0),
(68, 68, 1, 0),
(69, 69, 1, 0),
(70, 70, 1, 0),
(71, 71, 1, 0),
(72, 72, 1, 0),
(73, 73, 1, 0),
(74, 74, 1, 0),
(75, 75, 1, 0),
(76, 76, 1, 0),
(77, 77, 1, 0),
(78, 78, 1, 0),
(79, 79, 1, 0),
(80, 80, 1, 0),
(81, 81, 1, 0),
(82, 82, 1, 0),
(83, 83, 1, 0),
(84, 84, 1, 0),
(85, 85, 1, 0),
(86, 86, 1, 0),
(87, 87, 1, 0),
(88, 88, 1, 0),
(89, 89, 1, 0),
(90, 90, 1, 0),
(91, 91, 1, 0),
(92, 92, 1, 0),
(93, 93, 1, 0),
(94, 94, 1, 0),
(95, 95, 1, 0),
(96, 96, 1, 0),
(97, 97, 1, 0),
(98, 98, 1, 0),
(99, 99, 1, 0),
(100, 100, 1, 0),
(101, 101, 1, 0),
(102, 102, 1, 0),
(103, 103, 1, 0),
(104, 104, 1, 0),
(105, 105, 1, 0),
(106, 106, 1, 0),
(107, 107, 1, 0),
(108, 108, 1, 0),
(109, 109, 1, 0),
(110, 110, 1, 0),
(111, 111, 1, 0),
(112, 112, 1, 0),
(113, 113, 1, 0),
(114, 114, 1, 0),
(115, 115, 1, 0),
(116, 116, 1, 0),
(117, 117, 1, 0),
(118, 118, 1, 0),
(119, 119, 1, 0),
(120, 120, 1, 0),
(121, 121, 1, 0),
(122, 122, 1, 0),
(123, 123, 1, 0),
(124, 124, 1, 0),
(125, 125, 1, 0),
(126, 126, 1, 0),
(127, 127, 1, 0),
(128, 128, 1, 0),
(129, 129, 1, 0),
(130, 130, 1, 0),
(131, 131, 1, 0),
(132, 132, 1, 0),
(133, 133, 1, 0),
(134, 134, 1, 0),
(135, 135, 1, 0),
(136, 136, 1, 0),
(137, 137, 1, 0),
(138, 138, 1, 0),
(139, 139, 1, 0),
(140, 140, 1, 0),
(141, 141, 1, 0),
(142, 142, 1, 0),
(143, 143, 1, 0),
(144, 144, 1, 0),
(145, 145, 1, 0),
(146, 146, 1, 0),
(147, 147, 1, 0),
(148, 148, 1, 0),
(149, 149, 1, 0),
(150, 150, 1, 0),
(151, 151, 1, 0),
(152, 152, 1, 0),
(153, 153, 1, 0),
(154, 154, 1, 0),
(155, 155, 1, 0),
(156, 156, 1, 0),
(157, 157, 1, 0),
(158, 158, 1, 0),
(159, 159, 1, 0),
(160, 160, 1, 0),
(161, 161, 1, 0),
(162, 162, 1, 0),
(163, 163, 1, 0),
(164, 164, 1, 0),
(165, 165, 1, 0),
(166, 166, 1, 0),
(167, 167, 1, 0),
(168, 168, 1, 0),
(169, 169, 1, 0),
(170, 170, 1, 2),
(171, 1, 2, 1),
(172, 2, 2, 2),
(173, 3, 2, 2),
(174, 4, 2, 2),
(175, 5, 2, 2),
(176, 6, 2, 0),
(177, 7, 2, 0),
(178, 8, 2, 0),
(179, 9, 2, 0),
(180, 10, 2, 0),
(181, 11, 2, 0),
(182, 12, 2, 0),
(183, 13, 2, 1),
(184, 14, 2, 2),
(185, 15, 2, 0),
(186, 16, 2, 0),
(187, 17, 2, 0),
(188, 18, 2, 0),
(189, 19, 2, 0),
(190, 20, 2, 0),
(191, 21, 2, 0),
(192, 22, 2, 0),
(193, 23, 2, 0),
(194, 24, 2, 0),
(195, 25, 2, 0),
(196, 26, 2, 0),
(197, 27, 2, 0),
(198, 28, 2, 0),
(199, 29, 2, 0),
(200, 30, 2, 0),
(201, 31, 2, 0),
(202, 32, 2, 0),
(203, 33, 2, 0),
(204, 34, 2, 0),
(205, 35, 2, 0),
(206, 36, 2, 0),
(207, 37, 2, 0),
(208, 38, 2, 0),
(209, 39, 2, 0),
(210, 40, 2, 0),
(211, 41, 2, 0),
(212, 42, 2, 0),
(213, 43, 2, 0),
(214, 44, 2, 0),
(215, 45, 2, 0),
(216, 46, 2, 0),
(217, 47, 2, 0),
(218, 48, 2, 0),
(219, 49, 2, 0),
(220, 50, 2, 0),
(221, 51, 2, 0),
(222, 52, 2, 0),
(223, 53, 2, 0),
(224, 54, 2, 0),
(225, 55, 2, 0),
(226, 56, 2, 0),
(227, 57, 2, 0),
(228, 58, 2, 0),
(229, 59, 2, 0),
(230, 60, 2, 0),
(231, 61, 2, 0),
(232, 62, 2, 0),
(233, 63, 2, 0),
(234, 64, 2, 0),
(235, 65, 2, 0),
(236, 66, 2, 0),
(237, 67, 2, 0),
(238, 68, 2, 0),
(239, 69, 2, 0),
(240, 70, 2, 0),
(241, 71, 2, 0),
(242, 72, 2, 0),
(243, 73, 2, 0),
(244, 74, 2, 0),
(245, 75, 2, 0),
(246, 76, 2, 0),
(247, 77, 2, 0),
(248, 78, 2, 0),
(249, 79, 2, 0),
(250, 80, 2, 0),
(251, 81, 2, 0),
(252, 82, 2, 0),
(253, 83, 2, 0),
(254, 84, 2, 0),
(255, 85, 2, 0),
(256, 86, 2, 0),
(257, 87, 2, 0),
(258, 88, 2, 0),
(259, 89, 2, 0),
(260, 90, 2, 0),
(261, 91, 2, 0),
(262, 92, 2, 0),
(263, 93, 2, 0),
(264, 94, 2, 0),
(265, 95, 2, 0),
(266, 96, 2, 0),
(267, 97, 2, 0),
(268, 98, 2, 0),
(269, 99, 2, 0),
(270, 100, 2, 0),
(271, 101, 2, 0),
(272, 102, 2, 0),
(273, 103, 2, 0),
(274, 104, 2, 0),
(275, 105, 2, 0),
(276, 106, 2, 0),
(277, 107, 2, 0),
(278, 108, 2, 0),
(279, 109, 2, 0),
(280, 110, 2, 0),
(281, 111, 2, 0),
(282, 112, 2, 0),
(283, 113, 2, 0),
(284, 114, 2, 0),
(285, 115, 2, 0),
(286, 116, 2, 0),
(287, 117, 2, 0),
(288, 118, 2, 0),
(289, 119, 2, 0),
(290, 120, 2, 0),
(291, 121, 2, 0),
(292, 122, 2, 0),
(293, 123, 2, 0),
(294, 124, 2, 0),
(295, 125, 2, 0),
(296, 126, 2, 0),
(297, 127, 2, 0),
(298, 128, 2, 0),
(299, 129, 2, 0),
(300, 130, 2, 0),
(301, 131, 2, 0),
(302, 132, 2, 0),
(303, 133, 2, 0),
(304, 134, 2, 0),
(305, 135, 2, 0),
(306, 136, 2, 0),
(307, 137, 2, 0),
(308, 138, 2, 0),
(309, 139, 2, 0),
(310, 140, 2, 0),
(311, 141, 2, 0),
(312, 142, 2, 0),
(313, 143, 2, 0),
(314, 144, 2, 0),
(315, 145, 2, 0),
(316, 146, 2, 0),
(317, 147, 2, 0),
(318, 148, 2, 0),
(319, 149, 2, 0),
(320, 150, 2, 0),
(321, 151, 2, 0),
(322, 152, 2, 0),
(323, 153, 2, 0),
(324, 154, 2, 0),
(325, 155, 2, 0),
(326, 156, 2, 0),
(327, 157, 2, 0),
(328, 158, 2, 0),
(329, 159, 2, 0),
(330, 160, 2, 0),
(331, 161, 2, 0),
(332, 162, 2, 0),
(333, 163, 2, 0),
(334, 164, 2, 0),
(335, 165, 2, 0),
(336, 166, 2, 0),
(337, 167, 2, 0),
(338, 168, 2, 0),
(339, 169, 2, 2),
(340, 170, 2, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `verbs`
--
ALTER TABLE `verbs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `verbs_learned`
--
ALTER TABLE `verbs_learned`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `verbs`
--
ALTER TABLE `verbs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT pour la table `verbs_learned`
--
ALTER TABLE `verbs_learned`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=341;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
