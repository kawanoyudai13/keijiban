<!DOCTYPE html>
<html lang="ja">

<?php 
require_once('db_connect.php');
//require_once('edit.php');
?>


<body>
<form action="db_connect.php" method="POST">
<p>投稿者<input type="text" name="input_name"></p>
<p>本文<br><textarea name="input_text"></textarea></p>
<input type="submit" value="投稿">
</from>
<hr>

<article>
<?php while($resister = $entry->fetch()): ?>
<p>No.<?php print_r($resister['0']);?> / <?php print_r($resister['1']);?> / <?php print_r($resister['2']);?></p>
<p><?php print_r($resister['3']);?>
<td><a href="edit.php?id=<?php echo $resister['0'];?>">編集</a></td>
<td><a href="delete.php?id=<?php echo $resister['0'];?>">削除</a></td>
<hr>
<?php endwhile; ?>
</article>
</body>
</html>