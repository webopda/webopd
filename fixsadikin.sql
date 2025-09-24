-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2025 at 05:57 AM
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
-- Database: `fixsadikin`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `keterangan` text DEFAULT NULL,
  `judul` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `tgl_publish` date NOT NULL,
  `author` bigint(20) UNSIGNED NOT NULL,
  `dilihat` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `keterangan`, `judul`, `img`, `tgl_publish`, `author`, `dilihat`, `created_at`, `updated_at`) VALUES
(5, '<p>Kominfo Kota Pariaman - Sebagai tindak lanjut pertemuan Wako Pariaman Yota Balad dengan Menteri Kesehatan Budi Gunadi Sadikin, terkait usulan Kebutuhan Kelanjutan Pembangunan Fisik Rumah Sakit Umum Daerah (RSUD) dr. Sadikin dan Perbaikan layanan Kesehatan lainnya di Kota Pariaman, Wako Yota Balad lakukan pengecekan pelayanan kesehatan bagi masyarakat di RS. Sadikin Kota Pariaman, Sabtu (9/8/2025) malam.</p><p>Hal tersebut dilakukannya guna&nbsp;memastikan pelayanan kesehatan bagi pasien dan masyarakat yang berobat tetap berjalan lancar meskipun ada beberapa kendala keterbatasan sarana dan prasarana.</p><p>Yota Balad mengatakan Pemko Pariaman terus berupaya meningkatkan fasilitas kesehatan serta sarana dan prasarana dan petugas medis.</p><p>Di akhir bulan lalu, ia telah menemui orang nomor satu di Kemenkes RI, bersama Kepala Dinas Kesehatan Kota Pariaman, Nazifah dan Direktur RSUD dr. Sadikin Kota Pariaman, dr. Anung Respati, guna memberikan proposal usulan kebutuhan kelanjutan pembangunan fisik RSUD dr. Sadikin Kota Pariaman, dan peningkatan layanan kesehatan lainnya di Kota Pariaman.</p><p>Kepada petugas dan dokter yang berada di RSUD. Sadikin, Yota Balad tegaskan tetap lakukan pelayanan prima bagi pasien dan masyarakat, karena tugas dari pelayan medis adalah melayani.</p><p>Sedangkan untuk urusan sarana prasarana kita telah sampaikan ke kementerian kesehatan pemenuhan pra sarana alat-alat kesehatannya, karena saat ini, RSUD dr. Sadikin telah ada penambahan gedung baru dan beberapa tenaga dokter dan dokter Spesialis baru.</p><p>\" Karena kita berkomitmen untuk memberikan pelayanan yang prima dalam melayani masyarakat Kota Pariaman, tidak terkecuali di bidang layanan Kesehatan. Dengan adanya kelanjutan pembangunan RSUD dan perbaikan beberapa Puskesmas dan Puskesmas Pembantu, kami yakin dapat semakin memberikan pelayanan yang lebih maksimal kepada masyarakat Kota Pariaman dan sekitarnya,\" ungkapnya.(fadli)</p>', 'Wako Pariaman Sidak Sarana Prasarana Layanan Umum Di RSUD. Sadikin Kota Pariaman', '1758007866.png', '2025-08-09', 2, 4, '2025-09-16 07:31:06', '2025-09-16 07:31:06'),
(6, '<p><strong>Kominfo Kota Pariaman</strong> --- Bertemu Menteri Kesehatan Budi Gunadi Sadikin, Wali Kota Pariaman Yota Balad sampaikan usulan Kebutuhan Kelanjutan Pembangunan Fisik Rumah Sakit Umum Daerah (RSUD) dr. Sadikin dan Perbaikan layanan Kesehatan lainya di Kota Pariaman. Bertempat di Kantor Kementerian Kesehatan Republik Indonesia (Kemenkes), yang berlokasi di Jl. H.R. Rasuna Said Blok X.5, Kav. 4-9, Kuningan, Jakarta Selatan, Provinsi DKI Jakarta, Kamis (30/7/2025).</p><p>Bertemu dengan orang nomor satu di Kemenkes RI, Wako Pariaman didampingi oleh Ketua TP PKK Kota Pariaman, Ny. dr. Yosneli Balad, Kepala Dinas Kesehatan Kota Pariaman, Nazifah dan Direktur RSUD dr. Sadikin Kota Pariaman, dr. Anung Respati.</p><p>“Alhamdulillah, Hari ini kami dari pemerintah Kota Pariaman bertemu dengan Pak Menteri Kesehatan dalam rangka memberikan proposal usulan kebutuhan kelanjutan pembangunan fisik RSUD dr. Sadikin Kota Pariaman, dan peningkatan layanan kesehatan lainya di Kota Pariaman,” ujar Yota Balad.</p><p>Melalui pertemuan ini, dirinya bermohon kepada Pak Menteri, agar kelanjutan pembangunan RSUD dr. Sadikin dapat diteruskan, serta pemenuhan pra sarana alat-alat kesehatannya, karena saat ini, RSUD dr. Sadikin telah ada penambahan gedung baru dan beberapa tenaga dokter dan dokter Spesialis baru, ungkapnya.</p><p>“Kemudian dari Dinas Kesehatan, menyampaikan usulan Relokasi Puskesmas Padusunan, Penambahan ruangan di Puskesmas Air Santok dan Puskesmas Naras, Penambahan Puskesmas Pembantu Pondok II dan Rambai serta Renovasi Puskesmas Pembantu yang mengalami rusak berat di Desa Tungkal Selatan, Desa Cubadak Air Utara dan Desa Marabau,” jelas mantan Sekda Kota Pariaman ini.</p><p>Yota Balad berharap, permintaan ditengah defisit negara ini, dapat dipenuhi oleh pemerintah pusat, apalagi dirinya bersama Wawako Mulyadi, memang berkomitmen dalam meningkatkan kualitas layanan kesehatan bagi masyarakat di Kota Pariaman, tuturnya.</p><p>“Kami, Yota Balad-Mulyadi berkomitmen untuk memberikan pelayanan yang prima dalam melayani masyarakat Kota Pariaman, tidak terkecuali di bidang layanan Kesehatan. Dengan adanya kelanjutan pembangunan RSUD dan perbaikan beberapa Puskesmas dan Puskesmas Pembantu, kami yakin dapat semakin memberikan pelayanan yang lebih maksimal kepada masyarakat Kota Pariaman dan sekitarnya,” tutupnya.</p><p>Sementara itu, Kepala Dinas Kesehatan Kota Pariaman Nazifah menyebutkan, bahwa selama ini pihaknya telah memberikan pelayanan Kesehatan kepada masyarakat Kota Pariaman dan sekitarnya yang berobat di RSUD dr. Sadikin, serta telah berkontribusi dalam rangka memberikan Pendapatan Asli Daerah (PAD) untuk Kota Pariaman.</p><p>“Untuk Realisasi PAD dari RSUD dr. Sadikin Kota Pariaman Pada Tahun 2024 kemaren, kita memperoleh PAD hampir mencapai Rp. 7,5 miliar rupiah, dan bertambahnya jumlah pasien yang berobat,” ucapnya.</p><p>Lebih lanjut Nazifah menyebutkan, dengan kelanjutan pembangunan RSUD dr. Sadikin dan pemenuhan alat kesehatannya, diharapkan dapat meningkatkan pelayanan kepada masyarakat, serta meningkatkan PAD Kota Pariaman kedepanya, ungkapnya mengakhiri.</p>', 'Bertemu Menteri Kesehatan, Wali Kota Pariaman Yota Balad sampaikan usulan Pembangunan Fisik RSUD dr. Sadikin dan Perbaikan layanan Kesehatan lainya di Kota Pariaman', '1758008004.png', '2025-07-30', 2, NULL, '2025-09-16 07:33:24', '2025-09-16 07:33:24'),
(7, '<p>Di artikel sebelumnya, kita telah mempelajari pengertian, struktur, tujuan, unsur, dan kaidah kebahasaan yang digunakan dalam teks berita. Teks ini bisa kamu temukan di media cetak, media online, sampai media sosial, lho. Nah, seperti apa sih bentuk dari teks berita itu? Apakah hanya membicarakan hal-hal serius seperti politik dan ekonomi? Hmm, tentu tidak ya!&nbsp;</p><p><strong>Teks berita adalah teks memuat berbagai informasi</strong> seperti teknologi, olahraga, sosial budaya, ekonomi, politik, otomotif, sampai lingkungan. Kunci dari teks berita ada 2, yaitu <strong>faktual</strong> dan <strong>aktual</strong>. Faktual artinya berdasarkan fakta, sedangkan aktual artinya kejadian terkini.</p><p>Dalam teks berita, kita juga menemukan <strong>2 sampai 3 struktur penting</strong>. Hayo, masih ingat nggak? Yup, betul! Jawabannya ada <strong>Kepala Berita, Tubuh Berita, dan Ekor Berita.</strong> Khusus Ekor Berita sifatnya opsional ya, alias boleh ditambahkan atau tidak sama sekali.</p>', '20 Contoh Teks Berita dan Strukturnya dalam Berbagai Topik', '1758008181.png', '2025-09-16', 2, 6, '2025-09-16 07:36:21', '2025-09-16 07:36:21'),
(8, '<p>Perdana Menteri (PM) Selandia Baru Chris Hipkins menyebut kawasan Pasifik menjadi lebih diperebutkan dan kurang aman setelah China menjadi semakin agresif di kawasan tersebut. Hipkins menyatakan negaranya perlu bekerja sama dengan mitra-mitra yang satu pemikiran sembari tetap terlibat dengan Beijing.</p><p>Seperti dilansir Reuters, Senin (17/7/2023), kebangkitan China dan bagaimana negara itu berupaya memberikan pengaruhnya, sebut Hipkins, telah menjadi pendorong utama meningkatnya persaingan strategis, khususnya di kawasan Indo-Pasifik.</p><p><strong>Tubuh Berita</strong></p><p>“Wilayah kami menjadi lebih diperebutkan, kurang bisa diprediksi dan kurang aman,” sebut Hipkins saat berpidato dalam China Business Summit di Auckland, pada Senin (17/7) waktu setempat.</p><p>“Dan itu menimbulkan tantangan bagi negara-negara kecil seperti Selandia Baru, yang bergantung pada stabilitas dan prediktabilitas aturan internasional untuk kemakmuran dan keamanan kita,” imbuhnya.</p><p>Hubungan itu, menurut Hipkins, membutuhkan pengelolaan yang penuh kehati-hatian namun demikian, China tetap menjadi mitra dagang utama bagi Selandia Baru.</p><p>Pidato Hipkins itu disampaikan dalam acara tahunan yang digelar kurang dari sebulan setelah dia memimpin misi perdagangan yang sukses ke China — mitra dagang terbesar Selandia Baru. Dalam misi itu, dia menghadapi beberapa kritikan dalam negeri karena dirinya tidak vokal soal hak asasi manusia (HAM) dan masalah-masalah lainnya seperti yang diharapkan beberapa pihak.</p>', 'PM Selandia Baru: Pasifik Jadi Kurang Aman karena Agresivitas China', '1758008232.png', '2025-09-16', 2, 3, '2025-09-16 07:37:12', '2025-09-16 07:37:12'),
(9, '<p>Ditreskrimsus Polda Metro Jaya tengah menyelidiki kasus penipuan lewat aplikasi kencan atau yang diidentikkan dengan film dokumenter berjudul The Tinder Swindler. Direktur Reskrimsus Polda Metro Jaya Polda Metro Jaya Kombes Ade Safri Simanjuntak menyebut ada dua korban yang membuat laporan ke pihak berwajib. Ia juga membeberkan aksi penipuan itu terjadi pada tahun ini.</p><p>“Ini masih kita lakukan penyelidikan, di laporan itu ada dan saat ini kita lakukan serangkaian upaya penyelidikan oleh tim penyelidik Subdit Siber Polda Metro Jaya,” kata Ade di Polda Metro Jaya, Selasa (22/8).</p><p><strong>Tubuh Berita</strong></p><p>Ade menerangkan kasus penipuan ini bermula saat korban dan terduga pelaku berkenalan dalam sebuah aplikasi kencan. Dari perkenalan itu, keduanya intens berkomunikasi dan menjadi akrab.</p><p>Setelah itu, pelaku mulai melancarkan aksinya. Pelaku pun melakukan berbagai bujuk rayu hingga korban akhirnya terbuai.</p><p>“Pada akhirnya korban tertarik dengan iming-iming maupun rayuan, kemudian menyerahkan sejumlah uang kepada pelaku,” ucap Ade.</p><p>“Iming-iming, rayuan, mengelabui korban untuk serahkan sejumlah uang yang merupakan janji dari pelaku ini membuat bisnis baru dan sebagainya,” sambungnya.</p>', 'Kasus Tinder Swindler Indonesia, Kerugian Korban Ditaksir Ratusan Juta', '1758008276.png', '2025-09-15', 2, 1, '2025-09-16 07:37:56', '2025-09-16 07:37:56'),
(10, '<p>Kementerian Komunikasi dan Informatika (Kominfo) menyebut pihaknya akan melakukan prosedur standar untuk menelusuri dugaan kebocoran data Kependudukan dan Pencatatan Sipil (Dukcapil).</p><p>“Kita biasanya akan memanggil atau berkoordinasi dengan yang namanya pengendali data, dalam hal ini kalau Dukcapil itu kan adanya di Kemendagri, nanti kita akan koordinasi termasuk juga dengan BSSN,” ujar Usman Kansong , Direktur Jenderal Informasi dan Komunikasi Publik (Dirjen IKP) Kominfo di Kantor Kominfo, Jakarta, Senin (17/7).</p><p><strong>Tubuh Berita</strong></p><p>“Ya itu standar,” imbuhnya.</p><p>Usman menyebut pihaknya akan mendengarkan laporan dari Disdukcapil. Kemudian, BSSN biasanya akan melakukan audit untuk “mencari tau data yang mana yang bocor, berapa banyak, baru kemudian dilaporkan ke Kominfo kita akan lihat kalo ada pengendalian data yang tidak baik maka sudah diatur dalam PP 71 tahun 2019 sanksi apa yg bisa kita jatuhkan kepada pengendali data.”</p><p>Sebelumnya, sebanyak 337 juta data masyarakat di Direktorat Dukcapil Kementerian Dalam Negeri (Kemendagri) diduga mengalami kebocoran dan dijual di forum online hacker BreachForums.</p>', '300 Juta Data Dukcapil Diduga Bocor, Kominfo Lakukan Prosedur Standar', '1758008323.png', '2025-09-16', 2, NULL, '2025-09-16 07:38:43', '2025-09-16 07:38:43'),
(11, '<p>PENGAMAT transportasi Djoko Setijowarno mengungkapkan tarif LRT Jabodebek yang diputuskan oleh Kementerian Perhubungan sebesar Rp24 ribu untuk rute terjauh dari Stasiun Harjamukti ke Dukuh Atas sudah wajar dan sesuai. Angka tersebut sudah sesuai dengan perhitungan jarak tempuh yang mencapai 27,3 km serta sesuai kemampuan calon penumpang.&nbsp;</p><p>“Ini sudah sesuai. Apalagi ini sudah disubsidi. Tanpa subsidi tarifnya Rp50 ribu,” kata Djoko saat dikonfirmasi Media Indonesia, Minggu (23/7). Djoko mengatakan, salah satu sasaran penumpang LRT Jabodebek merupakan warga perumahan yang tinggal di kawasan elit seperti Sentul, Bogor, hingga Kota Bekasi.</p><p><strong>Tubuh Berita</strong></p><p>Dalam sebuah survei kecil-kecilan yang pernah ia lakukan, warga Bekasi dan Bogor yang mengendarai mobil untuk bekerja ke Jakarta setiap hari rata-rata mengeluarkan biaya Rp75 ribu hingga Rp100 ribu per hari.</p><p>“Itu termasuk tarif tol, bensin, dan biaya parkir,” ujarnya.</p><p>Kementerian Perhubungan melalui Badan Pengelola Transportasi Jabodebek (BPTJ) menyediakan layanan pengumpan atau ‘feeder’ dalam bentuk bus. BPTJ sebelumnya sudah memiliki layanan ini melalui bus JR Connexion. Penyediaan bus atau angkutan pengumpan ini juga bisa bekerja sama dengan pemda setempat yang wilayahnya dilalui oleh LRT Jabodebek.</p><p>&nbsp;“Yang harus dilakukan adalah menekan ongkos dari rumah ke stasiun. Ini bisa dengan bus. Busnya wara-wiri saja dari komplek perumahan ke stasiun bayar Rp10 ribu. Ini sudah cukup menjanjikan bisa menekan,” tuturnya.&nbsp;</p><p>Penyediaan bus pengumpan, dinilainya lebih efektif ketimbang menyediakan sarana kantong parkir atau ‘park and ride’. Sebab, berbeda dengan PT KCI yang memiliki lahan luas di beberapa area stasiunnya sehingga bisa menyediakan parkir, Kemenhub tidak memiliki lahan di sekitar stasiun-stasiun LRT Jabodebek yang bisa dijadikan lahan parkir.</p>', 'Tarif Rp24 Ribu Rute Terjauh LRT Dinilai Wajar', '1758008369.png', '2025-09-09', 2, 4, '2025-09-16 07:39:29', '2025-09-16 07:39:29'),
(12, '<p>TIMNAS voli putra Indonesia berhasil meraih gelar juara SEA V League 2023 pekan pertama usai mengalahkan Thailand 3-1 (21-25, 25-17, 25-23, dan 27-25) di GOR Candradimuka Padepokan Voli Jenderal Polisi Kunarto, Sentul, Bogor, Minggu (23/7) malam. Ini merupakan kemenangan ketiga dari tiga laga di kompetisi liga antarnegara.&nbsp;</p><p><strong>Tubuh Berita</strong></p><p>Dua laga sebelumnya didapatkan dari Filipina dan Vietnam dengan skor sama 3-0.&nbsp; Pelatih timnas Indonesia Jeff Jiang mengaku bangga dengan perjuangan anak asuhnya di laga pamungkas. “Saya bangga dengan anak-anak. Mereka bekerja keras dan bermain baik.&nbsp; <i>Teamwork</i> juga sangat baik, berbeda dengan saat di Cina Taipei, mungkin kalau di Taipei bermain seperti ini kami bisa menang,” ujar Jiang.</p><p>Di Filipina pekan ini, Indonesia akan turun dengan materi pemain yang sama. Di Filipina, akan berlangsung event yang sama pekan kedua, pada 28-30 Juli mendatang. Sementara tim Thailand akan turun dengan materi pemain yang berbeda. Pasalnya, tim Thailand yang berlaga di Sentul ini akan langsung bertolak ke Qatar menghadapi FIVB Challenge Cup 2023 pada pekan depan. Pemain terbaik (MVP), Fahri Septian Putratama menyebut laga terakhir ini dia dan rekan-rekannya bermain lebih baik. “Semua berjalan sesuai rencana,” kata Fahri.</p><p>Kekalahan di Taiwan dari Thailand, katanya juga sudah dievaluasi. “Thailand sebenarnya bermain sama seperti di Taiwan tetapi kami bermain jauh lebih baik dibanding di Taiwan,” lanjut Fahri.</p>', 'Indonesia Juara SEA V League 2023 Pekan Pertama', '1758008414.png', '2025-09-08', 2, 12, '2025-09-16 07:40:14', '2025-09-16 07:40:14'),
(13, '<p>Bandara Soekarno-Hatta, Tangerang, Banten akan direvitalisasi selama sekitar enam bulan ke depan. Hal ini dilakukan untuk meningkatkan kapasitas dan produktivitas pergerakan penumpang dan pesawat.</p><p>“Kurang lebih sekitar enam bulan lagi ini semua bisa diselesaikan sehingga dapat memenuhi demand yang semakin meningkat. Bandara Soetta akan menjadi showcase-nya negara Indonesia di mata dunia,” ujar Menteri Perhubungan Budi Karya Sumadi, Sabtu (22/7/2023), seperti dikutip dari keterangan tertulis yang diterima Kompas.com.</p><p><strong>Tubuh Berita</strong></p><p>Budi Karya menambahkan, kapasitas Bandara Soekarno-Hatta akan ditingkatkan menjadi 110 juta penumpang per tahun, dari kapasitas sebelumnya 65 juta per tahun. Kapasitas Bandara Soekarno-Hatta akan ditingkatkan menjadi 110 juta penumpang per tahun, dari kapasitas sebelumnya 65 juta per tahun.&nbsp;</p><p>Jika berencana terbang dari atau ke Bandara Soekarno-Hatta, ketahui beberapa area yang menjadi objek revitalisasi. Untuk sisi darat (land side) dikerjakan oleh Angkasa Pura II (AP II) bersama kontraktor PT PP di Terminal 1B dan 1C domestik, sementara di Terminal 2F internasional dikerjakan oleh AP II dan Adhi Karya.</p><p>Sedangkan untuk sisi udara (air side), landas pacu atau runway dikerjakan oleh AP II dan pemasangan sistem untuk meningkatkan produktivitas pergerakan pesawat oleh Airnav Indonesia.&nbsp;</p>', 'Bandara Soekarno-Hatta Direvitalisasi, Catat Area yang Terdampak', '1758008459.png', '2025-09-15', 2, NULL, '2025-09-16 07:40:59', '2025-09-16 07:40:59'),
(14, '<p>Presiden Joko Widodo atau Jokowi bertolak ke Chengdu, China pagi ini, Kamis, 27 Juni 2023 dari Bandara Halim Perdanakusuma, Jakarta Timur. Dalam lawatannya ke negeri tirai bambu tersebut, salah satu agenda utamanya adalah bertemu dengan Presiden Cina Xi Jinping.&nbsp;</p><p><strong>Tubuh Berita</strong></p><p>Jokowi mengklaim kunjungannya ke Cina juga dalam rangka memenuhi undangan Xi Jinping dan sekaligus memperingati 10 tahun kemitraan komprehensif Indonesia-Cina. Menurut Jokowi, Cina adalah mitra dagang dan investasi terbesar bagi Indonesia.&nbsp;</p><p>“Saya akan melakukan pertemuan dengan Presiden Xi Jinping dan sejumlah agenda prioritas akan saya bahas bersama Presiden Xi, baik investasi maupun proyek strategis Indonesia dan RRT (Republik Rakyat Tiongkok), juga di bidang perdagangan dan kesehatan serta isu-isu regional dan global,” ujar Jokowi di Bandara Halim Perdanakusuma, Jakarta Timur, Kamis, 27 Juli 2023.&nbsp;</p>', 'Jokowi Terbang ke Cina Pagi Ini, Temui Xi Jinping untuk Bahas Investasi', '1758008778.png', '2025-09-09', 2, NULL, '2025-09-16 07:46:18', '2025-09-16 07:46:18');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `message` text DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `status` varchar(50) DEFAULT '0',
  `reply_to` text DEFAULT NULL,
  `time` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `username`, `message`, `is_admin`, `status`, `reply_to`, `time`, `created_at`, `updated_at`) VALUES
