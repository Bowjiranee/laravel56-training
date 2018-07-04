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
- [ติดตั้ง Wampp Server](http://www.wampserver.com/en/) ให้ใช้ PHP version 7.2.4+
  - phpmyadmin default user root password ไม่มี
- [ติดตั้ง Composer](https://getcomposer.org/download/) 
- ดึง laravel training project จาก github นี้
  - clone git ให้เรียบร้อย
  - แก้ไขไฟล์ .env-example.txt เป็น .env และให้แก้ไขในส่วน database connection ใช้ให้ตรงกับเครื่องเรา 
  - composer dump-autoload (Laravel uses composer's autoloader to know where to include all the libraries and files it relies on. This referenced in bootstrap/autoload.php)
  - php artisan migrate:refresh --seed
- เริ่มสร้าง laravel training project ใหม่ด้วยตนเอง
  ```
  composer create-project --prefer-dist laravel/laravel training
  ```
- Laravel Routing
  - php artisan route:list (เรียกดูรายการ Routing ทั้งหมด)
- Laravel (Controller)
  - php artisan make:controller Admin/PhotoController (สร้าง PhotoController อยู่ใน subfolder Admin) โดยจะได้ Code ตั้งต้นลักษณะนี้
  ```
  <?php

  namespace App\Http\Controllers\Admin;

  use Illuminate\Http\Request;
  use App\Http\Controllers\Controller;

  class PhotoController extends Controller
  {
      //
  }
  ```
- Laravel .env file (root path) ใช้เก็บ config ต่างๆที่เปลี่ยนไปตาม environment
  - php artisan env
  - php artisan key:generate
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
- Laravel Database Seeding ใช้สร้าง row เริ่มต้นใน table ต่างๆ เวลาจะ migration 
   - php artisan make:seeder UsersTableSeeder (สร้างไฟล์ seeder)
   - แก้ไขไฟล์ DatabaseSeeder ให้สั่งเรียก Seeder ทุกตัว ซึ่งตัวอย่างมีตัวเดียวคือ UsersTableSeeder
     ```
     class DatabaseSeeder extends Seeder
     {
      /**
       * Seed the application's database.
       *
       * @return void
       */
      public function run()
      {
           $this->call(UsersTableSeeder::class);
      }
     }
     ```
   - php artisan migrate:refresh --seed (ลบ all table และ re-run database migration แถมด้วยการสร้าง row เริ่มต้น)
   - php artisan db:seed --class=UsersTableSeeder (หากต้องการรันไฟล์ seeder เพียงแค่บางไฟล์)
- Laravel Eloquent (Model)
   - php artisan make:model Users (สร้างไฟล์ Users Model) (hasOne , hasMany)
   - ตัวอย่าง ถ้าเรากำหนดว่า User 1 คน มี Phone(เบอร์โทรศัพท์) 1 เบอร์ (one to one)
   
   ```
   class Users extends Model
  {
      /**
       * The table associated with the model.
       *
       * @var string
       */
      protected $table = 'users';

       public function phone()
      {
          return $this->hasOne('App\Phone');
      }
  }
   ```
   หากเป็น one to many
   ```
   return $this->hasMany('App\Phone');
   ```
   
- Laravel (View) (/resources/views/) .blade file
  เราจะใช้ [Laravel Helpers](https://laravel.com/docs/5.6/helpers) มาช่วยในการอ้างถึง path
  - asset() load resource(js,css,images,etc) in views
  ``` 
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
  ```
  - url() ไว้ทำลิ้งใน views
  ``` 
  <a href="{{ url('/home') }}">Home</a>
  ```
  - route() ไว้ทำลิ้งใน views เช่นกัน แต่ที่ Routing ต้องเซ็ท ->name() ให้เรียบร้อยถึงใช้งานได้
  ``` 
  <a href="{{ route('model') }}">Model</a>
  ```
  - ตัวอย่างโหลด View /testing/index.blade.php ใน Controllers
  ``` 
  $data = array();
  return view('testing.index', $data);
  ``` 
- [Laravel (View) Blade Template](https://laravel.com/docs/5.6/blade) การทำเป็นเท็มเพลต Header,Content,Footer
  - @yield ใช้กำหนดส่วนที่จะมา replace จาก child view
  - @section ใช้กำหนดส่วนที่ใช้ replace ใน @yield
- Laravel Custom Helpers
  1. สร้างโฟลเดอ /Helpers และสร้างไฟล์ helpers.php ใน /app/Helpers/ สมมติสร้าง method ใช้งานบ่อยๆเป็น validateEmail
  ```
  <?php
  function validateEmail($email) {
      return true;
  }
  ?>
  ```
  2. แก้ไขไฟล์ composer.json เพิ่มในส่วน "files" ดังนี้
  ```
  "autoload": {
    "classmap": [
        ...
    ],
    "psr-4": {
        "App\\": "app/"
    },
    "files": [
        "app/helpers.php" // <---- ADD THIS
    ]
   ```
   3. วิธีใช้งาน method validateEmail
   ```
   $bool = validateEmail('test@gmail.com');
   ```
},
- Laravel Authentication
- Laravel Unit Test
- Laravel Access Control Lists (ACL)

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
