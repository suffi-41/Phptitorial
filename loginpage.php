<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php 
     require 'content/bootstrapCss.php';
    ?>
</head>
<body >
<?php
       require 'content/_nav.php';
       session_start();
       if(!isset($_SESSION['loggdin'])){
        echo '<div class="alert alert-primary" role="alert">Invalid cradentials</div>';
       }
   ?>
    <div class="container w-25 my-5 p-3 bg-secondary  " style="border-radius:10px">
    <h2 style="text-align:center; color:white; margin-bottom:15px; ">Login now </h2>
    <form action="../login.php" method="post">
    <div class="form-floating mb-3">
        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
        <label for="floatingInput">Email address</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
        <label for="floatingPassword">Password</label>
      </div>
      <div class="form-floating  my-2">
       <a  style="color:white;" href="sendEmail.php" target="_blanck">forget password </a>
      </div>
      <div class="md-3 my-3">
        <button type="submit" class="btn btn-light">login</button>
      </div>
    </form>
    </div>
    <?php
     require 'content/bootstrapscript.php';
   ?>
</body>
</html>