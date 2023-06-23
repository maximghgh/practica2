<?
include "../cont/db.php";
if($_SESSION['user'])
{
    header("Location:../content/dash.php");
    exit();
}
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
        <form method="POST" action="../cont/avto_us.php">
            <h3>Вход</h3>
            <input type="text" name="login" placeholder="Логин"><br>
            <input type="password" name="pass" placeholder="Пароль"><br>
            <input type="submit" name="sub" value="Зарегистрироваться"><br>
            <?
                echo $_SESSION['error'];
                unset($_SESSION['error']);
            ?>
        </form>
    </div>
</body>