<?php

// todo 6/2 コンストラクタDI

interface interfaceGreet
{
    public function hello();
}

class Greet implements interfaceGreet
{
    public function hello()
    {
        return 'こんにちは';
    }
}

class EnglishGreet implements interfaceGreet {
    public function hello() {
        return 'hello';
    }
}

class User2
{
    private $greet;

    public function __construct(interfaceGreet $greet)
    {
        $this->greet = $greet;
    }

    public function greet()
    {
        echo $this->greet->hello();
    }
}

$greet = new Greet;
$user = new User2(new EnglishGreet());
$user->greet();

// 連想配列
