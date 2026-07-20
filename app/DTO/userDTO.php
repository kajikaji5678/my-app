<?php

namespace App\DTO;

class UserDTO
{
    public function __construct(
        public string $name,
        public int $age
    ) {}
}
