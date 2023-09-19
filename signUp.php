<?php
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
     include '_db.php';
     session_start();

     $name = $_POST['name'];
     $father = $_POST['father'];
     $qulification = $_POST['qualification'];
     $email = $_POST['email'];
     $password = $_POST['password'];
     $cpassword = $_POST['cpassword'];
     $course = $_POST['course'];
     $phone = $_POST['phone'];
  
  if($password === $cpassword){
    $check = "select *from user where email = '$email'";
    $chechExistEmail = mysqli_query($connect, $check);
    $num = mysqli_num_rows($chechExistEmail);
    if($num > 0){
        echo "Email is already exists";
    }
    else{
        $secourePassword = password_hash($password, PASSWORD_DEFAULT);
         $sql = "INSERT INTO `user` (`name`, `fatherName`, `qualification`, `email`, `password`, `course`, `phone`, `date`) VALUES ('$name', '$father', '$qulification', '$email', '$secourePassword', '$course', '$phone', current_timestamp())";

         $result = mysqli_query($connect , $sql);
      if($result){
            $_SESSION['signup'] = "success";
            header('location:frontent/index.php');
        }else{
            echo "Internal server error";
        }
       }
    }else{
        echo "Password not match ";
    }
}
?>