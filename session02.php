<?php
//sessionを使う際は、必ずsession_startと書く
session_start();

$name = $_SESSION['name'];  // $nameは、SESSION変数の中に格納しているものだよ、というプログラム
$age = $_SESSION['age'];   // なので、session01.phpをブラウザで開いた後に、session02.phpを開く
                          //  逆の順番だとsession01.phpは開かない

echo $name . '  ' . $age;

?>