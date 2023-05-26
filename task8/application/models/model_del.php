<?  
    class Controller_Del extends Model
    {
        public function get_data()
        {
                $connect=mysqli_connect('localhost','root','','tasklist');
                $id_tas=$_GET['id_tas'];
                $del_tas="DELETE FROM `tasks` WHERE `id`='$id_tas'";
                $run_del=mysqli_query($connect, $del_tas);
                if($run_del)
                {
                    $_SESSION['good']="<font class=font color=green>Объявление удалено</font>";
                }
                else
                {
                    $_SESSION['good']="<font class=font color=red>Удалить не удалось</font>";
                }
        
            }
        }     
?>