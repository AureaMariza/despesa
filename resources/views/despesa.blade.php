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
                    <h3 class="font-semibold text-xl text-gray-800 leading-tight">MINHAS DESPESAS</h3>

                    
                    <!-- <a href="{{ route('despesa.create') }}" class="btn btn-sm btn-success">Nova despesa</a> -->
                </div>
            </div>
        </div>


        <div class="col-md-8 mb-6 mb-lg-0 col-sm-12" style="overflow-x:auto;">
                 <table class="table-auto">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Data</th>
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
                            <td>{{$user->data->format('d/m/Y')}}</td>
                            <td>{{$user->valor}}</td>
                            <td>
                                <a href="{{route('despesa.edit', $user->id)}}" class="btn btn-sm btn-info">Editar</a>
                            </td>
                            <td> <a href="{{route('despesa.show', $user->id)}}" class="btn btn-sm btn-info">ver</a></td>
                            <td>
                                <form action="{{route('despesa.destroy', $user->id)}}" method="post">
                                    @method('DELETE')
                                    @csrf()
                                    <button type="submit" class="btn btn-sm btn-danger">Excluir</a>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</x-app-layout>