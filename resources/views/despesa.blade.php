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
                    <p>
                        <a class="ml-3 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 no-underline" href="{{route('despesa.create')}}">{{ __('Cadastrar') }}</a>
                    </p>


                    <!-- <a href="{{ route('despesa.create') }}" class="btn btn-sm btn-success">Nova despesa</a> -->
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    ID
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Nome
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Descrição
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Data
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Valor
                                                </th>
                                                <th scope="col" class="relative px-6 py-3">
                                                    <span class="sr-only">Edit</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach($despesas as $user)
                                        <tbody class="text-gray-600 text-sm font-light">
                                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{$user->id}}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{$user->user->name}}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{$user->descricao}}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{$user->data->format('d/m/Y')}}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right">{{$user->valor}}</td>
                                                <td class="px-4 py-4 whitespace-nowrap text-center">
                                                    <a href="{{route('despesa.edit', $user->id)}}"><i class="far fa-edit fa-lg"></i></a>
                                                    &nbsp;
                                                    <a href="{{route('despesa.show', $user->id)}}"><i class="far fa-eye fa-lg"></i></a>
                                                    &nbsp;
                                                    <form action="{{route('despesa.destroy', $user->id)}}" method="post" style="display:inline">
                                                        @method('DELETE')
                                                        @csrf()
                                                        <button type="submit"><i class="far fa-trash-alt fa-lg;"></i></a>

                                                    </form>
                                                </td>
                                            </tr>
                                        </tbody>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>