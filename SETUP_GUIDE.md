# 🚀 Thumbpin Laravel Project Setup Guide

## For React/Next.js Developers

This guide will help you set up and run this Laravel project using concepts you already know from Next.js!

---

## 📦 Prerequisites Installation

### 1. Install PHP (Like Installing Node.js)

```bash
# Install PHP 8.0+ and extensions
sudo dnf install php php-cli php-common php-mbstring php-xml php-mysql php-zip php-curl php-json php-gd

# Verify installation
php --version
# Should show: PHP 8.x.x
```

### 2. Install Composer (Like npm for PHP)

```bash
# Download and install Composer
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

# Verify installation
composer --version
# Should show: Composer version 2.x.x
```

### 3. Install Database (Like PostgreSQL/MongoDB)

```bash
# Install MariaDB (MySQL alternative)
sudo dnf install mariadb-server mariadb

# Start database service
sudo systemctl start mariadb
sudo systemctl enable mariadb

# Secure installation (set root password)
sudo mysql_secure_installation
```

### 4. Install Node.js (For Frontend Assets)

```bash
# Install Node and npm
sudo dnf install nodejs npm

# Verify
node --version
npm --version
```

---

## 🛠️ Project Setup (Like `npm install`)

### Step 1: Install PHP Dependencies

```bash
cd /home/sparshsharma/Thumbpin

# This is like "npm install"
composer install
```

### Step 2: Set Up Environment File

```bash
# Copy .env.example to .env (like .env.local in Next.js)
cp .env.example .env

# Generate application key (security key for Laravel)
php artisan key:generate
```

### Step 3: Configure Database

Edit `.env` file:

```bash
nano .env
```

Update these lines:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=thumbpin_db
DB_USERNAME=root
DB_PASSWORD=your_password_here
```

### Step 4: Create Database

```bash
# Login to MySQL
mysql -u root -p

# Create database
CREATE DATABASE thumbpin_db;
exit;
```

### Step 5: Run Migrations (Create Database Tables)

```bash
# This is like Prisma migrations
php artisan migrate
```

### Step 6: Install Frontend Dependencies

```bash
# Install npm packages
npm install

# Build assets (if needed)
npm run dev
```

---

## 🚀 Start Development Server (Like `npm run dev`)

### Option 1: Using Artisan (Recommended)

```bash
php artisan serve
```

**Server will run at: http://localhost:8000** ✅

### Option 2: Using Built-in PHP Server

```bash
php -S localhost:8000 -t public
```

### Option 3: With Live Reload (Like Next.js hot reload)

Open two terminals:

**Terminal 1 - Backend:**
```bash
php artisan serve
```

**Terminal 2 - Frontend (Watch for CSS/JS changes):**
```bash
npm run watch
```

---

## 🌐 Access Your Application

- **Homepage:** http://localhost:8000
- **Admin Panel:** http://localhost:8000/admin
- **Blog:** http://localhost:8000/blog

---

## 🔥 Common Commands (Next.js → Laravel)

| Task | Next.js | Laravel |
|------|---------|---------|
| **Install dependencies** | `npm install` | `composer install` |
| **Start dev server** | `npm run dev` | `php artisan serve` |
| **Build for production** | `npm run build` | `php artisan optimize` |
| **Clear cache** | Delete `.next/` | `php artisan cache:clear` |
| **Database migrations** | `prisma migrate dev` | `php artisan migrate` |
| **View routes** | Check `pages/` | `php artisan route:list` |
| **Open console** | Browser console | `php artisan tinker` |

---

## 📁 Project Structure (Quick Reference)

```
Thumbpin/
├── app/                    # Backend logic (like Next.js api/ folder)
│   ├── Http/Controllers/   # API routes & handlers
│   ├── Models/            # Database models (like Prisma schemas)
│   └── Mail/              # Email templates
├── routes/
│   └── web.php            # Routes (like pages/ in Next.js)
├── resources/views/       # Blade templates (like React components)
├── public/                # Static files (like public/ in Next.js)
├── database/migrations/   # Database schemas (like Prisma migrations)
├── .env                   # Environment variables (like .env.local)
└── composer.json          # PHP dependencies (like package.json)
```

---

## 🐛 Troubleshooting

### Port Already in Use?

```bash
# Kill process on port 8000
sudo lsof -ti:8000 | xargs kill -9

# Or use a different port
php artisan serve --port=8080
```

### Permission Issues?

```bash
# Fix storage permissions
sudo chmod -R 775 storage bootstrap/cache
sudo chown -R $USER:$USER storage bootstrap/cache
```

### Database Connection Error?

```bash
# Check if MariaDB is running
sudo systemctl status mariadb

# Start if stopped
sudo systemctl start mariadb

# Test connection
mysql -u root -p
```

### Cache Issues?

```bash
# Clear all caches
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

---

## 🎯 Quick Start (TL;DR)

If everything is already installed:

```bash
# 1. Install dependencies
composer install
npm install

# 2. Set up environment
cp .env.example .env
php artisan key:generate

# 3. Configure database in .env file

# 4. Create database and run migrations
mysql -u root -p -e "CREATE DATABASE thumbpin_db;"
php artisan migrate

# 5. Start server
php artisan serve
```

**Open browser:** http://localhost:8000 🎉

---

## 📚 Learn More

- **Laravel Docs:** https://laravel.com/docs
- **Blade Templates:** https://laravel.com/docs/blade
- **Eloquent ORM:** https://laravel.com/docs/eloquent (like Prisma)
- **Artisan CLI:** https://laravel.com/docs/artisan

---

## 💡 Pro Tips

1. **Use `php artisan tinker`** - Interactive PHP shell (like Node REPL)
2. **Install Laravel Debugbar** - See queries and performance (like React DevTools)
3. **Use `php artisan route:list`** - See all routes (like checking pages/ folder)
4. **Check logs:** `storage/logs/laravel.log` - For debugging errors

---

Happy coding! 🚀
