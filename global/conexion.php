<?php 
    $conn = new mysqli('localhost', 'root', '','trailer');
    if($conn->connect_error){
        echo $error ->conn->connect_error;
    }

?>