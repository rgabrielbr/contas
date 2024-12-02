@use('App\Enums\MovimentacaoTipo')

<div class="col-12">
    <x-form.label for="nome">Nome</x-form.label>
    <x-form.input name="nome" id="nome" :errors="$errors->get('nome')" :value="old('nome', $movimentacao)"></x-form.input>
</div>
<div class="col-12">
    <x-form.label for="descricao">Descrição</x-form.label>
    <x-form.input name="descricao" id="descricao" :errors="$errors->get('descricao')" :value="old('descricao', $movimentacao)"></x-form.input>
</div>
<div class="col-12">
    <x-form.label for="tipo">Tipo</x-form.label>
    <x-form.select name="tipo" id="tipo" :options="MovimentacaoTipo::asSelectArray()" :errors="$errors->get('tipo')" :value="old('tipo', $movimentacao->tipo->name)"></x-form.select>
</div>
<div class="col-md-6">
    <x-form.label for="valor">Valor</x-form.label>
    <x-form.input class="money" name="valor" id="valor" :errors="$errors->get('valor')" :value="old('valor', $movimentacao)"></x-form.input>
</div>
<div class="col-md-6">
    <x-form.label for="data">Data</x-form.label>
    <x-form.input type="date" name="data" id="data" :errors="$errors->get('data')" :value="old('data', $movimentacao)"></x-form.input>
</div>
