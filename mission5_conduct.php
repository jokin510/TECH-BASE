<?php
// edit実行
if(!empty($_POST["edit_num"]) && !empty($_POST["name"]) && !empty($_POST["comment"]) && !empty($_POST["password1"]) && isset($_POST["comment_submit"])) {
    update();
    
// insert実行
}elseif(!empty($_POST["name"]) && !empty($_POST["comment"]) && !empty($_POST["password1"]) && empty($_POST["edit_num"]) && isset($_POST["comment_submit"])) {
    insert();
}

// delete実行
if(!empty($_POST["delete_num"]) && !empty($_POST["password2"]) && isset($_POST["delete_btn"])) {
    delete();
}

// edit表示
if(!empty($_POST["edit"]) && isset($_POST["edit_btn"])) {
    $showEdit = showEdit();
    foreach($showEdit as $row) {
        $edit_num = $row['id'];
        $edit_name = $row['name'];
        $edit_comment = $row['comment'];
    }
}
?>