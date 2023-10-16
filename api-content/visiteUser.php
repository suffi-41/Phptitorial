<?php
  include './_db.php';

  class visitUser{
    protected $noOfVisitor;
    protected $connect;

    public function __construct($connect){
       $this->connect = $connect;
    }

    public function visitor(){
        $sql = "SELECT COUNT(email) as visitor FROM user";
        $result = mysqli_query($this->connect, $sql);
        if($result){
            $row = mysqli_fetch_array($result);
            return json_encode(['status'=>true, 'data'=>$row['visitor']]);
        }else{
            return json_encode(['status'=>false]);
        }
    }
  }
  if($_SERVER['REQUEST_METHOD'] === 'GET'){
    header("Access-Control-Allow-Origin:*");
    header("Content-Type: application/json, charset=UTF-8");
    header("Access-Control-Allow-Method:GET");

     $visitor = new visitUser($connect_data->connection());
     echo $visitor->visitor();
  }
?>

