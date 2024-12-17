1- Clone the Repository
git clone <repository-url>
cd <project-directory>
2-composer install
npm install && npm run dev
3-Duplicate .env.example to .env
4-create your database
and update the follwoing data :
DB_DATABASE=your_database_name
5-Run Migrations and Seeders
php artisan migrate 
php artisan db:seed --class=ProductSeeder
6- run project 
php artisan serve
7-Generate Application Key
php artisan key:generate



