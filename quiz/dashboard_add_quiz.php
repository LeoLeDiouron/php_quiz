<!DOCTYPE html>
<html>
    <head>
        <!-- style -->
        <link rel="stylesheet" type="text/css" href="../style/style.css">
    </head>
    <body>
        <h1>
            QUIZ
        </h1>
        <h2>
            Create a quiz
        </h2>
        <?php
            session_start();

            if (isset($_SESSION['username']) == false || isset($_SESSION['password']) == false) {
                header('Location: login.php?error_msg=no username or password');
            } elseif (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == false) {
                header('Location: login.php?error_msg=teacher part, not allowed for students');
            }
        ?>

        <form action="add_quiz.php" method="POST">
            <?php
                for($idx_question = 0; $idx_question < 10; $idx_question++) {
                    echo "Question ".strval($idx_question+1)." : <input type=\"text\" name=\"question_".strval($idx_question)."\" value=\"a\"></br>";
                    for($idx_answer = 0; $idx_answer < 4; $idx_answer++) {
                        echo "Answer ".strval($idx_answer+1)." : <input type=\"text\" name=\"answer_".strval($idx_question)."_".strval($idx_answer)."\" value=\"a\"></br>";
                    }
                    echo "Good answer : ";
                    for ($idx_radio_answer = 0; $idx_radio_answer < 4; $idx_radio_answer++) {
                        echo "<input type=\"radio\" name=\"good_answer_".strval($idx_question)."\" value=\"".strval($idx_radio_answer)."\"> ".strval($idx_radio_answer+1);
                    }
                    echo "</br></br>";
                }
            ?>
            <input class="button" type="submit" name="button_create" value="Create" >
        </form>

        <form action="login.php" method="POST"> 
            <input class="button" type="submit" name="button_logout" value="Logout" >
        </form>
    </body>
</html>