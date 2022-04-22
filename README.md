# Senimandigital PHP MySQL Bootstrap jQuery Magic

Opensource Content Management System, Informasi, Manajemen, Pendukung Keputusan dan Manufaktur yang di kembangkan oleh senimandigital, sepenuhnya mengikuti Standard Pengembangan dari Code Generator bawaan Dreamweaver. Framework ini mempertahankan mekanisme kerja dan pengembangan aplikasi website secara Visual, Drag n Drop dan menyediakan berbagai tool manajemen source code yang terdistribusi dan terintegrasi.

Senimandigital menggunakan Framework PHP5, apa arti-nya ini "Menggunakan Framework PHP5" bukankah PHP5 sudah usang dan sudah ditinggalkan... ? Benar PHP5 sudah ditingglkan, tetapi meski PHP5 sudah ditinggalkan tetapi ilmu-nya bersifat kekal dan abadi. Artinya adalah meskipun kita membuat aplikasi menggunakan PHP7, PHP8 dan bahkan menggunakan PHP yang lebih baru, kita tetap menggunakan style penulisan PHP5.

Apa yang dilakukan oleh Senimandigital Framework adalah merevolusi dan menghidupkan kembali function yang sudah ditinggalkan oleh pengembang resmi, sehingga function-function PHP5 yang sudah ditinggalkan dapat digunakan kembali dengan kinerja yang lebih baik, hal ini kita capai dengan membuat Driver khusus untuk melakukan tugas tersebut.

# Abstrak

Diluarsana sudah beredar banyak sekali framework dan tidak sedikit yang sudah menjadi sangat populer. Tapi kenapa kami tetap Fokus mengembangkan PHP MySQL Bootstrap jQuery dan menyebut-nya sebagai Senimandigital Framework, hal ini tidak lain karena pada kenyataan-nya PHP MySQL adalah Framework yang sederhana dan tetap menjadi yang terbaik bahkan untuk saat ini.

Bagimana cara kami melihat bahwa Framework PHP MySQL adalah framework terbaik... ? baiklah sedikit akan kami jabarkan: Framework apapun yang populer diluar sana, setelah kami perhatikan semua-nya sama saja, yaitu sama dalam hal memutar-mutar resource. daripada harus membuat Class seperti Class "DB" kami lebih memilih menghidupkan kembali fungsi "mysql" yang sudah ditinggalkan sejak php versi 7.

Menghidupkan kembali fungsi "mysql" tidak dilakukan dengan mengaktifkan modul php-nya, tapi lebih ke mendefinisikan ulang fungsi ini menggunakan fungsi "mysqli" atau "PDO", dengan cara ini proyek lama masih dapat berjalan dengan baik pada PHP Webserver Versi 5 bahkan tetap dapat berjalan juga pada PHP Versi 7, 8 dan seterus-nya. Tidak hanya dapat berjalan dengan baik, tetapi juga berkinerja lebih baik.

Pengembang utama PHP menyarankan kita untuk beralih dari fungsi "mysql" ke "mysqli" atau "PDO", saran ini bukan berarti kita harus mereplace kode program yang sudah ada dari yang awal-nya menggunakan "mysql" menjadi "mysqli" tapi ada cara yang lebih baik, yaitu dengan mendefinisikan ulang fungsi-fungsi "mysql" menggunakan fungsi "mysqli" atau "PDO". Library untuk mendefinisikan ulang fungsi "mysql" itu akan kita sebut dengan "Driver".

Semua orang sudah menguasai fungsi "mysql" pada PHP, sehingga tidak perlu mempelajari hal baru apapun lagi. Dengan demikian mempelajari Senimandigital Framework tidak berbeda dan tidak lebih sulit daripada mempelajari PHP5 itu sendiri. Selain dalam hal kemudahan dalam mempelajari Senimandigital Framework, kemudahan mengembangkan aplikasi menggunakan Senimandigital Framework jauh melebihi kemudahan dalam mengembangkan aplikasi menggunakan Livewire, Harviacode, Gii. Karena Senimandigital Framework adalah satu-satunya Framework yang aplikasi-nya bisa dikembangkan secara Visual, Drag n Drop dan tidak hanya itu, Senimandigital Framework juga melibatkan "Artificial Intelegencie" untuk membantu dan menemani anda dalam menyelesaikan pengembangan aplikasi.

