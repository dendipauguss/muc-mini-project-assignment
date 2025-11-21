# **🗂️ MUC Mini Project – Modular Laravel Assignment**

Proyek ini merupakan implementasi mini sistem ERP sederhana menggunakan
**Laravel** dengan arsitektur modular berbasis
**nwidart/laravel-modules**.\
Sistem terdiri dari beberapa modul yang mewakili proses bisnis seperti
HRD, Marketing, Operational, dan Activity Tracking.

------------------------------------------------------------------------

## **📌 Daftar Modul**

  -----------------------------------------------------------------------
  Modul                       Deskripsi
  --------------------------- -------------------------------------------
  **Employees**               Mengelola data karyawan (HRD)

  **Proposal**                Mengelola data proposal pekerjaan
                              (Marketing)

  **Serviceused**             Mengelola service/tugas dalam proposal
                              (Operational)

  **Timesheet**               Menampilkan aktivitas jam kerja karyawan
                              (Activity)
  -----------------------------------------------------------------------

------------------------------------------------------------------------

## **⚙️ Fitur Utama (Sesuai Assignment)**

### **Module Employees (HRD)**

-   Menampilkan daftar karyawan\
-   Menampilkan status active/inactive\
-   Tombol **ubah status** (toggle active ↔ inactive)

------------------------------------------------------------------------

### **Module Proposal (Marketing)**

-   CRUD lengkap\
-   Badge status proposal:
    -   pending → kuning\
    -   agreed → hijau\
    -   rejected → merah

------------------------------------------------------------------------

### **Module Serviceused (Operational)**

#### **Mandatory**

-   Tabel serviceused\
-   Form create service (proposal, service_name, status)

#### **Bonus**

-   Edit serviceused\
-   Delete serviceused\
-   Hitung otomatis **Timespent** berdasarkan total jam Timesheet

Format waktu tampil sebagai:

    HH:MM

------------------------------------------------------------------------

### **Module Timesheet (Activity Tracking)**

Menampilkan tabel berisi:

-   Tanggal\
-   Karyawan\
-   Proposal Number\
-   Service Name\
-   Waktu Mulai\
-   Waktu Selesai\
-   Total Jam (computed)

------------------------------------------------------------------------

## **Struktur Database**

Project menggunakan **3 database terpisah**:

  -----------------------------------------------------------------------------
  Koneksi                Database                          Modul
  ---------------------- --------------------------------- --------------------
  `mysql_hrd`            muc\_\_hrd\_\_miniproject         Employees

  `mysql_marketing`      muc\_\_marketing\_\_miniproject   Proposal

  `mysql_activity`       muc\_\_activity\_\_miniproject    Serviceused &
                                                           Timesheet
  -----------------------------------------------------------------------------

### **Contoh konfigurasi `.env`**

``` env
DB_CONNECTION=mysql
DB_DATABASE=muc__activity__miniproject

DB_HRD_CONNECTION=mysql
DB_HRD_DATABASE=muc__hrd__miniproject

DB_MARKETING_CONNECTION=mysql
DB_MARKETING_DATABASE=muc__marketing__miniproject
```

Model menentukan koneksi:

``` php
protected $connection = 'mysql_hrd';
```

------------------------------------------------------------------------

## **Instalasi & Menjalankan Project**

### **1. Install dependency**

    composer install

### **2. Import database SQL**

Import semua file SQL untuk ketiga database.

### **3. Jalankan server**

Karena struktur project menggunakan `server.php`:

    php -S localhost:8000 server.php

Akses via:

    http://localhost:8000

------------------------------------------------------------------------

## **Struktur Modul**

    Modules/
     ├── Employees/
     ├── Proposal/
     ├── Serviceused/
     └── Timesheet/

------------------------------------------------------------------------

## **Perhitungan Timespent**

Timespent dihitung otomatis dari Timesheet:

``` php
$start = strtotime($t->timestart);
$end   = strtotime($t->timefinish);
$diff  = $end - $start;

$hours = floor($diff / 3600);
$minutes = floor(($diff % 3600) / 60);

$su->timespent = sprintf('%02d:%02d', $hours, $minutes);
```

Tidak disimpan di database.

------------------------------------------------------------------------