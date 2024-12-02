<?php

namespace App\Enums;

use App\Enums\Attributes\Descricao;
use ReflectionClassConstant;

enum MovimentacaoTipo
{
    #[Descricao('Entrada')]
    case Entrada;

    #[Descricao('Saída')]
    case Saida;

    private static function getDescription(self $enum): string
    {
        $ref = new ReflectionClassConstant(self::class, $enum->name);
        $classAttributes = $ref->getAttributes(Descricao::class);

        if (count($classAttributes) === 0) {
            return $enum->name;
        }

        return $classAttributes[0]->newInstance()->descricao;
    }

    public static function names(): array
    {
        return array_column(self::cases(), 'name');
    }

    public static function asSelectArray(): array
    {
        /** @var array<string,string> $values */
        $values = collect(self::cases())
            ->mapWithKeys(function ($enum) {
                return [$enum->name => self::getDescription($enum)];
            })->toArray();

        return $values;
    }
}
