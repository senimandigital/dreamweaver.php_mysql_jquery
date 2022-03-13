### Abstrak
Senimandigital mengambil jalan yang sedikit berbeda dari kebanyakan opensource yang lebih memilih menggunakan tag div, kami di senimandigital justru fokus mengembangkan library
untuk transformasi tabel. Bagi kami ini bukan tentang benar maupun salah, tapi kami memang menyediakan alternative. Alasan kami melakukan ini sederhana:
pertama tidak ada yang melakukan-nya sedangkan alasan kedua adalah kami menyukai Pemrograman Visual termasuk dalam hal desain web.

Desain dengan table memang cocok untuk pemrogaman visual, karena tata letak-nya sudah sesuai dengan desain akhir tanpa perlu kita berpindah ke browser untuk sekedar melihat sekilas
hasil akhir dari desain yang kita buat, selain itu tabel memiliki struktur yang jelas dan relative apa ada-nya. kode html berawal dari tag buka &lt;table> dan berakhir pada tag tutup &lt;/table>
sedangkan apabila menggunakan div, kita perlu memeriksa satu persatu class name yang terdefinisi untuk mengetahui bentuk desain akhir-nya.

#### Table Design Accurdion Horizontal
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
