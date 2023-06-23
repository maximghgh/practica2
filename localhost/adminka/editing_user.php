<?php

    include "controllers/db.php";

    $tt=$_GET['tt'];
    if($tt){
        $_SESSION['tt']=$tt;
    }
    $tty=$_SESSION['tt'];
    $out_users="SELECT * FROM `user` WHERE id='$tty'";
    $run_users=mysqli_query($connect, $out_users);
    $out=mysqli_fetch_array($run_users);
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
<form method="POST" action="../adminka/controllers/edit_user.php">
    <div class="forma">
        <h1>Редактирование профиля</h1>
        <input type="text" name="login" placeholder="Логин" value="<?=$out['login'];?>"><br>
        <input type="text" name="newpassword" placeholder="Новый Пароль"><br>
        <input type="text" name="renewpassword" placeholder="Подтверждение Нового Пароль"><br>
        <input type="text" name="surname" placeholder="Фамилия" value="<?=$out['surname'];?>"><br>
        <input type="text" name="name" placeholder="Имя" value="<?=$out['name'];?>"><br>
        <input type="submit"  class="add" name="app" value="Выполнить">
    </div>
    <?php             
        echo"<div align= center><font size=15px color=red>".$_SESSION['error_reg']."</font></div>";
        unset($_SESSION['error_reg']);
    ?>
</form>
