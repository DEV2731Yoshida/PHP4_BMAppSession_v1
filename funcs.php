<?php

//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}

//DB接続
function db_conn()
{
    try {
        $db_name = 'gs_db_class4';    //データベース名
        $db_id   = 'root';      //アカウント名
        $db_pw   = '';      //パスワード：XAMPPはパスワード無しに修正してください。
        $db_host = 'localhost'; //DBホスト
        $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
        return $pdo;
    } catch (PDOException $e) {
        exit('DB Connection Error:' . $e->getMessage());
    }
}

//SQLエラー
function sql_error($stmt)
{
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit('SQLError:' . $error[2]);
}

//リダイレクト
function redirect($file_name)
{
    header('Location: ' . $file_name);
    exit();
}


// ログインチェク処理 loginCheck()
function loginCheck()
{
    // 1. ログインチェック処理！
    // 以下、セッションID持ってたら、ok
    // 持ってなければ、閲覧できない処理にする！！！！！！！！！！

    // 以下４行のように、日本語でプログラムを書いてみるとよい！！
    // if  (ログインしてない人){
    //     エラー
    // }
    // そうでなければ以下の処理に進む

    // 下記！は逆の意味。つまり上の行は、キー(変数)の中に値が存在していない場合、という意味
    if (!isset($_SESSION['chk_ssid'])   ||  $_SESSION['chk_ssid'] !== session_id()) {
        // ssidを持ってない(存在していない)人  or  何かしらの理由でサーバ側の値と一致しない人   という意味 
        //issetは、キー(変数)の中に値が存在しているかチェックする
            exit('LOGIN ERROR');  //ログインが成功しなかった人は、ここで強制終了。
        }
        
        //ログインが成功した人は、以下を実行
        session_regenerate_id(true);
        $_SESSION['chk_ssid'] = session_id();
        // ここまでの5行分がログイン機能！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！
}
