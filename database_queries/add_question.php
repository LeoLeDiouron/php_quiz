<?php
    $servername = "127.0.0.1:50437"; 
    $username = "azure"; 
    $password = "6#vWHD_$"; 
    $dbname = "quiz_db";

    $conn = new mysqli($servername, $username, $password, $dbname); 
    
    if ($conn->connect_error) { 
        die("Connection failed: " . $conn->connect_error); 
    } 

    $sql = "DELETE FROM questions";
    $conn->query($sql);

    // QUIZ 1
    $sql = "INSERT INTO questions (id_question, id_quiz, question, good_answer) VALUES (0, 0, '1+1', '2')";
    $conn->query($sql);
    $sql = "INSERT INTO questions (id_question, id_quiz, question, good_answer) VALUES (1, 0, '2+2', '4')";
    $conn->query($sql);
    $sql = "INSERT INTO questions (id_question, id_quiz, question, good_answer) VALUES (2, 0, '3+3', '6')";
    $conn->query($sql);
    $sql = "INSERT INTO questions (id_question, id_quiz, question, good_answer) VALUES (3, 0, '4+4', '8')";
    $conn->query($sql); 
    $sql = "INSERT INTO questions (id_question, id_quiz, question, good_answer) VALUES (4, 0, '5+5', '10')";
    $conn->query($sql);
    $sql = "INSERT INTO questions (id_question, id_quiz, question, good_answer) VALUES (5, 0, '6+6', '12')";
    $conn->query($sql); 
    $sql = "INSERT INTO questions (id_question, id_quiz, question, good_answer) VALUES (6, 0, '7+7', '14')";
    $conn->query($sql);
    $sql = "INSERT INTO questions (id_question, id_quiz, question, good_answer) VALUES (7, 0, '8+8', '16')";
    $conn->query($sql); 
    $sql = "INSERT INTO questions (id_question, id_quiz, question, good_answer) VALUES (8, 0, '9+9', '18')";
    $conn->query($sql);
    $sql = "INSERT INTO questions (id_question, id_quiz, question, good_answer) VALUES (9, 0, '10+10', '20')";
    $conn->query($sql);

    // QUIZ 2
    $sql = "INSERT INTO questions (id_question, id_quiz, question, good_answer) VALUES (0, 1, '1+1', '2')";
    $conn->query($sql);
    $sql = "INSERT INTO questions (id_question, id_quiz, question, good_answer) VALUES (1, 1, '2+2', '4')";
    $conn->query($sql);
    $sql = "INSERT INTO questions (id_question, id_quiz, question, good_answer) VALUES (2, 1, '3+3', '6')";
    $conn->query($sql);
    $sql = "INSERT INTO questions (id_question, id_quiz, question, good_answer) VALUES (3, 1, '4+4', '8')";
    $conn->query($sql); 
    $sql = "INSERT INTO questions (id_question, id_quiz, question, good_answer) VALUES (4, 1, '5+5', '10')";
    $conn->query($sql);
    $sql = "INSERT INTO questions (id_question, id_quiz, question, good_answer) VALUES (5, 1, '6+6', '12')";
    $conn->query($sql); 
    $sql = "INSERT INTO questions (id_question, id_quiz, question, good_answer) VALUES (6, 1, '7+7', '14')";
    $conn->query($sql);
    $sql = "INSERT INTO questions (id_question, id_quiz, question, good_answer) VALUES (7, 1, '8+8', '16')";
    $conn->query($sql); 
    $sql = "INSERT INTO questions (id_question, id_quiz, question, good_answer) VALUES (8, 1, '9+9', '18')";
    $conn->query($sql);
    $sql = "INSERT INTO questions (id_question, id_quiz, question, good_answer) VALUES (9, 1, '10+10', '20')";
    $conn->query($sql);

    $sql = "SELECT * FROM questions ORDER BY id_quiz, id_question ASC";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo strval($row['id_quiz'])." : ".strval($row['id_question'])."</br>";
    }
    
    $conn->close(); 

?>