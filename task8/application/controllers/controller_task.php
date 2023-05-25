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
    }
?>