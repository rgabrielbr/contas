<?php

namespace App\Services\Movimentacao;

use App\Enums\MovimentacaoTipo;
use App\Models\Movimentacao;
use Illuminate\Support\Carbon;

class MovimentacaoService
{
    public function extratoDoMes(?Carbon $date = null): ExtratoMes
    {
        if (is_null($date)) {
            $date = today();
        }

        /** @var \Illuminate\Database\Eloquent\Collection */
        $movimentacoes = Movimentacao::query()
            ->whereDate('data', '>=', $date->firstOfMonth())
            ->whereDate('data', '<=', $date->lastOfMonth())
            ->oldest('data')
            ->get();

        $entradas = $movimentacoes->where('tipo', '=', MovimentacaoTipo::Entrada)->sum('valor');

        $saidas = $movimentacoes->where('tipo', '=', MovimentacaoTipo::Saida)->sum('valor');

        return new ExtratoMes(
            $date->format('Y-m'),
            $movimentacoes,
            $entradas,
            $saidas,
            $entradas - $saidas
        );
    }

    public function saldo()
    {
        $entradas = Movimentacao::query()
            ->where('tipo', MovimentacaoTipo::Entrada)
            ->oldest('data')
            ->sum('valor');

        $saidas = Movimentacao::query()
            ->where('tipo', MovimentacaoTipo::Saida)
            ->oldest('data')
            ->sum('valor');

        return $entradas - $saidas;
    }
}
