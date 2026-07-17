<?php 

// 普通の関数
function hello () {
    return "こんちは";
}

// コールバック関数
function test ($callback) {
    echo $callback();
}

// 関数内は文字列でいけます
test("hello");


/// これを無名関数でやってみる
function kaji ($first, $second) {
    return $second($first);
}

echo kaji("hello", function ($z) {
    return $z . "みんな！";
});

// コールバック関数は場所だけ用意してる
// 後々自分で好きに関数を決められる

// pluck() は：
// * Collection
// * QueryBuilder
// に対して使う。

// pluck()はだたの値
// クエリはSQL命令
// 多対一はwith()でリレーション引っ張ることはできない
// get()は複数のデータを含むため、中からデータを引っ張るには配列指定が必要
/// 例: User::where("id", 1)->get()->name は使用できない

// pluckはJSON、valueはそのまま

//todo 6月1日
// クラス内の変数 = プロパティ

class Human {
    private $name;
    private $age;
    private $form;
}