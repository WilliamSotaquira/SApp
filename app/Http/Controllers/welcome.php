<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class welcome extends Controller
{
    public function products()
    {
        return view('products');
    }
    
    public function contacto()
    {
        return view('contacto');
    }
    public function about()
    {
        return view('about');
    }
}
