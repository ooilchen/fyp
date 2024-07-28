-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2024 at 02:32 PM
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
  `password` varchar(255) DEFAULT NULL,
  `approved` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `email`, `password`, `approved`) VALUES
('6673e7e9db3e4', 'ooilchen', 'leechen787@gmail.com', '$2y$10$yQ6UZY5rwTsuyhKqKQ5HG.cfCLNyuoO1gBh3eF4aw5AGw3wvC.Kbu', 1),
('66843ddf32753', 'bapu', 'bapu0523@gmail.com', '$2y$10$KDlwQN5KnZ5B1c5pVRSq7OJruk3fvQ47RUStMcOWvpFszJz.KQ2o6', 1),
('6684470892f91', 'olc', 'olc6670@gmail.com', '$2y$10$BkhSidD3/5x4pED/pg9MSeWwg/hah4oqOI2r39gUvSjWCGnA4mm/6', 1),
('6684e9d3ed838', NULL, '123@gmail.com', '$2y$10$JoreM.YIBtFvxl.yiUiFku4bZGADTxiOsz539GfkealHwoI8sZ1cC', 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin_annnouncement`
--

CREATE TABLE `admin_annnouncement` (
  `announce_id` varchar(255) NOT NULL,
  `announcement` varchar(255) NOT NULL,
  `announcement_img` varchar(255) NOT NULL DEFAULT '../images/FB_IMG_1691993414822.jpg',
  `date_announce` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_annnouncement`
--

INSERT INTO `admin_annnouncement` (`announce_id`, `announcement`, `announcement_img`, `date_announce`) VALUES
('INFO-0001', 'Today the last of symposium! Gud luck everyone! ', '../imagesphoto_2024-07-03_17-39-22.jpg', '2024-07-03 17:39:27');

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
('CAT-0007', 'crush', 'confess your love, mne tau jodoh XD', 1),
('CAT-0008', 'study group', 'post anything related to studies, find your study buddies too', 1),
('CAT-0009', 'room rental', 'look for room mate or house mate hereee', 1);

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

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `content_id`, `user_id`, `comment_text`, `date_commented`) VALUES
('COMMENT_66771ac515ef4', 'conf-6673ed7009377', '6675411188b63', 'Hi', '2024-06-22 18:41:09'),
('COMMENT_66771b9f1cc5b', 'conf-6673ed7009377', '6675411188b63', 'bye', '2024-06-22 18:44:47'),
('COMMENT_66771bc8b7270', 'conf-6673ed7009377', '6675411188b63', 'bye', '2024-06-22 18:45:28'),
('COMMENT_66771bebe00ae', 'conf-6673ed7009377', '6675411188b63', 'buuuuuuuuu', '2024-06-22 18:46:03'),
('COMMENT_66771cd57031a', 'conf-6673ed7009377', '6675411188b63', 'hi', '2024-06-22 18:49:57'),
('COMMENT_667931be1d668', 'conf-6675d43959efe', '6675411188b63', 'dia tak suka kau', '2024-06-24 08:43:42'),
('COMMENT_6679351213816', 'conf-6676c53820f75', '667934e650d6c', 'Bapak kau ah', '2024-06-24 08:57:54'),
('COMMENT_6679352bd3305', 'conf-6676c46b7eeca', '667934e650d6c', 'bapak kau ah', '2024-06-24 08:58:19'),
('COMMENT_667935e6c99ae', 'conf-66793557db5f3', '667934e650d6c', 'Lurveeeeeeeeeeeeee', '2024-06-24 09:01:26'),
('COMMENT_667a2e5027d78', 'conf-667706f123b66', '6675411188b63', 'Naissssssss', '2024-06-25 02:41:20'),
('COMMENT_668519e0f3c99', 'conf-6684eee41e706', '6675411188b63', 'Hiiii im interested at this! please contact me here, 011111111', '2024-07-03 09:29:04');

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
('conf-6673ed0c36457', '2024-06-20 08:49:16', 'CAT-0001', 'letih ehh dpt roomate yg sikit² menjuss. pintu bilit mun nya masuk mcm kena kejar ngan antu. main empas² jak, hri ya time aku tidur diempas nya kuat² pintu. gila biak ya. mcm la ya jak yg stress. mun nya masuk bilit masam alu muka nya. bila ya klaka ngan housemates yg lain okay jak. entah pa masalah. tau la aku tok bukan biak m*.', 1, NULL, 2),
('conf-6673ed7009377', '2024-06-20 08:50:56', 'CAT-0007', 'Saya dah lama perhati setiap kali saya lalu area fsgk area tingkat 1, tak tahu lah tu lab or studio ape, tapi maybe tu area budak animation? Design technology? Maybee... tapi saya firasa saya kuat mengatakan tu area budak animation,....just nak cakap yang budak budak animation ni memang comel comel eh? Teringin sangat nak berkenalan dan berkawan...Hahahahahahahahahaha..follow di ig pun cukup ba🙈', 1, NULL, 2),
('conf-66743465959e0', '2024-06-20 13:53:41', 'CAT-0003', 'ada tak yg nak sewakan pakaian tradisdional (perempuan)? (sabah/sarawak) klau ada baju dusun pun boleh jugaa . urgent 🥹', 1, NULL, 0),
('conf-667436281506f', '2024-06-20 14:01:12', 'CAT-0001', 'If you gave me a chance I would take it\r\nIt\'s a shot in the dark but I\'ll make it\r\nKnow with all of your heart, you can\'t shame me\r\nWhen I am with you, there\'s no place I\'d rather be', 1, '../images/conf-667436281506f.jpg', 2),
('conf-667534693ed03', '2024-06-21 08:06:01', 'CAT-0002', 'Hello guys, just nak minta tolong anda semua. Saya kerja part time kat tgv cinema vivacity... and tadi ada briefing so bos saya kata kalau sales utk malam ni tinggi dari sales kemarin then dia akan bagi bonus utk kami. Anyone nak tgk movie kat viva hari ni boleh book kat website tgv cinema kuching or walk in. \r\n\r\nKalau nak walk in boleh bawa kad matrik korang ye (dapat discount lagi🥰). Saya suggest korang tgk movie How to make millions before grandma dies (https://www.tgv.com.my/movies/details/how-to-make-millions-before-grandma-dies). Yang sudi membantu, terima kasih ye🥹 Biasalah hidup sebagai student banyak nak guna duit, tak nak harap duit parents😌 Semoga yang membantu dimurahkan rezeki🥰', 1, NULL, 2),
('conf-66754bcbed267', '2024-06-21 09:45:47', 'CAT-0001', 'Saya tak tau nak confess kat sesapa even ada kawan or family. Allow me to confess here. Actually im lelaki, dan bersifat ambivert (iykyk). Banyak yg tak suka pada saya, sebab kurang bergaul (bukan tk bergaul langsung) + x good-looking. I don\'t know why, kenapa saya harus hadapi semua itu even i cuba tak ambil kisah. Bila alone, pandai terlintas pulak pikiran tu lagi2 time hectic week bgini (kenapalah harus masa bgini jugak terlintas) sometimes i rasa sangat stres and mudah menangis padahal lelaki harus kuat. Melalui menangis je dapat mengurangkan perasaan tersebut. Kalau saya ceritakan masalah ni kat family or kawan, mcm cerita yang annoying dan membosankan. Sbb pernah meluahkan masalah lain, then x kena lyn sangat, just dengar sambil main hp. From that i rasa cerita i feel so annoying and boring, from that juga i pendam saja masalah sendiri. Bila part masalah dorang, i pulak kena pay attention dengan luahan mereka and minta cadangan penyelesaian. Menyumpah dalam hati ja, even try bg cdgn. Sya tk kisah org ckp munafik berdasarkan confession ni. Dah lama juga makan hati. \r\n\r\nSecond confession, sy pernah dikatakan kedekut sebab kdg taknak join kemahuan dorang like pergi karaoke and makan di tempat mahal2 sikit tiap minggu (alasan: self reward padahal kewangan lagi teruk drpd aku. Tapi tulah, tak sedar diri. Klau spend rm 10 20 okylh. ni tak, sampai 30 40 sorang skli makan. Rasa tk berbaloi bila makanan ciput je hidang. Astu balik kediaman, makan maggi. Baik aku simpan buat makan seminggu. Time urgent pandai pulak pi meminjam sementara tunggu i/b transfer lagi belanja bulanan. Bukan keluarga T20, tapi dari B40.', 1, NULL, 2),
('conf-66754e878ecc3', '2024-06-21 09:57:27', 'CAT-0006', 'hi min, im a college S student and my room’s view is tasik. so last night I stay up to do my assignment till 3am. then when I start to lay down, suddenly i heard smtg… the sounds mcm bunyi burung? and i never heard it before. mind u i live in the same room since last sem but i never heard the sounds before. so i was curious about it, and i look outside… and guess what i saw… i saw pocong? It was in the laluan otw to go pavi😃 its just standing there and i was panic so i close my window and go to lay down again. then i remember, before this i saw on tiktok abt how pocong sounds like, and yes its the same with what i heard last night😃😃😃 so if u guys starts to hear any weird sound after this, just pls dont look for it😂😂😂😂', 1, NULL, 2),
('conf-66754ec083466', '2024-06-21 09:58:24', 'CAT-0001', 'min, cuma nak cakap yg me as a male, felt annoyed by myself when I\'m getting too comfortable with someone, my behaviour change and I laugh a lot but sometimes I just have to ruined the mood by saying something unnecessary as a joke. For those who felt sad about what I sad, I\'m really sorry cause i am a straightforward guy and I will try not to get too comfortable with you guys.', 1, NULL, 2),
('conf-66754efdadba8', '2024-06-21 09:59:25', 'CAT-0001', 'what to do when ure feeling extremely miserable and exhausted at one point u just want to give up and rest for an eternity. Im so helpless right now. Back then i still can control myself but now i dont think i can anymore. Im too tired. I have no purposes in life than to live for others. To broke to even afford therapy. Im scared of myself and at the same time i feel bad for myself.', 1, NULL, 2),
('conf-66754f9c4a376', '2024-06-21 10:02:04', 'CAT-0001', 'Tadi ba PB tu tgk2 aku la tgh sorang2 dkt luar 7e, terus aku cabut lari pegi masuk bahagian dobi duduk dkt bench, trus dia ikut aku doh smpi masuk dobi dahlah tersengih2 btw aku lelaki 😭 then dia tanya aku “Dik, buat apa tu? Dik okay ke?” & aku jwb ja la aku okayy then aku ckp aku tunggu kawan aku yg tgh membeli dkt 7e. Kawan aku ni pun satu lambat betul membeli 😂 sempat PB tu interview background aku, btw dia ada tanya aku from which kolej & I accidentally said I’m from Alamanda padahal aku org Cempaka, then bila I said nak gerak balik, dia tak hairan pulak aku jalan guna jambatan 💀', 1, NULL, 2),
('conf-66754fd010a61', '2024-06-21 10:02:56', 'CAT-0001', 'Luahan hati \r\n\r\nTak tahu laa, sometimes rasa annoying ngan kawan sendiri. Bukan nak cakap apa laa, tapi bila dah semakin rapat gurauan pun jadi kasar. Even dah rapat sekalipun pls laa bila bergurau tu jgn sampai mengejek. Rasa macam tersisih pun ada juga kekadang. Bila aku buka mulut jak, terus kasar bahasa ingat aku takde hati dan perasaan ke… Aku kawan korang jugak tau. Bila aku bergurau sikit je terus semua nak diungkit dan ambil serius ttg gurauan tersebut. Everytime rasa down bila dah dilemparkan dgn kata² yg kasar dari member sendiri setiap kali tu jugak saya cuba utk think positive. But…. Nothing change. Takpe laa maybe dgn cara slow ii  menjauhkan diri is the best answer. Korang bukannya perasan pun kan. \r\n\r\nIt’s hurt.', 1, NULL, 2),
('conf-66754fe6ed2f0', '2024-06-21 10:03:18', 'CAT-0001', 'Hi, saya saja mau meluah.. Kepada free rider di luar sana tolong lah ehhh tolong sangat² sedarkan diri anda.. Kami dah tak tau macam mana nak sedarkan anda bahawa deadline dah nak dekat.. Ada yang bercerita, deadline malam ni, tapi part si free rider tu tak buat langsung.. Ada juga yang cakap terpaksa take over sebab dah nak dekat deadline.. So please lah.. Saya pun tak sampai hati nak kick korang dari group tapi kalau perangai macam ni sampai lagi berapa jam dah nak deadline pun tak buat juga memang bye² lah. Terima kasih. Jangan buat orang stress😊', 1, NULL, 2),
('conf-6675528909263', '2024-06-21 10:14:33', 'CAT-0001', 'ingat senang ka jadi leader? kena palau dalam group. kang dibiarkan salah, terlalu ambik peduli takda sorang pun endah. group assignment tu markah bersama tau, fikirla group member lain. kalau individual assignment, u nak buat or taknak buat terpulanglah. dah kira bagus dah orang remind buat kerja, jumpa di kelas leader remind jugak, pastu remind lagi dekat group ws. agih kerja paling senang lagi pun masih takdapat nak buat. tagih part yang dibuat pun macam along tagih hutang. ni dahla lambat buat kerja, due date pulak dah nak dekat. u fikir jadi leader ni kerja siap terus submit ke? ehhh no tau, mana leader nak compile lagi, nak check lagi. u senang la, asal part u siap, dah boleh senang lenang. eee penatla buat kerja dengan free rider. tu elok je i tengok u pergi dating, kerja tak buat pulak erghh', 1, NULL, 3),
('conf-6675d3686d21a', '2024-06-21 19:24:24', 'CAT-0006', 'Hai guys, today i wanna share my horror story he he he [ ketawa jahat]\r\n\r\nKisah ni berlaku pada 2hari lepas. Ketika itu saya berada dibawah blok kolej 3huruf. Blok mana? itu biarlah rahsia. lebih kurang sekitar pukul 2pagi pada masa tu, saya nak jalan jalan ambil angin jer sebenarnya, so saya pun duduk la kt situ sambil bermain sama si oyen yang entah dari mana datangnya. Tiba-tiba perasaan saya seolah-oleh di perhatikan dari jauh, jadi saya pun cubalah mencari kot2 ada yang crush kat saya. Ketika saya berjalan di area lorong TAZ-Cempakaa, saya terhidu sesuatu yang sangat busuk. So normallah saya pn cepat2 la baca jelahh apa yang boleh di baca. Then, benda tu tegur guys diaaa tegurrrr \"adik nak beli insuran tak?\" Serammm siottt. \r\n\r\nok tu jer. Bye.', 1, NULL, 2),
('conf-6675d3d4615a3', '2024-06-21 19:26:12', 'CAT-0001', 'hi, just nak tanya pendapat korang tentang relay yang bertahan tapi ragu². dia mcm ni, korang rase berbaloi tak terus bertahan dlm relay where the guy say he love you but not through his action. so kiranya macam effortless lah. takut juga if kite ni just jadi tempat pelampias die nak forget past relay je. kiranya cinta tu masih ke yg lama, kita ni just peneman, penenang, just for tittle and so on. even, he also a bit red flag in which never set boundaries with others + he make me sometimes confused dgn status kitorang. so you guys rasa, worth it tak untuk bertahan dlm relay ni?', 1, NULL, 1),
('conf-6675d414be281', '2024-06-21 19:27:16', 'CAT-0007', 'Actually I ada crush dekat sorang pompuan ni dari FSSK Year 3 tapi x sure course apa. Nama dia CB (bukan cibai) and rambut dia warna merah. Dia suka pakai warna pink and handbag hitam, sometimes ada botol pink dia. So cuteee. Haritu I ada nampak dia dekat padang rugby dgn sorang laki, agak2 tu bf dia ke? Ke dia single? I just want to say that you look cute and anyone yg kenal dia boleh tak share ig dia?', 1, NULL, 3),
('conf-6675d43959efe', '2024-06-21 19:27:53', 'CAT-0007', 'Hello Admin, tadi kat Cempaka aku (lelaki) ada nampak perempuan ni yang pakai baju hitam dan seluar kelabu bersama dengan anjing kat Dataran Cempaka. Dia ambil gambar anjing itu sambil menunggu kawan dia. Point is ku interested dengan dia dan harap dia notice confession ini. Also bila kawan dia meet up dengan dia di Cempaka, kawan dia pakai baju neon green dan mereka bawa barang macam signboard atau portrait sebelum keluar dari Cempaka. \r\n\r\nHarap dia notice confession ini lah sebab to me,you peaked my interest you look kinda cute.\r\n', 1, NULL, 3),
('conf-6676c3507d438', '2024-06-22 12:28:00', 'CAT-0007', 'Hi UC sy dh tau dh nma crush sy dye plaja y3 fssk nma kellie/kelly? kel? sya ad dgr kwn2 dye pnggil nma2 tu hope she notice this 😽', 1, NULL, 0),
('conf-6676c35ef02df', '2024-06-22 12:28:14', 'CAT-0001', 'Spending time outside because saying kau memang teda common sense kah?? Mentang2 orng pkai earphone kau sngaja mau buat bising sana feels wrong.', 1, NULL, 1),
('conf-6676c36b8ab5f', '2024-06-22 12:28:27', 'CAT-0001', 'Lately ni, rasa letih sangat. Assignment + presentation + quiz + kejar duedate lagi. Pernah letih tapi sumpah ini yg paling melelahkan. Even mengantuk pun, susah nak tido. Fikiran becelaru. Kadang pernah jugak terfikir “boleh ke aku survive?” Pastu, almost setiap malam menangis sampai tertido. Mata & otak asyik berdenyut jer. Tak tau sbb apa. Maybe stress I don’t know. Kekadang tu sampai lupa nak makan', 1, NULL, 1),
('conf-6676c37b7350e', '2024-06-22 12:28:43', 'CAT-0001', 'Gempak do teater tadi. syabas to everyone yg take up on the projects', 1, NULL, 1),
('conf-6676c388a4622', '2024-06-22 12:28:56', 'CAT-0001', 'Selamat hari Sabtu semua. Yang mana cuti, teruskan cuti. Yang kerja, teruskan kerja. Yang bebal, teruskan bebal. Yang cantik, teruskan cantik. Yang jenis kata dah move on tapi hari hari meroyan, teruskan tapi aku letin juga, lebih baik kita masing masing.', 1, NULL, 1),
('conf-6676c39a631ed', '2024-06-22 12:29:14', 'CAT-0001', 'just wondering do guys like tanned skin girl though? bcs i swear beauty standards these days 😵‍💫👎🏻 but skrg asal tan sikit sudah dikira tidak cantik suda.  :(', 1, NULL, 1),
('conf-6676c3bb4c140', '2024-06-22 12:29:47', 'CAT-0001', 'mana nak report suruh clamp tayar keta yang takde sticker tapi semak nak parking kat allamanda premium ni, tahun lepas kereta aku dengan abang ras (felo) je parking situ and adalah sometimes satu/dua kereta but now serabut gila and 70% of them takde sticker 20% of them sticker tak valid only 10% je sticker yang valid sumpah aku nak keta yang tak layak ni kene clamp cepat cepat', 1, NULL, 1),
('conf-6676c3c83065e', '2024-06-22 12:30:00', 'CAT-0001', 'saja mau cakap.. boleh ka yg tinggal dalam satu rumah ni, tlg la tutup pintu tu please la tutup slow2😌 terkejut ba saya hari2 mau terkeluar jantung gara2 kamu kasi ampas tu pintu😌 satu lagi, bila kamu nampak housemate kamu di ruang tamu tu kan, nda payah ba  kau ampas pintu atu time kau mau masuk bilik😌 saya pun nda suka juga liat kau😞 (satu rumah kami ni mmg jarang mau interact sbb rasanya masing2 nda mau berkomunikasi with each other)', 1, NULL, 1),
('conf-6676c3f28cbb2', '2024-06-22 12:30:42', 'CAT-0007', 'Actually I ada crush dekat sorang pompuan ni dari FSSK Year 3 tapi x sure course apa. Nama dia CB (bukan cibai) and rambut dia warna merah. Dia suka pakai warna pink and handbag hitam, sometimes ada botol pink dia. So cuteee. Haritu I ada nampak dia dekat padang rugby dgn sorang laki, agak2 tu bf dia ke? Ke dia single? I just want to say that you look cute and anyone yg kenal dia boleh tak share ig dia?', 1, NULL, 1),
('conf-6676c41190f1d', '2024-06-22 12:31:13', 'CAT-0003', 'hello anyone yg ada preloved high waist jean kaa? Memerlukan urgent gilak²😔😔😔pleasee yg size L/XL ya boleh comment dibah klk kmk pm', 1, NULL, 1),
('conf-6676c42232f6a', '2024-06-22 12:31:30', 'CAT-0001', 'Lelaki Islam Sarawak\r\nculture orang sarawak memang solat susah nak rapat & luruskan saf ke time berjemaah?? dah berapa kali solat jumaat dah aku perati kiri kanan memang payah nak rapatkan saf baik orang tua baik orang muda. memang laki islam sarawak sini lack of awareness ke cane eh tapi normally imam mention je lurus & rapatkan saf before angkat takbir ke memang dah biasa ignore korang rasa bende ni kecik je lah en ?? korang nak buat apa ruang kosong sebelah ?? simpan untuk ?? aiyoo…..', 1, NULL, 3),
('conf-6676c43180038', '2024-06-22 12:31:45', 'CAT-0003', 'nak tanya, kedai mfstore kat unijaya tu masih ada ke?. haritu ada hantar parcel situ tapi nda tau orangnya dah ambil ke belum sebab arwah sudah tenang dalam dakapan orang bah ahahahaha diorang still simpan ke parcel tu eh atau bagi balik sama jnt', 1, NULL, 2),
('conf-6676c4552d652', '2024-06-22 12:32:21', 'CAT-0001', 'hi i saja nak cerita my break up story ahhahaa. im type of person yang tak suka gaduh tau so gini citer dia. my ex dapat uni dekat utara while me here unimas. before i masuk unimas our relationship macam dah goyah like i keep asking him boleh ke ldr betul ke tak curang betul ke dia tak tengok perempuan lain bla bla cause i takut dia jumpa orang lain hahahaha. so first week kat unimas okay je sleep call apa semua and then dah start class i jarang call dia sebab nak i tau cuti negeri tu dengan unimas lain so i call dia seminggu sekali je. and then a few weeks i langsung tak call and chat dia and ex i pun tak cari i so that time i dah rasa something off. kalau i post story pun dia seen je. one day dia repost story dia keluar ngan perempuan pastu i tanya dia kata classmate je tapi my instinct kata bukan tapi i diam je (i nangis seminggu pergi kelas mata bengkak hahahahahah). a week before midsem break dia post story perempuan lain with caption love. luluh jantung i masatu sampai nak pergi kelas pun tak boleh i keep blaming myself i depress gila that week. dahlah i balik rumah sebba dia i nak jumpa dia dengan masatu tiket flight mahal tapi i balik jugak sebab nak jumpa dia. tapi tulah Allah sebaik baik perancang kan. 😇. i reply his story and wish him congratulations because dah jumpa girlfriend baru 😞haih rasa menyesal pulak i tau i maki dia ahhahahahah. and now i dah okay sikit hahaha belum fully move on tapi okaylah boleh senyum balik walaupun kadang2 sedih. pastu i temgok diorang bahagia gila kat sana while me here hari hari pikir apa salah i sampai dia curang macam tu. apa kurang i ? i tak pernah marah dia lepak. i tak pernah kisah dia nak main bola sampai malam sampai i kadang2 rasa i single masa dengan dia haih. okay tu je. kalau korang rasa single leh pm tepi eh hahahaha gurau2. i wish you guys all the best final nanti 💗', 1, NULL, 1),
('conf-6676c46b7eeca', '2024-06-22 12:32:43', 'CAT-0005', 'Hi last time tengok ada yg Tanya mau buka channel untuk kpop di unimas ada link x , mau jual banyak pc hehe\r\n\r\nnah bb i tau dua ni jaa\r\nhttps://t.me/+MxMpNaqO3vliYjM1\r\n\r\nhttps://t.me/pasarkpopkugemilang\r\n\r\nbtw siapa nak second hand teulight? i nak jual', 1, NULL, 2),
('conf-6676c482cf1db', '2024-06-22 12:33:06', 'CAT-0003', 'hi unimasian nak tanya korang cari part time job kat mana ye? almaklumlah sekarang nak cari kerja susah weh🥲', 1, NULL, 2),
('conf-6676c49a12438', '2024-06-22 12:33:30', 'CAT-0003', 'Hello sorry tanya. Kelab SMU sesi 22/23 memang tiada sijil ka? kami bayar rm10 waktu pendaftaran dulu sebab mereka kata hanya yang bayar sahaja dapat sijil tapi tiada kabar pun? tanya dalam group pon senyap jak atau kamu orang ada group lain 😀 memang sepuluh ringgit kecik bagi kamu orang tapi duit juga tu bha rasa macam kena scam suda ni', 1, NULL, 2),
('conf-6676c4c0ef9d3', '2024-06-22 12:34:08', 'CAT-0003', 'does anyone know where we can rent 1 whole apartment at unijaya? Thanks', 1, NULL, 2),
('conf-6676c4cb6a621', '2024-06-22 12:34:19', 'CAT-0001', 'After all the cries, anxiousness and mental breakdowns. I hope i can go through this', 1, NULL, 2),
('conf-6676c4fd696b7', '2024-06-22 12:35:09', 'CAT-0005', 'Hai, saya ada tersalah beli skincare semalam so ada tak yg nk beli 🥲baru pakai sekali and still new, beli di guardian😭 tolong la beli sbb takda siapa nak pakai🥲 boleh nego\r\n\r\n1. Toner Skintific Aha Bha Pha (purple), harga asal(Rm39.20)\r\nsaya bagi rm30 \r\n\r\n2. GladtoGlow Centella(green)\r\nharga asal (rm18.75), saya bagi rm15\r\n\r\nif interested, pls reply', 1, NULL, 2),
('conf-6676c53820f75', '2024-06-22 12:36:08', 'CAT-0006', 'hi nak share satu crita seram masa sem 1 which is after pkp.dulu kitorang housemate (teka la kolej apa ) selalu dengar bunyi org menangis. Mula2 housemate yg dgr tapi masatu sy tk prcaya and ingtkan maybe sbb perasaan diorang je kot since kita stay kat tmpt yg lama ditinggal kosong masa pkp. Then, one night sy tido memang dengar ye bunyi pompuan menangis :\'), mula2 sayup lepastu mkin jelas.tp sy tetap juga nak husnudzon and nak tido (sy sorng je dlm bilik in sharing room. Dlm 5 mins lepastu sy denga tingkp kena ketuk. Twicee. Then sy terus pegi bilik housemate sblh and tido kat situ. Then ada jugak hari, kitorang housemate semua lepak satu bilik, then tetiba org bilik bwh ketok pintu kitorang and tanya \"korang ke yg berlari2 tadi, sbb nk tegur bising sgt, sy ada kls\".kitorang terus pndg sama sendiri sbb kitorang semua just santai dlm bilik tu. After explain , sis tu pun ckp ni bkn kali prtma dia dngr, housemate dia yg lain pun dgr. Ada hari tu ,ada bunyi mcm org berlari kt rmh kitorang then sis ni dia plan nak main sergah rumah so dpt tangkap la sapa yg berlari (so takde yg tk ngaku pulak if ditanya), tapi end up masa bukak pintu tu , rumah kitorang mcm gelap and sunyi je as if tkde yg berlaku. Ok letih type ahahah nanti sambung sbb byk gak la things happen masatu tu', 1, NULL, 2),
('conf-6676c54ab86c9', '2024-06-22 12:36:26', 'CAT-0006', 'Nak cerita seram juga tapi ni berlaku pada diri sendiri. Since 2021, aku akan mimpi dalam mimpi😂 weird kan? maybe some of you guys pernah baca kat status aku haha nvm. 2021 around lepas spm, time tu aku in treatment so aku xleh tido atas katil.. my mom angkat katil tu letak tepi, tinggal ramgka dia tu just hampar toto and sleep jela mcm tu.. tido menghadap tingkap astu meja yg atas kepala la.. first mimpi ni aku mimpi kena culik time majlis kahwin aku (weyh aku xtau kenapa mimpi mcm tu AHAHAH padahal time tu single xde crush bagai semua), dia culik and sedut darah aku guna mesin until aku lemah suddenly ada sorg laki selamatkan aku (jgn tanya muka, mmg samar2 ja) astu tetiba terjaga but sebenarnya tu mimpi lagi. Aku terjaga and rasa diperhatikan from bawah meja, then aku pun tgkla and nampak mcm budak kecik tapi seram dok muka dia then aku terkejut sampai terjaga terus ke realiti terus aku tgk lagi bawah meja😭😭 xde apa then mmg seram gila nak tido balik, so aku call kawan aku nasib la member tgh push rank so dia la teman borak2😂\r\n\r\nThen tahun 2022, ni mimpi time kat matrik pulak.. time tu baru minggu pertama masuk matrik, and since time tu kan covid an so mcm agak sunyi la sebab xsemua lepas kuarantin dos kedua lagi so dorg balik lewat sikit.. mimpi first dia aku xingat sgt but pasal kejar2 something, then terjaga tu aku rasa mcm ada yg sentuh tangan aku then sentuh badan😭 astu terjaga ke dunia tu terus nangis sebab yela takut🤣 time tu cita la kat roommate (alhamdulillah la roommate semua ada so mcm xdela takut nak sambut tido balik huhu)\r\n\r\nTahun 2023 pulak, makin menjadi2😂😂 jadi kat unimas lak tu, time aku sem2😔 first tu mimpi family tapi kejap je sebab aku just tertido time on call dgn member🤣 then aku rasa ada yg perhatikan aku kat tepi katil, dia duduk bawah sambil tgk aku but aku xleh kalih menghadap dia just nampak kat hujung mata ja.. suddenly dia berckp, cuba teka apa dia cakap😭😭 \"saya pinjam suara awak kejap tau\" weyh sumpah tu suara aku and aku xleh berckp sampai aku merenyetla cuba nak berckp.. suddenly aku dikejutkan oleh member aku, dia ckp \"kenapa tu, ok x, xleh bernafas ke?\" (since ada masalah pernafasan tu yg dia tanya tu) then aku nangis and cita kat dia.. dia pun cuba la tenangkan aku sampai aku tertido balik, terus member xjadi endcall even niat nak endcall lepas habis game😂\r\n\r\nDia mcm mengarut n bebukan je tapi nthla aku pun mcm xpercaya benda2 tu😢 kawan pesan suruh pergi berubat risau la kan ahaha, tapi aku xtau nak ckp mcm mana kat parents aku😭 jgn minta part 2, sebab aku mmg berharap tahun ni xde mimpi2 tu dah🥹 kitonyo penakut😭😭😭', 1, NULL, 2),
('conf-6676c55acd47d', '2024-06-22 12:36:42', 'CAT-0006', 'Salam min. Aku ada cerita seram + lawak. Last week kan aku dgn kawan2 aku jalan2 la di sekitar unimas and sampai la kat Fakulti Sains Sosial. Tiba2 kawan aku mok berak, so kami suruh lah dia berak kat tandas LG tu. Ramai2 kami masuk tandas mok teman dia, and semasa dia sedang memulas tu, tiba2 batang mop kat hujung tandas tu terjatuh. Kami terkejut and tengok muka sama sendiri, pastu kami dirikan balik mop tu and sekali lagi mop tu terjatuh lagi. Kami pun teriak and terus lari keluar tandas tu 😂😂😂😂😂😂.. Kawan kami yg berak tu dia pun lari sama sebab kami teriak dan lari. Dia terus pasang seluar and lari tanpa cebok 😭😭😭😂😂😂😂.. Kami sambil lari sambil ketawaaaaa sebab tengok diaa kat belakang kami.. Adoiiii, sampai hari ni dia jadi bahan 😂😂😂😭😭.. Sorry bro, we love u so much ❤️', 1, NULL, 1),
('conf-6676c5657c27d', '2024-06-22 12:36:53', 'CAT-0006', 'Haii nk share pengalaman seram  ..So ini terjadi dkt fakulti seni kot tak igt sbb masatu kebetulan lalu situ and nak gi toilet tp masatu aku dgn kwn aku ni mmg tak taula selok belok atau apa lpstu kitorng naik tingkat berapa ntah tak igt and masatu kitorg jalan mcm biasa and ada lalu satu bilik ni and nmpk ada orang lalu dri dlm bilik tu and kitorng mmg clearly nmpk ada orgg and pastu kitorng mcm curios lah apa dia ni buat dlm bilik dkt fakulti tu sorg2 en..Pastu alangkah terkejutnyaa kitorg tgk tmpt yg kitorng lalu tu sebenarnya bilik yg siling dia tinggi cane eh nak explain kiranya ada satu hall seni ni dia makan 2floor so lantai nya dkt floor 1 and silingnya dkt floor2 aaa kiranya floor satu and dua bersambung and aku dgn kwn aku tu nmpk org lalu kat tingkap dkt area 2floor which is mmg takde lantai ah', 1, NULL, 1),
('conf-6676c5a4bd987', '2024-06-22 12:37:56', 'CAT-0006', 'aku nak share cerita seram ni di kolej  b** bilik triple so ada 3 org la dlm sebilik tu. Nak dijadikan cerita haritu bru ja habis midsem break so aku balikla ptg ahad mcmtu. tapi dua lagi rumet aku belom sampai. mlm tu aku terpaling penatlah sampai tidur tak buka lampu pun sampaila pkul 10 mcmtu aku terbangun lepastu aku tengokla katil rumet aku tpi belom jugak dorang sampai lpstu aku nak baring balik sappp mengcangkung nyah atas almari aku . ntah apa ntah dgn hitamnya so aku assume la tu aku punya rumet lagi buang tabiat kan. tido punya tido pap api kena bukak pulakk pastu aku bngun tengok rumet aku sorang  dh sampai so aku tegurla lpstu aku smbg tidur balik. Taktau ntah dlm pkul brpa tu aku rasa mcm katil bawah aku bergerak sikit mcm ada org dah baring. So aku ingatla rumet aku yg lain dh sampai jugak sbb kitorang katil double decker so aku yg atas dia bawah. Tak lama lepastu aku rasa mcm kaki aku kena genggam like jari kaki aku kena genggam sbb aku jenis suka tido kaki terkangkang . Dalam mamainya aku tu aku marahlah dia “kau kenapa siak nak genggam kaki aku” lepastu aku pi la terajang sbb mamai kan mmg kurang didikan agama sikit sikapnya so aku tido lah balik sampai lah paginya aku bangun tengok rumet aku baru ja datang membawa senyuman yg ikhlas di pagi hari yg mulia ini. Aku cam ehh aku cakapla dgn dia bkn dia mlm tdi dh sampai ke . Dia terkejut ckp eh baru ja sampai ni. So aku dlm kebingungan aku pi la cerita dkt dia apa yg terjadi sampaikan aku ingatkan dia dah balik. Dorang memang meremangla masa aku cerita apa yg terjdi tu tapi nasib baikla aku cerita pagi kalau takk mmg sekatil kah dorang tu. Tapi sampai sekarang masih terpikir agak2 bnda tu dendam tak dgn aku sbb aku pi terajang dia😭 tu ja lah min cerita aku', 1, NULL, 2),
('conf-6676c5b9a719f', '2024-06-22 12:38:17', 'CAT-0006', 'Hi... nak cerita sikit haritu penampakan lembaga hitam area tempat tunggu bas dkt cempaka... haritu hari Khamis, me and my friends tgh lepak malam2 dkt jeti, kitorg borak la pasal cerita hantu dkt unimas, ada satu cerita ni dia cerita dkt pulau yg dekat tasik tu, depan lakeview, pulau tu keras mmg dari dulu, sampai area sekeliling dia pun berhantu, kitorang habis lepak dlm pkl 3-4 pagi mcm tu... otw nak ke bus stop tu, perasan la ada someone tgh tunggu dkt bas, kalau dari jauh nampak hitam je, ntah la kalau benda tu nampak i sbb bila i stop bergerak dia berdiri, rasa takut bila dia berdiri tu Ya Allah, terus sejuk badan, dapat rasa degupan jantung, kaku terus... I lari je la terus masuk ke parking K8B cempaka, bila i pusing... benda tu terus hilang', 1, NULL, 1),
('conf-667706f123b66', '2024-06-22 17:16:33', 'CAT-0008', 'PLAYLIST SEASON WEEK STUDY :\r\nSabrina carpenter  \r\n1. Please  Please Please \r\n2. Espresso \r\n\r\nBillie elllish 🔛 🔝\r\n1. Bird of A feather\r\n2.Blue\r\n3.L\'AMOUR De Ma Vie \r\n\r\nNIKI (FAV)\r\n1. BACKBURNER \r\n2. Take A Chance With Me\r\n3.Lowkey\r\n\r\nDJO\r\n1.End the beginning \r\n\r\nSZA\r\n1. SATURN\r\n2.NOBODY GETS ME\r\n3. OPEN ARMS\r\n4. BLIND', 1, NULL, 3),
('conf-6679326da9779', '2024-06-24 08:46:37', 'CAT-0001', 'Saya nak graduate nanti. boleh g mampos semua org', 1, NULL, 2),
('conf-66793557db5f3', '2024-06-24 08:59:03', 'CAT-0001', 'Hi, saya harini nak mengclarify, sy x penah buat confession dkt mana2 ok tu je', 1, NULL, 3),
('conf-6684eb906901c', '2024-07-03 06:11:28', 'CAT-0003', 'kalau dah isi application boleh cancel ke sbb salah pilih baru tahu laaa sakura tak da single room', 1, NULL, 0),
('conf-6684ebdd3078e', '2024-07-03 06:12:45', 'CAT-0004', 'Hiii ada sesiapa jam tangan x? Dia Casio warna putih\r\n', 1, NULL, 0),
('conf-6684ece68f77a', '2024-07-03 06:17:10', 'CAT-0004', 'Hi, ada tak sapa2 nampak laptop saya kat pavi? berwarna hitam acer. tolonggggggggggggggggggggggggggg', 1, NULL, 0),
('conf-6684eee41e706', '2024-07-03 06:25:40', 'CAT-0009', 'Hii I am looking for roomatesss at unijaya. please pm meeee', 1, NULL, 1),
('conf-6684f179b2981', '2024-07-03 06:36:41', 'CAT-0009', 'Hi we are looking for roomates. \r\nThe location is uni square. \r\nIncludes: Fridge, washing machine, dryer, wifi and air conditional. \r\nSingle room RM 300\r\n', 1, NULL, 1),
('conf-6686035118443', '2024-07-04 02:05:05', 'CAT-0001', 'i love sticker', 1, NULL, 0),
('conf-668615f505df1', '2024-07-04 03:24:37', 'CAT-0001', 'hiiiiiiiiiiiiiiiiiiii bodo', 0, NULL, 0);

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
('IMG-668566627bac7', '../images/IMG-668566627bac7.jpg'),
('IMG-6685666eb9c23', '../images/IMG-6685666eb9c23.png'),
('IMG-66856696e89f1', '../images/IMG-66856696e89f1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `profile_pic` varchar(255) NOT NULL DEFAULT '../images/profile-icon-design-free-vector.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `password`, `profile_pic`) VALUES
('6675411188b63', 'ooilchen', 'leechen787@gmail.com', '$2y$10$7wr8qW8HUXCfZucMt9qgGOXe7PnwRLIx/f6eiDvni7//Ltuy5/ecq', '../images/IMG_0591.PNG'),
('6675bf7e246c9', 'ff', 'olc6670@gmail.com', '$2y$10$DUjOPOXPxwS7RZkt6aSFTO7VRaMNBlukSp/PFo9YqPUBVr0Ad7AiO', '../images/profile-icon-design-free-vector.jpg	'),
('6675c09716d15', 'mango', 'wilsonxmango@gmail.com', '$2y$10$mVEyHwp08xXO2npQIcsKV.25nHkWekjK4PMZLkTMUIHvXDTnFPnm6', '../images/profile-icon-design-free-vector.jpg	'),
('667934e650d6c', 'Is', 'Ismail@gmail.com', '$2y$10$BF3iWO.KGN5q2amBRfzvbe5yQ5HK4OdMvhNSKMD8RoCVslRsLdWta', '../images/profile-icon-design-free-vector.jpg	');

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
('6675411188b63', 'conf-6676c42232f6a'),
('6675411188b63', 'conf-6676c4cb6a621'),
('6675411188b63', 'conf-667706f123b66'),
('6675411188b63', 'conf-6679326da9779'),
('6675411188b63', 'conf-66793557db5f3'),
('6675411188b63', 'conf-6684eee41e706'),
('6675411188b63', 'conf-6684f179b2981'),
('6675c09716d15', 'conf-6673ed0c36457'),
('6675c09716d15', 'conf-6673ed7009377'),
('6675c09716d15', 'conf-667436281506f'),
('6675c09716d15', 'conf-667534693ed03'),
('6675c09716d15', 'conf-66754bcbed267'),
('6675c09716d15', 'conf-66754e878ecc3'),
('6675c09716d15', 'conf-66754ec083466'),
('6675c09716d15', 'conf-66754efdadba8'),
('6675c09716d15', 'conf-66754f9c4a376'),
('6675c09716d15', 'conf-66754fd010a61'),
('6675c09716d15', 'conf-66754fe6ed2f0'),
('6675c09716d15', 'conf-6675528909263'),
('6675c09716d15', 'conf-6675d3686d21a'),
('6675c09716d15', 'conf-6675d414be281'),
('6675c09716d15', 'conf-6675d43959efe'),
('6675c09716d15', 'conf-6676c35ef02df'),
('6675c09716d15', 'conf-6676c36b8ab5f'),
('6675c09716d15', 'conf-6676c37b7350e'),
('6675c09716d15', 'conf-6676c388a4622'),
('6675c09716d15', 'conf-6676c39a631ed'),
('6675c09716d15', 'conf-6676c3bb4c140'),
('6675c09716d15', 'conf-6676c3c83065e'),
('6675c09716d15', 'conf-6676c3f28cbb2'),
('6675c09716d15', 'conf-6676c41190f1d'),
('6675c09716d15', 'conf-6676c42232f6a'),
('6675c09716d15', 'conf-6676c43180038'),
('6675c09716d15', 'conf-6676c4552d652'),
('6675c09716d15', 'conf-6676c46b7eeca'),
('6675c09716d15', 'conf-6676c482cf1db'),
('6675c09716d15', 'conf-6676c49a12438'),
('6675c09716d15', 'conf-6676c4c0ef9d3'),
('6675c09716d15', 'conf-6676c4cb6a621'),
('6675c09716d15', 'conf-6676c4fd696b7'),
('6675c09716d15', 'conf-6676c53820f75'),
('6675c09716d15', 'conf-6676c54ab86c9'),
('6675c09716d15', 'conf-6676c55acd47d'),
('6675c09716d15', 'conf-6676c5657c27d'),
('6675c09716d15', 'conf-6676c5a4bd987'),
('6675c09716d15', 'conf-6676c5b9a719f'),
('6675c09716d15', 'conf-667706f123b66'),
('6675c09716d15', 'conf-6679326da9779'),
('6675c09716d15', 'conf-66793557db5f3'),
('667934e650d6c', 'conf-6675528909263'),
('667934e650d6c', 'conf-6675d3686d21a'),
('667934e650d6c', 'conf-6675d414be281'),
('667934e650d6c', 'conf-6675d43959efe'),
('667934e650d6c', 'conf-6676c42232f6a'),
('667934e650d6c', 'conf-6676c43180038'),
('667934e650d6c', 'conf-6676c46b7eeca'),
('667934e650d6c', 'conf-6676c482cf1db'),
('667934e650d6c', 'conf-6676c49a12438'),
('667934e650d6c', 'conf-6676c4c0ef9d3'),
('667934e650d6c', 'conf-6676c4fd696b7'),
('667934e650d6c', 'conf-6676c53820f75'),
('667934e650d6c', 'conf-6676c54ab86c9'),
('667934e650d6c', 'conf-6676c5a4bd987'),
('667934e650d6c', 'conf-667706f123b66'),
('667934e650d6c', 'conf-66793557db5f3');

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
  ADD PRIMARY KEY (`comment_id`);

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
