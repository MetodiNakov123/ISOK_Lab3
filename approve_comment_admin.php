<?php

include_once ("database.php");

$commentID = $_GET["comment_id"];
$newID = $_GET["new_id"];
if(!empty($_GET["comment_id"])){
    $stmt = $pdo-> prepare("UPDATE comments SET approved=1 WHERE comment_id = ?");
    $stmt -> execute([$commentID]);
    header("Location: /lab03_161041/news_comments_admin.php/?news_id=$newID");
}
