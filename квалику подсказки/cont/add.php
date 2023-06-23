<?
    include "db.php";

    $name_task=$_POST['name_task'];
    $desc=$_POST['desc'];
    $cat=$_POST['cat'];
    $app=$_POST['app'];

    $id_user=$_SESSION['user']['id'];

    $name_logo = $_FILES['avatar']['name'];
    $type = $_FILES['avatar']['type'];
    $tmp_path = $_FILES['avatar']['tmp_name'];
    $size = $_FILES['avatar']['size'];

    $rand = rand(200, 600);
    $Ext= explode('.', $name_logo);

    $name_logo = $Ext['0'];
    $Ext = $Ext['1'];
    $full_name = "$name_logo"."_$rand".".$Ext";

    $path = "../css/img/$full_name";

    $str_zay="INSERT INTO `zayvka`(`name_task`, `description`, `avatar`, `cat`, `id_user`,`created_at`, `updated_at`) VALUES ('$name_task','$desc','$full_name','$cat','$id_user',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP)";

    if ($app) 
    {
        if($name_task && $desc && $cat && $full_name)
        {
            if($size < 500000)
            {
                if($type == 'image/jpeg')
                {
                    $run_zay=mysqli_query($connect, $str_zay);

                    if($run_zay)
                    {
                        move_uploaded_file($tmp_path, $path);
                        $_SESSION['error']="Заявка создана";
                        echo "1";
                        header("Location:/content/task.php");
                    }
                    else
                    {
                        $_SESSION['error']="Ошибка добавления";
                        header("Location:/content/task.php");
                        echo "пизда";
                    } 
                }
                else
                {
                    $_SESSION['error']="Не допустимый тип файла";
                    header("Location:/content/task.php");
                    echo $type;
                }  
            }
            else
            {
                $_SESSION['error']="Файл слишком большой";
                header("Location:/content/task.php");
                echo "как мой член";
            }
        }
        else
        {
            $_SESSION['error']="Заполните все поля!";
            echo "нет пидора";
        }

    }

?>