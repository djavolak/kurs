<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

$config = include("config.php");
include("functions.php");

$db = connectToDatabase($config['db']);
	
$users[0] = ['userId' => 1, 'fullname' => 'Milos Jovanov', 'gender' => 2, 'birthdate' => '08-11-1983'];
$users[1] = ['userId' => 2, 'fullname' => 'Aco Gagić', 'gender' => 2, 'birthdate' => '08-11-1983'];

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
                    <li>
                        <a href="list.php?userId=<?=$user['userId']?>" title="<?=$user['fullname']?>"><?=$user['fullname']?></a> | <?=$user['birthdate']?>
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