# Platform

Senimandigital Framework tidak seperti Framework Populer lain-nya yang di promosikan dengan gencar. Tetapi Senimandigital Framework akan selalu berkembang dan hadir dimana mana. Senimandigital terinsfirasi dari berbagai proyek seperti phpMyAdmin, PHP5, jQuery 1.12.4, Dreamweaver 6.0 dimana mereka semua memiliki persamaan, dan persamaann itu adalah mereka semua merupakan produk yang tidak lekang dimakan usia tidak juga tergerus oleh zaman, tidak pula benar-benar dapat diklasifikasikan kedalam produk yang bisa expired dan mereka semua memiliki ruang kerja tersendiri yang abadi.

Senimandigital Framework selain desain agar dapat bekerja dengan baik pada Browser Classic maupun Pada Browser Modern, Senimandigital Framework juga didesain untuk Bisa Bekerja dengan Baik pada Platform Webserver lama dan dan webserver keluaran terbaru, semisal bekerja seperti pada:
1. PHP 5
2. PHP 7
3. PHP 8
4. Dan Seterus-nya.

# Arsitektur

Apapun framework-nya, hal pertama yang akan kita lihat tentu saja adalah Arsitektur, setelah arsitektur-nya dipastikan memenuhi standar kita, barulah kita akan bergerak lebih jauh untuk menguasai berbagai mekanisme yang tersedia untuk kita gunakan. Hal terpenting dari arsitektur Senimandigital Framework yang akan terus kita pertahankan hingga akhir adalah penerapan arsitektur yang mensupport pengembangan secara Visual, Drag n Drop. dan hingga saat ini, Senimandigital Framework adalah satu-satunya yang berdiri kokoh diatas pondasi pemikiran ini.

Senimandigital Framework hanya memiliki 1 file library untuk backend, dan 2 file library untuk Frontend yaitu 1 file css dan 1 file javascript. Satu hal yang pertama perlu anda sadari, bahwa file backend akan berulangkali menginclude diri-nya sendiri secara "recursive" sesuai kebutuhan.

Dalam rangka menginclude dirinya sendiri, Senimandigital Framework sejati-nya melakukan tugas automatisasi:

1. **Menyiapkan Library Utama**: Pada tahap pertama, Senimandigital Framework akan menyiapkan Driver untuk aplikasi anda jika itu dibutuhkan, jika driver tidak dibutuhkan maka langkah ini akan dilewati secara otomatis.
2. **Melakukan Konseksi Ke Database**: Pada tahap kedua, Senimandigital Framework akan melakukan koneksi ke Database dan memeriksa Sessions dan melakukan berbagai tindakan yang dibutuhkan.
3. **Mempersiapkan Kebutuhan Eksekusi Aplikasi**: File yang menginclude Senimandigital Framework itu adalah file yang akan kita sebut sebagai Aplikasi, pada langkah ke tiga ini Senimandigital Framework akan memeriksa berbagai kebutuhan Library dari Aplikasi yang anda tulis, dan otomatis menyediakan-nya. Sehingga anda sebagai programmer sama sekali tidak perlu lagi memikirkan dan mengincludekan library yang dibutuhkan oleh aplikasi, karena Senimandigital Framework yang akan melakukan-nya untuk anda dan anda hanya cukup fokus untuk mendesain User Interface dan User Experience menggunakan kode HTML.
4. **Mengeksekusi Aplikasi**: Pada tahapan ini Senimandigital Framework akan mengeksekusi aplikasi yang sudah anda tulis, melakukan semua hal yang memang perlu dilakukan oleh backend, merender kode html dan memanipulasinya terlebih dahulu jika itu diperlukan.
5. **Mengirimkan Kode HTML ke Browser**: Jika tidak ada lagi yang perlu dilakukan maka Senimandigital Framework akan mengirimkan kode html ke browser.

