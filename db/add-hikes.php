<?php
include_once('db-conn.php');
$post = $_POST;

$name = $post['name'];
$difficulty = $post['difficulty'];
$description = $post['description'];
$height = $post['height'];
$duration = $post['duration'];
$date = date("Y-m-d H:i:s");
$sqladd = "INSERT INTO hiking (`id_difficult`,`name`,`description`,`height`,`duration`,`created_at`) VALUES ('$difficulty','$name','$description','$height','$duration','$date')";
$adddata = $dbconn->prepare($sqladd);
$adddata->execute();
header('location: ../hikes.php')

?>