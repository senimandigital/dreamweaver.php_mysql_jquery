# Senimandigital Magic Connections
Cara menggunakannya sangat mudah, ketika anda sudah mengkonfigurasi database pada dreamweaver, dengan nama connection "senimandigital" maka timpa file senimandigital.php dengan file ini lalu konfigurasi ulang username dan password database.

Nama connection harus "senimandigital", jika anda menggunakan nama lain, maka script ini menjadi tidak bermanfaat, jika menggunakan nama lain maka teknologi-nya akan menjadi tidak berjalan dengan benar. jika anda mengganti atau mereplace kata senimandigital, maka source ini tidak bisa membantu mencari solusi pada website http://senimandigital.com ada keterikatan penamaan ini dengan website http://senimandigital.com.

Kemudian ada mekanisme redirect yang unik tertanam pada website http://senimandigital.com itu sendiri untuk membawa anda menuju solusi yang anda butuhkan.

## Fitur Magic
Anda mungkin bertanya-tanya seberapa keren sih sebenarnya Maggic Conection ini, bisakah dibandingkan dengan framework yang sudah populer seperti Laravel Livewire misal-nya... ? Tidak perlu berpanjang lebar, anda bisa membandingkan sendiri apa yang diberi oleh Senimandigital Magic Connection ini:

### Magic Captcha
Ketika ingin membuat aplikasi, hal pertama yang ingin kita ketahui adalah bagaimana membuat kode captcha, dengan Senimandigital Magic Connections anda hanya perlu mengetikan pada url atau menambahkan url pada parameter:
```
?magic[image][captcha]
```
Maka pada browser anda akan melihat sebuah gambar yang berisi beberapa angka atau hurup, alamat gambar tersebut bisa anda masukan pada atribute HTML img. sedangkan data angka yang ditampilkan dapat anda akses / tersimpan pada: variabel global $\_SESSION['CAPTCHA']

Bagaimana... ? sampai disini sudah keliatan keren-nya... ? mari kita lanjutkan ke virut lain-nya.

### Magic Image Rotate
Anda pernah lihat, sebuah tabel yang komplek, dimana didalam tabel tersebut ada string yang dirotasi dimana text tersebut bisa rata tengah baik rata tengah dari atas bawah, maupun rata tengah dari kiri dan kanan. Anda bisa saja membuat text seperti itu menggunakan Javascript dan SVG, tapi jelas konfigurasi-nya tidak akan mudah dan membutuhkan banyak script. Tetapi jika menggunakan Senimandigital Connections. Anda cukup mendefinisikan request melalui url, seperti ini:
```
?magic[image][text][rotate]=String suka suka anda.
```
Maka pada browser anda akan melihat sebuah gambar dengan tulisan "String suka suka anda", alamat gambar ini bisa anda sisipkan pada tag HTML img, kemudian gambar itu bisa anda letakan pada kolom tabel. anda tinggal atur pada tag <td> attribute <td align="center"> maka gambar tadi akan berada ditengah tanpa perlu lagi berurusan dengan javascript.
  
Hari ini tulisannya, sampai disini dulu. jika mengerti php anda meriksa sendiri fitur magic apa saja yang tersedia pada Senimandigital Magic Connections ini. terimakasih
  
salam senimandigital
