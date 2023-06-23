<?

    include "db.php";
    $login=$_POST['login'];
    $pass=$_POST['pass'];
    $sub=$_POST['sub'];

    $str_us = "SELECT * FROM `user` where `login`='$login' and `password`='$pass'";
    
    if($sub)
    {
        if($login && $pass) 
        {
            $run_us = mysqli_query($connect, $str_us);
            $log=mysqli_num_rows($run_us);
            if($log == 1)
            {
                $out_lo=mysqli_fetch_array($run_us);

                $_SESSION['user']= array(
                    'id'=>$out_lo['id'],
                    'name'=>$out_lo['name'],
                    'surname'=>$out_lo['surname'],
                    'login'=>$out_lo['login'],
                    'status'=>$out_lo['status'],
                );
                header("Location:../content/dash.php");
            }   
        }
        else
        {
            $_SESSION['error']="Заполните все поля!";
            header("Location:/content/avto.php");
        }
    }

?>