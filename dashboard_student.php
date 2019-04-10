<!DOCTYPE html>
<html>
    <head>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-blue.min.css">
        <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
        <link rel="stylesheet" type="text/css" href="style/style.css">
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
                        include_once "database.php";
                        session_start();

                        if (isset($_SESSION['username']) == false || isset($_SESSION['password']) == false) {
                            header('Location: login.php?error_msg=no username or password');
                        } elseif (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == true) {
                            header('Location: login.php?error_msg=student part, not allowed for teachers');
                        }

                        echo '<h2><i class="material-icons" style="font-size: 36px;">person_outline</i> Welcome '.$_SESSION['username'].'</h2>';
                        $result_scores = get_datas("SELECT id_quiz, username, score, date FROM scores WHERE username='".$_SESSION['username']."' ORDER BY id_quiz DESC");
                        $scores = [-1, -1, -1, -1, -1];
                        if ($result_scores->num_rows > 0) {
                            while ($row = $result_scores->fetch_assoc()) {
                                $scores[$row['id_quiz']] = $row['score'];
                            }
                        }

                        function create_quiz_card($name, $score, $quiz_id) {
                            echo '<div class="demo-card-wide mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--12-col-phone">';
                            echo '<div class="mdl-card__title">';
                            echo '<h2 class="mdl-card__title-text">'.$name.'</h2>';
                            echo '</div>';
                            echo '<div class="mdl-card__supporting-text">Score: ';
                            echo $score;
                            echo '</div>';
                            echo '<div class="mdl-card__actions mdl-card--border">';
                            echo '<a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="'.($score < 5 ? ('quiz/quiz.php?id='.$quiz_id) : '').'" '.($score >= 5 ? 'disabled' : '').'>Start quiz</a>';
                            echo '</div>';
                            echo '</div>';
                        }
                    ?>
                        <?php
                            $results_quiz = get_datas('SELECT id_quiz from questions ORDER BY id_quiz DESC');
                            if ($results_quiz->num_rows == 0) {
                                echo "No quiz";
                                return;
                            }
                            $row = $results_quiz->fetch_assoc();
                            $nb_quiz = $row['id_quiz'] + 1;
                            echo '<div class="mdl-grid">';
                            for ($idx = 0; $idx < $nb_quiz; $idx++) {
                                create_quiz_card("Quiz ".strval($idx+1), ($scores[$idx] != -1 ? $scores[$idx] : "Not graded yet"), $idx);
                            }
                            echo '</div>';
                        ?>
                </div>
            </main>
        </div>
    </body>
</html>