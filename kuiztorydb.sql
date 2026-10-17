-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2025 at 05:46 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kuiztorydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `AnswerID` varchar(50) NOT NULL,
  `AttemptID` varchar(50) NOT NULL,
  `QuesID` varchar(50) NOT NULL,
  `AnswerContent` varchar(500) NOT NULL,
  `AnswerMark` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`AnswerID`, `AttemptID`, `QuesID`, `AnswerContent`, `AnswerMark`) VALUES
('ANS_0XTdn9NJnL', 'ATMPT_DJbGWZ0EO1', 'QUS_NOxhxXLKYN', 'kesetiaan,hormat kepada ibu bapa,keadilan', 5),
('ANS_2ywBB0AhMZ', 'ATMPT_kX9OkkcD9w', 'QUS_g0skOxiLYe', 'Faktor-faktor yang menyebabkan kejatuhan Dinasti Han di China', 0),
('ANS_3DW1PEqHIE', 'ATMPT_niC1s9mG1X', 'QUS_YljtoKHJbU', 'Lembah Indus,Ganges', 5),
('ANS_5Ob8NdxK7l', 'ATMPT_kX9OkkcD9w', 'QUS_bj9RFw8wco', 'Siddhartha Gautama,Idk', 0),
('ANS_6APwDOvaDJ', 'ATMPT_niC1s9mG1X', 'QUS_jHrouH3wgJ', 'Sistem kasta', 5),
('ANS_7EvqlHPymd', 'ATMPT_kX9OkkcD9w', 'QUS_NOxhxXLKYN', 'kesetiaan ,hormat kepada ibu bapa,keadilan', 0),
('ANS_8vLHqFGIR6', 'ATMPT_kX9OkkcD9w', 'QUS_tmRgtZyRi8', 'False', 5),
('ANS_915tcp9zZv', 'ATMPT_kX9OkkcD9w', 'QUS_7FqZFVrVfQ', 'True', 5),
('ANS_A4RywkggnE', 'ATMPT_niC1s9mG1X', 'QUS_KWCbLzSeM2', 'Siddhartha Gautama', 5),
('ANS_a9qi9VflVl', 'ATMPT_DJbGWZ0EO1', 'QUS_sRZEfiOQrO', 'Ajaran Confucius menekankan nilai-nilai moral dan etika seperti kesetiaan, hormat kepada ibu bapa, keadilan, dan kebijaksanaan. Beliau percaya bahawa keharmonian masyarakat dapat dicapai melalui pendidikan dan pengamalan nilai-nilai murni.', 0),
('ANS_AKFIq5wUHr', 'ATMPT_kX9OkkcD9w', 'QUS_6V6J6rWBaD', 'Penciptaan kertas', 5),
('ANS_AMynUgAIEl', 'ATMPT_DJbGWZ0EO1', 'QUS_jHrouH3wgJ', 'Sistem kasta', 5),
('ANS_BaqvX0DuPe', 'ATMPT_DJbGWZ0EO1', 'QUS_bj9RFw8wco', 'Siddhartha Gautama,Veda', 5),
('ANS_Bb3u7Bx96S', 'ATMPT_niC1s9mG1X', 'QUS_sRZEfiOQrO', 'Ajaran Confucius menekankan nilai-nilai moral dan etika seperti kesetiaan, hormat kepada ibu bapa, keadilan, dan kebijaksanaan. Beliau percaya bahawa keharmonian masyarakat dapat dicapai melalui pendidikan dan pengamalan nilai-nilai murni.', 0),
('ANS_bSczFNfAik', 'ATMPT_DJbGWZ0EO1', 'QUS_OM9Olp2fhZ', 'Tamadun China memberikan sumbangan besar dalam teknologi seperti penciptaan kertas, pencetakan, serbuk letupan, dan kompas. Penemuan ini memberikan impak yang besar kepada perkembangan tamadun dunia.', 0),
('ANS_bVRkqseE4G', 'ATMPT_DJbGWZ0EO1', 'QUS_XyrpDEcGhj', 'True', 5),
('ANS_bX5BgeF4H0', 'ATMPT_niC1s9mG1X', 'QUS_6V6J6rWBaD', 'Pembuatan kapal layar', 0),
('ANS_DsehZdWz4p', 'ATMPT_niC1s9mG1X', 'QUS_BIC7HhCq1E', 'True', 0),
('ANS_E1Eyj9tzqk', 'ATMPT_niC1s9mG1X', 'QUS_OM9Olp2fhZ', 'Tamadun China memberikan sumbangan besar dalam teknologi seperti penciptaan kertas, pencetakan, serbuk letupan, dan kompas. Penemuan ini memberikan impak yang besar kepada perkembangan tamadun dunia.', 0),
('ANS_e3yGGkX6Wz', 'ATMPT_kX9OkkcD9w', 'QUS_8wZkH7oheO', 'kertas,serbuk letupan,kompas', 5),
('ANS_gMzkvYa0Fn', 'ATMPT_kX9OkkcD9w', 'QUS_YWJ2BQwvNp', 'Sumbangan tamadun India dalam bidang matematik', 0),
('ANS_gXe80YPkbw', 'ATMPT_niC1s9mG1X', 'QUS_95HlqVhb7x', 'Sistem kasta dalam tamadun India membahagikan masyarakat kepada beberapa kumpulan seperti Brahmin (paderi), Kshatriya (pemerintah dan tentera), Vaishya (peniaga dan petani), dan Shudra (hamba). Sistem ini menentukan peranan dan status seseorang dalam masyarakat.', 0),
('ANS_HF0f1sIrpq', 'ATMPT_kX9OkkcD9w', 'QUS_YljtoKHJbU', 'Lembah Indus,Ganges', 5),
('ANS_HKMhtr4e17', 'ATMPT_niC1s9mG1X', 'QUS_C1YamnThVr', 'Brahmin,Kshatriya,Vaishya,Shudra', 5),
('ANS_HsAGDHasTE', 'ATMPT_DJbGWZ0EO1', 'QUS_6V6J6rWBaD', 'Penciptaan kertas', 5),
('ANS_hykqTmq9uP', 'ATMPT_DJbGWZ0EO1', 'QUS_YljtoKHJbU', 'Lembah Indus,Ganges', 5),
('ANS_ieU2qCZHDP', 'ATMPT_kX9OkkcD9w', 'QUS_OM9Olp2fhZ', 'Tamadun China mempengaruhi perkembangan', 0),
('ANS_Im9iaAwA80', 'ATMPT_DJbGWZ0EO1', 'QUS_95HlqVhb7x', 'Sistem kasta dalam tamadun India membahagikan masyarakat kepada beberapa kumpulan seperti Brahmin (paderi), Kshatriya (pemerintah dan tentera), Vaishya (peniaga dan petani), dan Shudra (hamba). Sistem ini menentukan peranan dan status seseorang dalam masyarakat.', 0),
('ANS_IUX2uEbidj', 'ATMPT_DJbGWZ0EO1', 'QUS_g0skOxiLYe', 'Kejatuhan Dinasti Han disebabkan oleh faktor dalaman seperti rasuah, pemberontakan petani (contohnya Pemberontakan Serban Kuning), dan kelemahan pentadbiran. Faktor luaran termasuk serangan daripada puak-puak nomad.', 0),
('ANS_jWc27l7wwc', 'ATMPT_DJbGWZ0EO1', 'QUS_C1YamnThVr', 'Brahmin,Kshatriya,Vaishya,Shudra', 5),
('ANS_Kn5kc8weDr', 'ATMPT_niC1s9mG1X', 'QUS_Sv2dGZUh2D', 'Hindu', 5),
('ANS_KR3hP9WHca', 'ATMPT_kX9OkkcD9w', 'QUS_BIC7HhCq1E', 'False', 5),
('ANS_mYAOGraMLw', 'ATMPT_DJbGWZ0EO1', 'QUS_7FqZFVrVfQ', 'True', 5),
('ANS_njCPlw4mBt', 'ATMPT_niC1s9mG1X', 'QUS_g0skOxiLYe', 'Kejatuhan Dinasti Han disebabkan oleh faktor dalaman seperti rasuah, pemberontakan petani (contohnya Pemberontakan Serban Kuning), dan kelemahan pentadbiran. Faktor luaran termasuk serangan daripada puak-puak nomad.', 0),
('ANS_nqXeHiDETi', 'ATMPT_niC1s9mG1X', 'QUS_vRJCibBMzV', 'False', 5),
('ANS_NRNvAoSHdC', 'ATMPT_kX9OkkcD9w', 'QUS_C1YamnThVr', 'Brahmin,Kshatriya,Vaishya,Shudra', 5),
('ANS_nVDqMZwC5x', 'ATMPT_kX9OkkcD9w', 'QUS_tlvVD2Ahqw', 'Confucius', 5),
('ANS_o8xAAxG4Xl', 'ATMPT_DJbGWZ0EO1', 'QUS_tmRgtZyRi8', 'False', 5),
('ANS_O8z950a565', 'ATMPT_DJbGWZ0EO1', 'QUS_8wZkH7oheO', 'kertas,serbuk letupan,kompas', 5),
('ANS_odrgQoh0Vl', 'ATMPT_niC1s9mG1X', 'QUS_NOxhxXLKYN', 'kesetiaan ,hormat kepada ibu bapa,keadilan', 0),
('ANS_oZFkEeTSXL', 'ATMPT_kX9OkkcD9w', 'QUS_95HlqVhb7x', 'Caste system is a system in Indian civilization.', 0),
('ANS_P3v8F6SPnG', 'ATMPT_DJbGWZ0EO1', 'QUS_BIC7HhCq1E', 'False', 5),
('ANS_PpEJoibDYy', 'ATMPT_niC1s9mG1X', 'QUS_tmRgtZyRi8', 'False', 5),
('ANS_PRwfAylz3J', 'ATMPT_niC1s9mG1X', 'QUS_YWJ2BQwvNp', 'Tamadun India menyumbang dalam bidang matematik melalui penciptaan konsep sifar, sistem angka perpuluhan, dan pengembangan algebra. Tokoh seperti Aryabhata dan Brahmagupta memberikan sumbangan besar dalam bidang ini.', 0),
('ANS_rwhQWBGgH1', 'ATMPT_DJbGWZ0EO1', 'QUS_YWJ2BQwvNp', 'Tamadun India menyumbang dalam bidang matematik melalui penciptaan konsep sifar, sistem angka perpuluhan, dan pengembangan algebra. Tokoh seperti Aryabhata dan Brahmagupta memberikan sumbangan besar dalam bidang ini.', 0),
('ANS_SBzIJyssqP', 'ATMPT_DJbGWZ0EO1', 'QUS_Sv2dGZUh2D', 'Hindu', 5),
('ANS_sw7Ywc0GoC', 'ATMPT_niC1s9mG1X', 'QUS_XyrpDEcGhj', 'True', 5),
('ANS_T6ACPrKVIc', 'ATMPT_kX9OkkcD9w', 'QUS_sRZEfiOQrO', 'Ajaran Confucius dalam tamadun China', 0),
('ANS_TfXIZmWkGF', 'ATMPT_niC1s9mG1X', 'QUS_7FqZFVrVfQ', 'True', 5),
('ANS_TTTMlKelpO', 'ATMPT_niC1s9mG1X', 'QUS_8wZkH7oheO', 'kertas,serbuk letupan,kompas', 5),
('ANS_UYYWlbMkBm', 'ATMPT_kX9OkkcD9w', 'QUS_XyrpDEcGhj', 'True', 5),
('ANS_v5Aj1oYP4k', 'ATMPT_niC1s9mG1X', 'QUS_tlvVD2Ahqw', 'Confucius', 5),
('ANS_VAQtZUjlj6', 'ATMPT_kX9OkkcD9w', 'QUS_KWCbLzSeM2', 'Siddhartha Gautama', 5),
('ANS_VJ743bA1rS', 'ATMPT_kX9OkkcD9w', 'QUS_Sv2dGZUh2D', 'Hindu', 5),
('ANS_WrcaYr0Yp0', 'ATMPT_kX9OkkcD9w', 'QUS_vRJCibBMzV', 'False', 5),
('ANS_XPbEUVs38r', 'ATMPT_niC1s9mG1X', 'QUS_bj9RFw8wco', 'Siddhartha Gautama,idk', 0),
('ANS_XwfN1BStWB', 'ATMPT_DJbGWZ0EO1', 'QUS_tlvVD2Ahqw', 'Confucius', 5),
('ANS_z4QSUtaL38', 'ATMPT_kX9OkkcD9w', 'QUS_jHrouH3wgJ', 'Sistem kasta', 5),
('ANS_zo9F886mkD', 'ATMPT_DJbGWZ0EO1', 'QUS_KWCbLzSeM2', 'Siddhartha Gautama', 5),
('ANS_zRmx7iZCNH', 'ATMPT_DJbGWZ0EO1', 'QUS_vRJCibBMzV', 'False', 5);

