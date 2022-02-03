<?php

include_once('db-conn.php');
$sql =  "SELECT h.id as id,name,description,height,duration,created_at ,id_difficult as iddiff , d.difficulty as difficulty FROM hiking as h join difficulty as d ON h.id_difficult = d.id ";
$data = $dbconn->prepare($sql);
$data->execute();
$fetchdata = $data->fetchAll();
?>