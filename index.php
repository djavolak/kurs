<?php

include("bootstrap.php");

$users = getUsersFromDb($db);
//$users = getUsersFromFile();

?>
<!DOCTYPE html>
<html>	
	<head>
        <title>Spisak učesnika kursa</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="main.css" >
	</head>
    <body>
        <div id="mainWrapper">
            <div id="header">
                <h1>Kurs osnove HTML-a i PHP-a</h1>
            </div>
            <div id="content">
                <h2>Spisak učesnika kursa:</h2>
                <ul>
                    <?php foreach ($users as $user): ?>
                    <?php
                        // if file storage is used, cast user to array, since it will be of stdClass type
                        if (!is_array($user)) { $user = (array) $user; }
                    ?>
                    <li>
                        <a href="details.php?userId=<?=$user['userId']?>" title="<?=$user['fullname']?>"><?=$user['fullname']?></a> |
                        <?=date('d/m/Y', strtotime($user['birthdate']))?>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div id="footer">
                <p>organizator: PHP Srbija u saradnji sa Kancelarijom za mlade opštine Savski Venac</p>
            </div>
        </div>
    </body>
</html>