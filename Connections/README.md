# Senimandigital Magic Connections
Cara menggunakannya sangat mudah, ketika anda sudah mengkonfigurasi database pada dreamweaver, dengan nama connection "senimandigital" maka timpa file senimandigital.php dengan file ini lalu konfigurasi ulang username dan password database.

Nama connection harus "senimandigital", jika anda menggunakan nama lain, maka script ini menjadi tidak bermanfaat, jika menggunakan nama lain maka teknologi-nya akan menjadi tidak berjalan dengan benar. jika anda mengganti atau mereplace kata senimandigital, maka source ini tidak bisa membantu mencari solusi pada website https://senimandigital.com ada keterikatan penamaan ini dengan website https://senimandigital.com.

Kemudian ada mekanisme redirect yang unik tertanam pada website https://senimandigital.com itu sendiri untuk membawa anda menuju solusi yang anda butuhkan.

# Abstrak
Programmer memang suka membanding-bandingkan Framework, untuk mnemukan mana yang terbaik dan itu bisa dimaklumi karena memang akan selalu ada yang lebih baik belum lagi fakta bahwa tidak seorangpun mau untuk terjebak di jalan dan lingkungan yang salah. Tapi dalam hal membandingkan ini sebaik-nya kita punya standar yang benar terlebih dahulu tentang apa yang kita butuhkan.

Jika kita hanya membandingkan framework dari bahasa yang digunakan oleh marketing, kita tidak akan mendapatkan apa yang paling kita butuhkan, secara umum framework itu bisa dibandingkan dari 4 hal, yaitu: arsitektur, fitur, mekanisme dan segmentasi.

Hal yang menarik dari suatu framework untuk digali terkait arsitektur adalah:
1. Ditulis dengan Pattern, sehingga mendukung pengembangan dengan penerapan Artificial Intelligence.
2. Desain struktur database yang kooperatif, yang arti-nya struktur database dan kode program bisa di find dan replace sekaligus dengan resiko yang minimum.
3. algoritma didesain untuk dapat bekerja secara multi domain atau multi subdomain.
4. Standard Config, yaitu file konfigurasi yang di Incude, Encode dan Decode sekaligus.

Hal yang menarik dari suatu framework untuk digali terkait Fitur adalah:
1. Magic Parameter (Backend)
Fitur yang disediakan framework yang bersifat global untuk mengeliminasi koding berulang, contoh
    - ?Logout : Ini adalah contoh paling sederhana dari yang namanya magic parameter, dimanapun lokasi user berada programmer hanya perlu menyediakan sebuah tag
&lt;a href="?Logout"> Maka seluruh session akan dihapus.
    - ?magic[image][chaptcha] : dengan menambahkan parameter ini, html render dibatalkan ( di exit; ) dan server mengirimkan gambar chapcha ke browser
    - ?magic[image][paste] : dengan menambahkan parameter ini, html render dibatalkan ( di exit; ) dan server mengirimkan sebuah dialog yang berfungsi untuk mem-paste image / mengambil gambar terakhir dari clipboard.
    - ?magic[image][upload] : dengan menambahkan parameter ini, html render dibatalkan ( di exit; ) dan server mengirimkan sebuah dialog yang berfungsi untuk mengupload image.
    - ?magic[image][text][rotate]=Judul Colom Table : 
    - ?magic[json]=recordset_name : 

2. Magic Attribute (Frontend)
Fitur yang disediakan framework yang bersifat global untuk mengeliminasi koding berulang, contoh:
    - currency="rupiah" : Memformat data kedalam format penulisan rupiah
    - currency="currency" : Memformat data kedalam format penulisan uang, tanpa symbol khusus
# Content

## Fitur Magic
Anda mungkin bertanya-tanya seberapa keren sih sebenarnya Magic Connection ini, bisakah dibandingkan dengan framework yang sudah populer seperti Laravel Livewire misal-nya... ? Tidak perlu berpanjang lebar, anda bisa membandingkan sendiri apa yang diberi oleh Senimandigital Magic Connection untuk kemudahan dalam pemrogramman:

### Magic Email Reset
Ketika pertama kali membuat aplikasi untuk penggunaan yang sebenar-nya, hal pertama yang perlu kita sediakan adalah fasilitas manajemen anggota. dan fitur penting dari data anggota adalah adanya fasilitas untuk mereset password via email.
```
?magic[email][reset][password]=target@email.com
```

### Magic Image Captcha
Ketika ingin membuat aplikasi, hal pertama yang ingin kita ketahui adalah bagaimana membuat kode captcha, dengan Senimandigital Magic Connections anda hanya perlu mengetikan pada url atau menambahkan url pada parameter:
```
?magic[image][captcha]
```
Maka pada browser anda akan melihat sebuah gambar yang berisi beberapa angka atau hurup, alamat gambar tersebut bisa anda masukan pada atribute HTML img. sedangkan data angka yang ditampilkan dapat anda akses / tersimpan pada: variabel global $\_SESSION['CAPTCHA']

Bagaimana... ? sampai disini sudah keliatan keren-nya... ? mari kita lanjutkan ke virut lain-nya.

### Magic Image Capture Webcam
```
?magic[image][capture]=webcam
```
### Magic Image Capture URL
```
?magic[image][capture]=http/https://domain.name
```
### Magic Image Capture Barcode
```
?magic[image][capture]=barcode
```
### Magic Image Capture QRCode
```
?magic[image][capture]=qrcode
```
### Magic Image Avatar
```
?magic[image][avatar]=keyword
```
### Magic Image Paste
```
?magic[image][paste]=/directory/filename.ext
```
### Magic Image Upload
```
?magic[image][upload]=/directory/filename.ext
```
### Magic Image Text Rotate
Anda pernah lihat, sebuah tabel yang komplek, dimana didalam tabel tersebut ada string yang dirotasi dimana text tersebut bisa rata tengah baik rata tengah dari atas bawah, maupun rata tengah dari kiri dan kanan. Anda bisa saja membuat text seperti itu menggunakan Javascript dan SVG, tapi jelas konfigurasi-nya tidak akan mudah dan membutuhkan banyak script. Tetapi jika menggunakan Senimandigital Connections. Anda cukup mendefinisikan request melalui url, seperti ini:
```
?magic[image][text][rotate]=String suka suka anda.
```
Maka pada browser anda akan melihat sebuah gambar dengan tulisan "String suka suka anda", alamat gambar ini bisa anda sisipkan pada tag HTML img, kemudian gambar itu bisa anda letakan pada kolom tabel. anda tinggal atur pada tag <td> attribute <td align="center"> maka gambar tadi akan berada ditengah tanpa perlu lagi berurusan dengan javascript.
  
Hari ini tulisannya, sampai disini dulu. jika mengerti php anda meriksa sendiri fitur magic apa saja yang tersedia pada Senimandigital Magic Connections ini. terimakasih
  
salam senimandigital
