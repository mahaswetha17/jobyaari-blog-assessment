# JobYaari - Blog Management Portal

A lightweight, modern Laravel 11 application built with an administrative blog CRUD panel and a dynamic, public-facing frontend featuring live asynchronous filtering.

## 🚀 Features Implemented
- **Admin Authentication:** Powered via Laravel Breeze.
- **Full Blog CRUD Panel:** Secure administrative layout to create, edit, update, and delete mock updates.
- **Dynamic Frontend Pipeline:** Built with Tailwind CSS utilities.
- **Asynchronous Filtering Infrastructure:** Implements live keyword search, dynamic category dropdown filtering, and date picking without page reloads using jQuery AJAX.

## 🛠️ Installation & Setup Instructions

1. Clone the repository:
   ```bash
   git clone [https://github.com/YOUR_GITHUB_USERNAME/jobyaari-blog-assessment.git](https://github.com/YOUR_GITHUB_USERNAME/jobyaari-blog-assessment.git)
   cd jobyaari-blog-assessment

2. Install background package builds:

Bash
composer install
npm install

3. Set up the local environment profile configuration:

Bash
cp .env.example .env
php artisan key:generate

4. Build database tables and seed mock administrative user profile elements:

Bash
php artisan migrate --seed

5. Run the local engine servers:

Bash
php artisan serve
# In a separate terminal tab:
npm run dev

Administrative Access Credentials
Email: admin@jobyaari.com

Password: password123