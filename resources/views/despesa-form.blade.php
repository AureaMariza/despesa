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
        <h2>Formulário de Despesas</h2>
  
  <form action="{{route('despesa.store')}}" method="post" class="was-validated">
    @csrf
    <div class="form-group">
      <label for="descricao">Descrição:</label>
      <input type="descricao" class="form-control" id="descricao" placeholder="Entre com a descrição" name="descricao" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Descrição obrigatória</div>
    </div>
    <div class="form-group">
      <label for="Data">Data </label>
      <input type="date" class="form-control" id="data" placeholder="Entre com a data" name="data" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">data obrigatória</div>
    </div>
    <div class="form-group">
      <label for="anexo">Imagem </label>
      <input id="anexo" name="anexo" class="input-file" type="file"required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Imagem obrigatória</div>
      
    </div>
    <div class="form-group">
      <label for="user_id">Usuário </label>
      <select name="user_id" class="custom-select mb-3">
        <option value=""></option>
        @foreach ($users as $user)
            <option value="{{ $user->id }}">{{$user->name}}</option>
        @endforeach
      </select>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Selecione o usuario</div>
    </div>

    <div class="form-group">
      <label for="valor">Valor </label>
      <input type="number" class="form-control" id="valor" placeholder="entre com o valor da despesa" name="valor" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Valor é obrigatóriao</div>
      </label>
    </div>
    <button type="submit" class="btn btn-primary">Cadastrar</button>
  </form>
  </div>
    </div>
</x-app-layout>

  
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



