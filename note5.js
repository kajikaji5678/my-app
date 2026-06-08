/// ラッパーとメゾットと関数の違い

// ラッパー
// プリミティブをオブジェクトで包んでいる状態

/// オブジェクト
// データと機能をまとめたもの
// プロパティとメゾットをまとめたもの

const str = new String('hello');

// メゾット
// 機能呼び出し
console.log(str.toUpperCase());

// 関数
toUpperCase('hello');
// メゾット
'hello'.toUpperCase();

// オブジェクト側はメゾットを持っている
// メゾット側はオブジェクトに作用する

// プリミティブspring型はtoUpperCaseメゾットが定義されている
// これを呼び出してる

