<?php

namespace App;

use App\Produto;
use Illuminate\Database\Eloquent\Model;

class Transacao extends Model
{
    protected $fillable = [
        'descicao', 'valor', 'cliente_id', 'tipo'
    ];

    public function tipo(){
        if($this->tipo == 'C')
            return 'Crédito';
        else
            return 'Débito';
    }

    public function produto(){
        return $this->hasOne(Produto::class, 'id', 'produto_id');
    }

}
