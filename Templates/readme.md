# Templates

Ketika pertama kali menggunakan Framework apapun, hal pertama yang perlu kita pelajari tentu saja adalah Templates atau Template Engine yang digunakan.
Setiap Template Engine tentusaja memiliki keunggulan dan batasan yang sangat terukur. Semakin canggih(Dukungan Algoritma) sebuah Template Engine akan semakin manual cara kita bekerja ketika menggunakan-nya, semakin sederhana(Dukungan Algoritma) Template Engine semakin banyak pekerjaan yang dapat di-automatisasi.
Kondisi ini adalah fakta dan realita yang tidak perlu anda sanggah dan tidak perlu juga kita perdebatkan. Karena suatu hari anda juga akan mengerti dengan sendiri-nya, bawa framework terbagi dalam 2 kelompok besar yaitu: "Framework yang mempermudah pekerjaan" dan ada juga "Framework yang lebih banyak melakukan pengkondisian".

Folder Template pada Senimandigital Framework, berisi berbagai resource yang sejati-nya disediakan untuk bisa dikostumasi oleh pengguna akhir.

# Abstrak

Template Senimandigital Framework memiliki beberapa penerapan konsep automatisasi

# Feature

1. Backend Magic Parameter
2. Backend Magic Match
3. Frontend Magic Meta
4. Frontend Magic Attribute

# Frontend Magic Meta

Pada senimandigital Framework, meta kita jadikan sebagai media komunikasi data antara Backend dan Frontend. Dengan menjadikan meta sebagai media komunikasi data, memungkinkan kode Frontend (Javascript, CSS dan Framework Markup Lain-nya) untuk tidak perlu mendefinisikan sebuah variable, tapi cukup mengambil
dan bertindak sesuai data yang sudah terdefinisi pada tag meta.

## Meta Geo Location Error
Senimandigital automatis memerika status gps pada browser, dan pemeriksaan ini hanya dilakukan satu kali untuk satu sesi, sehingga tidak akan membuat pengguna merasa tidak nyaman, dan pemeriksaan ini meski otomatis dilakukan tapi tidak akan dimulai jika pengguna tidak benar-benar berinteraksi dengan formulir yang membutuhkan akses
geolokasi (Lokasi Geograpi).
```
<meta name="geolocation_error" content="<?php echo $_SESSION['GEOLOCATION']['ERROR']; ?>" />
```
## Meta Geo Location Required
Dalam kondisi tertentu, kita bisa menambahkan meta geolocation required
```
<meta name="geolocation_required" content="yes" />
```
Agar javascript secara otomatis meminta akses Geo Location kepada pengguna(Browser).

# Frontend Magic Attribute

## Auto Attribute ID
Senimandigital Framework membuktikan bahwa tidak semua Framework meningkatkan kesulitan dalam pembelajaran dan pengembangan. Ketika menggunakan Senimandigital Framework,
anda akan merasakan praktek sesungguh-nya dari apa yang kita sebut dengan clean code. Contoh dari clean code pada senimandigital bisa anda lihat melalui contoh penulisan kode berikut:
```html
<input type="text" name="account_username" />
```
Ketika anda menulis kode program seperti diatas, maka pada browser kode program akan menjadi:
```htm
<input type="text" name="account_username" id="account_username" />
```
Attribute ID akan otomatis ditambahkan ke element, apabila tidak terdapat attribute ID pada element, dimana attribute \[id\] akan disamakan dengan attribut \[name\].
Dengan automatisasi ini, anda bisa menyelesaikan pembuatan ribuan Element dengan lebih cepat, dan tentu saja cara ini akan menghemat ukuran ruang yang terpakai pada hosting/VPS.

## Auto Replace Element
Sejauh ini framework yang beredar lebih banyak menyediakan Library yang akhir-nya tetap mengotori kode program, tapi jika sudah menggunakan Senimandigital Framework, segala sesuatu-nya benar-benar dapat diringkas. perhatikan contoh berikut:
```html
<ul if-no-children-replace-this-to-description="Apabila data ditemukan, maka laporan-nya akan kami tampilkan disini.">
<?php foreach($replace_report as $name => $newname) { ?>
 <li>"<?php echo $name; ?>" replace to "<?php echo $newname; ?>"</li>
<?php } ?>
</ul>
```
hanya dengan menambahkan attribute if-no-children-replace-this-to-description, maka apabila tidak ada data children pada element UI, maka elemet UI akan otomatis di replace dengan paragraph deskripsi.

Kami tidak punya cukup waktu untuk mendokumentasikan semua system automatisasi yang sudah terimplementasi, anda bisa langsung melihat ke dalam kode program untuk mengetahui
keseluruhan system automatisasi yang sudah diterapkan.
