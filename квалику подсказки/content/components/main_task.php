<?
    include "../cont/db.php";
?>

<div class="task">
    <div class="form_task">
        <form class="form1" enctype="multipart/form-data" method="POST" action="../cont/add.php">
            <h3>Добавление заявки:</h3>
            <h4>Название заявки:</h4>
            <input type="text" name="name_task" placeholder="Название заявки"><br>
            <h4>Изображение:</h4>
            <input type="file" name="avatar"><br>
            <h4>Комметарий к заявке:</h4>
            <textarea name="desc" placeholder="Комметарий к заявке"></textarea><br>
            <h4>Выбор категории:</h4>
            <select name="cat" >
                <option value="0">Выбор категории</option>
                <?
                    $str_cat = "SELECT * FROM `categories`";
                    $run_cat = mysqli_query($connect, $str_cat);
                    while ($cat = mysqli_fetch_array($run_cat))
                    {
                        echo "<option value=$cat[id]>$cat[name]</option>";
                    }
                ?>
            </select><br>
            <input type="submit" name="app" value="Создать заявку">
            <?
                echo $_SESSION['error'];
                unset($_SESSION['error']);
            ?>
        </form>
        
    </div>
    

    
    <div class="tasks">
        <div class="profail">
            <h3>Мой профиль: </h3>
            <h4>Имя:<?=$_SESSION['user']['name']?></h4>
            <h4>Фамилия:<?=$_SESSION['user']['surname']?></h4>
            <div class="edit">
                <a href="edit_dash.php">Изменить</a>
            </div>
        </div><hr>
        <h3>Мой заявки: </h3>
        <?
            

            $id_user=$_SESSION['user']['id'];

            $str_zay="SELECT * FROM `zayvka` where `id_user`='$id_user'";
            $run_zay=mysqli_query($connect, $str_zay);

            while($out_zay=mysqli_fetch_array($run_zay))
            {
                $str_cat = "SELECT * FROM `categories` where `id`='$out_zay[cat]'";
                $run_cat = mysqli_query($connect, $str_cat);
                $cat = mysqli_fetch_array($run_cat);  

                echo "
                <div class=zay>
                    <img width=100px src=../css/img/$out_zay[avatar]>
                    <h4>Название заявки: $out_zay[name_task]</h4>
                    <h4>Категория: $cat[name]</h4>
                    <p>Описание: $out_zay[description]</p>
                    <a href=../cont/del.php?del_zay=$out_zay[id]>Удалить</a>
                </div>
                ";
            }
        
        ?>
    </div>
</div>
