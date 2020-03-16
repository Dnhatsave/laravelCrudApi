@extends('Cadastro.App',["current" => "categorias"]) {{-- Criando um paramentro de link para a view--}} 

@section('body')
    <div class="card border">
        <div class="card-body">
            <h5 class="card-title"> Cadastro de categorias</h5>
            @if (count($cats) > 0)
                
            <table class="table table-ordered table-hover">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Nome</th>
                        <th>Acoes</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cats as $item)
                        <tr>
                           <td>{{$item->id}}</td>
                           <td>{{$item->nome}}</td>
                        <td>
                            <a href="/categorias/editar/{{$item->id}}" class="button btn-primary btn-sm">Editar</a>
                            <a href="/categorias/apagar/{{$item->id}}" class="button btn-danger btn-sm">Remover</a>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            @endif

        </div>
        <div class="card-footer">
            <a href="/categorias/novo" class="btn btn-sm btn-primary" role="button"> Nova Categaria</a>
            {{-- <a href="/categorias/novo" class="btn btn-sm btn-success" role="button"> Extrair CSV</a> --}}

        </div>
    </div>
  
@endsection