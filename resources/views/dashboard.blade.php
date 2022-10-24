<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <table class="table container-sm text-center">
                        <thead>
                            <tr>
                                <th>Número</th>
                                <th>Lugares</th>
                                <th>Status</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($mesas as $mesa)
                            <tr>
                                <td>{{$mesa->id}}</td>
                                <td>{{$mesa->lugares}}</td>
                                <td class="@if($mesa->status == "Ocupado")text-danger @endif text-success">{{$mesa->status}}</td>
                                <td>
                                        @if($mesa->status == "Disponivel")
                                        <a href="{{route('mesaChanged',$mesa->id)}}">
                                            <button class="btn btn-primary" data-bs-toggle="modal">Abrir Conta</button> </a>
                                        @else
                                        <button class="btn btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#staticBackdrop{{$mesa->id}}">Produtos</button>
                                        <button class="btn btn-info" data-bs-toggle="modal"
                                                data-bs-target="#modalFecharConta{{$mesa->id}}">Dividir Conta</button>
                                        <button class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#listarPessoasModal{{$mesa->id}}">Pagamento</button>
                                        @endif
                                </td>
                            </tr>
                            <!-- Modal -->
                            @endforeach
                        </tbody>
                    </table>

                    @foreach($mesas as $mesa)
                        <x-modal id="{{$mesa->id}}" :produtos="$produtos"/>
                        <x-modal-fechamento-conta id="{{$mesa->id}}"/>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    var myModal = document.getElementById('myModal')
    var myInput = document.getElementById('myInput')

    // myModal.addEventListener('shown.bs.modal', function () {
    //     myInput.focus()
    // })
</script>
