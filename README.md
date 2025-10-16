# 📚 JadwalMatakuliah

Aplikasi web untuk mengelola dan menampilkan **jadwal mata kuliah**.  
Membantu mahasiswa dan dosen melihat jadwal kuliah per semester secara terstruktur.

---

## 🧰 Teknologi yang Digunakan

- PHP (Laravel)  
- Blade (templating)  
- Bootstrap (CSS / UI)  
- MySQL / database relasional  
- Vite (untuk asset bundling)  
- Struktur folder Laravel standar (app, config, routes, public, resources, dsb.)

---

## ✨ Fitur Utama

- CRUD (Create, Read, Update, Delete) jadwal mata kuliah  
- Penataan jadwal per semester / per ruang / per dosen  
- Tampilan antarmuka pengguna menggunakan Bootstrap  
- Pengaturan / konfigurasi melalui file `.env`  
- Sistem routing terstruktur melalui folder `routes`  

---

## 📂 Struktur Folder (singkat)

| Folder / File | Keterangan |
|--------------------|-------------------------------|
| `app/`              | Kode backend (Models, Controllers, dsb.) |
| `config/`           | Konfigurasi aplikasi Laravel |
| `database/`         | Migrations, seeder database |
| `public/`            | File publik (CSS, JS, gambar, index.php) |
| `resources/`         | Views (Blade), asset original |
| `routes/`            | Definisi rute aplikasi |
| `.env.example`       | Template konfigurasi environment |
| `composer.json`      | Dependensi backend PHP |
| `vite.config.js`     | Konfigurasi Vite untuk build frontend assets |

---

## 🚀 Cara Instalasi & Menjalankan

> Asumsinya kamu punya PHP, Composer, Node.js & NPM, serta MySQL sudah terinstall

1. Clone repositorinya:
   ```bash
   git clone https://github.com/Ramandanizarf/JadwalMatakuliah.git
   cd JadwalMatakuliah
