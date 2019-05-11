-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 11 mai 2019 à 07:08
-- Version du serveur :  5.7.23
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cat_clinic`
--

-- --------------------------------------------------------

--
-- Structure de la table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `ID_PAGE` int(11) NOT NULL AUTO_INCREMENT,
  `TITRES` varchar(4000) DEFAULT NULL,
  PRIMARY KEY (`ID_PAGE`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pages`
--

INSERT INTO `pages` (`ID_PAGE`, `TITRES`) VALUES
(1, 'Spécialité de la clinique'),
(2, 'Team'),
(3, 'Prévention');

-- --------------------------------------------------------

--
-- Structure de la table `pages_sous_titres`
--

DROP TABLE IF EXISTS `pages_sous_titres`;
CREATE TABLE IF NOT EXISTS `pages_sous_titres` (
  `ID_PAGE` int(11) NOT NULL AUTO_INCREMENT,
  `ID_SOUS_TITRE` int(11) NOT NULL,
  PRIMARY KEY (`ID_PAGE`,`ID_SOUS_TITRE`),
  KEY `FK_PAGES_SOUS_TITRES` (`ID_SOUS_TITRE`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pages_sous_titres`
--

INSERT INTO `pages_sous_titres` (`ID_PAGE`, `ID_SOUS_TITRE`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(2, 9),
(2, 10),
(3, 11),
(3, 12),
(3, 13);

-- --------------------------------------------------------

--
-- Structure de la table `paragraphes`
--

DROP TABLE IF EXISTS `paragraphes`;
CREATE TABLE IF NOT EXISTS `paragraphes` (
  `ID_PARAGRAPHE` int(11) NOT NULL AUTO_INCREMENT,
  `PARAGRAPHE` varchar(4000) DEFAULT NULL,
  PRIMARY KEY (`ID_PARAGRAPHE`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `paragraphes`
--

INSERT INTO `paragraphes` (`ID_PARAGRAPHE`, `PARAGRAPHE`) VALUES
(11, 'VOTRE	CHAT	COMPTE	SUR	VOUS	POUR	ETRE	PROTEGE		\r\n L\'un des meilleurs moyens de permettre à votre chat de vivre en santé pendant de nombreuses années est de le faire vacciner contre les maladies félines les plus répandues. Au cours des premières semaines de son existence, votre chat a reçu, par le lait de sa mère, des anticorps qui l\'ont immunisé contre certaines maladies. Après cette période, c\'est à vous qu\'il revient de protéger votre compagnon, avec l\'aide et les conseils de votre vétérinaire.'),
(12, 'COMMENT	UN	VACCIN	FONCTIONNE-T-IL	? Un vaccin contient une petite quantité de virus, de bactéries ou d\'autres organismes causant des maladies. Ceuxci ont été soit atténués soit « tués ». Lorsque ces organismes sont administrés à votre chat, ils stimulent son système immunitaire qui produit des cellules et des protéines qui combattent la maladie « les anticorps », et protègent votre animal contre certaines maladies.'),
(13, 'QUAND	DOIS-JE	FAIRE	VACCINER	MON	CHAT	? En général, l\'immunité que reçoit un chaton à sa naissance commence à s\'estomper après neuf semaines. C\'est alors le moment, habituellement, de lui administrer ses premiers vaccins. Il doit recevoir un rappel de 3 à 4 semaines plus tard. Par la suite, votre chat devra se faire vacciner régulièrement toute sa vie. Bien sûr, ce ne sont que des lignes directrices. Votre vétérinaire sera en mesure de déterminer le programme de vaccination qui répondra parfaitement aux besoins de votre compagnon félin.'),
(14, 'LES	DANGERS	DOMESTIQUES	:	Comment	faire	de	votre	maison	un	endroit	sûr	pour	vos	animaux	domestiques	Tout	comme	les	parents	rendent	leur	maison	à	l’épreuve	de	leurs	enfants,	les	propriétaires	d’animaux	domestiques	devraient	faire	de	même	pour	leur	animal	domestique.	Nos	compagnons	à	quatre	pattes	sont	comme	les	bébés	et	les	bambins	:	curieux	de	nature,	ils	sont	portés	à	explorer	leur	environnement	avec	leurs	pattes	et	leurs	griffes	et	à	goûter	à	tout.'),
(15, 'ADMINISTRATION	DES	MEDICAMENTS	:	Tout	comme	vous,	votre	animal	sera	malade	et	il	est	probable	que	vous	deviez	lui	administrer	des	médicaments	prescrits	par	votre	vétérinaire.	L’emploi	d’une	bonne	méthode	facilitera	la	vie	de	tout	le	monde:'),
(16, 'LES	COMPRIMES	OU	GELULES	\r\n	\r\n	C\'est	certainement	le	seul	médicament	qu\'on	puisse	lui	administrer	sans	problème.	Contrairement	à	ce	qu\'on	croit,	votre	animal	est	parfaitement	capable	d\'avaler	des	gros	comprimés	\r\n	\r\n	1re	étape	•	Placez	le	comprimé	entre	vos	doigts.	•	De	l’autre	main,	tenez	sa	tête	par	derrière.	le	menton	doit	passer	à	la	verticale.	\r\n	2e	étape	•	Maintenant,	ses	yeux	fixent	le	plafond,	la	lèvre	inférieure	baille	spontanément.		•	Si	votre	animal	n’ouvre	pas	la	gueule,	exercez	une	légère	pression	sur	sa	mâchoire	inférieure	à	l’aide	de	votre	majeur.	\r\n	3e	étape	\r\n	7	\r\n•	Laissez	votre	majeur	sur	les	petites	incisives	de	votre	animal	afin	que	sa	gueule	reste	ouverte.	•	Déposez	le	comprimé	le	plus	loin	possible	dans	la	gueule.	•	Refermez	la	gueule		\r\n	4e	étape		•	Masser	sa	gorge	ou	soufflez	sur	son	nez	pour	l’inciter	à	déglutir.'),
(17, 'LES	LIQUIDES	\r\n		Agitez	le	flacon		si	cela	est	demandé.	\r\n	1re	étape	•	Tout	d’abord,	remplissez	une	seringue	du	médicament.		\r\n	2e	étape		•	Le	médicament	liquide	doit	être	versé	dans	l\'espace	entre	la	canine	et	les	molaires.	\r\n	3e	étape	•	Tenez	les	mâchoires	de	votre	animal	fermées	et	renversez	légèrement	sa	tête	vers	l’arrière.'),
(18, 'CONSEILS	PRATIQUES	\r\n \r\n	\r\n	Lisez	attentivement	l\'étiquette.	Demandez	à	votre	vétérinaire	à	quel	moment	du	repas		le	médicament	peut	être	donné.	\r\n	8	\r\nCacher	le	comprimé	dans	un	morceau	d\'aliment	appétent	(viande	hachée,	fromage)		Demandez	à	un	ami	ou	à	un	membre	de	la	famille	de	vous	aider.	Lorsque	la	taille	de	l\'animal	le	permet,	il	est	plus	facile	d\'administrer	des	médicaments	si	l\'animal	est	placé	sur	une	table.	Lorsque	vous	donnez	un	médicament,	demeurez	calme,	car	votre	animal	peut	sentir	votre	nervosité,	ce	qui	rendra	votre	tâche	plus	difficile.	Vous	devez	toujours	le	féliciter	et	le	récompenser	avec	une	gâterie.	Pour	éviter	de	mettre	vos	doigts	dans	la	gueule	de	votre	compagnon,	vous	pouvez	utiliser	une	seringue	spéciale.	Il	s’agit	d’un	tube	en	plastique	similaire	à	une	seringue	qui	permet	de	déposer	le	comprimé	ou	la	capsule dans la gueule de l\'animal');

-- --------------------------------------------------------

--
-- Structure de la table `sous_titres`
--

DROP TABLE IF EXISTS `sous_titres`;
CREATE TABLE IF NOT EXISTS `sous_titres` (
  `ID_SOUS_TITRE` int(11) NOT NULL AUTO_INCREMENT,
  `SOUS_TITRES` varchar(4000) DEFAULT NULL,
  PRIMARY KEY (`ID_SOUS_TITRE`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sous_titres`
--

INSERT INTO `sous_titres` (`ID_SOUS_TITRE`, `SOUS_TITRES`) VALUES
(1, 'Radiographie'),
(2, 'Echographie'),
(3, 'Analyses sanguines'),
(4, 'Laboratoire et cytologie'),
(5, 'Dentisterie'),
(6, 'Chirurgie'),
(7, 'Hospitalisation'),
(8, 'Service de garde'),
(9, 'Docteurs	:		-	Remain,	André		-	Burlotte,	Sylvie	'),
(10, '\r\n	ASV		-Abeauvaux,	Jérôme'),
(11, 'Fiches Conseils');

-- --------------------------------------------------------

--
-- Structure de la table `sous_titres_paragraphes`
--

DROP TABLE IF EXISTS `sous_titres_paragraphes`;
CREATE TABLE IF NOT EXISTS `sous_titres_paragraphes` (
  `ID_SOUS_TITRE` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PARAGRAPHE` int(11) NOT NULL,
  `ORDRE` int(11) NOT NULL,
  PRIMARY KEY (`ID_SOUS_TITRE`,`ID_PARAGRAPHE`) USING BTREE,
  KEY `FK_SOUS_TITRES_PARAGRAPHES` (`ID_PARAGRAPHE`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sous_titres_paragraphes`
--

INSERT INTO `sous_titres_paragraphes` (`ID_SOUS_TITRE`, `ID_PARAGRAPHE`, `ORDRE`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 41, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(11, 16, 1),
(11, 11, 1),
(11, 12, 1),
(11, 13, 1),
(11, 14, 1),
(11, 15, 1),
(11, 17, 1),
(11, 18, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
