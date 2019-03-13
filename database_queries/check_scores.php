<?php
    $servername = "127.0.0.1:50437"; 
    $username = "azure"; 
    $password = "6#vWHD_$"; 
    $dbname = "quiz_db";

    $conn = new mysqli($servername, $username, $password, $dbname); 
    

    if ($conn->connect_error) { 
        die("Connection failed: " . $conn->connect_error); 
    } 

    $sql = "SELECT id_quiz, username, score, date FROM scores";
    $results = $conn->query($sql);
    while ($row = $results->fetch_assoc()) {
        echo $row['id_quiz'].' - '.$row['username'].' - '.$row['score'].' - '.$row['date'].'</br>';
    }
    
    $conn->close(); 

?>