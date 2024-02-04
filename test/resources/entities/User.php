<?php

namespace PhpSpecification\Test\Resources\Entities;

class User
{
    public function __construct(
        public readonly ?int $id,
        public readonly string $name,
        public readonly string $email,
        public readonly array $friends = []
    ) {
    }
}