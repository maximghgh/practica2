<?
    include 'application/model/db.php';
    if(!$_SESSION['users'])
    {
        header("Location:/task");
        exit();
    }
    elseif($_POST)
    {
        header("Location:/task");
    }


 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style.css">
    <title>TaskList</title>
</head>
<body>
    <div class="wrapper">
        <header>
            <div>Привет, <?=$_SESSION['users']['login']?></div>
            
            <a href="../models/exit.php">Выйти с аккаунта</a>
        </header>
        <div class="info">
            <h1>Задания</h1>
            <h3>Добавить задание</h3>
        </div>
        <div class="main">
            <div class="tasks">
                    <form method="POST">
                    <textarea name="description" placeholder="Название задачи"></textarea>
                    <input type="submit" name="send" value="Добавить">
                </form>
                <?
                $id_users=$_SESSION['users']['id'];
                $connect=mysqli_connect('localhost','root','','tasklist');

                $str_tasks="SELECT * FROM `tasks` where `user_id`='$id_users'";
                $run_tasks=mysqli_query($connect,$str_tasks);
                $out_taski=mysqli_fetch_array($run_tasks);
                echo "
                <div class=all>
                    <a class=error href=/task/delalltask/?id_tasal=$id_users>Удалить все</a>
                ";
                if($out_taski['status']== 0){
                    echo "
                        <a class=good href=/task/statusall/?id_statusal=$id_users&status=$out_taski[status] class=error>Выполнить все</a>
                    ";
                }
                elseif($out_taski['status']== 1){
                    echo "
                        <a class=error href=/task/statusallno/?id_statusalno=$id_users&status=$out_taski[status] class=good>Отменить все</a>
                    ";
                }
                echo "
                    </div>
                ";
                    $connect=mysqli_connect('localhost','root','','tasklist');
                    $id_users=$_SESSION['users']['id'];

                    $str_tasks="SELECT * FROM `tasks` where `user_id`='$id_users'";
                    echo $str_tasks; 
                    $run_tasks=mysqli_query($connect,$str_tasks);

                    while($out_tas=mysqli_fetch_array($run_tasks)){
                        echo"
                        <div class=task>
                            <div>
                                <p>$out_tas[description]</p>
                                <div class=actions>
                                    <a class=error href=/task/del/?id_tas=$out_tas[id]>Удалил</a>";
                                    $color = "green";
                                    if($out_tas['status']== 0){
                                        echo"
                                            <a class=good href=application/model/status.php?id_task=$out_tas[id]&status=$out_tas[status] class=error>Готово</a> 
                                        ";
                                        $color="red";
                                    }
                                    elseif($out_tas['status']== 1){
                                        echo "
                                            <a class=error href=application/model/status.php?id_task=$out_tas[id]&status=$out_tas[status]' class=good>Отменить</a>
                                        ";
                                    }
                                echo "    
                            </div>
                                </div>
                                    <div class='status $color'></div>
                            </div>
                        ";
                    }
                ?>
                <div id="1">
                <?
                    echo $_SESSION['good'];
                    unset($_SESSION['good']);
                ?>  
                </div>
                <script>
                    setTimeout(function(){
                        document.getElementById('1').style.display="none";
                    }, 5000);
                </script>
            </div>
       </div>
    </div>
</body>
</html>