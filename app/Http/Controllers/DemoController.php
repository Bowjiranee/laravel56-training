<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BladeExport;
use LaravelQRCode\Facades\QRCode;

class DemoController extends Controller
{
    public function index()
    {
        return "Method GET: Index ".env("APP_NAME");
    }

    public function demotwo()
    {
        return "Method POST: demotwo";
    }

    public function demothree()
    {
        return "Method GET, POST : demothree";
    }

    public function demofour()
    {
        return "Method GET, POST, PUT/PATCH, DELETE : demofour";
    }
    
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
    
    public function testqr()
    {
        return response(QRCode::text('QR Code Generator for Laravel!')->png())->header('Content-Type', 'image/png');  
    }

}
