<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Data terjemahan: [id_portofolio => ['id' => '...teks Indonesia...', 'en' => '...teks English...']]
$translations = [

    13 => [
        'judul' => ['id' => 'Fest and Fun Run Hari TNI 2025', 'en' => 'Fest and Fun Run for the Indonesian Army Day 2025'],
        'deskripsi' => [
            'en' => 'FEST AND FUN RUN INDONESIAN ARMY DAY 2025 Run for Care, Move for Sharing In commemoration of Indonesian Army Day 2025, the Tanjung Balai Asahan Naval Base is organizing a Fest and Fun Run event to be held at Kisaran Square on December 7, 2025. This event is not only a sporting and social gathering, but also a tangible expression of social care for others. With the spirit of "Running for Care, Moving for Sharing," this event is also held as a fundraising initiative to help flood victims in Aceh, North Sumatra, and West Sumatra. Through small steps taken together, it is hoped that hope and assistance can be brought to communities affected by disasters. The event was attended by 2,089 participants divided into three categories: 3K Fun Run for Students, 5K Fun Run for the General Public, and 5K Fun Run for Institutions. The enthusiasm of the participants reflects the high level of solidarity and concern of the community regarding the importance of health and humanitarian values. Through the Indonesian Army Day 2025 Fest and Fun Run, it is hoped that a spirit of nationalism, togetherness, social awareness, and a healthy lifestyle will be fostered, in line with the values of the Indonesian Army\'s service to the nation and state.',
            'id' => 'FEST AND FUN RUN HARI TNI 2025 — Berlari untuk Peduli, Bergerak untuk Berbagi Dalam rangka memperingati Hari Ulang Tahun TNI 2025, Pangkalan TNI AL Tanjung Balai Asahan menyelenggarakan acara Fest and Fun Run yang akan dilaksanakan di Lapangan Kisaran pada tanggal 7 Desember 2025. Acara ini bukan sekadar kegiatan olahraga dan silaturahmi, tetapi juga merupakan wujud nyata kepedulian sosial terhadap sesama. Dengan semangat "Berlari untuk Peduli, Bergerak untuk Berbagi," acara ini juga diselenggarakan sebagai inisiatif penggalangan dana untuk membantu korban banjir di Aceh, Sumatera Utara, dan Sumatera Barat. Melalui langkah kecil yang diambil bersama-sama, diharapkan harapan dan bantuan dapat dibawa kepada masyarakat yang terdampak bencana. Acara ini diikuti oleh 2.089 peserta yang terbagi dalam tiga kategori: Fun Run 3K untuk Pelajar, Fun Run 5K untuk Umum, dan Fun Run 5K untuk Instansi. Antusiasme para peserta mencerminkan tingginya semangat solidaritas dan kepedulian masyarakat terhadap pentingnya kesehatan dan nilai-nilai kemanusiaan. Melalui Fest and Fun Run HUT TNI 2025, diharapkan semangat kebangsaan, kebersamaan, kesadaran sosial, dan gaya hidup sehat dapat terus ditumbuhkan, selaras dengan nilai-nilai pengabdian TNI kepada bangsa dan negara.',
        ],
    ],

    14 => [
        'judul' => ['id' => 'Cara Bayar Indihome', 'en' => 'Cara Bayar Indihome'],
        'deskripsi' => [
            'en' => 'The installation of videotrons at the SIB Roundabout has become a strategic medium of information for the public to learn about the various IndiHome payment methods. Through clear and informative visual displays, these videotrons facilitate the delivery of information in a practical and easy-to-understand manner. Their presence in public spaces also strengthens the visibility of Telkomsel\'s services in supporting easy access to digital information for the public.',
            'id' => 'Pemasangan videotron di Bundaran SIB menjadi media informasi strategis bagi masyarakat untuk mengetahui berbagai cara pembayaran IndiHome. Melalui tampilan visual yang jelas dan informatif, videotron ini memudahkan penyampaian informasi secara praktis dan mudah dipahami. Kehadirannya di ruang publik juga memperkuat visibilitas layanan Telkomsel dalam mendukung kemudahan akses informasi digital bagi masyarakat.',
        ],
    ],

    15 => [
        'judul' => ['id' => 'Sumut Mobile', 'en' => 'Sumut Mobile'],
        'deskripsi' => [
            'en' => "Sumut Mobile – Bank Sumut\nInstallation of videotrons for Bank Sumut as a medium for Sumut Mobile service information. The presence of these videotrons supports Bank Sumut in introducing the convenience of digital banking services to the public in a clear and effective manner in public spaces.",
            'id' => "Sumut Mobile – Bank Sumut\nPemasangan videotron untuk Bank Sumut sebagai media informasi layanan Sumut Mobile. Kehadiran videotron ini mendukung Bank Sumut dalam memperkenalkan kemudahan layanan perbankan digital kepada masyarakat secara jelas dan efektif di ruang publik.",
        ],
    ],

    16 => [
        'judul' => ['id' => 'Hutversary', 'en' => 'Hutversary'],
        'deskripsi' => [
            'en' => 'Installation of videotrons for Bank BTN in celebration of its anniversary. Videotrons serve as a visual medium to reinforce the celebration message and increase Bank BTN\'s exposure to the public in public spaces.',
            'id' => 'Pemasangan videotron untuk Bank BTN dalam rangka perayaan hari ulang tahunnya. Videotron berfungsi sebagai media visual untuk mempertegas pesan perayaan dan meningkatkan eksposur Bank BTN kepada masyarakat di ruang publik.',
        ],
    ],

    17 => [
        'judul' => ['id' => 'My Tsel SuperApp', 'en' => 'My Tsel SuperApp'],
        'deskripsi' => [
            'en' => "MyTelkomsel SuperApp – Telkomsel\nInstallation of DOOH (Digital Out of Home) media for MyTelkomsel SuperApp at Graha Merah Putih. The presence of this digital media supports the strengthening of Telkomsel's services through the delivery of clear and effective information in strategic areas.",
            'id' => "MyTelkomsel SuperApp – Telkomsel\nPemasangan media DOOH (Digital Out of Home) untuk MyTelkomsel SuperApp di Graha Merah Putih. Kehadiran media digital ini mendukung penguatan layanan Telkomsel melalui penyampaian informasi yang jelas dan efektif di area strategis.",
        ],
    ],

    18 => [
        'judul' => ['id' => 'Halo Device Bold', 'en' => 'Halo Device Bold'],
        'deskripsi' => [
            'en' => "Halo Device Bold\nInstallation of digital media for Halo Device Bold as a means of providing information about Telkomsel services. This media supports the delivery of clear and interesting information, as well as strengthening the brand's presence in public spaces.",
            'id' => "Halo Device Bold\nPemasangan media digital untuk Halo Device Bold sebagai sarana penyampaian informasi mengenai layanan Telkomsel. Media ini mendukung penyampaian informasi yang jelas dan menarik, sekaligus memperkuat kehadiran merek di ruang publik.",
        ],
    ],

    20 => [
        'judul' => ['id' => 'Super Seru Telkomsel', 'en' => 'Super Seru Telkomsel'],
        'deskripsi' => [
            'en' => 'Super Seru - Telkomsel OOH is displayed on Jalan Diponegoro, Pasar Gunungsitoli, Kecamatan Gunungsitoli as an outdoor communication medium to reach a wide audience in the center of activity.',
            'id' => 'OOH Super Seru – Telkomsel dipasang di Jalan Diponegoro, Pasar Gunungsitoli, Kecamatan Gunungsitoli sebagai media komunikasi luar ruang untuk menjangkau audiens yang luas di pusat kegiatan masyarakat.',
        ],
    ],

    21 => [
        'judul' => ['id' => 'Super Seru - Telkomsel', 'en' => 'Super Seru - Telkomsel'],
        'deskripsi' => [
            'en' => 'Super Seru - Telkomsel OOH is displayed on Jalan Diponegoro, Pasar Gunungsitoli, Kecamatan Gunungsitoli as an outdoor communication medium to reach a wide audience in the center of activity.',
            'id' => 'OOH Super Seru – Telkomsel dipasang di Jalan Diponegoro, Pasar Gunungsitoli, Kecamatan Gunungsitoli sebagai media komunikasi luar ruang untuk menjangkau audiens yang luas di pusat kegiatan masyarakat.',
        ],
    ],

    22 => [
        'judul' => ['id' => 'Terbaik Untukmu - Telkomsel', 'en' => 'Terbaik Untukmu - Telkomsel'],
        'deskripsi' => [
            'en' => 'Terbaik untukmu - Telkomsel OOH is displayed on Jalan Diponegoro, Pasar Gunungsitoli, Kecamatan Gunungsitoli as an outdoor communication medium to reach a wide audience in the center of activity.',
            'id' => 'OOH Terbaik Untukmu – Telkomsel dipasang di Jalan Diponegoro, Pasar Gunungsitoli, Kecamatan Gunungsitoli sebagai media komunikasi luar ruang untuk menjangkau audiens yang luas di pusat kegiatan masyarakat.',
        ],
    ],

    23 => [
        'judul' => ['id' => 'Youtube Premium', 'en' => 'Youtube Premium'],
        'deskripsi' => [
            'en' => 'OOH YouTube Premium is broadcast as outdoor promotional media to increase awareness of ad-free viewing, offline downloads, and background playback services.',
            'id' => 'OOH YouTube Premium disiarkan sebagai media promosi luar ruang untuk meningkatkan kesadaran masyarakat tentang layanan menonton bebas iklan, unduhan offline, dan pemutaran di latar belakang.',
        ],
    ],

    25 => [
        'judul' => ['id' => 'PLN - Energi Kemerdekaan', 'en' => 'PLN - Energy of Independence'],
        'deskripsi' => [
            'en' => 'The installation of Digital Out-of-Home (DOOH) on curved LED videotrons is a strategic project that integrates premium outdoor media placement with the momentum of PLN\'s national "Energy of Independence" campaign. Located in an iconic high-traffic location adjacent to the landmark clock tower, this visual asset is designed to maximize audience viewing angles through a high-resolution wide screen displaying the urgency of the 50% power upgrade discount program. The project execution includes creative layout adjustments to ensure proportionality and readability on the curved screen, keeping the main message about the activation deadline as the primary focus for both drivers and pedestrians. This project demonstrates the ability to strategically manage ad placement, creating a strong visual impact, massively increasing brand awareness, and driving app usage conversion through the integration of dynamic and contextual digital messaging.',
            'id' => 'Proyek pemasangan Digital Out-of-Home (DOOH) pada videotron LED melengkung merupakan proyek strategis yang memadukan penempatan media luar ruang premium dengan momentum kampanye nasional PLN "Energi Kemerdekaan". Berlokasi di titik lalu lintas tinggi yang ikonik berdekatan dengan menara jam landmark, aset visual ini dirancang untuk memaksimalkan sudut pandang audiens melalui layar lebar resolusi tinggi yang menampilkan program diskon peningkatan daya listrik 50%. Pelaksanaan proyek mencakup penyesuaian tata letak kreatif untuk memastikan proporsionalitas dan keterbacaan pada layar melengkung, menjaga pesan utama tentang batas waktu aktivasi sebagai fokus utama bagi pengemudi maupun pejalan kaki. Proyek ini mendemonstrasikan kemampuan dalam mengelola penempatan iklan secara strategis, menciptakan dampak visual yang kuat, meningkatkan kesadaran merek secara masif, dan mendorong konversi penggunaan aplikasi melalui integrasi pesan digital yang dinamis dan kontekstual.',
        ],
    ],

    26 => [
        'judul' => ['id' => 'Film Horor Rest Area - Trailer', 'en' => 'Horror Film Rest Area - Trailer'],
        'deskripsi' => [
            'en' => 'This Digital Out-of-Home (DOOH) project involves managing the publication of trailers for the horror film "Rest Area" on strategic videotron screens located at busy urban traffic intersections. By utilizing landscape-format videotron media integrated into iconic monuments at the center of community mobility, this campaign focuses on building public curiosity through contrasting visuals and provocative copywriting about the movie\'s premiere date in theaters. The placement of this outdoor media is designed to create repetitive visual exposure for drivers and pedestrians, thereby effectively increasing brand awareness and sparking organic conversations on social media ahead of the film\'s official release. Through precise placement coordination and sharp digital display quality, this project successfully transformed public locations into dynamic promotional spaces to attract the interest of national film enthusiasts.',
            'id' => 'Proyek Digital Out-of-Home (DOOH) ini melibatkan pengelolaan publikasi trailer film horor "Rest Area" pada layar videotron strategis yang berlokasi di persimpangan lalu lintas perkotaan yang ramai. Dengan memanfaatkan media videotron format landscape yang terintegrasi pada monumen ikonik di pusat mobilitas masyarakat, kampanye ini berfokus pada membangun rasa penasaran publik melalui visual kontras dan copywriting yang provokatif mengenai tanggal tayang perdana film di bioskop. Penempatan media luar ruang ini dirancang untuk menciptakan paparan visual berulang bagi pengemudi dan pejalan kaki, sehingga secara efektif meningkatkan kesadaran merek dan memancing percakapan organik di media sosial menjelang rilis resmi film. Melalui koordinasi penempatan yang presisi dan kualitas tampilan digital yang tajam, proyek ini berhasil mengubah lokasi publik menjadi ruang promosi dinamis untuk menarik minat pecinta film nasional.',
        ],
    ],

    27 => [
        'judul' => ['id' => 'Film Timur - Trailer', 'en' => 'Film Timur - Trailer'],
        'deskripsi' => [
            'en' => 'This Digital Out-of-Home (DOOH) publication project for the film "Timur" features a cinematic promotional strategy that utilizes massive curved LED infrastructure at the center of urban activity in Medan, specifically at the iconic intersection of Jalan Guru Patimpus. By placing strong character profile visuals alongside evocative narratives such as "Climbing the Career Ladder in Hollywood," this campaign is designed to create an emotional impact and prestige among audiences passing through this high-traffic area. This execution highlights the integration of modern outdoor media with creative storytelling content, effectively increasing the film\'s brand awareness while positioning it as a high-quality viewing experience for the general public amidst the hustle and bustle of urban mobility.',
            'id' => 'Proyek publikasi Digital Out-of-Home (DOOH) untuk film "Timur" menampilkan strategi promosi sinematik yang memanfaatkan infrastruktur LED melengkung masif di pusat aktivitas perkotaan Medan, tepatnya di persimpangan ikonik Jalan Guru Patimpus. Dengan menempatkan visual profil karakter yang kuat berdampingan dengan narasi evocatif seperti "Mendaki Tangga Karir di Hollywood," kampanye ini dirancang untuk menciptakan dampak emosional dan prestise di kalangan audiens yang melintas di area dengan lalu lintas tinggi ini. Eksekusi ini menyoroti integrasi media luar ruang modern dengan konten storytelling kreatif, secara efektif meningkatkan kesadaran merek film sekaligus memposisikannya sebagai pengalaman menonton berkualitas tinggi bagi masyarakat umum di tengah hiruk-pikuk mobilitas perkotaan.',
        ],
    ],

    28 => [
        'judul' => ['id' => 'Danantara - Melayani Sepenuh Hati', 'en' => 'Danantara - Serving Wholeheartedly'],
        'deskripsi' => [
            'en' => 'Danantara Indonesia\'s "Serving Wholeheartedly" Digital Out-of-Home (DOOH) publication project is a corporate branding campaign executed through premium curved videotron media in strategic locations in downtown Medan. By utilizing high-resolution screens located right next to the iconic clock tower and the busy Guru Patimpus Road, this campaign focuses on strengthening the image of professionalism and dedication to service through clean visuals and humanistic messages. This strategic placement ensures a wide audience reach across various segments of society, from professionals to public transportation users, to build public trust in Danantara\'s new identity as a credible institution focused on excellent service.',
            'id' => 'Proyek publikasi Digital Out-of-Home (DOOH) "Melayani Sepenuh Hati" dari Danantara Indonesia merupakan kampanye branding korporat yang dieksekusi melalui media videotron melengkung premium di lokasi strategis di pusat kota Medan. Dengan memanfaatkan layar resolusi tinggi yang berada tepat di sebelah menara jam ikonik dan Jalan Guru Patimpus yang ramai, kampanye ini berfokus pada penguatan citra profesionalisme dan dedikasi pelayanan melalui visual yang bersih dan pesan yang humanis. Penempatan strategis ini memastikan jangkauan audiens yang luas dari berbagai segmen masyarakat, mulai dari para profesional hingga pengguna transportasi umum, untuk membangun kepercayaan publik terhadap identitas baru Danantara sebagai institusi terpercaya yang berfokus pada pelayanan prima.',
        ],
    ],

    29 => [
        'judul' => ['id' => 'BNI DIRECT - CAPABILITIES EVENT 2025', 'en' => 'BNI DIRECT - CAPABILITIES EVENT 2025'],
        'deskripsi' => [
            'en' => 'This professional event management project entitled "BNI direct Capabilities Event Vol. 3: Redefining Transaction Banking Experience" is an exclusive banking forum organized by BNI in Medan on July 25, 2025. As part of its corporate event management portfolio, this project encompasses comprehensive coordination ranging from stage visual production using LED technology to display dynamic background graphics, audience management for banking professionals, to technical arrangements for speaker presentations. Through its modern and elegant event packaging, this event successfully served as a strategic educational platform on the latest innovations in digital banking transactions, while also strengthening synergistic collaboration between financial institutions and business partners within the national banking ecosystem.',
            'id' => 'Proyek manajemen acara profesional bertajuk "BNI direct Capabilities Event Vol. 3: Redefining Transaction Banking Experience" merupakan forum perbankan eksklusif yang diselenggarakan oleh BNI di Medan pada tanggal 25 Juli 2025. Sebagai bagian dari portofolio manajemen acara korporat, proyek ini mencakup koordinasi komprehensif mulai dari produksi visual panggung menggunakan teknologi LED untuk menampilkan grafis latar belakang yang dinamis, manajemen audiens para profesional perbankan, hingga pengaturan teknis untuk presentasi para pembicara. Melalui kemasan acara yang modern dan elegan, event ini berhasil menjadi platform edukasi strategis mengenai inovasi terbaru dalam transaksi perbankan digital, sekaligus memperkuat sinergi kolaborasi antara lembaga keuangan dan mitra bisnis dalam ekosistem perbankan nasional.',
        ],
    ],

    30 => [
        'judul' => ['id' => 'MUSWIL VI Partai Amanat Nasional Sumut', 'en' => 'MUSWIL VI National Mandate Party of North Sumatra'],
        'deskripsi' => [
            'en' => 'The regional political event management project entitled "Musyawarah Wilayah VI Partai Amanat Nasional Provinsi Sumatera Utara" (6th Regional Conference of the National Mandate Party of North Sumatra Province) held in Medan on April 25, 2025, demonstrated expertise in managing formal events with high protocol standards. As part of the event infrastructure provider, this project involved the installation of a giant LED backdrop system that displayed live streaming and dynamic graphic content of the party\'s identity, ergonomic stage management, and lighting and audio systems that ensured clear communication of political messages to all cadres. The successful implementation of this Regional Conference confirms the ability to handle the logistics of large organizational events that require precise technical coordination, stable multimedia technology integration, and representative space planning to support the smooth running of the organization\'s strategic decision-making agenda.',
            'id' => 'Proyek manajemen acara politik regional bertajuk "Musyawarah Wilayah VI Partai Amanat Nasional Provinsi Sumatera Utara" yang dilaksanakan di Medan pada tanggal 25 April 2025 menunjukkan keahlian dalam mengelola acara formal dengan standar protokol tinggi. Sebagai penyedia infrastruktur acara, proyek ini melibatkan pemasangan sistem backdrop LED raksasa yang menampilkan live streaming dan konten grafis dinamis identitas partai, manajemen panggung yang ergonomis, serta sistem pencahayaan dan audio yang memastikan komunikasi pesan politik secara jelas kepada seluruh kader. Keberhasilan pelaksanaan Musyawarah Wilayah ini membuktikan kemampuan dalam menangani logistik acara organisasi berskala besar yang memerlukan koordinasi teknis yang presisi, integrasi teknologi multimedia yang stabil, dan perencanaan ruang yang representatif untuk mendukung kelancaran agenda pengambilan keputusan strategis organisasi.',
        ],
    ],

    31 => [
        'judul' => ['id' => 'HUT RI ke-80 di Gunungsitoli (NIAS)', 'en' => 'The 80th Anniversary of the Republic of Indonesia in Gunungsitoli (NIAS)'],
        'deskripsi' => [
            'en' => 'The public event management project to celebrate the 80th Anniversary of the Republic of Indonesia in Gunungsitoli is a series of intensive independence celebration activities starting on August 7, 2025, with the full support of Telkomsel as the main sponsor. This event is designed to foster a spirit of nationalism and community togetherness through the organization of various folk competitions—ranging from traditional contests to creative activities—involving the active participation of students, youth, and the general public in a representative open area. As the event organizer, this project includes providing stage infrastructure with the thematic branding "Semangat Merdeka" (Spirit of Independence), coordinating the participant tent area for audience comfort, and managing event protocols to ensure that all competitions run smoothly and cheerfully, while strengthening the sponsor\'s brand presence amid the excitement of local celebrations that are rich in collaboration and joy.',
            'id' => 'Proyek manajemen acara publik dalam rangka memperingati HUT RI ke-80 di Gunungsitoli merupakan serangkaian kegiatan perayaan kemerdekaan yang intensif mulai tanggal 7 Agustus 2025, dengan dukungan penuh Telkomsel sebagai sponsor utama. Acara ini dirancang untuk menumbuhkan semangat kebangsaan dan kebersamaan masyarakat melalui penyelenggaraan berbagai perlombaan rakyat—mulai dari lomba tradisional hingga kegiatan kreatif—yang melibatkan partisipasi aktif pelajar, pemuda, dan masyarakat umum di lapangan terbuka yang representatif. Sebagai penyelenggara acara, proyek ini mencakup penyediaan infrastruktur panggung dengan branding tematik "Semangat Merdeka", koordinasi area tenda peserta untuk kenyamanan audiens, dan pengelolaan protokol acara untuk memastikan seluruh perlombaan berjalan dengan lancar dan meriah, sekaligus memperkuat kehadiran merek sponsor di tengah kemeriahan perayaan lokal yang kaya kolaborasi dan kegembiraan.',
        ],
    ],

    32 => [
        'judul' => ['id' => 'Colorful Medan Carnival - HUT Kota Medan 2025', 'en' => 'Colorful Medan Carnival - Medan City Anniversary 2025'],
        'deskripsi' => [
            'en' => 'The Colorful Medan Carnival event, held the celebrate the 435th anniversary of Medan City, was a massive cultural and entertainment event held at Benteng Field to celebrate the diversity of the capital city of North Sumatra. With the theme "Medan untuk semua" (Medan for All), the event successfully brought together thousands of residents in an inclusive atmosphere of celebration, while also demonstrating the ability to execute complex outdoor event logistics, from the arrangement of a large audience area to visual content management that reinforced the message of togetherness and pride in the local heritage of the city of Medan.',
            'id' => 'Acara Colorful Medan Carnival yang diselenggarakan untuk merayakan HUT Kota Medan ke-435 merupakan acara budaya dan hiburan berskala besar yang diadakan di Lapangan Benteng untuk merayakan keberagaman ibu kota Sumatera Utara. Dengan tema "Medan untuk Semua," acara ini berhasil menyatukan ribuan warga dalam suasana perayaan yang inklusif, sekaligus mendemonstrasikan kemampuan dalam mengeksekusi logistik acara outdoor yang kompleks, mulai dari penataan area audiens yang besar hingga pengelolaan konten visual yang memperkuat pesan kebersamaan dan kebanggaan terhadap warisan lokal kota Medan.',
        ],
    ],

    33 => [
        'judul' => ['id' => 'Agra Xplore Alam Siosar', 'en' => 'Agra Xplore Alam Siosar'],
        'deskripsi' => [
            'en' => 'This automotive and adventure event management project, titled "Agra Xplore Alam Siosar," is an exclusive event that brings together the off-road community and nature lovers in an exploration experience in the highlands of Siosar. As part of the outdoor event management portfolio, this project involves complex logistical coordination in challenging terrain, ranging from the installation of branding attributes such as large-scale thematic backdrops, management of technical vehicle parking areas, to arranging accommodation for participants at the event location. Collaborating with strategic partners such as the Indonesia Offroad Federation (IOF), the event successfully created a platform for 4x4 enthusiasts to test their skills while promoting local natural tourism potential, demonstrating our ability to execute hobby-based events with professional safety and organizational standards in remote locations.',
            'id' => 'Proyek manajemen acara otomotif dan petualangan bertajuk "Agra Xplore Alam Siosar" merupakan acara eksklusif yang mempertemukan komunitas off-road dan pecinta alam dalam pengalaman eksplorasi di dataran tinggi Siosar. Sebagai bagian dari portofolio manajemen acara outdoor, proyek ini melibatkan koordinasi logistik yang kompleks di medan yang menantang, mulai dari pemasangan atribut branding seperti backdrop tematik berskala besar, pengelolaan area parkir kendaraan teknis, hingga pengaturan akomodasi peserta di lokasi acara. Berkolaborasi dengan mitra strategis seperti Indonesia Offroad Federation (IOF), acara ini berhasil menciptakan platform bagi para penggemar 4x4 untuk menguji kemampuan mereka sekaligus mempromosikan potensi wisata alam lokal, menunjukkan kemampuan kami dalam mengeksekusi acara berbasis hobi dengan standar keselamatan dan organisasi profesional di lokasi terpencil.',
        ],
    ],

    36 => [
        'judul' => ['id' => 'Hantaru BPN', 'en' => 'Hantaru BPN'],
        'deskripsi' => [
            'en' => 'The organization of the HANTARU 2024 event for the Badan Pertanahan Nasional (BPN) is a large-scale outdoor event management project designed to commemorate a strategic moment in the field of agrarian and spatial planning. As the event organizer, this project encompasses the coordination of a magnificent main stage infrastructure, the installation of audio and visual systems through giant LED screens for documenting activities, and crowd management involving hundreds of participants wearing themed uniforms. The main focus of this execution is to create a dynamic and inclusive celebratory atmosphere, as seen in the integration of entertainment elements such as balloon releases and musical performances on stage, while ensuring that the message of inter-agency synergy is conveyed professionally through organized area arrangements.',
            'id' => 'Penyelenggaraan acara HANTARU 2024 untuk Badan Pertanahan Nasional (BPN) merupakan proyek manajemen acara outdoor berskala besar yang dirancang untuk memperingati momen strategis di bidang agraria dan tata ruang. Sebagai penyelenggara acara, proyek ini mencakup koordinasi infrastruktur panggung utama yang megah, pemasangan sistem audio dan visual melalui layar LED raksasa untuk mendokumentasikan kegiatan, dan manajemen kerumunan yang melibatkan ratusan peserta berseragam bertema. Fokus utama eksekusi ini adalah menciptakan suasana perayaan yang dinamis dan inklusif, sebagaimana terlihat dalam integrasi elemen hiburan seperti pelepasan balon dan penampilan musik di atas panggung, sekaligus memastikan pesan sinergi antar instansi tersampaikan secara profesional melalui penataan area yang terorganisir.',
        ],
    ],

    37 => [
        'judul' => ['id' => 'LIvingfest Swaraloka X Tokabe', 'en' => 'LIvingfest Swaraloka X Tokabe'],
        'deskripsi' => [
            'en' => 'The "Livin\' Fest Music: Swaraloka" music festival project by Bank Mandiri is one of the prestigious achievements in large-scale entertainment management that combines cutting-edge visual and audio technology. In collaboration between Swaraloka and tokabe, this project highlights technical expertise in designing stage infrastructure with dynamic lighting and vertical LED panel installations that display synchronized visual content throughout the artists\' performances, including the legendary band Jamrud. The primary focus of this project was to create an immersive audience experience through sharp sound system setup and a dramatic stage atmosphere, demonstrating the team\'s ability to execute professional music festival production with high safety standards and complex operational coordination in front of thousands of spectators.',
            'id' => 'Proyek festival musik "Livin\' Fest Music: Swaraloka" oleh Bank Mandiri merupakan salah satu pencapaian bergengsi dalam manajemen hiburan berskala besar yang memadukan teknologi visual dan audio mutakhir. Berkolaborasi antara Swaraloka dan Tokabe, proyek ini menyoroti keahlian teknis dalam merancang infrastruktur panggung dengan pencahayaan dinamis dan instalasi panel LED vertikal yang menampilkan konten visual tersinkronisasi sepanjang penampilan para artis, termasuk band legendaris Jamrud. Fokus utama proyek ini adalah menciptakan pengalaman imersif bagi penonton melalui pengaturan sound system yang tajam dan suasana panggung yang dramatis, menunjukkan kemampuan tim dalam mengeksekusi produksi festival musik profesional dengan standar keselamatan tinggi dan koordinasi operasional yang kompleks di hadapan ribuan penonton.',
        ],
    ],

    38 => [
        'judul' => ['id' => 'Konser Sheila on 7 "Tunggu Aku di Medan"', 'en' => 'Sheila on 7\'s "Tunggu Aku di Medan" concert'],
        'deskripsi' => [
            'en' => 'In general, Sheila on 7\'s "Tunggu Aku di Medan" concert was a stadium-scale music event designed to provide an immersive nostalgic experience for tens of thousands of fans in North Sumatra. This project highlighted expertise in high-level stage production, integrating spectacular lighting systems with giant LED screens to deliver sharp visuals in real time. The main focus of the event management is to ensure the smooth flow of stage technical operations and intimate interaction between the artists and the massive crowd, setting a new standard for professional, safe, and emotionally memorable national headliner concerts.',
            'id' => 'Konser Sheila on 7 "Tunggu Aku di Medan" merupakan acara musik berskala stadion yang dirancang untuk menghadirkan pengalaman nostalgia yang imersif bagi puluhan ribu penggemar di Sumatera Utara. Proyek ini menyoroti keahlian dalam produksi panggung tingkat tinggi, memadukan sistem pencahayaan spektakuler dengan layar LED raksasa untuk menghadirkan visual yang tajam secara real time. Fokus utama manajemen acara adalah memastikan kelancaran operasional teknis panggung dan interaksi intim antara artis dengan kerumunan penonton yang masif, menetapkan standar baru dalam penyelenggaraan konser headliner nasional yang profesional, aman, dan berkesan secara emosional.',
        ],
    ],

    39 => [
        'judul' => ['id' => 'Booth Brimo', 'en' => 'Booth Brimo'],
        'deskripsi' => [
            'en' => 'The brand activation project through the design and construction of the BRImo interactive booth features a modern open stage concept with dynamic and futuristic visual aesthetics. The use of brightly colored graphic elements integrated with LED lighting and an iconic neon box logo is designed to attract visitors\' attention in outdoor festival areas. This area not only serves as a digital banking service information point, but also as a comfortable interaction space for customers through minimalist furniture arrangement and QR code integration for easy access to BRImo features, which effectively increases brand engagement and new user conversions amid the hustle and bustle of the event.',
            'id' => 'Proyek aktivasi merek melalui desain dan konstruksi booth interaktif BRImo menampilkan konsep panggung terbuka modern dengan estetika visual yang dinamis dan futuristik. Penggunaan elemen grafis berwarna cerah yang dipadukan dengan pencahayaan LED dan logo neon box ikonik dirancang untuk menarik perhatian pengunjung di area festival outdoor. Area ini tidak hanya berfungsi sebagai titik informasi layanan perbankan digital, tetapi juga sebagai ruang interaksi yang nyaman bagi nasabah melalui penataan furnitur minimalis dan integrasi kode QR untuk kemudahan akses fitur BRImo, yang secara efektif meningkatkan keterlibatan merek dan konversi pengguna baru di tengah keramaian acara.',
        ],
    ],

    42 => [
        'judul' => ['id' => 'Booth Mobbi', 'en' => 'Booth Mobbi'],
        'deskripsi' => [
            'en' => 'This brand activation project through the design and construction of an interactive booth for mobbi (a member of Astra) carries a modern semi-open design concept with bright and communicative visual nuances. The stage structure, dominated by colorful graphic elements and clean white LED lighting, creates a strong visual appeal in the night festival area, while emphasizing the brand\'s identity as a user-friendly platform. The functional layout, which includes a minimalist bar table, waiting chairs, and the use of cube signage at the front, is strategically designed to optimize customer interaction and facilitate a more casual and effective introduction to Astra\'s automotive ecosystem services.',
            'id' => 'Proyek aktivasi merek melalui desain dan konstruksi booth interaktif untuk mobbi (anggota Astra) mengusung konsep desain semi-terbuka modern dengan nuansa visual yang cerah dan komunikatif. Struktur panggung yang didominasi elemen grafis berwarna-warni dan pencahayaan LED putih bersih menciptakan daya tarik visual yang kuat di area festival malam hari, sekaligus menegaskan identitas merek sebagai platform yang ramah pengguna. Tata letak fungsional yang mencakup meja bar minimalis, kursi tunggu, dan penggunaan signage kubus di bagian depan dirancang secara strategis untuk mengoptimalkan interaksi pelanggan dan memfasilitasi pengenalan yang lebih kasual dan efektif terhadap layanan ekosistem otomotif Astra.',
        ],
    ],

    43 => [
        'judul' => ['id' => 'Booth Btv', 'en' => 'Booth Btv'],
        'deskripsi' => [
            'en' => 'This brand activation project through the design and construction of an interactive booth for BTV carries a modern semi-open design concept with bright and communicative visual nuances. The stage structure, dominated by colorful graphic elements and clean white LED lighting, creates a strong visual appeal in the night festival area, while emphasizing the brand\'s identity as a dynamic television media. The functional layout of the area, which includes a minimalist bar table, waiting chairs, and the use of cube signage at the front, is strategically designed to optimize visitor interaction and facilitate a more casual and effective introduction to BTV\'s flagship programs.',
            'id' => 'Proyek aktivasi merek melalui desain dan konstruksi booth interaktif untuk BTV mengusung konsep desain semi-terbuka modern dengan nuansa visual yang cerah dan komunikatif. Struktur panggung yang didominasi elemen grafis berwarna-warni dan pencahayaan LED putih bersih menciptakan daya tarik visual yang kuat di area festival malam hari, sekaligus menegaskan identitas merek sebagai media televisi yang dinamis. Tata letak fungsional yang mencakup meja bar minimalis, kursi tunggu, dan penggunaan signage kubus di bagian depan dirancang secara strategis untuk mengoptimalkan interaksi pengunjung dan memfasilitasi pengenalan yang lebih kasual dan efektif terhadap program-program unggulan BTV.',
        ],
    ],

    44 => [
        'judul' => ['id' => 'Booth Soffel', 'en' => 'Booth Soffel'],
        'deskripsi' => [
            'en' => 'This brand activation project through the design and construction of an interactive booth for Soffel carries a modern semi-open design concept with bright and communicative visual nuances. The stage structure, dominated by colorful graphic elements and clean white LED lighting, creates a strong visual appeal in the night festival area, while emphasizing the brand\'s identity as a dynamic self-protection product. The functional layout of the area, which includes a minimalist bar table, waiting chairs, and the use of cube signage at the front, is strategically designed to optimize visitor interaction and facilitate a more casual and effective introduction to Soffel\'s product variants.',
            'id' => 'Proyek aktivasi merek melalui desain dan konstruksi booth interaktif untuk Soffel mengusung konsep desain semi-terbuka modern dengan nuansa visual yang cerah dan komunikatif. Struktur panggung yang didominasi elemen grafis berwarna-warni dan pencahayaan LED putih bersih menciptakan daya tarik visual yang kuat di area festival malam hari, sekaligus menegaskan identitas merek sebagai produk perlindungan diri yang dinamis. Tata letak fungsional yang mencakup meja bar minimalis, kursi tunggu, dan penggunaan signage kubus di bagian depan dirancang secara strategis untuk mengoptimalkan interaksi pengunjung dan memfasilitasi pengenalan yang lebih kasual dan efektif terhadap varian produk Soffel.',
        ],
    ],

    45 => [
        'judul' => ['id' => 'Room Tour & Video Profile - BPN Medan', 'en' => 'Room Tour & Video Profile - BPN Medan'],
        'deskripsi' => [
            'en' => 'This video production project for the Badan Pertanahan Nasional (BPN) office highlights the cinematography\'s ability to transform formal office spaces into dynamic and informative visual content. The primary focus of this videography is to capture the modern interior aesthetics of the building and the transparent flow of public services, through smooth camera movements (stabilized movement) and lighting techniques that emphasize the clean and professional feel of the space. With casual yet authoritative content packaging, this project aims to strengthen the agency\'s profile through the visualization of representative office facilities, while also providing an impression of comfort for the public visiting the BPN office in Medan.',
            'id' => 'Proyek produksi video untuk kantor Badan Pertanahan Nasional (BPN) ini menyoroti kemampuan sinematografi dalam mengubah ruang kantor formal menjadi konten visual yang dinamis dan informatif. Fokus utama videografi ini adalah mengabadikan estetika interior modern gedung dan alur pelayanan publik yang transparan, melalui gerakan kamera yang halus (stabilized movement) dan teknik pencahayaan yang menekankan nuansa ruang yang bersih dan profesional. Dengan kemasan konten yang kasual namun otoritatif, proyek ini bertujuan untuk memperkuat profil instansi melalui visualisasi fasilitas kantor yang representatif, sekaligus memberikan kesan kenyamanan bagi masyarakat yang akan mengunjungi kantor BPN Medan.',
        ],
    ],

    47 => [
        'judul' => ['id' => 'Konser The Great Journey of Noah', 'en' => 'The Great Journey of Noah Concert'],
        'deskripsi' => [
            'en' => 'The Great Journey of Noah concert in Surabaya was a spectacular music performance designed as a retrospective journey to celebrate the dedication and work of the band Noah to the Indonesian music industry. The event successfully presented an emotional and grand entertainment experience by bringing thousands of fans together in one arena through a performance narrative divided into several cinematic acts. As a large-scale event management project, the main focus was on the smooth flow of the program, organized audience management, and the creation of an intimate yet impressive atmosphere, setting a new standard in the organization of professional and memorable national arena concert tours for the entire ecosystem of music lovers in the country.',
            'id' => 'Konser The Great Journey of Noah di Surabaya merupakan penampilan musik yang spektakuler, dirancang sebagai perjalanan retrospektif untuk merayakan dedikasi dan karya band Noah bagi industri musik Indonesia. Acara ini berhasil menghadirkan pengalaman hiburan yang emosional dan megah dengan menyatukan ribuan penggemar dalam satu arena melalui narasi penampilan yang dibagi dalam beberapa babak sinematik. Sebagai proyek manajemen acara berskala besar, fokus utamanya adalah kelancaran alur program, manajemen penonton yang terorganisir, dan penciptaan suasana yang intim namun berkesan, menetapkan standar baru dalam penyelenggaraan tur konser arena headliner nasional yang profesional dan tak terlupakan bagi seluruh ekosistem pecinta musik di tanah air.',
        ],
    ],

    48 => [
        'judul' => ['id' => 'Interior BPN', 'en' => 'Interior BPN'],
        'deskripsi' => [
            'en' => 'This spatial identity design project for the Medan City National Land Agency (BPN) office focuses on strengthening visual and functional aspects through the installation of various information media and modern interior decorative elements. This work includes the design and installation of informative banners, public service posters, and exclusive acrylic boards that are precisely designed to create a clear communication flow for visitors while reinforcing the agency\'s professional image. Through the selection of high-quality materials and ergonomic layout, this project successfully transformed the service area into a more representative, informative, and comfortable space that effectively supports the delivery of strategic messages and premium service standards within the BPN Medan City environment.',
            'id' => 'Proyek desain identitas ruang untuk kantor Badan Pertanahan Nasional (BPN) Kota Medan ini berfokus pada penguatan aspek visual dan fungsional melalui pemasangan berbagai media informasi dan elemen dekorasi interior modern. Pekerjaan ini mencakup desain dan pemasangan banner informatif, poster layanan publik, dan papan akrilik eksklusif yang dirancang secara presisi untuk menciptakan alur komunikasi yang jelas bagi pengunjung sekaligus mempertegas citra profesional instansi. Melalui pemilihan material berkualitas tinggi dan tata letak ergonomis, proyek ini berhasil mengubah area layanan menjadi ruang yang lebih representatif, informatif, dan nyaman yang secara efektif mendukung penyampaian pesan strategis dan standar pelayanan premium di lingkungan BPN Kota Medan.',
        ],
    ],

    49 => [
        'judul' => ['id' => 'Interior PosBloc', 'en' => 'Interior PosBloc'],
        'deskripsi' => [
            'en' => 'The spatial identity project in the creative area of Pos Bloc Medan focuses on integrating modern branding elements into iconic heritage buildings. This work includes the design and installation of various interior promotional media such as hanging banners, creative campaign posters, and aesthetically arranged acrylic signage that blends in with the building\'s classic architecture. By prioritizing sharp visual quality and strategic layout, this project has successfully created an effective flow of information for visitors while strengthening the dynamic urban atmosphere, making it a public space that is not only functional but also has strong visual appeal to support the creative and commercial ecosystem in the center of Medan.',
            'id' => 'Proyek identitas ruang di area kreatif Pos Bloc Medan berfokus pada integrasi elemen branding modern ke dalam bangunan heritage yang ikonik. Pekerjaan ini mencakup desain dan pemasangan berbagai media promosi interior seperti hanging banner, poster kampanye kreatif, dan signage akrilik yang ditata secara estetis selaras dengan arsitektur klasik bangunan. Dengan mengutamakan kualitas visual yang tajam dan tata letak yang strategis, proyek ini berhasil menciptakan alur informasi yang efektif bagi pengunjung sekaligus memperkuat atmosfer perkotaan yang dinamis, menjadikannya ruang publik yang tidak hanya fungsional tetapi juga memiliki daya tarik visual yang kuat untuk mendukung ekosistem kreatif dan komersial di pusat kota Medan.',
        ],
    ],

    50 => [
        'judul' => ['id' => 'Interior Kadin', 'en' => 'Interior Kadin'],
        'deskripsi' => [
            'en' => 'The spatial identity project at the North Sumatra KADIN office prioritizes the integration of elegant corporate visual elements to strengthen the organization\'s image of professionalism as a strategic partner in the business world. This work includes the design and installation of interior information media ranging from thematic banners and work program posters to the use of acrylic materials for nameplates and service information, arranged in a clean and modern layout. With a color palette that aligns with the organization\'s identity and strategic placement in public areas and meeting rooms, this project has successfully transformed the office interior into a more informative, representative, and authoritative environment to support comfortable interactions between business players and institutional guests.',
            'id' => 'Proyek identitas ruang di kantor KADIN Sumatera Utara mengutamakan integrasi elemen visual korporat yang elegan untuk memperkuat citra profesionalisme organisasi sebagai mitra strategis dalam dunia bisnis. Pekerjaan ini mencakup desain dan pemasangan media informasi interior mulai dari banner tematik dan poster program kerja hingga penggunaan material akrilik untuk papan nama dan informasi layanan, yang ditata dalam tata letak yang bersih dan modern. Dengan palet warna yang selaras dengan identitas organisasi dan penempatan strategis di area publik dan ruang pertemuan, proyek ini berhasil mengubah interior kantor menjadi lingkungan yang lebih informatif, representatif, dan otoritatif untuk mendukung interaksi yang nyaman antara para pelaku bisnis dan tamu institusi.',
        ],
    ],

    51 => [
        'judul' => ['id' => 'Interior Acara BNI Berbagi', 'en' => 'Interior BNI Berbagi Event'],
        'deskripsi' => [
            'en' => 'The spatial identity design project for the "BNI Berbagi" event focused on creating a warm yet professional atmosphere through the installation of various interior branding media such as thematic banners, program posters, and acrylic decorative elements. By integrating BNI\'s corporate color scheme into a clean layout in public areas and ceremonial spaces, this project successfully transformed the event environment into an informative and representative space to reinforce the institution\'s message of social awareness. The use of high-quality materials at every visual touchpoint ensures that information is clearly conveyed to guests, while also creating an aesthetic backdrop for documenting company activities.',
            'id' => 'Proyek desain identitas ruang untuk acara "BNI Berbagi" berfokus pada penciptaan suasana yang hangat namun profesional melalui pemasangan berbagai media branding interior seperti banner tematik, poster program, dan elemen dekoratif akrilik. Dengan mengintegrasikan skema warna korporat BNI ke dalam tata letak yang bersih di area publik dan ruang seremonial, proyek ini berhasil mengubah lingkungan acara menjadi ruang yang informatif dan representatif untuk mempertegas pesan kepedulian sosial institusi. Penggunaan material berkualitas tinggi di setiap titik sentuh visual memastikan informasi tersampaikan dengan jelas kepada para tamu, sekaligus menciptakan latar belakang estetis untuk mendokumentasikan kegiatan perusahaan.',
        ],
    ],

    52 => [
        'judul' => ['id' => 'Nonton Pasti Simpati', 'en' => 'Nonton Pasti Simpati'],
        'deskripsi' => [
            'en' => 'This outdoor media activation project for Telkomsel\'s "Nonton Pasti" campaign focuses on the strategic placement of static promotional media to massively increase brand visibility. This project includes the production management and installation of billboards and outdoor banners using high-quality, weather-resistant vinyl material, ensuring optimal visual sharpness and readability of promotional messages under direct sunlight. With placements at high-traffic locations, this project successfully reinforced Telkomsel\'s digital campaign through a dominant physical presence, creating strong brand awareness and driving user conversion through the visualization of attractive entertainment content for the general public.',
            'id' => 'Proyek aktivasi media luar ruang untuk kampanye "Nonton Pasti" Telkomsel ini berfokus pada penempatan strategis media promosi statis untuk meningkatkan visibilitas merek secara masif. Proyek ini mencakup manajemen produksi dan pemasangan baliho serta spanduk outdoor menggunakan material vinyl berkualitas tinggi dan tahan cuaca, memastikan ketajaman visual dan keterbacaan pesan promosi yang optimal di bawah sinar matahari langsung. Dengan penempatan di lokasi-lokasi dengan lalu lintas tinggi, proyek ini berhasil memperkuat kampanye digital Telkomsel melalui kehadiran fisik yang dominan, menciptakan kesadaran merek yang kuat dan mendorong konversi pengguna melalui visualisasi konten hiburan yang menarik bagi masyarakat umum.',
        ],
    ],

    53 => [
        'judul' => ['id' => 'Promosi Kegiatan CMC HUT Medan', 'en' => 'CMC Medan Anniversary Activity Promotion'],
        'deskripsi' => [
            'en' => 'This digital out-of-home media campaign project to commemorate Medan City\'s anniversary is a massive visual activation placed at four major intersections with the highest traffic flow in Medan City, namely SIB Roundabout, Graha Merah Putih, Juanda, and Gajah Mada. The main focus of this project is the management of dynamic visual content on giant videotrons that display congratulatory messages and the city\'s celebration identity with optimal color sharpness. The strategic placement at these city landmarks ensures a wide audience reach and effective message repetition, strengthening the campaign\'s presence in public spaces through the integration of high-quality digital screen technology that is capable of attracting the attention of drivers and pedestrians 24 hours a day.',
            'id' => 'Proyek kampanye media digital out-of-home untuk memperingati HUT Kota Medan ini merupakan aktivasi visual masif yang ditempatkan di empat persimpangan utama dengan arus lalu lintas tertinggi di Kota Medan, yaitu Bundaran SIB, Graha Merah Putih, Juanda, dan Gajah Mada. Fokus utama proyek ini adalah pengelolaan konten visual dinamis pada videotron raksasa yang menampilkan pesan-pesan ucapan selamat dan identitas perayaan kota dengan ketajaman warna yang optimal. Penempatan strategis di landmark-landmark kota ini memastikan jangkauan audiens yang luas dan pengulangan pesan yang efektif, memperkuat kehadiran kampanye di ruang publik melalui integrasi teknologi layar digital berkualitas tinggi yang mampu menarik perhatian pengemudi dan pejalan kaki selama 24 jam penuh.',
        ],
    ],

    54 => [
        'judul' => ['id' => 'Videotron Produk BY.u', 'en' => 'BY.u Product Videotron'],
        'deskripsi' => [
            'en' => 'The digital out-of-home media campaign project for the all-digital provider by.U focuses on visual activation at one of the busiest landmarks in the city of Medan, namely the SIB Roundabout Videotron. The project execution highlights creative content management with a dynamic and high-contrast color palette, ensuring the promotional message remains highly visible both day and night for drivers approaching from all directions. The placement at this large premium location aims to maximize brand awareness among the younger generation and active internet users, while also demonstrating the team\'s ability to manage content display slots on high-quality digital screens with precision in the city\'s central traffic flow area.',
            'id' => 'Proyek kampanye media digital out-of-home untuk provider serba digital by.U ini berfokus pada aktivasi visual di salah satu landmark tersibuk di kota Medan, yaitu Videotron Bundaran SIB. Eksekusi proyek menyoroti pengelolaan konten kreatif dengan palet warna yang dinamis dan kontras tinggi, memastikan pesan promosi tetap sangat terlihat baik siang maupun malam bagi pengemudi yang mendekat dari segala arah. Penempatan di lokasi premium berskala besar ini bertujuan untuk memaksimalkan kesadaran merek di kalangan generasi muda dan pengguna internet aktif, sekaligus menunjukkan kemampuan tim dalam mengelola slot tampilan konten pada layar digital berkualitas tinggi dengan presisi di area arus lalu lintas pusat kota.',
        ],
    ],

    55 => [
        'judul' => ['id' => 'Paket Stream Netflix by Telkomsel', 'en' => 'Netflix Streaming Package by Telkomsel'],
        'deskripsi' => [
            'en' => 'This digital outdoor media campaign project showcases a strategic collaboration between Telkomsel and Netflix streaming service through visual activation on the iconic Videotron Bundaran SIB. The execution highlights high-quality video content management with a contrasting and sharp color palette, ensuring that the internet package offer message remains clearly legible amid the heavy traffic flow in the city center. The placement on the giant digital screen at this major landmark aims to strengthen Telkomsel\'s brand positioning as a leading digital entertainment content provider, while demonstrating the team\'s ability to manage dynamic media publications that are capable of attracting massive audience attention both day and night.',
            'id' => 'Proyek kampanye media luar ruang digital ini menampilkan kolaborasi strategis antara Telkomsel dan layanan streaming Netflix melalui aktivasi visual pada Videotron ikonik Bundaran SIB. Eksekusi menyoroti pengelolaan konten video berkualitas tinggi dengan palet warna yang kontras dan tajam, memastikan pesan penawaran paket internet tetap terbaca dengan jelas di tengah arus lalu lintas yang padat di pusat kota. Penempatan pada layar digital raksasa di landmark utama ini bertujuan untuk memperkuat posisi merek Telkomsel sebagai penyedia layanan konten hiburan digital terdepan, sekaligus menunjukkan kemampuan tim dalam mengelola publikasi media dinamis yang mampu menarik perhatian audiens masif baik siang maupun malam.',
        ],
    ],

    56 => [
        'judul' => ['id' => 'Produk Jumat Nomat', 'en' => 'Jumat Nomat Product'],
        'deskripsi' => [
            'en' => 'This digital outdoor media campaign project focused on activating Telkomsel\'s weekly "Jumat Nomat" promotion through giant videotron screens at the SIB Roundabout. The execution highlighted dynamic visual content management with straight-to-the-point messaging, specifically designed to capture the audience\'s attention amid heavy traffic. The strategic placement at one of Medan\'s main digital landmarks ensures wide message reach and timely display frequency, reinforcing the brand\'s identity as a solution-oriented service provider and demonstrating the effectiveness of outdoor digital media in supporting massive short-term promotional programs.',
            'id' => 'Proyek kampanye media luar ruang digital ini berfokus pada pengaktifan promosi mingguan "Jumat Nomat" Telkomsel melalui layar videotron raksasa di Bundaran SIB. Eksekusi menyoroti pengelolaan konten visual yang dinamis dengan pesan yang langsung pada sasaran, dirancang khusus untuk menangkap perhatian audiens di tengah arus lalu lintas yang padat. Penempatan strategis di salah satu landmark digital utama Medan memastikan jangkauan pesan yang luas dan frekuensi tampilan yang tepat waktu, memperkuat identitas merek sebagai penyedia layanan berorientasi solusi dan menunjukkan efektivitas media digital luar ruang dalam mendukung program promosi jangka pendek berskala masif.',
        ],
    ],

    57 => [
        'judul' => ['id' => 'Racing Simpati', 'en' => 'Racing Simpati'],
        'deskripsi' => [
            'en' => 'This digital outdoor media campaign project showcases a strategic collaboration between Telkomsel SimPATI and Bank Mandiri through visual activation on the SIB Roundabout Videotron. The execution highlights dynamic content management that combines the visual identities of both major brands with a focus on the attractive "Racing" program offering. The placement on the giant digital screen at the busiest landmark in Medan ensures a wide audience reach, from professionals to young people, while demonstrating the team\'s ability to manage collaborative media publications that require precise branding synchronization and high visibility in the city\'s traffic hub.',
            'id' => 'Proyek kampanye media luar ruang digital ini menampilkan kolaborasi strategis antara Telkomsel SimPATI dan Bank Mandiri melalui aktivasi visual pada Videotron Bundaran SIB. Eksekusi menyoroti pengelolaan konten dinamis yang menggabungkan identitas visual kedua merek besar dengan fokus pada penawaran program "Racing" yang menarik. Penempatan pada layar digital raksasa di landmark tersibuk di Medan memastikan jangkauan audiens yang luas, dari para profesional hingga anak muda, sekaligus menunjukkan kemampuan tim dalam mengelola publikasi media kolaboratif yang memerlukan sinkronisasi branding yang presisi dan visibilitas tinggi di pusat arus lalu lintas kota.',
        ],
    ],

    58 => [
        'judul' => ['id' => 'Produk Undi Hepi', 'en' => 'Undi Hepi Product'],
        'deskripsi' => [
            'en' => 'This digital outdoor media campaign project focused on activating Telkomsel\'s "Undi-Hepi" loyalty program through giant videotron screens at the SIB Roundabout. The execution highlighted attractive visual content management by displaying a variety of attractive rewards, specially designed with dynamic graphics to capture the attention of audiences at the city\'s traffic congestion hotspots. The strategic placement at this major Medan landmark ensures that the promotional message has high impression reach and optimal readability, strengthening customer interaction with Telkomsel\'s digital ecosystem and proving the effectiveness of DOOH media in driving widespread active user participation.',
            'id' => 'Proyek kampanye media luar ruang digital ini berfokus pada pengaktifan program loyalitas "Undi-Hepi" Telkomsel melalui layar videotron raksasa di Bundaran SIB. Eksekusi menyoroti pengelolaan konten visual yang menarik dengan menampilkan berbagai hadiah yang menggugah selera, dirancang khusus dengan grafis dinamis untuk menangkap perhatian audiens di titik kemacetan lalu lintas kota. Penempatan strategis di landmark utama Medan ini memastikan pesan promosi memiliki jangkauan impresi yang tinggi dan keterbacaan yang optimal, memperkuat interaksi pelanggan dengan ekosistem digital Telkomsel dan membuktikan efektivitas media DOOH dalam mendorong partisipasi pengguna aktif secara luas.',
        ],
    ],

    59 => [
        'judul' => ['id' => 'Youtube Premium', 'en' => 'Youtube Premium'],
        'deskripsi' => [
            'en' => 'This digital outdoor media campaign project highlights the collaboration between Telkomsel and YouTube Premium through visual activation at the iconic Videotron Bundaran SIB. The execution focuses on delivering promotional messages for ad-free internet bundling packages with sharp and contrasting visuals, ensuring that the content remains prominent for drivers in one of the busiest traffic centers in the city of Medan. The strategic placement at this digital landmark aims to strengthen Telkomsel\'s position as a leading digital lifestyle service provider, while demonstrating the team\'s expertise in managing large-scale creative content publications that can effectively attract public attention in public spaces.',
            'id' => 'Proyek kampanye media luar ruang digital ini menyoroti kolaborasi antara Telkomsel dan YouTube Premium melalui aktivasi visual di Videotron ikonik Bundaran SIB. Eksekusi berfokus pada penyampaian pesan promosi paket bundling internet bebas iklan dengan visual yang tajam dan kontras, memastikan konten tetap menonjol bagi pengemudi di salah satu pusat arus lalu lintas tersibuk di kota Medan. Penempatan strategis di landmark digital ini bertujuan untuk memperkuat posisi Telkomsel sebagai penyedia layanan gaya hidup digital terdepan, sekaligus menunjukkan keahlian tim dalam mengelola publikasi konten kreatif berskala besar yang dapat secara efektif menarik perhatian publik di ruang terbuka.',
        ],
    ],

    60 => [
        'judul' => ['id' => 'Event Desk RS. Mitra Sejati', 'en' => 'Event Desk RS. Mitra Sejati'],
        'deskripsi' => [
            'en' => 'This branding activation project involved the procurement and design of portable event desks for Mitra Sejati Hospital as a flexible medium for health service information. The main focus of this project is on sharp visual print quality with the selection of durable sticker materials, ensuring that promotional messages and hospital identity look professional. With a concise yet informative design, this event desk is designed to support various promotional activities in public areas or health exhibitions, making it easier for staff to interact with potential patients while strengthening the presence of the Mitra Sejati Hospital brand in the community.',
            'id' => 'Proyek aktivasi branding ini melibatkan pengadaan dan desain meja acara portabel untuk Rumah Sakit Mitra Sejati sebagai media fleksibel untuk informasi layanan kesehatan. Fokus utama proyek ini adalah pada kualitas cetak visual yang tajam dengan pemilihan material stiker yang tahan lama, memastikan pesan promosi dan identitas rumah sakit tampak profesional. Dengan desain yang ringkas namun informatif, meja acara ini dirancang untuk mendukung berbagai kegiatan promosi di area publik atau pameran kesehatan, memudahkan staf dalam berinteraksi dengan calon pasien sekaligus memperkuat kehadiran merek Rumah Sakit Mitra Sejati di masyarakat.',
        ],
    ],

    61 => [
        'judul' => ['id' => 'Pengaturan Peserta Musda PHRI', 'en' => 'Participant Arrangement Musda PHRI'],
        'deskripsi' => [
            'en' => 'Designed to empower digital transformation in event administration, Tokabe.id is a comprehensive IT solution that streamlines complex logistics into an intuitive digital platform. The system provides organizers with a central dashboard offering real-time insights into key metrics such as live attendance, seating capacity, and recent guest registrations. Equipped with reliable administrative tools like dynamic, color-coded participant categorization (ranging from standard attendees to VIPs and Media), integrated counter check-ins, and precise floor plan management, the platform effectively replaces manual workflows with an automated process. By ensuring seamless tracking from initial registration to on-site seat assignment, this solution equips administrators with everything they need to deliver a flawless, highly organized event experience.',
            'id' => 'Dirancang untuk memberdayakan transformasi digital dalam administrasi acara, Tokabe.id adalah solusi IT komprehensif yang menyederhanakan logistik yang kompleks menjadi platform digital yang intuitif. Sistem ini membekali penyelenggara dengan dasbor terpusat yang menyajikan wawasan real-time tentang metrik-metrik utama seperti kehadiran langsung, kapasitas tempat duduk, dan pendaftaran tamu terkini. Dilengkapi dengan alat administratif yang andal seperti kategorisasi peserta dinamis berbasis kode warna (mulai dari peserta reguler hingga VIP dan Media), check-in konter terintegrasi, dan manajemen denah lantai yang presisi, platform ini secara efektif menggantikan alur kerja manual dengan proses yang terautomasi. Dengan memastikan pelacakan yang mulus mulai dari pendaftaran awal hingga penugasan tempat duduk di lokasi, solusi ini membekali para administrator dengan semua yang mereka butuhkan untuk menghadirkan pengalaman acara yang sempurna dan terorganisir dengan sangat baik.',
        ],
    ],

];

$count = 0;
foreach ($translations as $id => $data) {
    $p = App\Models\Portofolio::find($id);
    if (!$p) {
        echo "SKIP ID $id: not found\n";
        continue;
    }
    $p->judul = json_encode($data['judul'], JSON_UNESCAPED_UNICODE);
    $p->deskripsi = json_encode($data['deskripsi'], JSON_UNESCAPED_UNICODE);
    $p->save();
    $count++;
    echo "OK ID $id: {$data['judul']['id']}\n";
}

echo "\nTotal updated: $count portofolio\n";
