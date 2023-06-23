<?
include "controllers/db.php";
include "../../controllers/edit_prod.php";
?>
<h2 class="h2_user">Добавление Товаров</h2>
<div class="user_add_prod">

<form method="POST" enctype="multipart/form-data">
    <div class="forma_prod">
        <p class="rege">Регистрация</p>
        <input type="text" name="name_prod" placeholder="Название товара"><br>
        <input type="file" name="avatar" placeholder="Название картинки товара"><br>
        <select name="catigories" class="filter_cat">
            <option value="0">Категория товара</option>
            <?php
                $out_cat="SELECT * FROM `categories`";
                $run_cat=mysqli_query($connect, $out_cat);
                while($cat=mysqli_fetch_array($run_cat)){
                    echo "
                        <option value=$cat[id]>$cat[name_cat]</option>
                    ";
                }
            ?>
        </select><br>
        <textarea name="description" rows="10"  placeholder="Описание" cols="50"></textarea><br>
        <input type="text" name="price" placeholder="Цена"><br>
        <input type="submit"  class="pop" name="pop" value="Добавить товар">
    </div>
<?php

$name_prod=$_POST['name_prod'];
$avatar=$_POST['avatar'];
$catigories=$_POST['catigories'];
$description=$_POST['description'];
$price=$_POST['price'];
$pop=$_POST['pop'];

$name=$_FILES['avatar']['name'];
$type=$_FILES['avatar']['type'];
$tmp_path=$_FILES['avatar']['tmp_name'];
$size=$_FILES['avatar']['size'];

$rand=rand(600,600);
$Ext=explode('.', $name);

$name=$Ext['0'];
$Ext=$Ext['1'];
$full_name="$name"."_$rand".".$Ext";
$path="../assets/avatar/$full_name";





if($pop){
    $str_add_prod="INSERT INTO `products`(`name_prod`, `avatar`, `catigories`, `description`, `price`, `created_at`, `updated_at`) VALUES ('$name_prod','$full_name','$catigories','$description','$price',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP)";
    if($name_prod && $full_name && $catigories && $description && $price){
        if($size<600000){
            if($type='image/jpeg'){
                $run_add_prod=mysqli_query($connect, $str_add_prod);
                    if($run_add_prod){
                        move_uploaded_file($tmp_path, $path);
                        echo"<div class=error_prod><font size=5px color=green>Товар добавлен!</font></div>";
                    }
                    else{
                        echo"<div class=error_reg><font size=5px color=red>Ошибка иди работай</font></div>";
                    }       
                } 
                else{
                    echo"<div class=error_reg><font size=5px color=red>Допустимый тип файла jpg или jpeg</font></div>";
                }
            }
            else{
                echo"<div class=error_reg><font size=5px color=red>Файл слишком большой, нужен размер менее 488кб</font></div>";
            }         
    }
    else
    {
        echo"<div class=error_reg><font size=5px color=red>Заполните поля!!!!</font></div>";
    }  
}
?>
</form>

<?
    //вывод товаров
    $del=$_GET['del'];
    $del_bas="DELETE FROM `products` WHERE `products`.`id`=$del";
    $run_bas=mysqli_query($connect, $del_bas);

    if($run_bas){
    echo"<font class=error_prod color=red size=5px>Товар удален!</font>";
    }

    $out_prods_str="SELECT * FROM `products`";
    $run_prods_str=mysqli_query($connect, $out_prods_str);

    $count_row=6;
    $page_id=$_GET['page_id'];
    $page=$page_id*$count_row;
    $out_users_str="SELECT * FROM `products` LIMIT $page,$count_row";
    $run_prods_str=mysqli_query($connect, $out_users_str);

?>

<table class="tableprod" border= '2px' width='700px'>
    <tr>
        <th>id</th>
        <th>Название товара</th>
        <th>Картинки</th>
        <th>Категория товара</th>
        <th>Описание</th>
        <th>Цена</th>
        <th>Удалить</th>
        <th>Изменить</th>
    </tr>
<?
    $num=$page;
    while($out_prod=mysqli_fetch_array($run_prods_str)){
        $num++;
        echo"
        <tr align=center>
            <td>$num 
            <td>$out_prod[name_prod]
            <td><img src='../assets/avatar/$out_prod[avatar]' width=50px></td>
            <td>$out_prod[catigories]
            <td>$out_prod[description]
            <td>$out_prod[price]
            <td><a href='?del=$out_prod[id]'>Удалить</a>
            <td><a href='../../adminka/editing_prod.php?tt=$out_prod[id]'>Изменить</a>
        </tr>
        ";
    }
?>
</table>
    <div class="pagination">
        <?
            $str_out_user="SELECT * FROM `products`";
            $run_out_user=mysqli_query($connect, $str_out_user);
            $count_users=mysqli_num_rows($run_out_user);
            $count_user=ceil($count_users/$count_row);
            $p=0;
                for($i=0; $i < $count_user; $i++){
                    $p++;
                    echo"<a class=pag href=?page_id=$i>$p</a>";
                }
        ?>
    </div>
</div>
