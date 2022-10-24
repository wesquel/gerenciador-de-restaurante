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
    public $qntdPessoas;
    public $valorTotal;

    public function __construct($id, $qntdPessoas, $valorTotal)
    {
        //
        $this->id = $id;
        $this->qntdPessoas = $qntdPessoas;
        $this->valorTotal = $valorTotal;
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
