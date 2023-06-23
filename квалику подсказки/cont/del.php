<?

    include "db.php";

    $del_zay=$_GET['del_zay'];

    $del="DELETE FROM `zayvka` WHERE `id`='$del_zay' ";
    $run_del=mysqli_query($connect, $del);
    
    if($run_del)
    {
        $_SESSION['error']="Заявка удалена";
        header("Location:/content/task.php");

    }


?>