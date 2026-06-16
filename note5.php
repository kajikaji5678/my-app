<?php

// class MessageService
// {
//     public function hello()
//     {
//         return 'hello';
//     }
// }

// class taskController
// {
//     public function index()
//     {
//         $service = new MessageService;
//         echo $service->hello();
//     }
// }

// $controller = new taskController();
// $controller->index();

class Animal {
    protected string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }
}

interface Speakable {
    public function speak();
}

class Dog extends Animal implements Speakable {
    public function speak()
    {
        return 'ワン';
    }
}

class Cat extends Animal implements Speakable {
    public function speak()
    {
        return 'にゃん';
    }
}

$dog = new Dog('ポチ');
echo $dog->getName();
echo $dog->speak();

$cat = new Cat('ねこ');
echo $cat->getName();
echo $cat->speak();
