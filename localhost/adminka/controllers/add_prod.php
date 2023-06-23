<?php

include "db.php";

$name_prod=$_POST['name_prod'];
$avatar=$_POST['avatar'];
$catigories=$_POST['catigories'];
$description=$_POST['description'];
$price=$_POST['price'];
$pop=$_POST['pop'];

$str_add_prod="INSERT INTO `products`(`name_prod`, `avatar`, `catigories`, `description`, `price`, `created_at`, `updated_at`) 
VALUES ('$name_prod','$avatar','$catigories','$description','$price',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP)";

if($pop){
    if($name_prod && $avatar && $catigories && $description && $price)
    {
        $run_add_prod=mysqli_query($connect, $str_add_prod);
        
            if($run_add_prod)
                {
                    $_SESSION['error_prod']="Товар добавлен!";
                    header("Location:../../adminka/user.php");  
                }
            else
                {
                    $_SESSION['error_prods']="Ошибка добавления, ждите!";
                    header("Location:../../adminka/user.php");  
                }
    }
    else
    {
        $_SESSION['error_prods']="Заполните все поля";
        header("Location:../../adminka/user.php");  
    }  
}
?>