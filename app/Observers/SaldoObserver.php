<?php

namespace App\Observers;

use App\Models\Saldo;
use Comtele\Services\TextMessageService;
use Illuminate\Routing\Route;

//const API_KEY = '0552feda-66f0-4e09-988a-6ff94b669687';

class SaldoObserver
{
    /**
     * Handle the saldo "created" event.
     *
     * @param  \App\Saldo  $saldo
     * @return void
     */
    public function created(Saldo $saldo)
    {
        //
    }

    /**
     * Handle the saldo "updated" event.
     *
     * @param  \App\Saldo  $saldo
     * @return void
     */
    public function updated(Saldo $saldo)
    {
        $textMessageService = new TextMessageService(API_KEY);
        $menssagem = 'Programa Fidelidade MutantesFoods: Olá! Seu saldo atual é de ' . $saldo->saldo. ' pontos! Conheça nosso catálogo de pontos e não perca nenhuma oportunidade! http://www.mutantesfoods.com.br';
        $telefone = preg_replace("/[^0-9]/", "", $saldo->cliente->telefone);

        $result = $textMessageService->send("Mutantes Foods", $menssagem, ['55' . $telefone]);
    }

    /**
     * Handle the saldo "deleted" event.
     *
     * @param  \App\Saldo  $saldo
     * @return void
     */
    public function deleted(Saldo $saldo)
    {
        //
    }

    /**
     * Handle the saldo "restored" event.
     *
     * @param  \App\Saldo  $saldo
     * @return void
     */
    public function restored(Saldo $saldo)
    {
        //
    }

    /**
     * Handle the saldo "force deleted" event.
     *
     * @param  \App\Saldo  $saldo
     * @return void
     */
    public function forceDeleted(Saldo $saldo)
    {
        //
    }
}
