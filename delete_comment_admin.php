<?php

include_once ("database.php");

$commentID = $_GET["comment_id"];
$newID = $_GET["new_id"];

if (!empty($_GET["comment_id"]) && !empty($_GET["new_id"])){
    $stmt = $pdo -> prepare("DELETE FROM comments WHERE comment_id = ?");
    $stmt -> execute([$commentID]);
    header("Location: /lab03_161041/news_comments_admin.php/?news_id=$newID");
}