-- --------------------------------------------------------

--
-- Table structure for table `assessment`
--

CREATE TABLE `assessment` (
  `AssmtCode` varchar(50) NOT NULL,
  `TeacherID` varchar(50) NOT NULL,
  `AssmtName` varchar(250) NOT NULL,
  `AssmtDesc` varchar(500) NOT NULL,
  `AssmtRegDate` date NOT NULL,
  `AssmtGradeLvl` varchar(20) NOT NULL,
  `AssmtChapter` varchar(20) NOT NULL,
  `AssmtTopic` varchar(250) NOT NULL,
  `AssmtDifficulty` varchar(20) NOT NULL,
  `AssmtVisibility` varchar(20) NOT NULL,
  `AssmtTags` varchar(500) DEFAULT NULL,
  `AssmtBgImg` varchar(250) DEFAULT NULL,
  `AssmtOpenStatus` varchar(50) NOT NULL,
  `LikeCount` int(255) NOT NULL,
  `DislikeCount` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assessment`
--

INSERT INTO `assessment` (`AssmtCode`, `TeacherID`, `AssmtName`, `AssmtDesc`, `AssmtRegDate`, `AssmtGradeLvl`, `AssmtChapter`, `AssmtTopic`, `AssmtDifficulty`, `AssmtVisibility`, `AssmtTags`, `AssmtBgImg`, `AssmtOpenStatus`, `LikeCount`, `DislikeCount`) VALUES
('ASSMT_74WA4X7E22', 'TEA_RYDMD4N21L', 'Kuiz Bab 6: Peningkatan Tamadun Yunani dan Rom', 'This topic covers the early civilization of ancient Greece and Rome with Colosseum and Athens.', '2025-02-12', 'Form 1', 'Chapter 6', 'Peningkatan Tamadun Yunani dan Rom', 'Intermediate', 'Public', 'Form 1,Chapter 6,Athens,Colosseum,Yunani,Rom,Tamadun,Civilization,Architecture,Sparta', 'Form1Bab6.jpg', 'Open', 5, 0),
('ASSMT_cjsuMaPmFh', 'TEA_JVkOYIKPzE', 'Kuiz Form 2 Bab 1: Kerajaan Alam Melayu', 'This topic discusses about the Malay world such as its culture, ruling system, economy, social status and much more. Join in to get started on testing your knowledge on Malay world!', '2025-02-18', 'Form 2', 'Chapter 1', 'Kerajaan Alam Melayu', 'Beginner', 'Public', 'Form 2,Chapter 1,Kerajaan Alam Melayu,Gangga Nagara,Kedua Tua,Funan,Champa', 'konsep-alam-melayu.jpg', 'Open', 0, 0),
('ASSMT_DA2G93DK88', 'TEA_RYDMD4N21L', 'Kuiz Bab 5: Tamadun Awal Dunia', 'This topic covers the early human civilization such as Mesopotamia, Mesir, Lembah Indus, and China', '2025-02-10', 'Form 1', 'Chapter 5', 'Tamadun Awal Dunia', 'Beginner', 'Private', NULL, 'default_assmtbg.jpg', 'Closed', 0, 0),
('ASSMT_G862FDT8PT', 'TEA_RYDMD4N21L', 'Kuiz Bab 3: Zaman Prasejarah', 'This topic covers the prehistoric events and ages from stone age to iron age. Also discusses the evolutionary culture and tools', '2025-02-11', 'Form 1', 'Chapter 3', 'Zaman Prasejarah', 'Beginner', 'Public', 'Form1,Chapter3,Prehistory,Prasejarah,Paleolithic,Neolithic,Iron Age', 'prehistoric-pic-bgimg.jpg', 'Open', 0, 0),
('ASSMT_J949U33EGI', 'TEA_RYDMD4N21L', 'Kuiz Bab 4: Mengenali Tamadun', 'This topic covers the introduction to human civilization such as definition, human quotes, types, etc.', '2025-02-12', 'Form 1', 'Chapter 4', 'Mengenali Tamadun', 'Beginner', 'Public', NULL, 'default_assmtbg.jpg', 'Closed', 0, 0),
('ASSMT_QY0BQRX40L', 'TEA_RYDMD4N21L', 'Kuiz Bab 1: Mengenali Sejarah', 'This topic covers the introduction to history such as definition, human quotes, sources, etc.', '2025-02-11', 'Form 1', 'Chapter 1', 'Mengenali Sejarah', 'Beginner', 'Public', NULL, 'default_assmtbg.jpg', 'Closed', 0, 0),
('ASSMT_TK2IR1O0QT', 'TEA_RYDMD4N21L', 'Kuiz Bab 8: Tamadun Islam dan Sumbangan', 'This topic covers the rise of human civilization about Islam and the involved countries like Arab. Also discusses its contribution to modern Islam.', '2025-02-12', 'Form 1', 'Chapter 8', 'Tamadun Islam dan Sumbangan', 'Expert', 'Public', 'Form 1,Chapter 8,Islam,Tamadun,Civilization,Arab,Nabi,Muhammad SAW,Architecture,Religion', 'default_assmtbg.jpg', 'Closed', 1, 0),
('ASSMT_W9M0WPAHHG', 'TEA_RYDMD4N21L', 'Kuiz Bab 2: Zaman Air Batu', 'This topic covers the timeline and events of ice age. Very interesting topic as it also mentions what animals and activities were there', '2025-02-12', 'Form 1', 'Chapter 2', 'Zaman Air Batu', 'Beginner', 'Public', NULL, 'default_assmtbg.jpg', 'Closed', 0, 0),
('ASSMT_ZP8OW6T5WZ', 'TEA_RYDMD4N21L', 'Kuiz Bab 7: Peningkatan Tamadun India dan China', 'This topic covers the civilization of India and China in early days. ', '2025-02-10', 'Form 1', 'Chapter 7', 'Peningkatan Tamadun India dan China', 'Advanced', 'Public', 'Form 1,Chapter 7,Civilization,Tamadun,India,China,Lembah Indus,Hwang Ho,Magadha,Raja Zheng', 'mqdefault.jpg', 'Open', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `attempt`
--

CREATE TABLE `attempt` (
  `AttemptID` varchar(50) NOT NULL,
  `AssmtCode` varchar(50) NOT NULL,
  `StudentID` varchar(50) DEFAULT NULL,
  `TeacherID` varchar(50) DEFAULT NULL,
  `AtmptDate` date NOT NULL,
  `AtmptStatus` varchar(50) NOT NULL,
  `NumCorrect` int(3) NOT NULL,
  `NumIncorrect` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attempt`
--

INSERT INTO `attempt` (`AttemptID`, `AssmtCode`, `StudentID`, `TeacherID`, `AtmptDate`, `AtmptStatus`, `NumCorrect`, `NumIncorrect`) VALUES
('ATMPT_DJbGWZ0EO1', 'ASSMT_ZP8OW6T5WZ', 'STU_ER5IF7TZ0Z', NULL, '2025-02-17', 'Completed', 15, 0),
('ATMPT_kX9OkkcD9w', 'ASSMT_ZP8OW6T5WZ', 'STU_uRpAKmPVzD', NULL, '2025-02-18', 'Completed', 13, 2),
('ATMPT_niC1s9mG1X', 'ASSMT_ZP8OW6T5WZ', 'STU_ZRPLYWBQ7C', NULL, '2025-02-17', 'Completed', 11, 4);

-- --------------------------------------------------------

--
-- Table structure for table `choice`
--

CREATE TABLE `choice` (
  `ChoiceID` varchar(50) NOT NULL,
  `QuesID` varchar(50) NOT NULL,
  `ChoiceContent` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `choice`
--

INSERT INTO `choice` (`ChoiceID`, `QuesID`, `ChoiceContent`) VALUES
('CHO_0EhA2xXfsV', 'QUS_Z8SVO3qoEu', 'Pengenalan sistem barter'),
('CHO_2qImP98Ve9', 'QUS_PeVsgoRvLn', 'Lukisan gua'),
('CHO_3oz7vSpT5h', 'QUS_KgVV4gAF5G', 'Alat tembikar'),
('CHO_4BZUIPXTV5', 'QUS_YrKjn69EMD', 'Sebelum wujudnya tulisan'),
('CHO_52U82V5C00', 'QUS_C2X2NWV79B', 'Monarki mutlak'),
('CHO_5MXRG46K47', 'QUS_C2X2NWV79B', 'Feudalisme'),
('CHO_5S3ASL7SW7', 'QUS_Sv2dGZUh2D', 'Hindu'),
('CHO_6Aad0SJRkA', 'QUS_PeVsgoRvLn', 'Dokumen bertulis'),
('CHO_6ymSEeb68N', 'QUS_YrKjn69EMD', 'Zaman pertengahan'),
('CHO_8GIT89FMI3', 'QUS_2ZR5YS29XX', 'Pythagoras'),
('CHO_91ZV75L0HL', 'QUS_C2X2NWV79B', 'Demokrasi'),
('CHO_9GfogNM9yb', 'QUS_x8YchjZqmc', 'Penggunaan logam'),
('CHO_9U9DQwtEBX', 'QUS_PeVsgoRvLn', 'Bangunan bersejarah'),
('CHO_9Z2cflbAKT', 'QUS_t2BKFmMxpv', 'Odin'),
('CHO_AbfQ0o2EfG', 'QUS_eAoFo3aFR6', 'Majapahit'),
('CHO_bcRjQ041aQ', 'QUS_tlvVD2Ahqw', 'Sun Tzu'),
('CHO_blDN8Ip9nD', 'QUS_tlvVD2Ahqw', 'Mencius'),
('CHO_C7LhDY2NLt', 'QUS_jHrouH3wgJ', 'Sistem demokrasi'),
('CHO_EidtDTE2CM', 'QUS_IAbZiWCXa5', 'Pembinaan piramid'),
('CHO_g5dCK5lGZX', 'QUS_YrKjn69EMD', 'Zaman moden'),
('CHO_geCLuecDD2', 'QUS_Z8SVO3qoEu', 'Penggunaan hukum adat'),
('CHO_gp2Izz1oVm', 'QUS_Sv2dGZUh2D', 'Islam'),
('CHO_H7Q6EOBNEH', 'QUS_2ZR5YS29XX', 'Socrates'),
('CHO_HD4KOhzYO5', 'QUS_tlvVD2Ahqw', 'Confucius'),
('CHO_hNGGlVTEam', 'QUS_jHrouH3wgJ', 'Sistem kasta'),
('CHO_hP1688sONO', 'QUS_KWCbLzSeM2', 'Siddhartha Gautama'),
('CHO_HPRnsbL2lE', 'QUS_KWCbLzSeM2', 'Confucius'),
('CHO_I05xa61Jjg', 'QUS_x8YchjZqmc', 'Pembinaan bandar'),
('CHO_kbQ7cMYnJl', 'QUS_IAbZiWCXa5', 'Penulisan'),
('CHO_kqW9pghuBE', 'QUS_Z8SVO3qoEu', 'Penciptaan undang-undang bertulis'),
('CHO_l3DwYdYQC7', 'QUS_tlvVD2Ahqw', 'Laozi'),
('CHO_LfJMZUYgIT', 'QUS_t2BKFmMxpv', 'Zeus'),
('CHO_mK8yvnBPJK', 'QUS_6V6J6rWBaD', 'Pembuatan kapal layar'),
('CHO_mY8UicRaB3', 'QUS_PeVsgoRvLn', 'Fosil dan artifak'),
('CHO_NzMuoNJodw', 'QUS_6V6J6rWBaD', 'Penciptaan kertas'),
('CHO_O1FSOH3998', 'QUS_C2X2NWV79B', 'Teokrasi'),
('CHO_O1s4hWoKvQ', 'QUS_IAbZiWCXa5', 'Penciptaan roda'),
('CHO_O8sl7ZcTK3', 'QUS_eAoFo3aFR6', 'Melaka'),
('CHO_OMKPzpawxr', 'QUS_6V6J6rWBaD', 'Pembinaan piramid'),
('CHO_otqdia4m2c', 'QUS_t2BKFmMxpv', 'Jupiter'),
('CHO_PdmYlCAi1v', 'QUS_jHrouH3wgJ', 'Sistem republik'),
('CHO_PLeI9GQ638', 'QUS_x8YchjZqmc', 'Pertanian dan penternakan'),
('CHO_Pp5w7uBicU', 'QUS_eAoFo3aFR6', 'Srivijaya'),
('CHO_q0FpDuPSv6', 'QUS_KgVV4gAF5G', 'Alat batu'),
('CHO_qWcuZnjxTa', 'QUS_Sv2dGZUh2D', 'Buddha'),
('CHO_S1oE5I2SOU', 'QUS_jHrouH3wgJ', 'Sistem feudal'),
('CHO_tRJ4tWFRF0', 'QUS_KgVV4gAF5G', 'Alat besi'),
('CHO_tvIcZT7kIT', 'QUS_6V6J6rWBaD', 'Penemuan elektrik'),
('CHO_VSKYRLV2QQ', 'QUS_2ZR5YS29XX', 'Aristotle'),
('CHO_w1O2f93qUW', 'QUS_KWCbLzSeM2', 'Ashoka'),
('CHO_wQD2DMYqdw', 'QUS_eAoFo3aFR6', 'Funan'),
('CHO_WSYRWvOXCW', 'QUS_KWCbLzSeM2', 'Mahavira'),
('CHO_x1RaW8YcVK', 'QUS_YrKjn69EMD', 'Selepas wujudnya tulisan'),
('CHO_XCqe6waWpq', 'QUS_Sv2dGZUh2D', 'Kristian'),
('CHO_xUhv2MaZsB', 'QUS_IAbZiWCXa5', 'Penggunaan logam untuk alat dan senjata'),
('CHO_xzg7zguiN8', 'QUS_t2BKFmMxpv', 'Ra'),
('CHO_YBoHT165mY', 'QUS_x8YchjZqmc', 'Pemburuan dan pengumpulan makanan'),
('CHO_YQOKXVBQ7B', 'QUS_2ZR5YS29XX', 'Plato'),
('CHO_ZhXe5yPDat', 'QUS_Z8SVO3qoEu', 'Penubuhan mahkamah agama'),
('CHO_zupV7Aqn25', 'QUS_KgVV4gAF5G', 'Alat logam');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `ClassID` varchar(50) NOT NULL,
  `TeacherID` varchar(15) NOT NULL,
  `ClassName` varchar(250) NOT NULL,
  `ClassDesc` varchar(500) NOT NULL,
  `ClassStatus` varchar(20) NOT NULL,
  `ClassRegDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`ClassID`, `TeacherID`, `ClassName`, `ClassDesc`, `ClassStatus`, `ClassRegDate`) VALUES
('CLS_E4N3BL9LBE', 'TEA_CwoRViT0SJ', 'Ms Norazman History Class Form 4', 'Welcome abroad to all Form 4 students, where we learn Form 4 History things together.', 'Active', '2025-02-15'),
('CLS_GD5KD7GNBB', 'TEA_RYDMD4N21L', 'Anita Fun Learning Class', 'Welcome to my history class, where we learn Malaysia history altogether with interactive quizzes!', 'Active', '2025-02-12'),
('CLS_HEektiqP7t', 'TEA_JVkOYIKPzE', 'Jane Fun Class', 'For Form 1 to 5 students to join the class!', 'Active', '2025-02-18'),
('CLS_KCA6IGWBSW', 'TEA_RYDMD4N21L', 'Anita\'s Additional Class', 'For those who want to have extra quizzes and sessions, pls join this class for more.', 'Active', '2025-02-14'),
('CLS_SPHVPISZNN', 'TEA_qNhZDlizhX', 'Ms Chung Exciting History Class', 'Selamat datang kepada semua murid yang menyertai kelas ini! Kits bersama-sama belajar sejarah Malaysia.', 'Active', '2025-02-17'),
('CLS_WNMHUS8N48', 'TEA_IDJntwHUjD', 'Mr. Ngeow Interactive Sejarah Kelas', 'Info terkini: Kelas ini tidak aktif lagi, tidak perlu menyertai kelas ini.', 'Inactive', '2025-02-13');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `CommentID` varchar(50) NOT NULL,
  `AssmtCode` varchar(50) NOT NULL,
  `StudentID` varchar(50) DEFAULT NULL,
  `TeacherID` varchar(50) DEFAULT NULL,
  `ComtContent` varchar(500) NOT NULL,
  `ComDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`CommentID`, `AssmtCode`, `StudentID`, `TeacherID`, `ComtContent`, `ComDate`) VALUES
('COMT_Ch4TX3V8IQ', 'ASSMT_ZP8OW6T5WZ', 'STU_ER5IF7TZ0Z', NULL, 'I suka this quiz! Very fun.', '2025-02-17'),
('COMT_gXfx5Nd6g7', 'ASSMT_ZP8OW6T5WZ', 'STU_uRpAKmPVzD', NULL, 'I love this quiz!', '2025-02-18'),
('COMT_jc9gD3uCgj', 'ASSMT_74WA4X7E22', 'STU_ZRPLYWBQ7C', NULL, 'I love this quiz!', '2025-02-12'),
('COMT_Ry4VRjomyB', 'ASSMT_74WA4X7E22', NULL, 'TEA_RYDMD4N21L', 'I love this quiz too!', '2025-02-12');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `StudentID` varchar(50) NOT NULL,
  `ClassID` varchar(50) NOT NULL,
  `EnrollDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`StudentID`, `ClassID`, `EnrollDate`) VALUES
('STU_ZRPLYWBQ7C', 'CLS_KCA6IGWBSW', '2025-02-14'),
('STU_ZRPLYWBQ7C', 'CLS_GD5KD7GNBB', '2025-02-14'),
('STU_N0QTBT1W97', 'CLS_GD5KD7GNBB', '2025-02-15'),
('STU_2SNSDMLWZ1', 'CLS_HEektiqP7t', '2025-02-18');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `QuesID` varchar(50) NOT NULL,
  `AssmtCode` varchar(50) NOT NULL,
  `QueNum` int(3) NOT NULL,
  `QueContent` varchar(500) NOT NULL,
  `QueDesc` varchar(500) DEFAULT NULL,
  `QueType` varchar(50) NOT NULL,
  `QueImg` varchar(250) DEFAULT NULL,
  `QueMark` int(3) NOT NULL,
  `QueAnswer` varchar(500) DEFAULT NULL,
  `QueNumAnsCorr` int(3) NOT NULL,
  `QueNumAnsInCorr` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`QuesID`, `AssmtCode`, `QueNum`, `QueContent`, `QueDesc`, `QueType`, `QueImg`, `QueMark`, `QueAnswer`, `QueNumAnsCorr`, `QueNumAnsInCorr`) VALUES
('QUS_188e0fQrLQ', 'ASSMT_74WA4X7E22', 10, 'Tamadun Rom memperkenalkan undang-undang bertulis yang dikenali sebagai __________.', 'Rome civilization introduced a set of written laws, which is known as ___________.', 'Fill-in-the-blank', 'undangDuaBelas.jpg', 10, 'Undang-Undang Dua Belas', 0, 0),
('QUS_2ZR5YS29XX', 'ASSMT_74WA4X7E22', 6, 'Siapakah tokoh falsafah Yunani yang terkenal dengan idea \"Republik\"?', 'Who is the Greek philosopher that is known for the idea of \"Republic\"?', 'MCQ', 'republicQuestion.jpg', 10, 'Plato', 0, 0),
('QUS_63V92W5D10', 'ASSMT_74WA4X7E22', 2, 'Jelaskan sistem pemerintahan demokrasi di Athens pada zaman tamadun Yunani.', 'What is the democracy system in Athens during the civilization era of Greece? Give in 3-4 sentences.', 'Subjective', NULL, 10, 'Sistem demokrasi', 5, 6),
('QUS_6V6J6rWBaD', 'ASSMT_ZP8OW6T5WZ', 4, 'Apakah sumbangan utama tamadun China dalam bidang teknologi?', 'What is the main contribution of China civilization in the technology field? If you know innovation history well, this should be easy :)', 'MCQ', NULL, 5, 'Penciptaan kertas', 2, 1),
('QUS_7FqZFVrVfQ', 'ASSMT_ZP8OW6T5WZ', 11, 'Tamadun India bermula di Lembah Indus.', 'Indian civilization began in the Indus Valley.', 'True-or-false', 'indusValley.jpg', 5, 'True', 3, 0),
('QUS_8kjjpNC63l', 'ASSMT_G862FDT8PT', 9, 'Penggunaan logam bermula pada Zaman Paleolitik.', 'The use of metals began in the Paleolithic Age.', 'True-or-false', NULL, 6, 'False', 0, 0),
('QUS_8wZkH7oheO', 'ASSMT_ZP8OW6T5WZ', 9, 'Tamadun China memperkenalkan penciptaan __________, __________, dan __________ sebagai sumbangan utama dalam bidang teknologi.', 'Chinese civilization introduced the creation of __________, __________, and __________ as major contributions in the field of technology.', 'Fill-in-the-blank', NULL, 5, 'kertas,serbuk letupan,kompas', 3, 0),
('QUS_95HlqVhb7x', 'ASSMT_ZP8OW6T5WZ', 16, 'Jelaskan sistem kasta dalam tamadun India.', 'Explain the caste system in Indian civilization. Can give in short answer.', 'Subjective', NULL, 5, NULL, 0, 0),
('QUS_aB9SwdcgX5', 'ASSMT_74WA4X7E22', 9, 'Tamadun Rom mengamalkan sistem pemerintahan teokrasi.', 'Rome civilization follow the Theocracy ruling system. True or False?', 'True-or-false', NULL, 10, 'False', 0, 0),
('QUS_auHOAriNY2', 'ASSMT_cjsuMaPmFh', 2, 'Kerajaan Srivijaya terkenal sebagai pusat __________ dan penyebaran agama __________.', 'Fill in two answers', 'Fill-in-the-blank', 'konsep-alam-melayu.jpg', 20, 'perdagangan,Buddha', 0, 0),
('QUS_BIC7HhCq1E', 'ASSMT_ZP8OW6T5WZ', 13, 'Sistem kasta dalam tamadun India membenarkan perpindahan antara kasta.', 'The caste system in Indian civilization allows for movement between castes.', 'True-or-false', NULL, 5, 'False', 2, 1),
('QUS_bj9RFw8wco', 'ASSMT_ZP8OW6T5WZ', 7, 'Agama Buddha diasaskan oleh __________, manakala agama Hindu berpusat pada kitab __________.', 'Buddhism was founded by __________, while Hinduism is centered on the book of __________.', 'Fill-in-the-blank', NULL, 5, 'Siddhartha Gautama,Veda', 1, 2),
('QUS_C1YamnThVr', 'ASSMT_ZP8OW6T5WZ', 8, 'Sistem kasta dalam tamadun India terdiri daripada __________, __________, __________, dan __________.', 'The caste system in Indian civilization consists of __________, __________, __________, and __________.', 'Fill-in-the-blank', 'TTI-Website-Images-64.png', 5, 'Brahmin,Kshatriya,Vaishya,Shudra', 3, 0),
('QUS_C2X2NWV79B', 'ASSMT_74WA4X7E22', 4, 'Apakah ciri utama sistem pemerintahan tamadun Yunani?', 'What is the main characteristic of ruling system of Greece civilization? Choose one answer.', 'MCQ', 'Parthenon_from_west.jpg', 10, 'Demokrasi', 4, 9),
('QUS_eAoFo3aFR6', 'ASSMT_cjsuMaPmFh', 1, 'Apakah kerajaan terawal yang dikenal pasti dalam Alam Melayu?', 'Choose an answer.', 'MCQ', NULL, 20, 'Funan', 0, 0),
('QUS_fdvfFcGokF', 'ASSMT_G862FDT8PT', 7, 'Manusia Zaman Paleolitik hidup secara nomad.', 'Paleolithic people lived a nomadic life.', 'True-or-false', 'paleolithic-pic.jpg', 6, 'True', 0, 0),
('QUS_FLorhPkW9J', 'ASSMT_G862FDT8PT', 8, 'Zaman Neolitik dikenali sebagai Zaman Batu Baru.', 'The Neolithic period is known as the New Stone Age.', 'True-or-false', NULL, 6, 'True', 0, 0),
('QUS_g0skOxiLYe', 'ASSMT_ZP8OW6T5WZ', 19, 'Apakah faktor-faktor yang menyebabkan kejatuhan Dinasti Han di China?', 'What factors caused the fall of the Han Dynasty in China?', 'Subjective', 'Han_dynasty.png', 5, NULL, 0, 0),
('QUS_gqTP65UeIq', 'ASSMT_G862FDT8PT', 6, 'Zaman prasejarah bermula selepas penciptaan tulisan.', 'Prehistory begins after the invention of writing.', 'True-or-false', NULL, 6, 'False', 0, 0),
('QUS_IAbZiWCXa5', 'ASSMT_G862FDT8PT', 4, 'Apakah sumbangan utama Zaman Logam?', 'What were the main contributions of the Iron Age? The answer is obvious.', 'MCQ', NULL, 6, 'Penggunaan logam untuk alat dan senjata', 0, 0),
('QUS_jHrouH3wgJ', 'ASSMT_ZP8OW6T5WZ', 3, 'Apakah sistem sosial yang diamalkan dalam tamadun India?', 'What is the social system that is followed during the India civilization?', 'MCQ', NULL, 5, 'Sistem kasta', 3, 0),
('QUS_JRT4IJQXTE', 'ASSMT_74WA4X7E22', 1, 'Tamadun Yunani bermula di kawasan yang dikenali sebagai __________ pada hari ini, dan sistem pemerintahan demokrasi diamalkan di __________.', 'Greece civilization started at an area called ____________ today, and democratic ruling system is followed at ____________.', 'Fill-in-the-blank', NULL, 10, 'Greece,Athens', 12, 1),
('QUS_KgVV4gAF5G', 'ASSMT_G862FDT8PT', 2, 'Apakah alat utama yang digunakan oleh manusia Zaman Paleolitik?', 'What were the main tools used by Paleolithic humans?', 'MCQ', NULL, 6, 'Alat batu', 0, 0),
('QUS_KWCbLzSeM2', 'ASSMT_ZP8OW6T5WZ', 2, 'Siapakah pengasas agama Buddha?', 'Who is the founder of Buddha religion? Hint: Image', 'MCQ', 'siddharta_gautama.jpg', 5, 'Siddhartha Gautama', 3, 0),
('QUS_mKu4m9UWZ4', 'ASSMT_G862FDT8PT', 15, 'Penemuan __________ membolehkan manusia memasak makanan dan memanaskan badan pada zaman prasejarah.', 'The discovery of __________ allowed humans to cook food and warm themselves in prehistoric times. Hint: We still use it today.', 'Fill-in-the-blank', NULL, 6, 'api', 0, 0),
('QUS_NOxhxXLKYN', 'ASSMT_ZP8OW6T5WZ', 10, 'Ajaran Confucius menekankan nilai-nilai seperti __________, __________, dan __________.', 'Confucius teachings emphasize values ​​such as __________, __________, and __________.', 'Fill-in-the-blank', NULL, 5, 'kesetiaan,hormat kepada ibu bapa,keadilan', 1, 2),
('QUS_NQoPYAnuCR', 'ASSMT_G862FDT8PT', 12, 'Manusia Zaman Paleolitik menggunakan __________ sebagai alat utama untuk memburu dan mengumpul makanan.', 'Paleolithic humans used __________ as the main tool for hunting and gathering food.', 'Fill-in-the-blank', NULL, 6, 'alat batu', 0, 0),
('QUS_OM9Olp2fhZ', 'ASSMT_ZP8OW6T5WZ', 20, 'Bagaimanakah tamadun China mempengaruhi perkembangan teknologi dunia?', 'How did Chinese civilization influence the world technological development?', 'Subjective', 'alchemy-02.jpg', 5, NULL, 0, 0),
('QUS_PeVsgoRvLn', 'ASSMT_G862FDT8PT', 5, 'Apakah bukti arkeologi utama yang digunakan untuk mengkaji zaman prasejarah?', 'What is the main archaeological evidence used to study prehistoric times?', 'MCQ', 'archaeology-pic.jpg', 6, 'Fosil dan artifak', 0, 0),
('QUS_SI1GPZMYPR', 'ASSMT_74WA4X7E22', 3, 'Apakah sumbangan tamadun Yunani dalam bidang sains dan teknologi?', 'What are Greece\'s contributions in the field of science and technology? Give in 3-4 sentences.', 'Subjective', NULL, 10, NULL, 0, 0),
('QUS_sRZEfiOQrO', 'ASSMT_ZP8OW6T5WZ', 18, 'Huraikan ajaran Confucius dalam tamadun China.', 'Describe the teachings of Confucius in Chinese civilization.', 'Subjective', NULL, 5, NULL, 0, 0),
('QUS_Sv2dGZUh2D', 'ASSMT_ZP8OW6T5WZ', 1, 'Apakah agama utama yang berkembang dalam tamadun India?', 'What is the main religion in the India civilization?', 'MCQ', NULL, 5, 'Hindu', 4, 0),
('QUS_t2BKFmMxpv', 'ASSMT_74WA4X7E22', 8, 'Apakah nama dewa utama dalam kepercayaan tamadun Rom?', 'What is the name of deity in the belief of Rome civilization?', 'MCQ', 'Poseidon.png', 10, 'Jupiter', 0, 0),
('QUS_tlvVD2Ahqw', 'ASSMT_ZP8OW6T5WZ', 5, 'Siapakah tokoh falsafah China yang terkenal dengan ajaran moral dan etika?', NULL, 'MCQ', 'confucian-philosopher-mencius.jpg', 5, 'Confucius', 3, 0),
('QUS_tmRgtZyRi8', 'ASSMT_ZP8OW6T5WZ', 12, 'Agama Buddha diasaskan oleh Mahavira.', 'Buddhism was founded by Mahavira.', 'True-or-false', NULL, 5, 'False', 3, 0),
('QUS_uVA7QQ3Q7A', 'ASSMT_G862FDT8PT', 14, 'Zaman Logam dibahagikan kepada Zaman __________, Zaman __________, dan Zaman __________.', 'The Iron Age is divided into the __________ Age, the __________ Age, and the __________ Age.', 'Fill-in-the-blank', '16f7a3a7750c4a3d2de7c8f886e079a36edac051.jpg', 6, 'Tembaga,Gangsa,Besi', 0, 0),
('QUS_vRJCibBMzV', 'ASSMT_ZP8OW6T5WZ', 15, 'Confucius merupakan tokoh falsafah China yang terkenal dengan ajaran ketenteraan.', 'Confucius is a Chinese philosopher famous for his military teachings.', 'True-or-false', 'Confucius-Shanghai-China.png', 5, 'False', 3, 0),
('QUS_x8YchjZqmc', 'ASSMT_G862FDT8PT', 3, 'Apakah ciri utama Zaman Neolitik?', 'What are the main characteristics of the Neolithic Age?', 'MCQ', 'neolithic-age.jpg', 6, 'Pertanian dan penternakan', 0, 0),
('QUS_XuVtmgwYUW', 'ASSMT_G862FDT8PT', 11, 'Zaman prasejarah bermula sebelum wujudnya __________ dan berakhir dengan penciptaan __________.', 'Prehistory begins before the existence of __________ and ends with the creation of __________.', 'Fill-in-the-blank', 'writing-prehistoric.jpg', 6, 'tulisan,tulisan', 0, 0),
('QUS_XyrpDEcGhj', 'ASSMT_ZP8OW6T5WZ', 14, 'Tamadun China memperkenalkan sistem pemerintahan beraja mutlak.', 'Chinese civilization introduced a system of absolute monarchy.', 'True-or-false', 'emperor-manchu-jiaqing.jpg', 5, 'True', 3, 0),
('QUS_YA03L3B6JH', 'ASSMT_74WA4X7E22', 5, 'Tamadun Yunani bermula di kawasan yang dikenali sebagai Greece pada hari ini.', 'Greece civilization started at an area called Greece today.', 'True-or-false', 'GettyImages-510967662-5c4ddd8846e0fb00018dea73.jpg', 10, 'True', 8, 2),
('QUS_YljtoKHJbU', 'ASSMT_ZP8OW6T5WZ', 6, 'Tamadun India bermula di __________ dan berkembang di sekitar Sungai __________.', 'India civilization started at ___________ and developed around the river ___________. Hint: Image', 'Fill-in-the-blank', 'Varanasiganga.jpg', 5, 'Lembah Indus,Ganges', 3, 0),
('QUS_YrKjn69EMD', 'ASSMT_G862FDT8PT', 1, 'Apakah tempoh zaman prasejarah?', 'What is the period of prehistoric times?', 'MCQ', 'prehistoric.jpg', 6, 'Sebelum wujudnya tulisan', 0, 0),
('QUS_YWJ2BQwvNp', 'ASSMT_ZP8OW6T5WZ', 17, 'Apakah sumbangan tamadun India dalam bidang matematik?', 'What is the contribution of Indian civilization in the field of mathematics?', 'Subjective', NULL, 5, NULL, 0, 0),
('QUS_Z8SVO3qoEu', 'ASSMT_74WA4X7E22', 7, 'Apakah sumbangan utama tamadun Rom dalam bidang undang-undang?', 'What is the main contribution of Rome civilization in the law field?', 'MCQ', NULL, 10, 'Penciptaan undang-undang bertulis', 0, 0),
('QUS_zAhK2W3dn4', 'ASSMT_G862FDT8PT', 10, 'Fosil dan artifak merupakan bukti utama untuk mengkaji zaman prasejarah.', 'Fossils and artifacts are the main evidence for studying prehistoric times.', 'True-or-false', NULL, 6, 'True', 0, 0),
('QUS_ZbWefKonku', 'ASSMT_G862FDT8PT', 13, 'Zaman Neolitik dikenali sebagai Zaman __________ dan dicirikan oleh perkembangan __________ dan __________.', 'The Neolithic Age is known as the __________ Age and is characterized by the development of __________ and __________.', 'Fill-in-the-blank', 'neolithic-pic2.jpg', 6, 'Batu Baru,pertanian,penternakan', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `ResultID` varchar(50) NOT NULL,
  `AssmtCode` varchar(50) NOT NULL,
  `AttemptID` varchar(50) NOT NULL,
  `TotalMarks` int(3) NOT NULL,
  `MarkPercent` decimal(4,2) NOT NULL,
  `AvgMark` decimal(4,2) NOT NULL,
  `ResultGrade` varchar(10) NOT NULL,
  `GradeAward` varchar(20) NOT NULL,
  `GradeValue` varchar(2) NOT NULL,
  `PassStatus` varchar(20) NOT NULL,
  `NumQueCorr` int(3) NOT NULL,
  `NumQueIncorr` int(3) NOT NULL,
  `AvgCorrect` decimal(4,2) NOT NULL,
  `AvgIncorrect` decimal(4,2) NOT NULL,
  `PercentCorrect` decimal(4,2) NOT NULL,
  `PercentIncorrect` decimal(4,2) NOT NULL,
  `PercentRatio` varchar(10) NOT NULL,
  `TotalQueAns` int(3) NOT NULL,
  `HighestStreak` int(3) NOT NULL,
  `TeacherFeedback` varchar(500) DEFAULT NULL,
  `ResultDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`ResultID`, `AssmtCode`, `AttemptID`, `TotalMarks`, `MarkPercent`, `AvgMark`, `ResultGrade`, `GradeAward`, `GradeValue`, `PassStatus`, `NumQueCorr`, `NumQueIncorr`, `AvgCorrect`, `AvgIncorrect`, `PercentCorrect`, `PercentIncorrect`, `PercentRatio`, `TotalQueAns`, `HighestStreak`, `TeacherFeedback`, `ResultDate`) VALUES
