<?
    include "db.php";   

    $name_cat=$_POST['name_cat'];
    $gg=$_POST['gg'];

    $str_add_cat="INSERT INTO `categories`(`name_cat`, `created_at`, `updated_at`) VALUES ('$name_cat',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP)";

    echo $run_add_user ;
    if($gg){
        if($name_cat)
        {
            $run_add_cat=mysqli_query($connect, $str_add_cat);
                if($run_add_cat)
                    {
                        $_SESSION['error_cat']="Категория товара добавлена";
                        header("Location:../../adminka/catigories.php");                    
                    }
                else
                    {
                        $_SESSION['error_cet']="Ошибка добавления, ждите!";
                        header("Location:../../adminka/catigories.phpp");                      
                    }
        }
        else
        {
            $_SESSION['error_cet']="Заполните все поля";
            header("Location:../../adminka/catigories.php");  
        }  
}
?>