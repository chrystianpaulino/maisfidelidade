<?php

namespace App\Http\Controllers\Admin;

use App\Categoria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Categoria::all();
        return view('admin.categorias.index', compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoria              = new Categoria();
        $categoria->nome        = $request->nome;
        $categoria->descricao   = $request->descricao;
        $categoria->save();
        return redirect()->route('admin.categorias.index')->with('success','Categoria Cadastrada Com Sucesso!');
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
            return view('admin.categorias.edit', compact('cat'));
        }

        return redirect()->route('admin.categorias.index')->with('error','Categoria Não Encontrada!');
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
        $categoria = Categoria::find($id);
        if(isset($categoria)) {
            $categoria->nome        = $request->nome;
            $categoria->descricao   = $request->descricao;
            $categoria->save();
            return redirect()->route('admin.categorias.index')->with('success','Categoria Atualizada Com Sucesso!');
        }
        return redirect()->route('admin.categorias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $categoria = Categoria::find($id);
        if (isset($categoria)) {
            $categoria->delete();
            return redirect()->route('admin.categorias.index')->with('success','Categoria Excluída Com Sucesso!');

        }
        return redirect()->route('admin.categorias.index');
    }

    public function indexJson()
    {
        Log::info("jsonCategoria");
        $cats = Categoria::all();
        Log::info($cats);
        return json_encode($cats);
    }
}
