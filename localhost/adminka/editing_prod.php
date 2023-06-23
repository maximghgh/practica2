<?php

    include "controllers/db.php";

    $tt=$_GET['tt'];
    if($tt){
        $_SESSION['tt']=$tt;
    }
    $tty=$_SESSION['tt'];
    $out_users="SELECT * FROM `products` WHERE id='$tty'";
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
<form method="POST" action="../adminka/controllers/edit_prod.php">
    <div class="forma">
        <h1>Редактирование Товара</h1>
        <input type="text" name="name_prod" placeholder="Название товара" value="<?=$out['name_prod'];?>"><br>
        <select name="catigories" class="filter_cat">
            <option value="0">Категория товара</option>
            <?php
                $out_cat="SELECT * FROM `categories`";
                $run_cat=mysqli_query($connect, $out_cat);
                while($cat=mysqli_fetch_array($run_cat)){
                    echo "
                        <option value=$cat[id]>$cat[name_cat]</option>
                    ";
                }
            ?>
        </select><br>
        <input type="text" name="description" placeholder="Описание" value="<?=$out['description'];?>"><br>
        <input type="text" name="price" placeholder="Цена" value="<?=$out['price'];?>"><br>
        <input type="submit"  class="add" name="app" value="Редактирование товар">
    </div>
    <?php             
        echo"<div align= center><font size=15px color=red>".$_SESSION['error_prods']."</font></div>";
        unset($_SESSION['error_prods']);
    ?>
</form>
