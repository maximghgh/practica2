<?php

    include "controllers/db.php";

    $tt=$_GET['tt'];
    if($tt){
        $_SESSION['tt']=$tt;
    }
    $tty=$_SESSION['tt'];
    $out_cat="SELECT * FROM `categories` WHERE id='$tty'";
    $run_cat=mysqli_query($connect, $out_cat);
    $out=mysqli_fetch_array($run_cat);
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
<form method="POST" action="../adminka/controllers/edit_cat.php">
    <div class="forma">
        <h1>Редактирование профиля</h1>
        <input type="text" name="name_cat" placeholder="Логин" value="<?=$out['name_cat'];?>"><br>
        <input type="submit"  class="add" name="gg" value="Редактировать">
    </div>
    <?php             
        echo"<div align= center><font size=15px color=red>".$_SESSION['error_cet']."</font></div>";
        unset($_SESSION['error_cet']);
    ?>
</form>