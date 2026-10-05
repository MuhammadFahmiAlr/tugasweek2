# 📄 PRAKTIKUM: AUTHENTIKASI DENGAN LARAVEL BREEZE DAN MIDDLEWARE

## 📌 Deskripsi Praktikum
Praktikum ini membahas tentang implementasi sistem keamanan autentikasi menggunakan **Laravel Breeze** serta pembatasan hak akses halaman (Otorisasi) menggunakan **Custom Role Middleware**.

---

## 🗂️ Daftar File Kode Praktikum

| No | Komponen Praktikum | Lokasi File Kode | Fungsi |
|---|---|---|---|
| 1 | **Role Migration** | `database/migrations/2026_10_02_064705_add_role_to_users_table.php` | Menambahkan kolom `role` pada tabel `users`. |
| 2 | **User Seeder** | `database/seeders/UserSeeder.php` | Membuat akun sampel `admin@minimarket.test` & `kasir@minimarket.test`. |
| 3 | **Role Middleware** | `app/Http/Middleware/RoleMiddleware.php` | Memverifikasi role pengguna sebelum mengakses halaman tertentu. |
| 4 | **Middleware Register** | `bootstrap/app.php` | Mendaftarkan alias middleware `'role' => RoleMiddleware::class`. |
| 5 | **Admin Controller** | `app/Http/Controllers/AdminController.php` | Menangani logika dashboard khusus Admin. |
| 6 | **Kasir Controller** | `app/Http/Controllers/KasirController.php` | Menangani logika dashboard khusus Kasir. |
| 7 | **View Admin** | `resources/views/admin/dashboard.blade.php` | Tampilan dashboard Admin. |
| 8 | **View Kasir** | `resources/views/kasir/dashboard.blade.php` | Tampilan dashboard Kasir. |
| 9 | **Redirect Login** | `app/Http/Controllers/Auth/AuthenticatedSessionController.php` | Mengarahkan pengguna setelah login sesuai role (`admin` ke `/admin/dashboard`, `kasir` ke `/kasir/dashboard`). |
| 10 | **Route Web** | `routes/web.php` | Mendaftarkan route dengan proteksi `middleware(['auth', 'role:admin'])` dan `role:kasir`. |

---

## 🔑 Data Akun Uji Coba (Seeders)

* **Admin**:
  - Email: `admin@minimarket.test`
  - Password: `password`
  - Dashboard: `/admin/dashboard`

* **Kasir**:
  - Email: `kasir@minimarket.test`
  - Password: `password`
  - Dashboard: `/kasir/dashboard`

---

## 🧪 Cara Menjalankan & Pengujian

1. Jalankan server Laravel:
   ```bash
   php artisan serve
   ```
2. Buka browser ke: `http://127.0.0.1:8000/login`
3. Coba login sebagai **Admin**, lalu pastikan berhasil masuk ke `/admin/dashboard`.
4. Coba akses `/kasir/dashboard` saat sedang login sebagai Admin untuk memastikan `RoleMiddleware` memblokir akses yang tidak berhak.
