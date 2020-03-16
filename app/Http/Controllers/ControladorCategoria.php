<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;

class ControladorCategoria extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Categoria::all(); //Pegar todas categorias
        return view('Cadastro.categorias', compact('cats')); //passando o objecto categorias para a view
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Cadastro.novaCategoria');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cat = new Categoria(); //Instaciar o modelo categoria
        $cat->nome = $request->input('nomeCategoria'); // pegar a variavel na view
        $cat->save(); 
        return redirect('/categorias'); //redirecionar para pagina inicial
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat = Categoria::find($id);
        if(isset($cat)) {
            return view('Cadastro.editarCategoria', compact('cat')); //abrir a view com o id como parametro
        }
        return redirect('/categorias'); //caso o id nao exista redireciona para a pagina inical
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cat = Categoria::find($id);
        if(isset($cat)) {
            $cat->nome = $request->input('nomeCategoria'); // Actualizar o campo nome
            $cat->save();
        }
        return redirect('/categorias'); //caso o id nao exista redireciona para a pagina inical
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Categoria::find($id); //Pegando o ID
        //Caso a categoria exista remova ele
        if(isset($cat)){
            $cat->delete();
        }
        return redirect('/categorias');
    }
     
    public function indexJson(){
        $cats = Categoria::all(); //Pegar todas categorias
        return json_encode($cats); // Retornar as ctegorias em formato JSON

    }
}
