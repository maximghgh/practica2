<?

include "db.php";

$name=$_POST['name'];
$surname=$_POST['surname'];
$login=$_POST['login'];
$pass=$_POST['pass'];
$repass=$_POST['repass'];
$sub=$_POST['sub'];

$str_add_us="INSERT INTO `user`(`name`, `surname`, `login`, `password`, `repassword`, `status`, `created_at`, `updated_at`) VALUES ('$name','$surname','$login','$pass','$repass','1',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP)";

if($sub)
{
    if($name && $surname && $login && $pass && $repass)
    {
        if($pass == $repass)
        {
            $run_add_us=mysqli_query($connect, $str_add_us);

            $str_us="SELECT * FROM `user`";
            $run_us=mysqli_query($connect, $str_us);

            if($run_add_us)
            {

            $out_us=mysqli_fetch_array($run_us);

            $_SESSION['user']= array(
                'id'=>$out_us['id'],
                'name'=>$out_us['name'],
                'surname'=>$out_us['surname'],
                'login'=>$out_us['login'],
                'status'=>$out_us['status'],
            );
            header("Location:/content/dash.php");

            }

            
        }
        else
        {
            $_SESSION['error']="Пароли не совпадают!";
            header("Location:/content/registr.php");
        }
    }
    else
    {
        $_SESSION['error']="Заполните все поля!";
    }
}
?>