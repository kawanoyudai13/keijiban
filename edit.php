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
    <title>編集画面</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="title-area">
        <h1>編集画面</h1>
    </div>
    <form action="edit_done.php" method="POST">
        <input type="text" class="input-area" name="title" placeholder="name"> <br>
        <textarea name="input_text" class="input-area" name="content" placeholder="本文"></textarea><br>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="submit" class="input-area submit" name="submit" value="更新">
    </form>
    
    
</body>

</html>