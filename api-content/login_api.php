<?php
  include './_db.php';

  class login{
    private $connect;
    private $email;
    private $password;
   
    // in constructor , passing three data , database connection , email , and password
    public function __construct($connect, $email, $password)
    {
        $this->connect = $connect;
        $this->email = $email;
        $this->password = $password;
    }

    // login function
    public function login(){

        // fetch data of one user , whitch user is provide email and password
        $sql = "SELECT *FROM user where email = '$this->email'";
        $result = mysqli_query($this->connect, $sql);
        if($result){
            $row = mysqli_fetch_assoc($result);
            while($row){
                if(password_verify($this->password, $row['password'])){
                    return json_encode(['status'=>true, 'message'=>'Login succeesfully']);
                }else{
                    return json_encode(['status'=>false, 'message'=>'Invalid cradantials']);
                }
            }
        }else{
            return json_encode(['status'=>false, 'message'=>'Invalid cradantials']);
        }
  }
}
   
  $data = json_decode(file_get_contents("php://input"));

  if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($data->email)){
    header("Access-Control-Allow-Origin:*");
    header("Content-Type: application/json, charset=UTF-8");
    header("Access-Control-Allow-Method:POST");

    $login_data = new login($connect_data->connection(), $data->email, $data->password);
    echo $login_data->login();
  }else{
    http_response_code(401);
    echo json_encode(['status'=>'false' , 'message'=>'Enter the email first, email is not enter']);
  }

  ?>
