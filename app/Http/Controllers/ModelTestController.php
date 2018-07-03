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
        
        //find all user where salary_class = 1
        $salary = Salary::find(1)->user;
        
        echo $salary;
        exit;
        
        return "Method GET: Index ".env("APP_NAME");
    }


}
