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
            include_once "../database.php";
            session_start();

            if (isset($_SESSION['username']) == false || isset($_SESSION['password']) == false) {
                header('Location: login.php?error_msg=no username or password');
            } elseif (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == true) {
                header('Location: login.php?error_msg=student dashboard, not allowed for teachers');
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
            <input class="button" type="submit" name="button_continue" value="Continue" >
        </form>
    </body>
</html>