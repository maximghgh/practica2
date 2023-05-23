<?
    include "db.php";
    $description=$_POST['description'];
    $send=$_POST['send'];
    $status=$_POST['status'];

    $id_users=$_SESSION['users']['id'];

    if($send){
        if($description){
        $str_task="INSERT INTO `tasks`(`user_id`, `description`, `created_at`, `status`) VALUES ('$id_users','$description',CURRENT_TIMESTAMP,'0')";
        echo $str_task;
        $run_task=mysqli_query($connect,$str_task);
        
            if($run_task){
                $_SESSION['good']="<font class=font color=green>Задание добавлено</font>";
                header("Location:/index.php"); 
            }
            else{
                $_SESSION['good']="<font class=font color=red>Не выполнено!</font>";
                header("Location:/index.php"); 
            }
        }
        echo $str_task;
        header("Location:/index.php"); 
    }
?>