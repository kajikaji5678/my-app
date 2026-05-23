<?php

// クラス継承
class B
{
    public function printItem($string)
    {
        echo 'A:'.$string;
    }

    public function printPHP()
    {
        echo 'B';
    }
}

class C extends B {
    public function printItem($string) {
        echo 'C' . $string;
    }
}

$old = new B();
$now = new C();

// $old->printItem('is Great');
// $old->printPHP();
// $now->printItem('is bad');
// $now->printPHP();

// モデルのクラス名はテーブルの単数形
// usersテーブルがあるならuserモデル

// モデル中身からっぽでもテーブル情報はコントローラー側で取得できる

// インターフェイス = API
// モデルから取得されたレコードはコレクションで返される


/// 無名関数
$fukuda = function($test) {
    echo ($test. "です");
};

$fukuda('fukuda');

// コールバック関数
function a () {
    return "fukuda";
}

// 親テーブル→子テーブルの順番にやらないとエラー出るよ