<?php
   include './_db.php';

   class deleteAccound{

    // decelare which data is recommended for delete accound of user;
     private $connect;
     private $email;
     private $password;
     public  $veryfyPassword;

     public function __construct($connect, $email, $password)
     {
        $this->connect = $connect;
        $this->email = $email;
        $this->password = $password;
        $this->veryfyPassword = false;
        echo "sufiyan";
     }

     public function checkEmail(){
        $sql_exists = "SELECT *FROM user WHERE email = '$this->email'";
        $sql_result = mysqli_query($this->connect, $sql_exists);
        if($sql_result){
            $existsEmail = mysqli_num_rows($sql_result);
            if($existsEmail === 1){
                while($row = mysqli_fetch_assoc($sql_result)){
                    if(password_verify($this->password, $row['password'])){
                        $this->veryfyPassword = true;
                    }
                }
            }else{
                return json_encode(['status'=>false, 'message'=>'Invalid cradantils']);
            }
        }else{
            return json_encode(['status'=>false, 'message'=>'Invalid cradantils']);
        }
     }

     public function delete(){
        if($this->veryfyPassword){
            $sql = "DELETE FROM user WHERE email = '$this->email'";
            $run = mysqli_query($this->connect, $sql);
            if($run){
                echo "delete accound";
            }else{
                echo "Invalid cradantials!";
            }
        }else{
            return json_encode(['status'=>$this->veryfyPassword, 'message'=>'Invalid cradantils']);
        }
     }
   }
   if($_SERVER['REQUEST_METHOD'] === 'DELETE'){
    header("Access-Control-Allow-Origin:*");
    header("Content-Type: application/json, charset=UTF-8");
    header("Access-Control-Allow-Method:DELETE");
     
      $data = json_decode(file_get_contents("php://input"));
      $delete = new deleteAccound($connect_data->connection(), $data->email, $data->password);
      echo $delete->checkEmail();
      echo $delete->delete();
      

   }
?>