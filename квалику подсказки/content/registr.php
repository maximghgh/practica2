<?
include "../cont/db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>тест</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?


    include "components/header.php";

?>  

    <div class="wrapper">
        <form class="form2" method="POST" action="../cont/reg.php">
            <h3>Регистрация</h3>
            <input type="text" name="name" placeholder="Имя"><br>
            <input type="text" name="surname" placeholder="Фамилия"><br>
            <input type="text" name="login" placeholder="Логин"><br>
            <input type="password" name="pass" placeholder="Пароль"><br>
            <input type="password" name="repass" placeholder="Повтор пароля"><br>
            <input type="submit" name="sub" value="Зарегистрироваться"><br>
            <?
                echo $_SESSION['error'];
                unset($_SESSION['error']);
            ?>
        </form>

    </div>
</body>
