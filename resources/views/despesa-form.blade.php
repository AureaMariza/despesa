<x-app-layout>

  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('DESPESAS') }}
    </h2>
  </x-slot>

  <div class="py-12">
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
  </div>
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
      <div class="p-6 bg-white border-b border-gray-200">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Nova despesa</h2>
      </div>
      <div class="flex flex-col">
        @if(empty($despesa->id))
        <form action="{{route('despesa.store')}}" method="post" enctype="multipart/form-data" onsubmit="return preSubmit()">
          @else
          <form action="{{route('despesa.update', ['despesa' => $despesa])}}" method="post" enctype="multipart/form-data" onsubmit="return preSubmit()">
            @method('PUT')
            @endif
            @csrf


            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
              <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-600">
                  <div class="px-6 py-2 mb-2 mt-4 mb-8">
                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                      <label for="descricao">Descrição:</label>
                      <input {{ (($pode_alterar ?? true) == false ? "readonly='readonly'": "")  }}type="text" class="form-control mt-1 block w-full" id="descricao" value="{{$despesa->descricao}}" placeholder="Entre com a descrição" name="descricao" required>
                    </div>
                  </div>
                  <div class="px-6 py-2 mb-2 mt-4 mb-8">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                      <label for="Data">Data </label>
                      <input {{ (($pode_alterar ?? true) == false ? "readonly='readonly'": "")  }} type="date" class="form-control mt-1 block w-full" id="data" value="{{empty($despesa->data) ? '' : $despesa->data->format('Y-m-d')}}" placeholder="Entre com a data" name="data" required>
                    </div>
                  </div>
                  <div class="px-6 py-2 mb-2 mt-4 mb-8">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                      <label for="valor">Valor </label>
                      <input data-thousands="." data-decimal="," {{ (($pode_alterar ?? true) == false ? "disabled='disabled'": "")  }} type="text" class="form-control mt-1" value="{{number_format($despesa->valor ?? 0, 2, ',', '.')}}" placeholder="entre com o valor da despesa" name="valor"  id="valor" required >

                    </div>
                  </div>
                  <div class="px-6 py-2 mb-2 mt-4 mb-8">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                      <label for="user_id">Usuário</label>
                      <select name="user_id" class="custom-select" {{ (($pode_alterar ?? true) == false ? "disabled='disabled'": "")  }}>
                        <option value="">Selecione</option>
                        @foreach ($users ?? [] as $user)
                        <option {{($user->id == ($despesa->user->id ?? null)) ? "selected" : ""}} value="{{ $user->id }}" required>{{$user->name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div><br>
                  <div class="px-6 py-2 mb-2 mt-4 mb-8">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                      @if (empty($despesa->id))
                      <label for="anexo">Imagem </label>
                      <input id="anexo" name="anexo" class="input-file" type="file" required><br><br>
                      @else

                      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-2">
                        <img src="{{ asset('storage/'.$despesa->anexo) }}" class="input-file" style="width:200px; height: auto;" />
                      </div>
                      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-2">
                        <span>Substituir Imagem: </span>&nbsp;<input id="anexo" name="anexo" class="input-file" type="file" {{ ($pode_alterar == false ? "disabled='disabled'": "")  }} />

                      </div>
                      @endif
                    </div>
                  </div>
                  <div class="px-6 py-2 mb-2 mt-4 mb-8">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                      <p>
                        @if(empty($despesa->id))
                        <button tupe="submit" class="ml-3 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 no-underline" href="{{route('despesa.create')}}">{{ __('Cadastrar') }}</button>
                        @elseif ($pode_alterar)
                        <button type="submit" class="ml-3 inline-flex items-center px-4 py-2 bg-yellow-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-yellow-500 disabled:opacity-25 transition ease-in-out duration-150 no-underline">Alterar</button>
                        @endif
                        <a class="ml-3 inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-blue-500 disabled:opacity-25 transition ease-in-out duration-150 no-underline" href="{{ route('despesa.index') }}">Voltar</a>
                      </p>
                    </div>
                  </div>

          </form>
      </div>
    </div>
  </div>
</x-app-layout>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js" integrity="sha512-Rdk63VC+1UYzGSgd3u2iadi0joUrcwX0IWp2rTh6KXFoAmgOjRS99Vynz1lJPT8dLjvo6JZOqpAHJyfCEZ5KoA==" crossorigin="anonymous"></script>
<script>
  $(function() {
    jQuery('#valor').maskMoney();
  })
</script>
<script>
  function preSubmit() {
    let valor = $("#valor").val()
    valor = parseInt(valor.replace(/[^\d]/g, "")) / 100;
    $("#valor").val(valor)
    return true;
  }
</script>