<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovimentacaoRequest;
use App\Models\Movimentacao;
use App\Services\Movimentacao\MovimentacaoService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MovimentacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, MovimentacaoService $service): View
    {
        $extrato = $service->extratoDoMes($request->date('data'));
        $saldo = $service->saldo();
        return view('movimentacao.index', compact('extrato', 'saldo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $movimentacao = new Movimentacao;
        return view('movimentacao.create', compact('movimentacao'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MovimentacaoRequest $request): RedirectResponse
    {
        Movimentacao::create($request->validated());

        return to_route('movimentacoes.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movimentacao $movimentacao): View
    {
        return view('movimentacao.edit', compact('movimentacao'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MovimentacaoRequest $request, Movimentacao $movimentacao): RedirectResponse
    {
        $movimentacao->fill($request->validated());
        $movimentacao->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movimentacao $movimentacao): RedirectResponse
    {
        $movimentacao->delete();

        return to_route('movimentacoes.index');
    }
}
