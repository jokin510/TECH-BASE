<?php
// データベース接続関数
function dbConnect() {
    $dsn = "DATABASE";
    $user = "USER";
    $password = "PASSWORD";
    $opt = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
        ];
    
    try {
        
        $dbh = new PDO($dsn, $user, $password, $opt);
        return $dbh;
    } catch(PDOException $e) {
        echo 'connection failed.'.$e->getMessage();
        exit();
    };
}

// テーブル作成関数
function createTable() {
    $dbh = dbConnect();
    
    $sql = 'CREATE TABLE IF NOT EXISTS mission5 (
        id INT auto_increment primary key,
        name char(32),
        comment text,
        time timestamp,
        password varchar(16)
        )';
        
    $res = $dbh->query($sql);
    if($res == true){
        echo 'Connection successful (Table is available)';
    }else{
        echo 'not ok';
    }
    
    $dbh = null;
}

// INSERT関数（投稿で使用）
function insert() {
    $dbh = dbConnect();
    
    $date = date("Y/n/d H:i:s");
    
    $sql = 'INSERT INTO mission5(name, comment, time, password) VALUES(:name, :comment, :time, :password)';
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(":name", $name, PDO::PARAM_STR);
    $stmt->bindParam(":comment", $comment, PDO::PARAM_STR);
    $stmt->bindParam(":time", $date, PDO::PARAM_STR);
    $stmt->bindParam(":password", $password, PDO::PARAM_STR);
    $name = $_POST["name"];
    $comment = $_POST["comment"];
    $password = $_POST["password1"];
    $result = $stmt->execute();
    
    return $result;
    
    $dbh = null;
    
}

// DELETE関数（削除で使用）
function delete() {
    $dbh = dbConnect();
    
    $delete_num = $_POST["delete_num"];
    $password = $_POST["password2"];
    
    $sql = 'DELETE FROM mission5 WHERE id = :delete_num && password = :password';
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(":delete_num", $delete_num, PDO::PARAM_INT);
    $stmt->bindParam(":password", $password, PDO::PARAM_STR);
    $result = $stmt->execute();
    
    return $result;
    
    $dbh = null;
}


// UPDATE関数（編集投稿で使用）
function update() {
    $dbh = dbConnect();
    
    $id = $_POST["edit_num"];
    $name = $_POST["name"];
    $comment = $_POST["comment"];
    $date = date("Y/n/d H:i:s");
    $password = $_POST["password1"];
    
    $sql = 'UPDATE mission5 SET name = :name, comment = :comment, time = :time, password = :password WHERE id = :id';
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
    $stmt->bindParam(':time', $date, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    $result = $stmt->execute();
    
    return $result;
    
    $dbh = null;
}

// showEdit関数（編集表示で使用）
function showEdit() {
    $dbh = dbConnect();
    
    $edit = $_POST["edit"];
    $password = $_POST["password3"];
    
    $sql = 'SELECT * FROM mission5 WHERE id = :edit and password = :password';
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':edit', $edit, PDO::PARAM_INT);
    $stmt->bindParam(":password", $password, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
    
    $dbh = null;
}

// SELECT関数（クライアント表示で使用）
function select() {
    $dbh = dbConnect();
    
    $sql = 'SELECT * FROM mission5';
    $stmt = $dbh->query($sql);
    $result = $stmt->fetchAll();
    return $result;
    
    $dbh = null;
}
// テーブル作成
createTable();

?>