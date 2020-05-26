<?php

namespace App\Http\Controllers\admin;

use App\Models\Saldo;
use App\Produto;
use App\Transacao;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use mysql_xdevapi\Exception;

class TransacaoController extends Controller
{
    public function creditoTransacao(Request $request) {

        $request->validate([
            'valor' => 'required|min:1'
        ]);

        try{
            DB::beginTransaction();
            $transacao              = new Transacao();
            $transacao->descricao   = $request['descricao'];
            $transacao->valor       = $request['valor'];
            $transacao->cliente_id  = $request['cliente_id'];
            $transacao->tipo        = 'C';
            $transacao->save();

            $saldo = Saldo::where('cliente_id', $request['cliente_id'])->first();

            if(is_null($saldo)){
                $s = new Saldo();
                $s->saldo = $request['valor'];
                $s->cliente_id = $request['cliente_id'];
                $s->save();
            } else {
                $saldo->saldo = $saldo->saldo + $request['valor'];
                $saldo->save();
            }
            DB::commit();
            return redirect()->back()->with('success','Saldo Creditado Com Sucesso!');
        }catch (Exception $e){
            return redirect()->back()->with('error','Não foi possível creditar o saldo!');
        }
    }

    public function creditarAtalho(Request $request) {

        $request->validate([
            'valor2' => 'required|min:1'
        ]);

        try{
            DB::beginTransaction();
            $transacao              = new Transacao();
            $transacao->descricao   = $request->descricao2;
            $transacao->valor       = $request->valor2;
            $transacao->cliente_id  = $request->cliente_id2;
            $transacao->tipo        = 'C';
            $transacao->save();

            $saldo = Saldo::where('cliente_id', $request->cliente_id2)->first();


            if(is_null($saldo)){
                $s              = new Saldo();
                $s->saldo       = $request->valor2;
                $s->cliente_id  = $request->cliente_id2;
                $s->save();
            } else {
                $saldo->saldo = $saldo->saldo + $request->valor2;
                $saldo->save();
            }
            DB::commit();
            return redirect()->back()->with('success','Saldo Creditado Com Sucesso!');
        }catch (Exception $e){
            return redirect()->back()->with('error','Não foi possível creditar o saldo!');
        }
    }

    public function debitoTransacao(Request $request){

        try{
            DB::beginTransaction();
            $saldo      = Saldo::where('cliente_id', $request->cliente_id)->first();
            $produto    = Produto::find($request->produto_id);

            if(!isset($saldo) or $saldo->saldo < $produto->pontuacao){
                return redirect()->back()->with('error','Pontos Insuficiente!');
            } else {
                $transacao              = new Transacao();
                $transacao->descricao   = $request->descricao;
                $transacao->valor       = $produto->pontuacao;
                $transacao->cliente_id  = $request->cliente_id;
                $transacao->produto_id  = $request->produto_id;
                $transacao->tipo        = 'D';
                $transacao->save();

                $saldo->saldo = $saldo->saldo - $produto->pontuacao;
                $saldo->save();
            }
            DB::commit();
            return redirect()->back()->with('sucess','Pontuação Debitada com Sucesso!');
        }catch (Exception $e){
            return redirect()->back()->with('error','Não foi possível debitar o saldo!');
            return redirect()->back();
        }

    }

}
