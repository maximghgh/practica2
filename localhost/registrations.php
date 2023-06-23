<?php
    include "controlers/db.php";
    include "controlers/add.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/assets/style.css">
    <title>Document</title>
</head>
<body>
<form method="POST" action="controlers/add.php">
    <div class="forma">
        <h1>Регистрация</h1>
        <input type="text" name="login" placeholder="Логин"><br>
        <input type="password" name="password" placeholder="Пароль"><br>
        <input type="text" name="surname" placeholder="Фамилия"><br>
        <input type="text" name="name" placeholder="Имя"><br>
        <input type="radio" class="sex" name="sex" value="1">М
        <input type="radio" class="sex" name="sex" value="2">Ж<br>
        <input type="submit"  class="add" name="add" value="Выполнить">
    </div>
    <?php   
          
        echo"<div align= center><font size=15px color=red>".$_SESSION['error_reg']."</font></div>";
        unset($_SESSION['error_reg']);
    ?>
</form>