(33, 'jack sparrow', 'dfg', 0, 'pending', NULL, NULL, '2025-09-19 03:16:31', '2025-09-19 03:16:31'),
(34, 'haris', 'hh', 0, 'pending', NULL, NULL, '2025-09-19 03:19:31', '2025-09-19 03:19:31'),
(35, 'haris', 'tyu', 0, 'pending', NULL, NULL, '2025-09-19 03:20:30', '2025-09-19 03:20:30'),
(36, 'Admin', 'hh', 1, '0', 'haris', NULL, '2025-09-19 03:21:04', '2025-09-19 03:21:04'),
(37, 'Admin', 'y', 1, '0', 'haris', NULL, '2025-09-19 03:23:03', '2025-09-19 03:23:03');

-- --------------------------------------------------------

--
-- Table structure for table `detail_inap`
--

CREATE TABLE `detail_inap` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `inap_id` bigint(20) UNSIGNED NOT NULL,
  `img` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_inap`
--

INSERT INTO `detail_inap` (`id`, `inap_id`, `img`, `created_at`, `updated_at`) VALUES
(9, 8, '1757986752_68c8bfc0b20c6_anak.JPG', '2025-09-15 18:39:12', '2025-09-15 18:39:12'),
(10, 8, '1757986780_68c8bfdc7e160_anak 4.JPG', '2025-09-15 18:39:40', '2025-09-15 18:39:40'),
(11, 8, '1757986902_68c8c056a987f_anak 2.JPG', '2025-09-15 18:41:42', '2025-09-15 18:41:42'),
(12, 8, '1757986913_68c8c06149c3b_anak 3.JPG', '2025-09-15 18:41:53', '2025-09-15 18:41:53'),
(13, 8, '1757986922_68c8c06a95291_anak 5.JPG', '2025-09-15 18:42:02', '2025-09-15 18:42:02'),
(14, 9, '1757986933_68c8c075b99dc_bedah 1.JPG', '2025-09-15 18:42:13', '2025-09-15 18:42:13'),
(15, 9, '1757986946_68c8c082189f0_bedah 2.JPG', '2025-09-15 18:42:26', '2025-09-15 18:42:26'),
(16, 10, '1757986961_68c8c091cf06f_non bedah.JPG', '2025-09-15 18:42:41', '2025-09-15 18:42:41'),
(17, 10, '1757986972_68c8c09cc4811_non bedah 2.JPG', '2025-09-15 18:42:52', '2025-09-15 18:42:52'),
(18, 10, '1757986983_68c8c0a78a127_non bedah 3.JPG', '2025-09-15 18:43:03', '2025-09-15 18:43:03'),
(19, 10, '1757986994_68c8c0b2c16d2_non bedah 4.JPG', '2025-09-15 18:43:14', '2025-09-15 18:43:14'),
(20, 11, '1757987007_68c8c0bf15981_angso duo 1.JPG', '2025-09-15 18:43:27', '2025-09-15 18:43:27'),
(21, 11, '1757987017_68c8c0c97dc79_angso duo 2.JPG', '2025-09-15 18:43:37', '2025-09-15 18:43:37'),
(22, 11, '1757987027_68c8c0d38b282_angso duo 3.JPG', '2025-09-15 18:43:47', '2025-09-15 18:43:47'),
(23, 11, '1757987037_68c8c0dd773d1_angso duo 4.JPG', '2025-09-15 18:43:57', '2025-09-15 18:43:57');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `poli_id` bigint(20) UNSIGNED NOT NULL,
  `jk` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `detail_jabatan` varchar(800) DEFAULT NULL,
  `img_jadwal` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id`, `nama`, `img`, `poli_id`, `jk`, `jabatan`, `detail_jabatan`, `img_jadwal`, `created_at`, `updated_at`) VALUES
