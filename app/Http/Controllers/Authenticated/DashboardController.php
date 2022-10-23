<?php

namespace App\Http\Controllers\authenticated;

use App\Http\Controllers\Controller;
use App\Models\Comanda;
use App\Models\Mesa;
use App\Models\Produtos;
use App\Models\ProdutosComanda;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{

    public $mesaAtual;

    public function create(){
        $mesas = Mesa::all();
        $produtos = Produtos::all();
        return view('dashboard', ['mesas' => $mesas, 'produtos' => $produtos, 'totalConta' => 0]);
    }

    public function mesaChanged($id){
        $mesa = Mesa::findOrFail($id);
        if ($mesa->status == "Ocupado"){
            $mesa->status = "Disponivel";
        }else{
            $mesa->status = "Ocupado";
            $comanda = Comanda::create([
                'mesa_id' => $mesa->id,
                'valor' => 0,
            ]);
            event(new Registered($comanda));

            $produtos = Produtos::all();
            foreach ($produtos as $produto){
                $produtosComanda = ProdutosComanda::create([
                    'comanda_id' => $comanda->id,
                    'quantidade' => 0,
                    'produto_id' => $produto->id,
                ]);
                event(new Registered($produtosComanda));
            }
        }
        $mesa->update();

        return redirect('dashboard');
    }

    public function update(Request $request){
        $inputs = $request->all();
        $keys = array_keys($request->all());
        $produtosAtuais = $this->ultimaComanda($request->mesa_id);
        for ($i = 2; $i < count($keys) - 1; $i++) {
            $validator = Validator::make($request->all(), [
                $keys[$i] => 'required|integer|min:0|max:999',
            ]);

            if (!$validator->fails()) {
                $produto = $produtosAtuais[$i - 2];
                $produto->quantidade = $inputs[$keys[$i]];
                $produto->update();
            }else{
                break;
            }
        }
        return redirect('dashboard')->withErrors($validator);
    }

    public function ultimaComanda($id){
        $comandaid = Comanda::where('mesa_id', $id)->get();
        $comandaid = $comandaid[count($comandaid) - 1]['id'];
        $produtosAtuais = ProdutosComanda::where('comanda_id', $comandaid)->get();
        return $produtosAtuais;
    }

}
