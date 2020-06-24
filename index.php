<?php
//DEFAUTL PAGE -> REPORT
if(empty($_SERVER['QUERY_STRING'])){
    $_SERVER['QUERY_STRING'] = "report";
}

switch($_SERVER['QUERY_STRING']){
    //VIEW REPORT PAGE
    case 'report':
        include('controllers/datacontroller.php');
        $dataController = new DataController();
        $dataController->list();
    break;
    //VIEW ADD PAGE
    case 'add':
        include('controllers/pagecontroller.php');
        $pageController = new PageController();
        $pageController->view('add');
    break;
    //SAVE NEW ENTRY
    case 'save':
        include('controllers/datacontroller.php');
        $dataController = new DataController();
        $dataController->save();
    break;
}
?>