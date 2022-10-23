<?php

namespace App\View\Components;

use App\Models\Comanda;
use Illuminate\View\Component;

class ModalFechamentoConta extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $id;
    public $idComanda;
    public $valorTotal;
    public $quantidadePessoas;

    public function __construct($id)
    {
        //
        $this->id = $id;
        $this->idComanda = $this->ultimaComadaMesa();
        $this->valorTotal = $this->valorComanda();
        $this->quantidadePessoas = 1;

    }

    public function ultimaComadaMesa(){
        $comandaid = Comanda::where('mesa_id', $this->id)->get();
        return $comandaid[count($comandaid) - 1]['id'];
    }

    public function valorComanda(){
        $comanda = Comanda::findOrFail($this->idComanda);
        return $comanda->valor;
    }

    public function recalcularValor(){

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modal-fechamento-conta');
    }
}