('RES_EcNW9llEiF', 'ASSMT_ZP8OW6T5WZ', 'ATMPT_kX9OkkcD9w', 65, 65.00, 0.65, 'B+', 'Highest Credit', '3', 'Passed', 13, 2, 0.65, 0.10, 65.00, 10.00, '13:2', 20, 6, 'No feedback given', '2025-02-18'),
('RES_JHbMvAEo3s', 'ASSMT_ZP8OW6T5WZ', 'ATMPT_DJbGWZ0EO1', 75, 75.00, 0.75, 'A-', 'Distinction', '2', 'Passed', 15, 0, 0.75, 0.00, 75.00, 0.00, '75:0', 20, 15, 'No feedback given', '2025-02-17'),
('RES_TfTWIGEMId', 'ASSMT_ZP8OW6T5WZ', 'ATMPT_niC1s9mG1X', 55, 55.00, 0.55, 'C+', 'Upper Credit', '5', 'Passed', 11, 4, 0.55, 0.20, 55.00, 20.00, '11:4', 20, 3, 'No feedback given', '2025-02-17');

-- --------------------------------------------------------

--
-- Table structure for table `statistics`
--

CREATE TABLE `statistics` (
  `StatID` varchar(50) NOT NULL,
  `AssmtCode` varchar(50) NOT NULL,
  `TotalAtmpt` int(3) NOT NULL,
  `AtmptPass` int(3) NOT NULL,
  `AtmptFail` int(3) NOT NULL,
  `PassRate` decimal(4,2) NOT NULL,
  `FailRate` decimal(4,2) NOT NULL,
  `PassStatus` varchar(20) NOT NULL,
  `SumMark` int(5) NOT NULL,
  `MeanMark` decimal(6,2) NOT NULL,
  `MostCorrQue` int(3) NOT NULL,
  `MostInCorrQue` int(3) NOT NULL,
  `HighMark` int(3) NOT NULL,
  `LowMark` int(3) NOT NULL,
  `StatDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `statistics`
--

INSERT INTO `statistics` (`StatID`, `AssmtCode`, `TotalAtmpt`, `AtmptPass`, `AtmptFail`, `PassRate`, `FailRate`, `PassStatus`, `SumMark`, `MeanMark`, `MostCorrQue`, `MostInCorrQue`, `HighMark`, `LowMark`, `StatDate`) VALUES
('STAT_3JBOvvXogJ', 'ASSMT_ZP8OW6T5WZ', 2, 2, 0, 99.99, 0.00, 'Successful', 130, 65.00, 3, 1, 75, 55, '2025-02-17'),
('STAT_8iDiMky2bw', 'ASSMT_ZP8OW6T5WZ', 3, 3, 0, 99.99, 0.00, 'Successful', 195, 65.00, 4, 2, 75, 55, '2025-02-18');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `StudentID` varchar(50) NOT NULL,
  `StudentEmail` varchar(250) NOT NULL,
  `StudentName` varchar(250) NOT NULL,
  `StudentTelNo` varchar(20) NOT NULL,
  `StudentGender` varchar(6) NOT NULL,
  `StudentCountry` varchar(50) NOT NULL,
  `StudentGradeLvl` varchar(20) NOT NULL,
  `StudentSchool` varchar(250) NOT NULL,
  `StudentSPM` varchar(5) NOT NULL,
  `StudentImg` varchar(250) DEFAULT NULL,
  `StudentPSWD` varchar(250) NOT NULL,
  `StudentRegDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`StudentID`, `StudentEmail`, `StudentName`, `StudentTelNo`, `StudentGender`, `StudentCountry`, `StudentGradeLvl`, `StudentSchool`, `StudentSPM`, `StudentImg`, `StudentPSWD`, `StudentRegDate`) VALUES
