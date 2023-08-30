<?php

try {
    $db = new PDO('mysql:dbname=test;host=localhost;charset=utf8','root','root');
}catch (PDOException $e) {
    //接続できなかったらエラー表示
    echo 'DB接続エラー!'. $e->getMessage();
}

//投稿IDの降順でデータを取得
$entry = $db->query('SELECT * FROM posts ORDER BY post_id DESC');
//$HENSYU = $db->query('UPDATE posts SET')


//受信したデータをデータベースに格納
if(!empty($_POST['input_name'])) {
    try {
        $sql = 'INSERT INTO posts(post_name,post_datetime,post_text) VALUE(:ONAMAE,now(),:ONAMAE1)';
        $stmt = $db->prepare($sql);

        $stmt->bindValue(':ONAMAE',$_POST['input_name'], PDO::PARAM_STR);
        $stmt->bindValue(':ONAMAE1',$_POST['input_text'], PDO::PARAM_STR);
        $stmt->execute();
    }catch(PDOException $e) {
        echo 'データベースにアクセスできません！'. $e->getMessage();
    }
}

