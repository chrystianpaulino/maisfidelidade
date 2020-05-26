<?php

namespace App\Http\Controllers;

use App\Produto;
use App\Transacao;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\Cliente;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $clientes = Cliente::all();
        $produtos = Produto::all()->pluck('nome', 'id');
        $countClientes = $clientes->count();
        return view('home', compact('clientes', 'countClientes', 'produtos'));
    }

    public function paginaInicial(){
        $produtos = Produto::all();
//        return view('roupas', compact('produtos'));
//        return view('welcome_bckp', compact('produtos'));
        return view('welcome', compact('produtos'));
    }

    public function paginaLoginCliente(){
        return view('logincliente');
    }

    public function homeCliente($telefone){
        $telefone = str_replace(['.','-','/', '(', ')'],'', $telefone);
        $cliente  = Cliente::where('telefone', '=', $telefone)->first();
        if($cliente){
//            dd($cliente);
            $transacoes = Transacao::where('cliente_id', '=', $cliente->id)
                ->get();
//            return redirect()->route('cliente.home', $telefone);
            return view('homecliente', compact('cliente', 'transacoes'));
        }

        return redirect()->back()->with('error','Cliente Não Encontrado!');
    }
}
