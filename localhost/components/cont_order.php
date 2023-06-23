<?
    include 'controlers/db.php';

    $adress=$_POST['adress'];
    $knopka=$_POST['knopka'];
    $user=$_SESSION['name'];
    $out_user="SELECT * FROM `user` WHERE name='$user'";
    $run_user=mysqli_query($connect, $out_user);
    $out=mysqli_fetch_array($run_user);

    $out_bas="SELECT * FROM `backet` WHERE id_user='$out[id]' AND status='1'";
    $run_bas=mysqli_query($connect, $out_bas);

    $ps=0;

    while($bas=mysqli_fetch_array($run_bas)){
        $str_prod="SELECT * FROM `products` WHERE id='$bas[id_prod]'";
        $run_prod=mysqli_query($connect, $str_prod);
        $prod=mysqli_fetch_array($run_prod);
        $ps=$ps+$prod['price'];   
        if($knopka) {
            $str_or="INSERT INTO `order`(`id`, `id_user`, `id_backet`, `adress`, `price`, `created_at`, `updated_at`) VALUES (NULL,'$out[id]','$bas[id]','$adress','$ps',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP)";
            $run_or=mysqli_query($connect, $str_or);
            if($run_or){
                $good="Заказ добавлен";
                $upd="UPDATE `backet` SET `status`='0',`updated_at`=CURRENT_TIMESTAMP WHERE id=$bas[id]";
                $upd_run=mysqli_query($connect, $upd);
            }
            else{
                $error="Ошибка!";
            }
        }
    }




?>
<div class="aasaasadas"></div>
<form method="POST" action="" class="order"> 
    <?
    echo "<font class=name_order> Имя:".$out['name']."</font><br>";
    echo "<font class=price>Цена заказа:".$ps."</font>";
    ?><br>
    <input type="text"  class="adress_or" name="adress" placeholder="Адрес доставки"><br>
    <input type="submit" class="knopka_or" name="knopka" value="Заказать">
    <a href="backet.php" class="knopkao">Вернуться в корзину</a>
    <a href="prod.php" class="knopkao">Вернуться к товарам</a>
</form>