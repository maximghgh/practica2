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
                $avto=mysqli_fetch_array($run_avto);
                $name=$avto['name'];
                $_SESSION['name']=$name;
                header("Location:/dashboard.php"); 
            }
            elseif($avto_avt==0){
                $_SESSION['error_av']="Данные не верны";
                header("Location:/index.php"); 
            }
        }
        else{
            $_SESSION['error_av']="Заполните все поля";
            header("Location:/index.php"); 
        }
    }

?>