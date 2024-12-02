@extends('layouts.app')

@section('content')
    <form action="{{ route('login') }}" method="POST" class="vstack gap-3">
        @csrf
        <div>
            <x-form.label for="email">
                E-mail
            </x-form.label>
            <x-form.input name="email" id="email" :errors="$errors->get('email')"></x-form.input>
        </div>
        <div>
            <x-form.label for="password">
                Senha
            </x-form.label>
            <x-form.input type="password" name="password" id="password" :errors="$errors->get('password')"></x-form.input>
        </div>
        <div class="d-grid">
            <button type="submit" class="btn btn-primary">
                Entrar
            </button>
        </div>
    </form>
@endsection
