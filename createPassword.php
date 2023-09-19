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
<body>
<?php
       require 'content/_nav.php';
   ?>
   <div class='container w-25 my-5  bg-secondary' style="border-radius:10px; box-shadow:2px 2px 8px 2px black;">
   <h2 style="text-align:center; color:white; padding:3px;"> Create a new password </h2>
   <form action="../newPassword.php" method="post" style="padding:15px;">
   <div class="form-floating mb-3 ">
        <input type="email" class="form-control" id="email" name="email" placeholder="email" required>
        <label for="floatingInput">Email adderss</label>
      </div>
    <div class="form-floating mb-3 ">
        <input type="password" class="form-control" id="password" name="password" placeholder="new password" required>
        <label for="floatingInput">Create a new password</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="confirm Password" required>
        <label for="floatingPassword">Confirm password</label>
      </div>
      <div class="md-3 my-3">
        <button type="submit" class="btn btn-light">submit</button>
      </div>
    </form>
   </div>
<?php
     require 'content/bootstrapscript.php';
   ?>
</body>
</html>