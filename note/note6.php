<?php

require __DIR__ . '/../vendor/autoload.php';

use App\DTO\UserDTO;

$user = new UserDTO(
    name: 123,
    age: 124,
);

echo $user->name;
