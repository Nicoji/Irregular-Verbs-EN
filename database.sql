-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mer. 10 juin 2020 à 13:13
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
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'guest', '$2y$10$JiZPyqLfeUFJrsRbp/g.vuZ8KlUeV/jx6eSFf6EcqwXa46YBrxv6S'),
(2, 'de', '$2y$10$Ir7QC6lOfl.jOQD8im7f9eC6Sm1AV2iX0fTl89YOyGISPzuxVpjHe'),
(3, 'fr', '$2y$10$OZG/Z.5KCWgr4Ow25aSIje9Ki.N0xJwc1jRedVYUSYhxIdtDHlFo6');

-- --------------------------------------------------------

--
-- Structure de la table `verbs`
--

CREATE TABLE `verbs` (
  `id` int(11) NOT NULL,
  `infinitive` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `simple_past` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `past_participle` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `translation` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `learned` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `verbs`
--

INSERT INTO `verbs` (`id`, `infinitive`, `simple_past`, `past_participle`, `translation`, `learned`) VALUES
(1, 'abide', 'abode', 'abode', 'respecter / se conformer à', 0),
(2, 'arise', 'arose', 'arisen', 'survenir', 0),
(3, 'awake', 'awoke', 'awoken', 'se réveiller', 0),
(4, 'bear', 'bore', 'borne / born', 'porter / supporter / naître', 0),
(5, 'beat', 'beat', 'beaten', 'battre', 0),
(6, 'become', 'became', 'become', 'devenir', 0),
(7, 'beget', 'begat / begot', 'begotten', 'engendrer', 0),
(8, 'begin', 'began', 'begun', 'commencer', 0),
(9, 'bend', 'bent', 'bent', 'plier / se courber', 0),
(10, 'bet', 'bet', 'bet', 'parier', 0),
(11, 'bid', 'bid / bade', 'bid / bidden', 'offrir', 0),
(12, 'bite', 'bit', 'bitten', 'mordre', 0),
(13, 'bleed', 'bled', 'bled', 'saigner', 0),
(14, 'blow', 'blew', 'blown', 'souffler / gonfler', 0),
(15, 'break', 'broke', 'broken', 'casser', 0),
(16, 'bring', 'brought', 'brought', 'apporter', 0),
(17, 'broadcast', 'broadcast', 'broadcast', 'diffuser / émettre', 0),
(18, 'build', 'built', 'built', 'construire', 0),
(19, 'burn', 'burnt / burned', 'burnt / burned', 'brûler', 0),
(20, 'burst', 'burst', 'burst', 'éclater', 0),
(21, 'buy', 'bought', 'bought', 'acheter', 0),
(22, 'can', 'could', 'could', 'pouvoir', 0),
(23, 'cast', 'cast', 'cast', 'jeter / distribuer (rôles)', 0),
(24, 'catch', 'caught', 'caught', 'attraper', 0),
(25, 'chide', 'chid / chode', 'chid / chidden', 'gronder', 0),
(26, 'choose', 'chose', 'chosen', 'choisir', 0),
(27, 'cling', 'clung', 'clung', 's\'accrocher', 0),
(28, 'clothe', 'clad / clothed', 'clad / clothed', 'habiller / recouvrir', 0),
(29, 'come', 'came', 'come', 'venir', 0),
(30, 'cost', 'cost', 'cost', 'coûter', 0),
(31, 'creep', 'crept', 'crept', 'ramper', 0),
(32, 'cut', 'cut', 'cut', 'couper', 0),
(33, 'deal', 'dealt', 'dealt', 'distribuer', 0),
(34, 'dig', 'dug', 'dug', 'creuser', 0),
(35, 'dive', 'dived', 'dived / dove', 'plonger', 0),
(36, 'do', 'did', 'done', 'faire', 0),
(37, 'draw', 'drew', 'drawn', 'dessiner / tirer', 0),
(38, 'dream', 'dreamt / dreamed', 'dreamt / dreamed', 'rêver', 0),
(39, 'drink', 'drank', 'drunk', 'boire', 0),
(40, 'drive', 'drove', 'driven', 'conduire', 0),
(41, 'dwell', 'dwelt', 'dwelt / dwelled', 'habiter', 0),
(42, 'eat', 'ate', 'eaten', 'manger', 0),
(43, 'fall', 'fell', 'fallen', 'tomber', 0),
(44, 'feed', 'fed', 'fed', 'nourrir', 0),
(45, 'feel', 'felt', 'felt', 'se sentir / ressentir', 0),
(46, 'fight', 'fought', 'fought', 'se battre', 0),
(47, 'find', 'found', 'found', 'trouver', 0),
(48, 'flee', 'fled', 'fled', 's\'enfuir', 0),
(49, 'fling', 'flung', 'flung', 'lancer', 0),
(50, 'fly', 'flew', 'flown', 'voler', 0),
(51, 'forbid', 'forbade', 'forbidden', 'interdire', 0),
(52, 'forecast', 'forecast', 'forecast', 'prévoir', 0),
(53, 'foresee', 'foresaw', 'foreseen', 'prévoir / presentir', 0),
(54, 'forget', 'forgot', 'forgotten / forgot', 'oublier', 0),
(55, 'forgive', 'forgave', 'forgiven', 'pardonner', 0),
(56, 'forsake', 'forsook', 'forsaken', 'abandonner', 0),
(57, 'freeze', 'froze', 'frozen', 'geler', 0),
(58, 'get', 'got', 'gotten / got', 'obtenir', 0),
(59, 'give', 'gave', 'given', 'donner', 0),
(60, 'go', 'went', 'gone', 'aller', 0),
(61, 'grind', 'ground', 'ground', 'moudre / opprimer', 0),
(62, 'grow', 'grew', 'grown', 'grandir / pousser', 0),
(63, 'hang', 'hung', 'hung', 'tenir / pendre', 0),
(64, 'have', 'had', 'had', 'avoir', 0),
(65, 'hear', 'heard', 'heard', 'entendre', 0),
(66, 'hide', 'hid', 'hidden', 'cacher', 0),
(67, 'hit', 'hit', 'hit', 'taper / appuyer', 0),
(68, 'hold', 'held', 'held', 'tenir', 0),
(69, 'hurt', 'hurt', 'hurt', 'blesser', 0),
(70, 'keep', 'kept', 'kept', 'garder', 0),
(71, 'kneel', 'knelt / knelled', 'knelt / kneeled', 's\'agenouiller', 0),
(72, 'know', 'knew', 'known', 'connaître / savoir', 0),
(73, 'lay', 'laid', 'laid', 'poser', 0),
(74, 'lead', 'led', 'led', 'mener / guider', 0),
(75, 'lean', 'leant / leaned', 'leant / leaned', 's\'incliner / se pencher', 0),
(76, 'leap', 'leapt / leaped', 'leapt / leaped', 'sauter / bondir', 0),
(77, 'learn', 'learnt', 'learnt', 'apprendre', 0),
(78, 'leave', 'left', 'left', 'laisser / quitter / partir', 0),
(79, 'lend', 'lent', 'lent', 'prêter', 0),
(80, 'let', 'let', 'let', 'permettre / louer', 0),
(81, 'lie', 'lay', 'lain', 's\'allonger', 0),
(82, 'light', 'lit / lighted', 'lit / lighted', 'allumer', 0),
(83, 'lose', 'lost', 'lost', 'perdre', 0),
(84, 'make', 'made', 'made', 'fabriquer', 0),
(85, 'mean', 'meant', 'meant', 'signifier', 0),
(86, 'meet', 'met', 'met', 'rencontrer', 0),
(87, 'mow', 'mowed', 'mowed / mown', 'tondre', 0),
(88, 'offset', 'offset', 'offset', 'compenser', 0),
(89, 'overcome', 'overcame', 'overcome', 'surmonter', 0),
(90, 'partake', 'partook', 'partaken', 'prendre part à', 0),
(91, 'pay', 'paid', 'paid', 'payer', 0),
(92, 'plead', 'pled / pleaded', 'pled / pleaded', 'supplier / plaider', 0),
(93, 'preset', 'preset', 'preset', 'programmer', 0),
(94, 'prove', 'proved', 'proven / proved', 'prouver', 0),
(95, 'put', 'put', 'put', 'mettre', 0),
(96, 'quit', 'quit', 'quit', 'quitter', 0),
(97, 'read', 'read', 'read', 'lire', 0),
(98, 'relay', 'relaid', 'relaid', 'relayer', 0),
(99, 'rend', 'rent', 'rent', 'déchirer', 0),
(100, 'rid', 'rid', 'rid', 'débarrasser', 0),
(101, 'ring', 'rang', 'rung', 'sonner / téléphoner', 0),
(102, 'rise', 'rose', 'risen', 'lever', 0),
(103, 'run', 'ran', 'run', 'courir', 0),
(104, 'saw', 'saw / sawed', 'sawn / sawed', 'scier', 0),
(105, 'say', 'said', 'said', 'dire', 0),
(106, 'see', 'saw', 'seen', 'voir', 0),
(107, 'seek', 'sought', 'sought', 'chercher', 0),
(108, 'sell', 'sold', 'sold', 'vendre', 0),
(109, 'send', 'sent', 'sent', 'envoyer', 0),
(110, 'set', 'set', 'set', 'fixer', 0),
(111, 'shake', 'shook', 'shaken', 'secouer', 0),
(112, 'shed', 'shed', 'shed', 'répandre / laisser tomber', 0),
(113, 'shine', 'shone', 'shone', 'briller', 0),
(114, 'shoe', 'shod', 'shod', 'chausser', 0),
(115, 'shoot', 'shot', 'shot', 'tirer / fusiller', 0),
(116, 'show', 'showed', 'shown', 'montrer', 0),
(117, 'shut', 'shut', 'shut', 'fermer', 0),
(118, 'sing', 'sang', 'sung', 'chanter', 0),
(119, 'sink', 'sank / sunk', 'sunk / sunken', 'couler', 0),
(120, 'sit', 'sat', 'sat', 's\'asseoir', 0),
(121, 'slay', 'slew', 'slain', 'tuer', 0),
(122, 'sleep', 'slept', 'slept', 'dormir', 0),
(123, 'slide', 'slid', 'slid', 'glisser', 0),
(124, 'slit', 'slit', 'slit', 'fendre', 0),
(125, 'smell', 'smelt', 'smelt', 'sentir', 0),
(126, 'sow', 'sowed', 'sown / sowed', 'semer', 0),
(127, 'speak', 'spoke', 'spoken', 'parler', 0),
(128, 'speed', 'sped', 'sped', 'aller vite', 0),
(129, 'spell', 'spelt', 'spelt', 'épeler / orthographier', 0),
(130, 'spend', 'spent', 'spent', 'dépenser / passer du temps', 0),
(131, 'spill', 'spilt / spilled', 'spilt / spilled', 'renverser', 0),
(132, 'spin', 'spun', 'spun', 'tourner / faire tourner', 0),
(133, 'spit', 'spat / spit', 'spat / spit', 'cracher', 0),
(134, 'split', 'split', 'split', 'fendre', 0),
(135, 'spoil', 'spoilt', 'spoilt', 'gâcher / gâter', 0),
(136, 'spread', 'spread', 'spread', 'répandre', 0),
(137, 'spring', 'sprang', 'sprung', 'surgir / jaillir / bondir', 0),
(138, 'stand', 'stood', 'stood', 'être debout', 0),
(139, 'steal', 'stole', 'stolen', 'voler / dérober', 0),
(140, 'stick', 'stuck', 'stuck', 'coller', 0),
(141, 'sting', 'stung', 'stung', 'piquer', 0),
(142, 'stink', 'stank', 'stunk', 'puer', 0),
(143, 'strew', 'strewed', 'strewn / strewed', 'éparpiller', 0),
(144, 'strike', 'struck', 'stricken / struck', 'frapper', 0),
(145, 'strive', 'strove', 'striven', 's\'efforcer', 0),
(146, 'swear', 'swore', 'sworn', 'jurer', 0),
(147, 'sweat', 'sweat / sweated', 'sweat / sweated', 'suer', 0),
(148, 'sweep', 'swept', 'swept', 'balayer', 0),
(149, 'swell', 'swelled / sweated', 'swollen', 'gonfler / enfler', 0),
(150, 'swim', 'swam', 'swum', 'nager', 0),
(151, 'swing', 'swung', 'swung', 'se balancer', 0),
(152, 'take', 'took', 'taken', 'prendre', 0),
(153, 'teach', 'taught', 'taught', 'enseigner', 0),
(154, 'tear', 'tore', 'torn', 'déchirer', 0),
(155, 'tell', 'told', 'told', 'dire / raconter', 0),
(156, 'think', 'thought', 'thought', 'penser', 0),
(157, 'thrive', 'throve / thrived', 'thriven / thrived', 'prospérer', 0),
(158, 'throw', 'threw', 'thrown', 'jeter', 0),
(159, 'thrust', 'thrust', 'thrust', 'enfoncer', 0),
(160, 'typeset', 'typeset', 'typeset', 'composer', 0),
(161, 'undergo', 'underwent', 'undergone', 'subir', 0),
(162, 'understand', 'understood', 'understood', 'comprendre', 0),
(163, 'wake', 'woke', 'woken', 'réveiller', 0),
(164, 'weep', 'wept', 'wept', 'pleurer', 0),
(165, 'wet', 'wet / wetted', 'wet / wetted', 'mouiller', 0),
(166, 'win', 'won', 'won', 'gagner', 0),
(167, 'wind', 'wound', 'wound', 'enrouler / remonter', 0),
(168, 'withdraw', 'withdrew', 'withdrawn', 'se retirer', 0),
(169, 'wring', 'wrung', 'wrung', 'tordre', 0),
(170, 'write', 'wrote', 'written', 'écrire', 0);

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
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `verbs`
--
ALTER TABLE `verbs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
