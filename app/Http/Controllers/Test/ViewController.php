<?php

namespace App\Http\Controllers\Test;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ViewController extends Controller
{
    //
    public function index()
    {
        $data = array(
         'key1' => 'value1',
         'key2' => array ('key2.1' => 'value2.1', 'key2.2' => 'value2.2')
        );
        return view('testing.index', $data);
    }
    
    public function template()
    {
        $bool = validateEmail('xx');
        $data = array();
        return view('testing.child', $data);
    }
}
