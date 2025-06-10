# Tugas Modul 1 - 6

- Nama  : Arya Wiratama
- NIM   : 312310224
- Kelas : TI.23.A2

## Modul 1
![env](/ss/modul-1-env.png)
![routes](/ss/modul-1-routes.png)
![page](/ss/modul-1-page.png)
![about](/ss/modul-1-about.png)
![header](/ss/modul-1-header.png)
![footer](/ss/modul-1-footer.png)
![modul](/ss/modul-1-hasil.png)


## Modul 2
![con-db](/ss/modul-2-database-con.png)
![artikelMod](/ss/modul-2-artikelModel.png)
![artikelPHP](/ss/modul-2-artikelPHP.png)
![index](/ss/modul-2-index.png)
![fadd](/ss/modul-2-add.png)
![fdit](/ss/modul-2-formedit.png)
![Modul2](/ss/modul-2-admin.png)
![modul2-2](/ss/modul-2-artikel-rev.png)
![modul-3](/ss/modul-2-add.png)

## Modul 3
![lay-main](/ss/modul-3-lay.png)
![cell](/ss/modul-3-cell.png)
![home](/ss/modul-3-home.png)
![terkini-3](/ss/modul-3-artikelTerkini.png)
![modul3](/ss/modul-3.png)

Tugas Tambahan


1. Manfaat Utama Penggunaan View Layout
Manfaat utama menggunakan View Layout adalah:

Pengelolaan Tampilan yang Konsisten: Dengan layout, bagian header, footer, dan navigasi hanya dibuat satu kali dan dipakai di semua halaman, sehingga memudahkan pemeliharaan tampilan.
Penghematan Waktu dan Kode: Tidak perlu menduplikasi kode HTML yang sama di setiap view.
Pemisahan Konten dan Kerangka: Memudahkan pengaturan konten spesifik setiap halaman tanpa mengubah kerangka utama.


2. Perbedaan antara View Cell dan View Biasa
View Biasa: Digunakan untuk menampilkan konten halaman secara utuh. Setiap view biasanya menangani konten halaman tertentu.
View Cell: Merupakan komponen tampilan modular yang dapat digunakan ulang di berbagai view. View Cell berguna untuk menampilkan bagian UI yang sering muncul (misalnya sidebar, widget, menu) dan dapat mengandung logika untuk pengambilan data.


3. Ubah View Cell agar Hanya Menampilkan Post dengan Kategori Tertentu
Pastikan tabel artikel memiliki field kategori, misalnya field kategori yang menyimpan nilai seperti "Berita", "Tutorial", dsb.
Modifikasi View Cell di file ArtikelTerkini.php:

```php
public function render($kategori = 'Berita')
{
    $model = new ArtikelModel();
    // Filter artikel berdasarkan kategori dan urutkan berdasarkan created_at
    $artikel = $model->where('kategori', $kategori)
                     ->orderBy('created_at', 'DESC')
                     ->limit(5)
                     ->findAll();
    
    return view('components/artikel_terkini', ['artikel' => $artikel]);
}

```
Memanggil View Cell dengan Parameter di Layout:
Di file layout/main.php, ubah pemanggilan view cell seperti berikut:
```php
<?= view_cell('App\\Cells\\ArtikelTerkini::render', ['kategori' => 'Berita']) ?>
```
Dengan cara ini, view cell hanya akan menampilkan artikel yang termasuk dalam kategori "Berita". Anda bisa mengganti parameter kategori sesuai kebutuhan.

## Modul 4
![login-page](/ss/modul%20-%204%20-%20login-page.png)

## Modul 5
![pencarian-pagination](/ss/modul-5-pencarian-pagination.png)

## Modul 6
![upload-gambar](/ss/modul-5-upload-gambar.png)
![hasil-upload](/ss/modul-5-hasil-gambar.png)