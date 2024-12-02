<?php

namespace App\Services\Movimentacao;

class ExtratoMes
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public $data,
        public $movimentacoes,
        public $entradas,
        public $saidas,
        public $saldo,
    ) {
        //
    }
}
