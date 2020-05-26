<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use App\Models\Cliente;
use App\Produto;
use App\Transacao;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginClienteController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

//    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/landpage';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('guest')->except('logout');
    }

    public function loginCliente(Request $request){
        $telefone = str_replace(['.','-','/', '(', ')'],'', $request->telefone);
        $cliente  = Cliente::where('telefone', '=', $telefone)->first();
        if($cliente){
            $transacoes = Transacao::where('cliente_id', '=', $cliente->id)
                ->get();
            return redirect()->route('cliente.home', $telefone);
//            return view('homecliente', compact('cliente', 'transacoes'));
        }
        return redirect()->back()->with('error','Cliente Não Encontrado!');
    }
}
