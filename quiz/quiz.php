<!DOCTYPE html>
<html>
    <head>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-blue.min.css">
        <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../style/style.css">
    </head>
    <body>
        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
            <header class="mdl-layout__header">
                <div class="mdl-layout__header-row">
                    <span class="mdl-layout-title">Quiz n°
                        <?php 
                            $queries = array();
                            parse_str($_SERVER['QUERY_STRING'], $queries);
                            echo $queries['id'];
                        ?>
                    </span>
                </div>
            </header>

            <main class="mdl-layout__content">
                <div class="pagecontent">
                    <?php
                        session_start();

                        if (isset($_SESSION['username']) == false || isset($_SESSION['password']) == false) {
                            header('Location: ../login.php?error_msg=no username or password');
                        } elseif (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == true) {
                            header('Location: ../login.php?error_msg=student dashboard, not allowed for teachers');
                        }
                    ?>

                    <form action="send_answer.php" method="POST">
                        <?php
                            include_once "../database.php";
                            $queries = array();
                            parse_str($_SERVER['QUERY_STRING'], $queries);
                            $_POST['id_quiz'] = $queries['id'];
                            $sql = "SELECT id_question, question, good_answer FROM questions WHERE id_quiz=".$_POST['id_quiz'];

                            function create_question_card($row_question, $idx) {
                                echo '<div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col">';
                                echo '<div class="mdl-card__supporting-text">';
                                echo '<h5>'.$row_question['question'].'</h5>';
                                echo "<fieldset id=\"group".$idx."\">";
                                
                                $sql = "SELECT id_question, answer FROM answers WHERE id_quiz=".$_POST['id_quiz']." AND id_question='".$row_question['id_question']."'";
                                $results_answers = get_datas($sql);
                                while ($row_answers = $results_answers->fetch_assoc()) {
                                    echo '<input type="radio" value="'.$row_answers['answer'].'" name="group'.$idx.'">'.$row_answers['answer'].'</br>';
                                }
                                echo "</fieldset>";
                                echo "<input type=\"hidden\" name=\"group".$idx."_answer\" value=\"".$row_question['good_answer']."\">";

                                echo '</div>';
                                echo '</div>';
                            }

                            $results_questions = get_datas($sql);
                            $idx = 0;
                            while ($row_question = $results_questions->fetch_assoc()) {
                                create_question_card($row_question, $idx);
                                $idx++;
                            }
                        ?>
                        <input type="hidden" name="id_quiz" value=<?php echo $_POST['id_quiz']; ?>>
                        </br>
                        <input class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" type="submit" value="validate" name="validate" />
                    </form>
                </div>
            </main>
        </div>

    </body>
</html>