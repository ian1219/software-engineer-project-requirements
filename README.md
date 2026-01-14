Laravel Project: Software Engineer Project Requirements

This is a Laravel web application using Laravel, MySQL, and Bootstrap. Follow the instructions below to run it locally.

Requirements

PHP >= 8.0

Composer

MySQL / MariaDB

Git

Setup Instructions

Clone the repository

git clone https://github.com/ianProgrammer12/software-engineer-project-requirements.git
cd software-engineer-project-requirements


Install PHP dependencies

composer install


Copy .env file and configure database

cp .env.example .env


Create a MySQL database (e.g., laravel_project_db)

Update .env with your database credentials:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_project_db
DB_USERNAME=root
DB_PASSWORD=your_password


Generate application key

php artisan key:generate


Run database migrations

php artisan migrate


Start the development server

php artisan serve
