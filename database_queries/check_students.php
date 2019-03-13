<?php
    $servername = "127.0.0.1:50437"; 
    $username = "azure"; 
    $password = "6#vWHD_$"; 
    $dbname = "quiz_db";

    $conn = new mysqli($servername, $username, $password, $dbname); 
    

    if ($conn->connect_error) { 
        die("Connection failed: " . $conn->connect_error); 
    } 

    $sql = "SELECT id, username, password, is_admin FROM users";
    $results = $conn->query($sql);
    while ($row = $results->fetch_assoc()) {
        echo $row['id'].' - '.$row['username'].' - '.$row['password'].' - '.$row['is_admin'].'</br>';
    }
    
    $conn->close(); 

?>