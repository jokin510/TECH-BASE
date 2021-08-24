<?php
// ファイル読み込み
require_once('mission5_function.php');
require_once('mission5_conduct.php');
?>
<!DOCTYPE html>
<html lang="jp">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
</head>
<body>
  <form method="post">
    <!--投稿フォーム-->
    <p>【　投稿フォーム　】<br>
    <input type="text" name="name" placeholder="User name" value="<?php if(!empty($edit_name)){echo $edit_name;} ?>"><br>
    <input type="text" name="comment" placeholder="Comment" value="<?php if(!empty($edit_comment)){echo $edit_comment;} ?>"><br>
    <input type="password" name="password1" placeholder="Password">
    <input type="submit" name="comment_submit"></p>
    <input type="hidden" name="edit_num" value="<?php if(!empty($edit_num)){echo $edit_num;} ?>">
    <!--削除フォーム-->
    <p>【　削除フォーム　】<br>
    <input type="number" name="delete_num" placeholder="Select"><br>
    <input type="password" name="password2" placeholder="Password">
    <input type="submit" name="delete_btn" value="削除"></p>
    <!--編集フォーム-->
    <p>【　編集フォーム　】<br>
    <input type="number" name="edit" placeholder="Select"><br>
    <input type="password" name="password3" placeholder="Password">
    <input type="submit" name="edit_btn" value="編集"></p>
  </form>
</body>
<?php

// 表示
$select = select();
foreach ($select as $row){
    echo $row['id'].'. ';
    echo $row['name'].' ';
    echo $row['comment'].'__';
    echo $row['time'].'<br>';
echo "<hr>";
}
?>
