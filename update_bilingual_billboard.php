<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

// Pola terjemahan untuk nama lokasi (prefix umum)
function translateNama(string $en): array {
    $id = $en;
    $id = str_replace('On ', 'Di ', $id);
    $id = str_replace(' Street', ' Street', $id); // tetap sama karena nama jalan
    $id = str_replace('at the intersection with', 'di persimpangan dengan', $id);
    $id = str_replace('at the intersection of', 'di persimpangan', $id);
    $id = str_replace('at the crossroads of', 'di persimpangan', $id);
    $id = str_replace('in front of', 'di depan', $id);
    $id = str_replace('near ', 'dekat ', $id);
    $id = str_replace('Near ', 'Dekat ', $id);
    $id = str_replace('City, North Sumatra Province', 'Kota, Provinsi Sumatera Utara', $id);
    $id = str_replace('Medan City, North Sumatra Province', 'Kota Medan, Provinsi Sumatera Utara', $id);
    $id = str_replace('Binjai City, North Sumatra Province', 'Kota Binjai, Provinsi Sumatera Utara', $id);
    $id = str_replace('Padang City, West Sumatra Province', 'Kota Padang, Provinsi Sumatera Barat', $id);
    $id = str_replace('Palembang City, South Sumatra Province', 'Kota Palembang, Provinsi Sumatera Selatan', $id);
    $id = str_replace('Bengkulu City, Bengkulu Province', 'Kota Bengkulu, Provinsi Bengkulu', $id);
    $id = str_replace('Karo Regency, North Sumatra Province', 'Kabupaten Karo, Provinsi Sumatera Utara', $id);
    $id = str_replace('Batubara Regency, North Sumatra Province', 'Kabupaten Batubara, Provinsi Sumatera Utara', $id);
    $id = str_replace('Asahan Regency, North Sumatra Province', 'Kabupaten Asahan, Provinsi Sumatera Utara', $id);
    $id = str_replace('Simalungun Regency, North Sumatra Province', 'Kabupaten Simalungun, Provinsi Sumatera Utara', $id);
    $id = str_replace('Padang Lawas Utara Regency, North Sumatra Province', 'Kabupaten Padang Lawas Utara, Provinsi Sumatera Utara', $id);
    $id = str_replace('District', 'Kecamatan', $id);
    $id = str_replace('Subdistrict', 'Kelurahan', $id);
    $id = str_replace('Regency', 'Kabupaten', $id);
    $id = str_replace('Province', 'Provinsi', $id);
    $id = str_replace('Heading to', 'Menuju', $id);
    $id = str_replace('heading to', 'menuju', $id);
    $id = str_replace('toward ', 'menuju ', $id);
    $id = str_replace('Toward ', 'Menuju ', $id);
    $id = str_replace('Access to', 'Akses ke', $id);
    $id = str_replace('Intersection', 'Persimpangan', $id);
    $id = str_replace('intersection', 'persimpangan', $id);
    $id = str_replace('Junction', 'Persimpangan', $id);
    $id = str_replace('Road', 'Jalan', $id);
    $id = str_replace('Main Road', 'Jalan Utama', $id);
    $id = str_replace('Main Street', 'Jalan Utama', $id);
    $id = str_replace('Banda Aceh City', 'Kota Banda Aceh', $id);
    $id = str_replace('Bandar lampung', 'Bandar Lampung', $id);
    $id = str_replace('Bandar Lampung City', 'Kota Bandar Lampung', $id);
    return ['en' => $en, 'id' => $id];
}

