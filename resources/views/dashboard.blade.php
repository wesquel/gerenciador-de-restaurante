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
                    <table class="table container-sm">
                        <thead>
                            <tr>
                                <th>Número</th>
                                <th>Lugares</th>
                                <th>Status</th>
                                <th>Selecione</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($mesas as $mesa)
                            <tr>
                                <td>{{$mesa->id}}</td>
                                <td>{{$mesa->lugares}}</td>
                                <td class="@if($mesa->status == "Ocupado")text-danger @endif text-success">{{$mesa->status}}</td>
                                <td><button class="btn btn-success">Selecionar</button></td>
                            </tr>
                            @endforeach
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

    myModal.addEventListener('shown.bs.modal', function () {
        myInput.focus()
    })
</script>
