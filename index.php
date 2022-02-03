<?php 
include_once('./db/db-conn.php');
session_start();
if(isset($_SESSION['logged']) && $_SESSION['logged'] === true ){
    header('location: hikes.php');
}else{
    ini_set('display_errors', 0);
        ini_set('display_startup_errors', 0);
        error_reporting(-1);
if(isset($_POST['user']) && isset($_POST['password'])){
    $user = $_POST['user'];
    $password = $_POST['password'];
    $sqllogin = "SELECT user,password from users where user = '$user'";
    $logindata = $dbconn->prepare($sqllogin);
    $logindata->execute();
    $login = $logindata->fetchAll();
    if(($login[0]['user'] === $_POST['user']) && ($login[0]['password'] === $_POST['password'])){
       session_start();
       $_SESSION['logged'] = true;
       header('location: hikes.php');
    }
}
if((isset($_POST['register-user']) && $_POST['register-user'] !== "") && (isset($_POST['register-password']) && $_POST['register-password'] !== "") && isset($_POST['verif-password']) && $_POST['verif-password'] !== ""){
    $post = $_POST;
    $registerUser = $post['register-user']; 
    $registerPass = $post['register-password'];
    if($post['register-password'] === $post['verif-password']){
        $sqlregister = "SELECT * from users where user = '$registerUser' ";
        $registerdata = $dbconn->prepare($sqlregister);
        $registerdata->execute();
        $register = $registerdata->fetchAll();
        if($register[0]['user'] !== null){
            $fetchdata = $register[0]['user'];
        }else{
            $fetchdata = "";
        }
        if($registerUser !== $fetchdata ){
            $createsregsql = "INSERT INTO USERS (user,password) VALUES ('$registerUser','$registerPass')";
            $createreg = $dbconn->prepare($createsregsql);
            $createreg->execute();
        }else{
            echo " <script>alert('this name is already used')</script>";
        }
    }else{
        echo "<script> alert('the password does not match with the verification')</script>";

    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./sass/style.css">
    <title>Document</title>
</head>
<body class="index">
    <div class="form-index">
        <div class="login-register"> 
            <h2 id="connexion"  > login</h2>
            <h2  id="register" >register</h2>
        </div>
     
        <div class="form-register-login">
        <form action="" method="POST" class="form-login">
            <label for="username"> username</label> 
            <input type="text" name="user" placeholder="darksasuke96">
            <label for="password" >password</label>
            <input type="password" name="password" placeholder="password">
            <input type="submit" value="login">
            </form> 
            <form action="" method="POST" class="form-register">
            <label for="register-user"> User</label>
        <input type="text" name="register-user">
        <label for="register-password"> Password</label>
        <input type="password" name="register-password">
        <label for="verif-password"> confirm your password</label>
        <input type="password" name="verif-password">
        <input type="submit" value="register">
        </form>
        </div>
    </div>

</body>
<script src="./js/index.js"></script>
</html>
<?php
}
?>