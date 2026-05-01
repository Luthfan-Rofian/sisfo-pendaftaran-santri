-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2026 at 03:40 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `psb23`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_daftar`
--

CREATE TABLE `tb_daftar` (
  `id_p` int(11) NOT NULL,
  `id_daf` varchar(50) NOT NULL,
  `gl_daf` varchar(200) NOT NULL,
  `lb_daf` varchar(200) NOT NULL,
  `md_daf` varchar(200) NOT NULL,
  `tg_daf` date NOT NULL,
  `bp_berkas` varchar(200) NOT NULL,
  `ak_berkas` varchar(200) NOT NULL,
  `kk_berkas` varchar(200) NOT NULL,
  `sk_berkas` varchar(200) NOT NULL,
  `nm_pdf` varchar(100) NOT NULL,
  `ns_pdf` varchar(10) NOT NULL,
  `nk_pdf` varchar(16) NOT NULL,
  `tl_pdf` varchar(100) NOT NULL,
  `tg_pdf` varchar(2) NOT NULL,
  `bl_pdf` varchar(20) NOT NULL,
  `th_pdf` varchar(4) NOT NULL,
  `jk_pdf` enum('Laki-laki','Perempuan') NOT NULL,
  `sd_pdf` varchar(2) NOT NULL,
  `ak_pdf` varchar(2) NOT NULL,
  `ct_pdf` varchar(30) NOT NULL,
  `hp_pdf` varchar(12) NOT NULL,
  `em_pdf` varchar(100) NOT NULL,
  `hb_pdf` varchar(100) NOT NULL,
  `gol_dar` varchar(50) NOT NULL,
  `rw_py` varchar(100) NOT NULL,
  `provinsi` varchar(200) NOT NULL,
  `kota` varchar(200) NOT NULL,
  `kecamatan` varchar(200) NOT NULL,
  `kelurahan` varchar(200) NOT NULL,
  `sa_sek` varchar(100) NOT NULL,
  `st_sek` varchar(20) NOT NULL,
  `sn_sek` varchar(8) NOT NULL,
  `al_sek` varchar(200) NOT NULL,
  `kb_sek` varchar(30) NOT NULL,
  `nw_sek` varchar(12) NOT NULL,
  `no_ktk` varchar(20) NOT NULL,
  `no_kip` varchar(20) NOT NULL,
  `nm_ayh` varchar(100) NOT NULL,
  `tl_ayh` varchar(100) NOT NULL,
  `tg_ayh` varchar(2) NOT NULL,
  `bl_ayh` varchar(20) NOT NULL,
  `th_ayh` varchar(4) NOT NULL,
  `nk_ayh` varchar(16) NOT NULL,
  `pd_ayh` varchar(20) NOT NULL,
  `pk_ayh` varchar(100) NOT NULL,
  `pg_ayh` varchar(100) NOT NULL,
  `nm_ibu` varchar(100) NOT NULL,
  `tl_ibu` varchar(100) NOT NULL,
  `tg_ibu` varchar(2) NOT NULL,
  `bl_ibu` varchar(20) NOT NULL,
  `th_ibu` varchar(4) NOT NULL,
  `nk_ibu` varchar(16) NOT NULL,
  `pd_ibu` varchar(30) NOT NULL,
  `pk_ibu` varchar(100) NOT NULL,
  `pg_ibu` varchar(100) NOT NULL,
  `hp_ortu` varchar(12) NOT NULL,
  `wa_ortu` varchar(12) NOT NULL,
  `st_pdf` enum('Menunggu','Diterima','Ditolak') NOT NULL,
  `pn_pdf` varchar(100) NOT NULL,
  `ug_pdf` varchar(50) NOT NULL,
  `info_psb` varchar(225) NOT NULL,
  `al_mondok` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_gelombang`
--

