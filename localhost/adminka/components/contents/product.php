<?
    include "../../controllers/db.php";
    include "../../controllers/edit_user.php";
?>
<h2 class="h2_user">Добавление пользователя</h2>
<div class="user_add_upd">


<form method="POST" action="../../adminka/controllers/add_user.php">
    <div class="forma">
        <p class="rege">Регистрация</p>
        <input type="text" name="login" placeholder="Логин"><br>
        <input type="text" name="password" placeholder="Пароль"><br>
        <input type="text" name="surname" placeholder="Фамилия"><br>
        <input type="text" name="name" placeholder="Имя"><br>
        <input type="radio" class="sex" name="sex" value="1">М
        <input type="radio" class="sex" name="sex" value="2">Ж<br>
        <input type="submit"  class="add" name="add" value="Регистрация">
    </div>

    <?php    
        echo"<div class=error_rig><font size=5px color=green>".$_SESSION['error_rig']."</font></div>";
        unset($_SESSION['error_rig']);
        echo"<div class=error_reg><font size=5px color=red>".$_SESSION['error_reg']."</font></div>";
        unset($_SESSION['error_reg']);
    ?>
</form>


<?
// вывод пользвателей

$del=$_GET['del'];
$del_bas="DELETE FROM `user` WHERE `user`.`id`=$del";
$run_bas=mysqli_query($connect, $del_bas);
if($run_bas){
    echo"<font class=error_rig color=red size=5px>Пользователь удален!</font>";
}


$count_row=10;
$page_id=$_GET['page_id'];
$page=$page_id*$count_row;
$out_users_str="SELECT * FROM `user` LIMIT $page,$count_row";
$run_users_str=mysqli_query($connect, $out_users_str);


?>

<table class="tableuser" border= '2px' width='700px'>
    <tr>
        <th>id</th>
        <th>Логин</th>
        <th>Пароль</th>
        <th>Фамилия</th>
        <th>Имя</th>
        <th>Пол</th>
        <th>Статус</th>
        <th>Удалить</th>
        <th>Изменить</th>
    </tr>
<?
    $num=$page;
    while($out=mysqli_fetch_array($run_users_str)){
        $num++;
        switch($out['sex'])
        {
            case'1':
                $sex="Мужской";
            break;
            case'2':
                $sex="Женский";
            break;
            default:
                $sex="Не указан или указан не верно";
            break;
        }
        switch($out['status']){
            case'1':
                $status="Администратор";
            break;
            case'2':
                $status="Пользователь";
            break;
            case'0':
            default:
                $status="Не определен";
            break;
        }
        echo"
        <tr align=center>
            <td>$num
            <td>$out[login]
            <td>$out[password]
            <td>$out[surname]
            <td>$out[name]
            <td>$sex
            <td>$status
            <td><a href='?del=$out[id]'>Удалить</a>
            <td><a href='../../adminka/editing_user.php?tt=$out[id]'>Изменить</a>
        </tr>
        ";
    }
?>
</table>
    <div class="pagination">
        <?
            $str_out_user="SELECT * FROM `user`";
            $run_out_user=mysqli_query($connect, $str_out_user);
            $count_users=mysqli_num_rows($run_out_user);
            $count_user=ceil($count_users/$count_row);
            $p=0;
                for($i=0; $i < $count_user; $i++){
                    $p++;
                    echo"<a class=pagep href=?page_id=$i>$p</a>";
                }
        ?>
    </div>
</div>