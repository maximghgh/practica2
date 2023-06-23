<?
    include "db.php";   

    $name_cat=$_POST['name_cat'];
    $gg=$_POST['gg'];

    $ter=$_SESSION['tt'];
    $out_edit="SELECT * FROM `user` WHERE id='$ter'";
    $run_edit=mysqli_query($connect, $out_edit);
    $out_us=mysqli_fetch_array($run_edit);
    $lol=$out_us['id'];

    $out_edit_cat="UPDATE `categories` SET `name_cat`='$name_cat',`updated_at`=CURRENT_TIMESTAMP WHERE id='$ter'";

    if($gg){
        if($name_cat)
        {
            $run_edit_cat=mysqli_query($connect, $out_edit_cat);
                if($run_edit_cat)
                {
                    unset($_SESSION['tt']);
                    header("Location:../../adminka/catigories.php"); 
                }
                else  
                {
                    $_SESSION['error_cet']="Ошибка добавления, ждите!";
                    header("Location:../../adminka/editing_cat.php");                      
                }
            }   
        else
        {
            $_SESSION['error_cet']="Заполни все поля!";
            header("Location:../../adminka/editing_cat.php"); 
        }
    }
?>