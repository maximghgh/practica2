<?

include "db.php";

$name=$_POST['name'];
$surname=$_POST['surname'];
$login=$_POST['login'];
$pass=$_POST['pass'];
$repass=$_POST['repass'];
$sub=$_POST['sub'];
$id_user=$_SESSION['user']['id'];


$up_prof="UPDATE `user` SET `name`='$name',`surname`='$surname',`login`='$login',`password`='$pass',`repassword`='$repass',`updated_at`=CURRENT_TIMESTAMP where `id`='$id_user'";

if($sub)
{
    if($name && $surname && $login && $pass && $repass)
    {
        if($pass == $repass)
        {
            $run_up_prof=mysqli_query($connect, $up_prof);
            echo $up_prof;

            $str_us="SELECT * FROM `user` where `id`= '$id_user'";
            $run_us=mysqli_query($connect, $str_us);
           
            if($run_up_prof)
            {
                $out_up=mysqli_fetch_array($run_us);
                $_SESSION['user']= array(
                    'id'=>$out_up['id'],
                    'name'=>$out_up['name'],
                    'surname'=>$out_up['surname'],
                    'login'=>$out_up['login'],
                    'status'=>$out_up['status'],
                ); 
            header("Location:/content/edit_dash.php");
            }
        }
    }
}


?>