-- Adminer 4.8.1 MySQL 5.5.5-10.5.15-MariaDB-0+deb11u1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `nuotraukos`;
CREATE TABLE `nuotraukos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `viesbucio_id` int(11) NOT NULL,
  `nuotraukos_url` varchar(1500) COLLATE utf8_lithuanian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

INSERT INTO `nuotraukos` (`id`, `viesbucio_id`, `nuotraukos_url`) VALUES
(1,	1,	'1-flora-garden.jpg'),
(2,	1,	'2-flora-garden.jpg'),
(3,	1,	'3-flora-garden.jpg'),
(4,	1,	'4-flora-garden.jpg'),
(5,	1,	'5-flora-garden.jpg'),
(6,	3,	'1-ramada-resort.JPG'),
(7,	3,	'2-ramada-resort.JPG'),
(8,	3,	'3-ramada-resort.JPG'),
(9,	3,	'4-ramada-resort.JPG'),
(10,	3,	'5-ramada-resort.jpg'),
(11,	4,	'1-banesta.jpg'),
(12,	4,	'2-banesta.jpg'),
(13,	4,	'3-banesta.jpg'),
(14,	2,	'1-tolip-inn.JPG'),
(15,	2,	'2-tolip-inn.JPG'),
(16,	2,	'3-tolip-inn.JPG'),
(17,	5,	'1-new-eagles.jpg'),
(18,	5,	'2-new-eagles.jpg'),
(19,	5,	'3-new-eagles.jpg'),
(20,	5,	'4-new-eagles.jpg'),
(21,	9,	'1-new-eagles.jpg'),
(22,	9,	'2-new-eagles.jpg'),
(23,	10,	'1-neptuno-beach.jpg'),
(24,	10,	'2-neptuno-beach.jpg'),
(25,	10,	'3-neptuno-beach.jpg'),
(26,	6,	'1-flora-garden.jpg'),
(27,	6,	'2-flora-garden.jpg'),
(28,	6,	'3-flora-garden.jpg'),
(29,	6,	'4-flora-garden.jpg'),
(30,	6,	'5-flora-garden.jpg'),
(31,	7,	'1-ramada-resort.JPG'),
(32,	7,	'2-ramada-resort.JPG'),
(33,	7,	'3-ramada-resort.JPG'),
(34,	7,	'4-ramada-resort.JPG'),
(35,	7,	'5-ramada-resort.jpg'),
(36,	8,	'1-tolip-inn.JPG'),
(37,	8,	'2-tolip-inn.JPG'),
(38,	8,	'3-tolip-inn.JPG'),
(39,	9,	'3-new-eagles.jpg'),
(40,	9,	'4-new-eagles.jpg'),
(41,	11,	'1-lardos-bay.jpg'),
(42,	11,	'2-lardos-bay.jpg'),
(43,	11,	'3-lardos-bay.jpg'),
(44,	11,	'4-lardos-bay.jpg'),
(45,	12,	'1-flora-garden.jpg'),
(46,	12,	'2-flora-garden.jpg'),
(47,	12,	'3-flora-garden.jpg'),
(48,	12,	'4-flora-garden.jpg'),
(49,	12,	'5-flora-garden.jpg'),
(50,	13,	'1-banesta.jpg'),
(51,	13,	'2-banesta.jpg'),
(52,	13,	'3-banesta.jpg'),
(53,	14,	'1-flora-garden.jpg'),
(54,	14,	'2-flora-garden.jpg'),
(55,	14,	'3-flora-garden.jpg'),
(56,	14,	'4-flora-garden.jpg'),
(57,	14,	'5-flora-garden.jpg'),
(58,	15,	'1-ramada-resort.JPG'),
(59,	15,	'2-ramada-resort.JPG'),
(60,	15,	'3-ramada-resort.JPG'),
(61,	15,	'4-ramada-resort.JPG'),
(62,	15,	'5-ramada-resort.jpg'),
(63,	16,	'1-banesta.jpg'),
(64,	16,	'2-banesta.jpg'),
(65,	16,	'3-banesta.jpg'),
(66,	17,	'1-flora-garden.jpg'),
(67,	17,	'2-flora-garden.jpg'),
(68,	17,	'3-flora-garden.jpg'),
(69,	17,	'4-flora-garden.jpg'),
(70,	17,	'5-flora-garden.jpg'),
(71,	18,	'1-ramada-resort.JPG'),
(72,	18,	'2-ramada-resort.JPG'),
(73,	18,	'3-ramada-resort.JPG'),
(74,	18,	'4-ramada-resort.JPG'),
(75,	18,	'5-ramada-resort.jpg'),
(76,	19,	'1-banesta.jpg'),
(77,	19,	'2-banesta.jpg'),
(78,	19,	'3-banesta.jpg'),
(79,	20,	'1-tolip-inn.JPG'),
(80,	20,	'2-tolip-inn.JPG'),
(81,	20,	'3-tolip-inn.JPG'),
(82,	21,	'1-new-eagles.jpg'),
(83,	21,	'2-new-eagles.jpg'),
(84,	21,	'3-new-eagles.jpg'),
(85,	21,	'4-new-eagles.jpg'),
(86,	22,	'1-tolip-inn.JPG'),
(87,	22,	'2-tolip-inn.JPG'),
(88,	22,	'3-tolip-inn.JPG'),
(89,	23,	'1-new-eagles.jpg'),
(90,	23,	'2-new-eagles.jpg'),
(91,	23,	'3-new-eagles.jpg'),
(92,	23,	'4-new-eagles.jpg'),
(93,	24,	'1-semoris.JPG'),
(94,	24,	'2-semoris.jpg'),
(95,	24,	'3-semoris.jpg'),
(96,	24,	'4-semoris.JPG'),
(97,	25,	'1-meltem.jpg'),
(98,	25,	'2-meltem.jpg'),
(99,	25,	'3-meltem.JPG');

DROP TABLE IF EXISTS `paslaugos`;
CREATE TABLE `paslaugos` (
  `paslaugosid` int(11) NOT NULL AUTO_INCREMENT,
  `pavadinimas` varchar(32) COLLATE utf8_lithuanian_ci NOT NULL,
  `kaina` double NOT NULL,
  PRIMARY KEY (`paslaugosid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

INSERT INTO `paslaugos` (`paslaugosid`, `pavadinimas`, `kaina`) VALUES
(1,	'Pervežimai',	15),
(2,	'Kelionės draudimas',	10),
(3,	'Papildomas bagažas (+5kg)',	5),
(5,	'Vieta lėktuve',	3);

