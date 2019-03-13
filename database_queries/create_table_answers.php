<?php
    $servername = "127.0.0.1:50437"; 
    $username = "azure"; 
    $password = "6#vWHD_$"; 
    $dbname = "quiz_db";

    $conn = new mysqli($servername, $username, $password, $dbname); 
    

    if ($conn->connect_error) { 
        die("Connection failed: " . $conn->connect_error); 
    } 
    
    // sql to create table 
    $sql = "DROP TABLE answers"; 
    
    if ($conn->query($sql) === TRUE) { 
        echo "Table answer droped successfully"; 
    }

    
    // sql to create table 
    $sql = "CREATE TABLE answers (
    id_quiz INT(6) NOT NULL,
    id_question INT(6) NOT NULL, 
    answer VARCHAR(300) NOT NULL
    )"; 
    
    if ($conn->query($sql) === TRUE) { 
        echo "Table answer created successfully"; 
    }
    
    $conn->close(); 

?>