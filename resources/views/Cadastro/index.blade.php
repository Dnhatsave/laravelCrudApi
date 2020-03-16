@extends('Cadastro.App',["current" => "home"]) {{-- Criando um paramentro de link para a view--}} 

@section('body')
<div class="jumbotron bg-light border border-secundary">
    <div class="row">
        <div class="imagem">
           <img src="/img/crud.jpg" alt="">
        </div>
        <div class="card-deck">
            <div class="card border border-primary">

                <div class="card-body">
                    <h5 class="card-title">Cadastro de Produtos</h5>
                    <p class="card-text"> API usada para cadastrar produtos usando javascript e ajax em laravel
                        um crud simples de implementar e bastante eficaz
                    </p>
                    <a href="/produtos" class="btn btn-primary">Cadastre seus produtos</a>
                </div>
            </div>
            <div class="card border border-primary">
                <div class="card-body">
                    <h5 class="card-title">Cadastro de Categorias</h5>
                    <p class="card-text"> Demonstracao simples de categorias e relacionamento de categorias com os 
                        produtos existente tudo feito usando php
                    </p>
                    <a href="/categorias" class="btn btn-primary">Cadastre suas categorias</a>
                </div>
            </div>
        </div>
    </div>
</div>
 @endsection