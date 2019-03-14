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
        <?php
            //echo "roro";
            include_once "../database.php";
            include_once "check_quiz_values.php";
            session_start();

            if (isset($_SESSION['username']) == false || isset($_SESSION['password']) == false) {
                header('Location: login.php?error_msg=no username or password');
            } elseif (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == false) {
                header('Location: login.php?error_msg=teacher part, not allowed for students');
            }

            function get_new_id_quiz() {
                $sql_select = "SELECT id_quiz FROM questions ORDER BY id_quiz DESC LIMIT 1";
                $result_quiz = get_datas($sql_select);
                if ($result_quiz->num_rows == 1) {
                    $row = $result_quiz->fetch_assoc();
                    return $row['id_quiz'] + 1;
                }
                return 0;
            }

            if (check_quiz_values() == false) {
                echo "Not valid !</br>";
            } else {
                $id_quiz = get_new_id_quiz();
                echo strval($id_quiz)."</br>";
                for($idx_question = 0; $idx_question < 10; $idx_question++) {
                    $good_answer = $_POST['answer_'.strval($idx_question).'_'.strval($_POST['good_answer_'.strval($idx_question)])];
                    insert_datas("questions", ["id_quiz", "id_question", "question", "good_answer"], [strval($id_quiz), strval($idx_question), "\"".$_POST['question_'.strval($idx_question)]."\"", "\"".$good_answer."\""]);
                    echo "</br>";
                    for ($idx_answer = 0; $idx_answer < 4; $idx_answer++) {
                        insert_datas("answers", ["id_quiz", "id_question", "answer"], [strval($id_quiz), strval($idx_question), "\"".$_POST['answer_'.strval($idx_question)."_".strval($idx_answer)]."\""]);
                        echo "</br>";
                    }
                    echo "</br>";
                }
            }
        ?>

        Quiz created !

        <form action="../dashboard_teacher.php" method="POST"> 
            <input class="button" type="submit" name="button_logout" value="Continue" >
        </form>
    </body>
</html>