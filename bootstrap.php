<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

$config = include("config.php");
include("functions.php");

$db = connectToDatabase($config['db']);
