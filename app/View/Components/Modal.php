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

    public function __construct($id, $produtos)
    {
        $this->id = $id;
        $this->produtos = $produtos;
        $this->produtosComanda = $this->ultimaComanda();
    }

    public function ultimaComanda(){
        $comandaid = Comanda::where('mesa_id', $this->id)->get();
        $comandaid = $comandaid[count($comandaid) - 1]['id'];
        $produtosAtuais = ProdutosComanda::where('comanda_id', $comandaid)->get();
        return $produtosAtuais;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modal');
    }
}
