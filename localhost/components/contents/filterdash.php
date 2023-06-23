<?php
    include "/controlers/db.php";
?>

<div class="filter">
    <form method="POST" >
        <select name="cat" class="filter_cat">
            <option value="0">Все товары</option>
            <?php
                $out_cat="SELECT * FROM `categories`";
                $run_cat=mysqli_query($connect, $out_cat);
                while($cat=mysqli_fetch_array($run_cat)){
                    echo "
                        <option value=$cat[id]>$cat[name_cat]</option>
                    ";
                }
            ?>
        </select>
        <input class="but_cat" type="submit" name="but_cat" value="Применить">
    </form>
        <div class="proddash">
            <?php
                $catx=$_POST['cat'];
                $but_cat=$_POST['but_cat'];
                $out_prod="SELECT * FROM `products` WHERE catigories='$catx'";
                $out_prods="SELECT * FROM `products`";
                $run_prod=mysqli_query($connect, $out_prod);
                $run_prods=mysqli_query($connect, $out_prods);
                if($but_cat){
                    if($catx==0){
                        while ($out_p=mysqli_fetch_array($run_prods)) {
                            $xx=$_GET['xx'];
                            $xy=$_GET['xy'];
                            echo "
                                <div class=prodc_dash>
                                        <div>
                                            <img class=img_p src=/assets/avatar/$out_p[avatar]>
                                        </div>
                                    <p>$out_p[name_prod]</p>
                                    <a class=name_prod href=productdash.php?xx=$out_p[id]>Подробнее о товаре</a>
                                </div>

                            ";
                        }
                    }             
                    elseif($catx==!0){
                        while($out_p=mysqli_fetch_array($run_prod)){
                            $xg=$_GET['xx'];
                            echo "
                            <div class=prodc_dash>
                                    <div>
                                        <img src=/assets/avatar/$out_p[avatar]>
                                    </div>
                                    <p>$out_p[name_prod]</p>
                                    <a href=productdash.php?xx=$out_p[id]>Подробнее о товаре</a>
                                </div>
                            ";
                            }
                    }

                }
                    else {
                        while($out_p=mysqli_fetch_array($run_prods)){
                            $xg=$_GET['xx'];
                            echo "
                            <div class=prodc_dash>
                                    <div>
                                        <img src=/assets/avatar/$out_p[avatar]>
                                    </div>
                                <p>$out_p[name_prod]</p>
                                <a href=productdash.php?xx=$out_p[id]>Подробнее о товаре</a>
                            </div>
                        ";
                        }
                    }

            ?>
        </div>
</div>