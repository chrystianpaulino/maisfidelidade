<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Saldo extends Model
{
    protected $table = 'saldos';

    protected $fillable = [
        'cliente_id', 'saldo'
    ];

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }
}
