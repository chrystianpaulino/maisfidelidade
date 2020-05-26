<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Saldo;
use App\Transacao;
use Comtele\Services\TextMessageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use const App\Observers\API_KEY;

class PerfilClienteController extends Controller
{

    public function edit($id){
        $cliente = Cliente::find($id);
        return view('atualizarDadosCliente', compact('cliente'));
    }

    public function update(Request $request, $id){
        $cliente = Cliente::find($id);

        try{
            DB::beginTransaction();
            if(!$cliente->msg_boasvindas){

                $transacao              = new Transacao();
                $transacao->descricao   = 'Completou o Cadastro';
                $transacao->valor       = 3;
                $transacao->cliente_id  = $id;
                $transacao->tipo        = 'C';
                $transacao->save();

                $saldo = Saldo::where('cliente_id', $id)->first();
                $saldo->saldo = $saldo->saldo + 3;
                $saldo->save();

                $textMessageService = new TextMessageService(API_KEY);
                $menssagem = 'Programa Fidelidade MutantesFoods: Olá, Obrigado por completar o cadastro no site da Mutantes! Você ganhou 3 pontos em nosso programa';
                $telefone = preg_replace("/[^0-9]/", "", $cliente->telefone);

                $result = $textMessageService->send("Mutantes Foods", $menssagem, ['55' . $telefone]);
                $cliente->msg_boasvindas = true;
            }

            $cliente->nome = $request->nome;
            $cliente->telefone = $request->telefone;
            $cliente->cpf = $request->cpf;
            $cliente->email = $request->email;
            $cliente->save();

            DB::commit();

            return redirect()->route('cliente.home', $id);

        }catch(\Exception $e){
            DB::rollBack();
            return redirect()->back()->with('error','Não foi possível atualizar seu cadastro!');
        }


    }
}
