<?php

namespace App\Observers;

use App\Models\Cliente;
use Comtele\Services\TextMessageService;

const API_KEY = '0552feda-66f0-4e09-988a-6ff94b669687';

class ClienteObserver
{
    /**
     * Handle the cliente "created" event.
     *
     * @param  \App\Cliente  $cliente
     * @return void
     */
    public function created(Cliente $cliente)
    {
        $textMessageService = new TextMessageService(API_KEY);
        $menssagem = 'Programa Fidelidade MutantesFoods: Olá, bem-vind@ ao nosso programa de fidelidade! Finalize seu cadastro no link a seguir e ganhe 3 pontos! http://www.mutantesfoods.com.br';
        $telefone = preg_replace("/[^0-9]/", "", $cliente->telefone);

        $result = $textMessageService->send("Mutantes Foods", $menssagem, ['55' . $telefone]);
    }

    /**
     * Handle the cliente "updated" event.
     *
     * @param  \App\Cliente  $cliente
     * @return void
     */
    public function updated(Cliente $cliente)
    {
        //
    }

    /**
     * Handle the cliente "deleted" event.
     *
     * @param  \App\Cliente  $cliente
     * @return void
     */
    public function deleted(Cliente $cliente)
    {
        //
    }

    /**
     * Handle the cliente "restored" event.
     *
     * @param  \App\Cliente  $cliente
     * @return void
     */
    public function restored(Cliente $cliente)
    {
        //
    }

    /**
     * Handle the cliente "force deleted" event.
     *
     * @param  \App\Cliente  $cliente
     * @return void
     */
    public function forceDeleted(Cliente $cliente)
    {
        //
    }
}
