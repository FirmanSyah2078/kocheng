# Changelog

## [1.0.0-mvp] - 2026-07-09

### Tambahan
- Skema database MVP POS (tanpa keranjang).
- Model & Migration: `Category`, `Product`, `Transaction`, `TransactionItem`.
- Seeder & Factory untuk data uji otomatis.

---

## Cara Menjalankan Seeder

Jalankan perintah berikut di terminal direktori `apps/`:

1. **Migrasi Ulang & Isi Data:**
   ```bash
   php artisan migrate:fresh --seed
   ```

2. **Jalankan Seeder Tertentu Saja:**
   ```bash
   php artisan db:seed --class=UserSeeder
   ```

### Akun Uji Coba:
- **Admin**: `admin@pos.id` (Password: `password123`)
- **user/pelanggan**: `user@pos.id` (Password: `password123`)
- **User/Pelanggan Acak**: Email acak (Password: `user123`)
