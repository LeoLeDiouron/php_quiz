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

    $sql = "SELECT id_quiz, id_question, question, good_answer FROM questions";
    $results_questions = $conn->query($sql);
    while ($row_question = $results_questions->fetch_assoc()) {
        echo $row_question['id_quiz'].' - '.$row_question['id_question'].' - '.$row_question['question'].' - '.$row_question['good_answer'].'</br>';
        $sql = "SELECT id_question, answer FROM answers WHERE id_question='".$row_question['id_question']."'";
        $results_answers = $conn->query($sql);
        while ($row_answers = $results_answers->fetch_assoc()) {
            echo "-> ".$row_answers['id_question'].' - '.$row_answers['answer'].'</br>';
        }
    }
    
    $conn->close(); 

?>