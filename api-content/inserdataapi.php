<?php
include '_db.php';

class user
{
    private $name;
    private $fatherName;
    private $email;
    private $qualification;
    private $confirmPassword;
    private $password;
    private $hashPassword;
    private $course;
    private $phone;
    public $conn;

    public function __construct($conn, $name, $fatherName, $email, $qualification, $password, $confirmPassword,  $course, $phone)
    {
        $this->name = $name;
        $this->fatherName  = $fatherName;
        $this->email = $email;
        $this->qualification = $qualification;
        $this->password = $password;
        $this->confirmPassword = $confirmPassword;
        $this->hashPassword = password_hash($this->password, PASSWORD_BCRYPT);
        $this->course = $course;
        $this->phone = $phone;
        $this->conn = $conn;
    }

    public function create_user_table()
    {
        $user_table = "CREATE TABLE IF NOT EXISTS user_2(
               name varchar(20) not null,
               fatherName varchar(20) not null,
               email varchar(20) not null,
               qualification varchar(30) unique not null,
               password varchar(40) not null,
               course varchar(20) not null,
               phone varchar(20) not null,
               date DATETIME DEFAULT current_timestamp()
            )
             ";
        $run = mysqli_query($this->conn, $user_table);
        if (!$run) {
            echo "Failed to create data table";
        }
    }

    public function inser_user_data()
    {
        if ($this->confirmPassword === $this->password) {
            $chekExistEmail = "SELECT email from user_2 where email = '$this->email'";
            $runExistemail = mysqli_query($this->conn,  $chekExistEmail);
            $emailIsExist = mysqli_num_rows($runExistemail);
            if ($emailIsExist > 0) {
                http_response_code(501);
                echo json_encode(['status' => false, 'Error' => "email is already exists!"]);
                return false;
            } else {
                $inser_data = "INSERT INTO user_2 (`name`, `fatherName`, `email`, `qualification`, `password`, `course`, `phone`) values ('$this->name',  '$this->fatherName', '$this->email',    '$this->qualification',   '$this->hashPassword', '$this->course',  '$this->phone')";
                $run = mysqli_query($this->conn, $inser_data);
                if ($run) {
                    echo json_encode(['status' => true, 'message' => 'Accound is created successfully!']);
                    return true;
                } else {
                    http_response_code(401);
                    echo json_encode(['status' => false, 'message' => 'Failed to insert data!']);
                    return false;
                }
            }
        }else{
            echo "password not match!";
        }
    }
}

class createApi
{

    private $conn;
    public $api = array();

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function fetch_data_in_database()
    {
        $fetch = "SELECT *FROM user_2";
        $run = mysqli_query($this->conn, $fetch);
        if ($run) {
            // fetch all data in data base
            while ($row = mysqli_fetch_assoc($run)) {
                $api[] = $row;
            }
            // convert json form of fetch data
            $json_data = json_encode(['status' => true, 'data' => $api], JSON_PRETTY_PRINT);
            return $json_data;
        } else {
            header("Content-type:application/json");
            echo json_encode([
                'status' => false,
                'data' => 'Not found'
            ], JSON_PRETTY_PRINT);
            http_response_code(400);
        }
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    header("Access-Control-Allow-Origin:*");
    header("Content-Type: application/json, charset=UTF-8");
    header("Access-Control-Allow-Method:POST");

    // get the data of cliend side
    $data = json_decode(file_get_contents("php://input"));

    // pass inserted data of databse in consturctor and created class object 
    $user_data = new user($connect_data->connection(), $data->name, $data->fatherName, $data->email, $data->qualification, $data->password, $data->confirmPassword, $data->course, $data->phone);

    // table create function
    $user_data->create_user_table();

    if ($user_data->inser_user_data()) {
        $fetch_user_data = new createApi($connect_data->connection());
        echo $fetch_user_data->fetch_data_in_database();
    }
}
