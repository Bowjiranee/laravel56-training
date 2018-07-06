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
- [Artisan Command](https://laravel.com/docs/5.6/artisan) (ชุดคำสั่งบน command line ที่ Laravel ทำมาเพื่อช่วยเราในการทำโปรเจ็คด้วย Laravel)
  - php artisan list (เรียกดูชุดคำสั่งทั้งหมด)
- [Laravel Routing](https://laravel.com/docs/5.6/routing)
  - php artisan route:list (เรียกดูรายการ Routing ทั้งหมด)
  
  ```
  //The Route::controller method is deprecated since Laravel 5.3.

  Route::get('/route-basic', 'DemoController@index');
  Route::post('/route-basic', 'DemoController@testpost');

  //https://laravel.com/docs/5.6/routing#named-routes for route('model') in view
  Route::get('/model', 'ModelTestController@index')->name('model');

  Route::resource('/route-resource','RouteResourceController');
  
  
  //subfolder Test controller
  Route::get('/view', 'Test\ViewController@index');
  Route::get('/template', 'Test\ViewController@template');
  ```
- Laravel (Controller) (app/Http/Controllers)
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
   
   กลับกันใน Class Phone ต้องทำ Relation กลับมาโดยจะใช้ belongsTo และ ->withDefault() ใช้สำหรับให้ return empty App\User หาก relation ไม่พบ
   ```
   <?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;

    class Phone extends Model
    {
        protected $table = 'phone';

        /**
         * Get the user that owns the phone.
         */
        public function user()
        {
            return $this->belongsTo('App\Users')->withDefault();
        }

    }
   ```
   
   วิธีหาเบอร์โทรศัพท์ ของ users_id =1
   ```
   //find phone where users_id = 1
   $phone = Users::find(1)->phone;
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
- [Laravel Session](https://laravel.com/docs/5.6/session)
- [Laravel Middleware](https://laravel.com/docs/5.6/middleware) ใช้ทำ Filter HTTP requests ตัวอย่างเช่น URL ที่เข้าได้เฉพาะ User ที่ Login หรือหลังจาก Login แล้วเราสามารถให้มี URL ที่เข้าได้เฉพาะผู้ชาย หรือ เฉพาะคนที่มีอายุ 18+ เป็นต้น
### Laravel Authentication 
  เราสามารถใช้ Auth Facades ในการจัดการเรื่อง Authentication โดยใช้ Auth::attempt($array) ตรวจสอบการ login โดย default จะนำค่า $array ไปตรวจสอบ ในตัวอย่างจะนำค่า email ไปหาใน $table ซึ่งสามารถ config $table ได้ที่ไฟล์ 
  ```
  /config/auth.php
  ```
  ```
  'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\User::class,
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],
  ```
  ตัวอย่างการสร้าง Controller ที่ใช้ Auth::attempt
  ```
  <?php

  namespace App\Http\Controllers;

  use Illuminate\Http\Request;
  use Illuminate\Support\Facades\Auth;
  class LoginController extends Controller
  {
      /**
       * Handle an authentication attempt.
       *
       * @param  \Illuminate\Http\Request $request
       *
       * @return Response
       */
      public function authenticate(Request $request)
      {

          $credentials = $request->only('email', 'password');

          if (Auth::attempt($credentials)) {
              // Authentication passed...
              // Get the currently authenticated user...
              $user = Auth::user();
              //return redirect()->intended('dashboard');
          }else{
              echo 'error';
          }
      }

      //assume this method is loginform
      public function index()
      {
          echo 'redirect to loginform (required login first)';
          /*$data = array();
          return view('testing.index', $data);
          */
      }
  }
  ```
  หลังจาก Auth::attempt สำเร็จ ข้อมูลการ Login จะถูกเก็บลง Laravel Session
  
  วิธีทำ Route group ที่ต้องผ่านการ Login ก่อนเท่านั้น จะใช้ความรู้เรื่อง Laravel Routing + Laravel Middleware ร่วมกัน สมมติว่าเป็นภายใต้ /member ให้ทำการใส่ middleware('auth') โดยหาก Login แล้วเวลาเราเข้า /member/ หรือ /member/profile จะ echo ค่าดังกล่าว
 ```
    Route::prefix('member')->middleware('auth')->group(function () {
      //user can access this route when Auth::attempt is passed
      Route::get('/', function () {
          echo '/member/';
          exit;
      });

      Route::get('profile', function () {
          echo '/member/profile';
          exit;
      });
  });
  ```
  แต่หากยังไม่ Login เราสามารถดัก Exception ได้ที่ /app/Exceptions/Handler.php โดยเพิ่ม method unautenticated เข้าไปดังนี้
  ```
	  protected function unauthenticated($request, AuthenticationException $exception)
	    {
		//when Auth::attempt not passed 
		//for api return json 401
		//for web redirect to route as you want
		return $request->expectsJson()
			    ? response()->json(['message' => $exception->getMessage()], 401)
			    : redirect()->guest(route('loginform'));
	    }
  ```
  หากเรียกจาก client ที่มีการ set header json (API) ระบบจะรีเทิน json 401 แต่นอกจากนี้ระบบจะพาไปหน้า loginform เพื่อให้ Login ใหม่เป็นต้น
  ### Laravel Unit Test (/tests)
  Unit test – เป็นการทดสอบในระดับ function call เพื่อเป็นการยืนยันการทำงานระดับย่อยที่สุดว่าทำงานได้ถูกต้อง เป็นการทดสอบโดยนักเขียนโปรแกรมผู้เขียนโค้ด

  ประโยชน์ของ Unit test
   - ช่วยป้องกันเรื่องการ Deployment ที่มีบางสิ่งผิดพลาด
   - Developer ที่มารับงานต่อ สามารถทำความเข้าใจโค้ดได้ง่ายขึ้น โดยการรัน unit test ที่เขียนไว้ ตรวจสอบได้ว่าการแก้ไขโค้ด มีอะไรผิดพลาดหรือไม่
  
  โดย Laravel จะมีไฟล์ phpunit.xml เป็นชุด config ของการเทส 
  
  คำสั่งรันเทส (หากไม่ map environment variable ใน window)
  ```
  vendor\bin\phpunit
  ```
  ### Mockery 
  Mockery ใช้สำหรับจำลอง(mock) object ใน unit testing ยกตัวอย่างเช่น การ mock object ในการต่อ database , object ของคลาสต่างๆ
  
  ติดตั้ง mockery
  ```
  composer require mockery/mockery --dev
  ```
  ตัวอย่างการใช้ mockery mock Facade object เช่น Auth Facade โดยจะ mock method Auth::attempt($array) ให้ return true
  ```
  //login success with mock db
    public function testLoginSuccess()
    {
        $credential = [
            'email' => 'kongarn@gmail.com',
            'password' => '11111111'
        ];
        
        Auth::shouldReceive('attempt')->once()->withAnyArgs()->andReturn(true);
        Auth::shouldReceive('user')->once()->withAnyArgs()->andReturn(true);

        $response = $this->post('/login',$credential);

        $response->assertRedirect('/member');
    }
   ```
  
  
  ### Code Coverage
  PHPUnit ในบางครั้งเราอาจเขียน unit test ซ้ำๆที่เดิม ไม่มีประโยชน์ ตัวนี้จะมาช่วยตรวจสอบ Line , Method ต่างๆว่าเราเทสผ่านบรรทัดไหนบ้าง คิดเป็นกี่ % ซึ่งเราควรเขียน unit test ให้วิ่งผ่านทุกๆจุดของโปรแกรมของเรานั่นเอง
  
  ติดตั้ง phpunit code coverage
  ```
  composer require phpunit/php-code-coverage --dev
  ```
  phpunit code coverage จะใช้ xedug ในการสร้าง report ดังนั้นให้เราตรวจสอบ xdebug extension ใน php.ini หากยังไม่มีให้ใส่ตามนี้
  ```
  [xdebug]
  zend_extension="c:/wamp_new/bin/php/php7.1.16/zend_ext/php_xdebug-2.6.0-7.1-vc14.dll"
  xdebug.remote_enable = off
  xdebug.profiler_enable = off
  xdebug.profiler_enable_trigger = Off
  xdebug.profiler_output_name = cachegrind.out.%t.%p
  xdebug.profiler_output_dir ="c:/wamp_new/tmp"
  xdebug.show_local_vars=0
  ```
  
  ที่ไฟล์ phpunit.xml ใส่คำสั่งเพื่อให้สร้าง report phpunit code coverage
  ```
  <logging>
		<log type="coverage-html" target="./report" lowUpperBound="50" highLowerBound="80" />
	</logging>
  ```
  
  รันเทสอีกครั้ง
  ``` 
  vendor\bin\phpunit
  ```
  
  โดยตัวอย่างนี้จะสร้าง report ที่ folder /report/index.html เมื่อเปิดแล้วจะแสดงดังภาพ
  
  ![alt text](http://kongarn.com/images/laravel56-phpunit-code-coverage.jpg)
  
  
  ตัวอย่างการเขียน /test/Feature/ExampleTest.php โดยมีตัวอย่างการ assertion ที่ใช้บ่อย
  ```
	  <?php

	namespace Tests\Feature;

	use Tests\TestCase;
	use Illuminate\Foundation\Testing\RefreshDatabase;

	class ExampleTest extends TestCase
	{

	    //https://laravel.com/docs/5.6/http-tests#available-assertions
	    /**
	     * A basic test example.
	     *
	     * @return void
	     */
	    public function testBasicTest()
	    {
		//httpTest
		$response = $this->get('/');

		$response->assertStatus(200);
	    }

	    public function testLoginSuccess()
	    {
		$credential = [
		    'email' => 'kongarn@gmail.com',
		    'password' => '11111111'
		];

		$response = $this->post('/login',$credential);

		$response->assertRedirect('/member');
		$this->assertAuthenticated($guard = null);
	    }

	    public function testLoginFail()
	    {
		$credential = [
		    'email' => 'user@ad.com',
		    'password' => 'incorrectpass'
		];

		$response = $this->post('/login',$credential);

		$response->assertRedirect('/loginform');
		$this->assertGuest($guard = null);
	    }

	    public function testLoginFormPage()
	    {
		$response = $this->get('/loginform');

		$response->assertSeeText("required");
	    }

	    public function testViewHasDataKey()
	    {
		$response = $this->get('/view');

		$response->assertViewHas("key1");
	    }

	    public function testViewHasDataKeyAndValue()
	    {
		$response = $this->get('/view');

		$response->assertViewHas("key1",'value1');
	    }

	    public function testViewHasDataKeyAndValueArray()
	    {
		$response = $this->get('/view');

		$response->assertViewHas("key2",array ('key2.1' => 'value2.1', 'key2.2' => 'value2.2'));
	    }

	    public function testViewMissingDataKey()
	    {
		$response = $this->get('/view');

		$response->assertViewMissing("key3");
	    }

	}
```
  

### Excel Example
ติดตั้ง Maatwebsite\Excel 
   ```
	composer require mattwebsite/excel
   ```
สร้าง excel template ใน /resources/views/excel/template.blade.php
```
	<table>
	    <thead>
	    <tr>
		@foreach($data[0] as $key => $value)
		    <th>{{ ucfirst($key) }}</th>
		@endforeach
	    </tr>
	    </thead>
	    <tbody>
	    @foreach($data as $row)
		<tr>
		@foreach ($row as $value)
		    <td>{{ $value }}</td>
		@endforeach
		</tr>
	    @endforeach
	    </tbody>
	</table>
```

สร้างไฟล์ BladeExport สำหรับโหลด excel template (/app/Exports/BladeExport.php)
```
<?php
namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class BladeExport implements FromView
{

    private $data;
 
    public function __construct($data)
    {
        $this->data = $data;
    }
 
    public function view(): View
    {
        return view('/excel/template', [
            'data' => $this->data
        ]);
    }
}
?>
```
วิธีใช้งาน export excel download ใน Controllers
``` 
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Maatwebsite\Excel\Facades\Excel;
    use App\Exports\BladeExport;
    class DemoController extends Controller
    {   
	public function testexcel(){

	$data = [
	    [
		'name' => 'Povilas',
		'surname' => 'Korop',
		'email' => 'povilas@laraveldaily.com',
		'twitter' => '@povilaskorop'
	    ],
	    [
		'name' => 'Taylor',
		'surname' => 'Otwell',
		'email' => 'taylor@laravel.com',
		'twitter' => '@taylorotwell'
	    ]
	];
	return Excel::download(new BladeExport($data), 'invoices.xlsx');
	}
    }
```
### QRCode Example
ติดตั้ง werneckbh\laravel-qr-code 
```
   composer require werneckbh\laravel-qr-code
```
วิธีใช้งาน
```
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use LaravelQRCode\Facades\QRCode;
    class DemoController extends Controller
    { 
	   public function testqr()
	    {
		return response(QRCode::text('QR Code Generator for Laravel!')->png())->header('Content-Type', 'image/png');  
	    }
    }
```


- Laravel Access Control Lists (ACL)

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
