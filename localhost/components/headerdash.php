<?php
    include "controllers/db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
    <link rel="stylesheet" type="text/css" href="/assets/style.css">
    <script defer src="/js/type.js"></script>
</head>
<body>
    <div class="wrapper">
        <header>
            <div class="header">
                    <?php
                        echo"<div class=nikdiv><font class=nik>".$_SESSION['name']."</font></div>";
                    ?>
            </div>
        </header>
    </div>