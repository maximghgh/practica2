<?  

    $id_users=$_SESSION['users']['id'];

    class Controller_Del extends Model
    {
        public function delete($id_users)()
        {
            $id_users=$_SESSION['users']['id'];
            $connect=mysqli_connect('localhost','root','','tasklist');

            $str_tasks="SELECT * FROM `tasks` where `user_id`='$id_users'";
            $run_tasks=mysqli_query($connect,$str_tasks);
            $out_taski=mysqli_fetch_array($run_tasks);
            echo "
            <div class=all>
                <a class=error href=/model/del.php?id_tasal=$id_users>Удалить все</a>
            ";
            if($out_taski['status']== 0){
                echo "
                    <a class=good href=application/model/status.php?id_statusal=$id_users&status=$out_taski[status] class=error>Выполнить все</a>
                ";
            }
            elseif($out_taski['status']== 1){
                echo "
                    <a class=error href=application/model/status.php?id_statusal=$id_users&status=$out_taski[status] class=good>Отменить все</a>
                ";
            }
            echo "
                </div>
            ";
            header("Location:/");
        }
        
        function __construct()
        {
            $this->model = new Model_Del();

        }
        
        function action_index()
        {

            $data = $this->model->get_data();		
            $this->view->generate('view_task.php', 'template_view.php', $data);

            
        }
    }
?>