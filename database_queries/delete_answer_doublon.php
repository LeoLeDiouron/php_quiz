<?php
    $servername = "127.0.0.1:50437"; 
    $username = "azure"; 
    $password = "6#vWHD_$"; 
    $dbname = "quiz_db";

    $conn = new mysqli($servername, $username, $password, $dbname); 
    

    if ($conn->connect_error) { 
        die("Connection failed: " . $conn->connect_error); 
    } 
    echo "Connected successfully"; 
    
    // sql to create table 
    $sql = "DELETE FROM answers where id_quiz=NULL;"; 
    
    if ($conn->query($sql) === TRUE) { 
        echo "delete doublons"; 
    } else { 
        echo "Error";
    } 
    
    $conn->close(); 

?>