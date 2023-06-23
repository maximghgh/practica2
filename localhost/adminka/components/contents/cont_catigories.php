<?
include "controllers/db.php";
include "../../controllers/edit_prod.php";
?>
<h2 class="h2_user">Добавление Товаров</h2>
<div class="user_add_cat">

<form method="POST" action="../../adminka/controllers/add_cat.php">
    <div class="forma_cat">
        <p class="rege">Регистрация</p>
        <input type="text" name="name_cat" placeholder="Названия категории"><br>
        <input type="submit"  class="add" name="gg" value="Добавить категорию">
    </div>
    <?php    
        echo"<div class=error_cat><font size=5px color=green>".$_SESSION['error_cat']."</font></div>";
        unset($_SESSION['error_cat']);
        echo"<div class=error_cet><font size=5px color=red>".$_SESSION['error_cet']."</font></div>";
        unset($_SESSION['error_cet']);
    ?>
</form>

<?
// вывод категорий

$del=$_GET['del'];
$del_bas="DELETE FROM `categories` WHERE `categories`.`id`=$del";
$run_bas=mysqli_query($connect, $del_bas);
if($run_bas){
    echo"<font class=error_cat color=red size=5px>Категория удалена</font>";
}


$count_row=10;
$page_id=$_GET['page_id'];
$page=$page_id*$count_row;
$out_cat_str="SELECT * FROM `categories` LIMIT $page,$count_row";
$run_cat_str=mysqli_query($connect, $out_cat_str);

?>
<table class="tableuser" border= '2px' width='700px'>
    <tr>
        <th>id</th>
        <th>Названия категории</th>
        <th>Удалить</th>
        <th>Изменить</th>
    </tr>
<?
    $num=$page;
    while($out=mysqli_fetch_array($run_cat_str)){
        $num++;
        echo"
        <tr align=center>
            <td>$num
            <td>$out[name_cat]
            <td><a href='?del=$out[id]'>Удалить</a>
            <td><a href='../../adminka/editing_cat.php?tt=$out[id]'>Изменить</a>
        </tr>
        ";
    }
?>
</table>
    <div class="pagination">
        <?
            $str_out_user="SELECT * FROM `categories`";
            $run_out_user=mysqli_query($connect, $str_out_user);
            $count_users=mysqli_num_rows($run_out_user);
            $count_user=ceil($count_users/$count_row);
            $p=0;
                for($i=0; $i < $count_user; $i++){
                    $p++;
                    echo"<a class=page href=?page_id=$i>$p</a>";
                }
        ?>
    </div>
</div>