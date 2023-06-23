<?

include 'db.php';

$del=$_GET['del'];

$del_bas="DELETE FROM `backet` WHERE `backet`.`id`=$del";
$run_bas=mysqli_query($connect, $del_bas);

header("Location:/backet.php");


?>