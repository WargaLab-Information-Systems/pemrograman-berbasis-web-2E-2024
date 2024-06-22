<?php

    $host="localhost";
    $user="root";
    $password="";
    $db="crud";
    $kon = new mysqli($host,$user,$password,$db);
    if($kon->connect_error){
        echo "Failed to connect DB".$kon->connect_error;
    }
?>