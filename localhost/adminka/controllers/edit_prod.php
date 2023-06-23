<?php
    include "db.php"; 

    $name_prod=$_POST['name_prod'];
    $avatar=$_POST['avatar'];
    $catigories=$_POST['catigories'];
    $description=$_POST['description'];
    $price=$_POST['price'];
    $app=$_POST['app'];

    $ter=$_SESSION['tt'];
    $out_edit="SELECT * FROM `products` WHERE id='$ter'";
    $run_edit=mysqli_query($connect, $out_edit);
    $out_us=mysqli_fetch_array($run_edit);
    $lol=$out_us['id'];

    $out_edit_prod="UPDATE `products` SET `name_prod`='$name_prod',`catigories`='$catigories',`description`='$description',`price`='$price',`updated_at`=CURRENT_TIMESTAMP WHERE id='$ter'";

    if($app){
        if($name_prod && $catigories && $description && $price)
        {
            $run_edit_prod=mysqli_query($connect, $out_edit_prod);
            if($run_edit_prod)
            {
                unset($_SESSION['tt']);
                header("Location:../../adminka/user.php"); 
            }
            else  
            {
                $_SESSION['error_prods']="Ошибка добавления, ждите!";
                header("Location:../../adminka/editing_prod.php");                      
            }
        }     
        else
        {
            $_SESSION['error_prods']="Заполни все поля!";
            header("Location:../../adminka/editing_prod.php"); 
        }
    }
?>  
