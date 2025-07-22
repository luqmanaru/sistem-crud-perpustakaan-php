# sistem-crud-perpustakaan-php
Aplikasi web CRUD (*Create, Read, Update, Delete*) sederhana untuk manajemen data buku di perpustakaan, dilengkapi dengan fitur unggah sampul buku. Proyek ini dibangun menggunakan PHP, MySQL, dan dihias dengan Bootstrap.

## ✨ Fitur Utama
-   **Manajemen Data Buku**: Admin dapat mengelola seluruh koleksi buku.
-   **Create**: Menambahkan data buku baru ke dalam database.
-   **Read**: Menampilkan semua data buku dalam format tabel yang rapi.
-   **Update**: Mengubah detail informasi buku yang sudah ada.
-   **Delete**: Menghapus data buku dari database.
-   **Upload Gambar**: Mengunggah file gambar untuk sampul buku dan menampilkannya.

## 🚀 Teknologi yang Digunakan
-   **Backend**: PHP
-   **Database**: MySQL / MariaDB
-   **Frontend**: HTML & Bootstrap 5

## 🗄️ Struktur Database
Proyek ini menggunakan satu tabel utama yaitu `buku` di dalam database `perpustakaan`.
| Nama Kolom     | Tipe Data     | Keterangan                             |
| -------------- | ------------- | -------------------------------------- |
| `id_buku`      | `INT(11)`     | **Primary Key** dengan `AUTO_INCREMENT`|
| `judul`        | `VARCHAR(100)`| Judul lengkap buku                     |
| `sampul_buku`  | `VARCHAR(100)`| Nama file gambar sampul                |
| `pengarang`    | `VARCHAR(50)` | Nama penulis buku                      |
| `penerbit`     | `VARCHAR(50)` | Nama penerbit buku                     |
| `tahun_terbit` | `YEAR(4)`     | Tahun buku diterbitkan                 |

**SQL untuk membuat tabel:**
```sql
CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) DEFAULT NULL,
  `sampul_buku` varchar(100) NOT NULL,
  `pengarang` varchar(50) DEFAULT NULL,
  `penerbit` varchar(50) DEFAULT NULL,
  `tahun_terbit` year(4) DEFAULT NULL,
  PRIMARY KEY (`id_buku`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## 📂 Struktur Folder Proyek
```
.
├── sampul_buku/          <-- Folder untuk menyimpan gambar sampul
│   ├── Ayatayatcinta.jpg
│   └── Laskar Pelangi.jpg
├── add.php               <-- Halaman tambah buku
├── config.php            <-- File koneksi database
├── delete.php            <-- Logika hapus buku
├── edit.php              <-- Halaman edit buku
└── index.php             <-- Halaman utama (tampil data)
```

**luqmanaru**
