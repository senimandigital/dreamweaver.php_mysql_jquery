### Magic Attribute: [href-prev-for] & [href-next-for]

Ketika membangun aplikasi sering kita butuh menyediakan tombol next dan prev, tapi tidak semua-nya perlu di proses dari backend, apabila kita punya list pada halaman yang sama
maka kita bisa membuat tombol next dan prev hanya dengan menggunakan kode html seperti ini:

```
<a href-prev-for="#list_directory">Prev</a>
<a href-next-for="#list_directory">Next</a>
```

### Magic Attribute [href-dialog], [href-popup], [href-dialog-ajax], [href-dialog-ajax]

Senimandigital menyediakan berbagai cara interaksi dengan form yang berbeda, secara default attribute href tetap digunakan untuk mengantisifasi aksi berdasarkan klik kanan.
apabila attribute seperti: hrefp-popup di klik, maka attribute href akan dibatalkan dan yang diproses adalah even on click yang targetnya diambil dari attribute href dialog.

```
<a href-dialog="http://">Text</a>
<a href-dialog-ajax="https://">Text</a>
<a href-panel-left="#element">Test</a>
<a href-panel-top".element">Test</a>
<a href-panel-right="=">Text</a>
<a href-popup="/filename.php">Text</a>
```
