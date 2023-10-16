<?php
  include './_db.php';
  class searchConmment{
     protected $search_word;
     protected $connect;
     protected $find_comment = array();

     public function __construct($connect, $search_word)
     {
        $this->connect = $connect;
        $this->search_word = $search_word;
        
     }
     public function search(){
      $sql = "SELECT * FROM `question` WHERE MATCH(qus_description) against ('$this->search_word')";
      $result = mysqli_query($this->connect, $sql);
      if(!$result){
        return json_encode(['status'=>false, 'data'=>"Note found"]);
      }else{
        while($row = mysqli_fetch_assoc($result)){
          $this->find_comment[] = $row;
        }
        if(empty($this->find_comment)){
          return json_encode(['status'=>true, 'data'=>"Note found"]);
        }else{
          return json_encode(['status' => true, 'data'=>$this->find_comment]);
        }
      }
     }
   }
   if($_SERVER['REQUEST_METHOD'] === 'POST'){
    header("Access-Control-Allow-Origin:*");
    header("Content-Type: application/json, charset=UTF-8");
    header("Access-Control-Allow-Method:POST");

    $data = json_decode(file_get_contents('php://input'));

    $search = new searchConmment($connect_data->connection(), $data->word);
    echo $search->search();

   }
?>

