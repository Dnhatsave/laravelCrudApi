@extends('Cadastro.App',["current" => "produtos"]) {{-- Criando um paramentro para a view--}} 

@section('body')
<div class="card border">
    <div class="card-body">
        <h5 class="card-title"> Cadastro de Produtos</h5>
        @if (count($prod) > 0)
            
        <table class="table table-ordered table-hover">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nome</th>
                    <th>stock</th>
                    <th>preco</th>
                    <th>Accoes</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($prod as $item)

                <tr>
                    <td> {{$item->id}}</td>
                    <td> {{$item->nome}}</td>
                    <td> {{$item->stock}}</td>
                    <td> {{$item->preco}}</td>
                    <td>
                        <a href="/produtos/editar/{{$item->id}}" class="button btn-primary btn-sm">Editar</a>
                        <a href="/produtos/apagar/{{$item->id}}" class="button btn-danger btn-sm">Remover</a>
                    </td>
                </tr>
                @endforeach


            </tbody>
        </table>
        
        @endif

    </div>
    <div class="card-footer">
        <a href="/produtos/novo" class="btn btn-sm btn-primary" role="button"> Novo Produto</a>
        {{-- <a href="/categorias/novo" class="btn btn-sm btn-success" role="button"> Extrair CSV</a> --}}

    </div>
</div>@endsection