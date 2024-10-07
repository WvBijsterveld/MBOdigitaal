-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Oct 07, 2024 at 08:01 AM
-- Server version: 9.0.1
-- PHP Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mbogodigital`
--

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` char(36) NOT NULL,
  `creboNumber` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `level` int DEFAULT NULL,
  `description` blob,
  `registerUntil` date DEFAULT NULL,
  `graduateUntil` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `creboNumber`, `name`, `level`, `description`, `registerUntil`, `graduateUntil`) VALUES
('6c93a885-9c11-4746-af76-b4b79ed3f1d0', '25998', 'Software developer (vanaf 1-8-2024)', 4, '', NULL, NULL),
('6e606817-054b-4752-b801-0459dd8c2789', '25604', 'Software developer', 4, 0x536f667477617265206f6e7477696b6b656c696e672069732065656e207370656369616c697374697363682076616b2e204465736f6e64616e6b73206469656e7420646520536f66747761726520646576656c6f706572207a696368206865656c206272656564207465206f7269c3ab6e746572656e20616c73206865742067616174206f6d206b656e6e697320656e2076616172646967686564656e20287a6f616c73207765726b6d6574686f6469656b656e2c2070726f6772616d6d65657274616c656e20656e206465206469766572736520696e666f726d6174696573797374656d656e20656e20706c6174666f726d656e20776161722064652070726f6772616d6d6174757572207765726b656e64206d6f6574207a696a6e292e20426f76656e6469656e206d6f65742068696a2f7a696a206272656564206f6e6465726c656764207a696a6e20646161722077616172206865742067616174206f6d20646520656e6f726d652064697665727369746569742061616e206d6f67656c696a6b6520736f66747761726520656e206465766963657320776161722068696a2f7a696a206d6565207465206d616b656e206b72696a67742e2044656e6b206869657262696a2062696a766f6f726265656c642061616e20686574206f6e7477696b6b656c656e2076616e20776562626173656420736f6674776172652c2077656273697465732c20746f6570617373696e6773736f6674776172652c2067616d657320656e20616e6465726520656e7465727461696e6d656e74736f66747761726520656e206d656469612d756974696e67656e2e0d0a0d0a446520536f66747761726520646576656c6f706572207765726b7420766f6f726e616d656c696a6b207a656c667374616e6469672061616e20686574207265616c69736572656e2076616e20736f6674776172652e2044652065696e64766572616e74776f6f7264656c696a6b6865696420766f6f72206865742065696e6470726f64756374206c696774207661616b2062696a2064652070726f6a6563746c6569646572206f66206c656964696e67676576656e64652e20496e207665656c20676576616c6c656e207765726b742068696a2f7a696a2073616d656e206d657420616e64657265206469736369706c696e65732c207a6f616c7320616e6465726520646576656c6f7065727320656e2064657369676e6572732e204765647572656e646520686574206f6e7477696b6b656c70726f6365732068656566742068696a2f7a696a20626f76656e6469656e20726567656c6d6174696720636f6e74616374206d6574206465206f7064726163687467657665722f206c656964696e67676576656e64652f2062656c616e6768656262656e64656e2c207761742073706563696669656b6520656973656e207374656c742061616e20636f6d6d756e69636174696576652076616172646967686564656e2e0d0a0d0a446520536f66747761726520646576656c6f706572207765726b7420696e207672696a77656c20616c6c6520736563746f72656e2076616e2064652065636f6e6f6d69652c207a6f616c73206465206272656465204943542d736563746f722c2067616d652d696e647573747269652c2064652063726561746965766520736563746f722c206465206c6f6769737469656b6520736563746f722c206465206d6f62696c6974656974736272616e6368652c206465206d61616b696e647573747269652c206465207a6f726720656e206e6f67207665656c206d6565722e2042696e6e656e20646520736563746f7220776161722068696a2f7a696a2067616174207765726b656e206d6f65742068696a2f7a696a20746576656e73206272656564206f6e6465726c656764207a696a6e206d657420646520766f6f722064696520736563746f722062656c616e6772696a6b65206f6e646572737465756e656e6465206b656e6e69732e205665656c616c20697320646520626567696e6e656e64206265726f65707362656f6566656e616172207765726b7a61616d20696e20686574206d696464656e2d20656e206b6c65696e62656472696a662e0d0a0d0a4865742069732076616e20657373656e746965656c2062656c616e672064617420646520536f66747761726520646576656c6f70657220646520707269766163792076616e206b6c616e74656e2c206f706472616368746765766572732c20656e2076616e20616c6c652028746f656b6f6d737469676529206765627275696b6572732076616e20646520736f66747761726520626573636865726d742e20446161726e61617374206d6f657420736f667477617265207665696c6967207a696a6e20656e20626573636865726d64207a696a6e20746567656e206f6e656967656e6c696a6b206f66206372696d696e65656c206765627275696b2e2020202020202020202020202020, '2024-08-01', '2030-08-01'),
('8749f1bb-ac9c-41d8-8f80-cb6ccb413f7a', '25605', 'Allround medewerker IT systems and devices', 3, 0x446520416c6c726f756e64206d6564657765726b65722049542073797374656d7320616e642064657669636573207765726b74207a656c667374616e646967206f702065656e2049435420616664656c696e67206f6620696e2065656e20736572766963656465736b6f6d676576696e672e2048696a2f7a696a207765726b7420766f6c67656e73207374616e64616172642070726f6365647572657320656e206d6574686f64657320656e20746f6f6e742062696e6e656e207661737467657374656c6465206b61646572732c20656967656e20696e7a6963687420656e20696e69746961746965662e2048696a2f7a696a20686565667420676f65646520636f6d6d756e69636174696576652076616172646967686564656e20656e207765726b74206b6c616e74676572696368742e, NULL, NULL),
('be7ee254-2ea6-45e3-860c-e762d54d04de', '25606', 'Expert IT systems and devices', 4, 0x4465204578706572742049542073797374656d7320616e642064657669636573207765726b74207a656c667374616e646967206f702064652049435420616664656c696e672076616e2065656e206f7267616e697361746965206f6620696e2065656e20736572766963656465736b6f6d676576696e672e2048696a2f7a696a206865656674206f6f6720766f6f72206465206f7267616e69736174696520656e2062657a69742065656e2068656c696b6f70746572766965772e2048696a2f7a696a20636f6d6d756e696365657274206d657420616c6c6520626574726f6b6b656e656e2e0d0a0d0a4e6161737420686574206265686572656e2076616e20646520495420696e6672617374727563747575722c206170706c6963617469657320656e206465766963657320686f756474206465204578706572742049542073797374656d7320616e642064657669636573207a6963682062657a6967206d6574206865742062657665696c6967656e2076616e20696e666f726d6174696573797374656d656e2e2048696a2f7a696a206765656674207365637572697479206164766965732c207665726265746572742064652073656375726974792076616e2073797374656d656e20656e207265616765657274206f7020637962657273656375726974792061616e76616c6c656e2e204f6f6b206865656674206465204578706572742049542073797374656d7320616e6420646576696365732065656e20726f6c2062696a2068657420636f6d6d756e69636572656e206f7665722077656e73656e2076616e206f7064726163687467657665727320656e206865742076657274616c656e2076616e2064657a652077656e73656e206e6161722061616e70617373696e67656e206f66207665726e69657577696e67656e20696e20646520495420696e667261737472756374757572206f66206170706c696361746965732e20486574206b756e6e656e207765726b656e206d65742064617461626173657320656e2070726f6772616d6d6565726572766172696e6720737065656c742068696572696e2065656e20726f6c2e, NULL, NULL),
('d6ba472d-c84c-4b33-a6be-e1af53b32276', '25999', 'Medewerker ICT (vanaf 1-8-2024)', 2, '', NULL, NULL),
('f0aa137e-3bd8-46b2-a716-c8bad5137a3c', '25607', 'Medewerker ICT support', 2, 0x4465204d6564657765726b65722049435420737570706f7274207765726b7420696e206f7064726163687420656e206f6e64657220626567656c656964696e672076616e2065656e206c656964696e67676576656e64652e2048696a2f7a696a207765726b7420696e2065656e207765696e696720636f6d706c657865206f6d676576696e6720656e20766f6572742065656e766f75646967652074616b656e2c20726f7574696e656d617469676520656e207374616e64616172647765726b7a61616d686564656e207569742e2048696a2f7a696a20686f756474207a696368206461617262696a20737472696b742061616e2064652067656c64656e646520726567656c732c20696e73747275637469657320656e2070726f636564757265732e2057616e6e656572206965747320616677696a6b742076616e206465206f70647261636874206f7665726c6567742068696a2f7a696a20646972656374206d6574206465206c656964696e67676576656e64652e0d0a4465204d6564657765726b65722049435420737570706f7274207765726b74206f7020686574206765626965642076616e20686172647761726520656e20646576696365732e2048657420676161742062696a766f6f726265656c64206f6d206865742061616e6c656767656e2c20696e7374616c6c6572656e20656e20636f6e66696775726572656e2076616e20686172647761726520656e2f6f66206e65747765726b656e20656e20686574206f706c6f7373656e2076616e2073746f72696e67656e2e204d65742062657472656b6b696e6720746f74206465766963657320766f657274206465204d6564657765726b65722049435420737570706f72742061637469766974656974656e20756974206f702068657420766c616b2076616e20617373656d626c6167652c207265706172617469652c207665726c656e656e2076616e20736572766963652c20676576656e2076616e207569746c656720656e2028696e20736f6d6d696765206272616e6368657329207665726b6f6f702076616e206465766963657320287a6f616c73206d6f6269656c652074656c65666f6f6e732c207461626c6574732c206c6170746f70732f6e6f7465626f6f6b732c206465736b746f70732c20496f5420646576696365732c20736d61727420686f6d6520646576696365732c2041562d617070617261747575722c2056522f41522d6465766963657320656e2064726f6e6573292e, '2024-08-01', '2028-08-01');

