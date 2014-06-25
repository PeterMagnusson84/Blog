-- phpMyAdmin SQL Dump
-- version 4.0.3
-- http://www.phpmyadmin.net
--
-- Värd: 127.0.0.1
-- Skapad: 07 jun 2014 kl 01:03
-- Serverversion: 5.6.11-log
-- PHP-version: 5.5.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databas: `mjukvaruutveckling`
--
CREATE DATABASE IF NOT EXISTS `mjukvaruutveckling` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mjukvaruutveckling`;

-- --------------------------------------------------------

--
-- Tabellstruktur `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumpning av Data i tabell `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(1, 'Spel'),
(2, 'Android'),
(3, 'PC'),
(4, 'iOS'),
(5, 'Windows Phone'),
(6, 'Mobil'),
(7, 'Webb');

-- --------------------------------------------------------

--
-- Tabellstruktur `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` varchar(500) NOT NULL,
  `postid` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `INDEX` (`postid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumpning av Data i tabell `comments`
--

INSERT INTO `comments` (`id`, `comment`, `postid`, `date`, `user`) VALUES
(4, 'sadsd', 6, '2014-05-26 00:43:23', ''),
(7, 'testar denna med', 5, '2014-05-26 00:43:23', ''),
(9, 'xcvcxvc', 6, '2014-05-26 00:43:23', ''),
(10, 'tredje kommentaren', 6, '2014-05-26 00:43:23', ''),
(11, 'testar att kommentera inna jag ska spela igen', 6, '2014-05-26 00:43:23', ''),
(12, 'kommentar1', 8, '2014-05-26 00:43:23', ''),
(13, 'testar', 10, '2014-05-26 00:43:23', ''),
(16, 'kommentar2', 8, '2014-05-26 00:43:23', ''),
(17, 'ssss', 9, '2014-05-26 00:43:23', ''),
(19, 'test', 5, '2014-05-26 00:43:23', ''),
(21, 'test', 12, '2014-05-26 00:43:23', ''),
(22, 'skriver här en lite längre kommentar för att se hur det ser ut när man gör det hade ju varit roligt att se likosm eller?? jagg gör det iallafalll\r\n\r\n\r\ntestar även litte entersalg här också', 11, '2014-05-26 00:43:23', ''),
(23, 'sfdf   ds f dfdfdsf dsfdfdsk skriver här en lite längre kommentar för att se hur det ser ut när man gör det hade ju varit roligt att se likosm eller?? jagg gör det iallafalll \r\nskriver här en lite längre kommentar för att se hur det ser ut när man gör det hade ju varit roligt att se likosm eller?? jagg gör det iallafalll skriver här en lite längre kommentar för att se hur det ser ut när man gör det hade ju varit roligt att se likosm eller?? jagg gör det iallafalll', 11, '2014-05-26 00:43:23', ''),
(28, 'okej då skriver jag väl en kommentar då bla bla okej då skriver jag väl en kommentar då bla blaokej då skriver jag väl en kommentar då bla bla okej då skriver jag väl en kommentar då bla bla okej då skriver jag väl en kommentar då bla bla okej då skriver jag väl en kommentar då bla bla okej då skriver jag väl en kommentar då bla bla', 7, '2014-05-26 00:43:23', ''),
(29, 'Det har sagts att Kina ska gå över till ett eget Linux-baserat operativsystem som de själva utvecklar. Nu framkommer det dock att under tiden så ska de köra med Windows 7 då Microsoft bekräftar att de säljer Windows 7-licenser till den kinesiska regeringen. \r\nMicrosoft säger i ett uttalande att de arbetar hårt tillsammans med den kinesiska regeringen för ett fortsatt samarbete och vill gärna att de börjar använda Windows 8 men att i nuläget så säljs Windows 7 till diverse departement och avdelni', 14, '2014-05-26 00:43:23', ''),
(30, 'Det har sagts att Kina ska gå över till ett eget Linux-baserat operativsystem som de själva utvecklar. Nu framkommer det dock att under tiden så ska de köra med Windows 7 då Microsoft bekräftar att de säljer Windows 7-licenser till den kinesiska regeringen. \r\n\r\nMicrosoft säger i ett uttalande att de arbetar hårt tillsammans med den kinesiska regeringen för ett fortsatt samarbete och vill gärna att de börjar använda Windows 8 men att i nuläget så säljs Windows 7 till diverse departement och avdel', 14, '2014-05-26 00:43:23', ''),
(32, 'test', 14, '2014-05-26 00:43:23', ''),
(34, 'test 3', 14, '2014-05-26 00:43:23', ''),
(35, 'Så glad Handduksdag till er allihopa!!! Har ni inte strosat runt med handduken än så är det inte försent. Det är hela kvällen kvar till handdukshållande.', 15, '2014-05-26 00:43:23', ''),
(36, 'jaaaa!!!!!!', 15, '2014-05-26 00:43:23', ''),
(37, 'testar datum', 15, '2014-05-26 00:48:15', ''),
(38, 'testar att skapa med en användare', 15, '2014-05-26 01:24:27', ''),
(39, 'xcx', 15, '2014-05-26 01:43:55', ''),
(40, 'ok', 29, '2014-05-31 03:43:49', ''),
(41, 'test', 39, '2014-06-06 15:14:05', ''),
(42, 'coolt kommmer att spela det till ps4 varje dag', 40, '2014-06-06 18:05:04', '');

