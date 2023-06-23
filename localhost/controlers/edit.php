<?php
    include "db.php"; 

    $login=$_POST['login'];
    $password=$_POST['password'];
    $newpassword=$_POST['newpassword'];
    $renewpassword=$_POST['renewpassword'];
    $surname=$_POST['surname'];
    $name=$_POST['name'];
    $app=$_POST['app'];

    $name_edit=$_SESSION['name'];
    $out_edit="SELECT * FROM `user` WHERE name='$name_edit'";
    $run_edit=mysqli_query($connect, $out_edit);
    $out_us=mysqli_fetch_array($run_edit);
    $lol=$out_us['id'];


    $out_edit_user="UPDATE `user` SET `login`='$login',`password`='$newpassword',`surname`='$surname',`name`='$name',`updated_at`= CURRENT_TIMESTAMP WHERE id='$lol'";


    if($app){
        if($login && $password && $newpassword && $renewpassword && $surname && $name){
            if($password == $out_us['password']){
                if($newpassword == $renewpassword){
                    $run_edit_user=mysqli_query($connect, $out_edit_user);
                if($run_edit_user){
                    $_SESSION['name']=$name;
                    header("Location:/profiledash.php"); 
                }
                else  {
                    $_SESSION['error_reg']="Ошибка добавления, ждите!";
                    header("Location:/editing.php");                      
                }
            }
            else{
                $_SESSION['error_reg']="Пароли не совпадают!";
                header("Location:/editing.php"); 
            }   
            }
            else{
                $_SESSION['error_reg']="Старый пароль неверный!";
                header("Location:/editing.php");     
            }
        }
        else{
            $_SESSION['error_reg']="Заполни все поля!";
            header("Location:/editing.php"); 
        }
    }
?>  
