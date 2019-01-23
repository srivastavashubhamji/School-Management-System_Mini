<?php
    $conn = mysqli_connect("localhost","root","shubhPHP007","sms");
    
    if($conn == true)
    {
       
    }
    else      // IF NOT CONNECTED TO database Server then it will return FALSE  //
    {
        echo "Connection Failed.";
        return;
    }
?>