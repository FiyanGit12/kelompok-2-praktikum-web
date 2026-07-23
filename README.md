# 🐾 PawStore — Sistem Manajemen Produk Petshop

> Aplikasi CRUD produk Petshop menggunakan **CodeIgniter 4**, dibuat untuk tugas **Praktikum Web Programming Bab 5** (CRUD & Model pada CI4).

---

## 🎯 Fitur Aplikasi

| Fitur             | Keterangan                                                        |
| ----------------- | ----------------------------------------------------------------- |
| ✅ **Create**     | Tambah produk baru via form dengan preview gambar                 |
| ✅ **Read**       | Tampilkan semua produk dalam tabel responsif                      |
| ✅ **Update**     | Edit produk langsung lewat **modal popup** (tanpa pindah halaman) |
| ✅ **Delete**     | Hapus produk dengan modal konfirmasi                              |
| 🎨 **UI Premium** | Hero section, badge kategori, stok indicator, animasi AOS         |
| 📱 **Responsive** | Tampil rapi di desktop & mobile                                   |

---

## 🧰 Tech Stack

| Layer        | Teknologi                                           |
| ------------ | --------------------------------------------------- |
| **Backend**  | CodeIgniter 4 (PHP 8.1+)                            |
| **Database** | MySQL via XAMPP / phpMyAdmin                        |
| **Styling**  | Tailwind CSS (CDN) + Custom CSS (peach/cream theme) |
| **Animasi**  | AOS — Animate On Scroll                             |
| **Font**     | Plus Jakarta Sans + Nunito (Google Fonts)           |

---

## 🗄️ Struktur Database

**Database:** `db_petshop` — **Tabel:** `tb_produk`

| Field         | Tipe                  | Keterangan                           |
| ------------- | --------------------- | ------------------------------------ |
| `id_produk`   | INT AUTO_INCREMENT PK | Primary key                          |
| `nama_produk` | VARCHAR(100)          | Nama produk (cth: Royal Canin)       |
| `kategori`    | VARCHAR(50)           | Makanan / Aksesoris / Obat / Kandang |
| `harga`       | INT                   | Harga dalam Rupiah                   |
| `stok`        | INT                   | Jumlah stok tersedia                 |
| `deskripsi`   | TEXT                  | Deskripsi singkat produk             |
| `gambar`      | VARCHAR(255)          | URL/path gambar produk               |

---

## 🚀 Cara Setup & Menjalankan

### 1. Requirement

Pastikan sudah terinstall:

- [XAMPP](https://www.apachefriends.org/) (Apache + MySQL)
- PHP minimal versi **8.1**
- [Composer](https://getcomposer.org/)
- Git

### 2. Clone Repository

```bash
git clone https://github.com/FiyanGit12/kelompok-2-praktikum-web.git
cd kelompok-2-praktikum-web
```

### 3. Install Dependency

```bash
composer install
```

### 4. Nyalakan XAMPP

Buka **XAMPP Control Panel**, start:

- ✅ **Apache**
- ✅ **MySQL**

### 5. Generate Database (Pilih salah satu cara)

#### Cara A — Import via phpMyAdmin (Manual)

1. Buka `http://localhost/phpmyadmin`
2. Klik **New** → beri nama `db_petshop` → **Create**
3. Klik database `db_petshop` → tab **Import**
4. Pilih file `Database/db_petshop.sql` → klik **Go**
5. Tabel `tb_produk` dan 6 data contoh akan otomatis terbuat ✅

#### Cara B — via MySQL CLI (Cepat)

```bash
# XAMPP
C:\xampp\mysql\bin\mysql.exe -u root < Database/db_petshop.sql

# Laragon / MySQL biasa
mysql -u root < Database/db_petshop.sql
```

### 6. Konfigurasi `.env`

Buka file `.env` dan pastikan bagian database sudah seperti ini:

```env
CI_ENVIRONMENT = development

database.default.hostname = localhost
database.default.database = db_petshop
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
database.default.port     = 3306
```

> **Catatan:** Default XAMPP: `username = root`, `password` kosong. Sesuaikan jika berbeda.

### 7. Jalankan Server

```bash
php spark serve
```

Buka browser:

```
http://localhost:8080
```

---

## 📁 Struktur Folder Penting

```
WEB_BAB_5/
├── app/
│   ├── Controllers/
│   │   ├── Produk.php          ← Controller CRUD (index, tambah, edit, hapus)
│   │   └── Home.php            ← Redirect ke /produk
│   ├── Models/
│   │   └── ProdukModel.php     ← Model tb_produk
│   └── Views/
│       ├── layout/
│       │   └── template.php    ← Layout utama (navbar, footer, AOS)
│       └── produk/
│           ├── index.php       ← Hero + tabel + modal edit & delete
│           └── tambah.php      ← Form tambah produk
├── public/
│   └── assets/
│       ├── css/
│       │   └── petshop.css     ← Custom CSS (tema peach/cream)
│       └── img/
│           └── hero-pets.png   ← Ilustrasi chibi hero section
├── Database/
│   └── db_petshop.sql          ← SQL create table + sample data
├── .env                        ← Konfigurasi database
└── README.md
```

---

## 🌐 Routing

| Method | URL                 | Controller     | Fungsi              |
| ------ | ------------------- | -------------- | ------------------- |
| GET    | `/`                 | Produk::index  | Redirect ke /produk |
| GET    | `/produk`           | Produk::index  | Tampil semua produk |
| GET    | `/produk/tambah`    | Produk::tambah | Form tambah         |
| POST   | `/produk/tambah`    | Produk::tambah | Proses simpan       |
| GET    | `/produk/edit/:id`  | Produk::edit   | Load data ke modal  |
| POST   | `/produk/edit/:id`  | Produk::edit   | Proses update       |
| GET    | `/produk/hapus/:id` | Produk::hapus  | Proses hapus        |

---

## 👥 Pembagian Tugas Kelompok 2

| Nama        | Tugas                              | File                                          |
| ----------- | ---------------------------------- | --------------------------------------------- |
| **Alfiyan** | Controller, Model, Routing | `Produk.php`, `ProdukModel.php`, `Routes.php` |
| **Atih**    | View form edit dan delete (modal)             | `produk/index.php`                            |
| **Eka**     | Styling & CSS petshop theme        | `public/assets/css/petshop.css`               |
| **Afra**    | Tampilan utama                     | `layout/template.php`                         |
| **Devin**   | View form tambah produk            | `produk/tambah.php`                           |

> **Tips kolaborasi:**
>
> - Setiap anggota kerja di branch masing-masing, lalu ajukan **Pull Request** ke `main`
> - Jalankan `git pull` sebelum mulai coding
> - Jika ada perubahan struktur DB, export ulang `db_petshop.sql` dan update ke folder `Database/`

---

## 🛠️ Development Notes

- Edit modal menggunakan **vanilla JS** — tidak perlu library tambahan
- Delete modal menampilkan nama produk yang akan dihapus sebelum konfirmasi
- Stok badge otomatis berubah warna: 🟢 aman (>20) · 🟡 sedang (6–20) · 🔴 rendah (≤5)
- Gambar produk mendukung URL eksternal — jika kosong, tampil emoji kategori sebagai fallback

---

_© 2025 Kelompok 2 — Praktikum Web Programming · CodeIgniter 4 · PHP · MySQL_
