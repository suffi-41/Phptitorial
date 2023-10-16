<?php
   include '_db.php';
   include '../mail.php';

   class fetchAllComment{
     private $connect;
     public $user_data = array();

     public function __construct($connect){
        $this->connect = $connect;
     }

     public function fetch(){
        $sql = "SELECT *FROM user";
        $run = mysqli_query($this->connect, $sql);
        if($run){
            while($row = mysqli_fetch_assoc($run)){
                $user_data[] = $row;
            }
            $json_data = json_encode(['status'=>true, 'data'=>$user_data]);
            return $json_data;
        }else{
            echo json_encode(['status'=>false, 'data'=>'Not found data']);
        }
     }
   }

   if($_SERVER['REQUEST_METHOD'] === 'POST'){
    header("Access-Control-Allow-Origin:*");
    header("Content-Type: application/json, charset=UTF-8");
    header("Access-Control-Allow-Method:POST");

    $data = new fetchAllComment($connect_data->connection());
    echo $data->fetch();
    
   }

   ?>
