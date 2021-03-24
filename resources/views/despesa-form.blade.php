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
        </div>
      </div>
    </div>
    <div class="container">
      <h2>Formulário de Despesas</h2>


      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif

      @if(empty($despesa->id))
      <form action="{{route('despesa.store')}}" method="post" enctype="multipart/form-data">
        @else
        <form action="{{route('despesa.update', ['despesa' => $despesa])}}" method="post" enctype="multipart/form-data">
          @endif
          @csrf
          <div class="form-group row">
            <div class="col-md-6 mb-4 mb-lg-0">
              <label for="descricao">Descrição:</label>
              <input type="text" class="form-control" id="descricao" value="{{$despesa->descricao}}" placeholder="Entre com a descrição" name="descricao" required>
            </div>
            <div class="form-group row">
              <div class="col-md-6 mb-4 mb-lg-0">
                <label for="Data">Data </label>
                <input type="date" class="form-control" id="data" value="{{empty($despesa->data) ? '' : $despesa->data->format('Y-m-d')}}" placeholder="Entre com a data" name="data" required>
              </div>
              <div class="form-group row">
                <div class="col-md-6 mb-4 mb-lg-0">
                  <label for="valor">Valor </label>
                  <input type="decimal" class="form-control" id="valor" value="{{$despesa->valor}}" placeholder="entre com o valor da despesa" name="valor" required><br>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-6 mb-4 mb-lg-0">
                  <label for="user_id">Usuário</label>
                  <select name="user_id" class="custom-select">
                    <option value="">Selecione</option>
                    @foreach ($users ?? [] as $user)
                    <option {{($user->id == ($despesa->user->id ?? null)) ? "selected" : ""}} value="{{ $user->id }}">{{$user->name}}</option>
                    @endforeach
                  </select>
                </div><br><br>
              </div>

              <div class="form-group row">
                <div class="col-md-6 mb-4 mb-lg-0">
                  @if (empty($despesa->id))
                         <label for="anexo">Imagem </label>
                         <input id="anexo" name="anexo" class="input-file" type="file" required />
                  @else
                        <div class="row">
                          <div class="col-sm-12">
                              <img src="{{ asset($despesa->anexo) }}" style="width:200px; height: auto;" />
                          </div>
                          <div class="col-sm-12">
                              <span>Substituir Imagem: </span>&nbsp;<input id="anexo" name="anexo" class="input-file" type="file" />
                          </div>
                        </div>
                  @endif
                </div>
              </div>
              <div class="row">&nbsp;</div>
              <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0">
                  <p>
                    @if(empty($despesa->id))
                    <button type="submit" class="btn btn-sm btn-primary">Cadastrar</button>
                    @elseif ($pode_alterar)
                    <button type="submit" class="btn btn-sm btn-warning">Alterar</button>
                    @endif
                    <a href="{{ route('despesa.create') }}" class="btn btn-sm btn-success">Nova despesa</a>
                    <a href="{{ route('despesa.index') }}" class="btn btn-sm" >Voltar</a>
                  </p>
                </div>
              </div>
        </form>
    </div>
  </div>
</x-app-layout>