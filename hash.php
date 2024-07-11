<?php
$password = 'test1';
$hashed_pw = password_hash($password, PASSWORD_DEFAULT);  //(第１引数,第２引数)

// 'test'がハッシュ化された↓
// ハッシュ値は毎回違う（更新すると表示が変わる。）
// ↓から、元の値（今回は'test'）という文字を導き出すことはできない。
echo $hashed_pw;

// password_verify()で認証ができる。
// password_verify('ハッシュ化の値', `ハッシュ化された値'));

echo '<pre>';
var_dump(password_verify('test', $hashed_pw));  
  //password_verifyは、('test', $hashed_pw)の第1引数,第2引数が一緒かどうかを確認してくれる
echo '</pre>';
