<?php
session_start();
if(isset($_SESSION['logged']) && $_SESSION['logged'] === true){
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
<body class="hikes">
    <a href="./db/destroy-session.php">logout</a>
    <table class="data">
        <tr>
        <th>id</th>
        <th>name</th>
        <th>difficulty</th>
        <th> description</th>
        <th>height</th>
        <th>duration</th>
        <th>created at</th>
        <th>update</th>
        <th>delete</th>

        </tr>
        <?php

        include_once('./db/display-hikes.php');

foreach($fetchdata as $row){
            ?>
            <tr>
            <td><?php print_r($row['id'])?></td>
            <td><?php print_r($row['name'])?></td>
            <td><?php print_r($row['difficulty'])?></td>
            <td><?php print_r($row['description'])?></td>
            <td><?php print_r($row['height'])?></td>
            <td><?php print_r($row['duration'])?></td>
            <td><?php print_r($row['created_at'])?></td>
            <td><a href="./update_form.php?id=<?php print_r($row['id'])?>&name=<?php print_r($row['name'])?>&difficulty=<?php print_r($row['iddiff'])?>&description=<?php print_r($row['description'])?>&height=<?php print_r($row['height'])?>&duration=<?php print_r($row['duration'])?> ">update</a></td>
            <td><a href="./db/delete.php?id=<?php print_r($row['id'])?>">delete</a></td>
            </tr>

<?php } ?>
           
        
       
    </table>
<h2 style="text-align:center">new entry</h2>
    <form action="./db/add-hikes.php" method="POST" class="form-hikes" >

<label for="name"></label>
<input type="text" name="name" placeholder="name">
<select type="text" name="difficulty">
<option value="1">facile</option>
<option value="2">normal</option>
<option value="3">difficile</option>
<option value="4">très difficile</option>
</select>
<input type="text" name="description" placeholder="description" >
<input type="number"  name="height" placeholder="height">
<input type="number" name="duration" placeholder="duration">
<input type="submit" >
    </form>
</body>
</html>
<?php }else{
    header('location: index.php');
} ?>