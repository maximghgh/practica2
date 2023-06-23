<?

    include "../cont/db.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>тест</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<header>
    <div class="logo">ТЕСТ</div>
    <nav>
        <ul>
            <li><a href="../content/dash.php">Главная</a></li>
            <li><a href="../content/task.php">Заявки</a></li>
            <li><a href="">Комментарии</a></li>
            <li><a href="">Профиль: <?=$_SESSION['user']['name']?></a></li>
        </ul>
    </nav>
    <div>
        <a href="">Профиль: <?=$_SESSION['user']['name']?></a>
        <a href="../cont/exit.php">Выйти</a>
    </div>
</header>