<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comanda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class caixaController extends Controller
{
    //


    public function create(){
        if (Auth::user()->isAdmin != 1){
            return route('dashboard');
        }
        $comandas = Comanda::all();

        return view('caixa', ['comandas' => $comandas ]);
    }
}
