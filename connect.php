<?php

    //create a connection
    $con = new mysqli('localhost','root','','php_crud');

    //check connection success or not
    if(!$con){ 
        die(mysqli_error($con));
    } 

    


?>