('STU_2SNSDMLWZ1', 'melinder74@hotmail.com', 'Mohammad Junaidi Shafei', '0196009543', 'Male', 'Malaysia', 'Form 3', 'SMK BANDAR RINCHING ', 'No', 'Mohammad_Junaidi_Shafei.png', 'mohJunsha44$', '2025-02-10'),
('STU_7ES2TJ2IH0', 'daniel.sellan@gmail.com', 'Siaw Ngaw Lai', '0178607417', 'Female', 'Malaysia', 'Form 5', 'SMK KAJANG UTAMA ', 'Yes', 'Siaw_Ngaw_Lai.png', 'SiawNgaw8&3E', '2025-02-10'),
('STU_8d70Bc42YK', 'eautherapady@nagapan.com', 'Jane Baharuddin', '0151090160', 'Female', 'Malaysia', 'Form 4', 'SMK KEPONG', 'No', 'Jane_Baharuddin.png', 'y*h[5lNnNR', '2025-02-17'),
('STU_9HJT89GNJ3', 'zul.feng@syamil.com', 'Nga Ziang Ung', '0154342216', 'Male', 'Malaysia', 'Form 5', 'SMK CHERAS PERDANA', 'Yes', 'Nga_Ziang_Ung.png', 'NgaZia81#56', '2025-02-10'),
('STU_9u14OFvwjr', 'hannah.ma@yiaw.com', 'Muhamed Junaidi Jamal', '0168202613', 'Male', 'Malaysia', 'Form 2', 'SMK TUN PERAK', 'No', 'Muhamed_Junaidi_Jamal.png', 'Q$(Sw^W3_`', '2025-02-17'),
('STU_ER5IF7TZ0Z', 'mongtan29@singh.com', 'Hajjah Nurnazhimah binti Basirin Sahidi', '0164339824', 'Female', 'Malaysia', 'Form 2', 'SM VOKASIONAL GOMBAK', 'No', 'Hajjah_Nurnazhimah.png', 'hajjahPswd7!62', '2025-02-10'),
('STU_H8R6FPCOEH', 'gsutrisno@gmail.com', 'John Sathianathan', '0177897990', 'Male', 'Malaysia', 'Form 4', 'SMK PERIMBUN', 'No', 'John_Sathianathan.png', 'johnSathi716&', '2025-02-10'),
('STU_iR7sUEtWKD', 'surendran.chou@hotmail.com', 'Nandakumar A/L Waythamoorthy Mudukasan', '0191100142', 'Male', 'Malaysia', 'Form 3', 'SMK TASEK PERMAI ', 'No', 'Nandakumar_Mudukasan.png', 'r0G;jn1s.C', '2025-02-17'),
('STU_KrsnOlu7qw', 'mursyidah41@sufian.com', 'Ravichandran Thajudeen', '0127598132', 'Male', 'Malaysia', 'Form 4', 'SMK SELAYANG BHARU ', 'No', '', 'uQ)`.4M04F', '2025-02-17'),
('STU_lD4P9cZsJT', 'lo.martin@shahrazy.com', 'Nor Fathiah Rostan', '0155066742', 'Female', 'Malaysia', 'Form 5', 'SMK BANDAR BARU BANGI', 'Yes', '', 'CJ%z77IGz%', '2025-02-17'),
('STU_N0QTBT1W97', 'saraswati00@hotmail.com', 'Renuga a/l Nandakumar', '0154440933', 'Female', 'Malaysia', 'Form 1', 'SMK DESA SERDANG', 'No', 'Renuga_Nandakumar.png', 'Renugananda76^2', '2025-02-10'),
('STU_N2JDBJV5KB', 'pushpa.perera@shmsul.com', 'Kok Soi Khoo', '0168489908', 'Male', 'Malaysia', 'Form 4', 'SMK AMPANG PECAH ', 'No', '', 'koksoiChoo88#4', '2025-02-10'),
('STU_NN9nS8ksy2', 'retinam.amami@auyong.com', 'Siow Bo Bik', '0140856025', 'Female', 'Malaysia', 'Form 4', 'SMK TUANKU ABDUL RAHMAN', 'No', 'Siow_Bo_Bik.png', 'hAg8Z}#5s~', '2025-02-17'),
('STU_psiPOPx4VW', 'xthaqif@hotmail.com', 'John Kunalan', '01367888106 ', 'Male', 'Malaysia', 'Form 3', 'SMK SUNGAI PUSU', 'No', 'John_Kunalan.png', 'DXFi<Y6\"kj', '2025-02-17'),
('STU_R9u5GA14tg', 'heng.willie@thivy.com', 'Nur Sulaiha Hamjah', '0194421024', 'Female', 'Malaysia', 'Form 5', 'SMK JALAN TIGA ', 'Yes', '', 'em#pNR287^', '2025-02-17'),
('STU_s6Q6gSqRT0', 'czainun@yuan.com', 'Mohammed Budi bin Khairurrazi Dini', '0163385412', 'Male', 'Malaysia', 'Form 4', 'SMK BANDAR BARU SUNGAI LONG', 'No', '', 'A=97$H6ey#', '2025-02-17'),
('STU_uFN4B0c0tF', 'rasiah.gokjiu@aizat.com', 'Kim Ley Ziah', '0154315471', 'Female', 'Malaysia', 'Form 1', 'SMK ENGKU HUSAIN', 'No', 'Kim_Ley_Ziah.png', 'U61ha|K;dU', '2025-02-17'),
('STU_uRpAKmPVzD', 'martin67@yahoo.com', 'Chu Zhang Sum', '0190909676', 'Male', 'Malaysia', 'Form 5', 'SMK BANDAR TASIK PUTERI', 'Yes', 'Chu_Zhang_Sum.png', 'Zhang123!', '2025-02-18'),
('STU_uWtsM3Robt', 'amiruddin17@gmail.com', 'Nanthakumar A/L Vinod', '0170792230', 'Male', 'Malaysia', 'Form 5', 'SMK BANDAR TASIK PUTERI', 'Yes', '', 'Nantha44$5', '2025-02-17'),
('STU_VCNI7UWAUX', 'pria.ampalavanar@yahoo.com', 'Hj Hafis bin Sualman Sam', '0174986238', 'Male', 'Malaysia', 'Form 2', 'SMK KHIR JOHARI', 'No', 'Hj_Hafis.png', 'HJHafis#0910', '2025-02-10'),
('STU_VSLZSMV2RQ', 'janekathi90@gmail.com', 'Jane Kathigasu', '0197261826', 'Female', 'Malaysia', 'Form 3', 'SMK BUKIT INDAH', 'No', 'Jane_Kathigasu.png', 'JaneKathi89*3', '2025-02-10'),
('STU_ZRPLYWBQ7C', 'kiran96@yahoo.com', 'Haji Zikry Mossanif', '0152784657', 'Male', 'Malaysia', 'Form 1', 'SMK PANDAN JAYA ', 'No', 'Haji_Zikry_Mossanif.png', 'hajiZikry9009^^', '2025-02-10');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `TeacherID` varchar(50) NOT NULL,
  `TeacherEmail` varchar(250) NOT NULL,
  `TeacherName` varchar(250) NOT NULL,
  `TeacherTelNo` varchar(20) NOT NULL,
  `TeacherGender` varchar(6) NOT NULL,
  `TeacherCountry` varchar(50) NOT NULL,
  `TeachingLvl` varchar(20) NOT NULL,
  `TeacherSchool` varchar(250) NOT NULL,
  `TeacherRole` varchar(50) NOT NULL,
  `TeacherImg` varchar(250) DEFAULT NULL,
  `TeacherPSWD` varchar(250) NOT NULL,
  `TeacherRegDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`TeacherID`, `TeacherEmail`, `TeacherName`, `TeacherTelNo`, `TeacherGender`, `TeacherCountry`, `TeachingLvl`, `TeacherSchool`, `TeacherRole`, `TeacherImg`, `TeacherPSWD`, `TeacherRegDate`) VALUES
('TEA_186HJXeYVC', 'athi.karathu@gmail.com', 'Janet Ho To Shei', '0145711605', 'Female', 'Malaysia', 'Form 5', 'SMK SRI ISTANA', 'Part time', '', 'm+2y84!H0?', '2025-02-17'),
('TEA_2SBRZ9W9Z2', 'wtea@yahoo.com', 'Jane Sivanesan', '0151512966', 'Female', 'Malaysia', 'Form 1', 'SMK SRI ISTANA', 'Head of subject', 'Jane_Sivanesan.png', 'janeSiva84@33', '2025-02-10'),
('TEA_4SOO0qGO3G', 'ambumamee.shamini@mohinder.com', 'Shafiera binti Che Asmar', '0175968944', 'Female', 'Malaysia', 'Form 3', 'SMK RAJA LUMU', 'Teacher', 'Shafiera_Che_Asmar.png', 'ur1/S8$rJ7', '2025-02-17'),
('TEA_5tZduS75YR', 'gwaiy@yahoo.com', 'Tai Shui Moo', '0146834845', 'Female', 'Malaysia', 'Form 5', 'SMK TELOK GADONG', 'Tutor', '', 'Puq1^5.gFc', '2025-02-17'),
('TEA_7M3YV3FP4V', 'mursyidah41@sufian.com', 'Ravichandran Thajudeen', '0127598132', 'Male', 'Malaysia', 'Form 3', 'SMK BANDAR BANTING', 'Teacher', 'Ravichandran_Thajudeen.png', 'RaviThaj6#55', '2025-02-10'),
('TEA_8KADVDLHTR', 'kunanlan@auyong.com', 'Noor Hjh Ariqah Hamdan', '0123224812', 'Female', 'Malaysia', 'Form 4', 'SAMT SULTAN HISAMUDDIN', 'Head of subject', 'Noor_Hamdan.png', 'NoorHamdan8%65A%', '2025-02-10'),
('TEA_CwoRViT0SJ', 'wayxiao79@yahoo.com', 'Jane Norazman', '0124282975', 'Female', 'Malaysia', 'Form 4', 'SAMT KUALA KUBU BHARU', 'Tutor', 'Jane_Norazman.png', 'UHU50pQP:#', '2025-02-17'),
('TEA_dP7fPbeWF2', 'pathmanaban.sherine@madhavan.com', 'Manogaran A/L Kunjiraman', '0181671805', 'Male', 'Malaysia', 'Form 5', 'SMK TINGGI KAJANG', 'Part time', '', 'V8i6&TK%|$', '2025-02-17'),
('TEA_GD5JC6GNBB', 'hazre.suhaina@yunus.com', 'John Ngeh', '0173381465', 'Male', 'Malaysia', 'Form 2', 'SMK BUKIT SENTOSA 2', 'Teacher', 'John_Ngeh.png', 'JohNngeh37$5', '2025-02-10'),
('TEA_GX72RFGVEH', 'siva.afiq@saffuan.com', 'Ng Zen Xiah', '0154612833', 'Female', 'Malaysia', 'Form 2', 'SMK BATU UNJUR', 'Teacher', 'Ng_Zen_Xiah.png', 'ngZenxiah77%6', '2025-02-10'),
('TEA_IDJntwHUjD', 'kungfan.ashraf@gmail.com', 'Ngeow Xiang Onn', '0154382715', 'Male', 'Malaysia', 'Form 3', 'SMKA MAAHAD HAMIDIAH', 'Teacher', 'Ngeow_Xiang_Onn.png', 'Pk1(wdom3S', '2025-02-17'),
('TEA_JVkOYIKPzE', 'othevandran@hotmail.com', 'Jane Thalalla', '0151880761', 'Female', 'Malaysia', 'Form 2', 'SMK DUSUN NANDING', 'Teacher', 'Jane_Thalalla.png', 'M5M|pLf7:q', '2025-02-17'),
('TEA_KBA5IGWBSW', 'nrasiah@remi.com', 'B. Prema ', '0180387271', 'Male', 'Malaysia', 'Form 5', 'SMK JALAN KEBUN', 'Teacher', 'B_Prema.png', 'BPrema92&8*1', '2025-02-10'),
('TEA_LPcsEQz6m4', 'kiasuen.najmuddin@yeow.com', 'Danny Kuan Lo Pong', '0183038557', 'Male', 'Malaysia', 'Form 4', 'SMK PANDAN INDAH', 'Tutor', 'Danny_Kuan_Lo_Pong.png', 'yMi)mR9T0x', '2025-02-17'),
('TEA_MC7CX66HJL', 'davies.aizuddin@yahoo.com', 'Mohamad Hj Wan Rafiq', '0152288763', 'Male', 'Malaysia', 'Form 5', 'SMK TAMAN EHSAN', 'Tutor', '', 'Mohamadrafiq00^5#', '2025-02-10'),
('TEA_qNhZDlizhX', 'cerfei.manikavasagam@kathigasu.com', 'Chung Ring Lein', '0147358218', 'Female', 'Malaysia', 'Form 1', 'SMK GEDANGSA', 'Teacher', 'Chung_Ring_Lein.png', 'U|1lsxzkX]', '2025-02-17'),
('TEA_RYDMD4N21L', 'melinder94@chandran.com', 'Anita A/P Mahadev Krishnasamy', '0153884779', 'Female', 'Malaysia', 'Form 1', 'SMK DATO HAMZAH', 'Part time', 'Anita_Krishnasamy.png', 'anitaKrish4^6^!', '2025-02-10'),
('TEA_T14ETU073O', 'ramani.sikhao@amran.com', 'Sanisvara Kandasamy a/l Naidu', '0153211903', 'Male', 'Malaysia', 'Form 4', 'SMK TAMAN KERAMAT', 'Tutor', 'Sanisvara_Kandasamy.png', 'SanisKanda61!5!', '2025-02-10'),
('TEA_ZCQ3ZSEKKJ', 'hajar.shree@davies.com', 'Shuba Sivalingam a/l Ravichandran', '0170613067', 'Female', 'Malaysia', 'Form 3', 'SMK LA SALLE', 'Part time', 'Shuba_Sivalingam.png', 'shubaSiva78&2', '2025-02-10'),
('TEA_ZWJ1sU7XXB', 'see.bikhui@leung.com', 'Mohd Nuzul bin Syed Eazriq', '0159623094', 'Male', 'Malaysia', 'Form 2', 'SMK BANDAR DAMAI PERDANA', 'Head of subject', 'Mohd_Nuzul.png', 'vN}U4D:6J^', '2025-02-17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`AnswerID`),
  ADD KEY `AttemptID` (`AttemptID`),
  ADD KEY `QuesID` (`QuesID`);

--
-- Indexes for table `assessment`
--
ALTER TABLE `assessment`
  ADD PRIMARY KEY (`AssmtCode`),
  ADD KEY `TeacherID` (`TeacherID`);

--
-- Indexes for table `attempt`
--
ALTER TABLE `attempt`
  ADD PRIMARY KEY (`AttemptID`),
  ADD KEY `AssmtCode` (`AssmtCode`),
  ADD KEY `StudentID` (`StudentID`),
  ADD KEY `TeacherID` (`TeacherID`);

--
-- Indexes for table `choice`
--
ALTER TABLE `choice`
  ADD PRIMARY KEY (`ChoiceID`),
  ADD KEY `QuesID` (`QuesID`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`ClassID`),
  ADD KEY `TeacherID` (`TeacherID`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`CommentID`),
  ADD KEY `AssmtCode` (`AssmtCode`),
  ADD KEY `StudentID` (`StudentID`),
  ADD KEY `TeacherID` (`TeacherID`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD KEY `StudentID` (`StudentID`),
  ADD KEY `ClassID` (`ClassID`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`QuesID`),
  ADD KEY `AssmtCode` (`AssmtCode`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`ResultID`),
  ADD KEY `AssmtCode` (`AssmtCode`),
  ADD KEY `AttemptID` (`AttemptID`);

--
-- Indexes for table `statistics`
--
ALTER TABLE `statistics`
  ADD PRIMARY KEY (`StatID`),
  ADD KEY `AssmtCode` (`AssmtCode`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`StudentID`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`TeacherID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`AttemptID`) REFERENCES `attempt` (`AttemptID`),
  ADD CONSTRAINT `answer_ibfk_2` FOREIGN KEY (`QuesID`) REFERENCES `question` (`QuesID`);

