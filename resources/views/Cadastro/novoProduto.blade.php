@extends('Cadastro.App',["current" => "produtos"])

@section('body')
<div class="card border">
    <div class="card-body">
        <form action="/produtos" method="POST">
            @csrf
            <div class="form-group">
                <label for="nomeProduto">Nome do Produto</label>
                <input type="text" class="form-control {{ $errors->has('nome') ? 'is-invalid' :'' }}"
                 name="nome" id="nomeProduto" placeholder="Produto">
                @if ($errors->has('nome'))
                <div class="invalid-feedback">
                    {{$errors->first('nome')}}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label for="stock">Stock</label>
                <input type="number" class="form-control {{$errors->has('stock') ? 'is-invalid' : ''}}" 
                name="stock" id="stock" placeholder="Qauntidade em Stock">
                @if ($errors-> has('stock'))
                <div class="invalid-feedback">
                    {{$errors->first('stock')}}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label for="preco">Preco</label>
                <input type="text" class="form-control {{$errors->has('preco') ? 'is-invalid' : ''}}"
                 name="preco" id="preco" placeholder="preco">
                @if ($errors->has('preco'))
                <div class="invalid-feedback">
                    {{$errors->first('preco')}}
                </div>
                @endif
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
    {{-- Tratamento de erros 
    @if ($errors->any())
        <div class="card-footer">
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    {{$error}}
                </div>
            @endforeach

        </div>
    @endif 
    --}}
</div> 
@endsection