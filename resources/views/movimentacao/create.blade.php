@extends('layouts.app')

@section('content')
    <form action="{{ route('movimentacoes.store') }}" method="POST" class="row g-3">
        @csrf
        @include('movimentacao._form')
        <div class="">
            <button type="submit" class="btn btn-primary">
                Criar
            </button>
        </div>
    </form>
@endsection
