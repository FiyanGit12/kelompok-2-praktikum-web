# Student Manager — CRUD Mahasiswa (CodeIgniter 4)

Aplikasi CRUD data mahasiswa menggunakan CodeIgniter 4, dibuat untuk tugas Praktikum Web Programming (Bab 5 & Bab 6).

## 🧰 Requirement

Sebelum menjalankan project ini, pastikan sudah terinstall:

- [XAMPP](https://www.apachefriends.org/) (Apache + MySQL)
- [PHP](https://www.php.net/) minimal versi 8.1
- [Composer](https://getcomposer.org/)
- Git

## 🚀 Langkah Setup Project

### 1. Clone repository

```bash
git clone https://github.com/username/nama-repo.git
cd nama-repo
```

### 2. Install dependency (Composer)

```bash
composer install
```

### 3. Nyalakan XAMPP

Buka **XAMPP Control Panel**, lalu start service:

- **Apache**
- **MySQL**

### 4. Import Database

1. Buka browser, akses phpMyAdmin:
   ```
   http://localhost/phpmyadmin
   ```
2. Klik **New/Baru** di sidebar kiri untuk membuat database baru
3. Beri nama database: `db_kampus`, lalu klik **Create/Buat**
4. Setelah database `db_kampus` terbuat, klik database tersebut, lalu buka tab **Import**
5. Klik **Choose File**, pilih file `database/db_kampus.sql` dari folder project ini
6. Scroll ke bawah, klik tombol **Go/Kirim**
7. Tunggu sampai muncul pesan sukses — tabel `tb_mahasiswa` akan otomatis terbentuk beserta datanya

### 5. Konfigurasi `.env`

Copy file `env` menjadi `.env` (kalau belum ada):

```bash
cp env .env
```

Buka file `.env`, cari bagian berikut dan sesuaikan (biasanya cukup uncomment/hapus tanda `#` di depannya):

```env
CI_ENVIRONMENT = development

database.default.hostname = localhost
database.default.database = db_kampus
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
database.default.port = 3306
```

> Catatan: default XAMPP biasanya `username = root` dan `password` kosong. Sesuaikan kalau MySQL kamu pakai password.

### 6. Jalankan server

```bash
php spark serve
```

Buka browser ke:

```
http://localhost:8080
```

## 📁 Struktur Folder Penting

```
├── app/
│   ├── Controllers/     # Logic CRUD
│   ├── Models/          # Model tb_mahasiswa
│   └── Views/           # Tampilan (crud.php, edit.php, dll)
├── database/
│   └── db_kampus.sql    # File export database — WAJIB diimport sebelum run
├── public/
│   └── assets/css/      # File CSS custom (crud.css)
└── README.md
```

## 👥 Kolaborasi (Bab 6)

- Setiap anggota kerja di branch masing-masing, lalu ajukan **Pull Request** ke `main`
- Sebelum mulai coding, jalankan `git pull` dulu biar sinkron
- Kalau ada perubahan struktur database, jangan lupa export ulang `db_kampus.sql` dan update di folder `database/`

## 🛠️ Tech Stack

- **Framework:** CodeIgniter 4
- **Database:** MySQL (XAMPP)
- **Styling:** Tailwind CSS (CDN) + Custom CSS
- **Animasi:** AOS (Animate On Scroll)
