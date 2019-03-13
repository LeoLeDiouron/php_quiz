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
            session_start();

            if (isset($_SESSION['username']) == false || isset($_SESSION['password']) == false) {
                header('Location: login.php?error_msg=no username or password');
            } elseif (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == true) {
                header('Location: login.php?error_msg=student dashboard, not allowed for teachers');
            }
        ?>

        <form action="send_answer.php" method="POST">
            <?php
                include_once "../database.php";
                $sql = "SELECT id_question, question, good_answer FROM questions WHERE id_quiz=".$_POST['id_quiz'];

                $results_questions = get_datas($sql);
                $idx = 0;
                while ($row_question = $results_questions->fetch_assoc()) {
                    echo $row_question['question'];
                    echo "<fieldset id=\"group".$idx."\">";
                    
                    $sql = "SELECT id_question, answer FROM answers WHERE id_quiz=".$_POST['id_quiz']." AND id_question='".$row_question['id_question']."'";
                    $results_answers = get_datas($sql);
                    while ($row_answers = $results_answers->fetch_assoc()) {
                        echo $row_answers['answer'];
                        echo "<input type=\"radio\" value=\"".$row_answers['answer']."\" name=\"group".$idx."\">";
                    }
                    echo "</fieldset>";
                    echo "<input type=\"hidden\" name=\"group".$idx."_answer\" value=\"".$row_question['good_answer']."\">";
                    $idx++;
                }
            ?>
            <input type="hidden" name="id_quiz" value=<?php echo $_POST['id_quiz']; ?>>
            <input class="button" type="submit" name="button_logout" value="validate" >
        </form>

    </body>
</html>