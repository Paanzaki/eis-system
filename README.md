# 🏛️ EIS - Executive Information System
### *State-of-the-Art Management Portal for Kodewave Sdn Bhd*

Sistem Pengurusan Maklumat Eksekutif (EIS) yang dibangunkan untuk memperkasakan tadbir urus digital. Sistem ini menyatukan pemantauan analitik, pengurusan aset strategik, dan automasi perolehan dalam satu ekosistem yang pintar.

---

## 🎨 Design Identity: SSE-UI
Sistem ini menggunakan bahasa rekaan **Selangor State Executive UI (SSE-UI)** yang menggabungkan elemen tradisi dan futuristik:

* **Primary Palette:**
    * `Midnight Navy (#1E3A8A)` — Profesionalisme & Integriti.
    * `State Crimson (#E11D48)` — Keberanian & Dinamisme.
    * `Royal Amber (#FACC15)` — Kecemerlangan & Kedaulatan.
* **Visual Philosophy:**
    * **High-Contrast Information Density:** Paparan data yang padat untuk eksekutif.
    * **Shadow-Gradient Hover States:** Efek bayangan Merah-Kuning pada kad statistik.
    * **Monospaced Forensic Logging:** Estetik terminal untuk ketelusan audit sistem.
* **Key UX Features:**
    * **Adaptive Persistent Sidebar:** Menggunakan `localStorage` untuk mengekalkan pilihan saiz sidebar pengguna.
    * **Dynamic Breadcrumb Pathways:** Navigasi berperingkat (Dashboard / Modul / Sub-menu).
    * **Real-time Activity Streams:** Paparan log transaksi secara langsung bagi setiap seksyen.
    * **Hybrid Display Mode:** Sokongan *Adaptive Dark Mode* untuk keselesaan visual eksekutif.

---

## 🛠️ Tech Stack
| Layer | Technology |
| :--- | :--- |
| **Framework** | Laravel 12 (PHP 8.2+) |
| **Database** | MySQL |
| **Frontend** | Tailwind CSS & Alpine.js |
| **Analytics** | Chart.js Visualization Engine |
| **AI Integration** | FAI Engine (AI Assistant) |

---

## 🔑 Akses Demo (Quick Login)
Gunakan kredensial berikut untuk menguji fungsi sistem tanpa perlu mendaftar akaun baru:

> [!IMPORTANT]  
> **Email:** `user@exam.com`  
> **Password:** `usercuba`

---

## 🚀 Panduan Pemasangan (Setup)

Ikuti langkah-langkah di bawah untuk menjalankan sistem di persekitaran lokal anda:

### 1. Clone & Dependencies
```bash
# Clone repository
git clone [https://github.com/Paanzaki/eis-system](https://github.com/Paanzaki/eis-system)

# Masuk ke folder projek
cd eis-system

# Install PHP dependencies
composer install

# Install JS dependencies
npm install

# Salin fail .env
cp .env.example .env

# Jana application key
php artisan key:generate
