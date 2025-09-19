-- MySQL dump 10.13  Distrib 8.0.42, for Win64 (x86_64)
--
-- Host: localhost    Database: laravel
-- ------------------------------------------------------
-- Server version	8.0.42

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `berita`
--

DROP TABLE IF EXISTS `berita`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `berita` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_publish` date NOT NULL,
  `author` bigint unsigned NOT NULL,
  `dilihat` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `berita_author_foreign` (`author`),
  CONSTRAINT `berita_author_foreign` FOREIGN KEY (`author`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `berita`
--

LOCK TABLES `berita` WRITE;
/*!40000 ALTER TABLE `berita` DISABLE KEYS */;
INSERT INTO `berita` VALUES (5,'<p>Kominfo Kota Pariaman - Sebagai tindak lanjut pertemuan Wako Pariaman Yota Balad dengan Menteri Kesehatan Budi Gunadi Sadikin, terkait usulan Kebutuhan Kelanjutan Pembangunan Fisik Rumah Sakit Umum Daerah (RSUD) dr. Sadikin dan Perbaikan layanan Kesehatan lainnya di Kota Pariaman, Wako Yota Balad lakukan pengecekan pelayanan kesehatan bagi masyarakat di RS. Sadikin Kota Pariaman, Sabtu (9/8/2025) malam.</p><p>Hal tersebut dilakukannya guna&nbsp;memastikan pelayanan kesehatan bagi pasien dan masyarakat yang berobat tetap berjalan lancar meskipun ada beberapa kendala keterbatasan sarana dan prasarana.</p><p>Yota Balad mengatakan Pemko Pariaman terus berupaya meningkatkan fasilitas kesehatan serta sarana dan prasarana dan petugas medis.</p><p>Di akhir bulan lalu, ia telah menemui orang nomor satu di Kemenkes RI, bersama Kepala Dinas Kesehatan Kota Pariaman, Nazifah dan Direktur RSUD dr. Sadikin Kota Pariaman, dr. Anung Respati, guna memberikan proposal usulan kebutuhan kelanjutan pembangunan fisik RSUD dr. Sadikin Kota Pariaman, dan peningkatan layanan kesehatan lainnya di Kota Pariaman.</p><p>Kepada petugas dan dokter yang berada di RSUD. Sadikin, Yota Balad tegaskan tetap lakukan pelayanan prima bagi pasien dan masyarakat, karena tugas dari pelayan medis adalah melayani.</p><p>Sedangkan untuk urusan sarana prasarana kita telah sampaikan ke kementerian kesehatan pemenuhan pra sarana alat-alat kesehatannya, karena saat ini, RSUD dr. Sadikin telah ada penambahan gedung baru dan beberapa tenaga dokter dan dokter Spesialis baru.</p><p>\" Karena kita berkomitmen untuk memberikan pelayanan yang prima dalam melayani masyarakat Kota Pariaman, tidak terkecuali di bidang layanan Kesehatan. Dengan adanya kelanjutan pembangunan RSUD dan perbaikan beberapa Puskesmas dan Puskesmas Pembantu, kami yakin dapat semakin memberikan pelayanan yang lebih maksimal kepada masyarakat Kota Pariaman dan sekitarnya,\" ungkapnya.(fadli)</p>','Wako Pariaman Sidak Sarana Prasarana Layanan Umum Di RSUD. Sadikin Kota Pariaman','1758007866.png','2025-08-09',2,4,'2025-09-16 07:31:06','2025-09-16 07:31:06'),(6,'<p><strong>Kominfo Kota Pariaman</strong> --- Bertemu Menteri Kesehatan Budi Gunadi Sadikin, Wali Kota Pariaman Yota Balad sampaikan usulan Kebutuhan Kelanjutan Pembangunan Fisik Rumah Sakit Umum Daerah (RSUD) dr. Sadikin dan Perbaikan layanan Kesehatan lainya di Kota Pariaman. Bertempat di Kantor Kementerian Kesehatan Republik Indonesia (Kemenkes), yang berlokasi di Jl. H.R. Rasuna Said Blok X.5, Kav. 4-9, Kuningan, Jakarta Selatan, Provinsi DKI Jakarta, Kamis (30/7/2025).</p><p>Bertemu dengan orang nomor satu di Kemenkes RI, Wako Pariaman didampingi oleh Ketua TP PKK Kota Pariaman, Ny. dr. Yosneli Balad, Kepala Dinas Kesehatan Kota Pariaman, Nazifah dan Direktur RSUD dr. Sadikin Kota Pariaman, dr. Anung Respati.</p><p>“Alhamdulillah, Hari ini kami dari pemerintah Kota Pariaman bertemu dengan Pak Menteri Kesehatan dalam rangka memberikan proposal usulan kebutuhan kelanjutan pembangunan fisik RSUD dr. Sadikin Kota Pariaman, dan peningkatan layanan kesehatan lainya di Kota Pariaman,” ujar Yota Balad.</p><p>Melalui pertemuan ini, dirinya bermohon kepada Pak Menteri, agar kelanjutan pembangunan RSUD dr. Sadikin dapat diteruskan, serta pemenuhan pra sarana alat-alat kesehatannya, karena saat ini, RSUD dr. Sadikin telah ada penambahan gedung baru dan beberapa tenaga dokter dan dokter Spesialis baru, ungkapnya.</p><p>“Kemudian dari Dinas Kesehatan, menyampaikan usulan Relokasi Puskesmas Padusunan, Penambahan ruangan di Puskesmas Air Santok dan Puskesmas Naras, Penambahan Puskesmas Pembantu Pondok II dan Rambai serta Renovasi Puskesmas Pembantu yang mengalami rusak berat di Desa Tungkal Selatan, Desa Cubadak Air Utara dan Desa Marabau,” jelas mantan Sekda Kota Pariaman ini.</p><p>Yota Balad berharap, permintaan ditengah defisit negara ini, dapat dipenuhi oleh pemerintah pusat, apalagi dirinya bersama Wawako Mulyadi, memang berkomitmen dalam meningkatkan kualitas layanan kesehatan bagi masyarakat di Kota Pariaman, tuturnya.</p><p>“Kami, Yota Balad-Mulyadi berkomitmen untuk memberikan pelayanan yang prima dalam melayani masyarakat Kota Pariaman, tidak terkecuali di bidang layanan Kesehatan. Dengan adanya kelanjutan pembangunan RSUD dan perbaikan beberapa Puskesmas dan Puskesmas Pembantu, kami yakin dapat semakin memberikan pelayanan yang lebih maksimal kepada masyarakat Kota Pariaman dan sekitarnya,” tutupnya.</p><p>Sementara itu, Kepala Dinas Kesehatan Kota Pariaman Nazifah menyebutkan, bahwa selama ini pihaknya telah memberikan pelayanan Kesehatan kepada masyarakat Kota Pariaman dan sekitarnya yang berobat di RSUD dr. Sadikin, serta telah berkontribusi dalam rangka memberikan Pendapatan Asli Daerah (PAD) untuk Kota Pariaman.</p><p>“Untuk Realisasi PAD dari RSUD dr. Sadikin Kota Pariaman Pada Tahun 2024 kemaren, kita memperoleh PAD hampir mencapai Rp. 7,5 miliar rupiah, dan bertambahnya jumlah pasien yang berobat,” ucapnya.</p><p>Lebih lanjut Nazifah menyebutkan, dengan kelanjutan pembangunan RSUD dr. Sadikin dan pemenuhan alat kesehatannya, diharapkan dapat meningkatkan pelayanan kepada masyarakat, serta meningkatkan PAD Kota Pariaman kedepanya, ungkapnya mengakhiri.</p>','Bertemu Menteri Kesehatan, Wali Kota Pariaman Yota Balad sampaikan usulan Pembangunan Fisik RSUD dr. Sadikin dan Perbaikan layanan Kesehatan lainya di Kota Pariaman','1758008004.png','2025-07-30',2,NULL,'2025-09-16 07:33:24','2025-09-16 07:33:24'),(7,'<p>Di artikel sebelumnya, kita telah mempelajari pengertian, struktur, tujuan, unsur, dan kaidah kebahasaan yang digunakan dalam teks berita. Teks ini bisa kamu temukan di media cetak, media online, sampai media sosial, lho. Nah, seperti apa sih bentuk dari teks berita itu? Apakah hanya membicarakan hal-hal serius seperti politik dan ekonomi? Hmm, tentu tidak ya!&nbsp;</p><p><strong>Teks berita adalah teks memuat berbagai informasi</strong> seperti teknologi, olahraga, sosial budaya, ekonomi, politik, otomotif, sampai lingkungan. Kunci dari teks berita ada 2, yaitu <strong>faktual</strong> dan <strong>aktual</strong>. Faktual artinya berdasarkan fakta, sedangkan aktual artinya kejadian terkini.</p><p>Dalam teks berita, kita juga menemukan <strong>2 sampai 3 struktur penting</strong>. Hayo, masih ingat nggak? Yup, betul! Jawabannya ada <strong>Kepala Berita, Tubuh Berita, dan Ekor Berita.</strong> Khusus Ekor Berita sifatnya opsional ya, alias boleh ditambahkan atau tidak sama sekali.</p>','20 Contoh Teks Berita dan Strukturnya dalam Berbagai Topik','1758008181.png','2025-09-16',2,4,'2025-09-16 07:36:21','2025-09-16 07:36:21'),(8,'<p>Perdana Menteri (PM) Selandia Baru Chris Hipkins menyebut kawasan Pasifik menjadi lebih diperebutkan dan kurang aman setelah China menjadi semakin agresif di kawasan tersebut. Hipkins menyatakan negaranya perlu bekerja sama dengan mitra-mitra yang satu pemikiran sembari tetap terlibat dengan Beijing.</p><p>Seperti dilansir Reuters, Senin (17/7/2023), kebangkitan China dan bagaimana negara itu berupaya memberikan pengaruhnya, sebut Hipkins, telah menjadi pendorong utama meningkatnya persaingan strategis, khususnya di kawasan Indo-Pasifik.</p><p><strong>Tubuh Berita</strong></p><p>“Wilayah kami menjadi lebih diperebutkan, kurang bisa diprediksi dan kurang aman,” sebut Hipkins saat berpidato dalam China Business Summit di Auckland, pada Senin (17/7) waktu setempat.</p><p>“Dan itu menimbulkan tantangan bagi negara-negara kecil seperti Selandia Baru, yang bergantung pada stabilitas dan prediktabilitas aturan internasional untuk kemakmuran dan keamanan kita,” imbuhnya.</p><p>Hubungan itu, menurut Hipkins, membutuhkan pengelolaan yang penuh kehati-hatian namun demikian, China tetap menjadi mitra dagang utama bagi Selandia Baru.</p><p>Pidato Hipkins itu disampaikan dalam acara tahunan yang digelar kurang dari sebulan setelah dia memimpin misi perdagangan yang sukses ke China — mitra dagang terbesar Selandia Baru. Dalam misi itu, dia menghadapi beberapa kritikan dalam negeri karena dirinya tidak vokal soal hak asasi manusia (HAM) dan masalah-masalah lainnya seperti yang diharapkan beberapa pihak.</p>','PM Selandia Baru: Pasifik Jadi Kurang Aman karena Agresivitas China','1758008232.png','2025-09-16',2,3,'2025-09-16 07:37:12','2025-09-16 07:37:12'),(9,'<p>Ditreskrimsus Polda Metro Jaya tengah menyelidiki kasus penipuan lewat aplikasi kencan atau yang diidentikkan dengan film dokumenter berjudul The Tinder Swindler. Direktur Reskrimsus Polda Metro Jaya Polda Metro Jaya Kombes Ade Safri Simanjuntak menyebut ada dua korban yang membuat laporan ke pihak berwajib. Ia juga membeberkan aksi penipuan itu terjadi pada tahun ini.</p><p>“Ini masih kita lakukan penyelidikan, di laporan itu ada dan saat ini kita lakukan serangkaian upaya penyelidikan oleh tim penyelidik Subdit Siber Polda Metro Jaya,” kata Ade di Polda Metro Jaya, Selasa (22/8).</p><p><strong>Tubuh Berita</strong></p><p>Ade menerangkan kasus penipuan ini bermula saat korban dan terduga pelaku berkenalan dalam sebuah aplikasi kencan. Dari perkenalan itu, keduanya intens berkomunikasi dan menjadi akrab.</p><p>Setelah itu, pelaku mulai melancarkan aksinya. Pelaku pun melakukan berbagai bujuk rayu hingga korban akhirnya terbuai.</p><p>“Pada akhirnya korban tertarik dengan iming-iming maupun rayuan, kemudian menyerahkan sejumlah uang kepada pelaku,” ucap Ade.</p><p>“Iming-iming, rayuan, mengelabui korban untuk serahkan sejumlah uang yang merupakan janji dari pelaku ini membuat bisnis baru dan sebagainya,” sambungnya.</p>','Kasus Tinder Swindler Indonesia, Kerugian Korban Ditaksir Ratusan Juta','1758008276.png','2025-09-15',2,1,'2025-09-16 07:37:56','2025-09-16 07:37:56'),(10,'<p>Kementerian Komunikasi dan Informatika (Kominfo) menyebut pihaknya akan melakukan prosedur standar untuk menelusuri dugaan kebocoran data Kependudukan dan Pencatatan Sipil (Dukcapil).</p><p>“Kita biasanya akan memanggil atau berkoordinasi dengan yang namanya pengendali data, dalam hal ini kalau Dukcapil itu kan adanya di Kemendagri, nanti kita akan koordinasi termasuk juga dengan BSSN,” ujar Usman Kansong , Direktur Jenderal Informasi dan Komunikasi Publik (Dirjen IKP) Kominfo di Kantor Kominfo, Jakarta, Senin (17/7).</p><p><strong>Tubuh Berita</strong></p><p>“Ya itu standar,” imbuhnya.</p><p>Usman menyebut pihaknya akan mendengarkan laporan dari Disdukcapil. Kemudian, BSSN biasanya akan melakukan audit untuk “mencari tau data yang mana yang bocor, berapa banyak, baru kemudian dilaporkan ke Kominfo kita akan lihat kalo ada pengendalian data yang tidak baik maka sudah diatur dalam PP 71 tahun 2019 sanksi apa yg bisa kita jatuhkan kepada pengendali data.”</p><p>Sebelumnya, sebanyak 337 juta data masyarakat di Direktorat Dukcapil Kementerian Dalam Negeri (Kemendagri) diduga mengalami kebocoran dan dijual di forum online hacker BreachForums.</p>','300 Juta Data Dukcapil Diduga Bocor, Kominfo Lakukan Prosedur Standar','1758008323.png','2025-09-16',2,NULL,'2025-09-16 07:38:43','2025-09-16 07:38:43'),(11,'<p>PENGAMAT transportasi Djoko Setijowarno mengungkapkan tarif LRT Jabodebek yang diputuskan oleh Kementerian Perhubungan sebesar Rp24 ribu untuk rute terjauh dari Stasiun Harjamukti ke Dukuh Atas sudah wajar dan sesuai. Angka tersebut sudah sesuai dengan perhitungan jarak tempuh yang mencapai 27,3 km serta sesuai kemampuan calon penumpang.&nbsp;</p><p>“Ini sudah sesuai. Apalagi ini sudah disubsidi. Tanpa subsidi tarifnya Rp50 ribu,” kata Djoko saat dikonfirmasi Media Indonesia, Minggu (23/7). Djoko mengatakan, salah satu sasaran penumpang LRT Jabodebek merupakan warga perumahan yang tinggal di kawasan elit seperti Sentul, Bogor, hingga Kota Bekasi.</p><p><strong>Tubuh Berita</strong></p><p>Dalam sebuah survei kecil-kecilan yang pernah ia lakukan, warga Bekasi dan Bogor yang mengendarai mobil untuk bekerja ke Jakarta setiap hari rata-rata mengeluarkan biaya Rp75 ribu hingga Rp100 ribu per hari.</p><p>“Itu termasuk tarif tol, bensin, dan biaya parkir,” ujarnya.</p><p>Kementerian Perhubungan melalui Badan Pengelola Transportasi Jabodebek (BPTJ) menyediakan layanan pengumpan atau ‘feeder’ dalam bentuk bus. BPTJ sebelumnya sudah memiliki layanan ini melalui bus JR Connexion. Penyediaan bus atau angkutan pengumpan ini juga bisa bekerja sama dengan pemda setempat yang wilayahnya dilalui oleh LRT Jabodebek.</p><p>&nbsp;“Yang harus dilakukan adalah menekan ongkos dari rumah ke stasiun. Ini bisa dengan bus. Busnya wara-wiri saja dari komplek perumahan ke stasiun bayar Rp10 ribu. Ini sudah cukup menjanjikan bisa menekan,” tuturnya.&nbsp;</p><p>Penyediaan bus pengumpan, dinilainya lebih efektif ketimbang menyediakan sarana kantong parkir atau ‘park and ride’. Sebab, berbeda dengan PT KCI yang memiliki lahan luas di beberapa area stasiunnya sehingga bisa menyediakan parkir, Kemenhub tidak memiliki lahan di sekitar stasiun-stasiun LRT Jabodebek yang bisa dijadikan lahan parkir.</p>','Tarif Rp24 Ribu Rute Terjauh LRT Dinilai Wajar','1758008369.png','2025-09-09',2,4,'2025-09-16 07:39:29','2025-09-16 07:39:29'),(12,'<p>TIMNAS voli putra Indonesia berhasil meraih gelar juara SEA V League 2023 pekan pertama usai mengalahkan Thailand 3-1 (21-25, 25-17, 25-23, dan 27-25) di GOR Candradimuka Padepokan Voli Jenderal Polisi Kunarto, Sentul, Bogor, Minggu (23/7) malam. Ini merupakan kemenangan ketiga dari tiga laga di kompetisi liga antarnegara.&nbsp;</p><p><strong>Tubuh Berita</strong></p><p>Dua laga sebelumnya didapatkan dari Filipina dan Vietnam dengan skor sama 3-0.&nbsp; Pelatih timnas Indonesia Jeff Jiang mengaku bangga dengan perjuangan anak asuhnya di laga pamungkas. “Saya bangga dengan anak-anak. Mereka bekerja keras dan bermain baik.&nbsp; <i>Teamwork</i> juga sangat baik, berbeda dengan saat di Cina Taipei, mungkin kalau di Taipei bermain seperti ini kami bisa menang,” ujar Jiang.</p><p>Di Filipina pekan ini, Indonesia akan turun dengan materi pemain yang sama. Di Filipina, akan berlangsung event yang sama pekan kedua, pada 28-30 Juli mendatang. Sementara tim Thailand akan turun dengan materi pemain yang berbeda. Pasalnya, tim Thailand yang berlaga di Sentul ini akan langsung bertolak ke Qatar menghadapi FIVB Challenge Cup 2023 pada pekan depan. Pemain terbaik (MVP), Fahri Septian Putratama menyebut laga terakhir ini dia dan rekan-rekannya bermain lebih baik. “Semua berjalan sesuai rencana,” kata Fahri.</p><p>Kekalahan di Taiwan dari Thailand, katanya juga sudah dievaluasi. “Thailand sebenarnya bermain sama seperti di Taiwan tetapi kami bermain jauh lebih baik dibanding di Taiwan,” lanjut Fahri.</p>','Indonesia Juara SEA V League 2023 Pekan Pertama','1758008414.png','2025-09-08',2,12,'2025-09-16 07:40:14','2025-09-16 07:40:14'),(13,'<p>Bandara Soekarno-Hatta, Tangerang, Banten akan direvitalisasi selama sekitar enam bulan ke depan. Hal ini dilakukan untuk meningkatkan kapasitas dan produktivitas pergerakan penumpang dan pesawat.</p><p>“Kurang lebih sekitar enam bulan lagi ini semua bisa diselesaikan sehingga dapat memenuhi demand yang semakin meningkat. Bandara Soetta akan menjadi showcase-nya negara Indonesia di mata dunia,” ujar Menteri Perhubungan Budi Karya Sumadi, Sabtu (22/7/2023), seperti dikutip dari keterangan tertulis yang diterima Kompas.com.</p><p><strong>Tubuh Berita</strong></p><p>Budi Karya menambahkan, kapasitas Bandara Soekarno-Hatta akan ditingkatkan menjadi 110 juta penumpang per tahun, dari kapasitas sebelumnya 65 juta per tahun. Kapasitas Bandara Soekarno-Hatta akan ditingkatkan menjadi 110 juta penumpang per tahun, dari kapasitas sebelumnya 65 juta per tahun.&nbsp;</p><p>Jika berencana terbang dari atau ke Bandara Soekarno-Hatta, ketahui beberapa area yang menjadi objek revitalisasi. Untuk sisi darat (land side) dikerjakan oleh Angkasa Pura II (AP II) bersama kontraktor PT PP di Terminal 1B dan 1C domestik, sementara di Terminal 2F internasional dikerjakan oleh AP II dan Adhi Karya.</p><p>Sedangkan untuk sisi udara (air side), landas pacu atau runway dikerjakan oleh AP II dan pemasangan sistem untuk meningkatkan produktivitas pergerakan pesawat oleh Airnav Indonesia.&nbsp;</p>','Bandara Soekarno-Hatta Direvitalisasi, Catat Area yang Terdampak','1758008459.png','2025-09-15',2,NULL,'2025-09-16 07:40:59','2025-09-16 07:40:59'),(14,'<p>Presiden Joko Widodo atau Jokowi bertolak ke Chengdu, China pagi ini, Kamis, 27 Juni 2023 dari Bandara Halim Perdanakusuma, Jakarta Timur. Dalam lawatannya ke negeri tirai bambu tersebut, salah satu agenda utamanya adalah bertemu dengan Presiden Cina Xi Jinping.&nbsp;</p><p><strong>Tubuh Berita</strong></p><p>Jokowi mengklaim kunjungannya ke Cina juga dalam rangka memenuhi undangan Xi Jinping dan sekaligus memperingati 10 tahun kemitraan komprehensif Indonesia-Cina. Menurut Jokowi, Cina adalah mitra dagang dan investasi terbesar bagi Indonesia.&nbsp;</p><p>“Saya akan melakukan pertemuan dengan Presiden Xi Jinping dan sejumlah agenda prioritas akan saya bahas bersama Presiden Xi, baik investasi maupun proyek strategis Indonesia dan RRT (Republik Rakyat Tiongkok), juga di bidang perdagangan dan kesehatan serta isu-isu regional dan global,” ujar Jokowi di Bandara Halim Perdanakusuma, Jakarta Timur, Kamis, 27 Juli 2023.&nbsp;</p>','Jokowi Terbang ke Cina Pagi Ini, Temui Xi Jinping untuk Bahas Investasi','1758008778.png','2025-09-09',2,NULL,'2025-09-16 07:46:18','2025-09-16 07:46:18');
/*!40000 ALTER TABLE `berita` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chats`
--

