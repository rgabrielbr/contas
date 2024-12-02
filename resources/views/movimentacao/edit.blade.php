@extends('layouts.app')

@section('content')
    <div class="mb-3 text-end">
        <form action="{{ route('movimentacoes.destroy', $movimentacao) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger">
                Excluir
            </button>
        </form>
    </div>
    <form action="{{ route('movimentacoes.update', $movimentacao) }}" method="POST" class="row g-3">
        @csrf
        @method('PUT')
        @include('movimentacao._form')
        <div class="">
            <button type="submit" class="btn btn-primary">
                Salvar
            </button>
        </div>
    </form>
@endsection
