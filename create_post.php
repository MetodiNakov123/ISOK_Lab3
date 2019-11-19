<?php

include_once ("database.php");

$naslov = "";
$tekst = "";

if (!empty($_POST)){
    if(!empty($_POST["naslov"]) && !empty($_POST['tekst'])){
        $naslov = $_POST["naslov"];
        $tekst = $_POST['tekst'];
        $date = date_format(date_create(), "Y-m-d H:i:s");
        $stmt = $pdo->prepare("INSERT INTO news (news_id,date ,news_title, full_text) VALUES (null, ?, ?, ?)");
        $stmt->execute([$date, $naslov, $tekst]);
        header("Location: /lab03_161041/admin_view.php");
    }
}

?>

<!DOCTYPE html>
<html>
<body>
    <h1>News Admin Panel</h1>
    <form action="" method="POST">
        <h1>NOVA STATIJA</h1>
        <br/>

        <label>Naslov </label>
        <input type="text" name="naslov">
        <br/>

        <label>Tekst</label>
        <textarea name="tekst"></textarea>

        <br/><br/>
        <button type="submit">Dodadi</button>

        <br/> <br/>
        <a href="admin_view.php">Nazad</a>

    </form>
</body>

</html>

