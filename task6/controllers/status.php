<?

    include "db.php";

    $id_task=$_GET['id_task'];
    $status=$_GET['status'];

    if($id_task){
        if($status==0){
            $upd_tas="UPDATE `tasks` SET `status`='1' WHERE `id`='$id_task'";
            $run_upd_tas=mysqli_query($connect,$upd_tas);
            if($run_upd_tas){
                $_SESSION['good']="<font class=font color=green>Задание выполнено</font>";
            }
            else{
                $_SESSION['good']="<font class=font color=red>Ошибка выполнения</font>";
            }
        }
    elseif($status==1){
        $upd_tas="UPDATE `tasks` SET `status`='0' WHERE `id`='$id_task'";
        $run_upd_tas=mysqli_query($connect,$upd_tas);
            if($run_upd_tas){
                $_SESSION['good']="<font class=font color=green>Задание окозалось не доделанным</font>";
            }
            else{
                $_SESSION['good']="<font class=font color=red>Ошибка выполнения</font>";
            }
    
    }
}

    $id_statusal=$_GET['id_statusal'];
    $id_users=$_SESSION['users']['id'];

    if($id_statusal)
        if($status==0){
            $upd_tas="UPDATE `tasks` SET `status`='1' WHERE `user_id`='$id_users'";
            $run_upd_tas=mysqli_query($connect,$upd_tas);
            if($run_upd_tas){
                $_SESSION['good']="<font class=font color=green>Все задания выполнены</font>";
            }
            else{
                $_SESSION['good']="<font class=font color=red>Ошибка выполнения</font>";
            }
        }
        elseif($status==1){
            $upd_tas="UPDATE `tasks` SET `status`='0' WHERE `user_id`='$id_users'";
            $run_upd_tas=mysqli_query($connect,$upd_tas);
            if($run_upd_tas){
                $_SESSION['good']="<font class=font color=green>Все задания отменены</font>";
            }
            else{
                $_SESSION['good']="<font class=font color=red>Ошибка выполнения</font>";
            }
        }
    
header("Location:/index.php");
?>