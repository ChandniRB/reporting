# Reporting for iGOT

## Setup on Windows
1. Install XAMPP 8.2.4 (PHP 8.2.4)
1. Install PostgreSQL 15.2 with pgAdmin 4
1. Create database named "igot_reporting" and restore the database backup
1. Edit file app/Config/Database.php to update the database name
1. Install Composer
1. In php.ini uncomment "extension=intl", "extension=gd", "extension=pgsql", "extension=pdo_pgsql", "extension=zip" and restart XAMPP
1. Copy this souce code inside htdocs dirctory of XAMPP
1. Run "composer install"
1. Run "php spark serve"
1. Open URL http://localhost:8080/login in browser