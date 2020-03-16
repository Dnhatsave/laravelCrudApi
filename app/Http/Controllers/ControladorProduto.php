<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Produto;



class ControladorProduto extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexView(){
        return view('Cadastro.produtosAPI');
    }

    public function index()
    {
        $prod = Produto::all(); //pegar todos produtos
        return json_encode($prod);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Categoria::all(); //pegar todas categorias
        return view('Cadastro.novoProduto',compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validacao de formularios e tratamento de erros
        $regras = [
            'nome' => 'required|unique:produtos',
            'stock' => 'required',
            'preco' => 'required|min:2|max:10'

        ];

        $mensagens = [
            'required' => 'o campo :attribute nao pode estar em branco',
            'nome.unique' => 'O Produto ja foi registado',
            'preco.min' => 'Digite um preco real',
            'preco.max' => 'Digite um preco real'


        ];
        $request ->validate($regras, $mensagens);

        $prod = new Produto(); //Instaciar produto
        //Pegar os campos da view
        $prod->nome = $request->input('nome');
        $prod->stock = $request->input('stock');
        $prod->preco = $request->input('preco');
        $prod->categoria_id = $request->input('categoria_id');
        $prod->save();
        return json_encode($prod); //retornar em json



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prod = Produto::find($id);

        if(isset($prod)){
            return json_encode($prod); //retornar em json
         }
         return response('Produto nao encontrado', 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prod = Produto::find($id);
        $cats = Categoria::all(); //pegar todas categorias

        if(isset($prod)){
            return view('Cadastro.editarProduto', compact('prod','cats'));
        }
        return redirect('/produtos');
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
        $prod = Produto::find($id);

        if(isset($prod)){
            $prod->nome = $request->input('nome');
            $prod->stock = $request->input('stock');
            $prod->preco = $request->input('preco');
            $prod->categoria_id = $request->input('categoria_id');
            $prod->save();
            return json_encode($prod); //retornar em json
         }
         return response('Produto nao encontrado', 404);
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prod = Produto::find($id);
        if(isset($prod)){
            $prod->delete();
            return response('Produto Removido', 200);
        }
        return response('Produto nao encontrado', 404);

    }
}
