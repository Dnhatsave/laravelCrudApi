@extends('layouts.principal')

@section('conteudo')
<h3>Clientes</h3>
<a href="{{ route('cliente.create')}}">Novo</a>

<ol>
    @foreach ($clientes as $c)
        <li>{{ $c['nome'] }} ||
        <a href="{{ route('cliente.edit', $c['id'])}}">Editar</a>
        </li>
    @endforeach
</ol>    
@endsection