DROP TABLE IF EXISTS `chats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chats` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `reply_to` text COLLATE utf8mb4_unicode_ci,
  `time` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chats`
--

LOCK TABLES `chats` WRITE;
/*!40000 ALTER TABLE `chats` DISABLE KEYS */;
INSERT INTO `chats` VALUES (33,'jack sparrow','dfg',0,'pending',NULL,NULL,'2025-09-19 03:16:31','2025-09-19 03:16:31'),(34,'haris','hh',0,'pending',NULL,NULL,'2025-09-19 03:19:31','2025-09-19 03:19:31'),(35,'haris','tyu',0,'pending',NULL,NULL,'2025-09-19 03:20:30','2025-09-19 03:20:30'),(36,'Admin','hh',1,'0','haris',NULL,'2025-09-19 03:21:04','2025-09-19 03:21:04'),(37,'Admin','y',1,'0','haris',NULL,'2025-09-19 03:23:03','2025-09-19 03:23:03');
/*!40000 ALTER TABLE `chats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail_inap`
--

DROP TABLE IF EXISTS `detail_inap`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detail_inap` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `inap_id` bigint unsigned NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `foreign_inap` (`inap_id`),
  CONSTRAINT `foreign_inap` FOREIGN KEY (`inap_id`) REFERENCES `rawat_inap` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_inap`
--

LOCK TABLES `detail_inap` WRITE;
/*!40000 ALTER TABLE `detail_inap` DISABLE KEYS */;
INSERT INTO `detail_inap` VALUES (9,8,'1757986752_68c8bfc0b20c6_anak.JPG','2025-09-15 18:39:12','2025-09-15 18:39:12'),(10,8,'1757986780_68c8bfdc7e160_anak 4.JPG','2025-09-15 18:39:40','2025-09-15 18:39:40'),(11,8,'1757986902_68c8c056a987f_anak 2.JPG','2025-09-15 18:41:42','2025-09-15 18:41:42'),(12,8,'1757986913_68c8c06149c3b_anak 3.JPG','2025-09-15 18:41:53','2025-09-15 18:41:53'),(13,8,'1757986922_68c8c06a95291_anak 5.JPG','2025-09-15 18:42:02','2025-09-15 18:42:02'),(14,9,'1757986933_68c8c075b99dc_bedah 1.JPG','2025-09-15 18:42:13','2025-09-15 18:42:13'),(15,9,'1757986946_68c8c082189f0_bedah 2.JPG','2025-09-15 18:42:26','2025-09-15 18:42:26'),(16,10,'1757986961_68c8c091cf06f_non bedah.JPG','2025-09-15 18:42:41','2025-09-15 18:42:41'),(17,10,'1757986972_68c8c09cc4811_non bedah 2.JPG','2025-09-15 18:42:52','2025-09-15 18:42:52'),(18,10,'1757986983_68c8c0a78a127_non bedah 3.JPG','2025-09-15 18:43:03','2025-09-15 18:43:03'),(19,10,'1757986994_68c8c0b2c16d2_non bedah 4.JPG','2025-09-15 18:43:14','2025-09-15 18:43:14'),(20,11,'1757987007_68c8c0bf15981_angso duo 1.JPG','2025-09-15 18:43:27','2025-09-15 18:43:27'),(21,11,'1757987017_68c8c0c97dc79_angso duo 2.JPG','2025-09-15 18:43:37','2025-09-15 18:43:37'),(22,11,'1757987027_68c8c0d38b282_angso duo 3.JPG','2025-09-15 18:43:47','2025-09-15 18:43:47'),(23,11,'1757987037_68c8c0dd773d1_angso duo 4.JPG','2025-09-15 18:43:57','2025-09-15 18:43:57');
/*!40000 ALTER TABLE `detail_inap` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dokter`
--

