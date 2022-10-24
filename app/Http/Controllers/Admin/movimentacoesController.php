<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comanda;
use App\Models\Produtos;
use App\Models\ProdutosComanda;
use Illuminate\Http\Request;

class movimentacoesController extends Controller
{
    //
    public function create(){
        $produtos = $this->createArray();

        return view('movimentacoes', ['produtos' => $produtos]);
    }

    public function createArray(){
        $produtos = ProdutosComanda::all();
        $arrayTotal = [];
        foreach ($produtos as $produto){
            if ($produto->quantidade > 0){
                $arrayItem = [];
                $comandaid = $produto->comanda_id;
                $produtoid = $produto->produto_id;
                $comanda = Comanda::findOrFail($comandaid);
                $produtoData = Produtos::findOrFail($produtoid);
                $produtoNome = $produtoData->nome;
                $produtoValor = $produtoData->valor;
                $arrayItem = [
                    'mesa_id' => $comanda->mesa_id,
                    'nome' => $produtoNome,
                    'data_transacao' => $produto->updated_at,
                    'quantidade' => $produto->quantidade,
                    'valor' => ($produtoValor * $produto->quantidade),
                ];
                $arrayTotal[] = $arrayItem;
            }
        }
        return $arrayTotal;
    }
}
