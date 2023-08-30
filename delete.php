<!DOCTYPE html>
<html lang="en">

<?php require('db_connect.php');
$id = $_GET['id'];

try{
    $sql = "SELECT * FROM posts WHERE post_id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
} catch (PDOException $e) {
    echo $e->getmessage();
    die();
}

$row = $stmt->fetch(PDO::FETCH_ASSOC);
   $name = $row['post_name'];
   $text = $row['post_text'];
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>削除画面</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="title-area">
        <h1>削除画面</h1>
    </div>
    <form action="delete_done.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="submit" class="input-area submit" name="submit" value="削除">
    </form>
    
    
</body>