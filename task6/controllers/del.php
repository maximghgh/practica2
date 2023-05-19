<?
    include "db.php";

    $id_tas=$_GET['id_tas'];    

    if($id_tas)
    {
        $del_tas="DELETE FROM `tasks` WHERE `id`='$id_tas'";
        $run_del=mysqli_query($connect, $del_tas);

        if($run_del)
        {
            $_SESSION['good']="<font class=font color=green>Объявление удалено</font>";
        }
        else
        {
            $_SESSION['good']="<font class=font color=red>Удалить не удалось</font>";
        }
    }

    $id_users=$_SESSION['users']['id'];
    $id_tasal=$_GET['id_tasal'];

    if($id_tasal)
    {
        $del_tas="DELETE FROM `tasks` WHERE `user_id`='$id_users'";
        $run_del=mysqli_query($connect, $del_tas);
        if($run_del)
        {
            $_SESSION['good']="<font class=font color=green>Все объявления удалены</font>";
        }
        else
        {
            $_SESSION['good']="<font class=font color=red>Удалить не удалось</font>";
        }
    }
    header("Location:/index.php");
?>