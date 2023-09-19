<?php
   //Import PHPMailer classes into the global namespace
   //These must be at the top of your script, not inside a function
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\SMTP;
   use PHPMailer\PHPMailer\Exception;
   
   //Load Composer's autoloader
  require 'PHPMailer/Exception.php';
  require 'PHPMailer/PHPMailer.php';
  require 'PHPMailer/SMTP.php';
  
function sendemail($email, $password){
   //Create an instance; passing `true` enables exceptions
   $mail = new PHPMailer(true);
   
   try {
       //Server settings
    //    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
       $mail->isSMTP();                                            //Send using SMTP
       $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
       $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
       $mail->Username   = 'mohdbinsufiyan@gmail.com';                     //SMTP username
       $mail->Password   = 'pyls amkw zotb zgwj';                               //SMTP password
       $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
       $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
   
       //Recipients
       $mail->setFrom('mohdbinsufiyan@gmail.com', 'Techidol');
       $mail->addAddress($email, '');     //Add a recipient
    
       //Content
       $mail->isHTML(true);                                  //Set email format to HTML
       $mail->Subject = 'Techidol password';
       $mail->Body    = "'$email' -> <div>Your password have to created successfully</div>
       <br>
       <div> password is <bold> $password </bold> , don't share your own password anyone.
       ";
       $mail->send();
        echo "Password created successfully!";
   } catch (Exception $e) {
       echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
   }
}
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    include "_db.php";
    session_start();
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    if($cpassword === $password){
        $secourePassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "update user set password = '$secourePassword' where email = '$email'";
        $result = mysqli_query($connect, $sql);
        if($result){
            sendemail($email, $password);
            $_SESSION['changepassword'] = true;
            header("location:frontent/index.php");
           
        }else{
            $_SESSION['changepassword'] = false;
            
        }
    }
}
?>