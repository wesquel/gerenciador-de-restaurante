<style>
    .btn-success{
        margin-top: 1em;
    }
    .total-p{
        margin: 10px;
    }
</style>

<div class="modal fade" id="modalFecharConta{{$id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Fechar Conta Mesa {{$id}}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="">
                    <div class="mb-3 text-center">
                        <label for="exampleFormControlInput1" class="form-label">Quantidade de pessoas</label>
                        <input id="inputQntdPessoas{{$id}}" value="{{$quantidadePessoas}}" type="number" class="form-control"
                               placeholder="1">
                        <a onclick="atualizarValor{{$id}}()" id="calcButton{{$id}}" href="#" role="button"
                           class="btn btn-secondary btn-success">Calcular</a>
                    </div>
                </form>
            </div>
            <hr>
            <p id="resultadoComanda{{$id}}" class="total-p">Total por Pessoa: R$ {{$valorTotal/$quantidadePessoas}}</p>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    const calc{{$id}} = document.getElementById('calcButton{{$id}}');
    const input{{$id}} = document.getElementById('inputQntdPessoas{{$id}}');
    const comandaResultado{{$id}} = document.getElementById('resultadoComanda{{$id}}');
    function atualizarValor{{$id}}() {
        comandaResultado{{$id}}.innerHTML = "Total por Pessoa: R$ "+({{$valorTotal}}/input{{$id}}.value).toFixed(2)
        console.log(comandaResultado{{$id}})
    }
    console.log({{$id}})
</script>
