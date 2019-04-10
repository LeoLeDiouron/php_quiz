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
                        <a class="mdl-navigation__link" href="quiz/dashboard_add_quiz.php"><i class="material-icons">add</i> Create a new quiz</a>
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
                        } elseif (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == false) {
                            header('Location: login.php?error_msg=teacher part, not allowed for students');
                        }

                        $queries = array();
                        parse_str($_SERVER['QUERY_STRING'], $queries);
                        $_POST['id_quiz_del'] = $queries['id_quiz'];
                        $_POST['username_del'] = $queries['username'];
                        if (isset($_POST['id_quiz_del']) && isset($_POST['username_del'])) {
                            delete_datas('scores', ['id_quiz', 'username'], [$_POST['id_quiz_del'], "'".$_POST['username_del']."'"]);
                        }

                        echo '<h2>Welcome '.$_SESSION['username'].' <i class="material-icons">verified_user</i></h2>';
                    ?>
                    <form action="dashboard_teacher.php" method="POST">
                        <p class="mdl-textfield mdl-js-textfield" style="min-width: 400px">
                            <input class="mdl-textfield__input" type="student" id="student" name="student">
                            <label class="mdl-textfield__label" for="student">Student name (leave blank to get all students)</label>
                            <button style="margin-left: 420px" type="submit" name="button_search" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" value="search"><i class="material-icons">search</i></button>
                        </p>
                    </form>
                    <table>
                        <?php
                            $query = "SELECT id_quiz, username, score, date FROM scores ORDER BY date DESC";
                            if (isset($_POST['student']) && $_POST['student'] != "")
                                $query = "SELECT id_quiz, username, score, date FROM scores WHERE username='".$_POST['student']."' ORDER BY date DESC";
                            $result_scores = get_datas($query);
                            if ($result_scores->num_rows == 0) {
                                echo "No score available";
                                return;
                            }

                            function create_quiz_row($username, $quiz, $score, $date) {
                                echo '<tr>';
                                echo '<td class="mdl-data-table__cell--non-numeric">'.$username.'</td>';
                                echo '<td class="mdl-data-table__cell--non-numeric">'.$quiz.'</td>';
                                echo '<td class="mdl-data-table__cell--non-numeric">'.$score.'</td>';
                                echo '<td class="mdl-data-table__cell--non-numeric">'.$date.'</td>';
                                
                                // Delete button
                                echo '<td><form action="dashboard_teacher.php?username='.$username.'&id_quiz='.$quiz.'" method="POST">';
                                
                                // Keep the searching parameter
                                if (isset($_POST['student']) && $_POST['student'] != "")
                                    echo '<input type="hidden" name="student" value="'.$_POST['student'].'">';
                                
                                echo '<button class="button_delete" type="submit" name="button_delete" value="X"><i class="material-icons">delete</i></button>';
                                echo '</form></td>';
                                echo '</tr>';
                            }

                            // Create the header of the table
                            echo '<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">';
                            echo '<thead><tr><th class="mdl-data-table__cell--non-numeric">Username</th>';
                            echo '<th class="mdl-data-table__cell--non-numeric">Quiz n°</th>';
                            echo '<th class="mdl-data-table__cell--non-numeric">Score</th>';
                            echo '<th class="mdl-data-table__cell--non-numeric">Date</th>';
                            echo '<th class="mdl-data-table__cell--non-numeric">Delete</th></tr></thead><tbody>';
                           
                            while ($row = $result_scores->fetch_assoc()) {
                                create_quiz_row($row['username'], $row['id_quiz'], $row['score'], $row['date']);
                            }

                            echo '</tbody></table>';
                        ?>
                    </table>
                </div>
            </main>
        </div>
    </body>
</html>