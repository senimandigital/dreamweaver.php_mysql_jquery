# dreamweaver.php_mysql_jquery_spry
Opensource Content Management System yang di kembangkan sepenuhnya mengikuti Standard Pengembangan dari Code Generator bawaan Dreamweaver. 

### Database

#### Konsep Desain Struktur Database "Optimal"
Struktur database menentukan tingkat optimalisasi pemroses, struktur database yang optimal meminimalisasi kebutuhan Join antar tabel. 
Contoh: kita bisa saja membuat tabel "anggota" dan membuat tabel "anggota_level", 
tapi kita tidak melakukan itu kita hanya akan membuat satu tabel dengan field anggota_group dengan type data enum.
untuk hierarki kita membuat data dengan pembatas "/" contoh" "administrator/registration". Template desain struktur database bisa dilihat di:
http://cms.senimandigital.com/index.php/dreamweaver/1.0.0/database/

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
