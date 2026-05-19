class Animal {
    public function run () {
        return 'run'
    }
}

class Dog extends Animal {
    $dog = new Dog();
    $dog->run();
}