-- --------------------------------------------------------

--
-- Table structure for table `keuzedeel`
--

CREATE TABLE `keuzedeel` (
  `id` char(36) NOT NULL,
  `code` varchar(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `sbu` int NOT NULL,
  `description` blob,
  `goalsDescription` blob,
  `preconditions` blob,
  `teachingMethods` blob,
  `certificate` tinyint(1) NOT NULL,
  `linkVideo` varchar(255) DEFAULT NULL,
  `linkKD` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` varchar(36) NOT NULL DEFAULT (uuid()),
  `level` int DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `level`, `subject`, `description`) VALUES
('00a68be9-7a66-11ef-a4ea-0242ac120002', 1, 'Realiseert Software', '\"Student heeft XAMMP/alternatief werkend geïnstaleerd. Op dit platform wordt een werkend product is gepresenteerd.\r\nCode wordt gepreseteerd met VS Code.\r\nKan 3 HTML tags & 2 CSS opdrachten uitleggen. \"'),
('01574170-7a6a-11ef-a4ea-0242ac120002', 2, 'Rekenen', 'H7-13'),
('04043128-7a6b-11ef-a4ea-0242ac120002', 5, 'Engels', 'Opdrachten voor B1 lezen en luisteren ERK niveau lezen: Ik kan teksten begrijpen die hoofdzakelijk bestaan uit hoogfrequente, alledaagse of aan mijn werk gerelateerde taal. Ik kan de beschrijving van gebeurtenissen, gevoelens en wensen in persoonlijke brieven begrijpen. ERK niveau luisteren: Ik kan de hoofdpunten begrijpen wanneer in duidelijk uitgesproken standaarddialect wordt gesproken over vertrouwde zaken die ik regelmatig tegenkom op mijn werk, school, vrije tijd enz. Ik kan de hoofdpunten van veel radio- of tvprogramma’s over actuele zaken of over onderwerpen van persoonlijk of beroepsmatig belang begrijpen, wanneer er betrekkelijk langzaam en duidelijk gesproken wordt.'),
('073ece39-7a6a-11ef-a4ea-0242ac120002', 3, 'Rekenen', 'H14-18'),
('0c30dbb1-7a6b-11ef-a4ea-0242ac120002', 7, 'Engels', 'Opdrachten voor B1 vocabulair en spreken Examen spreken, gesprek voeren, schrijven ERK niveau spreken: Ik kan uitingen op een simpele manier aan elkaar verbinden, zodat ik ervaringen en gebeurtenissen, mijn dromen, verwachtingen en ambities kan beschrijven. Ik kan in het kort redenen en verklaringen geven voor mijn meningen en plannen. Ik kan een verhaal vertellen, of de plot van een boek of film weergeven en mijn reacties beschrijven.'),
('13d5436e-7a6b-11ef-a4ea-0242ac120002', 2, 'Loopbaan', 'Maak een profiel aan bij Leo Loopbaan. Doe de test \"jouw plek in de wereld van werk\" Reflecteer hierop. Maak de loopbaanopdracht belemmering of kans in Leo Loopbaan. En reflecteer.'),
('15a01a0a-7a69-11ef-a4ea-0242ac120002', 3, 'Realiseert Software', 'Student kan een database maken met gebruikersrechten. Is in staat om nette code te schrijven met een combinatie van JavaScript,HTML,CSS & PHP zoals behandeld in workshops.//comments en structuur'),
('19977645-7a6b-11ef-a4ea-0242ac120002', 3, 'Loopbaan', 'Maak in Leo Loopbaan de tests \'Persoonlijkheidstype\', \'Kwaliteitentest\' en \'Beroepenzelfonderzoek\' schrijf een reflectie over de uitkomsten, je kunt uitleg geven over de uitkomsten wat je over jezelf leerde.'),
('1a41146b-7a69-11ef-a4ea-0242ac120002', 4, 'Realiseert Software', '\"Student kan een ERD, Functioneel/Technisch ontwerp, MOSCOW en Usecases maken.\r\nKan de 4 basisprincipes van OOP uitleggen iclusief een eenvoudeige toepassing.\"'),
('1fe386a7-7a6b-11ef-a4ea-0242ac120002', 4, 'Loopbaan', 'Maak in Leo Loopbaan de tests \'Waardentest\', \'Competentiescan\' en \'Employebility\' schrijf een reflectie over de uitkomsten, je kunt uitleg geven over de uitkomsten wat je over jezelf leerde.'),
('20410965-7a69-11ef-a4ea-0242ac120002', 5, 'Realiseert Software', 'Student presenteert zelfgemaakte software in een tweede programmeertaal en kan dit uitleggen. Kan een gebruikte debug strategie uitleggen.'),
('2318e19d-7a6a-11ef-a4ea-0242ac120002', 2, 'Burgerschap', 'Heeft zich verdiept in de dimensie Sociaal Maatschappelijk, heeft een mening over normen en waarden en verschillen tusssen individuen en heeft dit aangetoond in een infographic'),
('2578b129-7a6b-11ef-a4ea-0242ac120002', 5, 'Loopbaan', 'Maak een LinkedIn profiel aan, je kunt hierover uitleggen wat belangrijk is. Maak een CV.'),
('264fe32b-7a69-11ef-a4ea-0242ac120002', 6, 'Realiseert Software', 'Student heeft tweede programmeertaal gekozen. Legt de geleerde code uit van een verdiepende challenge. '),
('2e645233-7a6b-11ef-a4ea-0242ac120002', 1, 'Gedrag/Professionaliteit/Persoonlijke Ontwikkeling', 'Ik weet wat er van me verwacht wordt bij het op tijd komen. Ik heb alle licenties in orde en weet wat ik moet doen voor de AVO vakken.'),
('34017c48-7a6a-11ef-a4ea-0242ac120002', 3, 'Burgerschap', 'Heeft zich verdiept in de dimensie gezondheid, heeft een mening over beroepsziekten en het belang van gezondheid in het algemeen en heeft dit aangetoond in een infographic.'),
('34748cf7-7a69-11ef-a4ea-0242ac120002', 7, 'Realiseert Software', '\"Student laat in minimaal 2 afgeronde challenges waarvan 1 met een bedrijf het volgende zien: \r\n- Opdracht definitie, planning en bewaking\r\n-Ontwerpdocument volledig uit padlet ingevuld\r\n-Kan software uitleggen\r\n-Tesplan, Testlog en Tesverslag volledig ingevuld\r\n-Verbetervoorstellen geven adhv begindefinitie\"'),
('39a2f621-7a6b-11ef-a4ea-0242ac120002', 2, 'Gedrag/Professionaliteit/Persoonlijke Ontwikkeling', 'Ik weet wat ik van de opleiding vind en wat mijn volgende stappen gaan zijn in deze opleiding. Ik benoem 1 sterk punt en 1 ontwikkelpunt van mijzelf.'),
('39c55a17-7a6a-11ef-a4ea-0242ac120002', 4, 'Burgerschap', 'Heeft zich verdiept in de dimensie politiek, heeft een mening over diverse politieke stromingen, heeft kennis van het Nederlandse kiessysteen, 1e en 2e kamer en trias politica en heeft dit aangetoond in een infographi'),
('3e6fe5a7-7a6b-11ef-a4ea-0242ac120002', 3, 'Gedrag/Professionaliteit/Persoonlijke Ontwikkeling', 'Ik ben helemaal bekend met hoe ik een challenge moet uitvoeren, hoe ik informatie krijg, workshops aanvraag alles voor het behalen van een go voor een challenge'),
('437bbf35-7a6b-11ef-a4ea-0242ac120002', 4, 'Realiseert Software', 'Doe de loopbaanopdracht Energiegevers en energievreters in Leo Loopbaan en reflecteer.'),
('48ac27a7-7a6b-11ef-a4ea-0242ac120002', 5, 'Gedrag/Professionaliteit/Persoonlijke Ontwikkeling', 'Doe de loopbaanopdracht Je ideale werkomgeving in Leo Loopbaan en reflecteer.'),
('4b996e01-7a6a-11ef-a4ea-0242ac120002', 5, 'Burgerschap', 'Heeft zich verdiept in de dimensie economie, heeft zich verdiept in de kosten die een student in Nederland heeft, welke verzekeringen verplicht zijn na de leeftijd van 18 jaar en heeft kennis van belastingen in Nederland en heeft dit aangetoond in een infographic'),
('4f17a58a-7a6b-11ef-a4ea-0242ac120002', 6, 'Gedrag/Professionaliteit/Persoonlijke Ontwikkeling', 'Je laat zien dat je met een bedrijf een challenge hebt uitgevoerd. Van deze ervaring schrijf je een STARR reflectie.'),
('5422699d-7a6b-11ef-a4ea-0242ac120002', 7, 'Gedrag/Professionaliteit/Persoonlijke Ontwikkeling', 'Je komt je afspraken na, bent actief in je team en lost voorkomende problemen op, bent proactief neemt verantwoordelijkheid voor het proces en neemt actief deel aan stand-up meetings en reflecteert hierop en geeft feedback op je collega\'s'),
('5d7f95f9-7a6a-11ef-a4ea-0242ac120002', 6, 'Burgerschap', 'Interview bij de stagebegeleider van het BPV bedrijf over hoe de vier dimensies een plek krijgen in de organisatie en geeft een advies voor verbetering op basis van het interview.'),
('63aa8c1e-7a6a-11ef-a4ea-0242ac120002', 7, 'Burgerschap', 'Neemt de burgerschapsdimensies op in uitwerking van de challenges. Doet voorstel voor acties challenge owner'),
('95b0ee26-7a69-11ef-a4ea-0242ac120002', 1, 'Werken in een ontwikkelteam', 'Student voert een project uit  in een groep en lost eventuele conflicten aantoonbaar op.'),
('9e6694af-7a69-11ef-a4ea-0242ac120002', 2, 'Werken in een ontwikkelteam', 'Student kan samenwerken in een groepje en weet wat hun rol hierin is. Laat zien dat hij een presentatie kan geven.'),
('b2dd1ff6-7a6a-11ef-a4ea-0242ac120002', 1, 'Nederlands', 'Student heeft drie verschillende \"Nederlands-Bricks\" succesvol voltooid. '),
('c9d789cd-7a69-11ef-a4ea-0242ac120002', 3, 'Werken in een ontwikkelteam', 'Student reflecteert op eigen rol binnen het team via Belbin test.Laat zien dat hij een presentatie kan geven rekening houdend met zijn/haar doelgroep.'),
('caf26c6b-7a6a-11ef-a4ea-0242ac120002', 4, 'Nederlands', 'Student heeft een presentatie-opdracht op 3F-niveau voltooid.'),
('d098f647-7a69-11ef-a4ea-0242ac120002', 4, 'Werken in een ontwikkelteam', 'Student reflecteert op eigen rol binnen het team en toont aan dat ze feedback kunnen geven aan teamleden.  Student plant werkzaamheden eb deze zijn aantoonbaaar adhv een stand up meetingsverslag en een planning.'),
('d3338ad8-7a6a-11ef-a4ea-0242ac120002', 5, 'Nederlands', 'Student heeft een schrijfopdracht op 3F-niveau voltooid.'),
('d846bde3-7a69-11ef-a4ea-0242ac120002', 5, 'Werken in een ontwikkelteam', '\"Student reflecteert volgens de STARR- methode op eigen rol binnen het team. \r\nStudent toont aan dat hij/zij feedback kan geven aan teamleden. \"'),
('de35c63b-7a6a-11ef-a4ea-0242ac120002', 6, 'Nederlands', 'Student heeft een oefenexamen Lezen/Luisteren op 3F-niveau voltooid.'),
('e199df3b-7a69-11ef-a4ea-0242ac120002', 6, 'Werken in een ontwikkelteam', '\"Student heeft een 360-graden feedback uitgevoerd en reflecteert hierop.\r\nStudent presenteerd zijn challenge op een professionele manier.\"'),
('e75af663-7a6a-11ef-a4ea-0242ac120002', 7, 'Nederlands', 'Student heeft alle examens voor Nederlands behaald.'),
('e8f4f290-7a69-11ef-a4ea-0242ac120002', 7, 'Werken in een ontwikkelteam', 'Student heeft actief deelgenemonen aan een team met een duidelijke rol en vastgelegde afspraken. Presenteerd op een proffesionele manier een product. Student reflecteert op eigen productdeel, eigen rol, teamverband en gedrag. Bv. STARR'),
('eff0a9b6-7a6a-11ef-a4ea-0242ac120002', 1, 'Engels', 'Opdrachten voor A2 lezen en luisteren ERK niveau lezen: Ik kan zeer korte eenvoudige teksten lezen. Ik kan specifieke voorspelbare informatie vinden in eenvoudige, alledaagse teksten zoals advertenties, folders, menu\'s en dienstregelingen en ik kan korte, eenvoudige, persoonlijke brieven begrijpen. ERK niveau luisteren: Ik kan zinnen en de meest frequente woorden begrijpen die betrekking hebben op gebieden die van direct persoonlijk belang zijn (bijvoorbeeld basisinformatie over mezelf en mijn familie, winkelen, plaatselijke omgeving, werk). Ik kan de belangrijkste punten in korte, duidelijke eenvoudige boodschappen en aankondigingen volgen.'),
('f9bc6606-7a69-11ef-a4ea-0242ac120002', 1, 'Rekenen', 'Rekenlicentie aangeschaft & H1-6'),
('f9e24e83-7a6a-11ef-a4ea-0242ac120002', 3, 'Engels', 'Opdrachten voor A2 schrijven en gesprekken voeren ERK niveau schrijven: Ik kan korte, eenvoudige notities en boodschappen opschrijven. Ik kan een zeer eenvoudige persoonlijke brief schrijven, bijvoorbeeld om iemand voor iets te bedanken. ERK niveau gesprekken voeren: Ik kan communiceren over eenvoudige en alledaagse taken die een eenvoudige en directe uitwisseling van informatie over vertrouwde onderwerpen en activiteiten betreffen. Ik kan zeer korte sociale gesprekken aan, alhoewel ik gewoonlijk niet voldoende begrijp om het gesprek zelfstandig gaande te houden.'),
('fa3398b0-7a68-11ef-a4ea-0242ac120002', 2, 'Realiseert Software', '\"\r\n\r\n\r\nStudent kan 5 HTML tags.\r\n5 CSS onderwerpen: benoem 3 tags, leg uit hoe nesting werkt.\r\nLeg een zelfgemaakte Javascript functie uit die gebruik maakt van parameters. \r\n\"'),
('ff3c0f5a-7a6a-11ef-a4ea-0242ac120002', 4, 'Engels', 'Opdrachten voor A2 vocabulair en spreken ERK niveau spreken: Ik kan een reeks uitdrukkingen en zinnen gebruiken om in eenvoudige bewoordingen mijn familie en andere mensen, leefomstandigheden, mijn opleiding en mijn huidige of meest recente baan te beschrijven.');

-- --------------------------------------------------------

--
-- Table structure for table `mentor_assessments`
--

CREATE TABLE `mentor_assessments` (
  `id` varchar(36) NOT NULL DEFAULT (uuid()),
  `mentor_id` varchar(36) NOT NULL,
  `student_id` varchar(36) NOT NULL,
  `level_id` varchar(36) NOT NULL,
  `assessment` text,
  `assessment_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` char(36) NOT NULL,
  `name` varchar(30) NOT NULL,
  `level` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `level`) VALUES
('126c5a69-792c-427a-8bd9-0e20b8651f2b', 'Docent', 20),
('37914d3e-8e27-46e5-982f-30651d3276da', 'Applicatiebeheerder', 80),
('5482254d-709b-4f59-adf4-83d7f67d9553', 'Administrator', 100),
('6e27105c-c42a-46c8-9cd6-34ff1fe52572', 'Student', 10);

-- --------------------------------------------------------

--
-- Table structure for table `self_assessments`
--

CREATE TABLE `self_assessments` (
  `id` varchar(36) NOT NULL DEFAULT (uuid()),
  `student_id` varchar(36) NOT NULL,
  `level_id` varchar(36) NOT NULL,
  `is_done` tinyint(1) NOT NULL,
  `assessment_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `assessment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `self_assessments`
--

INSERT INTO `self_assessments` (`id`, `student_id`, `level_id`, `is_done`, `assessment_date`, `assessment`) VALUES
('1d9e35ed-8405-11ef-a75f-0242ac120002', '1', '34017c48-7a6a-11ef-a4ea-0242ac120002', 1, '2024-10-06 17:04:57', NULL),
('24edc639-8405-11ef-a75f-0242ac120002', '1', '39c55a17-7a6a-11ef-a4ea-0242ac120002', 1, '2024-10-06 17:05:10', NULL),
('7d918e32-8407-11ef-a75f-0242ac120002', '1', '5422699d-7a6b-11ef-a4ea-0242ac120002', 0, '2024-10-06 17:21:57', NULL),
('a94a765c-840a-11ef-a75f-0242ac120002', '1', '4b996e01-7a6a-11ef-a4ea-0242ac120002', 0, '2024-10-06 17:44:39', NULL),
('a94ab349-840a-11ef-a75f-0242ac120002', '1', '5d7f95f9-7a6a-11ef-a4ea-0242ac120002', 0, '2024-10-06 17:44:39', NULL),
('a94b0799-840a-11ef-a75f-0242ac120002', '1', '63aa8c1e-7a6a-11ef-a4ea-0242ac120002', 0, '2024-10-06 17:44:39', NULL),
('a94b40ca-840a-11ef-a75f-0242ac120002', '1', 'eff0a9b6-7a6a-11ef-a4ea-0242ac120002', 1, '2024-10-06 17:44:39', NULL),
('a94b6862-840a-11ef-a75f-0242ac120002', '1', 'f9e24e83-7a6a-11ef-a4ea-0242ac120002', 0, '2024-10-06 17:44:39', NULL),
('a94b8d93-840a-11ef-a75f-0242ac120002', '1', 'ff3c0f5a-7a6a-11ef-a4ea-0242ac120002', 0, '2024-10-06 17:44:39', NULL),
('a94bb45c-840a-11ef-a75f-0242ac120002', '1', '04043128-7a6b-11ef-a4ea-0242ac120002', 0, '2024-10-06 17:44:39', NULL),
('a94bd40c-840a-11ef-a75f-0242ac120002', '1', '0c30dbb1-7a6b-11ef-a4ea-0242ac120002', 0, '2024-10-06 17:44:39', NULL),
('a94c0948-840a-11ef-a75f-0242ac120002', '1', '2e645233-7a6b-11ef-a4ea-0242ac120002', 0, '2024-10-06 17:44:39', NULL),
('a94c2b2e-840a-11ef-a75f-0242ac120002', '1', '39a2f621-7a6b-11ef-a4ea-0242ac120002', 0, '2024-10-06 17:44:39', NULL),
('a94c4ce6-840a-11ef-a75f-0242ac120002', '1', '3e6fe5a7-7a6b-11ef-a4ea-0242ac120002', 0, '2024-10-06 17:44:39', NULL),
('a94c69c0-840a-11ef-a75f-0242ac120002', '1', '48ac27a7-7a6b-11ef-a4ea-0242ac120002', 0, '2024-10-06 17:44:39', NULL),
('a94c860f-840a-11ef-a75f-0242ac120002', '1', '4f17a58a-7a6b-11ef-a4ea-0242ac120002', 0, '2024-10-06 17:44:39', NULL),
('a94ccea2-840a-11ef-a75f-0242ac120002', '1', '13d5436e-7a6b-11ef-a4ea-0242ac120002', 0, '2024-10-06 17:44:39', NULL),
('a94ce8a3-840a-11ef-a75f-0242ac120002', '1', '19977645-7a6b-11ef-a4ea-0242ac120002', 0, '2024-10-06 17:44:39', NULL),
('a94d071d-840a-11ef-a75f-0242ac120002', '1', '1fe386a7-7a6b-11ef-a4ea-0242ac120002', 0, '2024-10-06 17:44:39', NULL),
('a94d2451-840a-11ef-a75f-0242ac120002', '1', '2578b129-7a6b-11ef-a4ea-0242ac120002', 0, '2024-10-06 17:44:39', NULL),
('a94d4133-840a-11ef-a75f-0242ac120002', '1', 'b2dd1ff6-7a6a-11ef-a4ea-0242ac120002', 0, '2024-10-06 17:44:39', NULL),
('a94d7a05-840a-11ef-a75f-0242ac120002', '1', 'caf26c6b-7a6a-11ef-a4ea-0242ac120002', 0, '2024-10-06 17:44:39', NULL),
('a94d947e-840a-11ef-a75f-0242ac120002', '1', 'd3338ad8-7a6a-11ef-a4ea-0242ac120002', 0, '2024-10-06 17:44:39', NULL),
('a94daddf-840a-11ef-a75f-0242ac120002', '1', 'de35c63b-7a6a-11ef-a4ea-0242ac120002', 0, '2024-10-06 17:44:39', NULL),
('a94dc925-840a-11ef-a75f-0242ac120002', '1', 'e75af663-7a6a-11ef-a4ea-0242ac120002', 0, '2024-10-06 17:44:39', NULL),
('a94de555-840a-11ef-a75f-0242ac120002', '1', '00a68be9-7a66-11ef-a4ea-0242ac120002', 0, '2024-10-06 17:44:39', NULL),
('a94dff41-840a-11ef-a75f-0242ac120002', '1', 'fa3398b0-7a68-11ef-a4ea-0242ac120002', 0, '2024-10-06 17:44:39', NULL),
('a94e1929-840a-11ef-a75f-0242ac120002', '1', '15a01a0a-7a69-11ef-a4ea-0242ac120002', 0, '2024-10-06 17:44:39', NULL),
('a94e2db0-840a-11ef-a75f-0242ac120002', '1', '437bbf35-7a6b-11ef-a4ea-0242ac120002', 0, '2024-10-06 17:44:39', NULL),
('a94e471e-840a-11ef-a75f-0242ac120002', '1', '1a41146b-7a69-11ef-a4ea-0242ac120002', 0, '2024-10-06 17:44:39', NULL),
('a94e681a-840a-11ef-a75f-0242ac120002', '1', '20410965-7a69-11ef-a4ea-0242ac120002', 0, '2024-10-06 17:44:39', NULL),
('a94ea1c4-840a-11ef-a75f-0242ac120002', '1', '264fe32b-7a69-11ef-a4ea-0242ac120002', 0, '2024-10-06 17:44:39', NULL),
('a94eba89-840a-11ef-a75f-0242ac120002', '1', '34748cf7-7a69-11ef-a4ea-0242ac120002', 0, '2024-10-06 17:44:39', NULL),
('a94ece0d-840a-11ef-a75f-0242ac120002', '1', 'f9bc6606-7a69-11ef-a4ea-0242ac120002', 0, '2024-10-06 17:44:39', NULL),
('a94ef2e8-840a-11ef-a75f-0242ac120002', '1', '01574170-7a6a-11ef-a4ea-0242ac120002', 0, '2024-10-06 17:44:39', NULL),
('a94f119e-840a-11ef-a75f-0242ac120002', '1', '073ece39-7a6a-11ef-a4ea-0242ac120002', 0, '2024-10-06 17:44:39', NULL),
('a94f2991-840a-11ef-a75f-0242ac120002', '1', '95b0ee26-7a69-11ef-a4ea-0242ac120002', 0, '2024-10-06 17:44:39', NULL),
('a94f4068-840a-11ef-a75f-0242ac120002', '1', '9e6694af-7a69-11ef-a4ea-0242ac120002', 0, '2024-10-06 17:44:39', NULL),
('a94f5837-840a-11ef-a75f-0242ac120002', '1', 'c9d789cd-7a69-11ef-a4ea-0242ac120002', 0, '2024-10-06 17:44:39', NULL),
('a94f6fff-840a-11ef-a75f-0242ac120002', '1', 'd098f647-7a69-11ef-a4ea-0242ac120002', 0, '2024-10-06 17:44:39', NULL),
('a94f8895-840a-11ef-a75f-0242ac120002', '1', 'd846bde3-7a69-11ef-a4ea-0242ac120002', 0, '2024-10-06 17:44:39', NULL),
('a94fa107-840a-11ef-a75f-0242ac120002', '1', 'e199df3b-7a69-11ef-a4ea-0242ac120002', 0, '2024-10-06 17:44:39', NULL),
('a94fbc10-840a-11ef-a75f-0242ac120002', '1', 'e8f4f290-7a69-11ef-a4ea-0242ac120002', 0, '2024-10-06 17:44:39', NULL),
('b8e22a14-8404-11ef-a75f-0242ac120002', '1', '2318e19d-7a6a-11ef-a4ea-0242ac120002', 0, '2024-10-06 17:02:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int UNSIGNED NOT NULL,
  `voornaam` int NOT NULL,
  `tussenvoegsels` int NOT NULL,
  `achternaam` int NOT NULL,
  `duonummer` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `email`, `password`, `name`) VALUES
(1, 'student@example.com', 'placeholder', 'Placeholder Student');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(36) NOT NULL DEFAULT (uuid()),
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('student','mentor') NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`, `created_at`) VALUES
('1', 'student@example.com', 'placeholder', 'student', '2024-10-06 17:01:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `education_crebonumber_unique` (`creboNumber`),
  ADD UNIQUE KEY `education_name_unique` (`name`);

--
-- Indexes for table `keuzedeel`
--
ALTER TABLE `keuzedeel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `keuzedeel_code_unique` (`code`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mentor_assessments`
--
ALTER TABLE `mentor_assessments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mentor_id` (`mentor_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `level_id` (`level_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role_name_unique` (`name`);

--
-- Indexes for table `self_assessments`
--
ALTER TABLE `self_assessments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_id` (`student_id`,`level_id`),
  ADD KEY `level_id` (`level_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mentor_assessments`
--
ALTER TABLE `mentor_assessments`
  ADD CONSTRAINT `mentor_assessments_ibfk_1` FOREIGN KEY (`mentor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mentor_assessments_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mentor_assessments_ibfk_3` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `self_assessments`
--
ALTER TABLE `self_assessments`
  ADD CONSTRAINT `self_assessments_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `self_assessments_ibfk_2` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
