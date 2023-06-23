<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>тест</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<?
    include "cont/db.php";

    if($_SESSION['user'])
    {
        header("Location:content/dash.php");
        exit();
    }

    include "content/components/header.php";
    // include "content/components/main.php";

?>