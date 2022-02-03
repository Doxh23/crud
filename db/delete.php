<?php
$get = $_GET;
$id = $get['id'];
include_once('db-conn.php');
$sqldelete = "DELETE FROM HIKING WHERE ID = $id";
$deletedata = $dbconn->prepare($sqldelete);
$deletedata->execute();
header('location: ../hikes.php')

?>