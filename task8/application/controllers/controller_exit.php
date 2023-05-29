<?

class Controller_Exit extends Controller
{
    function action_index()
    {
        session_unset();
        $this->view->generate('view_form.php', 'template_view.php');
    }
}

?>