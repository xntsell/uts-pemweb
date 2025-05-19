# Setup PemWeb Project

## Masuk ke Docker container

\`\`\`bash
docker exec -it pemweb bash
\`\`\`

## Install Laravel Starter

\`\`\`bash
composer create-project --prefer-dist raugadh/fila-starter .
\`\`\`

## Jika `src/` sudah ada isi

\`\`\`bash
rm -rf *
\`\`\`

\`\`\`bash
rm -rf .*
\`\`\`

## Atur izin folder

\`\`\`bash
chown -R www-data:www-data storage/*
\`\`\`

\`\`\`bash
chmod 777 -R storage/*
\`\`\`

\`\`\`bash
chmod 777 bootstrap/*
\`\`\`

## Edit file `.env`

```env
APP_NAME="PemWeb"
APP_TIMEZONE='Asia/Jakarta'
APP_URL=http://localhost
ASSET_URL=http://localhost
DB_CONNECTION=mysql
DB_HOST=db_pemweb
DB_PORT=3306
DB_DATABASE=db_pemweb
DB_USERNAME=root
DB_PASSWORD=p455w0rd
```

## Setelah ubah `.env`, jalankan:

\`\`\`bash
php artisan migrate
\`\`\`

\`\`\`bash
php artisan key:generate
\`\`\`

\`\`\`bash
php artisan shield:generate --all
\`\`\`

\`\`\`bash
php artisan project:init
\`\`\`

## Akses lewat browser

Buka `http://localhost`

Login:
- **Username**: `admin@admin.com`
- **Password**: `password`

## Perintah tambahan

### Buat komponen Livewire

\`\`\`bash
php artisan make:livewire NamaKomponen
\`\`\`

### Buat model, migration, dan seeder

\`\`\`bash
php artisan make:model NamaModel -ms
\`\`\`

### Buat Filament Resource

\`\`\`bash
php artisan make:filament-resource NamaModel --generate
\`\`\`

### Reset database & seeder

\`\`\`bash
php artisan migrate:fresh
\`\`\`

\`\`\`bash
php artisan db:seed --force
\`\`\`
