<?php

namespace App\Enums\Attributes;

use Attribute;

#[Attribute]
class Descricao
{
    public function __construct(
        public string $descricao
    ) {}
}
