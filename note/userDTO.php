<?php

namespace note\User;

use note\Role\RoleDTO;

class UserDTO
{
    public function __construct(
        public int $id,
        public string $name,
        public RoleDTO $role
    ) {}
}
