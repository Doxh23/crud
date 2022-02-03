<?php
session_start();
if(isset($_SESSION['logged']) && $_SESSION['logged'] === true){

include_once('./db/db-conn.php');
$get = $_GET;
$id = $get['id'];
$name = $get['name'];
$difficulty = $get['difficulty'];
$description = $get['description'];
$height = $get['height'];
$duration = $get['duration'];
if(isset($_POST['name']) && isset($_POST['difficulty']) && isset($_POST['description']) && isset($_POST['height']) && isset($_POST['duration']) ){
$post = $_POST;
$namep = $post['name'];
$difficultyp = $post['difficulty'];
$descriptionp = $post['description'];
$heightp = $post['height'];
$durationp = $post['duration'];   
    $sqslupdate = "UPDATE HIKING SET name = '$namep' , id_difficult = $difficultyp , description = '$descriptionp' , height = $heightp , duration = $durationp where ID = $id ";
$updatedata = $dbconn->prepare($sqslupdate);
$updatedata ->execute();
header('location: hikes.php');
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./sass/style.css">
</head>
<body class="update">
    <div class="data">
        <a href="hikes.php">retour</a>
    <form action="" method="POST">
        <label for="name"> Name</label>
<input type="text" name="name" value="<?php print_r($name)?>">
<label for="difficulty"> difficulty</label>
<select type="text" name="difficulty" value="<?php print_r($difficulty)?>">
<option value="1">facile</option>
<option value="2">normal</option>
<option value="3">difficile</option>
<option value="4">tres difficile</option>
<label for="description">description</label>
<input type="text" name="description" value="<?php print_r($description)?>">
<label for="height"> height</label>
<input type="number" name="height" value="<?php print_r($height)?>">
<label for="duration"> duration</label>
<input type="number" name="duration" value="<?php print_r($duration)?>">
<input type="submit">
    </form>
    </div>
</body>
</html>
<?php }else{
    header('location: hikes.php');
} ?>