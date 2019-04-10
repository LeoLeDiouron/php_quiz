<!DOCTYPE html>
<html>
    <head>
        <!-- style -->
        <link rel="stylesheet" type="text/css" href="../style/style.css">
    </head>
    <body>
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
                    <span class="mdl-layout-title">Quiz n° <?php echo $_POST['id_quiz']?></span>
                </div>
            </header>

            <main class="mdl-layout__content">
                <div class="pagecontent">
                    <?php
                        include_once "../database.php";

                        session_start();

                        if (isset($_SESSION['username']) == false || isset($_SESSION['password']) == false) {
                            header('Location: ../login.php?error_msg=no username or password');
                        } elseif (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == true) {
                            header('Location: ../login.php?error_msg=student dashboard, not allowed for teachers');
                        }
                            
                        $score = 0;
                        for ($idx = 0; $idx < 10; $idx++) {
                            if ((isset($_POST['group'.$idx])) && ($_POST['group'.$idx] == $_POST['group'.$idx.'_answer'])) {
                                $score++;
                            }
                        }
                        if (check_datas_exist('scores', ['id_quiz', 'username'], [$_POST['id_quiz'], "'".$_SESSION['username']."'"]) == true) {
                            update_datas('scores', ['id_quiz', 'username'], [$_POST['id_quiz'], "'".$_SESSION['username']."'"], ['score', 'date'], [$score, "'".date("Y-m-d H:i:s")."'"]);
                        } else {
                            insert_datas('scores', ['id_quiz', 'username', 'score', 'date'], [$_POST['id_quiz'], "'".$_SESSION['username']."'", $score, "'".date("Y-m-d H:i:s")."'"]);
                        }
                    ?>
                    <p>Your score for the quiz <?php echo $_POST['id_quiz']+1; ?> is : <?php echo $score;?></p>
                    <form action="../dashboard_student.php" method="POST">     
                        <input class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" type="submit" name="button_continue" value="Continue >" >
                    </form>
                </div>
            </main>
        </div>
    </body>
</html>