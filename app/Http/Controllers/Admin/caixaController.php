<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comanda;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class caixaController extends Controller
{
    //
    public function create(Request $request){
        if (Auth::user()->isAdmin != 1){
            return redirect(route('dashboard'));
        }
        $comandas = $this->getListaCaixa($request->all());

        return view('caixa', ['comandas' => $comandas ]);
    }

    public function getListaCaixa($request){
        $comandas = Comanda::all();
        try {
            $filtro = $request['filtro'];
        }catch (Exception $e){
            return $comandas;
        }
        $arrayAll = [];
        if ($filtro == 'mesa'){
            foreach ($comandas as $comanda){
                if(array_key_exists($comanda->mesa_id, $arrayAll)){
                    $arrayAll[$comanda->mesa_id] =
                        [
                            'mesa_id' => $comanda->mesa_id,
                            'valor' => $comanda->valor + $arrayAll[$comanda->mesa_id]['valor'],
                            'updated_at' => $comanda->updated_at
                        ];
                }else{
                    $arrayAll[$comanda->mesa_id] =
                        [
                            'mesa_id' => $comanda->mesa_id,
                            'valor' => $comanda->valor,
                            'updated_at' => $comanda->updated_at
                        ];
                }
            }
            return $arrayAll;
        }
        return $comandas;
    }

}
