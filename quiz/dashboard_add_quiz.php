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
                        <a class="mdl-navigation__link" href="../dashboard_teacher.php"><i class="material-icons">chevron_left</i> Go back to dashboard</a>
                        <a class="mdl-navigation__link" href="login.php"><i class="material-icons">logout</i> Logout</a>
                    </nav>
                </div>
            </header>

            <main class="mdl-layout__content">
                <div class="pagecontent">
                    <h2>Create a new quiz</h2>
                    <?php
                        session_start();

                        if (isset($_SESSION['username']) == false || isset($_SESSION['password']) == false) {
                            header('Location: ../login.php?error_msg=no username or password');
                        } elseif (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == false) {
                            header('Location: ../login.php?error_msg=teacher part, not allowed for students');
                        }
                    ?>

                    <form action="add_quiz.php" method="POST">
                        <?php
                            function create_question($id) {
                                echo '<div class="demo-card-wide mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col">';
                                echo '<div class="mdl-card__supporting-text">';

                                echo '<h5>Question n°'.strval($id+1).':</h5>';
                                echo '<p class="mdl-textfield mdl-js-textfield">';
                                echo '<input type="text" class="mdl-textfield__input" name="question_'.$id.'" id="question_'.$id.'" value="Question">';
                                echo '<label class="mdl-textfield__label" for="question_'.$id.'">Enter the question here...</label>';
                                echo '</p></br>';
                                for($idx_answer = 0; $idx_answer < 4; $idx_answer++) {
                                    echo "Anwser n°".strval($idx_answer+1).' <input type="text" class="mdl-textfield__input" name="answer_'.$id.'_'.strval($idx_answer).'" value="a"></br>';
                                }
                                echo 'Correct answer :';
                                for ($idx_radio_answer = 0; $idx_radio_answer < 4; $idx_radio_answer++) {
                                    echo '<input type="radio" name="good_answer_'.strval($id).'" value="'.strval($idx_radio_answer).'" '.($idx_radio_answer == 0 ? 'checked': '').'> '.strval($idx_radio_answer+1);
                                }
                                
                                echo '</div></div>';    
                            }

                            for($id = 0; $id < 10; $id++) {
                                create_question($id);
                            }
                        ?>
                        <br>
                        <input class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" type="submit" name="button_create" value="Create" >
                    </form>
                </div>
            </main>
        </div>
    </body>
</html>


