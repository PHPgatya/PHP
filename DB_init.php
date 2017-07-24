<?php

require_once("Server_info.php");
$dsn = "mysql:host=$SERVER;dbname=$DB_NAME";
$db = new PDO($dsn, $USER, $PASS);

?>