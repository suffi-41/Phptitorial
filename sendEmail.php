<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
     require "content/bootstrapCss.php";
    ?>
</head>
<body>
    <?php
    require "content/_nav.php";
    ?>
    <?php?>
    <div class="container w-50 my-5">
      <form action='../mail.php' method='post'>
      <div class="mb-3 d-flex">
        <input type="email" style="box-shadow:2px 2px 4px 2px black;" class="form-control w-50" id="email" name="email" placeholder="Enter your email address"  required>
        <button type="submit" style="box-shadow:2px 2px 4px 2px black;" class="btn btn-secondary sm mx-2" style="float:right">send email for reset password link</button>
     </div>
    </form>
    </div>
<?php
     require 'content/bootstrapscript.php';
   ?>
</body>
</html>