<?php

include_once ("database.php");

$newsID = $_GET["news_id"];

$naslov = "";
$tekst = "";

$stmt = $pdo -> prepare("SELECT * FROM news WHERE news_id = ?");
$stmt->execute([$newsID]);
$new = $stmt->fetch(PDO::FETCH_ASSOC);

if(!empty($_POST)){
    if(!empty($_POST["naslov"]) && !empty($_POST["tekst"])){
        $naslov = $_POST["naslov"];
        $tekst = $_POST["tekst"];
        $stmt = $pdo -> prepare("UPDATE news SET news_title = ?, full_text = ? WHERE news_id = ?");
        $stmt->execute([$naslov,$tekst,$newsID]);
        header("Location: /lab03_161041/admin_view.php");
    }
}

?>

<!DOCTYPE html>
<html>
<body>
<form action="" method="POST">
    <h1>IZMENI STATIJA</h1>
    <br/>

    <label>Naslov </label>
    <input type="text" name="naslov" value="<?= $new["news_title"]; ?>">
    <br/>

    <label>Tekst</label>
    <textarea name="tekst"><?= $new["full_text"]?></textarea>

    <br/><br/>
    <button type="submit">PROMENI</button>

    <br/> <br/>
    <a href="../admin_view.php">Nazad</a>

</form>
</body>

</html>

