<?php

namespace App\Http\Controllers\admin;

use App\Models\Cliente;
use App\Models\Saldo;
use App\Produto;
use App\Transacao;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::all();
        $produtos = Produto::all();

        return view('admin.cliente.index', compact('clientes', 'produtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $request->validate([
            'telefone' => 'required',
        ]);
        $telefone = preg_replace("/[^0-9]/", "", $request['telefone']);

        $cliente = Cliente::where('telefone', $telefone)->first();

        if($cliente != null){
            return redirect()->back()->with('error', 'Já existe cliente com este telefone!');
        }

        try{

            DB::beginTransaction();
//            $cliente =  Cliente::create($request->all());
            $cliente =  new Cliente();
            $cliente->nome = $request['nome'];
            $cliente->telefone = $telefone;
            $cliente->cpf = $request['cpf'];
            $cliente->email = $request['email'];
            $cliente->save();

            $s = new Saldo();
            $s->cliente_id = $cliente->id;
            if(!is_null($request['valor'])){
                $transacao              = new Transacao();
                $transacao->descricao   = $request['descricao'];
                $transacao->valor       = $request['valor'];
                $transacao->cliente_id  = $cliente->id;
                $transacao->tipo        = 'C';
                $transacao->save();

                $s->saldo = $request['valor'];
            } else {
                $s->saldo = 0;
            }
            $s->save();

            DB::commit();

        }catch(Exception $e){
            DB::rollBack();
            return redirect()->back()->with('error', 'Não foi possível cadastrar o cliente.');
        }

        return redirect()->route('admin.cliente.show', $cliente->id)->with('success','Cliente Cadastrado Com Sucesso!');

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente    = Cliente::find($id);
        $transacoes = Transacao::where('cliente_id', '=', $id)
            ->get();

        $produtos = Produto::all();

        return view('admin.cliente.show', compact('cliente', 'transacoes', 'produtos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::find($id);

        return view('admin.cliente.edit', compact('cliente'));
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
        $request->validate([
            'telefone' => 'required',
        ]);

        $cliente = Cliente::find($id);
        if($cliente) {
            $cliente->nome = $request->nome;
            $cliente->telefone = $request->telefone;
            $cliente->cpf = $request->cpf;
            $cliente->email = $request->email;
            $cliente->save();
            return redirect()->back()->with('success','Cliente Atualizado Com Sucesso!');
        }
        return redirect()->back()->with('error','O cliente não foi encontrado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
