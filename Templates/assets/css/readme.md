# Abstrak
Senimandigital mengambil jalan yang sedikit berbeda dari kebanyakan opensource yang lebih memilih menggunakan tag div, kami di senimandigital justru fokus mengembangkan library
untuk transformasi tabel. Bagi kami ini bukan tentang benar maupun salah, tapi kami memang menyediakan alternative. Alasan kami melakukan ini sederhana:
pertama tidak ada yang melakukan-nya sedangkan alasan kedua adalah kami menyukai Pemrograman Visual termasuk dalam hal desain web.

Desain dengan table memang cocok untuk pemrogaman visual, karena tata letak-nya sudah sesuai dengan desain akhir tanpa perlu kita berpindah ke browser untuk sekedar melihat sekilas
hasil akhir dari desain yang kita buat, selain itu tabel memiliki struktur yang jelas dan relative apa ada-nya. kode html berawal dari tag buka &lt;table> dan berakhir pada tag tutup &lt;/table> sedangkan apabila menggunakan div, kita perlu memeriksa satu persatu class name yang terdefinisi untuk mengetahui bentuk desain akhir-nya.

Anda yang sudah menggunakan framework diluar sana, pasti-nya tau salah satu kemampuan framework adalah merender kode html, ya itu bagus lalu masih adakah yang lebih baik... ? ya, menurut kami ada dan itu adalah: html handle dan html transform.

## Segmentasi Pasar

Semua framework akan mengklime bahwa segmentasi mereka dapat memenuhi kebutuhan pasar mulai dari untuk pembuatan Blog, System Informasi hingga Aplikasi ERP.
pada kenyataan-nya Goal seperti itu terlalu luas, dan pada implementasi-nya framework-framework ini berakhir untuk pembuatan website dengan arsitektur dan mekanisme yang sederhana, dengan harga jual setara UMR bahkan relative banyak yang berakhir menjadi produk gratisan di Github.

Kami dari senimandigital tanpa keraguan dan dengan tegas mengatakan bahwa produk kami ber-spesialisasi untuk membangun minimal mulai dari System Informasi, Manajemen dan Manufaktur. Karakteristik dari system ini adalah jumlah pengguna yang sedikit dan lebih menitik beratkan pada penggunaan secara ekslusif dan terbatas untuk kebutuhan internal perusahaan. Untuk menghasilkan laporan keuangan, pendukung keputusan, manajemen proses produksi.

Sebuah proyek/produk yang dibangun menggunakan Senimandigital Framework harus dipasarkan dengan harga minimal RP 7.500.000,00 atau minimal setara 3x Upah Minimum Kabupaten untuk satu bulan kerja, jika anda berencana menjual produk dibawah harga ini, anda dilarang keras menggunakan Senimandigital Framework.

Senimandigital Framework bersifat terbatas namun tetap Opensource, boleh dipakai, boleh dikembangkan tapi tidak boleh di-produksi ulang, semua fasilitas pengembangan
kami sediakan melalui website: https://senimandigital.com. Harapan kami melakukan ini adalah, memberikan manfaat sebesar-besarnya bagi komunitas. Dan mewujutkan yang namanya The Rill Global Teamwork.

### Table Design Accurdion Horizontal

Berikut ini adalah contoh kode program untuk membuat element Accurdion menggunakan Senimandigital CMS, dan anda tidak lagi perlu memikirkan css dan javascript-nya karena itu sudah di handle
secara otomatis oleh Senimandigital CMS. Kecuali anda memang ingin merubah konfigurasi barulah perlu untuk membuka file CSS maupun file Javascript.
```html
<table design="accurdion_horizontal">
<tr>
  <th><img src="?magic[image][rotate][text]=Control 1"/></th>
  <td><h3>Info</h3></td>
  <th><img src="?magic[image][rotate][text]=Control 2"/></th>
  <td><h3>Info</h3></td>
  <th><img src="?magic[image][rotate][text]=Control 3"/></th>
  <td><h3>Info</h3></td>
  <th><img src="?magic[image][rotate][text]=Control 4"/></th>
  <td><h3>Info</h3></td>
  <th><img src="?magic[image][rotate][text]=Control 5"/></th>
  <td><h3>Info</h3></td>
</tr>
</table>
```
Setelah melihat kode diatas, anda mungkin bertanya-tanya karena kode html itu sangat biasa sekali.
Mungkinkah itu bekerja dengan benar selayak-nya Component Accurdion yang sudah anda ketahui, kenyataanya itu memang bekerja sebagai mana mesti-nya,
dan kami menyebut tehnik transformasi DOM ini dengan sebutan Magic Transformation atau Magic Atribute.

Seperti yang dapat anda lihat dari kode html yang biasa ini, ternyata ada sebuah kata kunci atau attribute magic disana, yaitu:
```
 design="accurdion_horizontal"
```
Anda hanya perlu menambahkan attribute ini untuk membuat tabel yang akan di transformasikan kedalam desain Accurdion secara otomatis.
Sekali lagi anda mungkin akan bertanya-tanya, bukankah attribute design="accurdion_horizontal" adalah attribut baru/attribute costume berarti saya harus menghapal-nya... ?
Tidak-tidak buka begitu cara benar bekerja dengan karya kami, cara yang lebih benar adalah mengkostumasi tool programing visual yang anda miliki, perlu anda ketahui semua 
software developer membuka peluang kostumasi Auto Complete, nah Auto Completinilah yang harus di mutakhirkan agar dapat bekerja dengan baik menggunakan karya-karya kami.
Tentu saja anda tidak harus memutakhirkanya sendiri, karena anda cukup mendownload dan memasang plugins untuk membereskan masalah kecil ini.

### Wrap Element
Jika kita menggunakan CMS atau Framework apapapun diluar sana, maka kode program biasa-nya akan ditulis dengan cukup panjang bahkan untuk hal yang sederhana,
lain cerita jika sudah menggunakan magic attribute, perhatikan contoh berikut:
```html
<img wrap="<center>" width="128" src="?magic[image][readfile]=d" />
```
Satu baris kode program diatas, Ketika sudah sampai pada browser, maka element tadi akan diapit oleh attribute &lt;center&gt; 
sehingga pada browser akan menjadi seperti ini:
```html
<center>
  <img width="128" src="?magic[image][readfile]=d" />
<center>
```
Dengan cara ini, kode program yang ditulis akan menjadi benar-benar ramping dimana kita hanya perlu membuat satu element utama dan biarkan magic yang bekerja menuntaskan-nya.

### Child & Parrent Style
Kita semua sudah mengenal ada-nya attribute style. Attribute ini berfungsi untuk menyisipkan css keladam element. Pada senimandigital framework kita juga menambahkan
attribute child-style dan parrent-style, hanya dari namanya saja anda pasti-nya sudah dapat membayangkan apa fungsi dari attribute ini.

# Penutup
Senimandigital sudah menyediakan ratusan bahkan ribuan attribute baru, mungkin dipikiran anda bertanya-tanya ribuan attribut baru apakah itu tidak membuat performa aplikasi turun drastis... ? Diawal pengembangan kami juga berpikir seperti itu, tapi kemudian setelah terus menerus mendefinisikan attribute baru setiap hari-nya, terbukti aplikasi tetap berjalan normal dan tidak terasa ada-nya penurunan kinerja baik itu saat menggunakan aplikasi komputer desktop maupun saat website diakses menggunakan smartphone.
