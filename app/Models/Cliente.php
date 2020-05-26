<?php

namespace App\Models;

use App\Transacao;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $appends = ['saldo'];


    protected $fillable = [
        'nome', 'cpf', 'email', 'telefone'
    ];

    public function setTelefoneAttribute($value)
    {
        $telefone = str_replace(['.','-','/', '(', ')'],'', $value);
        $this->attributes['telefone'] = trim($telefone);
    }

    public function saldo(){
        $saldo = Saldo::select('saldo')
            ->where('cliente_id', '=', $this->id)->first();

        if(is_null($saldo)){
            return 0;
        }else{
            return $saldo->saldo;
        }
    }

    public function transacoes(){
        return $this->hasMany(Transacao::class, 'cliente_id', 'id');
    }

    public function extratoPontos() {
        return Transacao::where('cliente_id', $this->id)->get();
    }

    public function getSaldoAttribute()
    {
        $saldo = Saldo::select('saldo')
            ->where('cliente_id', '=', $this->id)->first();

        if(is_null($saldo)){
            return 0;
        }else{
            return $saldo->saldo;
        }
    }


}
