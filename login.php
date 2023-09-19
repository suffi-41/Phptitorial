<?php
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email'])){
    include '_db.php';
    session_start();

    $email =  $_POST['email'];
    $password =  $_POST['password'];
    
    $sql = "select *from user where email = '$email'";
    $result = mysqli_query($connect, $sql);
    $num = mysqli_num_rows($result);
    
    if($num == 1){
        while($row = mysqli_fetch_assoc($result)){   // mysqli_fetch_array($result) or mysqli_fetch_assoc($result) both are use for it;
            if(password_verify($password, $row['password'] )){
                $_SESSION['loggdin'] = true;
                header("Location:frontent/index.php");
            } else {
                echo 'Invalid password.';
                $_SESSION['loggdin'] = false;
                header('Location:frontent/loginpage.php');
            }
        }
    }else{
        header('Location:frontent/loginpage.php');
    }      
}
?>