<?php

use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Book::insert([
            [
                'id'              => 1,
                'judul'              => 'Harry Potter dan piala api',
                'isbn'        => '9789796558544',
                'pengarang'             => 'J.K. Rowling',
                'penerbit'        => 'Gramedia Pustaka Utama',
                'tahun_terbit'            => 2001,
                'jumlah_buku'            => 12,
                'deskripsi'    => 'Tahun 1997 nasibnya berubah total ketika penerbit Inggris, Bloomsbury Press, <br>\nmenerbitkan buku <b>Harry</b> Potter yang pertama — <b>Harry</b> Potter and the <br>\nPhilosopher&#39;s Stone (di Amerika terbit dengan judul <b>Harry</b> Potter and the <br>\nSorcerer&#39;s Stone,&nbsp;...',
                'lokasi'    => 'rak1',
                'cover'    => 'cover/pialaapi.jpg',
                'created_at'      => \Carbon\Carbon::now(),
                'updated_at'      => \Carbon\Carbon::now()
            ],
            [
                'id'              => 2,
                'judul'              => 'Harry Potter dan Orde Phoenix',
                'isbn'        => '9789792206524',
                'pengarang'             => 'J.K. Rowling',
                'penerbit'        => 'Gramedia Pustaka Utama',
                'tahun_terbit'            => 2004,
                'jumlah_buku'            => 12,
                'deskripsi'    => 'inginannya terkabul!&quot; Dobby membungkuk dalam- dalam lagi. &quot;Tetapi \u003cb\u003eHarry\u003c/b\u003e \u003cbr\u003e\nPotter tampaknya tidak ba- hagia,&quot; Dobby melanjutkan, meluruskan tubuh lagi \u003cbr\u003e\ndan memandang \u003cb\u003eHarry\u003c/b\u003e takut-takut. &quot;Dobby men- dengarnya mengigau dalam \u003cbr\u003e\ntidurnya.',
                'lokasi'    => 'rak1',
                'cover'    => 'cover/ordephoenix.jpg',
                'created_at'      => \Carbon\Carbon::now(),
                'updated_at'      => \Carbon\Carbon::now()
            ],
            [
                'id'              => 3,
                'judul'              => 'Harry Potter dan tawanan Azkaban',
                'isbn'        => '9789796558537',
                'pengarang'             => 'J.K. Rowling',
                'penerbit'        => 'Gramedia Pustaka Utama',
                'tahun_terbit'            => 2001,
                'jumlah_buku'            => 9,
                'deskripsi'    => 'Peta ini salah satu benda sihir berbahaya seperti yang diperingatkan Mr \u003cbr\u003e\nWeasley...
                Bantuan untuk Para Pembuat-Keonaran Sihir... tetapi, \u003cb\u003eHarry\u003c/b\u003e berdalih, \u003cbr\u003e\ndia cuma
                ingin menggunakannya untuk bisa ke Hogsmeade. Dia kan tidak ingin\u003cbr\u003e\n&nbsp;...',
                'lokasi'    => 'rak1',
                'cover'    => 'cover/azkaban.jpg',
                'created_at'      => \Carbon\Carbon::now(),
                'updated_at'      => \Carbon\Carbon::now()
            ],
            [
                'id'              => 4,
                'judul'              => 'Harry Potter dan kamar rahasia',
                'isbn'        => '9789796558520',
                'pengarang'             => 'J.K. Rowling',
                'penerbit'        => 'Gramedia Pustaka Utama',
                'tahun_terbit'            => 2000,
                'jumlah_buku'            => 7,
                'deskripsi'    => 'liburan musim panas datang terlalu cepat bagi \u003cb\u003eHarry\u003c/b\u003e. Dia memang senang
                \u003cbr\u003e\nkembali ke Hogwarts, tetapi sebulan bersama keluarga Weasley merupakan saat \u003cbr\u003e\npaling
                menyenangkan dalam hidupnya. Susah untuk tidak iri kepada Ron kalau \u003cbr\u003e\ndia&nbsp;...',
                'lokasi'    => 'rak1',
                'cover'    => 'cover/kamarrahasia.jpg',
                'created_at'      => \Carbon\Carbon::now(),
                'updated_at'      => \Carbon\Carbon::now()
            ],
            [
                'id'              => 5,
                'judul'              => 'Harry Potter dan batu bertuah',
                'isbn'        => '9789796558513',
                'pengarang'             => 'J.K. Rowling',
                'penerbit'        => 'Gramedia Pustaka Utama',
                'tahun_terbit'            => 2001,
                'jumlah_buku'            => 4,
                'deskripsi'    => 'OULAN terakhir \u003cb\u003eHarry\u003c/b\u003e bersama keluarga Dursley tidaklah menyenangkan.
                \u003cbr\u003e\nDudley sekarang begitu ke- takutan pada \u003cb\u003eHarry\u003c/b\u003e sehingga dia tak rriau berada
                di \u003cbr\u003e\nruangan yang sama dengannya, sementara Bibi Petu- nia dan Paman Vernon
                \u003cbr\u003e\ntidak&nbsp;...',
                'lokasi'    => 'rak1',
                'cover'    => 'cover/batubertuah.jpg',
                'created_at'      => \Carbon\Carbon::now(),
                'updated_at'      => \Carbon\Carbon::now()
            ],
            [
                'id'              => 6,
                'judul'              => 'Harry Potter dan pangeran berdarah-campuran',
                'isbn'        => '9789792217636',
                'pengarang'             => 'J.K. Rowling',
                'penerbit'        => 'Gramedia Pustaka Utama',
                'tahun_terbit'            => 2006,
                'jumlah_buku'            => 9,
                'deskripsi'    => NULL,
                'lokasi'    => 'rak1',
                'cover'    => 'cover/darahcampuran.jpg',
                'created_at'      => \Carbon\Carbon::now(),
                'updated_at'      => \Carbon\Carbon::now()
            ],
            [
                'id'              => 7,
                'judul'              => 'Harry Potter 7:HP& Rlkui Km/SC',
                'isbn'        => '9789792233490',
                'pengarang'             => 'J.K. Rowling',
                'penerbit'        => 'Gramedia Pustaka Utama',
                'tahun_terbit'            => NULL,
                'jumlah_buku'            => 16,
                'deskripsi'    => NULL,
                'lokasi'    => 'rak1',
                'cover'    => 'cover/relikuikematian.jpg',
                'created_at'      => \Carbon\Carbon::now(),
                'updated_at'      => \Carbon\Carbon::now()
            ],
            [
                'id'              => 8,
                'judul'              => 'Hujan (Cover Baru)',
                'isbn'        => '9786020383590',
                'pengarang'             => 'Tere Liye',
                'penerbit'        => 'Gramedia Pustaka Utama',
                'tahun_terbit'            => 2018,
                'jumlah_buku'            => 20,
                'deskripsi'    => 'Novel HUJAN berkisah tentang persahabatan, tentang cinta, tentang perpisahan, tentang melupakan, dan tentang hujan…',
                'lokasi'    => 'rak2',
                'cover'    => 'cover/hujantereliye.jpg',
                'created_at'      => \Carbon\Carbon::now(),
                'updated_at'      => \Carbon\Carbon::now()
            ],
            [
                'id'              => 9,
                'judul'              => 'Bintang',
                'isbn'        => '9786020351179',
                'pengarang'             => 'Tere Liye',
                'penerbit'        => 'Gramedia Pustaka Utama',
                'tahun_terbit'            => 2017,
                'jumlah_buku'            => 4,
                'deskripsi'    => 'Kami bertiga teman baik. Remaja, murid kelas sebelas. Penampilan kami sama seperti murid SMA lainnya. Tapi kami menyimpan rahasia besar. Namaku Raib, aku bisa menghilang. Seli, teman semejaku, bisa mengeluarkan petir dari telapak tangannya. Dan Ali, si biang kerok sekaligus si genius, bisa berubah menjadi beruang raksasa. Kami bertiga kemudian bertualang ke dunia paralel yang tidak diketahui banyak orang, yang disebut Klan Bumi, Klan Bulan, Klan Matahari, dan Klan Bintang. Kami bertemu tokoh-tokoh hebat. Penduduk klan lain. Ini petualangan keempat kami. Setelah tiga kali berhasil menyelamatkan dunia paralel dari kehancuran besar, kami harus menyaksikan bahwa kamilah yang melepaskan “musuh besar”-nya. Ini ternyata bukan akhir petualangan, ini justru awal dari semuanya… Buku keempat dari serial “BUMI',
                'lokasi'    => 'rak2',
                'cover'    => 'cover/bintangtere.jpg',
                'created_at'      => \Carbon\Carbon::now(),
                'updated_at'      => \Carbon\Carbon::now()
            ],
            [
                'id'              => 10,
                'judul'              => 'Matahari',
                'isbn'        => '9786020332116',
                'pengarang'             => 'Tere Liye',
                'penerbit'        => 'Gramedia Pustaka Utama',
                'tahun_terbit'            => 2016,
                'jumlah_buku'            => 10,
                'deskripsi'    => '"Namanya Ali, 15 tahun, kelas X. Jika saja orangtuanya mengizinkan, seharusnya dia sudah duduk di tingkat akhir ilmu fisika program doktor di universitas ternama. Ali tidak menyukai sekolahnya, guru-gurunya, teman-teman sekelasnya. Semua membosankan baginya. Tapi sejak dia mengetahui ada yang aneh pada diriku dan Seli, teman sekelasnya, hidupnya yang membosankan berubah seru. Aku bisa menghilang, dan Seli bisa mengeluarkan petir. Ali sendiri punya rahasia kecil. Dia bisa berubah menjadi beruang raksasa. Kami bertiga kemudian bertualang ke tempat-tempat menakjubkan. Namanya Ali. Dia tahu sejak dulu dunia ini tidak sesederhana yang dilihat orang. Dan di atas segalanya, dia akhirnya tahu persahabatan adalah hal yang paling utama.',
                'lokasi'    => 'rak2',
                'cover'    => 'cover/mataharitere.jpg',
                'created_at'      => \Carbon\Carbon::now(),
                'updated_at'      => \Carbon\Carbon::now()
            ],
            [
                'id'              => 11,
                'judul'              => 'Daun yang Jatuh Tak Pernah Membenci Angin (Cover Baru)',
                'isbn'        => '9786020384160',
                'pengarang'             => 'Tere Liye',
                'penerbit'        => 'Gramedia Pustaka Utama',
                'tahun_terbit'            => 2018,
                'jumlah_buku'            => 7,
                'deskripsi'    => '"Dia bagai malaikat bagi keluarga kami. Merengkuh aku, adikku, dan Ibu dari kehidupan jalanan yang miskin dan nestapa. Memberikan makan, tempat berteduh, sekolah, dan janji masa depan yang lebih baik. Dia sungguh bagai malaikat bagi keluarga kami. Memberikan kasih sayang, perhatian, dan teladan tanpa mengharap budi sekali pun. Dan lihatlah, aku membalas itu semua dengan membiarkan mekar perasaan ini. Ibu benar, tak layak aku mencintai malaikat keluarga kami. Tak pantas. Maafkan aku, Ibu. Perasaan kagum, terpesona, atau entahlah itu muncul tak tertahankan bahkan sejak rambutku masih dikepang dua. Sekarang, ketika aku tahu dia boleh jadi tidak pernah menganggapku lebih dari seorang adik yang tidak tahu diri, biarlah... Biarlah aku luruh ke bumi seperti sehelai daun… daun yang tidak pernah membenci angin meski harus terenggutkan dari tangkai pohonnya."',
                'lokasi'    => 'rak2',
                'cover'    => 'cover/dauntere.jpg',
                'created_at'      => \Carbon\Carbon::now(),
                'updated_at'      => \Carbon\Carbon::now()
            ],

        ]);
    }
}
