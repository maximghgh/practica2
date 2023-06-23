<?php
    include "../../controlers/db.php";
    include "controlers/editing.php";

    $name=$_SESSION['name'];
    $out_user="SELECT * FROM `user` WHERE name='$name'";
    $run_user=mysqli_query($connect, $out_user);
    $out=mysqli_fetch_array($run_user);

    
?>

<div class="info_profile">
    <p class="login_p">Логин : <?php echo $out['login'];?></p>
    <p class="surname_p">Фамилия : <?php echo $out['surname'];?></p>
    <p class="name_p">Имя :  <?php echo $out['name'];?></p>
    <a class="edit" href="editing.php">
        <div class="edit_p">
            <p>Редактировать</p>
        </div>
    </a>
    <form method="POST">
        <input class="back_p" type="submit" name="back" value="Выйти">
    </form>
</div>
<?php
    $back_p=$_POST['back'];

    if($back_p) {
        session_unset();
        header("Location:/index.php");
    }

?>