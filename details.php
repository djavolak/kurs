<?php

include("bootstrap.php");

$user = getUserFromDb($db, $_GET['userId']);
//$user = (array) getUserFromFile((int) $_GET['userId']);


?>
<!DOCTYPE html>
<html>	
	<head>
        <title>Uspešno završen kurs</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="main.css" >
	</head>
    <body>
        <div id="mainWrapper">

            <div id="header">
                <div id="imageWrapper">
                    <img src="https://jugaad.ae/assets/images/icons/addtocart232.gif" alt="check" width="180" />
                </div>
                <div id="taglineWrapper">
                    <h1>Potvrda o uspešno odslušanom kursu</h1>
                </div>
                <div id="nameWrapper">
                    <span><?=$user['fullname']?></span>
                </div>
            </div>
            <div id="content">
                <p>Ovim se potvrdjuje da je <em><?=$user['fullname']?></em> prisustvovao i uspešno <?php if ($user['gender'] === 1) { echo 'odlušala'; } else { echo 'odlušao'; } ?> kurs.</p>
            </div>
            <div id="footer">
                <p>organizator: PHP Srbija u saradnji sa Kancelarijom za mlade opštine Savski Venac</p>
            </div>
        </div>
    </body>
</html>