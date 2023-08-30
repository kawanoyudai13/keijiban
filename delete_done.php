<?php

    require('db_connect.php');

    // URLの情報を見て値を取得したいので、GET通信
    $id = $_POST['id'];

    try {
        // idを条件に削除対象を決める
        $sql = "DELETE FROM posts WHERE post_id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
        die();
    }