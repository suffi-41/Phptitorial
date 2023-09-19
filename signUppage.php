<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <?php 
     require 'content/bootstrapCss.php';
    ?>
</head>
<body>
<?php
       require 'content/_nav.php'
   ?>
      <div class="container w-25 p-4 my-2 bg-secondary" style="color:white; border-radius:10px;">
      <h2 style="text-align: center;" >Create a new account</h2>
        <form class="mb-3" action="../signUp.php" method="post">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" type="file" id="name" name="name" required>
          <div class="mb-3">
            <label for="father" class="form-label">Father Name</label>
            <input type="text" class="form-control"  id="father" name="father" required>
          </div>
          <div class="mb-3">
            <label for="qualification" class="form-label">Qulification</label>
            <input type="text" class="form-control" type="file" id="qualification" name="qualification" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control form-control-sm" id="email" name="email" required>
          </div>
          <div class="md-3">
            <label for="password" class="form-label">Password</label>
            <input  type="password"  class="form-control form-control-lg"  id="password" name="password" required>
         </div>
         <div class="md-3">
            <label for="cpassword" class="form-label">Confirm password</label>
            <input  type="password" class="form-control form-control-lg" id="cpassword" name="cpassword" required>
         </div>
         <div class="md-3">
            <label for="course" class="form-label">Course</label>
            <input  type="text" class="form-control form-control-lg" id="course" name="course" required>
         </div>
         <div class="md-3">
            <label for="phone" class="form-label">Phone</label>
            <input  type="text" class="form-control form-control-lg" id="phone" name="phone" required>
         </div>
         <div class="md-3 my-3">
            <button type="submit" class="btn btn-primary">Submit</button>
         </div>
        </form>
      </div> 
      <?php
     require 'content/bootstrapscript.php';
   ?>
</body>
</html>