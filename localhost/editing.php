<?php

    include "controlers/db.php";
    include "controlers/edit.php";

    $name=$_SESSION['name'];
    $out_users="SELECT * FROM `user` WHERE name='$name'";
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
<form method="POST" action="controlers/edit.php">
    <div class="forma">
        <h1>Редактирование профиля</h1>
        <input type="text" name="login" placeholder="Логин" value="<?=$out['login'];?>"><br>
        <input type="password" name="password" placeholder="Старый Пароль"><br>
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

<a href="prod.php" class="knopka">Вернуться к товарам</a>
