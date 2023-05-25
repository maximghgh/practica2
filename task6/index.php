<?
    include "controllers/db.php";
    if($_SESSION['users'])
    {
        header("Location:/tasks");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <title>TaskList</title>
</head>
<body>
    <div class="form">
        <h2>Авторизация или Регистрация</h2>
        <form method="POST" action="controllers/login.php">
            <input type="login" name="login" placeholder="Логин"><br>
            <input type="password" name="password" placeholder="Пароль"><br>
            <input type="submit" name="submit" value="Войти"><br>
        </form>  
        <?
            echo $_SESSION['good'];
            unset($_SESSION['good']);
        ?>    
    </div>
    
</body>
</html>
