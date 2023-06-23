<?
    include "controllers/db.php";
    include "controllers/avto.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/style_adminka.css">
    <title>Document</title>
</head>
<body>

<div class="authorizaton">
    <div class="vhod">
        <h1>Подтверждение администратора</h1>
        <form method="POST" action="controllers/avto.php">
            <input type="text" name="login" placeholder="Логин" ><br>
            <input type="text" name="password" placeholder="Пароль"><br></br>    
            <input type="submit" name="send" class="send" value="Вход"></br>                  
        </form>
        <?
    echo"<font class=gg size=5px color=red>".$_SESSION['gg_av']."</font>";
        unset($_SESSION['gg_av'])
        ?>
           
    </div>
</div>
</body>


