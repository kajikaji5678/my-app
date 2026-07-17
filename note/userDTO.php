<?php

namespace note;

class UserDTO
{
    public function __construct(
        public string $name,
        public int $age
    ) {}
}