-- --------------------------------------------------------

--
-- Tabellstruktur `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `admin` int(11) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumpning av Data i tabell `login`
--

INSERT INTO `login` (`userID`, `username`, `password`, `admin`) VALUES
(10, 'test', '2f23fa3579f3f75175793649115c1b25', 0),
(11, 'admin2', '2f23fa3579f3f75175793649115c1b25', 1);

-- --------------------------------------------------------

--
-- Tabellstruktur `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `post` text NOT NULL,
  `author` varchar(30) NOT NULL,
  `picture` longblob,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `categoryID` (`category`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumpning av Data i tabell `posts`
--

INSERT INTO `posts` (`id`, `title`, `post`, `author`, `picture`, `date`, `category`) VALUES
(11, 'Telia spärrar DNS i sitt bredband', 'Enligt .SE, Stiftelsen för internetinfrastruktur, blockerar Telia sedan förra veckan möjligheten för deras kunder att göra egna DNS-servrar som är kopplade till Telias bredband. \r\n\r\nDet påverkar sannolikt en mycket liten del av Telias bredbandskunder men för de som till exempel använder egen DNS-server för spel och liknande kommer det givetvis att ställa till problem. .SE skriver: \r\n"Det är de mera avancerade hemmaanvändarna som har egen DNS-server för att kunna använda sitt domännamn för att nå lokala tjänster oavsett om man sitter bakom sitt bredband eller kommer från annan plats på internet. Det kan vara mejlserver, spelserver med mera. Eller foton som du inte vill lägga på en molntjänst utan du vill ha kontroll över själv, men som du ändå vill att utvalda vänner ska kunna se."\r\n\r\nAnledningen till att Telia tar bort möjligheten att köra en egen DNS-server på deras bredband tror .SE beror på att Telia har drabbats av överbelastning på grund av DNS-tjänsterna, något som förklaras med att många routrar som Telia har skickat ut till sina kunder ska vara undermåliga. \r\n\r\nÄr detta något du har drabbats av? Kommentarerna står till ert förfogande. ', 'Feber.se', '', '2014-05-26 00:07:51', ''),
(14, 'Kinesiska regeringen väljer Windows 7 istället för Windows 8', 'Under veckan fick vi veta att den kinesiska regeringen bannlyst Windows 8 av diverse anledningar, något som chockerade Microsoft eftersom de i nuläget använder flera maskiner med Windows XP, ett operativsystem som nu saknar support. \r\n\r\nDet har sagts att Kina ska gå över till ett eget Linux-baserat operativsystem som de själva utvecklar. Nu framkommer det dock att under tiden så ska de köra med Windows 7 då Microsoft bekräftar att de säljer Windows 7-licenser till den kinesiska regeringen. \r\n\r\nMicrosoft säger i ett uttalande att de arbetar hårt tillsammans med den kinesiska regeringen för ett fortsatt samarbete och vill gärna att de börjar använda Windows 8 men att i nuläget så säljs Windows 7 till diverse departement och avdelningar. ', 'Feber.se', '', '2014-05-26 00:07:51', ''),
(15, 'Idag är det Handduksdagen!!', 'Idag är det handduksdagen! Har ni gått runt med er handduk idag? \r\nHandduksdagen fick sin början under 2001 då författaren Douglas Adams gick bort, till minnet av honom så bestämde man sig för att tillägna en dag då man gick runt med en handduk hela dagen. \r\n\r\nAnledningen till att det måste vara en handduk är på grund av Adams dundersuccé "Liftarens Guide Till Galaxen" där handduken har en stor betydelse i handlingen. Så här beskriver Adams hur viktig handduken är:\r\n\r\n"En handduk, står det, är utan all konkurrens det mest användbara föremål den instelläre liftaren kan ha med sig. Å ena sidan har den stort praktiskt värde – man kan svepa den om sig när man reser över Jaglan Betas kalla månar, man kan ha den under sig när man ligger i marmorsanden i Santraginus V:s soldränkta stränder och inandas de mättade ångorna från havet, man kan dra den över sig när man sover en natt under de röda stjärnor som lyser så starkt över Kakrafoons ökenland, använda den som segel på en liten flotte nedför den väldiga, långsamma floden Moth, doppa den i vatten och använda den som tillhygge i slagsmål, svepa den runt huvudet för att skydda sig mot giftiga gaser eller mot en blick från den Dreglande Dånfinken på Traal (ett osannolikt enfaldigt djur; det tror nämligen att om du inte kan se det, kan inte det se dig – ett verkligt dumt djur alltså, men mycket mycket glupskt), man kan vinka med sin handduk som nödsignal och slutligen torka sig med den om den fortfarande är tillräckligt ren. \r\n\r\nÅ andra sidan, och det är än viktigare, kan en handduk ha ett oskattbart psykologiskt värde. Om till exempel en kloss (kloss = fastboende; icke-liftare) upptäcker att en liftare har en egen handduk tror han av någon anledning automatiskt att liftaren också innehar tandborste, tvättlapp, tvål, en burk med skorpor, fältflaska, karta och kompass, snören, myggspray, regnkläder, rymddräkt, etc, etc. Det blir då så mycket lättare för klossen att låna liftaren någon av dessa eller ett dussin andra artiklar som han händelsevis råkat ”förlora”? Klossen kommer att tro att en man som kan lifta kors och tvärs genom galaxen, leva som fåglarna på marken, kämpa mot dåliga odds och ta sig fram, men ändå vet var han har sin handduk, en sådan man är någonting att räkna med."\r\n\r\n\r\nSå glad Handduksdag till er allihopa!!! Har ni inte strosat runt med handduken än så är det inte försent. Det är hela kvällen kvar till handdukshållande. ', 'feber.se', '', '2014-05-26 00:07:51', ''),
(36, 'sad', 'windows med kategori 1', 'peter', NULL, '2014-06-06 13:51:06', '1'),
(37, 'en till windowsnyhet', 'med kategori 1', 'peter', NULL, '2014-06-06 13:52:50', '1'),
(38, 'Cat lanserar tålig androidtelefon', 'Och så till dagens tredje telefonlansering, nu kommer en ny telefon från den lite udda tillverkaren Cat. Cat har under en tid byggt tåliga telefoner för de som kräver att telefonen ska kunna ta emot lite smällar och fukt. \r\n\r\nDen senaste telefonen heter Cat B15Q och är en androidbaserad smartphone som kör Android 4.4 KitKat. Telefonen är utrustad med en fyrkärning processor på 1,3 GHz, 1 GB RAM, en femmegapixelskamera och 4 GB inbyggt minne, vill man ha mer så finns det en kortplats. Skärmen ligger på fyra tum och har en upplösning på 800 x 480 pixlar samt är skyddad med Gorilla Glass och ska gå att använda med blöta fingrar. Batteriet ska räcka för 16 timmars taltid och 26 dagars standbytid. \r\n\r\nVad gäller hur tålig telefonen är så ska den klara fall ned i ett betonggolv från 1,8 meter och den ska även kunna vara helt nedsänkt i vatten i upp till 30 minuter. Den ska även fungera i temperaturer mellan -25 grader till +55 grader utan att det ska påverka användningen alls. \r\n\r\nSist men inte minst så levereras telefonen med bland annat appen Ocearch, en app för att spåra hajar var du än är. \r\n\r\nPrislappen på denna telefon ligger på 330 euro.', 'feber.se', NULL, '2014-06-06 15:06:44', '2'),
(39, 'Nytt från Crystal Dynamics och Criterion på E3', 'Om man spanar in GameTrailers E3-schema så kan man där läsa att både Tomb Raider-studion Crystal Dynamics och Burnout-studion Criterion kommer visa upp nya spel på nästa veckas E3-mässa. Exakt vad dessa spel är är tyvärr oklart just nu men under måndagkvällen lär vi få svar på dessa frågor...', 'feber.se', NULL, '2014-06-06 15:11:53', '3'),
(40, 'Släppdatum för Battlefield: Hardline 21 oktober', 'Natten till i dag så släppte EA en kort liten trailer för Battlefield: Hardline där man bland annat nämnde att spelet kommer släppas den 21:e oktober. ', 'feber.se', NULL, '2014-06-06 15:31:49', '3'),
(41, 'iOS 8 ger app-förslag beroende på var du är', 'En nyhet i iOS 8 som Apple inte hann med att prata om på keynoten här om dagen är att din telefon i framtiden kommer att ge dig förslag på appar du borde starta eller installera beroende på var du befinner dig. \r\n\r\nExempelvis så kommer telefonen att ge dig förslaget att öppna Starbucks-appen om du befinner dig på ett Starbucks då man kan göra sina beställningar direkt i appen istället för att stå i kö. Ett annat exempel är att om man befinner sig på en tågstation så skulle telefonen kanske kunna föreslå appen SJ Min Resa för att se när tågen går från stationen. \r\n\r\nDessa app-tips kommer att synas längst ned till vänster på låsskärmen som ni kan se på bilden och om man inte redan har appen installerad så kommer den att ta användaren till App Store så att man kan ladda hem den. Dock så ska man inte kunna klicka vidare till andra appar i butiken av säkerhetsskäl. \r\n\r\nDetta är en funktion som just nu finns i betan så det är förstås inte säkert att den kommer eller att den kommer att fungera just såhär men det är ganska så troligt. ', 'feber.se', NULL, '2014-06-06 15:39:59', '4'),
(42, 'Tidsplan läckt för Cyan-uppdatering', 'Den kommande Cyan-uppdateringen för Nokias Windows Phone-baserade Lumia-telefoner kommer rullas ut samtidigt som telefonerna uppgraderas från Windows Phone 8 till Windows Phone 8.1. Först ut med uppdateringen är den nya modellen Lumia 630, där uppdateringen redan från start är installerad på telefonen. Nu har en mer specifik tidsplan för när uppdateringarna är tänkta att rullas ut till telefonerna från den Microsoft-ägda finska mobiljätten läckt ut på nätet. Det är Evleaks som har kommit över ett schema där ungefärliga datum för inte mindre än tretton modeller vad Cyan-uppdateringen beträffar går att ta del av. De första telefonerna som får uppdateringen enligt schemat, som förvisso endast uppges gälla för Nederländerna, Belgien och Luxemburg, blir Lumia 635, Lumia 930, Lumia 925, Lumia 1020 och Lumia 1520 ', 'feber.se', NULL, '2014-06-06 15:42:43', '5'),
(43, 'Trolla med url-förkortare', 'Shrturl är en tjänst som kanske kan uppfattas som en vanlig tjänst för att förkorta långa webbadresser men i själva verket är det ett verktyg som man kan använda om man vill trolla med någon i största allmänhet då man får möjlighet att redigera den aktuella webbsidan dit urlförkortaren pekar. \r\n\r\nDet går att ändra de flesta textstycken på en webbsida men även ändra bilder som jag till exempel gjort på Google i bilden ovan. Shrturl funkar bäst på webbsidor som inte har allt för mycket javascript. ', 'feber.se', NULL, '2014-06-06 15:44:55', '6'),
(45, 'Unga fildelar mindre', 'Forskare på Lunds Universitet kan nu konstatera att unga svenskar fildelar mindre nu än vad man gjort tidigare och i ålderskategorin 15 - 25 år uppger över 30% att de aldrig någonsin har fildelat. Det kan jämföras med de 21,6% som vid en liknande undersökning 2009 uppgav att de aldrig fildelat. \r\n\r\nDet är dock inte på grund av att ungdomarna är oroliga för rättsliga komplikationer som nedladdningen minskar då de som anser att man inte bör fildela för att det är olagligt har minskat från 24,9% till 16%. Istället tror forskarna att fildelningen minskat bland unga tack vare streamingtjänster som till exempel Spotify och Netflix. \r\n\r\nTotalt så har fildelningen bland unga som fildelar dagligen minskat från 32,8% 2012 till 29% 2014 enligt undersökninge', 'feber.se', NULL, '2014-06-06 15:49:36', '6');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
