<?php

namespace App\Http\Controllers;

use App\Models\Mesa;
use Illuminate\Http\Request;

class indexController extends Controller
{
    //
    public function create(){
        return view('welcome');
    }
}
