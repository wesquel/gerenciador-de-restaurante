<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comanda;
use Illuminate\Http\Request;

class caixaController extends Controller
{
    //
    public function create(){

        $comandas = Comanda::all();

        return view('caixa', ['comandas' => $comandas ]);
    }
}
