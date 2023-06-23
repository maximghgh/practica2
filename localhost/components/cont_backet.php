<?
    include './controlers/db.php';

    $user=$_SESSION['name'];
    $out_user="SELECT * FROM `user` WHERE name='$user'";
    $run_user=mysqli_query($connect, $out_user);
    $out=mysqli_fetch_array($run_user);

    $out_bas="SELECT * FROM `backet` WHERE id_user='$out[id]' AND status='1'";
    $run_bas=mysqli_query($connect, $out_bas);
?>
<div class="cont_backet">
    <?
        while($bas=mysqli_fetch_array($run_bas)){
            $del=$_GET['del'];
            $out_prod="SELECT * FROM `products` WHERE id='$bas[id_prod]'";
            $run_prod=mysqli_query($connect, $out_prod);
            $prod=mysqli_fetch_array($run_prod);
            $xx=$_GET['tt'];

            echo"
            <div class=prodc>
                <div>
                    <img class=img_p src=/assets/avatar/$prod[avatar]>
                </div>
                    <p>$prod[name_prod]</p>
                    <a class=name_prod href=product.php?xx=$prod[name_prod]>Подробнее о товаре</a>
                <form method=POST action=/controlers/add_prod.php?xy=$prod[id]>
                    <a href=product.php?xx=$prod[name_prod]></a>
                    <a href=controlers/del.php?del=$bas[id]>Удалить товар</a>
                </form>
            </div>
            ";
        }
    ?>
    

</div>
<a href="order.php" class="knopka">Оформить</a>
<a href="prod.php" class="knopka">Вернуться к товарам</a>

