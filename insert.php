<?php

include("bootstrap.php");

if (isset($_POST['fullname'])) {
    $msg = 'Ucesnik je uspesno sacuvan.';
    if (!saveUserToDb($db, $_POST)) {
//    if (!saveUserToFile($_POST)) {
        $msg = 'Doslo je do greske prilikom snimanja ucesnika.';
    }
}
?>
<!DOCTYPE html>
<html>
	<head>
        <title>Spisak učesnika kursa</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="main.css?1234" >
	</head>
    <body>
        <div id="mainWrapper">
            <div id="header">
                <h1>Kurs osnove HTML-a i PHP-a</h1>
            </div>
            <div id="content">
                <h2>Unos novog ucesnika</h2>

                <p class="message"><?php if (isset($msg)) {
                    echo $msg;
                } ?></p>

                <form action="insert.php" method="post">
                    <label for="fullname">Ime</label>
                    <input type="text" name="fullname" placeholder="unesite puno ime" /> <br />
                    <label for="gender">Pol</label>
                    <input type="text" name="gender" placeholder="izaberite pol" /> <br />
                    <label for="email">Email</label>
                    <input type="text" name="email" placeholder="unesite email adresu" /> <br />
                    <label for="birthdate">Datum rodjenja</label>
                    <input type="text" name="birthdate" placeholder="datum rodjenja (YYYY-MM-DD)" /> <br />

                    <input type="submit" value="Snimi" />
                </form>
            </div>
            <div id="footer">
                <p>organizator: PHP Srbija u saradnji sa Kancelarijom za mlade opštine Savski Venac</p>
            </div>
        </div>
    </body>
</html>