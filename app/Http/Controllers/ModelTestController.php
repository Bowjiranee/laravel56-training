<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Users as Users;// Users model
use App\SalaryClass as Salary;// Users model


class ModelTestController extends Controller
{
    public function index()
    {
        /*$users = Users::all();

        foreach ($users as $user) {
            echo $user->email;
        }*/
        
        //find phone where users_id = 1
        $phone = Users::find(1)->phone;
        
        echo $phone;
        exit;
        
        return "Method GET: Index ".env("APP_NAME");
    }


}
