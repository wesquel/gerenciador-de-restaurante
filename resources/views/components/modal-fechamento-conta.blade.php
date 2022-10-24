<style>
    .btn-success{
        margin-top: 1em;
    }
    .total-p{
        margin: 10px;
    }

    button[type="submit"]{
        color: black;
    }
</style>

<div class="modal fade" id="modalFecharConta{{$id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Fechar Conta Mesa {{$id}}</h1>
                <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            <form method="POST" action="{{route('update.pessoas', ['mesa_id' => $id])}}">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <h3>Número de pessoas para dividir a conta:</h3>
                    <div class="mb-3 text-center">
                        <input name="quantidadePessoas" id="inputQntdPessoas{{$id}}" value="{{$quantidadePessoas}}" type="number" class="form-control"
                               placeholder="1">
                        <a onclick="atualizarValor{{$id}}()" id="calcButton{{$id}}" role="button"
                           class="btn btn-secondary btn-success">Calcular</a>
                    </div>
                </div>
                <hr>
                <p id="qntdComanda{{$id}}" class="total-p">Total de Pessoas: {{$quantidadePessoas}}</p>
                <p id="resultadoComanda{{$id}}" class="total-p">Total por Pessoa: R$ {{$valorTotal/$quantidadePessoas}}</p>
                <p id="resultadoComanda{{$id}}" class="total-p">Total: R$ {{$valorTotal}}</p>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Ir para o Pagemento</button>
                </div>
            </form>

        </div>
    </div>
</div>

<script>
    const calc{{$id}} = document.getElementById('calcButton{{$id}}');
    const input{{$id}} = document.getElementById('inputQntdPessoas{{$id}}');
    const comandaResultado{{$id}} = document.getElementById('resultadoComanda{{$id}}');
    const qntdComanda{{$id}} = document.getElementById('qntdComanda{{$id}}');
    function atualizarValor{{$id}}() {
        qntdComanda{{$id}}.innerHTML = "Total de Pessoas: "+input{{$id}}.value
        comandaResultado{{$id}}.innerHTML = "Total por Pessoa: R$ "+({{$valorTotal}}/input{{$id}}.value).toFixed(2)
        console.log(comandaResultado{{$id}})
    }
</script>
