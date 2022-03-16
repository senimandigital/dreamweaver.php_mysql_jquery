# Senimandigital PHP MySQL jQuery Magic

Opensource Content Management System, Informasi, Manajemen, Pendukung Keputusan dan Manufaktur yang di kembangkan oleh senimandigital, sepenuhnya mengikuti Standard Pengembangan dari Code Generator bawaan Dreamweaver. Framework ini mempertahankan mekanisme kerja dan pengembangan aplikasi website secara Visual, Drag n Drop.

# Abstrak

Diluarsana sudah beredar banyak sekali framework dan tidak sedikit yang sudah menjadi sangat populer. Tapi kenapa kami tetap Fokus mengembangkan PHP MySQL jQuery dan menyebut-nya sebagai Senimandigital Framework, hal ini tidak lain karena pada kenyataan-nya PHP MySQL adalah Framework yang sederhana dan tetap menjadi yang terbaik bahkan untuk saat ini.

Bagimana cara kami melihat bahwa Framework PHP MySQL adalah framework terbaik... ? baiklah sedikit akan kami jabarkan: Framework apapun yang populer diluar sana, setelah kami perhatikan semua-nya sama saja, yaitu sama dalam hal memutar-mutar resource. daripada harus membuat Class seperti Class "DB" kami lebih memilih menghidupkan kembali fungsi "mysql" yang sudah ditinggalkan sejak php versi 7.

Menghidupkan kembali fungsi "mysql" tidak dilakukan dengan mengaktifkan modul php-nya, tapi lebih ke mendefinisikan ulang fungsi ini menggunakan fungsi menggunakan fungsi "mysqli" atau "PDO", dengan cara ini proyek lama masih dapat berjalan dengan baik pada PHP Webserver Versi 5 bahkan tetap dapat berjalan juga pada PHP Versi 7, 8 dan seterus-nya.

Pengembang utama PHP menyarankan kita untuk beralih dari fungsi "mysql" ke "mysqli" atau "PDO", saran ini bukan berarti kita harus mereplace kode program yang sudah ada dari yang awal-nya menggunakan "mysql" menjadi "mysqli" tapi ada cara yang lebih baik, yaitu dengan mendefinisikan ulang fungsi-fungsi "mysql" menggunakan fungsi "mysqli" atau "PDO".
Library untuk mendefinisikan ulang fungsi "mysql" itu akan kita sebut dengan "Driver".

Semua orang sudah menguasai fungsi "mysql" pada PHP, sehingga tidak perlu mempelajari hal baru apapun lagi. Dengan demikian mempelajari Senimandigital Framework tidak berbeda
dan tidak lebih sulit daripada mempelajari PHP 5 itu sendiri. Selain dalam hal kemudahan dalam mempelajari Senimandigital Framework, kemudahan mengembangkan aplikasi menggunakan
Senimandigital Framework jauh melebihi kemudahan dalam mengembangkan aplikasi menggunakan Livewire, Harviacode, Gii. Karena Senimandigital Framework adalah satu-satunya framework yang aplikasi-nya bisa dikembangkan secara Visual, Drag n Drop.

# Platform

Senimandigital Framework tidak seperti Framework Populer lain-nya yang di promosikan dengan gencar. Tetapi Senimandigital Framework akan selalu berkembang dan hadir dimana mana.
Senimandigital terinsfirasi dari berbagai proyek seperti phpMyAdmin, jQuery 1.12.4, Dreamweaver 6.0 dimana mereka semua memiliki persamaan, dan persamaann itu adalah mereka semua merupakan produk yang tidak lekang dimakan usia tidak juga tergerus oleh zaman, tidak pula benar-benar dapat diklasifikasikan kedalam produk yang bisa expired dan mereka semua memiliki ruang kerja tersendiri yang abadi.

Senimandigital Framework Bisa Bekerja dengan Baik pada Platform seperti:
1. PHP 5
2. PHP 7
3. PHP 8
4. Dan Seterus-nya.

# Arsitektur

Apapun framework-nya, hal pertama yang akan kita lihat tentu saja adalah Arsitektur setelah arsitekturnya dipastikan memenuhi standar kita, barulah kita akan bergerak lebih jauh untuk menguasai berbagai mekanisme yang tersedia untuk kita gunakan.

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
Kita menggunakan jQuery Versi 1, dengan alasan fleksibelitas. jQuery 1.2 masih dapat bekerja dengan Browser lawas,
yang arti-nya jQUery masih bisa bekerja pada browser bawaann aplikasi seperti Visual Basic.
Pertimbangan kami daripada harus mempelajari bahkan mengembangkan jQuery Versi terbaru yang tidak bisa bekerja pada browser lawas, masih lebih baik mempelajari jQuery Versi

#### Spry
Frontend Fraamework Spry memang tidak berkembang, namun tidak buruk juga untuk dipakai setidaknya setelah menggunakan Spry kita bisa berpindah ke Vue dimasa yang akan datang.
Yang terpenting, dengan Spry kita bisa mengembangkan aplikasi Secara Visual.

#### Magic JS
Jika anda tau Bootstrap, kami setuju itu bagus dan sangat membantu dalam mendesain aplikasi. Tapi kita selalu butuh sesuatu yang Kurang dan Lebih dari itu ketika membangun aplikasi.
maka kami lebih memilih membuat Frontend Framework yang baru, dengan Konsep Utama Integrasi Frontend dan Backend Framework dengan integrasi ada banyak hal yang bisa diotomatisasi.
Goal yang ingin dicapai dengan Magic JS adalah, pemrogramer hanya perlu belajar htm dan attribute untuk membuat aplikasi.

Perbedaan Magic JS dengan Bootstrap dan Frontend lain-nya adalah jika mereka menggunakan attribute class untuk mengkonfigurasi, maka dalam magic js kita menggunakan attribute "role".
Contoh: &lt;p role="description">Deskripsi&lt;/p> maka dom akan di update secara otomatis.

Dalam Magic JS, attribute "role" tidak hanya di handle oleh Javascript tapi juga oleh Backend, 
misal anda menggunakan Framework jQuery untuk membuat tab anda hanya perlu membuat list seperti biasa namun dengan tambahan atribute role="tabs"
anda tidak perlu menuliskan script include jquery dan css yang diperlukan, karena php yang akan melakukan-nya.

Hal seperti ini adalah sesuatu yang sangat kami impikan, dan belum ada Frontend Framework lain yang kami dapati melakukan-nya.