Jika anda mencermati 5 tahapan diatas, anda pastinya menyadari banyak kejanggalan seperti ada beberapa prosedur yang tampak kurang, benar jika itu yang anda rasakan karena memang ada banyak sekali prosudur yang tidak tertulis pada lima tahapan diatas, tapi memang begitulah adanya, karena posedur yang anda rasa kurang tadi sebenar-nya sudah dilakukan secara otomatis oleh Senimandigital Framework.

Prosedur standar yang anda kira hilang tadi dan ternyata sudah dituntaskan oleh Senimandigital Framework, maka prosedur-prosedur itulah yang kami sebut sebagai prosedur "Magic Programming".

Lalu apa saja prosedur yang dilakukan secara otomatis oleh Senimandigital Framework, sulit menjabarkannya satu persatu karena jumlah prosedur yang dilakukan secara otomatis Oleh Senimandigital Framework bisa saja jumlah-nya ada puluhan ribu mekanisme. Tapi disini akan kita rangkum sedikit, terutama untuk bagian-bagian yang mudah untuk anda pahami:

1. Otomatis menyediakan Library Frontend Framework, Ketika aplikasi anda membutuhkan jQuery maka library jQuery akan diload secara otomatis, ketika aplikasi anda membutuhkan Angular, Vue, React, Leaflet, TinyMCE, CodeMirror dan ribuan plugins javascript lain-nya, maka library tersebut akan disiapkan secara otomatis. Benar, seperti yang anda pikirkan jika anda berpikir Senimandigital Framework sangat Cerdas untuk mampu menyiapkan semua Library yang dibutuhkan oleh aplikasi yang anda tulis, padahal anda hanya menulis kode html.

Apakah anda mulai berpikir bahwa kinerja dan performa aplikasi ini akan terasa buruk karena melakukan berbagai proses automatisasi dibelakang layar, anda boleh saja mengira begitu jika anda belum menggunakan Senimandigital Framework, tapi jika anda sudah menggunakannya, maka anda akan tahu bahwa kinerja Senimandigital Framework ternyata tidak lebih buruk dari Framework populer lain-nya, bahkan anda akan mengakui bahwa kinerja Senimandigital Framework ternyata masih jauh lebih baik dari berbagai kinerja Framework Populer lain-nya, padahal Senimandigital Framework sama sekali belum mengaktifkan fitur Cache.

Kenapa bisa seperti itu, bukankah automatisasi seharusnya membutuhkan banyak resource, bagaimana Senimandigital Framework melakukannya tanpa mengorbankan performa aplikasi bahkan kinerja aplikasi masih mampu setara dengan aplikasi PHP Native lain-nya. Satu hal yang bisa kami katakan Senimandigital Framework menerapkan "Artificial Intelegence" dan fokus hanya menghandle "the true condition" dimana segala sesuatu yang tidak sesuai akan otomatis diabaikan dan tidak akan memicu proses apapun.

Lalu bagaimana dengan memori, bukankah itu konsep automatisasi ini juga akan menguras memory... ? sama sekali tidak seperti itu, karena senimandigital Framework tidak memutar-mutar resource seperti apa yang dilakukan kebanyakan Framework dan Aplikasi Populer diluarsana. Senimandigital ditulis untuk menggunakan memori secara optimal dan menggunakan-nya secara berulang. Sehingga pemakaian memori dapat terus dioptimakan karena selalu ditekan pada angka terendah.

## Database

Struktur database menentukan tingkat optimalisasi pemroses, struktur database yang optimal meminimalisasi kebutuhan Join antar Tabel. 
Contoh: kita bisa saja membuat tabel "account" dan membuat tabel "account_level", tapi kita tidak melakukan itu, 
karena jauh lebih baik untuk membuat satu tabel, dengan menambahkan sebuah field dengan nama "account_group" dan mendefinisikannya dengan "type" data "enum".
sedangkan untuk hierarki-nya kita membuat data dengan karakter pembatas: "/" sehingga data didalamya akan menjadi seperti:

