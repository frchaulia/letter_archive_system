# 📂 Arsip Surat Desa

Aplikasi web berbasis Laravel untuk mengelola arsip surat masuk/keluar pada tingkat desa.  
Didesain agar surat dapat disimpan, dikategorikan, diunduh, dan dikelola dengan mudah.

---

## 🎯 Tujuan
- Membantu perangkat desa dalam mendigitalisasi arsip surat.
- Mempermudah pencarian dan pengelolaan surat berdasarkan kategori.
- Menyediakan akses cepat untuk melihat detail surat dan mengunduh dokumen.

---

## ✨ Fitur Utama
- 🔑 Login & autentikasi admin.
- 📑 Manajemen surat (tambah, ubah, hapus, detail, unduh file PDF).
- 📂 Kategori surat (buat, ubah, hapus).
- 👤 Halaman profil dan tentang pembuat aplikasi.
- 📷 Upload file & preview dokumen.
- ⚡ Tampilan sederhana & responsif.

---

## 🛠️ Cara Menjalankan

1. Clone repository:
  ```bash
   git clone <repository_url>
   cd arsip-surat
  ```
2. Install dependency Laravel:
  ```bash
   composer install
  ```
3. Salin file environment:
  ```bash
   cp .env.example .env
  ```
4. Generate aplikasi key:
  ```bash
   php artisan key:generate
  ```
5. Buat database baru dengan nama arsipsurat.

6. Import file arsipsurat.sql ke database, atau jalankan perintah:
  ```bash
   php artisan migrate --seed
  ```
7. Jalankan server:
  ```bash
   php artisan serve
  ```
8. Akses aplikasi di browser:
  ```bash
   http://127.0.0.1:8000
  ```
9. Default Credentials
- Email: admin@example.com
- Password: 123456
---

## 🖼️ Dokumentasi Screenshot

### Login & Dashboard
| Login | Dashboard |
|-------|-----------|
| ![Login](public/img/screenshot/01-login.png) | ![Dashboard](public/img/screenshot/02-dashboard.png) |

### Manajemen Surat
| Kategori | Tambah Surat | Ubah Surat | Detail Surat |
|----------|--------------|------------|--------------|
| ![Kategori](public/img/screenshot/03-kategori.png) | ![Tambah Surat](public/img/screenshot/05-tambahsurat.png) | ![Ubah Surat](public/img/screenshot/06-ubahsurat.png) | ![Detail Surat](public/img/screenshot/07-detailsurat.png) |

### Manajemen Kategori & Hapus
| Tambah Kategori | Ubah Kategori | Tentang | Hapus |
|-----------------|---------------|---------|-------|
| ![Tambah Kategori](public/img/screenshot/08-tambahkategorisurat.png) | ![Ubah Kategori](public/img/screenshot/09-ubahkategorisurat.png) | ![Tentang](public/img/screenshot/04-tentang.png) | ![Hapus](public/img/screenshot/10-hapus.png) |

---

## Identitas Pembuat
- Nama: Faricha Aulia
- Program Studi: D4 - Teknik Informatika
- Institusi: Politeknik Negeri Malang
- Tahun: 2025