(5, 'dr. Rika Haryanti, Sp.A', '1757923864.png', 1, 'Perempuan', 'Tenaga Medis', 'Dr. Spesialis Anak', 'SV3gT4bvMBB8J0gDzoo4_3.png', '2025-09-15 01:11:04', '2025-09-24 01:47:14'),
(6, 'dr. Rudi Efendi, Sp.A', '1757923983.png', 1, 'Laki-Laki', 'Tenaga Medis', 'Dr. Spesialis Anak', 'zCKzsKh5XslU2HAG126m_2.png', '2025-09-15 01:13:03', '2025-09-24 01:48:55'),
(7, 'dr. Muhammad Ivan, Sp.B', '1757924161.png', 3, 'Laki-Laki', 'Tenaga Medis', 'Dr. Spesialis Bedah', 'M908haU96uiCdHDqDVRG_6.png', '2025-09-15 01:16:01', '2025-09-24 01:49:17');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `foto_dashboard`
--

CREATE TABLE `foto_dashboard` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `foto` varchar(255) NOT NULL,
  `urutan` int(11) NOT NULL,
  `judul` varchar(2500) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `foto_dashboard`
--

INSERT INTO `foto_dashboard` (`id`, `foto`, `urutan`, `judul`, `created_at`, `updated_at`) VALUES
(3, 'EoXesH4O3jn6TcHetOukWhatsApp Image 2025-09-15 at 2.23.28 PM.jpeg', 1, 'Test', '2025-09-15 00:24:39', '2025-09-15 00:24:39'),
(4, 'XyBMhkisjgy54HGHChyWWhatsApp Image 2025-09-15 at 2.23.27 PM.jpeg', 2, 'hellow', '2025-09-15 00:24:51', '2025-09-15 00:24:51');

