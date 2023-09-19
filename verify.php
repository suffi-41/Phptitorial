<?php
    $password = "sufiyan";
    $hash  = '$2y$10$aL7s17v5';  //password_hash($password, PASSWORD_DEFAULT) ; 
    echo $hash;
    $verify = password_verify($password, $hash);
    if($verify){
        echo "success";
    }else{
        echo "error";
    }
?>