DROP TABLE IF EXISTS `skrydziai`;
CREATE TABLE `skrydziai` (
  `skrydzioid` int(11) NOT NULL AUTO_INCREMENT,
  `kryptis_is` varchar(32) COLLATE utf8_lithuanian_ci NOT NULL,
  `kryptis_i` varchar(32) COLLATE utf8_lithuanian_ci NOT NULL,
  `kompanija` varchar(32) COLLATE utf8_lithuanian_ci NOT NULL,
  `isvykimo_data` datetime NOT NULL,
  `grizimo_data` datetime NOT NULL,
  `isvykimo_kaina` double NOT NULL,
  `grizimo_kaina` double NOT NULL,
  `galutine_kaina` double NOT NULL,
  `nuotrauka_url` varchar(1500) COLLATE utf8_lithuanian_ci DEFAULT NULL,
  PRIMARY KEY (`skrydzioid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

INSERT INTO `skrydziai` (`skrydzioid`, `kryptis_is`, `kryptis_i`, `kompanija`, `isvykimo_data`, `grizimo_data`, `isvykimo_kaina`, `grizimo_kaina`, `galutine_kaina`, `nuotrauka_url`) VALUES
(1,	'Vilnius',	'Turkija',	'GetJet',	'2022-06-07 05:40:00',	'2022-06-14 09:35:00',	64.99,	79.99,	144.98,	'turkija.jpg'),
(2,	'Kaunas',	'Egiptas',	'Avion Express',	'2022-06-09 08:10:00',	'2022-06-16 15:40:00',	89,	95,	184,	'egiptas.jpg'),
(3,	'Vilnius',	'Turkija',	'GetJet',	'2022-07-05 05:40:00',	'2022-07-12 09:35:00',	59.99,	89.99,	149.98,	'turkija.jpg'),
(4,	'Kaunas',	'Egiptas',	'Avion Express',	'2022-06-02 08:10:00',	'2022-06-09 15:40:00',	153.49,	113.99,	267.48,	'egiptas.jpg'),
(5,	'Vilnius',	'Turkija',	'GetJet',	'2022-06-14 05:40:00',	'2022-06-21 09:35:00',	65,	92,	157,	'turkija.jpg'),
(6,	'Vilnius',	'Graikija',	'Airline',	'2022-06-04 04:15:00',	'2022-06-11 12:25:00',	55,	65,	120,	'graikija.jpg'),
(7,	'Vilnius',	'Turkija',	'GetJet',	'2022-06-21 05:40:00',	'2022-06-28 09:35:00',	35,	74.99,	109.99,	'turkija.jpg'),
(8,	'Kaunas',	'Egiptas',	'Avion Express',	'2022-06-16 08:10:00',	'2022-06-23 15:40:00',	41.35,	53,	94.35,	'egiptas.jpg'),
(9,	'Kaunas',	'Egiptas',	'Avion Express',	'2022-06-23 08:10:00',	'2022-06-30 15:40:00',	45,	52.99,	97.99,	'egiptas.jpg'),
(10,	'Vilnius',	'Turkija',	'GetJet',	'2022-06-28 05:40:00',	'2022-07-05 09:35:00',	67,	88,	155,	'turkija.jpg');

DROP TABLE IF EXISTS `uzsakymai`;
CREATE TABLE `uzsakymai` (
  `uzsakymoid` int(11) NOT NULL AUTO_INCREMENT,
  `skrydzioid` int(11) NOT NULL,
  `viesbucioid` int(11) NOT NULL,
  `vartid` int(11) NOT NULL,
  `paslaugos` longtext COLLATE utf8_lithuanian_ci DEFAULT NULL,
  PRIMARY KEY (`uzsakymoid`),
  KEY `skrydzioid` (`skrydzioid`),
  KEY `viesbucioid` (`viesbucioid`),
  KEY `vartid` (`vartid`),
  CONSTRAINT `uzsakymai_ibfk_1` FOREIGN KEY (`skrydzioid`) REFERENCES `skrydziai` (`skrydzioid`),
  CONSTRAINT `uzsakymai_ibfk_2` FOREIGN KEY (`viesbucioid`) REFERENCES `viesbuciai` (`viesbucioid`),
  CONSTRAINT `uzsakymai_ibfk_4` FOREIGN KEY (`vartid`) REFERENCES `vartotojai` (`vartid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

INSERT INTO `uzsakymai` (`uzsakymoid`, `skrydzioid`, `viesbucioid`, `vartid`, `paslaugos`) VALUES
(3,	1,	1,	4,	'[\"1\",\"2\"]');

DROP TABLE IF EXISTS `vartotojai`;
CREATE TABLE `vartotojai` (
  `vartid` int(11) NOT NULL AUTO_INCREMENT,
  `vardas` varchar(32) COLLATE utf8_lithuanian_ci NOT NULL,
  `pavarde` varchar(32) COLLATE utf8_lithuanian_ci NOT NULL,
  `gimimo_data` date NOT NULL,
  `el_pastas` varchar(64) COLLATE utf8_lithuanian_ci NOT NULL,
  `pr_vardas` varchar(32) COLLATE utf8_lithuanian_ci NOT NULL,
  `slaptazodis` varchar(64) COLLATE utf8_lithuanian_ci NOT NULL,
  `tipas` varchar(64) COLLATE utf8_lithuanian_ci DEFAULT NULL,
  PRIMARY KEY (`vartid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

INSERT INTO `vartotojai` (`vartid`, `vardas`, `pavarde`, `gimimo_data`, `el_pastas`, `pr_vardas`, `slaptazodis`, `tipas`) VALUES
(1,	'Donata',	'Remeikaite',	'2000-01-21',	'bakalauras@gmail.com',	'dorime',	'$2y$10$i99wFtDvQDMpuhDMIbaeoeWdhQ7ZZ.1yiRB55RkJeqd/Mtcr4entG',	'admin'),
(4,	'Donata',	'Remeikaitė',	'2000-01-21',	'dorime2000@gmail.com',	'Donata',	'$2y$10$vLzSfvKsmkzRbnsNeeTu4OrZRGZn.4UYyUL34JrQRMA.RxPtlaCGi',	NULL);

DROP TABLE IF EXISTS `viesbuciai`;
CREATE TABLE `viesbuciai` (
  `viesbucioid` int(11) NOT NULL AUTO_INCREMENT,
  `pavadinimas` varchar(128) COLLATE utf8_lithuanian_ci NOT NULL,
  `kryptis_i` varchar(32) COLLATE utf8_lithuanian_ci NOT NULL,
  `atvykimo_data` datetime NOT NULL,
  `isvykimo_data` datetime NOT NULL,
  `zvaigzdutes` int(11) NOT NULL,
  `maitinimas` varchar(32) COLLATE utf8_lithuanian_ci NOT NULL,
  `vieta` varchar(32) COLLATE utf8_lithuanian_ci NOT NULL,
  `tema` varchar(32) COLLATE utf8_lithuanian_ci NOT NULL,
  `kaina` double NOT NULL,
  `aprasymas` mediumtext COLLATE utf8_lithuanian_ci NOT NULL,
  PRIMARY KEY (`viesbucioid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

INSERT INTO `viesbuciai` (`viesbucioid`, `pavadinimas`, `kryptis_i`, `atvykimo_data`, `isvykimo_data`, `zvaigzdutes`, `maitinimas`, `vieta`, `tema`, `kaina`, `aprasymas`) VALUES
(1,	'Flora Garden',	'Turkija',	'2022-06-07 00:00:00',	'2022-06-14 00:00:00',	5,	'Viskas įskaičiuota',	'Ant jūros kranto',	'Poroms',	345,	'         Viešbučio vieta: Apie 90 km iki Izmiro miesto oro uosto, apie 114 km iki Bodrumo miesto oro uosto, apie 12 km iki Kušadasio, Davutlaro gyvenvietėje, apie 35 km iki istorinio Efeso miesto, ant jūros kranto. Viešbutis: Pastatytas 2016 metais, bendras plotas apima 13 000 m2. </br> Numeryje: •	virdulys •	internetas: Wi-Fi nemokamai •	balkonas/terasa •	dušas •	telefonas •	kavos/arbatos rinkinys •	seifas numeryje, nemokamai •	aptarnavimas numeriuose: visą parą, mokamai •	plaukų džiovintuvas: yra •	oro kondicionierius: centrinis •	grindys: parketas •	patalynės keitimas: 3 kartus per savaitę •	numerių tvarkymas: kasdien •	televizorius: yra (rusiški kanalai) •	mini baras 2 (gaivieji gėrimai - už papildomą mokestį) Viešbučio teritorijoje: •	uždari baseinai: 1 •	kirpykla •	barai: 5 •	gydytojo kabinetas •	vandens kalneliai: 2 •	belaidis internetas nemokamai (viešbučio teritorijoje) •	konferencijų salės: 1 (70-200 asm.) •	restoranai: 1 (pagrindinis) •	parduotuvės •	drabužių skalbimo paslaugos •	prie baseino: skėčiai, gultai - nemokamai •	a la carte restoranai: 3 (tarptautinis, Steak house - pagal išankstinę rezervaciją - už papildomą mokestį) •	baseinai: 2 (atviri) •	prie baseino: paplūdimio rankšluosčiai nemokamai Pramogos ir sportas: •	teniso kortas nemokamai (su betono danga) •	masažas už papildomą mokestį •	sūkurinė vonia už papildomą mokestį •	stalo tenisas nemokamai •	biliardas už papildomą mokestį •	sauna nemokamai •	Wellness centras •	pirtis nemokamai •	paplūdimio tinklinis nemokamai •	turkiška pirtis nemokamai •	teniso korto apšvietimas už papildomą mokestį •	gyva muzika nemokamai •	pramoginiai renginiai nemokamai •	krepšinis nemokamai •	treniruoklių salė nemokamai •	vandens aerobika nemokamai Paplūdimys: •	paplūdimyje: skėčiai, gultai nemokamai •	smėlio •	nuosavas •	paplūdimio rankšluosčiai: nemokamai Vaikams: •	vaikų klubas (4-12 metų) •	baseinas vaikams: yra •	vandens kalneliai: 2 •	žaidimų aikštelės'),
(2,	'Tolip Inn',	'Egiptas',	'2022-06-02 00:00:00',	'2022-06-09 00:00:00',	4,	'Puryčiai ir vakarienė',	'Miesto centre',	'Šeimai',	530,	'Šarm el Šeiche, už 17 km nuo Šarm El Šeicho SOHO aikštės, įsikūrusiame viešbutyje „Tolip Inn“ yra restoranas, nemokama automobilių stovėjimo aikštelė, lauko baseinas ir treniruoklių salė. Tarp įvairių patogumų yra baras, bendras poilsio kambarys ir sodas. Apgyvendinimo įstaigoje yra visą parą dirbanti registratūra, teikiamos kambarių tarnybos paslaugos ir svečiams organizuojamos ekskursijos.  Visi svečiai gali naudotis nemokamu belaidžiu internetu, o kai kuriuose kambariuose yra balkonai.  Kiekvieną rytą užeigoje patiekiami lengvieji pusryčiai.  „Tolip Inn Sharm Spa and Aqua Park“ yra terasa.  Ras Mohammed nacionalinis parkas yra už 18 km, o Senasis turgus – už 4,1 km. Artimiausias, Šarm el Šeicho tarptautinis, oro uostas įsikūręs už 22 km nuo „Tolip Inn Sharm Spa and Aqua Park“.'),
(3,	'Ramada Resort',	'Turkija',	'2022-07-05 00:00:00',	'2022-07-12 00:00:00',	4,	'Pusryčiai ir vakarienė',	'Ant jūros kranto',	'Šeimai',	215,	'Vieta: apie 60 km iki Antalijos oro uosto, apie 16 km iki Sidės centro, apie 500 m iki paplūdimio. Viešbutis: pastatytas 2015 metais, paskutinį kartą atnaujintas 2019 metais. Viešbutį sudaro trys 4-jų aukštų pastatai. Numeriuose: •	seifas •	oro kondicionierius: individualus •	telefonas •	patalynės keitimas: 2 kartus per savaitę •	mini baras  •	plaukų džiovintuvas •	balkonas •	televizorius: palydovinė •	dušas •	internetas: Wi-Fi Viešbučio teritorijoje: •	kirpykla •	5 barai •	restoranas •	2 a la carte restoranai •	automobilių nuoma •	2 baseinai •	prie baseino: skėčiai, gultai- nemokamai •	belaidis internetas  •	gydytojo kabinetas •	5 vandens kalneliai •	parduotuvės Pramogos ir sportas: •	sauna  •	SPA centras •	pirtis  •	diskoteka  •	turkiška pirtis  •	vandens aerobika  •	paplūdimio tinklinis  •	smiginis nemokamai •	pramoginiai renginiai •	naktinis klubas •	stalo tenisas  •	gyva muzika  •	mini futbolas  Už papildomą mokestį: •	vandens sporto priemonės Vaikams: •	žaidimų kambarys •	baseinas vaikams'),
(4,	'Banesta',	'Turkija',	'2022-06-07 00:00:00',	'2022-06-14 00:00:00',	4,	'Be maitinimo',	'Miesto centre',	'Verslas',	105,	'Stambule, vos už 1 km nuo Taksimo aikštės ir už 18 minučių kelio pėsčiomis nuo Galatos bokšto, įsikūrusiame viešbutyje „BENESTA BEYOGLU“ yra baseinas. Mažiau nei už 1 km nuo Istiklal gatvės yra numeriai su oro kondicionieriais. Svečiai gali nemokamai naudotis belaidžiu internetu ir privačia automobilių stovėjimo aikštele.  Apartamentuose yra 1 miegamasis, 1 vonios kambarys, patalynės užvalkalai, rankšluosčiai, plokščiaekranis televizorius, valgomojo zona, virtuvė ir balkonas su vaizdu į miestą. Svečiams už papildomą mokestį suteikiami rankšluosčiai ir patalynės užvalkalai.  Stambulo kongresų centras yra už 1,7 km nuo apartamentų, o Dolmabahce laikrodžio bokštas – už 2 km.'),
(5,	'New Eagles',	'Egiptas',	'2022-06-02 00:00:00',	'2022-06-09 00:00:00',	4,	'Viskas įskaičiuota',	'Ant jūros kranto',	'Šeimai',	450,	'Hurgadoje, už 350 metrų nuo Mercure Hurghada paplūdimio įsikūrusiame poilsio komplekse „New Eagles Aqua Park Resort“ yra restoranas, nemokama automobilių stovėjimo aikštelė, lauko baseinas ir baras. Apgyvendinimo įstaigoje yra privatus paplūdimys, vandens sporto įranga, bendras poilsio kambarys ir sodas. Apgyvendinimo įstaigoje yra visą parą dirbanti registratūra, bendra virtuvė ir valiutos keitykla.  Kiekviename kurorto kambaryje yra oro kondicionierius, drabužių spinta, balkonas su vaizdu į baseiną, vonios kambarys, plokščiaekranis televizorius, patalynės užvalkalai ir rankšluosčiai. Svečių kambariuose yra seifai.  Apgyvendinimo įstaigoje yra vaikų žaidimų aikštelė. „New Eagles Aqua Park Resort“ galėsite žaisti biliardą, stalo tenisą ir smiginį, o apylinkėse – žygiai pėsčiomis ir važinėtis dviračiais.  Netoliese yra Albatros paplūdimys, Solano paplūdimys ir Hurgados didysis akvariumas. Artimiausias, Hurgados tarptautinis, oro uostas įsikūręs už 6 km nuo „New Eagles Aqua Park Resort“.'),
(6,	'Flora Garden',	'Turkija',	'2022-07-05 00:00:00',	'2022-07-12 00:00:00',	5,	'Viskas įskaičiuota',	'Ant jūros kranto',	'Poroms',	300,	'Viešbučio vieta: Apie 90 km iki Izmiro miesto oro uosto, apie 114 km iki Bodrumo miesto oro uosto, apie 12 km iki Kušadasio, Davutlaro gyvenvietėje, apie 35 km iki istorinio Efeso miesto, ant jūros kranto. Viešbutis: Pastatytas 2016 metais, bendras plotas apima 13 000 m2.  Numeryje: •	virdulys •	internetas: Wi-Fi nemokamai •	balkonas/terasa •	dušas •	telefonas •	kavos/arbatos rinkinys •	seifas numeryje, nemokamai •	aptarnavimas numeriuose: visą parą, mokamai •	plaukų džiovintuvas: yra •	oro kondicionierius: centrinis •	grindys: parketas •	patalynės keitimas: 3 kartus per savaitę •	numerių tvarkymas: kasdien •	televizorius: yra (rusiški kanalai) •	mini baras 2 (gaivieji gėrimai - už papildomą mokestį) Viešbučio teritorijoje: •	uždari baseinai: 1 •	kirpykla •	barai: 5 •	gydytojo kabinetas •	vandens kalneliai: 2 •	belaidis internetas nemokamai (viešbučio teritorijoje) •	konferencijų salės: 1 (70-200 asm.) •	restoranai: 1 (pagrindinis) •	parduotuvės •	drabužių skalbimo paslaugos •	prie baseino: skėčiai, gultai - nemokamai •	a la carte restoranai: 3 (tarptautinis, Steak house - pagal išankstinę rezervaciją - už papildomą mokestį) •	baseinai: 2 (atviri) •	prie baseino: paplūdimio rankšluosčiai nemokamai Pramogos ir sportas: •	teniso kortas nemokamai (su betono danga) •	masažas už papildomą mokestį •	sūkurinė vonia už papildomą mokestį •	stalo tenisas nemokamai •	biliardas už papildomą mokestį •	sauna nemokamai •	Wellness centras •	pirtis nemokamai •	paplūdimio tinklinis nemokamai •	turkiška pirtis nemokamai •	teniso korto apšvietimas už papildomą mokestį •	gyva muzika nemokamai •	pramoginiai renginiai nemokamai •	krepšinis nemokamai •	treniruoklių salė nemokamai •	vandens aerobika nemokamai Paplūdimys: •	paplūdimyje: skėčiai, gultai nemokamai •	smėlio •	nuosavas •	paplūdimio rankšluosčiai: nemokamai Vaikams: •	vaikų klubas (4-12 metų) •	baseinas vaikams: yra •	vandens kalneliai: 2 •	žaidimų aikštelė'),
(7,	'Ramada Resort',	'Turkija',	'2022-06-07 00:00:00',	'2022-06-14 00:00:00',	4,	'Pusryčiai ir vakarienė',	'Ant jūros kranto',	'Šeimai',	175,	'Vieta: apie 60 km iki Antalijos oro uosto, apie 16 km iki Sidės centro, apie 500 m iki paplūdimio. Viešbutis: pastatytas 2015 metais, paskutinį kartą atnaujintas 2019 metais. Viešbutį sudaro trys 4-jų aukštų pastatai. Numeriuose: •	seifas •	oro kondicionierius: individualus •	telefonas •	patalynės keitimas: 2 kartus per savaitę •	mini baras  •	plaukų džiovintuvas •	balkonas •	televizorius: palydovinė •	dušas •	internetas: Wi-Fi Viešbučio teritorijoje: •	kirpykla •	5 barai •	restoranas •	2 a la carte restoranai •	automobilių nuoma •	2 baseinai •	prie baseino: skėčiai, gultai- nemokamai •	belaidis internetas  •	gydytojo kabinetas •	5 vandens kalneliai •	parduotuvės Pramogos ir sportas: •	sauna  •	SPA centras •	pirtis  •	diskoteka  •	turkiška pirtis  •	vandens aerobika  •	paplūdimio tinklinis  •	smiginis nemokamai •	pramoginiai renginiai •	naktinis klubas •	stalo tenisas  •	gyva muzika  •	mini futbolas  Už papildomą mokestį: •	vandens sporto priemonės Vaikams: •	žaidimų kambarys •	baseinas vaikams'),
(8,	'Tolip Inn',	'Egiptas',	'2022-06-09 00:00:00',	'2022-06-16 00:00:00',	4,	'Puryčiai ir vakarienė',	'Miesto centre',	'Šeimai',	530,	'Šarm el Šeiche, už 17 km nuo Šarm El Šeicho SOHO aikštės, įsikūrusiame viešbutyje „Tolip Inn“ yra restoranas, nemokama automobilių stovėjimo aikštelė, lauko baseinas ir treniruoklių salė. Tarp įvairių patogumų yra baras, bendras poilsio kambarys ir sodas. Apgyvendinimo įstaigoje yra visą parą dirbanti registratūra, teikiamos kambarių tarnybos paslaugos ir svečiams organizuojamos ekskursijos.  Visi svečiai gali naudotis nemokamu belaidžiu internetu, o kai kuriuose kambariuose yra balkonai.  Kiekvieną rytą užeigoje patiekiami lengvieji pusryčiai.  „Tolip Inn Sharm Spa and Aqua Park“ yra terasa.  Ras Mohammed nacionalinis parkas yra už 18 km, o Senasis turgus – už 4,1 km. Artimiausias, Šarm el Šeicho tarptautinis, oro uostas įsikūręs už 22 km nuo „Tolip Inn Sharm Spa and Aqua Park“.'),
(9,	'New Eagles',	'Egiptas',	'2022-06-09 00:00:00',	'2022-06-16 00:00:00',	4,	'Viskas įskaičiuota',	'Ant jūros kranto',	'Šeimai',	450,	'Hurgadoje, už 350 metrų nuo Mercure Hurghada paplūdimio įsikūrusiame poilsio komplekse „New Eagles Aqua Park Resort“ yra restoranas, nemokama automobilių stovėjimo aikštelė, lauko baseinas ir baras. Apgyvendinimo įstaigoje yra privatus paplūdimys, vandens sporto įranga, bendras poilsio kambarys ir sodas. Apgyvendinimo įstaigoje yra visą parą dirbanti registratūra, bendra virtuvė ir valiutos keitykla.  Kiekviename kurorto kambaryje yra oro kondicionierius, drabužių spinta, balkonas su vaizdu į baseiną, vonios kambarys, plokščiaekranis televizorius, patalynės užvalkalai ir rankšluosčiai. Svečių kambariuose yra seifai.  Apgyvendinimo įstaigoje yra vaikų žaidimų aikštelė. „New Eagles Aqua Park Resort“ galėsite žaisti biliardą, stalo tenisą ir smiginį, o apylinkėse – žygiai pėsčiomis ir važinėtis dviračiais.  Netoliese yra Albatros paplūdimys, Solano paplūdimys ir Hurgados didysis akvariumas. Artimiausias, Hurgados tarptautinis, oro uostas įsikūręs už 6 km nuo „New Eagles Aqua Park Resort“.'),
(10,	'Neptuno Beach',	'Graikija',	'2022-06-04 00:00:00',	'2022-06-11 00:00:00',	4,	'Viskas įskaičiuota',	'Ant jūros kranto',	'Šeimai',	147,	'Apie viešbutį  Pastatytas 1998 metais, paskutinį kartą atnaujintas 2016 metais. Viešbutį sudaro pagrindinis pastatas su liftu ir du papildomi 3-jų aukštų pastatai. Viso yra 135 numeriai.  Apgyvendinimas su gyvūnais: neįmanomas Viešbučio vieta  Kurortinėje Amudaros gyvenvietėje, apie 6 km iki Herakliono miesto centro, apie 11 km iki tarptautinio Herakliono oro uosto. Apie 100 m iki autobusų stotelės. Vakaro pramogos: Amudaros gyvenvietėje (apie 400 m), Herakliono mieste (apie 6 km) '),
(11,	'Lardos Bay',	'Graikija',	'2022-06-04 00:00:00',	'2022-06-11 00:00:00',	3,	'Pusryčiai ir vakarienė',	'Ant jūros kranto',	'Poroms',	125,	'Apie viešbutį  Pastatytas 1994 metais, kasmet atliekami atnaujinimo darbai. Viešbutį sudaro keturi 2-jų aukštų pastatai.  Viso yra 111 numerių: Nėra numerių pritaikytų asmenims su negalia. Apgyvendinimas su gyvūnais: neįmanomas Viešbučio vieta  Apie 60 km iki Rodo oro uosto, apie 8 km iki istorinio Lindos centro, apie 3 km iki Lardo kaimo, apie 150 m iki paplūdimio.  Autobusų stotelė pasiekiama pėsčiomis. Vakaro pramogos: Lindos gyvenvietėje (apie 12 km). '),
(12,	'Flora Garden',	'Turkija',	'2022-06-14 00:00:00',	'2022-06-21 00:00:00',	5,	'Viskas įskaičiuota',	'Ant jūros kranto',	'Poroms',	295,	'Viešbučio vieta: Apie 90 km iki Izmiro miesto oro uosto, apie 114 km iki Bodrumo miesto oro uosto, apie 12 km iki Kušadasio, Davutlaro gyvenvietėje, apie 35 km iki istorinio Efeso miesto, ant jūros kranto. Viešbutis: Pastatytas 2016 metais, bendras plotas apima 13 000 m2.  Numeryje: •	virdulys •	internetas: Wi-Fi nemokamai •	balkonas/terasa •	dušas •	telefonas •	kavos/arbatos rinkinys •	seifas numeryje, nemokamai •	aptarnavimas numeriuose: visą parą, mokamai •	plaukų džiovintuvas: yra •	oro kondicionierius: centrinis •	grindys: parketas •	patalynės keitimas: 3 kartus per savaitę •	numerių tvarkymas: kasdien •	televizorius: yra (rusiški kanalai) •	mini baras 2 (gaivieji gėrimai - už papildomą mokestį) Viešbučio teritorijoje: •	uždari baseinai: 1 •	kirpykla •	barai: 5 •	gydytojo kabinetas •	vandens kalneliai: 2 •	belaidis internetas nemokamai (viešbučio teritorijoje) •	konferencijų salės: 1 (70-200 asm.) •	restoranai: 1 (pagrindinis) •	parduotuvės •	drabužių skalbimo paslaugos •	prie baseino: skėčiai, gultai - nemokamai •	a la carte restoranai: 3 (tarptautinis, Steak house - pagal išankstinę rezervaciją - už papildomą mokestį) •	baseinai: 2 (atviri) •	prie baseino: paplūdimio rankšluosčiai nemokamai Pramogos ir sportas: •	teniso kortas nemokamai (su betono danga) •	masažas už papildomą mokestį •	sūkurinė vonia už papildomą mokestį •	stalo tenisas nemokamai •	biliardas už papildomą mokestį •	sauna nemokamai •	Wellness centras •	pirtis nemokamai •	paplūdimio tinklinis nemokamai •	turkiška pirtis nemokamai •	teniso korto apšvietimas už papildomą mokestį •	gyva muzika nemokamai •	pramoginiai renginiai nemokamai •	krepšinis nemokamai •	treniruoklių salė nemokamai •	vandens aerobika nemokamai Paplūdimys: •	paplūdimyje: skėčiai, gultai nemokamai •	smėlio •	nuosavas •	paplūdimio rankšluosčiai: nemokamai Vaikams: •	vaikų klubas (4-12 metų) •	baseinas vaikams: yra •	vandens kalneliai: 2 •	žaidimų aikštelė'),
(13,	'Banesta',	'Turkija',	'2022-06-14 00:00:00',	'2022-06-21 00:00:00',	4,	'Be maitinimo',	'Miesto centre',	'Verslas',	115,	'Stambule, vos už 1 km nuo Taksimo aikštės ir už 18 minučių kelio pėsčiomis nuo Galatos bokšto, įsikūrusiame viešbutyje „BENESTA BEYOGLU“ yra baseinas. Mažiau nei už 1 km nuo Istiklal gatvės yra numeriai su oro kondicionieriais. Svečiai gali nemokamai naudotis belaidžiu internetu ir privačia automobilių stovėjimo aikštele.  Apartamentuose yra 1 miegamasis, 1 vonios kambarys, patalynės užvalkalai, rankšluosčiai, plokščiaekranis televizorius, valgomojo zona, virtuvė ir balkonas su vaizdu į miestą. Svečiams už papildomą mokestį suteikiami rankšluosčiai ir patalynės užvalkalai.  Stambulo kongresų centras yra už 1,7 km nuo apartamentų, o Dolmabahce laikrodžio bokštas – už 2 km.'),
(14,	'Flora Garden',	'Turkija',	'2022-06-21 00:00:00',	'2022-06-28 00:00:00',	5,	'Viskas įskaičiuota',	'Ant jūros kranto',	'Poroms',	248,	'Viešbučio vieta: Apie 90 km iki Izmiro miesto oro uosto, apie 114 km iki Bodrumo miesto oro uosto, apie 12 km iki Kušadasio, Davutlaro gyvenvietėje, apie 35 km iki istorinio Efeso miesto, ant jūros kranto. Viešbutis: Pastatytas 2016 metais, bendras plotas apima 13 000 m2.  Numeryje: •	virdulys •	internetas: Wi-Fi nemokamai •	balkonas/terasa •	dušas •	telefonas •	kavos/arbatos rinkinys •	seifas numeryje, nemokamai •	aptarnavimas numeriuose: visą parą, mokamai •	plaukų džiovintuvas: yra •	oro kondicionierius: centrinis •	grindys: parketas •	patalynės keitimas: 3 kartus per savaitę •	numerių tvarkymas: kasdien •	televizorius: yra (rusiški kanalai) •	mini baras 2 (gaivieji gėrimai - už papildomą mokestį) Viešbučio teritorijoje: •	uždari baseinai: 1 •	kirpykla •	barai: 5 •	gydytojo kabinetas •	vandens kalneliai: 2 •	belaidis internetas nemokamai (viešbučio teritorijoje) •	konferencijų salės: 1 (70-200 asm.) •	restoranai: 1 (pagrindinis) •	parduotuvės •	drabužių skalbimo paslaugos •	prie baseino: skėčiai, gultai - nemokamai •	a la carte restoranai: 3 (tarptautinis, Steak house - pagal išankstinę rezervaciją - už papildomą mokestį) •	baseinai: 2 (atviri) •	prie baseino: paplūdimio rankšluosčiai nemokamai Pramogos ir sportas: •	teniso kortas nemokamai (su betono danga) •	masažas už papildomą mokestį •	sūkurinė vonia už papildomą mokestį •	stalo tenisas nemokamai •	biliardas už papildomą mokestį •	sauna nemokamai •	Wellness centras •	pirtis nemokamai •	paplūdimio tinklinis nemokamai •	turkiška pirtis nemokamai •	teniso korto apšvietimas už papildomą mokestį •	gyva muzika nemokamai •	pramoginiai renginiai nemokamai •	krepšinis nemokamai •	treniruoklių salė nemokamai •	vandens aerobika nemokamai Paplūdimys: •	paplūdimyje: skėčiai, gultai nemokamai •	smėlio •	nuosavas •	paplūdimio rankšluosčiai: nemokamai Vaikams: •	vaikų klubas (4-12 metų) •	baseinas vaikams: yra •	vandens kalneliai: 2 •	žaidimų aikštelė'),
(15,	'Ramada Resort',	'Turkija',	'2022-06-21 00:00:00',	'2022-06-28 00:00:00',	4,	'Pusryčiai ir vakarienė',	'Ant jūros kranto',	'Šeimai',	210,	'Vieta: apie 60 km iki Antalijos oro uosto, apie 16 km iki Sidės centro, apie 500 m iki paplūdimio. Viešbutis: pastatytas 2015 metais, paskutinį kartą atnaujintas 2019 metais. Viešbutį sudaro trys 4-jų aukštų pastatai. Numeriuose: •	seifas •	oro kondicionierius: individualus •	telefonas •	patalynės keitimas: 2 kartus per savaitę •	mini baras  •	plaukų džiovintuvas •	balkonas •	televizorius: palydovinė •	dušas •	internetas: Wi-Fi Viešbučio teritorijoje: •	kirpykla •	5 barai •	restoranas •	2 a la carte restoranai •	automobilių nuoma •	2 baseinai •	prie baseino: skėčiai, gultai- nemokamai •	belaidis internetas  •	gydytojo kabinetas •	5 vandens kalneliai •	parduotuvės Pramogos ir sportas: •	sauna  •	SPA centras •	pirtis  •	diskoteka  •	turkiška pirtis  •	vandens aerobika  •	paplūdimio tinklinis  •	smiginis nemokamai •	pramoginiai renginiai •	naktinis klubas •	stalo tenisas  •	gyva muzika  •	mini futbolas  Už papildomą mokestį: •	vandens sporto priemonės Vaikams: •	žaidimų kambarys •	baseinas vaikams'),
(16,	'Banesta',	'Turkija',	'2022-06-21 00:00:00',	'2022-06-28 00:00:00',	4,	'Be maitinimo',	'Miesto centre',	'Verslas',	55,	'Stambule, vos už 1 km nuo Taksimo aikštės ir už 18 minučių kelio pėsčiomis nuo Galatos bokšto, įsikūrusiame viešbutyje „BENESTA BEYOGLU“ yra baseinas. Mažiau nei už 1 km nuo Istiklal gatvės yra numeriai su oro kondicionieriais. Svečiai gali nemokamai naudotis belaidžiu internetu ir privačia automobilių stovėjimo aikštele.  Apartamentuose yra 1 miegamasis, 1 vonios kambarys, patalynės užvalkalai, rankšluosčiai, plokščiaekranis televizorius, valgomojo zona, virtuvė ir balkonas su vaizdu į miestą. Svečiams už papildomą mokestį suteikiami rankšluosčiai ir patalynės užvalkalai.  Stambulo kongresų centras yra už 1,7 km nuo apartamentų, o Dolmabahce laikrodžio bokštas – už 2 km.'),
(17,	'Flora Garden',	'Turkija',	'2022-06-28 00:00:00',	'2022-07-05 00:00:00',	5,	'Viskas įskaičiuota',	'Ant jūros kranto',	'Poroms',	322,	'Viešbučio vieta: Apie 90 km iki Izmiro miesto oro uosto, apie 114 km iki Bodrumo miesto oro uosto, apie 12 km iki Kušadasio, Davutlaro gyvenvietėje, apie 35 km iki istorinio Efeso miesto, ant jūros kranto. Viešbutis: Pastatytas 2016 metais, bendras plotas apima 13 000 m2.  Numeryje: •	virdulys •	internetas: Wi-Fi nemokamai •	balkonas/terasa •	dušas •	telefonas •	kavos/arbatos rinkinys •	seifas numeryje, nemokamai •	aptarnavimas numeriuose: visą parą, mokamai •	plaukų džiovintuvas: yra •	oro kondicionierius: centrinis •	grindys: parketas •	patalynės keitimas: 3 kartus per savaitę •	numerių tvarkymas: kasdien •	televizorius: yra (rusiški kanalai) •	mini baras 2 (gaivieji gėrimai - už papildomą mokestį) Viešbučio teritorijoje: •	uždari baseinai: 1 •	kirpykla •	barai: 5 •	gydytojo kabinetas •	vandens kalneliai: 2 •	belaidis internetas nemokamai (viešbučio teritorijoje) •	konferencijų salės: 1 (70-200 asm.) •	restoranai: 1 (pagrindinis) •	parduotuvės •	drabužių skalbimo paslaugos •	prie baseino: skėčiai, gultai - nemokamai •	a la carte restoranai: 3 (tarptautinis, Steak house - pagal išankstinę rezervaciją - už papildomą mokestį) •	baseinai: 2 (atviri) •	prie baseino: paplūdimio rankšluosčiai nemokamai Pramogos ir sportas: •	teniso kortas nemokamai (su betono danga) •	masažas už papildomą mokestį •	sūkurinė vonia už papildomą mokestį •	stalo tenisas nemokamai •	biliardas už papildomą mokestį •	sauna nemokamai •	Wellness centras •	pirtis nemokamai •	paplūdimio tinklinis nemokamai •	turkiška pirtis nemokamai •	teniso korto apšvietimas už papildomą mokestį •	gyva muzika nemokamai •	pramoginiai renginiai nemokamai •	krepšinis nemokamai •	treniruoklių salė nemokamai •	vandens aerobika nemokamai Paplūdimys: •	paplūdimyje: skėčiai, gultai nemokamai •	smėlio •	nuosavas •	paplūdimio rankšluosčiai: nemokamai Vaikams: •	vaikų klubas (4-12 metų) •	baseinas vaikams: yra •	vandens kalneliai: 2 •	žaidimų aikštelė'),
(18,	'Ramada Resort',	'Turkija',	'2022-06-28 00:00:00',	'2022-07-05 00:00:00',	4,	'Pusryčiai ir vakarienė',	'Ant jūros kranto',	'Šeimai',	138,	'Vieta: apie 60 km iki Antalijos oro uosto, apie 16 km iki Sidės centro, apie 500 m iki paplūdimio. Viešbutis: pastatytas 2015 metais, paskutinį kartą atnaujintas 2019 metais. Viešbutį sudaro trys 4-jų aukštų pastatai. Numeriuose: •	seifas •	oro kondicionierius: individualus •	telefonas •	patalynės keitimas: 2 kartus per savaitę •	mini baras  •	plaukų džiovintuvas •	balkonas •	televizorius: palydovinė •	dušas •	internetas: Wi-Fi Viešbučio teritorijoje: •	kirpykla •	5 barai •	restoranas •	2 a la carte restoranai •	automobilių nuoma •	2 baseinai •	prie baseino: skėčiai, gultai- nemokamai •	belaidis internetas  •	gydytojo kabinetas •	5 vandens kalneliai •	parduotuvės Pramogos ir sportas: •	sauna  •	SPA centras •	pirtis  •	diskoteka  •	turkiška pirtis  •	vandens aerobika  •	paplūdimio tinklinis  •	smiginis nemokamai •	pramoginiai renginiai •	naktinis klubas •	stalo tenisas  •	gyva muzika  •	mini futbolas  Už papildomą mokestį: •	vandens sporto priemonės Vaikams: •	žaidimų kambarys •	baseinas vaikams'),
(19,	'Banesta',	'Turkija',	'2022-06-28 00:00:00',	'2022-07-05 00:00:00',	4,	'Be maitinimo',	'Miesto centre',	'Verslas',	69,	'Stambule, vos už 1 km nuo Taksimo aikštės ir už 18 minučių kelio pėsčiomis nuo Galatos bokšto, įsikūrusiame viešbutyje „BENESTA BEYOGLU“ yra baseinas. Mažiau nei už 1 km nuo Istiklal gatvės yra numeriai su oro kondicionieriais. Svečiai gali nemokamai naudotis belaidžiu internetu ir privačia automobilių stovėjimo aikštele.  Apartamentuose yra 1 miegamasis, 1 vonios kambarys, patalynės užvalkalai, rankšluosčiai, plokščiaekranis televizorius, valgomojo zona, virtuvė ir balkonas su vaizdu į miestą. Svečiams už papildomą mokestį suteikiami rankšluosčiai ir patalynės užvalkalai.  Stambulo kongresų centras yra už 1,7 km nuo apartamentų, o Dolmabahce laikrodžio bokštas – už 2 km.'),
(20,	'Tolip Inn',	'Egiptas',	'2022-06-16 00:00:00',	'2022-06-23 00:00:00',	4,	'Puryčiai ir vakarienė',	'Miesto centre',	'Šeimai',	365,	'Šarm el Šeiche, už 17 km nuo Šarm El Šeicho SOHO aikštės, įsikūrusiame viešbutyje „Tolip Inn“ yra restoranas, nemokama automobilių stovėjimo aikštelė, lauko baseinas ir treniruoklių salė. Tarp įvairių patogumų yra baras, bendras poilsio kambarys ir sodas. Apgyvendinimo įstaigoje yra visą parą dirbanti registratūra, teikiamos kambarių tarnybos paslaugos ir svečiams organizuojamos ekskursijos.  Visi svečiai gali naudotis nemokamu belaidžiu internetu, o kai kuriuose kambariuose yra balkonai.  Kiekvieną rytą užeigoje patiekiami lengvieji pusryčiai.  „Tolip Inn Sharm Spa and Aqua Park“ yra terasa.  Ras Mohammed nacionalinis parkas yra už 18 km, o Senasis turgus – už 4,1 km. Artimiausias, Šarm el Šeicho tarptautinis, oro uostas įsikūręs už 22 km nuo „Tolip Inn Sharm Spa and Aqua Park“.'),
(21,	'New Eagles',	'Egiptas',	'2022-06-16 00:00:00',	'2022-06-23 00:00:00',	4,	'Viskas įskaičiuota',	'Ant jūros kranto',	'Šeimai',	285,	'Hurgadoje, už 350 metrų nuo Mercure Hurghada paplūdimio įsikūrusiame poilsio komplekse „New Eagles Aqua Park Resort“ yra restoranas, nemokama automobilių stovėjimo aikštelė, lauko baseinas ir baras. Apgyvendinimo įstaigoje yra privatus paplūdimys, vandens sporto įranga, bendras poilsio kambarys ir sodas. Apgyvendinimo įstaigoje yra visą parą dirbanti registratūra, bendra virtuvė ir valiutos keitykla.  Kiekviename kurorto kambaryje yra oro kondicionierius, drabužių spinta, balkonas su vaizdu į baseiną, vonios kambarys, plokščiaekranis televizorius, patalynės užvalkalai ir rankšluosčiai. Svečių kambariuose yra seifai.  Apgyvendinimo įstaigoje yra vaikų žaidimų aikštelė. „New Eagles Aqua Park Resort“ galėsite žaisti biliardą, stalo tenisą ir smiginį, o apylinkėse – žygiai pėsčiomis ir važinėtis dviračiais.  Netoliese yra Albatros paplūdimys, Solano paplūdimys ir Hurgados didysis akvariumas. Artimiausias, Hurgados tarptautinis, oro uostas įsikūręs už 6 km nuo „New Eagles Aqua Park Resort“.'),
(22,	'Tolip Inn',	'Egiptas',	'2022-06-23 00:00:00',	'2022-06-30 00:00:00',	4,	'Puryčiai ir vakarienė',	'Miesto centre',	'Šeimai',	278,	'Šarm el Šeiche, už 17 km nuo Šarm El Šeicho SOHO aikštės, įsikūrusiame viešbutyje „Tolip Inn“ yra restoranas, nemokama automobilių stovėjimo aikštelė, lauko baseinas ir treniruoklių salė. Tarp įvairių patogumų yra baras, bendras poilsio kambarys ir sodas. Apgyvendinimo įstaigoje yra visą parą dirbanti registratūra, teikiamos kambarių tarnybos paslaugos ir svečiams organizuojamos ekskursijos.  Visi svečiai gali naudotis nemokamu belaidžiu internetu, o kai kuriuose kambariuose yra balkonai.  Kiekvieną rytą užeigoje patiekiami lengvieji pusryčiai.  „Tolip Inn Sharm Spa and Aqua Park“ yra terasa.  Ras Mohammed nacionalinis parkas yra už 18 km, o Senasis turgus – už 4,1 km. Artimiausias, Šarm el Šeicho tarptautinis, oro uostas įsikūręs už 22 km nuo „Tolip Inn Sharm Spa and Aqua Park“.'),
(23,	'New Eagles',	'Egiptas',	'2022-06-23 00:00:00',	'2022-06-30 00:00:00',	4,	'Viskas įskaičiuota',	'Ant jūros kranto',	'Šeimai',	225,	'Hurgadoje, už 350 metrų nuo Mercure Hurghada paplūdimio įsikūrusiame poilsio komplekse „New Eagles Aqua Park Resort“ yra restoranas, nemokama automobilių stovėjimo aikštelė, lauko baseinas ir baras. Apgyvendinimo įstaigoje yra privatus paplūdimys, vandens sporto įranga, bendras poilsio kambarys ir sodas. Apgyvendinimo įstaigoje yra visą parą dirbanti registratūra, bendra virtuvė ir valiutos keitykla.  Kiekviename kurorto kambaryje yra oro kondicionierius, drabužių spinta, balkonas su vaizdu į baseiną, vonios kambarys, plokščiaekranis televizorius, patalynės užvalkalai ir rankšluosčiai. Svečių kambariuose yra seifai.  Apgyvendinimo įstaigoje yra vaikų žaidimų aikštelė. „New Eagles Aqua Park Resort“ galėsite žaisti biliardą, stalo tenisą ir smiginį, o apylinkėse – žygiai pėsčiomis ir važinėtis dviračiais.  Netoliese yra Albatros paplūdimys, Solano paplūdimys ir Hurgados didysis akvariumas. Artimiausias, Hurgados tarptautinis, oro uostas įsikūręs už 6 km nuo „New Eagles Aqua Park Resort“.'),
(24,	'Semoris',	'Turkija',	'2022-06-07 00:00:00',	'2022-06-14 00:00:00',	3,	'Pusryčiai',	'Ant jūros kranto',	'Poroms',	107,	'Viešbutis „SEMORIS HOTEL“ yra už 65 km nuo Antalijos oro uosto ir 2,5 km nuo Manavgato. Atstumas iki paplūdimio yra 850 m. Gultai ir skėčiai paplūdimyje yra nemokami. Viešbutyje yra kambariai su dviaukštėmis lovomis. Tinka šeimoms su vaikais ir jaunoms grupėms. Viešbutyje yra baseinas su čiuožykla, taip pat yra vaikų baseinas ir čiuožykla.'),
(25,	'Meltem',	'Turkija',	'2022-06-07 00:00:00',	'2022-06-14 00:00:00',	1,	'Pusryčiai',	'Miesto centre',	'Verslas',	55,	'Ekonomiškas miesto tipo viešbutis turintis nedidelę teritoriją. Rekomenduojamas ekonominio tipo poilsiui ir tiems, kas nori gyventi arčiau Antalijos centro.');

-- 2022-05-30 18:48:42
