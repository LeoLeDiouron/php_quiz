<?php
    $servername = "127.0.0.1:50437"; 
    $username = "azure"; 
    $password = "6#vWHD_$"; 
    $dbname = "quiz_db";

    $conn = new mysqli($servername, $username, $password, $dbname); 
    
    if ($conn->connect_error) { 
        die("Connection failed: " . $conn->connect_error); 
    } 

    $sql = "DELETE from users";
    $conn->query($sql);

    $sql = "INSERT INTO users (username, password, is_admin) VALUES ('admin', 'pwd_admin', true);";
    $conn->query($sql);
    $sql = "INSERT INTO users (username, password, is_admin) VALUES ('student', 'a', false);";
    $conn->query($sql);

    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo strval($row['username'])." : ".strval($row['password'].' -> '.$row['is_admin'])."</br>";
    }
    
    $conn->close(); 

?>