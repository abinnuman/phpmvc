<?php
//LOAD MODEL
require('models/datamodel.php');

require('controllers/pagecontroller.php');

class DataController extends PageController{

    private function showArray($array){
        echo "<pre>";
        print_r($array);
        echo "</pre>";
    }

    
    //METHOD TO SAVE NEW ENTRY
    public function save(){
        //FETCH USER INPUT
        $userInput = $_POST;

        //CREATE NEW DATA MODEL
        $dataModel = new DataModel();

        //SET MODEL DATA
        $dataModel->amount = $userInput['amount'];
        $dataModel->buyer = $userInput['buyer'];
        $dataModel->receipt_id = $userInput['receipt_id'];
        $dataModel->items = $userInput['items'];
        $dataModel->buyer_email = $userInput['buyer_email'];
        $dataModel->buyer_ip = $this->getIp();
        $dataModel->note = $userInput['note'];
        $dataModel->city = $userInput['city'];
        $dataModel->phone = '880' . $userInput['phone'];
        $dataModel->hash_key = password_hash($userInput['receipt_id'], PASSWORD_DEFAULT);
        $dataModel->entry_at = date('Y-m-d');
        $dataModel->entry_by = $userInput['entry_by'];
        //$this->showArray($dataModel);

        //SAVE MODEL
        if( $dataModel->save() == 1 ){
            echo json_encode(array('status' => 1));
        }else{
            echo json_encode(array('status' => 0));
        }
    }


    //METHOD TO GET USER IP
    private function getIp(){
        if (!empty($_SERVER['HTTP_CLIENT_IP']))   
        {
            $ipAddress = $_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
        {
            $ipAddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else
        {
            $ipAddress = $_SERVER['REMOTE_ADDR'];
        }

        return $ipAddress;
    }


    //METHOD TO SHOW REPORT PAGE
    public function list(){
        //CREATE NEW DATA MODEL
        $dataModel = new DataModel();

        //FETCH ALL-ENTRY FROM DATA MODEL
        $listData = $dataModel->list();

        //SHOW REPORT PAGE
        $this->view('report', array('listData' => $listData ) );
    }
}
?>