<?php

namespace note\example;

class RoleDTO {
    public function __construct(
        public string $name,
        public int $level
    ) {}
}
