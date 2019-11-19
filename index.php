<?php
   include_once ("database.php");

   $stmt = $pdo -> query("SELECT * FROM news");
   $listaNews = $stmt->fetchAll(PDO::FETCH_OBJ);

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

    </div>

    <h1>PUBLIC VIEW</h1>
    <br/>
    <table>
        <tr>
            <td>News ID</td>
            <td>Date</td>
            <td>News title</td>
            <td>News article</td>
            <td></td>
        </tr>

        <?php foreach ($listaNews as $red): ?>
        <tr>
            <td><?= $red->news_id?></td>
            <td><?= $red->date?></td>
            <td><?= $red->news_title?></td>
            <td><?= $red->full_text?></td>
            <td><a href="news-view-comments.php/?news_id=<?= $red->news_id; ?>">DODAJ KOMENTAR i vidi drugi komentari</a></td>
        </tr>
        <?php endforeach; ?>




    </table>

</body>
</html>
