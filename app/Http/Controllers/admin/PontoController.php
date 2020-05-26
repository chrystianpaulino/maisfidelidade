<?php

namespace App\Http\Controllers\admin;

use App\Models\Ponto;
use App\Models\Saldo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;

class PontoController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'valor' => 'required|min:1'
        ]);

        try{
            DB::beginTransaction();
            /*$ponto = new Ponto();
            $ponto->descricao = $request['descricao'];
            $ponto->valor = $request['valor'];
            $ponto->cliente_id = $request['cliente_id'];
            $ponto->save();*/

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
            return redirect()->back();
        }catch (Exception $e){
            return redirect()->back();
        }
    }
}