// Kamus terjemahan deskripsi lokasi
$deskTranslations = [
    'Shopping and Business area, directions from Simpang Lima, Monument Banda Aceh' =>
        'Area perbelanjaan dan bisnis, arah dari Simpang Lima, Monumen Banda Aceh',
    'Densely populated residential areas' =>
        'Kawasan permukiman padat penduduk',
    'Densely populated residential areas, towards Samsat, Banda Aceh' =>
        'Kawasan permukiman padat penduduk, menuju Samsat, Banda Aceh',
    'Densely Populated Residential Area, near Lapangan Sejati, Medan, and Government Office Areas' =>
        'Kawasan permukiman padat penduduk, dekat Lapangan Sejati Medan, dan kawasan perkantoran pemerintah',
    'Densely Populated Residential Area, heading towards Taman Setia Budi Complex and Hangout Spots' =>
        'Kawasan permukiman padat penduduk, menuju Kompleks Taman Setia Budi dan area nongkrong',
    'Densely Populated Residential Area, with Access to Berastagi, Tanah Karo' =>
        'Kawasan permukiman padat penduduk, dengan akses menuju Berastagi, Tanah Karo',
    'Densely Populated Residential Area, Majelis Kupie' =>
        'Kawasan permukiman padat penduduk, Majelis Kupie',
    'Densely Populated Residential Area, close to Hangout Spots, Office, and Business Areas.' =>
        'Kawasan permukiman padat penduduk, dekat area nongkrong, perkantoran, dan bisnis.',
    'Densely Populated Residential Area, Near Lapangan Sejati and\r\nGovernment Office Areas.' =>
        'Kawasan permukiman padat penduduk, dekat Lapangan Sejati dan kawasan perkantoran pemerintah.',
    'Densely Populated Residential Area, Near Lapangan Sejati and
Government Office Areas.' =>
        'Kawasan permukiman padat penduduk, dekat Lapangan Sejati dan kawasan perkantoran pemerintah.',
    'Densely Populated Residential Area.' =>
        'Kawasan permukiman padat penduduk.',
    'Densely Populated Residential Area, Towards Lubuk Buaya Market, Shopping Area' =>
        'Kawasan permukiman padat penduduk, menuju Pasar Lubuk Buaya, area perbelanjaan',
    'Densely Populated Residential Area, Near Nurul Iman Padang Mosque, Shopping Area and Business Shophouses' =>
        'Kawasan permukiman padat penduduk, dekat Masjid Nurul Iman Padang, area perbelanjaan dan ruko bisnis',
    'Densely Populated Residential Area, Near Mitra Bangunan, Near BNI Pattimura Bank, Near Golden Harvest Hotel' =>
        'Kawasan permukiman padat penduduk, dekat Mitra Bangunan, dekat Bank BNI Pattimura, dekat Hotel Golden Harvest',
    'Densely Populated Residential Area, Towards Samsat Banda Aceh' =>
        'Kawasan permukiman padat penduduk, menuju Samsat Banda Aceh',
    'Densely Populated Residential Areas Residents, Shopping Areas' =>
        'Kawasan permukiman padat penduduk, area perbelanjaan',
    'Densely populated residential areas.' =>
        'Kawasan permukiman padat penduduk.',
    'Densely populated residential┬áareas.' =>
        'Kawasan permukiman padat penduduk.',
    'Shopping and Business District' =>
        'Kawasan perbelanjaan dan bisnis',
    'Shopping and Business District, Near Square - Bolak courtyard square Sidempuan Field' =>
        'Kawasan perbelanjaan dan bisnis, dekat Alun-alun Lapangan Sidempuan',
    'The billboard is located in a strategic area surrounded by office complexes, bank ATMs, shopping centers, residential neighborhoods, traditional markets, hospitals, places of worship, and high traffic flow of both private and public vehicles' =>
        'Billboard terletak di area strategis yang dikelilingi kompleks perkantoran, ATM bank, pusat perbelanjaan, pemukiman penduduk, pasar tradisional, rumah sakit, tempat ibadah, dan arus lalu lintas tinggi kendaraan pribadi maupun umum',
    'The billboard is situated in a high-traffic area near office buildings, shopping centers, bank ATMs, residential neighborhoods, hotels, schools, universities, hospitals, and busy routes for both private and public vehicles' =>
        'Billboard terletak di area lalu lintas tinggi dekat gedung perkantoran, pusat perbelanjaan, ATM bank, pemukiman penduduk, hotel, sekolah, universitas, rumah sakit, serta jalur sibuk kendaraan pribadi dan umum',
    'Place your brand in the heart of this bustling area where locals and visitors pass by daily. Whether they\'re heading to nearby shops or socializing, your message will reach a wide audience in this high-visibility location!"' =>
        'Tempatkan merek Anda di jantung kawasan ramai ini, di mana warga lokal dan pengunjung melintas setiap hari. Baik mereka menuju toko terdekat atau sekadar bersosialisasi, pesan Anda akan menjangkau audiens yang luas di lokasi dengan visibilitas tinggi ini!',
    'Target both local and tourist traffic, making this billboard a prime choice for your brand\'s success. Stand out and let your message be seen by thousands every day!
Don\'t miss the opportunity to make an impact at this key intersection.' =>
        'Targetkan lalu lintas lokal dan wisatawan, menjadikan billboard ini pilihan utama untuk kesuksesan merek Anda. Tampil menonjol dan biarkan pesan Anda dilihat ribuan orang setiap hari! Jangan lewatkan kesempatan untuk membuat dampak di persimpangan strategis ini.',
    'Position your brand where it matters most! With heavy foot traffic and exposure to a wide audience, this billboard guarantees your message will stand out.
Capitalize on this prime location to elevate your business presence in the heart of the city!"' =>
        'Posisikan merek Anda di tempat yang paling berpengaruh! Dengan lalu lintas pejalan kaki yang padat dan eksposur ke audiens yang luas, billboard ini menjamin pesan Anda akan tampil menonjol. Manfaatkan lokasi utama ini untuk meningkatkan kehadiran bisnis Anda di jantung kota!',
    'Place your brand in front of the right audience! With heavy local traffic and
close proximity to a popular restaurant, this billboard offers a unique
opportunity to get noticed. Capture the attention of commuters and visitors alike, boosting your business\'s reach and recognition!"' =>
        'Tempatkan merek Anda di hadapan audiens yang tepat! Dengan lalu lintas lokal yang padat dan kedekatan dengan restoran populer, billboard ini menawarkan peluang unik untuk diperhatikan. Tarik perhatian para komuter dan pengunjung, tingkatkan jangkauan dan pengakuan bisnis Anda!',
    'Strategic Spot with High Visibility, Surrounded by Shopping & Commercial Activity ,Perfect for Maximizing Foot Traffic
Place your brand where it matters most! Located near a bustling shopping area, this billboard is positioned to grab the attention of a steady flow of shoppers and commuters, increasing your business\'s exposure and engagement.' =>
        'Lokasi strategis dengan visibilitas tinggi, dikelilingi aktivitas perbelanjaan dan komersial, sempurna untuk memaksimalkan arus pengunjung. Tempatkan merek Anda di tempat yang paling berpengaruh! Berlokasi dekat area perbelanjaan yang ramai, billboard ini diposisikan untuk menarik perhatian aliran pengunjung dan komuter, meningkatkan eksposur dan keterlibatan bisnis Anda.',
    'Capture the attention of commuters and pedestrians alike with this billboard, strategically placed on a bustling street corner. As traffic flows from SM Raja to Pandu, your message will be impossible to miss. Perfect for businesses looking to increase brand recognition and drive traffic to their doors. Leverage this prime location to make a lasting impact on a wide audience.' =>
        'Tarik perhatian komuter dan pejalan kaki dengan billboard ini yang ditempatkan secara strategis di sudut jalan yang ramai. Seiring arus lalu lintas dari SM Raja ke Pandu, pesan Anda tidak akan terlewatkan. Sempurna untuk bisnis yang ingin meningkatkan pengenalan merek dan mendatangkan pengunjung. Manfaatkan lokasi utama ini untuk membuat dampak yang bertahan lama pada audiens yang luas.',
    'Maximize your brand\'s reach with this strategic billboard location. Positioned at a bustling intersection, it captures the attention of both on-the-go commuters and pedestrians, ensuring your message is seen by a wide audience throughout the day.' =>
        'Maksimalkan jangkauan merek Anda dengan lokasi billboard strategis ini. Diposisikan di persimpangan yang ramai, ia menarik perhatian komuter dan pejalan kaki yang sedang beraktivitas, memastikan pesan Anda dilihat oleh audiens yang luas sepanjang hari.',
    'Boost your brand\'s visibility in a prime location just after the Koramil office. This high-traffic spot ensures your message is seen by a diverse audience, making it the perfect place to promote your business, product, or service to a wide range of potential customers."' =>
        'Tingkatkan visibilitas merek Anda di lokasi utama tepat setelah kantor Koramil. Titik lalu lintas tinggi ini memastikan pesan Anda dilihat oleh audiens yang beragam, menjadikannya tempat sempurna untuk mempromosikan bisnis, produk, atau layanan Anda kepada berbagai calon pelanggan.',
    'Place your ad where everyone will see it! Strategically located at the bustling junction of Jl. HM Yamin and Jl. Sutomo, this billboard captures the attention of a steady flow of drivers, commuters, and pedestrians. Perfect for reaching a broad audience and ensuring your message is seen by potential customers every day.' =>
        'Pasang iklan Anda di tempat yang semua orang akan melihatnya! Berlokasi strategis di persimpangan ramai Jl. HM Yamin dan Jl. Sutomo, billboard ini menarik perhatian aliran pengemudi, komuter, dan pejalan kaki yang terus-menerus. Sempurna untuk menjangkau audiens yang luas dan memastikan pesan Anda dilihat oleh calon pelanggan setiap hari.',
    'Positioned at the key intersection of Jl. Brigjen Katamso and Simp. Pelangi, this billboard offers unmatched visibility to daily commuters, locals, and travelers. Perfect for businesses looking to boost brand awareness and capture the attention of a wide and diverse audience. Get noticed and make a lasting impact right where it matters.' =>
        'Diposisikan di persimpangan utama Jl. Brigjen Katamso dan Simp. Pelangi, billboard ini menawarkan visibilitas tak tertandingi bagi komuter harian, warga lokal, dan wisatawan. Sempurna untuk bisnis yang ingin meningkatkan kesadaran merek dan menarik perhatian audiens yang luas dan beragam. Jadilah terlihat dan buat dampak yang bertahan lama di tempat yang paling penting.',
    'Food lovers, shoppers, and travelers pass through here daily! With its strategic location at Jl. Thamrin Foodcourt, your brand will be front and center, capturing the attention of a diverse and active crowd. Perfect for attracting both locals and tourists, your advertisement will stand out in this lively, hightraffic area!' =>
        'Pecinta kuliner, pembeli, dan wisatawan melintas di sini setiap hari! Dengan lokasi strategis di Foodcourt Jl. Thamrin, merek Anda akan tampil terdepan, menarik perhatian kerumunan yang beragam dan aktif. Sempurna untuk menarik warga lokal dan wisatawan, iklan Anda akan menonjol di area yang ramai dan penuh kehidupan ini!',
    'Situated at the bustling intersection of Jl. SM Raja and Jl. HM Joni, this prime billboard spot offers maximum exposure to commuters, locals, and tourists alike. As one of the key crossroads in the area, your advertisement will capture the attention of potential customers all day long. Perfect for increasing brand recognition and driving foot traffic
to your business.' =>
        'Terletak di persimpangan ramai Jl. SM Raja dan Jl. HM Joni, lokasi billboard utama ini menawarkan eksposur maksimal bagi komuter, warga lokal, dan wisatawan. Sebagai salah satu persimpangan kunci di area ini, iklan Anda akan menarik perhatian calon pelanggan sepanjang hari. Sempurna untuk meningkatkan pengenalan merek dan mendatangkan pengunjung ke bisnis Anda.',
    'Located at the bustling intersection of Jl. Gatot Subroto, Jl. Darussalam, and Jl.Ayahanda, this billboard offers unparalleled exposure. Positioned where traffic
converges, your brand will be seen by thousands of commuters, tourists, and locals daily. Perfect for businesses looking to maximize visibility, increase brand awareness, and engage a diverse audience. Stand out in the heart of Medan!' =>
        'Terletak di persimpangan ramai Jl. Gatot Subroto, Jl. Darussalam, dan Jl. Ayahanda, billboard ini menawarkan eksposur yang tak tertandingi. Diposisikan di titik pertemuan lalu lintas, merek Anda akan dilihat ribuan komuter, wisatawan, dan warga lokal setiap hari. Sempurna untuk bisnis yang ingin memaksimalkan visibilitas, meningkatkan kesadaran merek, dan melibatkan audiens yang beragam. Tampil menonjol di jantung Kota Medan!',
    'Densely Populated Residential Area, near Lapangan Sejati and
Government Office Areas.' =>
        'Kawasan permukiman padat penduduk, dekat Lapangan Sejati dan kawasan perkantoran pemerintah.',
    'Near Jamin Ginting Monument, surrounded by Office and Business Areas.' =>
        'Dekat Monumen Jamin Ginting, dikelilingi kawasan perkantoran dan bisnis.',
    'Near Masjid Raya Medan, Kolam Deli, and Hotel Madani Medan' =>
        'Dekat Masjid Raya Medan, Kolam Deli, dan Hotel Madani Medan',
    'Access to the outskirts of Medan.' =>
        'Akses menuju pinggiran Kota Medan.',
    'Close to Cambridge Plaza, Office and Business Areas, with access to Plaza Medan Fair.' =>
        'Dekat Cambridge Plaza, kawasan perkantoran dan bisnis, dengan akses ke Plaza Medan Fair.',
    'Near Grapari Telkomsel, Near RSUD Harapan and Doa Bengkulu, School Area,
Business and Office Area and Hangout Area' =>
        'Dekat Grapari Telkomsel, dekat RSUD Harapan dan Doa Bengkulu, kawasan sekolah, area bisnis dan perkantoran serta area nongkrong',
    'Heading to Long Beach Bengkulu, Near Matahari Bengkulu Indah Mall, Near
Bencolen Mall, Business and Hangout Area' =>
        'Menuju Long Beach Bengkulu, dekat Matahari Bengkulu Indah Mall, dekat Bencoolen Mall, area bisnis dan nongkrong',
    'Business Shopping and Shophouse Area, Near Mitra 10 Jambi, Near AW
Restaurant, Near Jamtos Square' =>
        'Area perbelanjaan, bisnis, dan ruko, dekat Mitra 10 Jambi, dekat Restoran AW, dekat Jamtos Square',
    'Business Shopping and Shophouse Area, Near Pizza Hut Sipi Jambi, Towards Taman Pers 3' =>
        'Area perbelanjaan, bisnis, dan ruko, dekat Pizza Hut Sipin Jambi, menuju Taman Pers 3',
    'Densely Populated Residential Area, Near Mitra Bangunan, Near BNI Pattimura Bank, Near Golden Harvest Hotel' =>
        'Kawasan permukiman padat penduduk, dekat Mitra Bangunan, dekat Bank BNI Pattimura, dekat Hotel Golden Harvest',
    'Hotel area, business and office area and hangout area' =>
        'Area hotel, perkantoran dan bisnis serta area nongkrong',
    'Near Honda Dealer, Towards Bumi Kedaton Mall, Hotel area, business and office area' =>
        'Dekat dealer Honda, menuju Bumi Kedaton Mall, area hotel, perkantoran dan bisnis',
    'Stabat Grand Mosque, Access Getting to Banda Aceh' =>
        'Masjid Agung Stabat, akses menuju Banda Aceh',
    'Access to Banda Aceh, Brandan Base Monument' =>
        'Akses menuju Banda Aceh, Monumen Pangkalan Brandan',
    'Hotel area, business and office area, and hangout area, this OOH location is the perfect billboard to gain public attention to your content.' =>
        'Area hotel, perkantoran dan bisnis, serta area nongkrong — lokasi OOH ini adalah billboard sempurna untuk mendapatkan perhatian publik terhadap konten Anda.',
    'Near Bhayangkara Hospital Palembang, in front of Muhammadiyah High
School Palembang, business and office area and hangout area' =>
        'Dekat RS Bhayangkara Palembang, di depan SMA Muhammadiyah Palembang, kawasan bisnis dan perkantoran serta area nongkrong',
    'Near Simpang Empat POLDA Park, Near Amaris Hotel Palembang, Business and office area' =>
        'Dekat Taman Simpang Empat Polda, dekat Hotel Amaris Palembang, kawasan bisnis dan perkantoran',
    'Densely Populated Residential Area, Shopping Area and Business Shophouses, Near KFC Seobrantas' =>
        'Kawasan permukiman padat penduduk, area perbelanjaan dan ruko bisnis, dekat KFC Soebrantas',
    'Business Shopping and Shophouse Area, Near Tjokro Hotel Pekanbaru, Near Grand Central Hotel' =>
        'Area perbelanjaan, bisnis, dan ruko, dekat Hotel Tjokro Pekanbaru, dekat Grand Central Hotel',
    'Densely Populated Residential Areas Residents, Shopping Areas' =>
        'Kawasan permukiman padat penduduk, area perbelanjaan',
    'Access to Tourist Attractions Gundaling, Hospitality Area' =>
        'Akses menuju objek wisata Gundaling, kawasan perhotelan',
    'Residential Area, Access Getting to Berastagi City' =>
        'Kawasan permukiman, akses menuju Kota Berastagi',
    'Access to Banda Aceh, Heading to Binjai City' =>
        'Akses menuju Banda Aceh, menuju Kota Binjai',
    'Shopping and Business District' =>
        'Kawasan perbelanjaan dan bisnis',
    'Located in Binjai Morning Market' =>
        'Berlokasi di Pasar Pagi Binjai',
    'Near Delitua Market' =>
        'Dekat Pasar Delitua',
    'Near University Campus Medan State ( Unimed ), Hang Out Area' =>
        'Dekat Kampus Universitas Negeri Medan (Unimed), area nongkrong',
    'Access to pantai cermin, Near Simpang Tiga Restaurant' =>
        'Akses menuju Pantai Cermin, dekat Restoran Simpang Tiga',
    'Located on Jl. Lintas Sumatra' =>
        'Berlokasi di Jl. Lintas Sumatera',
    'Access to Medan from the City Range, Near the Great Mosque High Cliff' =>
        'Akses menuju Medan dari pusat kota, dekat Masjid Agung Tebing Tinggi',
    'Parluasan Market' =>
        'Pasar Parluasan',
    'Taman Siswa College, Shopping and Business District' =>
        'Perguruan Taman Siswa, kawasan perbelanjaan dan bisnis',
    'Located in the City Center, Region Shopsand Businesses' =>
        'Berlokasi di pusat kota, kawasan pertokoan dan bisnis',
    'Located on Jl. Lintas Sumatra, Shopping and Business District, Near Indrapura Market' =>
        'Berlokasi di Jl. Lintas Sumatera, kawasan perbelanjaan dan bisnis, dekat Pasar Indrapura',
    'Near Inalaum Junction Monument' =>
        'Dekat Monumen Persimpangan Inalum',
    'Near Simpang Sei Park Anchor' =>
        'Dekat Taman Simpang Sei Jangkar',
    'Located on Jl. Lintas Sumatra Heading to Pekanbaru, Padang' =>
        'Berlokasi di Jl. Lintas Sumatera menuju Pekanbaru, Padang',
    'Panglima Polem Market' =>
        'Pasar Panglima Polem',
    'Near Adipura Monument' =>
        'Dekat Monumen Adipura',
    'Near Suzuya Plaza Rantau Prapat' =>
        'Dekat Suzuya Plaza Rantau Prapat',
    'Near the Old Country Market' =>
        'Dekat Pasar Negeri Lama',
    'Near Sibuhunan Tax Office' =>
        'Dekat Kantor Pajak Sibuhuan',
    'Near Sipirok Market, Near Sipirok City Square, Shopping and Business Area' =>
        'Dekat Pasar Sipirok, dekat Alun-alun Kota Sipirok, kawasan perbelanjaan dan bisnis',
    'In front of Bank of North Sumatra, Area Shops and Businesses' =>
        'Di depan Bank Sumut, kawasan pertokoan dan bisnis',
    'Towards the Stabat Grand Mosque, Near the Stabat Regent Office' =>
        'Menuju Masjid Agung Stabat, dekat Kantor Bupati Stabat',
    'Shopping and Business District, Near Square - Bolak courtyard square Sidempuan Field' =>
        'Kawasan perbelanjaan dan bisnis, dekat alun-alun Kota Sidempuan',
    'Near Grapari Telkomsel, Near RSUD Harapan and Doa Bengkulu, School Area, Business and Office Area and Hangout Area' =>
        'Dekat Grapari Telkomsel, dekat RSUD Harapan dan Doa Bengkulu, kawasan sekolah, area bisnis dan perkantoran serta area nongkrong',
];

