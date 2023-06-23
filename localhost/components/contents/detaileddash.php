<?php
    include "/controlers/db.php";
?>
<div class="detailed">
    <?
        $xx=$_GET['xx'];
        $out_prod_det="SELECT * FROM `products` where id='$xx'";
        $run_prod_det=mysqli_query($connect, $out_prod_det);

        while($out=mysqli_fetch_array($run_prod_det)){
            $xy=$_GET['xy'];
            echo "
                <div>
                    <img class=img_deta src=assets/avatar/$out[avatar]>
                </div>
            <div class=info_detal>
                <h1 class=h2_deta>$out[name_prod]</h1>
                    <p class=desc_deta>Описание:<br>$out[description]</p>
                        <p class=price_deta>Цена: $out[price]</p>
                        <p>Чтобы добавить товар и формить заказ нужно<br>нужно зарегистрироваться или зайти в аккаунт</p>
                    <a class=backer href=index.php>Зайти в аккаунт</a>
                    <a class=backek href=proddash.php>Вернуться к товарам</a>
            </div>";
        }
    ?>
</div>