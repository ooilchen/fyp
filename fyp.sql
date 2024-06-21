-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2024 at 12:42 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fyp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` varchar(255) NOT NULL,
  `admin_username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `email`, `password`) VALUES
('6673e7e9db3e4', 'ooilchen', 'leechen787@gmail.com', '$2y$10$yQ6UZY5rwTsuyhKqKQ5HG.cfCLNyuoO1gBh3eF4aw5AGw3wvC.Kbu');

-- --------------------------------------------------------

--
-- Table structure for table `admin_annnouncement`
--

CREATE TABLE `admin_annnouncement` (
  `announce_id` varchar(255) NOT NULL,
  `announcement` varchar(255) NOT NULL,
  `announcement_img` varchar(255) NOT NULL DEFAULT '../images/FB_IMG_1691993414822.jpg',
  `date_announce` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_annnouncement`
--

INSERT INTO `admin_annnouncement` (`announce_id`, `announcement`, `announcement_img`, `date_announce`) VALUES
('INFO-0001', 'Testing 123', '../images/FB_IMG_1691993414822.jpg', '2024-05-01 11:33:22');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` varchar(255) NOT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `category_desc` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_desc`, `status`) VALUES
('CAT-0001', 'confession', 'Confess anything you want', 1),
('CAT-0002', 'announcement', 'Let more people know', 1),
('CAT-0003', 'enquiries', 'What do u wan to ask', 1),
('CAT-0004', 'lostnfound', 'Find your lost thing hereeeeeeeeeee', 1),
('CAT-0005', 'promote', 'jual-jual your product, service, or promote your event', 1),
('CAT-0006', 'horror story', 'share your horror experience', 1),
('CAT-0007', 'crush', 'confess your love, mne tau jodoh XD', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` varchar(255) NOT NULL,
  `content_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `comment_text` varchar(2000) NOT NULL,
  `date_commented` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `content_id` varchar(255) NOT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  `category_id` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `content_status` int(11) DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `like_count` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`content_id`, `date_created`, `category_id`, `content`, `content_status`, `image`, `like_count`) VALUES
('conf-6673ed0c36457', '2024-06-20 08:49:16', 'CAT-0001', 'letih ehh dpt roomate yg sikit² menjuss. pintu bilit mun nya masuk mcm kena kejar ngan antu. main empas² jak, hri ya time aku tidur diempas nya kuat² pintu. gila biak ya. mcm la ya jak yg stress. mun nya masuk bilit masam alu muka nya. bila ya klaka ngan housemates yg lain okay jak. entah pa masalah. tau la aku tok bukan biak m*.', 1, NULL, 1),
('conf-6673ed7009377', '2024-06-20 08:50:56', 'CAT-0007', 'Saya dah lama perhati setiap kali saya lalu area fsgk area tingkat 1, tak tahu lah tu lab or studio ape, tapi maybe tu area budak animation? Design technology? Maybee... tapi saya firasa saya kuat mengatakan tu area budak animation,....just nak cakap yang budak budak animation ni memang comel comel eh? Teringin sangat nak berkenalan dan berkawan...Hahahahahahahahahaha..follow di ig pun cukup ba🙈', 1, NULL, 2),
('conf-66743465959e0', '2024-06-20 13:53:41', 'CAT-0003', 'ada tak yg nak sewakan pakaian tradisdional (perempuan)? (sabah/sarawak) klau ada baju dusun pun boleh jugaa . urgent 🥹', 1, NULL, 1),
('conf-667436281506f', '2024-06-20 14:01:12', 'CAT-0001', 'If you gave me a chance I would take it\r\nIt\'s a shot in the dark but I\'ll make it\r\nKnow with all of your heart, you can\'t shame me\r\nWhen I am with you, there\'s no place I\'d rather be', 1, '../images/conf-667436281506f.jpg', 2),
('conf-667534693ed03', '2024-06-21 08:06:01', 'CAT-0002', 'Hello guys, just nak minta tolong anda semua. Saya kerja part time kat tgv cinema vivacity... and tadi ada briefing so bos saya kata kalau sales utk malam ni tinggi dari sales kemarin then dia akan bagi bonus utk kami. Anyone nak tgk movie kat viva hari ni boleh book kat website tgv cinema kuching or walk in. \r\n\r\nKalau nak walk in boleh bawa kad matrik korang ye (dapat discount lagi🥰). Saya suggest korang tgk movie How to make millions before grandma dies (https://www.tgv.com.my/movies/details/how-to-make-millions-before-grandma-dies). Yang sudi membantu, terima kasih ye🥹 Biasalah hidup sebagai student banyak nak guna duit, tak nak harap duit parents😌 Semoga yang membantu dimurahkan rezeki🥰', 1, NULL, 2),
('conf-66754bcbed267', '2024-06-21 09:45:47', 'CAT-0001', 'Saya tak tau nak confess kat sesapa even ada kawan or family. Allow me to confess here. Actually im lelaki, dan bersifat ambivert (iykyk). Banyak yg tak suka pada saya, sebab kurang bergaul (bukan tk bergaul langsung) + x good-looking. I don\'t know why, kenapa saya harus hadapi semua itu even i cuba tak ambil kisah. Bila alone, pandai terlintas pulak pikiran tu lagi2 time hectic week bgini (kenapalah harus masa bgini jugak terlintas) sometimes i rasa sangat stres and mudah menangis padahal lelaki harus kuat. Melalui menangis je dapat mengurangkan perasaan tersebut. Kalau saya ceritakan masalah ni kat family or kawan, mcm cerita yang annoying dan membosankan. Sbb pernah meluahkan masalah lain, then x kena lyn sangat, just dengar sambil main hp. From that i rasa cerita i feel so annoying and boring, from that juga i pendam saja masalah sendiri. Bila part masalah dorang, i pulak kena pay attention dengan luahan mereka and minta cadangan penyelesaian. Menyumpah dalam hati ja, even try bg cdgn. Sya tk kisah org ckp munafik berdasarkan confession ni. Dah lama juga makan hati. \r\n\r\nSecond confession, sy pernah dikatakan kedekut sebab kdg taknak join kemahuan dorang like pergi karaoke and makan di tempat mahal2 sikit tiap minggu (alasan: self reward padahal kewangan lagi teruk drpd aku. Tapi tulah, tak sedar diri. Klau spend rm 10 20 okylh. ni tak, sampai 30 40 sorang skli makan. Rasa tk berbaloi bila makanan ciput je hidang. Astu balik kediaman, makan maggi. Baik aku simpan buat makan seminggu. Time urgent pandai pulak pi meminjam sementara tunggu i/b transfer lagi belanja bulanan. Bukan keluarga T20, tapi dari B40.', 1, NULL, 2),
('conf-66754e878ecc3', '2024-06-21 09:57:27', 'CAT-0006', 'hi min, im a college S student and my room’s view is tasik. so last night I stay up to do my assignment till 3am. then when I start to lay down, suddenly i heard smtg… the sounds mcm bunyi burung? and i never heard it before. mind u i live in the same room since last sem but i never heard the sounds before. so i was curious about it, and i look outside… and guess what i saw… i saw pocong? It was in the laluan otw to go pavi😃 its just standing there and i was panic so i close my window and go to lay down again. then i remember, before this i saw on tiktok abt how pocong sounds like, and yes its the same with what i heard last night😃😃😃 so if u guys starts to hear any weird sound after this, just pls dont look for it😂😂😂😂', 1, NULL, 1),
('conf-66754ec083466', '2024-06-21 09:58:24', 'CAT-0001', 'min, cuma nak cakap yg me as a male, felt annoyed by myself when I\'m getting too comfortable with someone, my behaviour change and I laugh a lot but sometimes I just have to ruined the mood by saying something unnecessary as a joke. For those who felt sad about what I sad, I\'m really sorry cause i am a straightforward guy and I will try not to get too comfortable with you guys.', 1, NULL, 2),
('conf-66754efdadba8', '2024-06-21 09:59:25', 'CAT-0001', 'what to do when ure feeling extremely miserable and exhausted at one point u just want to give up and rest for an eternity. Im so helpless right now. Back then i still can control myself but now i dont think i can anymore. Im too tired. I have no purposes in life than to live for others. To broke to even afford therapy. Im scared of myself and at the same time i feel bad for myself.', 1, NULL, 2),
('conf-66754f9c4a376', '2024-06-21 10:02:04', 'CAT-0001', 'Tadi ba PB tu tgk2 aku la tgh sorang2 dkt luar 7e, terus aku cabut lari pegi masuk bahagian dobi duduk dkt bench, trus dia ikut aku doh smpi masuk dobi dahlah tersengih2 btw aku lelaki 😭 then dia tanya aku “Dik, buat apa tu? Dik okay ke?” & aku jwb ja la aku okayy then aku ckp aku tunggu kawan aku yg tgh membeli dkt 7e. Kawan aku ni pun satu lambat betul membeli 😂 sempat PB tu interview background aku, btw dia ada tanya aku from which kolej & I accidentally said I’m from Alamanda padahal aku org Cempaka, then bila I said nak gerak balik, dia tak hairan pulak aku jalan guna jambatan 💀', 1, NULL, 2),
('conf-66754fd010a61', '2024-06-21 10:02:56', 'CAT-0001', 'Luahan hati \r\n\r\nTak tahu laa, sometimes rasa annoying ngan kawan sendiri. Bukan nak cakap apa laa, tapi bila dah semakin rapat gurauan pun jadi kasar. Even dah rapat sekalipun pls laa bila bergurau tu jgn sampai mengejek. Rasa macam tersisih pun ada juga kekadang. Bila aku buka mulut jak, terus kasar bahasa ingat aku takde hati dan perasaan ke… Aku kawan korang jugak tau. Bila aku bergurau sikit je terus semua nak diungkit dan ambil serius ttg gurauan tersebut. Everytime rasa down bila dah dilemparkan dgn kata² yg kasar dari member sendiri setiap kali tu jugak saya cuba utk think positive. But…. Nothing change. Takpe laa maybe dgn cara slow ii  menjauhkan diri is the best answer. Korang bukannya perasan pun kan. \r\n\r\nIt’s hurt.', 1, NULL, 2),
('conf-66754fe6ed2f0', '2024-06-21 10:03:18', 'CAT-0001', 'Hi, saya saja mau meluah.. Kepada free rider di luar sana tolong lah ehhh tolong sangat² sedarkan diri anda.. Kami dah tak tau macam mana nak sedarkan anda bahawa deadline dah nak dekat.. Ada yang bercerita, deadline malam ni, tapi part si free rider tu tak buat langsung.. Ada juga yang cakap terpaksa take over sebab dah nak dekat deadline.. So please lah.. Saya pun tak sampai hati nak kick korang dari group tapi kalau perangai macam ni sampai lagi berapa jam dah nak deadline pun tak buat juga memang bye² lah. Terima kasih. Jangan buat orang stress😊', 1, NULL, 2),
('conf-6675528909263', '2024-06-21 10:14:33', 'CAT-0001', 'ingat senang ka jadi leader? kena palau dalam group. kang dibiarkan salah, terlalu ambik peduli takda sorang pun endah. group assignment tu markah bersama tau, fikirla group member lain. kalau individual assignment, u nak buat or taknak buat terpulanglah. dah kira bagus dah orang remind buat kerja, jumpa di kelas leader remind jugak, pastu remind lagi dekat group ws. agih kerja paling senang lagi pun masih takdapat nak buat. tagih part yang dibuat pun macam along tagih hutang. ni dahla lambat buat kerja, due date pulak dah nak dekat. u fikir jadi leader ni kerja siap terus submit ke? ehhh no tau, mana leader nak compile lagi, nak check lagi. u senang la, asal part u siap, dah boleh senang lenang. eee penatla buat kerja dengan free rider. tu elok je i tengok u pergi dating, kerja tak buat pulak erghh', 1, NULL, 2),
('conf-6675d3686d21a', '2024-06-21 19:24:24', 'CAT-0006', 'Hai guys, today i wanna share my horror story he he he [ ketawa jahat]\r\n\r\nKisah ni berlaku pada 2hari lepas. Ketika itu saya berada dibawah blok kolej 3huruf. Blok mana? itu biarlah rahsia. lebih kurang sekitar pukul 2pagi pada masa tu, saya nak jalan jalan ambil angin jer sebenarnya, so saya pun duduk la kt situ sambil bermain sama si oyen yang entah dari mana datangnya. Tiba-tiba perasaan saya seolah-oleh di perhatikan dari jauh, jadi saya pun cubalah mencari kot2 ada yang crush kat saya. Ketika saya berjalan di area lorong TAZ-Cempakaa, saya terhidu sesuatu yang sangat busuk. So normallah saya pn cepat2 la baca jelahh apa yang boleh di baca. Then, benda tu tegur guys diaaa tegurrrr \"adik nak beli insuran tak?\" Serammm siottt. \r\n\r\nok tu jer. Bye.', 1, NULL, 0),
('conf-6675d3d4615a3', '2024-06-21 19:26:12', 'CAT-0001', 'hi, just nak tanya pendapat korang tentang relay yang bertahan tapi ragu². dia mcm ni, korang rase berbaloi tak terus bertahan dlm relay where the guy say he love you but not through his action. so kiranya macam effortless lah. takut juga if kite ni just jadi tempat pelampias die nak forget past relay je. kiranya cinta tu masih ke yg lama, kita ni just peneman, penenang, just for tittle and so on. even, he also a bit red flag in which never set boundaries with others + he make me sometimes confused dgn status kitorang. so you guys rasa, worth it tak untuk bertahan dlm relay ni?', 1, NULL, 1),
('conf-6675d414be281', '2024-06-21 19:27:16', 'CAT-0007', 'Actually I ada crush dekat sorang pompuan ni dari FSSK Year 3 tapi x sure course apa. Nama dia CB (bukan cibai) and rambut dia warna merah. Dia suka pakai warna pink and handbag hitam, sometimes ada botol pink dia. So cuteee. Haritu I ada nampak dia dekat padang rugby dgn sorang laki, agak2 tu bf dia ke? Ke dia single? I just want to say that you look cute and anyone yg kenal dia boleh tak share ig dia?', 1, NULL, 1),
('conf-6675d43959efe', '2024-06-21 19:27:53', 'CAT-0007', 'Hello Admin, tadi kat Cempaka aku (lelaki) ada nampak perempuan ni yang pakai baju hitam dan seluar kelabu bersama dengan anjing kat Dataran Cempaka. Dia ambil gambar anjing itu sambil menunggu kawan dia. Point is ku interested dengan dia dan harap dia notice confession ini. Also bila kawan dia meet up dengan dia di Cempaka, kawan dia pakai baju neon green dan mereka bawa barang macam signboard atau portrait sebelum keluar dari Cempaka. \r\n\r\nHarap dia notice confession ini lah sebab to me,you peaked my interest you look kinda cute.\r\n', 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `home_image`
--

CREATE TABLE `home_image` (
  `image_id` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `home_image`
--

INSERT INTO `home_image` (`image_id`, `image_path`) VALUES
('IMG-6673ecb8c58b7', '../images/IMG-6673ecb8c58b7.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `profile_pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `password`, `profile_pic`) VALUES
('6675411188b63', 'ooilchen', 'leechen787@gmail.com', '$2y$10$7wr8qW8HUXCfZucMt9qgGOXe7PnwRLIx/f6eiDvni7//Ltuy5/ecq', ''),
('6675bf7e246c9', 'ff', 'olc6670@gmail.com', '$2y$10$DUjOPOXPxwS7RZkt6aSFTO7VRaMNBlukSp/PFo9YqPUBVr0Ad7AiO', ''),
('6675c09716d15', 'mango', 'wilsonxmango@gmail.com', '$2y$10$mVEyHwp08xXO2npQIcsKV.25nHkWekjK4PMZLkTMUIHvXDTnFPnm6', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_likes`
--

CREATE TABLE `user_likes` (
  `user_id` varchar(255) NOT NULL,
  `content_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_likes`
--

INSERT INTO `user_likes` (`user_id`, `content_id`) VALUES
('6675411188b63', 'conf-6673ed0c36457'),
('6675411188b63', 'conf-6673ed7009377'),
('6675411188b63', 'conf-667436281506f'),
('6675411188b63', 'conf-667534693ed03'),
('6675411188b63', 'conf-66754bcbed267'),
('6675411188b63', 'conf-66754e878ecc3'),
('6675411188b63', 'conf-66754ec083466'),
('6675411188b63', 'conf-66754efdadba8'),
('6675411188b63', 'conf-66754f9c4a376'),
('6675411188b63', 'conf-66754fd010a61'),
('6675411188b63', 'conf-66754fe6ed2f0'),
('6675411188b63', 'conf-6675528909263'),
('6675411188b63', 'conf-6675d3d4615a3'),
('6675411188b63', 'conf-6675d414be281'),
('6675411188b63', 'conf-6675d43959efe'),
('6675c09716d15', 'conf-6673ed7009377'),
('6675c09716d15', 'conf-66743465959e0'),
('6675c09716d15', 'conf-667436281506f'),
('6675c09716d15', 'conf-667534693ed03'),
('6675c09716d15', 'conf-66754bcbed267'),
('6675c09716d15', 'conf-66754ec083466'),
('6675c09716d15', 'conf-66754efdadba8'),
('6675c09716d15', 'conf-66754f9c4a376'),
('6675c09716d15', 'conf-66754fd010a61'),
('6675c09716d15', 'conf-66754fe6ed2f0'),
('6675c09716d15', 'conf-6675528909263');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `admin_annnouncement`
--
ALTER TABLE `admin_annnouncement`
  ADD PRIMARY KEY (`announce_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `content_id` (`content_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`content_id`),
  ADD KEY `fk` (`category_id`);

--
-- Indexes for table `home_image`
--
ALTER TABLE `home_image`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_likes`
--
ALTER TABLE `user_likes`
  ADD PRIMARY KEY (`user_id`,`content_id`),
  ADD KEY `fk1` (`content_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`content_id`) REFERENCES `content` (`content_id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `fk` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `user_likes`
--
ALTER TABLE `user_likes`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`content_id`) REFERENCES `content` (`content_id`),
  ADD CONSTRAINT `fk2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
