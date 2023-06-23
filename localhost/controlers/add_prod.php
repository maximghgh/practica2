<?php
        include "db.php";

        $xy=$_GET['xy'];
        $user=$_SESSION['name'];

        $out_user="SELECT * FROM `user` WHERE name='$user'";
        $run_user=mysqli_query($connect, $out_user);
        $out=mysqli_fetch_array($run_user);

        
        $str_prod="INSERT INTO `backet`(`id`, `id_user`, `id_prod`, `status`, `created_at`, `updated_at`) VALUES (NULL,'$out[id]','$xy','1',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP)";
        $run_prod=mysqli_query($connect, $str_prod);
        header("Location:/prod.php");
?>