<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Caixa') }}
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
                            <th>Mesa</th>
                            <th>Produto</th>
                            <th>Quantidade</th>
                            <th>Valor</th>
                            <th>Data da Transação</th>
                        </tr>
                        </thead>
                        <tbody>

                        @for($i = 0; $i < count($produtos); $i++)
                            <tr>
                                <td>
                                    {{$produtos[$i]['mesa_id']}}
                                </td>
                                <td>
                                    {{$produtos[$i]['nome']}}
                                </td>
                                <td>
                                    {{$produtos[$i]['quantidade']}}
                                </td>
                                <td>
                                    {{$produtos[$i]['valor']}}
                                </td>
                                <td>
                                    {{$produtos[$i]['data_transacao']}}
                                </td>
                            </tr>
                        @endfor
                        </tbody>
                    </table>
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
