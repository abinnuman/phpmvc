<?php
class DataModel{
    private $conn;

    public $amount;
    public $buyer;
    public $receipt_id;
    public $items;
    public $buyer_email;
    public $buyer_ip;
    public $note;
    public $city;
    public $phone;
    public $hash_key;
    public $entry_at;
    public $entry_by;

    function __construct(){
        $serverName = "localhost";
        $userName = "root";
        $password = "";
        $dbName = "xspeed";
        
        try{
            $this->conn = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function save(){
        try{
            //PREPARE QUERY
            $sql = 'INSERT INTO foo (amount,buyer,receipt_id,items,buyer_email,buyer_ip,note,city,phone,hash_key,entry_at,entry_by) VALUES ("'. $this->amount . '","' . $this->buyer .'","' . $this->receipt_id .'","' . $this->items .'","' . $this->buyer_email .'","' . $this->buyer_ip .'","' . $this->note .'","' . $this->city .'","' . $this->phone .'","' . $this->hash_key .'","' . $this->entry_at .'","' . $this->entry_by .'")';    

            //EXECUTE 
            $this->conn->exec($sql);

            return 1;
        }catch(PDOException $e){
            return 0;
        }
    }


    public function list(){
        //PREPARE QUERY
        $sql = $this->conn->prepare("SELECT * FROM foo");

        //EXECUTE
        $sql->execute();

        //FETCH ALL ROWS
        $result = $sql->fetchAll();

        //RETURN
        return $result;
    }
}
?>