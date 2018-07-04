<?php

namespace App\Http\Controllers\Test;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ViewController extends Controller
{
    //
    public function index()
    {
        $data = array();
        return view('testing.index', $data);
    }
}
