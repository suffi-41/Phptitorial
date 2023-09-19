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
<div class="container my-5 ">
<?php
 echo '
<div class="card mb-3 " style="max-width: 540px; box-shadow:2px 2px 8px 2px black;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="..." class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
      </div>
    </div>
  </div>
</div>
</div>
'
?>
<?php
     require 'content/bootstrapscript.php';
   ?>
</body>
</html>