<?php

namespace App\Http\Requests;

use App\Enums\MovimentacaoTipo;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Number;
use Illuminate\Validation\Rule;

class MovimentacaoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => ['required', 'string'],
            'descricao' => ['nullable', 'string', 'max:100'],
            'data' => ['required', 'date'],
            'valor' => ['required'],
            'tipo' => ['required', Rule::in(MovimentacaoTipo::cases())],
        ];
    }

    protected function prepareForValidation()
    {
        $valor = $this->valor;
        $valorFloat = is_string($valor) ? (float) str_replace(',', '.', str_replace('.', '', $valor)) : $valor;
        $valorInteiro = (int) round($valorFloat * 100);

        $this->merge([
            'valor' => $valorInteiro,
        ]);
    }
}
