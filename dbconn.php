<?php
    $conn = mysqli_connect("localhost","root","shubhPHP007","sms");
    
    if($conn == true)
    {
       
    }
    else      // IF NOT CONNECTED TO database Server then WE WILL GET FALSE FROM mysqli_connect() function  //
    {
        echo "Connection Failed.";
        return;
    }
?>
