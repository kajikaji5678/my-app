<?php

// class User {
//     public string $name; // プロパティ

//     public function greet() { // メゾット
//         echo "こんにちは\n" . $this->name; //* $thisはこのクラスの中の値
//     }
// }

// $user = new User(); // インスタンス（実体）
// $user->name = "Fukuda";
// $user->greet();

use PhpParser\Node\Expr\FuncCall;
use Symfony\Component\CssSelector\Node\FunctionNode;

class User {
    public string $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function greet() {
        echo "こんにちは\n" . $this->name . "\n";
    }
}

$user = new User("Yamada");
$user->greet();


// class UserService {
//     public string $name, $email;

//     public function createUser() {
//         echo "名前:" . $this->name . "\n" . "メール:" . $this->email;
//     }
// }

// $service_me = new UserService();
// $service_me->name = '福田';
// $service_me->email = 'aaa@gmail.com';
// $service_me->createUser();


class UserList {
    public string $name, $address;

    public function __construct($name, $address)
    {
        $this->name = $name;
        $this->address = $address;
    }

    public function show() {
        echo "名前:" . $this->name . "\n" . "住所:" . $this->address . "\n";
    }
}

$user = new UserList('福田', 'オーストラリア');
$user->show();


trait LoggerList {
    public function log($msg) {
        echo "[LOG]" . $msg . "\n";
    }

    public function debug($msg) {
        echo "[DEBUG]" . $msg . "\n";
    }
}

class UserService {
    use LoggerList;

    public function createUser() {
        $this->log("user joined");
        $this->debug("no matter");
    }
}

class PostService {
    use LoggerList;

    public function createPost() {
        $this->log("Post cached");
        $this->debug("no matter");
    }
}

$user = new UserService();
$user->createUser();

$post = new PostService();
$post->createPost();
