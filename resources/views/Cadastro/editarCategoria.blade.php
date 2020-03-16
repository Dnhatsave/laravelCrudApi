@extends('Cadastro.App',["current" => "categorias"]) {{-- Criando um paramentro de link para a view--}} 

@section('body')
<div class="card border">
    <div class="card-body">
        <form action="/categorias/{{$cat->id}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nomeCategoria">Nome da Categoria</label>
                <input type="text" class="form-control" name="nomeCategoria" id="nomeCategoria"
                  value="{{$cat->nome}}" placeholder="Categoria">
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
            <button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>

        </form>
    </div>    
</div>    
@endsection