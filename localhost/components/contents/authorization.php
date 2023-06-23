<?php
    include "/controlers/db.php";
    include "/controlers/avto.php";
?>
    

<div class="authorizaton">
    <div class="vhod">
        <h1>Войти в аккаунт</h1>
        <form method="POST" action="/controlers/avto.php">
            <input type="text" name="login" placeholder="Логин" ><br>
            <input type="password" name="password" placeholder="Пароль"><br></br>    

            <input type="submit" name="send" class="send" value="Вход"></br>                  
        </form>
        <a href="/registrations.php">
            <input type="submit" class="reg" value="Регистрация">
        </a> 
        <?php
            echo"<font class=gg size=5px color=red>".$_SESSION['error_av']."</font>";
            unset($_SESSION['error_av']);
        ?>
    </div>
</div>