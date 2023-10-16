<?php
include './_db.php';

class updateProfile
{
   // declare all recommended data with private
   private $connect;
   private $name;
   private $fatherName;
   private $qualification;
   private $email;
   private $course;
   private $phone;

   // declare constructor 
   public function __construct($connect, $name, $fatherName, $qualification, $email, $course, $phone)
   {
      $this->connect = $connect;
      $this->name = $name;
      $this->fatherName = $fatherName;
      $this->qualification = $qualification;
      $this->email = $email;
      $this->course = $course;
      $this->phone = $phone;
   }
   // upadate user data 
   public function update()
   {
      //check the email is exists in data base or not
      $existsEmail = "SELECT email FROM user where email = '$this->email'";
      $result = mysqli_query($this->connect, $existsEmail);
      if ($result) {
         // email is exist exicute it
         if (mysqli_num_rows($result) === 1) {
            // declare whitch data is updated and whose user want to update his/her profile
            $update_data = "UPDATE user SET `name` = '$this->name', `fatherName` = '$this->fatherName', `qualification` = '$this->qualification', `email` = '$this->email', `course` = '$this->course' ,`phone` = '$this->phone' where `email` = '$this->email'";
            $run = mysqli_query($this->connect, $update_data);
            if ($run) {
               $data = json_encode(['status' => true, 'message' => "Update your profile"]);
               return $data;
            } else {
               $data = json_encode(['status' => false, 'message' => "profile is not updated"]);
               return $data;
            }
         } else {
            // if not exists email , then throw error like this message
            return  json_encode(['status' => false, 'message' => "Email is not exists , Please use valid  cradantials!"]);
         }
      }
   }
}

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
   header("Access-Control-Allow-Origin:*");
   header("Content-Type: application/json, charset=UTF-8");
   header("Access-Control-Allow-Method:PUT");

   $data = json_decode(file_get_contents('php://input'));

   $updateUserProfile = new updateProfile($connect_data->connection(), $data->name, $data->father, $data->qualification, $data->email, $data->course, $data->phone);

   echo $updateUserProfile->update();
}
