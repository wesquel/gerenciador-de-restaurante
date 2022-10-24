<div class="modal fade" id="listarPessoasModal{{$id}}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Pagamento Mesa {{$id}}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{route('fechar.conta', ['mesa_id' => $id, 'qntdPessoas' => $qntdPessoas, 'valorTotal' => $valorTotal])}}">
            <div class="modal-body">
                    @csrf
                    @method('PUT')
                    @for ($i = 0; $i < $qntdPessoas; $i++)
                        <div>
                            @if($i > 0)
                                <p style="margin-top: 0.5em">Forma de pagamento da pessoa {{$i+1}}:</p>
                            @else
                                <p>Forma de pagamento da pessoa {{$i+1}}:</p>
                            @endif
                            <select name="mesa{{$id}}Pessoa{{$i}}" class="form-select form-select-sm" aria-label=".form-select-sm example">
                                <option value="dinheiro">Dinheiro</option>
                                <option value="debito">Débito</option>
                                <option value="credito">Crédito</option>
                                <option value="pix">Pix</option>
                            </select>
                        </div>
                    @endfor
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" data-bs-toggle="modal">Fazer Pagamento</button>
            </div>
            </form>
        </div>
    </div>
</div>
