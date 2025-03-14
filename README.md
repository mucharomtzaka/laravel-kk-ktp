# CRUD Kartu Keluarga (KK) & Kartu Tanda Penduduk (KTP)

## 📌 Teknologi yang Digunakan
- **Laravel 11** - Framework PHP untuk backend
- **MySQL** - Database untuk menyimpan data
- **Docker** - Untuk containerization
- **Git** - Version control system
- **vite** - Framework vite dengan template react untuk frontend 
---

## Instalasi Konfigurasi Frontend Repo
``` https://github.com/mucharomtzaka/frontend-kk-ktp.git ``

## 📦 Instalasi dan Konfigurasi backend 

### 1️⃣ **Clone Repository**
```sh
git clone https://github.com/mucharomtzaka/laravel-kk-ktp.git nama-proyek
cd nama-proyek
```

### 2️⃣ **Jalankan Docker**
Pastikan **Docker dan Docker Compose** telah terinstal. Jalankan perintah berikut untuk membangun container:
```sh
docker-compose up -d
```

### 3️⃣ **Install Dependensi**
Jika menggunakan Laravel Sail:
```sh
./vendor/bin/sail composer install
```
Atau jika menggunakan PHP lokal:
```sh
composer install
```

### 4️⃣ **Konfigurasi .env**
Buat file `.env` berdasarkan `.env.example` | `.env.example.dev` | `.env.example.docker`:
```sh
cp .env.example .env
```
Edit `.env` untuk mengatur database jika tanpa menggunakan docker :
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=kk_ktp_db
DB_USERNAME=root
DB_PASSWORD=
```

### 5️⃣ **Generate Key & Migrasi Database**
```sh
php artisan key:generate
php artisan migrate --seed
```

### 6️⃣ **Jalankan Server**
Jika menggunakan Laravel Sail:
```sh
./vendor/bin/sail artisan serve
```
Atau jika menggunakan PHP lokal:
```sh
php artisan serve
```
Akses aplikasi di: [http://localhost:8000](http://localhost:8000)

---

## 🔥 Fitur API CRUD
Berikut adalah daftar endpoint yang tersedia:

### 📌 **Kartu Keluarga**
| Method | Endpoint | Alias | Deskripsi |
|--------|----------|--------|------------|
| GET | `/api/kartu_keluarga` | `kk.index` | Mendapatkan daftar KK |
| GET | `/api/kartu_keluarga/{id}` | `kk.show` | Mendapatkan detail KK berdasarkan ID |
| POST | `/api/kartu_keluarga` | `kk.store` | Menambahkan KK baru |
| PUT | `/api/kartu_keluarga/{id}` | `kk.update` | Mengupdate KK berdasarkan ID |
| DELETE | `/api/kartu_keluarga/{id}` | `kk.destroy` | Menghapus KK berdasarkan ID |

### 📌 **Kartu Tanda Penduduk (KTP)**
| Method | Endpoint | Alias | Deskripsi |
|--------|----------|--------|------------|
| GET | `/api/penduduk` | `ktp.index` | Mendapatkan daftar KTP |
| GET | `/api/penduduk/{id}` | `ktp.show` | Mendapatkan detail KTP berdasarkan ID |
| POST | `/api/penduduk` | `ktp.store` | Menambahkan KTP baru |
| PUT | `/api/penduduk/{id}` | `ktp.update` | Mengupdate KTP berdasarkan ID |
| DELETE | `/api/penduduk/{id}` | `ktp.destroy` | Menghapus KTP berdasarkan ID |

---

## ✅ Testing
Untuk menjalankan unit test:
```sh
php artisan test
```
Atau jika menggunakan Laravel Sail:
```sh
./vendor/bin/sail artisan test
```

---

## 🚀 Deployment
Untuk menjalankan dalam mode produksi, pastikan untuk:
```sh
php artisan config:cache
php artisan route:cache
php artisan optimize
```

---

## 📜 Lisensi
Proyek ini menggunakan lisensi **MIT**.

---

## 💡 Kontribusi
Pull Request dan Issue selalu diterima! 😊
- **Mucharom** - [GitHub](https://github.com/mucharomtzaka)
---

**Dibuat dengan ❤️ menggunakan Laravel 11 & Docker**

