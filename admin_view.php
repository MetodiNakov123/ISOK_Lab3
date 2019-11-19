<?php

include_once ("database.php");

$stmt = $pdo->query("SELECT * FROM news");
$listaNews = $stmt -> fetchAll(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html>
<head>
    <style>
        table, tr, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
<div>
    <a href="index.php">Public view</a> <br/>
    <a href="admin_view.php">Admin view</a> <br/>
    <a href="create_post.php">Kreiraj post</a> <br/>

</div>

<h1>NEWS ADMIN PANEL</h1>
<br/>
<table>
    <tr>
        <td>News ID</td>
        <td>Date</td>
        <td>News title</td>
        <td>News article</td>
        <td>Comments</td>
        <td>Edit</td>
        <td>Delete</td>
    </tr>

    <?php foreach ($listaNews as $red): ?>
        <tr>
            <td><?= $red->news_id?></td>
            <td><?= $red->date?></td>
            <td><?= $red->news_title?></td>
            <td><?= $red->full_text?></td>
            <?php
                $newsID = $red->news_id;
                $komentari = $pdo -> prepare("SELECT 1 FROM comments WHERE news_id = ? and approved = 0");
                $komentari -> execute([$newsID]);
                $brKomentari = $komentari -> rowCount();
            ?>
            <td><a href="news_comments_admin.php/?news_id=<?= $red->news_id; ?>">New comment(<?= $brKomentari ?>)</a></td>
            <td> <a href="news_edit_admin.php/?news_id=<?= $red->news_id; ?>">Edit</a></td>
            <td> <a href="news_delete_admin.php?news_id=<?= $red->news_id; ?>">Delete</a></td>

        </tr>
    <?php endforeach; ?>




</table>
</body>
</html>