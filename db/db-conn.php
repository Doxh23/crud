<?php

try{
    $dbconn = new PDO(
        'mysql:host=localhost:3306;dbname=hikes;charset=utf8',
        'root',
        'root',
    );
}catch(Exception $e){
 die( $e->getMessage());
}
?>