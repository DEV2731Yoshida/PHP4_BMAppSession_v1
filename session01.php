<?php
//sessionを使う際は、必ずsession_startと書く
//session_startと書くと、session IDという特別なIDが発行される。それを可視化するのがsession_id
session_start();

// $name = 'James cc';
// $age = 25;
//   echo $name . '  ' . $age;
// $_SESSION['name'] = $name;  //これで$nameがSESSION変数の中に格納した
// $_SESSION['age'] = $age;   // []はアレイ(配列)


// $sid = session_id();  //発行されたsession IDを可視化するコード
// echo $sid;
// 検証ツールの中では  アプリケーション > Cookie を確認しろ


//鍵(session ID)は、１回利用したら再発行する
$old_session_id = session_id();
//何か処理した、と仮定
//session IDの更新
session_regenerate_id(true);  //新IDが発行された
$new_session_id = session_id();

echo $old_session_id;
echo '<br>';
echo '<br>';
echo $new_session_id;

//PHP の処理だけを記述する場合 ？> は省略可能。phpの後にHTMLを記述する場合は、その直前ことができます～
?>