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