-- --------------------------------------------------------

--
-- Table structure for table `galeris`
--

CREATE TABLE `galeris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `keterangan` varchar(2500) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `img`
--

CREATE TABLE `img` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `indikator_mutu` varchar(255) DEFAULT NULL,
  `standar_pelayanan` varchar(255) DEFAULT NULL,
  `jadwal_dokter` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `img`
--

INSERT INTO `img` (`id`, `indikator_mutu`, `standar_pelayanan`, `jadwal_dokter`, `created_at`, `updated_at`) VALUES
(1, '1757557264_indikator.pdf', '1757300280.png', '1758679720_jadwal.png', '2025-09-07 19:56:16', '2025-09-24 02:08:40'),
(2, '1757557292_indikator.pdf', '1757557292_standar.pdf', NULL, '2025-09-10 19:21:32', '2025-09-10 19:21:32');

-- --------------------------------------------------------

--
-- Table structure for table `inovasi`
--

CREATE TABLE `inovasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `tahun` int(11) NOT NULL,
  `deskripsi` varchar(10000) NOT NULL,
  `sop` varchar(255) NOT NULL,
  `manual_book` varchar(255) DEFAULT NULL,
  `img1` varchar(255) DEFAULT NULL,
  `img2` varchar(255) DEFAULT NULL,
  `tgl_publish` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inovasi`
--

INSERT INTO `inovasi` (`id`, `judul`, `tahun`, `deskripsi`, `sop`, `manual_book`, `img1`, `img2`, `tgl_publish`, `created_at`, `updated_at`) VALUES
(1, 'OBAT MAGER (Optimalisasi pengendalian Obat Melalui pencatatan Berbasis Web Google spreadsheet)', 2024, '<p>Menurut Peraturan Kementrian Kesehatan Nomor 72 Tahun 2016, pelayanan kefarmasian adalah suatu pelayanan langsung dan bertanggung jawab kepada pasien yang berkaitan dengan sediaan farmasi yang bermaksud mencapai hasil yang pasti untuk meningkatkan mutu kehidupan pasien. Standar Pelayanan Kefarmasian di Rumah Sakit meliputi dua kegiatan yaitu bersifat manajerial berupa standar pengelolaan sediaan farmasi dan standar pelayanan farmasi klinik.</p><p>Untuk menjamin mutu pelayanan di Rumah Sakit, harus dilakukan evaluasi mutu pelayanan dengan memperhatikan pengendalian terhadap sediaan farmasi. Pengendalian dilakukan untuk mempertahankan jenis dan jumlah persediaan sesuai kebutuhan pelayanan, melalui pengaturan sistem pesanan atau pengadaan, penyimpanan dan pengeluaran. Hal ini bertujuan untuk menghindari terjadinya kelebihan, kekurangan, kekosongan, kerusakan, kadaluwarsa, dan kehilangan obat.</p><p>Dengan adanya pengendalian persediaan farmasi yang baik, maka akan mempengaruhi kualitas layanan yang diberikan kepada pasien. Saat ini RSUD dr.Sadikin Kota Pariaman sudah menerapkan pengendalian persediaan farmasi yang cukup baik, tetapi masih bisa ditingkatkan agar kualitas pelayanan kepada pasien juga semakin bagus. Salah satu aspek yang dapat ditingkatkan adalah aspek pencatatan.</p><p>Gudang farmasi mempunyai fungsi sebagai tempat penyimpanan yang merupakan kegiatan dan usaha untuk mengelola barang persediaan farmasi yang dilakukan sedemikian rupa agar kualitas dapat diperhatikan, barang terhindar dari kerusakan fisik, pencarian barang mudah dan cepat, barang aman dari pencuri dan mempermudah pengawasan stok. Instalasi Farmasi RSUD dr. Sadikin memiliki satu gudang &nbsp;yang digunakan sebagai sarana untuk penyimpanan produk-produk farmasi yakni obat-obatan dan Bahan Medis Habis Pakai (BMHP) yang letaknya terpisah dari ruangan Instalasi Farmasi yang dikelola oleh 1 orang Apoteker.</p><p>Gudang ini berperan sebagai jantung dari manajemen logistik karena sangat menentukan kelancaran dari pendistribusian. Setiap hari proses distribusi terjadi di gudang ini, mulai dari barang masuk dari <i>supplier </i>serta pengeluaran barang baik itu kebutuhan untuk ke bagian rawat inap, rawat jalan, dan unit-unit pelayanan rumah sakit lainnya. Pada setiap proses distribusi tersebut dibutuhkan proses pencatatan untuk mempermudah pengawasan stok.</p><p>Pencatatan di gudang farmasi selama ini sudah cukup baik dengan menggunakan bantuan media komputer dan <i>Microsoft Excel. </i>Namun masih ada beberapa kendala yang dapat ditemui dalam hal tersebut seperti:</p><p>1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Terjadi duplikasi file karena folder penyimpanan file yang letaknya tidak pada satu tempat yang tetap.</p><p><strong>2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong>File yang terduplikasi dalam jumlah banyak menyulitkan untuk mencari file yang benar-benar sudah ter-<i>update.</i></p><p>3.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; File hanya bisa dibuka di komputer rumah sakit, jika ingin melihat file tersebut ke luar rumah sakit maka diperlukan pihak ketiga untuk mengirimkannya.</p><p>Masalah yang teridentifikasi ini dapat menghambat efektifitas pencatatan dan pengdokumentasian stok obat, karena apabila sewaktu-waktu file itu tersebut dibutuhkan maka hanya petugas gudang saja yang benar-benar tahu dimana letak file tersebut sehingga menyulitkan petugas lain yang ingin tahu informasi terkait stok obat ter<i>-update</i>.</p>', '1757989902.pdf', '1757989902.pdf', '1757989902.png', '1757989902.png', '2024-06-11', '2025-09-15 19:31:42', '2025-09-15 19:31:42');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_dokter`
--

