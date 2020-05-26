<?php

namespace App\Http\Controllers\admin;

use App\Categoria;
use App\Produto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CardapioController extends Controller
{
    public function index() {
        $produtos = Produto::all();

        $categorias = Categoria::all()->pluck('nome', 'id');

        return view('admin.cardapio.index', compact('produtos', 'categorias'));
    }
}
