<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RouteResourceController extends Controller
{
    public function index()
    {
        // GET request to index
        return "GET request to index";
    }

    public function create()
    {
        // get request to '/create'
        return "get request to '/create";
    }
    
    public function store()
    {
        // post request to '/create'
        return "post request to '/store";
    }
    
    public function show($id)
    {
        // get request to '/show'
        return "post request to show id = ".$id;
    }

  

}