CREATE TABLE `jadwal_dokter` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hari` varchar(255) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `dokter_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal_dokter`
--

INSERT INTO `jadwal_dokter` (`id`, `hari`, `jam_mulai`, `jam_selesai`, `dokter_id`, `created_at`, `updated_at`) VALUES
(4, 'Senin', '08:00:00', '13:00:00', 5, '2025-09-15 01:12:07', '2025-09-15 01:12:07'),
(5, 'Selasa', '08:00:00', '13:00:00', 5, '2025-09-15 01:12:07', '2025-09-15 01:12:07'),
(6, 'Rabu', '08:00:00', '13:00:00', 5, '2025-09-15 01:12:07', '2025-09-15 01:12:07'),
(7, 'Jumat', '08:00:00', '13:00:00', 5, '2025-09-15 01:12:07', '2025-09-15 01:12:07'),
(8, 'Selasa', '08:00:00', '13:00:00', 6, '2025-09-15 01:13:37', '2025-09-15 01:13:37'),
(9, 'Kamis', '08:00:00', '13:00:00', 6, '2025-09-15 01:13:37', '2025-09-15 01:13:37'),
(10, 'Jumat', '08:00:00', '13:00:00', 6, '2025-09-15 01:13:37', '2025-09-15 01:13:37'),
(11, 'Senin', '08:00:00', '12:00:00', 7, '2025-09-16 08:09:04', '2025-09-16 08:09:04');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `keterangan` varchar(2500) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id`, `nama`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Alamat', 'Jalan Nostalgia, Desa Kampung Gadang Padusunan, Kecamatan Pariaman Timur, Kota Pariaman, Sumatera Barat.', '2025-09-17 03:40:38', '2025-09-17 03:40:38'),
(2, 'Email', 'rsudsadikin@pariamankota.go.id', '2025-09-17 03:41:42', '2025-09-17 03:41:42'),
(3, 'Instagram', 'https://www.instagram.com/sadikin_rsud/', '2025-09-17 03:42:00', '2025-09-17 04:28:09'),
(4, 'Facebook', 'https://www.facebook.com/rsuddrsadikinkotapariaman/?locale=id_ID', '2025-09-17 03:42:21', '2025-09-17 04:28:45'),
(5, 'TikTok', 'https://www.tiktok.com/@rsuddrsadikinpariaman', '2025-09-17 03:42:43', '2025-09-17 04:29:19');

-- --------------------------------------------------------

--
-- Table structure for table `konten_navbar`
--

CREATE TABLE `konten_navbar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `submenu_id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(2500) NOT NULL,
  `konten` text NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login_google`
--

CREATE TABLE `login_google` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tanggal_login` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login_googles`
--

CREATE TABLE `login_googles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tanggal_login` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_googles`
--

