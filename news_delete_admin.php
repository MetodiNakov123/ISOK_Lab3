<?php

include_once("database.php");

$newsID = $_GET["news_id"];

$stmt = $pdo -> prepare("DELETE FROM news WHERE news_id = ?");
$stmt -> execute([$newsID]);

header("Location: /lab03_161041/admin_view.php");