CREATE TABLE `tb_gelombang` (
  `id_gelombang` int(11) NOT NULL,
  `st_gelombang` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_gelombang`
--

INSERT INTO `tb_gelombang` (`id_gelombang`, `st_gelombang`) VALUES
(1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lembaga`
--

CREATE TABLE `tb_lembaga` (
  `id_lembaga` int(11) NOT NULL,
  `nm_lembaga` varchar(100) NOT NULL,
  `sk_lembaga` varchar(10) NOT NULL,
  `tk_lembaga` enum('TK','SD','SLTP','SLTA') NOT NULL,
  `n1_lembaga` varchar(100) NOT NULL,
  `k1_lembaga` varchar(16) NOT NULL,
  `n2_lembaga` varchar(100) NOT NULL,
  `k2_lembaga` varchar(16) NOT NULL,
  `gl_lembaga` int(11) NOT NULL,
  `ug_lembaga` varchar(50) NOT NULL,
  `tt_lembaga` text NOT NULL,
  `lg_lembaga` varchar(200) NOT NULL,
  `br_lembaga` varchar(200) NOT NULL,
  `by_lembaga` varchar(200) NOT NULL,
  `spj_lembaga` varchar(200) NOT NULL,
  `spp_lembaga` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_lembaga`
--

INSERT INTO `tb_lembaga` (`id_lembaga`, `nm_lembaga`, `sk_lembaga`, `tk_lembaga`, `n1_lembaga`, `k1_lembaga`, `n2_lembaga`, `k2_lembaga`, `gl_lembaga`, `ug_lembaga`, `tt_lembaga`, `lg_lembaga`, `br_lembaga`, `by_lembaga`, `spj_lembaga`, `spp_lembaga`) VALUES
(2, 'MI Raudhatul Mujawwidin (Mondok)', 'MI', 'SD', 'Siti Nashiroh', '0811 7466 262', 'Saim Baharsah', '0853 6931 6233', 2, '250000', '<p style=\"margin: 0.5em 0px; color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px;\"><br></p>', 'Foto-1777081003.png', 'Foto-1678263407.jpg', 'Foto-1644195741.jpg', 'Paktajpg-1672457276.jpg', ''),
(3, 'MI Raudhatul Mujawwidin (NoMondok)', 'MI', 'SD', 'Siti Nashiroh', '+628117466262', 'Vitri Nur Rohmatin', '0852-6730-8361', 3, '50000', '<p style=\"margin: 0.5em 0px; color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px;\"><br></p>', 'Foto-1777081014.png', 'Foto-1678263427.jpg', 'Foto-1644195759.jpg', 'Paktajpg-1672457829.jpeg', 'Paktapdf-1672457736.pdf'),
(7, 'Madrasah Aliyah Keagamaan', 'MAK', 'SLTA', 'Kiki Fajar Dwi Pebriani, S.Pd.', '0819 9466 2394', 'Anang Abidin, S.Pd.', '0821 6936 6236', 2, '250000', '<p class=\"MsoNormal\"><b>Madrasah Aliyah\r\nKeagamaan (MAK)</b> adalah salah satu program jurusan di Madrasah Aliyah Raudhatul\r\nMujawwidin. Program<span lang=\"IN\"> ini dibuka sejak tahun pembelajaran\r\n2015 sehingga sekarang. Program keagamaan adalah program khusus yang membidangi\r\npara santri PP. Raudhatul Mujawwidin untuk mendalami kitab kuning melalui\r\npendidikan salaf dan modern. Namun tetap memiliki standar kelulusan yang lebih\r\nmaksimal, Program ini di tempuh dalam waktu 4 tahun. Dengan pembelajaran 1\r\ntahun pertama merupakan kelas KP (kelas persiapan), tahun ke-2 kelas X, tahun\r\nke-3 kelas XI dan tahun ke-4 kelas XII.</span></p>\r\n\r\n<p class=\"MsoNormal\"><span lang=\"IN\">Program Keagamaan (MAK) merupakan pendidikan\r\nkhusus untuk menyiapkan peserta didiknya menguasai bidang keagamaan dengan\r\nlebih matang.</span></p><p class=\"MsoNormal\"><span lang=\"IN\"><b>Visi & Misi</b></span></p><p class=\"MsoNormal\"><span lang=\"IN\"><i>Visi</i><o:p></o:p></span></p><p class=\"MsoNormal\"><span lang=\"IN\">â€œ</span>Terwujudnya<span lang=\"IN\"> Madrsah Unggul, Trampil dalam Hidup dan Berakhlakul Karimahâ€</span></p><p class=\"MsoNormal\"><span lang=\"IN\"><i>Misi</i><o:p></o:p></span></p><p class=\"MsoNormal\"><span lang=\"IN\">a.</span><span lang=\"IN\"> </span><span lang=\"IN\">Mewujudkan Madrasah yang unggul dibidang akademik\r\ndan non akademik<o:p></o:p></span></p><p class=\"MsoNormal\"><span lang=\"IN\">b.</span><span lang=\"IN\"> </span><span lang=\"IN\">Meningkatkan kompetensi warga madrasah<o:p></o:p></span></p><p class=\"MsoNormal\"><span lang=\"IN\">c.</span><span lang=\"IN\"> </span><span lang=\"IN\">Meningkatkan pola pikir yang kreatif dan inovatif\r\nserta pula terhadap perkembangan bangsa<o:p></o:p></span></p><p class=\"MsoNormal\"><span lang=\"IN\">d.</span><span lang=\"IN\"> </span><span lang=\"IN\">Mewujudkan life skill warga madrasah<o:p></o:p></span></p><p class=\"MsoNormal\"><span lang=\"IN\">e.</span><span lang=\"IN\"> </span><span lang=\"IN\">Membentuk pribadi yang mandiri dan bertanggung\r\njawab terhadap tugas<o:p></o:p></span></p><p class=\"MsoNormal\"><span lang=\"IN\">\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</span></p><p class=\"MsoNormal\"><span lang=\"IN\">f.</span><span lang=\"IN\"> </span><span lang=\"IN\">Menjadikan agama sebagai pedoman untuk membentuk\r\nakhlakul karimah warga madrasah<o:p></o:p></span></p><p class=\"MsoNormal\"><b><span lang=\"IN\">Sistem Pembelajaran<o:p></o:p></span></b></p><p class=\"MsoNormal\"><span lang=\"IN\">Sistem pembelajaran program ini adalah 4 tahun\r\ndengan spesifikasi 3 tahun pertama adalah setingkat MA dan 1 tahun berikutnya\r\nadalah pendalaman kitab kuning dan pengabdian. Sehingga lulusan dari program\r\nini akan mendapatkan ijazah sama dengan Madrasah Aliyah dengan keilmuan agama\r\nlebih matang.</span></p><p class=\"MsoNormal\"><b><span lang=\"IN\">Standar Mutu Lulusan<o:p></o:p></span></b></p><p class=\"MsoNormal\"><span lang=\"IN\">1.</span><span lang=\"IN\"> </span><span lang=\"IN\">Mampu berbicara aktif dengan tiga bahasa`:\r\nIndonesia, Arab dan Inggris.<o:p></o:p></span></p><p class=\"MsoNormal\"><span lang=\"IN\">2.</span><span lang=\"IN\"> </span><span lang=\"IN\">Memiliki kemampuan dalam membaca kitab kuning\r\nsecara aktif.<o:p></o:p></span></p><p class=\"MsoNormal\"><span lang=\"IN\">3.</span><span lang=\"IN\"> </span><span lang=\"IN\">Mampu memahami teks-teks keagamaan secara baik\r\ndari sumber aslinya.<o:p></o:p></span></p><p class=\"MsoNormal\"><span lang=\"IN\">4.</span><span lang=\"IN\"> </span><span lang=\"IN\">Dapat melanjutkan keperguruan tinggi unggulan,\r\nbaik dalam maupun luar negeri dengan beasiswa.<o:p></o:p></span></p><p class=\"MsoNormal\"><span lang=\"IN\">5.</span><span lang=\"IN\"> </span><span lang=\"IN\">Mampu hafalan al-quran minimal 7 juz.<o:p></o:p></span></p><p class=\"MsoNormal\"><span lang=\"IN\">6.</span><span lang=\"IN\"> </span><span lang=\"IN\">Mampu mengkombinasikan wawasan keagamaan dan\r\nwawancara umum secara komprehensi.</span></p><p class=\"MsoNormal\"><b><span lang=\"IN\">Program Penunjang<o:p></o:p></span></b></p><p class=\"MsoNormal\"><span lang=\"IN\">1.</span><span lang=\"IN\"> </span><span lang=\"IN\">Tahfidz Qurâ€™an<o:p></o:p></span></p><p class=\"MsoNormal\"><span lang=\"IN\">2.</span><span lang=\"IN\"> </span><span lang=\"IN\">Pengembangan bahasa asing (Arab-Inggris)<o:p></o:p></span></p><p class=\"MsoNormal\">\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\"><span lang=\"IN\">3.</span><span lang=\"IN\"> </span><span lang=\"IN\">Seni Religious<o:p></o:p></span></p>', 'Foto-1777081131.png', 'Foto-1777081140.png', 'Foto-1644733167.jpg', 'Paktajpg-1645409358.png', 'Paktapdf-1645409367.pdf'),
(8, 'Madrasah Aliyah Multimedia IPA-IPS', 'MA MM', 'SLTA', 'Anang Abidin, S.Pd.', '0821 6936 6236', 'Kiki Fajar Dwi Pebriani, S.Pd.', '0819 9466 2394', 2, '250000', '<div style=\"border: 0px; font-family: \" times=\"\" new=\"\" roman\";=\"\" font-size:=\"\" 14px;=\"\" margin:=\"\" 0px;=\"\" outline:=\"\" padding:=\"\" vertical-align:=\"\" baseline;=\"\" word-break:=\"\" break-word;=\"\" color:=\"\" rgb(96,=\"\" 96,=\"\" 96);=\"\" line-height:=\"\" 21px;=\"\" text-align:=\"\" justify;=\"\" text-indent:=\"\" 36pt;\"=\"\"><p class=\"MsoNormal\"><b><span lang=\"IN\">Madrasah Aliyah Raudhatul Mujawwidin </span></b><b>Multimedia (MA MM)</b> adalah program <span lang=\"IN\">unggulan\r\nberbasis multimedia. Kelas ini di khususkan bagi santri putra atau putri yang\r\nmengiginkan pengembangan lebih mendalam di bidang Teknologi dan Informasi. Pada\r\nkelas ini setiap santri diwajibkan memiliki laptop yang spesifikasinya\r\nditentukan oleh pihak madrasah. Laptop di beli sendiri oleh santri.<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\"><span lang=\"IN\">Setiap santri belajar dengan mengunakan laptop\r\nsebagai media pembelajaran sehingga santri tidak tidak lagi memerlukan buku\r\nbacaaan yang banyak. Hanya beberapa buku tugas wajib saja. Selain itu melalui\r\nmedia laptop, dengan mudah santri dapat memperoleh berbagai macam informasi dan\r\npengetahuan baik umum maupun yang bersifat keagamaan secara lengkap dari para\r\nguru atau tutor.</span></p>\r\n\r\n<p class=\"MsoNormal\"><o:p>Â </o:p><span style=\"color: inherit; font-size: 1rem;\">Adapun jurusan yang metode pembelajarannya berbasis multimedia yaitu jurusan IPS yang sudah dibuka dari awal berdirinya Madrasah Aliyah Raudhatul Mujawwidin ini, tahun 2004 hingga sekarang. Dan juga jurusan IPA yang dibuka pada tahun 2010.</span></p><p class=\"MsoNormal\"><span lang=\"IN\"><span style=\"font-weight: bolder;\">Visi & Misi</span></span></p><p class=\"MsoNormal\"><span lang=\"IN\"><i>Visi</i><o:p></o:p></span></p><p class=\"MsoNormal\"><span lang=\"IN\">â€œ</span>Terwujudnya<span lang=\"IN\">Â Madrsah Unggul, Trampil dalam Hidup dan Berakhlakul Karimahâ€</span></p><p class=\"MsoNormal\"><span lang=\"IN\"><i>Misi</i><o:p></o:p></span></p><p class=\"MsoNormal\"><span lang=\"IN\">a.</span><span lang=\"IN\">Â </span><span lang=\"IN\">Mewujudkan Madrasah yang unggul dibidang akademik dan non akademik<o:p></o:p></span></p><p class=\"MsoNormal\"><span lang=\"IN\">b.</span><span lang=\"IN\">Â </span><span lang=\"IN\">Meningkatkan kompetensi warga madrasah<o:p></o:p></span></p><p class=\"MsoNormal\"><span lang=\"IN\">c.</span><span lang=\"IN\">Â </span><span lang=\"IN\">Meningkatkan pola pikir yang kreatif dan inovatif serta pula terhadap perkembangan bangsa<o:p></o:p></span></p><p class=\"MsoNormal\"><span lang=\"IN\">d.</span><span lang=\"IN\">Â </span><span lang=\"IN\">Mewujudkan life skill warga madrasah<o:p></o:p></span></p><p class=\"MsoNormal\"><span lang=\"IN\">e.</span><span lang=\"IN\">Â </span><span lang=\"IN\">Membentuk pribadi yang mandiri dan bertanggung jawab terhadap tugas<o:p></o:p></span></p><p class=\"MsoNormal\"><span lang=\"IN\"></span></p><p class=\"MsoNormal\"><span lang=\"IN\">f.</span><span lang=\"IN\">Â </span><span lang=\"IN\">Menjadikan agama sebagai pedoman untuk membentuk akhlakul karimah warga madrasah</span></p>\r\n\r\n<p class=\"MsoNormal\"><b>Kelebihan\r\nPenggunaan TI Dan Multimedia Dalam Pendidikan<o:p></o:p></b></p>\r\n\r\n<p class=\"MsoNormal\">1. Sistem pembelajaran\r\nlebih inovatif dan interaktif<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\">2. Pengajar akan\r\nselalu dituntun untuk kreatif, inovatif dalam mencari terobosan pembelajaran.<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\">3. Mampu menggabungkan\r\nantara teks, gambar, audio, musik, animisi gambar atauÂ  video dalam satu kesatuan yang saling\r\nmendukung guna tercapainya tujuan pembelajaran.<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\">4. Mampu menimbulkan\r\nrasa senang selama kegiatan KBM berlangsung. Hal ini akan menambah motivasi\r\nsiswa selama kegiatan KBM hingga didapatkan tujuan pembelajaran yang maksimal.<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\">5. Mampu\r\nmemvisualisasikan materi yang selama ini dianggap sulit untuk diterangkan hanya\r\nsekedar dengan penjelasan atau alat peraga yang konvensional.<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\">6. Media penyimpanan\r\nyang relative gampang dan fleksibel.</p>\r\n\r\n<p class=\"MsoNormal\"><b>Tujuan<o:p></o:p></b></p>\r\n\r\n<p class=\"MsoNormal\">Tujuan program terpadu\r\nJurusan IPA dan IPS ini adalah menyiapkan siswa yang lurus dalam akidah, benar\r\ndalam syariâ€™ah, dan mulia dalam berakhlak. Menyiapkan siswa memiliki kompetensi\r\nsains dan teknologi. Menyiapkan lulusan untuk melanjutkan ke jenjang Perguruan\r\nTinggi terbaik di tanah air dan luar negeri. Membekali siswa dengan salah satu\r\nprogram Vocatioanal Skill: IT, Tata Busana, Bahasa Inggris, Kitab Kuning dan\r\nTahfidzul Qurâ€™an.<o:p></o:p></p></div>', 'Foto-1777081157.png', 'Foto-1777081164.png', 'Foto-1644733084.jpg', 'Paktajpg-1645409326.png', 'Paktapdf-1645409339.pdf'),
(14, 'Madrasah Mualimin Mualimat', 'M3', 'SLTP', 'Tika Febriani', '082175229665', 'Mega Shoimah', '082343628442', 2, '250000', '', 'Foto-1777081026.png', 'Foto-1777081051.jpg', 'Foto-1645859755.jpg', 'Foto-1645860182.jpg', 'Foto-1645859989.pdf'),
(15, 'SMK Raudhatul Mujawwidin', 'SMK', 'SLTA', 'AHMADI', '0852 6803 0565', 'NURRANTINAH, S.Sn', '0822 8123 1909', 2, '250000', '<p class=\"MsoNormal\"><span style=\"font-size:12.0pt;line-height:115%;font-family:\r\n\" times=\"\" new=\"\" roman\",\"serif\"\"=\"\"><b>SMK Raudhatul Mujawwidin</b><span style=\"color: black; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Â Merupakan sekolah kejuruan yang berdiri pada tahun 2017 dan\r\nberstatus sekolah swasta di bawah naungan Yayasan Raudhatul Mujawwidin SMK\r\nRaudhatul Mujawwidin terletak di jalan Tulang Bawang atau 22 unit, Desa Rimbo\r\nMulyo, Kecamatan Rimbo Bujang, Kabupaten Tebo. <o:p></o:p></span></span></p>\r\n\r\n<p class=\"MsoNormal\"><span style=\"font-size:12.0pt;line-height:115%;font-family:\r\n\" times=\"\" new=\"\" roman\",\"serif\"\"=\"\">Visi dari SMK Raudhatul Mujawwidin yaitu membentuk\r\nSumber Daya Manusia (SDM) yang cerdas, terampil/mandiri, peduli lingkungan dan\r\nberorientasi global berlandaskan iman dan taqwa serta beraqidah Ahlussunnah\r\nWaljamaâ€™ah.<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\"><span style=\"font-size:12.0pt;line-height:115%;font-family:\r\n\" times=\"\" new=\"\" roman\",\"serif\"\"=\"\">Misi dari SMK Raudhatul Mujawwidin adalah menyelenggarakan\r\nproses pendidikan dan pembelajaran yang bermutu melalui tenaga pendidikan yang\r\nberkualitas<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\"><span style=\"font-size:12.0pt;line-height:115%;font-family:\r\n\" times=\"\" new=\"\" roman\",\"serif\"\"=\"\">SMK Raudhatul Mujawwidin didukung dengan dua program\r\nkeahlian, yang pertama Multimedia. Multimedia merupakan kejuruan yang\r\nmempelajari tentang pemograman dasar, fotografi, videografi, desain grafis,\r\nanimasi dan video editing<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\"><span style=\"font-size:12.0pt;line-height:115%;font-family:\r\n\" times=\"\" new=\"\" roman\",\"serif\"\"=\"\">Program keahlian yang kedua adalah Farmasi klinis\r\ndan Komunitas. Merupakan kejuruan yang mempelajari tentang dasar-dasar\r\nkefarmasian, pelayanan farmasi, ilmu resep dan kimia farmasi<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\"><span style=\"font-size:12.0pt;line-height:115%;font-family:\r\n\" times=\"\" new=\"\" roman\",\"serif\"\"=\"\">Menyelenggarakan program pendidikan melalui\r\npengembangan unit usaha dan pemberdayaan ekonomi kreatif melalui pemenuhan\r\nsarana dan prasarana sebagai pendukung kegiatan belajar<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\"><span style=\"font-family:\" times=\"\" new=\"\" roman\",\"serif\"\"=\"\">Menjadikan\r\nlembaga yang mampu bermitra dengan dunia usaha,dunia industri, menghasilkan\r\nprofit serta mampu bersaing dalam era global</span><span style=\"font-size:12.0pt;\r\nline-height:115%;font-family:\" times=\"\" new=\"\" roman\",\"serif\"\"=\"\"><o:p></o:p></span></p>                            ', 'Foto-1777081176.png', 'Foto-1777081187.png', 'Foto-1675841862.png', 'Foto-1675839278.jpg', 'Rincian-1644684505.jpg'),
(16, 'MTs Raudhatul Mujawwidin', 'MTS', 'SLTP', 'Rahmat Ariyanto, S.M', '0812-7815-8398', 'Ika Febrianti, S.Pd', '0822-6924-5418', 2, '250000', '<div><b>Madrasah Tsanawiyah (MTs) Raudhatul Mujawwidin</b> Merupakan salah satu lembaga yang berada di bawah naungan Yayasan Raudhatul MujawwidinÂ  yang berdiri sejak tahun 2002. Mts Romu selalu berkembang dengan meningkatkan mutu dan kualitas pembelajaran yang lebih baik, sehingga dapat mengasilkan santri yang berkulitas yang sudah tersebar di berbagai daerah.</div><div><br></div><div>Visi</div><div><br></div><div>\"Mewujudkan Generasi Beriman, Berilmu Dan Berakhlakul karimah\"</div><div><br></div><div>Misi</div><div><br></div><div>1. Menumbuhkan Keimanan dan Ketaqwan</div><div><br></div><div>2. Meningkatkan Kompetensi tenaga pendidik, keendidikan dan peserta didik di bidang akademik.</div><div><br></div><div>3. Menjadikan agama sebagai pedoman pembentuk akhlakul karimah bagi warga madrasah</div><div><br></div><div>Jurusan/Kelas</div><div><br></div><div>1.. Kelas Unggulan Keagamaan</div><div><br></div><div>2. Kelas Unggulan Bahasa Inggris</div><div><br></div><div>3. Kelas Unggulan Olahraga</div><div><br></div><div>4. Kelas Unggulan Sains</div><div><br></div><div>Sistem Pembelajaran</div><div><br></div><div>Pembelajaran di MTs Raudhatul Mujawwidin di tempuh selama tiga (3) tahun dengan perpaduan kurikulum kementrian dan kurikulum MTs Raudahtul Mujawwidin.</div><div><br></div><div>Standar Kelulusan</div><div>1. Lulus Al-Quran Metode Qiro\'ati</div><div><br></div><div>2. Hafal Al-Quran Juz 30</div><div><br></div><div>3. Menguasai ilmu fikih, ilmu alat, dan ilmu akhlak dasar</div><div><br></div><div>4. Mampu memimpin tahlil, yasin dan menjadi bilal</div><div><br></div><div>5. Lulus dengan nilai semua mata pelajaran di atas KKM</div><div><br></div><div>6. Menguasai Ilmu Komputer (Microsoft Office)</div><div><br></div><div>7. Menguasai Bahasa Inggris dan Bahasa Arab, baik lisan maupun tulisan</div><div><br></div><div>8. Dapat di terima di Sekolah/PondokÂ  Pesantren Favorit</div><div><br></div><div>Program Penunjang</div><div><br></div><div>1.Tahfidz</div><div><br></div><div>2. Kaligrafi</div><div><br></div><div>3. Pramuka</div><div><br></div><div>4. Komputer</div><div><br></div>                            ', 'Foto-1777081085.png', 'Foto-1777081104.png', 'Rincian-1644685733.jpg', 'Foto-1648443711.jpg', 'Foto-1648443535.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_logs`
--

CREATE TABLE `tb_logs` (
  `id_logs` int(11) NOT NULL,
  `nm_logs` varchar(200) NOT NULL,
  `wk_logs` varchar(200) NOT NULL,
  `rl_logs` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_logs`
--

INSERT INTO `tb_logs` (`id_logs`, `nm_logs`, `wk_logs`, `rl_logs`) VALUES
(1398, 'AdminPSB', '2026-04-24', 'Admin'),
(1399, 'AdminPSB', '2026-04-24', 'Admin'),
(1400, '', '2026-04-25', ''),
(1401, 'AdminPSB', '2026-04-25', 'Admin'),
(1402, 'AdminPSB', '2026-04-25', 'Admin'),
(1403, 'AdminPSB', '2026-04-25', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_maintenance`
--

CREATE TABLE `tb_maintenance` (
  `id_main` int(11) NOT NULL,
  `ps_main` text NOT NULL,
  `aw_main` varchar(100) NOT NULL,
  `ak_main` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_maintenance`
--

INSERT INTO `tb_maintenance` (`id_main`, `ps_main`, `aw_main`, `ak_main`) VALUES
(1, 'Maaf Pendaftaran Ditutup. Untuk melakukan pendaftaran, silahkan datang langsung ke Ponpes Raudhatul Mujawwidin di alamat yang tertera di halaman awal situs ini', 'buka', '2024-05-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_notif_depan`
--

CREATE TABLE `tb_notif_depan` (
  `id_nd` int(11) NOT NULL,
  `st_nd` enum('tutup','buka') NOT NULL,
  `jd_nd` varchar(100) NOT NULL,
  `sf_nd` enum('Sangat Penting','Penting','Biasa') NOT NULL,
  `tg_nd` date NOT NULL,
  `ct_nd` text NOT NULL,
  `at_nd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_notif_depan`
--

INSERT INTO `tb_notif_depan` (`id_nd`, `st_nd`, `jd_nd`, `sf_nd`, `tg_nd`, `ct_nd`, `at_nd`) VALUES
(1, 'buka', 'Pengumuman', 'Penting', '2023-02-01', 'Assalamualaikum wr wb.\r\nMohon maaf. Pendaftaran online Ponpes. Raudhatul Mujawwidin telah ditutup. Untuk mendaftar silahkan datang langsung ke alamat yang ada di bagian bawah halaman ini.\r\nWassalamu alaikum wr. wb.', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ppdb`
--

CREATE TABLE `tb_ppdb` (
  `id_pdf` int(11) NOT NULL,
  `lb_pdf` varchar(22) NOT NULL,
  `sk_pdf` varchar(9) NOT NULL,
  `ys_pdf` varchar(37) NOT NULL,
  `th_pdf` varchar(12) NOT NULL,
  `n1_pdf` varchar(100) NOT NULL,
  `k1_pdf` varchar(12) NOT NULL,
  `n2_pdf` varchar(100) NOT NULL,
  `k2_pdf` varchar(12) NOT NULL,
  `fb_pdf` varchar(100) NOT NULL,
  `yt_pdf` varchar(100) NOT NULL,
  `ig_pdf` varchar(100) NOT NULL,
  `wa_pdf` varchar(14) NOT NULL,
  `nr_pdf` varchar(50) NOT NULL,
  `rk_pdf` varchar(100) NOT NULL,
  `ar_pdf` varchar(200) NOT NULL,
  `a1_pdf` varchar(200) NOT NULL,
  `a2_pdf` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ppdb`
--

INSERT INTO `tb_ppdb` (`id_pdf`, `lb_pdf`, `sk_pdf`, `ys_pdf`, `th_pdf`, `n1_pdf`, `k1_pdf`, `n2_pdf`, `k2_pdf`, `fb_pdf`, `yt_pdf`, `ig_pdf`, `wa_pdf`, `nr_pdf`, `rk_pdf`, `ar_pdf`, `a1_pdf`, `a2_pdf`) VALUES
(1, 'PENERIMAAN SANTRI BARU', 'PSB 2023', 'Pondok Pesantren Raudhatul Mujawwidin', '2023/2024', 'Suyono', '082372434107', 'Nur Kholis', '082231501791', 'https://www.facebook.com/kang.mahmud.5095', 'https://www.youtube.com/channel/UCJ7M12OVk8RbOQQrmLXeriQ', 'https://www.instagram.com/_kg_mahmud/', '+6282283050682', 'BANK MANDIRI', '110-00-1402000-2', 'PANITIA PSB RAUDHATUL MUJAWWIDIN', 'Jl. Meranti Ds. Tirta Kencana Kec. Rimbo Bujang Kab. Tebo - Jambi', 'Jl. Tulang Bawang Ds. Rimbo Mulyo Kec. Rimbo Bujang Kab. Tebo - Jambi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pros`
--

CREATE TABLE `tb_pros` (
  `id_pros` int(11) NOT NULL,
  `tg_pros` date NOT NULL,
  `is_pros` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pros`
--

INSERT INTO `tb_pros` (`id_pros`, `tg_pros`, `is_pros`) VALUES
(1, '2022-02-01', '<h5 source=\"\" sans=\"\" pro\",=\"\" -apple-system,=\"\" blinkmacsystemfont,=\"\" \"segoe=\"\" ui\",=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" arial,=\"\" sans-serif,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" ui=\"\" symbol\";=\"\" color:=\"\" rgb(33,=\"\" 37,=\"\" 41);\"=\"\" style=\"font-family: \"><span style=\"font-weight: bolder;\">PENTING !!&nbsp;</span>BACA DAN PAHAMI DULU PROSEDUR PENDAFTARAN</h5><p>Untuk melakukan pendaftaran, silahkan lakukan pembayaran pendaftaran ke</p><h6 source=\"\" sans=\"\" pro\",=\"\" -apple-system,=\"\" blinkmacsystemfont,=\"\" \"segoe=\"\" ui\",=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" arial,=\"\" sans-serif,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" ui=\"\" symbol\";=\"\" color:=\"\" rgb(33,=\"\" 37,=\"\" 41);\"=\"\" style=\"font-family: \"><span style=\"background-color: rgb(239, 239, 239);\"><font color=\"#0000ff\"><span style=\"font-weight: bolder;\">&nbsp; BANK MANDIRI</span>&nbsp;</font><font color=\"#000000\">nomor rekening</font><font color=\"#0000ff\">&nbsp;</font><span style=\"text-align: center;\"><span style=\"font-weight: bolder; color: rgb(115, 24, 66);\">110-00-</span></span></span><b>1402000-2</b><span style=\"background-color: rgb(239, 239, 239);\"><span style=\"text-align: center;\"><span style=\"font-weight: bolder; color: rgb(115, 24, 66);\">&nbsp;</span><font color=\"#000000\">atas nama&nbsp;</font></span><span style=\"font-weight: bolder;\"><font color=\"#311873\">PANITIA PSB RAUDHATUL MUJAWWIDIN&nbsp;&nbsp;</font></span></span></h6><p>Setelah anda melakukan pembayaran silahkan ikuti langkah-langkah berikut :</p><p style=\"margin-left: 25px;\"><span style=\"color: inherit; font-size: 1rem;\">Siapkan berkas-berkas pendaftaran berupa hasil Scan/Foto</span></p><p style=\"margin-left: 25px;\"><span style=\"color: inherit; font-size: 1rem; font-weight: bolder;\">- Bukti Pembayaran Dari Bank/Mesin ATM/File download Mobile Banking</span></p><p style=\"margin-left: 25px;\"><span style=\"color: inherit; font-size: 1rem; font-weight: bolder;\">- Kartu Keluarga (KK)</span></p><p style=\"margin-left: 25px;\"><span style=\"color: inherit; font-size: 1rem; font-weight: bolder;\">- Akta Kelahiran</span></p><p style=\"margin-left: 25px;\"><span style=\"color: inherit; font-size: 1rem; font-weight: bolder;\">- Surat Keterangan Lulus dari sekolah asal/Jika belum ada bisa diganti dengan SURAT KETERANGAN AKTIF&nbsp; &nbsp; &nbsp; &nbsp;</span></p><p style=\"margin-left: 25px;\"><span style=\"color: inherit; font-size: 1rem; font-weight: bolder;\">&nbsp; &nbsp;DARI SEKOLAH ASAL</span></p><p style=\"margin-left: 25px;\"><span style=\"color: inherit; font-size: 1rem; font-weight: bolder;\">- Pakta Integritas/Surat Perjanjian yang bisa didownload di halaman profil lembaga. Diisi dengan data </span></p><p style=\"margin-left: 25px;\"><span style=\"color: inherit; font-size: 1rem; font-weight: bolder;\">&nbsp; diri, bubuhkan materai 10.000 dan ditanda tangani<br></span></p><ol><li>Pada halaman awal silahkan klik&nbsp;<span style=\"font-weight: bolder;\"><font style=\"background-color: rgb(57, 123, 33);\" color=\"#ffffff\">&nbsp;Daftar Sekarang&nbsp;&nbsp;</font></span></li><li><font color=\"#000000\">Anda akan diarahkan ke halaman daftar&nbsp;</font><span style=\"font-weight: bolder; color: rgb(0, 0, 0);\">Unit Lembaga.&nbsp;</span><font color=\"#000000\">silahkan pilih unit lembaga kemudian klik&nbsp;&nbsp;</font><span style=\"font-weight: bolder; background-color: rgb(156, 0, 0);\"><font color=\"#ffffff\">&nbsp;Pelajari&nbsp;</font></span></li><li>Download&nbsp; Pakta Integritas/Surat Perjanjian, kemudian diisi dengan data diri dan tambahkan materai 10.000 dan ditandatangani<span style=\"font-weight: bolder; background-color: rgb(156, 0, 0);\"><font color=\"#ffffff\"><br></font></span></li><li><font color=\"#000000\">Jika anda telah memahami unit lembaga yang anda pilih, pada bagian paling bawah data&nbsp;<span style=\"font-weight: bolder;\">Unit Lembaga&nbsp;</span>silahkan klik&nbsp;<span style=\"background-color: rgb(57, 123, 33);\">&nbsp;</span></font><span style=\"font-weight: bolder; background-color: rgb(57, 123, 33);\"><font color=\"#ffffff\">&nbsp;Daftar Sekarang&nbsp;&nbsp;</font></span></li><li><font color=\"#000000\">Lewati halaman kode keamanan dengan mengisikan hasil operasi matematika di kolom yang tersedia, kemudian klik&nbsp;<span style=\"font-weight: bolder;\">Lanjut</span></font></li><li><font color=\"#000000\">Isi formulir pendaftaran dengan lengkap dan sesuai data yang sebenarnya</font></li><li><font color=\"#000000\">Periksa kembali hasil isian anda. Jika telah yakin benar silahkan klik&nbsp;&nbsp;</font><font color=\"#000000\"><span style=\"background-color: rgb(57, 123, 33);\">&nbsp;</span></font><span style=\"font-weight: bolder; background-color: rgb(57, 123, 33);\"><font color=\"#ffffff\">&nbsp;Daftar Sekarang&nbsp;&nbsp;</font></span></li><li><font color=\"#000000\">Setelah selesai, silahkan hubungi kontak person untuk konfirmasi pendaftaran atau tunggu maksimal 3 hari kerja untuk mengkonfirmasi pendaftaran</font></li><li><font color=\"#000000\">Pendaftaran berhasil dan tunggu informasi selanjutnya yang akan diinformasikan melalui WhatsApp atau SMS</font></li></ol><p><font color=\"#000000\">Anda juga dapat melakukan pendaftaran langsung ke sekretariat pendaftaran di alamat yang tertera di halaman awal.</font></p><p><font color=\"#000000\"><br></font></p><p><font color=\"#000000\">Salam Hormat</font></p><p><font color=\"#000000\">Panitia Penerimaan Santri Baru</font></p><p><font color=\"#000000\">Pondok Pesantren Raudhatul Mujawwidin</font></p>');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nm_siswa` varchar(100) NOT NULL,
  `ns_siswa` varchar(100) NOT NULL,
  `ni_siswa` varchar(100) NOT NULL,
  `tl_siswa` varchar(100) NOT NULL,
  `tg_siswa` varchar(100) NOT NULL,
  `an_siswa` varchar(100) NOT NULL,
  `st_siswa` varchar(100) NOT NULL,
  `jk_siswa` varchar(100) NOT NULL,
  `as_siswa` varchar(100) NOT NULL,
  `td_siswa` varchar(100) NOT NULL,
  `nm_rombel` varchar(100) NOT NULL,
  `ay_siswa` varchar(100) NOT NULL,
  `ak_siswa` varchar(100) NOT NULL,
  `ad_siswa` varchar(100) NOT NULL,
  `at_siswa` varchar(100) NOT NULL,
  `bu_siswa` varchar(100) NOT NULL,
  `bk_siswa` varchar(100) NOT NULL,
  `bd_siswa` varchar(100) NOT NULL,
  `bt_siswa` varchar(100) NOT NULL,
  `al_siswa` text NOT NULL,
  `ft_siswa` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `nm_siswa`, `ns_siswa`, `ni_siswa`, `tl_siswa`, `tg_siswa`, `an_siswa`, `st_siswa`, `jk_siswa`, `as_siswa`, `td_siswa`, `nm_rombel`, `ay_siswa`, `ak_siswa`, `ad_siswa`, `at_siswa`, `bu_siswa`, `bk_siswa`, `bd_siswa`, `bt_siswa`, `al_siswa`, `ft_siswa`) VALUES
(110, 'Kang Mahmud', '0011223344', '0123', '', '', '', '', 'Laki-laki', '', '', 'Ditolak', '', '', '', '', '', '', '', '', '', 'Foto-1631337975.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tahun`
--

CREATE TABLE `tb_tahun` (
  `id_tahun` int(11) NOT NULL,
  `nm_tahun` varchar(100) NOT NULL,
  `sm_tahun` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tahun`
--

INSERT INTO `tb_tahun` (`id_tahun`, `nm_tahun`, `sm_tahun`) VALUES
(1, '2021/2022', 'Ganjil');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tbladm`
--

CREATE TABLE `tb_tbladm` (
  `id` int(11) NOT NULL,
  `st` enum('buka','tutup') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tbladm`
--

INSERT INTO `tb_tbladm` (`id`, `st`) VALUES
(2, 'buka');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nm_user` varchar(100) NOT NULL,
  `lb_user` varchar(100) NOT NULL,
  `us_user` varchar(50) NOT NULL,
  `ps_user` varchar(225) NOT NULL,
  `ft_user` varchar(200) NOT NULL,
  `rl_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nm_user`, `lb_user`, `us_user`, `ps_user`, `ft_user`, `rl_user`) VALUES
(12, 'AdminPSB', 'Yayasan', '12345678', '7c222fb2927d828af22f592134e8932480637c0d', 'Foto-1777080974.png', 'Admin'),
(35, 'PUTUT HIWANTORO', 'SMK Raudhatul Mujawwidin', '777777', 'fba9f1c9ae2a8afe7815c9cdd492512622a66302', 'Foto-1673407598.png', 'Panitia'),
(36, 'MEGA SOIMAH', 'Madrasah Mualimin Mualimat', '666666', '1411678a0b9e25ee2f7c8b2f7ac92b6a74b3f9c5', 'Foto-1673407625.png', 'Panitia'),
(37, 'KIKI FAJAR DWI PEBRIANI', 'Madrasah Aliyah Keagamaan', '555555', 'b7c40b9c66bc88d38a59e554c639d743e77f1b65', 'Foto-1673407660.png', 'Panitia'),
(38, 'ANANG ABIDIN', 'Madrasah Aliyah Multimedia IPA-IPS', '444444', '42cfe854913594fe572cb9712a188e829830291f', 'Foto-1673407682.png', 'Panitia'),
(39, 'IKA FEBRIANTI', 'MTs Raudhatul Mujawwidin', '333333', '77bce9fb18f977ea576bbcd143b2b521073f0cd6', 'Foto-1689133249.jpg', 'Panitia'),
(40, 'SAIM BAHARASAH', 'MI Raudhatul Mujawwidin (NoMondok)', '222222', '273a0c7bd3c679ba9a6f5d99078e36e85d02b952', 'Foto-1673407756.png', 'Panitia'),
(41, 'AGUNG ROHMANTO', 'MI Raudhatul Mujawwidin (Mondok)', '111111', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', 'Foto-1673407784.png', 'Panitia'),
(42, 'LAA NUR KHOLIS', 'MTs Raudhatul Mujawwidin', '565656', '35b45f92aca8998f97ec5119a8f1844ff27b0410', 'Foto-1677774940.png', 'Admin'),
(43, 'SUYONO', 'Madrasah Mualimin Mualimat', '434343', 'c45d0b95bb64375a227f27b8ba7430bd8a1b5ffc', 'Foto-1677774990.png', 'Admin'),
(44, 'TIKA FEBRIANI', 'Madrasah Mualimin Mualimat', '675675', '43ce5868b551c0645d7edf82112b55f480a67fe3', 'Foto-1677775070.png', 'Panitia'),
(45, 'SAHRI AGUNG', 'MI Raudhatul Mujawwidin (Mondok)', '545467', 'e1c0fb0532576c06387aa1a8dcf573925027743c', 'Foto-1677775150.png', 'Panitia'),
(46, 'AHMADI', 'SMK Raudhatul Mujawwidin', '789789', '1a2bf0adea0f4b41ed9f7a02d31fa535d5743f3e', 'Foto-1677775193.png', 'Panitia'),
(47, 'KASFUL GHUMMAH', 'MTs Raudhatul Mujawwidin', '121567', 'f8b31fbffd35b87a04b49b63da9f097d46ff2a10', 'Foto-1677775222.png', 'Admin'),
(48, 'AHMAD QOMAR', 'MI Raudhatul Mujawwidin (NoMondok)', '789098', '8d8b265569a60ba41a4b4ce0cb5050134255ac3f', 'Foto-1677775267.png', 'Panitia'),
(49, 'PRATYA BAYU PAMUNGKAS', 'Madrasah Aliyah Multimedia IPA-IPS', '777876', '906e6704425d7be8aceef8f702cc9045b1f11e65', 'Foto-1677775318.png', 'Panitia'),
(50, 'M. FAIDLURROHMAN', 'Yayasan', '345321', '33ab1718b6f9d45271433e62a776b78f3d0f4052', 'Foto-1677775355.png', 'Admin'),
(51, 'MAHMUD', 'Madrasah Aliyah Multimedia IPA-IPS', '201296', 'ee034d1fc9a31df0dffba4d0a7f3026cb77c1eb7', 'Foto-1677775408.png', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_yayasan`
--

CREATE TABLE `tb_yayasan` (
  `id_yayasan` int(11) NOT NULL,
  `nm_yayasan` varchar(100) NOT NULL,
  `sk_yayasan` varchar(100) NOT NULL,
  `al_yayasan` text NOT NULL,
  `kb_yayasan` varchar(50) NOT NULL,
  `pr_yayasan` varchar(50) NOT NULL,
  `kp_yayasan` varchar(100) NOT NULL,
  `lg_yayasan` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_yayasan`
--

INSERT INTO `tb_yayasan` (`id_yayasan`, `nm_yayasan`, `sk_yayasan`, `al_yayasan`, `kb_yayasan`, `pr_yayasan`, `kp_yayasan`, `lg_yayasan`) VALUES
(1, 'Raudhatul Mujawwidin', 'ROMU', 'Jl. Meranti Ds. Tirta Kencana', 'Tebo', 'Jambi', 'KH. M. Ansor Wijaya', 'Logo-1777080988.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_daftar`
--
ALTER TABLE `tb_daftar`
  ADD PRIMARY KEY (`id_p`);

--
-- Indexes for table `tb_gelombang`
--
ALTER TABLE `tb_gelombang`
  ADD PRIMARY KEY (`id_gelombang`);

--
-- Indexes for table `tb_lembaga`
--
ALTER TABLE `tb_lembaga`
  ADD PRIMARY KEY (`id_lembaga`);

--
-- Indexes for table `tb_logs`
--
ALTER TABLE `tb_logs`
  ADD PRIMARY KEY (`id_logs`);

--
-- Indexes for table `tb_maintenance`
--
ALTER TABLE `tb_maintenance`
  ADD PRIMARY KEY (`id_main`);

--
-- Indexes for table `tb_notif_depan`
--
ALTER TABLE `tb_notif_depan`
  ADD PRIMARY KEY (`id_nd`);

--
-- Indexes for table `tb_ppdb`
--
ALTER TABLE `tb_ppdb`
  ADD PRIMARY KEY (`id_pdf`);

--
-- Indexes for table `tb_pros`
--
ALTER TABLE `tb_pros`
  ADD PRIMARY KEY (`id_pros`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD UNIQUE KEY `ns_siswa` (`ns_siswa`),
  ADD UNIQUE KEY `ni_siswa` (`ni_siswa`),
  ADD KEY `kl_siswa` (`nm_rombel`),
  ADD KEY `nm_siswa` (`nm_siswa`);

--
-- Indexes for table `tb_tahun`
--
ALTER TABLE `tb_tahun`
  ADD PRIMARY KEY (`id_tahun`);

--
-- Indexes for table `tb_tbladm`
--
ALTER TABLE `tb_tbladm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `us_user` (`us_user`),
  ADD KEY `nm_user` (`nm_user`);

--
-- Indexes for table `tb_yayasan`
--
ALTER TABLE `tb_yayasan`
  ADD PRIMARY KEY (`id_yayasan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_daftar`
--
ALTER TABLE `tb_daftar`
  MODIFY `id_p` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_gelombang`
--
ALTER TABLE `tb_gelombang`
  MODIFY `id_gelombang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_lembaga`
--
ALTER TABLE `tb_lembaga`
  MODIFY `id_lembaga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_logs`
--
ALTER TABLE `tb_logs`
  MODIFY `id_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1404;

--
-- AUTO_INCREMENT for table `tb_maintenance`
--
ALTER TABLE `tb_maintenance`
  MODIFY `id_main` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_notif_depan`
--
ALTER TABLE `tb_notif_depan`
  MODIFY `id_nd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_ppdb`
--
ALTER TABLE `tb_ppdb`
  MODIFY `id_pdf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_pros`
--
ALTER TABLE `tb_pros`
  MODIFY `id_pros` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `tb_tahun`
--
ALTER TABLE `tb_tahun`
  MODIFY `id_tahun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_tbladm`
--
ALTER TABLE `tb_tbladm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tb_yayasan`
--
ALTER TABLE `tb_yayasan`
  MODIFY `id_yayasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
