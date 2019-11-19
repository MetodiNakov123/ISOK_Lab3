<?php
//prikazi komentari

include_once ("database.php");
$newsID = $_GET["news_id"];

$stmt = $pdo->prepare("SELECT * FROM comments WHERE news_id = ? AND approved = 1");
$stmt->execute([$newsID]);
$listaKomentari = $stmt->fetchAll( PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html>
    <body>
    <h3>Komentari</h3>
    <?php foreach ($listaKomentari as $komentar): ?>
    <div style="border: 1px solid red">
        <h5>Avtor:</h5>
        <p><?= $komentar->author ?></p>

        <h5>Komentar:</h5>
        <p><?= $komentar->comment ?></p>

        <br/>
    </div>
    <?php endforeach; ?>

    <h3>DODAJ KOMENTAR</h3>
    <form action="" method="POST">
        <label>Avtor </label>
        <input type="text" name="avtor"/>
        <br/>

        <label>Komentar</label>
        <textarea name="komentar"></textarea>
        <br/>
        <button type="submit">Vnesi komentar</button>
    </form>



    <a href="../index.php">Nazad kon statiite</a>
    </body>
</html>

<?php
    $avtor = "";
    $komentar = "";

    if(!empty($_POST)){
        if(!empty($_POST["avtor"]) && !empty($_POST["komentar"])){
            $avtor = $_POST["avtor"];
            $komentar = $_POST["komentar"];
            $stmt = $pdo->prepare("INSERT INTO comments (comment_id, news_id, author, comment, approved) VALUES (null,?,?,?,0) ");
            $stmt->execute([$newsID,$avtor,$komentar]);
            header("Location: /lab03_161041/index.php");
        }
    }

