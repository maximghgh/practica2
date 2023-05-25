<?
    class Controller_Form extends Controller
    {

        function __construct()
        {
            $this->model = new Model_Form();
            $this->view = new View();
        }
        
        function action_index()
        {

            $data = $this->model->get_data();		
            $this->view->generate('view_form.php', 'template_view.php', $data);

            
        }
    }
?>