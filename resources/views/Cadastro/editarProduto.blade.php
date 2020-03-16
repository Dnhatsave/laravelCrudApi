@extends('Cadastro.App',["current" => "produtos"]) {{-- Criando um paramentro de link para a view--}} 

@section('body')
<div class="card border">
    <div class="card-body">
        <form action="/produtos/{{$prod->id}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nomeProduto">Nome do Produto</label>
                <input type="text" class="form-control" name="nomeProduto" id="nomeProduto" 
                  value="{{$prod->nome}}" placeholder="Produto">
            </div>
            <div class="form-group">
                <label for="nomeProduto">Stock</label>
                <input type="number" class="form-control" name="stock" id="stock" 
                  value="{{$prod->stock}}" placeholder="Qauntidade em Stock">
            </div>
            <div class="form-group">
                <label for="nomeProduto">Preco</label>
                <input type="text" class="form-control" name="preco" id="preco" 
                value="{{$prod->preco}}" placeholder="preco">
            </div>
            <div class="form-group">
                <label for="categoria_id">Categoria</label>
                <select class="form-control" name="categoria_id" id="categoria_id">
                 @foreach ($cats as $item) 
                    <option value="{{$item->id}}">{{$item->nome}}</option>
                 @endforeach
                </select>
              </div>  
            
            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
            <button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>

        </form>
    </div>    
</div>    
@endsection