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
  
function sendEmail($email){
    //Create an instance; passing `true` enables exceptions
     $mail = new PHPMailer(true);
       try {
           //Server settings
           $mail->isSMTP();                                            //Send using SMTP
           $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
           $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
           $mail->Username   = 'mohdbinsufiyan@gmail.com';                     //SMTP username
           $mail->Password   = 'pyls amkw zotb zgwj';                               //SMTP password
           $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
           $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
       
           //Recipients
           $mail->setFrom('mohdbinsufiyan@gmail.com', 'Techidol');
           $mail->addAddress($email,"");     //Add a recipient
          
          //  //Attachments
          //  $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
          //  $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
       
           //Content
           $mail->isHTML(true);                                  //Set email format to HTML
           $mail->Subject = 'Rest password';
           $mail->Body    = "from mohdbinsufiyan@gmail.com to '$email' <br>
            <h2>Reset password </h2><br><br>
            <div style='text-align:justify; width:70%;'>Your have send  request for reset password , if you have forget password and you want to create new password 
            here link is available for resert password .</div><br>
            <a href='http://localhost/backend/frontent/createPassword.php' target='_blank'>reset password</a>
           ";
          
           $mail->send();
           session_start();
           $_SESSION['mail'] = true;
           echo '<script>alert("Message has been sent")</script>';
       } catch (Exception $e) {
           echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
       }
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    include "_db.php";
    $email = $_POST['email'];
    $sql = "select email from user where email = '$email'";
    $result = mysqli_query($connect, $sql);
    if($result){
        sendEmail($email);
        header("Location:frontent/index.php");
    }else{
        $_SESSION['mail'] = false;
        echo "<script>alert('Email is not exists , pllease enter correct cradentials')</script>";
    }

}
?>