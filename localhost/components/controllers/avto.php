<?php
    include "db.php";

    $login=$_POST['login'];
    $password=$_POST['password'];
    $send=$_POST['send'];

    $str_avto="SELECT * FROM `user` WHERE login='$login' AND password='$password' ";


    if($send){
        if($login && $password){
            $run_avto=mysqli_query($connect,$str_avto);
            $avto_avt=mysqli_num_rows($run_avto);
            if($avto_avt==!0){
                $avto=mysqli_fetch_array($avto_avt)
                $name_av=$avto['name'];
                $_SESSION['name']=$name_av;
                header("Location:/dashboard.php"); 
            }
            elseif($avto_avt==0){
                $_SESSION['error_reg']="Такого пользователя не существует";
                header("Location:/index.php"); 
            }
        }

        else{
            $_SESSION['error_reg']="Заполните все поля";
            header("Location:/index.php");  
        }

    }


?>