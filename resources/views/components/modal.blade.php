<style>
    .centralizer-button{
        margin-top: 1em;
        margin-left: 45%;
    }

    .qntInput {
        width: 1em !important;
        height: 2em;
        border-radius: 10px;
    }

    input[type=number]::-webkit-inner-spin-button {
        -webkit-appearance: none;

    }
</style>

<div class="modal fade" id="staticBackdrop{{$id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Mesa {{$id}}</h1>
                <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            <form method="POST" class="form-control" action="{{ route('update.produtos', ['mesa_id' => $id]) }}">
                @csrf
                @method('PUT')
                <div class="text-center">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Quantidade</th>
                            <th scope="col">Valor un.</th>
                            <th scope="col">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($produtos as $produto)
                            @foreach($produtosComanda as $produtoComanda)
                                @if($produto->id == $produtoComanda->produto_id)
                                    <tr>
                                        <td>{{$produto->nome}}</td>
                                        <td>
                                            <div class="input-group mb1">
                                                <input name="inputQtndMesa{{$id}}produto{{$produto->id}}" type="number" value="{{$produtoComanda->quantidade}}"
                                                       class="form-control qntInput heightButton"/>
                                            </div>
                                            @error("inputQtndMesa{{$id}}produto{{$produto->id}}")
                                                <div class="alert alert-danger">{{ "erros" }}</div>
                                            @enderror
                                        </td>
                                        <td>
                                            <p>R$ {{$produto->valor}}</p>
                                        </td>
                                        <td>
                                            <p>R$ {{$produto->valor * $produtoComanda->quantidade}}</p>
                                            {{$somaTotal($produto->valor * $produtoComanda->quantidade)}}
                                        </td>
                                    </tr>
                                @endif
                           @endforeach
                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>R$ {{$totalConta = $getTotal()}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-warning" type="submit">Atualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
