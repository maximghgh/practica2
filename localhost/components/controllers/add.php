<?php

include "db.php";

$user=$_POST['user'];

$login=$_POST['login'];
$password=$_POST['password'];
$surname=$_POST['surname'];
$name=$_POST['name'];
$sex=$_POST['sex'];
$add=$_POST['add'];

$str_add_user="INSERT INTO `user` (`login`, `password`, `surname`, `name`, `sex`,`created_at`, `updated_at`) 
VALUES ('$login', '$password', '$surname', '$name', '$sex',CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
        
echo $run_add_user ;
if($add){
    if($login && $password && $surname && $name && $sex)
    {
        $run_add_user=mysqli_query($connect, $str_add_user);

            if($run_add_user)
                {
                    $_SESSION['name']=$name;
                    echo"<div align= center><font size=15px color= green>Пользователь Зарегистрирован!!!</font></div>";
                    header("Location:/dashboard.php");                    
                }
            else
                {
                    $_SESSION['error_reg']="Ошибка добавления, ждите!";
                    header("Location:/registrations.php");                      
                }
    }
    else
    {
        $_SESSION['error_reg']="Заполните все поля";
        header("Location:/registrations.php");  
    }

    
}
?>