1. administrator
2. administrasi
3. administrasi/alumni
4. costumer
5. costumer/blacklist
6. marketing
8. marketing/registration
9. member
10. member/block
11. dan seterus-nya

Dengan penamaan level akses seperti diatas, kita bisa langsung menyimpan nilai level akses pengguna yang sedang login pada variabel session, contoh:

```
$_SESSION['account_group'] = 'administrator'
```
Dengan nilai level akses pada seesion, kita bisa langgung menggunakan nilai tersebut untuk mengarahkannya pada file php yang sesuai, contoh:
```
include $_SESSION['account_group'] .'/index.php';
```
Dengan cara ini, kita tidak perlu lagi memikirkan tentang "route" apalagi sama membuang-buang waktu untuk mengembangkan algoritma-nya dan menyia-nyiakan resoure untuk memproses-nya, karena arsitektur dan mekanisme untuk route-nya sudah terbentuk secara alami.

### Konsep Desain Struktur Database "Optimal", "Global"

Penjelasan ringan diatas, itu hanya contoh, dalam praktek-nya kami menerapkan konsep yang jauh lebih optimal lagi, yaitu: dengan mengganti tabel "account_group" dengan tabel "classification" dimana tabel  "classification" ini menampung semua data yang memiliki karakteristik klasifikasi untuk menggantikan keberadaan beberapa tabel, seperti tabel:

1. account_group
2. account_status
3. account_type
4. article_category
5. content_category
6. dan lain sebagai-nya.

Semua contoh tabel diatas memiliki persamaan, yaitu: jumlah data yang ditampung didalam tabel kurang dari 100 baris data. Menggabungkan-nya kedalam satu tabel universal/global tentu saja bukan masalah. Dibeberapa kasus data didalam tabel-tabel ini hanya di baca satu kali, sebagai contoh: tabel "account_group", setelah dibaca maka data akan disimpan pada:
```
$_SESSION['account_group']
```
Sehingga tidak ada alasan untuk mengatakan bahwa dalam hal ini tabel classification akan mengalami over load. terlebih lagi sebagai programmer-nya kita sudah pasti akan menjaga dan menghindari potensi overload saat merancang aplikasi. Sehingga hal seperti potensi "over load" ini tidak layak untuk di-perdebatkan. Andai suatu saat terbukti overload, kita hanya perlu mengeluarkan data yang diakses secara berlebihan dan membuatkan tabel baru maka masalahpun akan terselesaikan begitu saja.

### Magic Configuration

Apa yang disebut dengan magic Configuration adalah, sebuah file konfigurasi yang datanya bisa langsung di include tanpa perlu dipasing, adakah yang seperti itu... ? tentu saja ada, di php kita sudah mengenal fungsi var_export. Kita hanya perlu menggunakan-nya ketika akan menulis konfigurasi kedalam sebuah file. Ketika ingin menggunakan-nya, kita hanya perlu menginclude file tadi dan menampung nilai-nya pada variabel yang kita inginkan.

### Frontend Framework
#### jQuery
Kita menggunakan jQuery Versi 1, dengan alasan fleksibelitas. jQuery 1.12.4 masih dapat bekerja dengan Browser lawas,
yang arti-nya jQuery masih bisa bekerja pada browser bawaan aplikasi seperti Visual Basic.
Pertimbangan kami daripada harus mempelajari bahkan mengembangkan jQuery Versi terbaru yang tidak bisa bekerja pada browser lawas, masih lebih baik mempelajari jQuery Versi 1.12.4.

Yang perlu anda ketahui versi terakhir untuk jQuery versi 1 adalah jQuery 1.12.4, kami tidak hanya menggunakan jQuery Versi 1.12.4 secara apa adanya, tapi kami memperbaharui jQuery Versi 1.12.4 dan memberi-nya label dengan kode Versi 1.12.5.

