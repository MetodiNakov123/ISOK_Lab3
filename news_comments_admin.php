<?php

include_once ("database.php");

$newID = $_GET["news_id"];

if (!empty($_GET["news_id"])){

  $stmt = $pdo -> prepare("SELECT * FROM comments WHERE news_id = ? and approved=0");
  $stmt->execute([$newID]);
  $listaKomentari = $stmt -> fetchAll(PDO::FETCH_OBJ);
}

?>

<!DOCTYPE html>
<html>
<head>
    <style>
        table, tr, td{
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <h2>Nepotrvrdeni komentari</h2>

    <table>
        <tr>
            <td>Comment Id</td>
            <td>News Id</td>
            <td>Author</td>
            <td>Comment</td>
            <td>Delete</td>
            <td>Approve</td>
        </tr>

        <?php foreach ($listaKomentari as $komentar): ?>
        <tr>
            <td> <?= $komentar->comment_id; ?> </td>
            <td> <?= $komentar->news_id; ?> </td>
            <td> <?= $komentar->author; ?> </td>
            <td> <?= $komentar->comment; ?> </td>
            <td> <a href="../delete_comment_admin.php/?comment_id=<?= $komentar->comment_id; ?>&new_id=<?= $newID?>">Delete</a></td>
            <td> <a href="../approve_comment_admin.php/?comment_id=<?= $komentar->comment_id; ?>&new_id=<?= $newID?>">Approve</a></td>

        </tr>
        <?php endforeach; ?>
    </table>

    <br/>
    <a href="../admin_view.php">Nazad kon News Admin Panel</a>

</body>
</html>
