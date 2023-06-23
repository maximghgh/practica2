<?

    include "../cont/db.php";
    include "components/header_dash.php";

?>

<form method="POST" action="../cont/edit.php">
    <h3>edit</h3>
    <input type="text" value=<?=$_SESSION['user']['name']?> name="name" placeholder="Имя"><br>
    <input type="text" value=<?=$_SESSION['user']['surname']?> name="surname" placeholder="Фамилия"><br>
    <input type="text" value=<?=$_SESSION['user']['login']?> name="login" placeholder="Логин"><br>
    <input type="password" name="pass" placeholder="Пароль"><br>
    <input type="password" name="repass" placeholder="Повтор пароля"><br>
    <input type="submit" name="sub" value="Изменить профиль"><br>
    <?
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    ?>
</form>