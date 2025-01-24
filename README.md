# Project Administratif Kehadiran Karyawan/Pegawai

![Project Logo](https://via.placeholder.com/150)

## Anggota
- Nathanael Kanaya Chriesman / 2272018
- Joseph Adiwiguna Kartawihardja / 2272020
- Benedict Wijaya / 2272022
- Rafael Cavin Emmanuel Tuasuun / 2272041

---

## Langkah-langkah Setup

### 1. Clone Repository

Pastikan Anda sudah menginstal Git di komputer Anda, lalu gunakan perintah berikut untuk meng-clone repository dan masuk ke direktori project:

```bash
# Clone repository ke dalam direktori lokal Anda
git clone https://github.com/Lexuzzz1/Project-Administratif-Kehadiran-Karyawan-Pegawai.git

# Masuk ke direktori project
cd Project-Administratif-Kehadiran-Karyawan-Pegawai
```

---

### 2. Konfigurasi File `.env`

1. Salin file `.env.example` menjadi `.env`:
   
   ```bash
   cp .env.example .env
   ```

2. Buka file `.env` dan sesuaikan konfigurasi koneksi database Anda:

   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=kehadiran_karyawan
   DB_USERNAME=your_database_username
   DB_PASSWORD=your_database_password
   ```
   Ganti `your_database_username` dan `your_database_password` sesuai pengaturan database Anda.

3. Generate key aplikasi Laravel:

   ```bash
   php artisan key:generate
   ```

---

### 3. Setup Database

1. Pastikan Anda memiliki server database (MySQL/MariaDB) yang berjalan di mesin Anda.

2. Buat database baru:

   ```sql
   CREATE DATABASE kehadiran_karyawan;
   ```

3. Jalankan migrasi database:

   ```bash
   php artisan migrate
   ```

4. Masukkan seeders dalam urutan berikut:

   ```bash
   php artisan db:seed --class=DepartemenSeeder
   php artisan db:seed --class=GolonganSeeder
   php artisan db:seed --class=JabatanSeeder
   php artisan db:seed --class=RoleSeeder
   php artisan db:seed --class=KaryawanSeeder
   ```

---

### 4. Install Dependencies

1. Install dependencies backend menggunakan Composer:

   ```bash
   composer install
   ```

2. Install dependencies frontend menggunakan npm:

   ```bash
   npm install
   ```

---

### 5. Menjalankan Aplikasi

1. Jalankan server Laravel:

   ```bash
   php artisan serve
   ```

2. Akses aplikasi di browser:

   ```
   http://localhost:8000
   ```

---

### Akun Default

Akun default yang tersedia setelah menjalankan seeder adalah:

- **Admin:**
  - **Username:** jono@gmail.com
  - **Password:** Adm12345
- **Manajer:**
  - **Username:** agus@gmail.com
  - **Password:** Mnj12345
- **Karyawan:**
  - **Username:** asep@gmail.com
  - **Password:** Pgw12345

---

## Link Referensi

- **Activity Diagram:** [Klik di sini](https://miro.com/app/board/uXjVLaAPr68=/?share_link_id=809917764691)
- **ERD:** [Klik di sini](https://miro.com/app/board/uXjVLZCBT1o=/?share_link_id=44441675315)
- **Use Case:** [Klik di sini](https://miro.com/app/board/uXjVLaAEb2g=/?share_link_id=472950193529)
- **Trello:** [Klik di sini](https://trello.com/invite/b/6717c18d9f2138c3c82afc12/ATTI055fc39fa0aa362deb7b46e2b9b736f9EA45C201/website-administratif-kehadiran-karyawan-pegawai)

---

### Catatan Tambahan

- Pastikan semua prasyarat seperti PHP, Composer, Node.js, dan npm telah terinstal di mesin Anda.
- Jika ada error, periksa konfigurasi database dan port yang digunakan.

---

## Lisensi

Project ini berada di bawah lisensi MIT.