#### Spry
Frontend Fraamework Spry memang tidak berkembang, namun tidak buruk juga untuk dipakai setidaknya setelah menggunakan Spry kita bisa berpindah ke Vue dimasa yang akan datang. Yang terpenting, dengan Spry kita bisa mengembangkan aplikasi Secara Visual, Drag n Drop. Kita tentu saja tidak menggunakan Spry secara apa adanya, tapi juga melakukan kostumasi secara extrem

#### Magic JS
Jika anda tau Bootstrap, kami setuju itu bagus dan sangat membantu kita dalam mendesain aplikasi. Tapi kita selalu butuh sesuatu yang Kurang dan Lebih dari itu ketika membangun aplikasi.
maka kami lebih memilih membuat Frontend Framework yang baru, dengan Konsep Utama Integrasi Frontend dan Backend Framework dengan integrasi ada banyak hal yang bisa diotomatisasi.
Goal yang ingin dicapai dengan Magic JS adalah, pemrogramer hanya perlu belajar html dan attribute untuk membuat aplikasi.

Perbedaan Magic JS dengan Bootstrap dan Frontend lain-nya adalah jika mereka menggunakan attribute class untuk mengkonfigurasi, maka dalam magic js kita menggunakan attribute "role".
Contoh: &lt;p role="description">Deskripsi&lt;/p> maka dom akan di update secara otomatis.

Dalam Magic JS, attribute "role" tidak hanya di handle oleh Javascript tapi juga oleh Backend, attribute role kami gagas untuk symbol mekanisme hybrid 
misal anda menggunakan Framework jQuery untuk membuat tab anda hanya perlu membuat list seperti biasa namun dengan tambahan atribute role="tabs"
anda tidak perlu menuliskan script include jQuery dan css yang diperlukan, karena php yang akan melakukan-nya.

Hal seperti ini adalah sesuatu yang sangat kami impikan, dan belum ada Frontend Framework lain yang kami dapati melakukan-nya.

## Resiko Penolakan, Tanggapan dan Antisipasinya
Senimandigital Framework meskipun sudah dikembangkan selama lebih dari 10 Tahun, tapi selama itu Senimandigital Framework bukanlah Opensource sehingga konsep dari Senimandigital Framework masih merupakan hal baru dan perlu waktu untuk pihak luar untuk menguji-nya. Sehingga sangat mungkin Senimandigital Framework akan menerima berbagai penolakan, dengan berbagai alasan:

1. Waktu belajar, Untuk mempelajari penggunaan Senimandigital Framework ideal-nya adalah 8 jam kerja praktek.
2. Waktu kerja, Untuk membuat system informasi yang umum seperti: System Informasi Manajemen Perpustakaan, System Informasi Manajemen Toko, System Informasi Manajemen Gudang, System Informasi Manajemen Asset ideal-nya adalah 5 hari kerja.
3. Cara kerja, Ketika menggunakan Senimandigital Framework programmer hanya perlu fokus untuk membuat database menggunakan tool database yang sudah disediakan, dengan waktu penuntasan kerja mulai dari 1 hingga 8 jam kerja. Sedangkan ketika untuk membuat aplikasi, programmer hanya perlu membuat kode html menggunakan tool yang juga sudah disediakan, dari awal hingga tuntas akan membutuhkan 1 - 4 hari kerja, tergantung seberapa banyak modul dan level akses user yang akan dibuat, untuk membuat satu aplikasi/modul akan membutuhkan waktu 5 hingga 15 menit yang artinya dalam 1 jam programmer akan dapat membuat hingga 12 modul/aplikasi.
4. Biaya Jasa, senimandigital mewajibkan pengguna untuk memasarkan produk yang dibuat minimal dengan harga Rp. 7.500.000,00 hanya dengan cara ini anda dapat menyewa aplikasi dan jasa kami dengan biaya 10 - 40% dari nilai proyek. Dengan menggunakan Layanan Teknologi secara full fitur dan bekingan langsung dari pihak kami maka target waktu belajar, waktu kerja dan cara kerja seperti disebutkan pada point-point sebelumnya akan bisa direalisasikan.
