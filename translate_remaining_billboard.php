<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

// Fungsi terjemahan deskripsi generik
function translateDesc(string $en): string {
    $id = $en;
    // Hapus karakter aneh (UTF-8 artifacts)
    $id = str_replace(['ΓÇÖ', 'ΓÇö', 'ΓÇô', 'ΓÇ£', 'ΓÇ"', '┬á', 'ΓÇÿ', 'ΓÇÛ'], ["'", '—', '–', '"', '"', ' ', "'", "'"], $id);

    // Pola kalimat umum - ganti dulu kalimat panjang
    $replacements = [
        // Kalimat umum OOH marketing
        "Target both local and tourist traffic, making this billboard a prime choice for your brand's success. Stand out and let your message be seen by thousands every day!\nDon't miss the opportunity to make an impact at this key intersection."
            => "Targetkan lalu lintas lokal dan wisatawan, menjadikan billboard ini pilihan utama untuk kesuksesan merek Anda. Tampil menonjol dan biarkan pesan Anda dilihat ribuan orang setiap hari! Jangan lewatkan kesempatan untuk membuat dampak di persimpangan strategis ini.",
        "Target both local and tourist traffic, making this billboard a prime choice for your brand's success. Stand out and let your message be seen by thousands every day!"
            => "Targetkan lalu lintas lokal dan wisatawan, menjadikan billboard ini pilihan utama untuk kesuksesan merek Anda. Tampil menonjol dan biarkan pesan Anda dilihat ribuan orang setiap hari!",
        "Maximize your brand's reach with this strategic billboard location. Positioned at a bustling intersection, it captures the attention of both on-the-go commuters and pedestrians, ensuring your message is seen by a wide audience throughout the day."
            => "Maksimalkan jangkauan merek Anda dengan lokasi billboard strategis ini. Diposisikan di persimpangan yang ramai, ia menarik perhatian komuter dan pejalan kaki yang sedang beraktivitas, memastikan pesan Anda dilihat oleh audiens yang luas sepanjang hari.",
        "Boost your brand's visibility in a prime location just after the Koramil office. This high-traffic spot ensures your message is seen by a diverse audience, making it the perfect place to promote your business, product, or service to a wide range of potential customers.\""
            => "Tingkatkan visibilitas merek Anda di lokasi utama tepat setelah kantor Koramil. Titik lalu lintas tinggi ini memastikan pesan Anda dilihat oleh audiens yang beragam, menjadikannya tempat sempurna untuk mempromosikan bisnis, produk, atau layanan Anda kepada berbagai calon pelanggan.",
        "Densely populated residential\u00a0areas."
            => "Kawasan permukiman padat penduduk.",
        "Densely populated residential areas." 
            => "Kawasan permukiman padat penduduk.",
        "Densely populated residential\u00a0areas, the perfect billboard to gain attention to your content."
            => "Kawasan permukiman padat penduduk, billboard yang sempurna untuk mendapatkan perhatian terhadap konten Anda.",
        "Densely populated residential areas, the perfect billboard to gain attention to your content."
            => "Kawasan permukiman padat penduduk, billboard yang sempurna untuk mendapatkan perhatian terhadap konten Anda.",
        ".........." => "Kawasan strategis dengan visibilitas tinggi.",
        "..............." => "Kawasan strategis dengan visibilitas tinggi.",
        "......................................................." => "Kawasan strategis dengan lalu lintas padat.",
    ];

    foreach ($replacements as $find => $replace) {
        if (trim(str_replace(["\r\n","\r"], "\n", $id)) === trim($find)) {
            return $replace;
        }
    }

    // Terjemahan kata-kata kunci umum
    $wordReplace = [
        "Impression for Travelers, thousands of \"Daily Impressions\" from High-Value Audiences."
            => "Impresi bagi para pelancong, ribuan \"Impresi Harian\" dari audiens bernilai tinggi.",
        "Your brand deserves \"High-Impact\" visibility"
            => "Merek Anda layak mendapatkan visibilitas \"Berdampak Tinggi\"",
        "Position your brand on a \"Major Road\""
            => "Posisikan merek Anda di \"Jalan Utama\"",
        "This \"Prime Spot\" sits on the main road"
            => "\"Lokasi Utama\" ini berada di jalan utama",
        "Located at Simpang 4 Hotel Griya Tirta, this billboard dominates a \"High-Traffic\" intersection"
            => "Berlokasi di Simpang 4 Hotel Griya Tirta, billboard ini mendominasi persimpangan dengan lalu lintas tinggi",
        "This high-impact billboard spot is strategically placed on Jl. Veteran"
            => "Lokasi billboard berdampak tinggi ini ditempatkan secara strategis di Jl. Veteran",
        "Located at the bustling Simpang Terminal Kelapa"
            => "Berlokasi di Simpang Terminal Kelapa yang ramai",
        "Whether residents or visitors are passing through on their way to Muntok"
            => "Baik warga maupun pengunjung yang melintas menuju Muntok",
        "Strategically placed on Jl. Bandara"
            => "Ditempatkan secara strategis di Jl. Bandara",
        "Strategically located at the simpang KFC Sungai Liat"
            => "Berlokasi strategis di simpang KFC Sungai Liat",
        "This \"Strategic\" billboard is positioned at simpang 3 Maras Senang"
            => "Billboard \"Strategis\" ini berada di simpang 3 Maras Senang",
        "Whether it's locals commuting to work, tourists on their way to Sungai Liat, or business professionals"
            => "Baik warga lokal yang berangkat kerja, wisatawan menuju Sungai Liat, maupun profesional bisnis",
        "Whether you're targeting locals commuting to work, business travelers, or tourists"
            => "Baik Anda menargetkan warga yang berangkat kerja, pelancong bisnis, maupun wisatawan",
        "Located at Simpang Dusung Pelaben, this \"High-Visibility\" billboard"
            => "Berlokasi di Simpang Dusun Pelaben, billboard \"Visibilitas Tinggi\" ini",
        "Positioned on the Jl. Raya Koba, this high-traffic billboard offers \"Excellent Visibility\""
            => "Berada di Jl. Raya Koba, billboard lalu lintas padat ini menawarkan \"Visibilitas Sangat Baik\"",
        "This prime billboard location on Jl. Yos Sudarso ensures your brand gets \"Maximum Exposure\""
            => "Lokasi billboard utama di Jl. Yos Sudarso ini memastikan merek Anda mendapatkan \"Eksposur Maksimal\"",
        "Situated at Simpang Semada, Jl. Depati Hamzah is the most \"High-Traffic\" area in Pangkal Pinang"
            => "Berlokasi di Simpang Semada, Jl. Depati Hamzah adalah area dengan lalu lintas paling padat di Pangkal Pinang",
        "Located at Simp. Pasir Padi on Jl. Depati Hamzah, this \"High-Visibility\" billboard"
            => "Berlokasi di Simp. Pasir Padi, Jl. Depati Hamzah, billboard \"Visibilitas Tinggi\" ini",
        "Strategically located at the lampu merah Perkantoran Pemprov, Jl. Depati Hamzah"
            => "Berlokasi strategis di lampu merah Perkantoran Pemprov, Jl. Depati Hamzah",
        "Located along Jl. Raya Koba in Kecamatan Mendo Barat"
            => "Berlokasi di sepanjang Jl. Raya Koba, Kecamatan Mendo Barat",
        "Located at Jl. Sungkaliat-Pangkalpinang, at the Simpang Dusun Pelaben"
            => "Berlokasi di Jl. Sungkaliat-Pangkalpinang, di Simpang Dusun Pelaben",
        "Get \"Maximum Exposure\" on this main route connecting Sungai Liat and Pangkal Pinang"
            => "Dapatkan \"Eksposur Maksimal\" di jalur utama yang menghubungkan Sungai Liat dan Pangkal Pinang",
        "Strategically located at Jl. Jend Sudirman, simpang Tj Pesona, Sungai Liat"
            => "Berlokasi strategis di Jl. Jend Sudirman, Simpang Tj Pesona, Sungai Liat",
        "Strategically placed at Jl. Jend Sudirman, simpang Tj. Pesona, Sungai Liat"
            => "Ditempatkan secara strategis di Jl. Jend Sudirman, Simpang Tj. Pesona, Sungai Liat",
        "Located at Jl. Thamrin Foodcourt, Jl. Jend Sudirman, Simp. Tj Pesona"
            => "Berlokasi di Jl. Thamrin Foodcourt, Jl. Jend Sudirman, Simp. Tj Pesona",
        "This billboard offers strategic visibility in a key area leading to and from the airport"
            => "Billboard ini menawarkan visibilitas strategis di area utama menuju dan dari bandara",
        "Located at Jl. Jend. Sudirman, Kel. Kurnia Jaya, Kec. Manggar, Belitung Timur"
            => "Berlokasi di Jl. Jend. Sudirman, Kel. Kurnia Jaya, Kec. Manggar, Belitung Timur",
        "High Traffic Area with \"Great Visibility\", perfect for engaging local drivers and commuters"
            => "Area lalu lintas padat dengan \"Visibilitas Bagus\", sempurna untuk menjangkau pengemudi lokal dan komuter",
        "Your brand will be impossible to miss! Seize the opportunity to showcase your"
            => "Merek Anda tidak akan bisa terlewatkan! Manfaatkan kesempatan untuk memamerkan",
        "Located at Jl. A Yani, Kel. Batin Tikal, Kec. Taman Sari, Kota Pangkal Pinang"
            => "Berlokasi di Jl. A Yani, Kel. Batin Tikal, Kec. Taman Sari, Kota Pangkal Pinang",
        "Located at Jl. Raya Tanjung Pandan, Simp. Tj. Klayang, Kec. Sijuk, Kab. Belitung"
            => "Berlokasi di Jl. Raya Tanjung Pandan, Simp. Tj. Klayang, Kec. Sijuk, Kab. Belitung",
        "Located at Jl. Jend Sudirman, siimpang Perlang, Kec. Koba, Kabupaten Bangka Tengah"
            => "Berlokasi di Jl. Jend Sudirman, Simpang Perlang, Kec. Koba, Kabupaten Bangka Tengah",
        "Located at Jl. Mayor Syafrie Rachman, Kuto Panji, Kec. Belinyu, Kabupaten Bangka Induk"
            => "Berlokasi di Jl. Mayor Syafrie Rachman, Kuto Panji, Kec. Belinyu, Kabupaten Bangka Induk",
        "This billboard offers a \"Prime Opportunity\" for businesses"
            => "Billboard ini menawarkan \"Peluang Utama\" bagi bisnis",
    ];

    // Pola umum kata kunci
    $patterns = [
        // Kata kunci umum billboard marketing
        'High-Impact Advertising' => 'Periklanan Berdampak Tinggi',
        'High-Traffic' => 'Lalu Lintas Padat',
        'High Traffic' => 'Lalu Lintas Padat',
        'High-Visibility' => 'Visibilitas Tinggi',
        'High Visibility' => 'Visibilitas Tinggi',
        'Maximum Exposure' => 'Eksposur Maksimal',
        'Maximum exposure' => 'Eksposur Maksimal',
        'Maximum Visibility' => 'Visibilitas Maksimal',
        'Maximum visibility' => 'Visibilitas Maksimal',
        'Prime Location' => 'Lokasi Utama',
        'Prime location' => 'Lokasi Utama',
        'Prime Spot' => 'Lokasi Strategis',
        'Prime spot' => 'Lokasi Strategis',
        'Prime Opportunity' => 'Peluang Utama',
        'Prime Advertising Spot' => 'Lokasi Iklan Utama',
        'Strategic Location' => 'Lokasi Strategis',
        'strategic location' => 'lokasi strategis',
        'Strategically located' => 'Berlokasi strategis',
        'Strategically placed' => 'Ditempatkan secara strategis',
        'strategic billboard' => 'billboard strategis',
        'Unmissable Visibility' => 'Visibilitas Tak Terlewatkan',
        'Unmissable Billboard' => 'Billboard Tak Terlewatkan',
        'Daily Impressions' => 'Impresi Harian',
        'Excellent Visibility' => 'Visibilitas Sangat Baik',
        'Great Visibility' => 'Visibilitas Bagus',
        'key intersection' => 'persimpangan utama',
        'Key Route' => 'Jalur Utama',
        'major intersection' => 'persimpangan utama',
        'major road' => 'jalan utama',
        'Major Road' => 'Jalan Utama',
        'main road' => 'jalan utama',
        'Main Road' => 'Jalan Utama',
        'main route' => 'jalur utama',
        'busiest intersection' => 'persimpangan tersibuk',
        'high daily commuter traffic' => 'lalu lintas komuter harian yang padat',
        'high vehicle congestion' => 'kemacetan kendaraan yang tinggi',
        'high traffic flow' => 'arus lalu lintas yang padat',
        'High traffic volume' => 'Volume lalu lintas yang tinggi',
        'Long viewing distance' => 'Jarak pandang yang jauh',
        'High foot & vehicle traffic' => 'Lalu lintas pejalan kaki dan kendaraan yang padat',
        'High foot and vehicle traffic' => 'Lalu lintas pejalan kaki dan kendaraan yang padat',
        'Mixed audience' => 'Audiens campuran',
        'Long viewing distance' => 'Jarak pandang yang panjang',
        'Locals, travellers, commercial vehicles' => 'Warga lokal, wisatawan, kendaraan komersial',
        'entertainment venue' => 'tempat hiburan',
        'ensures your brand gets' => 'memastikan merek Anda mendapatkan',
        'ensures maximum exposure' => 'memastikan eksposur maksimal',
        'thousands of daily impressions' => 'ribuan impresi harian',
        'Reach thousands of' => 'Jangkau ribuan',
        'Engage thousands' => 'Libatkan ribuan',
        'Dominate Attention' => 'Kuasai Perhatian',
        'Command Attention' => 'Kuasai Perhatian',
        'Strategic Billboard Location' => 'Lokasi Billboard Strategis',
        'Prime Advertising Spot' => 'Lokasi Iklan Utama',
        'brand campaigns' => 'kampanye merek',
        'brand campaign' => 'kampanye merek',
        'commercial activity' => 'aktivitas komersial',
        'commercial area' => 'area komersial',
        'commercial road' => 'jalan komersial',
        'steady traffic' => 'lalu lintas yang stabil',
        'high visibility' => 'visibilitas tinggi',
        'uninterrupted visibility' => 'visibilitas tanpa hambatan',
        'faces oncoming' => 'menghadap lalu lintas yang datang',
        'two major roads' => 'dua jalan utama',
        'heart of commercial activity' => 'jantung aktivitas komersial',
        'heart of Kota' => 'jantung Kota',
        'government buildings' => 'gedung pemerintahan',
        'government offices' => 'kantor pemerintahan',
        'local businesses' => 'bisnis lokal',
        'scenic views' => 'pemandangan indah',
        'natural beauty' => 'keindahan alam',
        'Pasar Solok' => 'Pasar Solok',
        'bustling commercial' => 'kawasan komersial yang ramai',
        'Surrounded by retail, hospitality, education, and cultural venues'
            => 'Dikelilingi area ritel, perhotelan, pendidikan, dan budaya',
        'making the ad noticeable to a wide' => 'membuat iklan terlihat oleh audiens yang luas',
        'Prime location on Jalan Raya Padang' => 'Lokasi utama di Jalan Raya Padang',
        'surrounded by local businesses and commercial activity' => 'dikelilingi bisnis lokal dan aktivitas komersial',
        'Perfect positioning for campaigns related to education' => 'Posisi ideal untuk kampanye terkait pendidikan',
        'local services, finance, retail, dining' => 'layanan lokal, keuangan, ritel, kuliner',
        'Positioned along a major access route to the airport' => 'Diposisikan di sepanjang jalur akses utama menuju bandara',
        'capturing both local and arriving visitors' => 'menjangkau pengunjung lokal maupun yang baru tiba',
        'Visible from the Solok direction on a major roadway' => 'Terlihat dari arah Solok di jalan utama',
        'high-traffic location ideal for brand campaigns' => 'lokasi lalu lintas padat ideal untuk kampanye merek',
        'targeting daily intercity' => 'menargetkan perjalanan antar kota harian',
        'Strategic spot on the Bukittinggi' => 'Lokasi strategis di jalur Bukittinggi',
        'high daily commuter traffic ensures your brand' => 'lalu lintas komuter harian yang padat memastikan merek Anda',
        'Prominent location on the main road to Sawahlunto' => 'Lokasi menonjol di jalan utama menuju Sawahlunto',
        'surrounded by steady traffic and scenic views' => 'dikelilingi arus lalu lintas yang stabil dan pemandangan indah',
        'Strategically located in a city center intersection with high visibility' => 'Berlokasi strategis di persimpangan pusat kota dengan visibilitas tinggi',
        'Surrounded by government' => 'Dikelilingi gedung pemerintahan',
        'Strategic spot on Jl. S.B.A. Marajo' => 'Lokasi strategis di Jl. S.B.A. Marajo',
        'right in the heart of' => 'tepat di jantung',
        'with direct visibility' => 'dengan visibilitas langsung',
        'Strategically located on a major commercial road with high traffic volume' => 'Berlokasi strategis di jalan komersial utama dengan volume lalu lintas tinggi',
        'The billboard faces oncoming' => 'Billboard menghadap lalu lintas yang datang',
        'Prime location in the heart of Kota Pariaman' => 'Lokasi utama di jantung Kota Pariaman',
        'visible from two major roads' => 'terlihat dari dua jalan utama',
        'High-visibility spot on Jl. Lintas Barat Sumatera' => 'Lokasi visibilitas tinggi di Jl. Lintas Barat Sumatera',
        'surrounded by shops and daily traffic' => 'dikelilingi toko-toko dan lalu lintas sehari-hari',
        'Located along the scenic Jl. Lintas Barat Sumatera' => 'Berlokasi di sepanjang Jl. Lintas Barat Sumatera yang indah',
        'combines natural beauty with uninterrupted' => 'memadukan keindahan alam dengan visibilitas tanpa hambatan',
        'Premium exposure on Jl. KH. Ahmad Dahlan' => 'Eksposur premium di Jl. KH. Ahmad Dahlan',
        'viewable from the direction of Pasar Solok' => 'terlihat dari arah Pasar Solok',
        'a bustling commercial hub' => 'pusat komersial yang ramai',
        'Strategically located at the entrance of Sawahlunto City' => 'Berlokasi strategis di pintu masuk Kota Sawahlunto',
        'this billboard benefits from high visibility' => 'billboard ini mendapat manfaat dari visibilitas tinggi',
        'Strategically placed along the always-busy Jl. Lintas Barat' => 'Ditempatkan secara strategis di Jl. Lintas Barat yang selalu ramai',
        'high vehicle congestion means higher impressions' => 'kemacetan kendaraan berarti lebih banyak impresi',
        'Strategically located on Jl. Lintas Barat Sumatera in a busy commercial area' => 'Berlokasi strategis di Jl. Lintas Barat Sumatera di area komersial yang ramai',
        'High traffic flow and' => 'Arus lalu lintas tinggi dan',
        'High visibility from a major route' => 'Visibilitas tinggi dari jalur utama',
        'from Tabing toward central parts' => 'dari Tabing menuju pusat kota',
        'ensures many people pass by' => 'memastikan banyak orang melintas',
        'Long viewing distance means drivers have time to read and process messages' => 'Jarak pandang yang jauh memberi waktu pengemudi untuk membaca dan memahami pesan',
        'Long viewing distance means even fast-moving vehicles have time to see and read the message' => 'Jarak pandang yang jauh memungkinkan kendaraan yang bergerak cepat pun sempat melihat dan membaca pesan',
        'High traffic volume and pedestrian presence make repeated impressions more likely' => 'Volume lalu lintas yang tinggi dan kehadiran pejalan kaki membuat impresi berulang lebih mungkin terjadi',
        'Mixed audience: Locals, travellers, commercial vehicles, maybe tourists depending on how far this r' => 'Audiens campuran: warga lokal, wisatawan, kendaraan komersial, mungkin juga turis bergantung pada jangkauan lokasi',
        'High foot & vehicle traffic, especially because of the entertainment venue (Tee Box) which draws pe' => 'Lalu lintas pejalan kaki dan kendaraan yang padat, terutama karena tempat hiburan (Tee Box) yang menarik pengunjung',
        'High vehicle traffic: Since it\'s on a main Sumatra route, many vehicles (commercial, passenger) w' => 'Lalu lintas kendaraan tinggi: karena berada di jalur utama Sumatera, banyak kendaraan (komersial, penumpang) melintas',
        'Dominate Attention on Jl. Diponegoro, Gunung Sitoli!"' => 'Kuasai Perhatian di Jl. Diponegoro, Gunung Sitoli!',
        'High-Impact Advertising – Reach thousands o' => 'Periklanan Berdampak Tinggi – Jangkau ribuan orang',
        '"Command Attention at Jl. Gomo, Gunung Sitoli!"' => 'Kuasai Perhatian di Jl. Gomo, Gunung Sitoli!',
        '"Strategic Billboard Location at Jl. Sirao Simp. Jl. Lagundri, Gunung Sitoli –Nias!"' => 'Lokasi Billboard Strategis di Jl. Sirao, Simp. Jl. Lagundri, Gunung Sitoli – Nias!',
        '"Prime Advertising Spot on Jl. Raya Onolimbu – Lahomi!"' => 'Lokasi Iklan Utama di Jl. Raya Onolimbu – Lahomi!',
        'Unmissable Visibility – Engage thousa' => 'Visibilitas Tak Terlewatkan – Libatkan ribuan orang',
        'High-Traffic Location – Maximum visibility for your brand. Unmissable Billboard' => 'Lokasi Lalu Lintas Padat – Visibilitas maksimal untuk merek Anda. Billboard Tak Terlewatkan',
        'Placement – Sta' => 'Penempatan – Tampil menonjol',
        '"Prime Billboard Location on Jl. Lotu Km 23, Nias Utara!" Strategic Spot in Front of BKD Office –' => 'Lokasi Billboard Utama di Jl. Lotu Km 23, Nias Utara! Lokasi Strategis di Depan Kantor BKD',
    ];

    // Terapkan terjemahan kata-kata kunci
    foreach ($wordReplace as $find => $replace) {
        $normalized = str_replace(["\r\n","\r"], "\n", trim($id));
        $normalizedFind = str_replace(["\r\n","\r"], "\n", trim($find));
        if ($normalized === $normalizedFind) {
            return $replace;
        }
    }
    
    // Terapkan penggantian kata kunci sebagian
    foreach ($patterns as $en_word => $id_word) {
        $id = str_replace($en_word, $id_word, $id);
    }
    
    // Terjemahan kata umum
    $id = str_replace('Densely populated residential areas', 'Kawasan permukiman padat penduduk', $id);
    $id = str_replace('Densely Populated Residential Area', 'Kawasan permukiman padat penduduk', $id);
    $id = str_replace('Shopping and Business District', 'Kawasan perbelanjaan dan bisnis', $id);
    $id = str_replace('Residential Area', 'Kawasan permukiman', $id);
    $id = str_replace('Hotel area', 'Area hotel', $id);
    $id = str_replace('Heading to', 'Menuju', $id);
    $id = str_replace('Near ', 'Dekat ', $id);
    $id = str_replace('near ', 'dekat ', $id);
    $id = str_replace('Located on', 'Berlokasi di', $id);
    $id = str_replace('Located in', 'Berlokasi di', $id);
    $id = str_replace('Access to', 'Akses ke', $id);
    $id = str_replace('located at', 'berlokasi di', $id);
    $id = str_replace('Located at', 'Berlokasi di', $id);
    $id = str_replace('Situated at', 'Berlokasi di', $id);
    $id = str_replace('Positioned at', 'Diposisikan di', $id);
    $id = str_replace('ensuring', 'memastikan', $id);
    $id = str_replace('ensuring maximum', 'memastikan maksimal', $id);
    $id = str_replace('your brand', 'merek Anda', $id);
    $id = str_replace('Your brand', 'Merek Anda', $id);
    $id = str_replace('your message', 'pesan Anda', $id);
    $id = str_replace('Your message', 'Pesan Anda', $id);
    
    return $id;
}

