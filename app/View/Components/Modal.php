<?php

namespace App\View\Components;

use App\Models\Comanda;
use App\Models\ProdutosComanda;
use Illuminate\View\Component;

class Modal extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $id;
    public $produtos;
    public $produtosComanda;
    public $total;

    public function __construct($id, $produtos)
    {
        $this->id = $id;
        $this->produtos = $produtos;
        $this->produtosComanda = $this->produtosMesa();
        $this->somaTotal(0);
    }

    public function produtosMesa(){
        $comandaid = $this->ultimaComadaMesa();
        $produtosAtuais = ProdutosComanda::where('comanda_id', $comandaid)->get();
        return $produtosAtuais;
    }

    public function ultimaComadaMesa(){
        $comandaid = Comanda::where('mesa_id', $this->id)->get();
        return $comandaid[count($comandaid) - 1]['id'];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */

    public function somaTotal($valor){
        $this->total += $valor;
        return null;
    }

    public function getTotal(){
        $comandaId = $this->ultimaComadaMesa();
        $comanda = Comanda::findOrFail($comandaId);
        $comanda->valor = floatval($this->total);
        $comanda->update();
        return $this->total;
    }

    public function render()
    {
        return view('components.modal');
    }
}
