# Nama Anggota Kelompok
1. Muhamad Saepul Rizal 2306142
2. Muhammad Jafar Sopian 2306160

# 📚 Sistem Manajemen Artikel
**Tugas Besar Praktikum Pemrograman Web - Laravel**

---

## 📖 Deskripsi Umum
Sistem Manajemen Artikel adalah aplikasi berbasis web yang dirancang untuk mempublikasikan dan mengelola karya tulis ilmiah atau artikel secara digital. Aplikasi ini memungkinkan pengguna untuk mencari, membaca ringkasan (abstrak), dan mengunduh dokumen artikel dalam format PDF.

Dikembangkan menggunakan **Laravel** dengan arsitektur **MVC**, sistem ini membedakan hak akses antara **Administrator** (Pengelola konten) dan **User** (Pembaca).

---

## ✨ Fitur Utama & File Terkait

### 1. � Sistem Autentikasi (Auth)
Fitur pendaftaran dan login untuk membedakan hak akses antara admin dan user biasa.
*   **Logika (Controller)**: `app/Http/Controllers/AuthController.php` (Login, Register, Logout)
*   **Tampilan (View)**:
    *   `resources/views/auth/login.blade.php`
    *   `resources/views/auth/register.blade.php`
*   **Rute (Routes)**: `routes/web.php` (Route POST/GET login & register)

### 2. 📋 Daftar & Pencarian Artikel (Public)
Halaman utama yang menampilkan daftar artikel dengan pagination, serta fitur pencarian berdasarkan judul/penulis dan filter kategori/tahun.
*   **Logika (Controller)**: `app/Http/Controllers/ArticleController.php` (Method `index`)
*   **Tampilan (View)**: `resources/views/articles/index.blade.php`
*   **Model**: `app/Models/Article.php` (Query Scope/Database)

### 3. 📄 Detail Artikel
Menampilkan informasi lengkap sebuah artikel termasuk abstrak dan tombol download PDF.
*   **Logika (Controller)**: `app/Http/Controllers/ArticleController.php` (Method `show`)
*   **Tampilan (View)**: `resources/views/articles/show.blade.php`

### 4. 🛠️ Manajemen Artikel (Admin CRUD)
Fitur khusus Admin untuk menambah, mengupdate, dan menghapus data artikel serta file PDF-nya.
*   **Create (Tambah)**:
    *   Controller: `ArticleController.php` (Method `create`, `store`)
    *   View: `resources/views/articles/create.blade.php`
    *   Validasi: Validasi input dan upload file PDF (Max 5MB).
*   **Update (Edit)**:
    *   Controller: `ArticleController.php` (Method `edit`, `update`)
    *   View: `resources/views/articles/edit.blade.php`
    *   Logic: Mengganti file lama jika ada file baru diupload.
*   **Delete (Hapus)**:
    *   Controller: `ArticleController.php` (Method `destroy`)
    *   Storage: Menghapus file fisik dari folder `storage/app/public/articles`.

---

## 🛠️ Stack Teknologi
*   **Framework**: Laravel 12.x
*   **Bahasa**: PHP 8.2+
*   **Database**: MySQL / MariaDB
*   **Frontend**: Blade Templating Engine + Bulma CSS
*   **Fitur Khusus**: Storage Linking (untuk manajemen file publik)

---

## 📐 Skema Database & Migrasi
File migrasi yang mendefinisikan struktur database:
1.  **Tabel Users**: `database/migrations/2014_10_12_000000_create_users_table.php`
2.  **Tabel Articles**:
    *   Utama: `database/migrations/2025_12_16_044642_create_articles_table.php`
    *   Update (Abstrak): `database/migrations/2026_01_04_143539_add_abstrak_to_articles_table.php`

---

## 🚀 Panduan Instalasi Lokal

### 1. Persiapan Lingkungan
Pastikan Anda telah menginstal:
- PHP >= 8.2
- Composer
- Database Server (MySQL/MariaDB)

### 2. Instalasi Project
```bash
# Clone repository
# Masuk ke direktori project
cd project_tubes

# Install dependensi PHP
composer install

# Salin konfigurasi environment
cp .env.example .env

# Generate Application Key
php artisan key:generate
```

### 3. Konfigurasi Database
Buat database baru di MySQL (misal: `sistem_artikel`), lalu edit file `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sistem_artikel
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Migrasi & Storage Link
Langkah ini penting untuk membuat tabel dan folder akses file PDF.
```bash
# Migrasi database
php artisan migrate

# Link storage (AGAR FILE PDF BISA DIAKSES)
php artisan storage:link
```

### 5. Jalankan Aplikasi
```bash
php artisan serve
```
Akses melalui browser: `http://127.0.0.1:8000`

---

## © 2026 Tugas Besar Praktikum Pemrograman Web
Dikembangkan oleh Kelompok 3
