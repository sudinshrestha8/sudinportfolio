# Dynamic Developer Portfolio

A fully dynamic portfolio website built with **Laravel 13**, **Filament v5**, **Tailwind CSS v4**, and **Alpine.js**. All content is database-driven and managed through a Filament admin panel.

## Tech Stack

- **Backend:** Laravel 13
- **Admin Panel:** Filament v5 (full CRUD for all sections)
- **Frontend:** Blade + Alpine.js + Tailwind CSS v4
- **Database:** MySQL
- **Build Tool:** Vite

## Features

- 10 fully manageable content sections (Hero, About, Skills, Projects, Experience, Education, Services, Testimonials, Contact, Site Settings)
- Filament admin panel with dashboard stats, message inbox with unread badge
- Dark mode with localStorage persistence
- Dynamic accent color from admin settings
- Smooth scroll navigation with active section highlighting
- Skill bar animations on scroll intersection
- Filterable project grid with load-more
- Auto-scrolling testimonial carousel
- AJAX contact form with toast notifications
- Fully responsive at all breakpoints

## Setup

### Prerequisites

- PHP 8.3+
- Composer
- Node.js 18+
- MySQL

### Installation

```bash
# Clone the repository
git clone <repo-url> sudinportfolio
cd sudinportfolio

# Install PHP dependencies
composer install

# Copy environment file and generate app key
cp .env.example .env
php artisan key:generate

# Configure your database in .env
# DB_DATABASE=sudinportfolio
# DB_USERNAME=root
# DB_PASSWORD=

# Create the database
mysql -u root -e "CREATE DATABASE IF NOT EXISTS sudinportfolio;"

# Run migrations and seed sample data
php artisan migrate --seed

# Create storage symlink for file uploads
php artisan storage:link

# Install Node dependencies and build assets
npm install
npm run build

# Start the development server
php artisan serve
```

### Development

```bash
# Run with hot-reload (Vite dev server + Laravel)
composer dev
```

## Admin Panel

- **URL:** `http://localhost:8000/admin`
- **Email:** `admin@portfolio.test`
- **Password:** `password`

## Project Structure

```
app/
├── Filament/
│   ├── Resources/       # 11 Filament CRUD resources
│   └── Widgets/         # Dashboard stats widget
├── Http/Controllers/
│   ├── PortfolioController.php
│   └── ContactController.php
└── Models/              # 11 Eloquent models

database/
├── migrations/          # All table migrations
└── seeders/             # Realistic sample data

resources/
├── css/app.css          # Tailwind v4 config + Google Fonts
├── js/app.js            # Alpine.js setup
└── views/
    ├── layouts/app.blade.php
    ├── portfolio.blade.php
    └── sections/        # Individual section partials
```
