<?php

namespace App\Http\Controllers\Admin;

use App\Categoria;
use App\Produto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProdutoController extends Controller
{

    public function index()
    {
        $produtos   = Produto::all();
        $categorias = Categoria::all()->pluck('nome', 'id');
        return view('admin.produtos.index', compact('categorias', 'produtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//        $path = null;
//        if($request->file('arquivo')){
//            $path = $request->file('arquivo')->store('imagens', 'public');
//        }

        $prod = new Produto();
        $prod->categoria_id = $request->categoria_id;
        $prod->nome         = $request->nome;
        $prod->descricao    = $request->descricao;
//        $prod->preco        = $request->preco;
        $prod->pontuacao    = $request->pontuacao;
//        $prod->foto         = $path;
        $prod->save();
        return redirect()->back()->with('success','Produto Cadastrado Com Sucesso!');
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
        $produto = Produto::find($id);
        if(isset($produto)) {
            $categorias = Categoria::all()->pluck('nome', 'id');
            return view('admin.produtos.edit', compact('produto', 'categorias'));
        }

        return redirect()->route('admin.produtos.index')->with('error','Produto Não Encontrado!');
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
        $path = null;
        if($request->file('arquivo')){
            $path = $request->file('arquivo')->store('imagens', 'public');
        }

        $prod = Produto::find($id);
        if (isset($prod)) {
            $prod->categoria_id = $request->categoria_id;
            $prod->nome         = $request->nome;
            $prod->descricao    = $request->descricao;
            $prod->preco        = $request->preco;
            $prod->pontuacao    = $request->pontuacao;
            $prod->foto         = $path;
            $prod->save();
            return redirect()->route('admin.produtos.index')->with('success','Produto Atualizado Com Sucesso!');
        }

        return redirect()->route('admin.produtos.index')->with('error','Produto Não Encontrado!');
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
        if (isset($prod)) {
            $prod->delete();
            return redirect()->route('admin.produtos.index')->with('success','Produto Excluído Com Sucesso!');
        }
        return redirect()->route('admin.produtos.index')->with('error','Produto Não Encontrado!');
    }
}
