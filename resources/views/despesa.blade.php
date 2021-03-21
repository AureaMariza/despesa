<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('DESPESAS') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    MINHAS DESPESAS 
                    <a href="{{ route('nova-despesa') }}" class="btn btn-sm btn-success">Nova despesa</a>
                </div>
            </div>
        </div>
        <div class="container">

            <table class="table table-hover"> 
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Data</th>
                <th>Anexo</th>
                <th>Valor</th>
                <th>Ações</th>
            </tr>
            </thead>
                @foreach($despesas as $user) 
                <tbody>
                <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->user->name}}</td>
                <td>{{$user->descricao}}</td>
                <td>{{$user->data}}</td>
                <td>{{$user->anexo}}</td>
                <td>{{$user->valor}}</td>
                <td>
                    <a href="" class="btn btn-sm btn-info">Editar</a>
                    <a href="" class="btn btn-sm btn-danger">Excluir</a>
                </td>
                </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</x-app-layout>

  
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



