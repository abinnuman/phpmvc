<?php
class PageController{

    public function view($viewName, $variables = NULL){
        //EXTRACT VARIABLES IF APPLICABLE
        if($variables !== NULl) extract($variables);

        //RENDER
        include('views/includes/header.php');
        include('views/' . $viewName . '.php');
        include('views/includes/footer.php');
    }
}
?>