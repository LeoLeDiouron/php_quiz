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
                    <span class="mdl-layout-title">Quiz</span>
                    <div class="mdl-layout-spacer"></div>
                    <nav class="mdl-navigation mdl-layout--large-screen-only">
                        <a class="mdl-navigation__link" href="login.php"><i class="material-icons">logout</i> Logout</a>
                    </nav>
                </div>
            </header>

            <main class="mdl-layout__content">
                <div class="pagecontent">
                    <?php
                        include_once "../database.php";
                        include_once "check_quiz_values.php";
                        session_start();

                        if (isset($_SESSION['username']) == false || isset($_SESSION['password']) == false) {
                            header('Location: ../login.php?error_msg=no username or password');
                        } elseif (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == false) {
                            header('Location: ../login.php?error_msg=teacher part, not allowed for students');
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
                            echo '<h5><i class="material-icons" style="font-size:20px">error</i> Not valid !</h5>';
                            echo '<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" onclick="history.back()"> <i class="material-icons">chevron_left</i> Go back </button>';
                            return;
                        }
                        $id_quiz = get_new_id_quiz();
                        for($idx_question = 0; $idx_question < 10; $idx_question++) {
                            $good_answer = $_POST['answer_'.strval($idx_question).'_'.strval($_POST['good_answer_'.strval($idx_question)])];
                            insert_datas("questions", ["id_quiz", "id_question", "question", "good_answer"], [strval($id_quiz), strval($idx_question), "\"".$_POST['question_'.strval($idx_question)]."\"", "\"".$good_answer."\""]);
                            for ($idx_answer = 0; $idx_answer < 4; $idx_answer++) {
                                insert_datas("answers", ["id_quiz", "id_question", "answer"], [strval($id_quiz), strval($idx_question), "\"".$_POST['answer_'.strval($idx_question)."_".strval($idx_answer)]."\""]);
                            }
                        }
                        echo "<h5>Quiz ".($id_quiz + 1)." created !</h5>";
                    ?>
                    <a class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" href="../dashboard_teacher.php">Continue <i class="material-icons">chevron_right</i></a>
                </div>
            </main>
        </div>
    </body>
</html>