DROP TABLE IF EXISTS `dokter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dokter` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poli_id` bigint unsigned NOT NULL,
  `jk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail_jabatan` varchar(800) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `dokter_poli_id_foreign` (`poli_id`),
  CONSTRAINT `dokter_poli_id_foreign` FOREIGN KEY (`poli_id`) REFERENCES `poli` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dokter`
--

LOCK TABLES `dokter` WRITE;
/*!40000 ALTER TABLE `dokter` DISABLE KEYS */;
INSERT INTO `dokter` VALUES (5,'dr. Rika Haryanti, Sp.A','1757923864.png',1,'Perempuan','Tenaga Medis','Dr. Spesialis Anak','2025-09-15 01:11:04','2025-09-15 01:11:15'),(6,'dr. Rudi Efendi, Sp.A','1757923983.png',1,'Laki-Laki','Tenaga Medis','Dr. Spesialis Anak','2025-09-15 01:13:03','2025-09-15 01:13:03'),(7,'dr. Muhammad Ivan, Sp.B','1757924161.png',3,'Laki-Laki','Tenaga Medis','Dr. Spesialis Bedah','2025-09-15 01:16:01','2025-09-15 01:16:01');
/*!40000 ALTER TABLE `dokter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `foto_dashboard`
--

DROP TABLE IF EXISTS `foto_dashboard`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `foto_dashboard` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan` int NOT NULL,
  `judul` varchar(2500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `foto_dashboard`
--

LOCK TABLES `foto_dashboard` WRITE;
/*!40000 ALTER TABLE `foto_dashboard` DISABLE KEYS */;
INSERT INTO `foto_dashboard` VALUES (3,'EoXesH4O3jn6TcHetOukWhatsApp Image 2025-09-15 at 2.23.28 PM.jpeg',1,'Test','2025-09-15 00:24:39','2025-09-15 00:24:39'),(4,'XyBMhkisjgy54HGHChyWWhatsApp Image 2025-09-15 at 2.23.27 PM.jpeg',2,'hellow','2025-09-15 00:24:51','2025-09-15 00:24:51');
/*!40000 ALTER TABLE `foto_dashboard` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `galeris`
--

DROP TABLE IF EXISTS `galeris`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `galeris` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan` varchar(2500) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galeris`
--

LOCK TABLES `galeris` WRITE;
/*!40000 ALTER TABLE `galeris` DISABLE KEYS */;
/*!40000 ALTER TABLE `galeris` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `img`
--

DROP TABLE IF EXISTS `img`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `img` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `indikator_mutu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `standar_pelayanan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jadwal_dokter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `img`
--

LOCK TABLES `img` WRITE;
/*!40000 ALTER TABLE `img` DISABLE KEYS */;
INSERT INTO `img` VALUES (1,'1757557264_indikator.pdf','1757300280.png','1757300176.png','2025-09-07 19:56:16','2025-09-10 19:21:04'),(2,'1757557292_indikator.pdf','1757557292_standar.pdf','1757557292_jadwal.png','2025-09-10 19:21:32','2025-09-10 19:21:32');
/*!40000 ALTER TABLE `img` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inovasi`
--

DROP TABLE IF EXISTS `inovasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `inovasi` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` int NOT NULL,
  `deskripsi` varchar(10000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sop` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manual_book` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_publish` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inovasi`
--

LOCK TABLES `inovasi` WRITE;
/*!40000 ALTER TABLE `inovasi` DISABLE KEYS */;
INSERT INTO `inovasi` VALUES (1,'OBAT MAGER (Optimalisasi pengendalian Obat Melalui pencatatan Berbasis Web Google spreadsheet)',2024,'<p>Menurut Peraturan Kementrian Kesehatan Nomor 72 Tahun 2016, pelayanan kefarmasian adalah suatu pelayanan langsung dan bertanggung jawab kepada pasien yang berkaitan dengan sediaan farmasi yang bermaksud mencapai hasil yang pasti untuk meningkatkan mutu kehidupan pasien. Standar Pelayanan Kefarmasian di Rumah Sakit meliputi dua kegiatan yaitu bersifat manajerial berupa standar pengelolaan sediaan farmasi dan standar pelayanan farmasi klinik.</p><p>Untuk menjamin mutu pelayanan di Rumah Sakit, harus dilakukan evaluasi mutu pelayanan dengan memperhatikan pengendalian terhadap sediaan farmasi. Pengendalian dilakukan untuk mempertahankan jenis dan jumlah persediaan sesuai kebutuhan pelayanan, melalui pengaturan sistem pesanan atau pengadaan, penyimpanan dan pengeluaran. Hal ini bertujuan untuk menghindari terjadinya kelebihan, kekurangan, kekosongan, kerusakan, kadaluwarsa, dan kehilangan obat.</p><p>Dengan adanya pengendalian persediaan farmasi yang baik, maka akan mempengaruhi kualitas layanan yang diberikan kepada pasien. Saat ini RSUD dr.Sadikin Kota Pariaman sudah menerapkan pengendalian persediaan farmasi yang cukup baik, tetapi masih bisa ditingkatkan agar kualitas pelayanan kepada pasien juga semakin bagus. Salah satu aspek yang dapat ditingkatkan adalah aspek pencatatan.</p><p>Gudang farmasi mempunyai fungsi sebagai tempat penyimpanan yang merupakan kegiatan dan usaha untuk mengelola barang persediaan farmasi yang dilakukan sedemikian rupa agar kualitas dapat diperhatikan, barang terhindar dari kerusakan fisik, pencarian barang mudah dan cepat, barang aman dari pencuri dan mempermudah pengawasan stok. Instalasi Farmasi RSUD dr. Sadikin memiliki satu gudang &nbsp;yang digunakan sebagai sarana untuk penyimpanan produk-produk farmasi yakni obat-obatan dan Bahan Medis Habis Pakai (BMHP) yang letaknya terpisah dari ruangan Instalasi Farmasi yang dikelola oleh 1 orang Apoteker.</p><p>Gudang ini berperan sebagai jantung dari manajemen logistik karena sangat menentukan kelancaran dari pendistribusian. Setiap hari proses distribusi terjadi di gudang ini, mulai dari barang masuk dari <i>supplier </i>serta pengeluaran barang baik itu kebutuhan untuk ke bagian rawat inap, rawat jalan, dan unit-unit pelayanan rumah sakit lainnya. Pada setiap proses distribusi tersebut dibutuhkan proses pencatatan untuk mempermudah pengawasan stok.</p><p>Pencatatan di gudang farmasi selama ini sudah cukup baik dengan menggunakan bantuan media komputer dan <i>Microsoft Excel. </i>Namun masih ada beberapa kendala yang dapat ditemui dalam hal tersebut seperti:</p><p>1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Terjadi duplikasi file karena folder penyimpanan file yang letaknya tidak pada satu tempat yang tetap.</p><p><strong>2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong>File yang terduplikasi dalam jumlah banyak menyulitkan untuk mencari file yang benar-benar sudah ter-<i>update.</i></p><p>3.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; File hanya bisa dibuka di komputer rumah sakit, jika ingin melihat file tersebut ke luar rumah sakit maka diperlukan pihak ketiga untuk mengirimkannya.</p><p>Masalah yang teridentifikasi ini dapat menghambat efektifitas pencatatan dan pengdokumentasian stok obat, karena apabila sewaktu-waktu file itu tersebut dibutuhkan maka hanya petugas gudang saja yang benar-benar tahu dimana letak file tersebut sehingga menyulitkan petugas lain yang ingin tahu informasi terkait stok obat ter<i>-update</i>.</p>','1757989902.pdf','1757989902.pdf','1757989902.png','1757989902.png','2024-06-11','2025-09-15 19:31:42','2025-09-15 19:31:42');
/*!40000 ALTER TABLE `inovasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jadwal_dokter`
--

DROP TABLE IF EXISTS `jadwal_dokter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jadwal_dokter` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `hari` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `dokter_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `jadwal_dokter_dokter_id_foreign` (`dokter_id`),
  CONSTRAINT `jadwal_dokter_dokter_id_foreign` FOREIGN KEY (`dokter_id`) REFERENCES `dokter` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jadwal_dokter`
--

LOCK TABLES `jadwal_dokter` WRITE;
/*!40000 ALTER TABLE `jadwal_dokter` DISABLE KEYS */;
INSERT INTO `jadwal_dokter` VALUES (4,'Senin','08:00:00','13:00:00',5,'2025-09-15 01:12:07','2025-09-15 01:12:07'),(5,'Selasa','08:00:00','13:00:00',5,'2025-09-15 01:12:07','2025-09-15 01:12:07'),(6,'Rabu','08:00:00','13:00:00',5,'2025-09-15 01:12:07','2025-09-15 01:12:07'),(7,'Jumat','08:00:00','13:00:00',5,'2025-09-15 01:12:07','2025-09-15 01:12:07'),(8,'Selasa','08:00:00','13:00:00',6,'2025-09-15 01:13:37','2025-09-15 01:13:37'),(9,'Kamis','08:00:00','13:00:00',6,'2025-09-15 01:13:37','2025-09-15 01:13:37'),(10,'Jumat','08:00:00','13:00:00',6,'2025-09-15 01:13:37','2025-09-15 01:13:37'),(11,'Senin','08:00:00','12:00:00',7,'2025-09-16 08:09:04','2025-09-16 08:09:04');
/*!40000 ALTER TABLE `jadwal_dokter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kontak`
--

DROP TABLE IF EXISTS `kontak`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kontak` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(2500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kontak`
--

LOCK TABLES `kontak` WRITE;
/*!40000 ALTER TABLE `kontak` DISABLE KEYS */;
INSERT INTO `kontak` VALUES (1,'Alamat','Jalan Nostalgia, Desa Kampung Gadang Padusunan, Kecamatan Pariaman Timur, Kota Pariaman, Sumatera Barat.','2025-09-17 03:40:38','2025-09-17 03:40:38'),(2,'Email','rsudsadikin@pariamankota.go.id','2025-09-17 03:41:42','2025-09-17 03:41:42'),(3,'Instagram','https://www.instagram.com/sadikin_rsud/','2025-09-17 03:42:00','2025-09-17 04:28:09'),(4,'Facebook','https://www.facebook.com/rsuddrsadikinkotapariaman/?locale=id_ID','2025-09-17 03:42:21','2025-09-17 04:28:45'),(5,'TikTok','https://www.tiktok.com/@rsuddrsadikinpariaman','2025-09-17 03:42:43','2025-09-17 04:29:19');
/*!40000 ALTER TABLE `kontak` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_google`
--

DROP TABLE IF EXISTS `login_google`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `login_google` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_login` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login_google_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_google`
--

LOCK TABLES `login_google` WRITE;
/*!40000 ALTER TABLE `login_google` DISABLE KEYS */;
/*!40000 ALTER TABLE `login_google` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_googles`
--

DROP TABLE IF EXISTS `login_googles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `login_googles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_login` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_googles`
--

LOCK TABLES `login_googles` WRITE;
/*!40000 ALTER TABLE `login_googles` DISABLE KEYS */;
INSERT INTO `login_googles` VALUES (1,'alfan firebase','alfanfirebase@gmail.com','2025-09-18 01:41:29','2025-09-16 03:06:40','2025-09-18 01:41:30');
/*!40000 ALTER TABLE `login_googles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2025_09_01_021636_create_foto_dashboard_tabel',1),(6,'2025_09_01_022030_create_profil_tabel',1),(7,'2025_09_01_022312_create_kontak_tabel',1),(8,'2025_09_01_023025_create_ugd_tabel',1),(9,'2025_09_01_023113_create_poli_tabel',1),(10,'2025_09_01_023200_create_dokter_tabel',1),(11,'2025_09_01_023544_create_jadwal_dokter_tabel',1),(12,'2025_09_01_023758_create_rawat_inap_tabel',1),(13,'2025_09_01_023844_create_rawat_jalan_tabel',1),(14,'2025_09_01_023916_create_penunjang_tabel',1),(15,'2025_09_01_024045_create_inovasi_tabel',1),(16,'2025_09_01_024221_create_pegawai_tabel',1),(17,'2025_09_01_024336_create_berita_tabel',1),(18,'2025_09_01_024519_create_img_tabel',1),(19,'2025_09_15_030410_create_login_google_table',2),(20,'2025_09_16_195638_create_pengunjungwebs_table',3),(21,'2025_09_18_060232_create_votings_table',4),(22,'0000_00_00_000000_create_websockets_statistics_entries_table',5),(23,'2025_09_18_214041_create_chats_table',6);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `misis`
--

DROP TABLE IF EXISTS `misis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `misis` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `misi` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `misis`
--

LOCK TABLES `misis` WRITE;
/*!40000 ALTER TABLE `misis` DISABLE KEYS */;
INSERT INTO `misis` VALUES (1,'Meningkatkan kualitas sumber daya manusia melalui pembinaan, pelatihan, dan pendidikan','2025-09-15 00:29:22','2025-09-15 00:29:22'),(2,'Menyediakan sarana dan prasarana yang modern dan bermutu','2025-09-15 00:29:38','2025-09-15 00:29:38'),(3,'Meningkatkan pelayanan kesehatan yang aman, profesional, dan bermutu secara berkelanjutan','2025-09-15 00:30:12','2025-09-15 00:30:12');
/*!40000 ALTER TABLE `misis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `motos`
--

DROP TABLE IF EXISTS `motos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `motos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `moto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `motos`
--

LOCK TABLES `motos` WRITE;
/*!40000 ALTER TABLE `motos` DISABLE KEYS */;
INSERT INTO `motos` VALUES (1,'Melayani dengan ikhlas dan profesional.','2025-09-15 00:28:24','2025-09-15 00:28:24');
/*!40000 ALTER TABLE `motos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organisasis`
--

DROP TABLE IF EXISTS `organisasis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organisasis` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `deskripsi` text COLLATE utf8mb4_general_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organisasis`
--

LOCK TABLES `organisasis` WRITE;
/*!40000 ALTER TABLE `organisasis` DISABLE KEYS */;
INSERT INTO `organisasis` VALUES (1,'<p>Direktur : dr. Anung Respati, M.K.M</p>','GQD6iLZ845struktur_org sadikin.jpg','2025-09-15 00:41:02','2025-09-15 00:41:02');
/*!40000 ALTER TABLE `organisasis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pegawai`
--

DROP TABLE IF EXISTS `pegawai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pegawai` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail_jabatan` varchar(2500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pegawai`
--

LOCK TABLES `pegawai` WRITE;
/*!40000 ALTER TABLE `pegawai` DISABLE KEYS */;
INSERT INTO `pegawai` VALUES (2,'dr. Anung Respati, M.K.M','Perempuan','Pimpinan','1757988754.png','Plt Direktur','2025-09-15 19:12:34','2025-09-15 19:12:34');
/*!40000 ALTER TABLE `pegawai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengaduans`
--

DROP TABLE IF EXISTS `pengaduans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pengaduans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nik` bigint NOT NULL,
  `tanggal_kunjungan` date NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `pesan` varchar(2500) COLLATE utf8mb4_general_ci NOT NULL,
  `balasan` varchar(2500) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengaduans`
--

LOCK TABLES `pengaduans` WRITE;
/*!40000 ALTER TABLE `pengaduans` DISABLE KEYS */;
INSERT INTO `pengaduans` VALUES (1,'disti',137109501000100001,'2025-09-11','disti@gmail.com','pelayanan oke','oke terima kasih ya',NULL,NULL,'2025-09-10 21:26:59'),(2,'wer',1302035802970001,'2025-09-22','alfanfirebase@gmail.com','rewrwer','<p>234234234234234234234</p><p>4234</p><p><strong>4</strong></p><p><strong>2342</strong></p><p><strong>34</strong></p><p><strong>23</strong></p><p><strong>42</strong></p><p><strong>34</strong></p><p><strong>2</strong></p><p><strong>34234</strong></p><p><strong>sdf</strong></p><p><strong>sf</strong></p><p>&nbsp;</p><p><strong>sdf</strong></p>','2025-09-16','2025-09-16 03:10:48','2025-09-17 07:24:41'),(3,'werwer',1302035802970001,'2025-09-15','rickow098@gmail.com','rewrwe','<p>Terima kasih telah menghubungi kami dan menyampaikan keluhan Anda mengenai [sebutkan secara singkat topik keluhan, mis. pengalaman Anda dengan layanan kami pada tanggal X]. Kami mohon maaf atas ketidaknyamanan yang mungkin Anda alami.&nbsp;</p><p>&nbsp;</p><p>Kami sangat menghargai waktu dan upaya Anda untuk memberikan umpan balik ini. Keluhan Anda penting bagi kami, dan kami akan segera menindaklanjutinya. Tim kami sedang meninjau detail masalah Anda untuk menemukan solusi terbaik.&nbsp;</p><p>&nbsp;</p><p>Kami berkomitmen untuk memberikan pengalaman terbaik bagi pelanggan kami dan terus berupaya meningkatkan layanan kami berdasarkan masukan seperti yang Anda berikan.&nbsp;</p><p>&nbsp;</p><p>Kami akan segera memberi Anda pembaruan mengenai status penyelesaian keluhan Anda. Jika Anda memiliki informasi tambahan yang dapat membantu kami, jangan ragu untuk membalas email ini.&nbsp;</p><p>&nbsp;</p><p>Terima kasih sekali lagi atas kesabaran dan pengertian Anda.&nbsp;</p><p>&nbsp;</p><p>Hormat kami,</p><p>&nbsp;</p><p>[Nama Anda/Nama Tim/Nama Perusahaan]</p><p>&nbsp;</p><p>[Informasi Kontak Anda]</p>','2025-09-16','2025-09-16 03:11:35','2025-09-17 08:00:33');
/*!40000 ALTER TABLE `pengaduans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengunjungwebs`
--

DROP TABLE IF EXISTS `pengunjungwebs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pengunjungwebs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `pengunjung` bigint NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengunjungwebs`
--

LOCK TABLES `pengunjungwebs` WRITE;
/*!40000 ALTER TABLE `pengunjungwebs` DISABLE KEYS */;
INSERT INTO `pengunjungwebs` VALUES (1,19,'2025-09-16','2025-09-16 13:03:45','2025-09-16 14:03:07'),(2,74,'2025-09-17','2025-09-17 01:27:56','2025-09-17 08:09:19'),(3,136,'2025-09-18','2025-09-17 23:10:41','2025-09-18 15:32:34'),(4,23,'2025-09-19','2025-09-18 22:54:55','2025-09-19 03:20:22');
/*!40000 ALTER TABLE `pengunjungwebs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penunjang`
--

DROP TABLE IF EXISTS `penunjang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `penunjang` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `penunjang` varchar(2500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(2500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penunjang`
--

LOCK TABLES `penunjang` WRITE;
/*!40000 ALTER TABLE `penunjang` DISABLE KEYS */;
INSERT INTO `penunjang` VALUES (1,'Laboratorium','<p>fasilitas medis yang berfungsi untuk melakukan pengukuran, pengujian, dan analisis terhadap spesimen biologis (seperti darah, urin, dan jaringan) dari pasien untuk membantu dokter dalam diagnosis, penanganan, dan pemantauan penyakit serta kondisi kesehatan, serta untuk mendukung upaya penyembuhan dan pemulihan kesehatan pasien secara akurat dan tepat waktu.</p>','1757925927.jpg','2025-09-15 01:45:27','2025-09-15 01:45:27'),(2,'Radiologi','<p>ilmu kedokteran yang menggunakan teknologi pencitraan, seperti sinar-X, CT scan, MRI, dan USG, untuk mendiagnosis, memantau, dan mengobati penyakit.</p>','1757925987.jpg','2025-09-15 01:46:27','2025-09-15 01:46:27');
/*!40000 ALTER TABLE `penunjang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `poli`
--

DROP TABLE IF EXISTS `poli`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `poli` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_poli` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `poli`
--

LOCK TABLES `poli` WRITE;
/*!40000 ALTER TABLE `poli` DISABLE KEYS */;
INSERT INTO `poli` VALUES (1,'Poli Anak','<p>Poliklinik Anak adalah pelayanan pemeriksaan, diagnosis, pengobatan, serta pemantauan tumbuh kembang bayi, anak, dan remaja.&nbsp;</p>','1757923636.png','2025-09-02 20:53:06','2025-09-15 01:07:16'),(3,'Poli Bedah','<p>Poliklinik Bedah memberikan layanan pemeriksaan, konsultasi, dan tindak lanjut bagi penanganan kasus bedah umum.</p>','1757923690.png','2025-09-15 01:08:10','2025-09-15 01:08:10'),(5,'Poli Gigi','<p>Poliklinik Gigi memberikan layanan pemeriksaan, perawatan, dan pemeliharaan kesehatan gigi dan mulut.</p>','1758010115.png','2025-09-16 08:08:35','2025-09-16 08:08:35');
/*!40000 ALTER TABLE `poli` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profil`
--

DROP TABLE IF EXISTS `profil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profil` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `sejarah` varchar(2500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `misi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `struktur_org` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `moto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profil`
--

LOCK TABLES `profil` WRITE;
/*!40000 ALTER TABLE `profil` DISABLE KEYS */;
INSERT INTO `profil` VALUES (2,'Nama dr. Sadikin sendiri merupakan seorang tentara pejuang berpangkat Kolonel beristrikan gadis Pariaman. Sebagai sumando rang Pariaman dan dokter pada era tahun 1940-an, Sadikin dikenal sebagai seorang dokter pelayan masyarakat tanpa pamrih dan berjiwa filantropis.\r\n\r\nHal tersebut diungkapkan Walikota Pariaman, H. Mukhlis Rahman, Dt. Rajo Basa didampingi Wakil Walikota Pariaman, H. Genius Umar, Dt. Rangkayo Rajo Gandam, Dandim 0308/Pariaman Letkol Arh, Endro Nurbantoro dan Sekdako Indra Sakti, Sabtu (24/12).','test','test','test','test',1,NULL,NULL);
/*!40000 ALTER TABLE `profil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rawat_inap`
--

DROP TABLE IF EXISTS `rawat_inap`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rawat_inap` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(2500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rawat_inap`
--

LOCK TABLES `rawat_inap` WRITE;
/*!40000 ALTER TABLE `rawat_inap` DISABLE KEYS */;
INSERT INTO `rawat_inap` VALUES (8,'Rawat Inap Kebidanan, Perinatologi dan Anak','<p>Ruang Rawat Inap Kebidanan, Perinatologi dan Anak adalah ruang perawatan yang merawat pasien anak-anak, mulai dari bayi hingga remaja, dan yang menangani kasus kegawatdaruratan ibu hamil, bersalin, nifas, serta bayi baru lahir.</p><p>Ruang Rawat Inap Kebidanan, Perinatologi dan Anak terdiri dari kelas 2 dan kelas 3 BPJS. Tidak menutup kemungkinan untuk mengajukan pindah kamar inap ke kelas 1.</p>','1757986566_icon.png','2025-09-15 18:36:06','2025-09-15 18:36:06'),(9,'Rawat Inap Bedah','<p>Layanan Rawat Inap Bedah adalah fasilitas perawatan yang disediakan bagi pasien yang memerlukan tindakan pembedahan (operasi) dan membutuhkan pemulihan di ruang rawat inap setelah prosedur dilakukan.&nbsp;</p>','1757986606_icon.png','2025-09-15 18:36:46','2025-09-15 18:36:46'),(10,'Rawat Inap Non Bedah','<p>Layanan Rawat Inap Non Bedah ditujukan bagi pasien yang mengalami gangguan atau penyakit yang berhubungan dengan organ-organ dalam tubuh dan membutuhkan perawatan intensif di rumah sakit.</p><p>Selain itu layanan rawat inap non bedah juga menangani pasien Paru, THT, Kulit Kelamin dan Syaraf.</p>','1757986645_icon.png','2025-09-15 18:37:25','2025-09-15 18:37:25'),(11,'Rawat Inap Angso Duo','<p>Ruang Rawat Inap Angso Duo adalah ruang perawatan kelas 1 BPJS yang melayani pasien Bedah, Penyakit Dalam, Anak, PONEK, Paru, Saraf, Kulit dan Kelamin, THT, serta Rawat Inap Isolasi.</p>','1757986681_icon.png','2025-09-15 18:38:01','2025-09-16 08:05:55');
/*!40000 ALTER TABLE `rawat_inap` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rawat_jalan`
--

DROP TABLE IF EXISTS `rawat_jalan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rawat_jalan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `dokter_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rawat_jalan_dokter_id_foreign` (`dokter_id`),
  CONSTRAINT `rawat_jalan_dokter_id_foreign` FOREIGN KEY (`dokter_id`) REFERENCES `dokter` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rawat_jalan`
--

LOCK TABLES `rawat_jalan` WRITE;
/*!40000 ALTER TABLE `rawat_jalan` DISABLE KEYS */;
INSERT INTO `rawat_jalan` VALUES (8,5,'2025-09-15 01:14:00','2025-09-15 01:14:00'),(9,6,'2025-09-15 01:14:04','2025-09-15 01:14:04'),(10,7,'2025-09-15 01:16:16','2025-09-15 01:16:16');
/*!40000 ALTER TABLE `rawat_jalan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sejarahs`
--

DROP TABLE IF EXISTS `sejarahs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sejarahs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `sejarah` text COLLATE utf8mb4_general_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sejarahs`
--

LOCK TABLES `sejarahs` WRITE;
/*!40000 ALTER TABLE `sejarahs` DISABLE KEYS */;
INSERT INTO `sejarahs` VALUES (1,'<p>Kota Pariaman resmi memiliki Rumah Sakit Umum Daerah (RSUD). Peresmian tanda dimulainya operasional RSUD yang diberi nama RSUD dr.Sadikin tersebut, dilakukan langsung Walikota Pariaman Mukhlis Rahman, Sabtu (24/12) di desa Kampung Baru Padusunan.<br><br>Tampak hadir pada peresmian tersebut Wakil Walikota Genius Umar, Dandim 0308/Pariaman Letkol Arh Endro Nurbantoro dan Sekdako Indra Sakti, serta sejumlah pejabat Pemko Pariaman.<br><br>\" Awalnya tidak ada niat untuk mendirikan Rumah Sakit Umum Daerah Kota Pariaman, dalam kebijakan cuma bagaimana status pelayanan kesehatan di masing-masing puskesmas dapat ditingkatkan. Karena Rumah Sakit Umum sudah ada di Kota Pariaman, statusnya Rumah Sakit Propinsi. Selama ini warga Kota Pariaman berobat di RSUD Pariaman,\" kata Mukhlis Rahman.<br><br>Namun, ucap Mukhlis Rahman, karena perubahan tuntutan kebutuhan pelayanan kesehatan, RSUD Pariaman berubah status tipe B, maka mau tidak mau kota Pariaman harus punya Rumah Sakit Umum sendiri. Agar pelayanan kesehatan warga Kota Pariaman tidak terganggu.</p>','WjBVRZ81oCWhatsApp Image 2025-09-15 at 2.23.28 PM.jpeg','2025-09-15 00:23:57','2025-09-15 00:23:57');
/*!40000 ALTER TABLE `sejarahs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `strukturs`
--

DROP TABLE IF EXISTS `strukturs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `strukturs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `struktur` text COLLATE utf8mb4_general_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `strukturs`
--

LOCK TABLES `strukturs` WRITE;
/*!40000 ALTER TABLE `strukturs` DISABLE KEYS */;
/*!40000 ALTER TABLE `strukturs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ugd`
--

DROP TABLE IF EXISTS `ugd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ugd` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail_pelayanan` varchar(2500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ugd`
--

LOCK TABLES `ugd` WRITE;
/*!40000 ALTER TABLE `ugd` DISABLE KEYS */;
INSERT INTO `ugd` VALUES (6,'1757922809.MOV','<p><strong>Unit Gawat Darurat RSUD dr. Sadikin</strong> adalah layanan medis yang beroperasi 24 jam nonstop untuk menangani pasien dengan kondisi darurat atau mengancam nyawa. UGD dirancang untuk memberikan penanganan cepat, tepat, dan profesional bagi pasien yang membutuhkan pertolongan segera.</p>','2025-09-15 00:53:29','2025-09-15 00:54:36'),(7,'1757922886.jpg','<p><strong>Fasilitas dan Penunjang</strong></p><ul><li>Ruang triase untuk menentukan tingkat kegawatan pasien</li><li>Ruang resusitasi untuk penanganan kasus kritis</li><li>Ruang observasi untuk pemantauan kondisi pasien</li><li>Ambulans siaga 24 jam dengan peralatan emergensi</li><li>Peralatan medis modern seperti monitor jantung, ventilator, defibrillator, oksigen sentral, dan lainnya.</li></ul>','2025-09-15 00:54:46','2025-09-16 08:06:26');
/*!40000 ALTER TABLE `ugd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'rsud sadikin kota pariaman','rsudsadikin@pariamankota.go.id',NULL,'$2y$10$4s9fbPk33OmqD9p3vBrJi.dL.66LlMFTNXcuAoatjQCJCweuVRyIC',NULL,'2025-09-16 04:10:00','2025-09-16 04:23:36');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `visis`
--

DROP TABLE IF EXISTS `visis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `visis` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `visi` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `visis`
--

LOCK TABLES `visis` WRITE;
/*!40000 ALTER TABLE `visis` DISABLE KEYS */;
INSERT INTO `visis` VALUES (1,'Menjadi rumah sakit pilihan keluarga yang unggul dan terpercaya','2025-09-15 00:29:01','2025-09-15 00:29:01');
/*!40000 ALTER TABLE `visis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `votings`
--

DROP TABLE IF EXISTS `votings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `votings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `pilihan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `votings`
--

LOCK TABLES `votings` WRITE;
/*!40000 ALTER TABLE `votings` DISABLE KEYS */;
INSERT INTO `votings` VALUES (1,'puas','','2025-09-18 01:57:47','2025-09-18 01:57:47'),(2,'puas','alfanfirebase@gmail.com','2025-09-18 02:03:13','2025-09-18 02:03:13');
/*!40000 ALTER TABLE `votings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `websockets_statistics_entries`
--

DROP TABLE IF EXISTS `websockets_statistics_entries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `websockets_statistics_entries` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `app_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `peak_connection_count` int NOT NULL,
  `websocket_message_count` int NOT NULL,
  `api_message_count` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `websockets_statistics_entries`
--

LOCK TABLES `websockets_statistics_entries` WRITE;
/*!40000 ALTER TABLE `websockets_statistics_entries` DISABLE KEYS */;
/*!40000 ALTER TABLE `websockets_statistics_entries` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-09-19 10:30:01