INSERT INTO `login_googles` (`id`, `nama`, `email`, `tanggal_login`, `created_at`, `updated_at`) VALUES
(1, 'alfan firebase', 'alfanfirebase@gmail.com', '2025-09-18 01:41:29', '2025-09-16 03:06:40', '2025-09-18 01:41:30');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_09_01_021636_create_foto_dashboard_tabel', 1),
(6, '2025_09_01_022030_create_profil_tabel', 1),
(7, '2025_09_01_022312_create_kontak_tabel', 1),
(8, '2025_09_01_023025_create_ugd_tabel', 1),
(9, '2025_09_01_023113_create_poli_tabel', 1),
(10, '2025_09_01_023200_create_dokter_tabel', 1),
(11, '2025_09_01_023544_create_jadwal_dokter_tabel', 1),
(12, '2025_09_01_023758_create_rawat_inap_tabel', 1),
(13, '2025_09_01_023844_create_rawat_jalan_tabel', 1),
(14, '2025_09_01_023916_create_penunjang_tabel', 1),
(15, '2025_09_01_024045_create_inovasi_tabel', 1),
(16, '2025_09_01_024221_create_pegawai_tabel', 1),
(17, '2025_09_01_024336_create_berita_tabel', 1),
(18, '2025_09_01_024519_create_img_tabel', 1),
(19, '2025_09_15_030410_create_login_google_table', 2),
(20, '2025_09_16_195638_create_pengunjungwebs_table', 3),
(21, '2025_09_18_060232_create_votings_table', 4),
(22, '0000_00_00_000000_create_websockets_statistics_entries_table', 5),
(23, '2025_09_18_214041_create_chats_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `misis`
--

CREATE TABLE `misis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `misi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `misis`
--

INSERT INTO `misis` (`id`, `misi`, `created_at`, `updated_at`) VALUES
(1, 'Meningkatkan kualitas sumber daya manusia melalui pembinaan, pelatihan, dan pendidikan', '2025-09-15 00:29:22', '2025-09-15 00:29:22'),
(2, 'Menyediakan sarana dan prasarana yang modern dan bermutu', '2025-09-15 00:29:38', '2025-09-15 00:29:38'),
(3, 'Meningkatkan pelayanan kesehatan yang aman, profesional, dan bermutu secara berkelanjutan', '2025-09-15 00:30:12', '2025-09-15 00:30:12');

-- --------------------------------------------------------

--
-- Table structure for table `motos`
--

CREATE TABLE `motos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `moto` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `motos`
--

INSERT INTO `motos` (`id`, `moto`, `created_at`, `updated_at`) VALUES
(1, 'Melayani dengan ikhlas dan profesional.', '2025-09-15 00:28:24', '2025-09-15 00:28:24');

-- --------------------------------------------------------

--
-- Table structure for table `navbar`
--

CREATE TABLE `navbar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu` varchar(300) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `is_dynamic` tinyint(1) NOT NULL DEFAULT 0,
  `urutan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `navbar`
--

INSERT INTO `navbar` (`id`, `menu`, `url`, `is_dynamic`, `urutan`, `created_at`, `updated_at`) VALUES
(2, 'Profil', NULL, 0, 2, '2025-09-23 02:34:43', '2025-09-23 02:34:43'),
(3, 'Layanan', NULL, 0, 3, '2025-09-23 02:34:43', '2025-09-23 02:34:43'),
(4, 'Informasi Publik', NULL, 0, 4, '2025-09-23 02:34:43', '2025-09-23 02:34:43'),
(5, 'SDM', NULL, 0, 5, '2025-09-23 02:34:43', '2025-09-23 02:34:43'),
(6, 'Inovasi', 'landing.inovasi', 0, 6, '2025-09-23 02:34:43', '2025-09-23 02:34:43'),
(7, 'Pengaduan', 'landing.pengaduan', 0, 7, '2025-09-23 02:34:43', '2025-09-23 02:34:43'),
(8, 'Lainnya', NULL, 1, 8, '2025-09-23 02:34:43', '2025-09-23 02:34:43');

-- --------------------------------------------------------

--
-- Table structure for table `organisasis`
--

CREATE TABLE `organisasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `organisasis`
--

INSERT INTO `organisasis` (`id`, `deskripsi`, `gambar`, `created_at`, `updated_at`) VALUES
(1, '<p>Direktur : dr. Anung Respati, M.K.M</p>', 'GQD6iLZ845struktur_org sadikin.jpg', '2025-09-15 00:41:02', '2025-09-15 00:41:02');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jk` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `detail_jabatan` varchar(2500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nama`, `jk`, `jabatan`, `img`, `detail_jabatan`, `created_at`, `updated_at`) VALUES
(2, 'dr. Anung Respati, M.K.M', 'Perempuan', 'Pimpinan', '1757988754.png', 'Plt Direktur', '2025-09-15 19:12:34', '2025-09-15 19:12:34'),
(3, 'Ns. Surya Nanda, S.Kep, M.KM', 'Laki-Laki', 'Pimpinan', NULL, 'Kasi Pelayanan Keperawatan & Kebidanan', '2025-09-24 03:22:38', '2025-09-24 03:22:38'),
(4, 'Dyanti Oktalina, S.Kep', 'Perempuan', 'Pimpinan', NULL, 'Kasubag Administrasi Umum dan Keuangan', '2025-09-24 03:23:08', '2025-09-24 03:23:08'),
(5, 'Feri Kasman, S.Farm', 'Laki-Laki', 'Pimpinan', NULL, 'Kasi Pelayanan Medis, Penunjang Medis & Non Medis', '2025-09-24 03:23:44', '2025-09-24 03:23:44');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduans`
--

CREATE TABLE `pengaduans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nik` bigint(20) NOT NULL,
  `tanggal_kunjungan` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `pesan` varchar(2500) NOT NULL,
  `balasan` varchar(2500) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengaduans`
--

INSERT INTO `pengaduans` (`id`, `nama`, `nik`, `tanggal_kunjungan`, `email`, `pesan`, `balasan`, `tanggal`, `created_at`, `updated_at`) VALUES
(1, 'disti', 137109501000100001, '2025-09-11', 'disti@gmail.com', 'pelayanan oke', 'oke terima kasih ya', NULL, NULL, '2025-09-10 21:26:59'),
(2, 'wer', 1302035802970001, '2025-09-22', 'alfanfirebase@gmail.com', 'rewrwer', '<p>234234234234234234234</p><p>4234</p><p><strong>4</strong></p><p><strong>2342</strong></p><p><strong>34</strong></p><p><strong>23</strong></p><p><strong>42</strong></p><p><strong>34</strong></p><p><strong>2</strong></p><p><strong>34234</strong></p><p><strong>sdf</strong></p><p><strong>sf</strong></p><p>&nbsp;</p><p><strong>sdf</strong></p>', '2025-09-16', '2025-09-16 03:10:48', '2025-09-17 07:24:41'),
(3, 'werwer', 1302035802970001, '2025-09-15', 'rickow098@gmail.com', 'rewrwe', '<p>Terima kasih telah menghubungi kami dan menyampaikan keluhan Anda mengenai [sebutkan secara singkat topik keluhan, mis. pengalaman Anda dengan layanan kami pada tanggal X]. Kami mohon maaf atas ketidaknyamanan yang mungkin Anda alami.&nbsp;</p><p>&nbsp;</p><p>Kami sangat menghargai waktu dan upaya Anda untuk memberikan umpan balik ini. Keluhan Anda penting bagi kami, dan kami akan segera menindaklanjutinya. Tim kami sedang meninjau detail masalah Anda untuk menemukan solusi terbaik.&nbsp;</p><p>&nbsp;</p><p>Kami berkomitmen untuk memberikan pengalaman terbaik bagi pelanggan kami dan terus berupaya meningkatkan layanan kami berdasarkan masukan seperti yang Anda berikan.&nbsp;</p><p>&nbsp;</p><p>Kami akan segera memberi Anda pembaruan mengenai status penyelesaian keluhan Anda. Jika Anda memiliki informasi tambahan yang dapat membantu kami, jangan ragu untuk membalas email ini.&nbsp;</p><p>&nbsp;</p><p>Terima kasih sekali lagi atas kesabaran dan pengertian Anda.&nbsp;</p><p>&nbsp;</p><p>Hormat kami,</p><p>&nbsp;</p><p>[Nama Anda/Nama Tim/Nama Perusahaan]</p><p>&nbsp;</p><p>[Informasi Kontak Anda]</p>', '2025-09-16', '2025-09-16 03:11:35', '2025-09-17 08:00:33');

-- --------------------------------------------------------

--
-- Table structure for table `pengunjungwebs`
--

CREATE TABLE `pengunjungwebs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pengunjung` bigint(20) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengunjungwebs`
--

INSERT INTO `pengunjungwebs` (`id`, `pengunjung`, `tanggal`, `created_at`, `updated_at`) VALUES
(1, 19, '2025-09-16', '2025-09-16 13:03:45', '2025-09-16 14:03:07'),
(2, 74, '2025-09-17', '2025-09-17 01:27:56', '2025-09-17 08:09:19'),
(3, 136, '2025-09-18', '2025-09-17 23:10:41', '2025-09-18 15:32:34'),
(4, 25, '2025-09-19', '2025-09-18 22:54:55', '2025-09-19 09:06:16'),
(5, 7, '2025-09-22', '2025-09-22 01:32:14', '2025-09-22 04:14:58'),
(6, 13, '2025-09-23', '2025-09-23 01:54:07', '2025-09-23 08:45:39'),
(7, 10, '2025-09-24', '2025-09-24 00:52:58', '2025-09-24 01:15:11');

-- --------------------------------------------------------

--
-- Table structure for table `penunjang`
--

CREATE TABLE `penunjang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `penunjang` varchar(2500) NOT NULL,
  `keterangan` varchar(2500) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penunjang`
--

INSERT INTO `penunjang` (`id`, `penunjang`, `keterangan`, `img`, `created_at`, `updated_at`) VALUES
(1, 'Laboratorium', '<p>fasilitas medis yang berfungsi untuk melakukan pengukuran, pengujian, dan analisis terhadap spesimen biologis (seperti darah, urin, dan jaringan) dari pasien untuk membantu dokter dalam diagnosis, penanganan, dan pemantauan penyakit serta kondisi kesehatan, serta untuk mendukung upaya penyembuhan dan pemulihan kesehatan pasien secara akurat dan tepat waktu.</p>', '1757925927.jpg', '2025-09-15 01:45:27', '2025-09-15 01:45:27'),
(2, 'Radiologi', '<p>ilmu kedokteran yang menggunakan teknologi pencitraan, seperti sinar-X, CT scan, MRI, dan USG, untuk mendiagnosis, memantau, dan mengobati penyakit.</p>', '1757925987.jpg', '2025-09-15 01:46:27', '2025-09-15 01:46:27');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `poli`
--

CREATE TABLE `poli` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_poli` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `poli`
--

INSERT INTO `poli` (`id`, `nama_poli`, `keterangan`, `img`, `created_at`, `updated_at`) VALUES
(1, 'Poli Anak', '<p>Poliklinik Anak adalah pelayanan pemeriksaan, diagnosis, pengobatan, serta pemantauan tumbuh kembang bayi, anak, dan remaja.&nbsp;</p>', '1757923636.png', '2025-09-02 20:53:06', '2025-09-15 01:07:16'),
(3, 'Poli Bedah', '<p>Poliklinik Bedah memberikan layanan pemeriksaan, konsultasi, dan tindak lanjut bagi penanganan kasus bedah umum.</p>', '1757923690.png', '2025-09-15 01:08:10', '2025-09-15 01:08:10'),
(5, 'Poli Gigi', '<p>Poliklinik Gigi memberikan layanan pemeriksaan, perawatan, dan pemeliharaan kesehatan gigi dan mulut.</p>', '1758010115.png', '2025-09-16 08:08:35', '2025-09-16 08:08:35');

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sejarah` varchar(2500) NOT NULL,
  `visi` varchar(255) NOT NULL,
  `misi` varchar(255) NOT NULL,
  `struktur_org` varchar(255) NOT NULL,
  `moto` varchar(255) NOT NULL,
  `urutan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id`, `sejarah`, `visi`, `misi`, `struktur_org`, `moto`, `urutan`, `created_at`, `updated_at`) VALUES
(2, 'Nama dr. Sadikin sendiri merupakan seorang tentara pejuang berpangkat Kolonel beristrikan gadis Pariaman. Sebagai sumando rang Pariaman dan dokter pada era tahun 1940-an, Sadikin dikenal sebagai seorang dokter pelayan masyarakat tanpa pamrih dan berjiwa filantropis.\r\n\r\nHal tersebut diungkapkan Walikota Pariaman, H. Mukhlis Rahman, Dt. Rajo Basa didampingi Wakil Walikota Pariaman, H. Genius Umar, Dt. Rangkayo Rajo Gandam, Dandim 0308/Pariaman Letkol Arh, Endro Nurbantoro dan Sekdako Indra Sakti, Sabtu (24/12).', 'test', 'test', 'test', 'test', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rawat_inap`
--

CREATE TABLE `rawat_inap` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `keterangan` varchar(2500) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rawat_inap`
--

INSERT INTO `rawat_inap` (`id`, `nama`, `keterangan`, `icon`, `created_at`, `updated_at`) VALUES
(8, 'Rawat Inap Kebidanan, Perinatologi dan Anak', '<p>Ruang Rawat Inap Kebidanan, Perinatologi dan Anak adalah ruang perawatan yang merawat pasien anak-anak, mulai dari bayi hingga remaja, dan yang menangani kasus kegawatdaruratan ibu hamil, bersalin, nifas, serta bayi baru lahir.</p><p>Ruang Rawat Inap Kebidanan, Perinatologi dan Anak terdiri dari kelas 2 dan kelas 3 BPJS. Tidak menutup kemungkinan untuk mengajukan pindah kamar inap ke kelas 1.</p>', '1757986566_icon.png', '2025-09-15 18:36:06', '2025-09-15 18:36:06'),
(9, 'Rawat Inap Bedah', '<p>Layanan Rawat Inap Bedah adalah fasilitas perawatan yang disediakan bagi pasien yang memerlukan tindakan pembedahan (operasi) dan membutuhkan pemulihan di ruang rawat inap setelah prosedur dilakukan.&nbsp;</p>', '1757986606_icon.png', '2025-09-15 18:36:46', '2025-09-15 18:36:46'),
(10, 'Rawat Inap Non Bedah', '<p>Layanan Rawat Inap Non Bedah ditujukan bagi pasien yang mengalami gangguan atau penyakit yang berhubungan dengan organ-organ dalam tubuh dan membutuhkan perawatan intensif di rumah sakit.</p><p>Selain itu layanan rawat inap non bedah juga menangani pasien Paru, THT, Kulit Kelamin dan Syaraf.</p>', '1757986645_icon.png', '2025-09-15 18:37:25', '2025-09-15 18:37:25'),
(11, 'Rawat Inap Angso Duo', '<p>Ruang Rawat Inap Angso Duo adalah ruang perawatan kelas 1 BPJS yang melayani pasien Bedah, Penyakit Dalam, Anak, PONEK, Paru, Saraf, Kulit dan Kelamin, THT, serta Rawat Inap Isolasi.</p>', '1757986681_icon.png', '2025-09-15 18:38:01', '2025-09-16 08:05:55');

-- --------------------------------------------------------

--
-- Table structure for table `rawat_jalan`
--

CREATE TABLE `rawat_jalan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dokter_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rawat_jalan`
--

INSERT INTO `rawat_jalan` (`id`, `dokter_id`, `created_at`, `updated_at`) VALUES
(8, 5, '2025-09-15 01:14:00', '2025-09-15 01:14:00'),
(9, 6, '2025-09-15 01:14:04', '2025-09-15 01:14:04'),
(10, 7, '2025-09-15 01:16:16', '2025-09-15 01:16:16');

-- --------------------------------------------------------

--
-- Table structure for table `sejarahs`
--

CREATE TABLE `sejarahs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sejarah` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sejarahs`
--

INSERT INTO `sejarahs` (`id`, `sejarah`, `gambar`, `created_at`, `updated_at`) VALUES
(1, '<p>Kota Pariaman resmi memiliki Rumah Sakit Umum Daerah (RSUD). Peresmian tanda dimulainya operasional RSUD yang diberi nama RSUD dr.Sadikin tersebut, dilakukan langsung Walikota Pariaman Mukhlis Rahman, Sabtu (24/12) di desa Kampung Baru Padusunan.<br><br>Tampak hadir pada peresmian tersebut Wakil Walikota Genius Umar, Dandim 0308/Pariaman Letkol Arh Endro Nurbantoro dan Sekdako Indra Sakti, serta sejumlah pejabat Pemko Pariaman.<br><br>\" Awalnya tidak ada niat untuk mendirikan Rumah Sakit Umum Daerah Kota Pariaman, dalam kebijakan cuma bagaimana status pelayanan kesehatan di masing-masing puskesmas dapat ditingkatkan. Karena Rumah Sakit Umum sudah ada di Kota Pariaman, statusnya Rumah Sakit Propinsi. Selama ini warga Kota Pariaman berobat di RSUD Pariaman,\" kata Mukhlis Rahman.<br><br>Namun, ucap Mukhlis Rahman, karena perubahan tuntutan kebutuhan pelayanan kesehatan, RSUD Pariaman berubah status tipe B, maka mau tidak mau kota Pariaman harus punya Rumah Sakit Umum sendiri. Agar pelayanan kesehatan warga Kota Pariaman tidak terganggu.</p>', 'WjBVRZ81oCWhatsApp Image 2025-09-15 at 2.23.28 PM.jpeg', '2025-09-15 00:23:57', '2025-09-15 00:23:57');

-- --------------------------------------------------------

--
-- Table structure for table `strukturs`
--

CREATE TABLE `strukturs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `struktur` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `submenu`
--

CREATE TABLE `submenu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `navbar_id` bigint(20) UNSIGNED NOT NULL,
  `submenu` varchar(300) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `is_dynamic` tinyint(1) NOT NULL DEFAULT 0,
  `urutan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `submenu`
--

INSERT INTO `submenu` (`id`, `navbar_id`, `submenu`, `url`, `slug`, `is_dynamic`, `urutan`, `created_at`, `updated_at`) VALUES
(1, 2, 'Sejarah', 'landing.sejarah', 'sejarah', 0, 1, '2025-09-23 02:44:34', '2025-09-23 03:27:51'),
(2, 2, 'Visi Misi', 'landing.visi', 'visi-misi', 0, 2, '2025-09-23 02:44:34', '2025-09-23 03:27:59'),
(3, 2, 'Struktur Organisasi', 'landing.struktur', 'struktur-org', 0, 3, '2025-09-23 02:44:34', '2025-09-23 03:28:08'),
(4, 3, 'UGD', 'landing.ugd', 'ugd', 0, 1, '2025-09-23 02:44:34', '2025-09-23 03:28:13'),
(5, 3, 'Rawat Jalan', 'landing.rawatjalan', 'rawat-jalan', 0, 2, '2025-09-23 02:44:34', '2025-09-23 03:28:21'),
(6, 3, 'Rawat Inap', 'landing.rawatinap', 'rawat-inap', 0, 3, '2025-09-23 02:44:34', '2025-09-23 03:28:29'),
(7, 3, 'Penunjang', 'landing.penunjang', 'penunjang', 0, 4, '2025-09-23 02:44:34', '2025-09-23 03:28:37'),
(8, 4, 'Berita', 'landing.berita', 'berita', 0, 1, '2025-09-23 02:44:34', '2025-09-23 03:28:44'),
(9, 4, 'Indikator Mutu', 'landing.indmutu', 'ind-mutu', 0, 2, '2025-09-23 02:44:34', '2025-09-23 03:28:51'),
(10, 4, 'Standar Pelayanan', 'landing.standarp', 'standar-p', 0, 3, '2025-09-23 02:44:34', '2025-09-23 03:29:00'),
(11, 5, 'Pimpinan', 'landing.pimpinan', 'pimpinan', 0, 1, '2025-09-23 02:44:34', '2025-09-23 03:29:10'),
(12, 5, 'Tenaga Medis', 'landing.tenagamedis', 'tenaga-medis', 0, 2, '2025-09-23 02:44:34', '2025-09-23 03:29:22'),
(13, 5, 'Tenaga Kesehatan', 'landing.tenagakesehatan', 'tenaga-kesehatan', 0, 3, '2025-09-23 02:44:34', '2025-09-23 03:29:32'),
(14, 5, 'Tenaga Penunjang Kesehatan', 'landing.tpk', 'tpk', 0, 4, '2025-09-23 02:44:34', '2025-09-23 03:29:45'),
(15, 5, 'Tenaga ADM/Umum', 'landing.tau', 'tau', 0, 5, '2025-09-23 02:44:34', '2025-09-23 03:29:54'),
(19, 4, 'Jadwal Dokter', 'landing.jadwald', 'jadwal-dokter', 0, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ugd`
--

CREATE TABLE `ugd` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `foto` varchar(255) NOT NULL,
  `detail_pelayanan` varchar(2500) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ugd`
--

INSERT INTO `ugd` (`id`, `foto`, `detail_pelayanan`, `created_at`, `updated_at`) VALUES
(6, '1757922809.MOV', '<p><strong>Unit Gawat Darurat RSUD dr. Sadikin</strong> adalah layanan medis yang beroperasi 24 jam nonstop untuk menangani pasien dengan kondisi darurat atau mengancam nyawa. UGD dirancang untuk memberikan penanganan cepat, tepat, dan profesional bagi pasien yang membutuhkan pertolongan segera.</p>', '2025-09-15 00:53:29', '2025-09-15 00:54:36'),
(7, '1757922886.jpg', '<p><strong>Fasilitas dan Penunjang</strong></p><ul><li>Ruang triase untuk menentukan tingkat kegawatan pasien</li><li>Ruang resusitasi untuk penanganan kasus kritis</li><li>Ruang observasi untuk pemantauan kondisi pasien</li><li>Ambulans siaga 24 jam dengan peralatan emergensi</li><li>Peralatan medis modern seperti monitor jantung, ventilator, defibrillator, oksigen sentral, dan lainnya.</li></ul>', '2025-09-15 00:54:46', '2025-09-16 08:06:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'rsud sadikin kota pariaman', 'rsudsadikin@pariamankota.go.id', NULL, '$2y$10$4s9fbPk33OmqD9p3vBrJi.dL.66LlMFTNXcuAoatjQCJCweuVRyIC', NULL, '2025-09-16 04:10:00', '2025-09-16 04:23:36');

-- --------------------------------------------------------

--
-- Table structure for table `visis`
--

CREATE TABLE `visis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `visi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visis`
--

INSERT INTO `visis` (`id`, `visi`, `created_at`, `updated_at`) VALUES
(1, 'Menjadi rumah sakit pilihan keluarga yang unggul dan terpercaya', '2025-09-15 00:29:01', '2025-09-15 00:29:01');

-- --------------------------------------------------------

--
-- Table structure for table `votings`
--

CREATE TABLE `votings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pilihan` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `votings`
--

INSERT INTO `votings` (`id`, `pilihan`, `email`, `created_at`, `updated_at`) VALUES
(1, 'puas', '', '2025-09-18 01:57:47', '2025-09-18 01:57:47'),
(2, 'puas', 'alfanfirebase@gmail.com', '2025-09-18 02:03:13', '2025-09-18 02:03:13');

-- --------------------------------------------------------

--
-- Table structure for table `websockets_statistics_entries`
--

CREATE TABLE `websockets_statistics_entries` (
  `id` int(10) UNSIGNED NOT NULL,
  `app_id` varchar(255) NOT NULL,
  `peak_connection_count` int(11) NOT NULL,
  `websocket_message_count` int(11) NOT NULL,
  `api_message_count` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `berita_author_foreign` (`author`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_inap`
--
ALTER TABLE `detail_inap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign_inap` (`inap_id`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dokter_poli_id_foreign` (`poli_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `foto_dashboard`
--
ALTER TABLE `foto_dashboard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galeris`
--
ALTER TABLE `galeris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `img`
--
ALTER TABLE `img`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inovasi`
--
ALTER TABLE `inovasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwal_dokter_dokter_id_foreign` (`dokter_id`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `konten_navbar`
--
ALTER TABLE `konten_navbar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign_submenu` (`submenu_id`);

--
-- Indexes for table `login_google`
--
ALTER TABLE `login_google`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login_google_email_unique` (`email`);

--
-- Indexes for table `login_googles`
--
ALTER TABLE `login_googles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `misis`
--
ALTER TABLE `misis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `motos`
--
ALTER TABLE `motos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `navbar`
--
ALTER TABLE `navbar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organisasis`
--
ALTER TABLE `organisasis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengaduans`
--
ALTER TABLE `pengaduans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengunjungwebs`
--
ALTER TABLE `pengunjungwebs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penunjang`
--
ALTER TABLE `penunjang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rawat_inap`
--
ALTER TABLE `rawat_inap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rawat_jalan`
--
ALTER TABLE `rawat_jalan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rawat_jalan_dokter_id_foreign` (`dokter_id`);

--
-- Indexes for table `sejarahs`
--
ALTER TABLE `sejarahs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `strukturs`
--
ALTER TABLE `strukturs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `navbar_foreign` (`navbar_id`);

--
-- Indexes for table `ugd`
--
ALTER TABLE `ugd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visis`
--
ALTER TABLE `visis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `votings`
--
ALTER TABLE `votings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `websockets_statistics_entries`
--
ALTER TABLE `websockets_statistics_entries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `detail_inap`
--
ALTER TABLE `detail_inap`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foto_dashboard`
--
ALTER TABLE `foto_dashboard`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `galeris`
--
ALTER TABLE `galeris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `img`
--
ALTER TABLE `img`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inovasi`
--
ALTER TABLE `inovasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `konten_navbar`
--
ALTER TABLE `konten_navbar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login_google`
--
ALTER TABLE `login_google`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login_googles`
--
ALTER TABLE `login_googles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `misis`
--
ALTER TABLE `misis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `motos`
--
ALTER TABLE `motos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `navbar`
--
ALTER TABLE `navbar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `organisasis`
--
ALTER TABLE `organisasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengaduans`
--
ALTER TABLE `pengaduans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengunjungwebs`
--
ALTER TABLE `pengunjungwebs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `penunjang`
--
ALTER TABLE `penunjang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `poli`
--
ALTER TABLE `poli`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rawat_inap`
--
ALTER TABLE `rawat_inap`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `rawat_jalan`
--
ALTER TABLE `rawat_jalan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sejarahs`
--
ALTER TABLE `sejarahs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `strukturs`
--
ALTER TABLE `strukturs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `submenu`
--
ALTER TABLE `submenu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `ugd`
--
ALTER TABLE `ugd`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `visis`
--
ALTER TABLE `visis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `votings`
--
ALTER TABLE `votings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `websockets_statistics_entries`
--
ALTER TABLE `websockets_statistics_entries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_author_foreign` FOREIGN KEY (`author`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `detail_inap`
--
ALTER TABLE `detail_inap`
  ADD CONSTRAINT `foreign_inap` FOREIGN KEY (`inap_id`) REFERENCES `rawat_inap` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dokter`
--
ALTER TABLE `dokter`
  ADD CONSTRAINT `dokter_poli_id_foreign` FOREIGN KEY (`poli_id`) REFERENCES `poli` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  ADD CONSTRAINT `jadwal_dokter_dokter_id_foreign` FOREIGN KEY (`dokter_id`) REFERENCES `dokter` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `konten_navbar`
--
ALTER TABLE `konten_navbar`
  ADD CONSTRAINT `foreign_submenu` FOREIGN KEY (`submenu_id`) REFERENCES `submenu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rawat_jalan`
--
ALTER TABLE `rawat_jalan`
  ADD CONSTRAINT `rawat_jalan_dokter_id_foreign` FOREIGN KEY (`dokter_id`) REFERENCES `dokter` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `submenu`
--
ALTER TABLE `submenu`
  ADD CONSTRAINT `navbar_foreign` FOREIGN KEY (`navbar_id`) REFERENCES `navbar` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
