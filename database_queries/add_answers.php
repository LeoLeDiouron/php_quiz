<?php
    $servername = "127.0.0.1:50437"; 
    $username = "azure"; 
    $password = "6#vWHD_$"; 
    $dbname = "quiz_db";

    $conn = new mysqli($servername, $username, $password, $dbname); 
    

    if ($conn->connect_error) { 
        die("Connection failed: " . $conn->connect_error); 
    } 

    $sql = "DELETE FROM answers";
    $conn->query($sql);

    // QUIZ 1
    // QUESTION 1
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (0, 0, '1')";
    $conn->query($sql);
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (0, 0, '2')";
    $conn->query($sql);
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (0, 0, '3')";
    $conn->query($sql);
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (0, 0, '4')";
    $conn->query($sql);
    // QUESTION 2
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (0, 1, '2')";
    $conn->query($sql);
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (0, 1, '4')";
    $conn->query($sql);  
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (0, 1, '6')";
    $conn->query($sql);  
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (0, 1, '8')";
    $conn->query($sql);   
    // QUESTION 3
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (0, 2, '1')";
    $conn->query($sql);
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (0, 2, '2')";
    $conn->query($sql);
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (0, 2, '3')";
    $conn->query($sql);
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (0, 2, '6')";
    $conn->query($sql);
    // QUESTION 4
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (0, 3, '2')";
    $conn->query($sql);
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (0, 3, '4')";
    $conn->query($sql);  
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (0, 3, '6')";
    $conn->query($sql);  
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (0, 3, '8')";
    $conn->query($sql);  
    // QUESTION 5
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (0, 4, '1')";
    $conn->query($sql);
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (0, 4, '2')";
    $conn->query($sql);
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (0, 4, '10')";
    $conn->query($sql);
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (0, 4, '4')";
    $conn->query($sql);
    // QUESTION 6
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (0, 5, '2')";
    $conn->query($sql);
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (0, 5, '12')";
    $conn->query($sql);  
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (0, 5, '6')";
    $conn->query($sql);  
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (0, 5, '8')";
    $conn->query($sql);  
    // QUESTION 7
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (0, 6, '14')";
    $conn->query($sql);
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (0, 6, '2')";
    $conn->query($sql);
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (0, 6, '3')";
    $conn->query($sql);
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (0, 6, '4')";
    $conn->query($sql);
    // QUESTION 8
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (0, 7, '16')";
    $conn->query($sql);
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (0, 7, '4')";
    $conn->query($sql);  
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (0, 7, '6')";
    $conn->query($sql);  
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (0, 7, '8')";
    $conn->query($sql);  
    // QUESTION 9
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (0, 8, '1')";
    $conn->query($sql);
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (0, 8, '2')";
    $conn->query($sql);
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (0, 8, '18')";
    $conn->query($sql);
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (0, 8, '4')";
    $conn->query($sql);
    // QUESTION 10
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (0, 9, '2')";
    $conn->query($sql);
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (0, 9, '4')";
    $conn->query($sql);  
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (0, 9, '18')";
    $conn->query($sql);  
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (0, 9, '20')";
    $conn->query($sql);  

    // QUIZ 2
    // QUESTION 1
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (1,  0, '1')";
    $conn->query($sql);
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (1,  0, '2')";
    $conn->query($sql);
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (1,  0, '3')";
    $conn->query($sql);
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (1,  0, '4')";
    $conn->query($sql);
    // QUESTION 2
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (1,  1, '2')";
    $conn->query($sql);
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (1,  1, '4')";
    $conn->query($sql);  
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (1,  1, '6')";
    $conn->query($sql);  
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (1,  1, '8')";
    $conn->query($sql);   
    // QUESTION 3
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (1,  2, '1')";
    $conn->query($sql);
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (1,  2, '2')";
    $conn->query($sql);
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (1,  2, '3')";
    $conn->query($sql);
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (1,  2, '6')";
    $conn->query($sql);
    // QUESTION 4
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (1,  3, '2')";
    $conn->query($sql);
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (1,  3, '4')";
    $conn->query($sql);  
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (1,  3, '6')";
    $conn->query($sql);  
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (1,  3, '8')";
    $conn->query($sql);  
    // QUESTION 5
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (1,  4, '1')";
    $conn->query($sql);
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (1,  4, '2')";
    $conn->query($sql);
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (1,  4, '10')";
    $conn->query($sql);
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (1,  4, '4')";
    $conn->query($sql);
    // QUESTION 6
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (1,  5, '2')";
    $conn->query($sql);
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (1,  5, '12')";
    $conn->query($sql);  
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (1,  5, '6')";
    $conn->query($sql);  
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (1,  5, '8')";
    $conn->query($sql);  
    // QUESTION 7
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (1,  6, '14')";
    $conn->query($sql);
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (1,  6, '2')";
    $conn->query($sql);
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (1,  6, '3')";
    $conn->query($sql);
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (1,  6, '4')";
    $conn->query($sql);
    // QUESTION 8
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (1,  7, '16')";
    $conn->query($sql);
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (1,  7, '4')";
    $conn->query($sql);  
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (1,  7, '6')";
    $conn->query($sql);  
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (1,  7, '8')";
    $conn->query($sql);  
    // QUESTION 9
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (1,  8, '1')";
    $conn->query($sql);
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (1,  8, '2')";
    $conn->query($sql);
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (1,  8, '18')";
    $conn->query($sql);
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (1,  8, '4')";
    $conn->query($sql);
    // QUESTION 10
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (1,  9, '2')";
    $conn->query($sql);
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (1,  9, '4')";
    $conn->query($sql);  
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (1,  9, '18')";
    $conn->query($sql);  
    $sql = "INSERT INTO answers (id_quiz, id_question, answer) VALUES (1,  9, '20')";
    $conn->query($sql);  
    
    $conn->close(); 

?>