$rows = DB::table('lokasioohs')->orderBy('id')->get();
$count = 0;
$skip = 0;

foreach ($rows as $r) {
    $namaRaw = $r->nama ?? '';
    $deskRaw = $r->deskripsi_lokasi ?? '';

    $namaArr = str_starts_with(trim($namaRaw), '{') ? json_decode($namaRaw, true) : null;
    $deskArr = str_starts_with(trim($deskRaw), '{') ? json_decode($deskRaw, true) : null;

    $isNamaBilingual = $namaArr && isset($namaArr['id']) && isset($namaArr['en']);
    $isDeskBilingual = $deskArr && isset($deskArr['id']) && isset($deskArr['en']);

    $updated = false;

    // Update nama jika belum bilingual
    if (!$isNamaBilingual) {
        $namaEn = $namaArr ? ($namaArr['en'] ?? $namaArr['id'] ?? $namaRaw) : $namaRaw;
        $namaNew = translateNama(trim($namaEn));
        DB::table('lokasioohs')->where('id', $r->id)->update([
            'nama' => json_encode($namaNew, JSON_UNESCAPED_UNICODE)
        ]);
        $updated = true;
    }

    // Update deskripsi jika belum bilingual
    if (!$isDeskBilingual) {
        $deskEn = $deskArr ? ($deskArr['en'] ?? $deskArr['id'] ?? $deskRaw) : $deskRaw;
        $deskEn = trim($deskEn);

        // Cari terjemahan dari kamus
        $deskId = null;
        foreach ($deskTranslations as $en => $id) {
            if (trim($en) === $deskEn || str_replace("\r\n", "\n", trim($en)) === str_replace("\r\n", "\n", $deskEn)) {
                $deskId = $id;
                break;
            }
        }

        // Jika tidak ada di kamus, buat terjemahan otomatis sederhana
        if ($deskId === null) {
            $deskId = $deskEn; // fallback: sama dulu
            // Terjemahan kata-kata umum
            $deskId = str_replace('Densely Populated Residential Area', 'Kawasan permukiman padat penduduk', $deskId);
            $deskId = str_replace('Densely populated residential areas', 'Kawasan permukiman padat penduduk', $deskId);
            $deskId = str_replace('Shopping and Business District', 'Kawasan perbelanjaan dan bisnis', $deskId);
            $deskId = str_replace('Shopping and Business Area', 'Area perbelanjaan dan bisnis', $deskId);
            $deskId = str_replace('Business and Office Area', 'Area bisnis dan perkantoran', $deskId);
            $deskId = str_replace('Hangout Area', 'area nongkrong', $deskId);
            $deskId = str_replace('Near ', 'Dekat ', $deskId);
            $deskId = str_replace('near ', 'dekat ', $deskId);
            $deskId = str_replace('Located on', 'Berlokasi di', $deskId);
            $deskId = str_replace('Located in', 'Berlokasi di', $deskId);
            $deskId = str_replace('Access to', 'Akses ke', $deskId);
            $deskId = str_replace('Heading to', 'Menuju', $deskId);
            $deskId = str_replace('heading to', 'menuju', $deskId);
            $deskId = str_replace('Towards ', 'Menuju ', $deskId);
            $deskId = str_replace('towards ', 'menuju ', $deskId);
            $deskId = str_replace('In front of', 'Di depan', $deskId);
            $deskId = str_replace('in front of', 'di depan', $deskId);
            $deskId = str_replace('Residential Area', 'Kawasan permukiman', $deskId);
            $deskId = str_replace('Hotel area', 'Area hotel', $deskId);
            $deskId = str_replace('Market', 'Pasar', $deskId);
            $deskId = str_replace('Mosque', 'Masjid', $deskId);
            $deskId = str_replace('Monument', 'Monumen', $deskId);
        }

        DB::table('lokasioohs')->where('id', $r->id)->update([
            'deskripsi_lokasi' => json_encode(['en' => $deskEn, 'id' => $deskId], JSON_UNESCAPED_UNICODE)
        ]);
        $updated = true;
    }

    if ($updated) {
        $count++;
        $nama = $namaArr ? ($namaArr['en'] ?? $namaRaw) : $namaRaw;
        echo "OK ID {$r->id}: " . substr($nama, 0, 60) . "\n";
    } else {
        $skip++;
        echo "SKIP ID {$r->id}: already bilingual\n";
    }
}

echo "\nUpdated: $count | Skipped: $skip | Total: " . ($count + $skip) . "\n";
