<?php
    require_once('db_connect.php');

    $id = $_POST['id'];
    $name = $_POST['title'];
    $text = $_POST['input_text'];
    

    try {
        $sql = "UPDATE posts SET post_name = :name, post_text = :text WHERE post_id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":id",$id);
        $stmt->bindParam(":name",$name);
        $stmt->bindParam(":text",$text);
        $stmt->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
        die();
    }
?>