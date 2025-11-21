🗂️ MUC Mini Project – Modular Laravel Assignment

Proyek ini merupakan implementasi mini sistem ERP sederhana menggunakan Laravel 8+ dengan arsitektur modular berbasis nwidart/laravel-modules.
Sistem ini terdiri dari beberapa modul yang mewakili proses bisnis perusahaan konsultan pajak, seperti HRD, Marketing, Operational, dan Activity Tracking.

📌 Daftar Modul

Project terdiri dari 4 module utama:

Modul	Deskripsi
Employees	Mengelola data karyawan (HRD)
Proposal	Mengelola data proposal pekerjaan (Marketing)
Serviceused	Mengelola service/tugas dalam proposal (Operational)
Timesheet	Menampilkan aktivitas jam kerja karyawan (Activity)
⚙️ Fitur Utama (Sesuai Assignment)
🟦 Module Employees (HRD)

Tampilkan daftar karyawan

Badge status (active/inactive)

Fitur ubah status karyawan (active ↔ inactive)

🟩 Module Proposal (Marketing)

CRUD lengkap (Create, Read, Update, Delete)

Badge warna berdasarkan status:

pending → warning

agreed → success

rejected → danger

Tampilan tabel proposal

🟧 Module Serviceused (Operational)
✔ Mandatory:

Tabel serviceused

Form create service (proposal, nama service, status)

⭐ Bonus:

Edit serviceused (1 poin)

Delete serviceused (0.5 poin)

Hitung Timespent berdasarkan total jam timesheet (2 poin)

Timespent = total durasi timesheet yang terkait service tersebut
Format: HH:MM

🟨 Module Timesheet (Activity Tracking)
✔ Mandatory:

Menampilkan tabel dengan informasi:

Tanggal

Karyawan

Proposal Number

Service Name

Waktu Mulai

Waktu Selesai

Total Jam (computed)

🧩 Database

Project menggunakan 3 database terpisah, sesuai departemen:

Koneksi	Database	Modul
mysql_hrd	muc__hrd__miniproject	Employees
mysql_marketing	muc__marketing__miniproject	Proposal
mysql_activity	muc__activity__miniproject	Serviceused & Timesheet

Contoh konfigurasi .env:

DB_CONNECTION=mysql
DB_DATABASE=muc__activity__miniproject

DB_HRD_CONNECTION=mysql
DB_HRD_DATABASE=muc__hrd__miniproject

DB_MARKETING_CONNECTION=mysql
DB_MARKETING_DATABASE=muc__marketing__miniproject


Setiap model menentukan connection masing-masing, contoh:

protected $connection = 'mysql_hrd';

🛠️ Instalasi & Menjalankan Project
1. Install dependency
composer install

2. Import database dari file SQL

Gunakan ketiga database sesuai modul.

3. Jalankan server

Karena folder public/ tidak ada (diganti server.php):

php -S localhost:8000 server.php


Akses melalui:

http://localhost:8000

🔗 Struktur Modul

Contoh struktur module Nwidart:

Modules/
 ├── Employees/
 │    ├── Http/
 │    ├── Entities/
 │    ├── Resources/
 │    └── Routes/
 ├── Proposal/
 ├── Serviceused/
 └── Timesheet/

🧠 Perhitungan Timespent

Timespent dihitung otomatis, tidak disimpan di database.

$start = strtotime($t->timestart);
$end   = strtotime($t->timefinish);
$diff  = $end - $start;

$hours = floor($diff / 3600);
$minutes = floor(($diff % 3600) / 60);

$su->timespent = sprintf('%02d:%02d', $hours, $minutes);