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

    public function __construct(){
        $produtos = array(
            'água' => '3.69',
            'cerveja' => '3.80',
            'refrigerante' => '8.99',
            'PF' => '22.00',
            'brigadeiro' => '2.5',
        );

        $mesa = Mesa::All();
        if (count($mesa) == 0){
            for ($i = 0; $i < 5; $i++){
                $mesa = Mesa::create([
                    'id' => $i+1,
                    'numero' => $i+1,
                    'lugares' => '4',
                    'status' =>'Disponivel',
                ]);

                $comanda = Comanda::create([
                    'id' => $i+1,
                    'mesa_id' => $i+1,
                    'valor' => 0,
                    'qntdPessoas' => 1,
                    'formaDePagameto' => ''
                ]);

                event(new Registered($mesa));
                event(new Registered($comanda));
            }
            $contador = 0;

            foreach (array_keys($produtos) as $produto){
                $contador = $contador + 1;
                $produtoUn = Produtos::create([
                    'id' => $contador,
                    'nome' => $produto,
                    'valor' => $produtos[$produto],
                ]);
                event(new Registered($produtoUn));
            }

        };
    }

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
                'qntdPessoas' => 1,
                'formaDePagameto' => ''
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

    public function atualizarQntdPessoas(Request $request){
        $validator = Validator::make($request->all(), [
            'quantidadePessoas' => 'required|integer|min:0|max:4',
        ]);
        if (!$validator->fails()) {
            $comanda = $this->ultimaComadaMesa($request->mesa_id);
            $comanda = Comanda::findOrFail($comanda);
            $comanda->qntdPessoas = $request->quantidadePessoas;
            $comanda->update();
        }
        return redirect('dashboard')->withErrors($validator);
    }


    public function update(Request $request){
        $inputs = $request->all();
        $keys = array_keys($request->all());
        $produtosAtuais = $this->produtosComanda($request->mesa_id);
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

    public function ultimaComadaMesa($id){
        $comandaid = Comanda::where('mesa_id', $id)->get();
        return $comandaid[count($comandaid) - 1]['id'];
    }

    public function produtosComanda($id){
        $comandaid = Comanda::where('mesa_id', $id)->get();
        $comandaid = $comandaid[count($comandaid) - 1]['id'];
        $produtosAtuais = ProdutosComanda::where('comanda_id', $comandaid)->get();
        return $produtosAtuais;
    }

    public function fecharConta(Request $request){
        $inputs = $request->all();
        $keys = array_keys($inputs);
        $array = array();
        for ($i = 2; $i < $request->qntdPessoas+2; $i++){
            $array[] = $inputs[$keys[$i]];
        }
        $comandaid = $this->ultimaComadaMesa($request->mesa_id);
        $comanda = Comanda::findOrFail($comandaid);
        $comanda->formaDePagameto = $array;
        $comanda->update();
        return $this->mesaChanged($request->mesa_id);
    }

}
