<?php

session_start();
require "connection.php";

$sender = $_SESSION["user"]["email"];
$recever = $_POST["e"];
$msg = $_POST["t"];

$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date = $d->format("Y-m-d H:i:s");

Database::insUpdelete("INSERT INTO `chat`(`content`,`datetime`,`status`,`from`,`to`) VALUES 
('".$msg."','".$date."','0','".$sender."','".$recever."')");

echo ("success");

?>