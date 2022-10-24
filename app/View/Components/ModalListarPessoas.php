<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ModalListarPessoas extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $id;
    public $idComanda;

    public function __construct($id)
    {
        //
        $id = 0;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modal-listar-pessoas');
    }
}
