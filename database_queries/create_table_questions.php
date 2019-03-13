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

    /*$sql = "DROP TABLE questions"; 
        
    if ($conn->query($sql) === TRUE) { 
        echo "Table question deleted successfully"; 
    } else { 
        echo "Error creating table: " . $conn->error; 
    }*/
    
    // sql to create table 
    $sql = "CREATE TABLE questions ( 
    id_question INT(6) NOT NULL, 
    id_quiz INT(6) NOT NULL,
    question VARCHAR(300) NOT NULL,
    good_answer VARCHAR(300) NOT NULL
    )"; 
    
    if ($conn->query($sql) === TRUE) { 
        echo "Table question created successfully"; 
    } else { 
        echo "Error creating table: " . $conn->error; 
    } 
    
    $conn->close(); 

?>