// Ambil semua yang belum ditranslate (id == en)
$rows = DB::table('lokasioohs')->orderBy('id')->get(['id', 'nama', 'deskripsi_lokasi', 'wilayah']);
$count = 0;

foreach ($rows as $r) {
    $deskRaw = $r->deskripsi_lokasi ?? '';
    $needsUpdate = false;
    $newDesk = $deskRaw;
    
    if (str_starts_with(trim($deskRaw), '{')) {
        $deskArr = json_decode($deskRaw, true);
        $deskEn = $deskArr['en'] ?? '';
        $deskId = $deskArr['id'] ?? '';
        
        $normEn = str_replace(["\r\n","\r"], "\n", trim($deskEn));
        $normId = str_replace(["\r\n","\r"], "\n", trim($deskId));
        
        if ($normEn === $normId && !empty($deskEn)) {
            // Terjemahkan
            $translatedId = translateDesc($deskEn);
            $deskArr['id'] = $translatedId;
            $newDesk = json_encode($deskArr, JSON_UNESCAPED_UNICODE);
            $needsUpdate = true;
        }
    }
    
    if ($needsUpdate) {
        DB::table('lokasioohs')->where('id', $r->id)->update(['deskripsi_lokasi' => $newDesk]);
        $count++;
        echo "UPDATED ID {$r->id} [{$r->wilayah}]\n";
    }
}

echo "\nTotal updated: $count\n";
