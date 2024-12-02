@use('App\Enums\MovimentacaoTipo')

@extends('layouts.app')

@section('content')
    <div class="mb-3">
        <a href="{{ route('movimentacoes.create') }}" class="btn btn-primary">
            Novo
        </a>
    </div>
    <div class="mb-3">
        <form action="{{ route('movimentacoes.index') }}" class="mb-3" method="get">
            <input type="month" name="data" id="data" class="form-control" value="{{ $extrato->data }}"
                onchange="this.form.submit()">
        </form>
        <div class="d-flex justify-content-between mb-1">
            <span>Total de saídas:</span>
            <x-money danger :value="$extrato->saidas"></x-money>
        </div>
        <div class="d-flex justify-content-between mb-1">
            <span>Total de entradas:</span>
            <x-money success :value="$extrato->entradas"></x-money>
        </div>
        <div class="d-flex justify-content-between mb-1">
            <span>Saldo do mês:</span>
            <x-money :value="$extrato->saldo"></x-money>
        </div>
        <div class="d-flex justify-content-between mb-1">
            <span>Saldo final:</span>
            <x-money :value="$saldo"></x-money>
        </div>
    </div>
    <div class="list-group">
        @foreach ($extrato->movimentacoes as $movimentacao)
            <a href="{{ route('movimentacoes.edit', $movimentacao) }}" class="list-group-item list-group-item-action">
                <small class="d-block">{{ $movimentacao->data->format('d/m/Y') }}</small>
                <span class="d-block">{{ $movimentacao->nome }}</span>
                <small class="text-muted">{{ $movimentacao->descricao }}</small>
                <p class="text-end">
                    <x-money :success="$movimentacao->tipo === MovimentacaoTipo::Entrada" :danger="$movimentacao->tipo === MovimentacaoTipo::Saida" :value="$movimentacao->valor"></x-money>
                </p>
            </a>
        @endforeach
    </div>
@endsection
