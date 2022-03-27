# Templates

Ketika pertama kali menggunakan Framework apapun, hal pertama yang perlu kita pelajari tentu saja adalah Templates atau Template Engine yang digunakan.
Setiap Template Engine tentusaja memiliki keunggulan dan batasan yang sangat terukur. Semakin canggih(Dukungan Algoritma) sebuah Template Engine akan semakin manual cara kita bekerja ketika menggunakan-nya, semakin sederhana(Dukungan Algoritma) Template Engine semakin banyak pekerjaan yang dapat di-automatisasi.
Kondisi ini adalah fakta dan realita yang tidak perlu anda sanggah dan tidak perlu juga kita perdebatkan. Karena suatu hari anda juga akan mengerti dengan sendiri-nya, bawa framework terbagi dalam 2 kelompok besar yaitu: "Framework yang mempermudah pekerjaan" dan ada juga "Framework yang lebih banyak melakukan pengkondisian".

Folder Template pada Senimandigital Framework, berisi berbagai resource yang sejati-nya disediakan untuk bisa dikostumasi oleh pengguna akhir.

# Abstrak

Di senimandigital kami dengan tegas mengatkan bahwa framework populer yang beredar banyak yang melakukan tipu-tipu, anda yang sangat mencintai framework yang anda gunakan tidak perlu geram dengan pernyataan ini, karena kami tidak bermaksud buruk dengan statement diatas, dan kami punya penjelasan kenapa sampai ada statement seperti itu.

1. Bagi kami, framework itu seharus-nya tidak hanya mengatur bagaimana kita bekerja tapi seharus-nya mempermudah kita dalam bekerja. apa yang kami nilai kurang tepat dari apa yang framework berikan adalah: Framework itu tidak benar-benar mempermudah pengembangan aplikasi, tetapi justru mempersulit dan memaksa kita membuang-buang waktu mempelajari lebih banyak hal seperti class dan method tambahan, yang sering kali system penamanyaan-nya terlalu aneh bahkan juga sangat asing.
2. Framework terlalu menyediakan solusi yang berfokus pada satu infrastruktur, katakanlah framework backend maka ia hanya fokus memberikan solusi dari sisi backend, begitu pula untuk framework frontend ia hanya fokus memberikan solusi dari sisi frontend. Sementara saat kita bekerja, dalam membangun aplikasi kita akan lebih banyak membutuhkan penerapan konsep hybrid/campuran. Karena kita tau, mekanisme dan arsitektur hybrid jelas bisa memberikan kinerja yang jauh lebih optimal ketimbang memaksakan seluruh solusi dari satu sisi infrastruktur saja.
3. Dalam pemrograman kita sebenarnya tidak begitu membutuhkan yang nama-nya framework, karena yang jauh lebih kita butuhkan adalah alat bantu kerja yang bisa mengautomatisasi proses ngoding, contoh paling sederhana untuk automatisasi ini tentu saja adalah kode generator. Dengan adanya kode generator kita tidak harus mempelajari framework  tapi cukup mempelajari bagaimana membuat Database, XML dan JSON, setelah mempelajari ketiga hal itu kita sudah bisa menghasilkan aplikasi menggunakan framework apapun yang kita mau, setelah proses pengembangan aplikasi dimulai, barulah kemudian kita membuang waktu untuk mempelajari framework yang sedang kita gunakan.

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

## Auto Synchrone Title/Tooltip
Anda bisa mendefinisikan attribute title pada label, maka title akan di synkronkan secara otomatis ke element input yang terelasi.
```html
<label for="classification_alias" title="Isi dengan angka Nol apabila anda tidak mengerti">Alias Untuk Judul / Nama Tabel Virtual</label>
```
Dengan cara ini attribut pada element input akan menjadi lebih bersih, dan nyaman untuk dimutakhirkan apabila suatu saat pemutakhiran itu diperlukan.

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

## Magic Text to Speech / Text Reading
Menggunakan Senimandigital Framework, anda bisa dengan mudah membuat komputer berbicara, yang perlu anda lakukan hanyalah menambahkan dua attribute magic, yaitu:
1. control-speech-for: isi dengan nilai selector untuk element yang text/value-nya ingin dibacakan
2. control-speech-by: Isi dengan nilai selector untuk element yang text/value-nya dimaksudkan untuk suara pembaca.
Contoh kode:
```html
<textarea id="text_to_speech">Nomor antrian 11 silahkan menuju kasa 12.</textarea>
<select id="speech_by"></select>
<button control-speech-for="#text_to_speech" control-speech-by="#speech_by">Baca Tulisan</button>
```
Anda tidak perlu bingung, kenapa pada contoh diatas element select tidak memiliki opsi apapun, karena secara runtime Senimandigital Framework yang nantinya 
akan menambahkan secara otomatis daftar suara yang dapat dipilih dan menyimpan-nya pada element yang dimaksudkan.

# Penutup
Senimandigital Framework adalah Opensource, meski demikian anda tidak akan mendapatkan framework ini begitu saja, salah satu cara paling mudah dan legal untuk menggunakan Senimandigital Framework adalah dengan mendaftar sebagai anggota dan menggenerate aplikasi menggunakan layanan pada website https://senimandigital.com dengan cara itu anda akan secara otomatis mendapatkan Senimandigital Framework ini. 

Kami tidak punya cukup waktu untuk mendokumentasikan semua system automatisasi yang sudah terimplementasi, anda bisa langsung melihat ke dalam kode program untuk mengetahui keseluruhan system automatisasi yang sudah diterapkan. Atau anda bisa juga dengan cara menggunakan aplikasi yang dibangun menggunakan Senimandigital Framework, maka anda akan mendapat petunjuk penggunaan secara runtime.