--
-- Constraints for table `assessment`
--
ALTER TABLE `assessment`
  ADD CONSTRAINT `assessment_ibfk_1` FOREIGN KEY (`TeacherID`) REFERENCES `teacher` (`TeacherID`);

--
-- Constraints for table `attempt`
--
ALTER TABLE `attempt`
  ADD CONSTRAINT `attempt_ibfk_1` FOREIGN KEY (`AssmtCode`) REFERENCES `assessment` (`AssmtCode`),
  ADD CONSTRAINT `attempt_ibfk_2` FOREIGN KEY (`StudentID`) REFERENCES `student` (`StudentID`),
  ADD CONSTRAINT `attempt_ibfk_3` FOREIGN KEY (`TeacherID`) REFERENCES `teacher` (`TeacherID`);

--
-- Constraints for table `choice`
--
ALTER TABLE `choice`
  ADD CONSTRAINT `choice_ibfk_1` FOREIGN KEY (`QuesID`) REFERENCES `question` (`QuesID`);

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_ibfk_1` FOREIGN KEY (`TeacherID`) REFERENCES `teacher` (`TeacherID`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`AssmtCode`) REFERENCES `assessment` (`AssmtCode`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`StudentID`) REFERENCES `student` (`StudentID`),
  ADD CONSTRAINT `comment_ibfk_3` FOREIGN KEY (`TeacherID`) REFERENCES `teacher` (`TeacherID`);

--
-- Constraints for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD CONSTRAINT `enrollment_ibfk_1` FOREIGN KEY (`StudentID`) REFERENCES `student` (`StudentID`),
  ADD CONSTRAINT `enrollment_ibfk_2` FOREIGN KEY (`ClassID`) REFERENCES `class` (`ClassID`);

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`AssmtCode`) REFERENCES `assessment` (`AssmtCode`);

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`AssmtCode`) REFERENCES `assessment` (`AssmtCode`),
  ADD CONSTRAINT `result_ibfk_2` FOREIGN KEY (`AttemptID`) REFERENCES `attempt` (`AttemptID`);

--
-- Constraints for table `statistics`
--
ALTER TABLE `statistics`
  ADD CONSTRAINT `statistics_ibfk_1` FOREIGN KEY (`AssmtCode`) REFERENCES `assessment` (`AssmtCode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
