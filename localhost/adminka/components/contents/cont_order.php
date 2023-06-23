<?
    include "../../controllers/db.php";
    include "../../controllers/edit_user.php";
?>

<div class="order_add_upd">
<?
//вывод заказов 

$del=$_GET['del'];
$del_bas="DELETE FROM `order` WHERE `order`.`id`=$del";
$run_bas=mysqli_query($connect, $del_bas);
if($run_bas){
    echo"<font class=error_order color=red size=5px>Заказ удален!</font>";
}

$count_row=10;
$page_id=$_GET['page_id'];
$page=$page_id*$count_row;
$out_order_str="SELECT * FROM `order` LIMIT $page,$count_row";
$run_order_str=mysqli_query($connect, $out_order_str);

$ty=$_GET['ty'];
$updr="UPDATE `backet` SET `status`='1',`updated_at`=CURRENT_TIMESTAMP WHERE id='$ty'";
$updr_run=mysqli_query($connect, $updr);
$tz=$_GET['tz'];
$upd="UPDATE `backet` SET `status`='2',`updated_at`=CURRENT_TIMESTAMP WHERE id='$tz'";
$upd_run=mysqli_query($connect, $upd);
?>


<table class="tableuser" border= '2px' width='700px'>
    <tr>
        <th>id</th>
        <th>user</th>
        <th>Название товара</th>
        <th>Адрес</th>
        <th>Цена</th>
        <th>Удалить</th>
        <th>Статус</th>
    </tr>

<?
    $num=$page;
    while($out_or=mysqli_fetch_array($run_order_str)){
        $num++;

        

        $out_user="SELECT * FROM `user` where id=$out_or[id_user]";
        $run_user=mysqli_query($connect, $out_user);
        $users=mysqli_fetch_array($run_user);


        $out_back="SELECT * FROM `backet` WHERE id=$out_or[id_backet]";
        $run_back=mysqli_query($connect, $out_back);
        $back=mysqli_fetch_array($run_back);

        $out_prod="SELECT * FROM `products` WHERE id=$back[id_prod]";
        $run_prod=mysqli_query($connect, $out_prod);
        $prods=mysqli_fetch_array($run_prod);

        switch($out_or['status']){
            case'1':
                $status="Cборке";
            break;
            case'2':
                $status="Отправлен";
            break;
            case'0':
            default:
                $status="Приняли";
            break;
        }
        echo"<tr align=center>
            <td>$out_or[id]
            <td>$users[login]
            <td>$prods[name_prod]
            <td>$out_or[adress]
            <td>$out_or[price]
            <td><a href='?del=$out_or[id]'>Удалить</a>";
            if($back['status']==0){
                echo "
                    <td><a class=del_u href=order.php?ty=$back[id]>В сборке</a></td>
                </tr>";
            }
            elseif($back['status']==1){
                echo "
                    <td><a class=del_u href=order.php?tz=$back[id]>Отправить</a></td>
                </tr>";
            }
            elseif($back['status']==2){
                echo "
                    <td>Отправлен</td>
                </tr>";
            }
    }
?>
</table>
    <div class="pagination">
        <?
            $str_out_user="SELECT * FROM `order`";
            $run_out_user=mysqli_query($connect, $str_out_user);
            $count_users=mysqli_num_rows($run_out_user);
            $count_user=ceil($count_users/$count_row);
            $p=0;
                for($i=0; $i < $count_user; $i++){
                    $p++;
                    echo"<a class=pago href=?page_id=$i>$p</a>";
                }
        ?>
    </div>
</div>

