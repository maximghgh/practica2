<?
    class Controller_Task extends Controller
    {

        function __construct()
        {
            $this->model = new Model_Task();
            $this->view = new View();
        }
        
        function action_index()
        {
            
            $data = $this->model->get_data();		
            $this->view->generate('view_task.php', 'template_view.php');
        }
        
        function action_del()
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
        $this->view->generate('view_task.php', 'template_view.php');
        }


        function action_delalltask()
        {
            $id_users=$_SESSION['users']['id'];
            $id_tasal=$_GET['id_tasal'];

            if($id_tasal)
            {
                $connect=mysqli_connect('localhost','root','','tasklist');
                $del_tas="DELETE FROM `tasks` WHERE `user_id`='$id_users'";
                $run_del=mysqli_query($connect, $del_tas);
                if($run_del)
                {
                    $_SESSION['good']="<font class=font color=green>Все объявления удалены</font>";
                }
                else
                {
                    $_SESSION['good']="<font class=font color=red>Удалить не удалось</font>";
                }
            }
        $this->view->generate('view_task.php', 'template_view.php');
        }

        function action_statusall()
        {
            $id_statusal=$_GET['id_statusal'];
            $id_users=$_SESSION['users']['id'];
            $connect=mysqli_connect('localhost','root','','tasklist');
            $upd_tas="UPDATE `tasks` SET `status`='1' WHERE `user_id`='$id_users'";
            $run_upd_tas=mysqli_query($connect,$upd_tas);
            if($run_upd_tas){
                $_SESSION['good']="<font class=font color=green>Все задания выполнены</font>";
            }
            else{
                $_SESSION['good']="<font class=font color=red>Ошибка выполнения</font>";
            }
        $this->view->generate('view_task.php', 'template_view.php');
        }

        function action_statusallno()
        {
            $id_statusalno=$_GET['id_statusalno'];
            $id_users=$_SESSION['users']['id'];
            $connect=mysqli_connect('localhost','root','','tasklist');
            $upd_tass="UPDATE `tasks` SET `status`='0' WHERE `user_id`='$id_users'";
            $run_upd_tass=mysqli_query($connect,$upd_tass);
            if($run_upd_tass){
                $_SESSION['good']="<font class=font color=green>Все задания отменены</font>";
            }
            else{
                $_SESSION['good']="<font class=font color=red>Ошибка выполнения</font>";
            }
        $this->view->generate('view_task.php', 'template_view.php');
        }

        function action_statusyes()
        {
            $connect=mysqli_connect('localhost','root','','tasklist');

            $id_task=$_GET['id_task'];
            $id_users=$_SESSION['users']['id'];
            $status=$_GET['status'];

            $upd_tas="UPDATE `tasks` SET `status`='1' WHERE `id`='$id_task'";
            $run_upd_tas=mysqli_query($connect,$upd_tas);
            if($id_task)
            {
                if($status==0)
                {
                    if($run_upd_tas)
                    {
                        $_SESSION['good']="<font class=font color=green>Все задания выполнены</font>";
                    }
                    else
                    {
                        $_SESSION['good']="<font class=font color=red>Ошибка выполнения</font>";
                    }
                }
            }
        $this->view->generate('view_task.php', 'template_view.php');

        }

        function action_statusno()
        {            
            $connect=mysqli_connect('localhost','root','','tasklist');

            $id_task=$_GET['id_task'];
            $id_users=$_SESSION['users']['id'];
            $status=$_GET['status'];

            $upd_tas="UPDATE `tasks` SET `status`='0' WHERE `id`='$id_task'";
            $run_upd_tas=mysqli_query($connect,$upd_tas);
            if($id_task)
            {
                if($status==1)
                {
                    if($run_upd_tas)
                    {
                        $_SESSION['good']="<font class=font color=green>Все задания выполнены</font>";
                    }
                    else
                    {
                        $_SESSION['good']="<font class=font color=red>Ошибка выполнения</font>";
                    }
                }
            }
        $this->view->generate('view_task.php', 'template_view.php');
        }

    }
?>