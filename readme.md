<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, yet powerful, providing tools needed for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of any modern web application framework, making it a breeze to get started learning the framework.

If you're not in the mood to read, [Laracasts](https://laracasts.com) contains over 1100 video tutorials on a range of topics including Laravel, modern PHP, unit testing, JavaScript, and more. Boost the skill level of yourself and your entire team by digging into our comprehensive video library.

## Agenda
- [ติดตั้ง Wampp Server](http://www.wampserver.com/en/) ให้ใช้ PHP version 7.2.4
- [ติดตั้ง Composer](https://getcomposer.org/download/) 
- Create laravel training project
  ```
  composer create-project --prefer-dist laravel/laravel training
  ```
- Laravel Routing
- Laravel (Controller)
- Laravel .env file (root path) ใช้เก็บ config ต่างๆที่เปลี่ยนไปตาม environment
- Laravel Database (MySQL MariaDB) database connection จะใช้ config ใน .env ไฟล์
  ```
  DB_CONNECTION=mysql
  DB_HOST=localhost
  DB_PORT=3307
  DB_DATABASE=laravel56_training
  DB_USERNAME=root
  DB_PASSWORD=
  ```
- Laravel migration (/database/migrations) ใช้ database connection ในการสร้าง,แก้ไข,ลบ,ย้อนกลับ database version control โดยไม่ต้องเข้า tool
   - php artisan make:migration {migration_file_name} --create={table_name} (สร้างไฟล์ database migration) 
   - php artisan migrate (รันไฟล์ database migration for first time)
   - php artisan migrate:refresh (ลบ all table และ re-run database migration)
- Laravel Seed
- Laravel Eloquent (Model)
- Laravel (View)
- Laravel (Helper/Utility) Functions
- Laravel Unit Test
- Laravel Access Control Lists (ACL)

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
